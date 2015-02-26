<?php

/**
 * mainpage actions.
 *
 * @package    levandos
 * @subpackage mainpage
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class mainpageActions extends commonActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
    
    public function executeMap(sfWebRequest $request)
  {
      $this->setLayout(false);
      $response = $this->getResponse ();
      $response->setContentType ( 'text/xml' );  
      $this->users = ProfileTable::getInstance()->createQuery('a')->where('a.is_active=? and a.status_id=? and a.is_staff=?',array(true,1,false))->leftJoin('a.sfGuardUser s')->execute();
      $this->pages = PageTable::getInstance()->findAll();
  }
  
  
  public function executeIndex(sfWebRequest $request)
  {
     if($request->getParameter('hf'))
     {
         $this->hf = true;
     }
      
    /// херня
    /*$dom = $_SERVER['HTTP_HOST'];
      //echo $dom;
    // if($dom == 'www.our-feeling.fr' or $dom == 'our-feeling.fr') $this->redirect('http://www.our-feeling.com/fr/mainpage.html');
   //  if($dom == 'www.our-feeling.de' or $dom == 'our-feeling.de') $this->redirect('http://www.our-feeling.com/de/mainpage.html');
   //  if($dom == 'www.our-feeling.us' or $dom == 'our-feeling.us') $this->redirect('http://www.our-feeling.com/en/mainpage.html');
   //  if($dom == 'www.our-feeling.es' or $dom == 'our-feeling.es') $this->redirect('http://www.our-feeling.com/is/mainpage.html');
   //  if($dom == 'www.our-feeling.ru' or $dom == 'our-feeling.ru') $this->redirect('http://www.our-feeling.com/ru/mainpage.html');
      $arrd = explode('.', $dom);
      $ext = substr($arrd[count($arrd)-1], 0, 2);
     // echo $ext;
     // die;
      if($ext=='ru') $this->getUser()->setCulture ('ru');
      if($ext=='fr') $this->getUser()->setCulture ('fr');
      if($ext=='com') $this->getUser()->setCulture ('en');
      if($ext=='de') $this->getUser()->setCulture ('de');*/
  

    
    if($this->getUser()->isAuthenticated())
    {
        if($this->getUser()->getGuardUser()->getGender()=='w')
        {
                 $this->page = Doctrine::getTable('Page')
                ->createQuery('a')
                ->leftJoin('a.Translation t')
                ->where('a.alias=?',array('mainpage-for-woman'))
                ->fetchOne();
        }
        else {
                 $this->page = Doctrine::getTable('Page')
                ->createQuery('a')
                ->leftJoin('a.Translation t')
                ->where('a.alias=?',array('mainpage-for-man'))
                ->fetchOne();
        }
    }
    else
    {
                   $this->page = Doctrine::getTable('Page')
            ->createQuery('a')
            ->leftJoin('a.Translation t')
            ->where('a.alias=?',array('mainpage'))
            ->fetchOne();
                   
    }
    
          
                    
    
    $this->insertArrays();
      $this->form = new qregForm();
      //$this->lform = new sfGuardFormSignin();




      if ($request->isMethod('post'))
      {

          $this->form->bind($request->getParameter('signin'));
          if ($this->form->isValid())
          {

              //// Выбрасываем из онлайнеа
              $t = time() - 3600;
              Doctrine_Query::create()
                  ->update('sfGuardUser')
                  ->set('is_online','false')
                  ->where('timer<?', array($t))
                  ->execute();



              $values = $this->form->getValues();
              $this->getUser()->signin($values['user'], array_key_exists('remember', $values) ? $values['remember'] : false);



              //// Check membership
              //echo strtotime($user->getDateExpire()).'-'.strtotime(date('Y-m-d'));
              $user = $this->getUser()->getGuardUser();
              if(strtotime($user->getDateExpire())<strtotime(date('Y-m-d')) and $user->getGender()=='m')
              {

                  $pf = $user->getProfile();
                  $pf->setPacketId(1);
                  $pf->save();

              }

              /////


              // always redirect to a URL set in app.yml
              // or to the referer
              // or to the homepage

              $signinUrl = sfConfig::get('app_sf_guard_plugin_success_signin_url', $request->getReferer());
              //echo '$signinUrl-'.$signinUrl;
              //die;
              return $this->redirect('profile/member');

              return $this->redirect('' != $signinUrl ? $signinUrl : '@mainpage');
          }
      }

      

  }

    public function executeTrans(sfWebRequest $request)
    {

    }




    public function executeSplash(sfWebRequest $request)
    {

    }

}
