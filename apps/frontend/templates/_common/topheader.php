<?php

if($sf_user->isAuthenticated())
{
   if($sf_user->getGuardUser()->getGender()=='m')
   {
       $gen = 'w';
   }
    else
    {
        $gen = 'm';
    }
}
else
{
    $gen = 'w';
}

  $q= Doctrine::getTable('Profile')
->createQuery('a')
->orderBy('RANDOM()', '')
->leftJoin('a.sfGuardUser u')
->where('a.status_id=? and a.gender=? and a.with_photo=? and a.rating>0',array(1,$gen,true))
->limit(17);
  if ($sf_user->isAuthenticated())
{
    //$q->addWhere('a.gender=?',array($sf_user->getGuardUser()->getAntiGender()));
}
  $items = $q->execute();
  $data = '<ul id="mycarousel" class="jcarousel-skin-tango">';
  foreach($items as $i)
  {
      $arr = array (__('Visit my profile'),__('Write to me'),__('Contact me'));
      $data.= '<li style="float: left;"><a title="'.$i->getImgSeo().'" href="'.url_for('profile/show?username='.$i->getsfGuardUser()->getUsername()).'">'.image_tag($i->getUrlImageMiddle(),array('alt'=>$i)).'</a></li>';
  }
  $data .= '</ul>';

echo $data;



?>





       