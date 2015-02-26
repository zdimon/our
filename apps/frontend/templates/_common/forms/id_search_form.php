               	<form class="search_form" action="<?php echo url_for('search/index')?>">
                            <div class="row3">
                                <label><?= __('Поиск по ID') ?>:</label>
                                <?= $form['user_id']->render()?>
                            </div>
                             <div class="textcenter">
	                             <span class="but_2_wrap"><input class="but_2" type="submit" value="<?php echo __('Поиск')?>" /></span>
                             </div>
                </form>


	

