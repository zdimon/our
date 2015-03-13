<h1><?php echo __('Show message') ?></h1>

<?php include_partial('message/menu')?>
<div align="center">
    <div style=" padding: 10px; width: 550px; border: 1px solid #FFB552">
<table width="100%" class="table3">
    <tr>
    <td valign="top" width="90px">
        <?php include_partial('global/common/user_info',array('profile'=>$m->getFromUser()->getProfile(),'arrc'=>$arrc,'arrl'=>$arrl)); ?>
    </td>
    <td valign="top">


        <?= $m->getContent() ?>

    </td>
    </tr>


    <?php if(strlen($m->getImage())>0):?>
    <tr>
       <td align="center" colspan="2">
           <div align="center">
               <?php echo link_to(image_tag('http://'.$_SERVER['HTTP_HOST'].'/uploads/message/original/'.$m->getImage(),array('style'=>'width: 350px')),'http://'.$_SERVER['HTTP_HOST'].'/uploads/message/original/'.$m->getImage()) ?>
           </div>
       </td>
    </tr>

    <?php endif; ?>



</table>

<div style="float:right;">
<table>
    <tr>
        <td>

            <?php if($m->getFromId()==$sf_user->getGuardUser()->getId()): ?>
            <?php echo link_to(__('Write more'),'message/send?reply_id='.$m->getId().'&username='.$m->getToUser()->getUsername(),array('class'=>'but','title'=>__('Ответить'))) ?>
            <?php else: ?>
            <?php echo link_to(__('Reply'),'message/send?reply_id='.$m->getId().'&username='.$m->getFromUser()->getUsername(),array('class'=>'but','title'=>__('Ответить'))) ?>
            <?php endif ?>


        </td>
        <td>&nbsp;</td>
        <td><?php echo link_to(__('Удалить'),'message/delto?id='.$m->getId(),array('title'=>__('Удалить'), 'class'=>'but','confirm'=>__('Вы уверены?'))) ?></td>
        <td>&nbsp;</td>
        <td><?= link_to(__('Go to correspondents'),'message/personal',array('class'=>'but')) ?></td>
    </tr>
</table>

</div>

<script type="text/javascript">
    $("a.floatleft").fancybox({
        'transitionIn' : 'none',
        'transitionOut' : 'none',
        'titlePosition' : 'inside',
        'titleFormat' : function(title, currentArray, currentIndex, currentOpts) {
            return '(' + (currentIndex + 1) + '/' + currentArray.length + ') ' + title;
        }
    });

</script>
        </div>
    </div>
