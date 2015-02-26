<?php

/**
 * Friend filter form base class.
 *
 * @package    levandos
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseFriendFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'user_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'add_empty' => true)),
      'friend_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Friend'), 'add_empty' => true)),
      'status_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Status'), 'add_empty' => true)),
      'del_user'        => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'del_friend'      => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'is_read_user'    => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'is_read_friend'  => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'contact'         => new sfWidgetFormFilterInput(),
      'from_partner_id' => new sfWidgetFormFilterInput(),
      'to_partner_id'   => new sfWidgetFormFilterInput(),
      'request_video'   => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'accept_video'    => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'read_accept'     => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'popup_add'       => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'popup_match'     => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'created_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'user_id'         => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('User'), 'column' => 'id')),
      'friend_id'       => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Friend'), 'column' => 'id')),
      'status_id'       => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Status'), 'column' => 'id')),
      'del_user'        => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'del_friend'      => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'is_read_user'    => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'is_read_friend'  => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'contact'         => new sfValidatorPass(array('required' => false)),
      'from_partner_id' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'to_partner_id'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'request_video'   => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'accept_video'    => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'read_accept'     => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'popup_add'       => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'popup_match'     => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'created_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('friend_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Friend';
  }

  public function getFields()
  {
    return array(
      'id'              => 'Number',
      'user_id'         => 'ForeignKey',
      'friend_id'       => 'ForeignKey',
      'status_id'       => 'ForeignKey',
      'del_user'        => 'Boolean',
      'del_friend'      => 'Boolean',
      'is_read_user'    => 'Boolean',
      'is_read_friend'  => 'Boolean',
      'contact'         => 'Text',
      'from_partner_id' => 'Number',
      'to_partner_id'   => 'Number',
      'request_video'   => 'Boolean',
      'accept_video'    => 'Boolean',
      'read_accept'     => 'Boolean',
      'popup_add'       => 'Boolean',
      'popup_match'     => 'Boolean',
      'created_at'      => 'Date',
      'updated_at'      => 'Date',
    );
  }
}
