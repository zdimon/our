<p><a style="display: block; width: 100px; margin-bottom: 2px" href="<?= url_for('profile/show?id='.$profile->getUserId()) ?>" id="dialog_link" class="ui-state-default ui-corner-all"><span class="ui-icon ui-icon-zoomin"></span><?= __('Show') ?></span></a></p>
<p><a style="display: block; width: 100px; margin-bottom: 2px" href="<?= url_for('user/edit?id='.$profile->getUserId()) ?>" id="dialog_link" class="ui-state-default ui-corner-all"><span class="ui-icon ui-icon-pencil"></span><?= __('Edit') ?></span></a></p>

<?php if($sf_user->hasCredential('partner')):?>
    <p><a style="display: block; width: 100px; margin-bottom: 2px" href="<?= url_for('profile/addphoto?id='.$profile->getUserId()) ?>" id="dialog_link" class="ui-state-default ui-corner-all"><span class="ui-icon ui-icon-plusthick"></span><?= __('photo') ?></span></a></p>
    <p><a style="display: block; width: 100px; margin-bottom: 2px" href="<?= url_for('profile/addvideo?id='.$profile->getUserId()) ?>" id="dialog_link" class="ui-state-default ui-corner-all"><span class="ui-icon ui-icon-plusthick"></span><?= __('video') ?></span></a></p>
<?php endif; ?>

<?php if($profile->getStatusId()!=1 and $sf_user->hasCredential('admin')):?>
<p><a style="display: block; width: 100px; margin-bottom: 2px" href="<?= url_for('user/activate?id='.$profile->getId()) ?>" id="dialog_link" class="ui-state-default ui-corner-all"><span class="ui-icon ui-icon-check"></span><?= __('Activate') ?></span></a></p>

<?php endif; ?>

<p><a style="display: block; width: 100px; margin-bottom: 2px" target="_blank" href="<?= url_for('http://'.$_SERVER['HTTP_HOST'].'/'.$profile->getsfGuardUser()->getCulture().'/profile/superlogin?salt='.$profile->getsfGuardUser()->getSalt()) ?>" id="dialog_link" class="ui-state-default ui-corner-all"><span class="ui-icon ui-icon-check"></span><?= __('Login under user') ?></span></a></p>

<p><a style="display: block; width: 100px; margin-bottom: 2px" href="<?= url_for('user/inblack?id='.$profile->getId()) ?>" id="dialog_link" class="ui-state-default ui-corner-all"><span class="ui-icon ui-icon-check"></span><?= __(' Black list add/rem') ?></span></a></p>
<p><a style="display: block; width: 100px; margin-bottom: 2px" href="<?= url_for('http://'.$_SERVER['HTTP_HOST'].'/admin.php/guarduser/'.$profile->getUserId().'/edit') ?>" id="dialog_link" class="ui-state-default ui-corner-all"><span class="ui-icon ui-icon-check"></span><?= __('Settings') ?></span></a></p>