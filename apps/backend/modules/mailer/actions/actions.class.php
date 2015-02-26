<?php

require_once dirname(__FILE__).'/../lib/mailerGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/mailerGeneratorHelper.class.php';

/**
 * mailer actions.
 *
 * @package    levandos
 * @subpackage mailer
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class mailerActions extends autoMailerActions
{

    public function executeList_send(sfWebRequest $request)
    {

        $m = Doctrine::getTable('Mailer')->find($request->getParameter('id'));
        $this->forward404Unless($m);
        $m->setIsSent(true);
        $m->save();


         $this->getUser ()->setFlash ( 'message', __('Message was sended.') );

        $this->redirect($request->getReferer());

    }

    public function executeDel(sfWebRequest $request)
    {

        $count = Doctrine_Query::create()
            ->delete()
            ->from('Mailer')
            ->execute();

        $this->getUser()->setFlash('notice', __('%1% messages was deleted.',array('%1%'=>$count)));
        $this->redirect($request->getReferer());

    }



}
