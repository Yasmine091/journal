<?php

session_start();

$logged = $_SESSION['logged'] ?? '';
$usrid = $_SESSION['id'] ?? '';
$usrnm = $_SESSION['user'] ?? '';

function aft_log()
{
	echo '<script>
	function rf_lt(){
		window.location.replace("/");
	}
	setTimeout(rf_lt,1500);
	</script>';
}

function alert_danger()
{
	echo '
	<div class="alert bg-danger text-light fade show" role="alert">
	';
}

function alert_success()
{
	echo '
	<div class="alert bg-success text-light fade show" role="alert">
	';
}

function alert_end()
{
	echo '
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	<span aria-hidden="true"><i class="fas fa-times"></i></span>
	</button>
	</div>';
}
