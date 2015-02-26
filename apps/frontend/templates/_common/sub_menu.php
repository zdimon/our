
                        
       
      <ul id="tab_menu">
                  

                         <?php if($sf_request->getParameter('action')=='index' and $sf_request->getParameter('module')=='page' and $sf_request->getParameter('alias')=='comment')
                        {
                            $cur = 'class="cur"';
                        }
                        else
                        {
                            $cur = '';
                        }
                        ?>
        <li <?php echo $cur ?>><a <?php echo $cur ?> href="<?= url_for('@page?alias=comment') ?> ">
                                	<span class="link"><?= __('Комментарии') ?></span>
                            <span class="baseline"></span>
        </a></li>

                         <?php if($sf_request->getParameter('action')=='index' and $sf_request->getParameter('module')=='page' and $sf_request->getParameter('alias')=='confident')
                        {
                            $cur = 'class="cur"';
                        }
                        else
                        {
                            $cur = '';
                        }
                        ?>
        <?php if(($sf_user->isAuthenticated() and $sf_user->getGuardUser()->getGender()=='m') or (!$sf_user->isAuthenticated())): ?>
            <li <?php echo $cur ?>><a <?php echo $cur ?> href="<?= url_for('@page?alias=confident') ?> ">
                                            <span class="link"><?= __('Confiden tiality') ?></span>
                                <span class="baseline"></span>
            </a></li>
       <?php endif; ?>
                  <?php if($sf_request->getParameter('action')=='gift')
                        {
                            $cur = 'class="cur"';
                        }
                        else
                        {
                            $cur = '';
                        }
                        ?>
        <?php if(($sf_user->isAuthenticated() and $sf_user->getGuardUser()->getGender()=='m') or (!$sf_user->isAuthenticated())): ?>
            <li <?php echo $cur ?>><a <?php echo $cur ?> href="<?= url_for('gift/index') ?> ">
                                <span class="link"><?= __('Подарки') ?></span>
                                <span class="baseline"></span>
                </a></li>
        <?php endif; ?>



                         <?php if($sf_request->getParameter('action')=='index' and $sf_request->getParameter('module')=='page' and $sf_request->getParameter('alias')=='about')
                        {
                            $cur = 'class="cur"';
                        }
                        else
                        {
                            $cur = '';
                        }
                        ?>
        <li <?php echo $cur ?>><a <?php echo $cur ?> href="<?= url_for('@page?alias=about') ?> ">
                                	<span class="link"><?= __('О нас') ?></span>
                            <span class="baseline"></span>
        </a></li>

                  <?php if($sf_request->getParameter('action')=='index' and $sf_request->getParameter('module')=='page' and $sf_request->getParameter('alias')=='terms')
                        {
                            $cur = 'class="cur"';
                        }
                        else
                        {
                            $cur = '';
                        }
                        ?>
        <li <?php echo $cur ?>><a <?php echo $cur ?> href="<?= url_for('@page?alias=terms') ?> ">
                                	<span class="link"><?= __('Cоглашение') ?></span>
                            <span class="baseline"></span>
        </a></li>



      </ul>
                            
                             