<?php if(isset($message_error)): ?>
<div id="dialog_private_video" title="<?= __('Error') ?>">
    <div align="center">
     <?= $message_error ?>
    </div>
</div>

<?php else:?>
<div id="dialog_private_video" title="<?= __('View video') ?>">
    <?php if(isset($message)): ?>
        <div align="center">
         <?= $message ?> <br /><br />
        </div>
    <?php endif; ?>
    
<?php $arp = explode('x',$video->getFormat() )?>
<div align="center">
            <div id="container_video"><a href="http://www.macromedia.com/go/getflashplayer">Get the Flash Player</a></div>
                <script type="text/javascript" src="/js/swfobject.js"></script>
                <script type="text/javascript">
                        var s1 = new SWFObject("/js/player.swf","ply","250","199","9","#FFFFFF");
                        s1.addParam("allowfullscreen","true");
                        s1.addParam("autostart","true");
                        s1.addParam("allowscriptaccess","always");
                        s1.addParam("flashvars","file=/uploads/video/<?php echo $video->getFilePath() ?>&image=/images/play.png&autostart=true");
                        s1.write("container_video");

                </script>
</div>

</div>



<?php endif; ?>