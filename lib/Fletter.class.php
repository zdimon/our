<?php
class Fletter {

		  public static function stripMessage($mes)
		{  
				$subs = array(
					  '/([a-z0-9][a-z0-9-]*[a-z0-9]\.?)*[a-z0-9]@([a-z0-9]\.|[a-z0-9][a-z0-9-]*[a-z0-9]\.)+[a-z]{2,6}/i' => ' ',
					  '/[0-9]{1,}/i' => ''
					);

				$str = preg_replace(array_keys($subs), array_values($subs),$mes);
				return $str;
		}

		public static function send($from_age,$to_age,$title,$content)
		{
            $profile_class = ProfileTable::
			$from_year = date('Y')-$from_age;
            $to_year   =  date('Y')-$to_age;
            $from_date = '01-01-'.$from_year;
            $to_date = '31-12-'.$to_year;

            $c = new Criteria();


		}
 }
   ?>