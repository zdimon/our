<?php

    echo link_to(image_tag('/uploads/testimonials/thumbnail/'.$testimonials->getImage()),'http://'.$_SERVER['HTTP_HOST'].'/uploads/testimonials/'.$testimonials->getImage(),array('class'=>'alert'));

?>
