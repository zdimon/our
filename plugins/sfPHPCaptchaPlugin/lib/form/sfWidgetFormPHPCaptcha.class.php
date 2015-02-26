<?php

/**
 * PHP Captcha Widget
 *
 * @package    sfPHPCaptchaPlugin
 * @subpackage form
 * @author     Sven Wappler <info@wapplersystems.de>
 */
class sfWidgetFormPHPCaptcha extends sfWidgetForm {

	protected function configure($options = array(), $attributes = array()) {
		$this->addOption('type', 'text');

		$this->setOption('is_hidden', false);

	}

	public function render($name, $value = null, $attributes = array(),
			$errors = array()) {
		$s = '<table cellpadding="0" cellspacing="0" style="border:0"><tr>';
		$reload_img = sfConfig::get('app_phpcaptcha_reloadimg',
				'/sfPHPCaptchaPlugin/images/reload');
		$audio_img = sfConfig::get('app_phpcaptcha_audioimg',
				'/sfPHPCaptchaPlugin/images/audio');

		$s .= '<td style="border:0 ">'
				. $this
						->renderTag('input',
								array_merge(
										array(
												'type' => $this
														->getOption('type'),
												'name' => $name,
												'value' => $value),
										$attributes));

		$s .= '</td><td style="border:0 ">'
				. tag("img",
						array('id' => "phpcaptcha",
								'src' => url_for('@phpcaptcha_image'),
								'alt' => "Captcha picture"));

		$s .= '</td><td style="border:0 ">'
				. content_tag("a", image_tag($reload_img),
						array('href' => "#",
								'onclick' => "javascript:document.getElementById('phpcaptcha').src='"
										. url_for('@phpcaptcha_image')
										. "?id='+Math.round(Math.random(0)*1000)+1; return false;"));

		$s .= '</tr></table>';

		if (sfConfig::get('app_phpcaptcha_useaudio', false))
			$s .= link_to(
					image_tag($audio_img,
							array('alt' => "Audio", 'title' => "Audio")),
					"@phpcaptcha_audio");

		return $s;
	}

}

