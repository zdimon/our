<?php
if(strlen($message->getImage())>0)
echo link_to(image_tag('/uploads/message/thumbnail/'.$message->getImage()),'http://'.$_SERVER['HTTP_HOST'].'/uploads/message/original/'.$message->getImage(),array('class'=>'alert'));

?>
