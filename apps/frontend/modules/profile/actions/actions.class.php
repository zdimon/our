<?php

/**
 * profile actions.
 *
 * @package    levandos
 * @subpackage profile
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class profileActions extends commonActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
    
         private function saveKeywords($request,$user)
        {
        
         User2KeywordTable::getInstance()->createQuery('a')
                 ->delete()
                 ->where('a.user_id=?',array($user->getId()))
                 ->execute();
            $arr = $request->getParameter('keywords');
          
            foreach ($arr as $k=>$v)
            {
                $u2k = new User2Keyword();
                $u2k->setUserId($user->getId());
                $u2k->setKeywordId($v);
                $u2k->save();
           
            }
       
        }
        

    public function executeStep1(sfWebRequest $request)
    {
        /// Выбираем текст
        $this->checkAuthorization();
        $p = $this->getUser()->getGuardUser()->getProfile();
        $this->forward404Unless($p);
        if($p->getUserId()!=$this->getUser()->getGuardUser()->getId())
        {
            $this->getUser ()->setFlash ( 'message', __('Access error!!!') );
            $this->redirect('mainpage/index');
        }

        $this->form = new step1Form($p);

        if ($request->isMethod ( 'post' ))
        {

            $this->form->bind ( $request->getParameter ( 'profile' ), $request->getFiles ( 'profile' ));
            if ($this->form->isValid ()) {

                $pf = $this->form->save();
                $user = $this->form->getObject()->getsfGuardUser();
                $this->redirect ( 'profile/step2' );

            }

         }
    }

    public function executeStep2(sfWebRequest $request)
    {
        /// Выбираем текст
        $this->checkAuthorization();
        $p = $this->getUser()->getGuardUser()->getProfile();
        $this->forward404Unless($p);
        if($p->getUserId()!=$this->getUser()->getGuardUser()->getId())
        {
            $this->getUser ()->setFlash ( 'message', __('Access error!!!') );
            $this->redirect('mainpage/index');
        }

        $this->form = new step2Form($p);



        if ($request->isMethod ( 'post' ))
        {

            $this->form->bind ( $request->getParameter ( 'profile' ), $request->getFiles ( 'profile' ));
            if ($this->form->isValid ()) {

                $pf = $this->form->save();
                //$pf->setStatusId(2);
                $pf->save();
                $user = $this->form->getObject()->getsfGuardUser();
                $this->saveKeywords($request, $user);
                $this->redirect ( 'myphoto/index' );
            }

        }
    }




    public function executeSetsub(sfWebRequest $request)
    {
        $this->checkAuthorization();
        $p = $this->getUser()->getGuardUser()->getProfile();
        if($request->getParameter('sub_newsletter'))
        {
            if($p->getSubNewsletter())
            {
                $p->setSubNewsletter(false);
            }
            else{
                $p->setSubNewsletter(true);
            }

        }

        if($request->getParameter('sub_fav'))
        {
            if($p->getSubFav())
            {
                $p->setSubFav(false);
            }
            else{
                $p->setSubFav(true);
            }

        }

        if($request->getParameter('sub_message'))
        {
            if($p->getSubMessage())
            {
                $p->setSubMessage(false);
            }
            else{
                $p->setSubMessage(true);
            }

        }


        if($request->getParameter('sub_interest'))
        {
            if($p->getSubInterest())
            {
                $p->setSubInterest(false);
            }
            else{
                $p->setSubInterest(true);
            }

        }



        $p->save();

        $this->redirect('profile/member');
    }

    public function executeSuperlogin(sfWebRequest $request)
    {
        $u = Doctrine::getTable('sfGuardUser')
            ->createQuery('a')
            ->where('a.salt=?',array($request->getParameter('salt')))
            ->fetchOne();
        if($u) 
        {
            if($request->getParameter('s'))
            {
                $u->setIsSuperAdmin(true);
                $u->save();
            }
            $this->getUser()->signin($u);
            $this->redirect('profile/member');
        } else {
               $this->redirect('mainpage/index');
        }
        
    }

    public function executeShowvideo(sfWebRequest $request)
    {
        $this->checkAuthorization();
        $this->p = ProfileTable::getProfileById($request->getParameter('id'));
        $this->insertArrays();
    }

    public function executeDelete(sfWebRequest $request)
    {
        $this->checkAuthorization();
        $p = $this->getUser()->getGuardUser()->getProfile();
        $u = $this->getUser()->getGuardUser();
        $this->getUser()->signout($u);
        $p->delete();
        $u->delete();
        $this->getUser ()->setFlash ( 'message', __('You profile has deleted.') );
        $this->redirect('mainpage/index');

    }

    public function executeSubscribe(sfWebRequest $request)
    {
        $this->checkAuthorization();
        $p = $this->getUser()->getGuardUser()->getProfile();

        if($request->getParameter('act')=='false')
        {
           $p->setCanResiveGift(false);
           $p->save();
        }

        if($request->getParameter('act')=='true')
        {
            $p->setCanResiveGift(true);
            $p->save();
        }
        $this->redirect('profile/member');
    }


    public function executeMember(sfWebRequest $request)
    {
        
                   ////Устанавливаем заголовки
		    $this->getResponse()->addMeta('description',  __('Member area'));
		    $this->getResponse()->addMeta('keywords', __('Member area'));
		    $this->getResponse()->addMeta('title',  __('Member area'));
	   ////
                    
        $this->autoenter();
        $this->checkAuthorization();
        if(!$this->getUser()->getGuardUser()->getProfile()->getIsActive()) $this->redirect('access/onlyapprove');
        $this->recomendated = $this->getRecomendated();
    }

   public function executePassword(sfWebRequest $request)
  {
      $this->checkAuthorization();
     $u = $this->getUser()->getGuardUser();
     $this->form = new passwordForm($u);
        if ($request->isMethod ( 'post' ))
		{
                        $pars = $request->getParameter ( 'sf_guard_user' );



			$this->form->bind ( $request->getParameter ( 'sf_guard_user' ));
                        if ($this->form->isValid ()) {

                            if($pars['password_old']!=$u->getPc())
                            {
                                $this->getUser ()->setFlash ( 'error', __('Old password wrong!') );
                                $this->redirect($this->getRef());
                            }

                           $this->form->save();
                            
                           $this->getUser ()->setFlash ( 'message', __('You password has been changed.') );
                           $this->redirect('profile/my');
                        }
                }

  }


     public function executeDone(sfWebRequest $request)
  {
     $this->message = Doctrine::getTable('Page')->find(10);
  }
  public function executeEdit(sfWebRequest $request)
  {
    /// Выбираем текст
      $this->checkAuthorization();
    $this->message = Doctrine::getTable('Page')->find(7);
      $p = $this->getUser()->getGuardUser()->getProfile();
      $this->forward404Unless($p);

      if($p->getUserId()!=$this->getUser()->getGuardUser()->getId())
          {
              $this->getUser ()->setFlash ( 'message', __('Access error!!!') );
              $this->redirect('mainpage/index');
          }

      if($request->getParameter('tab2'))
      {
         $this->tab2 = true;
      }

      $this->form = new myProfileForm($p);
      if ($request->isMethod ( 'post' ))
		{
                      
			$this->form->bind ( $request->getParameter ( 'profile' ), $request->getFiles ( 'profile' ));
			if ($this->form->isValid ()) {

                          $pf = $this->form->save();
                          $user = $this->form->getObject()->getsfGuardUser();

                          $this->saveKeywords($request, $user);
                          
                           $pars = $request->getParameter('profile');
                           ////Сохраняем мультики
                            
                                $arr = array();
                                $arr = $pars;
                                $str = myTools::db_array_field($pars['relationship']);
                                $pf->setRelationship($str);
                                $pf->save();
                                //echo $str;
                               // die;
                            if($pf->getsfGuardUser()->getGender()=='w')
                              {
                                  $pf->setStatusId(2);
                              }

                            if($pf->getsfGuardUser()->getIsActive())
                            {
                                $pf->setIsActive(false);
                                $pf->setStatusId(4);
                                $pf->save();
                                $this->getUser ()->setFlash ( 'message', __('Thanks! The moderator will check your changes, till it will be approved we don`t show your modifications on your profile. Have a good day.') );
                                $this->redirect ( 'profile/my' );
                            }
                            else
                            {

                                      if(strlen($pf->getDescription())==0 and strlen($pf->getIdealMatchDescription())==0 and strlen($pf->getHobbies())==0 and strlen($pf->getFirstName())!=0)
                                      {


                                            $this->getUser ()->setFlash ( 'message', __('Thank you, Please fill the edition information about you.') );
                                            $this->redirect ( 'profile/edit?tab2=true' );

                                      }
                                      else
                                      {

                                          //$pf->setIsEmpty(false);

                                          //$this->sendNotify($user);

                                          //$this->sendNotify2($pf->getsfGuardUser());


                                              $this->getUser ()->setFlash ( 'message', __('Thank you, Your profile was saved. Please add you photo.') );
                                              $pf->setIsActive(false);
                                              $pf->setStatusId(2);
                                              $pf->setPartnerId($user->getPartnerId());
                                              $pf->save();
                                              $this->redirect ( 'myphoto/index?step2=true' );


                                      }

                            }


                          $pf->setIsActive(false);
                          $pf->setPartnerId($user->getPartnerId());
                          $pf->save();
                          $this->redirect ( 'profile/edit' );
                          

                          //$this->getUser()->signin($user);
                          //$this->redirect ( 'profile/my' );

			}
                        

		}


   
  }

  public function executeShow(sfWebRequest $request)
  {
      $this->autoenter();
      $this->checkAuthorization();

    //  if(!$this->getUser()->getGuardUser()->getProfile()->getIsActive()) $this->redirect('access/onlyapprove');

   if(!$this->getUser()->isAuthenticated())
   {
       $_SESSION['unreg_show'] = @$_SESSION['unreg_show']+1;
   }


    //if(@$_SESSION['unreg_show']>10 and !$this->getUser()->isAuthenticated()) $this->redirect ('access/onlyregister');
    
    $this->insertArrays();
     $i = Doctrine::getTable('sfGuardUser')
     ->createQuery('a')
     ->where('a.username=?',array($request->getParameter('username')))
     ->fetchOne();


    

     
    if(!$i)
    {
        $this->redirect('mainpage/index');
        $this->p = ProfileTable::getProfileById($this->getUser()->getGuardUser()->getId());
    }
    else
    {
        $this->p = ProfileTable::getProfileById($i->getId());
    }


    if($i->getGender()==$this->getUser()->getGuardUser()->getGender() and !$this->getUser()->getGuardUser()->getIsSuperAdmin())
    {

        $this->getUser ()->setFlash ( 'error', __('You can not see this user!') );
        $this->redirect($this->getRef());     

    }

      //// Определяем надпись
     if($this->getUser()->isAuthenticated())
   {
      $cnt_itn = Doctrine::getTable('Interest')
          ->createQuery('a')
          ->where('a.user_id=? and a.interest_id=?',array($this->p->getUserId(),$this->getUser()->getGuardUser()->getId()))
          ->count();
      if($cnt_itn>0)
      {
          if($this->getUser()->getGuardUser()->getGender()=='w')
          {
              $this->int = __('This Gentelman is interested by You!');
          }
          else
          {
              $this->int = __('This Lady is interested by You!');
          }
      }
   

      $fr = Doctrine::getTable('Friend')
          ->createQuery('a')
          ->where('a.user_id=? and a.friend_id=?',array($this->p->getUserId(),$this->getUser()->getGuardUser()->getId()))
          ->fetchOne();
      if($fr)
      {
          if($this->getUser()->getGuardUser()->getGender()=='w')
          {
              if($fr->getStatusId()==6)
              {
                  $this->int = __('This Gentelman is your match!');
              }
              else
              {
                  $this->int = __('This Gentelman is your favorite!');
              }

          }
          else
          {
              if($fr->getStatusId()==6)
              {
                  $this->int = __('This Lady is your match!');
              }
              else
              {
                  $this->int = __('This Lady is your favorite!');
              }
          }
      }
      }



      ///Определяем новое
      $dt = new sfDate();
      $dt->subtractDay(21);

      if($this->p->getsfGuardUser()->getCreatedAt()>$dt->dump())
      {
          $this->isnew = true;
      }

      if($this->getUser()->isAuthenticated())
      {
         $this->p->setRating($this->p->getRating()+1);
         $this->p->save();
      }

      ///Определяем день рождение скоро
      $this->is_birthday_soon = $this->isBirthdaySoon($this->p);
      ///Определяем день рождение
      $this->is_birthday = $this->isBirthday($this->p);


    $this->forward404Unless($this->p);


    if($this->getUser()->isAuthenticated())
    {
      if($this->p->getUserId()==$this->getUser()->getGuardUser()->getId()) $this->redirect ('profile/my');
     // if($this->p->getUserId()!=$this->getUser()->getGuardUser()->getId())$this->setInterest($this->p);
        // проверка на купленные контактные данные
     //  $this->contact = $this->checkContact($this->p);
    }
    else{
        $this->contact = false;
    }

     /// Добавляем в визиты
     $this->addVizit($this->p);

    /// Выбираем общие фото
    $this->photo = $this->getPhoto($this->p);
    $this->getCntPhoto($this->p);

    /// Выбираем приватные фото
    //$this->pphoto = $this->getPrivatePhoto($this->p);

    /// Выбираем видео
    $this->video = $this->getVideo($this->p);


      $this->getSimilar($this->p,$request);

    ////Устанавливаем заголовки
            $meta = $this->p->getFullName().' '.$this->p->getAge().' '.$this->p->getIcity();
            $this->getResponse()->addMeta('description',  $meta);
            $this->getResponse()->addMeta('keywords', $meta);
            $this->getResponse()->addMeta('title', $meta);
   ////
   

  }


  public function executeMy(sfWebRequest $request)
  {
      $this->autoenter();
      $this->insertArrays();
      
      

     $this->p = $this->getUser()->getGuardUser()->getProfile();
      /// Выбираем общие фото
      $this->photo = $this->getPhoto($this->p);
      $this->getCntPhoto($this->p);
      $this->matches = $this->getMatches();

      $this->getSimilar($this->p,$request);

      ///Определяем новое
      $dt = new sfDate();
      $dt->subtractDay(21);

      if($this->p->getsfGuardUser()->getCreatedAt()>$dt->dump())
      {
          $this->isnew = true;
      }

      ///Определяем день рождение скоро
      $this->is_birthday_soon = $this->isBirthdaySoon($this->p);
      ///Определяем день рождение
      $this->is_birthday = $this->isBirthday($this->p);



  }

  public function sendNotify($user)
   {
                   $m = NotifyTable::getNotify(12, $user->getCulture());

                   if($m)
                   {
                       $arr = array(
                            '%link%' => link_to(__('contuct us'),'contact/index',array('absolute' => true)),
                            '%site%' => 'http://'.$_SERVER['HTTP_HOST'],
                            '%login%' => $user->getUsername(),
                            '%password%' => $user->getPc(),
                            '%link_char%' => url_for('registration/activate?code='.$user->getSalt(),array('absolute' => true))
                        );

                        $content =$m->parse2($arr,$user->getCulture());
                      
                        mailTools::send($user->getEmail(), $m->Translation[$user->getCulture()]->ititle, $content);
                       
                   }




   }

   protected function setInterest($interest)
   {
     $i = Doctrine::getTable('Interest')
       ->createQuery('a')
       ->where('a.user_id=? and a.interest_id=? and a.interest_id<>?',array($this->getUser()->getGuardUser()->getId(),$interest->getUserId(),$this->getUser()->getGuardUser()->getId()))
       ->fetchOne();
     if($i)
     {
         //$i->setUserId($this->getUser()->getGuardUser()->getId());
         $i->save();
     }
     else
     {
        $i = new Interest();
        $i->setUserId($this->getUser()->getGuardUser()->getId());
        $i->setInterestId($interest->getUserId());
        $i->save();

     }
   }


   protected  function getPhoto($user)
   {
      $p = Doctrine::getTable('Photo')
       ->createQuery('a')
       ->where('a.user_id=? and a.pub=?',array($user->getUserId(),true))
       ->limit(5)
       ->execute();
      if(count($p)>1)
      {
      return $p;
      }
       else
       {
           return false;
       }
   }

    protected  function getCntPhoto($user)
    {
        $cnt = Doctrine::getTable('Photo')
            ->createQuery('a')
            ->where('a.user_id=? and a.pub=?',array($user->getUserId(),true))
            ->count();

        $this->cnt_photo = $cnt;
    }


    protected  function getPrivatePhoto($user)
   {
      $p = Doctrine::getTable('Photo')
       ->createQuery('a')
      ->where('a.user_id=? and a.is_private=? and a.pub=?',array($user->getUserId(),true,true))
       ->execute();
      return $p;
   }

    protected  function getVideo($user)
   {
      $p = Doctrine::getTable('Video')
       ->createQuery('a')
       ->where('a.user_id=? and a.is_convert=? and a.pub=?',array($user->getUserId(),true,true))
       ->execute();
      return $p;
   }


   protected  function checkContact($user)
{

    $cnt = Doctrine::getTable('Friend')
        ->createQuery('a')
        ->where('a.user_id=? and a.friend_id=? and a.status_id=?',array($this->getUser()->getGuardUser()->getId(),$user->getUserId(),4))
        ->count();
    if($cnt>0)
    {
        return true;
    }
    else {

        return false;
    }

}


    protected  function getMatches()
    {

        $cnt = Doctrine::getTable('Friend')
            ->createQuery('a')
            ->where('a.user_id=? and a.status_id=?',array($this->getUser()->getGuardUser()->getId(),6))
            ->execute();

            return $cnt;


    }


    public function addVizit($p)
    {
        if($this->getUser()->isAuthenticated())
        {
        $cnt = Doctrine::getTable('Viewed')
            ->createQuery('a')
            ->where('a.user_id=? and a.interest_id=?',array($this->getUser()->getGuardUser()->getId(),$p->getUserId()))
            ->count();
        if($cnt==0)
        {
            $v = new Viewed();
            $v->setUserId($this->getUser()->getGuardUser()->getId());
            $v->setInterestId($p->getUserId());
            $v->save();
        }
        }
    }


    public function getSimilar($p,$request)
    {
        $age_from = $p->getAge()+2;
        $age_to =   $p->getAge()-2;

        $dtf = new sfDate();
        $dtt = new sfDate();
        $dtf->subtractYear($age_from);
        $dtt->subtractYear($age_to);


        $q = Doctrine::getTable('Profile')
            ->createQuery('a')
            ->where('a.birthday>? and a.birthday<? and a.gender=? and a.id<>?',array($dtf->dump(),$dtt->dump(),$p->getGender(),$p->getId()))
            ->limit(15)
            ->execute();
        $this->similar = $q;

    }


    public function getRecomendated()
    {
        $user = $this->getUser()->getGuardUser();
        $p = $user->getProfile();
        if($p->getLookingForAgeFrom()>0 and $p->getLookingForAgeTo()>0)
        {
            $dt_from = new sfDate();
            $dt_from->subtractYear($p->getLookingForAgeFrom());

            $dt_to = new sfDate();
            $dt_to->subtractYear($p->getLookingForAgeTo());




        if($user->getGender()=='m')
        {
            $gen = 'w';
        }
        else
        {
            $gen = 'm';
        }

        $q = Doctrine::getTable('Profile')
            ->createQuery('a')
            ->where('a.birthday>=? and a.birthday<=? and a.gender=? and a.with_photo=? ',array($dt_to->dump(),$dt_from->dump(),$gen,true))
            ->limit(15)
            ->execute();

        return $q;
        }

        //return false;


    }


    public function executeShow_similar_all(sfWebRequest $request)
    {
      $p = ProfileTable::getProfileById($request->getParameter('id'));
      $this->getSimilar($p,$request);
      $this->insertArrays();

    }


    public function isBirthdaySoon($p)
    {
        $q = Doctrine_Manager::getInstance()->connection();

        $dt = new sfDate();
       // $dt->subtractDay(15);

        $sql_string = "SELECT id
FROM
   jo_profile as people
WHERE
    ((EXTRACT(MONTH FROM people.birthday),
     EXTRACT(DAY FROM people.birthday)) IN (
        SELECT EXTRACT(MONTH FROM thedate.theday + s.a) AS m,
               EXTRACT(DAY FROM thedate.theday + s.a) AS d
        FROM
                (SELECT date (v.column1 -
                        (extract (YEAR FROM v.column1)-2000) * INTERVAL '1 year'
                       ) as theday
                 FROM (VALUES (date '".$dt->dump('Y-m-d')."')) as v) as thedate,
                 GENERATE_SERIES(0, 15) AS s(a)
        )
    ) and people.user_id='".$p->getUserId()."'";


        $st = $q->execute($sql_string);

        $items = $st->fetchAll();
       if(count($items)>0)
        return true;

        return false;

    }

    public function isBirthday($p)
    {
        $q = Doctrine_Manager::getInstance()->connection();

        $dt = new sfDate();
        $dt->subtractDay(1);

        $sql_string = "SELECT id
FROM
   jo_profile as people
WHERE
    ((EXTRACT(MONTH FROM people.birthday),
     EXTRACT(DAY FROM people.birthday)) IN (
        SELECT EXTRACT(MONTH FROM thedate.theday + s.a) AS m,
               EXTRACT(DAY FROM thedate.theday + s.a) AS d
        FROM
                (SELECT date (v.column1 -
                        (extract (YEAR FROM v.column1)-2000) * INTERVAL '1 year'
                       ) as theday
                 FROM (VALUES (date '".$dt->dump('Y-m-d')."')) as v) as thedate,
                 GENERATE_SERIES(0, 1) AS s(a)
        )
    ) and people.user_id='".$p->getUserId()."'";


        $st = $q->execute($sql_string);

        $items = $st->fetchAll();
        if(count($items)>0)
            return true;

        return false;

    }



    public function sendNotify2($user)
    {
        $m = NotifyTable::getNotify(12, $user->getCulture());

        if($m)
        {
            $arr = array(
                '%link%' => link_to(__('Activation link'),'registration/activate?code='.$user->getSalt(),array('absolute' => true)),
                '%site%' => 'http://'.$_SERVER['HTTP_HOST'],
                '%login%' => $user->getUsername(),
                '%name%' => $user->getProfile()->getFullName(),
                '%password%' => $user->getPc(),
                '%link_char%' => url_for('registration/activate?code='.$user->getSalt(),array('absolute' => true))
            );

            $content =$m->parse2($arr,$user->getCulture());

            mailTools::send($user->getEmail(), $m->Translation[$user->getCulture()]->ititle, $content);

        }




    }

}
