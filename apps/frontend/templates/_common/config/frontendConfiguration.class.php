<?php

class frontendConfiguration extends sfApplicationConfiguration
{
  public function configure()
  {
      sfProjectConfiguration::getActive()->loadHelpers(array('Pagination','Partial', 'I18N', 'Url', 'Text', 'Tag', 'JavascriptBase', 'Date', 'jQuery', 'Cache'));
     
  }

  
    
}
