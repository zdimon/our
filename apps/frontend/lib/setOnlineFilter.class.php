<?php


class setOnlineFilter extends sfFilter
{
  public function execute ($filterChain)
  {
      
      
                              $url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
                    $s = SeoTable::getInstance()->createQuery('a')->where('a.url=?',array($url))->fetchOne();
                   // $this->getContext()->getInstance()->getResponse()->addMeta('language', $this->getContext()->getUser()->getCulture());
                    if($s)
                    {
                        //echo $s->getSeoTitle();
                       // die;
                        $this->getContext()->getInstance()->getResponse()->addMeta('title',  $s->getTitle());
                        $this->getContext()->getInstance()->getResponse()->addMeta('description',  $s->getDescription());
                        $this->getContext()->getInstance()->getResponse()->addMeta('keywords',  $s->getKeywords());
                      //  $this->getContext()->getInstance()->getResponse()->addMeta('robot',  $s->getRobots());
                        $this->getContext()->getInstance()->getResponse()->addMeta('revisit-after',  $s->getRevisit());
                    } 
                    

    /// онлайн
    if($this->getContext()->getUser()->isAuthenticated())
    {
        $context = $this->getContext();
        $u = $this->getContext()->getUser()->getGuardUser();
        if($u)
        {
            $u->setTimer(time());
            $u->setIsOnline(true);
            $u->save();
        }

       
    }



    //

    $filterChain->execute();
  }
}
