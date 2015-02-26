<?php use_helper('I18N', 'Date') ?>
<?php include_partial('global/assets') ?>

<div id="sf_admin_container" class="sf_admin_edit ui-widget ui-widget-content ui-corner-all">
  <div class="fg-toolbar ui-widget-header ui-corner-all">
    <h1><?php echo __('Personal information') ?></h1>
  </div>

  <?php include_partial('user/flashes') ?>



  <div id="sf_admin_content">
    <?php include_partial('user/form', array('profile' => $profile, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  

  
</div>
