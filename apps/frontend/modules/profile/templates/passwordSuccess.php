<div align="center">
    <h1> <?= __('Change password') ?></h1>

<form class="form_style"  action="<?php echo url_for('profile/password') ?>" method="POST">

	<?php echo $form ?>

    <div class="row input_but" align="center">
		<input class="but" type="submit" value="<?php echo __('Change') ?>" />
   </div>

</form>

</div>
