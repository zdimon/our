<div id="sfForumAction">
    <a class="but" href="<?php echo url_for('sfForumMessage/new?topic_id='.$topic->getId()) ?>"><?= __('New Message')?></a>
    <?php if($sf_user->isAuthenticated()): ?>
        <?php if ($sf_user->getGuardUser()->getId()==$topic->getAuthor()): ?>
            <a class="but" href="<?php echo url_for('sfForumTopic/edit?id='.$topic->getId()) ?>"><?= __('Edit Topic')?></a>
        <?php endif; ?>
    <?php endif; ?>
    <a class="but" href="<?php echo url_for('sfForumTopic/index?category_id='.$topic->getCategoryId()) ?>"><?= __('Topic List')?></a>



</div>