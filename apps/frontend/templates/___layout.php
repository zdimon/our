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
    <div class="soc_block">
        <a data-service="vkontakte" target="_blank" rel="nofollow" class="vkontakte" href="http://share.yandex.ru/go.xml?service=vkontakte&url=http://star-marriage.com&title=Брачное агенство star-marriage.com" target="_blank"></a>
        <a class="facebook" href="http://share.yandex.ru/go.xml?service=facebook&url=http://star-marriage.com&title=Брачное агенство star-marriage.com" target="_blank"></a>

        <a class="odnoklassniki" href="http://share.yandex.ru/go.xml?service=odnoklassniki&url=http://star-marriage.com&title=Брачное агенство star-marriage.com" target="_blank"></a>
        <a class="twitter" href="http://share.yandex.ru/go.xml?service=twitter&url=http://star-marriage.com&title=Брачное агенство star-marriage.com" target="_blank"></a>
    </div>
  <div id="wrapper">




      <div align="center"><?php  include_partial('global/common/lang_panel')?></div>

      <div align="center"><?php  include_partial('global/common/topheader') ?></div>

      <div id="header" class="container">
          <div id="logo">
              <h1><a href="<?= url_for('@mainpage') ?>">Ourfeeling</a></h1>
              <p> I am looking for you!</p>
          </div>

          <?php include_partial('global/common/top_menu')?>

      </div>



      <div id="page" class="container">
          <div id="content">
              <div class="post">
                  <?php include_partial('global/common/alert')?>
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

                      <div style="clear: both;">&nbsp;</div>
                  </li>
                  <li>
                      <?php  include_partial('global/common/new_users',array()) ?>
                  </li>
                  <li>
                      <?= link_to(__('Advanced search'),'search/adv') ?>
                  </li>

              </ul>
          </div>
          <!-- end #sidebar -->



          <div style="clear: both;">&nbsp;</div>
      </div>
      <!-- end #page -->
  </div>
  <div id="footer-content" class="container">
      <div id="footer-bg">
          <?php $news = NewsTable::getLast(); ?>
          <?php $i = 0; ?>
          <?php foreach($news as $n): ?>
            <?php $i++; ?>
            <div id="column<?= $i ?>">
            <h2><?= $n->getTitle() ?></h2>
            <p><?= $n->getDescription() ?></p>
            </div>
          <?php endforeach; ?>

          <div id="column3">
              <h2>Quick search</h2>

              <?php  include_partial('global/common/forms/short_search_form',array('form'=> new qsearchForm())) ?>


          </div>
      </div>
  </div>
  <div id="footer">
      <p>Copyright (c) 2012</p>
  </div>

</body>

</html>