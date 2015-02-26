<?php

/**
 * viewed actions.
 *
 * @package    levandos
 * @subpackage viewed
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class viewedActions extends commonActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
      $this->checkAuthorization();
      $this->checkMember('viewed');
      $q = Doctrine::getTable('Viewed')
          ->createQuery('a')
          ->where('a.interest_id=?',array($this->getUser()->getGuardUser()->getId()))
          ->orderBy('a.id DESC');

      $this->pager = new sfDoctrinePager('Viewed',20);
      $this->pager->setQuery($q);
      $this->pager->setPage($request->getParameter('page', 1));
      $this->pager->init();
      $this->insertArrays();
  }

    public function executeMy(sfWebRequest $request)
    {
        $this->checkAuthorization();
        $this->checkPacket();
            $q = Doctrine::getTable('Viewed')
            ->createQuery('a')
            ->where('a.user_id=?',array($this->getUser()->getGuardUser()->getId()))
            ->orderBy('a.id DESC');

        $this->pager = new sfDoctrinePager('Viewed',20);
        $this->pager->setQuery($q);
        $this->pager->setPage($request->getParameter('page', 1));
        $this->pager->init();
        $this->insertArrays();
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


}?>