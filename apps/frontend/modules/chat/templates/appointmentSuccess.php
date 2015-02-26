<br /><br />
    <div align="center">
        <p> <?= __('Appointment text top') ?></p>
    </div>
<form action="<?= url_for('chat/appointment_save') ?>" method="POST" >
<?= $form ?>
    <input type="submit" value="<?= __('Save') ?>" />
</form>
<br />
<div align="center">
<p><?= __('Appointment text bottom') ?></p>
</div>
