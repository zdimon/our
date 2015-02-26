
<div id="chat_woman_video_out">


                        <?php if(!$room->getAcceptVideo()): ?>
                           <div id="chat_girl_video">
                               <div id="girl_video_off">
                                   <?= image_tag('/images/icons/video_off.gif') ?>
                                   <?= __('Woman`s camera is off') ?>
                               </div>
                               <div id="girl_video_on">
                                   <?php echo link_to(image_tag('/images/icons/video_on.gif'),'chat/mancam?turn=on&r='.$room->getId(),array('confirm'=>__('Вы уверены?'))) ?>
                                   <?php echo link_to(__('Show girl`s video'),'chat/mancam?turn=on&r='.$room->getId(),array('confirm'=>__('Вы уверены?'))) ?>
                               </div>
                           </div>
                         <?php else: ?>
                             <?php if($chanel): ?>
                                 <?php include_partial('flash_chanel',array('cur_chanel'=>$chanel,'type'=>'out','gender'=>'w'))?>
                                 <?php echo link_to(__('Turn off girl`s camera'),'chat/mancam?turn=off&r='.$room->getId(),array('confirm'=>__('Вы уверены?'))) ?>
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



