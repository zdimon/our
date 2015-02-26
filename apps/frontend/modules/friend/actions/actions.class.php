<?php

/**
 * friend actions.
 *
 * @package    piramida
 * @subpackage friend
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class friendActions extends commonActions
{



     public function executeAccept_video(sfWebRequest $request)
  {
         $f = Doctrine::getTable('Friend')->find($request->getParameter('id'));
         if($f->getUserId()==$this->getUser()->getGuardUser()->getId())
         {
          
             if($this->getUser()->getGuardUser()->getProfile()->getWithVideo()==0)
             {
                 $this->getUser ()->setFlash ( 'message', __('У вас нет загруженного видео') );
                 $this->redirect ('myvideo/index');
             }
             if(!$this->checkAccount($this->getUser()->getGuardUser(), 11)) $this->redirect ($this->getRef ());
              $p = $this->makePayment($this->getUser()->getGuardUser(), 11, $f->getFriend(), false);
             $f->setAcceptVideo(true);
             $f->setRequestVideo(true);
             $f->save();
             $this->sendNotifyAccept($f->getFriend());
             $this->getUser ()->setFlash ( 'message', __('Разрешение сохранено, с вашего счета снято %1% кредита',array('%1%'=>$p->getSumma())) );
         }
         
         $this->redirect($this->getRef());
  }


     public function executeRequest_video(sfWebRequest $request)
  {
         $f = Doctrine::getTable('Friend')->find($request->getParameter('id'));
         if($f->getFriendId()==$this->getUser()->getGuardUser()->getId())
         {
             $f->setRequestVideo(true);
             $f->save();
             $this->sendNotifyRequest($f->getUser());
         }
         $this->getUser ()->setFlash ( 'message', __('Запрос сохранен') );
         $this->redirect($this->getRef());
  }

    public function executeReject(sfWebRequest $request)
  {
        $f = Doctrine::getTable('Friend')->find($request->getParameter('id'));
        $this->forward404Unless($f);
        $f->setStatusId(5);
        $f->save();
        $user = $f->getUser();
        $user->setIsNewFriend(true);
        $user->save();
        $this->getUser ()->setFlash ( 'message', __('Отказ сохранен') );
        $this->redirect('friend/index');
  }


    public function executeSend(sfWebRequest $request)
  {

     if ($request->isMethod ( 'post' ))
		{
                   $f = Doctrine::getTable('Friend')->find($request->getParameter('id'));
                   $this->forward404Unless($f);
                   $fr = $f->getFriend();

                   $ar = array();
                   $ar['email'] = $request->getParameter('email');
                   $ar['phone'] = $request->getParameter('phone');
                   $ar['adres'] = $request->getParameter('adres');
                   $ar['skype'] = $request->getParameter('skype');

                   if(strlen($fr->getPhone())==0){$fr->setPhone($request->getParameter('phone')) ;}
                   if(strlen($fr->getAdres())==0){$fr->setAdres($request->getParameter('adres')) ;}
                   if(strlen($fr->getSkype())==0){$fr->setSkype($request->getParameter('skype')) ;}

                   $fr->save();


                   $f2 = Doctrine::getTable('Friend')
                           ->createQuery('a')
                           ->where('a.user_id=? and a.friend_id=?',array($f->getFriendId(),$f->getUserId()))
                           ->fetchOne();
                   if(!$f2)
                   {
                     $f2 = new Friend();
                     $f2->setUserId($f->getFriendId());
                     $f2->setFriendId($f->getUserId());
                     $f2->setStatusId(2);
                     $f2->save();
                     $this->sendask($f2);
                   }

                    $f->setContact(serialize($ar));
                    $f->setStatusId(4);
                    
                    $f->save();

                    ///Ставим новые контакты
                    $tu = $f->getUser();
                    $tu->setIsNewFriend(true);
                    $tu->save();

                   $this->getUser ()->setFlash ( 'message', __('Контактные данные отправлены пользователю %1%.',array('%1%'=>$tu)) );
                }
              
     $this->redirect('friend/index');
  }

    public function executeAsk(sfWebRequest $request)
  {
      $this->checkAuthorization();
        $f = Doctrine::getTable('Friend')->find($request->getParameter('id'));
        $this->forward404Unless($f);
        $fr = $f->getFriend();
        //$this->sendask($f);


        // $fr->setIsNewFriend(true);
        // $fr->save();
      $user_from = $this->getUser()->getGuardUser();

      /// Проверка на черный список
      if(!$this->checkBlacklist($fr)) $this->redirect ($this->getRef ());

      ///Проверка на деньги мужиков
      if($this->getUser()->getGuardUser()->getGender()=='m')
      {
        if(!$this->checkAccount($user_from, 1)) $this->redirect ($this->getRef ());
      }
      ///делаем платеж
      if($this->getUser()->getGuardUser()->getGender()=='m')
        {
          $p = $this->makePayment($this->getUser()->getGuardUser(), 5, $fr);
          
        }

         $f->setStatusId(2);
         $f->save();

        $this->getUser ()->setFlash ( 'message', __('Запрос на получение контактной информации отправлен пользователю %1%. C вашего счета снято %2%.',array('%1%'=>$fr, '%2%'=>$p->getSumma().' '.myUser::getAccountStr($p->getSumma()))) );
        $this->redirect('friend/index');
  }

    public function executeAdd(sfWebRequest $request)
  {
      $this->checkAuthorization();
     /////Проверяем статус
       if(!$this->checkStatus()) $this->redirect ($this->getRef ());
     /////
     $i = Doctrine::getTable('sfGuardUser')
     ->createQuery('a')
     ->where('a.username=?',array($request->getParameter('username')))
     ->fetchOne();
     $this->forward404Unless($i);
     /// Проверка на черный список
     if(!$this->checkBlacklist($i)) $this->redirect ($this->getRef ());

     if($i->getId()==$this->getUser()->getGuardUser()->getId())
     {
        $this->getUser ()->setFlash ( 'error', __('Вы не можете добавлять самого себя!',array('%1%'=>$request->getParameter('username'))) );
        $this->redirect($this->getRef());
     }
    $this->forward404Unless($i);
    $f = Doctrine::getTable('Friend')
     ->createQuery('a')
            ->where('a.user_id=? and a.friend_id=?',array($this->getUser()->getGuardUser()->getId(),$i->getId()))
            ->fetchOne();
     if($f)
     {
         $this->getUser ()->setFlash ( 'error', __('Пользователь "%1%" уже есть в списках ваших друзей!',array('%1%'=>$request->getParameter('username'))) );
        
         $this->redirect($this->getRef());
     }
     else
     {
         $status = 1;
         $f = Doctrine::getTable('Friend')
             ->createQuery('a')
             ->where('a.friend_id=? and a.user_id=?',array($this->getUser()->getGuardUser()->getId(),$i->getId()))
             ->fetchOne();
         if($f)
         {
             $f->setStatusId(6);
             $f->setPopupMatch(false);
             $f->save();
             $status = 6;
         }
         $ff = new Friend();
         $ff->setUserId($this->getUser()->getGuardUser()->getId());
         $ff->setFriendId($i->getId());
         $ff->setToPartnerId($i->getPartnerId());
  
         $ff->setStatusId($status);
         if($status==6) $f->setPopupMatch(false);
         $ff->save();
         //$this->sendMail($i, $this->getUser()->getGuardUser());
         NotifyTable::sendTemplate($i,$this->getUser()->getGuardUser(),4);

         $this->getUser ()->setFlash ( 'message', __('Пользователь "%1%" добавлен к вам в контакты.',array('%1%'=>$request->getParameter('username'))) );
     }

      $this->redirect($this->getRef());
    
   // $this->redirect('friend/index');

  }

  public function executeIndex(sfWebRequest $request)
  {
    $this->autoenter();
    $this->checkAuthorization();
    if(!$this->getUser()->getGuardUser()->getIsSuperAdmin())
    $rez = $this->checkMember('favorite');
    $this->autoLogin($request);

    $user = ProfileTable::getProfileById($this->getUser()->getGuardUser()->getId());
    $user->setIsNewFriend(false);
    $user->save();

    $q = Doctrine::getTable('Friend')
      ->createQuery('a')
      ->where('a.user_id=?',array($this->getUser()->getGuardUser()->getId()));

      $this->pager = new sfDoctrinePager('Friend',20);
      $this->pager->setQuery($q);
      $this->pager->setPage($request->getParameter('page', 1));
      $this->pager->init();

     $this->insertArrays();

  }

 
  public function executeMy(sfWebRequest $request)
  {
      $this->checkAuthorization();
      $this->insertArrays();
      $q = Doctrine::getTable('Friend')
      ->createQuery('a')
      ->where('a.friend_id=?',array($this->getUser()->getGuardUser()->getId()));

      $this->pager = new sfDoctrinePager('Friend',20);
      $this->pager->setQuery($q);
      $this->pager->setPage($request->getParameter('page', 1));
      $this->pager->init();
    

  }
  

  public function executeDel(sfWebRequest $request)
  {
    $this->checkAuthorization();
    $r = Doctrine::getTable('Friend')->find($request->getParameter('id'));
    $this->forward404Unless($r);

      $f = Doctrine::getTable('Friend')
          ->createQuery('a')
          ->where('a.friend_id=? and a.user_id=?',array($this->getUser()->getGuardUser()->getId(),$r->getFriendId()))
          ->fetchOne();
      if($f)
      {
          $f->setStatusId(1);
          $f->save();
      }

    if($r->getUserId()==$this->getUser()->getGuardUser()->getId())
    {
        $r->delete();
        $this->getUser ()->setFlash ( 'message', __('Пользователь удален из списка друзей.') );
    }

    $this->redirect('friend/index');
  }


  public function sendask($f)
  {
                   $m =  Doctrine::getTable('Notify')->find(11);
                   if($m)
                   {
                   $user = $f->getUser();
                   $friend = $f->getFriend();


                   $arr = array(
                        '%user%' => $user,
                        '%link%' => link_to(__('cсылка на раздел контактов'),'http://'.$_SERVER['HTTP_HOST'].'/friend/index?code='.$friend->getSalt())
                    );

                    $content =$m->parse($arr);

                    mailTools::send($friend->getEmail(), $m->getSubject(), $content);
                   }

  }





  /////Уведомление мужчине о запросе просмотра его видео
    protected function sendNotifyRequest($to_user)
  {
         $user_from = $this->getUser()->getGuardUser();

         $par = array(
              '%user%' => $user_from->getProfile()->getRealName().' ['.$user_from->getId().']',
              '%link%' => link_to(__('link'),'friend/index',array('absolute' => true)),
              '%link_char%' => url_for('friend/index',array('absolute' => true))
          );
   

          NotifyTable::sendNotify($to_user, 13, $par);
  }

  /// Уведомление женщине о согласии о просмотре видео мужчины
      protected function sendNotifyAccept($to_user)
  {
         $user_from = $this->getUser()->getGuardUser();

         $par = array(
              '%user%' => $user_from->getProfile()->getRealName().' ['.$user_from->getId().']',
              '%link%' => link_to(__('link'),'profile/show?username='.$user_from->getUsername(),array('absolute' => true)),
              '%link_char%' => url_for('profile/show?username='.$user_from->getUsername(),array('absolute' => true))
          );  

          NotifyTable::sendNotify($to_user, 14, $par);
  }


    protected function checkPacket()
    {
        $p = $this->getUser()->getGuardUser()->getProfile();
        if($p->getPacketId()==1 and $p->getGender()=='m')
        {
            $this->getUser ()->setFlash ( 'error', __('Your membership doesn`t allow this action!') );
            $this->redirect ($this->getRef ());
        }
    }


    protected function sendMail($guard_user_to, $guard_user_from)
    {



            $par = array(
                '%name%' => $guard_user_to->getProfile()->getFullName(),
                '%user%' =>  $guard_user_from->getProfile()->getFullName(),
                '%link_friend%' => link_to(__('link'),'friend/index?code='.$guard_user_to->getSalt(),array('absolute' => true)),
                '%link_friend_char%' => url_for('friend/index?code='.$guard_user_to->getSalt(),array('absolute' => true)),
                '%link_char%' => url_for('profile/show?username='.$guard_user_from->getUsername(),array('absolute' => true)),
                '%link%' => link_to(__('link'),'profile/show?username='.$guard_user_from->getUsername(),array('absolute' => true))
            );

        NotifyTable::sendNotify($guard_user_to, 4, $par);

    }

  
}
