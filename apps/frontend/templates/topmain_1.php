<?php

$q= Doctrine::getTable('Profile')
->createQuery('a')
->where('a.is_active=? and a.status_id=1 and a.gender=? and a.rating>0  and a.rating<100',array(true,'w'))
->limit(6);

if ($sf_user->isAuthenticated())
{
    //$q->addWhere('a.gender=?',array($sf_user->getGuardUser()->getAntiGender()));
}
$items = $q->execute();
?>


<div class="items">
    <?php foreach($items as $i): ?>
                                    <div class="item">
                                        <div class="item_bg_top">
                                            <div class="item_bg_bot">
                                                <div class="prev_img"><?= $i->getLinkImage() ?></div>
                                                <div class="item_content">
                                                    <div class="data">
                                                        <?= $i->getOnlineIndicator() ?>
                                                        <span class="id"><?= __('ID') ?>: <?= $i->getUserId() ?></span>
                                                    </div>
                                                    <a href="#"><?= $i->getRealName() ?></a> Age:<span class="r"><?= $i->getAge() ?></span><br />
                                                    <?= $i->getCity() ?>, <?= $arrc[$i->getCountry()] ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
     <?php endforeach?>
</div>