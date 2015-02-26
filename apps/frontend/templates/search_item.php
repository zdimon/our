
<div class="lady_item">test
    <div class="lady_item_left">
         <?php if($profile->getIsCamera()):?>
           <span class="icon_cam2"></span>
         <?php endif; ?>

        <a href="<?= url_for('profile/show?username='.$profile->getsfGuardUser()->getUsername()) ?>"><img class="lady_pic" title="<?= $profile->getImgSeo() ?>" src="<?= $profile->getUrlImageMiddle() ?>" alt="<?= $profile->getsfGuardUser()->getRealName() ?>"></a>
        <div class="lady_status">
          <?php if($profile->getsfGuardUser()->getIsOnline()):?>
             <span class="blink" style="color: green; text-decoration:blink"><?= __('Online') ?></span>
          <?php else: ?>
            <?= __('Offline') ?>
          <?php endif; ?>
        </div>
        <div class="png lady_nav">
             <?php include_partial('global/common/chat_icon',array('p'=>$p)) ?>
            <a title="<?= __('Send message') ?>" href="<?= url_for('message/send?username='.$profile->getsfGuardUser()->getUsername())?>"><img src="/pic/icon_nav_2.png"></a>
            
            <?php if(!isset($rem_fav)): ?>
            <a title="<?= __('Add to favorite') ?>" href="<?= url_for('friend/add?username='.$profile->getsfGuardUser()->getUsername())?>"><img src="/pic/icon_nav_1.png"></a>
            <?php endif; ?>
            
            <?php if($profile->getWithVideo()): ?>
                <a title="<?= __('Show video') ?>" href="<?php echo url_for('profile/showvideo?id='.$profile->getUserId()) ?>"><img src="/pic/icon_nav_3.png"></a>
             <?php endif; ?>
                
            <?php if(!isset($rem_int)): ?>
              <a title="<?= __('Send interest') ?>" href="<?= url_for('interest/add?username='.$profile->getsfGuardUser()->getUsername())?>"><img src="/pic/icon_nav_4.png"></a>
            <?php endif; ?>  
          <!--<a title="<?= __('Send gift') ?>" href="#"><img src="/pic/icon_nav_5.png"></a>-->
        </div>
    </div>
    <div class="lady_item_right">
        <a href="<?= url_for('profile/show?username='.$profile->getsfGuardUser()->getUsername()) ?>" class="lady_name"><?= $profile->getFullName() ?></a>
        <div class="pb10"><b>ID:<?= $profile->getUserSpecId() ?></b></div>

       
        <div class="chat_but">
           <?php include_partial('global/common/chat_icon',array('p'=>$profile)) ?>
        </div>


        <table style="box-shadow: 4px 4px 4px #2D2721;">
            <tr>
               
                <td style="padding:2px; border: 1px solid white"><b><?= __('Age') ?>:</b> <?= $profile->getAge() ?></td>
            </tr>
            <?php if($profile->getHeight()>0): ?>
            <tr>
                
                <td style="padding:2px; border: 1px solid white"><b><?= __('Height') ?>:</b> <?= $profile->getHeight() ?> sm</td>
            </tr>
            <?php endif; ?>
            <?php if($profile->getWeight()>0): ?>
            <tr>
               
                <td style="padding:2px; border: 1px solid white"><b><?= __('Weight') ?>:</b> <?= $profile->getWeight() ?> kg</td>
            </tr>
            <?php endif; ?>
            
            <tr>
                
                <td style="padding:2px; border: 1px solid white"><?= $profile->getIcity() ?></td>
            </tr>
            <tr>
                
                <td style="padding:2px; border: 1px solid white"><?= $arrc[$profile->getCountry()] ?></td>
            </tr>
        </table>



    </div>
</div>

