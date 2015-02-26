<?php

/**
 * Service form base class.
 *
 * @method Service getObject() Returns the current form's model object
 *
 * @package    levandos
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseServiceForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'cost'         => new sfWidgetFormInputText(),
      'comission'    => new sfWidgetFormInputText(),
      'pub'          => new sfWidgetFormInputCheckbox(),
      'show_man'     => new sfWidgetFormInputCheckbox(),
      'show_partner' => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'cost'         => new sfValidatorNumber(array('required' => false)),
      'comission'    => new sfValidatorNumber(array('required' => false)),
      'pub'          => new sfValidatorBoolean(array('required' => false)),
      'show_man'     => new sfValidatorBoolean(array('required' => false)),
      'show_partner' => new sfValidatorBoolean(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('service[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Service';
  }

}
