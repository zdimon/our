<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('sfForumProfil/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
    <?php if (!$form->getObject()->isNew()): ?>
    <input type="hidden" name="sf_method" value="put" />
    <?php endif; ?>
    <table id="sfForumProfil">
        <tfoot>
            <tr>
                <td colspan="2">
                    <?php echo $form->renderHiddenFields(true) ?>
                    <?php if($sf_user->isSuperAdmin()): ?>
                    <a href="<?php echo url_for('sfForumProfil/index') ?>">User list</a>
                    <?php endif; ?>
                    <a href="<?php echo url_for('sfForumCategory/index') ?>">Back to Forum</a>
                    <?php if (!$form->getObject()->isNew()): ?>
                    &nbsp;<?php echo link_to('Delete', 'sfForumProfil/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
                    <?php endif; ?>
                    <input type="submit" value="Save" />
                </td>
            </tr>
        </tfoot>
        <tbody>
            <?php echo $form->renderGlobalErrors() ?>
            <?php
            echo $form
            // <input type="hidden" value="1" name="sf_guard_user[avatar][user_id]" id="sf_guard_user_avatar_user_id" />
            ?>
            <?php if ($form->getObject()->getsfForumProfile()->getImage()!=''): ?>
            <tr>
                <th>Avatar</th>
                <td><?php echo image_tag('/uploads/images/'.$form->getObject()->getsfForumProfile()->getImage(),array('style'=>'max-height:150px;max-width:150px')) ?></td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
</form>