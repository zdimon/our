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
                
 