 <?php $arrc = sfCultureInfo::getInstance(sfContext::getInstance()->getUser()->getCulture())->getCountries();?>
<?php
  $form = new qregForm();
?>

    <div id="popup_register_form" title="">
    
        <div style="float: left" >
            <form method="post" class="form_style validat"  action="<?php echo url_for('registration/index') ?>">
                    <?php echo $form->renderHiddenFields() ?>
                    <?php echo $form->renderGlobalErrors() ?>
                    <?php echo $form['_csrf_token']->render() ?>




                    <div class="row">
                        <?php echo $form['username']->renderLabel(null, array('style'=>'width: 100px','class' => 'required star short')) ?><span style="color: red">*</span>
                        <?php echo $form['username'] ?>
                        <?php echo $form['username']->renderError() ?>
                    </div>

                    <div class="row">
                        <?php echo $form['password']->renderLabel(null, array('style'=>'width: 100px','class' => 'required star short')) ?><span style="color: red">*</span>
                        <?php echo $form['password'] ?>
                        <?php echo $form['username']->renderError() ?>
                    </div>





                    <div class="row">
                        <?php echo $form['country']->renderLabel(null, array('style'=>'width: 100px','class' => 'required star short')) ?><span style="color: red">&nbsp;&nbsp;</span>
                        <?php echo $form['country'] ?>
                        <?php echo $form['country']->renderError() ?>
                    </div>

                    <div class="row">
                        <?php echo $form['email']->renderLabel(null, array('style'=>'width: 100px','class' => 'required star short')) ?><span style="color: red">*</span>
                        <?php echo $form['email'] ?>
                        <?php echo $form['email']->renderError() ?>
                    </div>

                    <div class="row">
                        <?php echo $form['birthday']->renderLabel(null, array('style'=>'width: 100px','class' => 'required star short')) ?><span style="color: red">*</span>
                        <?php echo $form['birthday'] ?>
                        <?php echo $form['birthday']->renderError() ?>
                    </div>


                    <div class="row">
                        <?php echo $form['gender']->renderLabel(null, array('style'=>'width: 100px','class' => 'required star short')) ?><span style="color: red">*</span>
                        <?php echo $form['gender'] ?>
                        <?php echo $form['gender']->renderError() ?>
                    </div>

                    <div class="row">
                        <?php echo $form['culture']->renderLabel(null, array('style'=>'width: 100px','class' => 'required star short')) ?><span style="color: red">&nbsp;&nbsp;</span>
                        <?php echo $form['culture'] ?>
                        <?php echo $form['culture']->renderError() ?>
                    </div>

                    <div class="row">
                        <?php echo $form['captcha']->renderLabel(null, array('style'=>'width: 100px','class' => 'required star short')) ?><span style="color: red">*</span>
                        <?php echo $form['captcha'] ?>
                        <?php echo $form['captcha']->renderError() ?>
                    </div>



                    <?php // if($form->getObject()->getGender()=='m'):?>
                    <div class="row" style="padding-left: 40px">
                         <?php echo $form['is_agree'] ?>
                         <?= link_to(__('I have read and fully understood the our-feeling.com terms and conditions'),'@page?alias=terms',array('target'=>'_blank'))?><span style="color: red">*</span>
                         <?php echo $form['is_agree']->renderError() ?>
                    </div>
                    <?php // endif; ?>


                    <div  align="center">
                        <input class="" style="width: 180px; height: 30px" type="submit" value="<?php echo __('Register') ?>" />
                    </div>

                </form>       
        </div>
        
        <div style="float: right">
            
            <img style="border:1px solid #fcecaa" src="<?= $p->getUrlImage() ?>">
            
               
            
            
        </div>
        <div style="clear: both"></div>
        <h3 style="padding: 0"><?= __('login on the site') ?></h3>
 <form method="post" action="<?php echo url_for('@sf_guard_signin') ?>" class="form_style f_quick_search textright">
     <?php echo $form['_csrf_token']->render() ?>
    
         
     <table>
         <tr>
             <td style="padding: 5px">
                 <?= __('Login') ?><span class="r">&nbsp;</span><input style="width: 100px" type="text" name="signin[username]"  value="" />
             </td>
             <td style="padding: 5px">
                 <?= __('Password') ?><span class="r">&nbsp;</span><input  style="width: 100px" type="password" name="signin[password]" value="" />
             </td>
             <td style="padding: 5px">
                 <input style=" display: inline-block; margin-top: 10px; width: 100px; height: 30px"  value="<?= __('Enter') ?>" type="submit" /> 
             </td>             
         </tr>
     </table>
                
                   
              </form>
        
   </div>


<style>
    .no-close .ui-dialog-titlebar-close {
  display: none;
}
</style>


<script type="text/javascript">



    $(window).load( setTimeout(function() {
        
   
     $( "#popup_register_form" ).dialog({
    autoOpen: true,
     dialogClass: "no-close",
    height: 520,
    width: 800,
    modal: true
     });
    },2000));
    
    
       
    
</script>   