<?php use_helper('Flash');  ?>
<?php

    $path = $chat2_chanels->getHost().'get.swf';

$params = array ('id' => 'flash_movie_'.$chat2_chanels->getId(),
    'movie' => $path,
    'size' => '230x150',
    'version' => '8',
    'background_color' => '',
    'params' => array ('wmode'=> 'transparent',
        'allowScriptAccess' => 'sameDomain',
        'quality' => 'high' ),
    'create_proxy' => false );

echo  flash_object ( 'chat_swf_'.$chat2_chanels->getId(), $params );
?>