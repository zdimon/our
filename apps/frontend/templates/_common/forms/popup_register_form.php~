<?php if (!$sf_user->isAuthenticated()): ?> 

 <?php 
               $pg = PageTable::getInstance()->createQuery('a')->where('a.alias=?',array('popup_form'))->fetchOne();
               
              ?>

<?php $arrc = sfCultureInfo::getInstance(sfContext::getInstance()->getUser()->getCulture())->getCountries();?>

        <?php if(!isset($form)): ?>
        <?php $form = new qregForm(); ?>

        <?php endif; ?>
    <div style="display: none" id="popup_register_form" title="<?= __('Registration') ?>">
        
         <?php if($pg): ?>
              <div style="border: 1px solid red; width: 380px; padding: 5px; float: right; position: absolute; left: 400px; font-size: 12px; line-height: 10px">
                  <?=  $pg->getIcontent(ESC_RAW); ?>
              </div>
               <?php endif; ?>
        <div style="float: left" style="width: 400px" >
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
                
                    <div  style="text-align: center">
                        <h2 style=" color: red; padding-left: 80px"><?php echo __('Totally free for women') ?> / Совершенно бесплатно для женщин</h3>
                    </div>
                

                </form>   
            
        </div>
        
        <div style="float: right;  width: 300px;">
            
             
            <!--
            <?php if(isset($p)): ?>
              <img style="border:1px solid #fcecaa" src="<?= $p->getUrlImage() ?>">
            <?php endif; ?>
            -->
             
             
            
            
        </div>
        <div style="clear: both"></div>
        <h3 style="padding: 0"><?= __('login on the site') ?></h3>
        <?php if(!isset($formi)): ?>
        <?php $formi = new sfGuardFormSignin(); ?>
        <?php endif; ?>
 <form method="post" action="<?php echo url_for('@sf_guard_signin') ?>" class="form_style f_quick_search textright">
     <?php echo $formi['_csrf_token']->render() ?>
    
         
     <table>
         <tr>
             <td colspan="3" style="color: red"><?= $formi['username']->renderError() ?> <?= $formi['password']->renderError() ?></td>
         </tr>
         <tr>
             <td style="padding: 5px">
                 <?= __('Login') ?><span class="r">&nbsp;</span><input style="width: 100px" type="text" name="signin[username]"  value="" />
             </td>
             <td style="padding: 5px">
                 <?= __('Password') ?><span class="r">&nbsp;</span><input  style="width: 100px" type="password" name="signin[password]" value="" />
             </td>
             <td style="width: 100px; color: red;" nowrap >
                 <input name="signin[remember]" type="checkbox" id="check1" checked="checked"><label for="check1" style="width: 100px; color: red;"><?= __('remember me') ?></label>
             </td>
             <td style="padding: 5px">
                 <input style=" display: inline-block; margin-top: 10px; width: 100px; height: 30px"  value="<?= __('Enter') ?>" type="submit" /> 
             </td>             
         </tr>
     </table>
                
                   
              </form>
          
        
               <div style="text-align: center">
            <h2 style="color: red"><?= __('Totally free for men till the 30th September') ?></h2>
            <span style="color: red"> <?= __('') ?> </span>
        </div>
        
        
   </div>


<style>
    .no-close .ui-dialog-titlebar-close {
  display: none;
}
</style>


<?php 
 if( $form->hasErrors() or  $formi->hasErrors())
 {
   $t = 0;  
 }
 else {
    
    $t = 1000; 
}
?>

<script type="text/javascript">
    $(window).load( setTimeout(function() {
        
   
     $( "#popup_register_form" ).dialog({
    autoOpen: true,
     dialogClass: "no-close",
    height: 710,
    width: 800,
    modal: true
     });
    },<?= $t ?>));
    
    
       
    
</script>   

<?php endif; ?>
