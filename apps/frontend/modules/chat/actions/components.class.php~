<?php

class chatComponents extends sfComponents {
	
	


        public function executeShow_online() {

          
              $q = Doctrine::getTable('Profile')
                      ->createQuery('p')
                      ->leftJoin('p.sfGuardUser s')
                      ->where('s.is_online=? and p.status_id=? and s.gender<>?',array(true,1,sfContext::getInstance()->getUser()->getGuardUser()->getGender()));

              if(isset($_SESSION['current_abonent_id']))
              {
                  $q->addWhere('s.id<>?',array($_SESSION['current_abonent_id']));
              }

              $this->users = $q->execute();
              $this->arrc = sfCultureInfo::getInstance($this->getUser()->getCulture())->getCountries();

	}


        public function executeShow_dialog() {


             $this->arrc = sfCultureInfo::getInstance($this->getUser()->getCulture())->getCountries();

	}

        public function executeSmile() {


	}

        /// Входной поток
       public function executeShow_video_in() {
     
            $this->room = Chat2RoomTable::getInstance()->find($_SESSION['current_room_id']);
            if($this->getUser()->getGuardUser()->getGender()=='w') 
            {
                $this->gender = 'w';
                $this->meth = 'getWithVideo';
            }
            if($this->getUser()->getGuardUser()->getGender()=='m')
            { 
                $this->gender = 'm';
                $this->meth = 'getWithManVideo';
            }
	}
        

      /// Входной поток
       public function executeShow_woman_video_in() {

            $this->room = Chat2RoomTable::getInstance()->find($_SESSION['current_room_id']);

	}

       ///Выходной поток
       public function executeShow_woman_video_out() {

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


              /// Входной поток мужика
       public function executeShow_man_video_in() {

          
           $this->room = Chat2RoomTable::getInstance()->find($_SESSION['current_room_id']);

	}

              /// Выходной поток мужика
       public function executeShow_man_video_out() {

           if(isset($_SESSION['current_abonent_id']))
           {
            $this->room = Doctrine::getTable ('Chat2Room')->find ($_SESSION['current_room_id']);
            $user = Doctrine::getTable('sfGuardUser')->find($_SESSION['current_abonent_id']);
            $this->cur_chanel = Chat2ChanelsTable::getChanelByUser($user);
           }

	}


    
	

}
?>
