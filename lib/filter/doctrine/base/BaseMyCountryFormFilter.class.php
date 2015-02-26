<?php

/**
 * MyCountry filter form base class.
 *
 * @package    levandos
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseMyCountryFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'image1' => new sfWidgetFormFilterInput(),
      'image2' => new sfWidgetFormFilterInput(),
      'image3' => new sfWidgetFormFilterInput(),
      'image4' => new sfWidgetFormFilterInput(),
      'image5' => new sfWidgetFormFilterInput(),
      'pub'    => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
    ));

    $this->setValidators(array(
      'image1' => new sfValidatorPass(array('required' => false)),
      'image2' => new sfValidatorPass(array('required' => false)),
      'image3' => new sfValidatorPass(array('required' => false)),
      'image4' => new sfValidatorPass(array('required' => false)),
      'image5' => new sfValidatorPass(array('required' => false)),
      'pub'    => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
    ));

    $this->widgetSchema->setNameFormat('my_country_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'MyCountry';
  }

  public function getFields()
  {
    return array(
      'id'     => 'Number',
      'image1' => 'Text',
      'image2' => 'Text',
      'image3' => 'Text',
      'image4' => 'Text',
      'image5' => 'Text',
      'pub'    => 'Boolean',
    );
  }
}
