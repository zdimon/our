<h1><?= __('Welcome in your area')?>: <?= $sf_user->getGuardUser()->getProfile()->getFullName()?> [<?= $sf_user->getGuardUser()->getId() ?>]  </h1>
<div style="margin:0 0 0 -13px;overflow:hidden; //zoom:1;">
    <div style="width:48%; float:left; margin:0 0 0 13px;">
        <div><span class="but_2_wrap title_1 all_w"><span class="but_2 block"><?= __('Your membership') ?></span></span></div>
        <table class="table1" width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <th><?= __('Date of registration') ?></th>
                <td><?= format_date($sf_user->getGuardUser()->getCreatedAt(),'D');?></td>
            </tr>
            <?php if(($sf_user->getGuardUser()->getGender()=='m')): ?>
            <tr>
                <th><?= __('You are member') ?></th>
                <td><?= $sf_user->getGuardUser()->getProfile()->getNameMembership()  ?></td>
            </tr>
            <tr>
                <th><?= __('Your membersip will expire') ?></th>
                <td><?= format_date($sf_user->getGuardUser()->getDateExpire(),'D')?></td>
            </tr>
            <tr>
                <th><?= __('You account') ?></th>
                <td><?= $sf_user->getGuardUser()->getProfile()->getAccount();?></td>
            </tr>
            <tr>
                <th><?= link_to(__('Bye credit'),'account/index') ?></th>
                <td><?= __('Authomatic credit options') ?></td>
            </tr>
            <tr>
                <th><?= link_to(__('Purchase historic'),'account/history') ?></th>
                <td><?= __('Other options') ?></td>
            </tr>
            <?php endif; ?>

        </table>

        <div><span class="but_2_wrap title_1 all_w"><span class="but_2 block"><?= __('Profile information')?></span></span></div>
        <table class="table1" width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <th><?php echo link_to(__('Edit profile'),'profile/edit?id='.$sf_user->getGuardUser()->getId())?></th>
                <th><?php echo link_to(__('Vew my profile'),'profile/my') ?></td>
            </tr>
            <tr>
                <th><?= link_to(__('Chanche password'),'profile/password') ?></th>
                <th><?php echo link_to(__('Add/chanche photos'),'myphoto/index')?></th>
            </tr>
            <tr>
                <th><?= link_to(__('Delete membership'),'profile/delete', array('confirm'=>__('Are you sure?'))) ?></th>
                <th>

                      <!-- <?php echo link_to(__('Add/chanche videos'),'myvideo/index')?> -->


                </th>
            </tr>
        </table>

        <div><span class="but_2_wrap title_1 all_w"><span class="but_2 block"><?= __('Subscribe')?></span></span></div>
        <table class="table1" width="100%" border="0" cellspacing="0" cellpadding="0">
            <form action="<?= url_for('profile/setsub?sub_newsletter=true')?>" method="GET">
                <tr>
                    <th><label for="sub_newsletter"> <?= __('Subscribe newsletter') ?></label></th>
                    <th><input id="sub_newsletter" onchange="form.submit()" type="checkbox" <?php if($sf_user->getGuardUser()->getProfile()->getSubNewsletter()) { echo "checked"; } ?> name="sub_newsletter" > </td>
                </tr>
            </form>
            <form action="<?= url_for('profile/setsub?sub_fav=true')?>" method="GET">
            <tr>
                <th><label for="sub_fav"><?= __('Notify me when member add me to favorites') ?></label></th>
                <th><input id="sub_fav" onchange="form.submit()" type="checkbox" <?php if($sf_user->getGuardUser()->getProfile()->getSubFav()) { echo "checked"; } ?> name="sub_fav" > </td>
            </tr>
            </form>
            <form action="<?= url_for('profile/setsub?sub_interest=true')?>" method="GET">
            <tr>
                <th><label for="sub_interest"><?= __('Notify me when member send me interest') ?></label></th>
                <th><input id="sub_interest" onchange="form.submit()" type="checkbox" <?php if($sf_user->getGuardUser()->getProfile()->getSubInterest()) { echo "checked"; } ?> name="sub_interest" > </td>
            </tr>
            </form>
            <form action="<?= url_for('profile/setsub?sub_message=true')?>" method="GET">
            <tr>
                <th><label for="sub_message"><?= __('Notify me when member send me letter') ?></label></th>
                <th><input id="sub_message" onchange="form.submit()" type="checkbox" <?php if($sf_user->getGuardUser()->getProfile()->getSubMessage()) { echo "checked"; } ?> name="sub_message" > </td>
            </tr>
            </form>
        </table>


    </div>

    <div style="width:48%; float:left; margin:0 0 0 13px;">
        <div><span class="but_2_wrap title_1 all_w"><span class="but_2 block"><?= __('Your private area')?></span></span></div>
        <table class="table1" width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <th><?= link_to(__('All messages'),'message/index') ?></th>
                <td><?= MessageTable::getCount($sf_user->getGuardUser())?> (<?= HotlistTable::getCntActive($sf_user->getGuardUser())?>)</td>
            </tr>
            <tr>
                <th><?= link_to(__('New messages'),'message/index') ?></th>
                <td><?= MessageTable::getCountNew($sf_user->getGuardUser())?></td>
            </tr>
            <tr>
                <th><?php echo link_to(__('My Favorites'),'friend/index')?></th>
                <td> <?= FriendTable::getCnt($sf_user->getGuardUser())?> </td>
            </tr>
            
            <tr>
                <th><?= link_to(__('My matches'),'matches/index') ?></th>
                <td><?= FriendTable::getCntMatches($sf_user->getGuardUser())?></td>
            </tr>
            <tr>
                <th><?php echo link_to(__('Who Interest me'),'interest/index')?></th>
                <td> <?= InterestTable::getCnt($sf_user->getGuardUser())?> </td>
            </tr>
            <tr>
                <th><?php echo link_to(__('Who Viewed me'),'viewed/index')?></th>
                <td> <?= ViewedTable::getCnt($sf_user->getGuardUser())?> </td>
            </tr>

            <tr>
                <th><?php echo link_to(__('My blacklist'),'blacklist/index')?></th>
                <td><?= BlacklistTable::getCnt($sf_user->getGuardUser())?></td>
            </tr>
            
           <tr>
                <th><?php echo link_to(__('Whom did I invite'),'appointment/index')?></th>
                <td><?= ChatAppointmentTable::getMyCnt($sf_user->getGuardUser())?></td>
            </tr>
            
           <tr>
                <th><?php echo link_to(__('Who did invite me'),'appointment/my')?></th>
                <td><?= ChatAppointmentTable::getMeCnt($sf_user->getGuardUser())?></td>
            </tr>
            
            
        </table>

        <!--<div><span class="but_2_wrap title_1 all_w"><span class="but_2 block"><?= __('Help?, FAQs')?></span></span></div>
        <table class="table1" width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <th><?= link_to(__('FAQ'),'faq/index')?></th>
                <td></td>
            </tr>
        </table>
        -->

        <div><span class="but_2_wrap title_1 all_w"><span class="but_2 block"><?= __('Forum') ?></span></span></div>
        <table class="table1" width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <th><?= link_to(__('Forum'),'sfForumCategory/index')?></th>
                <td><?= sfForumMessageTable::getCount() ?> <?= __('messages') ?></td>
            </tr>
           
        </table>
    </div>
</div>



<?php if(count($recomendated)>0):?>
<h1> <?= __('Recomendated profiles') ?></h1>
<a name="sim"></a>
<?php if(sfContext::getInstance()->getRequest()->getParameter('recomendated')=='all'): ?>
    <div>
        <?php foreach($recomendated as $profile): ?>
        <div style="float: left; padding: 5px;">
            <a href="<?= url_for('profile/show?username='.$profile->getsfGuardUser()->getUsername()) ?>"><img class="lady_pic" src="<?= $profile->getUrlImageMiddle() ?>" alt="<?= $profile->getsfGuardUser()->getRealName() ?>"></a>
        </div>

        <?php endforeach; ?>
    </div>
    <div style="clear: both"></div>
    <?php else: ?>

            <ul id="recomendated_carousel" class="jcarousel-skin-similar" style="width: 800px">
                <?php foreach ($recomendated as $friend): ?>
                  <?php $arr = array (__('Visit my profile'),__('Write to me'),__('Contact me')); ?>
                  <li><a href="<?= url_for('profile/show?username='.$friend->getsfGuardUser()->getUsername())?>"><span class="joinMeBule"><?= $arr[rand(0,2)] ?></span><img src="<?= $friend->getUrlImageMiddle() ?>"></a></li>
                <?php endforeach; ?>
            </ul>



            <script type="text/javascript">

                $('#recomendated_carousel').jcarousel({
                    wrap: 'circular',
                    scroll:2,
                    visible:4,
                    auto:3,
                    animation:1000,
                    buttonNextHTML:null,
                    buttonPrevHTML:null,
                    initCallback: function(jc, state) {
                        if (state == 'init') {
                            jc.startAutoOrig = jc.startAuto;
                            jc.startAuto = function() {
                                if (!jc.paused) {
                                    jc.startAutoOrig();
                                }
                            }
                            jc.pause = function() {
                                jc.paused = true;
                                jc.stopAuto();
                            };
                            jc.play = function() {
                                jc.paused = false;
                                jc.startAuto();
                            };
                            $('li.jcarousel-item').mouseover(function() {
                                jc.pause();
                                $('.joinMeBule',this).show();
                            });
                            $('li.jcarousel-item').mouseout(function() {
                                jc.play();
                                $('.joinMeBule',this).hide()
                            });
                        }
                        jc.play();
                    }
                });

            </script>

    <?php endif; ?>

<?php endif; ?>


<div align="center">
    <?php if(sfContext::getInstance()->getRequest()->getParameter('recomendated')=='all'): ?>
    <?= link_to(__('Gallery'),'profile/member#sim',array('class'=>'but')) ?>
    <?php else: ?>
    <?= link_to(__('All profile'),'profile/member?recomendated=all#sim',array('class'=>'but')) ?>
    <?php endif; ?>
</div>

    <?php if($sf_user->isSuperAdmin()): ?>
     <?= link_to(__('Translate addition page'),'mainpage/trans') ?>
   <?php endif; ?>
