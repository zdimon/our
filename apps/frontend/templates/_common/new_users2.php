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
    ->where('a.is_active=? and a.status_id=1 and a.with_photo=? and a.gender=? and a.rating>0 and a.is_staff = false',array(true,true,$gen))
    ->orderBy('a.rating DESC')
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

                <a title="<?= $i->getImgSeo() ?>" href="<?= url_for('@search_most')?>"><img src="<?= $i->getUrlImageMiddle() ?>"  alt="<?= $i ?>"></a>
                <?php if($i->getTimenew()>time()): ?>
                <img class="icon_new" src="/pic/icon_new.png" alt="new">
                <?php endif; ?>

            </div>

        </div>

    <?php endforeach?>

<div style="clear: both;"></div>


