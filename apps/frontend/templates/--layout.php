<!doctype html>
<html lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
    <link rel="image_src" href="pic/expres_icon.jpg" />
      <!--[if IE 6]><script src="js/DD_belatedPNG_0.0.8a-min.js"></script><script>DD_belatedPNG.fix('.png, img');</script><![endif]-->
      <!--[if IE]><script>document.createElement('header');document.createElement('nav');document.createElement('section');document.createElement('article');document.createElement('aside');document.createElement('footer');</script><![endif]-->
  </head>
  <body>
  <div class="header_bg" id="wrapper">
  <div class="site_size">
  <header>
      <div id="header">
          <a href="<?= url_for('mainpage/index') ?>"><img src="/pic/logo.png" alt="" class="logo"></a>
          <div align="center"><?php  include_partial('global/common/lang_panel')?></div>
          <div class="slide_bg">
              <div class="slide_poss">
                  <?php  include_partial('global/common/topheader') ?>

              </div><!-- .slide_poss-->
          </div><!-- .slide_bg-->
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
      <?php include_partial('global/common/top_menu')?>

      <div class="coll_size">

          <?php  include_partial('global/common/forms/short_search_form',array('form'=> new qsearchForm())) ?>

          <p align="center"><span class="but_2_wrap block"><span class="but_2 block"><?= __('New users') ?></span></span></p>
          <div class="lady_list_coll">

              <?php  include_partial('global/common/new_users2',array()) ?>
          </div><!-- .lady_list_coll-->

      </div><!-- .coll_size-->
  </div><!-- .left_coll-->
  <div class="png coll_h right_coll">
      <div class="coll_size">


          <?php if (!$sf_user->isAuthenticated()): ?>
          <?php include_partial('global/common/forms/login_form')?>
          <?php else: ?>
          <?php  include_partial('global/common/user_panel') ?>
          <?php endif ?>






          <p align="center"><span class="but_2_wrap block"><span class="but_2 block"><?= __('New users') ?></span></span></p>
          <div class="lady_list_coll">
              <?php  include_partial('global/common/new_users',array()) ?>
          </div><!-- .lady_list_coll-->


          <h3>Visit Ukraine</h3>
          <p align="center"><a href="#"><img src="/pic/icon_map.png"></a></p>
          <h3>Visit Russia</h3>
          <p align="center"><a href="#"><img src="/pic/icon_map_2.png"></a></p>
      </div><!-- .coll_size-->
  </div><!-- .right_coll-->
  <div class="clear"></div>
  </div><!-- #conteiner-->
  </div>
  </div><!-- .header_bg #wrapper-->
  <footer id="footer">
      <div class="site_size">
          <div align="center" class="footer_center_ind">
              Copyright © 2012 Our-feeling
          </div><!-- .footer_center_ind-->
      </div><!-- #footer-->
  </footer><!-- #footer-->

  <script type="text/javascript" src="/js/awstats_misc_tracker.js"></script>
  </body>

</html>