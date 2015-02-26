<?php if(!$pager->getNbResults()):?>
        <div class="alert_error" align="center">
            <?= __('No users')  ?>
        </div>
<?php else: ?>

            <?php foreach ($pager->getResults() as $p): ?>


        <?php 
         if($p->getIsOnline())
         {
             $st = array('style'=>'border: 2px solid green;');
         } else {
             $st = array();
         }
        ?>
         <div style="width: 100px; height: 170px; margin: 2px; padding: 2px; border: 1px solid silver; float: left; text-align: center">
               <?= image_tag($p->getUrlImageSmall(),$st) ?>
                        <div style="text-align: center">
                <?= $p->getsfGuardUser()->getUsername() ?> [<?= $p->getUserId() ?>] 
                <p>
                    <?=
              jq_link_to_remote(__('Send a message'), array(
                            'update' => 'message_form',
                            'loading' => '$("#message_form_loading").show()',
                            'complete' => '$("#message_form_loading").hide()',
                            'script'=>true,
                            'method'=>'GET',
                            'url' => 'false/send?u='.$p->getUserId()
               ));
    ?>
                </p>
           </div>
             
          </div>

            <?php endforeach; ?>
<div style="clear: both"></div>
      <?php include_partial('ajaxpager',array('pager'=>$pager)) ?>
<?php endif; ?>