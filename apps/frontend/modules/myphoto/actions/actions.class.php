<?php

/**
 * myphoto actions.
 *
 * @package    levandos
 * @subpackage myphoto
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class myphotoActions extends commonActions
{


    public function executeReplace(sfWebRequest $request)
    {
       $this->ph =  Doctrine::getTable('Photo')->find($request->getParameter('id'));
    }


  public function executeCreate(sfWebRequest $request)
  {

    $this->forward404Unless($request->isMethod(sfRequest::POST));


      $this->photos = Doctrine_Core::getTable('Photo')
          ->createQuery('a')
          ->where('a.user_id=?',array($this->getUser()->getGuardUser()->getId()))
          ->orderBy('a.is_main DESC')
          ->execute();
      if($request->getParameter('step2'))
      {
          $this->step2 = true;
      }
      else
      {
          $this->step2 = false;
      }

    $this->form = new myPhotoForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('index');
  }

   ///просмотр приватного фото
 public function executeShow(sfWebRequest $request)
  {
     $this->setLayout(false);
     $this->p = Doctrine::getTable('Photo')->find($request->getParameter('id'));
     $this->forward404Unless($this->p);
     $user_to = $this->p->getUser();
     $user_from = $this->getUser()->getGuardUser();

     if(!$this->checkSameGender($user_from, $user_to))  
     {
             $this->message_error = __('Вы не можете совершать эту операцию!');
     }
     if(!$this->checkAccount($user_from, 3))
     {
             $this->message_error = __('Недостаточно средств на счете!');
     }
     if(!isset($this->message_error))
     {
         if($user_from->getGender()=='m' and $this->checkDouble($request->getParameter('id')))
         {
             $this->makePayment($user_from, 3, $user_to, false);
             $s = Doctrine::getTable('Service')->find(3);
             $this->message = __('Платеж на сумму %1% совершен.',array('%1%'=>$s->getCost().' '.myUser::getAccountStr($s->getCost())));
         }
     }

  }

  public function executeIndex(sfWebRequest $request)
  {
    $this->photos = Doctrine_Core::getTable('Photo')
      ->createQuery('a')
      ->where('a.user_id=?',array($this->getUser()->getGuardUser()->getId()))
      ->orderBy('a.is_main DESC')
      ->execute();

    $p = new Photo();
    $p->setUserId($this->getUser()->getGuardUser()->getId());
    $this->form = new myPhotoForm($p);

      if($request->getParameter('step2'))
      {
          $this->step2 = true;
      }
      else
      {
          $this->step2 = false;
      }

  }

 


  public function executeDel(sfWebRequest $request)
  {
   if(!$this->getUser()->isAuthenticated()) $this->redirect('access/onlyregister');
   $p = Doctrine::getTable('Photo')->find($request->getParameter('id'));
   $this->forward404Unless($p);
   if($p->getUserId()==$this->getUser()->getGuardUser()->getId())
   {
       
      // if($p->getIsMain())
      // {
      //    $pr = $p->getUser()->getProfile();
      //    $pr->setPhoto('');
      //    $pr->save();
      // }
       $p->delete();
           $this->getUser ()->setFlash ( 'message', __('Ваше фото удалено.') );
    
       
   }
   else
   {
       $this->getUser ()->setFlash ( 'error', __('Ошибка') );
   }

    $this->redirect('myphoto/index');
  }


   public function executeSetmain(sfWebRequest $request)
  {
   if(!$this->getUser()->isAuthenticated()) $this->redirect('access/onlyregister');
   $p = Doctrine::getTable('Photo')->find($request->getParameter('id'));
   $this->forward404Unless($p);
   $pr = ProfileTable::getProfileById($this->getUser()->getGuardUser()->getId());


   if(!$p->getPub())
   {
       $this->getUser ()->setFlash ( 'error', __('Вы не можете делать главным неутвержденное фото!') );
       $this->redirect('myphoto/index');
   }


    if($p->getUserId()==$this->getUser()->getGuardUser()->getId())
   {
        Doctrine_Query::create()
        ->update('Photo p')
        ->set('is_main','false')
        ->where('p.user_id=?', array($this->getUser()->getGuardUser()->getId()))
        ->execute();
        $p->setIsMain(true);
        $p->save();
        //$pr->setPhoto($p->getImage());
        $pr->save();

        $user = $pr->getsfGuardUser();
        $user->setImage($p->getImage());
        $user->save();

        $this->getUser ()->setFlash ( 'message', __('Указанное фото установлено в качестве главного.') );
   }

    $this->redirect('myphoto/index');
  }


  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      /// проверка на максимум
      if(!$this->checkMax())
      {
        $this->getUser ()->setFlash ( 'error', __('Вы не можете добавлять более %1% фото на сайте.',array('%1%'=>sfConfig::get('app_max_photo'))) );
        $this->redirect('myphoto/index');
       }
      $photo = $form->save();
      $this->getUser ()->setFlash ( 'message', __('Спасибо, Ваше фото сохранено.') );
       
      $user = sfGuardUserTable::getInstance()->find($photo->getUserId());
     
      mailTools::send(sfConfig::get('app_email_admin'), 'User '.$user->getUsername().' add new photo', 'Please check the photo.');
     
      $this->redirect('myphoto/index');
    }
  }

  protected function checkMax()
  {
      $cnt = Doctrine::getTable('Photo')
      ->createQuery('a')
      ->where('a.user_id=?',array($this->getUser()->getGuardUser()->getId()))
      ->count();
      //echo $cnt.'-'.sfConfig::get('app_max_photo');
      //die;
      if($cnt>sfConfig::get('app_max_photo'))
      {
         return false;
      }
      else
      {
        return true;
      }
  }


  protected function checkDouble($photo_id)
  {
      $cnt = Doctrine::getTable('PrivatePhoto')
      ->createQuery('a')
      ->where('a.user_id=? and a.photo_id=?',array($this->getUser()->getGuardUser()->getId(),$photo_id))
      ->count();
      if($cnt==0)
      {
          $p = new PrivatePhoto();
          $p->setUserId($this->getUser()->getGuardUser()->getId());
          $p->setPhotoId($photo_id);
          $p->save();
          return true;
      }
      else
      {
          return false;
      }
  }

}
