
<div align="center">

<?php if ($pager->haveToPaginate()): ?>
<div class="line_page_navigator">

    <p>
<?= __('Total') ?>: <span class="red bold kol-vo"><?php echo $pager->getNbResults()?></span>
        </p>


<span class="pagenator">
<span class="red bold">
    
    <?php if($pager->getPage()>1): ?>
        <?=
    jq_link_to_remote('<<',
        array(
            'update' => 'gallery_list',
            'loading' => '$("#gallery_list_loading").show()',
            'complete' => '$("#gallery_list_loading").hide()',
            'script'=>true,
            'method'=>'GET',
            'url' => $sf_params->get('module').'/'.$sf_params->get('action').params2stra(array('page'=>$pager->getFirstPage()))
        ));
    ?>
    <?php endif; ?>
    
    <?=
    jq_link_to_remote('<',
        array(
            'update' => 'gallery_list',
            'loading' => '$("#gallery_list_loading").show()',
            'complete' => '$("#gallery_list_loading").hide()',
            'script'=>true,
            'method'=>'GET',
            'url' => $sf_params->get('module').'/'.$sf_params->get('action').params2stra(array('page'=>$pager->getPreviousPage()))
        ));
    ?>
    <?php foreach ($pager->getLinks() as $page): ?>

    <?php if($page == $pager->getPage()):?>
    <span style="color: red">  <?= $page ?> </span>
     <?php else: ?>
        <?=
        jq_link_to_remote($page,
            array(
                'update' => 'gallery_list',
                'loading' => '$("#gallery_list_loading").show()',
                'complete' => '$("#gallery_list_loading").hide()',
                'script'=>true,
                'method'=>'GET',
                'url' => $sf_params->get('module').'/'.$sf_params->get('action').params2stra(array('page'=>$page))
            ));
        ?>
     <?php endif; ?>

    <?php // echo link_to_unless($page == $pager->getPage(), $page, $sf_params->get('module').'/'.$sf_params->get('action').$sf_request->params2str(array('page'=>$page))) ?>&nbsp;
    <?php endforeach; ?>

    
    <?=
    jq_link_to_remote('>',
        array(
            'update' => 'gallery_list',
            'loading' => '$("#gallery_list_loading").show()',
            'complete' => '$("#gallery_list_loading").hide()',
            'script'=>true,
            'method'=>'GET',
            'url' => $sf_params->get('module').'/'.$sf_params->get('action').params2stra(array('page'=>$pager->getNextPage()))
        ));
    ?>
    
    <?php if($pager->getPage()<$pager->getLastPage()): ?>
        <?=
    jq_link_to_remote('>>',
        array(
            'update' => 'gallery_list',
            'loading' => '$("#gallery_list_loading").show()',
            'complete' => '$("#gallery_list_loading").hide()',
            'script'=>true,
            'method'=>'GET',
            'url' => $sf_params->get('module').'/'.$sf_params->get('action').params2stra(array('page'=>$pager->getLastPage()))
        ));
    ?>
    <?php endif; ?>
</span>
</span>
</div>
<?php endif; ?>


</div>


<?php 
function params2stra($additional_parameters=array(), $clean_parameters=array('module', 'action'))
  {
    $parameters = sfContext::getInstance ()->getRequest ()->getParameterHolder()->getAll();
    foreach ($clean_parameters as $value)
    	if(isset($parameters[$value]))
    		unset($parameters[$value]);


    foreach ($additional_parameters as $key => $value)
    	$parameters[$key] = $value;

    foreach ($parameters as $key => $value)
      {
        if(is_array($value))
        {

           unset($parameters[$key]);
           foreach($value as $k=>$v)
           {
             $str = $key.'['.$k.']';
             $parameters[$str] = $str.'='.$v;
            //die;

           }

        }
        else
        {
           $parameters[$key] = $key.'='.$value;
        }
      }




    return '?'.implode('&', $parameters);
  }



?>