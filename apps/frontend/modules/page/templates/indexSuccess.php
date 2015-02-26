<h1> <?=  $page->getItitle() ?></h1>

<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

<?php if($page->getAlias()=='ourwork'): ?>


<!-- ourfeling8 -->

<ins class="adsbygoogle"

     style="display:inline-block;width:300px;height:250px"

     data-ad-client="ca-pub-6382580135773552"

     data-ad-slot="8412723022"></ins>

<script>

(adsbygoogle = window.adsbygoogle || []).push({});

</script>

<?php endif ?>



<?= $page->getIcontent() ?>



<?php if($page->getAlias()!='terms'): ?>
<?php include_partial('global/common/forms/popup_register_form') ?>
<?php endif; ?>


<?php if($page->getAlias()=='ourwork'): ?>


<!-- ourfeling8 -->

<ins class="adsbygoogle"

     style="display:inline-block;width:300px;height:250px"

     data-ad-client="ca-pub-6382580135773552"

     data-ad-slot="8412723022"></ins>

<script>

(adsbygoogle = window.adsbygoogle || []).push({});

</script>

<?php endif ?>
