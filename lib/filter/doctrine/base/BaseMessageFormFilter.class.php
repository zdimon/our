<?php

/**
 * Message filter form base class.
 *
 * @package    levandos
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseMessageFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'from_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('FromUser'), 'add_empty' => true)),
      'from_username'   => new sfWidgetFormFilterInput(),
      'to_id'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ToUser'), 'add_empty' => true)),
      'to_username'     => new sfWidgetFormFilterInput(),
      'from_partner_id' => new sfWidgetFormFilterInput(),
      'to_partner_id'   => new sfWidgetFormFilterInput(),
      'title'           => new sfWidgetFormFilterInput(),
      'content'         => new sfWidgetFormFilterInput(),
      'translate'       => new sfWidgetFormFilterInput(),
      'image'           => new sfWidgetFormFilterInput(),
      'reply_id'        => new sfWidgetFormFilterInput(),
      'type_message'    => new sfWidgetFormChoice(array('choices' => array('' => '', 'smile' => 'smile', 'message' => 'message', 'first' => 'first'))),
      'pub'             => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'is_read'         => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'is_reply'        => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'del_from'        => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'del_to'          => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'popup'           => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'to_other'        => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'is_email_sent'   => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'back_id'         => new sfWidgetFormFilterInput(),
      'created_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'from_id'         => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('FromUser'), 'column' => 'id')),
      'from_username'   => new sfValidatorPass(array('required' => false)),
      'to_id'           => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('ToUser'), 'column' => 'id')),
      'to_username'     => new sfValidatorPass(array('required' => false)),
      'from_partner_id' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'to_partner_id'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'title'           => new sfValidatorPass(array('required' => false)),
      'content'         => new sfValidatorPass(array('required' => false)),
      'translate'       => new sfValidatorPass(array('required' => false)),
      'image'           => new sfValidatorPass(array('required' => false)),
      'reply_id'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'type_message'    => new sfValidatorChoice(array('required' => false, 'choices' => array('smile' => 'smile', 'message' => 'message', 'first' => 'first'))),
      'pub'             => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'is_read'         => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'is_reply'        => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'del_from'        => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'del_to'          => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'popup'           => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'to_other'        => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'is_email_sent'   => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'back_id'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('message_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Message';
  }

  public function getFields()
  {
    return array(
      'id'              => 'Number',
      'from_id'         => 'ForeignKey',
      'from_username'   => 'Text',
      'to_id'           => 'ForeignKey',
      'to_username'     => 'Text',
      'from_partner_id' => 'Number',
      'to_partner_id'   => 'Number',
      'title'           => 'Text',
      'content'         => 'Text',
      'translate'       => 'Text',
      'image'           => 'Text',
      'reply_id'        => 'Number',
      'type_message'    => 'Enum',
      'pub'             => 'Boolean',
      'is_read'         => 'Boolean',
      'is_reply'        => 'Boolean',
      'del_from'        => 'Boolean',
      'del_to'          => 'Boolean',
      'popup'           => 'Boolean',
      'to_other'        => 'Boolean',
      'is_email_sent'   => 'Boolean',
      'back_id'         => 'Number',
      'created_at'      => 'Date',
      'updated_at'      => 'Date',
    );
  }
}
