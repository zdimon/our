<?php

/**
 * Profile form.
 *
 * @package    levandos
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class myProfileForm extends BaseProfileForm
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
                        $this['partner_id'],
                        $this['is_new_message'],
                        $this['is_new_favorite'],
                        $this['is_new_request'],
                        $this['is_new_gift'],
                        $this['is_new_hotlist'],
                        $this['is_new_friend'],
                        $this['status_id'],
                        $this['is_empty'],
			$this['algorithm']
		);

      $this->widgetSchema['height'] = new sfWidgetFormChoice(array('expanded'=>false,'choices' => myUser::getHeight()));
      $this->widgetSchema['birthday'] =  new sfWidgetFormI18nDate(array('culture' =>sfContext::getInstance()->getUser()->getCulture(),'years' => myUser::getYears()));
      $this->widgetSchema['body_type'] = new sfWidgetFormChoice(array('expanded'=>false,'choices' => myUser::getBodyType()));


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
      $this->widgetSchema['looking_for_age_from'] = new sfWidgetFormChoice(array('expanded'=>false,'choices' => myUser::getAge()));
      $this->widgetSchema['looking_for_age_to'] = new sfWidgetFormChoice(array('expanded'=>false,'choices' => myUser::getAge()));
      $this->widgetSchema['looking_for_a_height'] = new sfWidgetFormChoice(array('expanded'=>false,'choices' => myUser::getHeight()));
      $this->widgetSchema['looking_for_a_body_type'] = new sfWidgetFormChoice(array('expanded'=>false,'choices' => myUser::getBodyType()));
      $this->widgetSchema['relationship'] = new sfWidgetFormChoice(array('multiple'=>true,'expanded'=>true,'choices' => myUser::getRelationship()));
      //$this->widgetSchema['i_can_receive'] = new sfWidgetFormChoice(array('multiple'=>true,'expanded'=>true,'choices' => myUser::getIcanRecive()));
      


      $this->validatorSchema['first_name'] = new sfValidatorString(array('required' => true),array('required'=>__('Поле обязательно.')));
      $this->validatorSchema['last_name'] = new sfValidatorString(array('required' => true),array('required'=>__('Поле обязательно.')));
      $this->validatorSchema['real_name'] = new sfValidatorString(array('required' => true),array('required'=>__('Поле обязательно.')));
      $this->validatorSchema['country'] = new sfValidatorString(array('required' => true),array('required'=>__('Поле обязательно.')));
      $this->validatorSchema['city'] = new sfValidatorString(array('required' => true),array('required'=>__('Поле обязательно.')));
      $this->validatorSchema['zip'] = new sfValidatorString(array('required' => true),array('required'=>__('Поле обязательно.')));
      $this->validatorSchema['children'] = new sfValidatorString(array('required' => true),array('required'=>__('Поле обязательно.')));
      $this->validatorSchema['where_children'] = new sfValidatorString(array('required' => true),array('required'=>__('Поле обязательно.')));
      $this->validatorSchema['want_children'] = new sfValidatorString(array('required' => true),array('required'=>__('Поле обязательно.')));
      $this->validatorSchema ['birthday'] = new sfValidatorDate();
      $this->validatorSchema['height'] = new sfValidatorString(array('required' => true),array('required'=>__('Поле обязательно.')));
      $this->validatorSchema['body_type'] = new sfValidatorString(array('required' => true),array('required'=>__('Поле обязательно.')));
      $this->validatorSchema['marital_status'] = new sfValidatorString(array('required' => true),array('required'=>__('Поле обязательно.')));
      $this->validatorSchema['occupation'] = new sfValidatorString(array('required' => true),array('required'=>__('Поле обязательно.')));
      $this->validatorSchema['education'] = new sfValidatorString(array('required' => true),array('required'=>__('Поле обязательно.')));
      $this->validatorSchema['description'] = new sfValidatorString(array('required' => true),array('required'=>__('Поле обязательно.')));
      $this->validatorSchema['mobile_phone'] = new sfValidatorString(array('required' => true),array('required'=>__('Поле обязательно.')));
      $this->validatorSchema['looking_for_age_from'] = new sfValidatorString(array('required' => true),array('required'=>__('Поле обязательно.')));
      $this->validatorSchema['looking_for_age_to'] = new sfValidatorString(array('required' => true),array('required'=>__('Поле обязательно.')));
      $this->validatorSchema['relationship'] = new sfValidatorString(array('required' => true),array('required'=>__('Поле обязательно.')));
      $this->validatorSchema['ideal_match_description'] = new sfValidatorString(array('required' => true),array('required'=>__('Поле обязательно.')));
     




      $custom_decorator = new sfWidgetFormSchemaFormatterDefList($this->getWidgetSchema());
      $this->getWidgetSchema()->addFormFormatter('deflist', $custom_decorator);
      $this->getWidgetSchema()->setFormFormatterName('deflist');




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
