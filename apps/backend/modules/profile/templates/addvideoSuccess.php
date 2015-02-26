
<?php use_helper('I18N', 'Date') ?>
<?php include_partial('global/assets') ?>

<div style="font-size: 12px" id="sf_admin_container" class="sf_admin_edit ui-widget ui-widget-content ui-corner-all">
  <div class="fg-toolbar ui-widget-header ui-corner-all">
    <h1> <?= __('Добавление видео') ?></h1>
  </div>


<form enctype="multipart/form-data" method="post" class="form_style" action="<?php echo url_for('profile/addvideo?id='.$form->getObject()->getUserId()) ?>">

  <table>
    <tfoot>
      <tr>
        <td colspan="2">

          <input type="submit" value="<?= __('Сохранить') ?>" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form ?>
    </tbody>
  </table>
</form>

</div>



