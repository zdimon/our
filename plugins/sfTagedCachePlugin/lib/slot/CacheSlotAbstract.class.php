<?php

class CacheSlotAbstract extends Dklab_Cache_Frontend_Slot
{
  protected function _getBackend()
  {
    return CacheBackend::getInstance();
  }
}