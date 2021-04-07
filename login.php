<?php
require('core/config.php');
require('core/func.php');

if (isset($logged) && $logged === true) {
    header('Refresh: 0; URL=/');
    exit();
}

include('tpl/header.php');
?>
<section id="sec-def">
    <article class="art-def">
        <div class="card bg-dark text-white border-none mb-3 shdw-crd-title">
            <div id="box-title" class="card-header text-<?php echo $wbcnf['text-var'] ?>">Connexion</div>
            <div class="card-body custom-shadow-1">
                <?php
                require('core/config.php');

                //código del login

                if (isset($_POST['snd'])) {

                    $user = mysqli_real_escape_string($con, $_POST['user']);
                    //$email = $_POST['email'];
                    $pw = $_POST['lpw'];
                    /* 
if (password_verify($pw, $pwha)) {
    echo "Este código es importante para que verifiques la contraseña en el login (NO OLVIDAR)";
}
*/

                    $pwc = "SELECT * FROM users WHERE user='$user' or email='$user' LIMIT 1";
                    $res = mysqli_query($con, $pwc);
                    $pwl = mysqli_fetch_assoc($res);

                    $pwha = $pwl['password'];
                    $pwv = password_verify($pw, $pwha);

                    if (empty($_POST['user']) or preg_match("/[^a-zA-Z0-9.@_-]+/", $user) or empty($_POST['lpw'])) {
                        alert_danger();
                        echo 'Veuillez completer tous les champs';
                        alert_end();
                    } elseif ($pwl['user'] == $user or $pwl['email'] == $user and $pwl['password'] == $pwv) {
                        alert_success();
                        echo 'Connexion réussie';
                        alert_end();

                        $_SESSION['id'] = $pwl['id'];
                        $_SESSION['user'] = $pwl['user'];
                        $_SESSION['logged'] = true;

                        $usrid = $_SESSION['id'];
                        $usrip = $_SERVER['REMOTE_ADDR'];
                        $sql = "UPDATE users SET ip = $usrip WHERE id = $usrid";
                        mysqli_query($con, $sql);

                        aft_log();
                    } else {
                        alert_danger();
                        echo 'Nom d\'utilisateur ou mot de passe erronés';
                        alert_end();
                        session_destroy();
                    }
                }
                ?>
                <form method="POST" class="form-group">
                    <label for="user-inp">Nom d'utilisateur ou adresse email:</label>
                    <input type="text" class="form-control border-dark" maxlength="30" name="user" id="user-inp">
                    <br>
                    <label for="lpw-inp">Mot de passe:</label>
                    <input type="password" class="form-control border-dark" maxlength="30" name="lpw" id="lpw-inp">
                    <br>
                    <input type="checkbox" class="form-check-label" name="rmb">
                    <label>Se souvenir de moi</label>
                    <br><br>
                    <input type="submit" class="btn btn-dark border-light" value="Se connecter" name="snd" style="width: 100%;">
                </form>
            </div>
    </article>
</section>
<?php
include('tpl/right-def.php');
include('tpl/footer.php');
?>