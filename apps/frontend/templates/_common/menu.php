<?php include_partial('global/common/lang_panel')?>

       <?php if ($sf_user->isAuthenticated()): ?>
        <p>
        <a href="<?=  url_for('@homepage') ?>" id="dialog_link" class="ui-state-default ui-corner-all"><span class="ui-icon ui-icon-person"></span><?= $sf_user->getGuardUser() ?></a>


        <a href="<?=  url_for('@sf_guard_signout') ?>" id="dialog_link" class="ui-state-default ui-corner-all"><span class="ui-icon ui-icon-power"></span><?= __('Выход') ?></a>
        </p>
        <?php if($sf_user->hasCredential('redaktor')):?>
           <?= __('Панель редактора') ?>
           <a href="<?=  url_for('page/index') ?>" id="dialog_link" class="ui-state-default ui-corner-all"><span class="ui-icon ui-icon-document"></span><?= __('Страницы') ?></a>
           <a href="<?=  url_for('notify/index') ?>" id="dialog_link" class="ui-state-default ui-corner-all"><span class="ui-icon ui-icon-notice"></span><?= __('Уведомления') ?></a>
           <!--<a href="<?=  url_for('giftcategory/index') ?>" id="dialog_link" class="ui-state-default ui-corner-all"><span class="ui-icon ui-icon-1-e"></span><?= __('Группы подарков') ?></a>-->
           <a href="<?=  url_for('gift/index') ?>" id="dialog_link" class="ui-state-default ui-corner-all"><span class="ui-icon ui-icon-suitcase"></span><?= __('Подарки') ?></a>
           <a href="<?=  url_for('faq/index') ?>" id="dialog_link" class="ui-state-default ui-corner-all"><span class="ui-icon ui-icon-info"></span><?= __('Помощь') ?></a>
        <?php endif ?>


       <br />

          <?php if($sf_user->hasCredential('admin')):?>
        <p>
                           <?= __('Панель админа') ?>
                           <a href="<?=  url_for('user/index') ?>" id="dialog_link" class="ui-state-default ui-corner-all"><span class="ui-icon ui-icon-contact"></span><?php echo __('Анкеты') ?></a>
                           <a href="<?=  url_for('service/index') ?>" id="dialog_link" class="ui-state-default ui-corner-all"><span class="ui-icon ui-icon-check"></span><?= __('Услуги') ?></a>
                           <a href="<?=  url_for('billing/index') ?>" id="dialog_link" class="ui-state-default ui-corner-all"><span class="ui-icon ui-icon-heart"></span><?= __('Биллинг') ?></a>
                           <a href="<?=  url_for('billingtype/index') ?>" id="dialog_link" class="ui-state-default ui-corner-all"><span class="ui-icon ui-icon-heart"></span><?= __('Типы пополнений') ?></a>
                           <!--<a href="<?=  url_for('bantype/index') ?>" id="dialog_link" class="ui-state-default ui-corner-all"><span class="ui-icon ui-icon-heart"></span><?= __('Типы штрафов') ?></a>-->
                           <a href="<?=  url_for('profile_type/index') ?>" id="dialog_link" class="ui-state-default ui-corner-all"><span class="ui-icon ui-icon-heart"></span><?= __('Статусы анкет') ?></a>
                           <!--<a href="<?=  url_for('ban/index') ?>" id="dialog_link" class="ui-state-default ui-corner-all"><span class="ui-icon ui-icon-alert"></span><?= __('Штрафы') ?></a>-->
                           <!--<a href="<?=  url_for('claim/index') ?>" id="dialog_link" class="ui-state-default ui-corner-all"><span class="ui-icon ui-icon-cancel"></span><?= __('Жалобы') ?></a>-->
                           <!--<a href="<?=  url_for('task/index') ?>" id="dialog_link" class="ui-state-default ui-corner-all"><span class="ui-icon ui-icon-clipboard"></span><?= __('Задания') ?></a>-->
        </p>
        <?php endif ?>


          <?php if($sf_user->isSuperAdmin()):?>
        <p>
                           <?= __('Панель суперадминистратора') ?>
                           <a href="<?=  url_for('guarduser/index') ?>" id="dialog_link" class="ui-state-default ui-corner-all ui-state-hover"><span class="ui-icon ui-icon-person"></span><?= __('Пользователи') ?></a>
                           <a href="<?=  url_for('partner/index') ?>"id="dialog_link" class="ui-state-default ui-corner-all"><span class="ui-icon ui-icon-contact"></span><?= __('Партнеры') ?></a>
        </p>
        <?php endif ?>

       <br />

                  <?php if($sf_user->hasCredential('partner')):?>
                      <p>
                        <?= __('Панель партнера') ?>
                        <a href="<?=  url_for('user/index') ?>" id="dialog_link" class="ui-state-default ui-corner-all"><span class="ui-icon ui-icon-contact"></span><?php echo __('Анкеты') ?></a>
                        <a href="<?=  url_for('photo/index') ?>" id="dialog_link" class="ui-state-default ui-corner-all"><span class="ui-icon ui-icon-image"></span><?php echo __('Фото') ?></a>
                        <a href="<?=  url_for('video/index') ?>" id="dialog_link" class="ui-state-default ui-corner-all"><span class="ui-icon ui-icon-video"></span><?php echo __('Видео') ?></a>
                        <a href="<?=  url_for('message/index') ?>" id="dialog_link" class="ui-state-default ui-corner-all"><span class="ui-icon ui-icon-mail-closed"></span><?php echo __('Сообщения') ?></a>
                        <a href="<?=  url_for('payment/index') ?>" id="dialog_link" class="ui-state-default ui-corner-all"><span class="ui-icon ui-icon-circle-check"></span><?php echo __('Платежи') ?></a>
                        <a href="<?=  url_for('giftbox/index') ?>" id="dialog_link" class="ui-state-default ui-corner-all"><span class="ui-icon ui-icon-circle-check"></span><?php echo __('Подаренные подарки') ?></a>
                        <a href="<?=  url_for('fletter/index') ?>" id="dialog_link" class="ui-state-default ui-corner-all"><span class="ui-icon ui-icon-heart"></span><?= __('Первые письма') ?></a>
                     </p>
		  <?php endif ?>
<?php endif ?>