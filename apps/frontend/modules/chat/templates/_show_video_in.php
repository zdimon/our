

<?php if($room->$meth()):?>
                     <?php include_partial('flash_chanel',array('room'=>$room,'type'=>'in','gender'=>$gender))?>
                  <div></div>
                  <?=
               jq_link_to_remote(__('Turn off your camera'),
               array(
                            'update' => 'chat_video_in',
                            'loading' => '$("#camera_loading").show();',
                            'complete' => '$("#camera_loading").hide();',
                            'script'=>true,
                            'method'=>'GET',
                            'url' => 'chat/turn_video_in?turn=off&gender='.$gender
               ),array('class'=>'but'));
              ?>

    <?php else: ?>
      
          
          <div align="center">

              <?=
               jq_link_to_remote(image_tag('/images/icons/no_video.jpg'),
               array(
                            'update' => 'chat_video_in',
                            'loading' => '$("#camera_loading").show();',
                            'complete' => '$("#camera_loading").hide();',
                            'script'=>true,
                            'method'=>'GET',
                            'url' => 'chat/turn_video_in?turn=on&gender='.$gender
               ));
              ?>

          </div>
          <div align="center">

              <?=
               jq_link_to_remote(__('Turn on your camera'),
               array(
                            'update' => 'chat_video_in',
                            'loading' => '$("#camera_loading").show();',
                            'complete' => '$("#camera_loading").hide();',
                            'script'=>true,
                            'method'=>'GET',
                            'url' => 'chat/turn_video_in?turn=on&gender='.$gender
               ),array('class'=>'but'));
              ?>
           

       </div>
    <?php endif; ?>



