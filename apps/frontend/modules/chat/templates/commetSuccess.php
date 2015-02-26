<script type="text/javascript" src="/js/dklab_realplexor.js"></script>


<script>
    var realplexor = new Dklab_Realplexor(
    "http://<?= $_SERVER['HTTP_HOST'] ?>/",  // Realplexor's engine URL; must be a sub-domain
    "demo_" // namespace
);

// Subscribe a callback to channel Alpha.
realplexor.subscribe("Alpha", function (result, id) {
    alert(result);
});

realplexor.execute();

</script>