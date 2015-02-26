<?php use_helper('I18N', 'Date') ?>
<?php include_partial('message/assets') ?>


<table width="100%">
    <tr>
        <td>
            From     
        </td>
        
        <td>
            To
        </td>
        

        <td>
            Is read
        </td>
        
        <td>
            Date
        </td>
        
        <td>
            Answered
        </td>        
        
        <td>
            Read
        </td> 
        
    </tr>
    
   <?php foreach ($pager->getResults() as $i): ?>
    <tr style="height: 50px">
        <td>
             <?php include_partial('global/common/user_info',array('u'=>$i->getFromUser()))?>
        </td>
        
        
    
        <td>
             <?php include_partial('global/common/user_info',array('u'=>$i->getToUser()))?>
        </td>        

        
        <td>
            <?= $i->getIsRead() ?>
        </td> 
        
        <td>
            <?= $i->getCreatedAt() ?>
        </td> 
        
        
        <td>
            <?= $i->getIsReply() ?>
        </td> 
        
        <td>
            <?= link_to('Read','message/show?id='.$i->getId()) ?>
        </td> 
        
        <td>
            <?php include_partial('message/ans', array('message' => $i)) ?>
        </td>
        
    </tr>
    
    <?php endforeach; ?>
    
</table>


<?php echo pager_navigation($pager, url_for('message/stat'),array('alias')) ?>