    <?php if($room->$meth()):?>
 

    <?php include_partial('flash_chanel',array('room'=>$room,'type'=>'out','gender'=>$gender))?>
    <?php else: ?>


           
              <div align="center"><?= image_tag('/images/icons/no_video.jpg') ?></div>
              
              <div id="turn_video">
              
              <div align="center"> 
                  
                                  <?php echo jq_link_to_remote(__('Turn/reload camera.'), array(
                            'update' => 'chat_video_out',
                            'loading' => '$("#chat_video_out").hide();',
                            'complete' => '$("#chat_video_out").show();',
                            'script'=>true,
                            'method'=>'GET',
                            'url' => 'chat/show_video_out'
                        )
                        )
                ?>

              
              </div>
           </div>


    <?php endif; ?>