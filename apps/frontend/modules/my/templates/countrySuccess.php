<h1> <?= __('My country') ?> </h1>

<?php if($page): ?>

 <?= $page->getIcontent() ?>

<?php endif; ?>


    <?php if($pager->getNbResults()):?>
      
    <table class="table3" width="100%" border="0" cellspacing="0" cellpadding="0">
       
      <tbody>
        <?php foreach ($pager->getResults() as $i): ?>
        <tr>
          <td valign="top" width="200">
<?php if(strlen($i->getImage1())>0): ?>

<?php echo link_to(image_tag('/uploads/'.$i->getImage1(),array('width'=>'200px')),'http://'.$_SERVER['HTTP_HOST'].'/uploads/'.$i->getImage1(),array('target'=>'_blank')) ?>

<?php endif; ?>


<?php if(strlen($i->getImage2())>0): ?>

<?php echo link_to(image_tag('/uploads/'.$i->getImage2(),array('width'=>'200px')),'http://'.$_SERVER['HTTP_HOST'].'/uploads/'.$i->getImage2(),array('target'=>'_blank')) ?>

<?php endif; ?>


<?php if(strlen($i->getImage3())>0): ?>

<?php echo link_to(image_tag('/uploads/'.$i->getImage3(),array('width'=>'200px')),'http://'.$_SERVER['HTTP_HOST'].'/uploads/'.$i->getImage3(),array('target'=>'_blank')) ?>

<?php endif; ?>


<?php if(strlen($i->getImage4())>0): ?>

<?php echo link_to(image_tag('/uploads/'.$i->getImage4(),array('width'=>'200px')),'http://'.$_SERVER['HTTP_HOST'].'/uploads/'.$i->getImage4(),array('target'=>'_blank')) ?>

<?php endif; ?>



<?php if(strlen($i->getImage5())>0): ?>

<?php echo link_to(image_tag('/uploads/'.$i->getImage5(),array('width'=>'200px')),'http://'.$_SERVER['HTTP_HOST'].'/uploads/'.$i->getImage5(),array('target'=>'_blank')) ?>

<?php endif; ?>
          </td>
          <td valign="top">
             <?= __('Country') ?>:  <?= $i->getCountry() ?> <br />
             <?= $i->getContent() ?> <br />
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
        <tr>
            <th colspan="2" align="center">
                <?php echo pager_navigation($pager, url_for('my/country'),array('alias')) ?>
            </th>
        </tr>
    </table>
    <?php endif ?>


<form class="form_style" action="<?= url_for('my/country') ?>" method="POST" enctype="multipart/form-data">
		<?php echo $form->renderHiddenFields() ?>
		<?php echo $form->renderGlobalErrors() ?>
                <?php echo $form['_csrf_token']->render() ?> 
    
    
                <div class="row">
                 <?php echo $form[$sf_user->getCulture()]['country']->renderLabel(null, array('class' => 'required star')) ?>
                  <?php echo $form[$sf_user->getCulture()]['country'] ?>
                  <?php echo $form[$sf_user->getCulture()]['country']->renderError() ?>
             </div>
    
    
            <div class="row">
                 <?php echo $form[$sf_user->getCulture()]['content']->renderLabel(null, array('class' => 'required star')) ?>
                  <?php echo $form[$sf_user->getCulture()]['content'] ?>
                  <?php echo $form[$sf_user->getCulture()]['content']->renderError() ?>
             </div>    
    
    
            <div class="row">
                 <?php echo $form['image1']->renderLabel(null, array('class' => 'required star')) ?>
                  <?php echo $form['image1'] ?>
                  <?php echo $form['image1']->renderError() ?>
             </div>       
    
            <div class="row">
                 <?php echo $form['image2']->renderLabel(null, array('class' => 'required star')) ?>
                  <?php echo $form['image2'] ?>
                  <?php echo $form['image2']->renderError() ?>
             </div>       
    
    
            <div class="row">
                 <?php echo $form['image3']->renderLabel(null, array('class' => 'required star')) ?>
                  <?php echo $form['image3'] ?>
                  <?php echo $form['image3']->renderError() ?>
             </div>          
    
    
            <div class="row">
                 <?php echo $form['image4']->renderLabel(null, array('class' => 'required star')) ?>
                  <?php echo $form['image4'] ?>
                  <?php echo $form['image4']->renderError() ?>
             </div>          
    
    
            <div class="row">
                 <?php echo $form['image5']->renderLabel(null, array('class' => 'required star')) ?>
                  <?php echo $form['image5'] ?>
                  <?php echo $form['image5']->renderError() ?>
             </div>          
    

    <div class="row" align="center">
        <input type="submit" class="but" value="<?= __('Sumbit') ?>" />
    </div>
    
</form>


<?php if (!$sf_user->isAuthenticated()): ?>
<?php include_partial('global/common/forms/popup_register_form') ?>
<?php endif; ?>