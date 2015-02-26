<?php

/**
 * Photo form.
 *
 * @package    levandos
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class qsearchForm extends sfForm
{
  public function configure()
  {

    $this->widgetSchema['age_from'] = new sfWidgetFormChoice(array('expanded'=>false,'choices' => myUser::getAge()));
    $this->widgetSchema['age_to'] = new sfWidgetFormChoice(array('expanded'=>false,'choices' => myUser::getAge()));
    $this->widgetSchema['country'] =  new sfWidgetFormI18nChoiceCountry(array('add_empty'=>true,'culture' =>sfContext::getInstance()->getUser()->getCulture()),array('style'=>'width: 108px'));
    $this->widgetSchema['user_id'] = new sfWidgetFormInput(array(),array('style'=>'width: 98px'));
    $this->widgetSchema['with_photo'] = new sfWidgetFormInputCheckbox();
    $this->widgetSchema['with_video'] = new sfWidgetFormInputCheckbox();
    $this->widgetSchema['is_online'] = new sfWidgetFormInputCheckbox();
    $this->widgetSchema['gender'] = new sfWidgetFormChoice(array('expanded'=>false,'choices' => myUser::getGender($empty=true)));

  }
}
