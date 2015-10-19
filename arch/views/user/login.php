<script type="text/javascript">
    $(function() {
        function resize() {
            $('#login-pane').css({
                left: ($(window).width() - $('#login-pane').width()) / 2,
                top: (($(window).height() - $('#login-pane').height()) / 2) - 25
            });
        }

        $(window).resize(function() {
            resize();
        });
        resize();
    });
</script>

<div id="login-pane" class="login-pane<?php echo (is_error_exists()) ? " accessdenied" : '' ?>">
    <div>
        <form action="" method="post">
            <div class="login-form">

                <div class="logo">
                    <img width="100" src="<?php echo theme_url('web/themes/img/logo.png') ?>">
                    <div class="title">Trianglenine<br /></div>
                </div>

                <div class="system-time">
                    <span class="trianglenine-date"></span> &#149; <span class="triangle-time"></span>
                </div>
                <?php if (!$CI->config->item('use_db')): ?>
                <div style="text-align: center; color: red; font-weight: bold">
                    Database not ready!
                </div>
                <?php endif ?>
                <div>
                    <input type="text" name="login" value=""  placeholder="<?php echo l('Username/Email') ?>" />
                </div>
                <div>
                    <input type="password" name="password" value="" placeholder="<?php echo l('Password') ?>" />
                </div>
                <div style="padding-top:10px">
                    <input type="hidden" name="continue" value="" />
                    <input type="submit" value="Login" />
                </div>
            </div>
        </form>
    </div>
</div>