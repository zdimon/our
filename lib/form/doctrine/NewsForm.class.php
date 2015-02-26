<?php

/**
 * News form.
 *
 * @package    levandos
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class NewsForm extends BaseNewsForm
{
  public function configure()
  {

      unset(
      $this['created_at'],
      $this['image'],
      $this['updated_at']
      );





      $this->embedI18n(myUser::getCultures());

  }
}
