<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<?php $category_id = ($form->getObject()->getTopicId()==0)?$sf_request->getParameter('category_id'):$form->getObject()->getTopicId(); ?>

<form action="<?php echo url_for('sfForumTopic/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>

    <input type="hidden" value="<?php echo $category_id ?>" name="sf_forum_message[sfForumTopic][category_id]" id="message_sf_forum_topic_category_id">

    <?php echo $form->renderHiddenFields(); ?>
    <?php echo $form->renderGlobalErrors() ?>
    
    <input type="hidden" value="<?php echo $sf_user->getGuardUser()->getId() ?>" name="sf_forum_message[author]" id="sf_forum_message_author" />
    <input type="hidden" value="<?php echo $sf_user->getGuardUser()->getId() ?>" name="sf_forum_message[sfForumTopic][author]" id="sf_forum_message_sf_forum_topic_author" />


    <?php if (!$form->getObject()->isNew()): ?>
    <input type="hidden" name="sf_method" value="put" />
    <?php endif; ?>
    <table id="sfForumTopicNew">
        <tfoot>
            <tr>
                <td colspan="2">
                    &nbsp;<a class="but" href="<?php echo url_for('sfForumTopic/index?category_id='.$sf_request->getParameter('category_id')) ?>"><?= __('Back to list')?></a>
                    <?php if (!$form->getObject()->isNew()): ?>
                    &nbsp;<?php echo link_to('Delete', 'sfForumTopic/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => __('Are you sure?'))) ?>
                    <?php endif; ?>
                    <div style="float: right;">
                        <input type="submit" class="but" value="<?= __('Save topic') ?>" />
                    </div>

                </td>
            </tr>
        </tfoot>
        <tr>
            <th colspan="2"><h2><?= __('Topic')?></h2></th>
        </tr>
        <tr>
            <th><?php echo $form['sfForumTopic']['name']->renderLabel() ?>:</th>
            <td>
                <?php echo $form['sfForumTopic']['name']->renderError() ?>
                <?php echo $form['sfForumTopic']['name'] ?>
            </td>
        </tr>

        <tr>
            <th colspan="2"><h2><?= __('Message')?></h2></th>
        </tr>
        <tr>
            <th><?php echo $form['content']->renderLabel() ?>:</th>
            <td>
                <?php echo $form['content']->renderError() ?>
                <?php echo $form['content'] ?>
            </td>
        </tr>
    </table>
</form>
