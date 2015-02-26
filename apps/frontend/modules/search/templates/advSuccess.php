<h1> <?= __('Advanced search') ?></h1>


<form method="get" class="form_style" width="100%" action="<?= url_for('search/index') ?>" />





<table class="table3" width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
    <th style="text-align: center"> <?= __('Age range') ?></th>
    <th style="text-align: center"><?= __('Height') ?></th>
    <th style="text-align: center"><?= __('Weight') ?></th>
</tr>

    <tr>
        <td style="padding: 5px">
          <?= __('From') ?> <?= $form['age_from']->render() ?> <?= __('to') ?> <?= $form['age_to']->render() ?>
        </td>
        <td style="padding: 5px">
            <?= __('From') ?> <?= $form['height_from']->render() ?> <?= __('to') ?> <?= $form['height_to']->render() ?>
        </td>
        <td style="padding: 5px">
            <?= __('From') ?> <?= $form['weight_from']->render() ?> <?= __('to') ?> <?= $form['weight_to']->render() ?>
        </td>
    </tr>


    <tr>
        <th style="text-align: center"> <?= __('Body type') ?></th>
        <th style="text-align: center"><?= __('Eyes color') ?></th>
        <th style="text-align: center"><?= __('Glasses') ?></th>
    </tr>


    <tr>
        <td style="padding: 5px; text-align: center">
           <?= $form['body_type']->render() ?>
        </td>
        <td style="padding: 5px; text-align: center">
            <?= $form['eyes_color']->render() ?>
        </td>
        <td style="padding: 5px; text-align: center">
            <?= $form['contact_lenses']->render() ?>
        </td>
    </tr>



    <tr>
        <th style="text-align: center"> <?= __('Hair Color') ?></th>
        <th style="text-align: center"><?= __('Hair Lenght') ?></th>
        <th style="text-align: center"><?= __('Marital status') ?></th>
    </tr>

    <tr>
        <td style="padding: 5px; text-align: center">
            <?= $form['hair_color']->render() ?>
        </td>
        <td style="padding: 5px; text-align: center">
            <?= $form['hair_lenght']->render() ?>
        </td>
        <td style="padding: 5px; text-align: center">
            <?= $form['marital_status']->render() ?>
        </td>
    </tr>

    <tr>
        <th style="text-align: center"> <?= __('Children') ?></th>
        <th style="text-align: center"><?= __('Education') ?></th>
        <th style="text-align: center"><?= __('Religion') ?></th>
    </tr>

    <tr>
        <td style="padding: 5px; text-align: center">
            <?= $form['children']->render() ?>
        </td>
        <td style="padding: 5px; text-align: center">
            <?= $form['education']->render() ?>
        </td>
        <td style="padding: 5px; text-align: center">
            <?= $form['religion']->render() ?>
        </td>
    </tr>

    <tr>
        <th style="text-align: center"> <?= __('Language') ?></th>
        <th style="text-align: center"><?= __('Level language') ?></th>
        <th style="text-align: center"><?= __('Drink') ?></th>
    </tr>

    <tr>
        <td style="padding: 5px; text-align: center">
            <?= $form['language']->render() ?>
        </td>
        <td style="padding: 5px; text-align: center">
            <?= $form['language_skill']->render() ?>
        </td>
        <td style="padding: 5px; text-align: center">
            <?= $form['drinker']->render() ?>
        </td>
    </tr>

    <tr>
        <th style="text-align: center"> <?= __('Country') ?></th>
        <th style="text-align: center"><?= __('City') ?></th>
        <th style="text-align: center"><?= __('Profession') ?></th>
    </tr>

    <tr>
        <td style="padding: 5px; text-align: center">
            <?= $form['country']->render() ?>
        </td>
        <td style="padding: 5px; text-align: center">
            <?= $form['city']->render() ?>
        </td>
        <td style="padding: 5px; text-align: center">
           <?= $form['profession']->render() ?>
        </td>
    </tr>

    <tr>
        <th style="text-align: center"> <?= __('With photo') ?></th>
        <th style="text-align: center"><?= __('With video') ?></th>
        <th style="text-align: center"><?= __('Online only') ?></th>
    </tr>



    <tr>
        <td style="padding: 5px; text-align: center">
            <?= $form['with_photo']->render() ?>
        </td>
        <td style="padding: 5px; text-align: center">
            <?= $form['with_video']->render() ?>
        </td>
        <td style="padding: 5px; text-align: center">
            <?= $form['is_online']->render() ?>
        </td>
    </tr>

    <tr>
        <th style="text-align: center"></th>
        <th style="text-align: center"><?= __('Id') ?></th>
        <th style="text-align: center"><?= __('Membership') ?></th>
    </tr>

    <tr>
        <th style="text-align: center"> </th>
        <th style="text-align: center; padding: 5px; "> <?= $form['id']->render() ?> </th>
        <th style="text-align: center">
            <?php $mem = Doctrine::getTable('ProfilePacket')->findAll(); ?>

            <select name="packet_id">
                <option value="">-</option>
                <?php foreach($mem as $m): ?>
                  <option value="<?= $m->getId()?>"><?= $m->getTitle()?></option>
                <?php endforeach; ?>
            </select>


        </th>
    </tr>
    
    

</table>

<div class="row input_but" align="center">
    <input class="but" type="submit" value="<?= __('Search') ?>">
</div>

</form>

<?php if (!$sf_user->isAuthenticated()): ?>
<?php  include_partial('global/common/forms/popup_register_form') ?>
<?php endif; ?>
