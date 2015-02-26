<?php

/**
 * Profile form.
 *
 * @package    levandos
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ProfileForm extends BaseProfileForm
{
  public function configure()
  {
   

              unset(
                        $this['i_can_receive'],
                        $this['with_photo'],
                        $this['with_video'],
                        $this['created_at'],
                        $this['is_online'],
                        $this['updated_at'],
			            $this['user_id'],
                        $this['gender'],
                        $this['photo'],
                        $this['is_active'],
                        $this['is_new_message'],
                        $this['is_new_favorite'],
                        $this['is_new_request'],
                        $this['is_new_gift'],
                        $this['is_new_hotlist'],
                        $this['is_new_friend'],
                        $this['status_id'],
                        $this['is_empty'],
                        $this['scamer'],
                        $this['sub_message'],
                        $this['sub_interest'],
                          $this['sub_fav'],
                          $this['sub_newsletter'],
                          $this['cur_abonent'],
                          $this['max_abonent'],
                          $this['packet_id'],
                    $this['is_camera'],
                    $this['is_chat'],
			           $this['algorithm']
		);

      if (sfContext::hasInstance())
      {
         if(!sfContext::getInstance()->getUser()->hasCredential('admin'))
         {
            unset(
                    $this['partner_id']
                  );

         }
         else {
                       $q = Doctrine::getTable('sfGuardUser')->createQuery('a')
                       ->where('a.is_partner=? and a.is_active=?',array(true,true))
                       ->execute();
                       $arr = array('0'=>'выберите новое агенство');
                       foreach($q as $w)
                       {
                           $arr[$w->getId()] = $w->getUsername().' ['.$w->getId().']';
                       }
                      $this->widgetSchema['partner_id'] = new sfWidgetFormChoice(array('multiple'=>false, 'expanded' => false, 'choices'=>$arr));
        }


      }

      $this->widgetSchema['height'] = new sfWidgetFormChoice(array('expanded'=>false,'choices' => myUser::getHeight()));
      $this->widgetSchema['birthday'] =  new sfWidgetFormI18nDate(array('culture' =>sfContext::getInstance()->getUser()->getCulture(),'years' => myUser::getYears()));
      $this->widgetSchema['body_type'] = new sfWidgetFormChoice(array('expanded'=>false,'choices' => myUser::getVes()));
 

      $this->widgetSchema['headline'] =  new sfWidgetFormInput(array(),array('style'=>'width: 300px'));
     // $this->widgetSchema['gender'] = new sfWidgetFormChoice(array('expanded'=>false,'choices' => myUser::getGender()));
      $this->widgetSchema['country'] =  new sfWidgetFormI18nChoiceCountry(array('culture' =>sfContext::getInstance()->getUser()->getCulture()),array('style'=>'width: 250px'));
      $this->widgetSchema['children'] = new sfWidgetFormChoice(array('expanded'=>false,'choices' => myUser::getChildren()));
      $this->widgetSchema['where_children'] = new sfWidgetFormChoice(array('expanded'=>false,'choices' => myUser::getWhereChildren()));
      $this->widgetSchema['want_children'] = new sfWidgetFormChoice(array('expanded'=>false,'choices' => myUser::getWantChildren()));
      $this->widgetSchema['ethnicity'] = new sfWidgetFormChoice(array('expanded'=>false,'choices' => myUser::getEthnicity()));
      $this->widgetSchema['religion'] = new sfWidgetFormChoice(array('expanded'=>false,'choices' => myUser::getReligion()));
      $this->widgetSchema['marital_status'] = new sfWidgetFormChoice(array('expanded'=>false,'choices' => myUser::getMaritalStatus()));
      $this->widgetSchema['language1'] = new sfWidgetFormChoice(array('expanded'=>false,'choices' => myUser::getLanguage()));
      $this->widgetSchema['language2'] = new sfWidgetFormChoice(array('expanded'=>false,'choices' => myUser::getLanguage()));
      $this->widgetSchema['language3'] = new sfWidgetFormChoice(array('expanded'=>false,'choices' => myUser::getLanguage()));
      $this->widgetSchema['language_skill1'] = new sfWidgetFormChoice(array('expanded'=>false,'choices' => myUser::getLanguageSkills()));
      $this->widgetSchema['language_skill2'] = new sfWidgetFormChoice(array('expanded'=>false,'choices' => myUser::getLanguageSkills()));
      $this->widgetSchema['language_skill3'] = new sfWidgetFormChoice(array('expanded'=>false,'choices' => myUser::getLanguageSkills()));
      $this->widgetSchema['education'] = new sfWidgetFormChoice(array('expanded'=>false,'choices' => myUser::getEducation()));
      $this->widgetSchema['income'] = new sfWidgetFormChoice(array('expanded'=>false,'choices' => myUser::getIncome()));
      $this->widgetSchema['smoker'] = new sfWidgetFormChoice(array('expanded'=>false,'choices' => myUser::getSmoker()));
      $this->widgetSchema['drinker'] = new sfWidgetFormChoice(array('expanded'=>false,'choices' => myUser::getDrinker()));
      $this->widgetSchema['im'] = new sfWidgetFormChoice(array('expanded'=>false,'choices' => myUser::getIm()));
      $this->widgetSchema['i_look_for_a'] = new sfWidgetFormChoice(array('expanded'=>false,'choices' => myUser::getGender()));
      $this->widgetSchema['looking_for_age_from'] = new sfWidgetFormChoice(array('expanded'=>false,'choices' => myUser::getAge()),array('style'=>'width: 70px'));
      $this->widgetSchema['looking_for_age_to'] = new sfWidgetFormChoice(array('expanded'=>false,'choices' => myUser::getAge()),array('style'=>'width: 70px'));
      $this->widgetSchema['looking_for_a_height_from'] = new sfWidgetFormChoice(array('expanded'=>false,'choices' => myUser::getHeight()),array('style'=>'width: 70px'));
      $this->widgetSchema['looking_for_a_height_to'] = new sfWidgetFormChoice(array('expanded'=>false,'choices' => myUser::getHeight()),array('style'=>'width: 70px'));
      $this->widgetSchema['looking_for_a_body_type_from'] = new sfWidgetFormChoice(array('expanded'=>false,'choices' => myUser::getVes()),array('style'=>'width: 70px'));
      $this->widgetSchema['looking_for_a_body_type_to'] = new sfWidgetFormChoice(array('expanded'=>false,'choices' => myUser::getVes()),array('style'=>'width: 70px'));
      $this->widgetSchema['relationship'] = new sfWidgetFormChoice(array('multiple'=>true,'expanded'=>true,'choices' => myUser::getRelationship()));
      //$this->widgetSchema['i_can_receive'] = new sfWidgetFormChoice(array('multiple'=>true,'expanded'=>true,'choices' => myUser::getIcanRecive()));



      $this->widgetSchema['eye_color'] = new sfWidgetFormChoice(array('expanded'=>false,'choices' => myUser::getEyeColor()));
      $this->widgetSchema['weight'] = new sfWidgetFormChoice(array('expanded'=>false,'choices' => myUser::getWeight()));
      $this->widgetSchema['hair_lenght'] = new sfWidgetFormChoice(array('expanded'=>false,'choices' => myUser::getHairLenght()));
      $this->widgetSchema['hair_color'] = new sfWidgetFormChoice(array('expanded'=>false,'choices' => myUser::getHairColor()));
      $this->widgetSchema['looking_for'] = new sfWidgetFormChoice(array('expanded'=>false,'choices' => myUser::getGender()));
      $this->widgetSchema['looking_for_role'] = new sfWidgetFormChoice(array('expanded'=>false,'choices' => myUser::getLookingForRole()));

   
      if($this->getObject()->getId()>0)
      {
      }
      else
      {
        
      $this->validatorSchema['first_name'] = new sfValidatorString(array('required' => true),array('required'=>__('Поле обязательно.')));
      $this->validatorSchema['last_name'] = new sfValidatorString(array('required' => true),array('required'=>__('Поле обязательно.')));
      $this->validatorSchema['real_name'] = new sfValidatorString(array('required' => true),array('required'=>__('Поле обязательно.')));
      $this->validatorSchema['country'] = new sfValidatorString(array('required' => true),array('required'=>__('Поле обязательно.')));
      $this->validatorSchema['city'] = new sfValidatorString(array('required' => true),array('required'=>__('Поле обязательно.')));
      $this->validatorSchema['children'] = new sfValidatorString(array('required' => true),array('required'=>__('Поле обязательно.')));
      //$this->validatorSchema['where_children'] = new sfValidatorString(array('required' => true),array('required'=>__('Поле обязательно.')));
      $this->validatorSchema['want_children'] = new sfValidatorString(array('required' => true),array('required'=>__('Поле обязательно.')));
      $this->validatorSchema ['birthday'] = new sfValidatorDate();
      $this->validatorSchema['height'] = new sfValidatorString(array('required' => true),array('required'=>__('Поле обязательно.')));
    //  $this->validatorSchema['body_type'] = new sfValidatorString(array('required' => true),array('required'=>__('Поле обязательно.')));
      $this->validatorSchema['marital_status'] = new sfValidatorString(array('required' => true),array('required'=>__('Поле обязательно.')));
      $this->validatorSchema['occupation'] = new sfValidatorString(array('required' => true),array('required'=>__('Поле обязательно.')));
      $this->validatorSchema['education'] = new sfValidatorString(array('required' => true),array('required'=>__('Поле обязательно.')));
     // $this->validatorSchema['description'] = new sfValidatorString(array('required' => true),array('required'=>__('Поле обязательно.')));
     // $this->validatorSchema['mobile_phone'] = new sfValidatorString(array('required' => true),array('required'=>__('Поле обязательно.')));
      $this->validatorSchema['looking_for_age_from'] = new sfValidatorNumber(array('required' => true),array('required'=>__('Поле обязательно.')));
      $this->validatorSchema['looking_for_age_to'] = new sfValidatorNumber(array('required' => true),array('required'=>__('Поле обязательно.')));
     // $this->validatorSchema['relationship'] = new sfValidatorString(array('required' => true),array('required'=>__('Поле обязательно.')));
     // $this->validatorSchema['ideal_match_description'] = new sfValidatorString(array('required' => true),array('required'=>__('Поле обязательно.')));

      //$this->validatorSchema['adress'] = new sfValidatorString(array('required' => true),array('required'=>__('Поле обязательно.')));


   //   $this->validatorSchema['weight'] = new sfValidatorString(array('required' => true),array('required'=>__('Поле обязательно.')));

      }
        $this->widgetSchema['skan'] =  new sfWidgetFormInputFile();


        $this->validatorSchema ['skan'] = new sfValidatorFile ( array ('required' => false,
        'path' => sfConfig::get ( 'sf_web_dir' ) . '/uploads/photo',
        'mime_types' => 'web_images', 'max_size' => 4000000,
            ) ,
        array ('invalid' => 'Неверный формат файла.',
         'required' => 'Выберите изображение.',
          'max_size' => 'Максимальный размер файла изображения 4 мегабайта',
         'mime_types' => 'Изображение должно быть изображением.' )
        );


      $this->widgetSchema['email'] = new sfWidgetFormInput();
      //$this->validatorSchema['email'] = new sfValidatorEmail(array('required' => true),array('required'=>__('Поле обязательно.')));
      $this->validatorSchema->setOption('allow_extra_fields', true);


      $custom_decorator = new sfWidgetFormSchemaFormatterDefList($this->getWidgetSchema());
      $this->getWidgetSchema()->addFormFormatter('deflist', $custom_decorator);
      $this->getWidgetSchema()->setFormFormatterName('deflist');


      $this->embedI18n(myUser::getCultures());

//      $this->validatorSchema->setPostValidator(new sfValidator(array(new sfValidatorCallback(array(
//        'callback' => array($this, 'sfGuardValidatorAge')
//      )))));

$this->validatorSchema->setPostValidator(
  new sfValidatorSchemaCompare('looking_for_age_from', sfValidatorSchemaCompare::LESS_THAN_EQUAL, 'looking_for_age_to',
    array('throw_global_error' => true),
    array('invalid' => 'The start age ("%left_field%") must be before the end age ("%right_field%")')
  )
);

  }

   public function sfGuardValidatorAge(sfValidator $validator, array $values)
  {
    // if the field "name" is not editable, it does not exist in $values
//    if (array_key_exists('name', $values) && $values['name'] == $values['password'])
//    {
      $error = new sfValidatorError($validator,
          'xsxsxsxsxsxsx');

//    }
  }

}

class sfWidgetFormSchemaFormatterDefList extends sfWidgetFormSchemaFormatter {
    protected
      $rowFormat                 = '<div class="row">%label%%field%%error%%help%%hidden_fields%</div>',
      $helpFormat                = '<span class="help">%help%</span>',
      $errorRowFormat            = '<div class="error">Errors:%errors%</div>',
      $errorListFormatInARow     = '<ul class="error_list">%errors%</ul>',
      $errorRowFormatInARow      = '<li>%error%</li>',
      $namedErrorRowFormatInARow = '<li>%name%: %error%</li>',
      $decoratorFormat           = '<dl id="formContainer">%content%</dl>';
}
