<?php
require './core/config.php';

if ($logged === '') {
  header('Refresh: 0; URL=/');
  exit();
}

$months = ['Avril', 'Mai', 'Juin', 'Juillet'];

$i = 0;

$numOfWeeks = 1;

while ($i < count($months)) {

?>
<div class="col-sm-12 col-md-8 col-lg-8 col-xl-4 my-3 mx-auto d-block">
    <div class="card border-danger">
      <div class="card-body p-0 table-responsive-sm">
  <table class="table table-bordered mb-0 border-0 text-uppercase">
    <thead class="text-center text-uppercase text-light border-0">
      <tr>
        <th scope="col" colspan="6" class="bg-danger border-top-0 border-bottom-0 border-danger"><?= $months[$i] ?></th>
      </tr>
    </thead>
    <tbody>

      <?php
  $m = $months[$i];

      $Rsql = "SELECT * FROM records WHERE month = '$m'";
      $Rres = mysqli_query($con, $Rsql);
      

      while ($recs = mysqli_fetch_assoc($Rres)) {

        $w = $recs['week'];

        if($recs['week'] == $numOfWeeks){

      ?>

        <tr class="text-center">
          <th scope="row"><small class="font-weight-bolder">#<?= $recs['week'] ?></small></th>

          <?php

          $Wsql = "SELECT * FROM records WHERE week = '$w' AND month = '$m' ORDER BY id ASC";
          $Wres = mysqli_query($con, $Wsql);

          while ($week = mysqli_fetch_assoc($Wres)) {

          ?>
            <td><a href="./day/<?= $week['id'] ?>"><small class="font-weight-bolder"><?= $week['day'] ?></small></a></td>

          <?php
          }
          ?>
        </tr>

      <?php

      $numOfWeeks++;
      
        }
      }
      ?>

    </tbody>
  </table>
</div>
</div>
</div>
<?php
  $i++;
}
