<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class BackendCacheTagPartnerInfo extends CacheTagAbstract
{
  public function __construct($id)
  {
    parent::__construct('backend_partner_info_'.$id);
  }
}
?>
