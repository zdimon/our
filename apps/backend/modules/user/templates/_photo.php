<?=  image_tag($profile->getUrlImageSmall()) ?>

<p><a style="display: block; width: 50px; margin: 2px" target="_blank" href="<?= url_for('user/filterPhoto?id='.$profile->getUserId()) ?>" id="dialog_link" class="ui-state-default ui-corner-all"><span class="ui-icon ui-icon-image"></span><?= __('Photo') ?></span></a></p>
<p><a style="display: block; width: 50px; margin: 2px" target="_blank" href="<?= url_for('user/filterVideo?id='.$profile->getUserId()) ?>" id="dialog_link" class="ui-state-default ui-corner-all"><span class="ui-icon ui-icon-video"></span><?= __('Video') ?></span></a></p>



