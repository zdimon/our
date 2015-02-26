
<?php foreach ($photos as $pph): ?>
   <div style="float: left; width: 100px; border:1px solid red" id = "pho_<?= $pph->getId() ?>">
       <div>
           <?php

           echo link_to(image_tag('/uploads/photo/small_thumbnail/'.$pph->getImage()),'http://'.$_SERVER['HTTP_HOST'].'/uploads/photo/original/'.$pph->getImage(),array('class'=>'alert','target'=>'_blank'));

           ?>
       </div>
       <div>
           <?= jq_link_to_remote(__('Approve'),
               array(
                   'update' => 'up_5',
                   'url'    => 'user/getphotoonapprove?i='.$pph->getId().'&act=on'
               )
           ) ?>
           <?= jq_link_to_remote(__('Delete'),
               array(
                   'update' => 'up_5',
                   'url'    => 'user/getphotoonapprove?i='.$pph->getId().'&act=del'
               )
           ) ?>
       </div>
   </div>

<?php endforeach ?>
<div style="clear: both"></div>