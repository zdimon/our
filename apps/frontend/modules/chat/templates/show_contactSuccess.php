<?php
  $room = Doctrine::getTable('Chat2Room')->find($_SESSION['current_room_id']);



       if($room->getAnswerId()!=$sf_user->getGuardUser()->getId())
       {
           $profile = $room->getAnswer()->getProfile();
       }
        else
        {
            $profile = $room->getCaller()->getProfile();
        }


  $arrc = sfCultureInfo::getInstance(sfContext::getInstance()->getUser()->getCulture())->getCountries();
?>
<div align="center"><span class="but_2_wrap block "><span class="but_2 block" ><div style="padding-top: 15px">ID: <?= $profile->getUserSpecId() ?>  <?= $profile->getFullName() ?></div></span></span></div>
<table>
    <tr>
        <td><img src="<?= $profile->getUrlImageMiddle() ?>"></td>
        <td>
            <table style="box-shadow: 4px 4px 4px #2D2721;">
                <tr>
                    <td style="padding:2px; border: 1px solid white"><b><?= __('Age') ?>:</b></td>
                    <td style="padding:2px; border: 1px solid white"><?= $profile->getAge() ?></td>
                </tr>
                <tr>
                    <td style="padding:2px; border: 1px solid white"><b><?= __('Height') ?>:</b></td>
                    <td style="padding:2px; border: 1px solid white"><?= $profile->getHeight() ?></td>
                </tr>
                <tr>
                    <td style="padding:2px; border: 1px solid white"><b><?= __('Weight') ?>:</b></td>
                    <td style="padding:2px; border: 1px solid white"><?= $profile->getWeight() ?></td>
                </tr>
                <tr>
                    <td style="padding:2px; border: 1px solid white"><b><?= __('City') ?>:</b></td>
                    <td style="padding:2px; border: 1px solid white"><?= $profile->getCity() ?></td>
                </tr>
                <tr>
                    <td style="padding:2px; border: 1px solid white"><b><?= __('Country') ?>:</b></td>
                    <td style="padding:2px; border: 1px solid white"><?= $arrc[$profile->getCountry()] ?></td>
                </tr>
            </table>
        </td>
    </tr>
</table>


<div align="center"><span class="but_2_wrap block "><span class="but_2 block"><div style="padding-top: 15px"><?= __('Rooms') ?></div></span></span></div>

<div class="chat_contact">
    <br/>
    <table width="100%">
<?php foreach($contacts as $c): ?>

    
   <?php
     if($c->getAnswerId()==$sf_user->getGuardUser()->getId())
     {
         $abon = $c->getCaller();
     }
     else
     {
         $abon = $c->getAnswer();
     }
   ?>
        <?php if($abon->getId()!=$sf_user->getGuardUser()->getId()): ?>
                <tr>
                <td>
                    <?php if($abon->getIsOnline()):?>
                       <?= image_tag('/images/icons/chat_online.png')?>
                    <?php else: ?>
                        <?= image_tag('/images/icons/chat_offline.png')?>
                    <?php endif; ?>
                </td>
                <td>
                <?=
                   jq_link_to_remote($abon->getProfile()->getRealName(),
                           array(
                                        'update' => 'chat_content',
                                        'loading' => '$("#chat_loading").show();$("#chat_content").hide()',
                                        'complete' => '$("#chat_loading").hide();$("#chat_content").show()',
                                        'script'=>true,
                                        'method'=>'GET',
                                        'url' => 'chat/select_user?u='.$abon->getId()
                           ));
                ?>
                </td>
                <td>
                    <?php if(isset($_SESSION['current_room_id'])):?>

                        <?php if($_SESSION['current_room_id']==$c->getId()): ?>
                          <?= image_tag('/images/icons/chat_inline_write.png')?>
                            <!-- Определяем включена ли исходящая камера мужика у девки -->
                            <?php if($sf_user->getGuardUser()->getGender()=='w' and $c->getWithManVideo()): ?>
                                    <!-- вставляем выходящую камеру мужика девке -->
                                     
                                           <script>
                                            <?php echo jq_remote_function( array(
                                                        'update' => 'man_camera_out_block',
                                                        'loading' => '$("#man_camera_out_block_loading").show();',
                                                        'complete' => '$("#man_camera_out_block_loading").hide();',
                                                        'script'=>true,
                                                        'method'=>'GET',
                                                        'url' => 'chat/show_man_video_out'
                                                    )
                                                    )
                                            ?>
                                            </script>
                           <?php endif; ?>
                                            
                            <?php if($sf_user->getGuardUser()->getGender()=='m' and $c->getWithVideo()): ?>
                                    <!-- вставляем выходящую камеру мужика девке -->
                                     
                                           <script>
                                            <?php echo jq_remote_function( array(
                                                        'update' => 'man_camera_out_block',
                                                        'loading' => '$("#man_camera_out_block_loading").show();',
                                                        'complete' => '$("#man_camera_out_block_loading").hide();',
                                                        'script'=>true,
                                                        'method'=>'GET',
                                                        'url' => 'chat/show_man_video_out'
                                                    )
                                                    )
                                            ?>
                                            </script>
                           <?php endif; ?>                                            
                                            
                                            
                        <?php else: ?>
                          <?= image_tag('/images/icons/chat_offline_write.png')?>
                        <?php endif ?>



                    <?php else: ?>
                        <?= image_tag('/images/icons/new_message.gif')?>
                    <?php endif; ?>
                </td>

                <td>
                    <div id="contact_room_<?= $c->getId()?>" style="display: none">

                        <?= image_tag('/images/icons/new_message.gif')?>

                    </div>
                </td>

            </tr>
         <?php endif ?>



<?php endforeach;?>
    </table>
</div>

