<?php

/**
 * mainpage actions.
 *
 * @package    levandos
 * @subpackage mainpage
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class mainpageActions extends commonActions
{

       public function preExecute()
  {
     parent:: preExecute();
     unset($_SESSION['access_payment']);
     $this->getUser()->setCulture('en');
  }
  
   public function executeCall(sfWebRequest $request)
  {
   //  if(@$_SESSION['cur_chat_call']!='true')
   //  {
 
      
     $pf = $this->getUser()->getGuardUser()->getProfile();
     $pf->setTimeOnSite($pf->getTimeOnSite()+10);
     $pf->save();
     die;
   
  }
  
  
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    
   // if($this->getUser()->hasCredential('partner') and !$this->getUser()->isSuperAdmin()) $this->redirect ('mainpage/partner');
   // if($this->getUser()->hasCredential('redaktor') and !$this->getUser()->hasCredential('admin')) $this->redirect ('mainpage/redaktor');
  }

    public function executePartner(sfWebRequest $request)
  {
     $this->insertArrays();
     $this->user = $this->getUser()->getGuardUser();
     $this->p = $this->user->getPartnerProfile();
  }

  public function executeRedaktor(sfWebRequest $request)
  {

  }


}
