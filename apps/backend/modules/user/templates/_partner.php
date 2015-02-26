
    <br />
    <?php if($profile->getGender()=='w' and $profile->getPartnerId()>0): ?>
     <a target="_blank" href="<?= url_for('partner/show?id='.$profile->getPartnerId()) ?>" id="dialog_link" class="ui-state-default ui-corner-all"><span class="ui-icon ui-icon-contact"></span><?= __('Agency').' ID:'.$profile->getPartnerId() ?></a>
     <?php endif ?>