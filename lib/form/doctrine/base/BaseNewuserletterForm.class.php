<?php

/**
 * Newuserletter form base class.
 *
 * @method Newuserletter getObject() Returns the current form's model object
 *
 * @package    levandos
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseNewuserletterForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'to_gender'   => new sfWidgetFormChoice(array('choices' => array('man' => 'man', 'women' => 'women'))),
      'users_array' => new sfWidgetFormTextarea(),
      'is_send'     => new sfWidgetFormInputCheckbox(),
      'is_checked'  => new sfWidgetFormInputCheckbox(),
      'date_send'   => new sfWidgetFormDate(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'to_gender'   => new sfValidatorChoice(array('choices' => array(0 => 'man', 1 => 'women'), 'required' => false)),
      'users_array' => new sfValidatorString(array('max_length' => 250000, 'required' => false)),
      'is_send'     => new sfValidatorBoolean(array('required' => false)),
      'is_checked'  => new sfValidatorBoolean(array('required' => false)),
      'date_send'   => new sfValidatorDate(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('newuserletter[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Newuserletter';
  }

}
