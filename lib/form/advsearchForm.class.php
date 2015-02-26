<?php

/**
 * Photo form.
 *
 * @package    levandos
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class advsearchForm extends sfForm
{
  public function configure()
  {

    $this->widgetSchema['age_from'] = new sfWidgetFormChoice(array('expanded'=>false,'choices' => myUser::getAge()));
    $this->widgetSchema['age_to'] = new sfWidgetFormChoice(array('expanded'=>false,'choices' => myUser::getAge()));
    $this->widgetSchema['country'] =  new sfWidgetFormI18nChoiceCountry(array('add_empty'=>true,'culture' =>sfContext::getInstance()->getUser()->getCulture()),array('style'=>'width: 150px'));
    $this->widgetSchema['city'] = new sfWidgetFormInput(array(),array('style'=>'width: 150px'));
    $this->widgetSchema['user_id'] = new sfWidgetFormInput(array(),array('style'=>'width: 50px'));
    $this->widgetSchema['with_photo'] = new sfWidgetFormInputCheckbox();
    $this->widgetSchema['with_video'] = new sfWidgetFormInputCheckbox();
    $this->widgetSchema['is_online'] = new sfWidgetFormInputCheckbox();
    $this->widgetSchema['is_offline'] = new sfWidgetFormInputCheckbox();
   // $this->widgetSchema['gender'] = new sfWidgetFormChoice(array('expanded'=>false,'choices' => myUser::getGender($empty=true)));

      $this->widgetSchema['children'] = new sfWidgetFormChoice(array('expanded'=>false,'choices' => myUser::getChildren()));
    //  $this->widgetSchema['where_children'] = new sfWidgetFormChoice(array('expanded'=>false,'choices' => myUser::getWhereChildren()));
      $this->widgetSchema['want_children'] = new sfWidgetFormChoice(array('expanded'=>false,'choices' => myUser::getWantChildren()));
      $this->widgetSchema['ethnicity'] = new sfWidgetFormChoice(array('expanded'=>false,'choices' => myUser::getEthnicity()));
      $this->widgetSchema['religion'] = new sfWidgetFormChoice(array('expanded'=>false,'choices' => myUser::getReligion()));
      $this->widgetSchema['marital_status'] = new sfWidgetFormChoice(array('expanded'=>false,'choices' => myUser::getMaritalStatus()));
      $this->widgetSchema['education'] = new sfWidgetFormChoice(array('expanded'=>false,'choices' => myUser::getEducation()));
      $this->widgetSchema['smoker'] = new sfWidgetFormChoice(array('expanded'=>false,'choices' => myUser::getSmoker()));
      $this->widgetSchema['drinker'] = new sfWidgetFormChoice(array('expanded'=>false,'choices' => myUser::getDrinker()));
      $this->widgetSchema['looking_for_age_from'] = new sfWidgetFormChoice(array('expanded'=>false,'choices' => myUser::getAge()));
      $this->widgetSchema['looking_for_age_to'] = new sfWidgetFormChoice(array('expanded'=>false,'choices' => myUser::getAge()));
      $this->widgetSchema['relationship'] = new sfWidgetFormChoice(array('multiple'=>true,'expanded'=>true,'choices' => myUser::getRelationship()));

      $this->widgetSchema['body_type'] = new sfWidgetFormChoice(array('expanded'=>false,'choices' => myUser::getBodyType()));




      $this->widgetSchema['height_from'] = new sfWidgetFormChoice(array('expanded'=>false,'choices' => myUser::getHeight()),array('style'=>'width: 100px'));
      $this->widgetSchema['height_to'] = new sfWidgetFormChoice(array('expanded'=>false,'choices' => myUser::getHeight()),array('style'=>'width: 100px'));

      $this->widgetSchema['weight_from'] = new sfWidgetFormChoice(array('expanded'=>false,'choices' => myUser::getWeight()));
      $this->widgetSchema['weight_to'] = new sfWidgetFormChoice(array('expanded'=>false,'choices' => myUser::getWeight()));
      $this->widgetSchema['eyes_color'] = new sfWidgetFormChoice(array('expanded'=>false,'choices' => myUser::getEyeColor()));
      $this->widgetSchema['hair_lenght'] = new sfWidgetFormChoice(array('expanded'=>false,'choices' => myUser::getHairLenght()));
      $this->widgetSchema['hair_color'] = new sfWidgetFormChoice(array('expanded'=>false,'choices' => myUser::getHairColor()));
      $this->widgetSchema['contact_lenses'] = new sfWidgetFormChoice(array('expanded'=>false,'choices' => array(''=>'','yes'=>__('yes'),'no'=>__('no'))));
       $this->widgetSchema['id'] = new sfWidgetFormInput();
      $this->widgetSchema['language'] = new sfWidgetFormChoice(array('expanded'=>false,'choices' => myUser::getLanguage()));
      $this->widgetSchema['language_skill'] = new sfWidgetFormChoice(array('expanded'=>false,'choices' => myUser::getLanguageSkills()));
      $this->widgetSchema['profession'] = new sfWidgetFormInput();


          $custom_decorator = new sfWidgetFormSchemaFormatterDefListAdv($this->getWidgetSchema());
      $this->getWidgetSchema()->addFormFormatter('deflist', $custom_decorator);
      $this->getWidgetSchema()->setFormFormatterName('deflist');
      
  }
}

class sfWidgetFormSchemaFormatterDefListAdv extends sfWidgetFormSchemaFormatter {
    protected
      $rowFormat                 = '<div class="row">%label%%field%%error%%help%%hidden_fields%</div>',
      $helpFormat                = '<span class="help">%help%</span>',
      $errorRowFormat            = '<div class="error">Errors:%errors%</div>',
      $errorListFormatInARow     = '<ul class="error_list">%errors%</ul>',
      $errorRowFormatInARow      = '<li>%error%</li>',
      $namedErrorRowFormatInARow = '<li>%name%: %error%</li>',
      $decoratorFormat           = '<dl id="formContainer">%content%</dl>';
}
