<div style="height: 150px; overflow: auto">
<?php if($status): ?>

<?php 
  $m->setIsRead(true);
  $m->save();
  $m->setHotlistactive();
?>
                      <?php if(strlen($m->getImage())>0):?>
                         <p>
                         <?php echo link_to(image_tag('/uploads/message/thumbnail/'.$m->getImage(),array('align'=>'left','style'=>'padding: 5px')),'http://'.$_SERVER['HTTP_HOST'].'/uploads/message/original/'.$m->getImage(),array('class'=>'floatleft')) ?>
                         </p>
                        <?php endif; ?>     
<?= $m->getContent(ESC_RAW) ?>
<?php else: ?>

<div style="border: 1px solid red; padding: 5px;"><?= __('Sorry, but your membership doesnt allow conversation please %1% ',array('%1%'=>link_to(__('buy credit now'),'account/index',array('class'=>'but')))); ?></div>

<?php endif; ?>
</div>