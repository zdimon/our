<?php

/**
 * chat actions.
 *
 * @package    levandos
 * @subpackage chat
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class BaseChatActions extends commonActions
{

    ////нет абонента
 public function executeNoabonent(sfWebRequest $request)
  {
     $this->setLayout(false);
  }

    ////Смайлы
 public function executeSendsmile(sfWebRequest $request)
  {
      $str = '<img src="/images/smile/s'.$request->getParameter('s').'.gif" />';
      $m = new Chat2Message();
      $m->setContent($str);
      $m->setRoomId($_SESSION['current_room_id']);
      $m->setUserId($this->getUser()->getGuardUser()->getId());
      $m->save();
      $this->m = $m;
      $this->setLayout(false);
  }

////Обновление пользователей в онлайне
 public function executeUpdate_online_user(sfWebRequest $request)
  {
              $q = Doctrine::getTable('Profile')
                      ->createQuery('p')
                      ->leftJoin('p.sfGuardUser s')
                      ->where('s.is_online=? and p.status_id=? and s.gender<>?',array(true,1,sfContext::getInstance()->getUser()->getGuardUser()->getGender()));

              if(isset($_SESSION['current_abonent_id']))
              {
                  //$q->addWhere('s.id<>?',array($_SESSION['current_abonent_id']));
              }

              $this->users = $q->execute();
              $this->arrc = sfCultureInfo::getInstance($this->getUser()->getCulture())->getCountries();
  }

////Вывод текущего абонента
 public function executeShow_active_user(sfWebRequest $request)
  {
     if(isset($_SESSION['current_abonent_id']))
     {
         $this->profile = ProfileTable::getProfileById($_SESSION['current_abonent_id']);
         $this->insertArrays();
     }
  }

////Вывод контактов
 public function executeShow_contact(sfWebRequest $request)
 {
   $this->setLayout(false);
   $this->contacts = Doctrine::getTable('Chat2Room')
         ->createQuery('a')
		 ->orderBy('a.time_start DESC')
         ->where('a.caller_id=? or a.answer_id=? and (a.status=? or a.status=?)',array($this->getUser()->getGuardUser()->getId(),$this->getUser()->getGuardUser()->getId(),'active','wait'))
         ->execute();

 }

 ////Вывод исходящей камеры девки мужику
 public function executeShow_woman_video_out(sfWebRequest $request)
 {
   $this->setLayout(false);
   if(isset($_SESSION['current_room_id']))
       $this->room = Doctrine::getTable ('Chat2Room')->find ($_SESSION['current_room_id']);
            if($this->room->getCallerId()==$this->getUser()->getGuardUser()->getId())
           {
               $this->user = $this->room->getAnswer();
           }
           else
           {
               $this->user = $this->room->getCaller();
           }
           $this->chanel = Chat2ChanelsTable::getChanelByUser($this->user);

 }

  ////Вывод исходящей камеры мужика девке
 public function executeShow_video_out(sfWebRequest $request)
 {
   $this->setLayout(false);
   
           
   if(isset($_SESSION['current_room_id']))
       $this->room = Doctrine::getTable ('Chat2Room')->find ($_SESSION['current_room_id']);
            if($this->room->getCallerId()==$this->getUser()->getGuardUser()->getId())
           {
               $this->user = $this->room->getAnswer();
           }
           else
           {
               $this->user = $this->room->getCaller();
           }
      $this->gender = $this->user->getGender();     
      if($this->gender=='w') $this->meth = 'getWithVideo';
      if($this->gender=='m') $this->meth = 'getWithManVideo';         

 }




  ///Включение/выключение канала мужика

 public function    executeTurn_video_in(sfWebRequest $request)
 {
   $this->setLayout(false);
   $user = $this->getUser()->getGuardUser();
   $pf = $user->getProfile();
   $room = Chat2RoomTable::getInstance()->find($_SESSION['current_room_id']);
   if($room)
   {
        if($request->getParameter('turn')=='on')
        {
           if($request->getParameter('gender')=='w')
           {
               $room->setWithVideo(true);
               
           }
           if($request->getParameter('gender')=='m')
           {
               $room->setWithManVideo(true);
           }
        }
        if($request->getParameter('turn')=='off')
        {
           if($request->getParameter('gender')=='w')
           {
               $room->setWithVideo(false);
           }
           if($request->getParameter('gender')=='m')
           {
               $room->setWithManVideo(false);
           }
        }        
        $room->save();
        $this->room = $room;
        $this->gender = $request->getParameter('gender');
            if($this->gender=='w') $this->meth = 'getWithVideo';
            if($this->gender=='m') $this->meth = 'getWithManVideo';        
   } 

   
 }


   ///Включение/выключение канала бабы

 public function executeWoman_video_in(sfWebRequest $request)
 {

   $user = $this->getUser()->getGuardUser();
   $pf = $user->getProfile();
   if($request->getParameter('turn')=='on')
   {
      // $room->setWithVideo(true);
       $chanel = $this->getActiveChanel($user);
       if($chanel)
       {
           $chanel->setUserId($user->getId());
           $chanel->save();
             Doctrine_Query::create()
            ->update('Chat2Room')
            ->set('with_video','true')
            ->where('caller_id=? or answer_id=?', array($user->getId(),$user->getId()))
            ->execute();

           $pf->setIsCamera(true);
           $pf->save();
       }
       else
       {
          $this->getUser ()->setFlash ( 'message', __('There are no free video chanels. Try later.') );
       }

   }
   if($request->getParameter('turn')=='off')
   {
       //$room->setWithVideo(false);
       $chanel = $this->getActiveChanel($user);
       if($chanel)
       {
           $chanel->setUserId(0);
           $chanel->save();
             Doctrine_Query::create()
            ->update('Chat2Room')
            ->set('with_video','false')
            ->where('caller_id=? or answer_id=?', array($user->getId(),$user->getId()))
            ->execute();
           $pf->setIsCamera(false);
           $pf->save();
       }

   }
   // $room->save();

   $this->redirect('http://'.$_SERVER['HTTP_HOST'].'/'.$this->getUser()->getCulture().'/chat/index');
 }




      ////Включение выключение камеры мужиком
 public function executeMancam(sfWebRequest $request)
 {
   $user_id = $request->getParameter('u');
   $room = Doctrine::getTable('Chat2Room')->find($request->getParameter('r'));
   if($request->getParameter('turn')=='on')
   {
       $room->setAcceptVideo(true);
   }
   if($request->getParameter('turn')=='off')
   {
       $room->setAcceptVideo(false);
   }
   $room->save();
   $this->redirect('http://'.$_SERVER['HTTP_HOST'].'/_index.php/'.$this->getUser()->getCulture().'/chat/index');
 }


  ////Проверка на существование комнаты
  protected  function isActiveRoom($user,$abonent)
  {
      $cnt = Doctrine::getTable('Chat2Room')
      ->createQuery('a')
      ->where('(a.caller_id=? and a.answer_id=?) or (a.caller_id=? and a.answer_id=?)',array($user->getId(),$abonent->getId(),$abonent->getId(),$user->getId()))
      ->count();
      if($cnt>0)
      {
          return true;
      }
      else
      {
          return false;
      }
  }

  ////Создание новой комнаты
  protected  function createRoom($caller_id, $answer_id)
  {
      if($caller_id!=$answer_id)
      {
          $room = new Chat2Room();
          $room->setTimeStart(time());
          $room->setDateStart(date('Y-m-d h:i:s'));
          $room->setCallerId($caller_id);
          $room->setAnswerId($answer_id);
          $room->save();
          return $room;
      }
      else
      {
          return false;
      }
  }

  ////Получение активной комнаты
  protected  function getActiveRoom($user,$abonent)
  {
      $room = Doctrine::getTable('Chat2Room')
      ->createQuery('a')
      ->where('(a.caller_id=? and a.answer_id=?) or (a.caller_id=? and a.answer_id=?)',array($user->getId(),$abonent->getId(),$abonent->getId(),$user->getId()))
      ->fetchOne();
      if($room)
      {
              return $room;
      }else {
              return false;
      }
  }

  ////Отказ в общении
  protected  function rejectRoom($room, $user_id)
  {
      $room->setStatus('rejected');
      $room->setRejectId($user_id);
      $room->save();
      //// Отправляем сообщение
      $m = new Chat2Message();
      $m->setRoomId($room->getId());
      $m->setUserId($user_id);
      $m->setTimer(time());
      $m->setContent(__('I refuse to chat.'));
      $m->save();
      return $room;
  }


  ////Согласие
  protected  function approveRoom($room, $user_id)
  {
      $room->setStatus('active');
      $room->save();
      //// Отправляем сообщение
      $m = new Chat2Message();
      $m->setRoomId($room->getId());
      $m->setUserId($user_id);
      $m->setTimer(time());
      $m->setContent(__('I accept chat.'));
      $m->save();

      return $room;
  }


////Закрытие чата
  public function executeClose (sfWebRequest $request)
  {

     $this->getUser ()->setFlash ( 'message', __('Вы вышли из чата.') );
     unset($_SESSION['current_abonent_id']);
     unset($_SESSION['current_room_id']);

    ///Закрываем комнаты
     $rooms = Doctrine::getTable('Chat2Room')
     ->createQuery('a')
     ->where('a.caller_id=? or a.answer_id=?',array($this->getUser()->getGuardUser()->getId(),$this->getUser()->getGuardUser()->getId()))
     ->execute();
     foreach ($rooms as $r)
     {
      $r->setStatus('closed');
      $r->setWithVideo(false);
      $r->setWithManVideo(false);
      $r->setAcceptVideo(false);
      $r->save();
          //// Отправляем сообщение
          $m = new Chat2Message();
          $m->setRoomId($r->getId());
          $m->setUserId($this->getUser()->getGuardUser()->getId());
          $m->setTimer(time());
          $m->setContent(__('User left the chat.'));
          $m->save();
     }
    /// Закрываем каналы
    Doctrine_Query::create()
    ->update('Chat2Chanels')
    ->set('user_id','0')
    ->where('user_id=?', array($this->getUser()->getGuardUser()->getId()))
    ->execute();

    /// Закрываем платежи
    Doctrine_Query::create()
    ->update('Payment')
    ->set('is_closed','true')
    ->where('user_id=?', array($this->getUser()->getGuardUser()->getId()))
    ->execute();

     $this->setLayout(false);
     //$this->redirect('@mainpage');

  }



  ///Получение сообщений из комнаты
  protected  function getRoomMessages($room)
  {
      $timer = time()-(60*60);
      if($room)
      {
         $m = Doctrine::getTable('Chat2Message')
              ->createQuery('a')
              ->where('a.room_id=? and a.timer>?',array($room->getId(),$timer))
              ->orderBy('a.id')
              ->execute();
          //// Отмечаем как прочитанные
            Doctrine_Query::create()
            ->update('Chat2Message')
            ->set('is_read','true')
            ->where('user_id<>? and room_id=?', array($this->getUser()->getGuardUser()->getId(),$room->getId()))
            ->execute();
         ////
      return $m;
      }


  }

  ///Получение новых сообщений из комнаты
  protected  function getNewMessages($room)
  {
      $user = $this->getUser()->getGuardUser();
      if($room)
      {
         $cnt = Doctrine::getTable('Chat2Message')
              ->createQuery('a')
              ->where('a.room_id=? and a.is_read=? and a.user_id<>?',array($room->getId(),false, $user->getId()))
              ->count();
        if($cnt>0)
        {
           
            return true;
        }
     
      }
       return false;


  }



   ///платеж
  protected  function makeChatPayment($user,$room)
  {
      if($user->getAccount()<=0 and $user->getGender()=='m')
              return false;
      if($user->getGender()=='m' and $user->getProfile()->getPacketId()<4)
      {
          ///Получаем или создаем платежи
          ////текстовый чат
         // $payment = $this->getPayment($room,$user,7);
          //// чат с видео девушки
        //  if($room->getWithVideo())
        //  {
            $payment = $this->getPayment($room,$user,8);
        //  }
          //// чат с видео мужчины
        //  if($room->getWithManVideo())
        //  {
        //    $payment = $this->getPayment($room,$user,12);
        //  }

      }
      return true;
  }
  
  
   ///платеж ghb переходе
  protected  function makeFirstPayment($user,$room)
  {
      if($user->getAccount()<=0 and $user->getGender()=='m')
              return false;
      if($user->getGender()=='m')
      {
         if($room->getCallerId()==$user->getId())
         {
             $abonent = $room->getAnswer();
         }
         else
         {
             $abonent = $room->getCaller();
         }
          ///Получаем или создаем платежи
          ////текстовый чат
		  if($abonent->getIsOnline())
		  {
			  $service = Doctrine::getTable('Service')->find(7);
			  $p = new Payment();
			  $p->setUserId($user->getId());
			  $p->setWomanId($abonent->getId());
			  $p->setPartnerId($abonent->getPartnerId());
			  $p->setRoomId($room->getId());
			  $p->setIsClosed(false);
			  $p->setServiceId($service->getId());
			  $p->save();
			  //// Отнимаем
			  $summa = $service->getCost();
			  $comission = $service->getComission();

			  $p->setSumma($p->getSumma()+$summa);
			  $p->setComission($p->getComission()+$comission);
			  $p->save();

			  $user->setAccount($user->getAccount()-$summa);
			  $user->save();
			  
			  //// чат с видео девушки
			  if($room->getWithVideo())
			  {
				  $service = Doctrine::getTable('Service')->find(8);
				  $p = new Payment();
				  $p->setUserId($user->getId());
				  $p->setWomanId($abonent->getId());
				  $p->setPartnerId($abonent->getPartnerId());
				  $p->setRoomId($room->getId());
				  $p->setIsClosed(false);
				  $p->setServiceId($service->getId());
				  $p->save();
			   //// Отнимаем
			  $summa = $service->getCost();
			  $comission = $service->getComission();

			  $p->setSumma($p->getSumma()+$summa);
			  $p->setComission($p->getComission()+$comission);
			  $p->save();

			  $user->setAccount($user->getAccount()-$summa);
			  $user->save();
			  }
			  //// чат с видео мужчины
			  if($room->getWithManVideo())
			  {
				  $service = Doctrine::getTable('Service')->find(12);
				  $p = new Payment();
				  $p->setUserId($user->getId());
				  $p->setWomanId($abonent->getId());
				  $p->setPartnerId($abonent->getPartnerId());
				  $p->setRoomId($room->getId());
				  $p->setIsClosed(false);
				  $p->setServiceId($service->getId());
				  $p->save();
			  //// Отнимаем
			  $summa = $service->getCost();
			  $comission = $service->getComission();

			  $p->setSumma($p->getSumma()+$summa);
			  $p->setComission($p->getComission()+$comission);
			  $p->save();

              $user->setAccount($user->getAccount()-$summa);
              $user->save();   
            }			  
        }

      }
      return true;
  }
  

  

   protected  function getPayment($room,$user,$s_type)
  {


     ///Получаем вид услуги (чата)
     
     $p = Doctrine::getTable('Payment')
       ->createQuery('a')
       ->where('a.room_id=? and a.service_id=? and a.is_closed=?',array($room->getId(),$s_type,false))
       ->orderBy('id DESC')
       ->fetchOne();
     $service = Doctrine::getTable('Service')->find($s_type);
      $summa = $service->getCost();
     if(!$p)
     {

         if($room->getCallerId()==$user->getId())
         {
             $abonent = $room->getAnswer();
         }
         else
         {
             $abonent = $room->getCaller();
         }
        if($abonent->getIsOnline())
		  {

				 $p = new Payment();
				 $p->setUserId($user->getId());
				 $p->setWomanId($abonent->getId());
				 $p->setPartnerId($abonent->getPartnerId());
				 $p->setRoomId($room->getId());
				 $p->setIsClosed(false);
                 $p->setDescription(__('Payment for video chat'));
				 $p->setServiceId($service->getId());
				 $p->save();
			 
			 //// Отнимаем

				  $comission = $service->getComission();

				  $p->setSumma($p->getSumma()+$summa);
				  $p->setComission($p->getComission()+$comission);
				  $p->save();

				  $user->setAccount($user->getAccount()-$summa);
				  $user->save();
			}	  
		 }
      else{
          $p->setSumma($p->getSumma()+$summa);
          $p->save();
          $user->setAccount($user->getAccount()-$summa);
          $user->save();
      }
     return $p;
     }

   /// Получаем свободный канал
   protected  function getActiveChanel($user)
  {
      $this->clearOfflineChanel();
      $c = Doctrine::getTable('Chat2Chanels')
       ->createQuery('a')
       ->where('a.user_id=?',array($user->getId()))
       ->fetchOne();
      if($c)
      {
          $c->setLastActive(time());
          $c->save();
          return $c;
      }
      else
      {
          $c = Doctrine::getTable('Chat2Chanels')
           ->createQuery('a')
           ->where('a.user_id=0')
           ->fetchOne();
          if($c)
          {
              $c->setLastActive(time());
              $c->save();
              return $c;
          }
          else
          {
              return false;
          }
      }
   }

    /// Получаем свободный канал
   protected  function clearOfflineChanel()
  {
      $ch = Doctrine::getTable('Chat2Chanels')
       ->createQuery('a')
              ->where('a.user_id>0')
              ->execute();
      foreach($ch as $c)
      {
          $user = Doctrine::getTable('sfGuardUser')->find($c->getUserId());
          if($user)
          {
              if(!$user->getIsOnline())
              {
                  $c->setUserId(0);
                  $c->save();
              }
          }
      }
  }

}
