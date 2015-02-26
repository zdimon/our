<div style="float: right">
    <?php if(sfContext::getInstance()->getUser()->getCulture()=='en'):?>
    <a href="<?=  url_for('lang/index?l=ru') ?>" id="dialog_link" class="ui-state-default ui-corner-all"><span class="ui-icon ui-icon-flag"></span><?= __('Русский') ?></a>

    <?php endif ?>

    <?php if(sfContext::getInstance()->getUser()->getCulture()=='ru'):?>
    <a href="<?=  url_for('lang/index?l=en') ?>" id="dialog_link" class="ui-state-default ui-corner-all"><span class="ui-icon ui-icon-flag"></span><?= __('Английский') ?></a>

    <?php endif ?>
</div>



		
		

               