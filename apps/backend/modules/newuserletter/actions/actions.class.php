<?php

require_once dirname(__FILE__).'/../lib/newuserletterGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/newuserletterGeneratorHelper.class.php';

/**
 * newuserletter actions.
 *
 * @package    levandos
 * @subpackage newuserletter
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class newuserletterActions extends autoNewuserletterActions
{

    public function executeList_send(sfWebRequest $request)
    {

        $m = Doctrine::getTable('Newuserletter')->find($request->getParameter('id'));
        $this->forward404Unless($m);
        $m->setIsSend(true);
        $m->save();


        $this->getUser ()->setFlash ( 'notice', __('List of the Messages was created.') );

        $this->redirect($request->getReferer());

    }
    
     public function executeMake(sfWebRequest $request)
    {
        $gender = $request->getParameter('gender'); 
        $rezult = NewuserletterTable::process($gender);
       
        $this->getUser ()->setFlash ( 'notice', __('List of the Messages was created.'.$rezult) );

        $this->redirect($request->getReferer());
        
    }
}
