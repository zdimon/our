
 <?php
     $sound = 'http://'.$_SERVER['HTTP_HOST'].'/js/mak.mp3';
    ?>
<?php  if($new_messages):?>
<?php $rnd = rand(99,99999); ?>
<script>
         soundManager.setup({ url: 'http://<?= $_SERVER['HTTP_HOST'] ?>/soundmanager2.swf'});
          soundManager.onready(function() {

             soundManager.createSound({
              id: 'sound_new<?= $rnd ?>',
              url: '<?=$sound?>',
              volume: 100
            });

             soundManager.play('sound_new<?= $rnd ?>');

        });
</script>
<?php  endif; ?>



<?php if($messages): ?>

<?php foreach($messages as $m):?>

                          <div class="chat_message_item">
                              <?php
                                if($m->getUser()->getGender()=='m')
                                {
                                    $color = 'blue';
                                }
                                else
                                {
                                    $color = 'red';
                                }
                              ?>
                              <i><?= $m->getUser()->getRealName() ?> :</i> <b style="color: <?=$color?>"><?= nl2br($m->getText()) ?></b>
                              <span class="chat_time"> <?= format_date($m->getCreatedAt(),'t')?></span>
                          </div>

<?php endforeach; ?>


<?php endif ?>
<div id="new_message" class="chat_message_item"> </div>



<?php if($sf_user->getGuardUser()->getGender()=='m'): ?>
<?php $str = sprintf("%01.2f", $sf_user->getGuardUser()->getAccount())?>
<script>

        <?php if($sf_user->getGuardUser()->getAccount()<=0 and $sf_user->getGuardUser()->getProfile()->getPacketId()<4):?>
           window.location.href = "http://<?= $_SERVER['HTTP_HOST'] ?>/<?= $sf_user->getCulture()?>/chat/nocredit";
        <?php else: ?>

    $('#chat_account').empty();
    $('#chat_account').html('<?= $str?>');
        <?php endif; ?>

///// Показываем включатель камеры девки

      <?php if($room->getWithVideo() or $room->getWithManVideo() ): ?>
          $('#turn_video').show();
      <?php else: ?>
          $('#turn_video').hide();
      <?php endif; ?>
       
         
          
          

</script>
<?php endif; ?>






<script>
<?php if($new_message):?>



  <?php foreach($new_message as $m):?>
    <?= "$('#contact_room_".$m->getRoomId()."').show();" ?>
         soundManager.setup({ url: 'http://<?= $_SERVER['HTTP_HOST'] ?>/soundmanager2.swf'});
          soundManager.onready(function() {
             
             soundManager.createSound({
              id: 'sound_<?= $m->getRoomId() ?>',
              url: '<?=$sound?>',
              volume: 100
            });

           //  soundManager.play('sound_<?= $m->getRoomId() ?>');

        });
        
  <?php endforeach; ?>


<?php endif; ?>
    $('#chat_message_box').scrollTo('max');
</script>
