<?php
class myRequest extends sfWebRequest
{

    public static function params2str($additional_parameters=array(), $clean_parameters=array('module', 'action', 'page'))
  {
    //$parameters = sfContext::getInstance()->getRequest()->parameterHolder->getAll();
    $parameters = $_GET;
    foreach ($clean_parameters as $value)
    	if(isset($parameters[$value]))
    		unset($parameters[$value]);


    foreach ($additional_parameters as $key => $value)
    	$parameters[$key] = $value;

    foreach ($parameters as $key => $value)
      {
        if(is_array($value))
        {

           unset($parameters[$key]);
           foreach($value as $k=>$v)
           {
             $str = $key.'['.$k.']';
             $parameters[$str] = $str.'='.$v;
            //die;

           }

        }
        else
        {
           $parameters[$key] = $key.'='.$value;
        }
      }




    return '?'.implode('&', $parameters);
  }
  
    public function getFileExtension($name)
  {
    // return the original file extension

    $fileinfo=$this->getFile($name);

    $ext = $this->getFileExt($fileinfo['name']);

    if ($ext!=''){
      return ".".$ext;
    }else{
      return parent::getFileExtension($name);
    }

  }

  private function getFileExt($filename)
  {
    $pos = strrpos($filename,".");

    if ($pos >=0 ){
      return strtolower(substr($filename,$pos+1));
    }else{
      return '';
    }

  }






}


?>
