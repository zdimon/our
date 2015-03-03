<!doctype html>
<html lang="<?= $sf_user->getCulture() ?>">
<head>
    <?php include_title() ?>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
    <link rel="image_src" href="pic/expres_icon.jpg" />
    <!--[if IE 6]><script src="js/DD_belatedPNG_0.0.8a-min.js"></script><script>DD_belatedPNG.fix('.png, img');</script><![endif]-->
    <!--[if IE]><script>document.createElement('header');document.createElement('nav');document.createElement('section');document.createElement('article');document.createElement('aside');document.createElement('footer');</script><![endif]-->
    <script type="text/javascript" src="/js/dklab_realplexor.js"></script>


<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-46228693-1', 'our-feeling.com');
  ga('send', 'pageview');

</script>

</head>
<body>

<div class="header_bg" id="wrapper">
    <div class="site_size">
        <header>
            <div id="header"  <?php if (!$sf_user->isAuthenticated()){?> style="height:340px;"<?php }?>>
                <a href="<?= url_for('mainpage/index') ?>"><img src="/pic/logo.png" alt="" class="logo"></a>
                <div style="text-align: center"><?php  include_partial('global/common/lang_panel')?></div>
                

<div id="google_translate_element" style="float: right; position: absolute; top: 10px; left: 700px"></div><script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE, multilanguagePage: true}, 'google_translate_element');
}
</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>



 <div class="slide_bg">
                    <div class="slide_poss">
                        <?php  include_partial('global/common/topheader') ?>
                        

                    </div><!-- .slide_poss-->
                </div><!-- .slide_bg-->
                <div class="clr001"></div>
                 <?php include_partial('global/common/top_menu')?>
                
            </div><!-- #header-->
        </header>
        <div id="conteiner">
            <div class="center_coll">
                <div class="center_coll_size">
                    <div class="coll_h content png">
                        <?php include_partial('global/common/alert')?>
                        <?php echo $sf_content ?>

                    </div><!-- .content-->
            </div><!-- .center_coll_size-->
        </div><!-- .center_coll-->
        <div class="png coll_h left_coll">

            <div class="coll_size">

              <?php if (!$sf_user->isAuthenticated()): ?>
              <?php $form = new sfGuardFormSignin() ?>
              <form class="form_style f_quick_search textleft" action="<?php echo url_for('@sf_guard_signin') ?>" method="post">
                     <?php echo $form['_csrf_token']->render() ?>
                     <div class="row"><label><?php echo __('Логин') ?> </label>
                                     <input style="width: 95px" name="signin[username]"  class="login_pole" id="signin_username" type="text">
                      </div>
                     <div class="row"><label><?php echo __('Пароль') ?></label>
                                      <input  size="5" name="signin[password]" style="width: 95px; height: 12px" class="pass_pole" id="signin_password" type="password">
                      </div>
                    
                     <input value="<?php echo __('Enter') ?>" type="submit" class="but">
                     <a class="block size11 white but" href="<?php echo url_for('registration/index') ?>"><?= __('Registration')?></a>
                     
                </form>
              <?php endif ?>
            
 

                <div style="text-align: center"><span class="but_2_wrap block "><span class="but_2 block"><span class="shift_top"><?= __('Quick Search')?></span></span></span></div>
                <?php  include_partial('global/common/forms/short_search_form',array('form'=> new qsearchForm())) ?>

                <div style="text-align: center"><span class="but_2_wrap block"><span class="but_2 block"><span class="shift_top"><?= __('Most Viewed')?></span></span></span></div>
                <div class="lady_list_coll">

                    <?php  include_partial('global/common/new_users2',array()) ?>

                </div><!-- .lady_list_coll-->

                <div style="text-align: center"><span class="but_2_wrap block"><span class="but_2 block"><span class="shift_top"><?= __('New users')?></span></span></span></div>
                <div class="lady_list_coll">

                    <?php  include_partial('global/common/new_users3',array()) ?>

                </div><!-- .lady_list_coll-->


                <div style="text-align: center"><span class="but_2_wrap block"><span class="but_2 block"><span class="shift_top"><?= __('Anniversary')?></span></span></span></div>
                <div class="lady_list_coll">

                    <?php  include_partial('global/common/adv_users',array()) ?>

                </div><!-- .lady_list_coll-->


                <!--
                <h2><?= __('Visit Ukraine')?></h2>
                <p style="text-align: center"><a href="#"><img width="100%" src="/pic/icon_map.png"></a></p>
                <h2><?= __('Visit Russia')?></h2>
                <p style="text-align: center"><a href="#"><img width="100%" src="/pic/icon_map_2.png"></a></p>
                -->
            </div><!-- .coll_size-->
        </div><!-- .left_coll-->
        <div class="png coll_h right_coll">
         

<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- ourfeeling2 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:120px;height:600px"
     data-ad-client="ca-pub-6382580135773552"
     data-ad-slot="2336483421"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>


<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- ourfeeling4 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:120px;height:600px"
     data-ad-client="ca-pub-6382580135773552"
     data-ad-slot="5416977024"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>




        </div><!-- .right_coll-->
        <div class="clear"></div>
    </div><!-- #conteiner-->
</div>
</div><!-- .header_bg #wrapper-->
<footer id="footer">
    <div class="site_size">
        <div style="text-align: center" class="footer_center_ind">
            Copyright © 2012 Our-feeling
        </div><!-- .footer_center_ind-->
    </div><!-- #footer-->
    <div style="font-size: 14px; text-align: center">
        <p>
                 <a href="<?= url_for('@page?alias=about') ?>"><?= __('About us') ?></a>&nbsp;&nbsp;&nbsp;
                 <a href="<?= url_for('@page?alias=terms') ?>"><?= __('Terms and conditions') ?></a>&nbsp;&nbsp;&nbsp;
                 <a href="<?= url_for('@page?alias=privat') ?>"><?= __('Private Policy') ?></a>&nbsp;&nbsp;&nbsp;
                 <a href="<?= url_for('@page?alias=refund') ?>"><?= __('Refound Policy') ?></a>&nbsp;&nbsp;&nbsp;
                 <a href="<?= url_for('contact/index') ?>"><?= __('Contact Us') ?></a>&nbsp;&nbsp;&nbsp;
                  
        </p>
        
       Website www.our-feeling.com and service, carried out by "JB enterprise" registered under the laws of <br />
Switzerland, with its seat at the address: 14-16 Place de Cornavin -CH-1201 Geneve.  

    </div>
</footer><!-- #footer-->
<div class="menu_left_poss" style="position:absolute; top:100px; left:0">
   <?php /*?> <?php include_partial('global/common/top_menu')?><?php */?>

</div>


<?php if ($sf_user->isAuthenticated()): ?>
    <?php

    echo jq_periodically_call_remote(array(
        'frequency' => 10,
        'update' => 'message_block',
        'script'=>true,
        'method'=>'GET',
        'url' => url_for('message/check'),
    ))
    ?>



           <?php if(sfConfig::get('app_use_comet')): ?>
              <script type="text/javascript">
                  var realplexor = new Dklab_Realplexor(
                  "http://chat.<?= $_SERVER['HTTP_HOST'] ?>",  // Realplexor's engine URL; must be a sub-domain
                    "chat" // namespace
                );
              realplexor.subscribe("User_<?= $sf_user->getGuardUser()->getId() ?>", function(data, id) { 
                //alert(data.url);
                
                jQuery.ajax({type:'GET',dataType:'html',success:function(data, textStatus){jQuery('#chat_call').html(data);},url:data.url}); 
                
               });
              realplexor.execute();
     
              </script>
           <?php else: ?>
              
            <?php

            echo jq_periodically_call_remote(array(
                'frequency' => 10,
                'update' => 'chat_call',
                'loading' => '$("#loading").show()',
                'complete' => '$("#loading").hide()',
                'script'=>true,
                'method'=>'GET',
                'url' => url_for('chat/call'),
            ))
            ?>
              <?php endif ?>
        <?php endif; ?>
<div id="chat_call"> </div>
<div id="message_block"></div>
<div class="newEnterSite"></div>

<div class="newEnterSite2"></div>
<script type="text/javascript" src="/js/awstats_misc_tracker.js"></script>





</body>

</html>
