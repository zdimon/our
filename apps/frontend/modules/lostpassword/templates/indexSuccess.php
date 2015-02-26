<h1> <?= __('Форма восстановления пароля') ?></h1>


<form method="post" class="form_style" action="<?php echo url_for('lostpassword/index') ?>">

<?php echo $form ?>

   

   <div class="row input_but" align="center">
		<input class="but" type="submit" value="<?= __('Выслать пароль на email') ?>" />
   </div>


</form>