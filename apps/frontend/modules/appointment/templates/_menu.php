<ul class="menu_1">
    <li><a <?php if($sf_request->getParameter('action')=='index') {echo 'class="cur"';}  ?>  href="<?= url_for('appointment/index') ?>"><?= __('Whom did I invite') ?></a></li>

    <li><a <?php if($sf_request->getParameter('action')=='my') {echo 'class="cur"';}  ?> href="<?= url_for('appointment/my') ?>"><?= __('Who did invite me') ?></a></li>

</ul>