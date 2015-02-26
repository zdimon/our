<?php if($p->getsfGuardUser()->getIsOnline())
            {
                $imc = 'icon_chat.png';
            }
            else
            {
                $imc = 'icon_chat2.png';
            }
        ?>
        <div class="icon_pre_item">
            <a title="<?= __('Call to chat') ?>" onClick="window.open('<?= url_for('chat/dispatcher?user_id='.$p->getUserId()) ?>','chatwindow','width=700,height=600')" href="#" ><img width="16" height="16" src="/pic/<?= $imc ?>"></a>
        </div>