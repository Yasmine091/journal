<?php
require './core/config.php';

if (isset($logged) && $logged === true) {
    header('Refresh: 0; URL=/list');
    exit();
}

if (isset($_POST['snd'])) {

    $user = mysqli_real_escape_string($con, $_POST['user']);

    $pw = $_POST['lpw'];


    $pwc = "SELECT * FROM users WHERE user='$user' or email='$user' LIMIT 1";
    $res = mysqli_query($con, $pwc);
    $pwl = mysqli_fetch_assoc($res);

    $pwha = $pwl['password'];
    $pwv = password_verify($pw, $pwha); // verificar si envia valores booleanas

    if (empty($_POST['user']) or preg_match("/[^a-zA-Z0-9.@_-]+/", $user) or empty($_POST['lpw'])) {
        alert_danger('Veuillez completer tous les champs');
    } elseif ($pwl['user'] === $user and $pwv === true or $pwl['email'] === $user and $pwv === true) {
        alert_success('Connexion réussie');

        $_SESSION['id'] = $pwl['id'];
        $_SESSION['user'] = $pwl['user'];
        $_SESSION['logged'] = true;

        $usrid = $_SESSION['id'];
        $usrip = $_SERVER['REMOTE_ADDR'];
        $sql = "UPDATE users SET ip = $usrip WHERE id = $usrid";
        mysqli_query($con, $sql);

        header('Refresh: 2; URL=/');
    } else {
        alert_danger('Nom d\'utilisateur ou mot de passe erronés');
        session_destroy();
    }
}
?>

<div class="col-sm-12 col-md-8 col-lg-8 col-xl-4 my-3 mx-auto d-block">
    <div class="card border-dark">
        <h5 class="card-header text-center text-uppercase font-weight-bold text-light bg-dark">Connexion</h5>
        <div class="card-body">

            <form method="POST" class="form-group">
                <p>
                    <label for="user-inp">Nom d'utilisateur ou adresse email:</label>
                    <input type="text" class="form-control border-dark" maxlength="30" name="user" id="user-inp">
                </p>
                <p>
                    <label for="lpw-inp">Mot de passe:</label>
                    <input type="password" class="form-control border-dark" maxlength="30" name="lpw" id="lpw-inp">
                </p>
                <p>
                    <input type="checkbox" class="form-check-label" name="rmb">
                    <label>Se souvenir de moi</label>
                </p>
                <p>
                    <input type="submit" class="btn btn-dark border-dark w-100" value="Se connecter" name="snd">
                </p>
            </form>

        </div>
    </div>
</div>