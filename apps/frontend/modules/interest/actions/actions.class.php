<?php

/**
 * interest actions.
 *
 * @package    levandos
 * @subpackage interest
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class interestActions extends commonActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */

    // Add interest
    public function executeAdd(sfWebRequest $request)
    {
        $this->checkAuthorization();
        /////Проверяем статус
        if(!$this->checkStatus()) $this->redirect ($this->getRef ());
        /////
        $i = Doctrine::getTable('sfGuardUser')
            ->createQuery('a')
            ->where('a.username=?',array($request->getParameter('username')))
            ->fetchOne();
        $this->forward404Unless($i);
        
        $fn = $i->getProfile()->getFirstName().' '.$i->getProfile()->getLastName();
        
        /// Проверка на черный список
        if(!$this->checkBlacklist($i)) $this->redirect ($this->getRef ());

        if($i->getId()==$this->getUser()->getGuardUser()->getId())
        {
            $this->getUser ()->setFlash ( 'error', __('You can not send interes to youself!',array('%1%'=>$fn)) );
            $this->redirect($this->getRef());
        }
        $this->forward404Unless($i);
        $f = Doctrine::getTable('Interest')
            ->createQuery('a')
            ->where('a.user_id=? and a.interest_id=?',array($this->getUser()->getGuardUser()->getId(),$i->getId()))
            ->fetchOne();
        if($f)
        {
            $this->getUser ()->setFlash ( 'error', __('User "%1%" already have you interes!',array('%1%'=>$fn)) );
            $this->redirect($this->getRef());
        }
        else
        {
            $ff = new Interest();
            $ff->setUserId($this->getUser()->getGuardUser()->getId());
            $ff->setInterestId($i->getId());
            $ff->setPopup(false);
            $ff->save();
            $this->getUser ()->setFlash ( 'message', __('Your interest have been sent to "%1%".',array('%1%'=>$fn)) );
            //$this->sendMail($ff->getInterestId(), $ff->getInterestId());
            NotifyTable::sendTemplate($i,$this->getUser()->getGuardUser(),8);
        }

        $this->redirect($this->getRef());

    }



  public function executeIndex(sfWebRequest $request)
  {
      $this->checkAuthorization();
      $this->checkMember('vizited');
      
        $q = Doctrine::getTable('Interest')
      ->createQuery('a')
      ->where('a.interest_id=?',array($this->getUser()->getGuardUser()->getId()))
      ->orderBy('a.id DESC');



       $this->pager = new sfDoctrinePager('Interest',20);
       $this->pager->setQuery($q);
       $this->pager->setPage($request->getParameter('page', 1));
       $this->pager->init();
       $this->insertArrays();
  }

  public function executeMy(sfWebRequest $request)
  {

      $this->checkAuthorization();
      $this->checkPacket();
        $q = Doctrine::getTable('Interest')
      ->createQuery('a')
      ->where('a.user_id=?',array($this->getUser()->getGuardUser()->getId()))
      ->orderBy('a.id DESC');

       $this->pager = new sfDoctrinePager('Interest',20);
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
