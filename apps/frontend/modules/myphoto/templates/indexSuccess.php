<div class="inner_page">
<!--Start of Zopim Live Chat Script-->
<script type="text/javascript">
window.$zopim||(function(d,s){var z=$zopim=function(c){
z._.push(c)},$=z.s=
d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute('charset','utf-8');
$.src='//v2.zopim.com/?1zxMJ99qK87WFLpyvfNFYNL2P3fKCslk';z.t=+new Date;$.
type='text/javascript';e.parentNode.insertBefore($,e)})(document,'script');
</script>
<!--End of Zopim Live Chat Script-->

    <h1><?= __('Мои фото') ?></h1>

     <?php include_partial('form', array('form' => $form, 'step2'=>$step2)) ?>

    <div class="s_text_poss">
        <?php
        $page = Doctrine::getTable('Page')
            ->createQuery('a')
            ->leftJoin('a.Translation t')
            ->where('a.alias=?',array('add_photo'))
            ->fetchOne();
        ?>
        <?php if($page): ?>
        <?= $page->getIcontent(ESC_RAW) ?>
        <?php endif; ?>
    </div>
    
<br />		
    <?php if(count($photos)>0):?>
        <div class="photo_list">
            <?php foreach ($photos as $photo): ?>
            <div class="photo_item" style="float: left; width: <?= sfConfig::get('app_photo_width')?>px; padding: 5px;">
               <div class="lady_item_left">
               <?php echo link_to(image_tag('/uploads/photo/middle_thumbnail/'.$photo->getImage()),'http://'.$_SERVER['HTTP_HOST'].'/uploads/photo/original/'.$photo->getImage(),array('class'=>'floatleft')) ?>
               </div>
                <div align="center">
                    <?php if(!$photo->getIsMain()):?>
                      <?= link_to(__('Сделать главной'),'myphoto/setmain?id='.$photo->getId()); ?> <br />
                    <?php endif ?>
                     <?= link_to(__('Удалить'),'myphoto/del?id='.$photo->getId(),array('confirm'=>__('Вы уверены?'))); ?>
                </div>
                <div align="center">
                   <?= $photo->getStatusStr() ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
             <h2><?= __('нет фото') ?> </h2>
    <?php endif; ?>
    <div style="clear: both"> </div>

      <script type="text/javascript">
      $("a.floatleft").fancybox({
    'transitionIn' : 'none',
    'transitionOut' : 'none',
    'titlePosition' : 'inside',
    'titleFormat' : function(title, currentArray, currentIndex, currentOpts) {
    return '(' + (currentIndex + 1) + '/' + currentArray.length + ') ' + title;
    }
    });

    </script>


	
</div>
<?php if ($sf_user->getGuardUser()->getGender()=='w'): ?>
    
<?php endif; ?>
<?php if ($sf_user->isAuthenticated() and !$sf_user->getGuardUser()->getProfile()->getIsActive()): ?>
  <?php if($sf_user->getGuardUser()->getGender()=='w' and count($photos)==0): ?>
    <div align="center">
        <?= __('You must upload one photo at least to continue') ?>
    </div>
   <?php else: ?>
    <div align="center">
        <?= link_to(__('Finish registration'),'registration/finish',array('class'=>'but')) ?>
    </div>
   <?php endif; ?>
  <?php endif; ?>
