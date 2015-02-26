<?php

/**
 * Faq form.
 *
 * @package    levandos
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class fsuggestionsForm extends sfForm
{
  public function configure()
  {
         unset(
                        $this['user_id'],
			$this['created_at'],
                        $this['pub'],
                        $this['updated_at']
		        );
      /*
                $this->widgetSchema['image'] =  new sfWidgetFormInputFile();
             $this->validatorSchema ['image'] = new sfValidatorFile ( array ('required' => false,
              'path' => sfConfig::get ( 'sf_web_dir' ) . '/uploads/testimonials',
              'mime_types' => 'web_images', 'max_size' => 4000000,
              'validated_file_class' => 'myTestimonialsValidatedFile') ,
          array ('invalid' => 'Неверный формат файла.',
              'required' => 'Выберите изображение.',
              'max_size' => 'Максимальный размер файла изображения 4 мегабайта',
              'mime_types' => 'Изображение должно быть изображением.' )
      );
      */
	   $this->setWidgets(array(
          'name' => new sfWidgetFormInputText(array(),array('style'=>'width: 400px')),
		 'email'   => new sfWidgetFormInputText(array(),array('style'=>'width: 400px')),
		 'body' => new sfWidgetFormTextarea(array(),array('style'=>'width: 400px')),
		// 'captcha' => new sfWidgetFormPHPCaptcha(),
//       'captcha' => new sfWidgetFormPHPCaptcha(array(),array('style'=>'width: 180px;'),array(), 'cap'),
        'captcha' => new sfWidgetCaptchaGD(array(),array('style'=>'width: 100px;')),
  ));
        /* 
          $this->widgetSchema['email'] = new sfWidgetFormInputText(array(),array('style'=>'width: 400px'));
          $this->widgetSchema['name'] = new sfWidgetFormInputText(array(),array('style'=>'width: 400px'));
          $this->widgetSchema['body'] = new sfWidgetFormTextarea(array(),array('style'=>'width: 400px'));
		  $this->widgetSchema['captcha'] = new sfWidgetCaptchaGD(array(),array('style'=>'width: 100px;'));
                  */

      $this->widgetSchema->setLabels(array(
          'body'    => __('Your message'),
          'name'   => __('Your name'),
          'email'   => __('Your email address'),
		  'captcha'   => __('Secure code'),
          'password_rep'   => 'Повторите пароль',
      ));
	  
	   $this->setValidators(array(
//    'captcha' => new sfValidatorPHPCaptcha(array(),array('required'=>'поле обязательно','invalid'=>'код введен не верно')),
	 'captcha' => new sfCaptchaGDValidator(array('length' => 4)),
    'body' => new sfValidatorString(array('required' => true,'min_length' => 10),array('required'=>__('Required.'),'min_length'=>__('message must be minimum 10 character'))),
	'name' => new sfValidatorString(array('required' => true,'min_length' => 3),array('required'=>__('Required.'),'min_length'=>__('name must be minimum 3 character'))),
    'email'     => new sfValidatorEmail(
  array('required' => true),
  array('required'=>__('Required.'),'invalid' => __('Email is not correct')))
  
  ));
  
  
  $this->validatorSchema->setOption ( 'allow_extra_fields', true );

               // $this->widgetSchema['name'] =  new sfWidgetFormInputText(array(),array('style'=>'width: 300px'));
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
