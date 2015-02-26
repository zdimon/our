
                        
       
     
     <?php ################################################## GUEST Area#####################################?>
            <?php if (!$sf_user->isAuthenticated()){?>       
 <ul class="menu_left male">
          <li ><a  href="<?= url_for('mainpage/index') ?>"><?= __('Home') ?></a></li>
          <li><a href="#"><?= __('Information') ?></a>

              <ul class="menu_left">
                  <?php if ($sf_user->isAuthenticated() and $sf_user->getGuardUser()->getGender()=='m'): ?>
                    <li><a href="<?= url_for('@page?alias=russian_women') ?>"><?= __('Russian Women') ?></a></li>
                  <?php else: ?>
                    <li><a href="<?= url_for('@page?alias=west_men') ?>"><?= __('Western Men') ?></a></li>
                  <?php endif; ?>
                  
              </ul>

          </li>
          <li ><a  href="#"><?= __('Service') ?></a>

              <ul class="menu_left">
                  <li><a href="<?= url_for('@page?alias=about') ?>"><?= __('About us') ?></a></li>
                  <li><a href="<?= url_for('@page?alias=ourwork') ?>"><?= __('Our work') ?></a></li>
                  <li><a href="<?= url_for('@page?alias=terms') ?>"><?= __('Terms of the site') ?></a></li>
                  <li><a href="<?= url_for('contact/index') ?>"><?= __('Contact Us') ?></a></li>
                   <li><a href="<?= url_for('suggestions/index') ?>"><?= __('Suggestions') ?></a></li>
              </ul>

          </li>
          <li ><a  href="#"><?= __('Galleries') ?></a>

              <ul class="menu_left">
                  <?php if ($sf_user->isAuthenticated() and $sf_user->getGuardUser()->getGender()=='m'): ?>
                    <li><a href="<?= url_for('@search_album_woman') ?>"><?= __('Album') ?></a></li>
                  <?php elseif ($sf_user->isAuthenticated() and $sf_user->getGuardUser()->getGender()=='w'): ?>
                      <li><a href="<?= url_for('@search_album_men') ?>"><?= __('Album') ?></a></li>
                  <?php else: ?>
                      <li><a href="<?= url_for('@search_album') ?>"><?= __('Album') ?></a></li>
                  <?php endif; ?>

                  <li><a href="<?= url_for('@search_new') ?>"><?= __('New Members') ?></a></li>
                <!--  <li><a href="<?php /*?><?= url_for('@search_top') ?>"><?= __('Top 100') ?><?php */?></a></li>-->
                  <li><a href="<?= url_for('@search_most') ?>"><?= __('Most Viewed') ?></a></li>
                  <li><a href="<?= url_for('@search_less') ?>"><?= __('Less Viewed') ?></a></li>
                  <li><a href="<?= url_for('search/anniversary') ?>"><?= __('Anniversaries') ?></a></li>
              </ul>

          </li>
          <li ><a  href="<?= url_for('search/index?is_online=on') ?> "><?= __('Online Members') ?></a></li>
          </ul>
          <?php }
		  ################################################Guest Area End#############################
		  ?>
          
          
         
            <?php 
			 ################################################MAle Area #############################
			if ($sf_user->isAuthenticated() and $sf_user->getGuardUser()->getGender()=='m'): ?>
             <ul class="menu_left  male">
            <li ><a  href="<?= url_for('mainpage/index') ?>"><?= __('Home') ?></a></li>
             <li ><a  href="#"><?= __('My area') ?></a>
              <ul class="menu_left">
                  <li><a href="<?= url_for('profile/member') ?>"><?= __('Member area') ?></a></li>
                  <li><a href="<?= url_for('message/index') ?>"><?= __('My Messages') ?></a></li>
                  <li><a href="<?= url_for('friend/index') ?>"><?= __('Favorite list') ?></a></li>
                  <li><a href="<?= url_for('interest/index') ?>"><?= __('My Interest List') ?></a></li>
                  <li><a href="<?= url_for('viewed/index') ?>"><?= __('Who viewed me') ?></a></li>
                  <li><a href="<?= url_for('matches/index') ?>"><?= __('My Matches') ?></a></li>
                  <li><a href="<?= url_for('chat/index') ?>"><?= __('Chat') ?></a></li>
              </ul>
             </li>
             <li ><a href="#"><?= __('Buy Credits') ?></a>

                      <ul class="menu_left">
                          <li><a href="<?= url_for('account/index') ?>"><?= __('Upgrade membership') ?></a></li>
                          <li><a href="<?= url_for('account/history') ?>"><?= __('Account Options') ?></a></li>
                      </ul>

              </li>
              <li ><a  href="<?= url_for('search/index?is_online=on') ?> "><?= __('Online Members') ?></a></li>
              <li ><a  href="#"><?= __('Galleries') ?></a>
                 
              <ul class="menu_left">
                  <?php if ($sf_user->isAuthenticated() and $sf_user->getGuardUser()->getGender()=='m'): ?>
                    <li><a href="<?= url_for('@search_album_woman') ?>"><?= __('Album') ?></a></li>
                  <?php elseif ($sf_user->isAuthenticated() and $sf_user->getGuardUser()->getGender()=='w'): ?>
                      <li><a href="<?= url_for('@search_album_men') ?>"><?= __('Album') ?></a></li>
                  <?php else: ?>
                      <li><a href="<?= url_for('@search_album') ?>"><?= __('Album') ?></a></li>
                  <?php endif; ?>

                  <li><a href="<?= url_for('@search_new') ?>"><?= __('New Members') ?></a></li>
                <!--  <li><a href="<?php /*?><?= url_for('@search_top') ?>"><?= __('Top 100') ?><?php */?></a></li>-->
                  <li><a href="<?= url_for('@search_most') ?>"><?= __('Most Viewed') ?></a></li>
                  <li><a href="<?= url_for('@search_less') ?>"><?= __('Less Viewed') ?></a></li>
                  <li><a href="<?= url_for('search/anniversary') ?>"><?= __('Anniversaries') ?></a></li>
              </ul>

          </li>
           <li><a href="#"><?= __('Information') ?></a>

              <ul class="menu_left">
                  <?php if ($sf_user->isAuthenticated() and $sf_user->getGuardUser()->getGender()=='m'): ?>
                    <li><a href="<?= url_for('@page?alias=russian_women') ?>"><?= __('Russian Women') ?></a></li>
                  <?php else: ?>
                    <li><a href="<?= url_for('@page?alias=west_men') ?>"><?= __('Western Men') ?></a></li>
                  <?php endif; ?>
                  
              </ul>

          </li>
          <li ><a  href="#"><?= __('Service') ?></a>

              <ul class="menu_left">
                  <li><a href="<?= url_for('@page?alias=about') ?>"><?= __('About us') ?></a></li>
                  <li><a href="<?= url_for('@page?alias=ourwork') ?>"><?= __('Our work') ?></a></li>
                  <li><a href="<?= url_for('@page?alias=terms') ?>"><?= __('Terms of the site') ?></a></li>
                  <li><a href="<?= url_for('contact/index') ?>"><?= __('Contact Us') ?></a></li>
                   <li><a href="<?= url_for('suggestions/index') ?>"><?= __('Suggestions') ?></a></li>
              </ul>

          </li>
          <li><a href="<?= url_for('price/index') ?>"><?= __('Our prices') ?></a></li>
           
         
          <?php /* if ($sf_user->isAuthenticated() and $sf_user->getGuardUser()->getGender()=='m'): ?>
              <li ><a href="#"><?= __('Buy Credits') ?></a>

                      <ul class="menu_left">
                          <li><a href="<?= url_for('account/index') ?>"><?= __('Upgrade membership') ?></a></li>
                          <li><a href="<?= url_for('account/history') ?>"><?= __('Account Options') ?></a></li>
                      </ul>

              </li>
			  <?php */ ?>
              <li><a href="#"><?= __('About Scammers') ?></a>

              <ul class="menu_left">
                  <li><a href="<?= url_for('@page?alias=about_scamers') ?>"><?= __('About scammers') ?></a></li>
                  <li><a href="<?= url_for('scamer/list') ?>"><?= __('Scammers list') ?></a></li>
              </ul>

          </li>
          <li><?php echo link_to(__('Exit'),'@sf_guard_signout')?></li>
          </ul>
          <?php endif; 
		  ########################################### Male Area End###########################################
		  ?>

         <?php  ########################################### Female Area End###########################################
		 
		 if ($sf_user->isAuthenticated() and $sf_user->getGuardUser()->getGender()=='w'): 
		 ?>
          <ul class="menu_left fmale">
           <li ><a  href="<?= url_for('mainpage/index') ?>"><?= __('Home') ?></a></li>
             <li ><a  href="#"><?= __('My area') ?></a>
              <ul class="menu_left">
                  <li><a href="<?= url_for('profile/member') ?>"><?= __('Member area') ?></a></li>
                  <li><a href="<?= url_for('message/index') ?>"><?= __('My Messages') ?></a></li>
                  <li><a href="<?= url_for('friend/index') ?>"><?= __('Favorite list') ?></a></li>
                  <li><a href="<?= url_for('interest/index') ?>"><?= __('My Interest List') ?></a></li>
                  <li><a href="<?= url_for('viewed/index') ?>"><?= __('Who viewed me') ?></a></li>
                  <li><a href="<?= url_for('matches/index') ?>"><?= __('My Matches') ?></a></li>
                  <li><a href="<?= url_for('chat/index') ?>"><?= __('Chat') ?></a></li>
              </ul>
             </li>
             
             <li ><a  href="<?= url_for('search/index?is_online=on') ?> "><?= __('Online Members') ?></a></li>
           <li ><a  href="#"><?= __('Service') ?></a>

              <ul class="menu_left">
                  <li><a href="<?= url_for('@page?alias=about') ?>"><?= __('About us') ?></a></li>
                  <li><a href="<?= url_for('@page?alias=ourwork') ?>"><?= __('Our work') ?></a></li>
                  <li><a href="<?= url_for('@page?alias=terms') ?>"><?= __('Terms of the site') ?></a></li>
                  <li><a href="<?= url_for('contact/index') ?>"><?= __('Contact Us') ?></a></li>
                   <li><a href="<?= url_for('suggestions/index') ?>"><?= __('Suggestions') ?></a></li>
              </ul>

          </li>
            <li><a href="#"><?= __('Information') ?></a>

              <ul class="menu_left">
                  <?php if ($sf_user->isAuthenticated() and $sf_user->getGuardUser()->getGender()=='m'): ?>
                    <li><a href="<?= url_for('@page?alias=russian_women') ?>"><?= __('Russian Women') ?></a></li>
                  <?php else: ?>
                    <li><a href="<?= url_for('@page?alias=west_men') ?>"><?= __('Western Men') ?></a></li>
                  <?php endif; ?>
                  
              </ul>

          </li>
          <li ><a  href="#"><?= __('Service') ?></a>

              <ul class="menu_left">
                  <li><a href="<?= url_for('@page?alias=about') ?>"><?= __('About us') ?></a></li>
                  <li><a href="<?= url_for('@page?alias=ourwork') ?>"><?= __('Our work') ?></a></li>
                  <li><a href="<?= url_for('@page?alias=terms') ?>"><?= __('Terms of the site') ?></a></li>
                  <li><a href="<?= url_for('contact/index') ?>"><?= __('Contact Us') ?></a></li>
                   <li><a href="<?= url_for('suggestions/index') ?>"><?= __('Suggestions') ?></a></li>
              </ul>

          </li>
          <li ><a  href="#"><?= __('Galleries') ?></a>

              <ul class="menu_left">
                  <?php if ($sf_user->isAuthenticated() and $sf_user->getGuardUser()->getGender()=='m'): ?>
                    <li><a href="<?= url_for('@search_album_woman') ?>"><?= __('Album') ?></a></li>
                  <?php elseif ($sf_user->isAuthenticated() and $sf_user->getGuardUser()->getGender()=='w'): ?>
                      <li><a href="<?= url_for('@search_album_men') ?>"><?= __('Album') ?></a></li>
                  <?php else: ?>
                      <li><a href="<?= url_for('@search_album') ?>"><?= __('Album') ?></a></li>
                  <?php endif; ?>

                  <li><a href="<?= url_for('@search_new') ?>"><?= __('New Members') ?></a></li>
                 <!-- <li><a href="<?php /*?><?= url_for('@search_top') ?>"><?= __('Top 100') ?><?php */?></a></li>-->
                  <li><a href="<?= url_for('@search_most') ?>"><?= __('Most Viewed') ?></a></li>
                  <li><a href="<?= url_for('@search_less') ?>"><?= __('Less Viewed') ?></a></li>
                  <li><a href="<?= url_for('search/anniversary') ?>"><?= __('Anniversaries') ?></a></li>
              </ul>

          </li>
          

         <li><?php echo link_to(__('Exit'),'@sf_guard_signout')?></li>

            </ul>
          <?php endif; 
		  ################################################# Woman Area End########################################
		  ?>

          

      


       

    


