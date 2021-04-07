<?php
require('core/config.php');
require('core/func.php');

if ($logged == '') {
  header('Refresh: 0; URL=/');
  exit();
}

include('tpl/header.php');

?>

<script type="text/javascript">
  $(window).on('load', function() {
    $('#read_mb').modal('show');
  });
</script>

<section id="sec-def">
  <div class="card bg-dark text-white border-none mb-3 shdw-crd-title">
    <div id="box-title" class="card-header text-<?php echo $wbcnf['text-var'] ?>">Messagerie</div>
    <div class="card-body custom-shadow-1">
      <input type="button" id="send-btn" class="btn btn-dark border-light" data-toggle="modal" data-target="#send_mb" style="margin-bottom: 10px; width:100%;" value="Rediger un message">

      <?php

      // Se etiquetan los elementos del formulario y se encripta la contraseña
      if (isset($_POST['snd-mb'])) {

        $user = $_POST['user-s'];
        $subject = mysqli_real_escape_string($con, $_POST['subject-s']);
        $message = mysqli_real_escape_string($con, $_POST['message-s']);

        // Verificamos si el usuario existe
        $uex = "SELECT * FROM users WHERE user='$user' && id!='$usrid' LIMIT 1";
        $ruex = mysqli_query($con, $uex);
        $uexs = mysqli_fetch_assoc($ruex);

        $recid = $uexs['id'];

        if (!$uexs or preg_match("/[^a-zA-Z0-9._-]+/", $user)) {
          alert_danger();
          echo 'Veuillez inscrire un nom d\'utilisateur valide';
          alert_end();
        } elseif (empty($_POST['user-s']) or empty($_POST['subject-s']) or empty($_POST['message-s'])) {
          alert_danger();
          echo 'Veuillez completer tous les champs';
          alert_end();
        } else {
          alert_success();
          echo 'Votre message a été envoyé avec succès!';
          alert_end();

          $mbsql = "INSERT INTO mailbox (comm, recip, subject, content, date) VALUES ('$usrid', '$recid', '$subject', '$message', CURDATE())";
          mysqli_query($con, $mbsql);
          aft_log();
        }
      }
      ?>

      <?php
      # Seleccionamos los emails del usuario
      $usmb = "SELECT * FROM mailbox WHERE recip='$usrid' OR comm='$usrid' ORDER BY id DESC LIMIT 20";
      $mbres = mysqli_query($con, $usmb);
      while ($usmb = mysqli_fetch_assoc($mbres)) {

        $comm = $usmb['comm'];
        $recip = $usmb['recip'];

        # Seleccionamos los datos del usuario
        $usrd = "SELECT * FROM users WHERE id='$comm' LIMIT 1";
        $res = mysqli_query($con, $usrd);
        $usr = mysqli_fetch_assoc($res);

        # Seleccionamos los datos del usuario
        $usrs = "SELECT * FROM users WHERE id='$recip' LIMIT 1";
        $red = mysqli_query($con, $usrs);
        $uss = mysqli_fetch_assoc($red);

        # Mensajes
      ?>
        <div class="card bg-dark text-white border-light" style="margin-bottom: 5px;">
          <div class="d-flex" style="height: 50px;">
            <a href="../profile/<?php echo $usr['user'] ?>">
              <img class="card-img mb-img" src="<?php echo $usr['picture'] ?>" alt="Card image">
            </a>
            <div class="card-img-left mb-prev">
              <a href="../profile/<?php echo $usr['user'] ?>">
                <label class="mb-usr-lbl"><i class="fas fa-user"></i>
                  <?php
                  if ($usrnm == $usr['user']) {
                    echo 'MOI <i class="fas fa-angle-double-right"></i>
                  <a href="../profile/' . $uss['user'] . '" class="mb-sento">';
                    echo $uss['user'];
                    echo '</a>';
                  } else {
                    echo $usr['user'];
                  }
                  ?>
                </label>
              </a>
              <label class="mb-seen-lbl">
                <?php if ($usmb['seen'] == 0) : ?>
                  Non lu<i class="fas fa-envelope" style="margin-left: 5px;"></i>
                <?php else : ?>
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  Lu<i class="fas fa-envelope-open" style="margin-left: 5px;"></i>
                <?php endif; ?>
              </label>
              <br>
              <a href="../mailbox/<?php echo $usmb['id'] ?>">
                <button id="read-btn" name="open_mb" class="mb-read-btn"><i class="fas fa-info-circle" style="margin-right: 5px;"></i><?php echo $usmb['subject'] ?></button>
              </a>
              <label class="mb-sent-dte"><?php echo $usmb['date'] ?><i class="fas fa-calendar-alt" style="margin-left: 5px;"></i></label>
            </div>
          </div>
        </div>
      <?php
      }
      ?>

    </div>


    <!-- Formulario para enviar mensajes -->
    <div class="modal fade" id="send_mb" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content bg-dark border-light text-light">
          <div class="modal-header border-bottom-0">

            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span class="text-light" aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST" class="form-group" style="margin: 0px;">
              <label for="user-s">Destinataire:</label>
              <input type="text" class="form-control border-dark" maxlength="30" name="user-s" placeholder="Ex: Stephane52" id="user-s">
              <br>
              <label for="subject-s">Objet:</label>
              <input type="text" class="form-control border-dark" maxlength="120" name="subject-s" placeholder="Ex: Une anecdote personnelle..." id="subject-s">
              <br>
              <label for="message-s">Message:</label>
              <textarea class="form-control border-dark mb-snd-txt" maxlength="500" name="message-s" placeholder="Maximum 500 caractéres" id="message-s"></textarea>
          </div>
          <div class="modal-footer border-top-0">
            <input type="submit" class="btn btn-dark border-light" value="Envoyer" name="snd-mb" style="width: 100%;">
            </form>
          </div>
        </div>
      </div>
    </div>


    <?php

    $emid2 = $_GET['id'] ?? '';
    $emid2 = mysqli_real_escape_string($con, $emid2);

    if (isset($emid2)) : ?>
      <script type="text/javascript">
        $('#read_mb').modal(options);
        $('#read_mb').modal('toggle');
        $('#read_mb').modal('show');
      </script>
      <?php


      # Seleccionamos los emails del usuario
      $usmb2 = "SELECT * FROM mailbox WHERE id='$emid2' AND (recip='$usrid' OR comm='$usrid') ORDER BY id LIMIT 1";
      $mbres2 = mysqli_query($con, $usmb2);
      while ($usmb2 = mysqli_fetch_assoc($mbres2)) {

        $comm2 = $usmb2['comm'];
        $recip2 = $usmb2['recip'];

        # Seleccionamos los datos del usuario
        $usrd2 = "SELECT * FROM users WHERE id='$comm2' LIMIT 1";
        $res2 = mysqli_query($con, $usrd2);
        $usr2 = mysqli_fetch_assoc($res2);

        # Seleccionamos los datos del usuario
        $usrs2 = "SELECT * FROM users WHERE id='$recip2' LIMIT 1";
        $red2 = mysqli_query($con, $usrs2);
        $uss2 = mysqli_fetch_assoc($red2);

        # Marcamos el mensaje como leido
        $mbrsql = "UPDATE mailbox SET seen='1' WHERE id='$emid2' AND recip='$usrid'";
        mysqli_query($con, $mbrsql);

        # Dialogo que muestra el mensaje
      ?>
        <div class="modal hide fade" id="read_mb">
          <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content bg-dark border-light text-light">
              <div class="modal-header border-bottom-0">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span class="text-light" aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">

                <div class="card bg-dark text-white border-secondary" style="margin-bottom: 5px;">
                  <div class="d-flex" style="height: 50px;">
                    <a href="../profile/<?php echo $usr2['user'] ?>">
                      <img class="card-img mb-img" src="<?php echo $usr2['picture']  ?>" alt="Card image">
                    </a>
                    <div class="card-img-left mb-prev">
                      <a href="../profile/<?php echo $usr2['user']  ?>">
                        <label class="mb-usr-lbl"><i class="fas fa-user" style="margin-right: 5px;"></i>
                          <?php
                          if ($usrnm == $usr2['user']) {
                            echo 'MOI <i class="fas fa-angle-double-right"></i>
                          <a href="../profile/' . $uss2['user'] . '" class="mb-sento">';
                            echo $uss2['user'];
                            echo '</a>';
                          } else {
                            echo $usr2['user'];
                          }
                          ?>
                        </label>
                      </a>
                      <label class="mb-seen-lbl">
                        <?php if ($usmb2['seen'] == 0) : ?>
                          Non lu<i class="fas fa-envelope" style="margin-left: 5px;"></i>
                        <?php else : ?>
                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          Lu<i class="fas fa-envelope-open" style="margin-left: 5px;"></i>
                        <?php endif; ?>
                      </label>
                      <br>
                      <label class="mb-read-btn"><i class="fas fa-info-circle" style="margin-right: 5px;"></i><?php echo $usmb2['subject'] ?></label>
                      <label class="mb-sent-dte"><?php echo $usmb2['date'] ?><i class="fas fa-calendar-alt" style="margin-left: 5px;"></i></label>
                    </div>
                  </div>
                </div>
                <div class="card bg-dark text-white">
                  <textarea class="form-control bg-transparent text-white border-secondary mb-read-txt" readonly><?php echo $usmb2['content'] ?></textarea>
                </div>
              </div>
              <div class="modal-footer border-top-0">
                <button type="button" class="btn btn-dark border-light" data-dismiss="modal">Fermer</button>
              </div>
            </div>
          </div>
        </div>
    <?php
      }
    endif;
    ?>

</section>

<?php
include('tpl/right-def.php');
include('tpl/footer.php');
?>