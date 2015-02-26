<?php

    echo link_to(image_tag('/uploads/photo/small_thumbnail/'.$photo->getImage()),'http://'.$_SERVER['HTTP_HOST'].'/uploads/photo/original/'.$photo->getImage(),array('class'=>'alert'));

?>
