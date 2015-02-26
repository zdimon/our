
<h1> <?= __('Anniversary') ?></h1>

<div style="text-align: center; height: 30px; background: #5b3f3b; padding-top: 5px;">
    
    <?php include_partial('menu') ?>

</div>



<br />

<?php if(count($items)==0):?>
                   <div class="adm_mass att_block">
                    <a class="icons attention" href="#"></a>
                    <?php echo __('Ничего не найдено')  ?>
                    </div>
<?php else: ?>

<?php $i=0 ?>
<div class="lady_list">

    <?php foreach ($items as $k=>$v): ?>
    <?php $i++ ?>
      <?php
         $u = Doctrine::getTable('Profile')->find($v['id']);
      ?>
      <?php  include_partial('global/common/search_item',array('profile'=>$u,'arrc'=>$arrc)); ?>

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



<?php endif ?>

<?php if($banners): ?>
<?= $banners->getIcontent()  ?>
<?php endif ?>


