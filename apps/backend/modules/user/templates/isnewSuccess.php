            <?php if($profile->getIsNew()): ?>
                        <?= jq_link_to_remote(__('YES'),
                    array(
                        'update' => 'isn_'.$profile->getId(),
                        'url'    => 'user/isnew?i='.$profile->getId()
                    ),array('style'=>'font-size: 10px; color: red')
                ) ?>      
            <?php else: ?>
                <?= jq_link_to_remote(__('NO'),
                             array(
                                 'update' => 'isn_'.$profile->getId(),
                                 'url'    => 'user/isnew?i='.$profile->getId()
                             ),array('style'=>'font-size: 10px; color: green')
                         ) ?>    

            <?php endif; ?>