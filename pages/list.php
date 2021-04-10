<?php
require './core/config.php';

/*
$ttcn = "SELECT count(*) FROM news ORDER BY id DESC LIMIT 10";
$tcres = mysqli_query($con, $ttcn);
$tcnws = mysqli_fetch_array($tcres);
$totalcount = $tcnws['count(*)'];
*/
?>

<table class="table">
  <thead>
    <tr>
      <th scope="col"></th>
      <th scope="col">Météo du jour</th>
      <th scope="col">Mission du jour</th>
      <th scope="col">Porsuites à donner</th>
      <th scope="col">Méthodes et technologies</th>
      <th scope="col">Ce que j'avais à faire</th>
      <th scope="col">Ce que j'ai fait</th>
      <th scope="col">Problèmes rencontrés</th>
      <th scope="col">Solution et pourquoi le choix</th>
      <th scope="col">Ressources utilisées</th>
    </tr>
  </thead>
  <tbody>

<?php
$Rsql = "SELECT * FROM records
        ORDER BY week DESC LIMIT 10";
$Rres = mysqli_query($con, $Rsql);

`feelings`, `mission`, `tech`, `next`, `todo`, `done`, `problems`, `solutions`, `resources`)
while ($recs = mysqli_fetch_assoc($Rres)) {
    
    ?>

    <tr>
      <th scope="row"><?= $recs['day'] ?></th>
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