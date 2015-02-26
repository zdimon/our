<h1>Topics List</h1>

<?php include_partial('menu') ?>

<div class="paginate">
<?php // if ($pager->haveToPaginate()): ?>
    <?php include_partial('paginate', array('pager' => $pager)) ?>
<?php // endif; ?>
</div>

<table id="sfForumTopicIndex">
    <thead>
        <tr>
            <th><?= __('Author')?></th>
            <th><?= __('Topic')?></th>
            <th><?= __('Hits')?></th>
            <th><?= __('Information')?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($pager->getResults() as $topic): ?>
        <tr onclick="document.location.href='<?php echo url_for('sfForumTopic/show?id='.$topic->getId()) ?>'">
            <td width="200px">

                <?php
                $arrc = sfCultureInfo::getInstance(sfContext::getInstance()->getUser()->getCulture())->getCountries();
                $g_user = $topic->getUser();
                ?>
                <?php include_partial('global/common/search_item',array('profile'=>$g_user->getProfile(),'arrc'=>$arrc)); ?>
            </td>
            <td>
                <?php echo link_to($topic->getName(),'sfForumTopic/show?id='.$topic->getId()) ?>

            </td>

            <td><?php echo $topic->getHits() ?></td>
            <td>
                <?php echo __('Created at').': '.format_date($topic->getCreatedAt(),'f') ?> <br/>
                <?php echo __('Updated at').': '.format_date($topic->getUpdatedAt(),'f') ?>
            </td>

        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<div class="paginate">
<?php // if ($pager->haveToPaginate()): ?>
    <?php include_partial('paginate', array('pager' => $pager)) ?>
<?php // endif; ?>
</div>

