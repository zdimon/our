<?php if($form->getObject()->getId()>0): ?>
<h1 style="color: green; margin-left: 20px"> <?= __('Chek new profiles') ?></h1>
    <?php $pf = NewuserletterTable::getNewProfiles($form->getObject()->getToGender());?>
    <div>
    <?php foreach($pf as $p): ?>

        <div style="float: left; height: 160px; width: 150px; border: 1px solid silver; padding: 5px; margin: 5px">


            <table>
                <tr>
                    <td><?= $p->getFirstName() ?></td>
                </tr>
                <tr>
                    <td><img src="<?= $p->getUrlImageSmall() ?>" alt=""></td>
                </tr>
                <tr>
                    <td>
                        <div style="display: none; color: red" id="loading_<?= $p->getId()?>"><?= __('Loading') ?></div>
                        <div id="pf_<?= $p->getId() ?>">



                            <?= jq_link_to_remote(__('Check'),
                            array(
                                'update' => 'pf_'.$p->getId(),
                                'url'    => 'ajax/check?id='.$p->getId().'&letter='.$form->getObject()->getId(),
                                'loading'  => "$('#loading_".$p->getId()."').show();",
                                'complete' => "$('#loading_".$p->getId()."').hide();",
                            ),array('style'=>'color: green; font-size: 14px')
                        ) ?>
                        </div>

                    </td>
                </tr>
            </table>





        </div>

    <?php endforeach; ?>
        <div style="clear: both;"></div>
        <div align="center" id="sendletter">
            <div style="display: none; color: red" id="loadings"><?= __('Loading') ?></div>
            <?= jq_link_to_remote(__('Send letters'),
            array(
                'update' => 'sendletter',
                'url'    => 'ajax/sendnew?id='.$form->getObject()->getId(),
                'loading'  => "$('#loadings').show();",
                'complete' => "$('#loadings').hide();",
            ), array('style'=>'font-size: 16px')
        ) ?>


           </div>
</div>
        <div style="clear: both"></div>
<?php else: ?>

   <h1 style="color: red; margin-left: 20px"> <?= __('You should save letter before checking profiles') ?></h1>
<?php endif; ?>