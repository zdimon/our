<?php

/**
 * terms actions.
 *
 * @package    levandos
 * @subpackage terms
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class termsActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
     $this->page= Doctrine::getTable('Page')->find(5);
     $this->setLayout('splash_layout');
  }
}
