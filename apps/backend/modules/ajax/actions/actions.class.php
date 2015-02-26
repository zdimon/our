<?php

/**
 * access actions.
 *
 * @package    xy
 * @subpackage access
 * @author     wezom.com.ua
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ajaxActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
    public function executeCheck(sfWebRequest $request)
    {
        $this->p = Doctrine::getTable('Profile')->find($request->getParameter('id'));
        $this->letter = Doctrine::getTable('Newuserletter')->find($request->getParameter('letter'));


        if($this->p->getSendAsNew())
        {
            $this->p->setSendAsNew(false);
            $this->t = __('Check');
            $this->letter->unsetUarray($request->getParameter('id'));
        }
        else
        {
            $this->p->setSendAsNew(true);
            $this->t = __('Uncheck');
            $this->letter->setUarray($request->getParameter('id'));
        }
        $this->p->save();

    }


    public function executeSendnew(sfWebRequest $request)
    {

        $this->letter = Doctrine::getTable('Newuserletter')->find($request->getParameter('id'));
        $this->letter->setIsSend('true');
        $this->letter->save();

    }


    public function executeGetroommessages(sfWebRequest $request)
    {
        $room = Doctrine::getTable('Chat2Room')->find($request->getParameter('id'));
        $this->mes = $room->getAllMessages();

    }





}
