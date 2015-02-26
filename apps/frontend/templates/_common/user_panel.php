<p align="center"><span class="but_2_wrap block"><span class="but_2 block">

     <?php $sf_user->getGuardUser()->getProfile()->getGenderImage() ?> <?php echo link_to($sf_user->getGuardUser(),'profile/show?username='. $sf_user->getGuardUser()) ?>

</span></span></p>


<?php if($sf_user->getGuardUser()->getIsPartner()):?>
                              <ul id="lside_menu">

                                  <li ><?= link_to(__('Админ панель партера'),'http://'.$_SERVER['HTTP_HOST'].'/admin.php',array('style'=>"color: red",'target'=>'_blank')) ?></li>

                                  <li><?php echo link_to(__('Exit'),'@sf_guard_signout')?></li>
                              </ul>
<?php else: ?>
                            
                              <ul id="lside_menu">

                                  <li> <?php echo link_to(__('Member area'),'profile/member') ?> </li>
                                  <li> <?php echo link_to(__('My profile'),'profile/show?username='. $sf_user->getGuardUser()) ?> </li>


                                  <li ><?php echo link_to(__('Мои фото'),'myphoto/index')?> </li>
                                  <li><?= link_to(__('Messages'),'message/index') ?>   <?= $sf_user->getGuardUser()->isNewMessage() ?></li>
                                  <li><?= link_to(__('Hot list'),'message/personal') ?>   </li>
                                  <li><?php echo link_to(__('Фавориты'),'friend/index')?> </li>
                                  <?php if($sf_user->getGuardUser()->getGender()=='w'):?>
                                    <li><?php echo link_to(__('Мои видео'),'myvideo/index')?> </li>
                                  <?php endif ?>

                                  <li><?php echo link_to(__('Interest'),'interest/index')?> </li>
                                  

                                   
                                  <li><?php echo link_to(__('Выход'),'@sf_guard_signout')?></li>
                              </ul>

<?php endif ?>


