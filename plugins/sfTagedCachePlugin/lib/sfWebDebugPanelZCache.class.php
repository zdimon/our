<?php

class sfWebDebugPanelZCache extends sfWebDebugPanel
{
  static $mmcTime;
  static $mmcCount;
  static $mmcArray = array();

  static public function listenToAddPanelEvent(sfEvent $event)
  {
    $event->getSubject()->setPanel('ZCache', new sfWebDebugPanelZCache($event->getSubject()));
  }

  public function getTitle()
  {
    return '<img src="/svpTagedCachePlugin/images/zcache.gif" alt="zcache" />'.self::$mmcCount.' tm / '.round(self::$mmcTime*1000).' ms';
  }

  public function getPanelTitle()
  {
    return 'Zend-cache statistic';
  }

  public function getPanelContent()
  {
    ob_start();
    var_dump(self::$mmcArray);
    $s = ob_get_contents();
    ob_end_clean();
    return '<pre>'.$s.'</pre>';
  }

  static function profilerCallback($time, $method)
  {
    self::$mmcTime += $time;
    self::$mmcCount += 1;
    self::$mmcArray[] = $method.' - '.$time;
  }
}
