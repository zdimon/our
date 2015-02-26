<?php

/**
 * sfGuardUser form.
 *
 * @package    levandos
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrinePluginFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class bUserForm extends PluginsfGuardUserForm
{
  public function configure()
  {

            unset(

			$this['salt'],
                        $this['permissions_list'],
                        $this['real_name'],
                        $this['is_active'],
                        $this['is_agree'],
                        $this['is_super_admin'],
                        $this['account'],
                        $this['is_online'],
                        $this['timer'],
                        $this['email'],
                        $this['gender'],
                        $this['username'],
                        $this['created_at'],
                        $this['updated_at'],
                        $this['last_login'],
                        $this['groups_list'],
                        $this['is_partner'],
                        $this['partner_id'],
                        $this['culture'],
                        $this['image'],
                        $this['password'],
                        $this['date_expire'],
                        $this['pc'],
                        $this['is_staff'],
			$this['algorithm']

		);

        $p1 = new Photo();
        $p1->setUserId($this->getObject()->getId());
        $p1->setPub(false);
        $p1->setPartnerId(sfContext::getInstance()->getUser()->getGuardUser()->getId());

        $p2 = new Photo();
        $p2->setUserId($this->getObject()->getId());
        $p2->setPub(false);
        $p2->setPartnerId(sfContext::getInstance()->getUser()->getGuardUser()->getId());

        $p3 = new Photo();
        $p3->setUserId($this->getObject()->getId());
        $p3->setPub(false);
        $p3->setPartnerId(sfContext::getInstance()->getUser()->getGuardUser()->getId());

        $p4 = new Photo();
        $p4->setUserId($this->getObject()->getId());
        $p4->setPub(false);
        $p4->setPartnerId(sfContext::getInstance()->getUser()->getGuardUser()->getId());

        $p5 = new Photo();
        $p5->setUserId($this->getObject()->getId());
        $p5->setPub(false);
        $p5->setPartnerId(sfContext::getInstance()->getUser()->getGuardUser()->getId());
        
        $this->embedForm('photo1', new bPhotoForm($p1));
        $this->embedForm('photo2', new bPhotoForm($p2));
        $this->embedForm('photo3', new bPhotoForm($p3));
        $this->embedForm('photo4', new bPhotoForm($p4));
        $this->embedForm('photo5', new bPhotoForm($p5));

  }
}
