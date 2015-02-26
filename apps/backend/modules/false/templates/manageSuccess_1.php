<?php include_partial('global/assets') ?>
<h1><?= __('Managing false profiles') ?></h1>

<div class="sf_admin_flashes ui-widget">
<?php if ($sf_user->hasFlash('notice')): ?>
  <div class="notice ui-state-highlight ui-corner-all">
    <span class="ui-icon ui-icon-info floatleft"></span>&nbsp;
    <?php echo __($sf_user->getFlash('notice'), array(), 'sf_admin') ?>
  </div>
<?php endif; ?>
</div>

<div id="false_list" style="overflow: auto; width: 280px; height: 390px; border: 1px solid silver; float: left; padding: 5px;" >
    <div id="false_list_loading" class="loading" style="display: none"><?= __('Loading') ?>...</div>
    <?php foreach($fs as $f): ?>
    <div style="float: left; width: 80px; height: 100px; margin: 2px;">
        <?php 
         if($f->getProfile()->getUserId()==$_SESSION['current_false'])
         {
             $st = array('style'=>'border: 2px solid red;');
         } else {
             $st = array();
         }
        ?>
        <?=
              jq_link_to_remote(image_tag($f->getProfile()->getUrlImageSmall(),$st), array(
                            'update' => 'false_list',
                            'loading' => '$("#false_list_loading").show()',
                            'complete' => '$("#false_list_loading").hide()',
                            'script'=>true,
                            'method'=>'GET',
                            'url' => 'false/setactive?u='.$f->getProfile()->getUserId()
               ));
    ?>
        <div align="center"> <?= $f->getUsername() ?> [<?= $f->getId() ?>]</div>
    </div>
    <?php endforeach; ?>
    
</div>



<div id="gallery_list" style="overflow: auto; width: 680px; height: 390px; border: 1px solid silver; float: right; padding: 5px;" >
    <div id="gallery_list_loading" class="loading" style="display: none"><?= __('Loading') ?>...</div>
</div>

<div style="clear: both"></div>

<div style="border: 1px solid silver; padding: 5px; margin: 5px;" id="message_form">
    <h2><?= __('Message form') ?></h2>
    
</div>

              <script>
                <?php echo jq_remote_function( array(
                            'update' => 'gallery_list',
                            'loading' => '$("#gallery_list_loading").show();',
                            'complete' => '$("#gallery_list_loading").hide();',
                            'script'=>true,
                            'method'=>'GET',
                            'url' => 'false/gallery'
                        )
                        )
                ?>
                </script>   
                