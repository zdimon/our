<?php

class backendConfiguration extends sfApplicationConfiguration
{
  public function configure()
  {
      sfProjectConfiguration::getActive()->loadHelpers(array('Partial', 'I18N', 'Url', 'Text', 'Tag', 'JavascriptBase', 'Date', 'jQuery', 'Flash', 'Pagination'));
  }
}
