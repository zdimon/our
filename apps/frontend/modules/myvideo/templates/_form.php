<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>


<div class="video_form">
    <form  class="form_style" action="<?php echo url_for('myvideo/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
    <?php if (!$form->getObject()->isNew()): ?>
    <input type="hidden" name="sf_method" value="put" />
    <?php endif; ?>

          <?php echo $form ?>
           <div style="float: right;">
                    <input class="but" type="submit" value="<?php echo __('Download video') ?>" />
           </div>
    </form>
</div>
    <div style="clear: both"></div>
