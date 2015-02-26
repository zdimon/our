<?php

/**
 * access actions.
 *
 * @package    xy
 * @subpackage access
 * @author     wezom.com.ua
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class falseActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
    
    
     public function executeOnline(sfWebRequest $request)
  {
     $u = sfGuardUserTable::getInstance()->find($request->getParameter('i'));
     $p = $u->getProfile();
      $t = time();
     if($request->getParameter('act')=='act')
     {
        
         $t = $t + (60*60*60);
         $u->setIsOnline(true);
         $u->setTimer($t);
         $p->setIsOnline(true);
     } else {
         $u->setTimer($t);
         $u->setIsOnline(false);
         $p->setIsOnline(false);
        
     }
     $u->save();
     $p->save();
     $this->f = $u;
  }
  
  public function executeManage(sfWebRequest $request)
  {
     $this->fs = $this->getFalses($request);
  }
  
   public function executeSetactive(sfWebRequest $request)
  {
     $_SESSION['current_false'] = $request->getParameter('u');
     $this->fs = $this->getFalses();
     
  } 

  private function getFalses($request)
  {
      if($request->getParameter('gender')=='m')
      {
         $g = 'm';  
      }
 else {
          $g = 'w';
      
 
      }
      $fs = sfGuardUserTable::getInstance()->createQuery('a')
              ->leftJoin('a.Profile')
              ->where('a.is_false=? and a.gender=?',array(true,$g))
              ->execute();
      return $fs;
  }
  

  
    public function executeGallery(sfWebRequest $request)
  {
        $q = Doctrine::getTable('Profile')
       ->createQuery('a')
       ->leftJoin('a.sfGuardUser s')
       ->where('a.is_active=? and is_staff=?',array(true,false))
       ->orderBy('a.id DESC');

        if($_SESSION['current_false']>0)
        {
            $cu = sfGuardUserTable::getInstance()->find($_SESSION['current_false']);
            if($cu->getGender()=='m')
            {
                $g = 'w';
            } else {
                $g = 'm';
            }
            $q->addWhere('a.gender=?',array($g));
        }
        
        
        $this->pager = new sfDoctrinePager('Profile',12);
        $this->pager->setQuery($q);
        $this->pager->setPage($request->getParameter('page', 1));
        $this->pager->init();
  }
  
  
      public function executeSend(sfWebRequest $request)
  {
     $m = new Message();
     $m->setFromId($_SESSION['current_false']);
     $m->setToId($request->getParameter('u'));
     $this->from_user = sfGuardUserTable::getInstance()->find($_SESSION['current_false']);
     $this->to_user = sfGuardUserTable::getInstance()->find($request->getParameter('u'));
     $this->form = new backendMessageForm($m);        
  }
  
  
   public function executeSave(sfWebRequest $request)
  {
      
      $this->form = new backendMessageForm( );

		if ($request->isMethod ( 'post' ))
		{
			$this->form->bind ( $request->getParameter ( 'message' ), $request->getFiles('message') );
                        if ($this->form->isValid ()) {

                            
                            $m = $this->form->save();
                          
                            NotifyTable::sendTemplate($m->getToUser(),$m->getFromUser(),3);
                            $this->getUser()->setFlash('notice', 'Your message has been sent.');
                           $this->redirect('false/manage');
                           
                        }
        }
  }
        

}
