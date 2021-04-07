<?php
require('core/config.php');
require('core/func.php');

if (!isset($logged) && $logged != true) {
  header('Refresh: 0; URL=/');
  exit();
}

include('tpl/header.php');

# Seleccionamos los datos del usuario a editar
$usrd = "SELECT * FROM users WHERE id='$usrid' LIMIT 1";
$res = mysqli_query($con, $usrd);
$usr = mysqli_fetch_assoc($res);

?>

<script type="text/javascript">
  function settprev() {
    document.getElementById("pr-picture").src = document.getElementById("picture-s").value;
    document.getElementById("pr-banner").src = document.getElementById("banner-s").value;
  }

  document.getElementById("prev-btn").addEventListener('click', settprev);
</script>

<section id="sec-def">
  <div class="card bg-dark text-white border-light mb-3">
    <div id="box-title" class="card-header text-<?php echo $wbcnf['text-var'] ?>">Préférences</div>
    <div class="card-body">

      <?php
      if (isset($_POST['snd-s1'])) {

        # Etiquetamos los datos del formulario
        $suser = $_POST['user-s'];
        $smotto = mysqli_real_escape_string($con, $_POST['motto-s']);

        // Verificamos si el nombre ya está en uso
        $nousr = "SELECT * FROM users WHERE user='$suser' AND id != '$usrid' LIMIT 1";
        $lires = mysqli_query($con, $nousr);
        $vusr = mysqli_fetch_assoc($lires);

        if (isset($smotto[32])) {
          alert_danger();
          echo 'Votre humeur du jour ne doit pas dépasser les 32 charactères';
          alert_end();
        } elseif ($vusr) {
          if ($vusr['user'] == $suser and $vusr['id'] != $usrid) {
            alert_danger();
            echo 'Ce nom d\'utilisateur n\'est pas disponible';
            alert_end();
          }
        } elseif (empty($_POST['user-s']) or preg_match("/[^a-zA-Z0-9._-]+/", $suser)) {
          alert_danger();
          echo 'Veuillez inscrire un nom d\'utilisateur valide';
          alert_end();
        } else {
          alert_success();
          echo 'Vos préférences ont été enregistrées avec succès!';
          alert_end();
          $f1sql = "UPDATE users SET user='$suser', motto='$smotto' WHERE id='$usrid'";
          mysqli_query($con, $f1sql);
          aft_log();
        }
      }
      ?>
      <form method="POST" class="form-group">
        <label for="user-s">Nom d'utilisateur:</label>
        <input type="text" class="form-control border-dark" maxlength="320" name="user-s" placeholder="Ex: Stephane52" id="user-s" value="<?php echo $usr['user']; ?>">
        <br>
        <label for="motto-s">Humeur:</label>
        <input type="text" class="form-control border-dark" maxlength="32" name="motto-s" placeholder="Ex: Bienvenue au site!" id="motto-s" value="<?php echo $usr['motto']; ?>">
        <br><br>
        <input type="submit" class="btn btn-dark border-light" value="Sauvegarder" name="snd-s1" style="width: 100%;">
        <hr>
        <br>
      </form>

      <?php
      if (isset($_POST['snd-s2'])) {
        # Etiquetamos los datos del formulario
        $semail = $_POST['email-s'];
        $spw = $_POST['lpw-s'];
        $spwha = $usr['password'];
        $spwv = password_verify($spw, $spwha);

        // Verificamos si el email ya está en uso
        $nomail = "SELECT * FROM users WHERE email='$semail'LIMIT 1";
        $lir = mysqli_query($con, $nomail);
        $vmail = mysqli_fetch_assoc($lir);

        if ($vmail) {
          if ($vmail['email'] == $semail and $vmail['id'] != $usrid) {
            alert_danger();
            echo 'Cette adresse mail a déjà été utilisé';
            alert_end();
          }
        } elseif (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $semail)) {
          alert_danger();
          echo 'Cette adresse mail n\'est pas valide';
          alert_end();
        } else {
          if (empty($_POST['email-s']) or empty($_POST['lpw-s'])) {
            alert_danger();
            echo 'Veuillez completer tous les champs';
            alert_end();
          }
          if ($usr['id'] == $usrid and $usr['password'] == $spwv) {
            alert_success();
            echo 'L\'adresse mail a été enregistré!';
            alert_end();

            $f2sql = "UPDATE users SET email='$semail' WHERE id='$usrid'";
            mysqli_query($con, $f2sql);

            aft_log();
          } else {
            alert_danger();
            echo 'Mot de passe erroné';
            alert_end();
          }
        }
      }
      ?>

      <form method="POST" class="form-group">
        <label for="email-s">E-mail:</label>
        <input type="text" class="form-control border-dark" maxlength="120" name="email-s" placeholder="Ex: steph.52@gmail.com" id="email-s" value="<?php echo $usr['email']; ?>">
        <br>
        <label for="lpw-s">Mot de passe:</label>
        <input type="password" class="form-control border-dark" maxlength="30" name="lpw-s" placeholder="Confirmez votre mot de passe" id="lpw-s">
        <br><br>
        <input type="submit" class="btn btn-dark border-light" value="Sauvegarder" name="snd-s2" style="width: 100%;">
        <br><br>
        <hr>
      </form>

      <?php
      if (isset($_POST['snd-s3'])) {

        # Etiquetamos los datos del formulario
        $spicture = $_POST['picture-s'];
        $sbanner = $_POST['banner-s'];

        # Verificamos que los campos no estén vacios
        if (empty($_POST['picture-s']) or empty($_POST['banner-s'])) {
          alert_danger();
          echo 'Veuillez completer tous les champs';
          alert_end();
        } else {
          alert_success();
          echo 'Vos préférences ont été enregistrées avec succès!';
          alert_end();
          $f3sql = "UPDATE users SET picture='$spicture', banner='$sbanner' WHERE id='$usrid'";
          mysqli_query($con, $f3sql);
          aft_log();
        }
      }
      ?>
      <form method="POST" class="form-group">
        <label for="picture-s">Photo de profil:</label>
        <input type="text" class="form-control border-dark" maxlength="500" name="picture-s" placeholder="Ex: i.imgur.com/asdf.png" id="picture-s" value="<?php echo $usr['picture']; ?>">
        <br>
        <label for="banner-s">Bannière:</label>
        <input type="text" class="form-control border-dark" maxlength="500" name="banner-s" placeholder="Ex: i.imgur.com/asdf.png" id="banner-s" value="<?php echo $usr['banner']; ?>">
        <br><br>
        <div class="d-flex">
          <input type="button" onclick="settprev()" id="prev-btn" class="btn btn-dark border-light" data-toggle="modal" data-target="#preview" style="margin-right: 10px; width: 48%;" value="Avoir un aperçu">
          <input type="submit" class="btn btn-dark border-light" value="Sauvegarder" name="snd-s3" style="margin-left: 10px; width: 48%;">
        </div>
      </form>

      <div class="modal fade" id="preview" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
          <div class="modal-content bg-dark border-light text-light">
            <div class="modal-header border-bottom-0">
              <h5 class="modal-title">Aperçu</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span class="text-light" aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="d-flex">
                <img id="pr-picture" src="" class="card-img" style="width: 150px; height: 150px; object-fit: cover; margin-right: 10px;">
                <img id="pr-banner" src="" class="card-img" style="width: max-content; height: 150px; object-fit: cover;">
              </div>
            </div>
            <div class="modal-footer border-top-0">
              <button type="button" class="btn btn-dark border-light" data-dismiss="modal">Fermer</button>
            </div>
          </div>
        </div>
      </div>

      <hr>
    </div>

</section>
<?php
include('tpl/right-def.php');
include('tpl/footer.php');
?>