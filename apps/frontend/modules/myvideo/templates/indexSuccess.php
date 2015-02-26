<div class="inner_page">

    <h1><?= __('My video') ?></h1>

      <div style="color: red; font-weight: bold; text-align: center" > <?= __('Your video file might be only in FLV format!') ?></div>

 <?php include_partial('form', array('form' => $form)) ?>


	
    <?php if(count($videos)>0):?>
    <table class="table3" width="100%" border="0" cellspacing="0" cellpadding="0">
          <thead>
            <tr>
              <th><?= __('Video') ?></th>
              <th><?= __('Information') ?></th>
              <th><?= __('Actions') ?></th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($videos as $video): ?>
            <tr>
              <td style="padding-top: 10px; padding-bottom: 10px">
                <?php if($video->getIsConvert()):?>
                    <?php

                   echo jq_link_to_remote(image_tag('/images/icons/no_video.jpg'),
                       array(
                           'update' => 'private_video'.$video->getId(),
                           'loading' => '$("#private_video_loading'.$video->getId().'").show();',
                           'complete' => '$("#private_video_loading'.$video->getId().'").hide();',
                           'script'=>true,
                           'method'=>'GET',
                           'url' => 'myvideo/show?id='.$video->getId()
                       ));

                  ?>
                  <?php else: ?>
                    <?= image_tag('/images/video.png') ?>
                  <?php endif ?>
              </td>
              <td valign="top">
                  <?php if(!$video->getPub()):?>
                    <?= __('Статус') ?>: <?= __('waiting activation')?> <br />
                  <?php else: ?>
                    <?= __('Статус') ?>: <?= __('activate')?><br />

                  <?php endif ?>

              </td>
              <td valign="top">
                      <div id="private_video<?= $video->getId()?>">

                      </div>
                      <div style="display: none;" class="loading" id="private_video_loading<?= $video->getId() ?>"> <?= __('Loading...') ?></div>
                 <?php if($video->getIsConvert()):?>
                  <?php
                             echo jq_link_to_remote(__('Show video'),
                               array(
                                            'update' => 'private_video'.$video->getId(),
                                            'loading' => '$("#private_video_loading'.$video->getId().'").show();',
                                            'complete' => '$("#private_video_loading'.$video->getId().'").hide();',
                                            'script'=>true,
                                            'method'=>'GET',
                                            'url' => 'myvideo/show?id='.$video->getId()
                               ));
                         

                  ?>
                 
                  <?php endif ?>
                   <?= link_to(__('Delete video'),'myvideo/del?id='.$video->getId(),array('confirm'=>__('Are you shure?'))); ?>
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
    <?php else: ?>
        <h2> <?= __('you have no video') ?></h2>
    <?php endif; ?>
    <div class="table_bot"></div>

     
</div>


<?php if ($sf_user->isAuthenticated() and !$sf_user->getGuardUser()->getProfile()->getIsActive()): ?>
<div align="center">
    <?= link_to(__('Finish registration'),'registration/finish',array('class'=>'but')) ?>
</div>
<?php endif; ?>