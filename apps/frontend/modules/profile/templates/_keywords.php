<?php
  $t = TypeKeywordsTable::getInstance()->find($id);
  $it = KeywordTable::getInstance()->createQuery('a')
          ->where('a.type_keywords_id=?',array($id))
          ->execute();
  $akr = User2KeywordTable::getInstance()->createQuery('a')
          ->where('a.user_id=?',array($user->getId()))
          ->execute();

  $keys = array();
  if(isset($akr))
  {
   foreach ($akr as $a)
            {
                $keys[] = $a->getKeywordId(); 
            }
  }
 

  
?>
<label style="width: 300px; display: block; margin-bottom: 10px; margin-top: 10px; text-align: left"><?= $t->getTitle() ?></label>
<div class="keyword_list">
<?php foreach($it as $i): ?>
    <div class="keyword_item">
        <input type="checkbox" <?php if(in_array($i->getId(), $keys)) echo 'checked' ?>  name="keywords[]" id="it<?=$i->getId()?>" value="<?=$i->getId()?>"> <label style="display: inline-block; width: auto" for="it<?=$i->getId()?>"><?= $i->getTitle() ?></label>
    </div>
<?php endforeach; ?>
    <div style="clear: both"></div>
</div>
