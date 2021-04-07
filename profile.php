<?php
require('core/config.php');
require('core/func.php');
include('tpl/header.php');
?>

<section id="sec-def">

	<?php

	$uid = $_GET['id'];
	$uid = mysqli_real_escape_string($con, $uid);

	$usql = "SELECT * FROM users WHERE id = '$uid' OR user ='$uid'";
	$ures = mysqli_query($con, $usql);
	while ($usrd = mysqli_fetch_assoc($ures)) {

		$raid = $usrd['urank'];
		$rasql = "SELECT * FROM ranks WHERE num = '$raid'";
		$rres = mysqli_query($con, $rasql);
		$rand = mysqli_fetch_assoc($rres);

		?>
<div class="card bg-dark text-white border-none mb-3 shdw-crd-title">
  <div id="box-title" class="card-header text-<?php echo $wbcnf['text-var'] ?>">Profil de <?php echo $usrd['user'] ?></div>
  <div class="card-body custom-shadow-1">
  <img src="<?php echo $usrd['banner'] ?>" class="card-img prof-bann"><hr>
  <div class="d-flex">
  <img src="<?php echo $usrd['picture'] ?>" class="card-img prof-img" style="">
    <p class="card-text prof-info-zone">
    <span class="form-control border-dark prof-smol-input" readonly>Pseudo: <?php echo $usrd['user'] ?></span>
	<span class="form-control border-dark prof-smol-input" readonly>Rang: 
	<span class="badge text-<?php echo $rand['text-var'] ?>" style="background-color: <?php echo $rand['bg-color'] ?>; font-size: smaller;"><?php echo $rand['name'] ?></span>
	</span>
	<span class="form-control border-dark prof-smol-input" readonly>Humeur: <?php echo $usrd['motto'] ?></span>
	<span class="form-control border-dark prof-smol-input" readonly>Création: <?php echo $usrd['regdat'] ?></span>
	</p>
	</div>
	<hr>
	<p class="card-text">
    <textarea class="form-control border-dark prof-bio" id="mybio" readonly><?php echo $usrd['mybio'] ?></textarea>
    </p>
</div>
<?php
	}
	?>

</section>
<?php
include('tpl/right-def.php');
include('tpl/footer.php');
?>