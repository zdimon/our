<?php

/**
 * Notify form.
 *
 * @package    levandos
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class NotifyForm extends BaseNotifyForm
{
  public function configure()
  {
      unset(
      $this['file']
      );

/*
      $this->widgetSchema['file'] =  new sfWidgetFormInputFile();
      $this->validatorSchema ['file'] = new sfValidatorFile ( array ('required' => false,
              'path' => sfConfig::get ( 'sf_web_dir' ) . '/uploads/letter',
               'max_size' => 4000000,
             ) ,
          array ('invalid' => 'Неверный формат файла.',
              'required' => 'Выберите изображение.',
              'max_size' => 'Максимальный размер файла изображения 4 мегабайта',
              'mime_types' => 'Изображение должно быть изображением.' )
      );
      */

      $this->embedI18n(myUser::getCultures());
      
  }
}
