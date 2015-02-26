<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class FrontendCacheTagTop10 extends CacheTagAbstract
{
  public function __construct($gender)
  {
    parent::__construct('top10_'.$gender);
  }
}
?>
