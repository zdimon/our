
  

  <?php for($i=1; $i<17; $i++): ?>

<img src="/images/smile/s<?=$i?>.gif" onclick="$('#chat2_message_content').val($('#chat2_message_content').val()+' :smile<?=$i?>: '); $('#chat2_message_content').focus();">

 <?php endfor; ?>



