<?php

/**
 * user actions.
 *
 * @package    Forum
 * @subpackage user
 * @author     Jeremie ROBERT
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class sfForumProfilActions extends sfActions {
    public function executeIndex(sfWebRequest $request) {
        $this->forward404Unless($this->getUser()->isSuperAdmin());
        $this->sf_guard_users = Doctrine::getTable('sfGuardUser')
                ->createQuery('a')
                ->execute();
    }
    
    public function executeNew(sfWebRequest $request) {
        $this->form = new BasesfGuardUserAdminForm();
        $profileForm = new sfForumProfileForm($this->form->getObject()->sfForumProfile);
        unset($profileForm['id'], $profileForm['sf_guard_user_id']);
        $this->form->embedForm('sfForumProfile', $profileForm);
        if (!$this->getUser()->isSuperAdmin()) {
            unset($this->form['groups_list'],$this->form['permissions_list'],$this->form['is_active'],$this->form['is_super_admin']);
        }
    }

    public function executeCreate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST));
        
        $this->form = new BasesfGuardUserAdminForm();
        $profileForm = new ForumProfileForm($this->form->getObject()->ForumProfile);
        unset($profileForm['id'], $profileForm['sf_guard_user_id']);
        $this->form->embedForm('sfForumProfile', $profileForm);
        if (!$this->getUser()->isSuperAdmin()) {
            unset($this->form['groups_list'],$this->form['permissions_list'],$this->form['is_active'],$this->form['is_super_admin']);
        }
        $this->processForm($request, $this->form);

        $this->setTemplate('new');
    }

    public function executeEdit(sfWebRequest $request) {
        $this->forward404Unless($sf_guard_user = Doctrine::getTable('sfGuardUser')->find(array($request->getParameter('id'))), sprintf('Object sf_guard_user does not exist (%s).', $request->getParameter('id')));
        $this->form = new BasesfGuardUserAdminForm($sf_guard_user);
        $profileForm = new sfForumProfileForm($this->form->getObject()->sfForumProfile);
        unset($profileForm['id'], $profileForm['sf_guard_user_id']);
        $this->form->embedForm('sfForumProfile', $profileForm);
        if (!$this->getUser()->isSuperAdmin()) {
            unset($this->form['groups_list'],$this->form['permissions_list'],$this->form['is_active'],$this->form['is_super_admin']);
        }
        $response = $this->getResponse();
        $response->addStyleSheet('/sfDoctrineForumPlugin/css/sfForum.css');
    }

    public function executeUpdate(sfWebRequest $request) {
        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $this->forward404Unless($sf_guard_user = Doctrine::getTable('sfGuardUser')->find(array($request->getParameter('id'))), sprintf('Object sf_guard_user does not exist (%s).', $request->getParameter('id')));
        $this->form = new BasesfGuardUserAdminForm($sf_guard_user);
        $profileForm = new sfForumProfileForm($this->form->getObject()->sfForumProfile);
        unset($profileForm['id'], $profileForm['sf_guard_user_id']);
        $this->form->embedForm('sfForumProfile', $profileForm);
        $this->processForm($request, $this->form);
        $response = $this->getResponse();
        $response->addStyleSheet('/sfDoctrineForumPlugin/css/sfForum.css');
        $this->setTemplate('edit');
    }

    public function executeDelete(sfWebRequest $request) {
        $request->checkCSRFProtection();

        $this->forward404Unless($sf_guard_user = Doctrine::getTable('sfGuardUser')->find(array($request->getParameter('id'))), sprintf('Object sf_guard_user does not exist (%s).', $request->getParameter('id')));

        $sf_guard_user->delete();

        $this->redirect('sfForumCategory/index');
    }

    protected function processForm(sfWebRequest $request, sfForm $form) {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid()) {
            $sf_guard_user = $form->save();
            $this->redirect('sfForumProfil/edit?id='.$sf_guard_user->getId());
        }
    }
}
