 <?php $form = new sfGuardFormSignin() ?>
 <div class="slide_panel_inner">
 <a class="slide_close" href="#">&#215;</a>

          <form class="login_form" action="<?php echo url_for('@sf_guard_signin') ?>" method="post">
                 <?php echo $form['_csrf_token']->render() ?>
                 <div class="row"><strong class="size11"><?php echo __('Логин') ?> </strong><br /><input size="20" name="signin[username]"  class="login_pole" id="signin_username" type="text"></div>
                 <div class="row"><strong class="size11"><?php echo __('Пароль') ?></strong><br /><input  size="20" name="signin[password]" class="pass_pole" id="signin_password" type="password"></div>
                
                 <input value="<?php echo __('Вход') ?>" type="submit">
                 <a class="block size11 white" href="<?php echo url_for('registration/index') ?>">Регистрация</a>
                 
            </form>
            
</div>            