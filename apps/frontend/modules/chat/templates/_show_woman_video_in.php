<div id="chat_woman_video_in">



    <table  width="100%">
        <tr>
            <td>
                 <?php if($cur_chanel):?>
                <?php include_partial('flash_chanel',array('cur_chanel'=>$cur_chanel,'type'=>'in','gender'=>'w'))?>
                <div></div>
                         <?php echo link_to(__('Turn off your camera'),'chat/woman_video_in?turn=off') ?>
                  <?php else: ?>
                  <div id="girl_camera_off">
                      <div align="center"><?= link_to(image_tag('/images/icons/no_video.jpg'),'chat/woman_video_in?turn=on')  ?></div>
                      <div></div>
                      <div align="center"><?php echo link_to(__('Turn on your camera'),'chat/woman_video_in?turn=on',array('class'=>'but')) ?></div>
                   </div>
                  <?php endif; ?>
            </td>
            <!--
            <td>
                <?php foreach($ch as $c): ?>
                   <?= __('Канал #').$c->getId().': '.$c->getStatus() ?> <br />
                <?php endforeach; ?>
            </td>
            -->
        </tr>
    </table>

</div>
