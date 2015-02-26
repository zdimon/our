
   
<?php if(isset($message_error)): ?>
<div id="dialog_private_photo" title="<?= __('Ошибка') ?>">
    <div align="center">
     <?= $message_error ?>
    </div>
</div>
 <script type="text/javascript">
            $( "#dialog_private_photo" ).dialog( "destroy" );

            $( "#dialog_private_photo" ).dialog({
                    height: 200,
                    width:  330,
                    modal: true
            });
 </script>
<?php else:?>

  <div id="dialog_private_photo" title="<?= __('View private photo') ?>">
    <div align="center">
    <?= link_to(__('View photo'),'http://'.$_SERVER['HTTP_HOST'].'/uploads/photo/'.$p->getImage(),array('class'=>'alert','id'=>'link_show')); ?>
    </div>

    <script type="text/javascript">
      $("a.alert").fancybox({
    'transitionIn' : 'none',
    'transitionOut' : 'none',
    'titlePosition' : 'inside',
    'titleFormat' : function(title, currentArray, currentIndex, currentOpts) {
    return '(' + (currentIndex + 1) + '/' + currentArray.length + ') ' + title;
    }
    });

    $(function() {

            $( "#dialog_private_photo" ).dialog( "destroy" );

            $( "#dialog_private_photo" ).dialog({
                    height: 200,
                    width:  330,
                    modal: true
            });
    });

    </script>

    <?php if(isset($message)): ?>
       <br />
         <?= $message ?>
       <br />
    <?php else: ?>
       <script>
           $( "#dialog_private_photo" ).dialog( "destroy" );
           $('#link_show').click();
       </script>

    <?php endif; ?>
   </div>
<?php endif; ?>
    


