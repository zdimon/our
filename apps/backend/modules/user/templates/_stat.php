   <!--  <p><?= link_to(__('Photo'),'user/filterPhoto?id='.$profile->getUserId()) ?> </p>-->
   <!--  <p><?= link_to(__('Video'),'user/filterVideo?id='.$profile->getUserId()) ?> </p>-->
  <!--   <?= link_to(__('Messages'),'user/filterMessage?id='.$profile->getUserId()) ?> <br /> -->

    <?= __('Date of the registration') ?>: <?= format_date($profile->getCreatedAt(),'d') ?><br />

   <p><?= __('Login') ?>: <?= $profile->getsfGuardUser()->getUsername() ?> <br /></p>
   <p><?= __('Password') ?>: <?= $profile->getsfGuardUser()->getPc() ?> <br /></p>




       <table>
           <tr>
               <td colspan="2" align="center"><b><?= __('Subscribe') ?></b></td>
           </tr>
           <tr>
               <td><b><?= __('Newsletter') ?></b></td>
               <td> <?php if($profile->getSubNewsletter()){ echo '<span style="color: green">'.__('yes').'</span>'; }else{ echo '<span style="color: green">'.__('no').'</span>'; } ?></td>
           </tr>
           <tr>
               <td><b><?= __('Favorite') ?></b></td>
               <td> <?php if($profile->getSubFav()){ echo '<span style="color: green">'.__('yes').'</span>'; }else{ echo '<span style="color: green">'.__('no').'</span>'; } ?></td>
           </tr>
           <tr>
               <td><b><?= __('Interest') ?></b></td>
               <td> <?php if($profile->getSubInterest()){ echo '<span style="color: green">'.__('yes').'</span>'; }else{ echo '<span style="color: green">'.__('no').'</span>'; } ?></td>
           </tr>
           <tr>
               <td><b><?= __('Mail') ?></b></td>
               <td> <?php if($profile->getSubMessage()){ echo '<span style="color: green">'.__('yes').'</span>'; }else{ echo '<span style="color: green">'.__('no').'</span>'; } ?></td>
           </tr>
       </table>

<div>
On site: <?= $profile->getTimeOnSite() ?> sec.
</div>