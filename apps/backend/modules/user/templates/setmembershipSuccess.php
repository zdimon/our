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
        