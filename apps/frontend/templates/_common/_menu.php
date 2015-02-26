
<?php if ($sf_user->isAuthenticated()): ?>

<div style="display: inline-block; float: left; width: 200px">
    <a id="dialog_link"  style="display: block; width: 150px" href="<?=  url_for('@homepage') ?>" class="ui-state-default ui-corner-all"><span class="ui-icon ui-icon-person" ></span><span ><?= $sf_user->getGuardUser() ?> </span></a>

</div>




    <a tabindex="0" href="#search-engines" class="fg-button fg-button-icon-right ui-widget ui-state-default ui-corner-all" id="flat_add"><span class="ui-icon ui-icon-triangle-1-s"></span><?= __('Adding') ?></a>
    <div id="search-engines" style="display: none;">
        <ul>
            <?php if($sf_user->hasCredential('profile')): ?>
            <li><a href="<?=  url_for('user/new') ?>" class="ui-state-default ui-corner-all"><?= __('Add girl') ?></a></li>
            <?php endif; ?>
            
            <?php if($sf_user->hasCredential('news')): ?>
            <li><a href="<?=  url_for('news/new') ?>" class="ui-state-default ui-corner-all"><?= __('Add news') ?></a></li>
            <?php endif; ?>

            <?php if($sf_user->hasCredential('testimonials')): ?>
            <li><a href="<?=  url_for('testimonials/new') ?>" class="ui-state-default ui-corner-all"><?= __('Add Testimonials') ?></a></li>
            <?php endif; ?>
            
        </ul>
    </div>


    <a tabindex="0" href="#content-engines" class="fg-button fg-button-icon-right ui-widget ui-state-default ui-corner-all" id="flat_content"><span class="ui-icon ui-icon-triangle-1-s"></span><?= __('Content') ?></a>
    <div id="content-engines" style="display: none;">
        <ul>
            <?php if($sf_user->hasCredential('page')): ?>
            <li><a  href="<?=  url_for('page/index') ?>" class="ui-state-default ui-corner-all"><?= __('Pages') ?></a></li>
            <?php endif; ?>
            
            <?php if($sf_user->hasCredential('testimonials')): ?>
            <li><a href="<?=  url_for('testimonials/index') ?>" class="ui-state-default ui-corner-all"><?= __('Testimonials') ?></a></li>
            <?php endif; ?>
            
            <?php if($sf_user->hasCredential('news')): ?>
            <li><a href="<?=  url_for('news/index') ?>" class="ui-state-default ui-corner-all"><?= __('News') ?></a></li>
            <?php endif; ?>
            
            <?php if($sf_user->hasCredential('faq')): ?>
            <li><a href="<?=  url_for('faq/index') ?>" class="ui-state-default ui-corner-all"><?= __('FAQ') ?></a></li>
            <?php endif; ?>
            
            <?php if($sf_user->hasCredential('scamer')): ?>
            <li><a href="<?=  url_for('scamer_report/index') ?>" class="ui-state-default ui-corner-all"><?= __('Scamer reports') ?></a></li>
            <?php endif; ?>
            
            <?php if($sf_user->hasCredential('mycity')): ?>
            <li><a tabindex="0" href="<?=  url_for('my_city/index') ?>" class="fg-button fg-button-icon-right ui-widget ui-state-default ui-corner-all" ><?= __('My place') ?></a></li>
            <?php endif; ?>
            
            <?php if($sf_user->hasCredential('mycountry')): ?>
            <li><a tabindex="0" href="<?=  url_for('my_country/index') ?>" class="fg-button fg-button-icon-right ui-widget ui-state-default ui-corner-all" ><?= __('My country') ?></a></li>
            <?php endif; ?>

             
        </ul>
    </div>


    <a tabindex="0" href="#user-engines" class="fg-button fg-button-icon-right ui-widget ui-state-default ui-corner-all" id="flat_user"><span class="ui-icon ui-icon-triangle-1-s"></span><?= __('Users') ?></a>
    <div id="user-engines" style="display: none;">
        <ul>
            <?php if($sf_user->hasCredential('profile')): ?>
            <li><a  href="<?=  url_for('trprofile/index') ?>" class="ui-state-default ui-corner-all"><?= __('Translate profiles') ?></a></li>
            <?php endif; ?>
            
            <?php if($sf_user->hasCredential('profile')): ?>
            <li><a  href="<?=  url_for('user/index') ?>" class="ui-state-default ui-corner-all"><?= __('Ankets') ?></a></li>
            <?php endif; ?>
            
            <?php if($sf_user->hasCredential('profile')): ?>
            <li><a  href="<?=  url_for('user/gallery?gender=m') ?>" class="ui-state-default ui-corner-all"><?= __('Man gallery') ?></a></li>
            <?php endif; ?>
            
            <?php if($sf_user->hasCredential('profile')): ?>
            <li><a  href="<?=  url_for('user/gallery?gender=w') ?>" class="ui-state-default ui-corner-all"><?= __('Woman gallery') ?></a></li>
            <?php endif; ?>            
            
            <?php if($sf_user->hasCredential('photo')): ?>
            <li><a  href="<?=  url_for('photo/index') ?>" class="ui-state-default ui-corner-all"><?= __('Photos') ?></a></li>
            <?php endif; ?>
            
            <?php if($sf_user->hasCredential('video')): ?>
            <li><a  href="<?=  url_for('video/index') ?>" class="ui-state-default ui-corner-all"><?= __('Videos') ?></a></li>
            <?php endif; ?>
            
            <?php if($sf_user->hasCredential('message')): ?>
            <li><a  href="<?=  url_for('message/index') ?>" class="ui-state-default ui-corner-all"><?= __('Messages') ?></a></li>
            <?php endif; ?>
            
            <?php if($sf_user->hasCredential('permission')): ?>
            <li><a  href="<?=  url_for('guarduser/index') ?>" class="ui-state-default ui-corner-all"><?= __('Permissions') ?></a></li>
            <?php endif; ?>
            
            
                   
            
        </ul>
    </div>


    <a tabindex="0" href="#setting-engines" class="fg-button fg-button-icon-right ui-widget ui-state-default ui-corner-all" id="flat_setting"><span class="ui-icon ui-icon-triangle-1-s"></span><?= __('Settings') ?></a>
    <div id="setting-engines" style="display: none;">
        <ul>
            <?php if($sf_user->hasCredential('setting')): ?>
            <li><a  href="<?=  url_for('settings/index') ?>" class="ui-state-default ui-corner-all"><?= __('Site') ?></a></li>
            <?php endif; ?>
            
            <?php if($sf_user->hasCredential('notice')): ?>
            <li><a  href="<?=  url_for('notify/index') ?>" class="ui-state-default ui-corner-all"><?= __('Notice') ?></a></li>
            <?php endif; ?>
            
            <?php if($sf_user->isSuperAdmin()): ?>
            <li><a  href="<?=  url_for('profile_packet/index') ?>" class="ui-state-default ui-corner-all"><?= __('Membership') ?></a></li>
            <?php endif; ?>
            
            <?php if($sf_user->hasCredential('seo')): ?>
            <li><a  href="<?=  url_for('seo/index') ?>" class="ui-state-default ui-corner-all"><?= __('SEO') ?></a></li>
            <?php endif; ?>
            
            <?php if($sf_user->hasCredential('liqpay')): ?>
            <li><a  href="<?=  url_for('liqpay/index') ?>" class="ui-state-default ui-corner-all"><?= __('Liqpay log') ?></a></li>
            <?php endif; ?>
            
            <?php if($sf_user->hasCredential('keywords')): ?>
            <li><a  href="<?=  url_for('keyword/index') ?>" class="ui-state-default ui-corner-all"><?= __('Keywords') ?></a></li>
            <?php endif; ?>
            
            
            <?php if($sf_user->hasCredential('price')): ?>
            <li><a  href="<?=  url_for('billingtype/index') ?>" class="ui-state-default ui-corner-all"><?= __('Price') ?></a></li>
            <?php endif; ?>
            
            
            
        </ul>
    </div>

    <?php if($sf_user->hasCredential('newsletter')): ?>
    <a tabindex="0" href="#setting-letter" class="fg-button fg-button-icon-right ui-widget ui-state-default ui-corner-all" id="flat_letter"><span class="ui-icon ui-icon-triangle-1-s"></span><?= __('Letters') ?></a>
    <div id="setting-letter" style="display: none;">
        <ul>
            <li><a  href="<?=  url_for('newuserletter/index') ?>" class="ui-state-default ui-corner-all"><?= __('Newsletter') ?></a></li>
            <li><a  href="<?=  url_for('mailer/index') ?>" class="ui-state-default ui-corner-all"><?= __('Sending') ?></a></li>
        </ul>
    </div>
    <?php endif; ?>

    <?php if($sf_user->hasCredential('forum')): ?>
    <a tabindex="0" href="#setting-letter" class="fg-button fg-button-icon-right ui-widget ui-state-default ui-corner-all" id="flat_forum"><span class="ui-icon ui-icon-triangle-1-s"></span><?= __('Forum') ?></a>
    <div id="setting-letter" style="display: none;">
        <ul>
            <li><a  href="<?=  url_for('forum_category/index') ?>" class="ui-state-default ui-corner-all"><?= __('Categories') ?></a></li>
            <li><a  href="<?=  url_for('forum_topic/index') ?>" class="ui-state-default ui-corner-all"><?= __('Topics') ?></a></li>
        </ul>
    </div>
    <?php endif; ?>

    
    <?php if($sf_user->hasCredential('chat')): ?>
    <a tabindex="0" href="#setting-chat" class="fg-button fg-button-icon-right ui-widget ui-state-default ui-corner-all" id="flat_chat"><span class="ui-icon ui-icon-triangle-1-s"></span><?= __('Chat') ?></a>
    <div id="setting-chat" style="display: none;">
        <ul>
            <li><a  href="<?=  url_for('chat_chanel/index') ?>" class="ui-state-default ui-corner-all"><?= __('Video chanels') ?></a></li>
            <li><a  href="<?=  url_for('chat_room/index') ?>" class="ui-state-default ui-corner-all"><?= __('Users rooms') ?></a></li>
        </ul>
    </div>
    <?php endif; ?>
    
    <?php if($sf_user->isSuperAdmin()): ?>
    <a tabindex="0" href="#setting-staff"  class="fg-button fg-button-icon-right ui-widget ui-state-default ui-corner-all" id="flat_staff"><span class="ui-icon ui-icon-triangle-1-s"></span><?= __('Staff') ?></a>
    <div id="setting-staff" style="display: none;">
        <ul>
            <li><a  href="<?=  url_for('staff/index') ?>" class="ui-state-default ui-corner-all"><?= __('Staff') ?></a></li>
            <li><a  href="<?=  url_for('sfGuardGroup/index') ?>" class="ui-state-default ui-corner-all"><?= __('Users group') ?></a></li>
            <li><a  href="<?=  url_for('sfGuardPermission/index') ?>" class="ui-state-default ui-corner-all"><?= __('Users permissions') ?></a></li>
        </ul>
    </div>
    <?php endif; ?>
    
    <?php elseif($sf_user->hasCredential('redaktor')):?>
        <a tabindex="0" href="<?=  url_for('trprofile/index') ?>" class="fg-button fg-button-icon-right ui-widget ui-state-default ui-corner-all" ><?= __('Translate profiles') ?></a>
        <a tabindex="0" href="<?=  url_for('notify/index') ?>" class="fg-button fg-button-icon-right ui-widget ui-state-default ui-corner-all" ><?= __('Translate notice') ?></a>
        <a tabindex="0" href="<?=  url_for('page/index') ?>" class="fg-button fg-button-icon-right ui-widget ui-state-default ui-corner-all" ><?= __('Pages') ?></a>
        <a tabindex="0" href="<?=  url_for('faq/index') ?>" class="fg-button fg-button-icon-right ui-widget ui-state-default ui-corner-all" ><?= __('FAQ') ?></a>
       
    <?php endif ?>



<div style="float: right">

    <a  style="display: block; width: 100px" href="<?=  url_for('@sf_guard_signout') ?>" id="dialog_link" class="ui-state-default ui-corner-all"><span class="ui-icon ui-icon-power"></span><?= __('Exit') ?></a>
</div>

