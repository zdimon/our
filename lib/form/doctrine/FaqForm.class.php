<?php

/**
 * Faq form.
 *
 * @package    levandos
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class FaqForm extends BaseFaqForm
{
  public function configure()
  {
         unset(
                        $this['is_read'],
			            $this['created_at'],
                        $this['parent_id'],
           
                        $this['answer'],
                        $this['updated_at']
		        );





      $this->embedI18n(myUser::getCultures());


    

     // $this->embedI18n(myUser::getCultures());
  }
}
