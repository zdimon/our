<?php

class CacheBackend
{
  protected static $backend = null;

  public static function getInstance()
  {
    if (is_null(self::$backend))
    {
      $debug = false;
      try {
        $context = sfContext::getInstance();
      } catch  (Exception $e) {
        $context = false;
      }

      if ($context)
      {
        $config = sfContext::getInstance()->getConfiguration();
        $path = sfConfig::get('sf_cache_dir').DIRECTORY_SEPARATOR.'main'.DIRECTORY_SEPARATOR.$config->getEnvironment().DIRECTORY_SEPARATOR.'taged-cache';
        if ($config->getEnvironment() == 'dev')
          $debug = true;
      }
      else
      {
        $path = sfConfig::get('sf_cache_dir').DIRECTORY_SEPARATOR.'main'.DIRECTORY_SEPARATOR.'cli'.DIRECTORY_SEPARATOR.'taged-cache';
      }

      if (!is_dir($path))
      {
        $current_umask = umask(0000);
        @mkdir($path, 0777, true);
        umask($current_umask);
      }

      $cache = new Zend_Cache_Backend_File(array('cache_dir' => $path));
      //$cache = new Zend_Cache_Backend_Memcached();

      if ($debug)
        self::$backend = new Dklab_Cache_Backend_TagEmuWrapper(new Dklab_Cache_Backend_Profiler($cache, array('sfWebDebugPanelZCache', 'profilerCallback')));
      else
        self::$backend = new Dklab_Cache_Backend_TagEmuWrapper($cache);
    }
    return self::$backend;
  }
}