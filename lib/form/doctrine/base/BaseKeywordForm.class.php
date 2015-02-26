<?php

/**
 * Keyword form base class.
 *
 * @method Keyword getObject() Returns the current form's model object
 *
 * @package    levandos
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseKeywordForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'type_keywords_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TypeKeywords'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'type_keywords_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TypeKeywords'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('keyword[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Keyword';
  }

}
