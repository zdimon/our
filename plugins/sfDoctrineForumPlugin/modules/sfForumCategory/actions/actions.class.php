<?php

/**
 * category actions.
 *
 * @package    Forum
 * @subpackage category
 * @author     Jeremie ROBERT
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class sfForumCategoryActions extends commonActions {
    public function executeIndex(sfWebRequest $request) {
        
        $this->checkMember('forum');
        
               $this->page = Doctrine::getTable('Page')
      ->createQuery('a')
      ->leftJoin('a.Translation t')
      ->where('a.alias=?',array('forum_page'))
      ->fetchOne();
        
        $q = Doctrine_Query::create()
                ->select('c.*, u.username as username')
                ->from('sfForumCategory c')
               ->leftJoin('c.User as u')
                ->andWhere('c.hide=false');

        $numPage = $request->getParameter('page', 1);

        $this->pager = new sfDoctrinePager('Category', 10);
        $this->pager->setQuery($q);
        $this->pager->setPage($numPage);
        $this->pager->init();
        $response = $this->getResponse();
        $response->addStyleSheet('/sfDoctrineForumPlugin/css/sfForum.css');
    }

    public function executeNew(sfWebRequest $request) {
        $this->forward404Unless($this->getUser()->isSuperAdmin());
        $this->form = new sfForumCategoryForm();
        $response = $this->getResponse();
        $response->addStyleSheet('/sfDoctrineForumPlugin/css/sfForum.css');
    }

    public function executeCreate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST));

        $this->form = new sfForumCategoryForm();
        $this->form->hide = 0;
        $this->form->author = $this->getUser()->getGuardUser()->getId();
        $this->processForm($request, $this->form);
        $response = $this->getResponse();
        $response->addStyleSheet('/sfDoctrineForumPlugin/css/sfForum.css');
        $this->setTemplate('new');
    }

    public function executeEdit(sfWebRequest $request) {
        $this->forward404Unless($category = Doctrine::getTable('sfForumCategory')->find(array($request->getParameter('id'))), sprintf('Object category does not exist (%s).', $request->getParameter('id')));
        $this->form = new sfForumCategoryForm($category);

        // show permission
        $this->permission = Doctrine_Query::create()
                ->select('s.name as name')
                ->from('sfForumCategory c')
                ->innerJoin('c.sfGuardPermission s WITH c.id=?',$request->getParameter('id'))
                ->fetchArray();
        
        $response = $this->getResponse();
        $response->addStyleSheet('/sfDoctrineForumPlugin/css/sfForum.css');
    }

    public function executeUpdate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $this->forward404Unless($category = Doctrine::getTable('sfForumCategory')->find(array($request->getParameter('id'))), sprintf('Object category does not exist (%s).', $request->getParameter('id')));
        $this->form = new sfForumCategoryForm($category);

        $this->processForm($request, $this->form);
        $response = $this->getResponse();
        $response->addStyleSheet('/sfDoctrineForumPlugin/css/sfForum.css');
        $this->setTemplate('edit');
    }

    public function executeDelete(sfWebRequest $request) {
        $request->checkCSRFProtection();

        $this->forward404Unless($category = Doctrine::getTable('sfForumCategory')->find(array($request->getParameter('id'))), sprintf('Object category does not exist (%s).', $request->getParameter('id')));
        $category->delete();

        $this->redirect('sfForumCategory/index');
    }

    protected function processForm(sfWebRequest $request, sfForm $form) {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {
            $category = $form->save();

            $this->redirect('sfForumCategory/edit?id='.$category->getId());
        }
    }
}
