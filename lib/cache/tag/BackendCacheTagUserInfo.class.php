<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class BackendCacheTagUserInfo extends CacheTagAbstract
{
  public function __construct($id)
  {
    parent::__construct('backend_user_info_'.$id);
  }
}
?>
