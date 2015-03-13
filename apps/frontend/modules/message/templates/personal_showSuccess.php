
    <h1><?= __('Messages') ?></h1>


   <?php include_partial('message/menu')?>


    

    <?php if($pager->getNbResults()):?>

    <table class="table3" width="100%">
    <tr>

        <td valign="top">
             <?= include_partial('global/common/user_info',array('profile'=>$ab->getsfGuardUser()->getProfile(),'arrc'=>$arrc,'arrl'=>$arrl)) ?>
           <div style="float: right"> <?= link_to(__('Вернутсья к списку контактов'),'message/personal') ?></div>
        </td>
    </tr>
    </table>

<br />
<div style="height: 800px; overflow: auto">
    <?php foreach ($pager->getResults() as $m): ?>

                 <table class="table3" width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <th><span class="date_massages"><?= format_date($m->getCreatedAt(),'D') ?></span> Letter # <?= $m->getId() ?></th>
                        <th class="status not_answ"><?= $m->getStatus() ?></th>
                      </tr>
                      <tr>
                        <td class="text_messages" colspan="2">


                           


                            <?php echo $m->getLinkTitle() ?>



                            <div style="float: right">
                                              <?php if($m->getFromId()==$sf_user->getGuardUser()->getId()): ?>
                                                          <?= link_to(__('Написать еще'),'message/send?username='.$m->getToUser()->getUsername(),array('title'=>__('Ответить'))) ?>
                                                          <?php // echo link_to(__('Удалить'),'message/delto?id='.$m->getId(),array('title'=>__('Удалить'),'confirm'=>__('Вы уверены?'))) ?>
                                              <?php else: ?>
                                                          <?php if(!$m->getIsReply()): ?>
                                                           <?= link_to(__('Ответить'),'message/send?reply_id='.$m->getId().'&username='.$m->getFromUser()->getUsername(),array('title'=>__('Ответить'))) ?>
                                                          <?php endif ?>
                                                          <?php // echo link_to(__('Удалить'),'message/delto?id='.$m->getId(),array('title'=>__('Удалить'),'confirm'=>__('Вы уверены?'))) ?>
                                              <?php endif ?>

                            </div>
                        </td>
                      </tr>
                 </table>



        <script type="text/javascript">
            $("a.floatleft").fancybox({
                'transitionIn' : 'none',
                'transitionOut' : 'none',
                'titlePosition' : 'inside',
                'titleFormat' : function(title, currentArray, currentIndex, currentOpts) {
                    return '(' + (currentIndex + 1) + '/' + currentArray.length + ') ' + title;
                }
            });

        </script>
              
                    
         


         
        <?php endforeach; ?>
</div>

        <?php echo pager_navigation($pager, url_for('message/personal_show'),array('alias')) ?>



    <?php endif ?>



