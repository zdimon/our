<?php use_helper('I18N', 'Date') ?>
<?php include_partial('global/assets') ?>
<?php if($p): ?>

    <br />
    <b><?= __('Неавторизованные')?>:</b>
    <!--<?= link_to(__('Запросы').': '.$user->getProfilePartner()->cntContactNew(),'contact/index') ?> &nbsp;&nbsp;&nbsp;-->
    <?= link_to(__('Письма').': '.$user->getProfilePartner()->cntMessageUnrepeat(),'message/index') ?> &nbsp;&nbsp;&nbsp;
    <?= link_to(__('Задания').': '.$user->getProfilePartner()->cntTaskNew(),'task/filterNew') ?> &nbsp;&nbsp;&nbsp;
    <?= link_to(__('Подарки').': '.$user->getProfilePartner()->cntGiftNew(),'gift_order/index') ?> &nbsp;&nbsp;&nbsp;
	<b><?= __('Писем от администратора')?>:</b> (<?= link_to(FaqTable::getCntUnread($sf_user->getGuardUser()->getId()),'faq') ?>)
    
<div style="font-size: 12px" id="sf_admin_container" class="sf_admin_edit ui-widget ui-widget-content ui-corner-all">
  <div class="fg-toolbar ui-widget-header ui-corner-all">
    <h1> <?= __('Анкета партнера')  ?></h1>
  </div>



<table width="100%" class="table_anket">
     <tr>

         <th>
             <?= __('Агенство') ?>
         </th>
         <th>
             <?= __('Документы') ?>
         </th>
         <th>
             <?= __('Статус') ?>
         </th>
         <th>
             <?= __('Логин/пароль') ?>
         </th>
         <th>
             <?= __('Действия') ?>
         </th>
      </tr>

     <tr>
        

         <td valign="top">
             <?= __('ID агенства') ?>: <b> <?= $user->getId() ?></b><br />
             <?= __('Название') ?>: <b> <?= $p->getRealName() ?></b><br />
             <?= __('Директор') ?>: <b> <?= $p->getFirstName() ?></b><br />
             <?= __('Контактное лицо') ?>: <b> <?= $p->getLastName() ?></b><br />
             <?= __('e-mail') ?>: <b> <?= $user->getEmail() ?></b><br />
             <?= __('Страна') ?>: <b> <?= $arrc[$p->getCountry()] ?></b><br />
             <?= __('Город') ?>: <b> <?= $p->getCity() ?></b><br />
             <?= __('Адрес') ?>: <b> <?= $p->getAdress() ?></b><br />
             <?= __('Тел. гор.') ?>: <b> <?= $p->getPhone() ?></b><br />
             <?= __('Тел. моб.') ?>: <b> <?= $p->getMobilePhone() ?></b><br />
            
         </td>

         <td valign="top">
             <?php if(strlen($p->getCustomFile1())>0):?>
               <?= link_to('<span class="ui-icon ui-icon-flag"></span>'.__('Документ 1'),'http://'.$_SERVER['HTTP_HOST'].'/uploads/partner/'.$p->getCustomFile1(),array('target'=>'_blank','id'=>"dialog_link",'class'=>'ui-state-default ui-corner-all'))?><br />
             <?php endif; ?>
               <br />
             <?php if(strlen($p->getCustomFile2())>0):?>
               <?= link_to('<span class="ui-icon ui-icon-flag"></span>'.__('Документ 2'),'http://'.$_SERVER['HTTP_HOST'].'/uploads/partner/'.$p->getCustomFile2(),array('target'=>'_blank','id'=>"dialog_link",'class'=>'ui-state-default ui-corner-all'))?><br />
             <?php endif; ?>
               <br />
             <?php if(strlen($p->getCustomFile3())>0):?>
               <?= link_to('<span class="ui-icon ui-icon-flag"></span>'.__('Документ 3'),'http://'.$_SERVER['HTTP_HOST'].'/uploads/partner/'.$p->getCustomFile3(),array('target'=>'_blank','id'=>"dialog_link",'class'=>'ui-state-default ui-corner-all'))?><br />
             <?php endif; ?>
         </td>
 

         <td valign="top">
             <?php if($user->getIsActive()):?>
               <?= __('активен') ?>
             <?php else: ?>
               <?= __('НЕактивен') ?>
             <?php endif ?>
         </td>

         <td valign="top">
             <?= __('Логин') ?>: <b> <?= $user->getUsername() ?></b><br />
             <?= __('Пароль') ?>: <b> <?= $user->getPc() ?></b><br />
             
         </td>

         <td valign="top">
            <?= link_to('<span class="ui-icon ui-icon-edit"></span>'.__('Изменить'),'partner/edit?id='.$p->getId(),array('id'=>"dialog_link",'class'=>'ui-state-default ui-corner-all')) ?>
         </td>
      <tr>
</table>

<!--
<div class="fg-toolbar ui-widget-header ui-corner-all">

<h1> <?= __('Банковская информация')  ?></h1>
</div>
    <table  width="100%">
        <tr>
            <td>
               <?= __('Имя бенефициара') ?> :
            </td>
            <td>

            </td>

            <td>
                <?= __('Аккаунт бенефициара') ?>
            </td>
            <td>

            </td>

        </tr>

        <tr>
            <td>
               <?= __('Адрес бенефициара') ?> :
            </td>
            <td>

            </td>

            <td>
                <?= __('Телефон бенефициара') ?>
            </td>
            <td>

            </td>

        </tr>

        <tr>
            <td>
               <?= __('Банк бенефициара') ?> :
            </td>
            <td>

            </td>

            <td>
                <?= __('SWIFT ABA or National ID') ?>
            </td>
            <td>

            </td>

        </tr>

        <tr>
            <td>
               <?= __('Адрес банка бенефициара') ?> :
            </td>
            <td>

            </td>

            <td>
                <?= __('Страна') ?>
            </td>
            <td>

            </td>

        </tr>

        <tr>
            <td>
               <?= __('Инструкции') ?> :
            </td>
            <td>

            </td>

            <td>
                <?= __('Комментарии') ?>
            </td>
            <td>

            </td>

        </tr>

    </table>
-->

<div class="fg-toolbar ui-widget-header ui-corner-all">

<h1> <?= __('Статистика')  ?></h1>
</div>
<table width="100%"  class="table_stat">
    <tr>
        <td valign="top">
            <table width="100%" class="table_inner">
                  <tr>
                      <th align="left"><b><?= __('Анкеты') ?></b></th>
                      <th width="1%"><b><?= __('Кол-во') ?></b></th>
                  </tr>
                  <tr>
                      <td><?= link_to(__('Анкеты Агенства (всего)'),'user/index')  ?> </td>
                      <td><?= $p->cntAnketAll() ?></td>
                  </tr>

                  <tr>
                      <td><?= link_to(__('Не подтвержденные'),'user/filterOnapprove') ?></td>
                      <td><?= $p->cntAnketOnapprove() ?></td>
                  </tr>

                  <tr>
                      <td><?= link_to(__('Не активные'),'user/filterNoactive') ?></td>
                      <td><?= $p->cntAnketNoactive() ?></td>
                  </tr>

                  <tr>
                      <td><?= link_to(__('На деактивацию'),'user/filterOndeactivate') ?></td>
                      <td><?= $p->cntAnketDeactive() ?></td>
                  </tr>

                  <tr>
                      <td><?= link_to(__('На удаление'),'user/filterOndelete') ?></td>
                      <td><?= $p->cntAnketDelete() ?></td>
                  </tr>

                  <tr>
                      <th align="left"><b><?= __('Фотографии') ?></b></th>
                      <th><b><?= __('Кол-во') ?></b></th>
                  </tr>

                  <tr>
                      <td><?= link_to(__('Всего'),'photo_collection', array('action' => 'filter'), array('query_string' => '_reset', 'method' => 'post'))  ?></td>
                      <td><?= $p->cntPhotoAll() ?></td>
                  </tr>

                  <tr>
                      <td><?= link_to(__('Не подтвержденные'),'photo/filterOnapprove') ?></td>
                      <td><?= $p->cntPhotoOnapprove() ?></td>
                  </tr>
<!--
                  <tr>
                      <th align="left"><b><?= __('Статистика анкет') ?></b></th>
                      <th><b><?= __('Кол-во') ?></b></th>
                  </tr>

                  <tr>
                      <td><?= link_to(__('Анкет за сегодня'),'user/index') ?></td>
                      <td><?= $p->cntStatAll() ?></td>
                  </tr>

                  <tr>
                      <td><?= link_to(__('Анкет за вчера'),'user/index') ?></td>
                      <td>0</td>
                  </tr>

                  <tr>
                      <td><?= link_to(__('Анкет в этом месяце'),'user/index') ?></td>
                      <td>0</td>
                  </tr>

                  <tr>
                      <td><?= link_to(__('Анкет в прошлом месяце'),'user/index') ?></td>
                      <td>0</td>
                  </tr>

                  <tr>
                      <td><?= link_to(__('Анкет в этом году'),'user/index') ?></td>
                      <td>0</td>
                  </tr>

                  <tr>
                      <td><?= link_to(__('Анкет в прошлом году'),'user/index') ?></td>
                      <td>0</td>
                  </tr>
-->
              </table>
        </td>


        <td valign="top">
            <table width="100%"  class="table_inner">
                  <tr>
                      <th align="left"><b><?= __('Письма') ?></b></th>
                      <th><b><?= __('Кол-во') ?></b></th>
                  </tr>

                  <tr>
                      <td><?= link_to(__('Письма (всего)'),'message_collection', array('action' => 'filter'), array('query_string' => '_reset', 'method' => 'post')) ?></td>
                      <td><?= $p->cntMessageAll() ?></td>
                  </tr>


                  <tr>
                      <td><?= link_to(__('Письма (не прочтенные)'),'message/filterAllUnread') ?></td>
                      <td><?= $p->cntMessageUnread() ?></td>
                  </tr>

                  <tr>
                      <td><?= link_to(__('Письма (не отвеченные)'),'message/filterAllUnreply') ?></td>
                      <td><?= $p->cntMessageUnrepeat() ?></td>
                  </tr>
                  <!--
                  <tr>
                      <td><?= link_to(__('Письма (отклоненные)'),'message/filterAllReject') ?></td>
                      <td><?= $p->cntMessageReject() ?></td>
                  </tr>
                  -->

                  <tr>
                      <th align="left"><b><?= __('Подарки') ?></b></th>
                      <th><b><?= __('Кол-во') ?></b></th>
                  </tr>

                  <tr>
                      <td><?= link_to(__('Подарки (всего)'),'gift_order_collection', array('action' => 'filter'), array('query_string' => '_reset', 'method' => 'post')) ?></td>
                      <td><?= $p->cntGiftAll() ?></td>
                  </tr>
<!--
                  <tr>
                      <td><?= link_to(__('Подарки (в корзине)'),'gift_order/filterNotdelivered') ?></td>
                      <td><?= $p->cntGiftNew() ?></td>
                  </tr>
-->

                  <tr>
                      <td><?= link_to(__('Подарки (не доставленные)'),'gift_order/filterNotdelivered') ?></td>
                      <td><?= $p->cntGiftUnsend() ?></td>
                  </tr>

                  <tr>
                      <td><?= link_to(__('Подарки (доставленные)'),'gift_order/filterDelivered') ?></td>
                      <td><?= $p->cntGiftSend() ?></td>
                  </tr>


                  <tr>
                      <td><?= link_to(__('Подарки (отклоненные)'),'gift_order/filterRejected') ?></td>
                      <td><?= $p->cntGiftReject() ?></td>
                  </tr>
<!--
                  <tr>
                      <th align="left"><b><?= __('Запросы') ?></b></th>
                      <th><b><?= __('Кол-во') ?></b></th>
                  </tr>

                  <tr>
                      <td><?= link_to(__('Запросы (всего)'),'contact_collection', array('action' => 'filter'), array('query_string' => '_reset', 'method' => 'post')) ?></td>
                      <td><?= $p->cntContactAll() ?></td>
                  </tr>

                  <tr>
                      <td><?= link_to(__('Запросы (новые)'),'contact/filterNew') ?></td>
                      <td><?= $p->cntContactNew() ?></td>
                  </tr>

                  <tr>
                      <td><?= link_to(__('Запросы (подтвержденные)'),'contact/filterDelivered') ?></td>
                      <td><?= $p->cntContactDone() ?></td>
                  </tr>

                  <tr>
                      <td><?= link_to(__('Запросы (не подтвержденные)'),'contact/filterNotdelivered') ?></td>
                      <td><?= $p->cntTaskNotapprove() ?></td>
                  </tr>


                  <tr>
                      <td><?= link_to(__('Запросы (отклоненные)'),'contact/filterRejected') ?></td>
                      <td><?= $p->cntContactReject() ?></td>
                  </tr>

                  <tr>
                      <th align="left"><b><?= __('Жалобы мужчин') ?></b></th>
                      <th><b><?= __('Кол-во') ?></b></th>
                  </tr>

                  <tr>
                      <td><?= link_to(__('Нарушения (все)'),'claim_collection', array('action' => 'filter'), array('query_string' => '_reset', 'method' => 'post')) ?></td>
                      <td><?= $p->cntClaimAll() ?></td>
                  </tr>

                  <tr>
                      <td><?= link_to(__('Нарушения (новые)'),'claim/index') ?></td>
                      <td><?= $p->cntClaimNew() ?></td>
                  </tr>
-->
              </table>
            
        </td>


    </tr>
</table>
</div>
<?php endif ?>


