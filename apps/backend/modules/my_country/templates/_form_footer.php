<h1><?= __('Images') ?></h1>
<?php if(strlen($my_country->getImage1())>0): ?>

<?php echo link_to(image_tag('/uploads/'.$my_country->getImage1(),array('width'=>'200px')),'http://'.$_SERVER['HTTP_HOST'].'/uploads/'.$my_country->getImage1(),array('target'=>'_blank')) ?>

<?php endif; ?>


<?php if(strlen($my_country->getImage2())>0): ?>

<?php echo link_to(image_tag('/uploads/'.$my_country->getImage2(),array('width'=>'200px')),'http://'.$_SERVER['HTTP_HOST'].'/uploads/'.$my_country->getImage2(),array('target'=>'_blank')) ?>

<?php endif; ?>


<?php if(strlen($my_country->getImage3())>0): ?>

<?php echo link_to(image_tag('/uploads/'.$my_country->getImage3(),array('width'=>'200px')),'http://'.$_SERVER['HTTP_HOST'].'/uploads/'.$my_country->getImage3(),array('target'=>'_blank')) ?>

<?php endif; ?>


<?php if(strlen($my_country->getImage4())>0): ?>

<?php echo link_to(image_tag('/uploads/'.$my_country->getImage4(),array('width'=>'200px')),'http://'.$_SERVER['HTTP_HOST'].'/uploads/'.$my_country->getImage4(),array('target'=>'_blank')) ?>

<?php endif; ?>



<?php if(strlen($my_country->getImage5())>0): ?>

<?php echo link_to(image_tag('/uploads/'.$my_country->getImage5(),array('width'=>'200px')),'http://'.$_SERVER['HTTP_HOST'].'/uploads/'.$my_country->getImage5(),array('target'=>'_blank')) ?>

<?php endif; ?>