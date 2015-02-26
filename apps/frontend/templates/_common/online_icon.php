
<?php if($guser->getIsOnline()): ?>
<div align="center" style="text-align: center; width:100px; float:left; color: #fff; margin:0 0 0 2%; background: url('/images/butonline.gif')"><strong><?= __('onLINE')?></strong></div>
<?php else: ?>
<div align="center" style="text-align: center; width:100px; float:left; color: #fff; margin:0 0 0 2%;"><strong><?= __('OffLine') ?></strong></div>
<?php endif; ?>