<?php

/**
 * MyCity form base class.
 *
 * @method MyCity getObject() Returns the current form's model object
 *
 * @package    levandos
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseMyCityForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'     => new sfWidgetFormInputHidden(),
      'image1' => new sfWidgetFormInputText(),
      'image2' => new sfWidgetFormInputText(),
      'image3' => new sfWidgetFormInputText(),
      'image4' => new sfWidgetFormInputText(),
      'image5' => new sfWidgetFormInputText(),
      'pub'    => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'id'     => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'image1' => new sfValidatorString(array('max_length' => 250, 'required' => false)),
      'image2' => new sfValidatorString(array('max_length' => 250, 'required' => false)),
      'image3' => new sfValidatorString(array('max_length' => 250, 'required' => false)),
      'image4' => new sfValidatorString(array('max_length' => 250, 'required' => false)),
      'image5' => new sfValidatorString(array('max_length' => 250, 'required' => false)),
      'pub'    => new sfValidatorBoolean(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('my_city[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'MyCity';
  }

}
