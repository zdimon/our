<?php

require_once dirname(__FILE__).'/../lib/photoGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/photoGeneratorHelper.class.php';

/**
 * photo actions.
 *
 * @package    levandos
 * @subpackage photo
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class photoActions extends autoPhotoActions
{

    public function preExecute()
  {
     parent:: preExecute();
     unset($_SESSION['access_payment']);

  }
  
  public function executeFix(sfWebRequest $request)
  {
      $pr = PhotoTable::getInstance()->findAll();
      foreach ($pr as $p)
      {
          $p->save();

      }
                echo 'done';
          die;
  }
  
 public function executeListSetmain(sfWebRequest $request)
  {

   $p = Doctrine::getTable('Photo')->find($request->getParameter('id'));
   $this->forward404Unless($p);

   $pr = $p->getUser()->getProfile();

    if(($p->getPartnerId()==$this->getUser()->getGuardUser()->getId()) or $this->getUser()->hasCredential('admin'))
   {
        Doctrine_Query::create()
        ->update('Photo p')
        ->set('is_main','false')
        ->where('p.user_id=?', array($pr->getUserId()))
        ->execute();
        $p->setIsMain(true);
        $p->save();
        //$pr->setPhoto($p->getImage());
        $pr->save();
        $this->getUser ()->setFlash ( 'message', __('Указанное фото установлено в качестве главного.') );
   }
    $this->redirect($request->getReferer());

  }

  public function executeListActivate(sfWebRequest $request)
  {
    $p = Doctrine::getTable('Photo')->find($request->getParameter('id'));
    $p->setPub(true);
    $p->save();
    $this->getUser()->setFlash('notice', 'Фото активировано.');
    $this->redirect('photo/index');
  }

    public function executeListDeactivate(sfWebRequest $request)
  {
    $p = Doctrine::getTable('Photo')->find($request->getParameter('id'));
    $p->setPub(false);
    $p->save();
    $this->getUser()->setFlash('notice', 'Фото деактивировано.');
    $this->redirect('photo/index');
  }


    public function executeBatchActivate(sfWebRequest $request)
  {
    $ids = $request->getParameter('ids');

    $p = Doctrine::getTable('photo')
    ->createQuery('a');

    $q = Doctrine_Query::create()
      ->from('Photo p')
      ->whereIn('p.id', $ids);

    foreach ($q->execute() as $p)
    {
      $p->setPub(true);
      $p->save();
    }

    $this->getUser()->setFlash('notice', 'The selected jobs have been activate successfully.');
    $this->redirect('photo/index');
  }

  public function executeBatchDeactivate(sfWebRequest $request)
  {
    $ids = $request->getParameter('ids');
    foreach ($ids as $i)
    {
      $p = Doctrine::getTable('Photo')->find($i);
      $p->setPub(false);
      $p->save();
    }
    $this->getUser()->setFlash('notice', 'The selected jobs have been activate successfully.');
    $this->redirect('photo/index');
  }


  protected function buildQuery()
  {
    $query = parent::buildQuery();
    if(!$this->getUser()->hasCredential('admin'))
    {
        $query->andWhere(
                'partner_id = ?', $this->getUser()->getGuardUser()->getId()
                );
    }
    //return $query->andWhere('pub=0');
    return $query;
  }

  ///////// Фильтры
    //// на утверждении
   public function executeFilterOnapprove(sfWebRequest $request)
  {

    $this->getUser()->setAttribute(
	'photo.filters',
	array('pub'=>0),
	'admin_module'
	);
	$this->redirect('photo/index');
  }

  

}
