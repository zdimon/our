<?php

/**
 * Liqpay form base class.
 *
 * @method Liqpay getObject() Returns the current form's model object
 *
 * @package    levandos
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseLiqpayForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'out_xml'       => new sfWidgetFormTextarea(),
      'in_xml'        => new sfWidgetFormTextarea(),
      'status'        => new sfWidgetFormInputText(),
      'summa'         => new sfWidgetFormInputText(),
      'description'   => new sfWidgetFormTextarea(),
      'user_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'add_empty' => true)),
      'ammount'       => new sfWidgetFormInputText(),
      'membership_id' => new sfWidgetFormInputText(),
      'created_at'    => new sfWidgetFormDateTime(),
      'updated_at'    => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'out_xml'       => new sfValidatorString(array('max_length' => 25000, 'required' => false)),
      'in_xml'        => new sfValidatorString(array('max_length' => 25000, 'required' => false)),
      'status'        => new sfValidatorInteger(array('required' => false)),
      'summa'         => new sfValidatorInteger(array('required' => false)),
      'description'   => new sfValidatorString(array('max_length' => 25000, 'required' => false)),
      'user_id'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'required' => false)),
      'ammount'       => new sfValidatorInteger(array('required' => false)),
      'membership_id' => new sfValidatorInteger(array('required' => false)),
      'created_at'    => new sfValidatorDateTime(),
      'updated_at'    => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('liqpay[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Liqpay';
  }

}
