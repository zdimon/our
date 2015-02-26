<h3><?= __('FAQ') ?></h3>

<?php foreach ($pager->getResults() as $i): ?>

<p><b><?= $i->getTitle()?> </b> </p>
<p> <?= $i->getDescription()?></p>

<?php endforeach; ?>

<?php echo pager_navigation($pager, url_for('faq/index')) ?>

<div class="hr"> </div>

<h3> <?= __('Ask your question') ?></h3>

    <div style='width: 300px'>
<form method="post" class="form_style" action="<?= url_for('faq/index') ?>">

    <?php echo $form->renderHiddenFields() ?>
    <?php echo $form->renderGlobalErrors() ?>
    <?php echo $form['_csrf_token']->render() ?>

    <div class="row">
        <?= $form[$sf_user->getCulture()]['title'] ?>
        <?= $form[$sf_user->getCulture()]['title']->renderError() ?>
    </div>
    <div class="row">
        <?= $form[$sf_user->getCulture()]['description'] ?>
        <?= $form[$sf_user->getCulture()]['description']->renderError() ?>
    </div>

    <div class="row" align="center">
       <input  class="but" type="submit" value="<?= __('Отправить') ?>" />
    </div>

        </form>

        </div>


<?php if (!$sf_user->isAuthenticated()): ?>
<?php include_partial('global/common/forms/popup_register_form') ?>
<?php endif; ?>
