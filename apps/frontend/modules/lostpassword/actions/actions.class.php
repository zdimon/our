<?php

/**
 * lostpassword actions.
 *
 * @package    levandos
 * @subpackage lostpassword
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class lostpasswordActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
     $this->form = new lostForm();

     if ($request->isMethod ( 'post' ))
		{
			$this->form->bind ( $request->getParameter ( 'lost' ) );
			if ($this->form->isValid ()) {
                            $data = $request->getParameter ( 'lost' );
                            $u = Doctrine::getTable('sfGuardUser')
                            ->createQuery('a')
                            ->where('a.email=?',array($data['email']))
                            ->fetchOne();
                            if($u)
                            {
                              $par = array(
                                  '%login%' => $u->getUsername(),
                                  '%password%' => $u->getPc()
                              );
                              NotifyTable::sendNotify($u, 7, $par);
                              $this->getUser ()->setFlash ( 'message', __('Ваш логин и пароль был выслан на указанный email.') );
                            }
                            else
                            {
                              $this->getUser ()->setFlash ( 'error', __('Указанный email не найден в нашей базе.') );
                            }
				//mailTools::send ( 'zdimon77@gmail.com','Письмо из контактной формы (urokov.net.ua) от ' . $data['email'], 'От '.$data['name'].'<br />'.nl2br ( $data['content'] ),$data['email'] );
				
		               $this->redirect ( 'lostpassword/index' );

			}

		}

  }
}
