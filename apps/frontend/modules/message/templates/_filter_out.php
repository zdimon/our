<div style="float: right;">
  <?php if($_SESSION['filter']=='all'):?>
    <span style="color: red"> <?= __('All') ?></span>
  <?php else: ?>
    <?= link_to(__('All'),'message/out?f=all')?>
  <?php endif; ?>

    <?php if($_SESSION['filter']=='unread'):?>
      <span style="color: red"> <?= __('Unread') ?></span>
    <?php else: ?>
      <?= link_to(__('Unread'),'message/out?f=unread')?>
    <?php endif; ?>

    <?php if($_SESSION['filter']=='read'):?>
      <span style="color: red"> <?= __('Read') ?></span>
    <?php else: ?>
      <?= link_to(__('Read'),'message/out?f=read')?>
    <?php endif; ?>





</div>