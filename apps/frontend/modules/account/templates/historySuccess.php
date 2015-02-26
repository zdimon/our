    <h1> <?= __('Purchase history') ?></h1>

    <?php if(!$pager->getNbResults()):?>
        <div class="alert_message" align="center">
        <?= __('No data')  ?>
        </div>
    <?php else: ?>
    <table class="table3" width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <th><?= __('Date') ?></th>
            <th><?= __('Amount') ?></th>
            <th><?= __('Description') ?></th>
        </tr>
      <tbody>
        <?php foreach ($pager->getResults() as $i): ?>
        <tr>
          <td><?= format_date($i->getCreatedAt(),'f') ?></td>
          <td><?= $i->getSumma() ?></td>
          <td><?= $i->getBillingType() ?></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
        <tr>
            <th colspan="2" align="center">
                <?php echo pager_navigation($pager, url_for('account/history'),array('alias')) ?>
            </th>
        </tr>
    </table>
    <?php endif ?>



    <h1> <?= __('Payment history') ?></h1>

    <?php if(!$pagerp->getNbResults()):?>
    <div class="alert_message" align="center">
        <?= __('No payments')  ?>
    </div>
    <?php else: ?>
    <table class="table3" width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <th><?= __('Date') ?></th>
            <th><?= __('Amount') ?></th>
            <th><?= __('Description') ?></th>
        </tr>
        <tbody>
            <?php foreach ($pagerp->getResults() as $i): ?>
        <tr>
            <td><?= format_date($i->getCreatedAt(),'f') ?></td>
            <td><?= $i->getSumma() ?></td>
            <td><?= $i->getService() ?></td>
        </tr>
            <?php endforeach; ?>
        </tbody>
        <tr>
            <th colspan="2" align="center">
                <?php echo pager_navigation($pager, url_for('account/history'),array('alias')) ?>
            </th>
        </tr>
    </table>
    <?php endif ?>


