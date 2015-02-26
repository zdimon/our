<?php
class myTools {

  public static function stripMessage($mes)
{  
		$subs = array(
			  '/([a-z0-9][a-z0-9-]*[a-z0-9]\.?)*[a-z0-9]@([a-z0-9]\.|[a-z0-9][a-z0-9-]*[a-z0-9]\.)+[a-z]{2,6}/i' => ' ',
			  '/[0-9]{1,}/i' => ''
			);

		$str = preg_replace(array_keys($subs), array_values($subs),$mes);
		return $str;
}

public static function db_array_field($inp,$sep=',')
{
    if (is_array($inp) && sizeof($inp)>0)
    {
        $res = "";
        for ($i=0; $i<sizeof($inp); $i++)
        {
            if (!empty($inp[$i]))
                $res .= $inp[$i];
            else
                $res .= 0;

            if ($i<sizeof($inp)-1)
                $res .= $sep;
        }
        return $res;
    }

    elseif(!empty($inp) && strlen($inp)>0)
    {
        if (is_numeric(strpos($inp,$sep)))
        {
            $res = array();
            $arr = explode($sep,$inp);

            foreach ($arr as $ln)
            {
                if (trim($ln)!='')
                    $res[] = $ln;
            }
           
        }
        else 
        {
        	 $res[] = $inp;
        }
         return $res;
    }
   }


   public static function getIndexArr($arr, $value)
   {
     
     foreach($arr as $k => $v)
     {
         if($v==$value) return $k;
     }
     return false;
   }
 }
   ?>