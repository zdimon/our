<?php

/**
 * Faq form.
 *
 * @package    levandos
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class suggestionsForm extends sfForm
{
  public function configure()
  {
	    unset(
                        $this['user_id'],
			$this['created_at'],
                        $this['pub'],
                        $this['updated_at']
		        );
        
		 $this->setWidgets(array(
                 'name' => new sfWidgetFormInputText(array(),array('style'=>'width: 300px')),
		 'email'   => new sfWidgetFormInput(array(),array('style'=>'width: 300px')),
		 'content' => new sfWidgetFormTextarea(array(),array('style'=>'width:300px; height:150px')),
//         'captcha' => new sfWidgetFormPHPCaptcha(array(),array('style'=>'width: 180px;'),array(), 'cap'),
         'captcha' => new sfWidgetCaptchaGD(array(),array('style'=>'width: 100px;')),
  ));

		$this->widgetSchema->setLabels(array(  
		'content'    => __('Content'),  
		'captcha'   => __('Secure code'),  
		));
  

  $this->setValidators(array(
//    'captcha' => new sfValidatorPHPCaptcha(array(),array('required'=>'поле обязательно','invalid'=>'код введен не верно')),
	  'captcha' => new sfCaptchaGDValidator(array('length' => 4)),
    'content' => new sfValidatorString(array('required' => true,'min_length' => 10),array('required'=>__('Required.'),'min_length'=>__('message must be minimum 10 character'))),
    'email'     => new sfValidatorEmail(
  array('required' => true),
  array('required'=>__('Required.'),'invalid' => __('Email is not correct')))
  
  ));
		
		$this->validatorSchema->setOption ( 'allow_extra_fields', true );
     

               $this->widgetSchema->setNameFormat('contact[%s]');
                $custom_decorator = new sfWidgetFormSchemaFormatterDefList($this->getWidgetSchema());
                $this->getWidgetSchema()->addFormFormatter('deflist', $custom_decorator);
                $this->getWidgetSchema()->setFormFormatterName('deflist');
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
