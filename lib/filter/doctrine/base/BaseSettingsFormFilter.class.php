<?php

/**
 * Settings filter form base class.
 *
 * @package    levandos
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseSettingsFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'var_name'        => new sfWidgetFormFilterInput(),
      'var_value'       => new sfWidgetFormFilterInput(),
      'var_description' => new sfWidgetFormFilterInput(),
      'pub'             => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
    ));

    $this->setValidators(array(
      'var_name'        => new sfValidatorPass(array('required' => false)),
      'var_value'       => new sfValidatorPass(array('required' => false)),
      'var_description' => new sfValidatorPass(array('required' => false)),
      'pub'             => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
    ));

    $this->widgetSchema->setNameFormat('settings_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Settings';
  }

  public function getFields()
  {
    return array(
      'id'              => 'Number',
      'var_name'        => 'Text',
      'var_value'       => 'Text',
      'var_description' => 'Text',
      'pub'             => 'Boolean',
    );
  }
}
