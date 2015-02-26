<?php

/**
 * Profile form.
 *
 * @package    levandos
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class trProfileForm extends BaseProfileForm
{
  public function configure()
  {

              unset(
               $this['send_as_new'],        
               $this['birthday_mark'],  
               $this['time_on_site'],  
                        $this['i_can_receive'],
              $this['first_name'],
              $this['last_name'],
              $this['middle_name'],
              $this['real_name'],
              $this['city'],
              $this['country'],
              $this['zip'],
              $this['adress'],
              $this['phone'],
              $this['birthday'],
              $this['height'],
              $this['body_type'],
              $this['relationship'],
              $this['rost'],
              $this['ves'],
              $this['ethnicity'],
              $this['religion'],
              $this['marital_status'],
              $this['children'],
              $this['where_children'],
              $this['want_children'],
              $this['im'],
              $this['occupation'],
              $this['language1'],
              $this['language2'],
              $this['language3'],
              $this['language_skill1'],
              $this['language_skill2'],
              $this['language_skill3'],
              $this['education'],
              $this['income'],
              $this['smoker'],
              $this['drinker'],
              $this['headline'],
              $this['i_look_for_a'],
              $this['looking_for_age_from'],
              $this['looking_for_age_to'],
              $this['looking_for_a_height_from'],
              $this['looking_for_a_height_to'],
              $this['looking_for_a_body_type_from'],
              $this['looking_for_a_body_type_to'],
              $this['notify_me_about_news'],
              $this['mobile_phone'],
              $this['hair_lenght'],
              $this['hair_color'],
              $this['eye_color'],
              $this['weight'],
              $this['looking_for'],
              $this['looking_for_role'],
              $this['contact_lenses'],
              $this['subtype'],
              $this['most_active_user'],
              $this['homepage'],
              $this['phone2'],
              $this['icq'],
              $this['msn'],
              $this['skype'],
              $this['zodiac'],
              $this['partner_id'],
              $this['can_resive_gift'],
              $this['skan'],
              $this['rating'],
              $this['cert'],
              $this['object_version'],
              $this['relationship'],
                        $this['with_photo'],
                        $this['with_video'],
                        $this['created_at'],
                        $this['is_online'],
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
                        $this['scamer'],
                        $this['sub_message'],
                        $this['sub_interest'],
                        $this['sub_fav'],
                        $this['sub_newsletter'],
                        $this['cur_abonent'],
                        $this['max_abonent'],
                        $this['packet_id'],
                        $this['is_camera'],
                        $this['is_chat'],
                         $this['is_new'],
                       $this['is_staff'],
			            $this['algorithm']
		);

      if (sfContext::hasInstance())
      {


      }

      $this->embedI18n(myUser::getCultures());







      $custom_decorator = new sfWidgetFormSchemaFormatterDefList($this->getWidgetSchema());
      $this->getWidgetSchema()->addFormFormatter('deflist', $custom_decorator);
      $this->getWidgetSchema()->setFormFormatterName('deflist');





  }
  
  public function getI18nFormClass() {
      return 'trProfileTranslationForm';
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
