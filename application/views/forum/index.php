

<style>
#wrap{word-break:break-all; width:250px;}
#deepblue{color:white;font-family: times}
p{white-space: pre-line;}
</style>
<style>
p{font-family: Georgia,  
             "Microsoft YaHei", "微软雅黑", 
             STXihei, "华文细黑", 
             serif;}
h1,h2,h3,h4,h5,h6{font-family: Georgia, 
             "Microsoft YaHei", "微软雅黑", 
             STXihei, "华文细黑", 
             serif;}
a{font-family: Georgia,  
             "Microsoft YaHei", "微软雅黑", 
             STXihei, "华文细黑", 
             serif;}
li{font-family: Georgia,  
             "Microsoft YaHei", "微软雅黑", 
             STXihei, "华文细黑", 
             serif;}
</style>
<div class="uk-container uk-container-center uk-margin-top uk-margin-large-bottom">
        <div class="jumbotron" style = "background:url(<?php echo URL; ?>public/img/forumindex.jpg)">
            <div class="uk-vertical-align">
                <div class="uk-vertical-align-middle uk-width-1-1 uk-text-center">
                    <br>
                    <h1 class="uk-heading-large" style="color:white;font-family:Georgia"><strong>DEEP BLUE</strong></h1>
                    <br>
                </div>
            </div>
            <div class="uk-width-1-1">
                <br>
                <h2 style="color:white;text-align:center;font-family:Georgia"><strong>EE&DA人自己的论坛</strong></h2>
                <h4 style="color:white;text-align:center;font-family:Georgia"><strong>让深蓝成为大学里最温暖的回忆</strong></h4>
                <br/>
                <br/>
            </div>
        </div>
        </br>

        <div class="uk-grid" data-uk-grid-margin>
            <?php foreach ($forums as $forums) { ?>
            <div class="uk-width-medium-1-3">
                <div class="uk-grid">
                    <div class="uk-width-1-6">
                        <!--图标待修改，根据每个不同板块使用不同图标-->
                        <icon class="uk-icon-comments uk-icon-large uk-text-primary"></icon>
                    </div>
                    <div class="uk-width-5-6">
                        <h2 class="uk-h3"><a href="<?php echo URL . 'forum/threads/' . $forums->forum_id; ?>">
                        <?php echo $forums->title; ?></a></h2>
                        <p style="fontsize:90px;text-indent:1cm" id = "wrap"><?php echo $forums->intro; ?></p>
                        <p class="uk-article-meta"><?php echo "发帖 " . $forums->count_thread . "  回复" . $forums->count_post?>
                        <?php echo "最新回复于" . $forums->latest_reply; ?></p> 
                        </br>
                    </div>
                </div>
            </div>
            <?php }?>
        </div> 
    </div>


<?php 
        if($_SESSION['user_type']=='admin')
            include 'create_forum.php';
?>



<div class="uk-container uk-container-center uk-margin-top uk-margin-large-bottom">

    <hr class="uk-grid-divider">

    <div class="uk-grid" data-uk-grid-margin>

        <div class="uk-width-medium-1-2">
            <img class = "img-rounded" width="660" height="400" src="<?php echo URL;?>public/img/theme-1.jpg" alt="">
        </div>
<!--这两个链接分别连接到通知公告区的规则介绍和活动时间两个帖子-->
        <div class="uk-width-medium-1-2">
            <h1 style="font-family:Georgia">【深蓝】官方报名通知</h1>
            <p style="text-indent:2em"> 洪荒之中，大小岛屿星罗棋布，各类资源隐没期间。人类以岛为界各自为营，不同基地合纵连横，抢夺对战经年不断。上百年间，大洋局势分分合合，最终形成的两大基地隔海而对，双方互相戒备互探有无，却都不敢贸然而动。但百年战争的疮痍使两大基地的资源储备所剩无几，唯一的可能，便是扬帆前往两地间未知的水域，夺取资源，扩充自己，直至在对方领土上竖起己方的大旗！大战将至，洪荒且乱，阳光下的海面，却依旧是那片平静的蓝……</p>
            <h2 style="font-family:Georgia">竞赛流程</h2>
            <p style="font-family:Georgia">大战来袭，你还在观望？！
                听说有宣讲会咳咳
                听说宣讲会上的女主持很漂亮呢；听说3D酷炫的不得了呢；听说会有“大神”手把手教你写ai呢</p>
            <p style="font-family:Georgia">快带上小伙伴一起来吧！本周日下午2:00于三教2102举行哦</p>
            <a class="uk-button uk-button-primary" href="#">进入帖子</a>
        </div>

    </div>

    <hr class="uk-grid-divider">

    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-2">
            <div class="uk-container">
                <h1>【队式十六】听老人们说</h1>
                <p>队式嘛，就是，认识新同学，结识新朋友；学习新姿势，掌握新技能。队式让我认识了许多靠谱的小伙伴和给力的队友，也在参与和开发的过程中学习巩固了编程的知识水平和应用能力。</p>
                <p>作为经历过许多系办的许多编程比赛的老学长表示，这次比赛的3D界面特效假的简直是DUANG~DUANG~DUANG~这么棒的特效你们忍心拒绝参赛吗！</p>
                <h2>我在队式get的新技能</h2>
                <p>自从参加了队式，感觉逼格都不一样了呢</p>
                <a class="uk-button uk-button-primary" href="http://deepblue.eesast.com/forum/posts/11">进入帖子</a>
            </div>
        </div>

        <div class="uk-width-medium-1-2">
            <img class = "img-rounded" width="660" height="400" src="<?php echo URL;?>public/img/theme-2.jpg" alt="">
        </div>
    </div>

    <hr class="uk-grid-divider">

    <div class="uk-grid" data-uk-grid-margin>
        <div class="uk-width-medium-1-1">
            <div class="uk-panel uk-panel-box uk-text-center">
                <p>
                    <strong>Deap Blue 欢迎你的加入</strong> 浏览完了意犹未尽？<a class="uk-button uk-button-primary uk-margin-left" href="#">回到顶部</a>
                </p>
            </div>
        </div>
    </div>

            <h1 class="uk-text-center">深蓝开发组</h1>

            <div class="uk-grid" data-uk-grid-margin>
                <div class="uk-width-1-2 uk-width-medium-1-3 uk-width-large-1-6">
                    <a class="uk-overlay" href="#">
                        <img class = "img-rounded" src="<?php echo URL;?>public/img/1.png" width="350" height="150" ></img>
                       <div class="uk-overlay-area">
                            <div class="uk-overlay-area-content">沟通连接 架起桥梁</div>
                        </div>
                    </a>
                </div>

                <div class="uk-width-1-2 uk-width-medium-1-3 uk-width-large-1-6">
                     <a class="uk-overlay" href="#">
                        <img  class = "img-rounded" width="350" height="150" src="<?php echo URL;?>public/img/2.png" alt="">
                        <div class="uk-overlay-area">
                            <div class="uk-overlay-area-content">制定游戏规则 掌控生死存亡</div>
                        </div>
                    </a>
                </div>

                <div class="uk-width-1-2 uk-width-medium-1-3 uk-width-large-1-6">
                   <a class="uk-overlay" href="#">
                        <img class = "img-rounded" width="350" height="150" src="<?php echo URL;?>public/img/3.png" alt="">
                        <div class="uk-overlay-area">
                            <div class="uk-overlay-area-content">酷炫特效 3D制造</div>
                        </div>
                    </a>
                </div>

                <div class="uk-width-1-2 uk-width-medium-1-3 uk-width-large-1-6">
                    <a class="uk-overlay" href="#">
                        <img class = "img-rounded" width="350" height="150" src="<?php echo URL;?>public/img/4.png">
                        <div class="uk-overlay-area">
                            <div class="uk-overlay-area-content">手握服务器最高权限
                                掌握全部数据库内容</div>
                        </div>
                    </a>
                </div>

                <div class="uk-width-1-2 uk-width-medium-1-3 uk-width-large-1-6">
                     <a class="uk-overlay" href="#">
                        <img class = "img-rounded" width="350" height="150" src="<?php echo URL;?>public/img/5.png">
                                                 <div class="uk-overlay-area">
                            <div class="uk-overlay-area-content">蓝海之美 由此开始</div>
                        </div>
                    </a>
                </div>

                <div class="uk-width-1-2 uk-width-medium-1-3 uk-width-large-1-6">
                     <a class="uk-overlay" href="#">
                        <img class = "img-rounded" width="350" height="150" src="<?php echo URL;?>public/img/6.png">
                        <div class="uk-overlay-area">
                            <div class="uk-overlay-area-content">这个组太忙了没有时间写简介了</div>
                        </div>
                    </a>
                </div>
            </div>

        </div>


<div style="display:none"><script type="text/javascript">
var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F0c44dcd3aa48076b3e0a91169a4ac665' type='text/javascript'%3E%3C/script%3E"));
</script></div>



