        <?php if($video->getIsConvert()):?>
            <?php if(file_exists('/uploads/video/thumbnail/'.$video->getFilePath().'.jpeg')):?>
               <?php echo link_to(image_tag('/uploads/video/thumbnail/'.$video->getFilePath().'.jpeg'),'video/show?id='.$video->getId()) ?>
            <?php else:?>
              <?= link_to(image_tag('/images/icons/no_video.jpg') ,'video/show?id='.$video->getId()) ?>
            <?php endif ?>
          <?php else: ?>
            <span style="color: red"><?= __('не обработано') ?></span>
          <?php endif ?>
