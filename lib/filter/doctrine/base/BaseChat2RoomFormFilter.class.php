<?php

/**
 * Chat2Room filter form base class.
 *
 * @package    levandos
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseChat2RoomFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'time_start'           => new sfWidgetFormFilterInput(),
      'time_end'             => new sfWidgetFormFilterInput(),
      'date_start'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'date_end'             => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'minute'               => new sfWidgetFormFilterInput(),
      'with_video'           => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'with_man_video'       => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'status'               => new sfWidgetFormChoice(array('choices' => array('' => '', 'new' => 'new', 'wait' => 'wait', 'active' => 'active', 'rejected' => 'rejected', 'closed' => 'closed'))),
      'caller_id'            => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Caller'), 'add_empty' => true)),
      'answer_id'            => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Answer'), 'add_empty' => true)),
      'alert_id'             => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Alerter'), 'add_empty' => true)),
      'reject_id'            => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Rejecter'), 'add_empty' => true)),
      'accept_video'         => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'accept_man_video'     => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'accept_call_by_woman' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'chanel_id'            => new sfWidgetFormFilterInput(),
      'created_at'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'time_start'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'time_end'             => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'date_start'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'date_end'             => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'minute'               => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'with_video'           => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'with_man_video'       => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'status'               => new sfValidatorChoice(array('required' => false, 'choices' => array('new' => 'new', 'wait' => 'wait', 'active' => 'active', 'rejected' => 'rejected', 'closed' => 'closed'))),
      'caller_id'            => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Caller'), 'column' => 'id')),
      'answer_id'            => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Answer'), 'column' => 'id')),
      'alert_id'             => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Alerter'), 'column' => 'id')),
      'reject_id'            => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Rejecter'), 'column' => 'id')),
      'accept_video'         => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'accept_man_video'     => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'accept_call_by_woman' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'chanel_id'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('chat2_room_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Chat2Room';
  }

  public function getFields()
  {
    return array(
      'id'                   => 'Number',
      'time_start'           => 'Number',
      'time_end'             => 'Number',
      'date_start'           => 'Date',
      'date_end'             => 'Date',
      'minute'               => 'Number',
      'with_video'           => 'Boolean',
      'with_man_video'       => 'Boolean',
      'status'               => 'Enum',
      'caller_id'            => 'ForeignKey',
      'answer_id'            => 'ForeignKey',
      'alert_id'             => 'ForeignKey',
      'reject_id'            => 'ForeignKey',
      'accept_video'         => 'Boolean',
      'accept_man_video'     => 'Boolean',
      'accept_call_by_woman' => 'Boolean',
      'chanel_id'            => 'Number',
      'created_at'           => 'Date',
      'updated_at'           => 'Date',
    );
  }
}
