<div style="height: 320px; overflow: auto">
    
    <?php foreach ($pr as $p): ?>
      <div style="float: left; height: 350px; width: 320px; border: 1px solid red; padding: 2px; margin: 2px" id="us_<?= $p->getUserId() ?>">
          <div style="float: left; width: 60px;"><?=  image_tag($p->getUrlImageSmall()) ?></div>
          <div style="float: right;width: 210px;"> <?php include_partial('user/info',array('profile'=>$p)) ?>
              <br />
               <?php echo jq_link_to_remote( __('Approve'), array(
                            'update' => 'up_'.$type,
                            'loading' => '$("#chat_loading").show();$("#chat_content").hide()',
                            'complete' => '$("#chat_loading").hide();$("#chat_content").show()',
                            'script'=>true,
                            'method'=>'GET',
                            'url' => 'user/ajaxapprove?i='.$p->getId().'&type='.$type
                        ),array('style'=>'color: green', 'confirm'=>__('Are you sure?'))
                        );
                ?>
              
          
          </div>
          
          
         
          
          
      </div>   
    <?php endforeach; ?>
    <div style="clear: both"></div>
</div>