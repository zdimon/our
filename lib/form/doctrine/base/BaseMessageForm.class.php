<?php

/**
 * Message form base class.
 *
 * @method Message getObject() Returns the current form's model object
 *
 * @package    levandos
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseMessageForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'from_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('FromUser'), 'add_empty' => true)),
      'from_username'   => new sfWidgetFormInputText(),
      'to_id'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ToUser'), 'add_empty' => true)),
      'to_username'     => new sfWidgetFormInputText(),
      'from_partner_id' => new sfWidgetFormInputText(),
      'to_partner_id'   => new sfWidgetFormInputText(),
      'title'           => new sfWidgetFormInputText(),
      'content'         => new sfWidgetFormTextarea(),
      'translate'       => new sfWidgetFormTextarea(),
      'image'           => new sfWidgetFormInputText(),
      'reply_id'        => new sfWidgetFormInputText(),
      'type_message'    => new sfWidgetFormChoice(array('choices' => array('smile' => 'smile', 'message' => 'message', 'first' => 'first'))),
      'pub'             => new sfWidgetFormInputCheckbox(),
      'is_read'         => new sfWidgetFormInputCheckbox(),
      'is_reply'        => new sfWidgetFormInputCheckbox(),
      'del_from'        => new sfWidgetFormInputCheckbox(),
      'del_to'          => new sfWidgetFormInputCheckbox(),
      'popup'           => new sfWidgetFormInputCheckbox(),
      'to_other'        => new sfWidgetFormInputCheckbox(),
      'is_email_sent'   => new sfWidgetFormInputCheckbox(),
      'back_id'         => new sfWidgetFormInputText(),
      'created_at'      => new sfWidgetFormDateTime(),
      'updated_at'      => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'from_id'         => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('FromUser'), 'required' => false)),
      'from_username'   => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'to_id'           => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ToUser'), 'required' => false)),
      'to_username'     => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'from_partner_id' => new sfValidatorInteger(array('required' => false)),
      'to_partner_id'   => new sfValidatorInteger(array('required' => false)),
      'title'           => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'content'         => new sfValidatorString(array('max_length' => 500000, 'required' => false)),
      'translate'       => new sfValidatorString(array('max_length' => 2500, 'required' => false)),
      'image'           => new sfValidatorString(array('max_length' => 250, 'required' => false)),
      'reply_id'        => new sfValidatorInteger(array('required' => false)),
      'type_message'    => new sfValidatorChoice(array('choices' => array(0 => 'smile', 1 => 'message', 2 => 'first'), 'required' => false)),
      'pub'             => new sfValidatorBoolean(array('required' => false)),
      'is_read'         => new sfValidatorBoolean(array('required' => false)),
      'is_reply'        => new sfValidatorBoolean(array('required' => false)),
      'del_from'        => new sfValidatorBoolean(array('required' => false)),
      'del_to'          => new sfValidatorBoolean(array('required' => false)),
      'popup'           => new sfValidatorBoolean(array('required' => false)),
      'to_other'        => new sfValidatorBoolean(array('required' => false)),
      'is_email_sent'   => new sfValidatorBoolean(array('required' => false)),
      'back_id'         => new sfValidatorInteger(array('required' => false)),
      'created_at'      => new sfValidatorDateTime(),
      'updated_at'      => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('message[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Message';
  }

}
