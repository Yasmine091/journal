<?php
require './core/config.php';

if ($logged == '') {
    header('Refresh: 0; URL=/');
    exit();
}

$date = date('Y-m-d'); // Date du jour
setlocale(LC_TIME, "fr_FR", "French");

$mois = strftime("%B", strtotime($date));
$semaine = currentWeek();
$jour = strftime("%A", strtotime($date));

// Se etiquetan los elementos del formulario y se encripta la contraseña
if (isset($_POST['new-d'])) {

    //$ = mysqli_real_escape_string($con, $_POST['']);
    $feelings = mysqli_real_escape_string($con, $_POST['feelings']);
    $mission = mysqli_real_escape_string($con, $_POST['mission']);
    $tech = mysqli_real_escape_string($con, $_POST['tech']);
    $next = mysqli_real_escape_string($con, $_POST['next']);
    $tech = mysqli_real_escape_string($con, $_POST['tech']);
    $todo = mysqli_real_escape_string($con, $_POST['todo']);
    $done = mysqli_real_escape_string($con, $_POST['done']);
    $problems = mysqli_real_escape_string($con, $_POST['problems']);
    $solutions = mysqli_real_escape_string($con, $_POST['solutions']);
    $resources = mysqli_real_escape_string($con, $_POST['resources']);

    if (empty($_POST['feelings']) or empty($_POST['mission']) or empty($_POST['tech']) or empty($_POST['next']) or empty($_POST['todo']) or empty($_POST['done']) or empty($_POST['problems']) or empty($_POST['solutions']) or empty($_POST['resources'])) {
        alert_danger('Veuillez completer tous les champs');
    } else {

        $sql = "INSERT INTO `records` 
        (`month`, `week`, `day`, `feelings`, `mission`, `tech`, `next`, `todo`, `done`, `problems`, `solutions`, `resources`) 
        VALUES 
        ('$mois', '$semaine', '$jour', '$feelings', '$mission', '$tech', '$next', '$todo', '$done', '$problems', '$solutions', '$resources') ";
        mysqli_query($con, $sql);

        alert_success('Entrée ajoutée avec succès');

        header('Refresh: 2; URL=/');
    }
}
?>
<div class="mb-5 pb-5">
<div class="col-sm-12 col-md-8 col-lg-8 col-xl-4 my-3 mx-auto d-block">
        <div class="card border-info">
            <h5 class="card-header text-center text-uppercase font-weight-bold text-light bg-info">Ajouter une entrée de journal</h5>
            <div class="card-body">

                <form method="POST" class="form-group">

                <?php

                ?>
                    <p>
                        <label for="feel-inp">Météo du jour</label>
                        <textarea class="form-control border-info" id="feel-inp" rows="3" name="feelings" placeholder="Je me sens..."></textarea>
                    </p>
                    <p>
                        <label for="mission-inp">Mission du jour</label>
                        <textarea class="form-control border-info" id="mission-inp" rows="3" name="mission" placeholder="Compétence à mettre en
œuvre : Réaliser une interface
utilisateur, maquetter une
appli..."></textarea>
                    </p>
                    <p>
                        <label for="tech-inp">Méthodes et technologies</label>
                        <textarea class="form-control border-info" id="tech-inp" rows="3" name="tech" placeholder="Moyens mis en œuvre :
agilité, langages, réunion de
cadrage-projet, coordination,
validation..."></textarea>
                    </p>
                    <p>
                        <label for="next-inp">Porsuites à donner</label>
                        <textarea class="form-control border-info" id="next-inp" rows="3" name="next" placeholder="Feed-back, réorientation, Go
vs No-GO, présentation,
déploiement, développement,
veille..."></textarea>
                    </p>
                    <p>
                        <label for="todo-inp">Ce que j'avais à faire</label>
                        <textarea class="form-control border-info" id="todo-inp" rows="3" name="todo"></textarea>
                    </p>
                    <p>
                        <label for="done-inp">Ce que j'ai fait</label>
                        <textarea class="form-control border-info" id="done-inp" rows="3" name="done"></textarea>
                    </p>
                    <p>
                        <label for="prob-inp">Problèmes rencontrés</label>
                        <textarea class="form-control border-info" id="prob-inp" rows="3" name="problems" placeholder="Problème technique, gestion
temps, absence, cadrage,
compréhension..."></textarea>
                    </p>
                    <p>
                        <label for="sol-inp">Solution et pourquoi le choix</label>
                        <textarea class="form-control border-info" id="sol-inp" rows="3" name="solutions" placeholder="Comment j’ai résolu les
problèmes ? Pourquoi j’ai
fait ces choix ?"></textarea>
                    </p>
                    <p>
                        <label for="res-inp">Ressources utilisées</label>
                        <textarea class="form-control border-info" id="res-inp" rows="3" name="resources" placeholder="Ressources documentaires/humaines"></textarea>
                    </p>
                    <p>
                        <input type="submit" class="btn btn-info border-info w-100" value="Ajouter" name="new-d">
                    </p>
                </form>

            </div>
        </div>
    </div>
</div>