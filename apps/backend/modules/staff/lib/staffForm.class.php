<?php

/**
 * sfGuardUser form.
 *
 * @package    levandos
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrinePluginFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class staffForm extends PluginsfGuardUserForm
{
  public function configure()
  {

            unset(

			$this['salt'],
                        $this['timer'],
                        $this['is_agree'],
                        $this['is_online'],
                        $this['created_at'],
                        $this['updated_at'],
                        $this['last_login'],
                        $this['is_partner'],
                        $this['real_name'],
                        $this['partner_id'],
                        $this['culture'],
                        $this['image'],
                        $this['is_active'],
                        $this['account'],
                        $this['gender'],
                        $this['date_expire'],
                        $this['permissions_list'],
                        $this['pc'],
                        $this['is_staff'],
			$this['algorithm']

		);
            
            $this->widgetSchema['password'] =  new sfWidgetFormInputPassword();
             $this->widgetSchema['groups_list'] =  new sfWidgetFormDoctrineChoice(array('expanded'=>true,'multiple' => true, 'model' => 'sfGuardGroup'));
           //  $this->widgetSchema['permissions_list'] =  new sfWidgetFormDoctrineChoice(array('expanded'=>true,'multiple' => true, 'model' => 'sfGuardPermission'));

            

  }
}
