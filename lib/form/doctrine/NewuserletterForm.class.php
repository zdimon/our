<?php

/**
 * Newuserletter form.
 *
 * @package    levandos
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class NewuserletterForm extends BaseNewuserletterForm
{
  public function configure()
  {
      unset( $this['date_send'], $this['users_array'], $this['is_send'] , $this['is_checked']);
      //$this->embedI18n(myUser::getCultures());

  }
}
