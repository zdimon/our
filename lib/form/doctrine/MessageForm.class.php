<?php

/**
 * Message form.
 *
 * @package    levandos
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class MessageForm extends BaseMessageForm
{
  public function configure()
  {


      $this->widgetSchema['content'] = new sfWidgetFormCKEditor (array('jsoptions'=>array('filebrowserBrowseUrl'=>"'/ckfinder/ckfinder.html'",
  	                                                                             'filebrowserUploadUrl' => "'/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images'",
                                                                                     'toolbar ' => sfConfig::get('app_tool_bar_notify'))) );

  }
}
