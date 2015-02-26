<?php

/**
 * NewsletterTranslation form.
 *
 * @package    levandos
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class NewsletterTranslationForm extends BaseNewsletterTranslationForm
{
  public function configure()
  {

      $this->widgetSchema['content'] = new sfWidgetFormTextareaTinyMCE();


  }
}
