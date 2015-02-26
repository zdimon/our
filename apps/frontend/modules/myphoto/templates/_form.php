<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<div class="photo_form">
    <form  class="form_style" action="<?php echo url_for('myphoto/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
    <?php if (!$form->getObject()->isNew()): ?>
    <input type="hidden" name="sf_method" value="put" />
    <?php endif; ?>
          <?php echo $form ?>
           <div class="row input_but" align="center">
                    <input class="but" type="submit" value="<?php echo __('Загрузить') ?>" />
                    <?php if($step2): ?>
                       <?php // echo link_to(__('Skip this step'),'myvideo/index?step3=true') ?>
                    <?php endif; ?>
           </div>
    </form>
</div>
