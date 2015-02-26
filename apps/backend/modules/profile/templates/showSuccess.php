<?php use_helper('I18N', 'Date') ?>
<?php include_partial('global/assets') ?>

<div style="font-size: 12px" id="sf_admin_container" class="sf_admin_edit ui-widget ui-widget-content ui-corner-all">
  <div class="fg-toolbar ui-widget-header ui-corner-all">
    <h1> <?= __('Information') ?>
    <?= link_to(__('Edit profile'),'user/edit?id='.$p->getUserId(),array('style'=>'color: black; display: inline-block; padding: 2px','class'=>'ui-state-default ui-corner-all')) ?> 
    <?= link_to(__('Photo'),'profile/addphoto?id='.$p->getUserId(),array('style'=>'color: black; display: inline-block; padding: 2px','class'=>'ui-state-default ui-corner-all')) ?>
    <?= link_to(__('Translate'),'trprofile/edit?id='.$p->getId(),array('style'=>'color: black; display: inline-block; padding: 2px','class'=>'ui-state-default ui-corner-all')) ?> 
   </h1>
  </div>

    <div style="float: left">
        <?= image_tag($p->getUrlImage()) ?>
    </div>
    <div style="clear: both"> </div>
<table width="100%"  class="table_anket">
    <tr>
        <td width="30%"> <?= __('Ник') ?>:</td>
        <td> <?= $p->getsfGuardUser()->getRealName() ?></td>
    </tr>

    <tr>
        <td> <?= __('Пол') ?>:</td>
        <td> <?= myUser::getGenderStr($p->getGender()) ?></td>
    </tr>

    <tr>
        <td> <?= __('Имя') ?>:</td>
        <td> <?= $p->getFirstName() ?></td>
    </tr>

    <tr>
        <td> <?= __('Фамилия') ?>:</td>
        <td> <?= $p->getLastName() ?></td>
    </tr>

    <tr>
        <td> <?= __('Страна') ?>:</td>
        <td> <?= $arrc[$p->getCountry()] ?></td>
    </tr>

    <tr>
        <td> <?= __('Город') ?>:</td>
        <td> <?= $p->getCity() ?></td>
    </tr>

    <tr>
        <td> <?= __('Язык') ?>:</td>
        <td> <?= $arrl[$p->getsfGuardUser()->getCulture()] ?></td>
    </tr>

    <tr>
        <td> <?= __('Индекс') ?>:</td>
        <td> <?= $p->getZip() ?></td>
    </tr>

    <tr>
        <td> <?= __('Дети') ?>:</td>
        <td> <?= $p->getChildren() ?></td>
    </tr>

    <tr>
        <td> <?= __('C кем дети') ?>:</td>
        <td> <?= $p->getWhereChildren() ?></td>
    </tr>

    <tr>
        <td> <?= __('Хочу детей') ?>:</td>
        <td> <?= $p->getWantChildren() ?></td>
    </tr>

    <tr>
        <td> <?= __('Дата рождения') ?>:</td>
        <td> <?= $p->getBirthday() ?></td>
    </tr>

    <tr>
        <td> <?= __('Возраст') ?>:</td>
        <td> <?= $p->getAge() ?></td>
    </tr>

    <tr>
        <td> <?= __('Знак зодиака') ?>:</td>
        <td> <?= $p->getZodiacSign($p->getZodiac()) ?></td>
    </tr>

    <tr>
        <td> <?= __('Рост') ?>:</td>
        <td> <?= $p->getHeight() ?></td>
    </tr>

    <tr>
        <td> <?= __('Тип телосложения') ?>:</td>
        <td> <?= $p->getBodyType() ?></td>
    </tr>

    <tr>
        <td> <?= __('Этническая принадлежность') ?>:</td>
        <td> <?= $p->getEthnicity() ?></td>
    </tr>

    <tr>
        <td> <?= __('Религия') ?>:</td>
        <td> <?= $p->getReligion() ?></td>
    </tr>

    <tr>
        <td> <?= __('Семейное положение') ?>:</td>
        <td> <?= $p->getMaritalStatus() ?></td>
    </tr>

    <tr>
        <td> <?= __('Национальность') ?>:</td>
        <td> <?= $p->getOccupation() ?></td>
    </tr>

    <tr>
        <td> <?= __('Владение языками') ?>:</td>
        <td>
            <p><?= $p->getLanguage1().':'.$p->getLanguageSkill1() ?></p>
            <p><?= $p->getLanguage2().':'.$p->getLanguageSkill2() ?></p>
            <p><?= $p->getLanguage3().':'.$p->getLanguageSkill3() ?></p>
        </td>
    </tr>

    <tr>
        <td> <?= __('Образование') ?>:</td>
        <td> <?= $p->getEducation() ?></td>
    </tr>

    <tr>
        <td> <?= __('Употребляю спиртное') ?>:</td>
        <td> <?= $p->getDrinker() ?></td>
    </tr>

    <tr>
        <td> <?= __('Курю') ?>:</td>
        <td> <?= $p->getSmoker() ?></td>
    </tr>


    <tr>
        <td> <?= __('Заголовок') ?>:</td>
        <td> <?= $p->getHeadline() ?></td>
    </tr>

    <tr>
        <td> <?= __('Обо мне') ?>:</td>
        <td> <?= $p->getDescription() ?></td>
    </tr>
<?php if(strlen($p->getSkan())>0):?>
    <tr>
        <td> <?= __('Скан копия паспорта') ?>:</td>
        <td> <?= link_to(__('Скан копия паспорта'),'http://'.$_SERVER['HTTP_HOST'].'/uploads/photo/'.$p->getSkan(),array('target'=>'_blank','class'=>'ui-state-default ui-corner-all','style'=>'display: block; width:150px; height:20px')) ?></td>
    </tr>
<?php endif ?>
</table>



    <div style="clear: both"> </div>

  <div class="fg-toolbar ui-widget-header ui-corner-all">
    <h1> <?= __('Информация о партнере') ?></h1>
  </div>


<table  class="table_anket">
    <tr>
        <td> <?= __('Ищу в возрасте') ?>:</td>
        <td> <?= __('от') ?> <?= $p->getLookingForAgeFrom() ?> <?= __('до') ?> <?= $p->getLookingForAgeTo() ?></td>
    </tr>

    <tr>
        <td> <?= __('Вес') ?>:</td>
        <td> <?= __('от')?>: <?= $p->getLookingForABodyTypeFrom() ?> <?= __('кг.')?>  <?= __('до') ?>: <?= $p->getLookingForABodyTypeTo() ?> <?= __('кг.')?> </td>
    </tr>

    <tr>
        <td> <?= __('Рост') ?>:</td>
        <td> <?= __('от')?>: <?= $p->getLookingForAHeightFrom() ?> <?= __('см.')?>  <?= __('до') ?>: <?= $p->getLookingForAHeightTo() ?> <?= __('см.')?></td>
    </tr>

    <tr>
        <td> <?= __('О партнере') ?>:</td>
        <td> <?= $p->getIdealMatchDescription() ?></td>
    </tr>


</table>





<?php if(count($photo)>0): ?>
<div class="fg-toolbar ui-widget-header ui-corner-all">
    <h1> <?= __('Фотогалерея') ?></h1>
  </div>


<?php foreach($photo as $ph): ?>
    <div style="float: left; width: <?= sfConfig::get('app_photo_width')?>">
        <div style="padding: 2px;">
        <?= link_to(image_tag('/uploads/photo/middle_thumbnail/'.$ph->getImage()),'http://'.$_SERVER['HTTP_HOST'].'/uploads/photo/original/'.$ph->getImage(),array('class'=>'alert')); ?>
        </div>
    <div align="center">
        <?php if(!$ph->getIsMain()):?>
         <?= link_to(__('Сделать главной'),'user/setmain?id='.$ph->getId()) ?>
        <?php endif ?>
        <br />
        <div align="center" id="ph_<?= $ph->getId() ?>">
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
        </div>
        
        
    </div>
    </div>
<?php endforeach ?>
    <div style="clear: both"></div>
<?php endif ?>
<p><?= link_to(__('+ photo'),'profile/addphoto?id='.$p->getUserId(),array('class'=>'ui-state-default ui-corner-all')) ?></p>
<br />



<?php if(count($pphoto)>0): ?>
<div class="fg-toolbar ui-widget-header ui-corner-all">
    <h1> <?= __('Приватные фотографии') ?></h1>
  </div>

<?php foreach($pphoto as $pph): ?>
  <?= link_to(image_tag('/uploads/photo/thumbnail/'.$pph->getImage()),'http://'.$_SERVER['HTTP_HOST'].'/uploads/photo/'.$pph->getImage(),array('class'=>'alert')); ?>
<?php endforeach ?>
<?php endif ?>

<p><?= link_to(__('+ photo'),'profile/addvideo?id='.$p->getUserId(),array('class'=>'ui-state-default ui-corner-all')) ?></p>
<br />



</div>

<script type="text/javascript">
  $("a.alert").fancybox({
'transitionIn' : 'none',
'transitionOut' : 'none',
'titlePosition' : 'inside',
'titleFormat' : function(title, currentArray, currentIndex, currentOpts) {
return '(' + (currentIndex + 1) + '/' + currentArray.length + ') ' + title;
}
});

</script>