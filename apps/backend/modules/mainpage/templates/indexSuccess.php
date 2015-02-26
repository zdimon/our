<?php include_partial('global/assets') ?>
<h1> <?= __('Main page')  ?></h1>

<?php if($sf_user->isSuperAdmin()):?>

<div style="font-size: 12px" id="sf_admin_container" class="sf_admin_edit ui-widget ui-widget-content ui-corner-all">
    <div class="fg-toolbar ui-widget-header ui-corner-all">
        <h1> <?= __('Users')  ?></h1>
    </div>


    <br />

    <a  style="display: inline-block; width: 170px" href="<?= url_for('user/filterOnapprove')?>" id="dialog_link" class="ui-state-default ui-corner-all"><span class="ui-icon ui-icon-check"></span><?= __('No authorisated') ?> (<?= ProfileTable::getCntNoapprove() ?>)</a>


    
    <a  style="display: inline-block; width: 170px" href="<?= url_for('user/filterNotactive')?>" id="dialog_link" class="ui-state-default ui-corner-all"><span class="ui-icon ui-icon-check"></span><?= __('Changed') ?> (<?= ProfileTable::getCntNotactive() ?>)</a>

    
    <a  style="display: inline-block;  width: 120px" href="<?= url_for('user/filterMan')?>" id="dialog_link" class="ui-state-default ui-corner-all"><span class="ui-icon ui-icon-person"></span><?= __('Men') ?> (<?= ProfileTable::getCntMans() ?>)</a>

    <a  style="display: inline-block;  width: 120px" href="<?= url_for('user/filterWoman')?>" id="dialog_link" class="ui-state-default ui-corner-all"><span class="ui-icon ui-icon-person"></span><?= __('Woman') ?> (<?= ProfileTable::getCntWomans() ?>)</a>

    
    <a  style="display: inline-block;  width: 120px" href="<?= url_for('user/gallery?gender=m')?>" id="dialog_link" class="ui-state-default ui-corner-all"><span class="ui-icon ui-icon-person"></span><?= __('Man gallery') ?></a>
  <a  style="display: inline-block;  width: 120px" href="<?= url_for('user/gallery?gender=w')?>" id="dialog_link" class="ui-state-default ui-corner-all"><span class="ui-icon ui-icon-person"></span><?= __('Woman gallery') ?></a>

  <a  style="display: inline-block;  width: 120px" href="<?= url_for('user/changefalse/action?i=start')?>" id="dialog_link" class="ui-state-default ui-corner-all" target="_blank"><span class="ui-icon ui-icon-person"></span><?= __('Start False') ?></a> 
	<a  style="display: inline-block;  width: 120px" href="<?= url_for('user/changefalse/action?i=stop')?>" id="dialog_link" class="ui-state-default ui-corner-all" target="_blank"><span class="ui-icon ui-icon-person"></span><?= __('Stop False') ?></a>    

    <br />
    <br />

    <?php endif; ?>


    
                  <script>
                <?php echo jq_remote_function( array(
                            'update' => 'up_2',
                            'loading' => '$("#chat_loading").show();$("#chat_content").hide()',
                            'complete' => '$("#chat_loading").hide();$("#chat_content").show()',
                            'script'=>true,
                            'method'=>'GET',
                            'url' => 'user/getonapprove?type=2'
                        )
                        )
                ?>
                </script>  
                
               <script>
                <?php echo jq_remote_function( array(
                            'update' => 'up_3',
                            'loading' => '$("#chat_loading").show();$("#chat_content").hide()',
                            'complete' => '$("#chat_loading").hide();$("#chat_content").show()',
                            'script'=>true,
                            'method'=>'GET',
                            'url' => 'user/getonapprove?type=3'
                        )
                        )
                ?>
                </script>  
                
                
                               <script>
                <?php echo jq_remote_function( array(
                            'update' => 'up_4',
                            'loading' => '$("#chat_loading").show();$("#chat_content").hide()',
                            'complete' => '$("#chat_loading").hide();$("#chat_content").show()',
                            'script'=>true,
                            'method'=>'GET',
                            'url' => 'user/getonapprove?type=4'
                        )
                        )
                ?>
                </script>


    <script>
        <?php echo jq_remote_function( array(
                    'update' => 'up_5',
                    'loading' => '$("#chat_loading").show();$("#chat_content").hide()',
                    'complete' => '$("#chat_loading").hide();$("#chat_content").show()',
                    'script'=>true,
                    'method'=>'GET',
                    'url' => 'user/getphotoonapprove?type=4'
                )
                )
        ?>
    </script>




    <div style="font-size: 12px" id="sf_admin_container" class="sf_admin_edit ui-widget ui-widget-content ui-corner-all">
    <div class="fg-toolbar ui-widget-header ui-corner-all">
        <h1> <?= __('On approving')  ?></h1>
        <div id="up_2"> </div>
    </div>
</div>
          
<div style="font-size: 12px" id="sf_admin_container" class="sf_admin_edit ui-widget ui-widget-content ui-corner-all">
    <div class="fg-toolbar ui-widget-header ui-corner-all">
        <h1> <?= __('Changed profile')  ?></h1>
        <div id="up_4"> </div>
    </div>
</div>                 
                
<div style="font-size: 12px" id="sf_admin_container" class="sf_admin_edit ui-widget ui-widget-content ui-corner-all">
    <div class="fg-toolbar ui-widget-header ui-corner-all">
        <h1> <?= __('New profile')  ?></h1>
        <div id="up_3"> </div>
    </div>
</div>

    <div style="font-size: 12px" id="sf_admin_container" class="sf_admin_edit ui-widget ui-widget-content ui-corner-all">
        <div class="fg-toolbar ui-widget-header ui-corner-all">
            <h1> <?= __('Photos on the approoving')  ?></h1>
            <div id="up_5"> </div>
        </div>
    </div>
