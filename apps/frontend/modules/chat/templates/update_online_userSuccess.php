
<?php foreach($users as $u): ?>

<div style="padding: 2px">
    <div style="display: inline-block;">

    <?=
       jq_link_to_remote(image_tag($u->getUrlImageSmall(),array('title'=>$u->getRealName())),
               array(
                            'update' => 'chat_content',
                            'loading' => '$("#chat_loading").show();$("#chat_content").hide()',
                            'complete' => '$("#chat_loading").hide();$("#chat_content").show()',
                            'script'=>true,
                            'method'=>'GET',
                            'url' => 'chat/select_user?u='.$u->getUserId()
               ));
    ?>


    </div>
    <div style="display: inline-block;">
        <?= __('ID') ?>: <?= $u->getUserId() ?> <br />
        <?= $u->getRealName() ?> <br />
        <?= $u->getAge() ?> <br />
        <?= $u->getCity() ?> <br />
        <?= $arrc[$u->getCountry()] ?> <br />
        <?= $u->getCameraIndicator() ?>
    </div>
</div>

<?php endforeach;?>

