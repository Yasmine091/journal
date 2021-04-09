<?php
require './core/config.php';

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
    <div class="card bg-dark text-white border-none mb-3">
        <div id="box-title" class="card-header text-<?php echo $wbcnf['text-var'] ?>">Profil de <?php echo $usrd['user'] ?></div>
        <div class="card-body">
            <img src="<?php echo $usrd['banner'] ?>" class="card-img">
            <hr>
            <div class="d-flex">
                <img src="<?php echo $usrd['picture'] ?>" class="card-img" style="">
                <p class="card-text">
                    <span class="form-control" readonly>Pseudo: <?php echo $usrd['user'] ?></span>
                    <span class="form-control" readonly>Rang:
                        <span class="badge text-<?php echo $rand['text-var'] ?>" style="background-color: <?php echo $rand['bg-color'] ?>; font-size: smaller;"><?php echo $rand['name'] ?></span>
                    </span>
                    <span class="form-control border-dark" readonly>Humeur: <?php echo $usrd['motto'] ?></span>
                    <span class="form-control border-dark" readonly>Création: <?php echo $usrd['regdat'] ?></span>
                </p>
            </div>
            <hr>
            <p class="card-text">
                <textarea class="form-control border-dark" id="mybio" readonly><?php echo $usrd['mybio'] ?></textarea>
            </p>
        </div>
    <?php
    }
?>