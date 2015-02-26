<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
  </head>
    <body>

  <div id="wrapper">

      <?php include_partial('global/common/top_menu')?>
      <?php  include_partial('global/common/lang_panel')?>


      <div id="header">
          <div id="logo">
              <h1><a href="#">Ourfeeling</a></h1>

          </div>
      </div>



      <div id="page">
          <div id="page-bgtop">
              <div id="page-bgbtm">
                  <div id="content">
                      <div class="post">


                          <?php echo $sf_content ?>

                      </div>

                      <div style="clear: both;">&nbsp;</div>
                  </div>
                  <!-- end #content -->
                  <div id="sidebar">
                      <ul>


                          <li>
                              <?php if (!$sf_user->isAuthenticated()): ?>
                              <?php include_partial('global/common/forms/login_form')?>
                              <?php else: ?>
                              <?php  include_partial('global/common/user_panel') ?>
                              <?php endif ?>
                          </li>

                      </ul>
                  </div>
                  <!-- end #sidebar -->
                  <div style="clear: both;">&nbsp;</div>
              </div>
          </div>
      </div>









               
</div>
  <div id="footer">
      <p>Copyright (c) 2012 </p>
  </div>

</body>

</html>