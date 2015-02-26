<?php

require_once dirname(__FILE__).'/../lib/scamer_reportGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/scamer_reportGeneratorHelper.class.php';

/**
 * scamer_report actions.
 *
 * @package    levandos
 * @subpackage scamer_report
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class scamer_reportActions extends autoScamer_reportActions
{
    
      public function executeRem(sfWebRequest $request)
    {
          
          $u = sfGuardUserTable::getInstance()->find($request->getParameter('i'));
          $p = $u->getProfile();
          $p->setScamer(false);
          $p->save();
          $this->redirect('scamer_report/index');
          
    }
    
      public function executeSet(sfWebRequest $request)
    {
          
          $u = sfGuardUserTable::getInstance()->find($request->getParameter('i'));
          $p = $u->getProfile();
          $p->setScamer(true);
          $p->save();
          $this->redirect('scamer_report/index');
          
    }    
    
    
}
