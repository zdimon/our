<?php include_stylesheets_for_form($form) ?>
<?php include_javascripts_for_form($form) ?>

<?php $form->setDefault('relationship',myTools::db_array_field($form->getObject()->getRelationship())) ?>
<?php $form->setDefault('email',$form->getObject()->getsfGuardUser()->getEmail()) ?>

<div class="sf_admin_form">
  <?php echo form_tag_for($form, '@profile', array('class'=>'form_style')) ?>

    <div class="sf_admin_actions_block ui-widget">
      <?php include_partial('user/form_actions', array('profile' => $profile, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
    </div>

    <div class="ui-helper-clearfix"></div>
	
    <?php echo $form->renderHiddenFields() ?>

    <?php if ($form->hasGlobalErrors()): ?>
      <?php echo $form->renderGlobalErrors() ?>
    <?php endif; ?>

		
   	<?php echo $form->renderHiddenFields() ?>
		<?php echo $form->renderGlobalErrors() ?>
                <?php echo $form['_csrf_token']->render() ?>
                <?php $p = $form->getObject() ?>

<?php // echo $form ?>



    <div class="row">
         <?php echo $form['first_name']->renderLabel(null, array('class' => 'required star')) ?><span class="required">*</span>
          <?php echo $form['first_name'] ?>
          <span class="error"><?php echo $form['first_name']->renderError() ?></span>

     </div>

    <div class="row">
         <?php echo $form['last_name']->renderLabel(null, array('class' => 'required star')) ?><span class="required">*</span>
          <?php echo $form['last_name'] ?>
          <span class="error"><?php echo $form['last_name']->renderError() ?></span>
     </div>




      <div class="row">
          <?php echo $form['birthday']->renderLabel(null, array('class' => 'required star')) ?><span class="required">*</span>
          <?php echo $form['birthday'] ?>
          <span class="error">
            <?php echo $form['birthday']->renderError() ?></span>
      </div>


      <div class="row">
          <?php echo $form['city']->renderLabel(null, array('class' => 'required star')) ?><span class="required">*</span>
          <?php echo $form['city'] ?>
          <span class="error">
            <?php echo $form['city']->renderError() ?></span>
      </div>

      <div class="row">
		<?php echo $form['country']->renderLabel(null, array('class' => 'required star')) ?><span class="required">*</span>
		<?php echo $form['country'] ?>
		<span class="error">
		<?php echo $form['country']->renderError() ?></span>
      </div>

      <div class="row">
          <?php echo $form['height']->renderLabel(null, array('class' => 'required star')) ?><span class="required">*</span>
          <?php echo $form['height'] ?>
          <span class="error">
            <?php echo $form['height']->renderError() ?></span>
      </div>

      <div class="row">
          <?php echo $form['weight']->renderLabel(null, array('class' => 'required star')) ?>
          <?php echo $form['weight'] ?>
          <span class="error">
            <?php echo $form['weight']->renderError() ?></span>
      </div>


      <div class="row">
          <?php echo $form['eye_color']->renderLabel(null, array('class' => 'required star')) ?>
          <?php echo $form['eye_color'] ?>
          <span class="error">
                <?php echo $form['eye_color']->renderError() ?></span>
      </div>


      <div class="row">
          <?php echo $form['hair_color']->renderLabel(null, array('class' => 'required star')) ?>
          <?php echo $form['hair_color'] ?>
          <span class="error">
                <?php echo $form['hair_color']->renderError() ?></span>
      </div>


      <div class="row">
          <?php echo $form['hair_lenght']->renderLabel(null, array('class' => 'required star')) ?>
          <?php echo $form['hair_lenght'] ?>
          <span class="error">
                    <?php echo $form['hair_lenght']->renderError() ?></span>
      </div>


      <div class="row">
          <?php echo $form['marital_status']->renderLabel(null, array('class' => 'required star')) ?><span class="required">*</span>
          <?php echo $form['marital_status'] ?>
          <span class="error">
            <?php echo $form['marital_status']->renderError() ?></span>
      </div>

      <div class="row">
		<?php echo $form['children']->renderLabel(null, array('class' => 'required star')) ?><span class="required">*</span>
		<?php echo $form['children'] ?>
		<span class="error">
		<?php echo $form['children']->renderError() ?></span>
      </div>


      <div class="row">
		<?php echo $form['where_children']->renderLabel(null, array('class' => 'required star')) ?>
		<?php echo $form['where_children'] ?>
		<span class="error">
		<?php echo $form['where_children']->renderError() ?></span>
      </div>

      <div class="row">
		<?php echo $form['want_children']->renderLabel(null, array('class' => 'required star')) ?><span class="required">*</span>
		<?php echo $form['want_children'] ?>
		<span class="error">
		<?php echo $form['want_children']->renderError() ?></span>
      </div>

      <div class="row">
          <?php echo $form['contact_lenses']->renderLabel() ?>
          <?php echo $form['contact_lenses'] ?>
          <span class="error">
            <?php echo $form['contact_lenses']->renderError() ?></span>
      </div>


      <div class="row">
          <?php echo $form['religion']->renderLabel() ?>
          <?php echo $form['religion'] ?>
          <span class="error">
            <?php echo $form['religion']->renderError() ?></span>
      </div>


      <div class="row">
          <?php echo $form['education']->renderLabel(null, array('class' => 'required star')) ?><span class="required">*</span>
          <?php echo $form['education'] ?>
          <span class="error">
            <?php echo $form['education']->renderError() ?></span>
      </div>


      <div class="row">
		<?php echo $form['occupation']->renderLabel(null, array('class' => 'required star')) ?><span class="required">*</span>
		<?php echo $form['occupation'] ?>
		<span class="error">
		<?php echo $form['occupation']->renderError() ?></span>
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
		<span class="error">
		<?php echo $form['smoker']->renderError() ?></span>
      </div>

      <div class="row">
		<?php echo $form['drinker']->renderLabel() ?>
		<?php echo $form['drinker'] ?>
		<span class="error">
		<?php echo $form['drinker']->renderError() ?></span>
      </div>


      <div class="row">
          <?php echo $form['looking_for']->renderLabel() ?>
          <?php echo $form['looking_for'] ?>
          <span class="error">
            <?php echo $form['looking_for']->renderError() ?></span>
      </div>

      <div class="row">
          <?php echo $form['looking_for_role']->renderLabel() ?>
          <?php echo $form['looking_for_role'] ?>
          <span class="error">
            <?php echo $form['looking_for_role']->renderError() ?></span>
      </div>




<div class="fg-toolbar ui-widget-header ui-corner-all">
    <h1><?= __('Additional information') ?></h1>
</div>

   <?php foreach(myUser::getCultures() as $k=>$v): ?>
      <div class="row">
          <?php echo $form[$v]['description']->renderLabel(null, array('class' => 'required star')) ?><span class="required">*</span><span style="color: red"><?= $v ?></span>
          <?php echo $form[$v]['description'] ?>
          <span class="error">
            <?php echo $form[$v]['description']->renderError() ?></span>
      </div>

      <div class="row">
		<?php echo $form[$v]['hobbies']->renderLabel() ?><span style="color: red"><?= $v ?></span>
		<?php echo $form[$v]['hobbies'] ?>
		<span class="error">
		<?php echo $form[$v]['hobbies']->renderError() ?></span>
      </div>
   <?php endforeach; ?>
    
        <div class="row">
                <?php include_partial('keywords',array('id'=>1,'user'=>$form->getObject()->getsfGuardUser())) ?>
        </div>
        <div class="row">
                <?php include_partial('keywords',array('id'=>2,'user'=>$form->getObject()->getsfGuardUser())) ?>
        </div>    





  <div class="fg-toolbar ui-widget-header ui-corner-all">
      <h1><?= __('Contact information') ?></h1>
  </div>

  <div class="row">
      <?php echo $form['email']->renderLabel(null, array('class' => 'required star')) ?>
      <?php echo $form['email'] ?>
      <span class="error"><?php echo $form['email']->renderError() ?></span>
  </div>

      <div class="row">
                <div class="sub_row">
		<?php echo $form['mobile_phone']->renderLabel(null, array('class' => 'required star')) ?>
		<?php echo $form['mobile_phone'] ?>
		<span class="error">
		<?php echo $form['mobile_phone']->renderError() ?></span>
                </div>
                <div class="sub_row">
		<?php echo $form['phone2']->renderLabel() ?>
		<?php echo $form['phone2'] ?>
                </div>
      </div>

      <div class="row">
		<?php echo $form['adress']->renderLabel(null, array('class' => 'required star')) ?>
		<?php echo $form['adress'] ?>
		<span class="error">
		<?php echo $form['adress']->renderError() ?></span>
      </div>

      <div class="row">
		<?php echo $form['im']->renderLabel() ?>
		<?php echo $form['im'] ?>
		<span class="error">
		<?php echo $form['im']->renderError() ?></span>
      </div>

      <div class="row">
		<?php echo $form['icq']->renderLabel() ?>
		<?php echo $form['icq'] ?>
		<span class="error">
		<?php echo $form['icq']->renderError() ?></span>
      </div>

      <div class="row">
		<?php echo $form['msn']->renderLabel() ?>
		<?php echo $form['msn'] ?>
		<span class="error">
		<?php echo $form['msn']->renderError() ?></span>
      </div>

      <div class="row">
		<?php echo $form['skype']->renderLabel() ?>
		<?php echo $form['skype'] ?>
		<span class="error">
		<?php echo $form['skype']->renderError() ?></span>
      </div>
<div class="fg-toolbar ui-widget-header ui-corner-all">


    <h1><?= __('About partner') ?></h1>
</div>
      <div class="row">
                <div class="sub_row">
		<?php echo $form['looking_for_age_from']->renderLabel() ?>
		<?php echo $form['looking_for_age_from'] ?>
                <?php echo $form['looking_for_age_from']->renderError() ?>
                </div>
                <div class="sub_row">
		<?php echo $form['looking_for_age_to']->renderLabel() ?><span class="required">*</span>
		<?php echo $form['looking_for_age_to'] ?>
                <?php echo $form['looking_for_age_to']->renderError() ?>
                </div>
      </div>

     <?php foreach(myUser::getCultures() as $k=>$v): ?>
      <div class="row line">
          <?php echo $form[$v]['ideal_match_description']->renderLabel() ?> <span style="color: red"><?= $v ?></span>
          <?php echo $form[$v]['ideal_match_description'] ?>
          <span class="error">
            <?php echo $form[$v]['ideal_match_description']->renderError() ?></span>
      </div>
      <?php endforeach; ?>
    
        <div class="row">
                <?php include_partial('keywords',array('id'=>3,'user'=>$form->getObject()->getsfGuardUser())) ?>
        </div>


     <div class="row">
                <label><?= __('Scan copy of the passport') ?> </label>
		<?php echo $form['skan'] ?>
		<?php echo $form['skan']->renderError() ?>
      </div>


    
<!--
  <?php if($sf_user->hasCredential('admin')):?>
   <div class="fg-toolbar ui-widget-header ui-corner-all">
    <h1><?= __('Перевод в другое агенство') ?></h1>
   </div>

      <div class="row">
		<?php echo $form['partner_id']->renderLabel() ?>
		<?php echo $form['partner_id'] ?>

      </div>
<?php endif; ?>
-->

    <div class="sf_admin_actions_block ui-widget ui-helper-clearfix">
      <?php include_partial('user/form_actions', array('profile' => $profile, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
    </div>

  </form>
</div>

