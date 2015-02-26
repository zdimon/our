<h1><?php echo __('Favorites') ?></h1>
<?php include_partial('friend/menu')?>

<?php if(!$pager->getNbResults()):?>
<div class="alert_error" align="center">
    <?= __('No data')  ?>
</div>
<?php else: ?>

<table class="table3" width="100%" border="0" cellspacing="0" cellpadding="0">
    <tbody>
        <?php foreach ($pager->getResults() as $friend): ?>
    <tr>
        <td>
            <?= include_partial('global/common/user_info',array('profile'=>$friend->getFriend()->getProfile(),'arrc'=>$arrc,'arrl'=>$arrl)) ?>
        </td>
        <td >
            <ul class="list_user_actions">
                <li>   <?= link_to(__('Послать сообщение'),'message/send?username='.$friend->getFriend()->getUsername(),array('id'=>'l_send_message'))  ?>  </li>
                <li>   <?php echo link_to(__('Удалить'),'friend/del?id='.$friend->getId(),array('confirm'=>__('Вы уверены?'))) ?>                           </li>
            </ul>
        </td>
    </tr>
        <?php endforeach; ?>
    </tbody>
    <tr>
        <th colspan="2" align="center">
            <?php echo pager_navigation($pager, url_for('friend/index'),array('alias')) ?>
        </th>
    </tr>
</table>

<?php endif ?>


