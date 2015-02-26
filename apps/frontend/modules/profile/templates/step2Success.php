
<script>
    $(function() {
        tab = $( "#tabs" ).tabs();
    });
</script>
<!--Start of Zopim Live Chat Script-->
<script type="text/javascript">
window.$zopim||(function(d,s){var z=$zopim=function(c){
z._.push(c)},$=z.s=
d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute('charset','utf-8');
$.src='//v2.zopim.com/?1zxMJ99qK87WFLpyvfNFYNL2P3fKCslk';z.t=+new Date;$.
type='text/javascript';e.parentNode.insertBefore($,e)})(document,'script');
</script>
<!--End of Zopim Live Chat Script-->


<h1> <?= __('Step 3 of the registration') ?></h1>

    <?php if($form->hasErrors()):?>
        <div class="ui-widget">
            <div class="ui-state-error ui-corner-all" style="padding: 0 .7em;">
                <p><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .7em;"></span>
                    <strong><?= __('Error') ?>:</strong> <?= __('Chek you form please! Any fields contains wrong or not enought date.') ?> </p>

            </div>
        </div>
    <?php endif; ?>

<form  enctype="multipart/form-data" method="post" class="form_style" action="<?php echo url_for('profile/step2') ?>">
	
		<?php echo $form->renderHiddenFields() ?>
		<?php echo $form->renderGlobalErrors() ?>
                <?php echo $form['_csrf_token']->render() ?>
                <?php $p = $form->getObject() ?>
<?php $form->setDefault('relationship',myTools::db_array_field($form->getObject()->getRelationship())) ?>
<?php // echo $form ?>

        <div id="tabs">

        <ul>
            <li><a id="tab_2" href="#tabs-2"><?= __('Additional settings') ?></a></li>
        </ul>



        <div id="tabs-2">

            <div class="row">
                <?php echo $form[$sf_user->getCulture()]['description']->renderLabel(null, array('class' => 'required star')) ?><span class="required red">*</span>
                
                <?php echo $form[$sf_user->getCulture()]['description'] ?>
                <?php echo $form[$sf_user->getCulture()]['description']->renderError() ?>
            </div>


            <div class="row">
                <?php echo $form[$sf_user->getCulture()]['ideal_match_description']->renderLabel(null, array('class' => 'required star')) ?><span class="required red">*</span>
              
                
         

                <?php echo $form[$sf_user->getCulture()]['ideal_match_description'] ?>
                <?php echo $form[$sf_user->getCulture()]['ideal_match_description']->renderError() ?>
            </div>

            <div class="row">
                <?php echo $form[$sf_user->getCulture()]['hobbies']->renderLabel(null, array('class' => 'required star')) ?><span class="required red">*</span>
                <?php echo $form[$sf_user->getCulture()]['hobbies'] ?>
                <?php echo $form[$sf_user->getCulture()]['hobbies']->renderError() ?>
            </div>
            
           <div class="row">
                <?php include_partial('keywords',array('id'=>1,'user'=>$form->getObject()->getsfGuardUser())) ?>
           </div>
            
              <div class="row">
                <?php include_partial('keywords',array('id'=>3,'user'=>$form->getObject()->getsfGuardUser())) ?>
           </div>
            
           <div class="row">
                <?php include_partial('keywords',array('id'=>2,'user'=>$form->getObject()->getsfGuardUser())) ?>
           </div>
            


        </div>





        <br />
        <div class="row input_but" align="center">
            <input type="submit"  class="but" value="<?php echo __('Сохранить') ?>" />
        </div>
   </div>

</form>




