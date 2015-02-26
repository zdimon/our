<?php

/**
 * Faq form.
 *
 * @package    levandos
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class fcontactForm extends BaseContactForm
{
  public function configure()
  {
         unset(
                        $this['user_id'],
			            $this['created_at'],
                        $this['pub'],
                        $this['image'],
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
	 
	 $this->widgetSchema['body'] = new sfWidgetFormTextarea(array(),array('style'=>'width: 400px'));
	 $this->validatorSchema['body'] = new sfValidatorString(array('required' => true,'min_length' => 10),array('required'=>__('Required.'),'min_length'=>__('message must be minimum 10 character')));
	 $this->widgetSchema['name'] = new sfWidgetFormInputText(array(),array('style'=>'width: 400px'));
	$this->validatorSchema['name'] = new sfValidatorString(array('required' => true,'min_length' => 3),array('required'=>__('Required.'),'min_length'=>__('name must be minimum 3 character')));
$this->widgetSchema['email'] = new sfWidgetFormInput();
 $this->validatorSchema['email'] = new sfValidatorEmail(array('required'=>true),array('required'=>__('Поле обязательно для заполнения!')));
 
 $this->widgetSchema['captcha'] = new sfWidgetCaptchaGD(array(),array('style'=>'width: 100px;'));
//$this->widgetSchema['captcha'] = new sfWidgetFormPHPCaptcha(array(),array('style'=>'width: 180px;'),array(), 'cap');
 //$this->validatorSchema['captcha'] = new sfValidatorPHPCaptcha(array(),array('required'=>'поле обязательно','invalid'=>'код введен не верно'));
$this->validatorSchema['captcha'] = new sfCaptchaGDValidator(array('length' => 4), array('required'=>__('Required field.')));




      $this->widgetSchema->setLabels(array(
          'body'    => __('Your message'),
          'name'   => __('Your name'),
          'password_rep'   => 'Повторите пароль',
		  'captcha'	=>	'secure code',
      ));

                $this->widgetSchema['name'] =  new sfWidgetFormInputText(array(),array('style'=>'width: 300px'));
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
