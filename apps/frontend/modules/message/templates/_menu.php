<ul class="menu_1">
    <li><a <?php if($sf_request->getParameter('action')=='personal') {echo 'class="cur"';}  ?>  href="<?= url_for('message/personal') ?>"><?= __('Correspondents') ?></a></li>
    <li><a <?php if($sf_request->getParameter('action')=='index') {echo 'class="cur"';}  ?> href="<?= url_for('message/index') ?>"><?= __('Inbox') ?></a></li>
    <li><a <?php if($sf_request->getParameter('action')=='out') {echo 'class="cur"';}  ?> href="<?= url_for('message/out') ?>"><?= __('Outbox') ?></a></li>
    <li><a <?php if($sf_request->getParameter('action')=='deleted') {echo 'class="cur"';}  ?> href="<?= url_for('message/deleted') ?>"><?= __('Delete') ?></a></li>
    <li><a <?php if($sf_request->getParameter('action')=='draft') {echo 'class="cur"';}  ?> href="<?= url_for('message/draft') ?>"><?= __('Drafts') ?></a></li>
    <li style="width: 20px"></li>


</ul>