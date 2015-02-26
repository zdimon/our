<?php

/**
 * myvideo actions.
 *
 * @package    levandos
 * @subpackage myvideo
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class myvideoActions extends commonActions
{


    public function executeAshow(sfWebRequest $request)
    {
        $this->checkAuthorization();
        $this->setLayout(false);
        $this->video = Doctrine_Core::getTable('Video')->find(array($request->getParameter('id')));
        $this->forward404Unless($this->video);

        if($this->video->getUserId()!=$this->getUser()->getGuardUser()->getId())
        {
             $s = Doctrine::getTable('Service')->find(4);
            $user_to = $this->video->getUser();
            $user_from = $this->getUser()->getGuardUser();

            if(!$this->checkSameGender($user_from, $user_to)) {
                $this->message_error = __('Вы не можете совершать эту операцию!');
            }
            if($this->getUser()->getGuardUser()->getProfile()->getPacketId()!=5 and $this->getUser()->getGuardUser()->getGender()=='m' and $this->getUser()->getGuardUser()->getAccount()<$s->getCost()){
                $this->message_error = __('You don`t have enought money!');
            }

            $_SESSION['show_video_'.$request->getParameter('id')] = 'true';

            if(!isset($this->message_error))
            {
                if($user_from->getGender()=='m')
                {
                    if($this->getUser()->getGuardUser()->getProfile()->getPacketId()!=5)
                    {
                    $this->makePayment($user_from, 4, $user_to, false);
                   
                    $this->message = __('Payment for %1% have been done.',array('%1%'=>$s->getCost().' '.myUser::getAccountStr($s->getCost())));
                    }
                }
            }
        }

    }


      public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new myVideoForm();

    $this->processForm($request, $this->form);
    $this->getVideos();
    $this->setTemplate('index');
  }

  public function executeIndex(sfWebRequest $request)
  {
    $this->checkAuthorization();
    $this->getVideos();
    $v = new Video();
    $v->setUserId($this->getUser()->getGuardUser()->getId());
    $this->form = new myVideoForm($v);

  }

  public function executeShow(sfWebRequest $request)
  {
    $this->checkAuthorization();
    $this->setLayout(false);
    $this->video = Doctrine_Core::getTable('Video')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->video);

     if($this->video->getUserId()!=$this->getUser()->getGuardUser()->getId())
     {

         $user_to = $this->video->getUser();
         $user_from = $this->getUser()->getGuardUser();

         if(!$this->checkSameGender($user_from, $user_to)) {
             $this->message_error = __('Вы не можете совершать эту операцию!');
            }
         if(!$this->checkAccount($user_from, 4) and $this->getUser()->getGuardUser()->getGender()=='m')      {
             $this->message_error = __('You don`t have enought money!');
          }
        if(!isset($this->message_error))
             {
             if($user_from->getGender()=='m')
                 {
                     $this->makePayment($user_from, 4, $user_to, false);
                     $s = Doctrine::getTable('Service')->find(4);
                      $this->message = __('Payment for %1% have been done.',array('%1%'=>$s->getCost().' '.myUser::getAccountStr($s->getCost())));
                 }
             }
     }

  }


 

  public function executeDel(sfWebRequest $request)
  {
      $this->checkAuthorization();
   $v = Doctrine::getTable('Video')->find($request->getParameter('id'));
   $this->forward404Unless($v);
   if($v->getUserId()==$this->getUser()->getGuardUser()->getId())
   {
       /*
       if($this->getUser()->getGuardUser()->getGender()=='m')
	   {
	                 Doctrine_Query::create()
                    ->update('Friend')
                    ->set('request_video','0') 	
					->set('accept_video','0') 	
					->set('read_accept','0') 	 	
                    ->where('user_id=?',array($this->getUser()->getGuardUser()->getId()))
                    ->execute();
	   }
       */
       $v->delete();
       $this->getUser ()->setFlash ( 'message', __('You video has been deleted.') );
   }
   else
   {
       $this->getUser ()->setFlash ( 'error', __('Error') );
   }

    $this->redirect('myvideo/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      /// проверка на максимум
      if(!$this->checkMax())
      {
        $this->getUser ()->setFlash ( 'error', __('Вы больше не можете добавлять видео на сайте.') );
        $this->redirect('myvideo/index');
       }
      $video = $form->save();
      
      foreach ($request->getFiles($form->getName()) as $uploadedFile)
              {
                $uploadDir = sfConfig::get('sf_upload_dir') . '/video';
                $arr = explode('.',$uploadedFile["name"]);
                $ext = $arr[count($arr)-1];
                $fn = $video->getId().'_'.$uploadedFile["name"];
                $filename = $video->getId().'_'.$uploadedFile["name"];
                if($ext == 'flv')
                {
                    $filename = $video->getId().'_'.$uploadedFile["name"].'.flv';
                }
                move_uploaded_file($uploadedFile["tmp_name"], $uploadDir . "/" . $filename );
            }
       if($ext == 'flv')
       {
           $video->setIsConvert(true);
       }
      $video->setFilePath($fn);
      $video->save();
      $this->redirect('myvideo/index');
    }
  }


    protected function checkMax()
  {
      $cnt = Doctrine::getTable('Video')
      ->createQuery('a')
      ->where('a.user_id=?',array($this->getUser()->getGuardUser()->getId()))
      ->count();
      if($this->getUser()->getGuardUser()->getGender()=='m' and $cnt==1)
      {
          return false;
      }
      elseif($cnt>sfConfig::get('app_max_video'))
      {
         return false;
      }
      else
      {
        return true;
      }
  }

    protected function getVideos()
    {
        $this->videos = Doctrine_Core::getTable('Video')
            ->createQuery('a')
            ->where('a.user_id=?',array($this->getUser()->getGuardUser()->getId()))
            ->orderBy('a.created_at DESC')
            ->execute();
    }
  
}
