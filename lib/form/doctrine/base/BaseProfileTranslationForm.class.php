<?php

/**
 * ProfileTranslation form base class.
 *
 * @method ProfileTranslation getObject() Returns the current form's model object
 *
 * @package    levandos
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseProfileTranslationForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                      => new sfWidgetFormInputHidden(),
      'ifirst_name'             => new sfWidgetFormInputText(),
      'ilast_name'              => new sfWidgetFormInputText(),
      'icity'                   => new sfWidgetFormInputText(),
      'ioccupation'             => new sfWidgetFormInputText(),
      'description'             => new sfWidgetFormTextarea(),
      'ideal_match_description' => new sfWidgetFormTextarea(),
      'hobbies'                 => new sfWidgetFormTextarea(),
      'lang'                    => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'id'                      => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'ifirst_name'             => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'ilast_name'              => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'icity'                   => new sfValidatorString(array('max_length' => 250, 'required' => false)),
      'ioccupation'             => new sfValidatorString(array('max_length' => 250, 'required' => false)),
      'description'             => new sfValidatorString(array('max_length' => 25000, 'required' => false)),
      'ideal_match_description' => new sfValidatorString(array('max_length' => 2500, 'required' => false)),
      'hobbies'                 => new sfValidatorString(array('max_length' => 2500, 'required' => false)),
      'lang'                    => new sfValidatorChoice(array('choices' => array($this->getObject()->get('lang')), 'empty_value' => $this->getObject()->get('lang'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('profile_translation[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ProfileTranslation';
  }

}
