<?php use_helper('I18N', 'Date') ?>
<?php include_partial('global/assets') ?>

<div style="font-size: 12px" id="sf_admin_container" class="sf_admin_edit ui-widget ui-widget-content ui-corner-all">
  <div class="fg-toolbar ui-widget-header ui-corner-all">
    <h1> <?= __('Добавление фото') ?>
    <?= link_to(__('Edit profile'),'user/edit?id='.$form->getObject()->getId(),array('style'=>'color: black; display: inline-block; padding: 2px','class'=>'ui-state-default ui-corner-all')) ?> 
    <?= link_to(__('Translate'),'trprofile/edit?id='.$form->getObject()->getProfile()->getId(),array('style'=>'color: black; display: inline-block; padding: 2px','class'=>'ui-state-default ui-corner-all')) ?> 
    <?= link_to(__('Show profile'),'profile/show?id='.$form->getObject()->getId(),array('style'=>'color: black; display: inline-block; padding: 2px','class'=>'ui-state-default ui-corner-all')) ?>
    </h1>
  </div>

<form enctype="multipart/form-data" method="post" class="form_style" action="<?php echo url_for('profile/addphoto?id='.$form->getObject()->getId()) ?>">

  <table>
    <tfoot>
      <tr>
        <td colspan="2">

          <input type="submit" value="<?= __('Сохранить') ?>" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form ?>
    </tbody>
  </table>
</form>
    
    <div>
        <h1><?=  __('Users photo') ?></h1>
        
        
        <?php foreach($photo as $ph): ?>
    <div style="float: left; width: <?= sfConfig::get('app_photo_width')?>">
        <div style="padding: 2px;">
        <?= link_to(image_tag('/uploads/photo/middle_thumbnail/'.$ph->getImage()),'http://'.$_SERVER['HTTP_HOST'].'/uploads/photo/original/'.$ph->getImage(),array('class'=>'alert')); ?>
        </div>
        <div align="center" id="ph_<?= $ph->getId() ?>">
         <?php if(!$ph->getPub()): ?>
          <?= jq_link_to_remote(__('Approve'),
                    array(
                        'update' => 'ph_'.$ph->getId(),
                        'url'    => 'profile/photoact?i='.$ph->getId()
                    ),array('style'=>'font-size: 10px; color: green')
                ) ?>   
        <?php else: ?>
            
          <?= jq_link_to_remote(__('Decline'),
                    array(
                        'update' => 'ph_'.$ph->getId(),
                        'url'    => 'profile/photoact?i='.$ph->getId()
                    ),array('style'=>'font-size: 10px; color: red')
                ) ?>             
            
        <?php endif; ?>
    </div>
    </div>
<?php endforeach ?>
    <div style="clear: both"></div>
    
    </div>  
    

</div>


