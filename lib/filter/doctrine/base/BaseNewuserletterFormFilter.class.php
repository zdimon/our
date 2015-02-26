<?php

/**
 * Newuserletter filter form base class.
 *
 * @package    levandos
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseNewuserletterFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'to_gender'   => new sfWidgetFormChoice(array('choices' => array('' => '', 'man' => 'man', 'women' => 'women'))),
      'users_array' => new sfWidgetFormFilterInput(),
      'is_send'     => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'is_checked'  => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'date_send'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'to_gender'   => new sfValidatorChoice(array('required' => false, 'choices' => array('man' => 'man', 'women' => 'women'))),
      'users_array' => new sfValidatorPass(array('required' => false)),
      'is_send'     => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'is_checked'  => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'date_send'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('newuserletter_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Newuserletter';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'to_gender'   => 'Enum',
      'users_array' => 'Text',
      'is_send'     => 'Boolean',
      'is_checked'  => 'Boolean',
      'date_send'   => 'Date',
    );
  }
}
