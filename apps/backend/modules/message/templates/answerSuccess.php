<div id="mesans_<?= $mes->getId() ?>"></div>
<div id="mes_f_<?= $mes->getId() ?>">
<?php
echo jq_form_remote_tag(
    array(
        'update' => 'mesans_'.$mes->getId(),
        'url'    => 'message/messave?mesid='.$mes->getId(),
        'loading'  => "$('#loading_".$mes->getId()."').hide();",
        'complete' => "$('#mes_f_".$mes->getId()."').hide();",
    )
)

?>

<textarea name="cont" style="width: 200px; height: 50px"> </textarea>
<input type="submit" value="<?= __('Сохранить')?>">
</form>
</div>