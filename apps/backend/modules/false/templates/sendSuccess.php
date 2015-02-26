


<h1><?php echo __('New message') ?></h1>

<div align="center">
    <div style="float: left; margin: 5px">
        <?= __("From") ?>
        <div>
                       <?= image_tag($from_user->getProfile()->getUrlImageSmall()) ?>
                        <div style="text-align: center">
                        <?= $from_user->getUsername() ?> [<?= $from_user->getId() ?>] 
                        </div>
        </div>
    </div>
    
    <div style="float: left; margin: 5px;">
        <?= __("To") ?>
        <div>
                       <?= image_tag($to_user->getProfile()->getUrlImageSmall()) ?>
                        <div style="text-align: center">
                        <?= $to_user->getUsername() ?> [<?= $to_user->getId() ?>] 
                        </div>
        </div>
    </div>
    
    <div style=" padding: 10px; width: 700px; border: 1px solid silver; float: right">
        



        <form id="" action="<?php echo url_for('false/save') ?>" method="post" class="" enctype="multipart/form-data">

              <?php echo $form ?>

            
            
            
            
                     <div class="row input_but" align="center">
                          <input class="but" type="submit" value="<?php echo __('Отправить сообщение') ?>" />
                     </div>

        </form>

        </div>
    <div style="clear: both"></div>
    </div>



