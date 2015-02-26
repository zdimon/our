<?php

/**
 * Mailer form base class.
 *
 * @method Mailer getObject() Returns the current form's model object
 *
 * @package    levandos
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseMailerForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'        => new sfWidgetFormInputHidden(),
      'letter_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Newsletter'), 'add_empty' => true)),
      'user_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'add_empty' => true)),
      'email'     => new sfWidgetFormInputText(),
      'is_sent'   => new sfWidgetFormInputCheckbox(),
      'date_sent' => new sfWidgetFormDate(),
      'title'     => new sfWidgetFormInputText(),
      'content'   => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'        => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'letter_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Newsletter'), 'required' => false)),
      'user_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'required' => false)),
      'email'     => new sfValidatorString(array('max_length' => 250, 'required' => false)),
      'is_sent'   => new sfValidatorBoolean(array('required' => false)),
      'date_sent' => new sfValidatorDate(array('required' => false)),
      'title'     => new sfValidatorString(array('max_length' => 250, 'required' => false)),
      'content'   => new sfValidatorString(array('max_length' => 25000, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('mailer[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Mailer';
  }

}
