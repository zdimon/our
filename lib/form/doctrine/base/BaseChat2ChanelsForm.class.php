<?php

/**
 * Chat2Chanels form base class.
 *
 * @method Chat2Chanels getObject() Returns the current form's model object
 *
 * @package    levandos
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseChat2ChanelsForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'girl_src'    => new sfWidgetFormInputText(),
      'user_src'    => new sfWidgetFormInputText(),
      'user_id'     => new sfWidgetFormInputText(),
      'last_active' => new sfWidgetFormInputText(),
      'host'        => new sfWidgetFormInputText(),
      'created_at'  => new sfWidgetFormDateTime(),
      'updated_at'  => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'girl_src'    => new sfValidatorString(array('max_length' => 250, 'required' => false)),
      'user_src'    => new sfValidatorString(array('max_length' => 250, 'required' => false)),
      'user_id'     => new sfValidatorInteger(array('required' => false)),
      'last_active' => new sfValidatorInteger(array('required' => false)),
      'host'        => new sfValidatorString(array('max_length' => 250, 'required' => false)),
      'created_at'  => new sfValidatorDateTime(),
      'updated_at'  => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('chat2_chanels[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Chat2Chanels';
  }

}
