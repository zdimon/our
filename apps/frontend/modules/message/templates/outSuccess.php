<h1><?php echo __('Исходящие сообщения') ?></h1>


<?php include_partial('message/menu')?>
<?php include_partial('message/filter_out')?>
<div style="clear: both"></div>
<?php if(!$pager->getNbResults()):?>
        <div class="alert_error" align="center">
            <?= __('No data')  ?>
        </div>
<?php else: ?>
<form method="POST" class="form_style" action="<?= url_for('message/delout') ?>">
        <table class="table3" width="100%" border="0" cellspacing="0" cellpadding="0">
          <thead>
          <th><input name="se" class="all"  type="checkbox"></th>
            <th colspan="2" align="center">

              <?php echo pager_navigation($pager, url_for('message/out'),array('alias')) ?>


            </th>
          </thead>
          <tbody>
            <?php foreach ($pager->getResults() as $message): ?>
            <tr>
            <td width="1%"><input name="sel[]" type="checkbox" value="<?= $message->getId() ?>"></td>
              <td>
                  <?php $pr =  $message->getToUser()->getProfile();?>
                  <?php if($pr): ?>
                  <?php  include_partial('global/common/user_info',array('profile'=>$message->getToUser()->getProfile(),'arrc'=>$arrc,'arrl'=>$arrl)) ?>
                  <?php else: ?>
                   <?=  $message->getToId() ?>
                  <?php endif; ?>

              </td>
              <td valign="top" style="padding-top: 10px">


                  <?php echo $message->getLinkTitle() ?>

                <div style="text-align: left">
                 <?php echo format_date($message->getCreatedAt(),'D') ?>
		</div>
                  
                  <div style="text-align: right">
                  <?php echo link_to(__('Написать еще'),'message/send?username='.$message->getToUser()->getUsername(),array('title'=>__('Написать еще'))) ?>
                   <?php echo link_to(__('Удалить'),'message/delout?id='.$message->getId(),array('title'=>__('Удалить'),'confirm'=>__('Вы уверены?'))) ?>
		</div>
              </td>
             
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
        

        <?php echo pager_navigation($pager, url_for('message/out'),array('alias')) ?>
         <input type="submit" class="but" value="<?= __('Удалить выбранное') ?>">
     </form>

<?php endif; ?>

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
        
