<?php use_helper('Flash');  ?>
<?php
                            if($type=='in')
                            {
                             $act = 'out';
                            
                            }
                             else {
                             $act = 'in';
                             
                            }

                            $stream_name = 'room_'.$room->getId().'_'.$gender;
                            $url = urlencode('rtmp://video.our-feeling.com:33333/myapp');
?>
<style type="text/css" media="screen">
    #flashContent { width:100%; height:100%; }
</style>

<div id="flashContent">
    <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" width="240" height="180" id="chat" align="middle">
        <param name="movie" value="/chat.swf" />
        <param name="quality" value="high" />
        <param name="bgcolor" value="#ffffff" />
        <param name="play" value="true" />
        <param name="loop" value="true" />
        <param name="wmode" value="window" />
        <param name="scale" value="showall" />
        <param name="menu" value="true" />
        <param name="devicefont" value="false" />
        <param name="salign" value="" />
        <param name="allowScriptAccess" value="sameDomain" />
        <param name="FlashVars" value="streamName=<?= $stream_name ?>&url=<?= $url ?>&micOn=true&type=<?= $act ?>" />
        <!--[if !IE]>-->
        <object type="application/x-shockwave-flash" data="/chat.swf" width="240" height="180">
            <param name="movie" value="/chat.swf" />
            <param name="quality" value="high" />
            <param name="bgcolor" value="#ffffff" />
            <param name="play" value="true" />
            <param name="loop" value="true" />
            <param name="wmode" value="window" />
            <param name="scale" value="showall" />
            <param name="menu" value="true" />
            <param name="devicefont" value="false" />
            <param name="salign" value="" />
            <param name="allowScriptAccess" value="sameDomain" />
            <param name="FlashVars" value="streamName=<?= $stream_name ?>&url=<?= $url ?>&micOn=true&type=<?= $act ?>" />
            <!--<![endif]-->
            <a href="http://www.adobe.com/go/getflash">
                <img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Загрузить Adobe Flash Player" />
            </a>
            <!--[if !IE]>-->
        </object>
        <!--<![endif]-->
    </object>
</div>
<?php if($type=='out'): ?>
<?php echo jq_link_to_remote(__('Reload camera.'), array(
                            'update' => 'chat_video_out',
                            'loading' => '$("#chat_video_out").hide();',
                            'complete' => '$("#chat_video_out").show();',
                            'script'=>true,
                            'method'=>'GET',
                            'url' => 'chat/show_video_out'
                        )
                        )
                ?>
<?php endif; ?>
