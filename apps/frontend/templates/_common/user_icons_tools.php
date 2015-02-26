
                            <div class="icons">
                                <?php if($u->getIsOnline() and sfConfig::get('app_use_chat')): ?>
                                <a class="icon_1" href="<?= url_for('chat/dispatcher?user_id='.$u->getId()) ?>"></a>
                                <?php endif ?>
                                <a class="icon_2" href="<?= url_for('message/send?username='.$u->getUsername())?>"></a>
                                 <?php if($u->getProfile()->getCanResiveGift()):?>
                                    <a class="icon_3" href="<?= url_for('giftbox/add?username='.$u->getUsername()) ?>"></a>
                                 <?php endif ?>
                                <a class="icon_4" href="<?= url_for('friend/add?username='.$u->getUsername()) ?>"></a>
                            </div>
        	