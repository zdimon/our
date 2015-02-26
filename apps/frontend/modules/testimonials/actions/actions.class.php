<?php

/**
 * faq actions.
 *
 * @package    levandos
 * @subpackage faq
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class testimonialsActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
       $this->page = Doctrine::getTable('Page')
      ->createQuery('a')
      ->leftJoin('a.Translation t')
      ->where('a.alias=?',array('testimonials'))
      ->fetchOne();
      
      $q = Doctrine::getTable('Testimonials')
          ->createQuery('a')
          ->where('a.pub=?',array(true));

      if($this->page)
      {
       ////Устанавливаем заголовки
		    $this->getResponse()->addMeta('description',  $this->page->getItitle());
		    $this->getResponse()->addMeta('keywords', $this->page->getItitle());
		    $this->getResponse()->addMeta('title',  $this->page->getItitle());
	   ////
      }
      
      $this->pager = new sfDoctrinePager('Testimonials',4);
      $this->pager->setQuery($q);
      $this->pager->setPage($request->getParameter('page', 1));
      $this->pager->init();

    $this->form = new ftestimonialsForm();

      if ($request->isMethod ( 'post' ))
		{
			$this->form->bind ( $request->getParameter ( 'testimonials' ), $request->getFiles('testimonials') );
			if ($this->form->isValid ()) {

                          $f = $this->form->save();
                          $this->getUser ()->setFlash ( 'message', __('Спасибо, данные сохранены.') );
                          $this->redirect ( 'testimonials/index' );

			}

		}



  }
}
