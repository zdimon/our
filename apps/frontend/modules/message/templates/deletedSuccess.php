<h1><?php echo __('Удаленные сообщения') ?></h1>
<p><?= __('deleted text') ?></p>
<?php include_partial('message/menu')?>

<?php if(!$pager->getNbResults()):?>
        <div class="alert_error" align="center">
            <?= __('No data')  ?>
        </div>
<?php else: ?>

        <table class="table3" width="100%" border="0" cellspacing="0" cellpadding="0">
          <thead>
            <tr>
              <th><?php echo __('Автор') ?></th>
              <th><?php echo __('Содержание') ?></th>
              <th><?php echo __('Дата') ?></th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($pager->getResults() as $message): ?>
            <tr>
              <td><?php echo link_to($message->getToUser(),'profile/show?username='.$message->getToUser()) ?></td>
              <td> <?php echo $message->getLinkTitle() ?></td>
              <td><?php echo format_date($message->getCreatedAt(),'D') ?></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>

        <?php echo pager_navigation($pager, url_for('message/deleted'),array('alias')) ?>

<?php endif; ?>