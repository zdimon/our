<?php use_helper('I18N') ?>

<form class="form_style" action="<?php echo url_for('@sf_guard_signin') ?>" method="post">

      <?php echo $form ?>
  
             <div class="row input_but" align="center">
		<input class="but_style" type="submit" value="<?php echo __('Signin') ?>" />
             </div>
        
</form>