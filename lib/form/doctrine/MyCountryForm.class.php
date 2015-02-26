<?php

/**
 * MyCountry form.
 *
 * @package    levandos
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class MyCountryForm extends BaseMyCountryForm
{

 public function configure()
  {
      
        $this->widgetSchema['image1'] =  new sfWidgetFormInputFile();
        $this->validatorSchema ['image1'] = new sfValidatorFile ( array ('required' => false,
        'path' => sfConfig::get ( 'sf_web_dir' ) . '/uploads',
        'mime_types' => 'web_images', 'max_size' => 4000000,
            ) ,
        array ('invalid' => __('File is not an image.'),
         'required' => __('Select image.'),
          'max_size' => __('Max photo size is 4 mb'),
         'mime_types' => __('File is not an image.') )
        );
        
    
        $this->widgetSchema['image2'] =  new sfWidgetFormInputFile();
        $this->validatorSchema ['image2'] = new sfValidatorFile ( array ('required' => false,
        'path' => sfConfig::get ( 'sf_web_dir' ) . '/uploads',
        'mime_types' => 'web_images', 'max_size' => 4000000,
            ) ,
        array ('invalid' => __('File is not an image.'),
         'required' => __('Select image.'),
          'max_size' => __('Max photo size is 4 mb'),
         'mime_types' => __('File is not an image.') )
        );
        
        
        $this->widgetSchema['image3'] =  new sfWidgetFormInputFile();
        $this->validatorSchema ['image3'] = new sfValidatorFile ( array ('required' => false,
        'path' => sfConfig::get ( 'sf_web_dir' ) . '/uploads',
        'mime_types' => 'web_images', 'max_size' => 4000000,
            ) ,
        array ('invalid' => __('File is not an image.'),
         'required' => __('Select image.'),
          'max_size' => __('Max photo size is 4 mb'),
         'mime_types' => __('File is not an image.') )
        );        
        
        
        $this->widgetSchema['image4'] =  new sfWidgetFormInputFile();
        $this->validatorSchema ['image4'] = new sfValidatorFile ( array ('required' => false,
        'path' => sfConfig::get ( 'sf_web_dir' ) . '/uploads',
        'mime_types' => 'web_images', 'max_size' => 4000000,
            ) ,
        array ('invalid' => __('File is not an image.'),
         'required' => __('Select image.'),
          'max_size' => __('Max photo size is 4 mb'),
         'mime_types' => __('File is not an image.') )
        );        
        
        
        $this->widgetSchema['image5'] =  new sfWidgetFormInputFile();
        $this->validatorSchema ['image5'] = new sfValidatorFile ( array ('required' => false,
        'path' => sfConfig::get ( 'sf_web_dir' ) . '/uploads',
        'mime_types' => 'web_images', 'max_size' => 4000000,
            ) ,
        array ('invalid' => __('File is not an image.'),
         'required' => __('Select image.'),
          'max_size' => __('Max photo size is 4 mb'),
         'mime_types' => __('File is not an image.') )
        );        
        

      
            $custom_decorator = new sfWidgetFormSchemaFormatterDefList($this->getWidgetSchema());
      $this->getWidgetSchema()->addFormFormatter('deflist', $custom_decorator);
      $this->getWidgetSchema()->setFormFormatterName('deflist');
      
      
 if(sfContext::hasInstance())
      {
          if(sfContext::getInstance()->getConfiguration()->getApplication()=='frontend')
          {
              $this->embedI18n(array(sfContext::getInstance()->getUser()->getCulture()));
          }
            else {
                $this->embedI18n(myUser::getCultures());
            }
      }
      
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