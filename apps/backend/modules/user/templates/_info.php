<?php include_partial('global/common/user_info_full',array('u'=>$profile->getsfGuardUser()))?>		

<?= link_to(__('Translate profile'),'trprofile/edit?id='.$profile->getId(),array('style'=>'color: red')) ?>


<a href="<?php $_SERVER['HTTP_HOST'] ?>/<?=  $profile->getsfGuardUser()->getCulture() ?>/registration/activate?code=<?= $profile->getsfGuardUser()->getSalt() ?>" > Activation link </a>
