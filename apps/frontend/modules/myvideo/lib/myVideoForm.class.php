<?php

/**
 * Video form.
 *
 * @package    levandos
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class myVideoForm extends BaseVideoForm
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
                          $this['format'],
                        $this['partner_id'],          
			$this['pub']
		        );
        /// video/3gpp

        $this->widgetSchema['file_path'] =  new sfWidgetFormInputFile();
        $this->validatorSchema ['file_path'] = new sfValidatorFile ( array (
        'mime_types'=>myUser::getVideoFormats(),
        'path' => sfConfig::get ( 'sf_web_dir' ) . '/uploads/video',
        'required' => true,
	    'max_size' => 200000000),
        array ('invalid' => 'Invalid file.',
         'required' => 'Select a file to upload.',
         'mime_types' => 'Wrong video format!' )
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

