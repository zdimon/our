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
    <script type="text/javascript" src="/js/smmin.js"></script>
    <script type="text/javascript" src="/js/jquery.scrollTo-min.js"></script>
    <script type="text/javascript" src="/js/swfobject.js"></script>
</head>
<body>



              <table>
              <tr>
                  <td>
                      <?php include_partial('global/common/alert')?>
                      <?php echo $sf_content ?>

                  </td>
                  <td valign="top">


                      <?php if ($sf_user->isAuthenticated() and $sf_user->getGuardUser()->getProfile()->getIsActive()): ?>
                      <div class="coll_size">

                          <!-- Подключаем контакты -->
                          <div id="chat_contact_list"></div>
                          <!--   /////////////////////    -->

                      </div><!-- .coll_size-->
                      <?php endif ?>


                  </td>
              </tr>

          </table>











</body>

</html>