<?php

/**
 * sfForumTopic form base class.
 *
 * @method sfForumTopic getObject() Returns the current form's model object
 *
 * @package    levandos
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasesfForumTopicForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'name'        => new sfWidgetFormInputText(),
      'author'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'add_empty' => false)),
      'hits'        => new sfWidgetFormInputText(),
      'hide'        => new sfWidgetFormInputCheckbox(),
      'close'       => new sfWidgetFormInputCheckbox(),
      'position'    => new sfWidgetFormInputText(),
      'category_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfForumCategory'), 'add_empty' => true)),
      'last_user'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Lastuser'), 'add_empty' => true)),
      'content'     => new sfWidgetFormTextarea(),
      'created_at'  => new sfWidgetFormDateTime(),
      'updated_at'  => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'        => new sfValidatorString(array('max_length' => 50)),
      'author'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('User'))),
      'hits'        => new sfValidatorInteger(array('required' => false)),
      'hide'        => new sfValidatorBoolean(array('required' => false)),
      'close'       => new sfValidatorBoolean(array('required' => false)),
      'position'    => new sfValidatorInteger(array('required' => false)),
      'category_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('sfForumCategory'), 'required' => false)),
      'last_user'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Lastuser'), 'required' => false)),
      'content'     => new sfValidatorString(array('required' => false)),
      'created_at'  => new sfValidatorDateTime(),
      'updated_at'  => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('sf_forum_topic[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'sfForumTopic';
  }

}
