<?php

/**
 * chat actions.
 *
 * @package    levandos
 * @subpackage chat
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
require_once dirname(__FILE__).'/../lib/BaseChatActions.class.php';
class chatActions extends BaseChatActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
      public function executeForbide(sfWebRequest $request)
    {
        $this->setLayout(false);
    }
    

    public function executeNocredit(sfWebRequest $request)
    {
        $this->setLayout(false);
    }

    public function executePay(sfWebRequest $request)
     {
        $this->setLayout(false);
        $user = $this->getUser()->getGuardUser();
        $room = Doctrine::getTable('Chat2Room')->find($_SESSION['current_room_id']);
         /// Делаем платеж
        if($room)
        $this->makeChatPayment($this->getUser()->getGuardUser(),$room);
        echo $user->getAccount();
        die;
     }

    ////Диспечер
 public function executeDispatcher(sfWebRequest $request)
 {


    

     $caller = $this->getUser()->getGuardUser();
     if($request->getParameter('user_id')>0)
     {
         $user_id = $request->getParameter('user_id');
         $answer = Doctrine::getTable('sfGuardUser')->find($request->getParameter('user_id'));
     }
     else
     {
         $user_id = 0;
     }

     if(isset($answer))
     {
         if(!$answer->getIsSuperAdmin() and !$this->getUser()->getGuardUser()->getIsSuperAdmin())
         if(!$this->checkSameGender($caller, $answer))
         $this->redirect ($this->getRef ());
         
         if(!$this->checkBlacklist($answer))
         $this->redirect ('chat/forbide');
     }

     /////Проверяем статус
     
     $rez = $this->checkMember('chat',true);
     if($answer->getIsSuperAdmin() or $caller->getIsSuperAdmin()) $rez['status']=0;
     if ($rez['status']==1) {
         $this->redirect('chat/nocredit');
     }
     else
     {
             /// Ставим признак что в чате
                 $pf = $caller->getProfile();
                 $pf->setIsChat(true);
                 $pf->save();
             //////
             $this->redirect('chat/index?user_id='.$user_id);

     }
 }







////Получение сообщений
 public function executeGm(sfWebRequest $request)
 {
     $this->setLayout(false);
     $room = Doctrine::getTable('Chat2Room')->find($_SESSION['current_room_id']);
     if($room)
     {

         $this->new_messages = $this->getNewMessages($room);
         $this->messages = $this->getRoomMessages($room);

         $this->room = $room;
     }
     else
     {
         echo 'error room id';
         die;
     }
     /// Выбор новых сообщений из других комнат
       $this->new_message = Doctrine::getTable('Chat2Message')
               ->createQuery('a')
               ->leftJoin('a.Room r')
               ->where('a.user_id<>? and a.room_id<>? and a.is_read=? and(r.caller_id=? or r.answer_id=?)',array($this->getUser()->getGuardUser()->getId(),$_SESSION['current_room_id'],false,$this->getUser()->getGuardUser()->getId(),$this->getUser()->getGuardUser()->getId()))
               ->execute();
     ///
     

 }

////опрос на вызов из фронтенда
 public function executeCall(sfWebRequest $request)
  {
   //  if(@$_SESSION['cur_chat_call']!='true')
   //  {
 
     if(!$this->getUser()->isAuthenticated()) die;
     
       $room = Chat2RoomTable::getAlertRoom($this->getUser()->getGuardUser()) ;
        
         if($room)
         {
               if($this->getUser()->getGuardUser()->getId()==$room->getCallerId())
               {
                   $this->abonent = $room->getAnswer();
               }
                else
                {
                    $this->abonent = $room->getCaller();
                }

               $this->room = $room;
               $this->call = true;
               $_SESSION['cur_chat_call']='true';
            
         }
   //  }
         
     $pf = $this->getUser()->getGuardUser()->getProfile();
     $pf->setTimeOnSite($pf->getTimeOnSite()+10);
     $pf->save();
     $this->setLayout(false);
     $this->insertArrays();
  }


  ////Согласие на вызов
  public function executeApprove (sfWebRequest $request)
  {
     
     $room = Doctrine::getTable('Chat2Room')->find($request->getParameter('r'));
     $this->forward404Unless($room);
     $this->approveRoom($room,$this->getUser()->getGuardUser()->getId() );
     //$this->getUser ()->setFlash ( 'message', __('Вы согласились поговорить. Говорите!') );
     if($room->getCallerId()==$this->getUser()->getGuardUser()->getId())
     $this->redirect('chat/index?user_id='.$room->getAnswerId());
     if($room->getAnswerId()==$this->getUser()->getGuardUser()->getId())
     $this->redirect('chat/index?user_id='.$room->getCallerId());

     $this->redirect('chat/index');
     
  }

  ////Отказ в чате
  public function executeReject(sfWebRequest $request)
  {
     unset($_SESSION['cur_chat_call']);
     $room = Doctrine::getTable('Chat2Room')->find($request->getParameter('r'));

     ///Зачищаем
     if($room)
     {
    Doctrine_Query::create()
    ->update('Chat2Message')
    ->set('is_read','true')
    ->where('room_id=?', array($room->getid()))
    ->execute();

     $this->forward404Unless($room);
     $this->rejectRoom($room,$this->getUser()->getGuardUser()->getId());
     }
     $this->getUser ()->setFlash ( 'message', __('Вы отказались от общения.') );
     //$this->redirect($this->getRef());
     $this->setLayout(false);
  }

    public function executeIndex(sfWebRequest $request)
  {



    unset($_SESSION['cur_chat_call']);
       ///Массив стран
         $this->arrc = sfCultureInfo::getInstance($this->getUser()->getCulture())->getCountries();
  
        $this->setLayout('chat2_layout');
        $abonent = ProfileTable::getProfileById($request->getParameter('user_id'));

        ///Берем абонента из сессии
        if(!$abonent and isset($_SESSION['current_abonent_id'])) $abonent = ProfileTable::getProfileById($_SESSION['current_abonent_id']);
        //$this->forward404Unless($abonent);
        if($abonent)
        {
                    /// Перебрасываем на заказ если оффлайн
      
        if(!$abonent->getsfGuardUser()->getIsOnline()) $this->redirect('chat/appointment?i='.$abonent->getUserId());
        
            /// Кидаем абонента в шаблон
            $this->abonent = $abonent;
            $user = $this->getUser()->getGuardUser();
           /// Получаем комнату
             if($this->isActiveRoom($user,$abonent->getsfGuardUser()))
             {
                 $this->room = $this->getActiveRoom($user,$abonent->getsfGuardUser());
             }
             else
             {
                 $this->room = $this->createRoom($user->getId(), $abonent->getUserId());
             }
        }

     if($request->getParameter('clear'))
       {
           $this->redirect('chat/close');
       }

  }
  
   public function executeAppointment(sfWebRequest $request)
  {
          $abonent = ProfileTable::getProfileById($request->getParameter('i'));
          $this->forward404Unless($abonent);
          $a = new ChatAppointment();
          $a->setManId($this->getUser()->getGuardUser()->getId());
          $a->setGirlId($request->getParameter('i'));
          $a->setDate(date('Y-m-d'));
          $this->form = new ChatAppointmentForm($a);
                  
          
          $this->setLayout('chat_appointment_layout');
  }
  
     public function executeAppointment_save(sfWebRequest $request)
  {
    $this->setLayout('chat_appointment_layout');
    $this->form = new ChatAppointmentForm();
    if ($request->isMethod ( 'post' ))
		{
			$this->form->bind ( $request->getParameter ( 'chat_appointment' ), $request->getFiles('chat_appointment') );
			if ($this->form->isValid ()) {

                          $f = $this->form->save();
                  
			}

		}
  }          

  public function executeSelect_user(sfWebRequest $request)
  {
      $this->setLayout(false);
       ///Массив стран
         $this->arrc = sfCultureInfo::getInstance($this->getUser()->getCulture())->getCountries();
       ///Выбираем абонента
       $abonent = ProfileTable::getProfileById($request->getParameter('u'));
        ///Берем абонента из сессии если не передан
       if(!$abonent and isset($_SESSION['current_abonent_id'])) $abonent = ProfileTable::getProfileById($_SESSION['current_abonent_id']);

       if(!$abonent) $this->setTemplate ('noabonent');
        /// Кидаем абонента в шаблон
        $this->abonent = $abonent;
        

        ////Ставим текущего абонента в сессию
        $_SESSION['current_abonent_id'] = $abonent->getUserId(); 
        $user = $this->getUser()->getGuardUser();
        $profile = $user->getProfile();
       /// Получаем комнату
         if($this->isActiveRoom($user,$abonent->getsfGuardUser()))
         {
             $this->room = $this->getActiveRoom($user,$abonent->getsfGuardUser());
         }
         else
         {
             $this->room = $this->createRoom($user->getId(), $abonent->getUserId());
         }
         ///Если не получили комнату выбрасываем на выбор
         if(!$this->room) $this->redirect ('chat/noabonent');
       
         ///Записываем текущую комнату в сессию
         $_SESSION['current_room_id'] = $this->room->getId();
           //Кидаем форму
             $m = new Chat2Message();
             $m->setUserId($this->getUser()->getGuardUser()->getId());
             $m->setRoomId($this->room->getId());
             $this->form = new cMessageForm($m);

           ///Кидаем сообщения по текущей комнате
           $this->messages = $this->getRoomMessages($this->room);

           ///Делаем платеж
           $this->makeFirstPayment($this->getUser()->getGuardUser(),$this->room);
  }


   public function executeSend(sfWebRequest $request)
  {
     $user = $this->getUser()->getGuardUser();
     $abonent = ProfileTable::getProfileById($_SESSION['current_abonent_id']); 
     $this->form = new cMessageForm();
     if ($request->isMethod ( 'post' ))

		{

			$this->form->bind ( $request->getParameter ( 'chat2_message' ) );
			if ($this->form->isValid ()) {
                                $pars = $request->getParameter ( 'chat2_message' );
                                if(strlen($pars['content'])>1)
                                {
                                   
                                    $m = $this->form->save();
                                    $m->setTimer(time());
                                    $m->save();
                                    $room = $m->getRoom();
                                    ///Если закрыт или новый делаем на вызов
                                    //if($room->getStatus()=='new' or $room->getStatus()=='closed')
                                    //{ 
                        	      $room->setTimeStart(time());
                                      $room->setAlertId($abonent->getUserId());            
                                      if( $room->getStatus()=='new' or $room->getStatus()=='closed' or $room->getStatus()=='rejected')
                                      {
                                        
                                        $room->setStatus('wait');
                                      }

                                    //}
                                    $room->save();
                                    
                                
                                    $this->m = $m;
                                    $this->room = $room;
                                }
				//$this->redirect ( 'chat/index?user_id='.$_SESSION['current_abonent_id'] );
			}

		}
       $this->setLayout(false);
       
  }


  ////Получение входного канала девушки
  public function executeGet_woman_video_in (sfWebRequest $request)
  {
    
    $this->setLayout(false);
  }


  

}
