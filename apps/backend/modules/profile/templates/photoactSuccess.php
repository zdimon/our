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