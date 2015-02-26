<?php

/**
 * Video form base class.
 *
 * @method Video getObject() Returns the current form's model object
 *
 * @package    levandos
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseVideoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'user_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'add_empty' => true)),
      'username'    => new sfWidgetFormInputText(),
      'title'       => new sfWidgetFormInputText(),
      'file_path'   => new sfWidgetFormInputText(),
      'pub'         => new sfWidgetFormInputCheckbox(),
      'size'        => new sfWidgetFormInputText(),
      'description' => new sfWidgetFormInputText(),
      'format'      => new sfWidgetFormInputText(),
      'is_convert'  => new sfWidgetFormInputCheckbox(),
      'partner_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Partner'), 'add_empty' => true)),
      'created_at'  => new sfWidgetFormDateTime(),
      'updated_at'  => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'user_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'required' => false)),
      'username'    => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'title'       => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'file_path'   => new sfValidatorString(array('max_length' => 250, 'required' => false)),
      'pub'         => new sfValidatorBoolean(array('required' => false)),
      'size'        => new sfValidatorInteger(array('required' => false)),
      'description' => new sfValidatorString(array('max_length' => 250, 'required' => false)),
      'format'      => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'is_convert'  => new sfValidatorBoolean(array('required' => false)),
      'partner_id'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Partner'), 'required' => false)),
      'created_at'  => new sfValidatorDateTime(),
      'updated_at'  => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('video[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Video';
  }

}
