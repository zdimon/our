<?php

/**
 * ChatAppointment form base class.
 *
 * @method ChatAppointment getObject() Returns the current form's model object
 *
 * @package    levandos
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseChatAppointmentForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'man_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Man'), 'add_empty' => true)),
      'girl_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Girl'), 'add_empty' => true)),
      'date'       => new sfWidgetFormDateTime(),
      'timer'      => new sfWidgetFormInputText(),
      'status'     => new sfWidgetFormInputText(),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'man_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Man'), 'required' => false)),
      'girl_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Girl'), 'required' => false)),
      'date'       => new sfValidatorDateTime(array('required' => false)),
      'timer'      => new sfValidatorInteger(array('required' => false)),
      'status'     => new sfValidatorInteger(array('required' => false)),
      'created_at' => new sfValidatorDateTime(),
      'updated_at' => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('chat_appointment[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ChatAppointment';
  }

}
