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
            $ref = str_replace('/fr/', '/ru/', $ref);
            $ref = str_replace('/de/', '/ru/', $ref);
            $ref = str_replace('/is/', '/ru/', $ref);
          
        }

        if($request->getParameter('l')=='en')
        {
            $this->getUser()->setCulture('en');
            $ref = str_replace('/ru/', '/en/', $ref);
            $ref = str_replace('/fr/', '/en/', $ref);
            $ref = str_replace('/de/', '/en/', $ref);
            $ref = str_replace('/is/', '/en/', $ref);
        }


        if($request->getParameter('l')=='fr')
        {
            $this->getUser()->setCulture('fr');
            $ref = str_replace('/en/', '/fr/', $ref);
            $ref = str_replace('/ru/', '/fr/', $ref);
            $ref = str_replace('/de/', '/fr/', $ref);
            $ref = str_replace('/is/', '/fr/', $ref);
        }

      if($request->getParameter('l')=='de')
      {
          $this->getUser()->setCulture('de');
          $ref = str_replace('/en/', '/de/', $ref);
          $ref = str_replace('/fr/', '/de/', $ref);
          $ref = str_replace('/ru/', '/de/', $ref);
          $ref = str_replace('/is/', '/de/', $ref);
      }

      if($request->getParameter('l')=='is')
      {
          $this->getUser()->setCulture('is');
          $ref = str_replace('/en/', '/is/', $ref);
          $ref = str_replace('/fr/', '/is/', $ref);
          $ref = str_replace('/de/', '/is/', $ref);
          $ref = str_replace('/ru/', '/is/', $ref);
      }

    if($request->getParameter('put'))
    {
        if($request->getParameter('l')=='ru')
        {
            $this->redirect('http://www.our-feeling.com/ru/mainpage.html');
        }
        elseif($request->getParameter('l')=='de')
        {
            $this->redirect('http://www.our-feeling.com/de/mainpage.html');
        }
        elseif($request->getParameter('l')=='fr')
        {
            $this->redirect('http://www.our-feeling.com/fr/mainpage.html');
        }
        elseif($request->getParameter('l')=='is')
        {
            $this->redirect('http://www.our-feeling.com/is/mainpage.html');
        }
        else{
            $this->redirect('http://www.our-feeling.com/en/mainpage.html');
        }


    }
    else
    {
        if($request->getParameter('mp'))
            $this->redirect('@mainpage');
        
        $main = 'http://'.$_SERVER['HTTP_HOST'].'/';
        if(strlen($ref)>0 and $ref!=$main)
        $this->redirect($ref);

        $this->redirect('@mainpage');
    }


  }
}
