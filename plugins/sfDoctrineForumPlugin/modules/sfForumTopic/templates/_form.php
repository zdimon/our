<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>
<?php $category_id = ($form->getObject()->getCategoryId()==0)?$sf_request->getParameter('category_id'):$form->getObject()->getCategoryId(); ?>

<form action="<?php echo url_for('sfForumTopic/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>

<input type="hidden" value="<?php echo $sf_user->getGuardUser()->getId() ?>" name="sf_forum_topic[author]" id="sf_forum_topic_author" />
<input type="hidden" value="<?php echo $category_id ?>" name="sf_forum_topic[category_id]" id="sf_forum_topic_category_id" />

<?php echo $form->renderHiddenFields(); ?>
<?php echo $form->renderGlobalErrors() ?>
<?php echo $form['author']->renderError() ?>

<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table id="sfForumTopicNew">
    <tfoot>
      <tr>
        <td colspan="2">
          &nbsp;<a href="<?php echo url_for('sfForumTopic/index?category_id='.$category_id) ?>">Back to list</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'sfForumTopic/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" value="Save" />
        </td>
      </tr>
    </tfoot>
    <tbody>
    <tr>
      <th><?php echo $form['name']->renderLabel() ?>:</th>
      <td>
        <?php echo $form['name']->renderError() ?>
        <?php echo $form['name'] ?>
      </td>
    </tr>

    </tbody>
  </table>
</form>
