<div style="padding:15px 0; text-align:center">
    <a href="<?= url_for('message/personal') ?>"><span class=" title_2"><span class="but_2 "><?= __('My Mailbox') ?></span></span></a>
    <a href="<?= url_for('friend/index') ?>"><span class=" title_2"><span class="but_2 "><?= __('My Favorites')?></span></span></a>
    <a href="<?= url_for('search/index?online=true') ?>"><span class=" title_2"><span class="but_2 "><?= __('Online')?></span></span></a>
</div>

<div style="float:left; margin:0 20px 0 0; width:250px;">
    <img style="border:1px solid #fcecaa" src="<?= $p->getUrlImage() ?>">
    <div style="margin:-5px 0 0 -5px; padding:0 0 5px 0; overflow:hidden; //zoom:1;">
        <?php if($photo): ?>
            <?php foreach($photo as $ph): ?>
             <div style="width:80px; height:80px; float:left; text-align:center; background:url(/pic/tr_2.png) 0 0 repeat; margin:5px 0 0 5px"><?= link_to(image_tag('/uploads/photo/small_thumbnail/'.$ph->getImage(),array('class'=>'middle_inner')),'http://'.$_SERVER['HTTP_HOST'].'/uploads/photo/original/'.$ph->getImage(),array('class'=>'popup','rel'=>"group1")) ?></div>
            <?php endforeach ?>
            <?php if($cnt_photo>5): ?>
            <div style=" width:80px; height:80px; float:left; text-align:center; background:url(/pic/tr_2.png) 0 0 repeat; margin:5px 0 0 5px"><?= link_to(__('More photo'),'http://'.$_SERVER['HTTP_HOST'].'/uploads/photo/original/'.$ph->getImage(),array('class'=>'popup','rel'=>"group1",'style'=>'display: block; padding-top: 30px;')) ?></div>
            <?php endif; ?>
        <?php endif; ?>
    </div>
    <div>
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


    <?php include_partial('global/common/user_information',array('p'=>$p,'arrc'=>$arrc)); ?>


</div>

    <div style="clear: both"></div>

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


<?php if(count($matches)>0): ?>




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

