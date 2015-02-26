

<div style="border: 1px solid silver; padding: 5px; margin: 2px">

    <table>
        <tr>
            <td>
                <?php  $caller_chanel = Chat2ChanelsTable::getChanelByUser($chat2_room->getCaller()); ?>
                <?php if($caller_chanel): ?>
                    <?php
                    $path = $caller_chanel->getHost().$caller_chanel->getUserSrc().'.swf';
                    $params = array ('id' => 'flash_movie',
                        'movie' => $path,
                        'size' => '300x150',
                        'version' => '8',
                        'background_color' => '',
                        'params' => array ('wmode'=> 'transparent',
                            'allowScriptAccess' => 'sameDomain',
                            'quality' => 'high' ),
                        'create_proxy' => false );

                    echo  flash_object ( 'chat_swf_caller', $params );
                    ?>
                <?php endif; ?>
            </td>
            <td>

                <?php  $answer_chanel = Chat2ChanelsTable::getChanelByUser($chat2_room->getAnswer()); ?>
                <?php if($answer_chanel): ?>
                <?php
                $path = $answer_chanel->getHost().$answer_chanel->getUserSrc().'.swf';
                $params = array ('id' => 'flash_movie',
                    'movie' => $path,
                    'size' => '300x150',
                    'version' => '8',
                    'background_color' => '',
                    'params' => array ('wmode'=> 'transparent',
                        'allowScriptAccess' => 'sameDomain',
                        'quality' => 'high' ),
                    'create_proxy' => false );

                echo  flash_object ( 'chat_swf_answer', $params );
                ?>
                <?php endif; ?>


            </td>

        </tr>
    </table>

</div>
