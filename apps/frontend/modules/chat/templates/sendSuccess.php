<script>
    $('#chat2_message_content').val('');
    
    $('#chat_message_box').scrollTo('max');

</script>

                          <div class="chat_message_item">
                              <i><?= $m->getUser()->getRealName() ?> :</i> <b><?= nl2br($m->getText()) ?></b>
                              <span class="chat_time"> <?= format_date($m->getCreatedAt(),'t')?></span>
                          </div>
<div id="new_message" class="chat_message_item"> </div>

