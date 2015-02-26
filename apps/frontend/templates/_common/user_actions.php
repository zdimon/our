<ul class="list_user_actions">
<?php if($sf_user->isAuthenticated() and $u->getId()!=$sf_user->getGuardUser()->getId()):?>


             <li><?= link_to(__('Send the message'),'message/send?username='.$u->getUsername(),array('id'=>'l_send_message'))  ?></li>
             <li><?= link_to(__('Send interest'),'interest/add?username='.$u->getUsername(),array('id'=>'l_add_friend')) ?></li>
             <li><?= link_to(__('Add to favourites'),'friend/add?username='.$u->getUsername(),array('id'=>'l_add_friend')) ?></li>

    <!--
             <?php if(sfConfig::get('app_use_smile')  and $sf_request->getParameter('module')!='smile'):?>
             <li> <?= link_to(__('Послать улыбку'),'smile/send?username='.$u->getUsername(),array('id'=>'l_send_smile'))  ?></li>
             <?php endif ?>

            <?php if(sfConfig::get('app_use_real_gift') and $u->getGender()=='w'  and $sf_request->getParameter('module')!='gift'):?>
              <li><?= link_to(__('Подарить подарок'),'giftbox/add?username='.$u->getUsername(),array('id'=>'l_send_real_gift'))  ?></li>
            <?php endif ?>

            <?php if(sfConfig::get('app_use_virtual_gift') and $u->getGender()=='w'  and $sf_request->getParameter('module')!='vgift'):?>
              <li><?= link_to(__('Подарить виртуальный подарок'),'vgiftbox/add?username='.$u->getUsername(),array('id'=>'l_send_virtual_gift'))  ?></li>
            <?php endif ?>

            <?php if(sfConfig::get('app_use_fav') and $sf_request->getParameter('module')!='friend'):?>
              <li><?= link_to(__('Добавить в контакты'),'friend/add?username='.$u->getUsername(),array('id'=>'l_add_friend')) ?></li>
            <?php endif ?>

            <?php if(sfConfig::get('app_use_black')):?>
              <li><?= link_to(__('Добавить в черный список'),'blacklist/add?username='.$u->getUsername(),array('id'=>'l_add_blacklist')) ?></li>
            <?php endif ?>

            <?php if(sfConfig::get('app_use_claim') and $u->getGender()=='w'):?>
             <li> <?= link_to(__('Пожаловаться'),'claim/index?username='.$u->getUsername(),array('id'=>'l_claim')) ?></li>
            <?php endif ?>

           <?php if($u->getIsOnline() and sfConfig::get('app_use_chat')): ?>
             <li> <?= link_to(__('Вызвать в чат'),'chat/dispatcher?user_id='.$u->getId(),array('id'=>'l_call_chat')) ?></li>
           <?php endif ?>
           -->

  <?php endif ?>
</ul>

              
     

        	