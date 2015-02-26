<?php
class sfWidgetCaptchaGD extends sfWidgetForm
{
  protected function configure($options = array(), $attributes = array())
  {
  }
  
  public function render($name, $value = null, $attributes = array(), $errors = array())
  {
    $context = sfContext::getInstance();
    $url = $context->getRouting()->generate("sf_captchagd");
    $value = $context->getRequest()->getPostParameter('captcha');
    $attributes = array_merge($attributes, array('class' => 'captcha'));
    return '<div style="display: inline-block;">'.
	"<a href='' style='vertical-align: middle' onClick='return false' title='Reload image'><img style='vertical-align: middle; padding-right: 10px' src='$url?".time()."' onClick='this.src=\"$url?r=\" + Math.random() + \"&reload=1\"' border='0' class='captcha' /></a>".
	$this->renderTag('input', array_merge(array('type' => 'text', 'name' => $name, 'size'=>'6', 'style'=>'vertical-align: middle; width: 130px', 'value' => $value), $attributes)) . "</div>";
  }
}
