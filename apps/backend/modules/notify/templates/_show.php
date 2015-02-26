<?php echo link_to(__('Show English version'),'notify/showtpl?id='.$notify->getId().'&culture=en',array('target'=>"_blank"));  ?> <br />
<?php echo link_to(__('Show Russian version'),'notify/showtpl?id='.$notify->getId().'&culture=ru',array('target'=>"_blank"));  ?><br />
<?php echo link_to(__('Show French version'),'notify/showtpl?id='.$notify->getId().'&culture=fr',array('target'=>"_blank"));  ?><br />
<?php echo link_to(__('Show German version'),'notify/showtpl?id='.$notify->getId().'&culture=de',array('target'=>"_blank"));  ?><br />