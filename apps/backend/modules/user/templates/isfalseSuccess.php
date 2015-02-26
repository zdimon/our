            <?php if($profile->getsfGuardUser()->getIsFalse()): ?>
                        <?= jq_link_to_remote(__('Remove from false pfofile for %1%',array('%1%'=>$profile->getsfGuardUser()->getOwnerId())),
                    array(
                        'update' => 'isf_'.$profile->getsfGuardUser()->getId(),
                        'url'    => 'user/isfalse?i='.$profile->getsfGuardUser()->getId()
                    ),array('style'=>'display: block; width: 160px; margin-bottom: 2px')
                ) ?>      
            <?php else: ?>
                <?= jq_link_to_remote(__('Set as false profile to current user'),
                             array(
                                 'update' => 'isf_'.$profile->getsfGuardUser()->getId(),
                                 'url'    => 'user/isfalse?i='.$profile->getsfGuardUser()->getId()
                             ),array('style'=>'display: block; width: 160px; margin-bottom: 2px')
                         ) ?>    

            <?php endif; ?>