<?php

require_once dirname(__FILE__).'/../lib/messageGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/messageGeneratorHelper.class.php';

/**
 * message actions.
 *
 * @package    levandos
 * @subpackage message
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class messageActions extends autoMessageActions
{
    
     public function executeStat(sfWebRequest $request)
    {
         
         if($request->getParameter('from_id'))
         {
           $q= Doctrine::getTable('Message')
           ->createQuery('a')
           ->where('a.from_id=?',array($request->getParameter('from_id')))
           ->orderBy('a.id DESC');
         }
 
         if($request->getParameter('to_id'))
         {
           $q= Doctrine::getTable('Message')
           ->createQuery('a')
           ->where('a.to_id=?',array($request->getParameter('to_id')))
                   ->orderBy('a.id DESC');
         }
         
        $this->pager = new sfDoctrinePager('Message',20);
        $this->pager->setQuery($q);
        $this->pager->setPage($request->getParameter('page', 1));
        $this->pager->init();
        
         
         
         $this->items = $q;
         
        //$this->mes = Doctrine::getTable('Message')->find($request->getParameter('mesid'));
        
    }
    

    public function executeAnswer(sfWebRequest $request)
    {
        $this->mes = Doctrine::getTable('Message')->find($request->getParameter('mesid'));
        $this->setLayout(false);
    }

    public function executeMessave(sfWebRequest $request)
    {
        $this->mes = Doctrine::getTable('Message')->find($request->getParameter('mesid'));

        $m = new Message();
        $m->setToId($this->mes->getFromId());
        $m->setFromId($this->mes->getToId());
        $m->setContent($request->getParameter('cont'));
        $m->save();

        $this->mes  = $m;
        $this->setLayout(false);
    }


   public function executeFilterSend(sfWebRequest $request)
  {
    $u = Doctrine::getTable('sfGuardUser')->find($request->getParameter('id'));
    $pf = $u->getProfile();
    $this->getUser()->setAttribute(
	'message.filters',
	array('from_id'=>$pf->getUserId()),
	'admin_module'
	);
	$this->redirect($this->generateUrl('message'));
  }

     public function executeFilterRead(sfWebRequest $request)
  {
    $u = Doctrine::getTable('sfGuardUser')->find($request->getParameter('id'));
    $pf = $u->getProfile();
    $this->getUser()->setAttribute(
	'message.filters',
	array('to_id'=>$pf->getUserId(),
           'is_read'=>true ),
	'admin_module'
	);
    
	$this->redirect($this->generateUrl('message'));
  }

   public function executeFilterRecive(sfWebRequest $request)
  {
    $u = Doctrine::getTable('sfGuardUser')->find($request->getParameter('id'));
    $pf = $u->getProfile();
    $this->getUser()->setAttribute(
	'message.filters',
	array('to_id'=>$pf->getUserId()
           ),
	'admin_module'
	);

	$this->redirect($this->generateUrl('message'));
  }

   public function executeFilterUnrepeat(sfWebRequest $request)
  {
    $u = Doctrine::getTable('sfGuardUser')->find($request->getParameter('id'));
    
    $this->getUser()->setAttribute(
	'message.filters',
	array('is_reply'=>0, 'to_partner_id'=>array('text'=>$u->getId())
           ),
	'admin_module'
	);

	$this->redirect($this->generateUrl('message'));
  }


    ///////// Фильтры общие
    //// не прочтенные
   public function executeFilterAllUnread(sfWebRequest $request)
  {

    $this->getUser()->setAttribute(
	'message.filters',
	array('is_read'=>0),
	'admin_module'
	);
	$this->redirect('message/index');
  }

    //// не отвеченные
   public function executeFilterAllUnreply(sfWebRequest $request)
  {

    $this->getUser()->setAttribute(
	'message.filters',
	array('is_reply'=>0),
	'admin_module'
	);
	$this->redirect('message/index');
  }

    //// отклоненные
   public function executeFilterAllReject(sfWebRequest $request)
  {

    $this->getUser()->setAttribute(
	'message.filters',
	array('del_to'=>1),
	'admin_module'
	);
	$this->redirect('message/index');
  }



    public function preExecute()
  {
     parent:: preExecute();
     unset($_SESSION['access_payment']);

  }

  protected function buildQuery()
  {
    $query = parent::buildQuery();
    if(!$this->getUser()->hasCredential('admin'))
    {
        $query->andWhere(
                '(to_partner_id = ?)', array($this->getUser()->getGuardUser()->getId())
                );
    }
    $query->andWhere('type_message<>?',array('smile'));
    return $query;
  }




}
