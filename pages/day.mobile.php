<?php
require './core/config.php';

if ($logged == '') {
  header('Refresh: 0; URL=/');
  exit();
}

$dayID = (int) $_GET['day'];

$Rsql = "SELECT * FROM records
        WHERE id = '$dayID'";

$Rres = mysqli_query($con, $Rsql);

while ($recs = mysqli_fetch_assoc($Rres)) {

?>
  <div class="table-responsive-sm">
    <table class="table table-bordered">
      <thead>
        <tr class="col-sm-12">
          <th scope="col" colspan="2" class="text-center text-uppercase font-weight-bold display-4 bg-primary text-light"><?= $recs['day'] ?></th>
        </tr>
      </thead>
      <tbody class="daily-info">
        <tr>
          <th scope="row">Météo du jour</th>
          <td><?= $recs['feelings'] ?></td>
        </tr>
        <tr>
          <th scope="row">Mission du jour</th>
          <td><?= $recs['mission'] ?></td>
        </tr>
        <tr>
          <th scope="row">Porsuites à donner</th>
          <td><?= $recs['next'] ?></td>
        </tr>
        <tr>
          <th scope="row">Méthodes et technologies</th>
          <td><?= $recs['tech'] ?></td>
        </tr>
        <tr>
          <th scope="row">Ce que j'avais à faire</th>
          <td><?= $recs['todo'] ?></td>
        </tr>
        <tr>
          <th scope="row">Ce que j'ai fait</th>
          <td><?= $recs['done'] ?></td>
        </tr>
        <tr>
          <th scope="row">Problèmes rencontrés</th>
          <td><?= $recs['problems'] ?></td>
        </tr>
        <tr>
          <th scope="row">Solution et pourquoi le choix</th>
          <td><?= $recs['solutions'] ?></td>
        </tr>
        <tr>
          <th scope="row">Ressources utilisées</th>
          <td><?= $recs['resources'] ?></td>
        </tr>

      <?php
    }
      ?>

      </tbody>
    </table>
  </div>