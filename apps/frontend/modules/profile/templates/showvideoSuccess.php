
<h1> <?= __('Video of ') ?> <?= $p->getFullName() ?></h1>

<table width="100%">
    <tr>
        <td>
            <?php include_partial('global/common/user_info',array('arrc'=>$arrc,'arrl'=>$arrl,'profile'=>$p))?>
        </td>
        <td>
            <li><?= link_to(__('Send the message'),'message/send?username='.$p->getsfGuardUser()->getUsername(),array('id'=>'l_send_message'))  ?></li>
            <li><?= link_to(__('Send interest'),'interest/add?username='.$p->getsfGuardUser()->getUsername(),array('id'=>'l_add_friend')) ?></li>
            <li><?= link_to(__('Add to favourites'),'friend/add?username='.$p->getsfGuardUser()->getUsername(),array('id'=>'l_add_friend')) ?></li>
        </td>
    </tr>
</table>


<?php $vid = VideoTable::getUserVideo($p->getsfGuardUser())?>

<?php foreach($vid as $video): ?>
<?php $arp = explode('x',$video->getFormat() )?>

  <div align="center">
        <div id="container_video_<?= $video->getId() ?>"><a href="http://www.macromedia.com/go/getflashplayer">Get the Flash Player</a></div>
        <script type="text/javascript" src="/js/swfobject.js"></script>
        <script type="text/javascript">
            var s1 = new SWFObject("/js/player.swf","ply","<?php echo $arp[0]?>","<?php echo $arp[1]?>","9","#FFFFFF");
            s1.addParam("allowfullscreen","true");
            s1.addParam("allowscriptaccess","always");
            s1.addParam("flashvars","file=/uploads/video/<?php echo $video->getFilePath() ?>&image=/uploads/video/thumbnail/<?php echo $video->getFilePath().'.jpeg' ?>");
            s1.write("container_video_<?= $video->getId() ?>");
        </script>
  </div>
<?php endforeach; ?>
<br /><br />