<?php

/**
 * Profile form.
 *
 * @package    levandos
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class step2Form extends BaseProfileForm
{
  public function configure()
  {

              unset(
                        $this['i_can_receive'],
                        $this['can_resive_gift'],
                        $this['with_photo'],
                        $this['with_video'],
                        $this['created_at'],
                        $this['is_online'],
                        $this['subtype'],
                        $this['updated_at'],
			            $this['user_id'],
                        $this['gender'],
                        $this['photo'],
                        $this['is_active'],
                        $this['is_new_message'],
                        $this['is_new_favorite'],
                        $this['is_new_request'],
                        $this['is_new_gift'],
                        $this['is_new_hotlist'],
                        $this['is_new_friend'],
                        $this['status_id'],
                        $this['is_empty'],
                        $this['partner_id'],
                        $this['rating'],
              $this['timenew'],
              $this['scamer'],
              $this['cert'],
              $this['sub_message'],
              $this['sub_interest'],
              $this['sub_fav'],
              $this['sub_newsletter'],
              $this['cur_abonent'],
              $this['max_abonent'],
              $this['packet_id'],

              $this['birthday'],
              $this['first_name'],
              $this['last_name'],
              $this['real_name'],
              $this['city'],
              $this['country'],
              $this['height'],
              $this['weight'],
              $this['eye_color'],
              $this['hair_color'],
              $this['hair_lenght'],
              $this['body_type'],
              $this['ethnicity'],
              $this['marital_status'],
              $this['children'],
              $this['where_children'],
              $this['want_children'],
              $this['contact_lenses'],
              $this['religion'],
              $this['education'],
              $this['occupation'],
              $this['language1'],
              $this['language_skill1'],
              $this['language2'],
              $this['language_skill2'],
              $this['language3'],
              $this['language_skill3'],
              $this['smoker'],
              $this['drinker'],
              $this['looking_for'],
              $this['notify_me_about_news'],
              $this['looking_for_age_from'],
              $this['looking_for_age_to'],
              $this['ip'],




			$this['algorithm']
		);

     
      $this->embedI18n(array(sfContext::getInstance()->getUser()->getCulture()));

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
