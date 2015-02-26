<?php

/**
 * Faq form.
 *
 * @package    levandos
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ftestimonialsForm extends BaseTestimonialsForm
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

      $this->widgetSchema->setLabels(array(
          'body'    => __('Your message'),
          'name'   => __('Your name'),
          'password_rep'   => 'Повторите пароль',
      ));

                $this->widgetSchema['name'] =  new sfWidgetFormInputText(array(),array('style'=>'width: 300px'));
                $custom_decorator = new sfWidgetFormSchemaFormatterDefListT($this->getWidgetSchema());
                $this->getWidgetSchema()->addFormFormatter('deflist', $custom_decorator);
                $this->getWidgetSchema()->setFormFormatterName('deflist');
  }
}


class sfWidgetFormSchemaFormatterDefListT extends sfWidgetFormSchemaFormatter {
    protected
      $rowFormat                 = '<div class="row">%label%%field%%error%%help%%hidden_fields%</div>',
      $helpFormat                = '<span class="help">%help%</span>',
      $errorRowFormat            = '<div class="error">Errors:%errors%</div>',
      $errorListFormatInARow     = '<ul class="error_list">%errors%</ul>',
      $errorRowFormatInARow      = '<li>%error%</li>',
      $namedErrorRowFormatInARow = '<li>%name%: %error%</li>',
      $decoratorFormat           = '<dl id="formContainer">%content%</dl>';
}
