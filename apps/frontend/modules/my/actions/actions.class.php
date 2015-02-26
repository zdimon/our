<?php

/**
 * access actions.
 *
 * @package    xy
 * @subpackage access
 * @author     wezom.com.ua
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class myActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executePlace(sfWebRequest $request)
  {
      
      
       $q = Doctrine::getTable('MyCity')
            ->createQuery('a')
            ->where('a.pub=?',true)
            ->orderBy('a.id DESC');

        $this->pager = new sfDoctrinePager('MyCity',20);
        $this->pager->setQuery($q);
        $this->pager->setPage($request->getParameter('page', 1));
        $this->pager->init();
        
           $this->page = Doctrine::getTable('Page')
      ->createQuery('a')
      ->leftJoin('a.Translation t')
      ->where('a.alias=?',array('my_place'))
      ->fetchOne();
           
                      ////Устанавливаем заголовки
		    $this->getResponse()->addMeta('description',  $this->page->getItitle());
		    $this->getResponse()->addMeta('keywords', $this->page->getItitle());
		    $this->getResponse()->addMeta('title',  $this->page->getItitle());
	   ////
         
      $this->form = new MyCityForm();     
      
              if ($request->isMethod ( 'post' ))
        {

            $this->form->bind ( $request->getParameter ( 'my_city' ), $request->getFiles ( 'my_city' ));
            if ($this->form->isValid ()) {

                $pf = $this->form->save();
                $this->getUser ()->setFlash ( 'message', __('Thank you. Your message has been saved. After moderation it will be showed on the site.') );
                $this->redirect ( 'my/place' );

            }

         }
           
  }

   public function executeCountry(sfWebRequest $request)
  {
       
       
              $q = Doctrine::getTable('MyCountry')
            ->createQuery('a')
            ->where('a.pub=?',true)
            ->orderBy('a.id DESC');

        $this->pager = new sfDoctrinePager('MyCountry',20);
        $this->pager->setQuery($q);
        $this->pager->setPage($request->getParameter('page', 1));
        $this->pager->init();
        
       $this->page = Doctrine::getTable('Page')
      ->createQuery('a')
      ->leftJoin('a.Translation t')
      ->where('a.alias=?',array('my_country'))
      ->fetchOne();
       
                  ////Устанавливаем заголовки
		    $this->getResponse()->addMeta('description',  $this->page->getItitle());
		    $this->getResponse()->addMeta('keywords', $this->page->getItitle());
		    $this->getResponse()->addMeta('title',  $this->page->getItitle());
	   ////
       
     $this->form = new MyCountryForm();       
     
              if ($request->isMethod ( 'post' ))
        {

            $this->form->bind ( $request->getParameter ( 'my_country' ), $request->getFiles ( 'my_country' ));
            if ($this->form->isValid ()) {

                $pf = $this->form->save();
                $this->getUser ()->setFlash ( 'message', __('Thank you. Your message has been saved. After moderation it will be showed on the site.') );
                $this->redirect ( 'my/country' );

            }

         }     
       
  }

  

}
