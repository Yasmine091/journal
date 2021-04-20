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

<div class="mb-5 pb-5">
    <div class="col-sm-12 col-md-9 col-lg-9 my-3 mx-auto d-block">
        <div class="card border-primary">
            <h5 class="card-header text-center text-uppercase font-weight-bold text-light bg-primary"><?= $recs['day'] ?></h5>
            <div class="card-body">

            <div class="container-fluid m-0 p-0">
              <div class="row mx-auto w-100">
                    <p class="col-sm-12 col-md-6 col-xl-4 p-1">
                        <label for="feel-inp">Météo du jour</label>
                        <textarea class="form-control border-primary" id="feel-inp" rows="12" name="feelings" placeholder="Je me sens..." readonly><?= $recs['feelings'] ?></textarea>
                    </p>
                    <p class="col-sm-12 col-md-6 col-xl-4 p-1">
                        <label for="mission-inp">Mission du jour</label>
                        <textarea class="form-control border-primary" id="mission-inp" rows="12" name="mission" placeholder="Compétence à mettre en
œuvre : Réaliser une interface
utilisateur, maquetter une
appli..." readonly><?= $recs['mission'] ?></textarea>
                    </p>
                    <p class="col-sm-12 col-md-6 col-xl-4 p-1">
                        <label for="tech-inp">Méthodes et technologies</label>
                        <textarea class="form-control border-primary" id="tech-inp" rows="12" name="tech" placeholder="Moyens mis en œuvre :
agilité, langages, réunion de
cadrage-projet, coordination,
validation..." readonly><?= $recs['tech'] ?></textarea>
                    </p>
                    <p class="col-sm-12 col-md-6 col-xl-4 p-1">
                        <label for="next-inp">Porsuites à donner</label>
                        <textarea class="form-control border-primary" id="next-inp" rows="12" name="next" placeholder="Feed-back, réorientation, Go
vs No-GO, présentation,
déploiement, développement,
veille..." readonly><?= $recs['next'] ?></textarea>
                    </p>
                    <p class="col-sm-12 col-md-6 col-xl-4 p-1">
                        <label for="todo-inp">Ce que j'avais à faire</label>
                        <textarea class="form-control border-primary" id="todo-inp" rows="12" name="todo" readonly><?= $recs['todo'] ?></textarea>
                    </p>
                    <p class="col-sm-12 col-md-6 col-xl-4 p-1">
                        <label for="done-inp">Ce que j'ai fait</label>
                        <textarea class="form-control border-primary" id="done-inp" rows="12" name="done" readonly><?= $recs['done'] ?></textarea>
                    </p>
                    <p class="col-sm-12 col-md-6 col-xl-4 p-1">
                        <label for="prob-inp">Problèmes rencontrés</label>
                        <textarea class="form-control border-primary" id="prob-inp" rows="12" name="problems" placeholder="Problème technique, gestion
temps, absence, cadrage,
compréhension..." readonly><?= $recs['problems'] ?></textarea>
                    </p>
                    <p class="col-sm-12 col-md-6 col-xl-4 p-1">
                        <label for="sol-inp">Solution et pourquoi le choix</label>
                        <textarea class="form-control border-primary" id="sol-inp" rows="12" name="solutions" placeholder="Comment j’ai résolu les
problèmes ? Pourquoi j’ai
fait ces choix ?" readonly><?= $recs['solutions'] ?></textarea>
                    </p>
                    <p class="col-sm-12 col-md-6 col-xl-4 p-1">
                        <label for="res-inp">Ressources utilisées</label>
                        <textarea class="form-control border-primary" id="res-inp" rows="12" name="resources" placeholder="Ressources documentaires/humaines" readonly><?= $recs['resources'] ?></textarea>
                    </p>
            </div>
                </div>
    <?php
}
?>

        </div>
    </div>
</div>