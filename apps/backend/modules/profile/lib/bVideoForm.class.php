<?php

/**
 * Video form.
 *
 * @package    levandos
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class bVideoForm extends BaseVideoForm
{
  public function configure()
  {

                          unset(
                        $this['username'],
			$this['created_at'],
                        $this['updated_at'],
                        $this['description'],
                        $this['is_convert'],
                        $this['title'],
                        $this['size'],
                        $this['partner_id'],          
			$this['pub']
		        );
        
        $this->widgetSchema['format'] = new sfWidgetFormChoice ( array ('choices' => array ('320x240' => '320x240', '480x360'=>'480x360', '640x480' => '640x480', '800x600'=>'800x600') ));
        $this->widgetSchema['file_path'] =  new sfWidgetFormInputFile();
        $this->validatorSchema ['file_path'] = new sfValidatorFile ( array (
        'path' => sfConfig::get ( 'sf_web_dir' ) . '/uploads/video',
        'required' => true,
        'mime_types'=>myUser::getVideoFormats(),
	    'max_size' => 200000000),
        array ('invalid' => 'Invalid file.',
         'required' => 'Select a file to upload.',
         'mime_types' => 'Wrong video format!' )
        );
        $this->widgetSchema['user_id'] =  new sfWidgetFormInputHidden();

  }
}
