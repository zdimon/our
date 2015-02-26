

<?php echo link_to(__('link on the page'),'http://'.$_SERVER['HTTP_HOST'].'/page/index?alias='.$page->getAlias(),array('title'=>$page->getItitle(),'target'=>'_blank'))?>