<?php if($form->getObject()->getId()>0): ?>
<form action="<?= url_for('staff/edit?id='.$form->getObject()->getId()) ?>" method="POST">
<?php else: ?>
<form action="<?= url_for('staff/new') ?>" method="POST">
<?php endif; ?>
    <table>
    <?= $form ?>
        <tr>
            <td>
                <input type="submit" value="<?= __('Save') ?>" />
            </td>
        </tr>
    
    </table>
</form>