 <form method="post" class="form_style validat" action="<?php echo url_for('registration/index') ?>">
            <?php echo $form->renderHiddenFields() ?>
            <?php echo $form->renderGlobalErrors() ?>
            <?php echo $form['_csrf_token']->render() ?>




            <div class="row">
                <?php echo $form['username']->renderLabel(null, array('style'=>'width: 100px','class' => 'required star short')) ?><span style="color: red">*</span>
                <?php echo $form['username'] ?>
                <?php echo $form['username']->renderError() ?>
            </div>

            <div class="row">
                <?php echo $form['password']->renderLabel(null, array('style'=>'width: 100px','class' => 'required star short')) ?><span style="color: red">*</span>
                <?php echo $form['password'] ?>
                <?php echo $form['username']->renderError() ?>
            </div>





            <div class="row">
                <?php echo $form['country']->renderLabel(null, array('style'=>'width: 100px','class' => 'required star short')) ?><span style="color: red">&nbsp;&nbsp;</span>
                <?php echo $form['country'] ?>
                <?php echo $form['country']->renderError() ?>
            </div>

            <div class="row">
                <?php echo $form['email']->renderLabel(null, array('style'=>'width: 100px','class' => 'required star short')) ?><span style="color: red">*</span>
                <?php echo $form['email'] ?>
                <?php echo $form['email']->renderError() ?>
            </div>

            <div class="row">
                <?php echo $form['birthday']->renderLabel(null, array('style'=>'width: 100px','class' => 'required star short')) ?><span style="color: red">*</span>
                <?php echo $form['birthday'] ?>
                <?php echo $form['birthday']->renderError() ?>
            </div>


            <div class="row">
                <?php echo $form['gender']->renderLabel(null, array('style'=>'width: 100px','class' => 'required star short')) ?><span style="color: red">*</span>
                <?php echo $form['gender'] ?>
                <?php echo $form['gender']->renderError() ?>
            </div>

            <div class="row">
                <?php echo $form['culture']->renderLabel(null, array('style'=>'width: 100px','class' => 'required star short')) ?><span style="color: red">&nbsp;&nbsp;</span>
                <?php echo $form['culture'] ?>
                <?php echo $form['culture']->renderError() ?>
            </div>

            <div class="row">
                <?php echo $form['captcha']->renderLabel(null, array('style'=>'width: 100px','class' => 'required star short')) ?><span style="color: red">*</span>
                <?php echo $form['captcha'] ?>
                <?php echo $form['captcha']->renderError() ?>
            </div>



            <?php // if($form->getObject()->getGender()=='m'):?>
            <div class="row" style="padding-left: 40px">
                 <?php echo $form['is_agree'] ?>
                 <?= link_to(__('I have read and fully understood the our-feeling.com terms and conditions'),'@page?alias=terms',array('target'=>'_blank'))?><span style="color: red">*</span>
                 <?php echo $form['is_agree']->renderError() ?>
            </div>
            <?php // endif; ?>


            <div class="row input_but" align="center">
                <input class="but" type="submit" value="<?php echo __('Register') ?>" />
            </div>

        </form>            