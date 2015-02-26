<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>



      <script type="text/javascript">
          $(function(){
              // BUTTON
              $('.fg-button').hover(
                  function(){ $(this).removeClass('ui-state-default').addClass('ui-state-focus'); },
                  function(){ $(this).removeClass('ui-state-focus').addClass('ui-state-default'); }
              );

              // MENU
              $('#flat_add').menu({
                  content: $('#flat_add').next().html(), // grab content from this page
                  backLink: false,
                  showSpeed: 400
              });

              $('#flat_content').menu({
                  content: $('#flat_content').next().html(), // grab content from this page
                  backLink: false,
                  showSpeed: 400
              });

              $('#flat_setting').menu({
                  content: $('#flat_setting').next().html(), // grab content from this page
                  backLink: false,
                  showSpeed: 400
              });

              $('#flat_user').menu({
                  content: $('#flat_user').next().html(), // grab content from this page
                  backLink: false,
                  showSpeed: 400
              });

              $('#flat_letter').menu({
                  content: $('#flat_letter').next().html(), // grab content from this page
                  backLink: false,
                  showSpeed: 400
              });

              $('#flat_forum').menu({
                  content: $('#flat_forum').next().html(), // grab content from this page
                  backLink: false,
                  showSpeed: 400
              });

              $('#flat_chat').menu({
                  content: $('#flat_chat').next().html(), // grab content from this page
                  backLink: false,
                  showSpeed: 400
              });

              $('#flat_mail').menu({
                  content: $('#flat_mail').next().html(), // grab content from this page
                  backLink: false,
                  showSpeed: 400
              });


              $('#flat_staff').menu({
                  content: $('#flat_staff').next().html(), // grab content from this page
                  backLink: false,
                  showSpeed: 400
              });


          });
      </script>

  </head>
    <body >




  
    <div id="wrapper">
	
	
        <table width="100%">
            <tr>
                <td height="50px">
                      <?= include_partial('global/common/_menu')?>
                </td>
            </tr>
            <tr>

                <td valign="top" style="vertical-align: top">

	
	<!-- end #menu -->
	
		<div id="content">
			<?php echo $sf_content ?>
		<div style="clear: both;">&nbsp;</div>
		</div>
		<!-- end #content -->
		
		<!-- end #sidebar -->
		<div style="clear: both;">&nbsp;</div>
	
	<!-- end #page -->
                </td>
            </tr>
        </table>
</div>
	<div id="footer">
		<p>Copyright (c) 2012</p>
	</div>
	<!-- end #footer -->


	

	
	
	
		<script type="text/javascript">
					//hover states on the static widgets
				$('#dialog_link, ul#icons li').hover(
					function() { $(this).addClass('ui-state-hover'); }, 
					function() { $(this).removeClass('ui-state-hover'); }
				);
				</script>

    <?php

    echo jq_periodically_call_remote(array(
        'frequency' => 10,
        'update' => 'chat_call',
        'loading' => '$("#loading").show()',
        'complete' => '$("#loading").hide()',
        'script'=>true,
        'method'=>'GET',
        'url' => url_for('mainpage/call'),
    ))
    ?>

  </body>
</html>
