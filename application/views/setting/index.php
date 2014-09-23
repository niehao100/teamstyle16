
 <?php $this->renderFeedbackMessages(); ?>
 <div class="row">

    <div class="col-sm-2 col-xs-offset-1">
        <div class="list-group">
            <a href="#profile" class="list-group-item">Public Profile</a>
            <a href="#account" class="list-group-item">Account Settings</a>
            <a href="#password" class="list-group-item">Change Password</a>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="panel panel-default" id="profile">
            <div class="panel-heading">
                <h3 class="panel-title">修改头像</h3>
            </div>
            <div class="panel-body">
                <?php echo '<img src="'.$_SESSION['src'].'" />'; ?>
                <form action="<?php echo URL; ?>login/changpwd" method="post" >
                    <label for="avatar_file">Select an avatar image from your hard-disk (will be scaled to 44x44 px):</label>
                    <input type="file" name="avatar_file" required />
                    <!-- max size 5 MB (as many people directly upload high res pictures from their digital cameras) -->
                    <input type="hidden" name="MAX_FILE_SIZE" value="5000000" />
                    <button type="submit" class="btn  btn-default" >Upload</button>
                </form>
            </div>
        </div>
        <div class="panel panel-default" id="password">
            <div class="panel-heading">
                <h3 class="panel-title">修改密码</h3>
            </div>
            <div class="panel-body">
                <form action="<?php echo URL; ?>login/register_action" method="post" class="auth-form form-horizontal">
                    <div class="face"></div>
                        <div class="form-field">
                            <label>OLd Password</label>
                            <input type="password" autocomplete="off" name="user_password_old" required class="form-control password" />
                            <span class="icon icon-lock"></span>
                        </div>
                    <div class="form-field">
                        <label>New Password</label>
                        <input type="password" autocomplete="off" name="user_password_new" required class="form-control password" />
                        <span class="icon icon-lock"></span>
                    </div>
                    <div class="form-field">
                        <label>Confirm New Password</label>
                        <input type="password" autocomplete="off" name="user_password_repeat" required class="form-control password" />
                        <span class="icon icon-lock"></span>
                    </div>
                    <br/>
                    <button type="submit" onclick="_hmt.push(['_trackEvent', 'signup_submit', 'click'])" class="btn btn-default">Update password</button>
                </form>
            </div>
        </div>
    </div>
</div>
