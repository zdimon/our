<?php $p = $form->getObject() ?>
<div style="border: 1px solid red; padding: 5px; font-size: 12px;">
     <p>   <?=__('Name')?>: <strong><?= $p->getFirstName() ?></strong></p>
     <p>   <?=__('Surname')?>: <strong><?= $p->getLastName() ?></strong></p>
     <p>   <?=__('City')?>: <strong><?= $p->getCity() ?></strong></p>
     <p>   <?=__('Occupation')?>: <strong><?= $p->getOccupation() ?></strong></p>
    
</div>