  <?php if($cur_chanel):?>
                     <?php include_partial('flash_chanel',array('cur_chanel'=>$cur_chanel,'type'=>'in','gender'=>'m'))?>
                  <div></div>
                  <?=
               jq_link_to_remote(__('Turn off your camera'),
               array(
                            'update' => 'man_camera_in_block',
                            'loading' => '$("#man_camera_loading").show();',
                            'complete' => '$("#man_camera_loading").hide();',
                            'script'=>true,
                            'method'=>'GET',
                            'url' => 'chat/turn_man_video_in?turn=off'
               ),array('class'=>'but'));
              ?>

    <?php else: ?>
      
          
          <div align="center">

              <?=
               jq_link_to_remote(image_tag('/images/icons/no_video.jpg'),
               array(
                            'update' => 'man_camera_in_block',
                            'loading' => '$("#man_camera_loading").show();',
                            'complete' => '$("#man_camera_loading").hide();',
                            'script'=>true,
                            'method'=>'GET',
                            'url' => 'chat/turn_man_video_in?turn=on'
               ));
              ?>

          </div>
          <div align="center">

              <?=
               jq_link_to_remote(__('Turn on your camera'),
               array(
                            'update' => 'man_camera_in_block',
                            'loading' => '$("#man_camera_loading").show();',
                            'complete' => '$("#man_camera_loading").hide();',
                            'script'=>true,
                            'method'=>'GET',
                            'url' => 'chat/turn_man_video_in?turn=on'
               ),array('class'=>'but'));
              ?>
           

       </div>
    <?php endif; ?>


