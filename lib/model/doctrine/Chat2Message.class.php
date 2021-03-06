<?php

/**
 * Chat2Message
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    levandos
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7691 2011-02-04 15:43:29Z jwage $
 */
class Chat2Message extends BaseChat2Message
{

    public function getText()
    {
        $str = $this->parse($this->getContent());
        return $str;
    }

    public function parse($str)
    {
      $str = htmlspecialchars($str);
      $str = $this->stripMessage($str);
       for($i=1; $i<17; $i++)
       {
          $str = str_replace(':smile'.$i.':', '<img src="/images/smile/s'.$i.'.gif">', $str);
       }

       return $str;
    }

      private function stripMessage($mes)
{
		$subs = array(
			  '/([a-z0-9][a-z0-9-]*[a-z0-9]\.?)*[a-z0-9]@([a-z0-9]\.|[a-z0-9][a-z0-9-]*[a-z0-9]\.)+[a-z]{2,6}/i' => '***',
			  '/[0-9]{3,}/i' => '***'
			);

		$str = preg_replace(array_keys($subs), array_values($subs),$mes);
		return $str;
}


  public function save(Doctrine_Connection $conn = null)
	{

            
                    $is_new = false;
                    if($this->isNew()) $is_new = true;


                    if($is_new)
                    {
                        $room = $this->getRoom();
                        if($room->getCallerId()==$this->getUserId())
                        {
                            
                            $to_user = $room->getAnswer();
                        } else {
                           
                            $to_user = $room->getCaller();            
                        }
                        /// send notify to chat about online
                        if(sfConfig::get('app_use_comet')) 
                        {
                 
                            Dklab_Realplexor::sendMessage(array(
                            'url' => 'http://'.$_SERVER['HTTP_HOST'].'/'.$this->getUser()->getCulture().'/chat/gm',
                            'namespace' => 'chat',
                            'chanel' => 'get_message_for_'.$to_user->getId()
                        ));
                            
                                                        Dklab_Realplexor::sendMessage(array(
                            'url' => 'http://'.$_SERVER['HTTP_HOST'].'/'.$this->getUser()->getCulture().'/chat/gm',
                            'namespace' => 'chat',
                            'chanel' => 'get_message_for_'.$this->getUserId()
                        ));
                                                        
                            Dklab_Realplexor::sendMessage(array(
                            'url' => 'http://'.$_SERVER['HTTP_HOST'].'/'.$to_user->getCulture().'/chat/show_contact',
                            'namespace' => 'chat',
                            'chanel' => 'contact_for_'.$to_user->getId()
                            ));
                            
                             Dklab_Realplexor::sendMessage(array(
                            'url' => 'http://'.$_SERVER['HTTP_HOST'].'/'.$to_user->getCulture().'/chat/show_contact',
                            'namespace' => 'chat',
                            'chanel' => 'contact_for_'.$this->getUserId()
                            ));   
                             
                        }  
                    }
                    parent::save();
        }
        


}