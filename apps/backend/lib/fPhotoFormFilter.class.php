<?php

/**
 * Photo filter form.
 *
 * @package    levandos
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class fPhotoFormFilter extends BasePhotoFormFilter
{
  public function configure()
  {
  
   unset(

			$this['username'],
            $this['title'],
            $this['image'],
			
            $this['is_main'],
			$this['is_private'],
            $this['size'],
			$this['created_at'],
			$this['updated_at'],
            $this['partner_id']

		);
	 $custom_decorator = new sfWidgetFormSchemaFormatterDefList($this->getWidgetSchema());
     $this->getWidgetSchema()->addFormFormatter('deflist', $custom_decorator);
     $this->getWidgetSchema()->setFormFormatterName('deflist');	
	 $this->widgetSchema->setNameFormat('photo_filters[%s]');
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