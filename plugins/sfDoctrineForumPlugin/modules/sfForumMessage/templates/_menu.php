<div id="sfForumAction">
    <a href="<?php echo url_for('sfForumTopic/new') ?>">New Topic</a> -
    <a href="<?php echo url_for('sfForumTopic/index') ?>">Topic List</a> -
    <a href="<?php echo url_for('sfForumProfil/index') ?>">Profil</a> -
    <?php if (!$sf_user->isAuthenticated()): ?>
        <?php echo link_to('Login','@sf_guard_signin') ?> -
    <?php else: ?>
        <?php echo link_to('Logout', '@sf_guard_signout') ?> -
    <?php endif; ?>
    <input type="text" name="sfForumSearch" />
    <input type="submit" name="sfForumSearchSubmit" value="Search" />
</div