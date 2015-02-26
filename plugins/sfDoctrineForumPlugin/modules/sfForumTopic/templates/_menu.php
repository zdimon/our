<?php $category_id = (!isset($topic) or $topic==null or $topic->getCategoryId()==0)?$sf_request->getParameter('category_id'):$topic->getCategoryId(); ?>

<div id="sfForumAction">
    <a class="but" href="<?php echo url_for('sfForumTopic/new?category_id='.$sf_request->getParameter('category_id')) ?>"><?= __('New Topic')?></a>
    <a class="but"href="<?php echo url_for('sfForumCategory/index') ?>"><?= __('Category List')?></a>
    <a class="but" href="<?php echo url_for('sfForumTopic/index?category_id='.$category_id) ?>"><?= __('Topic List')?></a>



</div>