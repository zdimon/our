<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class FrontendCacheSlotTop10 extends CacheSlotAbstract
{
  public function __construct($key)
  {
    parent::__construct('top10_'.$key, 3600*1);
  }
}
?>
