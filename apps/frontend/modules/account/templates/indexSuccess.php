<h1> <?= __('Buy credit') ?> </h1>


<table class="table1" width="100%">
    <script type="text/javascript">
    function changeME(amt,obj){
		var amt=amt.split("_");
		//alert(amt[0]);
       // alert(amt[1]);	
		obj.amount.value=amt[1];
		obj.duration.value=amt[0];
	}    
    </script>
    <tr>
        <th>Diffrent Membership</th>
         <th>ScrolRoll</th>
         <th>&nbsp;</th>
         <th></th>
    </tr>
 <?php foreach($tbil as $t){ ?>
 
 <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank">
  <tr>
    <th>
              <?= $t->getTitle() ?>
    </th>
    <th><input type="hidden" name="amount" value="<?php echo $t->getSumma(); ?>" />
             <select name="choose_amount"  onchange="return changeME(this.value,this.form)">
             <option value="1_<?php echo $t->getSumma() ?>">1 Month <?php echo $t->getSumma() ?> EUR</option>
             <?
 if (  $t->getId()==4 || $t->getId()==1 )
{
?>
             <option value="2_<?php echo $t->getSumma()*2-5 ?>">2 Month <?php echo $t->getSumma()*2-5 ?> EUR</option>
             
             <?php     if (  $t->getId()==2){ ?>
             <option value="2_<?php echo $t->getSumma()*2-2 ?>">2 Month <?php echo $t->getSumma()*2-2 ?> EUR</option>
             <?php } ?>
              <?php     if (  $t->getId()==3){ ?>
             <option value="2_<?php echo $t->getSumma()*2 ?>">2 Month <?php echo $t->getSumma()*2 ?> EUR</option>
             <?php } ?>
             
              <?
 if (  $t->getId()==4 || $t->getId()==1 )
{
?>
             <option value="3_<?php echo $t->getSumma()*3-10 ?>">3 Month <?php echo $t->getSumma()*3-10 ?> EUR</option>
            
             <?php     if (  $t->getId()==2){ ?>
             <option value="3_<?php echo $t->getSumma()*3-5 ?>">3 Month <?php echo $t->getSumma()*3-5 ?> EUR</option>
             <?php } ?>
              <?php     if (  $t->getId()==3){ ?>
             <option value="3_<?php echo $t->getSumma()*3 ?>">3 Month <?php echo $t->getSumma()*3 ?> EUR</option>
             <?php } ?>
             </select>
          </th>
          <th>

                <input type="hidden" name="cmd" value="_xclick">
               <!-- <input type="hidden" name="business" value="sunilv_1339574112_biz@gmail.com"> -->
               <input type="hidden" name="business" value="jo39400@gmail.com"> 
                <input type="hidden" name="lc" value="LT">
                <input type="hidden" name="item_name" value="Payment on account [<?= $sf_user->getGuardUser()->getId() ?>]">
                <input type="hidden" name="item_number" value="<?php echo $sf_user->getGuardUser()->getId(); ?>">
                <!-- <input type="hidden" name="amount" value="<?php echo $t->getSumma()*1 ?>"> -->
                <input type="hidden" name="currency_code" value="EUR">
                <input type="hidden" name="button_subtype" value="products">
                <input type="hidden" name="rm" value="2">
                <input type="hidden" name="return" value="http://<?= $_SERVER['HTTP_HOST']?>/en/sfPaymentPayPal/success"/>
                <input type="hidden" name="cancel_return" value="http://<?= $_SERVER['HTTP_HOST']?>/en/sfPaymentPayPal/failure"/>
                <input type="hidden" name="notify_url" value="http://<?= $_SERVER['HTTP_HOST']?>/_index.php/en/sfPaymentPayPal/ipn"/>
                <input type="hidden" name="custom" value="<?php echo $t->getId(); ?>"/>
                <input type="hidden" name="duration" value="1"/>
                <input type="hidden" name="custom_type" value="1"/>
                <input type="image" src="http://www.zefrank.com/wikidata/images/candy_paypal_checkout.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                <img alt="" border="0" src="https://www.paypal.com/ru_RU/i/scr/pixel.gif" width="1" height="1">
                </th>
  </tr></form>
 <?php } ?>
 
  

</table>

<br />


<br />







