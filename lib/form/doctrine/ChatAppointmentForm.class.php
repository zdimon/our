<?php

/**
 * ChatAppointment form.
 *
 * @package    levandos
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ChatAppointmentForm extends BaseChatAppointmentForm
{
  public function configure()
  {
      
            unset(
              $this['created_at'],
              $this['timer'],
              $this['status'],
              $this['updated_at']
              );
      
          $this->widgetSchema['man_id'] = new sfWidgetFormInputHidden();  
          $this->widgetSchema['girl_id'] = new sfWidgetFormInputHidden();
          
           $this->widgetSchema->setLabels(array(
          'date'   => __('Date and time of the appointment')
      ));
           
            
  }
}
