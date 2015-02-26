<?php

/**
 * sfForumMessage form base class.
 *
 * @method sfForumMessage getObject() Returns the current form's model object
 *
 * @package    levandos
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasesfForumMessageForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'topic_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfForumTopic'), 'add_empty' => true)),
      'content'    => new sfWidgetFormTextarea(),
      'author'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'add_empty' => false)),
      'hide'       => new sfWidgetFormInputCheckbox(),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'topic_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('sfForumTopic'), 'required' => false)),
      'content'    => new sfValidatorString(array('required' => false)),
      'author'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('User'))),
      'hide'       => new sfValidatorBoolean(array('required' => false)),
      'created_at' => new sfValidatorDateTime(),
      'updated_at' => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('sf_forum_message[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'sfForumMessage';
  }

}
