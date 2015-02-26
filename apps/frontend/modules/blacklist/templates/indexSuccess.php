<h1><?= __('My blacklist') ?></h1>
<?php include_partial('menu')?>

    <?php if(!$pager->getNbResults()):?>
        <div class="alert_error" align="center">
          <?= __('No data')  ?>
        </div>
    <?php else: ?>



<table class="table3" width="100%" border="0" cellspacing="0" cellpadding="0">
  <thead>
    <tr>
        <th width="1%"><?= __('Фото') ?></th>
        <th><?= __('Информация') ?></th>
        <th width="130"><?= __('Действия') ?></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($pager->getResults() as $i): ?>
    <tr>
      
      <td><?php include_partial('global/common/user_info',array('arrc'=>$arrc,'arrl'=>$arrl,'profile'=>$i->getBlack()->getProfile()))?></td>
      <td>
           <?= link_to(__('Delete'),'blacklist/del?id='.$i->getId(),array('confirm'=>__('Are you sure?')))  ?><br />
           

      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<div class="table_bot"></div>

<?php endif ?>


