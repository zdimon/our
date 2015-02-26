<!doctype html>
<html lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
  </head>
  <body>
  <div id="wrapper"><!-- #wrapper -->

      <header><!-- header -->
          <h1><a href="<?= url_for('mainpage/index') ?>"><?= image_tag('/images/logo.png')?></a></h1>
          <div align="center"><?php  include_partial('global/common/lang_panel')?></div>
          <div style="clear: both;"></div>
          <nav><!-- top nav -->
              <?php include_partial('global/common/top_menu')?>
          </nav><!-- end of top nav -->
          <div align="center" style="background: #000; height: 230px; border: 1px solid black; padding-top: 7px"><?php  include_partial('global/common/topheader') ?></div>
      </header><!-- end of header -->



      <section id="main"><!-- #main content and sidebar area -->
          <section id="content"><!-- #content -->

              <?php include_partial('global/common/alert')?>
              <?php echo $sf_content ?>

          </section><!-- end of #content -->

          <aside id="sidebar"><!-- sidebar -->
              <h3><?= __('Private cabinet') ?></h3>

              <?php if (!$sf_user->isAuthenticated()): ?>
                  <?php include_partial('global/common/forms/login_form')?>
              <?php else: ?>
                  <?php  include_partial('global/common/user_panel') ?>
              <?php endif ?>


              <div style="border: 2px solid #FEB55E; margin-top: 10px; text-align: center">
              <?php  include_partial('global/common/new_users',array()) ?>
              </div>

              <h3>Tools</h3>
              <?php  include_partial('global/common/forms/short_search_form',array('form'=> new qsearchForm())) ?>
              <ul>
                  <li><?= link_to(__('Advanced search'),'search/adv') ?></li>

              </ul>

          </aside><!-- end of sidebar -->

      </section><!-- end of #main content and sidebar-->

      <footer>
          <br />
          <p>&copy; <a href="#">yoursite.com</a></p>
          <br />
      </footer>

  </div><!-- #wrapper -->
  <!-- Free template created by http://freehtml5templates.com -->
  </body>

</html>