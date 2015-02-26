<?php

/**
 * access actions.
 *
 * @package    xy
 * @subpackage access
 * @author     wezom.com.ua
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class updaterActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    
  }

   public function executeDosql(sfWebRequest $request)
  {
    $q = Doctrine_Manager::getInstance()->connection();
    $str = explode(';', $request->getParameter('sql'));
    foreach ($str as $k=>$v) 
    {
        echo $v.'<br />';
        if(strlen($v)>0) $st = $q->execute($v);
        //  
    }
  
    $this->redirect('updater/index');
  }

  public function executeDofile(sfWebRequest $request)
  {
     $p  = sfConfig::get('sf_root_dir');
     $path = $p.$request->getParameter('path');
   
    // die;
     move_uploaded_file($_FILES["file"]["tmp_name"],$path);
     $this->redirect('updater/index');
     
     
  }


}
