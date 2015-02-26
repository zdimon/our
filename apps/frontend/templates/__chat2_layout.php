<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <meta http-equiv="imagetoolbar" content="no" />
      <title>
        Live chat
      </title>
      <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
      <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>
      <script type="text/javascript" src="/js/swfobject.js"></script>
     <script type="text/javascript" src="/js/sm.js"></script>
     <script type="text/javascript" src="/js/jquery.scrollTo-min.js"></script>
     <link rel="stylesheet" type="text/css" media="screen" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.1/themes/redmond/jquery-ui.css" />


      
      <link type="text/css" rel="stylesheet" href="/css/chat_style.css" />
      <!--[if IE 6]>
         <script src="/js/DD_belatedPNG_0.0.7a-min.js">
         </script>
         <script>
            DD_belatedPNG.fix('.png, img');
         </script>
      <![endif]-->
   </head>
<body >l;;l;l;ll;
                                    <?php if ($sf_user->hasFlash('message')): ?>

                                        <script>
                                        $(function() {

                                                $( "#dialog_message:ui-dialog" ).dialog( "destroy" );

                                                $( "#dialog_message" ).dialog({
                                                        height: 170,
                                                        modal: false
                                                });
                                        });
                                        </script>



                                <div id="dialog_message" title="<?= __('Сообщение') ?>">
                                         <?php echo $sf_user->getFlash('message') ?>
                                </div>

                                <?php endif; ?>
    
<div style="width:1000px; margin:0 auto; position:relative;">
    <div style="height:135px; background:url(/images/chat_header.jpg) 0 0 no-repeat;">
      	<div class="chat_menu_top" style="position:absolute; top:82px; left:300px">
            <a style="color: red" href="<?= url_for('@mainpage')?>"><?= __('На главную') ?></a>
            <a style="color: red" href="<?= url_for('profile/show')?>"><?= __('Мой профиль') ?></a>
            <a style="color: red" href="<?= url_for('search/index')?>"><?= __('Поиск анкет') ?></a>
        </div>
        <div style="font:700 14px/1.2em Tahoma, Geneva, sans-serif; color:#fff; position:absolute; top:111px; left:40px">
            
            <?= $sf_user->getGuardUser()->getProfile()->getRealName()?> [<?= $sf_user->getGuardUser()->getId()?>]
            <?php if($sf_user->getGuardUser()->getGender()=='m'):?>
            <div style="display: none;">
              Credits: <span id="chat_account"><?= $sf_user->getGuardUser()->getAccount()?></span>
            </div>
            <?php endif; ?>
        </div>
        <div style="font:700 14px/1.2em Tahoma, Geneva, sans-serif; color:#fff; position:absolute; top:111px; left:272px" id="statuc_updater">Live Chat</div>
        <div class="chat_video_bg">
            
        	<div id="no_video" class="chat_video_otstup">
                    
                

                
                	        <!-- Подключаем камеру для девушки -->
                                <?php if($sf_user->getGuardUser()->getGender()=='w') include_component('chat','show_woman_video_in')?>
                                <!--   /////////////////////    -->
                                <!-- Подключаем камеру для мужика -->
                                  <?php if($sf_user->getGuardUser()->getGender()=='m'): ?>
                                    <div id="chat_video_out">

                                          <div align="center"><?= image_tag('/images/icons/no_video.jpg') ?></div>
                                          <div align="center" style="color: white"><?= __('Загрузка...') ?></div>

                                    </div>
                                 <?php endif; ?>
                                <!--   /////////////////////    -->
                
               
            </div><!-- .chat_video_otstup-->
        </div><!-- .chat_video_bg-->
    </div>
    <div style="overflow:hidden; padding:7px 0 0 0">
    	<div class="chat_left_coll">
        	<div class="chat_online_mans">
                    <div class="chat_online_scroll" id="user_list">
                         <?php include_component('chat', 'show_online')?>
                    </div><!-- .chat_online_scroll-->
            </div><!-- .chat_online_mans-->
        </div><!-- .chat_left_coll-->
        <div style="float:left; clear:right; width:490px; overflow:hidden">
          <?php echo $sf_content ?>
        </div>
        <div class="chat_right_coll">
       	  <div class="chat_list_id">

      		<div class="chat_id_list" id="chat_id_list">
                           
	        </div><!-- .chat_id_list-->

                <div class="chat_list_id_block" id="chat_with" style="padding-left: 10px">


                <!-- Подключаем входящую камеру  мужика -->
                  <div id="man_camera_loading" class="loading"> <?= __('Загрузка') ?>....</div>
                 <div id="man_camera_in_block">                 
                   <?php if($sf_user->getGuardUser()->getGender()=='m') include_component('chat','show_man_video_in')?>
                 </div>
                <!--   /////////////////////    -->
                <!-- Подключаем выходящую камеру  мужика -->
                 <div id="man_camera_out_block">
                     <?php if($sf_user->getGuardUser()->getGender()=='w') include_component('chat','show_man_video_out')?>
                 </div>
                <!--   /////////////////////    -->

                   <!-- Подключаем активного абонента -->
                   <div id="chat_current_user" style="padding-top: 10px"></div>
                   <!--   /////////////////////    -->

                   <!-- Подключаем контакты -->
                            <div id="chat_contact_list"></div>
                   <!--   /////////////////////    -->

                            
              </div><!-- .chat_list_id_block-->

          </div>
        </div>
    </div>

</div>

<script>

    <?php
     $swf_path = 'http://'.$_SERVER['HTTP_HOST'].'/js/soundmanager2.swf';
     $sound = 'http://'.$_SERVER['HTTP_HOST'].'/js/mak.mp3';
    ?>


        soundManager.url = '<?= $swf_path ?>';
        soundManager.flashVersion = 9; // optional: shiny features (default = 8)
        soundManager.useFlashBlock = false;



</script>

</body>
</html>