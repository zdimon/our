<?php
 $slot = new BackendCacheSlotPartnerInfo($u->getPartnerId());
?>

<?php  if (false === ($data = $slot->load()))
{
       $pr = ProfilePartnerTable::getProfileById($u->getPartnerId());
       if($pr)
       {
           $link = link_to('['.$u->getPartnerId().']'.' '.$pr->getRealName(),'partner/show?id='.$pr->getId(),array('target'=>'_blank','style'=>'display: block; width:200px; height: 15px; vertical-align: middle; text-align: center','class'=>"dialog_link ui-state-default ui-corner-all"));
           $data = '<div class="partner_info">'.$link.'</div>';
          
       }
       else
       {
           $data = 'ошибка!';
       }

       $slot->addTag(new BackendCacheTagPartnerInfo($u->getPartnerId()));
       $slot->save($data);

}
echo $data;
?>