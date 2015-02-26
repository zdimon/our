<?php
class commonActions extends sfActions
{

    
    
    public function checkMember($action, $return=false)
    {
       
        $message = __('Your membership doesn`t allow this action! Please %1% your membersip.',array('%1%'=>link_to(__('upgrade'),'account/index',array('style'=>'color: red'))));
        
        if($this->getUser()->isAuthenticated())
        {
            $user = $this->getUser()->getGuardUser();
            $pr = $user->getProfile();
            
            if($pr->getGender()=='w') 
            {   
             $rez = array('status'=>0);
            } else {
                
            
                switch ($action)
                {
                    
                    
                    case 'viewed':
                        
                        if($pr->getPacketId()==1 and $user->getDateExpire()<date('Y-m-d'))
                        {
                            $rez = array('status'=>1,'message'=>$message);
                        }
                        else {
                            $rez = array('status'=>0);
                        }
                    break;   
                    
 
                    case 'vizited':
                        
                        if($pr->getPacketId()==1 and $user->getDateExpire()<date('Y-m-d'))
                        {
                            $rez = array('status'=>1,'message'=>$message);
                        }
                        else {
                            $rez = array('status'=>0);
                        }
                    break;     
                    
                    case 'matches':
                        
                        if($pr->getPacketId()==1 and $user->getDateExpire()<date('Y-m-d'))
                        {
                            $rez = array('status'=>1,'message'=>$message);
                        }
                        else {
                            $rez = array('status'=>0);
                        }
                    break;     
                    
                    case 'favorite':
                        
                        if($pr->getPacketId()==1 and $user->getDateExpire()<date('Y-m-d'))
                        {
                            $rez = array('status'=>1,'message'=>$message);
                        }
                        else {
                            $rez = array('status'=>0);
                        }
                    break;     
                    
                    case 'message':

                        $current_ammount_abonents = HotlistTable::getCurrentAmmountAbonents($user);
 if($pr->getPacketId()==1 and $user->getDateExpire()<date('Y-m-d'))
                        {
                            $rez = array('status'=>1,'message'=>$message);
                        }
                        elseif ($pr->getPacketId()==2 and $current_ammount_abonents>4)

                        {

                            $rez = array('status'=>1,'message'=>__('Error, max is 5 but you have %1%', array('%1%'=>$current_ammount_abonents)));

                        }

                        //// for Gold

                        elseif ($pr->getPacketId()==3and $current_ammount_abonents>14)

                        {

                            $rez = array('status'=>1,'message'=>__('Error, max is 15 but you have %1%', array('%1%'=>$current_ammount_abonents)));

                        }
                        else {
                            $rez = array('status'=>0);
                        }
                    break;    
                    
                    case 'forum':
                        
                        if($pr->getPacketId()==1 and $user->getDateExpire()<date('Y-m-d'))
                        {
                            $rez = array('status'=>1,'message'=>$message);
                        }
                        else {
                            $rez = array('status'=>0);
                        }
                    break;   
                    
                    case 'chat':
                        
                        if(($pr->getPacketId()==1 and $user->getDateExpire()<date('Y-m-d')) or $pr->getPacketId()<4)
                        {
                            $rez = array('status'=>1,'message'=>$message);
                        }
                        else {
                            $rez = array('status'=>0);
                        }
                    break;                      
                    
                    
                    
                }
            }
        }
        else
        {
            $rez = array('status'=>1, 'message'=>__('Only for registered users'));
        }
        
        if($return)
        {
            return $rez;
        }
        else
        {
            if($rez['status']==0)
            { 
                return true;
              
            } else {
            $this->getUser ()->setFlash ( 'error', $message );
            $this->redirect($this->getRef());
            }
        }
    }
    
    

        protected  function getRef()
  {
        $ref = $_SERVER['HTTP_REFERER'];
	if(strlen($ref)==0) $ref = url_for('@mainpage');
        return $ref;
  }

   protected function checkSameGender($user_from, $user_to)
  {
      if($user_from->getGender()==$user_to->getGender())
      {
          $this->getUser ()->setFlash ( 'error', __('You cant do it with the users same gender of you') );
          return false;
      }
       else
     {
          return true;
      }
  }


  protected function checkAccount($user, $service_id)
  {
      $s = Doctrine::getTable('Service')->find($service_id);
      if($s)
      {
          if($user->getAccount()<$s->getCost())
          {
              $this->getUser ()->setFlash ( 'error', __('You don`t have enought credits. %1%',array('%1%'=>link_to(__('Manage account'),'account/index'))) );
              return false;
          }
           else
         {
              return true;
          }
          }
   else {
         if($user->getAccount()<1)
          {
              $this->getUser ()->setFlash ( 'error', __('You don`t have enought credits. %1%',array('%1%'=>link_to(__('Разделе управления счетом'),'account/index'))) );
              return false;
          }
           else
         {
              return true;
          }
      }
  }

  protected function makePayment($user, $service_id, $woman, $alert=true, $summa=0, $com=0)
  {
      $s = Doctrine::getTable('Service')->find($service_id);
      $user->setAccount($user->getAccount()-$s->getCost());
      $user->save();
      $p = new Payment();
      $p->setServiceId($s->getId());
      
      $p->setBalanse($user->getAccount());
      $p->setWomanId($woman->getId());
      $partner = Doctrine::getTable('sfGuardUser')->find($woman->getPartnerId());
      if($partner)$p->setPartnerId ($partner->getId());
          
            $p->setSumma($s->getCost());
            if($com==0)
            {
               $p->setComission($s->getComission());
            }
            else {
               $p->setComission($com);
            }
          
      
      $p->setUserId($user->getId());
      $p->save();
      if($alert)
      $this->getUser ()->setFlash ( 'message', __('Payment on %1% have done.',array('%1%'=>$s->getCost().' '.myUser::getAccountStr($s->getCost()))) );
      return $p;
  }

  ///Передаем массивы стран и языков
  protected function insertArrays()
  {
            $this->arrc = sfCultureInfo::getInstance($this->getUser()->getCulture())->getCountries();
            $this->arrl = sfCultureInfo::getInstance($this->getUser()->getCulture())->getLanguages();
  }

 ///Автологирование
  protected function autoLogin(sfWebRequest $request)
  {
  if($request->getParameter('code') and sfConfig::get('app_auto_login')==true)
    {
        $user  = Doctrine::getTable('sfGuardUser')
        ->createQuery('a')
        ->where('a.salt=?',array($request->getParameter('code')))
        ->fetchOne();
        if($user)
        {
            $this->getUser()->signin($user);

        }
        else
        {
            $this->getUser ()->setFlash ( 'error', __('Wrong link') );
        }
        
    }
    else
    {
        return false;
    }
  }


  protected function checkBlacklist($user)
  {
     
     $cnt = Doctrine::getTable('Blacklist')
     ->createQuery('a')
     ->where('a.user_id=? and a.black_id=?',array($user->getId(),$this->getUser()->getGuardUser()->getId()))
     ->count();

      if($cnt>0)
      {
          $this->getUser ()->setFlash ( 'error', __('User %1% forbide you to do this operation!',array('%1%'=>$user)) );
          return false;
      }
       else
     {
          return true;
      }
  }

   protected function checkStatus()
  {
      /// Убираем проверку
     
       $user = $this->getUser()->getGuardUser();
       $pf = $user->getProfile();

       if($pf)
       {
           
       

         if($pf->getStatusId()!=1)
         {
           $this->getUser ()->setFlash ( 'error', __('You profile is not active yet!') );
           return false;
         }

           if($pf->getStatusId()==7)
           {
               $this->getUser ()->setFlash ( 'error', __('Your membership was expire!') );
               return false;
           }

       }

       return true;
  }

    public function checkAuthorization() {

        if(!$this->getUser()->isAuthenticated())
        {

            $this->getUser ()->setFlash ( 'error', __('Only for registered users') );
            $this->redirect('registration/index');
        }

    }

    public function autoenter()
    {
        if($this->getRequestParameter('code'))
        {
            $user = Doctrine::getTable('sfGuardUser')
                ->createQuery('a')
                ->where('a.salt=?',array($this->getRequestParameter('code')))
                ->fetchOne();
            if($user)
            {
                $this->getContext()->getUser()->signIn($user);
                return true;
            } else {
                return false;
            }
        }
    }


}

?>

