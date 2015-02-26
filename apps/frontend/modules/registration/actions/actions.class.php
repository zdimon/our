<?php

/**
 * registration actions.
 *
 * @package    levandos
 * @subpackage registration
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class registrationActions extends commonActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */


    ///Вход
    public function executeEntercode()
    {
        if($this->getRequestParameter('code'))
        {
            if($this->getRequestParameter('code')==$_SESSION['scode'])
            {
                $user = Doctrine::getTable('sfGuardUser')
                    ->createQuery('a')
                    ->where('a.salt=?',array($_SESSION['salt']))
                    ->fetchOne();
                if($user)
                {

                    mailTools::send(sfConfig::get('app_email_admin'), 'Activation user', 'User ['.$user->getId().'] follow for activate link.');
                    $user->setIsActive(true);
                    $user->save();
                    $this->getUser ()->setFlash ( 'message', __('Thank you. Your email was confirmed! Please fill the form.') );
                    $this->getContext()->getUser()->signIn($user);
                    $this->getUser()->setCulture($user->getCulture());
                    $this->redirect ( 'profile/step1');
                    unset($_SESSION['scode']);

                }
            } else {
                $this->message = __('Your code is incorrect!');
            }
        }
    }


    ///Вход
    public function executeEnter()
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
                $this->redirect ( 'profile/member');

            }



            $this->redirect('@mainpage');

        }


    }

    public function executeFinish()
    {
        $this->checkAuthorization();
        $user = $this->getUser()->getGuardUser();
        $p = $user->getProfile();
        $p->setStatusId(2);
        $p->save();
                            
        $this->sendNotifyFinish($user);
        $this->getUser()->signout();

    }

  public function executeIndex(sfWebRequest $request)
  {
    /// Выбираем текст

   // $this->setLayout('splash_layout');
    $this->message = Doctrine::getTable('Page')->find(6);

    $u = new sfGuardUser();
    if($this->getUser()->isAuthenticated() and $this->getUser()->getGuardUser()->getIsPartner())
    {
        $u->setPartnerId($this->getUser()->getGuardUser()->getId());
    }
    

    $this->form = new qregForm($u);
    if ($request->isMethod ( 'post' ))
		{
			$this->form->bind ( $request->getParameter ( 'sf_guard_user' ),  $request->getFiles( 'sf_guard_user' ) );
			if ($this->form->isValid ()) {
                          $pars = $request->getParameter ( 'sf_guard_user' );




                          $u = $this->form->save();

                           //// create photo
                           // $image = $request->getFiles( 'sf_guard_user' );
                            //$fileName = $request->getFileName('image');
                            //$request->moveFile('image', sfConfig::get('sf_upload_dir').'/photo/original/'.$fileName);
                            //echo sfConfig::get('sf_upload_dir').'/photo/original/'.$file['name'];

                            if(strlen($u->getImage())>0)
                            {
                                $i = new Photo();
                                $i->setImage($u->getImage());
                                $i->setIsMain(1);
                                $i->setUser($u);
                                $i->save();                                        
                            }



                            if(strlen($u->getImage1())>0)
                            {
                                $i = new Photo();
                                $i->setImage($u->getImage1());
                                $i->setUser($u);
                                $i->save();                                        
                            }


                            if(strlen($u->getImage2())>0)
                            {
                                $i = new Photo();
                                $i->setImage($u->getImage2());
                                $i->setUser($u);
                                $i->save();                                        
                            }



                            if(strlen($u->getImage3())>0)
                            {
                                $i = new Photo();
                                $i->setImage($u->getImage3());
                                $i->setUser($u);
                                $i->save();                                        
                            }


                            if(strlen($u->getImage4())>0)
                            {
                                $i = new Photo();
                                $i->setImage($u->getImage4());
                                $i->setUser($u);
                                $i->save();                                        
                            }


                            if(strlen($u->getImage4())>0)
                            {
                                $i = new Photo();
                                $i->setImage($u->getImage4());
                                $i->setUser($u);
                                $i->save();                                        
                            }




                            if(strlen($u->getImage5())>0)
                            {
                                $i = new Photo();
                                $i->setImage($u->getImage6());
                                $i->setUser($u);
                                $i->save();                                        
                            }



                            if(strlen($u->getImage7())>0)
                            {
                                $i = new Photo();
                                $i->setImage($u->getImage7());
                                $i->setUser($u);
                                $i->save();                                        
                            }


                            if(strlen($u->getImage8())>0)
                            {
                                $i = new Photo();
                                $i->setImage($u->getImage8());
                                $i->setUser($u);
                                $i->save();                                        
                            }


                            if(strlen($u->getImage9())>0)
                            {
                                $i = new Photo();
                                $i->setImage($u->getImage9());
                                $i->setUser($u);
                                $i->save();                                        
                            }



/*                           
                             $i = 0;
                            foreach($request->getFiles('sf_guard_user') as $file)
                            {
                                $i++;
                                $fn = md5(time()).'.jpg';
                                move_uploaded_file($file["tmp_name"], sfConfig::get('sf_upload_dir').'/photo/original/'.$fn);
                                $i = new Photo();
                                $i->setImage($fn);
                                if($i==1)
                                {
                                  $i->setIsMain(1);
                                }
                                $i->setUser($u);
                                $i->setImage($fn);
                                $i->save();

                            }

                           /////
*/

                          if($u->getGender()=='w' and $u->getPartnerId()===null)
                          {
                              $u->setPartnerId(1);
                          }
                          $u->save();
                          /// adding id to login
                          $dt = new sfDate();
                          $dt->subtractDay(1);
                          
                          $dn = time();
                          $dn += ((60*60)*24)*21;


                          $u->setDateExpire('2014-01-01');
                          $u->setUsername($u->getUsername());
                          $u->setIsActive(true);
                          $u->save();

                          $scod = rand(666,99999);
                          $_SESSION['salt'] = $u->getSalt();
                          $_SESSION['scode'] = $scod;

                          ///создаем профайл
                            $p = new Profile();
                            $p->setUserId($u->getId());
                            $p->setGender($u->getGender());
                            $p->setRealName($pars['username']);
                            $p->setTimenew($dn);
                            $p->setPacketId(1);
                            $p->setIp($_SERVER['REMOTE_ADDR']);
                            //$arr = explode('/',$pars['birthday']);

                            $p->setBirthday($pars['birthday']['year'].'-'.$pars['birthday']['month'].'-'.$pars['birthday']['day']);

                            //// доп поля

                            $p->setFirstName($pars['first_name']);
                            $p->setLastName($pars['last_name']);
                            $p->setCity($pars['city']);
                            $p->setCountry($pars['country']);
                            $p->setHeight($pars['height']);
                            $p->setBodyType($pars['body_type']);
                            $p->setWeight($pars['body_type']);

                            $p->setSmoker($pars['smoker']);
                            $p->setEyeColor($pars['eye_color']);
                            $p->setHairLenght($pars['hair_lenght']);
                            $p->setHairColor($pars['hair_color']);
                            $p->setDrinker($pars['drinker']);
                            $p->setHobbies($pars['hobbies']);
                            $p->setDescription($pars['about_me']);
                            $p->setIdealMatchDescription($pars['about_partner']);

                            /////
                            $p->setStatusId(3);
                            $p->save();





                            $this->getUser()->signin($u);
                             $this->getContext()->getUser()->signIn($u);
                             $this->getUser()->setCulture($u->getCulture());
                             $this->redirect ( 'registration/finish' );


                          ///
                          $this->getUser()->getCulture($u->getCulture());
                          //$this->getUser ()->setFlash ( 'message', __('Thanks, please check your email box, we sent you a link to activate your email (%1%). Please click on this link to continue your registration.', array('%1%'=>$u->getEmail())) );
                
                   $this->success =   __('Thanks, please check your email box, we sent you a link to activate your email (%1%). Please click on this link to continue your registration.', array('%1%'=>$u->getEmail()));
                   $this->getUser ()->setFlash ( 'message', $this->success );
                  $this->sendNotify($u);
                  //$this->getUser()->signin($u);
		          //$this->redirect ( 'profile/edit?id='.$u->getId());
                  //$this->redirect ( 'mainpage/index?hf=true');
                  $this->redirect ( 'registration/entercode');

			}

		}

  }

  ///Активация профайла
  public function executeActivate()
  {

  	if($this->getRequestParameter('code'))
  	{
             $user = Doctrine::getTable('sfGuardUser')
              ->createQuery('a')
              ->where('a.salt=?',array($this->getRequestParameter('code')))
              ->fetchOne();
             if($user)
             {
                mailTools::send(sfConfig::get('app_email_admin'), 'Activation user', 'User ['.$user->getId().'] follow for activate link.');
                 $user->setIsActive(true);
                 $user->save();
                 $this->getUser ()->setFlash ( 'message', __('Thank you. Your email was confirmed! Please fill the form.') );
                 $this->getContext()->getUser()->signIn($user);
                 $this->getUser()->setCulture($user->getCulture());
                 $this->redirect ( 'profile/step1');

             }
            //  $this->getContext()->getUser()->signIn($user);


             $this->redirect('@mainpage');

  	}


  }


    public function sendNotify($user)
    {
        $strc = '<h2 style="color: red">'.__('Your verification code is %1%',array('%1%'=>$_SESSION['scode'])).'</h2>';
        $m = NotifyTable::getNotify(1, $user->getCulture());
        $profile = $user->getProfile();
        $aurl = 'http://'.$_SERVER['HTTP_HOST'].'/'.$profile->getsfGuardUser()->getCulture().'/registration/activate/code/'.$profile->getsfGuardUser()->getSalt();
        $alink =  $strc.'<a href="'.$aurl.'" > '.$aurl.'</a>';

        if($m)
        {
            $arr = array(
                '%link%' => $alink,
                '%site%' => 'http://'.$_SERVER['HTTP_HOST'],
                '%login%' => $user->getUsername(),
                '%password%' => $user->getPc(),
                '%link_char%' => $aurl
            );

            $content =$m->parse2($arr,$user->getCulture());

            mailTools::send($user->getEmail(), $m->Translation[$user->getCulture()]->ititle, $content);

        }

        $m = NotifyTable::getNotify(2, $this->getUser()->getCulture());
        if($m)
        {
            if($user->getPartnerId()>0)
            {
                $partner = Doctrine::getTable('sfGuardUser')->find($user->getPartnerId());
            }
            else
            {
                $partner = Doctrine::getTable('sfGuardUser')->find(1);
            }
            $arr = array(
                '%link%' => $alink,
                '%site%' => 'http://'.$_SERVER['HTTP_HOST'],
                '%login%' => $user->getUsername(),
                '%password%' => $user->getPc(),
                '%id%' => $user->getId(),
                '%partner%' => $partner,
                '%link_char%' => $aurl
            );

            $content =$m->parse2($arr,$this->getUser()->getCulture());
            mailTools::send(sfConfig::get('app_email_admin'), $m->Translation[$user->getCulture()]->ititle, $content);
        }


    }


    public function sendNotifyFinish($user)
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




}


