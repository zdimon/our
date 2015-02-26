    <div class="s_text_poss">
        <?php
        $page = Doctrine::getTable('Page')
            ->createQuery('a')
            ->leftJoin('a.Translation t')
            ->where('a.alias=?',array('mainpage'))
            ->fetchOne();
        ?>
        <?= $page->getIcontent(ESC_RAW) ?>
    </div>



<?php include_partial('global/common/forms/popup_register_form', array('formi'=>$formi)) ?>

