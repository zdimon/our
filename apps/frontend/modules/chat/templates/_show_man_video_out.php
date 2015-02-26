    <?php if($cur_chanel):?>
                  <?php include_partial('flash_chanel',array('cur_chanel'=>$cur_chanel,'type'=>'out','gender'=>'m'))?>
    <?php else: ?>
        <?php if(isset($_SESSION['current_room_id'])):?>
           <div id="man_video_off">
              <div align="center"><?= image_tag('/images/icons/no_video.jpg') ?></div>
              <div align="center" id="man_out_camera_label_<?= $_SESSION['current_room_id'] ?>"><?= __('Man`s camera is off') ?></div>
           </div>
        <?php endif; ?>

    <?php endif; ?>
