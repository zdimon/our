<div class="sf_admin_form_row">
    <label> Переписка </label>

    <?php
      $me = Doctrine::getTable('Faq')
    ->createQuery('a')
              ->where('a.parent_id=?',array( $faq->getId()))
              ->orderBy('a.id')
              ->execute();
    ?>

    <table>
    <?php foreach($me as $m):?>
       <tr>
           <td> <?= format_date($m->getCreatedAt(),'D') ?></td>
           <td style="padding-left: 10px; font-weight: bold"> <?= nl2br($m->getDescription()) ?></td>
           <td>
              <?php if(strlen($m->getImage())>0): ?>
                 <a  style="display: block; width: 100px" href="http://<?= $_SERVER['HTTP_HOST'] ?>/uploads/faq/<?=$m->getImage()?>" id="dialog_link" target="_blank" class="ui-state-default ui-corner-all"><span class="ui-icon ui-icon-document"></span><?= __('Вложение') ?></a>
               <?php endif; ?>
           </td>
       </tr>
    <?php endforeach; ?>
    </table>

    <form action="<?= url_for('faq/savemessage') ?>" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $faq->getId() ?>">
        <div class="row">
            <textarea name="message"></textarea>
        </div>
        <div class="row">
            <input type="file" name="attach">
        </div>
        <div class="row">
            <input type="submit" value="<?= __('Сохранить') ?>">
        </div>

    </form>


</div>

