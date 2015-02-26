<?php

/**
 * Keyword filter form base class.
 *
 * @package    levandos
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseKeywordFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'type_keywords_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TypeKeywords'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'type_keywords_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('TypeKeywords'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('keyword_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Keyword';
  }

  public function getFields()
  {
    return array(
      'id'               => 'Number',
      'type_keywords_id' => 'ForeignKey',
    );
  }
}
