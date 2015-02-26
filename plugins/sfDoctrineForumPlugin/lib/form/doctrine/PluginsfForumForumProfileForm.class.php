<?php

/**
 * PluginForumProfile form.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfDoctrineFormPluginTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
abstract class PluginsfForumProfileForm extends BasesfForumProfileForm {
    public function setupInheritance() {
        parent::setupInheritance();
        $this->widgetSchema['image'] = new sfWidgetFormInputFile(array(
                        'label' => 'Image'
        ));

        $this->validatorSchema['image'] = new sfValidatorFile(array(
                        'required' => false,
                        'path' => sfConfig::get('sf_upload_dir').'/images',
                        'mime_types' => 'web_images',
                        'max_size' => '256000',
        ));
    }
}
