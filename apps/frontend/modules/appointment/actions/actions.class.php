<?php

/**
 * interest actions.
 *
 * @package    levandos
 * @subpackage interest
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class appointmentActions extends commonActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */

   
    public function executeAccept(sfWebRequest $request)
  {
      $this->checkAuthorization();
      $p = ChatAppointmentTable::getInstance()->find($request->getParameter('id'));
      $this->forward404Unless($p);
      $p->setStatus(1);
      $p->save();
      $this->redirect('appointment/my');
  }

  
      public function executeRefuse(sfWebRequest $request)
  {
      $this->checkAuthorization();
      $p = ChatAppointmentTable::getInstance()->find($request->getParameter('id'));
      $this->forward404Unless($p);
      $p->setStatus(2);
      $p->save();
      $this->redirect('appointment/my');
  }
  

  public function executeIndex(sfWebRequest $request)
  {
      $this->checkAuthorization();
     
      
        $q = Doctrine::getTable('ChatAppointment')
      ->createQuery('a')
      ->where('a.man_id=?',array($this->getUser()->getGuardUser()->getId()))
      ->orderBy('a.id DESC');



       $this->pager = new sfDoctrinePager('ChatAppointment',20);
       $this->pager->setQuery($q);
       $this->pager->setPage($request->getParameter('page', 1));
       $this->pager->init();
       $this->insertArrays();
  }

  public function executeMy(sfWebRequest $request)
  {

      $this->checkAuthorization();
        $q = Doctrine::getTable('ChatAppointment')
      ->createQuery('a')
      ->where('a.girl_id=?',array($this->getUser()->getGuardUser()->getId()))
      ->orderBy('a.id DESC');



       $this->pager = new sfDoctrinePager('ChatAppointment',20);
       $this->pager->setQuery($q);
       $this->pager->setPage($request->getParameter('page', 1));
       $this->pager->init();
       $this->insertArrays();
  }


    protected function sendMail($guard_user_to, $guard_user_from)
    {

        $par = array(
            '%name%' => $guard_user_to->getProfile()->getFullName(),
            '%user%' => $guard_user_from,
            '%link_friend%' => link_to(__('link'),'friend/index?code='.$guard_user_to->getSalt(),array('absolute' => true)),
            '%link_friend_char%' => url_for('friend/index?code='.$guard_user_to->getSalt(),array('absolute' => true)),
            '%link%' => link_to(__('link'),'profile/show?username='.$guard_user_from->getUsername(),array('absolute' => true))
        );

        NotifyTable::sendNotify($guard_user_to, 13, $par);

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
