<?php

/**
 * topic actions.
 *
 * @package    Forum
 * @subpackage topic
 * @author     Jeremie ROBERT
 */
class sfForumTopicActions extends commonActions{
    public function executeIndex(sfWebRequest $request) {
        
        if($request->getParameter('category_id')=='') $this->redirect ('mainpage/index');
        
        $q = Doctrine_Query::create()
                ->select('t.*, u.username as username')
                ->from('sfForumTopic t')
                ->leftJoin('t.User as u')
               // ->andWhere('t.hide=?',array(false))
                ->andWhere('t.category_id=?',array($request->getParameter('category_id')));

        // show permission
        $permission = Doctrine::getTable('sfForumCategory')->find(array($request->getParameter('category_id')));

        foreach($permission->sfGuardPermission as $p) {
            $this->forward404Unless($this->getUser()->hasCredential($p->name), sprintf('No good permission'));
        }

        // $nbPosts = sfConfig::get('app_posts_number_per_page', 10);

        $numPage = $request->getParameter('page', 1);

        $this->pager = new sfDoctrinePager('Topic', 10);
        $this->pager->setQuery($q);
        $this->pager->setPage($numPage);
        $this->pager->init();

        $response = $this->getResponse();
        $response->addStyleSheet('/sfDoctrineForumPlugin/css/sfForum.css');
    }

    public function executeShow(sfWebRequest $request) {

        $this->insertArrays();

        $this->topic = Doctrine_Query::create()
                ->select('t.*, u.username as username')
                ->from('sfForumTopic t')
               ->leftJoin('t.User as u')
                ->where('t.id=?',$request->getParameter('id'))
                ->fetchOne();

        // show permission
        $permission = Doctrine::getTable('sfForumCategory')->find(array($request->getParameter('category_id')));
        if (!empty($permission)) {
            foreach($permission->sfGuardPermission as $p) {
                $this->forward404Unless($this->getUser()->hasCredential($p->name), sprintf('No good permission'));
            }
        }

        $this->topic->hits = $this->topic->hits+1;
        $this->topic->save();
        $this->forward404Unless($this->topic);

        $this->form = new sfForumMessageForm();

        $q = Doctrine_Query::create()
                ->select('m.*')
                ->from('sfForumMessage m')
                ->innerJoin('m.User u')
                ->where('m.topic_id=?',$request->getParameter('id'))
                ->andWhere('m.hide=false')
                ->andWhere('m.author=u.id');

        // $nbPosts = sfConfig::get('app_posts_number_per_page', 10);

        $numPage = $request->getParameter('page', 1);

        $this->pager = new sfDoctrinePager('sfForumTopic', 10);
        $this->pager->setQuery($q);
        $this->pager->setPage($numPage);
        $this->pager->init();
        if ($numPage=='last') {
            $numPage = $this->pager->getLastPage();
            $this->pager->setPage($numPage);
            $this->pager->init();
        }
        $response = $this->getResponse();
        $response->addStyleSheet('/sfDoctrineForumPlugin/css/sfForum.css');

    }
    public function executeNew(sfWebRequest $request) {
        $this->topic = null;
        $this->form = new sfForumMessageForm();
        $this->form->embedRelation('sfForumTopic');
        // unset($this->form['topic_id']);
        $response = $this->getResponse();
        $response->addStyleSheet('/sfDoctrineForumPlugin/css/sfForum.css');
    }
    public function executeCreate(sfWebRequest $request) {

        $this->forward404Unless($request->isMethod(sfRequest::POST));
        $this->topic = null;
        $this->form = new sfForumMessageForm();
        $this->form->embedRelation('sfForumTopic');
        // unset($this->form->topic_id);

        $this->form->hide = 0;
        $this->form['sfForumTopic']->author = $this->getUser()->getGuardUser()->getId();
        $this->form->author = $this->getUser()->getGuardUser()->getId();
        $this->processFormNew($request, $this->form);
        $response = $this->getResponse();
        $response->addStyleSheet('/sfDoctrineForumPlugin/css/sfForum.css');
        $this->setTemplate('new');
    }

    public function executeEdit(sfWebRequest $request) {
        $this->forward404Unless($this->topic = Doctrine::getTable('sfForumTopic')->find(array($request->getParameter('id'))), sprintf('Object topic does not exist (%s).', $request->getParameter('id')));
        $this->forward404Unless($this->getUser()->getGuardUser()->getId()==$this->topic->getAuthor());
        $this->form = new sfForumTopicForm($this->topic);
        $response = $this->getResponse();
        $response->addStyleSheet('/sfDoctrineForumPlugin/css/sfForum.css');
    }

    public function executeUpdate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $this->forward404Unless($topic = Doctrine::getTable('sfForumTopic')->find(array($request->getParameter('id'))), sprintf('Object topic does not exist (%s).', $request->getParameter('id')));
        $this->form = new sfForumTopicForm($topic);

        $this->processForm($request, $this->form);

        $this->setTemplate('edit');
    }

    public function executeDelete(sfWebRequest $request) {
        $request->checkCSRFProtection();

        $this->forward404Unless($topic = Doctrine::getTable('sfForumTopic')->find(array($request->getParameter('id'))), sprintf('Object topic does not exist (%s).', $request->getParameter('id')));
        $topic->delete();

        $this->redirect('sfForumTopic/index');
    }

    protected function processForm(sfWebRequest $request, sfForm $form) {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {
            $topic = $form->save();
            $this->redirect('sfForumTopic/edit?id='.$topic->getId());
        }
    }

    protected function processFormNew(sfWebRequest $request, sfForm $form) {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {
            $topic = $form->save();
            $this->redirect('sfForumTopic/show?id='.$topic->getTopicId());
        }
    }
}
