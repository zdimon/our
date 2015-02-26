<?php use_helper('Flash');  ?>






           <div id="camera_loading" class="loading"> <?= __('Загрузка') ?>....</div>
          <table style="margin: 10px">
              <tr>
                  <td width="20"></td>
                  <td>
                      <!-- Подключаем входящую камеру -->
                      
                      <div id="chat_video_in">
                                    
                          <?php include_component('chat','show_video_in',array('gender'=>$sf_user->getGuardUser()->getProfile()->getGender()))?>
                                     
                    
                      <!--   /////////////////////    -->
                      
                      </div>
                      
                      
                  </td>
                  <td width="20"></td>
                  <td>
                      <!-- Подключаем исходящую камеру -->
                      <div id="chat_video_out">
                          <?php 
                           // $sf_user->getGuardUser()->getProfile()->getPacketId()==5 
                          ?>
                      <?php if($sf_user->getGuardUser()->getProfile()->getGender()=='m'): ?>
                        <?php // include_component('chat','show_woman_video_out')?>
                      <?php endif; ?>
                          
                       <?php if($sf_user->getGuardUser()->getProfile()->getGender()=='w'): ?>
                        <?php // include_component('chat','show_man_video_out')?>
                      <?php endif; ?>
                          
                          <!--
                      <div id="chat_video_out">

                          <div align="center"><?= image_tag('/images/icons/no_video.jpg') ?></div>
                          <div align="center" style="color: white"><?= __('Загрузка...') ?></div>

                      </div>
                          -->
                      </div>
                  </td>
                  <td width="20"></td>
                  <td style="text-wrap: none;">
                      <?php if($sf_user->getGuardUser()->getGender()=='m' and $sf_user->getGuardUser()->getProfile()->getPacketId()<4 ):?>

                           <span style=" width: 100px; color: #DD843B; font-size: 12px"><?= __('On your account') ?>: <div style="display: inline-block; font-size: 16px; font-weight: bold;" id="chat_account"><?= $sf_user->getGuardUser()->getAccount() ?></div> <?= __('cretit(s)') ?></span>

                      <?php endif; ?>
                  </td>

              </tr>
              </table>








          <!-- Подключаем камеру девушки -->
        <?php //if($sf_user->getGuardUser()->getGender()=='m') include_component('chat','show_woman_video_out',array('room'=>$room))?>
        <!--   /////////////////////    -->
            

                    <div class="chat_message_box" id="chat_message_box">
                        
                        <?php foreach($messages as $m): ?>
                          <div class="chat_message_item">
                              <?php
                              if($m->getUser()->getGender()=='m')
                              {
                                  $color = 'blue';
                              }
                              else
                              {
                                  $color = 'red';
                              }
                              ?>
                              <i><?= $m->getUser()->getRealName() ?> :</i> <b  style="color: <?=$color?>"><?= nl2br($m->getText()) ?></b>
                              <span class="chat_time"> <?= format_date($m->getCreatedAt(),'t')?></span>
                          </div>
                        <?php endforeach; ?>
                        <div id="new_message" class="chat_message_item"> </div>
                        
                    </div>

                    <div class="chat_form">
                           <?php echo jq_form_remote_tag(array(
                             'url'      => 'chat/send',
                             'loading' => "$('#chat2_message_content').val('');",
                             'update'   => 'new_message',
                             'script'   => true
                             
                           ),array('id'=> 'chat_form')) ?>
                   <div style="background:#fff;border:1px solid #d70101;padding:10px 0 10px 10px;margin:0 0 7px 0;    //zoom:1">
                      <div style="width:450px;overflow:hidden;">
                        <?php echo $form ?>
                      </div>
                   </div>
                     <div>
                         <?php include_component('chat', 'smile')?>
                     </div>
                        <br />
                    <div align="center">
                        <table>
                            <tr>
                                <td>
                                    <input id="chat_submit_button" type="submit" class="but_style" value="<?= __('Send message (Enter)')?>">
                                </td>
                                <td>&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                 <td>
                                    <?= link_to(__('Exit from chat'),'chat/close?r='.$room->getId(),array('class'=>'but_style','style'=>'width: 100px;')) ?>
                                </td>
                            </tr>
                        </table>
                       
                    </div>
                        </form>
                    </div>
           

            <!-- Обновляем контакты-->
                <script>
                <?php echo jq_remote_function( array(
                            'update' => 'chat_contact_list',
                            'loading' => '$("#chat_loading").show();',
                            'complete' => '$("#chat_loading").hide();',
                            'script'=>true,
                            'method'=>'GET',
                            'url' => 'chat/show_contact'
                        )
                        )
                ?>
                </script>
         <!-- вставляем текущего абонента -->
                       <script>
                <?php echo jq_remote_function( array(
                            'update' => 'chat_current_user',
                            'loading' => '$("#chat_loading").show();',
                            'complete' => '$("#chat_loading").hide();',
                            'script'=>true,
                            'method'=>'GET',
                            'url' => 'chat/show_active_user'
                        )
                        )
                ?>
                </script>

         <!-- вставляем входящую камеру -->
        
               <script>
                <?php echo jq_remote_function( array(
                            'update' => 'chat_video_out',
                            'loading' => '$("#chat_loading").show();',
                            'complete' => '$("#chat_loading").hide();',
                            'script'=>true,
                            'method'=>'GET',
                            'url' => 'chat/show_video_out'
                        )
                        )
                ?>
                </script>
         

        

<script>
    $('#chat_message_box').scrollTo('max');

$('#chat2_message_content').keydown(function (e) {

 // if (e.ctrlKey && e.keyCode == 13) {
    if (e.keyCode == 13) {
   $('#chat_submit_button').click();

  }
});

$('#chat2_message_content').focus();

</script>