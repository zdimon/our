<?php

/**
 * BillingType form base class.
 *
 * @method BillingType getObject() Returns the current form's model object
 *
 * @package    levandos
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseBillingTypeForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'     => new sfWidgetFormInputHidden(),
      'title'  => new sfWidgetFormInputText(),
      'code'   => new sfWidgetFormInputText(),
      'summa'  => new sfWidgetFormInputText(),
      'credit' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'     => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'title'  => new sfValidatorString(array('max_length' => 250, 'required' => false)),
      'code'   => new sfValidatorString(array('max_length' => 250, 'required' => false)),
      'summa'  => new sfValidatorInteger(array('required' => false)),
      'credit' => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('billing_type[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'BillingType';
  }

}
