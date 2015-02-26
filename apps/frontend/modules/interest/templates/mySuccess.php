    <h1> <?= __('My interesting') ?></h1>
    <?php include_partial('interest/menu')?>
    <?php if(!$pager->getNbResults()):?>
        <?= __('Nobody was interested to you')  ?>
    <?php else: ?>
    <table class="table3" width="100%" border="0" cellspacing="0" cellpadding="0">
      <tbody>
        <?php foreach ($pager->getResults() as $i): ?>
        <tr>

          <td>
              <?php include_partial('global/common/user_info',array('arrc'=>$arrc,'arrl'=>$arrl,'profile'=>$i->getInterest()->getProfile()))?></td>
          <td>
              <?php include_partial('global/common/user_actions',array('u'=>$i->getInterest())); ?>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
        <tr>
            <th colspan="2" align="center">
                <?php echo pager_navigation($pager, url_for('interest/my'),array('alias')) ?>
            </th>
        </tr>
    </table>
    <div class="table_bot"></div>
    <?php endif ?>

