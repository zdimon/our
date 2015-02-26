<?php

/**
 * Site form.
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class frontendContactForm extends sfForm {
	public function configure() {
		
		
		 $this->setWidgets(array(
		 'id'   => new sfWidgetFormInput(array(),array('style'=>'width:300px;')),
		 'content' => new sfWidgetFormTextarea(array(),array('style'=>'width:300px; height:150px'))
           
		
  ));

        $this->validatorSchema['id'] = new sfValidatorNumber(array('required'=>true),array('required'=>__('Поле обязательно для заполнения!')));
        $this->validatorSchema['content'] = new sfValidatorString(array('required'=>true),array('required'=>__('Поле обязательно для заполнения!')));
  
		$this->widgetSchema->setLabels(array(  
		'content'    => __('Message'),
		'id'   => __('Scamers ID'),
		));
  
  
    
                $custom_decorator = new sfWidgetFormSchemaFormatterDefList($this->getWidgetSchema());
                $this->getWidgetSchema()->addFormFormatter('deflist', $custom_decorator);
                $this->getWidgetSchema()->setFormFormatterName('deflist');
	$this->validatorSchema->setOption ( 'allow_extra_fields', true );
      $this->widgetSchema->setNameFormat('contact[%s]');

      
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
