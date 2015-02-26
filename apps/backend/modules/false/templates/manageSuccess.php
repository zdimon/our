<?php include_partial('global/assets') ?>
<h1><?= __('Managing false profiles') ?></h1>

<?= link_to(__('Man'),'false/manage?gender=m') ?> &nbsp;&nbsp;&nbsp; <?= link_to(__('Woman'),'false/manage?gender=w') ?>

<div class="sf_admin_flashes ui-widget">
<?php if ($sf_user->hasFlash('notice')): ?>
  <div class="notice ui-state-highlight ui-corner-all">
    <span class="ui-icon ui-icon-info floatleft"></span>&nbsp;
    <?php echo __($sf_user->getFlash('notice'), array(), 'sf_admin') ?>
  </div>
<?php endif; ?>
</div>

<div id="false_list" style=" width: 900px; border: 1px solid silver; float: left; padding: 5px;" >
    <div id="false_list_loading" class="loading" style="display: none"><?= __('Loading') ?>...</div>
    <?php foreach($fs as $f): ?>
    <div style="float: left; width: 80px; height: 120px; margin: 2px;">
        
        <?=
              link_to(image_tag($f->getProfile()->getUrlImageSmall()),'http://'.$_SERVER['HTTP_HOST'].'/'.$f->getCulture().'/profile/superlogin?salt='.$f->getSalt().'&s=1',array('target'=>'_blank'));
    ?>
        <div align="center"> <?= $f->getUsername() ?> [<?= $f->getId() ?>]</div>
        
        <div id="on_<?= $f->getId() ?>">
                    <?php if($f->getIsOnline()): ?>
                        <?= jq_link_to_remote(__('deactivate'),
                    array(
                        'update' => 'on_'.$f->getId(),
                        'url'    => 'false/online?i='.$f->getId().'&act=deact'
                    ),array('style'=>'display: block; width: 160px; margin-bottom: 2px')
                ) ?>      
            <?php else: ?>
                <?= jq_link_to_remote(__('activate'),
                             array(
                                 'update' => 'on_'.$f->getId(),
                                 'url'    => 'false/online?i='.$f->getId().'&act=act'
                             ),array('style'=>'display: block; width: 160px; margin-bottom: 2px')
                         ) ?>    

            <?php endif; ?>
        </div>
        
    </div>
    <?php endforeach; ?>
    
</div>

