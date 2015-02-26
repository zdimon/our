<?php

/*
 * This file is part of the symfony package.
 * (c) 2004-2006 Fabien Potencier <fabien.potencier@symfony-project.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 *
 * @package    symfony
 * @subpackage plugin
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: BasesfGuardAuthActions.class.php 23800 2009-11-11 23:30:50Z Kris.Wallsmith $
 */
class BasesfGuardAuthActions extends sfActions
{
  public function executeSignin($request)
  {
    $this->form = new qregForm();
      if(sfConfig::get('sf_app')=='frontend')
    //$this->setLayout('splash_layout');
    $user = $this->getUser();
      if($user)
      {
            if ($user->isAuthenticated())
            {
              return $this->redirect('@mainpage');
            }
      }
    $class = sfConfig::get('app_sf_guard_plugin_signin_form', 'sfGuardFormSignin'); 
    $this->formi = new $class();

    if ($request->isMethod('post'))
    {
      $this->formi->bind($request->getParameter('signin'));
      if ($this->formi->isValid())
      {
        ////Очищаем кеш топов
         //  $tag = new FrontendCacheTagTop10('unreg');
         //  $tag->clean();
         //  $tag = new FrontendCacheTagTop10('m');
         //  $tag->clean();
         //  $tag = new FrontendCacheTagTop10('w');
         //  $tag->clean();
       ////






        $values = $this->formi->getValues();
        $this->getUser()->signin($values['user'], array_key_exists('remember', $values) ? $values['remember'] : false);

       


          //// Check membership
          //echo strtotime($user->getDateExpire()).'-'.strtotime(date('Y-m-d'));
         $user = $this->getUser()->getGuardUser();
         $user->setIsOnline(true);
         $user->save();
          $this->getUser()->setCulture($user->getCulture());
          if(strtotime($user->getDateExpire())<strtotime(date('Y-m-d')) and $user->getGender()=='m')
          {

              $pf = $user->getProfile();
              $pf->setPacketId(1);
              $pf->save();

          }

          /////


        // always redirect to a URL set in app.yml
        // or to the referer
        // or to the homepage

        $signinUrl = sfConfig::get('app_sf_guard_plugin_success_signin_url', $request->getReferer());
        //echo '$signinUrl-'.$signinUrl;
        //die;
          if(sfConfig::get('sf_app')=='frontend')
         // return $this->redirect('@page?alias=mainpage');
         return $this->redirect('profile/member');

        return $this->redirect('' != $signinUrl ? $signinUrl : '@mainpage');
      }
    }
    else
    {
      if ($request->isXmlHttpRequest())
      {
        $this->getResponse()->setHeaderOnly(true);
        $this->getResponse()->setStatusCode(401);

        return sfView::NONE;
      }

      // if we have been forwarded, then the referer is the current URL
      // if not, this is the referer of the current request
      $user->setReferer($this->getContext()->getActionStack()->getSize() > 1 ? $request->getUri() : $request->getReferer());

      $module = sfConfig::get('sf_login_module');
      if ($this->getModuleName() != $module)
      {
        return $this->redirect($module.'/'.sfConfig::get('sf_login_action'));
      }

      $this->getResponse()->setStatusCode(401);
    }
  }

  public function executeSignout($request)
  {
      $user = $this->getUser()->getGuardUser();
      $user->setIsOnline(false);
      $user->save();
    $this->getUser()->signOut();
        ////Очищаем кеш топов
           $tag = new FrontendCacheTagTop10('unreg');
           $tag->clean();
           $tag = new FrontendCacheTagTop10('m');
           $tag->clean();
           $tag = new FrontendCacheTagTop10('w');
           $tag->clean();
       ////
    $signoutUrl = sfConfig::get('app_sf_guard_plugin_success_signout_url', $request->getReferer());

    $this->redirect('@mainpage');
  }

  public function executeSecure($request)
  {
    $this->getResponse()->setStatusCode(403);
  }

  public function executePassword($request)
  {
    throw new sfException('This method is not yet implemented.');
  }
}
