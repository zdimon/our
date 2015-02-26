<?php

abstract class CacheTagAbstract extends Dklab_Cache_Frontend_Tag
{
  public function getBackend()
  {
    return CacheBackend::getInstance();
  }

  public function __toString()
  {
    return $this->getNativeId();
  }
}
