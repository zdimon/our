<?php

/**
 * sfForumCategory form base class.
 *
 * @method sfForumCategory getObject() Returns the current form's model object
 *
 * @package    levandos
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasesfForumCategoryForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                       => new sfWidgetFormInputHidden(),
      'name'                     => new sfWidgetFormInputText(),
      'description'              => new sfWidgetFormInputText(),
      'author'                   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'add_empty' => false)),
      'hits'                     => new sfWidgetFormInputText(),
      'hide'                     => new sfWidgetFormInputCheckbox(),
      'position'                 => new sfWidgetFormInputText(),
      'parent'                   => new sfWidgetFormInputText(),
      'last_user'                => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Lastuser'), 'add_empty' => true)),
      'created_at'               => new sfWidgetFormDateTime(),
      'updated_at'               => new sfWidgetFormDateTime(),
      'sf_guard_permission_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'sfGuardPermission')),
    ));

    $this->setValidators(array(
      'id'                       => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'                     => new sfValidatorString(array('max_length' => 50)),
      'description'              => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'author'                   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('User'))),
      'hits'                     => new sfValidatorInteger(array('required' => false)),
      'hide'                     => new sfValidatorBoolean(array('required' => false)),
      'position'                 => new sfValidatorInteger(array('required' => false)),
      'parent'                   => new sfValidatorInteger(array('required' => false)),
      'last_user'                => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Lastuser'), 'required' => false)),
      'created_at'               => new sfValidatorDateTime(),
      'updated_at'               => new sfValidatorDateTime(),
      'sf_guard_permission_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'sfGuardPermission', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sf_forum_category[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'sfForumCategory';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['sf_guard_permission_list']))
    {
      $this->setDefault('sf_guard_permission_list', $this->object->sfGuardPermission->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->savesfGuardPermissionList($con);

    parent::doSave($con);
  }

  public function savesfGuardPermissionList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['sf_guard_permission_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->sfGuardPermission->getPrimaryKeys();
    $values = $this->getValue('sf_guard_permission_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('sfGuardPermission', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('sfGuardPermission', array_values($link));
    }
  }

}
