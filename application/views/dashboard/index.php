
<div class="uk-container uk-container-center" style="background-color:#C4E1E1">
 <!--    <h1 >Dashboard</h1> -->
    <!-- echo out the system feedback (error and success messages) -->
        <?php 
        require  'application/views/_templates/feedback.php'; 
        Session::set('feedback_positive', null);
        Session::set('feedback_negative', null);
        $_SESSION['team_page_id'] = 1;
        ?>

    <div class="uk-grid" data-uk-grid-match>
        <div class="tm-main uk-width-1-1">
        <div class="uk-panel uk-panel-box uk-panel-box-primary uk-width-large-2-3 uk-width-medium-5-6 uk-container-center uk-text-center">
            <h3>深蓝进度条</h3>
            <div class="uk-progress uk-progress-striped">
                <div class="uk-progress-bar" style="width: <?php
                $d1=strtotime("May 4");
                $d2=100-ceil(($d1-time())/3600/24/60*100);
                echo $d2.'%';
                ?>">
                    <p id="date"></p>
                    <script>
                    function showdate()
                    {
                        var today,date;
                        today=new Date();
                        date = today.getDate();
                        document.getElementById('date').innerHTML = date +"\ passed" ; //显示时间
                        setTimeout("showdate();", 1000); //设定函数自动执行时间为 1000 ms(1 s)
                    }
                    showdate();
                    </script>
                </div>
            </div>    
                <p>
                    <?php
                    $d1 = strtotime("May 4");
                    $d2 = strtotime("April 19");
                    $dl1 = ceil(($d1 - time())/24/3600);
                    $dl2 = ceil(($d2 - time())/24/3600);
                    if ($dl2 >= 0) echo "距离初赛还剩".$dl2."天";
                    if ($dl1 >= 0) echo "\r\n距离决赛称霸罗姆走上人生巅峰还剩".$dl1."天";
                    ?>
                </p>
        </div>
    </div>
    </div>
    <div class="uk-grid" data-uk-grid-match>
        <div class="tm-main uk-width-1-1">
        <div class="uk-panel uk-panel-box uk-width-large-2-3 uk-width-medium-5-6 uk-container-center uk-text-center">
            <h2>欢迎您，深蓝的第<?php echo $_SESSION['user_profile']->user_id;?>位加入者</h2>
            <div class="uk-grid" data-uk-grid-match>

            <div class="uk-width-large-1-2 uk-width-medium-1-1">
                <a href="#offcanvas-1" data-uk-offcanvas>
                    <div class="uk-panel uk-panel-box uk-panel-success uk-text-center uk-panel-space">
                        <h3><icon class="uk-icon-user uk-icon-large"></icon> 我的资料<br/><small>看看我自己英俊潇洒的头像，想想还有点小激动呢</small></h3>
                    </div>
                </a>
            </div>

            <div class="uk-width-large-1-2 uk-width-medium-1-1">
                <a href="#offcanvas-2" data-uk-offcanvas>
                    <div class="uk-panel uk-panel-box uk-text-center uk-panel-space">
                        <h3><icon class="uk-icon-home uk-icon-large"></icon> 我的队伍<br/><small>励志被别人“抱大腿”</small><br/><br/></h3>
                    </div>
                </a>
            </div>

            <div class="uk-width-large-1-2 uk-width-medium-1-1">
                <a href="#offcanvas-3" data-uk-offcanvas>
                    <div class="uk-panel uk-panel-box uk-text-center uk-panel-space">
                        <h3><icon class="uk-icon-bookmark uk-icon-large"></icon> 我的帖子<br/><small>想不起来我都说过什么梦话呢</small><br/><br/></h3>
                    </div>
                </a>
            </div>

            <div class="uk-width-large-1-2 uk-width-medium-1-1">
                <a href="#offcanvas-5" data-uk-offcanvas>
                    <div class="uk-panel uk-panel-box uk-text-center uk-panel-space">
                        <h3><icon class="uk-icon-comment uk-icon-large"></icon>发送消息<br/><small>我要给女神发私信！</small><br/><br/></h3>
                    </div>
                </a>
            </div>
        </div>
        </div>
    </div>
</div>
</div>

<div id="offcanvas-1" class="uk-offcanvas">
    <div class="uk-offcanvas-bar" style="padding-top:70px;background-color:white">
        <div class="thumbnail">

                <br/>
                <?php echo '<a href="' . URL . 'setting/"><img src="'.$_SESSION['user_avatar_file'].'" class="img-rounded"/></a>'; ?>

            <div class="caption">
                <h2 class="text-center"><strong><?php echo $_SESSION['user_profile']->user_nickname; ?></strong><br/>
                 <small class="text-center" style="color:#777"><?php echo $_SESSION['user_profile']->user_real_name; ?></small></h2>
                <hr/>
                <p class="text-center"><?php echo $_SESSION['user_profile']->user_email; ?></p>
               
                <p class="text-center"><?php echo $_SESSION['user_profile']->user_phone; ?></p>
                <hr/>
                <p class="text-center">Welcome!<?php
                if ($_SESSION['user_first_login'] == 1) {
                    echo 'This is your first login!';
                }?></p>
                <?php echo"\t\t";?>
                <div class = "btn-group btn-group-justified">
                <div class = "btn-group">
                <a href="<?php echo URL. 'login/uploadavatar_action'?>"><button type = "button" class="btn btn-default">修改个人信息</button></a>
                </div>
                <div class = "btn-group">
                <a href="<?php echo URL. 'dashboard/alluser'?>"><button type = "button" class="btn btn-default">所有用户</button></a>
                </div>
                </div>
            </div>
       </div>
    </div>
</div>

<div id="offcanvas-2" class="uk-offcanvas">
    <div class="uk-offcanvas-bar uk-offcanvas-bar-flip" style="padding-top:70px">
            <ul class="uk-nav uk-nav-offcanvas uk-nav-parent-icon" data-uk-nav>
                <?php if ($_SESSION['user_team']==null) {?>}
                <h3 style="color:#E8E8E8;text-align:center">您尚未加入战队哦</h3>
                <br>
                <li class="uk-parent">
                    <a href="#">加入队伍</a>
                    <ul class="uk-nav-sub">
                        <li><a href="<?php echo URL. 'team/create_team'; ?>">创建队伍</a></li>
                        <li><a href="<?php echo URL. 'team/team_display'; ?>">抱大腿~</a></li>
                    </ul>
                </li>

                <li><a href="<?php echo URL. 'team/team_display'; ?>">查看所有队伍</a></li>
                <li class="uk-nav-divider"></li>
                <li class="uk-nav-header">查找队伍、队长或队员</li>
                <form class="navbar-form navbar-left" role="search" action="<?php echo URL;?>team/team_search" method="post">
                    <input type="text" class="form-control" placeholder="输入战队名或昵称" name="keyword"></input>
                    <button type="submit" class="btn btn-default">搜索</button>
                </form>
                <?php } else {?>
                <h3 style="color:#E8E8E8;text-align:center;font-size:20px">我的队伍</h3>
                <p style="color:#E8E8E8;text-align:center"><?php echo $_SESSION['user_profile']->team_name;?></p>
                <p style="color:#E8E8E8;text-align:center">
                    <?php if ($_SESSION['user_profile']->team_captain==$_SESSION['user_id']) echo "队长";
                    else echo "队员"?>
                </p>
                <li class="uk-parent">
                    <a href="#">队伍成员</a>
                    <ul class="uk-nav-sub">
                        <li style="color:#B0B0B0"><?php echo $_SESSION['team_captain']->user_nickname;?></li>
                        <li style="color:#B0B0B0">
                            <?php if (isset($_SESSION['team_member1'])) echo $_SESSION['team_member1']->user_nickname;?>
                        </li>
                        <li style="color:#B0B0B0"><?php if (isset($_SESSION['team_member2'])) echo $_SESSION['team_member2']->user_nickname;?></li>
                        <li style="color:#B0B0B0"><?php if (!isset($_SESSION['team_member2'])and !isset($_SESSION['team_member1'])) echo "队伍空空如也，赶快招兵买马";?></li>
                    </ul>
                </li>
                <li class="uk-parent">
                    <a href="#">队式口号</a>
                    <ul class="uk-nav-sub">
                        <li style="color:#B0B0B0"><?php echo $_SESSION['user_profile']->team_slogan;?></li>
                    </ul>
                </li>
                <li class="uk-nav-divider"></li>
                <li><a href="<?php echo URL. 'team/team_display'; ?>">显示所有战队</a></li>
                <li class="uk-nav-divider"></li>
                <form class="navbar-form navbar-left" role="search" action="<?php echo URL;?>team/team_search" method="post">
                    <input type="text" class="form-control" placeholder="输入战队名" name="keyword"></input>
                    <button type="submit" class="btn btn-default">搜索</button>
                </form>
                <li class="uk-nav-divider"></li>
								<?php if($_SESSION['team_captain']->user_id==$_SESSION['user_id']){?>
								<li><a href="<?php echo URL;?>team/quit_team">解散队伍</a></li>
								<?php }else{ ?>
								<li><a href="<?php echo URL;?>team/quit_team">退出队伍</a></li>
								<?php } ?>
                <?php }?>
            </ul>
    </div>
</div>
<div id="offcanvas-3" class="uk-offcanvas">
    <div class="uk-offcanvas-bar uk-offcanvas-bar-flip" style="padding-top:70px">
        <ul class="uk-nav uk-nav-offcanvas uk-nav-parent-icon" data-uk-nav>
        <h2 style="color:#B0B0B0;text-align:center">我的帖子</h2>
        <?php foreach ($mythreads as $results) {?>
            <li style="color:#B0B0B0"><a href = "<?php echo URL. 'forum/posts/'. $results->thread_id?>">
                <?php echo $results->subject . ":    " . $results->message;?></a></li>
        <?php }?>
    </ul>
    </div>
</div>

<div id="offcanvas-5" class="uk-offcanvas">
    <div class="uk-offcanvas-bar uk-offcanvas-bar-flip" style="background-color:white;padding-top:70px">            
                
                    <h3 style="text-align:center">发送消息</h3>
                    <form action="<?php echo URL; ?>message/send_mail_action" method="post" class="uk-form">
                        <fieldset>
                            <input type="text" name="message_title" placeholder='消息标题' autocomplete="off" value="" required class="form-control" />
                            
                        
                            <input type="text" placeholder="收信人昵称" name="user_to_nickname" required class="form-control name" />
                            
                        
                        
                        <textarea  name="message_content" placeholder="内容" required rows="15"class="form-control name">
                        </textarea>
                        
                    
                        <br>
                        <span class="icon icon-envelope-bold"></span>
                        <select name="message_type">
                            <option value='sec'>私信</option>
                            <?php if($_SESSION['user_type']=='admin'){
                                echo "<option value='pub'>公告</option>";
                            }?>
                        </select>
                        <button type="submit" onclick="_hmt.push(['_trackEvent', 'signup_submit', 'click'])" class="btn btn-primary btn-large">
                            发送 
                        </button></fieldset>
                    </form>
                
            
    </div>


</div>
