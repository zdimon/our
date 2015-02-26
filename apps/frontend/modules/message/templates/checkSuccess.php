
<?php
$arrc = sfCultureInfo::getInstance($sf_user->getCulture())->getCountries();
?>
<?php if($mes): ?>
<?php 


$tou =  '<br />'.$mes->getFromUser()->getProfile()->getFullName().'<br/ >'.__('Age').': '.$mes->getFromUser()->getProfile()->getAge().'<br />'.$mes->getFromUser()->getProfile()->getCity().'<br />'.$arrc[$mes->getFromUser()->getProfile()->getCountry()].'<br /><br />';     
 ?>
<script type="text/javascript">
        <?php
        if($mes->getFromUser()->getProfile()->getGender()=='m')
        {
            $who = __('He');
            $whom = __('him');
        }
        else
        {
            $who = __('She');
            $whom = __('her');
        }
        ?>
    //start newEnterSite
    var newEnterSite = $('.newEnterSite');
    //setInterval(startFunck, 2000)
    startFunck();
    function startFunck(){

        var visItemTitleText = '<?= __('Receive an email from %1% maybe is important go to read  Letter',array('%1%'=>$mes->getFromUser()->getProfile()->getFullName())) ?>';
        var visItemAttentionText = 'ID <?= $mes->getFromId() ?>';
        var visItemDescrText = '<?= $tou ?><?= link_to(__('Mailbox'),'message/index') ?> <br/><br/> <?= link_to(__('Read letter'),'message/show?id='.$mes->getId()) ?> ';
        var visItemPhotoPic = '<a href="http://<?= $_SERVER['HTTP_HOST'] ?>/<?= $sf_user->getCulture() ?>/profile/show/username/<?= $mes->getFromUser()->getUsername()?>"><img src="<?= $mes->getFromUser()->getProfile()->getUrlImageMiddle() ?>"></a>';

        var visItem = $('<div>').addClass('newVisItem').hide();

        var visItemTitle = $('<div>').html(visItemTitleText).addClass('visItemTitle').appendTo(visItem);
        var visItemAttention = $('<div>').html(visItemAttentionText).addClass('visItemAttention').appendTo(visItem);

        var visItemPhoto = $('<div>').html(visItemPhotoPic).addClass('visItemPhoto').appendTo(visItem);
        var visItemDescr = $('<div>').html(visItemDescrText).addClass('visItemDescr').appendTo(visItem);

        visItem.appendTo(newEnterSite);

        var newVisItem = $('.newVisItem');
        var newVisItemHeight = newVisItem.actual('outerHeight');
        newVisItem.css({bottom:'-'+newVisItemHeight+'px'}).show().animate({bottom:'0'});
		
		
		var length = $( ".newEnterSite .newVisItem" ).length ;
		max=3;
		if(length > max){
		//$(".newEnterSite .newVisItem:lt(-3)").remove();
		$(".newEnterSite .newVisItem").slice(0,-3).remove();
		}
       // function newVisItemRemove(){
//            newVisItem.fadeOut(function(){$(this).remove()})
//        }
//        setTimeout(newVisItemRemove,4000)
    }
    //end newEnterSite
</script>
<?php endif; ?>




<?php if($fav): ?>
<?php 
$tou = '<br/ >'.__('Age').': '.$fav->getUser()->getProfile()->getAge().'<br />'.$fav->getUser()->getProfile()->getCity().'<br />'.$arrc[$fav->getUser()->getProfile()->getCountry()].'<br /><br />';     
 ?>
<script type="text/javascript">
        <?php
        if($fav->getUser()->getProfile()->getGender()=='m')
        {
            $who = __('woman');
            $whom = __('him');
        }
        else
        {
            $who = __('man');
            $whom = __('her');
        }
        ?>
    //start newEnterSite
    var newEnterSite = $('.newEnterSite');
    //setInterval(startFunck, 2000)
    startFunck();
    function startFunck(){

        var visItemTitleText = '<?= __('You are lucky! %2% added you to favorite, go NOW to contact or write to %1%! If you forget to do another can do that at your place.',array('%1%'=> $fav->getUser()->getProfile()->getFullName(),'%2%'=>$fav->getUser()->getProfile()->getFullName()))?>';
        var visItemAttentionText = 'ID <?= $fav->getUserId() ?>';
        var visItemDescrText = '<?= $tou ?><?= link_to(__('Favorites'),'friend/my') ?>';
        var visItemPhotoPic = '<a href="http://<?= $_SERVER['HTTP_HOST'] ?>/<?= $sf_user->getCulture() ?>/profile/show/username/<?= $fav->getUser()->getUsername()?>"><img src="<?= $fav->getUser()->getProfile()->getUrlImageMiddle() ?>"></a>'

        var visItem = $('<div>').addClass('newVisItem').hide();

        var visItemTitle = $('<div>').html(visItemTitleText).addClass('visItemTitleFav').appendTo(visItem);
        var visItemAttention = $('<div>').html(visItemAttentionText).addClass('visItemAttention').appendTo(visItem);

        var visItemPhoto = $('<div>').html(visItemPhotoPic).addClass('visItemPhoto').appendTo(visItem);
        var visItemDescr = $('<div>').html(visItemDescrText).addClass('visItemDescr').appendTo(visItem);

        visItem.appendTo(newEnterSite);

        var newVisItem = $('.newVisItem');
        var newVisItemHeight = newVisItem.actual('outerHeight');
        newVisItem.css({bottom:'-'+newVisItemHeight+'px'}).show().animate({bottom:'0'});
		
		var length = $( ".newEnterSite .newVisItem" ).length ;
		max=3;
		if(length > max){
		//$(".newEnterSite .newVisItem:lt(-3)").remove();
		$(".newEnterSite .newVisItem").slice(0,-3).remove();
		}

        //   function newVisItemRemove(){
        //      newVisItem.fadeOut(function(){$(this).remove()})
        //   }
        // setTimeout(newVisItemRemove,4000)
    }
    //end newEnterSite
</script>
<?php endif; ?>




<?php if($int): ?>
<?php 
$tou = '<br/ >'.__('Age').': '.$int->getUser()->getProfile()->getAge().'<br />'.$int->getUser()->getProfile()->getCity().'<br />'.$arrc[$int->getUser()->getProfile()->getCountry()].'<br /><br />';     
 ?>
<script type="text/javascript">
        <?php
        if($int->getUser()->getProfile()->getGender()=='m')
        {
            $who = __('woman');
            $whom = __('him');
        }
        else
        {
            $who = __('man');
            $whom = __('her');
        }
        ?>
    //start newEnterSite
    var newEnterSite = $('.newEnterSite');
    //setInterval(startFunck, 2000)
    startFunck();
    function startFunck(){

        var visItemTitleText = '<?= __('You are lucky! %1% sent you interest, go NOW to contact or write to %2%! If you forget to do another can do that at your place.',array('%1%'=>$int->getUser()->getProfile()->getFullName(),'%2%'=>$int->getUser()->getProfile()->getFullName()))?>';
        var visItemAttentionText = 'ID <?= $int->getUserId() ?>';
        var visItemDescrText = '<?= $tou ?><?= link_to(__('Who interested me'),'interest/index') ?>';
        var visItemPhotoPic = '<a href="http://<?= $_SERVER['HTTP_HOST'] ?>/<?= $sf_user->getCulture() ?>/profile/show/username/<?= $int->getUser()->getUsername()?>"><img src="<?= $int->getUser()->getProfile()->getUrlImageMiddle() ?>"></a>'

        var visItem = $('<div>').addClass('newVisItem').hide();

        var visItemTitle = $('<div>').html(visItemTitleText).addClass('visItemTitleInt').appendTo(visItem);
        var visItemAttention = $('<div>').html(visItemAttentionText).addClass('visItemAttention').appendTo(visItem);

        var visItemPhoto = $('<div>').html(visItemPhotoPic).addClass('visItemPhoto').appendTo(visItem);
        var visItemDescr = $('<div>').html(visItemDescrText).addClass('visItemDescr').appendTo(visItem);

        visItem.appendTo(newEnterSite);

        var newVisItem = $('.newVisItem');
        var newVisItemHeight = newVisItem.actual('outerHeight');
        newVisItem.css({bottom:'-'+newVisItemHeight+'px'}).show().animate({bottom:'0'});
		
		var length = $( ".newEnterSite .newVisItem" ).length ;
		max=3;
		if(length > max){
		//$(".newEnterSite .newVisItem:lt(-3)").remove();
		$(".newEnterSite .newVisItem").slice(0,-3).remove();
		}

        //   function newVisItemRemove(){
        //      newVisItem.fadeOut(function(){$(this).remove()})
        //   }
        // setTimeout(newVisItemRemove,4000)
    }
    //end newEnterSite
</script>
<?php endif; ?>




<?php if($viw): ?>
<?php 
$tou = '<br/ >'.__('Age').': '.$viw->getUser()->getProfile()->getAge().'<br />'.$viw->getUser()->getProfile()->getCity().'<br />'.$arrc[$viw->getUser()->getProfile()->getCountry()].'<br /><br />';     
 ?>
    <?php
    if($viw->getUser()->getProfile()->getGender()=='m')
    {
        $who = __('He');
        $whom = __('him');
    }
    else
    {
        $who = __('She');
        $whom = __('her');
    }
        ?>
<script type="text/javascript">

    //start newEnterSite
    var newEnterSite = $('.newEnterSite');
    //setInterval(startFunck, 2000)
    startFunck();
    function startFunck(){

        var visItemTitleText = '<?= __('%1% visit your profile go to tell to %2% Hello maybe %3% wait it?',array('%1%'=>$viw->getUser()->getProfile()->getFullName(),'%2%'=>$viw->getUser()->getProfile()->getFullName(),'%3%'=>$viw->getUser()->getProfile()->getFullName()))?>';
        var visItemAttentionText = 'ID <?= $viw->getUserId() ?>';
        var visItemDescrText = '<?= $tou ?><?= link_to(__('Who viewed me'),'viewed/index') ?>';
        var visItemPhotoPic = '<a href="http://<?= $_SERVER['HTTP_HOST'] ?>/<?= $sf_user->getCulture() ?>/profile/show/username/<?= $viw->getUser()->getUsername()?>"><img src="<?= $viw->getUser()->getProfile()->getUrlImageMiddle() ?>"></a>'

        var visItem = $('<div>').addClass('newVisItem').hide();

        var visItemTitle = $('<div>').html(visItemTitleText).addClass('visItemTitleViw').appendTo(visItem);
        var visItemAttention = $('<div>').html(visItemAttentionText).addClass('visItemAttention').appendTo(visItem);

        var visItemPhoto = $('<div>').html(visItemPhotoPic).addClass('visItemPhoto').appendTo(visItem);
        var visItemDescr = $('<div>').html(visItemDescrText).addClass('visItemDescr').appendTo(visItem);

        visItem.appendTo(newEnterSite);

        var newVisItem = $('.newVisItem');
        var newVisItemHeight = newVisItem.actual('outerHeight');
        newVisItem.css({bottom:'-'+newVisItemHeight+'px'}).show().animate({bottom:'0'});
		var length = $( ".newEnterSite .newVisItem" ).length ;
		max=3;
		if(length > max){
		//$(".newEnterSite .newVisItem:lt(-3)").remove();
		$(".newEnterSite .newVisItem").slice(0,-3).remove();
		}

        //   function newVisItemRemove(){
        //      newVisItem.fadeOut(function(){$(this).remove()})
        //   }
        // setTimeout(newVisItemRemove,4000)
    }
    //end newEnterSite
</script>
<?php endif; ?>







<?php if($mat): ?>
<?php 
$tou = '<br/ >'.__('Age').': '.$mat->getUser()->getProfile()->getAge().'<br />'.$mat->getUser()->getProfile()->getCity().'<br />'.$arrc[$mat->getUser()->getProfile()->getCountry()].'<br /><br />';     
 ?>
<script type="text/javascript">

    //start newEnterSite
    var newEnterSite = $('.newEnterSite');
    //setInterval(startFunck, 2000)
    startFunck();
    function startFunck(){

        var visItemTitleText = '<?= $mat->getUser()->getProfile()->getFullName() ?> <?=__('match to you!')?>';
        var visItemAttentionText = 'ID <?= $mat->getUserId() ?>';
        var visItemDescrText = '<?= $tou ?><?= link_to(__('My profile'),'profile/my') ?>';
        var visItemPhotoPic = '<a href="http://<?= $_SERVER['HTTP_HOST'] ?>/<?= $sf_user->getCulture() ?>/profile/show/username/<?= $mat->getUser()->getUsername()?>"><img src="<?= $mat->getUser()->getProfile()->getUrlImageMiddle() ?>"></a>'

        var visItem = $('<div>').addClass('newVisItem').hide();

        var visItemTitle = $('<div>').html(visItemTitleText).addClass('visItemTitleFav').appendTo(visItem);
        var visItemAttention = $('<div>').html(visItemAttentionText).addClass('visItemAttention').appendTo(visItem);

        var visItemPhoto = $('<div>').html(visItemPhotoPic).addClass('visItemPhoto').appendTo(visItem);
        var visItemDescr = $('<div>').html(visItemDescrText).addClass('visItemDescr').appendTo(visItem);

        visItem.appendTo(newEnterSite);

        var newVisItem = $('.newVisItem');
        var newVisItemHeight = newVisItem.actual('outerHeight');
        newVisItem.css({bottom:'-'+newVisItemHeight+'px'}).show().animate({bottom:'0'});
		
		var length = $( ".newEnterSite .newVisItem" ).length ;
		max=3;
		if(length > max){
		//$(".newEnterSite .newVisItem:lt(-3)").remove();
		$(".newEnterSite .newVisItem").slice(0,-3).remove();
		}

        //   function newVisItemRemove(){
        //      newVisItem.fadeOut(function(){$(this).remove()})
        //   }
        // setTimeout(newVisItemRemove,4000)
    }
    //end newEnterSite
</script>
<?php endif; ?>