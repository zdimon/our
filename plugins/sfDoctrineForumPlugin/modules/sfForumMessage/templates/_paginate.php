<?php $routeName = $sf_context->getRouting()->getCurrentInternalUri(false) ?>
<?php
    if(strpos($routeName, '?') !== false)
        $routeName .= "&";
    else
        $routeName .= "?";
?>
<?php echo link_to('First', $routeName.'page=1') ?>

<?php echo link_to('Previous', $routeName.'page='.$pager->getPreviousPage()) ?>

<?php foreach ($pager->getLinks() as $page): ?>
    <?php if ($pager->getPage() == $page): ?>
        <?php echo $page ?>
    <?php else: ?>
        <?php echo link_to($page, $routeName."page=$page") ?>
    <?php endif; ?>
<?php endforeach; ?>

<?php echo link_to('Next', $routeName.'page='.$pager->getNextPage()) ?>

<?php echo link_to('Last', $routeName.'page='.$pager->getLastPage()) ?>