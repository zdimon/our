<?php

require_once dirname(__FILE__).'/../lib/faqGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/faqGeneratorHelper.class.php';

/**
 * faq actions.
 *
 * @package    levandos
 * @subpackage faq
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class faqActions extends autoFaqActions
{





    public function executeBatchActivate(sfWebRequest $request)
  {
    $ids = $request->getParameter('ids');

    $p = Doctrine::getTable('Faq')
    ->createQuery('a');

    $q = Doctrine_Query::create()
      ->from('Faq p')
      ->whereIn('p.id', $ids);

    foreach ($q->execute() as $p)
    {
      $p->setPub(true);
      $p->save();
    }

    $this->getUser()->setFlash('notice', 'The selected jobs have been activate successfully.');
    $this->redirect('faq/index');
  }

  public function executeBatchDeactivate(sfWebRequest $request)
  {
    $ids = $request->getParameter('ids');
    foreach ($ids as $i)
    {
      $p = Doctrine::getTable('Faq')->find($i);
      $p->setPub(false);
      $p->save();
    }
    $this->getUser()->setFlash('notice', 'The selected jobs have been activate successfully.');
    $this->redirect('faq/index');
  }


    public function executeList_activate(sfWebRequest $request)
    {
        $p = Doctrine::getTable('Faq')->find($request->getParameter('id'));
        $p->setPub(true);
        $p->save();
        $this->getUser()->setFlash('notice', 'Элемент активирован.');
        $this->redirect('faq/index');
    }


    public function executeList_deactivate(sfWebRequest $request)
    {
        $p = Doctrine::getTable('Faq')->find($request->getParameter('id'));
        $p->setPub(false);
        $p->save();
        $this->getUser()->setFlash('notice', 'Элемент заблокирован.');
        $this->redirect('faq/index');
    }



    public function executeNew(sfWebRequest $request)
  {



    $t = new Faq();

    $t->setUserId($this->getUser()->getGuardUser()->getId());
    $t->setReadId($this->getUser()->getGuardUser()->getId());
    $t->setPub(false);
    $this->form = $this->configuration->getForm($t);
    $this->faq = $this->form->getObject();
  }











}
