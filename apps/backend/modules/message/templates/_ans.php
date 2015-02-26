<?= jq_link_to_remote('Reply',
    array(
        'update' => 'form_ans_'.$message->getId(),
        'url'    => 'message/answer?mesid='.$message->getId(),
        'loading'  => "$('#loading_".$message->getId()."').hide();",
        'complete' => "$('#loading_".$message->getId()."').hide();",
    )
) ?>
<div id="form_ans_<?= $message->getId() ?>">

</div>
