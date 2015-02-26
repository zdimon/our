<?php if(strlen($faq->getImage())>0):?>

<a  style="display: block; width: 100px" href="http://<?= $_SERVER['HTTP_HOST'] ?>/uploads/faq/<?=$faq->getImage()?>" id="dialog_link" target="_blank" class="ui-state-default ui-corner-all"><span class="ui-icon ui-icon-document"></span><?= __('Вложение') ?></a>


<?php endif ?>

