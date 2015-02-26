<?php

/**
 * Photo form.
 *
 * @package    levandos
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class myPhotoForm extends BasePhotoForm
{
  public function configure()
  {

                    unset(
                        $this['username'],
			$this['created_at'],
                        $this['updated_at'],
                        $this['is_main'],
                        $this['title'],
                        $this['size'],
                        $this['partner_id'],   
			$this['pub']
		        );

    
         unset(
                $this['is_private']
	      );
    

     $this->widgetSchema['image'] =  new sfWidgetFormInputFile();
     $this->validatorSchema ['image'] = new sfValidatorFile ( array ('required' => true,
        'path' => sfConfig::get ( 'sf_web_dir' ) . '/uploads/photo/original',
        'mime_types' => 'web_images', 'max_size' => 4000000) ,
        array ('invalid' => 'Неверный формат файла.',
         'required' => 'Выберите изображение.',
          'max_size' => 'Максимальный размер файла изображения 4 мегабайта',
         'mime_types' => 'Изображение должно быть изображением.' )
        );
    $this->widgetSchema['user_id'] =  new sfWidgetFormInputHidden();

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