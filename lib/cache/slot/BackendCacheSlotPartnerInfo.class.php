<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class BackendCacheSlotPartnerInfo extends CacheSlotAbstract
{
  public function __construct($id)
  {
    parent::__construct('backend_partner_info_'.$id, 3600*1);
  }
}
?>
