<?php

/**
 * sfForumCategoryPermissions form base class.
 *
 * @method sfForumCategoryPermissions getObject() Returns the current form's model object
 *
 * @package    levandos
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasesfForumCategoryPermissionsForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'category_id'   => new sfWidgetFormInputHidden(),
      'permission_id' => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'category_id'   => new sfValidatorChoice(array('choices' => array($this->getObject()->get('category_id')), 'empty_value' => $this->getObject()->get('category_id'), 'required' => false)),
      'permission_id' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('permission_id')), 'empty_value' => $this->getObject()->get('permission_id'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sf_forum_category_permissions[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'sfForumCategoryPermissions';
  }

}
