<?php

require_once dirname(__FILE__).'/../lib/settingsGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/settingsGeneratorHelper.class.php';

/**
 * settings actions.
 *
 * @package    levandos
 * @subpackage settings
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class settingsActions extends autoSettingsActions
{

    protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $notice = $form->getObject()->isNew() ? 'The item was created successfully.' : 'The item was updated successfully.';

      $settings = $form->save();

      $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('object' => $settings)));

      $this->getUser()->setFlash('error', 'Данные сохранены');
        $this->redirect('user/index');

    }
    else
    {
      $this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
    }
  }


  protected function buildQuery()
  {
    $query = parent::buildQuery();
   // if(!$this->getUser()->isSuperAdmin())
   // {
        $query->andWhere(
                '(pub = ?)', array(true)
                );
    //}
    return $query;
  }

}
