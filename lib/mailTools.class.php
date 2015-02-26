<?php

class mailTools
{

    	static function send($send_to, $subject, $message, $email_from=null)
	{
             if($email_from==null)
             {
               $email_from =  sfConfig::get('app_email_reply');
             }

             $letter = sfContext::getInstance()->getMailer()->compose(sfConfig::get('app_email_reply'), $send_to, $subject, $message)->setContentType('text/html');
             sfContext::getInstance()->getMailer()->send($letter);


	}


        	






}
