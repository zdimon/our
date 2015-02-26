<?php

/**
 * Viewed form base class.
 *
 * @method Viewed getObject() Returns the current form's model object
 *
 * @package    levandos
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseViewedForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'user_id'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'add_empty' => true)),
      'interest_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Interest'), 'add_empty' => true)),
      'is_read_user'     => new sfWidgetFormInputCheckbox(),
      'is_read_interest' => new sfWidgetFormInputCheckbox(),
      'popup'            => new sfWidgetFormInputCheckbox(),
      'created_at'       => new sfWidgetFormDateTime(),
      'updated_at'       => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'user_id'          => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'required' => false)),
      'interest_id'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Interest'), 'required' => false)),
      'is_read_user'     => new sfValidatorBoolean(array('required' => false)),
      'is_read_interest' => new sfValidatorBoolean(array('required' => false)),
      'popup'            => new sfValidatorBoolean(array('required' => false)),
      'created_at'       => new sfValidatorDateTime(),
      'updated_at'       => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('viewed[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Viewed';
  }

}
