<?php

require_once dirname(__FILE__).'/../lib/notifyGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/notifyGeneratorHelper.class.php';

/**
 * notify actions.
 *
 * @package    levandos
 * @subpackage notify
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class notifyActions extends autoNotifyActions
{

    public function executeShowtpl(sfWebRequest $request)
    {

        //$rec = Doctrine::getTable('Notify')->find($request->getParameter('id'));
        $r = NotifyTable::getNotify($request->getParameter('id'),$request->getParameter('culture'));
        $this->content =  $r->Translation[$request->getParameter('culture')]->icontent;
        echo  $this->content;
        die;
        $this->setLayout(false);
   }

    public function executeSendtpl(sfWebRequest $request)
    {

        $rec = Doctrine::getTable('Notify')->find($request->getParameter('id'));
       // $r = NotifyTable::getNotify($request->getParameter('id'),$request->getParameter('culture'));
      //  $this->content =  $r->Translation[$request->getParameter('culture')]->icontent;

        $user_from = Doctrine::getTable('sfGuardUser')->find(3);
        $user_to = Doctrine::getTable('sfGuardUser')->find(1);

        NotifyTable::sendTemplate($user_to,$user_from,$request->getParameter('id'));


       // $user_from = Doctrine::getTable('sfGuardUser')->find(3);
       // $user_to = Doctrine::getTable('sfGuardUser')->find(139);

      //  NotifyTable::sendTemplate($user_to,$user_from,$request->getParameter('id'));


        $this->redirect('notify/index');
    }


}