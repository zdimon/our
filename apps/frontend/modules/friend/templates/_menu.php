<ul class="menu_1">
    <li><a <?php if($sf_request->getParameter('action')=='index') {echo 'class="cur"';}  ?>  href="<?= url_for('friend/index') ?>"><?= __('My favorites') ?></a></li>
    <li><a <?php if($sf_request->getParameter('action')=='my') {echo 'class="cur"';}  ?> href="<?= url_for('friend/my') ?>"><?= __('Who added me') ?></a></li>
    <
</ul>