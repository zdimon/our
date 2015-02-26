<?php include_partial('global/assets') ?>
<h1> <?= __('Редактирование профайла') ?></h1>

<div class="sf_admin_container">
    <form method="post" class="form_style" action="<?php echo url_for('profile/edit?id='.$form->getObject()->getUserId()) ?>" enctype="multipart/form-data">
	
		<?php echo $form->renderHiddenFields() ?>
		<?php echo $form->renderGlobalErrors() ?>
                <?php echo $form['_csrf_token']->render() ?>
                <?php $p = $form->getObject() ?>
 <?php $form->setDefault('relationship',myTools::db_array_field($form->getObject()->getRelationship())) ?>
    
<?php // echo $form ?>

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
         <?php echo $form['real_name']->renderLabel(null, array('class' => 'required star')) ?><span class="required">*</span>
          <?php echo $form['real_name'] ?>
          <span class="error"><?php echo $form['real_name']->renderError() ?></span>
		  <div class="help"><?= __('Показывается на сайте') ?></div>
     </div>

    
      <div class="row">
		<?php echo $form['country']->renderLabel(null, array('class' => 'required star')) ?><span class="required">*</span>
		<?php echo $form['country'] ?>
		<span class="error">
		<?php echo $form['country']->renderError() ?></span>
      </div>

      <div class="row">
		<?php echo $form['city']->renderLabel(null, array('class' => 'required star')) ?><span class="required">*</span>
		<?php echo $form['city'] ?>
		<span class="error">
		<?php echo $form['city']->renderError() ?></span>
      </div>

      <div class="row">
		<?php echo $form['zip']->renderLabel(null, array('class' => 'required star')) ?><span class="required">*</span>
		<?php echo $form['zip'] ?>
		<span class="error">
		<?php echo $form['zip']->renderError() ?></span>
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
		<?php echo $form['birthday']->renderLabel(null, array('class' => 'required star')) ?><span class="required">*</span>
		<?php echo $form['birthday'] ?>
		<span class="error">
		<?php echo $form['birthday']->renderError() ?></span>
      </div>

      <div class="row">
		<?php echo $form['height']->renderLabel(null, array('class' => 'required star')) ?><span class="required">*</span>
		<?php echo $form['height'] ?>
		<span class="error">
		<?php echo $form['height']->renderError() ?></span>
      </div>



      <div class="row">
		<?php echo $form['body_type']->renderLabel(null, array('class' => 'required star')) ?><span class="required">*</span>
		<?php echo $form['body_type'] ?>
		<span class="error">
		<?php echo $form['body_type']->renderError() ?></span>
      </div>


      <div class="row">
		<?php echo $form['ethnicity']->renderLabel() ?>
		<?php echo $form['ethnicity'] ?>
		<span class="error">
		<?php echo $form['ethnicity']->renderError() ?></span>
      </div>


      <div class="row">
		<?php echo $form['religion']->renderLabel() ?>
		<?php echo $form['religion'] ?>
		<span class="error">
		<?php echo $form['religion']->renderError() ?></span>
      </div>


      <div class="row">
		<?php echo $form['marital_status']->renderLabel(null, array('class' => 'required star')) ?><span class="required">*</span>
		<?php echo $form['marital_status'] ?>
		<span class="error">
		<?php echo $form['marital_status']->renderError() ?></span>
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
		<?php echo $form['education']->renderLabel(null, array('class' => 'required star')) ?><span class="required">*</span>
		<?php echo $form['education'] ?>
		<span class="error">
		<?php echo $form['education']->renderError() ?></span>
      </div>


      <div class="row">
		<?php echo $form['income']->renderLabel() ?>
		<?php echo $form['income'] ?>
		<span class="error">
		<?php echo $form['income']->renderError() ?></span>
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
		<?php echo $form['headline']->renderLabel() ?>
		<?php echo $form['headline'] ?>
		<span class="error">
		<?php echo $form['headline']->renderError() ?></span>
      </div>


      <div class="row">
		<?php echo $form['description']->renderLabel(null, array('class' => 'required star')) ?><span class="required">*</span>
		<?php echo $form['description'] ?>
		<span class="error">
		<?php echo $form['description']->renderError() ?></span>
      </div>



<div class="form_title"><?= __('Контактные данные') ?></div>

    <div class="row line">
         <label> <?= __('Email') ?> </label>
         <span class="static_text"><?= $p->getsfGuardUser()->getEmail()?> </span>
     </div>




      <div class="row">
		<?php echo $form['notify_me_about_news']->renderLabel() ?>
		<?php echo $form['notify_me_about_news'] ?>
		<span class="error">
		<?php echo $form['notify_me_about_news']->renderError() ?></span>
      </div>

<div class="form_title"><?= __('Дополнительные контактные данные') ?></div>

      <div class="row line">
		<?php echo $form['homepage']->renderLabel() ?>
		<?php echo $form['homepage'] ?>
		<span class="error">
		<?php echo $form['homepage']->renderError() ?></span>
      </div>

      <div class="row">
                <div class="sub_row">
		<?php echo $form['mobile_phone']->renderLabel(null, array('class' => 'required star')) ?><span class="required">*</span>
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
		<?php echo $form['adress']->renderLabel(null, array('class' => 'required star')) ?><span class="required">*</span>
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

    <div class="form_title"><?= __('О партнере') ?></div>

      <div class="row">
                <div class="sub_row">
		<?php echo $form['looking_for_age_from']->renderLabel() ?>
		<?php echo $form['looking_for_age_from'] ?>
                </div>
                <div class="sub_row">
		<?php echo $form['looking_for_age_to']->renderLabel() ?>
		<?php echo $form['looking_for_age_to'] ?>
                </div>
      </div>

      <div class="row line">
		<?php echo $form['looking_for_a_height']->renderLabel() ?>
		<?php echo $form['looking_for_a_height'] ?>
		<span class="error">
		<?php echo $form['looking_for_a_height']->renderError() ?></span>
      </div>

      <div class="row">
		<?php echo $form['looking_for_a_body_type']->renderLabel() ?>
		<?php echo $form['looking_for_a_body_type'] ?>
		<span class="error">
		<?php echo $form['looking_for_a_body_type']->renderError() ?></span>
      </div>

      <div class="row">
		<?php echo $form['relationship']->renderLabel(null, array('class' => 'required star')) ?><span class="required">*</span>
		<?php echo $form['relationship'] ?>
		<span class="error">
		<?php echo $form['relationship']->renderError() ?></span>
      </div>

      <div class="row">
		<?php echo $form['ideal_match_description']->renderLabel(null, array('class' => 'required star')) ?><span class="required">*</span>
		<?php echo $form['ideal_match_description'] ?>
		<span class="error">
		<?php echo $form['ideal_match_description']->renderError() ?></span>
      </div>

     
      <div class="row">
		<?php echo $form['can_resive_gift']->renderLabel(null, array('class' => 'required star')) ?>
		<?php echo $form['can_resive_gift'] ?>
      </div>

      <div class="row">
		<?php echo $form['subtype']->renderLabel() ?>
		<?php echo $form['subtype'] ?>

      </div>

      <div class="row">
		<?php echo $form['rating']->renderLabel() ?>
		<?php echo $form['rating'] ?>

      </div>

        <div class="row input_but">
             <input type="submit"  class="but_style" value="<?php echo __('Сохранить') ?>" />
        </div>


   

</form>

</div


<?= $form ?>