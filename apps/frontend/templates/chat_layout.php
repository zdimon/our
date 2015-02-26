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
    <body>
<div id="wrap">
    	<div id="bg1"></div>
        <div id="bg2"></div>

        <div id="main">
        	<div id="header">
                <?php include_partial('global/common/top_menu')?>
               

            	<a id="logo" href="<?= url_for('@mainpage') ?>"></a>

                <div id="nav_menu">
                	<span id="live"></span>
                	<span id="mails"></span>
                	<span id="gifts"></span>
                	<span id="tour"></span>
                </div>



               <?php  include_partial('global/common/sub_menu')?>

                <?php include_partial('global/common/lang_panel')?>
               

                <a id="support" href="<?= url_for('contact/contactform') ?>">Support 24/7</a>

            </div>

        	<div id="conteiner">
            	<div id="conteiner_bg">
                   <div id="container_content">
                   		<div id="lside">

                                 <div class="ls_block">
                                   <?php if (!$sf_user->isAuthenticated()): ?>
                                    <?php include_partial('global/common/login_form')?>
                                   <?php else: ?>
                                    <?php  include_partial('global/common/user_panel') ?>
                                   <?php endif ?>
                   		</div>


                   		<div class="ls_block">
                                    <img class="ls_block_top" src="/images/ls_block_top.jpg" alt="alt" />
                                    <div class="title"> <?= __('Кто в онлайне') ?></div>
                                    <?php include_component('chat', 'show_online')?>
                                    <img class="ls_block_bot" src="/images/ls_block_bot.jpg" alt="alt" />
                   		</div>


                       


                    

               

                 

                   </div>

                  	 	<div id="content">
                    	<div id="content_bg">
                        	<div id="r_content_bg">

                              
                                <?php if ($sf_user->hasFlash('message')): ?>
                                   <div class="adm_mass att_block">
                                    <a class="icons attention" href="#"></a>
                                    <?php echo $sf_user->getFlash('message') ?>
                                    </div>
                                <?php endif; ?>
                                <?php if ($sf_user->hasFlash('error')): ?>
                                   <div class="adm_mass error_block">
 	                                <a class="icons error" href="#"></a>

                                  <?php echo $sf_user->getFlash('error') ?>
                                  </div>
                                <?php endif ?>

                               <?php echo $sf_content ?>

                                </div>
                        </div>
                    </div>
                   </div>

                    
                    <img id="bot_content" src="/images/bot_content.png" alt="alt" />

           	   </div>
            </div>


        </div>

 	<div id="empty"></div>
</div><!--#wrap-->

<!--#footer-->
<div id="footer">
	<div class="copy">© 2010  «www.databride.com» </div>
	<div class="develop">
       	 <a class="png" title="Разработка сайтов в г.Херсоне" target="_blank" href="http://www.wezom.com.ua"><?= __('Разработка сайта')?> — <span><?= __('web-студия Wezom')?></span></a>
    </div>
   	<div class="counter"><img src="/images/counter.jpg" alt="alt" /></div>

</div><!--#footer-->


  



</body>

</html>
