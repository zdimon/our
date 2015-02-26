<?php
 if(!sfContext::getInstance()->getUser()->isAuthenticated())
 {
     $key = 'unreg';
 }
 elseif($sf_user->getGuardUser()->getGender()=='m')
 {
     $key = 'm';
 }
 else {
    $key = 'w';
}
 $key = rand(9,99);
 $slot = new FrontendCacheSlotTop10($key);
?>
<?php  if (false === ($data = $slot->load()))
{
  $q= Doctrine::getTable('Profile')
->createQuery('a')
->leftJoin('a.sfGuardUser u')
->where('a.status_id=? and a.gender=?',array(1,'w'))
->limit(7);
  if ($sf_user->isAuthenticated())
{
    //$q->addWhere('a.gender=?',array($sf_user->getGuardUser()->getAntiGender()));
}
  $items = $q->execute();
  $data = '<ul>';
  foreach($items as $i)
  {
      $data.= '<li>'.$i->getLinkImageSmall().$i->getOnlineIndicator().'</li>';
  }
  $data .= '</ul>';
  $slot->addTag(new FrontendCacheTagTop10($key));
  $slot->save($data);
}
echo $data;
?>




       