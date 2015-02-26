<?php

/**
 * Chat2Room form base class.
 *
 * @method Chat2Room getObject() Returns the current form's model object
 *
 * @package    levandos
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseChat2RoomForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                   => new sfWidgetFormInputHidden(),
      'time_start'           => new sfWidgetFormInputText(),
      'time_end'             => new sfWidgetFormInputText(),
      'date_start'           => new sfWidgetFormDateTime(),
      'date_end'             => new sfWidgetFormDateTime(),
      'minute'               => new sfWidgetFormInputText(),
      'with_video'           => new sfWidgetFormInputCheckbox(),
      'with_man_video'       => new sfWidgetFormInputCheckbox(),
      'status'               => new sfWidgetFormChoice(array('choices' => array('new' => 'new', 'wait' => 'wait', 'active' => 'active', 'rejected' => 'rejected', 'closed' => 'closed'))),
      'caller_id'            => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Caller'), 'add_empty' => true)),
      'answer_id'            => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Answer'), 'add_empty' => true)),
      'alert_id'             => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Alerter'), 'add_empty' => true)),
      'reject_id'            => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Rejecter'), 'add_empty' => true)),
      'accept_video'         => new sfWidgetFormInputCheckbox(),
      'accept_man_video'     => new sfWidgetFormInputCheckbox(),
      'accept_call_by_woman' => new sfWidgetFormInputCheckbox(),
      'chanel_id'            => new sfWidgetFormInputText(),
      'created_at'           => new sfWidgetFormDateTime(),
      'updated_at'           => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                   => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'time_start'           => new sfValidatorInteger(array('required' => false)),
      'time_end'             => new sfValidatorInteger(array('required' => false)),
      'date_start'           => new sfValidatorDateTime(array('required' => false)),
      'date_end'             => new sfValidatorDateTime(array('required' => false)),
      'minute'               => new sfValidatorInteger(array('required' => false)),
      'with_video'           => new sfValidatorBoolean(array('required' => false)),
      'with_man_video'       => new sfValidatorBoolean(array('required' => false)),
      'status'               => new sfValidatorChoice(array('choices' => array(0 => 'new', 1 => 'wait', 2 => 'active', 3 => 'rejected', 4 => 'closed'), 'required' => false)),
      'caller_id'            => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Caller'), 'required' => false)),
      'answer_id'            => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Answer'), 'required' => false)),
      'alert_id'             => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Alerter'), 'required' => false)),
      'reject_id'            => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Rejecter'), 'required' => false)),
      'accept_video'         => new sfValidatorBoolean(array('required' => false)),
      'accept_man_video'     => new sfValidatorBoolean(array('required' => false)),
      'accept_call_by_woman' => new sfValidatorBoolean(array('required' => false)),
      'chanel_id'            => new sfValidatorInteger(array('required' => false)),
      'created_at'           => new sfValidatorDateTime(),
      'updated_at'           => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('chat2_room[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Chat2Room';
  }

}
