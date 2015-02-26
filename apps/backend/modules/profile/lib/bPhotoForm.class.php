<?php

/**
 * Photo form.
 *
 * @package    levandos
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class bPhotoForm extends BasePhotoForm
{
  public function configure()
  {

                  unset(

			$this['created_at'],
                        $this['updated_at'],
                        $this['username'],
                        $this['title'],
                        $this['is_main'],
                        $this['size']
		);

     $this->widgetSchema['image'] =  new sfWidgetFormInputFile();
     $this->validatorSchema ['image'] = new sfValidatorFile ( array ('required' => false,
        'path' => sfConfig::get ( 'sf_web_dir' ) . '/uploads/photo/original',
        'mime_types' => 'web_images', 'max_size' => 4000000) ,
        array ('invalid' => 'Неверный формат файла.',
         'required' => 'Выберите изображение.',
          'max_size' => 'Максимальный размер файла изображения 4 мегабайта',
         'mime_types' => 'Изображение должно быть изображением.' )
        );
    $this->widgetSchema['user_id'] =  new sfWidgetFormInputHidden();
    $this->widgetSchema['partner_id'] =  new sfWidgetFormInputHidden();
    $this->widgetSchema['pub'] =  new sfWidgetFormInputHidden();


  }
}
