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

    public function executeSearchm(sfWebRequest $request)
    {
        if(strlen($request->getParameter('email')))
        {
        $this->user = Doctrine::getTable('sfGuardUser')->createQuery('a')->where('a.email = ?',array($request->getParameter('email')))->execute();
        }
        if(strlen($request->getParameter('id')))
        {
            $id = substr($request->getParameter('id'),1,strlen($request->getParameter('id')));
            $this->user = Doctrine::getTable('sfGuardUser')->createQuery('a')->where('a.id = ?',array($id))->execute();
        }

    }

     public function executePhotoact(sfWebRequest $request)
    {
         $p = PhotoTable::getInstance()->find($request->getParameter('i'));
         if($p->getPub())
         {
             $p->setPub(false);
         } else {
             $p->setPub(true);
         }
         $p->save();
         $this->ph = $p;
     }

  public function executeAddvideo(sfWebRequest $request)
    {
      $user = Doctrine::getTable('sfGuardUser')->find($request->getParameter('id'));
      $v = new Video();
      $v->setUserId($user->getId());

      $this->form = new bVideoForm($v);

            if ($request->isMethod ( 'post' ))
		{

			$this->form->bind ( $request->getParameter ( 'video' ), $request->getFiles ( 'video' ));
			if ($this->form->isValid ()) {
                          $v = $this->form->save();
                          foreach ($request->getFiles($this->form->getName()) as $uploadedFile)
                                  {
                                    $uploadDir = sfConfig::get('sf_upload_dir') . '/video';
                                    $arr = explode('.',$uploadedFile["name"]);
                                    $ext = $arr[count($arr)-1];
                                    $fn = $v->getId().'_'.$uploadedFile["name"];
                                    $filename = $v->getId().'.'.$ext;

                                    move_uploaded_file($uploadedFile["tmp_name"], $uploadDir . "/" . $filename );
                                }
                           if($ext == 'flv')
                           {
                               $v->setIsConvert(true);
                           }
                          $v->setFilePath($filename);
                          $v->setPub(true);
                          $v->save();

                          $this->redirect ( 'profile/show?id='.$v->getUserId() );

			}
		}

     }

     public function executeAddphoto(sfWebRequest $request)
    {
      $user = Doctrine::getTable('sfGuardUser')->find($request->getParameter('id'));
    /// Выбираем общие фото
    $this->photo = $this->getPhoto($user->getProfile());
      $this->form = new bUserForm($user);

            if ($request->isMethod ( 'post' ))
		{

			$this->form->bind ( $request->getParameter ( 'sf_guard_user' ), $request->getFiles ( 'sf_guard_user' ));
			if ($this->form->isValid ()) {

                          $this->form->save();

                          $this->redirect ( 'profile/show?id='.$request->getParameter('id') );

			}
		}

     }

    public function executeShow(sfWebRequest $request)
  {
    if(!$request->getParameter('id')) $this->redirect ('mainpage/index');
    $this->insertArrays();
    $this->p = ProfileTable::getProfileById($request->getParameter('id'));

    /// Проверяем доступ
      if($this->p->getUserId()!=$this->getUser()->getGuardUser()->getId() and !$this->getUser()->hasCredential('admin') and $this->p->getsfGuardUser()->getPartnerId()!=$this->getUser()->getGuardUser()->getId())
      $this->redirect('access/denite');
    ///

    /// Выбираем общие фото
    $this->photo = $this->getPhoto($this->p);

    /// Выбираем приватные фото
    $this->pphoto = $this->getPrivatePhoto($this->p);

  }
 public function executeEdit(sfWebRequest $request)
  {
    /// Выбираем текст

      $p = ProfileTable::getProfileById($request->getParameter('id'));
      $this->forward404Unless($p);
      $this->form = new ProfileForm($p);
      if ($request->isMethod ( 'post' ))
		{

			$this->form->bind ( $request->getParameter ( 'profile' ), $request->getFiles ( 'profile' ));
			if ($this->form->isValid ()) {
                          $pf = $this->form->save();

                           $pars = $request->getParameter('profile');
                           ////Сохраняем мультики

                                $arr = array();
                                $arr = $pars;
                                $str = myTools::db_array_field($pars['relationship']);
                                $pf->setRelationship($str);
                                 $pf->save();
                          $this->saveKeywords($request, $pf);
                          $this->redirect ( 'profile/show?id='.$pf->getUserId() );

			}
		}


  }
  
                  private function saveKeywords($request,$user)
        {
                    
            $arr = $request->getParameter('keywords');
            User2KeywordQuery::create()
           ->filterByUserId($user->getId())
            ->delete();
            foreach ($arr as $k=>$v)
            {
                $u2k = new User2Keyword();
                $u2k->setUserId($user->getId());
                $u2k->setKeywordId($v);
                $u2k->save();
           
            }
       
        }



   protected  function getPhoto($user)
   {
      $p = Doctrine::getTable('Photo')
       ->createQuery('a')
       ->where('a.user_id=? and a.is_private=?',array($user->getUserId(),false))
       ->execute();
      return $p;
   }

    protected  function getPrivatePhoto($user)
   {
      $p = Doctrine::getTable('Photo')
       ->createQuery('a')
      ->where('a.user_id=? and a.is_private=?',array($user->getUserId(),true))
       ->execute();
      return $p;
   }
   
}
