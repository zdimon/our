

<?php if ($sf_user->hasFlash('message')): ?>

<div class="alert_message" align="center">



				 <?php echo $sf_user->getFlash('message') ?></p>

</div>
<br />
 <?php endif; ?>

<?php if ($sf_user->hasFlash('error')): ?>

		<div class="alert_error" align="center">


				<?php echo $sf_user->getFlash('error') ?> </p>


		</div>
<br />
 <?php endif; ?>