<?php
if($p->getSendAsNew()==true)
{
    $sl = '<span style="color: red">'.__('Uncheck').'</span>';
}
else
{
    $sl = '<span style="color: green">'.__('Check').'</span>';
}
?>

<?= jq_link_to_remote($sl,
    array(
        'update' => 'pf_'.$p->getId(),
        'url'    => 'ajax/check?id='.$p->getId().'&letter='.$letter->getId(),
        'loading'  => "$('#loading_".$p->getId()."').show();",
        'complete' => "$('#loading_".$p->getId()."').hide();",
    ),array('style'=>'font-size: 14px')
) ?>