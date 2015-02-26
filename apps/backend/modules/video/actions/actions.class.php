<?php

require_once dirname(__FILE__).'/../lib/videoGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/videoGeneratorHelper.class.php';

/**
 * video actions.
 *
 * @package    levandos
 * @subpackage video
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class videoActions extends autoVideoActions
{

    public function preExecute()
  {
     parent:: preExecute();
     unset($_SESSION['access_payment']);

  }

  public function executeListActivate(sfWebRequest $request)
  {
    $p = Doctrine::getTable('Video')->find($request->getParameter('id'));
    $p->setPub(true);
    $p->save();
    $this->getUser()->setFlash('notice', 'Видео активировано.');
    $this->redirect('video/index');
  }

    public function executeListDeactivate(sfWebRequest $request)
  {
    $p = Doctrine::getTable('Video')->find($request->getParameter('id'));
    $p->setPub(false);
    $p->save();
    $this->getUser()->setFlash('notice', 'Видео деактивировано.');
    $this->redirect('video/index');
  }

      public function executeShow(sfWebRequest $request)
  {
    $this->video = Doctrine_Core::getTable('Video')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->video);
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
    return $query;
  }

    ///////// Фильтры
    //// на утверждении
   public function executeFilterOnapprove(sfWebRequest $request)
  {

    $this->getUser()->setAttribute(
	'video.filters',
	array('pub'=>0),
	'admin_module'
	);
	$this->redirect('video/index');
  }
  
  
}
