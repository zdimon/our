<?php

/**
 * topic actions.
 *
 * @package    Forum
 * @subpackage topic
 * @author     Jeremie ROBERT
 */
class sfForumMessageActions extends sfActions {
    public function executeIndex(sfWebRequest $request) {
        $this->messages = Doctrine::getTable('sfForumMessage')
                ->createQuery('a')
                ->where('topic_id=?',$request->getParameter('id'))
                ->execute();
    }
    public function executeShow(sfWebRequest $request) {
        $this->message = Doctrine::getTable('sfForumMessage')->find(array($request->getParameter('id')));
        $this->forward404Unless($this->message);
    }

    public function executeNew(sfWebRequest $request) {
        $profile = Doctrine::getTable('sfForumProfile')->find(array($this->getUser()->getGuardUser()->getId()));
        if (empty($profile)) {
            $profile = new sfForumProfile();
            $profile->sf_guard_user_id = $this->getUser()->getGuardUser()->getId();
            $profile->save();
        }
        $this->form = new sfForumMessageForm();
        $response = $this->getResponse();
        $response->addStyleSheet('/sfDoctrineForumPlugin/css/sfForum.css');
    }

    public function executeCreate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST));

        $this->form = new sfForumMessageForm();

        $this->form->hide = 0;
        $this->form->author = $this->getUser()->getGuardUser()->getId();
        $this->processForm($request, $this->form);
        $response = $this->getResponse();
        $response->addStyleSheet('/sfDoctrineForumPlugin/css/sfForum.css');
        $this->setTemplate('new');
    }

    public function executeEdit(sfWebRequest $request) {
        $this->forward404Unless($topic = Doctrine::getTable('sfForumMessage')->find(array($request->getParameter('id'))), sprintf('Object topic does not exist (%s).', $request->getParameter('id')));
        $this->forward404Unless($this->getUser()->getGuardUser()->getId()==$topic->getAuthor());
        $this->form = new sfForumMessageForm($topic);
        $response = $this->getResponse();
        $response->addStyleSheet('/sfDoctrineForumPlugin/css/sfForum.css');
    }

    public function executeUpdate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $this->forward404Unless($topic = Doctrine::getTable('sfForumMessage')->find(array($request->getParameter('id'))), sprintf('Object topic does not exist (%s).', $request->getParameter('id')));

        $this->form = new sfForumMessageForm($topic);

        $this->processForm($request, $this->form);

        $this->setTemplate('edit');
    }

    public function executeDelete(sfWebRequest $request) {
        $request->checkCSRFProtection();

        $this->forward404Unless($message = Doctrine::getTable('sfForumMessage')->find(array($request->getParameter('id'))), sprintf('Object topic does not exist (%s).', $request->getParameter('id')));
        $topic_id = $message->topic_id;
        $message->delete();

        $this->redirect('sfForumTopic/show?id='.$topic_id);
    }

    protected function processForm(sfWebRequest $request, sfForm $form) {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {
            $topic = $form->save();
            $this->redirect('sfForumTopic/show?page=last&id='.$topic->getTopicId());
            // $this->redirect('sfForumMessage/edit?id='.$topic->getId());
        }
    }
}
