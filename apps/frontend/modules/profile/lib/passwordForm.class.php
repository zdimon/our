<?php

/**
 * sfGuardUser form.
 *
 * @package    levandos
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrinePluginFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class passwordForm extends PluginsfGuardUserForm
{
  public function configure()
  {

      unset(

			            $this['salt'],
                        $this['is_online'],
                        $this['timer'],
                        $this['image'],
                        $this['account'],
			            $this['is_super_admin'],
                        $this['is_active'],
			            $this['permissions_list'],
                        $this['created_at'],
                        $this['updated_at'],
                        $this['last_login'],
                        $this['groups_list'],
                        $this['is_partner'],
                        $this['gender'],
                        $this['culture'],
                        $this['partner_id'],
                        $this['country'],
                        $this['country'],
                        $this['username'],
                        $this['is_agree'],
                        $this['real_name'],
						$this['date_expire'],
                        $this['pc'],
                        $this['email'],
			            $this['algorithm']

		);

               

                
                $this->widgetSchema['password_old'] = new sfWidgetFormInputPassword();
                $this->widgetSchema['password'] = new sfWidgetFormInputPassword();
                $this->widgetSchema['password_rep'] = new sfWidgetFormInputPassword();
              


               
                $this->validatorSchema ['password_old'] = new sfValidatorString(array('min_length' => 5, 'max_length' => 25),array('min_length'=>'минимум 5 символов','required'=>'поле обязательно'));

                $this->validatorSchema ['password'] = new sfValidatorString(array('min_length' => 5, 'max_length' => 25),array('min_length'=>'минимум 5 символов','required'=>'поле обязательно'));

                $this->validatorSchema ['password_rep'] = new sfValidatorString(array('min_length' => 5, 'max_length' => 25),array('min_length'=>'минимум 5 символов','required'=>'поле обязательно'));
                   

		$this->widgetSchema->setLabels(array(
		'password_old'    => 'Old password',
		'password'   => 'New password',
                'password_rep'   => 'Repeat password',
		));

                 $this->validatorSchema->setPostValidator(
                  new sfValidatorSchemaCompare('password', sfValidatorSchemaCompare::EQUAL, 'password_rep',
                  array(),
                  array('invalid' => 'Passwords don`t match!'))
                         );
             

                $custom_decorator = new sfWidgetFormSchemaFormatterDefList($this->getWidgetSchema());
                $this->getWidgetSchema()->addFormFormatter('deflist', $custom_decorator);
                $this->getWidgetSchema()->setFormFormatterName('deflist');
                $this->widgetSchema->moveField('password_old', sfWidgetFormSchema::FIRST);
               

  }
 	

}

class sfWidgetFormSchemaFormatterDefList extends sfWidgetFormSchemaFormatter {
    protected
      $rowFormat                 = '<div class="row">%label%%field%%error%%help%%hidden_fields%</div>',
      $helpFormat                = '<span class="help">%help%</span>',
      $errorRowFormat            = '<div class="error">Errors:%errors%</div>',
      $errorListFormatInARow     = '<ul class="error_list">%errors%</ul>',
      $errorRowFormatInARow      = '<li>%error%</li>',
      $namedErrorRowFormatInARow = '<li>%name%: %error%</li>',
      $decoratorFormat           = '<dl id="formContainer">%content%</dl>';
}
