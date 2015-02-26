
<br /><br />
<?php if(isset($message)): ?>
 <span style="color: red"><?= $message ?></span>
<?php endif ?>
<br />
<form action="<?= url_for('registration/entercode') ?>">

    <?= __('Please enter the code that your have recieved by email') ?> <input type="text" name="code">
    <input type="submit" value="<?= __('Submit') ?>">
</form>