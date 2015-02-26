<?php $lform = new sfGuardFormSignin() ?>
<form method="post" action="<?php echo url_for('@sf_guard_signin') ?>" class="form_style f_quick_search textright">
    <?php echo $lform['_csrf_token']->render() ?>

    <div class="pb25 italic size18 bold"><?= __('Member area')?></div>
    <div class="pb25 italic bold"><label class="sUser_label"><?= __('Login') ?></label><input style="width: 100px" type="text" name="signin[username]"  value="" /></div>
    <div class="pb25 italic bold"><label class="sUser_label"><?= __('Password') ?></label> <input  style="width: 100px" type="password" name="signin[password]" value="" /></div>
    <div class="pb25 italic">
        <input type="submit" class="sUser_but" value="<?= __('Enter')?>">
</form>