<div style="padding:15px 0; text-align:center">
    <a href="<?= url_for('message/personal') ?>"><span class=" title_2"><span class="but_2 "><?= __('My Mailbox') ?></span></span></a>
    <a href="<?= url_for('friend/index') ?>"><span class=" title_2"><span class="but_2 "><?= __('My Favorites')?></span></span></a>
    <a href="<?= url_for('search/index?is_online=on') ?>"><span class=" title_2"><span class="but_2 "><?= __('Online')?></span></span></a>
</div>

<div style="float:left; margin:0 20px 0 0; width:250px; padding-top: 40px">
    <img style="border:1px solid #fcecaa" src="<?= $p->getUrlImage() ?>">
    <?php if ($sf_user->isAuthenticated()): ?>
        <div style="margin:-5px 0 0 -5px; padding:0 0 5px 0; overflow:hidden; //zoom:1;">
            <?php if($photo): ?>
                <?php $counter=0 ?>
                <?php foreach($photo as $ph): ?>
                    <?php $counter++; ?>
                    <div style="width:80px; height:80px; float:left; text-align:center; background:url(/pic/tr_2.png) 0 0 repeat; margin:5px 0 0 5px"><?= link_to(image_tag('/uploads/photo/small_thumbnail/'.$ph->getImage(),array('class'=>'middle_inner')),'http://'.$_SERVER['HTTP_HOST'].'/uploads/photo/original/'.$ph->getImage(),array('class'=>'popup','rel'=>"group1")) ?></div>
                <?php endforeach ?>
                <?php if($cnt_photo>=5): ?>

                    <?php
                    $ps = Doctrine::getTable('Photo')
                        ->createQuery('a')
                        ->where('a.user_id=? and a.pub=?',array($p->getUserId(),true))
                        ->limit(5)
                        ->offset(5)
                        ->execute();
                    ?>
                    <?php $i=0 ?>
                    <?php foreach($ps as $pho): ?>

                        <?php if($i==0): ?>
                            <div style=" width:80px; height:80px; float:left; text-align:center; background:url(/pic/tr_2.png) 0 0 repeat; margin:5px 0 0 5px"><?= link_to(__('More photo'),'http://'.$_SERVER['HTTP_HOST'].'/uploads/photo/original/'.$pho->getImage(),array('class'=>'popup','rel'=>"group1",'style'=>'display: block; padding-top: 30px;')) ?></div>

                        <?php else: ?>
                            <div style="display: none;"><?= link_to(image_tag('/uploads/photo/small_thumbnail/'.$pho->getImage(),array('class'=>'middle_inner')),'http://'.$_SERVER['HTTP_HOST'].'/uploads/photo/original/'.$pho->getImage(),array('class'=>'popup','rel'=>"group1")) ?></div>
                        <?php endif; ?>

                        <?php $i++ ?>

                    <?php endforeach ?>

                <?php endif; ?>
            <?php endif; ?>
        </div>
    <?php endif; ?>
    <div>
        <?php if($video):?>
            <?php foreach($video as $v): ?>
                <!--
           <div>
               <div id="container_video_<?= $v->getId() ?>"><a href="http://www.macromedia.com/go/getflashplayer">Get the Flash Player</a></div>
               <script type="text/javascript" src="/js/swfobject.js"></script>
               <script type="text/javascript">
                   var s1 = new SWFObject("/js/player.swf","ply","250","199","9","#FFFFFF");
                   s1.addParam("allowfullscreen","true");
                   s1.addParam("allowscriptaccess","always");
                   s1.addParam("flashvars","file=/uploads/video/<?php echo $v->getFilePath() ?>&image=/uploads/video/skin.jpeg' ?>");
                   s1.write("container_video_<?= $v->getId() ?>");
               </script>
           </div>
           -->

                <div id="private_video<?= $v->getId()?>">

                    <div style="display: none; color: red; font-weight: bold;" id="private_video_loading<?= $v->getId()?>"> Loading.... </div>
                    <?php

                    echo jq_link_to_remote(image_tag('/images/no_videos.png'),
                        array(
                            'update' => 'private_video'.$v->getId(),
                            'loading' => '$("#private_video_loading'.$v->getId().'").show();',
                            'complete' => '$("#private_video_loading'.$v->getId().'").hide();',
                            'script'=>true,
                            'method'=>'GET',
                            'url' => 'myvideo/ashow?id='.$v->getId()
                        ),array('id'=>'vid_'.$v->getId()));

                    ?>
                </div>

            <?php if(isset($_SESSION['show_video_'.$v->getId()])): ?>
                <script type="text/javascript">
                    $('#vid_<?= $v->getId() ?>').click();
                </script>
            <?php endif; ?>
            <?php endforeach; ?>




        <?php endif; ?>
        <!--<iframe width="250" height="199" src="http://www.youtube.com/embed/q6E_0rAqdiQ?wmode=opaque" frameborder="0" allowfullscreen></iframe>-->
    </div>
</div>

<div style="overflow:hidden; //zoom:1;">
    <h1 align="center" style="margin-left:65px; position:relative; padding-right:65px;">
        <img src="/pic/t_left.png" style="position:absolute; left:-67px; bottom:0;"><?= $p->getFullName() ?></h1>
    <div class="pb10 overflow textcenter bb">
        <div style="width:46%; float:left; text-align:right; margin:0 2% 0 0;"><strong>ID: <?= $p->getUserSpecId() ?></strong></div>
        <?php include_partial('global/common/online_icon',array('guser'=>$p->getsfGuardUser())) ?>
    </div>
    <div class="pb10 pt10 overflow textcenter bb">

        <div style="width:32%; float:left; height:57px;">
            <?php if($p->getCert()): ?>
                <img src="/pic/sertified.png" class="middle_inner">
            <?php endif; ?>
        </div>

        <div style="width:33%; float:left; height:57px;">
            <?php if($is_birthday): ?>
                <b style="color: #fff; padding: 0 5px 0 5px; background: url('/images/butonline.gif')" class="middle_inner"><?= __('Now Birthday')?></b>
            <?php elseif($is_birthday_soon):?>
                <b style="color: #fff; padding: 0 5px 0 5px; background: url('/images/butonline.gif')" class="middle_inner"><?= __('Soon Birthday')?></b>
            <?php endif ?>
        </div>

        <div style="width:32%; float:left; height:57px;">
            <?php if(isset($isnew)): ?>
                <img src="/pic/icon_new2.png" class="middle_inner">
            <?php endif; ?>
        </div>
    </div>
    <div class="icon_pre_wrap2">
        <?php include_partial('global/common/chat_icon',array('p'=>$p)) ?>


        <!--
        <div class="icon_pre_item">
            <a href="#"><img src="/pic/icon_cam.png"></a>
        </div>
        -->
        <div class="icon_pre_item">
            <a href="<?= url_for('blacklist/adduser?username='.$p->getsfGuardUser()->getUsername()) ?>" title="<?= __('Add to blacklist') ?>"><img width="20" height="20" src="/sf/sf_admin/images/cancel.png"></a>
        </div>

        <div class="icon_pre_item">
            <a href="<?= url_for('message/send?username='.$p->getsfGuardUser()->getUsername()) ?>" title="<?= __('Send message') ?>"><img width="20" height="20" src="/pic/icon_nav_2.png"></a>
        </div>

        <div class="icon_pre_item">
            <a href="<?= url_for('interest/add?username='.$p->getsfGuardUser()->getUsername())?>" title="<?= __('Send interest') ?>"><img width="20" height="20" src="/pic/icon_nav_4.png"></a>
        </div>


        <div class="icon_pre_item">
            <a href="<?= url_for('friend/add?username='.$p->getsfGuardUser()->getUsername()) ?>" title="<?= __('Add to favorites') ?>"><img width="20" height="20" src="/pic/icon_nav_1.png"></a>
        </div>

        <div class="icon_pre_item">
            <a href="<?= url_for('scamer/index?id='.$p->getsfGuardUser()->getId()) ?>" title="<?= __('Claim') ?>"><img width="20" height="20" src="/sf/sf_admin/images/error.png"></a>
        </div>


        <?php if(isset($int)): ?>
            <span style="color: #FFB552"><?= $int ?></span>
        <?php endif; ?>

        <!--
        <div class="icon_pre_item">
            <a href="#"><img src="/pic/icon_nav_5.png"></a>
        </div>
        -->
    </div>

    <?php include_partial('global/common/user_information',array('p'=>$p,'arrc'=>$arrc)); ?>


</div>

<?php if ($sf_user->isAuthenticated()): ?>
    <div style="padding:15px 0 0 0;">

        <?php if(strlen($p->getIdealMatchDescription())>0):?>
            <div><span class="but_2_wrap title_1"><span class="but_2 block"><?= __('Информация о партнере') ?></span></span></div>
            <p><?= $p->getIdealMatchDescription() ?></p>
        <?php endif; ?>

        <?php if(strlen($p->getDescription())>0):?>
            <div><span class="but_2_wrap title_1"><span class="but_2 block"><?= __('Обо мне') ?></span></span></div>
            <p><?= $p->getDescription() ?></p>
        <?php endif; ?>

        <?php if(strlen($p->getHobbies())>0):?>
            <div><span class="but_2_wrap title_1"><span class="but_2 block"><?= __('Мое хобби') ?></span></span></div>
            <p><?= $p->getHobbies() ?></p>
        <?php endif; ?>

    </div>
<?php endif; ?>

<?php if(isset($matches)): ?>
    <div class="lady_list">
        <h1> <?= __('My matches') ?></h1>
        <div class="inner_page search">
            <?php foreach($matches as $m): ?>
                <?php include_partial('global/common/search_item',array('profile'=>$m->getFriend()->getProfile(),'arrc'=>$arrc)); ?>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>

<script type="text/javascript">
    $("a.popup").fancybox({
        'transitionIn' : 'none',
        'transitionOut' : 'none',
        'titlePosition' : 'inside',
        'titleFormat' : function(title, currentArray, currentIndex, currentOpts) {
            return '(' + (currentIndex + 1) + '/' + currentArray.length + ') ' + title;
        }
    });

</script>

<div style="clear: both"></div>

<?php if(count($similar)>0):?>

    <h1> <?= __('Similar profiles') ?></h1>
    <a name="sim"></a>




    <?php if(sfContext::getInstance()->getRequest()->getParameter('similar')=='all'): ?>

        <div>
            <?php foreach($similar as $profile): ?>
                <div style="float: left; padding: 5px;">
                    <a href="<?= url_for('profile/show?username='.$profile->getsfGuardUser()->getUsername()) ?>"><img class="lady_pic" src="<?= $profile->getUrlImageMiddle() ?>" alt="<?= $profile->getsfGuardUser()->getRealName() ?>"></a>
                </div>

            <?php endforeach; ?>
        </div>
        <div style="clear: both"></div>
    <?php else: ?>


        <ul id="similar_carousel" class="jcarousel-skin-similar" style="width: 800px">
            <?php foreach ($similar as $friend): ?>
                <?php $arr = array (__('Visit my profile'),__('Write to me'),__('Contact me')); ?>
                <li><a href="<?= url_for('profile/show?username='.$friend->getsfGuardUser()->getUsername())?>"><span class="joinMeBule"><?= $arr[rand(0,2)] ?></span><img src="<?= $friend->getUrlImageMiddle() ?>"></a></li>
            <?php endforeach; ?>
        </ul>


        <script type="text/javascript">

            $('#similar_carousel').jcarousel({
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
    <?php if(sfContext::getInstance()->getRequest()->getParameter('similar')=='all'): ?>
        <?= link_to(__('Gallery'),'profile/show?username='.$p->getsfGuardUser()->getUsername().'#sim',array('class'=>'but')) ?>
    <?php else: ?>
        <?= link_to(__('All profile'),'profile/show?username='.$p->getsfGuardUser()->getUsername().'&similar=all#sim',array('class'=>'but')) ?>
    <?php endif; ?>
</div>

<?php include_partial('global/common/forms/popup_register_form', array('p'=>$p)) ?>