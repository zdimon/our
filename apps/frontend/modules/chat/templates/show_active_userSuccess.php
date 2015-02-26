<?php if(isset($profile)):?>
               <div class="item">
                    
                       
                            <div class="prev_img" style="float: left; width: 130px">
							<?= image_tag($profile->getUrlImageSmall(),array('style'=>'width: 90px')) ?>
							
							</div>
                            <div class="item_content" style="float: left; width: 90px">
                                
                                    
                                    <span class="id"><?= __('ID') ?>: <?= $profile->getUserId() ?></span>
                               
                                <a target="_blank" href="<?= url_for('profile/show?username='.$profile->getsfGuardUser()->getUsername()) ?>"><?= $profile->getRealName() ?></a> Age:<span class="r"><?= $profile->getAge() ?></span><br />
                                <?= $profile->getCity() ?>, <?= $arrc[$profile->getCountry()] ?>
                            </div>
                        </div>
<?php else: ?>
   <?= __('Абонент не выбран') ?>
<?php endif; ?>

<div style="clear: both"></div>
<br />