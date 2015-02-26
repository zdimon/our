<table class="table1" width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <th><?= __('Возраст') ?></th>
        <td><?= $p->getAge() ?></td>
    </tr>
    <tr>
        <th> <?= __('Дата рождения') ?>:</th>
        <td> <?= $p->getBirthday() ?></td>
    </tr>
    <tr>
        <th> <?= __('Знак зодиака') ?>:</th>
        <td> <?= $p->getZodiacSign($p->getZodiac()) ?></td>
    </tr>

    <tr>
        <th> <?= __('Страна') ?>:</th>
        <td> <?= $arrc[$p->getCountry()] ?></td>
    </tr>

    <tr>
        <th> <?= __('Город') ?>:</th>
        <td> <?= $p->getIcity() ?></td>
    </tr>

    <?php if(strlen($p->getHeight())>0):?>
    <tr>
        <th> <?= __('Рост') ?>:</th>
        <td> <?= $p->getHeight() ?></td>
    </tr>
    <?php endif ?>

    <?php if(strlen($p->getWeight())>0):?>
    <tr>
        <th> <?= __('Вес') ?>:</th>
        <td> <?= $p->getWeight() ?> kg.</td>
    </tr>
    <?php endif ?>

    <?php if(strlen($p->getBodyType())>0):?>
    <tr>
        <th> <?= __('Body type') ?>:</th>
        <td> <?= __($p->getBodyType()) ?></td>
    </tr>
        <?php endif ?>


    <?php if(strlen($p->getEyeColor())>0):?>
    <tr>
        <th> <?= __('Цвет глаз') ?>:</th>
        <td> <?= __($p->getEyeColor()) ?></td>
    </tr>
    <?php endif ?>

    <?php if(strlen($p->getHairColor())>0):?>
    <tr>
        <th> <?= __('Цвет волос') ?>:</th>
        <td> <?= __($p->getHairColor()) ?></td>
    </tr>
    <?php endif ?>

    <?php if(strlen($p->getHairLenght())>0):?>
    <tr>
        <th> <?= __('Длинна волос') ?>:</th>
        <td> <?= __($p->getHairLenght()) ?></td>
    </tr>
    <?php endif ?>

    <?php if(strlen($p->getMaritalStatus())>0):?>
    <tr>
        <th> <?= __('Семейное положение') ?>:</th>
        <td> <?= $p->getMaritalStatus() ?></td>
    </tr>
    <?php endif ?>

    <?php if(strlen($p->getChildren())>0):?>
    <tr>
        <th> <?= __('Дети') ?>:</th>
        <td> <?= __($p->getChildren()) ?></td>
    </tr>
    <?php endif ?>

    <?php if(strlen($p->getWhereChildren())>0):?>
    <tr>
        <th> <?= __('C кем дети') ?>:</th>
        <td>
            <?= __($p->getWhereChildren()) ?>
        </td>
    </tr>
    <?php endif ?>

    <?php if(strlen($p->getWantChildren())>0):?>
    <tr>
        <th> <?= __('Хочу детей') ?>:</th>
        <td> <?=  __($p->getWantChildren()) ?></td>
    </tr>
    <?php endif ?>

    <tr>
        <th> <?= __('Пол') ?>:</th>
        <td> <?= $p->getGenderStr() ?></td>
    </tr>

    <tr>
        <th> <?= __('Контактные линзы') ?>:</th>
        <td> <?= $p->getContactLensesStr() ?></td>
    </tr>


    <?php if(strlen($p->getReligion())>0):?>
    <tr>
        <th> <?= __('Религия') ?>:</th>
        <td> <?= __($p->getReligion()) ?></td>
    </tr>
    <?php endif ?>

    <?php if(strlen($p->getEducation())>0):?>
    <tr>
        <th> <?= __('Образование') ?>:</th>
        <td>
            <?= __($p->getEducation()) ?>
        </td>
    </tr>
    <?php endif ?>

    <?php if(strlen($p->getOccupation())>0):?>
    <tr>
        <th> <?= __('Профессия') ?>:</th>
        <td>
            <?= __($p->getOccupation()) ?>
        </td>
    </tr>
    <?php endif ?>


    <?php if((strlen($p->getLanguage1())>0 and strlen($p->getLanguage2())>0 and strlen($p->getLanguage3())>0)):?>
    <tr>
        <th> <?= __('Владение языками') ?>:</th>
        <td>
            <?php if(strlen($p->getLanguage1())>0 and $p->getLanguage1()!='---'):?>
            <p><?= __($p->getLanguage1()).':'.__($p->getLanguageSkill1()) ?></p>
            <?php endif ?>
            <?php if(strlen($p->getLanguage2())>0 and $p->getLanguage2()!='---'):?>
            <p><?= __($p->getLanguage2()).':'.__($p->getLanguageSkill2()) ?></p>
            <?php endif ?>
            <?php if(strlen($p->getLanguage3())>0 and $p->getLanguage3()!='---'):?>
            <p><?= __($p->getLanguage3()).':'.__($p->getLanguageSkill3()) ?></p>
            <?php endif ?>
        </td>
    </tr>
    <?php endif ?>

    <?php if(strlen($p->getSmoker())>0):?>
    <tr>
        <th> <?= __('Курю') ?>:</th>
        <td> <?= __($p->getSmoker()) ?></td>
    </tr>
    <?php endif ?>

    <?php if(strlen($p->getDrinker())>0):?>
    <tr>
        <th> <?= __('Выпиваю') ?>:</th>
        <td> <?= __($p->getDrinker()) ?></td>
    </tr>
    <?php endif ?>

    <?php if(strlen($p->getUserKeywords(1))>3):?>
   <tr>
        <th> <?= __('Personality Traits') ?>:</th>
        <td> <?= $p->getUserKeywords(1) ?></td>
    </tr>
    <?php endif ?>
    
    
    <?php if(strlen($p->getUserKeywords(2))>3):?>
   <tr>
        <th> <?= __('Personality Traits that I search') ?>:</th>
        <td> <?= $p->getUserKeywords(2) ?></td>
    </tr>
    <?php endif ?>
    

    <?php if(strlen($p->getUserKeywords(3))>3):?>
   <tr>
        <th> <?= __('Interests') ?>:</th>
        <td> <?= $p->getUserKeywords(3) ?></td>
    </tr>
    <?php endif ?>    
    
    

    <?php if(strlen($p->getLookingFor())>0):?>
    <tr>
        <th> <?= __('Ищу') ?>:</th>
        <td> <?= __($p->getLookingForStr()) ?></td>
    </tr>
    <?php endif ?>

    <?php if(strlen($p->getLookingForRole())>0):?>
    <tr>
        <th> <?= __('Кого ищу') ?>:</th>
        <td> <?= __($p->getLookingForRole()) ?></td>
    </tr>
    <?php endif ?>

    <?php if(strlen($p->getLookingForAgeFrom())>0):?>
    <tr>
        <?php
           if($p->getGender()=='w')
           {
               $gs = __('Man');
           }
        else
        {
            $gs = __('Women');
        }
        ?>
        <th> <?= __('I am looking for age',array('%1%'=>$gs)) ?>:</th>
        <td> <?= __('from') ?> <?= $p->getLookingForAgeFrom() ?> <?= __('to') ?> <?= $p->getLookingForAgeTo() ?></td>
    </tr>
    <?php endif ?>

   <?php if($p->getGender()=='m'): ?>
    <tr>
        <th> <?= __('Membership') ?>:</th>
        <td> <?= __($p->getPacket()) ?></td>
    </tr>
   <?php endif; ?>

       <?php if(strlen($p->getRelationship())>0):?>
            <tr>
                <th> <?= __('Relationship') ?>:</th>
                <td>
                     <?php $rel = $p->getRelationship() ?>
                    <?php $arr = explode(',',$rel); ?>
                    <?php $des = myUser::getRelationship() ?>
                    <?php foreach($arr as $k=>$v): ?>
                        <?=  $des[$v] ?> &nbsp;

                    <?php endforeach; ?>
                </td>
            </tr>
        <?php endif ?>




</table>
