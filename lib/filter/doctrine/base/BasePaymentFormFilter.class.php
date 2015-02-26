<?php

/**
 * Payment filter form base class.
 *
 * @package    levandos
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasePaymentFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'service_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Service'), 'add_empty' => true)),
      'user_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'add_empty' => true)),
      'woman_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Woman'), 'add_empty' => true)),
      'username'    => new sfWidgetFormFilterInput(),
      'partner_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Partner'), 'add_empty' => true)),
      'room_id'     => new sfWidgetFormFilterInput(),
      'summa'       => new sfWidgetFormFilterInput(),
      'balanse'     => new sfWidgetFormFilterInput(),
      'comission'   => new sfWidgetFormFilterInput(),
      'title'       => new sfWidgetFormFilterInput(),
      'description' => new sfWidgetFormFilterInput(),
      'cost'        => new sfWidgetFormFilterInput(),
      'is_closed'   => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'created_at'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'service_id'  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Service'), 'column' => 'id')),
      'user_id'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('User'), 'column' => 'id')),
      'woman_id'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Woman'), 'column' => 'id')),
      'username'    => new sfValidatorPass(array('required' => false)),
      'partner_id'  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Partner'), 'column' => 'id')),
      'room_id'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'summa'       => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'balanse'     => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'comission'   => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'title'       => new sfValidatorPass(array('required' => false)),
      'description' => new sfValidatorPass(array('required' => false)),
      'cost'        => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'is_closed'   => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'created_at'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('payment_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Payment';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'service_id'  => 'ForeignKey',
      'user_id'     => 'ForeignKey',
      'woman_id'    => 'ForeignKey',
      'username'    => 'Text',
      'partner_id'  => 'ForeignKey',
      'room_id'     => 'Number',
      'summa'       => 'Number',
      'balanse'     => 'Number',
      'comission'   => 'Number',
      'title'       => 'Text',
      'description' => 'Text',
      'cost'        => 'Number',
      'is_closed'   => 'Boolean',
      'created_at'  => 'Date',
      'updated_at'  => 'Date',
    );
  }
}
