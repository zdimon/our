<?php $lform = new sfGuardFormSignin() ?>
<form method="post" action="<?php echo url_for('@sf_guard_signin') ?>">
    <?php echo $lform['_csrf_token']->render() ?>

    <div class="pb25 italic size18 bold"><?= __('Member area')?></div>
    <div class="pb25 italic bold"><label class="sUser_label"><?= __('Login') ?></label> <input  class="sUser_i"  type="text" name="signin[username]"  value="" /></div>
    <div class="pb25 italic bold"><label class="sUser_label"><?= __('Password') ?></label> <input  class="sUser_i"  type="password" name="signin[password]" value="" /></div>
    <div class="pb25 italic">
        <input type="submit" class="sUser_but" value="<?= __('Enter')?>">
    </div>
</form>

<div style='display:none'>
    <div id="inline_content">



        <h3><?= __('Terms and conditions') ?></h3>

        <?= $page->getIcontent(ESC_RAW) ?>

    </div>
</div>
</div>

<img src="/pic/logo_2.png" alt="" class="logo_2">
<img src="/pic/open_heart.png" alt="" class="open_heart">
<a href="#inline_content"  class="three_days" id="formregs"></a>
<div class="s_text">
    <div class="s_text_poss">
        <?= __('The text of the ad unit') ?>
    </div>
    <img src="/pic/iphone_decor.png" alt="" class="iphone_decor">
    <div class="s_copy"><span class="s_copy_text"><?= __('Copyright © 2012 Our-Feeling')?></span></div>
</div>

</div>
</div>

<script type="text/javascript">

    $(".three_days").colorbox({open: true, inline:true, width:"50%"});

</script>
