<script type="text/javascript">
  $("a.alert").fancybox({
'transitionIn' : 'none',
'transitionOut' : 'none',
'titlePosition' : 'inside',
'titleFormat' : function(title, currentArray, currentIndex, currentOpts) {
return '(' + (currentIndex + 1) + '/' + currentArray.length + ') ' + title;
}
});

</script>