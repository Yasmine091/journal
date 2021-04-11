<?php
require './core/config.php';

if ($logged == '') {
  header('Refresh: 0; URL=/');
  exit();
}

$dayID = (int) $_GET['day'];
/*
$ttcn = "SELECT count(*) FROM news ORDER BY id DESC LIMIT 10";
$tcres = mysqli_query($con, $ttcn);
$tcnws = mysqli_fetch_array($tcres);
$totalcount = $tcnws['count(*)'];
*/

$Rsql = "SELECT * FROM records
        WHERE id = '$dayID'";

$Rres = mysqli_query($con, $Rsql);

while ($recs = mysqli_fetch_assoc($Rres)) {
    
    ?>
<div class="table-responsive">
<table class="table table-bordered">
  <thead>
    <tr class="col-sm-12">
      <th scope="col" colspan="9" class="text-center text-uppercase font-weight-bold display-4 bg-primary text-light"><?= $recs['day'] ?></th>
      </tr>
      <tr>
      <th scope="col">Météo du jour</th>
      <th scope="col">Mission du jour</th>
      <th scope="col">Méthodes et technologies</th>
      <th scope="col">Porsuites à donner</th>
      <th scope="col">Ce que j'avais à faire</th>
      <th scope="col">Ce que j'ai fait</th>
      <th scope="col">Problèmes rencontrés</th>
      <th scope="col">Solution et pourquoi le choix</th>
      <th scope="col">Ressources utilisées</th>
    </tr>
  </thead>
  <tbody>

    <tr>
      <td><?= $recs['feelings'] ?></td>
      <td><?= $recs['mission'] ?></td>
      <td><?= $recs['tech'] ?></td>
      <td><?= $recs['next'] ?></td>
      <td><?= $recs['todo'] ?></td>
      <td><?= $recs['done'] ?></td>
      <td><?= $recs['problems'] ?></td>
      <td><?= $recs['solutions'] ?></td>
      <td><?= $recs['resources'] ?></td>
    </tr>

    <?php
}
?>

</tbody>
</table>
</div>