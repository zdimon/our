<?php include_partial('global/assets') ?>
<h1> <?= __('Gallery')  ?></h1>
<div style="float: right">
<form action="<?= url_for('user/gallery') ?>" method="GET">
    ID:<input type="text" name="user_id" style="width: 40px">
    email:<input type="text" name="email" style="width: 100px">
    login:<input type="text" name="login" style="width: 100px">
    <input type="submit" value="<?= __('Search') ?>" />
</form>
</div>
<div style="clear: both"></div>
<div>
 <?php foreach ($pager->getResults() as $p): ?>
    <div style="float: left; width: 110px; height: 140px; margin: 2px">
        <div style="width: 80px; height: 80px; overflow: hidden">
          <?=  link_to(image_tag($p->getUrlImageSmall()),'user/filterUserid?user_id='.$p->getUserId()) ?>
        </div>
        <div style="text-align: center">
            <?= $p->getsfGuardUser()->getUsername() ?> [<?= $p->getUserSpecId() ?>]
            <p>
            <?= link_to(__('sent'),'message/filterSend?id='.$p->getUserId()) ?>
            <?= link_to(__('received'),'message/filterRead?id='.$p->getUserId()) ?>
            </p>
        </div>
    </div>

 <?php endforeach; ?>
    <div style="clear: both"></div>
    <div style="text-align: center; margin-top: 20px;">
    <?php echo pager_navigation($pager, url_for('user/gallery'),array('alias')) ?>
    </div>
    
</div>