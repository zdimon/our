<?php $routeName = $sf_context->getRouting()->getCurrentInternalUri(false) ?>

<?php
    if(strpos($routeName, '&amp;page=') !== false) {
        $routeName = substr($routeName, 0, strpos($routeName, '&amp;page='));
    }
    if(strpos($routeName, '?') !== false)
        $routeName .= "&";
    else
        $routeName .= "?";
?>

<?php echo link_to('First', $routeName.'page=1'.'&id='.$sf_request->getParameter('id')) ?>

<?php echo link_to('Previous', $routeName.'page='.$pager->getPreviousPage().'&id='.$sf_request->getParameter('id')) ?>

<?php foreach ($pager->getLinks() as $page): ?>
    <?php if ($pager->getPage() == $page): ?>
        <?php echo $page ?>
    <?php else: ?>
        <?php echo link_to($page, $routeName."page=$page".'&id='.$sf_request->getParameter('id')) ?>
    <?php endif; ?>
<?php endforeach; ?>

<?php echo link_to('Next', $routeName.'page='.$pager->getNextPage().'&id='.$sf_request->getParameter('id')) ?>

<?php echo link_to('Last', $routeName.'page='.$pager->getLastPage().'&id='.$sf_request->getParameter('id')) ?>