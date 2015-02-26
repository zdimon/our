<?php

/**
 * Message filter form.
 *
 * @package    levandos
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class MessageFormFilter extends BaseMessageFormFilter
{
  public function configure()
  {
      $this->widgetSchema['from_id'] = new sfWidgetFormInput();
      $this->widgetSchema['to_id'] = new sfWidgetFormInput();

  }
}
