<?php if(isset($tab2)):?>
<script>
    $(function() {
        tab = $( "#tabs" ).tabs();
        tab.tabs('select' , 1);
    });
</script>
<?php else: ?>
<script>
    $(function() {
        tab = $( "#tabs" ).tabs();

    });

</script>
<?php endif; ?>

<h1> <?= __('Редактирование профайла') ?></h1>

    <?php if($form->hasErrors()):?>
        <div class="ui-widget">
            <div class="ui-state-error ui-corner-all" style="padding: 0 .7em;">
                <p><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .7em;"></span>
                    <strong><?= __('Error') ?>:</strong> <?= __('Chek you form please! Any fields contains wrong or not enought date.') ?> </p>

            </div>
        </div>
    <?php endif; ?>

<form  enctype="multipart/form-data" method="post" class="form_style" action="<?php echo url_for('profile/edit?id='.$form->getObject()->getUserId()) ?>">
	
		<?php echo $form->renderHiddenFields() ?>
		<?php echo $form->renderGlobalErrors() ?>
                <?php echo $form['_csrf_token']->render() ?>
                <?php $p = $form->getObject() ?>
<?php $form->setDefault('relationship',myTools::db_array_field($form->getObject()->getRelationship())) ?>
<?php // echo $form ?>

        <div id="tabs">

        <ul>
            <li><a id="tab_1" href="#tabs-1"><?= __('Personal settings') ?></a></li>
            <li><a id="tab_2" href="#tabs-2"><?= __('Additional settings') ?></a></li>
        </ul>

        <div id="tabs-1">

            <div class="form_title"><?= __('Персональные данные') ?></div>

            <div class="row line">
                 <label> <?= __('Логин') ?> </label>
                 <span class="static_text"><?= $p->getsfGuardUser()->getUserName()?> </span>

             </div>

             <div class="row">
                  <label> <?= __('Пароль') ?> </label>
                  <span class="static_text"><?= $p->getsfGuardUser()->getPc()?> </span>
             </div>

            <div class="row">
                <label> <?= __('Birthday') ?> </label>
                <span class="static_text"><?= format_date($p->getsfGuardUser()->getProfile()->getBirthday(),'D')?> </span>
            </div>

            <div class="row">
                <label> <?= __('Age') ?> </label>
                <span class="static_text"><?= $p->getsfGuardUser()->getProfile()->getAge()?> </span>
            </div>

            <div class="row">
                <label> <?= __('Zodiac') ?> </label>
                <span class="static_text"><?= image_tag('/images/zodiac/'.$p->getsfGuardUser()->getProfile()->getZodiac().'.gif')?> </span>
            </div>


            <div class="row">
                 <?php echo $form['first_name']->renderLabel(null, array('class' => 'required star')) ?><span class="required">*</span>
                  <?php echo $form['first_name'] ?>
                  <?php echo $form['first_name']->renderError() ?>

             </div>

            <div class="row">
                 <?php echo $form['last_name']->renderLabel(null, array('class' => 'required star')) ?><span class="required">*</span>
                  <?php echo $form['last_name'] ?>
                  <?php echo $form['last_name']->renderError() ?>
             </div>


              <div class="row">
                 <?php echo $form['real_name']->renderLabel(null, array('class' => 'required star')) ?><span class="required">*</span>
                  <?php echo $form['real_name'] ?>
                  <?php echo $form['real_name']->renderError() ?>
              <span class="help"><?= __('Показывается на сайте') ?></span>
             </div>




            <div class="row">
                <?php echo $form['city']->renderLabel(null, array('class' => 'required star')) ?><span class="required">*</span>
                <?php echo $form['city'] ?>
                <?php echo $form['city']->renderError() ?>
            </div>

              <div class="row">
                <?php echo $form['country']->renderLabel(null, array('class' => 'required star')) ?><span class="required">*</span>
                <?php echo $form['country'] ?>

                <?php echo $form['country']->renderError() ?>
              </div>


            <div class="row">
                <?php echo $form['height']->renderLabel(null, array('class' => 'required star')) ?><span class="required">*</span>
                <?php echo $form['height'] ?>
                <?php echo $form['height']->renderError() ?>
            </div>

            <div class="row">
                <?php echo $form['weight']->renderLabel(null, array('class' => 'required star')) ?><span class="required">*</span>
                <?php echo $form['weight'] ?>
                <?php echo $form['weight']->renderError() ?>
            </div>

            <div class="row">
                <?php echo $form['eye_color']->renderLabel(null, array('class' => 'required star')) ?><span class="required">*</span>
                <?php echo $form['eye_color'] ?>
                <?php echo $form['eye_color']->renderError() ?>
            </div>

            <div class="row">
                <?php echo $form['hair_color']->renderLabel(null, array('class' => 'required star')) ?><span class="required">*</span>
                <?php echo $form['hair_color'] ?>
                <?php echo $form['hair_color']->renderError() ?>
            </div>


            <div class="row">
                <?php echo $form['hair_lenght']->renderLabel(null, array('class' => 'required star')) ?><span class="required">*</span>
                <?php echo $form['hair_lenght'] ?>
                <?php echo $form['hair_lenght']->renderError() ?>
            </div>

            <div class="row">
                <?php echo $form['body_type']->renderLabel(null, array('class' => 'required star')) ?>
                <?php echo $form['body_type'] ?>
                <?php echo $form['body_type']->renderError() ?>
            </div>


            <div class="row">
                <?php echo $form['ethnicity']->renderLabel() ?>
                <?php echo $form['ethnicity'] ?>
                <?php echo $form['ethnicity']->renderError() ?>
            </div>

            <div class="row">
                <?php echo $form['marital_status']->renderLabel(null, array('class' => 'required star')) ?>
                <?php echo $form['marital_status'] ?>
                <?php echo $form['marital_status']->renderError() ?>
            </div>



              <div class="row">
                <?php echo $form['children']->renderLabel(null, array('class' => 'required star')) ?>
                <?php echo $form['children'] ?>
                <?php echo $form['children']->renderError() ?>
              </div>


              <div class="row">
                <?php echo $form['where_children']->renderLabel(null, array('class' => 'required star')) ?>
                <?php echo $form['where_children'] ?> (<?= __('если есть') ?>)
                <?php echo $form['where_children']->renderError() ?>
              </div>

              <div class="row">
                <?php echo $form['want_children']->renderLabel(null, array('class' => 'required star')) ?>
                          <?php if($p->getGender()=='w'):?>
                           <span class="required">*</span>
                          <?php endif ?>

                <?php echo $form['want_children'] ?>
                <?php echo $form['want_children']->renderError() ?>
              </div>



            <div class="row">
                <?php echo $form['contact_lenses']->renderLabel(null, array('class' => 'required star')) ?>
                <?php echo $form['contact_lenses'] ?>
                <?php echo $form['contact_lenses']->renderError() ?>
            </div>

            <div class="row">
                <?php echo $form['religion']->renderLabel() ?>
                <?php echo $form['religion'] ?>
                <?php echo $form['religion']->renderError() ?>
            </div>


            <div class="row">
                <?php echo $form['education']->renderLabel(null, array('class' => 'required star')) ?>
                <?php echo $form['education'] ?>
                <?php echo $form['education']->renderError() ?>
            </div>

            <div class="row">
                <?php echo $form['occupation']->renderLabel(null, array('class' => 'required star')) ?>
                <?php echo $form['occupation'] ?>
                <?php echo $form['occupation']->renderError() ?>
            </div>


            <div class="row">
                <div class="sub_row">
                    <?php echo $form['language1']->renderLabel() ?>
                    <?php echo $form['language1'] ?>
                </div>
                <div class="sub_row">
                    <?php echo $form['language_skill1']->renderLabel() ?>
                    <?php echo $form['language_skill1'] ?>
                </div>
            </div>


            <div class="row">
                <div class="sub_row">
                    <?php echo $form['language2']->renderLabel() ?>
                    <?php echo $form['language2'] ?>
                </div>
                <div class="sub_row">
                    <?php echo $form['language_skill2']->renderLabel() ?>
                    <?php echo $form['language_skill2'] ?>
                </div>
            </div>


            <div class="row">
                <div class="sub_row">
                    <?php echo $form['language3']->renderLabel() ?>
                    <?php echo $form['language3'] ?>
                </div>
                <div class="sub_row">
                    <?php echo $form['language_skill3']->renderLabel() ?>
                    <?php echo $form['language_skill3'] ?>
                </div>
            </div>




              <div class="row">
                <?php echo $form['smoker']->renderLabel() ?>
                <?php echo $form['smoker'] ?>
                <?php echo $form['smoker']->renderError() ?>
              </div>

              <div class="row">
                <?php echo $form['drinker']->renderLabel() ?>
                <?php echo $form['drinker'] ?>
                <?php echo $form['drinker']->renderError() ?>
              </div>


            <div class="row">
                <?php echo $form['looking_for']->renderLabel() ?>
                <?php echo $form['looking_for'] ?>
                <?php echo $form['looking_for']->renderError() ?>
            </div>

            <div class="row">
                <?php echo $form['looking_for_role']->renderLabel() ?>
                <?php echo $form['looking_for_role'] ?>
                <?php echo $form['looking_for_role']->renderError() ?>
            </div>



        <div class="form_title"><?= __('Контактные данные') ?></div>

            <div class="row line">
                 <label> <?= __('Email') ?> </label>
                 <span class="static_text"><?= $p->getsfGuardUser()->getEmail()?> </span>
             </div>




              <div class="row">
                <?php echo $form['notify_me_about_news']->renderLabel() ?>
                <?php echo $form['notify_me_about_news'] ?>
                <?php echo $form['notify_me_about_news']->renderError() ?>
              </div>



            <div class="form_title"><?= __('О партнере') ?></div>

              <div class="row">
                        <div class="sub_row">
                   <?php echo $form['looking_for_age_from']->renderLabel() ?>
                          <?php if($p->getGender()=='w'):?>
                           <span class="required">*</span>
                          <?php endif ?>
                   <?php echo $form['looking_for_age_from'] ?>
                           <?php echo $form['looking_for_age_from']->renderError() ?>
                        </div>
                        <div class="sub_row">
                <?php echo $form['looking_for_age_to']->renderLabel() ?>
                          <?php if($p->getGender()=='w'):?>
                           <span class="required">*</span>
                          <?php endif ?>
                <?php echo $form['looking_for_age_to'] ?>
                           <?php echo $form['looking_for_age_to']->renderError() ?>
                        </div>
              </div>



         </div>

        <div id="tabs-2">

            <div class="row">
                <?php echo $form['description']->renderLabel(null, array('class' => 'required star')) ?>
                <?php echo $form['description'] ?>
                <?php echo $form['description']->renderError() ?>
            </div>


            <div class="row">
                <?php echo $form['ideal_match_description']->renderLabel(null, array('class' => 'required star')) ?>
                <?php if($p->getGender()=='w'):?>
                <span class="required">*</span>
                <?php endif ?>

                <?php echo $form['ideal_match_description'] ?>
                <?php echo $form['ideal_match_description']->renderError() ?>
            </div>

            <div class="row">
                <?php echo $form['hobbies']->renderLabel(null, array('class' => 'required star')) ?>
                <?php echo $form['hobbies'] ?>
                <?php echo $form['hobbies']->renderError() ?>
            </div>


        </div>





        <br />
        <div class="row input_but" align="center">
            <input type="submit"  class="but" value="<?php echo __('Сохранить') ?>" />
        </div>
   </div>

</form>




