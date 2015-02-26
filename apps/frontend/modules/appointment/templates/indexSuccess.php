    <h1> <?= __('Chat invitations') ?></h1>
    <?php include_partial('appointment/menu')?>
    <?php if(!$pager->getNbResults()):?>
        <?= __('Nobody invite you')  ?>
    <?php else: ?>
    <table class="table3" width="100%" border="0" cellspacing="0" cellpadding="0">
      <tbody>
        <?php foreach ($pager->getResults() as $i): ?>
        <tr>
          <td><?php include_partial('global/common/user_info',array('arrc'=>$arrc,'arrl'=>$arrl,'profile'=>$i->getGirl()->getProfile()))?></td>
          <td align="center">
              <p style="color: white; font-size: 12px; font-weight: bold"> <?= __('This user is invited to chat on') ?>: </p>
              <p style="color: white; font-size: 12px; font-weight: bold"> <?= format_date($i->getDate(),'f') ?> </p>
              <p style="color: white; font-size: 12px; font-weight: bold"> <?= __('Status of the invitation') ?>: <?= $i->getStatusStr() ?> </p>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
        <tr>
            <th colspan="2" align="center">
                <?php echo pager_navigation($pager, url_for('interest/index'),array('alias')) ?>
            </th>
        </tr>
    </table>
    <?php endif ?>

