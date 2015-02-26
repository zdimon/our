<?php include_partial('global/assets') ?>

<div align="center">
<div id="sf_admin_container" class="sf_admin_edit ui-widget ui-widget-content ui-corner-all" style="width: 300px; padding: 10px" align="center">
  


 <?php $form = new sfGuardFormSignin() ?>

          <form class="login_form" action="<?php echo url_for('@sf_guard_signin') ?>" method="post">
                 <?php echo $form['_csrf_token']->render() ?>
                 <div class="row"><strong class="size11"><?php echo __('Логин') ?> </strong><br /><input size="20" name="signin[username]"  class="login_pole" id="signin_username" type="text"></div>
                 <div class="row"><strong class="size11"><?php echo __('Пароль') ?></strong><br /><input  size="20" name="signin[password]" class="pass_pole" id="signin_password" type="password"></div>
                 <br />
                 <input value="<?php echo __('Вход') ?>" type="submit">
                

            </form>
			
			</div>
</div>

</div>
