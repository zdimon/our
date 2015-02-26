<ul class="menu_1">
    <li><a <?php if($sf_request->getParameter('action')=='index') {echo 'class="cur"';}  ?>  href="<?= url_for('viewed/index') ?>"><?= __('Who veiwed me') ?></a></li>
    <li><a <?php if($sf_request->getParameter('action')=='my') {echo 'class="cur"';}  ?> href="<?= url_for('viewed/my') ?>"><?= __('Vewed by me') ?></a></li>
</ul>