 <div id="on_<?= $f->getId() ?>">
                    <?php if($f->getIsOnline()): ?>
                        <?= jq_link_to_remote(__('deactivate'),
                    array(
                        'update' => 'on_'.$f->getId(),
                        'url'    => 'false/online?i='.$f->getId().'&act=deact'
                    ),array('style'=>'display: block; width: 160px; margin-bottom: 2px')
                ) ?>      
            <?php else: ?>
                <?= jq_link_to_remote(__('activate'),
                             array(
                                 'update' => 'on_'.$f->getId(),
                                 'url'    => 'false/online?i='.$f->getId().'&act=act'
                             ),array('style'=>'display: block; width: 160px; margin-bottom: 2px')
                         ) ?>    

            <?php endif; ?>
        </div>