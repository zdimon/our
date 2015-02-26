<div id="sfForumAction">
    <?php if ($sf_user->isSuperAdmin()): ?>
    <a href="<?php echo url_for('sfForumCategory/new') ?>">New Category</a> -
    <?php endif; ?>
    <?php if($sf_user->isAuthenticated()): ?>
        <a href="<?php echo url_for('sfForumProfil/edit?id='.$sf_user->getGuardUser()->getId()) ?>">Profil</a> -
        <?php if (!empty($topic) and $sf_user->getGuardUser()->getId()==$topic->getAuthor()): ?>
            <?php echo link_to($topic->getName(),'sfForumCategory/edit?id='.$topic->getId()); ?>
        <?php endif; ?>
    <?php endif; ?>
    <?php if (!$sf_user->isAuthenticated()): ?>
        <?php echo link_to('Login','@sf_guard_signin') ?> -
    <?php else: ?>
        <?php echo link_to('Logout', '@sf_guard_signout') ?> -
    <?php endif; ?>
    <input type="text" name="sfForumSearch" />
    <input type="submit" name="sfForumSearchSubmit" value="Search" />
</div