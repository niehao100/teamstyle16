<?php
class ForumModel
{
	public function __construct($db) {
				try {
				$this->db = $db;
				}
			   	catch (PDOException $e) {
				exit('Database connection could not be established.');
				}
	}

	public function Showforums()		//取得分板块的名称
		{
				$sql="SELECT * from forums";
				$query=$this->db->prepare($sql);
				$query->execute();
				return $query->fetchAll();
		}
  public function Showforum($forum_id){
				$sql="SELECT * from forums where forum_id={$forum_id}";
				$query=$this->db->prepare($sql);
				$query->execute();
				return $query->fetch();

	}

	public function Showthreads($forum_id)
		{
				if(isset($forum_id) and filter_var($forum_id,FILTER_VALIDATE_INT,array('min_range'=>1))){
					$sql="SELECT * FROM threads inner join users on threads.user_id=users.user_id WHERE forum_id={$forum_id} ORDER BY latest_reply DESC";
					$query=$this->db->prepare($sql);
					$query->execute();
					  			    return $query->fetchAll();
				}
		}

	public function Showposts($thread_id)
	{
				if(isset($thread_id) and filter_var($thread_id,FILTER_VALIDATE_INT,array('min_range'=>1))){
					$sql="SELECT t.subject as subject,p.message as message,user_nickname,p.post_on AS posted
						FROM
						threads AS t LEFT JOIN posts AS p USING (thread_id) INNER JOIN users AS u on p.user_id=u.user_id
						WHERE t.thread_id={$thread_id} ORDER BY p.post_on ASC";
				$query=$this->db->prepare($sql);
				$query->execute();
						return $query->fetchAll();
				}
	}
	
		public function ShowUSERposts($user_id)
	{
				if(isset($user_id) and filter_var($user_id,FILTER_VALIDATE_INT,array('min_range'=>1))){
					$sql="SELET select t.subject as subject ,p.message as message ,user_nickname,p.post_on AS posted
						FROM
						threads AS t LEFT JOIN posts AS P USING (thread_id) INNER JOIN users AS u on p.user_id=u.user_id
						WHERE p.user_id={$user_id} ODERED BY p.post_on ASC) limit 6";
					$query=$this->db->prepare($sql);
					$query->execute();
					return $query->fetchAll();
				}
	}
//管理员专用
		public function Create_forum(){
if($_SESSION['user_type']='admin'){
					if (empty($_POST['forum_title'])) {
						$_SESSION["feedback_negative"][] =FEEDBACK_FORUMTITLE_EMPTY;
					}
					elseif(empty($_POST['forum_intro'])){
						$_SESSION["feedback_negative"][] =FEEDBACK_FORUMINTRO_FREE;			
					}
					else{
					$title=strip_tags($_POST['forum_title']);
					$intro=strip_tags($_POST['forum_intro']);				
					$d=date('Y-m-d H:i:s');
					$sql="INSERT into forums(title,intro,latest_reply,count_thread,count_post) 
						VALUES
						(:title,:intro,'{$d}',0,0)";
					echo $sql;
					$query=$this->db->prepare($sql);
					if($query->execute(array(':title'=>$title,':intro'=>$intro))) return 'true'; 
					else $_SESSION["feedback_negative"][]=FEEDBACK_FORUM_INSERT_ERROR;								
					}
				}
				else{
				$_SESSION["feedback_negative"][]= FEEDBACK_PERMISSION_DENIED;
				}
		}

		public function Create_thread($forum_id){
			if($_POST['vcode']!=
				$_SESSION['captcha']){
				$_SESSION['feedback_negative'][]=FEEDBACK_WRONG_VC;
				}
			else{
			echo $_POST['thread_subject'];
			if (empty($_POST['thread_subject'])) {
			$_SESSION["feedback_negative"][] =FEEDBACK_THREAD_SUBJECT_EMPTY;
			}
			elseif(empty($_SESSION['user_id']))
			 	$_SESSION['feedback_negative'][] =FEEDBACK_NO_LOGIN;
			else{
				$user_id=$_SESSION['user_id'];
				$subject=strip_tags($_POST['thread_subject']);
				$content=strip_tags($_POST['message']);	
				$d=date('Y-m-d H:i:s');			
				$sql="INSERT into threads (forum_id,user_id,subject,content,establish_date,latest_reply)
						VALUES
						({$forum_id},{$user_id},:subject,:content,'{$d}','{$d}')";
				$query=$this->db->prepare($sql);
				$query->execute(array(':subject'=>$subject,':content'=>$content));
				$sql="UPDATE forums SET count_thread=count_thread+1 where forum_id={$forum_id}";
				$query=$this->db->prepare($sql);
				if(!$query->execute())   $_SESSION["feedback_negative"][] =FEEDBACK_THREAD_INSESRT_ERROR;	
				else return 'true';
				}
			}
		}			

		public function Create_Post($thread_id){
						if($_POST['vcode']!=$_SESSION['captcha'])
				$_SESSION['feedback_negative'][]=FEEDBACK_WRONG_VC;

			elseif (empty($_POST['message'])) {
			$_SESSION["feedback_negative"][] =FEEDBACK_POST_MESSAGE_EMPTY;
			}
			elseif(empty($_SESSION['user_id'])) $_SESSION['feedback_negative'][] =FEEDBACK_NO_LOGIN;
			else{
				$user_id=$_SESSION['user_id'];
				$message=strip_tags($_POST['message']);
				$d=date('Y-m-d H:i:s');
				$sql="INSERT into posts (thread_id,user_id,message,post_on)
					VALUES
					({$thread_id},{$user_id},:message,'{$d}')";
				$query=$this->db->prepare($sql);
				$query->execute(array(':message'=>$message)); 
				$sql="SELECT forum_id FROM threads WHERE thread_id={$thread_id}";
				$query=$this->db->prepare($sql);
				if(!$query->execute())   $_SESSION["feedback_negative"][] =FEEDBACK_THREAD_INSESRT_ERROR;	
				$forum_id=$query->fetch()->forum_id;
				$sql="UPDATE forums SET count_post=count_post+1 where forum_id={$forum_id}";
				$query=$this->db->prepare($sql);$query->execute();
				$sql="UPDATE threads SET latest_reply='{$d}',reply_count=reply_count+1 where thread_id={$thread_id}";
				$query=$this->db->prepare($sql);
				if(!$query->execute())   $_SESSION["feedback_negative"][] =FEEDBACK_THREAD_INSESRT_ERROR;	
				else return 'true';
				}
		}		
		
		public function Getthread_hot_link(){
					$sql="SELECT subject,thread_id FROM threads ORDER BY reply_count DESC limit 6";
					$query= $this->db->prepare($sql);
				  $query->execute();
					return $query->fetchAll();
		}

}
