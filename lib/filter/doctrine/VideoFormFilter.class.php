<?php

/**
 * Video filter form.
 *
 * @package    levandos
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class VideoFormFilter extends BaseVideoFormFilter
{
  public function configure()
  {

   $this->widgetSchema['user_id'] = new sfWidgetFormInput();
   $this->widgetSchema['gender'] = new sfWidgetFormChoice(array('choices' => array('' => '', 'm' => 'Man', 'w' => 'Woman')));
   $this->validatorSchema['gender'] = new sfValidatorPass(array('required' => false));
   $this->validatorSchema->setOption('allow_extra_fields', true);
  }


    public function addGenderColumnQuery(Doctrine_Query $query, $field, $values)
{
    $value = $values['text'];
    if ($value == '')
    {
    return;
    }
    $query->andWhere('sg.gender = ?', array($values));
}

}
