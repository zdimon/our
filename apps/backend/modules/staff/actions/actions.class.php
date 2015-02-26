<?php

/**
 * access actions.
 *
 * @package    xy
 * @subpackage access
 * @author     wezom.com.ua
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class staffActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
      $this->staff = sfGuardUserTable::getInstance()->createQuery('a')->where('a.is_staff=?',array(true))->execute();
  }

   public function executeNew(sfWebRequest $request)
  {
      $this->form = new staffForm();
      $this->processForm($request);
  }


     public function executeEdit(sfWebRequest $request)
  {
      $r = sfGuardUserTable::getInstance()->find($request->getParameter('id'));
      $this->form = new staffForm($r);
      $this->processForm($request);
  }
  
  
       public function executeDelete(sfWebRequest $request)
  {
      $r = sfGuardUserTable::getInstance()->find($request->getParameter('id'));
      $r->delete();
      $this->redirect ( 'staff/index' );
  }
  
  
     public function processForm(sfWebRequest $request)
  {
     
            if ($request->isMethod ( 'post' ))
		{
			$this->form->bind ( $request->getParameter ( 'sf_guard_user' ), $request->getFiles('sf_guard_user') );
			if ($this->form->isValid ()) {

                          $f = $this->form->save();
                          $f->setIsStaff(true);
                          $f->setIsActive(true);
                          $f->setCulture('en');
                          $f->save();
                          
                          $p = ProfileTable::getProfileById($f->getId());
                          if(!$p)
                          {                      
                            $p = new Profile();
                            $p->setIsStaff(true);
                            $p->setUserId($f->getId());
                            
                          }
                          $p->setStatusId(1);
                          $p->setIsActive(true);
                          $p->save();
                          
                          $this->getUser ()->setFlash ( 'notice', __('Thank you your date was saved.') );
                          $this->redirect ( 'staff/index' );

			}

		}   
         
  }
  
  
}
