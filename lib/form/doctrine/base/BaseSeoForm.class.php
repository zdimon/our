<?php

/**
 * Seo form base class.
 *
 * @method Seo getObject() Returns the current form's model object
 *
 * @package    levandos
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseSeoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'url'         => new sfWidgetFormInputText(),
      'title'       => new sfWidgetFormInputText(),
      'description' => new sfWidgetFormTextarea(),
      'keywords'    => new sfWidgetFormTextarea(),
      'robots'      => new sfWidgetFormTextarea(),
      'revisit'     => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'url'         => new sfValidatorString(array('max_length' => 250, 'required' => false)),
      'title'       => new sfValidatorString(array('max_length' => 250, 'required' => false)),
      'description' => new sfValidatorString(array('max_length' => 25000, 'required' => false)),
      'keywords'    => new sfValidatorString(array('max_length' => 25000, 'required' => false)),
      'robots'      => new sfValidatorString(array('max_length' => 25000, 'required' => false)),
      'revisit'     => new sfValidatorString(array('max_length' => 250, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('seo[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Seo';
  }

}
