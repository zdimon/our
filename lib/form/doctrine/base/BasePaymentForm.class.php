<?php

/**
 * Payment form base class.
 *
 * @method Payment getObject() Returns the current form's model object
 *
 * @package    levandos
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePaymentForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'service_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Service'), 'add_empty' => true)),
      'user_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'add_empty' => true)),
      'woman_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Woman'), 'add_empty' => true)),
      'username'    => new sfWidgetFormInputText(),
      'partner_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Partner'), 'add_empty' => true)),
      'room_id'     => new sfWidgetFormInputText(),
      'summa'       => new sfWidgetFormInputText(),
      'balanse'     => new sfWidgetFormInputText(),
      'comission'   => new sfWidgetFormInputText(),
      'title'       => new sfWidgetFormInputText(),
      'description' => new sfWidgetFormTextarea(),
      'cost'        => new sfWidgetFormInputText(),
      'is_closed'   => new sfWidgetFormInputCheckbox(),
      'created_at'  => new sfWidgetFormDateTime(),
      'updated_at'  => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'service_id'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Service'), 'required' => false)),
      'user_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'required' => false)),
      'woman_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Woman'), 'required' => false)),
      'username'    => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'partner_id'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Partner'), 'required' => false)),
      'room_id'     => new sfValidatorInteger(array('required' => false)),
      'summa'       => new sfValidatorNumber(array('required' => false)),
      'balanse'     => new sfValidatorNumber(array('required' => false)),
      'comission'   => new sfValidatorNumber(array('required' => false)),
      'title'       => new sfValidatorString(array('max_length' => 250, 'required' => false)),
      'description' => new sfValidatorString(array('max_length' => 2500, 'required' => false)),
      'cost'        => new sfValidatorNumber(array('required' => false)),
      'is_closed'   => new sfValidatorBoolean(array('required' => false)),
      'created_at'  => new sfValidatorDateTime(),
      'updated_at'  => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('payment[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Payment';
  }

}
