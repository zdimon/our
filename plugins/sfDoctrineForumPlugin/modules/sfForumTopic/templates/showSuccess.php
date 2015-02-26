<h1><?php echo $topic->getName() ?></h1>

<?php include_partial('menu_message',array('topic'=>$topic)) ?>

<div class="paginate">
    <?php // if ($pager->haveToPaginate()): ?>
    <?php include_partial('paginate', array('pager' => $pager)) ?>
    <?php // endif; ?>
</div>

<table id="sfForumTopicShow">

    <?php foreach($pager->getResults() as $message): ?>
    <tr>
        <td class="sfForumTopicShowInfo">

            <?php include_partial('global/common/user_info',array('arrc'=>$arrc,'arrl'=>$arrl,'profile'=>$message->getUser()->getProfile()))?>

        </td>
        <td class="sfForumTopicShowContent">
            <p class="message_content"><?php echo nl2br($message->getContent()) ?></p>
                
            <p class="sfForumShowEdited"><?= __('Created the')?> <?php echo $message->getCreatedAt() ?>
                <?php if ($message->getUpdatedAt()!=$message->getCreatedAt()): ?>
                    - Edited the <?php echo $message->getUpdatedAt(); ?></p>
                <?php endif; ?>
                <?php if($sf_user->isAuthenticated()): ?>
                    <?php if ($sf_user->getGuardUser()->getId()==$message->getAuthor()): ?>
            <p style="display: inline-block; float: right;">
                <a class="but" style="color: white;" href="<?php echo url_for('sfForumMessage/edit?id='.$message->getId()) ?>"><?= __('Edit')?></a>
                <?php echo link_to(__('Delete'), 'sfForumMessage/delete?id='.$message->getId(), array('method' => 'delete','class'=>'but', 'style'=>'color: white', 'confirm' => __('Are you sure?'))) ?>
            </p>
                    <?php endif; ?>
                <?php endif; ?>
        </td>
    <tr>
        <?php endforeach; ?>

</table>

<div class="paginate">
    <?php // if ($pager->haveToPaginate()): ?>
    <?php include_partial('paginate', array('pager' => $pager)) ?>
    <?php // endif ?>
</div>

<?php if($sf_user->isAuthenticated()): ?>
    <?php include_partial('form_message', array('form' => $form,'topic_id' => $topic->getId())) ?>
<?php endif; ?>