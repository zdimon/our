
<h1><?= $title ?></h1>

<div style="text-align: center; height: 30px; background: #5b3f3b; padding-top: 5px;">
   
    <?php include_partial('menu') ?>
</div>




<br />

<?php if(!$pager->getNbResults()):?>
                   <div class="adm_mass att_block">
                    <a class="icons attention" href="#"></a>
                    <?php echo __('Ничего не найдено')  ?>
                    </div>
<?php else: ?>


<div class="lady_list">
    <?php $i=0 ?>
    <?php foreach ($pager->getResults() as $u): ?>
        <?php $i++ ?>
      <?php include_partial('global/common/search_item',array('profile'=>$u,'arrc'=>$arrc)); ?>
        <?php if($i%9==0): ?>
            <div style="clear: both"></div>
            <div align="center">

                    <?php if($banners): ?>
                       <?= $banners->getIcontent()  ?>
                    <?php endif ?>

            </div>
            <div style="clear: both"></div>
        <?php endif ?>
    <?php endforeach; ?>
    

 </div>

<?php if($pager_routing): ?>
  <?php echo pager_navigation($pager, url_for($pager_routing)) ?>
<?php else: ?>
  <?php echo pager_navigation($pager, url_for('search/index')) ?>
<?php endif; ?>

<?php endif ?>


<!--
<?php // $adm = ProfileTable::getAdmins(); ?>
<h1><?= __('Our administrators') ?></h1>
<div class="lady_list">
    <?php foreach ($adm as $a): ?>
       <?php // include_partial('global/common/search_item',array('profile'=>$a->getProfile(),'arrc'=>$arrc,'rem_fav'=>'true','rem_int'=>'true')); ?>
    <?php endforeach; ?>
 </div>
-->
