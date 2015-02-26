<?php
  $w = $scamer_report->getScamer()->getProfile();
  if($w->getScamer())
  {
     echo link_to(__('Remove from scamers'),'scamer_report/rem?i='.$scamer_report->getScamerId());
  }
 else {
     echo link_to(__('Put in scamers'),'scamer_report/set?i='.$scamer_report->getScamerId());       
}
?>
