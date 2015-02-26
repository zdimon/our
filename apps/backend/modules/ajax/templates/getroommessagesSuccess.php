<?php foreach($mes as $m): ?>
<div id="messages">
    <span style="color: green; font-size: 12px"> <?php echo $m->getContent() ?> </span>

    <span style="color: red; float: right;"><?php echo $m->getUser() ?>  <?php echo $m->getCreatedAt() ?></span>
</div>
<br />

<?php endforeach; ?>