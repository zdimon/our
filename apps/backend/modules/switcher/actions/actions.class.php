<?php

/**
 * switcher actions.
 *
 * @package    levandos
 * @subpackage switcher
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class switcherActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    
  }


  public function executeGo(sfWebRequest $request)
  {

      $this->getUser ()->setFlash ( 'message', __('Изменил') );




     
        $filename = sfConfig::get('sf_plugins_dir').'/sfAdminThemejRollerPlugin/config/s.dat';
        $fd = fopen ($filename, "r");
        $contents = fread ($fd, filesize ($filename));
        fclose ($fd);


//      echo $contents;

        $s = sfConfig::get('sf_plugins_dir').'/sfAdminThemejRollerPlugin/config/app.yml';
        $f = fopen ($s, "r");
        $c = fread ($f, filesize ($s));
        $str = str_replace($contents, $request->getParameter('name'), $c);


        fclose($f);
        $w = sfConfig::get('sf_plugins_dir').'/sfAdminThemejRollerPlugin/config/app.yml';
        $f = fopen ($w, "w");
        fwrite($f, $str);
        fclose($f);

//       echo $str;
//
//
//       die;

      
      $cur = sfConfig::get('sf_plugins_dir').'/sfAdminThemejRollerPlugin/config/s.dat';
      $fp = fopen ($cur, "wb");
      $string = $request->getParameter('name');
      fwrite($fp, $string);
      fclose($fp);


      //$cachedor = sfConfig::get('sf_cache_dir');
      sfToolkit::clearDirectory(sfConfig::get('sf_cache_dir'));

      $this->redirect('user/index');
  }

}
