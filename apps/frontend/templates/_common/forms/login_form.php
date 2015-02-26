 <?php $form = new sfGuardFormSignin() ?>
 <p align="center"><span class="but_2_wrap block "><span class="but_2 block"><?= __('Login') ?></span></span></p>



    <form method="post" action="<?php echo url_for('@sf_guard_signin') ?>" class="form_style f_quick_search textright">
        <?php echo $form['_csrf_token']->render() ?>
        <div class="row"><label><?= __('Login') ?></label><span class="r">&nbsp;</span><input style="width: 100px" type="text" name="signin[username]"  value="" /></div>
        <div class="row"><label><?= __('Password') ?></label><span class="r">&nbsp;</span><input  style="width: 100px" type="password" name="signin[password]" value="" /></div>

        <div class="row">  <?= link_to(__('Forgot password?'),'lostpassword/index') ?></div>
            <div class="row">
                <label></label>
                <input class="ch" type="checkbox" />
                <label for="wp" style="width:98px"><?= __('Remember me') ?></label>
            </div>


        <div class="row textright">
            <div class="floatleft textleft size12"></div>
            <input class="but" value="<?= __('Enter') ?>" type="submit" />
        </div>

      </form>

