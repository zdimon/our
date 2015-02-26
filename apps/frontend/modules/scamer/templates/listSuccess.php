<h1><?= __('Scamer list') ?></h1>



<table class="table3" width="100%" border="0" cellspacing="0" cellpadding="0">
    <tbody>
    <?php foreach ($pager->getResults() as $friend): ?>
    <tr>
        <td>
            <?= include_partial('global/common/user_info',array('profile'=>$friend,'arrc'=>$arrc,'arrl'=>$arrl)) ?>
        </td>
        <td>
            <?php 
              $it = ScamerReportTable::getInstance()->createQuery('a')
                      ->where('a.scamer_id=?',array($friend->getUserId()))
                      ->execute();
            ?>
            <?php foreach ($it as $i): ?>
              <p> <?= $i->getContent(); ?> </p>
            <?php endforeach; ?>
        </td>

    </tr>
        <?php endforeach; ?>
    </tbody>
    <tr>
        <th colspan="2" align="center">
            <?php echo pager_navigation($pager, url_for('scamer/index'),array('alias')) ?>
        </th>
    </tr>
</table>



