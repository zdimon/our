<?php $topic_id = ($form->getObject()->getTopicId()==0)?$sf_request->getParameter('topic_id'):$form->getObject()->getTopicId(); ?>
<div id="sfForumAction">
    <a href="<?php echo url_for('sfForumTopic/show?id='.$topic_id) ?>">Back to topic</a> -
    <a href="<?php echo url_for('sfForumProfil/index') ?>">Profil</a> -
    <?php if (!$sf_user->isAuthenticated()): ?>
        <?php echo link_to('Login','@sf_guard_signin') ?> -
    <?php else: ?>
        <?php echo link_to('Logout', '@sf_guard_signout') ?> -
    <?php endif; ?>
    <input type="text" name="sfForumSearch" />
    <input type="submit" name="sfForumSearchSubmit" value="Search" />
</div>