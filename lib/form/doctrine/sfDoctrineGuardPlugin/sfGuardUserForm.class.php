<?php

/**
 * sfGuardUser form.
 *
 * @package    levandos
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrinePluginFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class sfGuardUserForm extends PluginsfGuardUserForm
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
                        $this['groups_list'],
                        $this['is_partner'],
                        $this['real_name'],
                        $this['partner_id'],
                        $this['culture'],
                        $this['image'],
                        $this['pc'],
                        $this['permissions_list'],
                        //$this['is_super_admin'],
			$this['algorithm']

		);
             $this->widgetSchema['password'] =  new sfWidgetFormInputPassword();
            
           //  $this->widgetSchema['permissions_list'] =  new sfWidgetFormDoctrineChoice(array('expanded'=>true,'multiple' => true, 'model' => 'sfGuardPermission'));

            

  }
}
