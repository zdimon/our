<?php

/**
 * Newsletter form.
 *
 * @package    levandos
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class NewsletterForm extends BaseNewsletterForm
{
  public function configure()
  {

      unset(
          $this['created_at'],
          $this['updated_at'],
          $this['is_sent']
      );


      $this->embedI18n(myUser::getCultures());

  }
}
