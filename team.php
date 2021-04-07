<?php
require('core/config.php');
require('core/func.php');

/*

# Si se ha iniciado sesión
if(isset($logged) && $logged === true) {
    header('Refresh: 0; URL=/');
    exit();
}

O

# Si no se ha iniciado sesión
if ($logged == '') {
  header('Refresh: 0; URL=/');
  exit();
}
*/

include('tpl/header.php');

?>

<section id="sec-def">
  <div class="card bg-dark text-white border-none mb-3 shdw-crd-title">
    <div id="box-title" class="card-header text-<?php echo $wbcnf['text-var'] ?>">Équipe</div>
    <div class="card-body custom-shadow-1">
    <span class="badge bg-light text-dark" style="font-size: smaller;">Guide de couleurs<i class="fas fa-angle-double-right" style="margin-left: 5px;"></i></span>
      <span style="width: 2px; display: inline-block;"></span>
      <?php
      $rnsql = "SELECT * FROM ranks WHERE num >= 1 ORDER BY num ASC";
      $rnres = mysqli_query($con, $rnsql);
      while ($ranks = mysqli_fetch_assoc($rnres)) {
      ?>
        <span class="badge text-<?php echo $ranks['text-var'] ?>" style="background-color: <?php echo $ranks['bg-color'] ?>; font-size: smaller;"><?php echo $ranks['name'] ?></span>
        </span>
        <span style="width: 2px; display: inline-block;"></span>
      <?php
      }
      ?>
      <hr>
      <?php
      $usql = "SELECT * FROM users WHERE urank >= 1 ORDER BY urank ASC";
      $ures = mysqli_query($con, $usql);
      while ($usrd = mysqli_fetch_assoc($ures)) {

        $raid = $usrd['urank'];
        $rasql = "SELECT * FROM ranks WHERE num = '$raid'";
        $rres = mysqli_query($con, $rasql);
        $usrk = mysqli_fetch_assoc($rres);

      ?>
        <div class="card bg-dark text-<?php echo $usrk['text-var']  ?> border-light rnk-card" style="background-color: <?php echo $usrk['bg-color']  ?> !important;">
          <div class="d-flex" style="height: 40px;">
            <a href="../profile/<?php echo $usrd['user'] ?>" style="text-decoration: none; color: none;">
              <img class="card-img rnk-img" src="<?php echo $usrd['picture']  ?>" alt="Card image">
            </a>
            <div class="card-img-left mb-prev">
              <a href="../profile/<?php echo $usrd['user']  ?>">
                <label class="rnk-usr-lbl"><i class="fas fa-user"></i>
                  <?php echo $usrd['user']  ?>
                </label>
              </a>
            </div>
          </div>
        </div>
        <span style="width: 5px; display: inline-block;"></span>
      <?php
      }
      ?>
    </div>

</section>
<?php
include('tpl/right-def.php');
include('tpl/footer.php');
?>