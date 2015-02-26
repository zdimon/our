<h2><?php echo __('Confirm payment')?></h2>
<div class="description_line">
    <div class="description_line_arr"></div>

    <table class="table1" width="100%">
        <tr>
            <td><?= __('Payment`s appointment') ?></td>
            <td><?= $bill->getAppointment() ?></td>
        </tr>
        <tr>
            <td><?= __('Cost') ?></td>
            <td><?php echo $bill->getSumma() ?> &euro;</td>
        </tr>        
    </table>
    
    <div style="text-align: center">
    <?= image_tag('/images/logoliqpay.png') ?>
</div>
    
    <div style="text-align: center">
    
    <div class="payment_continue">
    
     <form action="https://www.liqpay.com/?do=clickNbuy" method="POST" />
          <input type="hidden" name="operation_xml" value="<?= $bill->getOutXmlEncode() ?>" />
          <input type="hidden" name="signature" value="<?= $bill->getSign() ?>" />
          <input type="submit" value="<?= __('Continue') ?>" />
</form>
        <br />
    <?php echo link_to(__('Refuse'),'liqpay/refuse?id='.$bill->getId(),array('class'=>'red')) ?>
    </div>
    </div>
</div>