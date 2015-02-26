<script type="text/javascript" src="/js/smmin.js"></script>
    <?php
     $sound = 'http://'.$_SERVER['HTTP_HOST'].'/js/mak.mp3';
    ?>

    <?php $new_message = $room->getNewMessage($abonent) ?>
<?php if($new_message):?>

    <?php
        $info = '<table><tr><td>'.$abonent->getProfile()->getFullName().'</td></tr><tr><td>&nbsp;ID:&nbsp;'.$abonent->getProfile()->getUserSpecId().'</td></tr><tr><td>&nbsp;'.$abonent->getProfile()->getAge().'</td></tr><tr><td>&nbsp;'.$abonent->getProfile()->getCity().'</td></tr><tr><td>&nbsp;'.$arrc[$abonent->getProfile()->getCountry()].'</td></tr></table>' ;

        ?>

    <script type="text/javascript">

        //start newEnterSite

        var newEnterSite2 = $('.newEnterSite2');
        //setInterval(startFunck, 2000)
        startFunck2();
        function startFunck2(){

            var visItemTitleText = '<?= __('Message') ?>:<b> <?= $new_message->getContent() ?></b>';
            var visItemAttentionText = '';
            var visItemDescrText = '<?= $info ?> <br /> <a class="but" style=" font-size: 14px; color: white" onClick="window.open(\'<?= url_for('chat/approve?r='.$room->getId()) ?>\',\'chatwindow\',\'width=700,height=600\')" href="#" ><?= __('Start chat')?> </a>&nbsp; <br /><a styic_close style="color: red; font-size: 16px" onClick="window.open(\'<?= url_for('chat/reject?r='.$room->getId()) ?>\',\'chatwindow\',\'width=700,height=600\')" href="#" ><?= __('Refuse')?> </a>';
            var visItemPhotoPic = '<a href="<?= url_for('profile/show?username='.$abonent->getUsername())?>" target="_blank"><img src="<?= $abonent->getProfile()->getUrlImageMiddle() ?>"></a>'

            var visItem = $('<div>').addClass('newVisItem').hide();
            var b_close = $('<div>').addClass('ic_close');
            var visItemTitle = $('<div>').html(visItemTitleText).addClass('visItemTitleFav').appendTo(visItem);
            var visItemAttention = $('<div>').html(visItemAttentionText).addClass('visItemAttention').appendTo(visItem);

            var visItemPhoto = $('<div>').html(visItemPhotoPic).addClass('visItemPhoto').appendTo(visItem);
            var visItemDescr = $('<div>').html(visItemDescrText).addClass('visItemDescr').appendTo(visItem);

            visItem.appendTo(newEnterSite2);
            b_close.appendTo(visItemTitle);

            var newVisItem = $('.newVisItem',newEnterSite2);
            var newVisItemHeight = newVisItem.actual('outerHeight');
            newVisItem.css({top:'-'+newVisItemHeight+'px'}).show().animate({top:'0'});

            function newVisItemRemove2(){
                newVisItem.fadeOut(function(){$(this).remove()})
            }
            setTimeout(newVisItemRemove2,100000)


            //   function newVisItemRemove(){
            //      newVisItem.fadeOut(function(){$(this).remove()})
            //   }
            // setTimeout(newVisItemRemove,4000)
        }

        $('.ic_close').live('click',function(){
            $(this).closest('.newVisItem').remove()
            return false
        });

        //end newEnterSite
        soundManager.setup({ url: 'http://<?= $_SERVER['HTTP_HOST'] ?>/soundmanager2.swf'});
       


            soundManager.onready(function() {

           
                soundManager.createSound({
                    id: 'soundm_',
                    url: '<?=$sound?>',
                    volume: 100
                });

                soundManager.play('soundm_');

            });


    
        
    </script>




<?php endif; ?>