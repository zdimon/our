<?php

/**
 * sfForumCategory filter form base class.
 *
 * @package    levandos
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasesfForumCategoryFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'                     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'description'              => new sfWidgetFormFilterInput(),
      'author'                   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'add_empty' => true)),
      'hits'                     => new sfWidgetFormFilterInput(),
      'hide'                     => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'position'                 => new sfWidgetFormFilterInput(),
      'parent'                   => new sfWidgetFormFilterInput(),
      'last_user'                => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Lastuser'), 'add_empty' => true)),
      'created_at'               => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'               => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'sf_guard_permission_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'sfGuardPermission')),
    ));

    $this->setValidators(array(
      'name'                     => new sfValidatorPass(array('required' => false)),
      'description'              => new sfValidatorPass(array('required' => false)),
      'author'                   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('User'), 'column' => 'id')),
      'hits'                     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'hide'                     => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'position'                 => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'parent'                   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'last_user'                => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Lastuser'), 'column' => 'id')),
      'created_at'               => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'               => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'sf_guard_permission_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'sfGuardPermission', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sf_forum_category_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addSfGuardPermissionListColumnQuery(Doctrine_Query $query, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $query
      ->leftJoin($query->getRootAlias().'.sfForumCategoryPermissions sfForumCategoryPermissions')
      ->andWhereIn('sfForumCategoryPermissions.permission_id', $values)
    ;
  }

  public function getModelName()
  {
    return 'sfForumCategory';
  }

  public function getFields()
  {
    return array(
      'id'                       => 'Number',
      'name'                     => 'Text',
      'description'              => 'Text',
      'author'                   => 'ForeignKey',
      'hits'                     => 'Number',
      'hide'                     => 'Boolean',
      'position'                 => 'Number',
      'parent'                   => 'Number',
      'last_user'                => 'ForeignKey',
      'created_at'               => 'Date',
      'updated_at'               => 'Date',
      'sf_guard_permission_list' => 'ManyKey',
    );
  }
}
