<?php if ($sf_user->isAuthenticated()): ?>
    <?php if(sfContext::getInstance()->getUser()->getCulture()=='en'):?>
    <?php echo link_to( image_tag('/images/flags/russian.png',array('alt'=>'ru')),'lang/index?l=ru' )?>
    <?php echo link_to(image_tag('/images/flags/french.png',array('alt'=>'fr')),'lang/index?l=fr' )?>
    <?php echo  image_tag('/images/flags/english.png',array('style'=>'border: 1px solid red','alt'=>'en')) ?>

    <?php endif ?>

    <?php if(sfContext::getInstance()->getUser()->getCulture()=='ru'):?>
    <?php echo  image_tag('/images/flags/russian.png',array('style'=>'border: 1px solid red','alt'=>'ru')) ?>
    <?php echo link_to(image_tag('/images/flags/french.png',array('alt'=>'fr')),'lang/index?l=fr')?>
    <?php echo link_to( image_tag('/images/flags/english.png',array('alt'=>'en')),'lang/index?l=en')?>

    <?php endif ?>

    <?php if(sfContext::getInstance()->getUser()->getCulture()=='fr'):?>
    <?php echo link_to( image_tag('/images/flags/russian.png',array('alt'=>'ru')),'lang/index?l=ru' )?>
    <?php echo image_tag('/images/flags/french.png',array('style'=>'border: 1px solid red','alt'=>'fr')) ?>
    <?php echo link_to( image_tag('/images/flags/english.png',array('alt'=>'en')),'lang/index?l=en' )?>

    <?php endif ?>

<?php endif ?>







