<?php use_helper('I18N', 'Date') ?>
<?php include_partial('global/assets') ?>

<div id="sf_admin_container" class="sf_admin_edit ui-widget ui-widget-content ui-corner-all">
  <div class="fg-toolbar ui-widget-header ui-corner-all">
    <h1><?php echo __('Personal information') ?> 
    <?= link_to(__('Translate'),'trprofile/edit?id='.$form->getObject()->getId(),array('style'=>'color: black; display: inline-block; padding: 2px','class'=>'ui-state-default ui-corner-all')) ?> 
    <?= link_to(__('Photo'),'profile/addphoto?id='.$form->getObject()->getUserId(),array('style'=>'color: black; display: inline-block; padding: 2px','class'=>'ui-state-default ui-corner-all')) ?>
    <?= link_to(__('Show profile'),'profile/show?id='.$form->getObject()->getUserId(),array('style'=>'color: black; display: inline-block; padding: 2px','class'=>'ui-state-default ui-corner-all')) ?>
    </h1>
  </div>

  <?php include_partial('user/flashes') ?>



  <div id="sf_admin_content">
    <?php include_partial('user/form', array('profile' => $profile, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>


   <?php if($profile->getGender()=='m'): ?>
    <div style="border: 1px solid silver; padding: 10px; font-size: 12px;" id="mbs">
        
        <?= __('Current membership') ?>: <strong> <?= $profile->getNameMembership() ?></strong>  <?= __('Date expire') ?>:  <strong> <?= format_date($profile->getsfGuardUser()->getDateExpire(),'D') ?></strong>
        
        
                <br />
                        <?= jq_link_to_remote(__('Make Free membership'),
                             array(
                                 'update' => 'mbs',
                                 'url'    => 'user/setmembership?i=1&m=0&u='.$profile->getId(),
                             ),array('style'=>'font-size: 12px; color: green')
                         ) ?>  
                
        
        <br />
                        <?= jq_link_to_remote(__('Make Bronze membership for 1 month'),
                             array(
                                 'update' => 'mbs',
                                 'url'    => 'user/setmembership?i=2&m=1&u='.$profile->getId(),
                             ),array('style'=>'font-size: 12px; color: green')
                         ) ?>  
        <br />
                          <?= jq_link_to_remote(__('Make Silver membership for 1 month'),
                             array(
                                 'update' => 'mbs',
                                 'url'    => 'user/setmembership?i=3&m=1&u='.$profile->getId(),
                             ),array('style'=>'font-size: 12px; color: green')
                         ) ?>  
       
        <br />
                          <?= jq_link_to_remote(__('Make Gold membership for 1 month'),
                             array(
                                 'update' => 'mbs',
                                 'url'    => 'user/setmembership?i=4&m=1&u='.$profile->getId(),
                             ),array('style'=>'font-size: 12px; color: green')
                         ) ?>  
        
        <br />
                          <?= jq_link_to_remote(__('Make Platinum membership for 1 month'),
                             array(
                                 'update' => 'mbs',
                                 'url'    => 'user/setmembership?i=5&m=1&u='.$profile->getId(),
                             ),array('style'=>'font-size: 12px; color: green')
                         ) ?>          
        <br/>
        <br />
                        <?= jq_link_to_remote(__('Make Bronze membership for 2 month'),
                             array(
                                 'update' => 'mbs',
                                 'url'    => 'user/setmembership?i=2&m=2&u='.$profile->getId(),
                             ),array('style'=>'font-size: 12px; color: green')
                         ) ?>  
        <br />
                          <?= jq_link_to_remote(__('Make Silver membership for 2 month'),
                             array(
                                 'update' => 'mbs',
                                 'url'    => 'user/setmembership?i=3&m=2&u='.$profile->getId(),
                             ),array('style'=>'font-size: 12px; color: green')
                         ) ?>  
       
        <br />
                          <?= jq_link_to_remote(__('Make Gold membership for 2 month'),
                             array(
                                 'update' => 'mbs',
                                 'url'    => 'user/setmembership?i=4&m=2&u='.$profile->getId(),
                             ),array('style'=>'font-size: 12px; color: green')
                         ) ?>  
        
        <br />
                          <?= jq_link_to_remote(__('Make Platinum membership for 2 month'),
                             array(
                                 'update' => 'mbs',
                                 'url'    => 'user/setmembership?i=5&m=2&u='.$profile->getId(),
                             ),array('style'=>'font-size: 12px; color: green')
                         ) ?>   
               <br/>
               <br />
                        <?= jq_link_to_remote(__('Make Bronze membership for 3 month'),
                             array(
                                 'update' => 'mbs',
                                 'url'    => 'user/setmembership?i=2&m=3&u='.$profile->getId(),
                             ),array('style'=>'font-size: 12px; color: green')
                         ) ?>  
        <br />
                          <?= jq_link_to_remote(__('Make Silver membership for 3 month'),
                             array(
                                 'update' => 'mbs',
                                 'url'    => 'user/setmembership?i=3&m=3&u='.$profile->getId(),
                             ),array('style'=>'font-size: 12px; color: green')
                         ) ?>  
       
        <br />
                          <?= jq_link_to_remote(__('Make Gold membership for 3 month'),
                             array(
                                 'update' => 'mbs',
                                 'url'    => 'user/setmembership?i=4&m=3&u='.$profile->getId(),
                             ),array('style'=>'font-size: 12px; color: green')
                         ) ?>  
        
        <br />
                          <?= jq_link_to_remote(__('Make Platinum membership for 3 month'),
                             array(
                                 'update' => 'mbs',
                                 'url'    => 'user/setmembership?i=5&m=3&u='.$profile->getId(),
                             ),array('style'=>'font-size: 12px; color: green')
                         ) ?>             
        
    </div> 
    
    <?php endif; ?>
    

</div>
