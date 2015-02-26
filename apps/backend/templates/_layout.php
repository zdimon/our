<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
  </head>
    <body >
  
  
    <div id="wrapper">
	
	
        <table width="100%">
            <tr>
                <td colspan="2">
                    <?php if ($sf_user->isAuthenticated()): ?>
                 
                    <div style="display: inline-block; float: left; width: 200px">
                        <a style="display: block; width: 150px" href="<?=  url_for('@homepage') ?>" id="dialog_link" class="ui-state-default ui-corner-all"><span class="ui-icon ui-icon-person" ></span><span ><?= $sf_user->getGuardUser() ?> <?= sfConfig::get('app_site_name')?></span></a>

                    </div>
                         <?php if($sf_user->hasCredential('partner')):?>
                          <div style="display: inline-block; float: left; width: 400px">
                            <a href="<?=  url_for('user/new') ?>" id="dialog_link" class="ui-state-default ui-corner-all"><span class="ui-icon ui-icon-plus"></span><?= __('добавить анкету') ?></a>

                          </div>
                        <?php endif ?>
                    <div style="float: right">
                     
                        <a  style="display: block; width: 100px" href="<?=  url_for('@sf_guard_signout') ?>" id="dialog_link" class="ui-state-default ui-corner-all"><span class="ui-icon ui-icon-power"></span><?= __('Выход') ?></a>
                    </div>
                    <div style="float: right; padding: 3px">
                        <?php if(sfContext::getInstance()->getUser()->getCulture()=='en'):?>
                        <a href="<?=  url_for('lang/index?l=ru') ?>" id="dialog_link" class="ui-state-default ui-corner-all"><span class="ui-icon ui-icon-flag"></span><?= __('Русский') ?></a>
                        <?php endif ?>

                        <?php if(sfContext::getInstance()->getUser()->getCulture()=='ru'):?>
                        <a href="<?=  url_for('lang/index?l=en') ?>" id="dialog_link" class="ui-state-default ui-corner-all"><span class="ui-icon ui-icon-flag"></span><?= __('Английский') ?></a>
                        <?php endif ?>
                     
                    </div>
                    <?php endif ?>
                </td>
            </tr>
            <tr>
                <td valign="top" style="vertical-align: top" width="150">
            
       <?php if ($sf_user->isAuthenticated()): ?>
       
        <br />


           
        <ul class="menu_link">





           <li><a style="display: block; width: 150px" href="<?=  url_for('settings/index') ?>" id="dialog_link" class="ui-state-default ui-corner-all"><span class="ui-icon ui-icon-circle-check"></span><?php echo __('Настройки') ?></a></li>
           <li><a style="display: block; width: 150px" href="<?=  url_for('service/index') ?>" id="dialog_link" class="ui-state-default ui-corner-all"><span class="ui-icon ui-icon-gear"></span><?= __('Услуги') ?></a></li>
           <li><a  style="display: block; width: 150px" href="<?=  url_for('page/index') ?>" id="dialog_link" class="ui-state-default ui-corner-all"><span class="ui-icon ui-icon-document"></span><?= __('Страницы') ?></a></li>
           <li><a  style="display: block; width: 150px" href="<?=  url_for('notify/index') ?>" id="dialog_link" class="ui-state-default ui-corner-all"><span class="ui-icon ui-icon-notice"></span><?= __('Уведомления') ?></a></li>
           <li><a style="display: block; width: 150px" href="<?=  url_for('user/index') ?>" id="dialog_link" class="ui-state-default ui-corner-all"><span class="ui-icon ui-icon-contact"></span><?php echo __('Анкеты') ?></a></li>
           <li><a style="display: block; width: 150px" href="<?=  url_for('guarduser/index') ?>" id="dialog_link" class="ui-state-default ui-corner-all ui-state-hover"><span class="ui-icon ui-icon-person"></span><?= __('Пользователи') ?></a></li>
           <li><a style="display: block; width: 150px" href="<?=  url_for('photo/filterOnapprove') ?>" id="dialog_link" class="ui-state-default ui-corner-all"><span class="ui-icon ui-icon-image"></span><?php echo __('Фото') ?></a></li>
           <li><a style="display: block; width: 150px" href="<?=  url_for('video/filterOnapprove') ?>" id="dialog_link" class="ui-state-default ui-corner-all"><span class="ui-icon ui-icon-video"></span><?php echo __('Видео') ?></a></li>
           <li><a style="display: block; width: 150px" href="<?=  url_for('message/index') ?>" id="dialog_link" class="ui-state-default ui-corner-all"><span class="ui-icon ui-icon-mail-closed"></span><?php echo __('Сообщения') ?></a>   </li>
        </ul>
        <?php endif ?>



                     </ul>


                </td>
                <td valign="top" style="vertical-align: top">

	
	<!-- end #menu -->
	
		<div id="content">
			<?php echo $sf_content ?>
		<div style="clear: both;">&nbsp;</div>
		</div>
		<!-- end #content -->
		
		<!-- end #sidebar -->
		<div style="clear: both;">&nbsp;</div>
	
	<!-- end #page -->
                </td>
            </tr>
        </table>
</div>
	<div id="footer">
		<p>Copyright (c) 2012 symfony project V1.4</p>
	</div>
	<!-- end #footer -->


	

	
	
	
		<script type="text/javascript">
					//hover states on the static widgets
				$('#dialog_link, ul#icons li').hover(
					function() { $(this).addClass('ui-state-hover'); }, 
					function() { $(this).removeClass('ui-state-hover'); }
				);
				</script>
				
  </body>
</html>
