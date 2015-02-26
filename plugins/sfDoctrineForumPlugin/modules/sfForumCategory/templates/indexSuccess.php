<?php if($page): ?>
<br />
<p>
    <?= $page->getIcontent() ?>
</p>
<?php endif ?>

<h1><?= __('Forums categories') ?></h1>

<?php // include_partial('menu') ?>

<div class="paginate">
<?php // if ($pager->haveToPaginate()): ?>
    <?php include_partial('paginate', array('pager' => $pager)) ?>
<?php // endif; ?>
</div>

<table id="sfForumCategoryIndex">
  <thead>
    <tr>
        <th><?= __('Last post')?></th>
      <th><?= __('Name')?></th>
      <th><?= __('Hits')?></th>
      <th><?= __('Created at') ?></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($pager->getResults() as $category): ?>
    <tr onclick="document.location.href='<?php echo url_for('sfForumTopic/index?category_id='.$category->getId()) ?>'">
       <td width="200px">
           <?php
             $arrc = sfCultureInfo::getInstance(sfContext::getInstance()->getUser()->getCulture())->getCountries();
             $g_user = $category->getLastuser();
           ?>
           <?php if($g_user->getProfile()): ?>
             <?php include_partial('global/common/search_item',array('profile'=>$g_user->getProfile(),'arrc'=>$arrc)); ?>
           <?php endif; ?>
       </td>
      <td>
            <?php echo link_to($category->getName(),'sfForumTopic/index?category_id='.$category->getId()); ?><br />
            <?php echo $category->getDescription() ?>
      </td>
      <td><?php echo $category->getHits() ?></td>
      <td><?php echo $category->getCreatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<div class="paginate">
<?php // if ($pager->haveToPaginate()): ?>
    <?php include_partial('paginate', array('pager' => $pager)) ?>
<?php // endif; ?>
</div>
