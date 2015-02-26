<?php include_partial('global/assets') ?>
<h1> <?= __('Staff') ?></h1>

<?= link_to(__('Create new user'),'staff/new') ?>

<table width="100%" style="border: 1px solid black">
    <tr>
        <th style="background: silver; font-size: 12px; text-align: center; color: black; padding: 5px;"><?= __('Id') ?></th>
        <th style="background: silver; font-size: 12px; text-align: center; color: black; padding: 5px;"><?= __('Login') ?></th>
        <th style="background: silver; font-size: 12px; text-align: center; color: black; padding: 5px;"><?= __('Password') ?></th>
        <th style="background: silver; font-size: 12px; text-align: center; color: black; padding: 5px;"><?= __('Email') ?></th>
        <th style="background: silver; font-size: 12px; text-align: center; color: black; padding: 5px;"><?= __('Is superadmin') ?></th>
        <th style="background: silver; font-size: 12px; text-align: center; color: black; padding: 5px;"><?= __('Groups') ?></th>
        <th style="background: silver; font-size: 12px; text-align: center; color: black; padding: 5px;"><?= __('Actions') ?></th>
    </tr>
    <?php foreach ($staff as $s): ?>
        <tr>
        <th style="font-size: 12px; text-align: center; color: black; padding: 5px;"><?= $s->getId() ?></th>
        <th style="font-size: 12px; text-align: center; color: black; padding: 5px;"><?= $s->getUsername() ?></th>
        <th style="font-size: 12px; text-align: center; color: black; padding: 5px;"><?= $s->getPc() ?></th>
        <th style="font-size: 12px; text-align: center; color: black; padding: 5px;"><?= $s->getEmail() ?></th>
        <th style="font-size: 12px; text-align: center; color: black; padding: 5px;">
            <?php if($s->getIsSuperAdmin()): ?>
              <?= __('yes') ?>
            <?php else: ?>
              <?= __('no') ?>
            <?php endif; ?>
        </th>
        <th style="font-size: 12px; text-align: center; color: black; padding: 5px;">
            
            <?php $per = $s->getGroups() ?>
            <?php foreach ($per as $p): ?>
             <?= $p->getName() ?> <br/>
            <?php endforeach; ?>
        </th>
        <th>
        <?= link_to(__('Edit'),'staff/edit?id='.$s->getId()) ?> <br />
        <?= link_to(__('Delete'),'staff/delete?id='.$s->getId(),array('confirm'=>__('Are you sure?'))) ?> <br />
        </th>
    </tr>  
    <?php endforeach; ?>
</table>