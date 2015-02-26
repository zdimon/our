<?php


if($sf_user->isAuthenticated())
{
    if($sf_user->getGuardUser()->getGender()=='m')
    {
        $gen = 'w';
    }
    else
    {
        $gen = 'm';
    }
}
else
{
    $gen = 'w';
}


$q= Doctrine::getTable('Profile')
    ->createQuery('a')
    ->where('a.is_active=? and a.status_id=1 and a.gender=? and a.with_photo=? and a.timenew>?',array(true,$gen,true,time()))
    ->orderBy('a.id DESC')
    ->limit(2);

if ($sf_user->isAuthenticated())
{
    //$q->addWhere('a.gender=?',array($sf_user->getGuardUser()->getAntiGender()));
}
$items = $q->execute();
?>


    <?php foreach($items as $i): ?>

        <div class="lady_item">
            <div class="lady_item_left">
                <a title="<?= $i->getImgSeo() ?>" href="<?= url_for('@search_new')?>"><img src="<?= $i->getUrlImageMiddle() ?>"  alt="<?= $i ?>"></a>
                <img class="icon_new" src="/pic/icon_new.png"  alt="new">
            </div>

        </div>

    <?php endforeach?>

<div style="clear: both;"></div>


