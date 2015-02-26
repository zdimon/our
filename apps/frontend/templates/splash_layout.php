<!DOCTYPE html>
<html lang="es">
<head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <link type="text/css" rel="stylesheet" href="/css/style.css" />
    <link type="text/css" rel="stylesheet" href="/css/colorbox.css" />
    <link type="text/css" rel="stylesheet" href="/css/liValidForm.css" />
    <link rel="stylesheet" type="text/css" href="/css/skin.css" />
    <link type="text/css" rel="stylesheet" href="/css/liVMenu.css" />

    <script type="text/javascript" src="/js/jquery-1.7.1.min.js"></script>
    <script type="text/javascript" src="/js/jquery.easing.min.1.3.js"></script>
    <script type="text/javascript" src="/js/jquery.jcarousel.min.js"></script>
    <script type="text/javascript" src="/js/jquery.colorbox-min.js"></script>
    <script type="text/javascript" src="/js/liValidForm.v2.js"></script>
    <script type="text/javascript" src="/js/jquery.LiVMenu.js"></script>
    <script type="text/javascript" src="/js/main.js"></script>
    <script type="text/javascript" src="/js/plugins.js"></script>


    <link rel="stylesheet" type="text/css" media="screen" href="/mgI18nPlugin/css/redmond-jquery-ui.css" />
    <script type="text/javascript" src="/mgI18nPlugin/js/gui.js" ></script>



    <link rel="image_src" href="pic/expres_icon.jpg" />
    <!--[if IE 6]><script src="js/DD_belatedPNG_0.0.8a-min.js"></script><script>DD_belatedPNG.fix('.png, img');</script><![endif]-->
    <!--[if IE]><script>document.createElement('header');document.createElement('nav');document.createElement('section');document.createElement('article');document.createElement('aside');document.createElement('footer');</script><![endif]-->
</head>
<body style="background:#000;">

<div class="s_wrap">

    <div class="s_bg">
        <div style="padding-left: 290px; padding-top: 623px; position: absolute; font-size: 18px; font-style: italic; font-weight: 700;"><?= __('slogan') ?></div>


        <div class="flags">
            <a href="<?= url_for('@lang?l=is') ?>"><img src="/pic/f_sp.png" alt=""></a>
            <a href="<?= url_for('@lang?l=ru') ?>"><img src="/pic/f_ru.png" alt=""></a>
            <a href="<?= url_for('@lang?l=fr') ?>"><img src="/pic/f_fr.png" alt=""></a>
            <a href="<?= url_for('@lang?l=de') ?>"><img src="/pic/f_ger.png" alt=""></a>
            <a href="<?= url_for('@lang?l=en') ?>"><img src="/pic/f_usa.png" alt=""></a>
        </div>
        <div class="sUser_block">
            <?php echo $sf_content ?>






</body>

</html>