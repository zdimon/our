<h1><?= $page->getItitle() ?></h1>
<div class="text">

<?= $page->getIcontent() ?>


</div>

<?php if (!$sf_user->isAuthenticated()): ?>

    <h2><?= __('Start free trial') ?></h2>
    <div class="b_content">
        <form method="post" class="form_style f_quick_search textleft" action="<?php echo url_for('registration/index?gender='.$form->getObject()->getGender()) ?>">
            <?php echo $form->renderHiddenFields() ?>
            <?php echo $form->renderGlobalErrors() ?>
            <?php echo $form['_csrf_token']->render() ?>




            <div class="row">
                <?php echo $form['username']->renderLabel(null, array('style'=>'width: 100px','class' => 'required star short')) ?>
                <?php echo $form['username'] ?>

            </div>

            <div class="row">
                <?php echo $form['password']->renderLabel(null, array('style'=>'width: 100px','class' => 'required star short')) ?>
                <?php echo $form['password'] ?>

            </div>





            <div class="row">
                <?php echo $form['country']->renderLabel(null, array('style'=>'width: 100px','class' => 'required star short')) ?>
                <?php echo $form['country'] ?>

            </div>

            <div class="row">
                <?php echo $form['email']->renderLabel(null, array('style'=>'width: 100px','class' => 'required star short')) ?>
                <?php echo $form['email'] ?>

            </div>

            <div class="row">
                <?php echo $form['birthday']->renderLabel(null, array('style'=>'width: 100px','class' => 'required star short')) ?>
                <?php echo $form['birthday'] ?>

            </div>


            <div class="row">
                <?php echo $form['gender']->renderLabel(null, array('style'=>'width: 100px','class' => 'required star short')) ?>
                <?php echo $form['gender'] ?>

            </div>

            <div class="row">
                <?php echo $form['culture']->renderLabel(null, array('style'=>'width: 100px','class' => 'required star short')) ?>
                <?php echo $form['culture'] ?>

            </div>


            <?php // if($form->getObject()->getGender()=='m'):?>
            <div class="row">
                <label> </label>
                <?php echo $form['is_agree'] ?> <?= link_to(__('Terms and conditions'),'@page?alias=terms',array('target'=>'_blank'))?>

            </div>
            <?php // endif; ?>


            <div class="row input_but" align="center">
                <input class="but" type="submit" value="<?php echo __('Register') ?>" />
            </div>

        </form>

    </div>

<?php endif ?>