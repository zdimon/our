
<h1><?= __('Registration') ?></h1>


<form method="post" class="form_style validat"  action="<?php echo url_for('registration/index') ?>" enctype="multipart/form-data" >
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
                        <?php echo $form['first_name']->renderLabel(null, array('style'=>'width: 100px','class' => 'required star short')) ?><span style="color: red">*</span>
                        <?php echo $form['first_name'] ?>
                        <?php echo $form['first_name']->renderError() ?>
                    </div>


                    <div class="row">
                        <?php echo $form['last_name']->renderLabel(null, array('style'=>'width: 100px','class' => 'required star short')) ?><span style="color: red">*</span>
                        <?php echo $form['last_name'] ?>
                        <?php echo $form['last_name']->renderError() ?>
                    </div>




                    <div class="row">
                        <?php echo $form['city']->renderLabel(null, array('style'=>'width: 100px','class' => 'required star short')) ?><span style="color: red">*</span>
                        <?php echo $form['city'] ?>
                        <?php echo $form['city']->renderError() ?>
                    </div>

                    <div class="row">
                        <?php echo $form['height']->renderLabel(null, array('style'=>'width: 100px','class' => 'required star short')) ?><span style="color: red">*</span>
                        <?php echo $form['height'] ?>
                        <?php echo $form['height']->renderError() ?>
                    </div>


                    <div class="row">
                        <?php echo $form['body_type']->renderLabel(null, array('style'=>'width: 100px','class' => 'required star short')) ?><span style="color: red">*</span>
                        <?php echo $form['body_type'] ?>
                        <?php echo $form['body_type']->renderError() ?>
                    </div>


                    <div class="row">
                        <?php echo $form['eye_color']->renderLabel(null, array('style'=>'width: 100px','class' => 'required star short')) ?><span style="color: red">*</span>
                        <?php echo $form['eye_color'] ?>
                        <?php echo $form['eye_color']->renderError() ?>
                    </div>


                    <div class="row">
                        <?php echo $form['hair_lenght']->renderLabel(null, array('style'=>'width: 100px','class' => 'required star short')) ?><span style="color: red">*</span>
                        <?php echo $form['hair_lenght'] ?>
                        <?php echo $form['hair_lenght']->renderError() ?>
                    </div>


                    <div class="row">
                        <?php echo $form['hair_color']->renderLabel(null, array('style'=>'width: 100px','class' => 'required star short')) ?><span style="color: red">*</span>
                        <?php echo $form['hair_color'] ?>
                        <?php echo $form['hair_color']->renderError() ?>
                    </div>




                    <div class="row">
                        <?php echo $form['smoker']->renderLabel(null, array('style'=>'width: 100px','class' => 'required star short')) ?><span style="color: red">*</span>
                        <?php echo $form['smoker'] ?>
                        <?php echo $form['smoker']->renderError() ?>
                    </div>


                    <div class="row">
                        <?php echo $form['drinker']->renderLabel(null, array('style'=>'width: 100px','class' => 'required star short')) ?><span style="color: red">*</span>
                        <?php echo $form['drinker'] ?>
                        <?php echo $form['drinker']->renderError() ?>
                    </div>


                    <div class="row">
                        <?php echo $form['hobbies']->renderLabel(null, array('style'=>'width: 100px','class' => 'required star short')) ?><span style="color: red">*</span>
                        <?php echo $form['hobbies'] ?>
                        <?php echo $form['hobbies']->renderError() ?>
                    </div>



                    <div class="row">
                        <?php echo $form['about_me']->renderLabel(null, array('style'=>'width: 100px','class' => 'required star short')) ?><span style="color: red">*</span>
                        <?php echo $form['about_me'] ?>
                        <?php echo $form['about_me']->renderError() ?>
                    </div>


                    <div class="row">
                        <?php echo $form['about_partner']->renderLabel(null, array('style'=>'width: 100px','class' => 'required star short')) ?><span style="color: red">*</span>
                        <?php echo $form['about_partner'] ?>
                        <?php echo $form['about_partner']->renderError() ?>
                    </div>

                    <div class="row">
                        <?php echo $form['image']->renderLabel(null, array('style'=>'width: 100px','class' => 'required star short')) ?><span style="color: red">*</span>
                        <?php echo $form['image'] ?>
                        <?php echo $form['image']->renderError() ?>
                    </div>




                   <div class="row">
                        <?php echo $form['image1']->renderLabel(null, array('style'=>'width: 100px','class' => 'required star short')) ?>
                        <?php echo $form['image1'] ?>
                        <?php echo $form['image1']->renderError() ?>
                    </div>



                   <div class="row">
                        <?php echo $form['image2']->renderLabel(null, array('style'=>'width: 100px','class' => 'required star short')) ?>
                        <?php echo $form['image2'] ?>
                        <?php echo $form['image2']->renderError() ?>
                    </div>




                   <div class="row">
                        <?php echo $form['image3']->renderLabel(null, array('style'=>'width: 100px','class' => 'required star short')) ?>
                        <?php echo $form['image3'] ?>
                        <?php echo $form['image3']->renderError() ?>
                    </div>



                   <div class="row">
                        <?php echo $form['image4']->renderLabel(null, array('style'=>'width: 100px','class' => 'required star short')) ?>
                        <?php echo $form['image4'] ?>
                        <?php echo $form['image4']->renderError() ?>
                    </div>



                   <div class="row">
                        <?php echo $form['image5']->renderLabel(null, array('style'=>'width: 100px','class' => 'required star short')) ?>
                        <?php echo $form['image5'] ?>
                        <?php echo $form['image5']->renderError() ?>
                    </div>



                   <div class="row">
                        <?php echo $form['image6']->renderLabel(null, array('style'=>'width: 100px','class' => 'required star short')) ?>
                        <?php echo $form['image6'] ?>
                        <?php echo $form['image6']->renderError() ?>
                    </div>



                   <div class="row">
                        <?php echo $form['image7']->renderLabel(null, array('style'=>'width: 100px','class' => 'required star short')) ?>
                        <?php echo $form['image7'] ?>
                        <?php echo $form['image7']->renderError() ?>
                    </div>



                   <div class="row">
                        <?php echo $form['image8']->renderLabel(null, array('style'=>'width: 100px','class' => 'required star short')) ?>
                        <?php echo $form['image8'] ?>
                        <?php echo $form['image8']->renderError() ?>
                    </div>


                   <div class="row">
                        <?php echo $form['image9']->renderLabel(null, array('style'=>'width: 100px','class' => 'required star short')) ?>
                        <?php echo $form['image9'] ?>
                        <?php echo $form['image9']->renderError() ?>
                    </div>










                    <div class="row">
                        <?php include_partial('keywords',array('id'=>1)) ?>
                   </div>

                      <div class="row">
                        <?php include_partial('keywords',array('id'=>3)) ?>
                   </div>

                   <div class="row">
                        <?php include_partial('keywords',array('id'=>2)) ?>
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


                    <div  align="center">
                        <input class="" style="width: 180px; height: 30px" type="submit" value="<?php echo __('Register') ?>" />
                    </div>

                    <div  style="text-align: center">
                        <h2 style=" color: red; padding-left: 80px"><?php echo __('Totally free for women') ?> / Совершенно бесплатно для женщин</h3>
                    </div>


                </form>

