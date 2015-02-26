<?php

/**
 * blacklist actions.
 *
 * @package    levandos
 * @subpackage blacklist
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class blacklistActions extends commonActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeAdduser(sfWebRequest $request)
  {
    
     /////Проверяем статус
       if(!$this->checkStatus()) $this->redirect ($this->getRef ());
     /////

     $i = Doctrine::getTable('sfGuardUser')
     ->createQuery('a')
     ->where('a.username=?',array($request->getParameter('username')))
     ->fetchOne();
     if($i->getId()==$this->getUser()->getGuardUser()->getId())
     {
        $this->getUser ()->setFlash ( 'error', __('You can not add youself!',array('%1%'=>$request->getParameter('username'))) );
        $this->redirect($this->getRef());
     }


     if($i->getIsStaff() or $i->getIsSuperAdmin())
     {
        $this->getUser ()->setFlash ( 'error', __('You can not block this user!',array('%1%'=>$request->getParameter('username'))) );
        $this->redirect($this->getRef());
     }


    $this->forward404Unless($i);
    $f = Doctrine::getTable('Blacklist')
     ->createQuery('a')
     ->where('a.user_id=? and a.black_id=?',array($this->getUser()->getGuardUser()->getId(),$i->getId()))
     ->fetchOne();
     if($f)
     {
         $this->getUser ()->setFlash ( 'error', __('User "%1%" is already in blacklist!',array('%1%'=>$request->getParameter('username'))) );
         $this->redirect($this->getRef());
     }
     else
     {
         $ff = new Blacklist();
         $ff->setUserId($this->getUser()->getGuardUser()->getId());
         $ff->setBlackId($i->getId());
         $ff->save();
         $this->getUser ()->setFlash ( 'message', __('User "%1%" has been added in your blacklist.',array('%1%'=>$request->getParameter('username'))) );
     }

    $this->redirect($this->getRef());
  }

  public function executeIndex(sfWebRequest $request)
  {
      $this->checkAuthorization();
      $this->checkPacket();
      $q = Doctrine::getTable('Blacklist')
      ->createQuery('a')
      ->where('a.user_id=?',array($this->getUser()->getGuardUser()->getId()))
      ->orderBy('a.id DESC');

       $this->pager = new sfDoctrinePager('Blacklist',20);
       $this->pager->setQuery($q);
       $this->pager->setPage($request->getParameter('page', 1));
       $this->pager->init();
       $this->insertArrays();
  }


   public function executeDel(sfWebRequest $request)
  {
        $i = Doctrine::getTable('Blacklist')->find($request->getParameter('id'));
        $this->forward404Unless($i);
        if($i->getUserId()==$this->getUser()->getGuardUser()->getId())
        {
         $i->delete();
         $this->getUser ()->setFlash ( 'message', __('User "%1%" has been deleted from blacklist.',array('%1%'=>$i->getBlack())) );
        }
      else
       {
           $this->getUser ()->setFlash ( 'error', __('Ошибка.'));
       }

       $this->redirect($this->getRef());

  }
  
    protected function checkPacket()
    {
        $p = $this->getUser()->getGuardUser()->getProfile();
        if($p->getPacketId()==1 and $p->getGender()=='m')
        {
            $this->getUser ()->setFlash ( 'error', __('Your membership doesn`t allow this action!') );
            $this->redirect ($this->getRef ());
        }
    }  

}
