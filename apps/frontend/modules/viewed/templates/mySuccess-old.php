<h1><?= __('Veiwed by me') ?></h1>
<?php include_partial('viewed/menu')?>

        <?php if(!$pager->getNbResults()):?>
        <div class="alert_error" align="center">
            <?= __('No data')  ?>
        </div>
        <?php else: ?>
            <table class="table3" width="100%" border="0" cellspacing="0" cellpadding="0">
                <tbody>
                    <?php foreach ($pager->getResults() as $i): ?>
                        <tr>

                            <td><?php include_partial('global/common/user_info',array('arrc'=>$arrc,'arrl'=>$arrl,'profile'=>$i->getInterest()->getProfile()))?></td>

                            <td class="pop_user_img"> <?= format_date($i->getCreatedAt(),'D') ?></td>

                            <td  width="230">
                                <?php include_partial('global/common/user_actions',array('u'=>$i->getInterest())); ?>
                            </td>

                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

       <?php endif ?>
