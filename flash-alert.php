<?php
	if(isset($_SESSION['flash']))
	{
		foreach($_SESSION['flash'] as $type => $message)
		?>
		<h6 class="mx-auto col-sm-9 col-md-7 col-lg-5 col-xl-4  alert  alert-<?php echo $type; ?> ">
		<?php echo $message.'<br>' ; ?>
		</h6>
	<?php
	}
	unset($_SESSION['flash']);
	?>