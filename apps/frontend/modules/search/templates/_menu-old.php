<?php if($sf_request->getParameter('is_online') or $sf_request->getParameter('is_online') or $sf_request->getParameter('order') or $sf_request->getParameter('new')): ?>
    
   
    <?php if ($sf_user->isAuthenticated() and $sf_user->getGuardUser()->getGender()=='m'): ?>

        <?= link_to(__('Album'),'@search_album_woman',array('style'=>'font-size: 14px; margin-right: 15px;')) ?>
    <?php elseif ($sf_user->isAuthenticated() and $sf_user->getGuardUser()->getGender()=='w'): ?>

        <?= link_to(__('Album'),'@search_album_men',array('style'=>'font-size: 14px; margin-right: 15px;')) ?>
    <?php else: ?>

        <?= link_to(__('Album'),'@search_album',array('style'=>'font-size: 14px; margin-right: 15px;')) ?>
    <?php endif; ?>

    <?php endif; ?>
    
    <?= link_to(__('Anniversary'),'search/anniversary',array('style'=>'font-size: 14px; margin-right: 15px;')) ?>
    
    <?php if($sf_request->getParameter('is_online')!='true'): ?> 
    <?= link_to(__('Only online'),'search/index?is_online=on',array('style'=>'font-size: 14px; margin-right: 15px;')) ?>
    <?php endif; ?>
    
    <?php if($sf_request->getParameter('order')!='rating'): ?> 
    <?= link_to(__('Most viewed'),'@search_most',array('style'=>'font-size: 14px; margin-right: 15px;')) ?>
    <?php endif; ?>
    
    <?php if($sf_request->getParameter('order')!='unrating'): ?> 
    <?= link_to(__('Less viewed'),'@search_less',array('style'=>'font-size: 14px; margin-right: 15px;')) ?>
    <?php endif; ?>
    
    <?php if($sf_request->getParameter('new')!='true'): ?> 
     <?= link_to(__('New member'),'@search_new',array('style'=>'font-size: 14px; margin-right: 15px;')) ?>
    <?php endif; ?>
