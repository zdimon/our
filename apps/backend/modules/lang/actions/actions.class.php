<?php

/**
 * lang actions.
 *
 * @package    piramida
 * @subpackage lang
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class langActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {

              $ref = $_SERVER['HTTP_REFERER'];
        if($request->getParameter('l')=='ru')
        {
            $this->getUser()->setCulture('ru');
            $ref = str_replace('/en/', '/ru/', $ref);
          
        }

        if($request->getParameter('l')=='en')
        {
            $this->getUser()->setCulture('en');
             $ref = str_replace('/ru/', '/en/', $ref);
        }

        if($request->getParameter('l')=='uk')
        {
            $this->getUser()->setCulture('uk');
        }

        if($request->getParameter('l')=='fr')
        {
            $this->getUser()->setCulture('fr');
        }

        
	if(strlen($ref)>0)
	$this->redirect($ref);
	$this->redirect('@mainpage');



  }
}
