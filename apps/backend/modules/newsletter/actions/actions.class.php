<?php

require_once dirname(__FILE__).'/../lib/newsletterGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/newsletterGeneratorHelper.class.php';

/**
 * newsletter actions.
 *
 * @package    levandos
 * @subpackage newsletter
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class newsletterActions extends autoNewsletterActions
{

    public function executeListSend(sfWebRequest $request)
    {

        $p = Doctrine::getTable('Newsletter')->find($request->getParameter('id'));
        $this->forward404Unless($p);

        $p->setIsSent(true);
        $p->save();

        $us = Doctrine::getTable('Profile')
            ->createQuery('a')
            ->where('a.sub_newsletter=?',array(true))
            ->execute();

        foreach($us as $u)
        {
            $m = new Mailer();
            $m->setUserId($u->getUserId());
            $m->setEmail($u->getsfGuardUser()->getEmail());
            $m->setLetterId($p->getId());
            $m->save();
        }

            $this->getUser ()->setFlash ( 'message', __('Newsletters was created.') );

        $this->redirect($request->getReferer());

    }

}
