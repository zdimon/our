<?php include_partial('global/assets') ?>
<?= link_to(__('Go to list'),'staff/index') ?>
<h1> <?= __('Creating user') ?></h1>

<?php include_partial('form',array('form'=>$form)) ?>