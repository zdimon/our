<?php include_partial('global/assets') ?>
<h1> <?= __('Просмотр видеоролика') ?></h1>
<?php $arp = explode('x',$video->getFormat() )?>

            <div id="container_video"><a href="http://www.macromedia.com/go/getflashplayer">Get the Flash Player</a></div>
                <script type="text/javascript" src="/js/swfobject.js"></script>
                <script type="text/javascript">
                        var s1 = new SWFObject("/js/player.swf","ply","480","320","9","#FFFFFF");
                        s1.addParam("allowfullscreen","true");
                        s1.addParam("allowscriptaccess","always");
                        s1.addParam("flashvars","file=/uploads/video/<?php echo $video->getFilePath().'.flv' ?>&image=/uploads/video/thumbnail/<?php echo $video->getFilePath().'.jpeg' ?>");
                        s1.write("container_video");
                </script>

                <br /><br />

                <?php echo link_to(__('Вернуться к списку'),'video/index') ?>
