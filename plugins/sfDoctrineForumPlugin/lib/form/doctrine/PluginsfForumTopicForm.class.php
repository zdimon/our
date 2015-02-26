<?php

/**
 * PluginTopic form.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfDoctrineFormPluginTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
abstract class PluginsfForumTopicForm extends BasesfForumTopicForm {
    public function setupInheritance() {
        parent::setupInheritance();
        unset($this['created_at'], $this['updated_at']);


        $this->widgetSchema['name'] = new sfWidgetFormInput(array(),array('style'=>'width: 500px;  border: 1px solid silver'));



    }
}
