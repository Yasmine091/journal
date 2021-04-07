<?php
require('core/config.php');

$logged = $_SESSION['logged'] ?? '';
$usrid = $_SESSION['id'] ?? '';

$usrd = "SELECT * FROM users WHERE id='$usrid' LIMIT 1";
$res = mysqli_query($con, $usrd);
$usr = mysqli_fetch_assoc($res);

$raid = $usr['urank'];
$rasql = "SELECT * FROM ranks WHERE num = '$raid'";
$rres = mysqli_query($con, $rasql);
$rand = mysqli_fetch_assoc($rres);

if (isset($_POST['logout'])) {
  session_destroy();
  aft_log();
}
?>
<aside id="aside-def">
  <?php
  if (isset($logged) && $logged === true) {
    echo '
<div class="card text-' . $wbcnf['text-var'] . ' mb-3 border-none bg-dark shdw-crd-title" style="text-align: left;">
  <div class="card-body custom-shadow-1">
    
<div class="d-flex">
  <img src="' . $usr['picture'] . '" class="card-img" style="width: 118px; height: 118px; object-fit: cover; margin-right: 5px; min-width:118px;">
  <p class="card-text bg-dark text-' . $wbcnf['text-var'] . '"  style="width: 74%; margin-bottom: 0px; flex: auto; margin-left: 5px;">
  <span class="form-control border-dark" style="margin-bottom: 5px; font-size: smaller;" readonly>Pseudo: ' . $usr['user'] . '</span>
  <span class="form-control border-dark" style="margin-bottom: 5px; font-size: smaller;" readonly>Rang: 
  <span class="badge text-' . $rand['text-var'] . '" style="background-color: ' . $rand['bg-color'] . '; font-size: smaller;">' . $rand['name'] . '</span>
  </span>
  <span class="form-control border-dark" style="font-size: smaller; height: 48px;" readonly>Humeur: ' . $usr['motto'] . '</span>
  </p>
  </div>
  </div>
</div>
';
  } ?>
  <div class="card text-white mb-3 bg-dark border-none shdw-crd-title">
    <div id="box-title" class="card-header text-<?php echo $wbcnf['text-var'] ?>">Header</div>
    <div class="card-body  custom-shadow-1">
      <h5 class="card-title">Dark card title</h5>
      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    </div>
  </div>
</aside>