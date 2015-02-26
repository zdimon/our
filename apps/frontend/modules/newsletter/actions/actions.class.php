<?php

/**
 * access actions.
 *
 * @package    xy
 * @subpackage access
 * @author     wezom.com.ua
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class newsletterActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeShow(sfWebRequest $request)
  {
    $this->id = $request->getParameter('id');
  }

   public function executeUnsubscribe(sfWebRequest $request)
  {
   $this->id = $request->getParameter('id');
   if($request->getParameter('lang'))
   {
       $this->lang = $request->getParameter('lang');
   }
   else
   {
       $this->lang = 'ru';
   }
  }

  


}
