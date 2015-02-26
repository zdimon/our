<?php

/**
 * Mailer filter form base class.
 *
 * @package    levandos
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseMailerFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'letter_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Newsletter'), 'add_empty' => true)),
      'user_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'add_empty' => true)),
      'email'     => new sfWidgetFormFilterInput(),
      'is_sent'   => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'date_sent' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'title'     => new sfWidgetFormFilterInput(),
      'content'   => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'letter_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Newsletter'), 'column' => 'id')),
      'user_id'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('User'), 'column' => 'id')),
      'email'     => new sfValidatorPass(array('required' => false)),
      'is_sent'   => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'date_sent' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'title'     => new sfValidatorPass(array('required' => false)),
      'content'   => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('mailer_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Mailer';
  }

  public function getFields()
  {
    return array(
      'id'        => 'Number',
      'letter_id' => 'ForeignKey',
      'user_id'   => 'ForeignKey',
      'email'     => 'Text',
      'is_sent'   => 'Boolean',
      'date_sent' => 'Date',
      'title'     => 'Text',
      'content'   => 'Text',
    );
  }
}
