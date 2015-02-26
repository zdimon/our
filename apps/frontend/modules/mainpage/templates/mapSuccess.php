<?= '<?xml version="1.0" encoding="utf-8"?>'?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    
        <?php foreach($users as $u): ?>
          <url><loc>http://<?= $_SERVER['HTTP_HOST'] ?>/en/profile/show/username/<?= $u->getsfGuardUser()->getUsername() ?></loc></url>
           <url><loc>http://<?= $_SERVER['HTTP_HOST'] ?>/ru/profile/show/username/<?= $u->getsfGuardUser()->getUsername() ?></loc></url>
           <url><loc>http://<?= $_SERVER['HTTP_HOST'] ?>/fr/profile/show/username/<?= $u->getsfGuardUser()->getUsername() ?></loc></url>
         <?php endforeach; ?>
        <?php foreach($pages as $p): ?>
           <url><loc>http://<?= $_SERVER['HTTP_HOST'] ?>/en/<?= $p->getAlias() ?>.html</loc></url>
           <url><loc>http://<?= $_SERVER['HTTP_HOST'] ?>/ru/<?= $p->getAlias() ?>.html</loc></url>
           <url><loc>http://<?= $_SERVER['HTTP_HOST'] ?>/fr/<?= $p->getAlias() ?>.html</loc></url>
         <?php endforeach; ?>  
           
          <url><loc>http://<?= $_SERVER['HTTP_HOST'] ?>/en/my/place</loc></url>
          <url><loc>http://<?= $_SERVER['HTTP_HOST'] ?>/ru/my/place</loc></url>
          <url><loc>http://<?= $_SERVER['HTTP_HOST'] ?>/fr/my/place</loc></url>
          
          <url><loc>http://<?= $_SERVER['HTTP_HOST'] ?>/en/my/country</loc></url>
          <url><loc>http://<?= $_SERVER['HTTP_HOST'] ?>/ru/my/country</loc></url>
          <url><loc>http://<?= $_SERVER['HTTP_HOST'] ?>/fr/my/country</loc>       </url>   
           
          <url><loc>http://<?= $_SERVER['HTTP_HOST'] ?>/en/price</loc></url>
          <url><loc>http://<?= $_SERVER['HTTP_HOST'] ?>/ru/price</loc></url>
          <url><loc>http://<?= $_SERVER['HTTP_HOST'] ?>/fr/price</loc>    </url>
          
          <url><loc>http://<?= $_SERVER['HTTP_HOST'] ?>/en/contact</loc></url>
          <url><loc>http://<?= $_SERVER['HTTP_HOST'] ?>/ru/contact</loc></url>
          <url><loc>http://<?= $_SERVER['HTTP_HOST'] ?>/fr/contact</loc>          </url>    
          
          <url><loc>http://<?= $_SERVER['HTTP_HOST'] ?>/en/testimonials</loc></url>
          <url><loc>http://<?= $_SERVER['HTTP_HOST'] ?>/ru/testimonials</loc></url>
          <url><loc>http://<?= $_SERVER['HTTP_HOST'] ?>/fr/testimonials</loc>     </url>      
          
          <url><loc>http://<?= $_SERVER['HTTP_HOST'] ?>/en/faq</loc></url>
          <url><loc>http://<?= $_SERVER['HTTP_HOST'] ?>/ru/faq</loc></url>
          <url><loc>http://<?= $_SERVER['HTTP_HOST'] ?>/fr/faq</loc>  </url>
          
          <url><loc>http://<?= $_SERVER['HTTP_HOST'] ?>/en/search/adv</loc></url>
          <url><loc>http://<?= $_SERVER['HTTP_HOST'] ?>/ru/search/adv</loc></url>
          <url><loc>http://<?= $_SERVER['HTTP_HOST'] ?>/fr/search/adv</loc> </url>           
          
          <url><loc>http://<?= $_SERVER['HTTP_HOST'] ?>/en/online_member</loc></url>
          <url><loc>http://<?= $_SERVER['HTTP_HOST'] ?>/ru/online_member</loc></url>
          <url><loc>http://<?= $_SERVER['HTTP_HOST'] ?>/fr/online_member</loc> </url>     
          
          
          <url><loc>http://<?= $_SERVER['HTTP_HOST'] ?>/en/gallery_women</loc></url>
          <url><loc>http://<?= $_SERVER['HTTP_HOST'] ?>/ru/gallery_women</loc></url>
          <url><loc>http://<?= $_SERVER['HTTP_HOST'] ?>/fr/gallery_women</loc> </url>     
          
          
          <url><loc>http://<?= $_SERVER['HTTP_HOST'] ?>/en/search/anniversary</loc></url>
          <url><loc>http://<?= $_SERVER['HTTP_HOST'] ?>/ru/search/anniversary</loc></url>
          <url><loc>http://<?= $_SERVER['HTTP_HOST'] ?>/fr/search/anniversary</loc> </url> 
          
          
          <url><loc>http://<?= $_SERVER['HTTP_HOST'] ?>/en/online_member</loc></url>
          <url><loc>http://<?= $_SERVER['HTTP_HOST'] ?>/ru/online_member</loc></url>
          <url><loc>http://<?= $_SERVER['HTTP_HOST'] ?>/fr/online_member</loc> </url>               
          
 
          <url><loc>http://<?= $_SERVER['HTTP_HOST'] ?>/en/most_viewed</loc></url>
          <url><loc>http://<?= $_SERVER['HTTP_HOST'] ?>/ru/most_viewed</loc></url>
          <url><loc>http://<?= $_SERVER['HTTP_HOST'] ?>/fr/most_viewed</loc> </url>             
          
    
          <url><loc>http://<?= $_SERVER['HTTP_HOST'] ?>/en/new_member_women</loc></url>
          <url><loc>http://<?= $_SERVER['HTTP_HOST'] ?>/ru/new_member_women</loc></url>
          <url><loc>http://<?= $_SERVER['HTTP_HOST'] ?>/fr/new_member_women</loc> </url>                
          
    
</urlset>
