<?php use_helper('I18N', 'Date') ?>
<?php include_partial('global/assets') ?>

<table>
    <?php foreach($user as $u): ?>
        <tr>
        <?php $profile = $u->getProfile(); ?>
        <?php if($profile): ?>
            <td>

                <?=  image_tag($profile->getUrlImageSmall()) ?>

                <p><a style="display: block; width: 50px; margin: 2px" target="_blank" href="<?= url_for('user/filterPhoto?id='.$profile->getUserId()) ?>" id="dialog_link" class="ui-state-default ui-corner-all"><span class="ui-icon ui-icon-image"></span><?= __('Photo') ?></span></a></p>
                <p><a style="display: block; width: 50px; margin: 2px" target="_blank" href="<?= url_for('user/filterVideo?id='.$profile->getUserId()) ?>" id="dialog_link" class="ui-state-default ui-corner-all"><span class="ui-icon ui-icon-video"></span><?= __('Video') ?></span></a></p>


                <?= link_to($profile->getFirstName().' '.$profile->getLastName(),'profile/show?id='.$profile->getUserId()) ?>

            </td>
            <td>

                <?php include_partial('global/common/user_info_full',array('u'=>$profile->getsfGuardUser()))?>

                <?= link_to(__('Translate profile'),'trprofile/edit?id='.$profile->getId(),array('style'=>'color: red')) ?>


                <a href="<?php $_SERVER['HTTP_HOST'] ?>/<?=  $profile->getsfGuardUser()->getCulture() ?>/registration/activate?code=<?= $profile->getsfGuardUser()->getSalt() ?>" > Activation link </a>


            </td>

            <td>

                <!--  <p><?= link_to(__('Photo'),'user/filterPhoto?id='.$profile->getUserId()) ?> </p>-->
                <!--  <p><?= link_to(__('Video'),'user/filterVideo?id='.$profile->getUserId()) ?> </p>-->
                <!--   <?= link_to(__('Messages'),'user/filterMessage?id='.$profile->getUserId()) ?> <br /> -->

                <?= __('Date of the registration') ?>: <?= format_date($profile->getCreatedAt(),'d') ?><br />

                <p><?= __('Login') ?>: <?= $profile->getsfGuardUser()->getUsername() ?> <br /></p>
                <p><?= __('Password') ?>: <?= $profile->getsfGuardUser()->getPc() ?> <br /></p>




                <table>
                    <tr>
                        <td colspan="2" align="center"><b><?= __('Subscribe') ?></b></td>
                    </tr>
                    <tr>
                        <td><b><?= __('Newsletter') ?></b></td>
                        <td> <?php if($profile->getSubNewsletter()){ echo '<span style="color: green">'.__('yes').'</span>'; }else{ echo '<span style="color: green">'.__('no').'</span>'; } ?></td>
                    </tr>
                    <tr>
                        <td><b><?= __('Favorite') ?></b></td>
                        <td> <?php if($profile->getSubFav()){ echo '<span style="color: green">'.__('yes').'</span>'; }else{ echo '<span style="color: green">'.__('no').'</span>'; } ?></td>
                    </tr>
                    <tr>
                        <td><b><?= __('Interest') ?></b></td>
                        <td> <?php if($profile->getSubInterest()){ echo '<span style="color: green">'.__('yes').'</span>'; }else{ echo '<span style="color: green">'.__('no').'</span>'; } ?></td>
                    </tr>
                    <tr>
                        <td><b><?= __('Mail') ?></b></td>
                        <td> <?php if($profile->getSubMessage()){ echo '<span style="color: green">'.__('yes').'</span>'; }else{ echo '<span style="color: green">'.__('no').'</span>'; } ?></td>
                    </tr>
                </table>

                <div>
                    On site: <?= $profile->getTimeOnSite() ?> sec.
                </div>

            </td>

            <td>


                <!--   <?= link_to(__('Messages'),'user/filterMessage?id='.$profile->getUserId()) ?> <br /> -->

                <?php if($profile->getGender()=='w'): ?>
                    <p><a style="display: block; width: 160px; margin-bottom: 2px" target="_blank" href="<?= url_for('message/filterSend?id='.$profile->getUserId()) ?>" id="dialog_link" class="ui-state-default ui-corner-all"><span class="ui-icon ui-icon-arrowreturnthick-1-e"></span><?= __('Letters (sent)') ?></span></a></p>
                    <p><a style="display: block; width: 160px; margin-bottom: 2px" target="_blank" href="<?= url_for('message/filterRecive?id='.$profile->getUserId()) ?>" id="dialog_link" class="ui-state-default ui-corner-all"><span class="ui-icon ui-icon-arrowreturnthick-1-w"></span><?= __('Letters (resived)') ?></span></a></p>
                <?php endif ?>



                <?php if($profile->getGender()=='m'): ?>
                    <p><?= link_to(__('Letters (sent)'),'message/filterSend?id='.$profile->getUserId()) ?> </p>
                    <p><?= link_to(__('Letters (read)'),'message/filterRead?id='.$profile->getUserId()) ?> </p>
                    <!--<p><?= link_to(__('Letters (not approved)'),'gift_order/filterVideo?id='.$profile->getUserId()) ?> </p>-->
                <?php endif ?>

                <br /><br /><br />

<span id="isf_<?= $profile->getsfGuardUser()->getId() ?>">
            <?php if($profile->getsfGuardUser()->getIsFalse()): ?>
                <?= jq_link_to_remote(__('Remove from false pfofile for %1%',array('%1%'=>$profile->getsfGuardUser()->getOwnerId())),
                    array(
                        'update' => 'isf_'.$profile->getsfGuardUser()->getId(),
                        'url'    => 'user/isfalse?i='.$profile->getsfGuardUser()->getId()
                    ),array('style'=>'display: block; width: 160px; margin-bottom: 2px')
                ) ?>
            <?php else: ?>
                <?= jq_link_to_remote(__('Set as false profile to current user'),
                    array(
                        'update' => 'isf_'.$profile->getsfGuardUser()->getId(),
                        'url'    => 'user/isfalse?i='.$profile->getsfGuardUser()->getId()
                    ),array('style'=>'display: block; width: 160px; margin-bottom: 2px')
                ) ?>

            <?php endif; ?>
        </span>


                <p><?= link_to(__('Activation link'),'http://'.$_SERVER['HTTP_HOST'].'/'.$profile->getsfGuardUser()->getCulture().'/registration/activate?code='.$profile->getsfGuardUser()->getSalt(),array('style'=>'color: red'));?></p>


            </td>


            <td>

                <p><a style="display: block; width: 100px; margin-bottom: 2px" href="<?= url_for('profile/show?id='.$profile->getUserId()) ?>" id="dialog_link" class="ui-state-default ui-corner-all"><span class="ui-icon ui-icon-zoomin"></span><?= __('Show') ?></span></a></p>
                <p><a style="display: block; width: 100px; margin-bottom: 2px" href="<?= url_for('user/edit?id='.$profile->getUserId()) ?>" id="dialog_link" class="ui-state-default ui-corner-all"><span class="ui-icon ui-icon-pencil"></span><?= __('Edit') ?></span></a></p>

                <?php if($sf_user->hasCredential('partner')):?>
                    <p><a style="display: block; width: 100px; margin-bottom: 2px" href="<?= url_for('profile/addphoto?id='.$profile->getUserId()) ?>" id="dialog_link" class="ui-state-default ui-corner-all"><span class="ui-icon ui-icon-plusthick"></span><?= __('photo') ?></span></a></p>
                    <p><a style="display: block; width: 100px; margin-bottom: 2px" href="<?= url_for('profile/addvideo?id='.$profile->getUserId()) ?>" id="dialog_link" class="ui-state-default ui-corner-all"><span class="ui-icon ui-icon-plusthick"></span><?= __('video') ?></span></a></p>
                <?php endif; ?>

                <?php if($profile->getStatusId()!=1 and $sf_user->hasCredential('admin')):?>
                    <p><a style="display: block; width: 100px; margin-bottom: 2px" href="<?= url_for('user/activate?id='.$profile->getId()) ?>" id="dialog_link" class="ui-state-default ui-corner-all"><span class="ui-icon ui-icon-check"></span><?= __('Activate') ?></span></a></p>

                <?php endif; ?>

                <p><a style="display: block; width: 100px; margin-bottom: 2px" target="_blank" href="<?= url_for('http://'.$_SERVER['HTTP_HOST'].'/'.$profile->getsfGuardUser()->getCulture().'/profile/superlogin?salt='.$profile->getsfGuardUser()->getSalt()) ?>" id="dialog_link" class="ui-state-default ui-corner-all"><span class="ui-icon ui-icon-check"></span><?= __('Login under user') ?></span></a></p>

                <p><a style="display: block; width: 100px; margin-bottom: 2px" href="<?= url_for('user/inblack?id='.$profile->getId()) ?>" id="dialog_link" class="ui-state-default ui-corner-all"><span class="ui-icon ui-icon-check"></span><?= __(' Black list add/rem') ?></span></a></p>
                <p><a style="display: block; width: 100px; margin-bottom: 2px" href="<?= url_for('http://'.$_SERVER['HTTP_HOST'].'/admin.php/guarduser/'.$profile->getUserId().'/edit') ?>" id="dialog_link" class="ui-state-default ui-corner-all"><span class="ui-icon ui-icon-check"></span><?= __('Settings') ?></span></a></p>

            </td>

        <?php endif; ?>
        </tr>
    <?php endforeach; ?>
</table>

