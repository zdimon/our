<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>

topic
<?php echo $form->renderHiddenFields(); ?>
<?php echo $form->renderGlobalErrors() ?>

<tr>
    <th><?php echo $form['name']->renderLabel() ?>:</th>
    <td>
        <?php echo $form['name']->renderError() ?>
        <?php echo $form['name'] ?>
    </td>
</tr>