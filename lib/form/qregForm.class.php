<?php

/**
 * sfGuardUser form.
 *
 * @package    levandos
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrinePluginFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class qregForm extends PluginsfGuardUserForm
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
                        $this['pc'],
                        $this['real_name'],
			            $this['algorithm']

		);




               // $this->widgetSchema['birthday'] = new sfWidgetFormDateJQueryUI();
                $this->widgetSchema['birthday'] = new sfWidgetFormI18nDate(array('culture' =>sfContext::getInstance()->getUser()->getCulture(),'years' => myUser::getYears()));
                $this->widgetSchema['password'] = new sfWidgetFormInputPassword(array(),array('style'=>'width: 240px'));
                $this->widgetSchema['email'] = new sfWidgetFormInput(array(),array('style'=>'width: 240px'));
                $this->widgetSchema['username'] = new sfWidgetFormInput(array(),array('style'=>'width: 240px'));
                $this->widgetSchema['culture'] = new sfWidgetFormInputHidden(array(),array('value'=>sfContext::getInstance()->getUser()->getCulture()));
                $this->widgetSchema['partner_id'] =  new sfWidgetFormInputHidden();
                $this->widgetSchema['country'] =  new sfWidgetFormI18nChoiceCountry(array('culture' =>sfContext::getInstance()->getUser()->getCulture()),array('style'=>'width: 250px'));

                $this->widgetSchema['culture'] =  new sfWidgetFormChoice(array('expanded'=>false,'choices' => array('en'=>__('English'),'ru'=>__('Russian'),'fr'=>__('French'))));


      $this->widgetSchema['captcha'] = new sfWidgetCaptchaGD();
      $this->validatorSchema['captcha'] = new sfCaptchaGDValidator(array('length' => 4), array('required'=>__('Required field.')));


                $this->widgetSchema['gender'] = new sfWidgetFormChoice(array('expanded'=>false,'choices' => array(''=>'','m'=>__('Man'), 'w'=>__('Woman'))));

                $this->widgetSchema->setHelps(array(
  		        'username'   => __('Логин должен быть уникальным и быть от 2 до 20 знаков.'),
                'password'   => __('От 5 до 25 знаков.'),
                'password2'   => __('Повторите пароль.'),
                'real_name'   => __('Будет показываться другим пользователям.'),
                'email'   => __('Должен быть действительным.'),
  	         ));



      $this->widgetSchema['first_name'] = new sfWidgetFormInputText();
      $this->widgetSchema['last_name'] = new sfWidgetFormInputText();
      //$this->widgetSchema['real_name'] = new sfWidgetFormInputText();
      $this->widgetSchema['city'] = new sfWidgetFormInputText();
      $this->widgetSchema['height'] = new sfWidgetFormChoice(array('expanded'=>false,'choices' => myUser::getHeight()));
      $this->widgetSchema['body_type'] = new sfWidgetFormChoice(array('expanded'=>false,'choices' => myUser::getVes()));
      $this->widgetSchema['smoker'] = new sfWidgetFormChoice(array('expanded'=>false,'choices' => myUser::getSmoker()));
      $this->widgetSchema['drinker'] = new sfWidgetFormChoice(array('expanded'=>false,'choices' => myUser::getDrinker()));
      $this->widgetSchema['eye_color'] = new sfWidgetFormChoice(array('expanded'=>false,'choices' => myUser::getEyeColor()));
      $this->widgetSchema['hair_lenght'] = new sfWidgetFormChoice(array('expanded'=>false,'choices' => myUser::getHairLenght()));
      $this->widgetSchema['hair_color'] = new sfWidgetFormChoice(array('expanded'=>false,'choices' => myUser::getHairColor()));

      $this->widgetSchema['hobbies'] = new sfWidgetFormTextarea();
      $this->widgetSchema['about_me'] = new sfWidgetFormTextarea();
      $this->widgetSchema['about_partner'] = new sfWidgetFormTextarea();

      $this->widgetSchema['relationship'] = new sfWidgetFormChoice(array('multiple'=>true,'expanded'=>true,'choices' => myUser::getRelationship()));

      $this->validatorSchema ['city'] = new sfValidatorString(array('required' => true),array('required'=>__('Required field.')));
      $this->validatorSchema ['country'] = new sfValidatorString(array('required' => true),array('required'=>__('Required field.')));
      $this->validatorSchema ['first_name'] = new sfValidatorString(array('required' => true),array('required'=>__('Required field.')));
      $this->validatorSchema ['last_name'] = new sfValidatorString(array('required' => true),array('required'=>__('Required field.')));
      //$this->validatorSchema ['real_name'] = new sfValidatorString(array('required' => true),array('required'=>__('Required field.')));
      $this->validatorSchema ['height'] = new sfValidatorString(array('required' => true),array('required'=>__('Required field.')));
      $this->validatorSchema ['body_type'] = new sfValidatorString(array('required' => true),array('required'=>__('Required field.')));
      $this->validatorSchema ['smoker'] = new sfValidatorString(array('required' => true),array('required'=>__('Required field.')));
      $this->validatorSchema ['eye_color'] = new sfValidatorString(array('required' => true),array('required'=>__('Required field.')));
      $this->validatorSchema ['hair_lenght'] = new sfValidatorString(array('required' => true),array('required'=>__('Required field.')));
      $this->validatorSchema ['hair_color'] = new sfValidatorString(array('required' => true),array('required'=>__('Required field.')));
      $this->validatorSchema ['drinker'] = new sfValidatorString(array('required' => true),array('required'=>__('Required field.')));
      $this->validatorSchema ['hobbies'] = new sfValidatorString(array('required' => true),array('required'=>__('Required field.')));
      $this->validatorSchema ['about_me'] = new sfValidatorString(array('required' => true),array('required'=>__('Required field.')));
      $this->validatorSchema ['about_partner'] = new sfValidatorString(array('required' => true),array('required'=>__('Required field.')));
      $this->validatorSchema ['body_type'] = new sfValidatorString(array('required' => true),array('required'=>__('Required field.')));

      $this->widgetSchema['image'] =  new sfWidgetFormInputFile();
      $this->widgetSchema['image1'] =  new sfWidgetFormInputFile();
      $this->widgetSchema['image2'] =  new sfWidgetFormInputFile();
      $this->widgetSchema['image3'] =  new sfWidgetFormInputFile();
      $this->widgetSchema['image4'] =  new sfWidgetFormInputFile();
      $this->widgetSchema['image5'] =  new sfWidgetFormInputFile();
      $this->widgetSchema['image6'] =  new sfWidgetFormInputFile();
      $this->widgetSchema['image7'] =  new sfWidgetFormInputFile();
      $this->widgetSchema['image8'] =  new sfWidgetFormInputFile();
      $this->widgetSchema['image9'] =  new sfWidgetFormInputFile();

     $this->validatorSchema ['image'] = new sfValidatorFile ( array ('required' => true,
        'path' => sfConfig::get ( 'sf_web_dir' ) . '/uploads/photo/original',
        'mime_types' => 'web_images', 'max_size' => 4000000) ,
        array ('invalid' => 'Неверный формат файла.',
         'required' => 'Выберите изображение.',
          'max_size' => 'Максимальный размер файла изображения 4 мегабайта',
         'mime_types' => 'Изображение должно быть изображением.' )
        );




     $this->validatorSchema ['image1'] = new sfValidatorFile ( array ('required' => false,
        'path' => sfConfig::get ( 'sf_web_dir' ) . '/uploads/photo/original',
        'mime_types' => 'web_images', 'max_size' => 4000000) ,
        array ('invalid' => 'Неверный формат файла.',
         'required' => 'Выберите изображение.',
          'max_size' => 'Максимальный размер файла изображения 4 мегабайта',
         'mime_types' => 'Изображение должно быть изображением.' )
        );


     $this->validatorSchema ['image2'] = new sfValidatorFile ( array ('required' => false,
        'path' => sfConfig::get ( 'sf_web_dir' ) . '/uploads/photo/original',
        'mime_types' => 'web_images', 'max_size' => 4000000) ,
        array ('invalid' => 'Неверный формат файла.',
         'required' => 'Выберите изображение.',
          'max_size' => 'Максимальный размер файла изображения 4 мегабайта',
         'mime_types' => 'Изображение должно быть изображением.' )
        );

     $this->validatorSchema ['image3'] = new sfValidatorFile ( array ('required' => false,
        'path' => sfConfig::get ( 'sf_web_dir' ) . '/uploads/photo/original',
        'mime_types' => 'web_images', 'max_size' => 4000000) ,
        array ('invalid' => 'Неверный формат файла.',
         'required' => 'Выберите изображение.',
          'max_size' => 'Максимальный размер файла изображения 4 мегабайта',
         'mime_types' => 'Изображение должно быть изображением.' )
        );

     $this->validatorSchema ['image4'] = new sfValidatorFile ( array ('required' => false,
        'path' => sfConfig::get ( 'sf_web_dir' ) . '/uploads/photo/original',
        'mime_types' => 'web_images', 'max_size' => 4000000) ,
        array ('invalid' => 'Неверный формат файла.',
         'required' => 'Выберите изображение.',
          'max_size' => 'Максимальный размер файла изображения 4 мегабайта',
         'mime_types' => 'Изображение должно быть изображением.' )
        );

     $this->validatorSchema ['image5'] = new sfValidatorFile ( array ('required' => false,
        'path' => sfConfig::get ( 'sf_web_dir' ) . '/uploads/photo/original',
        'mime_types' => 'web_images', 'max_size' => 4000000) ,
        array ('invalid' => 'Неверный формат файла.',
         'required' => 'Выберите изображение.',
          'max_size' => 'Максимальный размер файла изображения 4 мегабайта',
         'mime_types' => 'Изображение должно быть изображением.' )
        );


     $this->validatorSchema ['image6'] = new sfValidatorFile ( array ('required' => false,
        'path' => sfConfig::get ( 'sf_web_dir' ) . '/uploads/photo/original',
        'mime_types' => 'web_images', 'max_size' => 4000000) ,
        array ('invalid' => 'Неверный формат файла.',
         'required' => 'Выберите изображение.',
          'max_size' => 'Максимальный размер файла изображения 4 мегабайта',
         'mime_types' => 'Изображение должно быть изображением.' )
        );

     $this->validatorSchema ['image7'] = new sfValidatorFile ( array ('required' => false,
        'path' => sfConfig::get ( 'sf_web_dir' ) . '/uploads/photo/original',
        'mime_types' => 'web_images', 'max_size' => 4000000) ,
        array ('invalid' => 'Неверный формат файла.',
         'required' => 'Выберите изображение.',
          'max_size' => 'Максимальный размер файла изображения 4 мегабайта',
         'mime_types' => 'Изображение должно быть изображением.' )
        );

     $this->validatorSchema ['image8'] = new sfValidatorFile ( array ('required' => false,
        'path' => sfConfig::get ( 'sf_web_dir' ) . '/uploads/photo/original',
        'mime_types' => 'web_images', 'max_size' => 4000000) ,
        array ('invalid' => 'Неверный формат файла.',
         'required' => 'Выберите изображение.',
          'max_size' => 'Максимальный размер файла изображения 4 мегабайта',
         'mime_types' => 'Изображение должно быть изображением.' )
        );


     $this->validatorSchema ['image9'] = new sfValidatorFile ( array ('required' => false,
        'path' => sfConfig::get ( 'sf_web_dir' ) . '/uploads/photo/original',
        'mime_types' => 'web_images', 'max_size' => 4000000) ,
        array ('invalid' => 'Неверный формат файла.',
         'required' => 'Выберите изображение.',
          'max_size' => 'Максимальный размер файла изображения 4 мегабайта',
         'mime_types' => 'Изображение должно быть изображением.' )
        );



      $this->widgetSchema->setLabels(array(
          'username'   => __('Login'),
          'password'   => __('Password'),
          'country'   => __('Country'),
          'email'   => __('Email'),
          'birthday'   => __('Birthday'),
          'gender'   => __('Gender'),
          'culture'   => __('Language'),
          'captcha'   => __('Code'),
          'body_type' => __('Weight'),
      ));


                $this->validatorSchema ['username'] =  new sfValidatorAnd(array(
                new sfValidatorString(array('min_length' => 2, 'max_length' => 20),array('min_length'=>'минимум 2 символа','max_length'=>'максимум 20 символов','required'=>'поле обязательно')),
                new sfValidatorRegex(array('pattern' => '/^[a-zA-Z]([a-zA-Z0-9._-]+)$/'), array('invalid' => 'логин "%value%" введен неверно','required'=>'поле обязательно')),

              ));
                
                
                                    // post validator
                $this->validatorSchema->setPostValidator(
                       new sfValidatorAnd(array(
                                    new sfValidatorDoctrineUnique(array('model'  => 'sfGuardUser', 'column' => 'email'),    array(
        'invalid'       => __('This email already exist, please, fill anotherone'),
    ) ),
                           new sfValidatorDoctrineUnique(array('model'  => 'sfGuardUser', 'column' => 'username'),    array(
        'invalid'       => __('This username already exist, please, fill anotherone'),
    ) )

                            ))
                );
                


              // $this->validatorSchema ['password'] = new sfValidatorString(array('min_length' => 5, 'max_length' => 25),array('min_length'=>'минимум 5 символов','required'=>'поле обязательно'));

                    // post validator
               // $this->validatorSchema->setPostValidator(
              //    new sfValidatorDoctrineUnique(array('model'  => 'sfGuardUser', 'column' => 'username'))
              //  );

                //if($this->getObject()->getGender()=='m')
                $this->validatorSchema['is_agree'] = new sfValidatorString(array('required' => true),array('required'=>__('Egreement required.')));
                //$this->validatorSchema['gender'] = new sfValidatorChoice(array('choices' => array('m','w')));
                $this->validatorSchema['birthday'] = new sfValidatorDate(array('required' => true),array('required'=>__('Required field.')));
                // $this->validatorSchema['gender'] = new sfValidatorDate(array('required' => true),array('required'=>__('Required field.')));
                 
                $this->validatorSchema ['gender'] = new sfValidatorString(array('required' => true),array('required'=>__('Required field.')));

                $this->widgetSchema->moveField('email', 'after', 'country');

                $this->validatorSchema->setOption('allow_extra_fields', true);

                $custom_decorator = new sfWidgetFormSchemaFormatterqregListReg($this->getWidgetSchema());
                $this->getWidgetSchema()->addFormFormatter('deflist', $custom_decorator);
                $this->getWidgetSchema()->setFormFormatterName('deflist');
               

  }
 	

}

class sfWidgetFormSchemaFormatterqregListReg extends sfWidgetFormSchemaFormatter {
    protected
      $rowFormat                 = '<div class="row">%label%%field%%error%%help%%hidden_fields%</div>',
      $helpFormat                = '<span class="help">%help%</span>',
      $errorRowFormat            = '<div class="error">Errors:%errors%</div>',
      $errorListFormatInARow     = '<ul class="error_list">%errors%</ul>',
      $errorRowFormatInARow      = '<li>%error%</li>',
      $namedErrorRowFormatInARow = '<li>%name%: %error%</li>',
      $decoratorFormat           = '<dl id="formContainer">%content%</dl>';
}
