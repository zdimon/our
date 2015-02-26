<?php

require_once dirname(__FILE__).'/../lib/suggestionsGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/suggestionsGeneratorHelper.class.php';

/**
 * suggestions actions.
 *
 * @package    levandos
 * @subpackage suggestions
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class suggestionsActions extends autoSuggestionsActions
{
    
     public function executeBatchActivate(sfWebRequest $request)
    {
        $ids = $request->getParameter('ids');

        $p = Doctrine::getTable('Suggestions')
            ->createQuery('a');

        $q = Doctrine_Query::create()
            ->from('Suggestions p')
            ->whereIn('p.id', $ids);

        foreach ($q->execute() as $p)
        {
            $p->setPub(true);
            $p->save();
        }

        $this->getUser()->setFlash('notice', 'The selected jobs have been activate successfully.');
        $this->redirect('suggestions/index');
    }

    public function executeBatchDeactivate(sfWebRequest $request)
    {
        $ids = $request->getParameter('ids');
        foreach ($ids as $i)
        {
            $p = Doctrine::getTable('Suggestions')->find($i);
            $p->setPub(false);
            $p->save();
        }
        $this->getUser()->setFlash('notice', 'The selected jobs have been activate successfully.');
        $this->redirect('suggestions/index');
    }


    public function executeList_activate(sfWebRequest $request)
    {
        $p = Doctrine::getTable('Suggestions')->find($request->getParameter('id'));
        $p->setPub(true);
        $p->save();
        $this->getUser()->setFlash('notice', 'Элемент активирован.');
        $this->redirect('suggestions/index');
    }


    public function executeList_deactivate(sfWebRequest $request)
    {
        $p = Doctrine::getTable('Suggestions')->find($request->getParameter('id'));
        $p->setPub(false);
        $p->save();
        $this->getUser()->setFlash('notice', 'Элемент заблокирован.');
        $this->redirect('suggestions/index');
    }
    
}
