<?php
require './core/config.php';

if ($logged == '') {
  header('Refresh: 0; URL=/');
  exit();
}

$dayID = (int) $_GET['day'];

if (isset($_POST['del-d'])) {
  $sql = "DELETE FROM records WHERE id = '$dayID'";
  mysqli_query($con, $sql);

  alert_success('L\'entrée de journal a été supprimé avec succès');

  header('Refresh: 2; URL=/');
  exit();
}

$Rsql = "SELECT * FROM records
        WHERE id = '$dayID'";

$Rres = mysqli_query($con, $Rsql);

while ($recs = mysqli_fetch_assoc($Rres)) {
    
    ?>
<div class="table-responsive">
<table class="table table-bordered">
  <thead>
    <tr class="col-sm-12">
      <th scope="col" colspan="8" class="text-center text-uppercase font-weight-bold display-4 bg-primary text-light"><?= $recs['day'] ?></th>
      <th scope="col" colspan="1" class="text-center bg-primary">
        <form class="form-inline" method="POST">
        <button type="button" class="btn btn-dark p-2 mr-1">
                <a class="nav-link text-warning" href="/edit/<?= $recs['id'] ?>"><i class="fas fa-calendar-day"></i></a>
        </button>
        <button type="submit" class="btn btn-dark p-2" name="del-d">
        <a class="nav-link text-danger"><i class="fas fa-calendar-times"></i></a>
        </button>
        </form>
      </th>
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