<?php


class chatFilter extends sfFilter
{
  public function execute ($filterChain)
  {
  
     $filterChain->execute();
    /// онлайн
     
                        $url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
                    $s = SeoTable::getInstance()->createQuery('a')->where('a.url=?',array($url))->fetchOne();
                    //echo $url;
                    //die;
                    if($s)
                    {
                        //echo $s->getSeoTitle();
                       // die;
                        $this->getContext()->getInstance()->getResponse()->addMeta('title',  $s->getSeoTitle());
                        $this->getContext()->getInstance()->getResponse()->addMeta('description',  $s->getSeoDescription());
                        $this->getContext()->getInstance()->getResponse()->addMeta('keywords',  $s->getSeoKeyword());
                    } 

    if($this->getContext()->getUser()->isAuthenticated() and sfConfig::get('app_use_chat') and $this->getContext()->getRequest()->getParameter('module')!='chat' )
    {

       $response = $this->context->getResponse();
       $content = $response->getContent();

       $user = $this->getContext()->getUser()->getGuardUser();

       $room = Chat2RoomTable::getAlertRoom($user);

       if($room)
       {
            //$_SESSION['cur_chat_call']='true';
            $abonent = $room->getAbonent($user);

            $html =  get_component('chat', 'show_dialog',array('abonent'=>$abonent,'room'=>$room));

            if (false !== ($pos = strpos($content, '</body>')))
            {
               $response->setContent(substr($content, 0, $pos).$html.substr($content, $pos));
            }
    
    
       }
       
    }
    //

    
  }
}
