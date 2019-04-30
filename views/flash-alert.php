<?php
	if(isset($_SESSION['flash']))
	{
		foreach($_SESSION['flash'] as $type => $message)
		?>
		<h6 class="mx-auto col-sm-12 alert  alert-<?php echo $type; ?> ">
		<?php echo $message.'<br>' ; ?>
		</h6>
	<?php
	}
	unset($_SESSION['flash']);
	?>