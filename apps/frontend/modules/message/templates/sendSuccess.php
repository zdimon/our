<script type="text/javascript">


function insertImage(name) {


	
	tinyMCE.getInstanceById('message_content').getWin().focus();
	tinyMCE.themes['advanced']._insertImage(name);

	
}

</script>


<h1><?php echo __('Read message') ?></h1>



<?php include_partial('message/menu')?>

<div id="status_div" >

</div>
<div align="center" style="color: black; ">
    <div style=" padding: 10px; width: 550px; border: 1px solid #FFB552; background: #fff;">
        <table class="table3" width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>

                <td width="200px" style="color: black">
                    <?= include_partial('global/common/user_info',array('profile'=>$user_to->getProfile(),'arrc'=>$arrc,'arrl'=>$arrl)) ?>

                 </td>
                  <?php if(isset($reply)):?>
                 <td valign="top" style="padding-left: 10px;">
                    <b> <?= __('Ответ на сообщение') ?>:</b>

                 </td>
                 <?php endif; ?>

            </tr>
        </table>

         <?php if($reply): ?>
                <div style="padding: 10px; background: #fff; color: black">

                   <?= $reply->getContent(ESC_RAW) ?>

                    <?php if(strlen($reply->getImage())>0):?>

                            <?php echo link_to(image_tag('/uploads/message/thumbnail/'.$reply->getImage(),array('align'=>'left','style'=>'padding: 5px')),'http://'.$_SERVER['HTTP_HOST'].'/uploads/message/original/'.$reply->getImage(),array('class'=>'floatleft')) ?>

                    <?php endif; ?>

                </div>
             <div style="clear: both"></div>
        <?php endif ?>

        <h2><?= __('Reply') ?></h2>
        <form id="" action="<?php echo url_for('message/save') ?>" method="post" class="" enctype="multipart/form-data">

              <?php echo $form ?>

            
            <div style=" height: 250px; overflow: auto; width: 550px; border: 1px solid silver; background: white">
        
        <?php for ($i = 1; $i <= 60; $i++): ?>
        <?php echo image_tag('/images/smile/'.$i.'.gif',array('onclick'=>'insertImage("http://'.$_SERVER['HTTP_HOST'].'/images/smile/'.$i.'.gif")'))?>
        <?php endfor; ?>
        
     </div>
            
            
                     <div class="row input_but" align="center">
                          <input class="but" type="submit" value="<?php echo __('Отправить сообщение') ?>" />
                     </div>

        </form>

        </div>
    </div>



<script type="text/javascript">
    $("a.floatleft").fancybox({
        'transitionIn' : 'none',
        'transitionOut' : 'none',
        'titlePosition' : 'inside',
        'titleFormat' : function(title, currentArray, currentIndex, currentOpts) {
            return '(' + (currentIndex + 1) + '/' + currentArray.length + ') ' + title;
        }
    });

</script>
