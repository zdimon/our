<?php use_helper('I18N', 'Date') ?>
<?php include_partial('trprofile/assets') ?>

<div id="sf_admin_container" class="sf_admin_edit ui-widget ui-widget-content ui-corner-all">
  <div class="fg-toolbar ui-widget-header ui-corner-all">
    <h1><?php echo __('Translate', array(), 'messages') ?> 
            <?= link_to(__('Edit profile'),'user/edit?id='.$profile->getUserId(),array('style'=>'color: black; display: inline-block; padding: 2px','class'=>'ui-state-default ui-corner-all')) ?> 
            <?= link_to(__('Photo'),'profile/addphoto?id='.$profile->getUserId(),array('style'=>'color: black; display: inline-block; padding: 2px','class'=>'ui-state-default ui-corner-all')) ?>
            <?= link_to(__('Show profile'),'profile/show?id='.$profile->getUserId(),array('style'=>'color: black; display: inline-block; padding: 2px','class'=>'ui-state-default ui-corner-all')) ?>
    </h1>
  </div>

  <?php include_partial('trprofile/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('trprofile/form_header', array('profile' => $profile, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('trprofile/form', array('profile' => $profile, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('trprofile/form_footer', array('profile' => $profile, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <?php include_partial('trprofile/themeswitcher') ?>
</div>
