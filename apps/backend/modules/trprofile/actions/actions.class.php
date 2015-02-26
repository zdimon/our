<?php

require_once dirname(__FILE__).'/../lib/trprofileGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/trprofileGeneratorHelper.class.php';

/**
 * trprofile actions.
 *
 * @package    levandos
 * @subpackage trprofile
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class trprofileActions extends autoTrprofileActions
{
    
      protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $notice = $form->getObject()->isNew() ? 'The item was created successfully.' : 'The item was updated successfully.';

      $profile = $form->save();
       
      $d = 'ID:'. $profile->getUserId();
      ActionsTable::add(8,$d);
      
      $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('object' => $profile)));

      if ($request->hasParameter('_save_and_add'))
      {
        $this->getUser()->setFlash('notice', $notice.' You can add another one below.');

        $this->redirect('@profile_trprofile_new');
      }
      else
      {
        $this->getUser()->setFlash('notice', $notice);

        $this->redirect(array('sf_route' => 'profile_trprofile_edit', 'sf_subject' => $profile));
      }
    }
    else
    {
      $this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
    }
  }
    
}
