<?php

/**
 * Friend form base class.
 *
 * @method Friend getObject() Returns the current form's model object
 *
 * @package    levandos
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseFriendForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'user_id'         => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'add_empty' => true)),
      'friend_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Friend'), 'add_empty' => true)),
      'status_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Status'), 'add_empty' => true)),
      'del_user'        => new sfWidgetFormInputCheckbox(),
      'del_friend'      => new sfWidgetFormInputCheckbox(),
      'is_read_user'    => new sfWidgetFormInputCheckbox(),
      'is_read_friend'  => new sfWidgetFormInputCheckbox(),
      'contact'         => new sfWidgetFormTextarea(),
      'from_partner_id' => new sfWidgetFormInputText(),
      'to_partner_id'   => new sfWidgetFormInputText(),
      'request_video'   => new sfWidgetFormInputCheckbox(),
      'accept_video'    => new sfWidgetFormInputCheckbox(),
      'read_accept'     => new sfWidgetFormInputCheckbox(),
      'popup_add'       => new sfWidgetFormInputCheckbox(),
      'popup_match'     => new sfWidgetFormInputCheckbox(),
      'created_at'      => new sfWidgetFormDateTime(),
      'updated_at'      => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'user_id'         => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'required' => false)),
      'friend_id'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Friend'), 'required' => false)),
      'status_id'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Status'), 'required' => false)),
      'del_user'        => new sfValidatorBoolean(array('required' => false)),
      'del_friend'      => new sfValidatorBoolean(array('required' => false)),
      'is_read_user'    => new sfValidatorBoolean(array('required' => false)),
      'is_read_friend'  => new sfValidatorBoolean(array('required' => false)),
      'contact'         => new sfValidatorString(array('max_length' => 10000, 'required' => false)),
      'from_partner_id' => new sfValidatorInteger(array('required' => false)),
      'to_partner_id'   => new sfValidatorInteger(array('required' => false)),
      'request_video'   => new sfValidatorBoolean(array('required' => false)),
      'accept_video'    => new sfValidatorBoolean(array('required' => false)),
      'read_accept'     => new sfValidatorBoolean(array('required' => false)),
      'popup_add'       => new sfValidatorBoolean(array('required' => false)),
      'popup_match'     => new sfValidatorBoolean(array('required' => false)),
      'created_at'      => new sfValidatorDateTime(),
      'updated_at'      => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('friend[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Friend';
  }

}
