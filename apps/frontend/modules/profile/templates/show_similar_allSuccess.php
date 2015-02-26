<div>
    <?php foreach($similar as $p): ?>
       <?php include_partial('global/common/search_item',array('profile'=>$p,'arrc'=>$arrc)); ?>
    <?php endforeach; ?>
</div>
    <div style="clear: both;"></div>

<script type="text/javascript">

    alert('dddd');
    if($('.coll_h').length){
        var coll_h_length = $('.coll_h').length
        var h = 0
        for(a = 0;a < coll_h_length; a++){
            if(h < $('.coll_h').eq(a).height())
                h = $('.coll_h').eq(a).height()
        }
        $('.coll_h').animate({height:h})
    }



</script>