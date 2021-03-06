<?php

/**
 * ProfileTranslation form.
 *
 * @package    levandos
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class fProfileTranslationForm extends BaseProfileTranslationForm
{
  public function configure()
  {
      unset(
              $this['ifirst_name'],
              $this['ilast_name'],
              $this['icity'],
              $this['ioccupation']
              );
     
      $this->validatorSchema['ideal_match_description'] = new sfValidatorString(array('required' => true),array('required'=>__('Поле обязательно.')));
      $this->validatorSchema['description'] = new sfValidatorString(array('required' => true),array('required'=>__('Поле обязательно.')));
      $this->validatorSchema['hobbies'] = new sfValidatorString(array('required' => true),array('required'=>__('Поле обязательно.')));
      
  }
}
