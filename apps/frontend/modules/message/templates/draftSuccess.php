<h1><?php echo __('Черновики') ?></h1>


<p><?= __('draft text') ?></p>
<?php include_partial('message/menu')?>


<?php if(!$pager->getNbResults()):?>
<div class="alert_error" align="center">
    <?= __('No data')  ?>
</div>
<?php else: ?>

<table class="table3" width="100%" border="0" cellspacing="0" cellpadding="0">
    <thead>
    <tr>
        <th><?php echo __('Кому') ?></th>
        <th><?php echo __('Содержание') ?></th>
        <th><?php echo __('Дата') ?></th>
        <th><?php echo __('Действия') ?></th>
    </tr>
    </thead>
    <tbody>
        <?php foreach ($pager->getResults() as $message): ?>
    <tr>
        <td>
            <?= include_partial('global/common/user_info',array('profile'=>$message->getToUser()->getProfile(),'arrc'=>$arrc,'arrl'=>$arrl)) ?>

        </td>
        <td valign="top" style="padding-top: 10px">
            <p><?php echo $message->getContent() ?></p>
        </td>
        <td><?php echo format_date($message->getCreatedAt(),'D') ?></td>
        <td>

            <?php echo link_to(__('Send'),'message/senddraft?id='.$message->getId(),array('title'=>__('Send message'))) ?>

        </td>
    </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php echo pager_navigation($pager, url_for('message/out'),array('alias')) ?>

<?php endif; ?>

