
<div style="border: 1px solid silver; padding: 10px">

    <h1><?= __('Messages') ?></h1>

    <?php $mes = $chat2_room->getAllMessages() ?>


    <?php foreach($mes as $m): ?>
      <div id="messages">
            <span style="color: green; font-size: 12px"> <?php echo $m->getContent() ?> </span>

            <span style="color: red; float: right;"><?php echo $m->getUser() ?>  <?php echo $m->getCreatedAt() ?></span>
      </div>
      <br />

    <?php endforeach; ?>

</div>


<?php
echo jq_periodically_call_remote(array(
    'frequency' => 10,
    'update' => 'messages',
    'script'=>true,
    'method'=>'GET',
    'url' => url_for('ajax/getroommessages?id='.$chat2_room->getId()),
))
?>
