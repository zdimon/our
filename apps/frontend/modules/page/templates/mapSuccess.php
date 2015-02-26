<h2><?= __('Site map') ?></h2>
 <ul class="">
                  


        <li><a href="<?= url_for('search/index') ?>"><?= __('Album') ?></a></li>
        <li><a href="<?= url_for('search/index?new=true') ?>"><?= __('New Members') ?></a></li>
        <li><a href="<?= url_for('search/index?type=top') ?>"><?= __('Top 100') ?></a></li>
        <li><a href="<?= url_for('search/index?order=rating') ?>"><?= __('Most Viewed') ?></a></li>
        <li><a href="<?= url_for('search/index?order=unrating') ?>"><?= __('Less Viewed') ?></a></li>
        <li><a href="<?= url_for('search/anniversary') ?>"><?= __('Anniversaries') ?></a></li>
             
          <li ><a  href="<?= url_for('search/index?with_video=on') ?>"><?= __('Videos') ?></a>

             
          <li ><a  href="<?= url_for('search/adv') ?> "><?= __('Advanced search') ?></a></li>
          <li ><a <?php echo $cur ?> href="<?= url_for('faq/index') ?> "><?= __('FAQ') ?></a></li>



          <li ><a <?php echo $cur ?> href="<?= url_for('testimonials/index') ?> "><?= __('Testimonials') ?></a></li>



                  <li><a href="<?= url_for('@page?alias=about') ?>"><?= __('About us') ?></a></li>
                  <li><a href="<?= url_for('@page?alias=ourwork') ?>"><?= __('Our work') ?></a></li>
                  <li><a href="<?= url_for('@page?alias=terms') ?>"><?= __('Terms of the site') ?></a></li>
                  <li><a href="<?= url_for('contact/index') ?>"><?= __('Contact Us') ?></a></li>
                   <li><a href="<?= url_for('suggestions/index') ?>"><?= __('Suggestions') ?></a></li>
          
      
     
             <li><a href="<?= url_for('price/index') ?>"><?= __('Our prices') ?></a></li>
          

         
                  <li><a href="<?= url_for('@page?alias=about_scamers') ?>"><?= __('About scammers') ?></a></li>
                  <li><a href="<?= url_for('scamer/list') ?>"><?= __('Scammers list') ?></a></li>
             

                    <li><a href="<?= url_for('@page?alias=russian_women') ?>"><?= __('Russian Women') ?></a></li>
               
                    <li><a href="<?= url_for('@page?alias=west_men') ?>"><?= __('Western Men') ?></a></li>

                  
            

          <li><a href="<?= url_for('my/country') ?>"><?= __('My country') ?></a></li>

          <li><a href="<?= url_for('my/place') ?>"><?= __('My place') ?></a></li>



      </ul>




<?php foreach($users as $u): ?>

<span style=""><?= link_to($u->getFullName(),'profile/show?username='.$u->getsfGuardUser()->getUsername()) ?></span> &nbsp;

<?php endforeach; ?>
