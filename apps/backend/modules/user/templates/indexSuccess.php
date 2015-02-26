<?php use_helper('I18N', 'Date') ?>
<?php include_partial('global/assets') ?>

<div id="sf_admin_container">
  <?php include_partial('user/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('user/list_header', array('pager' => $pager)) ?>

      <form action="<?= url_for('profile/searchm') ?>" method="POST">

          Email:<input type="text" name="email">
          ID:<input type="text" name="id">

          <input type="submit" value="search">

      </form>



  </div>

      <div id="sf_admin_bar ui-helper-hidden" style="display:none">
      <?php include_partial('user/filters', array('form' => $filters, 'configuration' => $configuration)) ?>
    </div>
  
  <div id="sf_admin_content">
          <form action="<?php echo url_for('profile_collection', array('action' => 'batch')) ?>" method="post" id="sf_admin_content_form">
    
      <div class="sf_admin_actions_block floatleft">
          <ul>
      	<?php include_partial('user/list_actions', array('helper' => $helper)) ?>
          </ul>
      </div>

      <?php include_partial('user/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper, 'hasFilters' => $hasFilters)) ?>

      <ul class="sf_admin_actions">
        <?php include_partial('user/list_batch_actions', array('helper' => $helper)) ?>
      </ul>

          </form>
      </div>

  <div id="sf_admin_footer">
    <?php include_partial('user/list_footer', array('pager' => $pager)) ?>
  </div>

  <?php include_partial('user/themeswitcher') ?>
</div>

    <?= __('man') ?>
    <?= __('woman') ?>