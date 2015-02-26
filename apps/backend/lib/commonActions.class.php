<?php
class commonActions extends sfActions
{

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
          $this->getUser ()->setFlash ( 'error', __('Вы не можете совершать эту операцию с пользователем такого же пола.') );
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
              $this->getUser ()->setFlash ( 'error', __('У Вас недостаточно средств для совершения этой операции. Пополнить баланс Вы можете в %1%',array('%1%'=>link_to(__('Разделе управления счетом'),'account/index'))) );
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
              $this->getUser ()->setFlash ( 'error', __('У Вас нет средств для совершения этой операции. Пополнить баланс Вы можете в %1%',array('%1%'=>link_to(__('Разделе управления счетом'),'account/index'))) );
              return false;
          }
           else
         {
              return true;
          }
      }
  }

  protected function makePayment($user, $service_id, $woman, $alert=true, $summa=0)
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
          if($service_id==6)
          {
              $p->setComission(($summa/100)*$s->getComission());
              $p->setSumma($summa);
          }
      else {
            $p->setSumma($s->getCost());
            $p->setComission($s->getComission());
           }
      
      $p->setUserId($user->getId());
      $p->save();
      if($alert)
      $this->getUser ()->setFlash ( 'message', __('Платеж на сумму %1% совершен.',array('%1%'=>$s->getCost().' '.myUser::getAccountStr($s->getCost()))) );
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
  if($request->getParameter('code'))
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
            $this->getUser ()->setFlash ( 'error', __('Не правильная ссылка') );
        }
        
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
          $this->getUser ()->setFlash ( 'error', __('Пользователь %1% запретил вам совершать эту операцию!',array('%1%'=>$user)) );
          return false;
      }
       else
     {
          return true;
      }
  }

   




}

?>
