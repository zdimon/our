

<?php

/**
 * Profile
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    levandos
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7691 2011-02-04 15:43:29Z jwage $
 */
class Profile extends BaseProfile
{
    
     public function setPacketId($v){

         if($v!=$this->getPacketId())
         {
           
      Doctrine_Query::create()
          ->delete('Hotlistlog')
          ->where('from_id=?',array($this->getUserId()))
          ->execute();
        }

        $this->_set('packet_id', $v);
     }

    
       public function setIsActive($v)
    {
        
        if($v==true and $this->getIsActive()==false)
        {
            $d = 'ID:'.$this->getUserId();
            ActionsTable::add(1,$d);
        }
        $this->_set('is_active', $v);
    }
    
    
        //// на деактивацию
        public function Activatephotos()
  {
     $ph = Doctrine::getTable('Photo')->createQuery('a')->where('a.user_id=?',array($this->getUserId()))->execute();
	 foreach($ph as $pho)
	 {
	   $pho->setPub(true);
	   $pho->save();
	 }
  }
  

    public function sendNotify()
    {
        $user = $this->getsfGuardUser();
        $m = NotifyTable::getNotify(11, $user->getCulture());
             
                   if($m)
                   {


                           if($user->getCulture()=='ru')
                           {
                               $cat = __('каталог пользователей');
                           }
                           if($user->getCulture()=='en')
                           {
                               $cat = __('members catalogue');
                           }
                           if($user->getCulture()=='fr')
                           {
                               $cat = __('membres le catalogue');
                           }
                           if($user->getCulture()=='de')
                           {
                               $cat = __('mitglieder katalog');
                           }
                           if($user->getCulture()=='is')
                           {
                               $cat = __('catálogo de los miembros');
                           }



                       if($user->getGender()=='m')
                       {
                           if($user->getCulture()=='ru')
                           {
                               $gen = __('женщины');
                           }
                           if($user->getCulture()=='en')
                           {
                               $gen = __('women');
                           }
                           if($user->getCulture()=='fr')
                           {
                               $gen = __('femmes');
                           }
                           if($user->getCulture()=='de')
                           {
                               $gen = __('frauen');
                           }
                           if($user->getCulture()=='is')
                           {
                               $gen = __('mujeres');
                           }


                       }
                       else
                       {
                           if($user->getCulture()=='ru')
                           {
                               $gen = __('мужчина');
                           }
                           if($user->getCulture()=='en')
                           {
                               $gen = __('man');
                           }
                           if($user->getCulture()=='fr')
                           {
                               $gen = __('hommes');
                           }
                           if($user->getCulture()=='de')
                           {
                               $gen = __('männer');
                           }
                           if($user->getCulture()=='is')
                           {
                               $gen = __('hombres');
                           }
                       }


                       $arr = array(
                           '%link_login%' => link_to(url_for('http://'.$_SERVER['HTTP_HOST'].'/'.$user->getCulture().'/registration/enter?code='.$user->getSalt(),array('absolute' => true)),url_for('http://'.$_SERVER['HTTP_HOST'].'/'.$user->getCulture().'/registration/enter?code='.$user->getSalt(),array('absolute' => true))),
                           '%site%' => 'http://'.$_SERVER['HTTP_HOST'],
                           '%login%' => $user->getUsername(),
                           '%gender%' => $gen,
                           '%link%' => link_to(__('contuct us'),'contact/index',array('absolute' => true)),
                           '%name%' => $user->getProfile()->getFirstName().' '.$user->getProfile()->getLastName(),
                           '%gender_catalog%' => $cat,
                           '%password%' => $user->getPc()
                       );

                        $content =$m->parse2($arr,$user->getCulture());

                        mailTools::send($user->getEmail(), $m->Translation[$user->getCulture()]->ititle, $content); 
                   }
    }


    
        public function updateWithPhoto()
    {
          
           $cnt = Doctrine::getTable('Photo')
             ->createQuery('a')
             ->where('a.user_id=? and a.pub=? and a.is_main=?',array($this->user_id,true,true))
             ->count();
             //echo  $this->user_id .'-'.$cnt.'<br />';
             if($cnt==0)
             {        
                 $this->setWithPhoto(false);             
             } else {
                 $this->setWithPhoto(true);      
             }
             $this->save();
    }

    

    public function setFirstName($v)
    {
        $this->_set('first_name', $v);
        if(sfContext::hasInstance())
        {
            $this->setIfirstName($v);
        }
    }

    
   public function setLastName($v) {
        $this->_set('last_name', $v);
        if(sfContext::hasInstance())
        {
            $this->setIlastName($v);
        }
    }
    
   public function setCity($v) {
        $this->_set('city', $v);
        if(sfContext::hasInstance())
        {
            $this->setIcity($v);
        }
    }    
    
   public function setOccupation($v) {

        $this->_set('occupation', $v);
        if(sfContext::hasInstance())
        {
            $this->setIoccupation($v);
        }
    }    
    
    public function getFullName()
    {
        $ret = '';
        if(strlen($this->getIfirstName())>0) 
        {
           $ret .=  $this->getIfirstName();
        } else {
           $ret .=  $this->getFirstName();
        }
        if(strlen($this->getIlastName())>0) 
        {
           $ret .=  ' '.$this->getIlastName();
        } else {
           $ret .=  ' '.$this->getLastName();
        }
        
        return $ret;
    }

        /// Получение названия пакета
    public function getNameMembership()
    {
        $suser = $this->getSfGuardUser();
        //if($this->getPacketId()==1 and $suser->getDateExpire()>=date('Y-m-d'))
        //{
          //  return __('3 Days Trial');
       // }
       // else
       // {
            return $this->getPacket();
        //}
    }


    public function  __toString() {
        $str = $this->getFirstName().' '.$this->getLastName();
        if(strlen($str)>0)
        {
            return $str;
        }
        else
        {
            return 'noname';
        }
            
    }
    
    
        public function getRealName() {
           $str = $this->getFirstName().' '.$this->getLastName();
        if(strlen($str)>0)
        {
            return $str;
        }
        else
        {
            return 'noname';
        }
             
    }
    

    /// Попытка продлить абонемент на месяц
    public function  getUserSpecId() {

        if($this->gender=='m')
        {
            return '1'.$this->user_id;
        }
        else
        {
            return '2'.$this->user_id;
        }
    }

/// Попытка продлить абонемент на месяц
    public function  tryAbonement() {

           $service = Doctrine::getTable('Service')->find(13);
           $user = $this->getSfGuardUser();
           if($user->getAccount()>=$service->getCost())
           {
               $p = new Payment();
               $p->setServiceId(13);
               $p->setSumma($service->getCost());
               $p->setUserId($this->getUserId());
               $p->save();

               ////Вычисляем дату
               $cur = strtotime($user->getDateExpire());
               $per = 60*60*24*30;
               $new = $cur+$per;
               $newdate = date('Y-m-d',$new);

               $user->setDateExpire($newdate);
               $user->setAccount($user->getAccount()-$service->getCost());
               $user->save();
               $this->setStatusId(1);
               $this->save();
           }
           else
           {
               $this->setStatusId(7);
               $this->save();
           }

    }

/// Для фильтров
    public function  getFilterName() {
             return '['.$this->id.'] '.$this->first_name.' '.$this->last_name;
    }

/// Индикатор включенной камеры
    public function  getCameraIndicator() {

          

          $c = Doctrine::getTable('Chat2Chanels')
          ->createQuery('a')
          ->where('a.user_id=?',array($this->user_id))
          ->count();
          if($c>0)
          {
              return image_tag('/images/icons/chat_webcam_icon_live.png');
          }
         else {
          //  return image_tag('/images/icons/chat_webcam_icon.png');
             return '';
        }

    }

    
//     public function setRelationship($value)
//    {
//
//            $str = myTools::db_array_field($value);
//            print_r($value);
//            die;
//            //$pf->setRelationship($str);
//             $this->_set('relationship', $value);
//    }

    public function setEmail($v)
    {
        $user = $this->getsfGuardUser();
        if($v!=$user->getEmail())
         {
            $user->setEmail($v);
            $user->save();
         }
    }

    public function getOnlineIcon()
    {

        if(sfContext::getInstance()->getUser()->isAuthenticated())
        {
            if(sfContext::getInstance()->getUser()->hasCredential('admin'))
            {

                if($this->getsfGuardUser()->getIsOnline()==1)
                {
                    $str = link_to(image_tag('/images/icons/chat_online.png'),'superlogin/index?user='.$this->getUserId());
                }
                else
                {
                    $str = link_to(image_tag('/images/icons/chat_offline.png'),'superlogin/index?user='.$this->getUserId());
                }

                return $str;

            }
        }

        if($this->getsfGuardUser()->getIsOnline()==1)
        {
            $str = image_tag('/images/icons/chat_online.png');
        }
        else
        {
            $str = image_tag('/images/icons/chat_offline.png');
        }

        return $str;
    }


     public function getOnlineIndicator()
    {

        if(sfContext::getInstance()->getUser()->isAuthenticated())
        {
            if(sfContext::getInstance()->getUser()->hasCredential('admin'))
            {

                   if($this->getsfGuardUser()->getIsOnline()==1)
                    {
                      $str = link_to('<span class="on"></span>','superlogin/index?user='.$this->getUserId());
                    }
                   else
                    {
                      $str = link_to('<span class="off"></span>','superlogin/index?user='.$this->getUserId());
                    }
                
                return $str;
               
            }
        }

        if($this->getsfGuardUser()->getIsOnline()==1)
        {
          $str = '<span class="on"></span>';
        }
       else
        {
          $str = '<span class="off"></span>';
        }

        return $str;
    }

    public function  getLinkImage() {

         if(strlen($this->photo)>0 and $this->getStatusId()==1)
        {
         return link_to(image_tag('/uploads/photo/big_thumbnail/'.$this->getPhoto(),array('title'=>$this)),'profile/show?username='.$this->getsfGuardUser()->getUsername(),array('title'=>$this->getImgSeo(),'class'=>'img_link'));
        }
        else
        {
           if($this->gender=='m')
          {
            return link_to(image_tag('/images/icons/no_avatar_man.jpg',array('title'=>$this)),'profile/show?username='.$this->getsfGuardUser()->getUsername(),array('title'=>$this->getImgSeo(),'class'=>'img_link'));
          }
          else
          {
            return link_to(image_tag('/images/icons/no_avatar_woman.jpg',array('title'=>$this)),'profile/show?username='.$this->getsfGuardUser()->getUsername(),array('title'=>$this->getImgSeo(),'class'=>'img_link'));
          }
        }
      
    }

    public function  getLinkImageSmall($escape=false) {



        $mf = $this->getMainPhoto();
        if($mf and $this->getStatusId()==1)
        {
           $v = link_to(image_tag('/uploads/photo/small_thumbnail/'.$mf->getImage(),array('title'=>$this)),'profile/show?username='.$this->getsfGuardUser()->getUsername(),array('title'=>$this->getImgSeo(),'class'=>'avatar'));
        }
        else
        {
           if($this->gender=='m')
          {
            $v =  link_to(image_tag('/images/icons/_no_avatar_man.jpg',array('title'=>$this)),'profile/show?username='.$this->getsfGuardUser()->getUsername(),array('title'=>$this->getImgSeo(),'class'=>'avatar'));
          }
          else
          {
            $v =  link_to(image_tag('/images/icons/_no_avatar_woman.jpg',array('title'=>$this)),'profile/show?username='.$this->getsfGuardUser()->getUsername(),array('title'=>$this->getImgSeo(),'class'=>'avatar'));
          }
        }
        if($escape)
        {
             echo $v;
        }
        else
        {
             return $v;
        }
    }


    public function  getLinkImageMiddle($escape=false) {



        $mf = $this->getMainPhoto();
        if($mf and $this->getStatusId()==1)
        {
            $v = link_to(image_tag('/uploads/photo/middle_thumbnail/'.$mf->getImage(),array('title'=>$this)),'profile/show?username='.$this->getsfGuardUser()->getUsername(),array('title'=>$this->getImgSeo(),'class'=>'avatar'));
        }
        else
        {
            if($this->gender=='m')
            {
                $v =  link_to(image_tag('/images/icons/_no_avatar_man.jpg',array('title'=>$this)),'profile/show?username='.$this->getsfGuardUser()->getUsername(),array('title'=>$this->getImgSeo(),'class'=>'avatar'));
            }
            else
            {
                $v =  link_to(image_tag('/images/icons/_no_avatar_woman.jpg',array('title'=>$this)),'profile/show?username='.$this->getsfGuardUser()->getUsername(),array('title'=>$this->getImgSeo(),'class'=>'avatar'));
            }
        }
        if($escape)
        {
            echo $v;
        }
        else
        {
            return $v;
        }
    }



        public function  getUrlImage() {

        $mf = $this->getMainPhoto();
        if($mf and $this->getStatusId()==1)
        {

            return '/uploads/photo/big_thumbnail/'.$mf->getImage();
        }
        else
        {
           if($this->gender=='m')
          {
            return '/images/icons/no_avatar_man.jpg';
          }
          else
          {
            return '/images/icons/no_avatar_woman.jpg';
          }
        }

    }

    public function  getUrlImageSmall($escape=false) {

        $mf = $this->getMainPhoto();
         if($mf and $this->getStatusId()==1)
        {
         $v = '/uploads/photo/small_thumbnail/'.$mf->getImage();
        }
        else
        {
           if($this->gender=='m')
          {
            $v = '/images/icons/_no_avatar_man.jpg';
          }
          else
          {
            $v = '/images/icons/_no_avatar_woman.jpg';
          }
        }
        if($escape)
        {
             echo $v;
        }
        else
        {
             return $v;
        }

    }

    public function  getUrlImageMiddle($escape=false) {

        $mf = $this->getMainPhoto();
        if($mf and $this->getStatusId()==1)
        {
            $v = '/uploads/photo/middle_thumbnail/'.$mf->getImage();
        }
        else
        {
            if($this->gender=='m')
            {
                $v = '/images/icons/_no_avatar_man.jpg';
            }
            else
            {
                $v = '/images/icons/_no_avatar_woman.jpg';
            }
        }
        if($escape)
        {
            echo $v;
        }
        else
        {
            return $v;
        }

    }



     public function setPhoto($value)
    {
        $this->_set('photo', $value);
        $s = Doctrine::getTable('sfGuardUser')->find($value);
        if($s)
        {
          $s->setImage($value);
          $s->save();
        }

    }


         public function setBirthday($value)
    {

       // print_r($value);
       // die;
        $this->_set('birthday', $value);
        $i = $this->getZodiacInt($value);
        if($i>0)
        {
         $this->setZodiac($i);
        }
      //  $this->_set('zodiac', $i );

    }

    	public function getZodiacSign($int)
	{
		$arr = array(
		1=>__('Овен'),
		2=>__('Телец'),
		3=>__('Близнецы'),
		4=>__('Рак'),
		5=>__('Лев'),
		6=>__('Дева'),
		7=>__('Весы'),
		8=>__('Скорпион'),
		9=>__('Стрелец'),
		10=>__('Козерог'),
		11=>__('Водолей'),
		12=>__('Рыбы')

		);
                return $arr[$int];
        }

        public function getZodiacInt($date)
        {
        $date = strtotime($date);
        $day = date("j", $date);
        $month = date("n", $date);

        $sign = array(10, 11, 12, 1, 2, 3, 4, 5, 6, 7, 8, 9);

        // первый день нового знака для каждого месяца
        $signstart = array(1=>21, 2=>21, 3=>21, 4=>21, 5=>21, 6=>22, 7=>23, 8=>24, 9=>24, 10=>24, 11=>23, 12=>22);

        // конец декабря - опять Козерог
        return $day < $signstart[$month] ? $sign[$month-1] : $sign[$month%12];
        }


    function getContactLensesStr()
    {
        if($this->contact_lenses)
        {
            return __('да');
        }
        else
        {
            return __('нет');
        }
    }

    function getLookingForStr()
    {
        if($this->looking_for=='m')
        {
            return __('мужчину');
        }
        else
        {
            return __('женщину');
        }
    }

    function getGenderStr()
    {
       if($this->gender=='m')
       {
          return __('мужчина');
       }
       else
       {
          return __('женщина');
       }
    }

        function getGenderImage()
    {
       if($this->gender=='m')
       {
          echo image_tag('/images/icons/male-icon.png');
       }
       else
       {
          echo image_tag('/images/icons/female-icon.png');
       }
    }


  function getAge()
{
    $birthday = $this->birthday;
    if(strlen($birthday)>0)
    {
    // выделяем день, месяц, год из даты рождения
    $bDay = substr($birthday, 8, 2);
    $bMonth = substr($birthday, 5, 2);
    $bYear = substr($birthday, 0, 4);
    // текущие день, месяц, год
    $cDay = date('j');
    $cMonth = date('n');
    $cYear = date('Y');

    if(($cMonth > $bMonth) || ($cMonth == $bMonth && $cDay >= $bDay)) {
        return ($cYear - $bYear).' '.myUser::getAgeStr($cYear - $bYear);
    } else {
        return ($cYear - $bYear - 1).' '.myUser::getAgeStr($cYear - $bYear - 1);
    }
    }
    else
    {
       return '';
    }

}

    function getAgeNum()
    {
        $birthday = $this->birthday;
        if(strlen($birthday)>0)
        {
            // выделяем день, месяц, год из даты рождения
            $bDay = substr($birthday, 8, 2);
            $bMonth = substr($birthday, 5, 2);
            $bYear = substr($birthday, 0, 4);
            // текущие день, месяц, год
            $cDay = date('j');
            $cMonth = date('n');
            $cYear = date('Y');

            if(($cMonth > $bMonth) || ($cMonth == $bMonth && $cDay >= $bDay)) {
                return ($cYear - $bYear);
            } else {
                return ($cYear - $bYear - 1);
            }
        }
        else
        {
            return 0;
        }

    }


 public function save(Doctrine_Connection $conn = null)
    {

         parent::save();
          $i = $this->getZodiacInt($this->birthday);
            if($i>0)
            {
             $this->setZodiac($i);
            }
           $tag = new BackendCacheTagUserInfo($this->getUserId());
           $tag->clean();
           $tag = new BackendCacheTagPartnerInfo($this->getPartnerId());
           $tag->clean();
         parent::save();
    }



    public  function  getAccount()
    {

     return $this->getSfGuardUser()->getAccount() ;
    }





     public  function  getCntRequest()
    {
        $cnt = Doctrine::getTable('Friend')
        ->createQuery('a')
        ->where('a.user_id=? and a.status_id=?',array($this->user_id, 2))
        ->count();
     return $cnt ;
    }

    public  function  getCntMessage()
    {
        $cnt = Doctrine::getTable('Message')
        ->createQuery('a')
        ->where('a.from_id=?',array($this->user_id))
        ->count();
     return $cnt ;
    }

    public  function  getCntGift()
    {
        $cnt = Doctrine::getTable('Giftbox')
        ->createQuery('a')
        ->where('a.from_id=?',array($this->user_id))
        ->count();
     return $cnt ;
    }

    public  function  getBalance()
    {
       $q = Doctrine_Query::create()
       ->select('sum(credit) as sum')
       ->from('Billing b')
       ->where('b.user_id=?',array($this->user_id));

       $r = $q->fetchOne();
     return $r['sum'] ;
    }


         public function delete(Doctrine_Connection $conn = null)
    {

         $tag = new BackendCacheTagUserInfo($this->getUserId());
         $tag->clean();
         $tag = new BackendCacheTagPartnerInfo($this->getPartnerId());
         $tag->clean();
         parent::delete();


    }


    public  function  getMainPhoto()
    {
        $p = Doctrine::getTable('Photo')
            ->createQuery('a')
            ->where('a.user_id=? and a.is_main=?',array($this->user_id,true))
            ->fetchOne();

        if($p)
        {
            return $p;
        }
        else
        {
            return false;
        }

    }



  public function checkPacketForMessage($to_id)
  {
      if(HotlistlogTable::checkUser($this->user_id,$to_id) and $this->getPacketId()>1)  return '';



      if(($this->getPacketId()==4 or $this->getPacketId()==5) and $this->gender=='m') return '';
      
      if($this->getPacketId()==2 and HotlistlogTable::getCurrentAmmountAbonents($this->getSfGuardUser())>4)
      {
//echo HotlistlogTable::getCurrentAmmountAbonents($this->getSfGuardUser()).'-'.$this->getSfGuardUser()->getId();
//die;
                $e = __('Sorry, but your membership doesnt allow conversation more that 5 people please %1% !',array('%1%'=>link_to(__('buy credit now'),'account/index',array('class'=>'but'))));
          return $e;     
      }
      
            if($this->getPacketId()==3 and HotlistlogTable::getCurrentAmmountAbonents($this->getSfGuardUser())>14)
      {
                $e = __('Sorry, but your membership doesnt allow conversation more that 15 people please %1% !',array('%1%'=>link_to(__('buy credit now'),'account/index',array('class'=>'but'))));
          return $e;     
      }
      

      if($this->getPacketId()==1 and $this->gender=='m')
      {
         
          $e = __('Sorry, but your membership doesnt allow conversation please %1% !',array('%1%'=>link_to(__('buy credit now'),'account/index',array('class'=>'but'))));
          return $e;          
      }
      
      //if($this->getCurAbonent()>=$this->getMaxAbonent() and $this->gender=='m')
     // {
       //   $e = __('Sorry, but your membership doesnt allow conversation please %1% !',array('%1%'=>link_to(__('buy credit now'),'account/index',array('class'=>'but'))));
         // return $e;
      //}

      return '';
  }


    public function getCntAbonents()
    {

        $cnt = Doctrine::getTable('Hotlist')
            ->createQuery('a')
            ->where('a.from_id=?',array($this->getUserId()))
            ->count();

        return $cnt;
    }

    public function getImgSeo()
    {
        return $this->first_name.' '.$this->last_name.' '.$this->getAge().' '.$this->getCity();
    }
    
        public function getUserKeywords($type)
    {
        $items = User2KeywordTable::getInstance()->createQuery('a')
                ->leftJoin('a.Keyword k')
                ->where('a.user_id=? and k.type_keywords_id=?',array($this->getUserId(), $type))
                ->execute();
        $arr = array();
        foreach ($items as $i)
        {
            $arr[] = $i->getKeyword()->getTitle();
        }
        
        return implode(', ', $arr);
    }



}