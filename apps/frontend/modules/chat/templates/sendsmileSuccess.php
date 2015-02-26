<script>
    
    $('#chat_message_box').scrollTo('max');

    </script>

                          <div class="chat_message_item">
                              <i><?= $m->getUser()->getRealName() ?> :</i> <b><?= $m->getContent() ?></b>
                              <span class="chat_time"> <?= format_date($m->getCreatedAt(),'t')?></span>
                          </div>
<div id="new_message" class="chat_message_item"> </div>
