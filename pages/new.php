<?php
require './core/config.php';

// Se etiquetan los elementos del formulario y se encripta la contraseña
if (isset($_POST['snd-r'])) {

    $user = $_POST['user-r'];
    $email = $_POST['email-r'];
    $pw = $_POST['lpw-r'];
    $pwha = password_hash($pw, PASSWORD_DEFAULT);

    // Verificamos si el nick/email están en uso
    $usrc = "SELECT * FROM users WHERE user='$user' OR email='$email' LIMIT 1";
    $res = mysqli_query($con, $usrc);
    $usrl = mysqli_fetch_assoc($res);

    // Revisamos si el usuario y/o el nick/email existen 
    if ($usrl) {
        if ($usrl['user'] == $user) {
            alert_danger('Ce nom d\'utilisateur n\'est pas disponible');
        }
        if ($usrl['email'] == $email) {
            alert_danger('Cette adresse mail a déjà été utilisé');
        }

        // Por si a caso arreglo el problema con la base de datos -.-
        // PD : Al final si que lo he arreglado

    } elseif (empty($_POST['user-r']) or empty($_POST['email-r']) or empty($_POST['lpw-r'])) {
        alert_danger('Veuillez completer tous les champs');
    } elseif (preg_match("/[^a-zA-Z0-9._-]+/", $user)) {
        alert_danger('Ce nom d\'utilisateur n\'est pas valide');
    } elseif (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $email)) {
        alert_danger('Cette adresse mail n\'est pas valide');
    } else {
        // Registramos los datos del usuario (+ dirección IP) en la base de datos
        $usrip = $_SERVER['REMOTE_ADDR'];
        $sql = "INSERT INTO users (user, email, password, regdat, ip) VALUES ('$user', '$email', '$pwha', CURDATE(), '$usrip')";
        mysqli_query($con, $sql);

        alert_success('Inscription réussie');

        header('Refresh: 3; URL=/');
    }
}
?>
<form method="POST" class="form-group">
    <p>
        <label for="user-r">Nom d'utilisateur:</label>
        <input type="text" class="form-control border-dark" maxlength="30" name="user-r" placeholder="Ex: Stephane52" id="user-r">
    </p>
    <p>
        <label for="email-r">E-mail:</label>
        <input type="email" class="form-control border-dark" maxlength="120" name="email-r" placeholder="Ex: steph.52@gmail.com" id="email-r">
    </p>
    <p>
        <label for="lpw-r">Mot de passe:</label>
        <input type="password" class="form-control border-dark" maxlength="30" name="lpw-r" placeholder="Minimum 6 caractéres dont, une majuscule et un chiffre" id="lpw-r">
        <!--
        Algún uso le daré a esto
        <br><br>
        <input type="checkbox"> Se souvenir de moi
        -->
    </p>
    <p>
        <input type="submit" class="btn btn-dark border-light" value="S'inscrire" name="snd-r">
    </p>
</form>