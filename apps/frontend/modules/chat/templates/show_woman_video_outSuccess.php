
<?php if(isset($room)):?>
<?php use_helper('Flash');  ?>
<div id="chat_woman_video_out">


                        <?php if(!$room->getAcceptVideo()): ?>
                           <div id="chat_girl_video">
                               <div id="girl_video_off">
                                  <div align="center"><?= image_tag('/images/icons/no_video.jpg') ?></div>
                                  <div align="center" style="color: white"><?= __('Girl`s camera is off') ?></div>
                               </div>
                               <div id="girl_video_on">
                                  <div align="center"><?php echo link_to(image_tag('/images/icons/no_video.jpg'),'chat/mancam?turn=on&r='.$room->getId(),array('confirm'=>__('Вы уверены?'))) ?></div>
                                  <div align="center" style="color: green"><?php echo link_to(__('Show girl`s video'),'chat/mancam?turn=on&r='.$room->getId(),array('confirm'=>__('Вы уверены?'))) ?></div>                                      
                               </div>
                           </div>
                         <?php else: ?>
                             <?php if($chanel): ?>
                                  <?php include_partial('flash_chanel',array('cur_chanel'=>$chanel,'type'=>'out','gender'=>'w'))?>
                                 <div align="center">
                                  <?php echo link_to(__('Turn off girl`s camera'),'chat/mancam?turn=off&r='.$room->getId(),array('style'=>'color: white','confirm'=>__('Вы уверены?'))) ?>
                                 </div>
                              <?php else: ?>
                               <div id="girl_video_off">
                                  <div align="center"><?= image_tag('/images/icons/no_video.jpg') ?></div>
                                  <div align="center" style="color: white"><?= __('Girl`s camera is off') ?></div>
                               </div>
                              <?php endif ?>
                          <?php endif ?>

</div>

<script>
  <?php if($chanel): ?>
        $('#girl_video_on').show();
        $('#girl_video_off').hide();
      <?php else: ?>
        $('#girl_video_off').show();
        $('#girl_video_on').hide();
   <?php endif; ?>
</script>

<?php else: ?>
  <div align="center"><?= image_tag('/images/icons/no_video.jpg') ?></div>
  <div align="center" style="color: white"><?= __('Комната неопределена') ?></div>
<?php endif; ?>


