<?php

/**
 * faq actions.
 *
 * @package    levandos
 * @subpackage faq
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class faqActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
      
                        ////Устанавливаем заголовки
		    $this->getResponse()->addMeta('description',  __('FAQ'));
		    $this->getResponse()->addMeta('keywords', __('FAQ'));
		    $this->getResponse()->addMeta('title',  __('FAQ'));
	   ////
                    
         $q = Doctrine::getTable('Faq')
            ->createQuery('a')
            ->addOrderBy('a.id DESC')
            ->leftJoin('a.Translation t')
            ->where('a.pub=?',array(true));

      $this->pager = new sfDoctrinePager('Faq',4);
      $this->pager->setQuery($q);
      $this->pager->setPage($request->getParameter('page', 1));
      $this->pager->init();

    $this->form = new fFaqForm();

      if ($request->isMethod ( 'post' ))
		{
			$this->form->bind ( $request->getParameter ( 'faq' ));
			if ($this->form->isValid ()) {

                          $f = $this->form->save();
                          $this->getUser ()->setFlash ( 'message', __('Спасибо, данные сохранены.') );
                          $this->redirect ( 'faq/index' );

			}

		}



  }
}
