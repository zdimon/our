<?php
 $slot = new BackendCacheSlotUserInfo($u->getId());

?>

<?php  if (false === ($data = $slot->load()))
{
       $pr = $u->getProfile();
       if($pr)
       {
           $link = link_to('['.$u->getId().']'.' '.$u->getProfile()->getRealName(),'profile/show?id='.$u->getId(),array('target'=>'_blank','style'=>'display: block; width:100px; height: 15px; vertical-align: middle; text-align: center','class'=>"dialog_link ui-state-default ui-corner-all"));
           if($u->getGender()=='m')
           {

               $data = '<div class="man_info"><span class="gender">'.$u->getProfile()->getGenderImage().'</span><span class="link_user">'.$link.'</span></div>';
           }
           else
           {
               $data = '<div class="girl_info"><span class="gender">'.$u->getProfile()->getGenderImage().'</span><span class="link_user">'.$link.'</span><div class="firs_last_name">'.$u->getProfile()->getFirstName().' '.$u->getProfile()->getLastName().'</div></div>';
           }
       }
       else
       {
           $data = 'ошибка!';
       }

       $slot->addTag(new BackendCacheTagUserInfo($u->getId()));
       $slot->save($data);
       
}
echo $data;
?>
