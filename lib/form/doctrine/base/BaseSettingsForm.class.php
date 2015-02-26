<?php

/**
 * Settings form base class.
 *
 * @method Settings getObject() Returns the current form's model object
 *
 * @package    levandos
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseSettingsForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'var_name'        => new sfWidgetFormInputText(),
      'var_value'       => new sfWidgetFormInputText(),
      'var_description' => new sfWidgetFormInputText(),
      'pub'             => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'var_name'        => new sfValidatorString(array('max_length' => 250, 'required' => false)),
      'var_value'       => new sfValidatorString(array('max_length' => 250, 'required' => false)),
      'var_description' => new sfValidatorString(array('max_length' => 250, 'required' => false)),
      'pub'             => new sfValidatorBoolean(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('settings[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Settings';
  }

}
