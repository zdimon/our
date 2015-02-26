<?php

class myUser extends sfGuardSecurityUser
{

   public static function deleteUser($id)
    {
      $user = Doctrine::getTable('sfGuardUser')->find($id);

      $user->delete();
      
      return true;
   }

   public static function getService()
    {
            $arr = array(
            '1'=>__('Air Conditioning'),
            '2'=>__('Alarm System'),
            '3'=>__('Bed (double)'),
            '4'=>__('Bad (single)'),
            '5'=>__('Cabel/Satellite TV'),
            '6'=>__('Computer'),
            '7'=>__('Cooking/Dining Utensils'),
            '8'=>__('Electric Kettle'),
            '9'=>__('Hair Dryer'),
            '10'=>__('High Speed Internet'),
            '11'=>__('Iron'),
            '12'=>__('Local Heating System'),
            '13'=>__('Microwave'),
            '14'=>__('Refrigerator'),
            '15'=>__('Stove'),
            '16'=>__('Towels'),
            '17'=>__('Washing Machine'),
            '18'=>__('Jacuzzi'),
            );

            return $arr;
    }

   public static function getServiceStr($id)
    {
            $arr = array(
            '1'=>__('Air Conditioning'),
            '2'=>__('Alarm System'),
            '3'=>__('Bed (double)'),
            '4'=>__('Bad (single)'),
            '5'=>__('Cabel/Satellite TV'),
            '6'=>__('Computer'),
            '7'=>__('Cooking/Dining Utensils'),
            '8'=>__('Electric Kettle'),
            '9'=>__('Hair Dryer'),
            '10'=>__('High Speed Internet'),
            '11'=>__('Iron'),
            '12'=>__('Local Heating System'),
            '13'=>__('Microwave'),
            '14'=>__('Refrigerator'),
            '15'=>__('Stove'),
            '16'=>__('Towels'),
            '17'=>__('Washing Machine'),
            '18'=>__('Jacuzzi'),
            );

            return $arr[$id];
    }


   public static function getVideoFormats()
    {

      $ar = sfConfig::get('app_video_format');
      return $ar;
     // return $ar;
   }

   public static function getCultures()
    {

      $ar = sfConfig::get('app_mgI18nPlugin_cultures_available');

      return array_keys($ar);
     // return $ar;
   }

public static function getAgeStr($s)
    {

         $n = ceil($s);

            $n = abs($n) % 100;
            $n1 = $n % 10;
            if ($n > 10 && $n < 20) return __('лет');
            if ($n1 > 1 && $n1 < 5) return __('года');
            if ($n1 == 1) return __('год');
            return __('лет');

    }

  public static function getAccountStr($s)
    {

         $n = ceil($s);

            $n = abs($n) % 100;
            $n1 = $n % 10;
            if ($n > 10 && $n < 20) return __('кредитов');
            if ($n1 > 1 && $n1 < 5) return __('кредита');
            if ($n1 == 1) return __('кредит');
            return __('кредитов');

    }


 public static function getLangs() {

               $arr = array(
                   'ru' => __('Русский'),
                   'en' => __('Английский')
               );

		return $arr;

	}


        public static function getYears() {
		$now = intval(date('Y'));
		$start = $now-90;
		$finish = $now-18;
		$arr [0] = '-';
		for($i = $start; $i <= $finish; $i ++) {
			$arr [$i] = $i;
		}

		return $arr;

	}

        public static function getYears2() {
		$now = intval(date('Y'));
		$start = $now-90;
		$finish = $now;
		$arr [0] = '-';
		for($i = $start; $i <= $finish; $i ++) {
			$arr [$i] = $i;
		}

		return $arr;

	}


    public static function getWeight()
    {

        $arr[] = '-';

        for($i=20; $i<=180; $i++ )
        {
            $arr[$i] = $i.' kg';
        }
        return $arr;
    }


          public static function getHeight()
	{
		$arr = array(
                ''=>__('-'),
		'150'=>__('150 cm or bellow'),
		'151'=>__('151 cm'),
                '152'=>__('152 cm'),
                '153'=>__('153 cm'),
                '154'=>__('154 cm'),
                '155'=>__('155 cm'),
                '156'=>__('156 cm'),
                '157'=>__('157 cm'),
                '158'=>__('158 cm'),
                '159'=>__('159 cm'),
                '160'=>__('160 cm'),
                '161'=>__('161 cm'),
                '162'=>__('162 cm'),
                '163'=>__('163 cm'),
                '164'=>__('164 cm'),
                '165'=>__('165 cm'),
                '166'=>__('166 cm'),
                '167'=>__('167 cm'),
                '168'=>__('168 cm'),
                '169'=>__('169 cm'),
                '170'=>__('170 cm'),
                '171'=>__('171 cm'),
                '172'=>__('172 cm'),
                '173'=>__('173 cm'),
                '174'=>__('174 cm'),
                '175'=>__('175 cm'),
                '176'=>__('176 cm'),
                '177'=>__('177 cm'),
                '178'=>__('178 cm'),
                '179'=>__('179 cm'),
                '180'=>__('180 cm'),
                '181'=>__('181 cm'),
                '182'=>__('182 cm'),
                '183'=>__('183 cm'),
                '184'=>__('184 cm'),
                '185'=>__('185 cm'),
                '186'=>__('186 cm'),
                '187'=>__('187 cm'),
                '188'=>__('188 cm'),
                '189'=>__('189 cm'),
                '190'=>__('190 or up'),
		);

		return $arr;
	}

        	public static function getRost() {
		$arr [0] = '-';
		for($i = 150; $i <= 230; $i ++) {
			$arr [$i] = $i.' cm';
		}

		return $arr;

	}

	public static function getVes() {
		$arr [''] = '-';
		for($i = 30; $i <= 120; $i ++) {
			$arr [$i] = $i.' kg';
		}

		return $arr;

	}

	public static function getAge() {
		$arr [0] = '-';
		for($i = 18; $i <= 99; $i ++) {
			$arr [$i] = $i;
		}

		return $arr;

	}

         public static function getBodyType()
	{
		$arr = array(
                  ''=>__('-'),
                 'Slim'=>__('Slim'),
                 'Average'=>__('Average'),
                 'Some pounds to lost'=>__('Some pounds to lost'),
                 'Fate'=>__('Fate'),
                 'Athletic'=>__('Athletic'),
		);

		return $arr;
	}

    public static function getHairLenght()
    {
        $arr = array(
            ''=>__('-'),
            'short'=>__('Short'),
            'medium'=>__('Medium'),
            'long'=>__('Long'),
            'vary long'=>__('Very long')
        );

        return $arr;
    }

    public static function getLookingForRole()
    {
        $arr = array(
            ''=>__('-'),
            'single'=>__('Single'),
            'divorced'=>__('Divorced'),
            'widowed'=>__('Widowed')
        );

        return $arr;
    }



	public static function getLevelLang()
	{
		$arr = array(

		'начальный'=>__('начальный'),
		'средний'=>__('средний'),
		'беглый'=>__('беглый'),
		);

		return $arr;
	}


        public static function getChildren()
	{
		$arr = array(
                ''=>__('-'),
		'without children'=>__('without children'),
		'with children'=>__('with children'),
		'1 child'=>__('1 child'),
                '2 children'=>__('2 children'),
                '3 children'=>__('3 children'),
                '4 children'=>__('4 children'),
                '5 children'=>__('5 children'),
                '6 children'=>__('6 children'),
		);

		return $arr;
	}

          public static function getWhereChildren()
	{
		$arr = array(

		''=>__('-'),
                'without children'=>__('without children'),
		'living with me'=>__('living with me'),
		'not living with me'=>__('not living with me'),
                'sometimes living with me'=>__('sometimes living with me'),
		);

		return $arr;
	}

    public static function getWantChildren()
	{
		$arr = array(
                ''=>__('-'),
		'No'=>__('No'),
		'Yes'=>__('Yes'),
                'Maybe'=>__('Maybe'),
                'No matters'=>__('No matters'),
		);

		return $arr;
	}



         

    public static function getEthnicity()
	{
		$arr = array(
                ''=>'-',
		'African'=>__('African'),
		'African American'=>__('African American'),
                'Asian'=>__('Asian'),
                'Caucasian'=>__('Caucasian'),
                'East Indian'=>__('East Indian'),
                'Hispanic'=>__('Hispanic'),
                'Indian'=>__('Indian'),
                'Latino'=>__('Latino'),
                'Mediterranean'=>__('Mediterranean'),
                'Middle Eastern'=>__('Middle Eastern'),
                'Mixed'=>__('Mixed'),
		);

		return $arr;
	}

     public static function getReligion()
	{
		$arr = array(
                ''=>'-',
		'Adventist'=>__('Adventist'),
		'Agnostic'=>__('Agnostic'),
                'Atheist'=>__('Atheist'),
                'Baptist'=>__('Baptist'),
                'Buddhist'=>__('Buddhist'),
                'Caodaism'=>__('Caodaism'),
                'Catholic'=>__('Catholic'),
                'Christian'=>__('Christian'),
                'Hindu'=>__('Hindu'),
                'Iskcon'=>__('Iskcon'),
                'Jainism'=>__('Jainism'),
                'Jewish'=>__('Jewish'),
                'Methodist'=>__('Methodist'),
                'Mormon'=>__('Mormon'),
                'Moslem'=>__('Moslem'),
                'Orthodox'=>__('Orthodox'),
                'Pentecostal'=>__('Pentecostal'),
                'Protestant'=>__('Protestant'),
                'Quaker'=>__('Quaker'),
                'Scientology'=>__('Scientology'),
                'Shinto'=>__('Shinto'),
                'Sikhism'=>__('Sikhism'),
                'Spiritual'=>__('Spiritual'),
                'Taoism'=>__('Taoism'),
                'Wiccan'=>__('Wiccan'),
                'Zoroastrian'=>__('Zoroastrian'),
                'Other'=>__('Other'),
		);

		return $arr;
	}



        public static function getReligionNotMatter()
	{
		$arr = array(
                ''=>__('Not matter'),
		'Adventist'=>__('Adventist'),
		'Agnostic'=>__('Agnostic'),
                'Atheist'=>__('Atheist'),
                'Baptist'=>__('Baptist'),
                'Buddhist'=>__('Buddhist'),
                'Caodaism'=>__('Caodaism'),
                'Catholic'=>__('Catholic'),
                'Christian'=>__('Christian'),
                'Hindu'=>__('Hindu'),
                'Iskcon'=>__('Iskcon'),
                'Jainism'=>__('Jainism'),
                'Jewish'=>__('Jewish'),
                'Methodist'=>__('Methodist'),
                'Mormon'=>__('Mormon'),
                'Moslem'=>__('Moslem'),
                'Orthodox'=>__('Orthodox'),
                'Pentecostal'=>__('Pentecostal'),
                'Protestant'=>__('Protestant'),
                'Quaker'=>__('Quaker'),
                'Scientology'=>__('Scientology'),
                'Shinto'=>__('Shinto'),
                'Sikhism'=>__('Sikhism'),
                'Spiritual'=>__('Spiritual'),
                'Taoism'=>__('Taoism'),
                'Wiccan'=>__('Wiccan'),
                'Zoroastrian'=>__('Zoroastrian'),
                'Other'=>__('Other'),
		);

		return $arr;

	}


                  public static function getMaritalStatus()
	{
		$arr = array(
                ''=>__('-'),
		'Single'=>__('Single'),
		'Attached'=>__('Attached'),
                'Divorced'=>__('Divorced'),
                'Married'=>__('Married'),
                'Separated'=>__('Separated'),
                'Widow'=>__('Widow'),
		);

		return $arr;
	}

           public static function getMaritalStatusNotMatter()
	{
		$arr = array(
                ''=>__('Not matter'),
		'Single'=>__('Single'),
		'Attached'=>__('Attached'),
                'Divorced'=>__('Divorced'),
                'Married'=>__('Married'),
                'Separated'=>__('Separated'),
                'Widow'=>__('Widow'),
		);

		return $arr;
	}



                  public static function getLanguage()
	{
		$arr = array(
                '---'=>__('---'),
		'English'=>__('English'),
                'Dutch'=>__('Dutch'),
                'French'=>__('French'),
                'Italian'=>__('Italian'),
                'Japanese'=>__('Japanese'),
                'Ivrit'=>__('Ivrit'),
                'Arabic'=>__('Arabic'),
                'Spanish'=>__('Spanish'),
                'Russian'=>__('Russian'),
                'Ukrainian'=>__('Ukrainian'),
                'Greek'=>__('Greek'),
                'Indian'=>__('Indian'),
                'Turkish'=>__('Turkish'),
                'Polish'=>__('Polish')
		);

		return $arr;
	}

         public static function getLanguageNoempty()
	{
		$arr = array(
		'English'=>__('English'),
		'Afrikaans'=>__('Afrikaans'),
                'Arabic'=>__('Arabic'),
                'Belorussian'=>__('Belorussian'),
                'Bulgarian'=>__('Bulgarian'),
                'Burmese'=>__('Burmese'),
                'Cantonese'=>__('Cantonese'),
                'Croatian'=>__('Croatian'),
                'Czech'=>__('Czech'),
                'Danish'=>__('Danish'),
                'Dutch'=>__('Dutch'),
                'Esperanto'=>__('Esperanto'),
                'Estonian'=>__('Estonian'),
                'Finnish'=>__('Finnish'),
                'French'=>__('French'),
                'German'=>__('German'),
                'Greek'=>__('Greek'),
                'Gujrati'=>__('Gujrati'),
                'Hebrew'=>__('Hebrew'),
                'Hindi'=>__('Hindi'),
                'Hungarian'=>__('Hungarian'),
                'Icelandic'=>__('Icelandic'),
                'Indian'=>__('Indian'),
                'Indonesian'=>__('Indonesian'),
                'Italian'=>__('Italian'),
                'Japanese'=>__('Japanese'),
                'Korean'=>__('Korean'),
                'Latvian'=>__('Latvian'),
                'Lithuanian'=>__('Lithuanian'),
                'Malay'=>__('Malay'),
                'Mandarin'=>__('Mandarin'),
                'Marathi'=>__('Marathi'),
                'Moldovian'=>__('Moldovian'),
                'Nepalese'=>__('Nepalese'),
                'Norwegian'=>__('Norwegian'),
                'Persian'=>__('Persian'),
                'Polish'=>__('Polish'),
                'Portuguese'=>__('Portuguese'),
                'Punjabi'=>__('Punjabi'),
                'Romanian'=>__('Romanian'),
                'Russian'=>__('Russian'),
                'Serbian'=>__('Serbian'),
                'Spanish'=>__('Spanish'),
                'Swedish'=>__('Swedish'),
                'Tagalog'=>__('Tagalog'),
                'Taiwanese'=>__('Taiwanese'),
                'Tamil'=>__('Tamil'),
                'Telugu'=>__('Telugu'),
                'Thai'=>__('Thai'),
                'Tongan'=>__('Tongan'),
                'Turkish'=>__('Turkish'),
                'Ukrainian'=>__('Ukrainian'),
                'Urdu'=>__('Urdu'),
                'Vietnamese'=>__('Vietnamese'),
                'Visayan'=>__('Visayan'),
		);

		return $arr;
	}


                  public static function getLanguageSkills()
	{
		$arr = array(
                '---'=>__('---'),
		'Very bad'=>__('Very bad'),
		'Basic'=>__('Basic'),
                'Intermediate'=>__('Intermediate'),
				'Good'=>__('Good'),
				'Fluent'=>__('Fluent'),
		);

		return $arr;
	}

          public static function getLanguageSkillsNoempty()
	{
		$arr = array(
                ''=>__('---'),
		'Very bad'=>__('Very bad'),
		'Basic'=>__('Basic'),
                'Intermediate'=>__('Intermediate'),
				'Good'=>__('Good'),
				'Fluent'=>__('Fluent'),
		);

		return $arr;
	}

                  public static function getEducation()
	{
		$arr = array(
                ''=>__('-'),
		'High School graduate'=>__('High School graduate'),
		'Some college'=>__('Some college'),
                'College student'=>__('College student'),
                'AA (2 years college)'=>__('AA (2 years college)'),
                'BA/BS (4 years college)'=>__('BA/BS (4 years college)'),
                'Some grad school'=>__('Some grad school'),
                'Grad school student'=>__('Grad school student'),
                'MA/MS/MBA'=>__('MA/MS/MBA'),
                'PhD/Post doctorate'=>__('PhD/Post doctorate'),
                'JD'=>__('JD'),
		);

		return $arr;
	}


           public static function getRelationship()
	{


		$arr = array(
               // ''=>__('-'),
                '1'=>__('Activity Partner'),
		'2'=>__('Friendship'),
		'3'=>__('Marriage'),
                '4'=>__('Relationship'),
                '5'=>__('Romance'),
                '6'=>__('Casual'),
                '7'=>__('Travel Partner'),
                '8'=>__('Pen Pal'),
		);

/*
			   		$arr = array(
                'Activity Partner'=>__('Activity Partner'),
		'Friendship'=>__('Friendship'),
		'Marriage'=>__('Marriage'),
                'Relationship'=>__('Relationship'),
                'Romance'=>__('Romance'),
                'Casual'=>__('Casual'),
                'Travel Partner'=>__('Travel Partner'),
                'Pen Pal'=>__('Pen Pal'),
		);
*/
		return $arr;
	}




                 public static function getIncome()
	{
		$arr = array(
                'I prefer not to say'=>__('I prefer not to say'),
		'$10,000/year and less'=>__('$10,000/year and less'),
                '$10,000-$30,000/year'=>__('$10,000-$30,000/year'),
                '$30,000-$50,000/year'=>__('$30,000-$50,000/year'),
                '$50,000-$70,000/year'=>__('$50,000-$70,000/year'),
                '$70,000/year and more'=>__('$70,000/year and more'),
		);

		return $arr;
	}


                 public static function getSmoker()
	{
		$arr = array(
                ''=>__('-'),
		'No'=>__('No'),
                'Rarely'=>__('Rarely'),
                'Often'=>__('Often'),
                'Very often'=>__('Very often'),
		);

		return $arr;
	}


                 public static function getDrinker()
	{
		$arr = array(
                ''=>__('-'),
		'No'=>__('No'),
                'Rarely'=>__('Rarely'),
                'Often'=>__('Often'),
                'Very often'=>__('Very often'),
		);

		return $arr;
	}


         public static function getIm()
	{
		$arr = array(
                'none'=>__('none'),
		'ICQ'=>__('ICQ'),
                'Yahoo'=>__('Yahoo'),
                'MSN'=>__('MSN'),
                'AOL'=>__('AOL'),
		);

		return $arr;
	}





	public static function getEyeColor()
	{
		$arr = array(
        '' =>'-',
		'серые'=>__('серые'),
		'голубые'=>__('голубые'),
		'серо-голубые'=>__('серо-голубые'),
		'зеленые'=>__('зеленые'),
		'зелено-голубые'=>__('зелено-голубые'),
		'карие'=>__('карие'),
		'зелено-карие'=>__('зелено-карие'),
		);

		return $arr;
	}

	public static function getHairleng()
	{
		$arr = array(

		'длинные'=>__('длинные'),
		'средние'=>__('средние'),
		'короткие'=>__('короткие'),

		);
		return $arr;
	}

	public static function getGender($empty=false)
	{
               if($empty)
               {
                    $arr = array(
                    ''=>__(''),
                    'w'=>__('Woman'),
                    'm'=>__('Gentlemen'),
                    );
               }
               else
               {
                    $arr = array(
                    'm'=>__('man'),
                    'w'=>__('woman'),
                    );
               }
		return $arr;
	}

        public static function getGenderStr($g)
	{
               if($g=='m')
               {
                   return __('мужчина');

               }
               else
               {
                   return __('женщина');
               }
		
	}


	public static function getHairtype()
	{
		$arr = array(

		'прямые'=>__('прямые'),
		'волнистые'=>__('волнистые'),
		'нет волос'=>__('нет волос'),

		);
		return $arr;
	}

	public static function getHairColor()
	{
		$arr = array(
        '' => '-',
		'каштановый'=>__('каштановый'),
		'черный'=>__('черный'),
		'белый'=>__('белый'),
		'рыжий'=>__('рыжий'),
		'седой'=>__('седой'),
		'крашеный'=>__('крашеный'),
        'blond'=>__('blond'),
		);
		return $arr;
	}

  public static function getIcanRecive()
	{
		$arr = array(
                'HTML'=>__('HTML'),
				'Text'=>__('Text'),
				'not sure'=>__('not sure'),
		);

		return $arr;
	}

         public static function getNotifyMe()
	{
		$arr = array(
                'Notify Me'=>__('Notify Me'),
		'Do Not Notify Me'=>__('Do Not Notify Me'),

		);

		return $arr;
	}


public static function stripText($text)
  {
    //$text = strtolower($text);

    // strip all non word chars
    //$text = preg_replace('/\W/', ' ', $text);

    // replace all white space sections with a dash
    $text = preg_replace('/\ +/', '-', $text);

    // trim dashes
    $text = preg_replace('/\-$/', '', $text);
    $text = preg_replace('/^\-/', '', $text);

    $text = str_replace("#","",$text);
    $text = str_replace("@","",$text);
    $text = str_replace("&","",$text);
    $text = str_replace("*","",$text);
    $text = str_replace("^","",$text);
    $text = str_replace("$","",$text);
    $text = str_replace("!","",$text);
    $text = str_replace("№","",$text);
    $text = str_replace("?","",$text);
    $text = str_replace(".","_",$text);
    $text = str_replace(":","_",$text);
    $text = str_replace(" ","_",$text);
    $text = str_replace(",","",$text);
    $text = str_replace("А","A",$text);
    $text = str_replace("Б","B",$text);
    $text = str_replace("В","V",$text);
    $text = str_replace("Г","G",$text);
    $text = str_replace("Д","D",$text);
    $text = str_replace("Е","E",$text);
    $text = str_replace("Ё","E",$text);
    $text = str_replace("З","Z",$text);
    $text = str_replace("И","I",$text);
    $text = str_replace("Й","I",$text);
    $text = str_replace("К","K",$text);
    $text = str_replace("Л","L",$text);
    $text = str_replace("М","M",$text);
    $text = str_replace("Н","N",$text);
    $text = str_replace("О","O",$text);
    $text = str_replace("П","P",$text);
    $text = str_replace("Р","R",$text);
    $text = str_replace("С","S",$text);
    $text = str_replace("Т","T",$text);
    $text = str_replace("У","U",$text);
    $text = str_replace("Ф","F",$text);
    $text = str_replace("Х","H",$text);
    $text = str_replace("Ъ","`",$text);
    $text = str_replace("Ы","I",$text);
    $text = str_replace("Э","E",$text);


    $text = str_replace("а","a",$text);
    $text = str_replace("б","b",$text);
    $text = str_replace("в","v",$text);
    $text = str_replace("г","g",$text);
    $text = str_replace("д","d",$text);
    $text = str_replace("е","e",$text);
    $text = str_replace("ё","e",$text);
    $text = str_replace("з","z",$text);
    $text = str_replace("и","i",$text);
    $text = str_replace("й","i",$text);
    $text = str_replace("к","k",$text);
    $text = str_replace("л","l",$text);
    $text = str_replace("м","m",$text);
    $text = str_replace("н","n",$text);
    $text = str_replace("о","o",$text);
    $text = str_replace("п","p",$text);
    $text = str_replace("р","r",$text);
    $text = str_replace("с","s",$text);
    $text = str_replace("т","t",$text);
    $text = str_replace("у","u",$text);
    $text = str_replace("ф","f",$text);
    $text = str_replace("х","h",$text);
    $text = str_replace("ъ","`",$text);
    $text = str_replace("ы","i",$text);
    $text = str_replace("э","e",$text);

     $text = str_replace("ж","zh",$text);
     $text = str_replace("ц","ts",$text);
     $text = str_replace("ч","ch",$text);
     $text = str_replace("ш","sh",$text);
     $text = str_replace("щ","shch",$text);
     $text = str_replace("ь","",$text);
     $text = str_replace("ю","yu",$text);
     $text = str_replace("я","ya",$text);
     $text = str_replace("Ж","ZH",$text);
     $text = str_replace("Ц","TS",$text);
     $text = str_replace("Ч","CH",$text);
     $text = str_replace("Ш","SH",$text);
     $text = str_replace("Щ","SHCH",$text);
     $text = str_replace("Ь","",$text);
     $text = str_replace("Ю","YU",$text);
     $text = str_replace("Я","YA",$text);
     $text = str_replace("ї","i",$text);
     $text = str_replace("Ї","Yi",$text);
     $text = str_replace("є","ie",$text);
     $text = str_replace("Є","Ye",$text);

    //$st=mb_strtr($st,"абвгдеёзийклмнопрстуфхъыэ_",
    //"abvgdeeziyklmnoprstufh'iei");
    //$st=mb_strtr($st,"АБВГДЕЁЗИЙКЛМНОПРСТУФХЪЫЭ_",
    //"ABVGDEEZIYKLMNOPRSTUFH'IEI");
    // Затем - "многосимвольные".
   // $st=strtr($st,
    //                array(
    //                    "ж"=>"zh", "ц"=>"ts", "ч"=>"ch", "ш"=>"sh",
    //                    "щ"=>"shch","ь"=>"", "ю"=>"yu", "я"=>"ya",
    //                    "Ж"=>"ZH", "Ц"=>"TS", "Ч"=>"CH", "Ш"=>"SH",
    //                    "Щ"=>"SHCH","Ь"=>"", "Ю"=>"YU", "Я"=>"YA",
    //                    "ї"=>"i", "Ї"=>"Yi", "є"=>"ie", "Є"=>"Ye"
     //                   )
     //        );
    // Возвращаем результат.
    //return $st;

    return $text;

  }


  public static function getMostPopular()
   {
       if(!sfContext::getInstance()->getUser()->isAuthenticated())
       {
           return false;
       }
       $cn = Doctrine::getTable('Message')
       ->createQuery('a')
       ->select('a.to_id as tid')
       ->where('a.from_id=?',array(sfContext::getInstance()->getUser()->getGuardUser()->getId()))
       ->groupBy('a.to_id')
       ->orderBy('cnt DESC')
       ->fetchOne();
       $id = $cn['to_id'];

       if($id>0)
       {
           $user = ProfileTable::getProfileById($id);
           if($user)
           {
               return $user;
           }
       }

       return null;

   }



        
}
