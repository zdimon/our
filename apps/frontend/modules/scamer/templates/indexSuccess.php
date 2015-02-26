<h1><?= __('Report about scamer') ?></h1>

<table>
    <tr>
        <td valign="top" width="100">
        <?= include_partial('global/common/user_info',array('profile'=>$i->getProfile(),'arrc'=>$arrc,'arrl'=>$arrl)) ?>
        </td>
        <td  valign="top">
       <form class="form_style"  action="<?php echo url_for('scamer/index?id='.$i->getId()) ?>" method="POST">
        <?php echo $form ?>
        <div class="row input_but" align="center">
            <input class="but" type="submit" value="<?php echo __('Send') ?>" />
        </div>

    </form>         
        </td>
    </tr>
</table>





