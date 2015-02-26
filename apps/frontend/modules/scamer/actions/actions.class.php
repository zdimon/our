<?php

/**
 * scamer actions.
 *
 * @package    levandos
 * @subpackage scamer
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class scamerActions extends commonActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
    
        public function executeDone($request) {
            
        }
    public function executeIndex($request) {


        
            $i = Doctrine::getTable('sfGuardUser')
            ->createQuery('a')
            ->where('a.id=?',array($request->getParameter('id')))
            ->fetchOne();
            $this->forward404Unless($i);
            $this->i = $i;
        $this->checkAuthorization();

        $s = new ScamerReport();
        $s->setScamer($i);
        $s->setUser($this->getUser()->getGuardUser());
        $this->form = new frontendScamerForm($s);

        if ($request->isMethod ( 'post' ))
        {
            $this->form->bind ( $request->getParameter ( 'contact' ) );
            if ($this->form->isValid ()) {
                $this->form->save();
                $data = $request->getParameter ( 'contact' );
                mailTools::send ( sfConfig::get('app_email_admin'),'complaine about scamer', 'From '.$this->getUser()->getGuardUser()->getId().'<br />To '.$data['id'].'<br />'.nl2br ( $data['content'] ));
                //$this->getUser ()->setFlash ( 'message', __('You complaine has been saved!') );
                $this->redirect ( 'scamer/done' );

            }

        }

        $this->insertArrays();
    }
    
      public function executeList($request) {
                  $q = Doctrine::getTable('Profile')
            ->createQuery('a')
            ->where('a.scamer=? ',array(true));
        $this->pager = new sfDoctrinePager('Profile',20);
        $this->pager->setQuery($q);
        $this->pager->setPage($request->getParameter('page', 1));
        $this->pager->init();
             
        $this->insertArrays();
        
        
                           ////Устанавливаем заголовки
		    $this->getResponse()->addMeta('description',  __('Scamer list'));
		    $this->getResponse()->addMeta('keywords', __('Scamer list'));
		    $this->getResponse()->addMeta('title',  __('Scamer list'));
	   ////
                    
      }


}
