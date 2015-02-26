<?php if($page): ?>
<h1> <?=  $page->getItitle() ?></h1>


<?= $page->getIcontent() ?>



<?php if( $sf_request->getParameter('pop')=='true'): ?>
<?php  include_partial('global/common/forms/popup_register_form') ?>
<?php endif; ?>

<?php endif; ?>
