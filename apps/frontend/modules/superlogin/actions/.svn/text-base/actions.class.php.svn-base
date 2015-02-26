<?php

/**
 * Activate actions.
 *
 * @package    webmonstr
 * @subpackage Activate
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class superloginActions extends sfActions
{
  /**
   * Executes index action
   *
   */
  public function executeIndex()
  {
    
  	if($this->getRequestParameter('user'))
  	{
          
  		
          $user= Doctrine::getTable('sfGuardUser')->find($this->getRequestParameter('user'));
        
  	if($this->getUser()->hasCredential('admin') and $user)
        {
          $this->getContext()->getUser()->signIn($user);
          $this->getUser()->addCredential('admin');
        }
       
        $this->redirect('@homepage');
  		
  	}
  	
  	
  }
}

