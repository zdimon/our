                            <form class="search_form" action="<?php echo url_for('search/index')?>">
                        	 <div class="row3">
                                        <label><?= __('Кого&nbsp;ищем?') ?>:</label>
                                        <?= $form['gender']->render()?>

                                        <label><?= __('Возраст от') ?>:</label>
                                        <?= $form['age_from']->render()?>
                                        &nbsp;—&nbsp;
                                       <?= $form['age_to']->render()?>
                                </div><!-- .row3-->
                             <div class="row3">
                             	<label><?= __('Страна') ?> </label>
                                <?= $form['country']->render()?>
                             </div><!-- .row3-->
                             <div class="png back_3">
                             	<div class="select_block"><?= __('Найти только') ?></div>
			                    <span class="inline_block">
                                    <?= $form['with_photo']->render()?>
                                    <label class="middle normal" for="ch_1"><?= __('только с фото') ?></label>
                                </span>
                                <span class="inline_block">
                                    <?= $form['is_online']->render()?>
                                    <label class="middle normal" for="ch_2"><?= __('online') ?></label>
                                </span>
                             </div><!-- .back_3-->
                             <div class="textcenter">
	                             <span class="but_2_wrap"><input class="but_2" type="submit" value="<?= __('Найти') ?>" /></span>
                             </div>
                        </form><!-- .search_form-->



	

