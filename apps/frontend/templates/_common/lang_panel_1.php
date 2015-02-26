
    <?php if(sfContext::getInstance()->getUser()->getCulture()=='en'):?>
    <?php echo link_to( image_tag('/images/flags/russian.png'),'lang/index?l=ru' )?>
    <?php echo link_to(image_tag('/images/flags/french.png'),'lang/index?l=fr' )?>
    <?php echo  image_tag('/images/flags/english.png',array('style'=>'border: 1px solid red')) ?></li>
    <?php echo link_to(image_tag('/images/flags/germany.png'),'lang/index?l=de' )?>
    <?php echo link_to( image_tag('/images/flags/spanish.png'),'lang/index?l=is' )?>
    <?php endif ?>

    <?php if(sfContext::getInstance()->getUser()->getCulture()=='ru'):?>
    <?php echo  image_tag('/images/flags/russian.png',array('style'=>'border: 1px solid red')) ?>
    <?php echo link_to(image_tag('/images/flags/french.png'),'lang/index?l=fr')?>
    <?php echo link_to( image_tag('/images/flags/english.png'),'lang/index?l=en')?>
    <?php echo link_to(image_tag('/images/flags/germany.png'),'lang/index?l=de' )?>
    <?php echo link_to( image_tag('/images/flags/spanish.png'),'lang/index?l=is' )?>
    <?php endif ?>

    <?php if(sfContext::getInstance()->getUser()->getCulture()=='fr'):?>
    <?php echo link_to( image_tag('/images/flags/russian.png'),'lang/index?l=ru' )?>
    <?php echo image_tag('/images/flags/french.png',array('style'=>'border: 1px solid red')) ?>
    <?php echo link_to( image_tag('/images/flags/english.png'),'lang/index?l=en' )?>
    <?php echo link_to(image_tag('/images/flags/germany.png'),'lang/index?l=de' )?>
    <?php echo link_to( image_tag('/images/flags/spanish.png'),'lang/index?l=is' )?>
    <?php endif ?>

    <?php if(sfContext::getInstance()->getUser()->getCulture()=='de'):?>
    <?php echo link_to( image_tag('/images/flags/russian.png'),'lang/index?l=ru' )?>
    <?php echo link_to(image_tag('/images/flags/french.png'),'lang/index?l=fr')?>
    <?php echo link_to( image_tag('/images/flags/english.png'),'lang/index?l=en' )?>
    <?php echo image_tag('/images/flags/germany.png',array('style'=>'border: 1px solid red')) ?>
    <?php echo link_to( image_tag('/images/flags/spanish.png'),'lang/index?l=is' )?>
    <?php endif ?>

    <?php if(sfContext::getInstance()->getUser()->getCulture()=='is'):?>
    <?php echo link_to( image_tag('/images/flags/russian.png'),'lang/index?l=ru' )?>
    <?php echo link_to(image_tag('/images/flags/french.png'),'lang/index?l=fr')?>
    <?php echo link_to( image_tag('/images/flags/english.png'),'lang/index?l=en' )?>
    <?php echo link_to(image_tag('/images/flags/germany.png'),'lang/index?l=de' )?>
    <?php echo image_tag('/images/flags/spanish.png',array('style'=>'border: 1px solid red')) ?>
    <?php endif ?>



