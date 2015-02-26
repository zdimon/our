<?= jq_link_to_remote(__('Check'),
    array(
        'update' => 'pf_'.$p->getId(),
        'url'    => 'newuserletter/check?id='.$p->getId(),
        'loading'  => "$('#loading_".$p->getId()."').show();",
        'complete' => "$('#loading_".$p->getId()."').hide();",
    )
) ?>