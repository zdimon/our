<?php

/**
 * Site form.
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class lostForm extends sfForm {
	public function configure() {
		
		
		 $this->setWidgets(array(
        
		 'email'   => new sfWidgetFormInput()	
        ));

        $this->validatorSchema['email'] = new sfValidatorEmail(array('required'=>true),array('required'=>__('Поле обязательно для заполнения!')));
       
		$this->widgetSchema->setLabels(array(  
		'email'    => 'E-mail'
		
		));

      $this->widgetSchema->setNameFormat('lost[%s]');
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
