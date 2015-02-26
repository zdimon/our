<ul class="menu_1">
    <li><a <?php if($sf_request->getParameter('action')=='index') {echo 'class="cur"';}  ?>  href="<?= url_for('interest/index') ?>"><?= __('Who interested me') ?></a></li>

    <li><a <?php if($sf_request->getParameter('action')=='my') {echo 'class="cur"';}  ?> href="<?= url_for('interest/my') ?>"><?= __('My interesting') ?></a></li>

</ul>