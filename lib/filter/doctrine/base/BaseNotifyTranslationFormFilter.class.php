<?php

/**
 * NotifyTranslation filter form base class.
 *
 * @package    levandos
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseNotifyTranslationFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'icontent' => new sfWidgetFormFilterInput(),
      'ititle'   => new sfWidgetFormFilterInput(),
      'file'     => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'icontent' => new sfValidatorPass(array('required' => false)),
      'ititle'   => new sfValidatorPass(array('required' => false)),
      'file'     => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('notify_translation_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'NotifyTranslation';
  }

  public function getFields()
  {
    return array(
      'id'       => 'Number',
      'icontent' => 'Text',
      'ititle'   => 'Text',
      'file'     => 'Text',
      'lang'     => 'Text',
    );
  }
}
