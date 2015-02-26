<?php $profile = $u->getProfile(); ?>

<?php if($profile): ?>

  <?php $arrc = sfCultureInfo::getInstance($sf_user->getCulture())->getCountries()?>
   <div id="gender_<?= $profile->getId() ?>" style="inline-block" ><?php $profile->getGenderImage() ?></div>
       <?= jq_link_to_remote(__('Change gender'),
    array(
        'update' => 'gender_'.$profile->getId(),
        'url'    => 'user/gender?i='.$profile->getId()
    ),array('style'=>'font-size: 10px; color: maroon')
) ?>         
                <br/>
                <?= __('ID') ?>: <?= $profile->getUserSpecId() ?> <br />
        <?= __('Login') ?>: <?= $profile->getsfGuardUser()->getUsername() ?><br />

        <?= __('First name') ?>: <?= $profile->getFirstName() ?><br />
        <?= __('Last name') ?>: <?= $profile->getLastName() ?><br />
        <?= __('Email') ?>: <?= $profile->getsfGuardUser()->getEmail() ?><br />
        <?= __('Age') ?>: <?= $profile->getAge() ?><br />
        <?= __('Country') ?>: <?= $arrc[$profile->getCountry()] ?><br />
        <?= __('City') ?>: <?= $profile->getCity() ?><br />
        <?= __('IP') ?>: <?= $profile->getIp() ?><br />
        <?= __('Status') ?>: <?= $profile->getStatus() ?><br />
        <?php if($profile->getGender()=='m'): ?>
        <?= __('Membership') ?>: <?= $profile->getNameMembership() ?><br />
        <?= __('Date expire') ?>: <?= $profile->getsfGuardUser()->getDateExpire() ?><br />
        <?php endif; ?>
        <?= __('With photo') ?>: <?php if($profile->getWithPhoto()): ?><span style="color:green"><?= __('yes') ?></span> <?php else: ?><span style="color:red"><?= __('no') ?></span> <?php endif; ?><br />
        
        
        <?= __('Is new user') ?>: 
        <span id="isn_<?= $profile->getId() ?>">
            <?php if($profile->getIsNew()): ?>
                        <?= jq_link_to_remote(__('YES'),
                    array(
                        'update' => 'isn_'.$profile->getId(),
                        'url'    => 'user/isnew?i='.$profile->getId()
                    ),array('style'=>'font-size: 10px; color: red')
                ) ?>      
            <?php else: ?>
                <?= jq_link_to_remote(__('NO'),
                             array(
                                 'update' => 'isn_'.$profile->getId(),
                                 'url'    => 'user/isnew?i='.$profile->getId()
                             ),array('style'=>'font-size: 10px; color: green')
                         ) ?>    

            <?php endif; ?>
        </span>
        <br />
        
        
        
        
        <?= __('Is online') ?>: <?php if($profile->getsfGuardUser()->getIsOnline()): ?><span style="color:green"><?= __('yes') ?></span> <?php else: ?><span style="color:red"><?= __('no') ?></span> <?php endif; ?><br />
        <br />
        

               
        
    <?php if($profile->getGender()=='w' and $profile->getPartnerId()>0 and $sf_user->hasCredential('admin') and sfConfig::get('app_menu_partner')!='false'): ?>
         <br />
     
     <?php endif ?>
     
    
       
<?php else: ?>
        <span style="color: red"> Ошибка, <?= $u->getUsername().'['.$u->getId().']' ?>no profile!</span>
<?php endif ?>

