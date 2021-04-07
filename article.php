<?php
require('core/config.php');
require('core/func.php');
include('tpl/header.php');
?>
<section id="sec-def">

  <?php

  $nid = $_GET['id'];
  $nid = mysqli_real_escape_string($con, $nid);

  /*
  $ttcn = "SELECT count(*) FROM news ORDER BY id DESC LIMIT 10";
  $tcres = mysqli_query($con, $ttcn);
  $tcnws = mysqli_fetch_array($tcres);
  $totalcount = $tcnws['count(*)'];
  */

  $nsql = "SELECT * FROM news WHERE id = '$nid'";
  $nres = mysqli_query($con, $nsql);
  while ($nws = mysqli_fetch_assoc($nres)) {

    $anid = $nws['autor'];

    $usql = "SELECT * FROM users WHERE id ='$anid'";
    $ures = mysqli_query($con, $usql);
    $aws = mysqli_fetch_assoc($ures);

  ?>
    <div class="card bg-dark text-white border-none custom-shadow-1 mb-3">
      <div class="card-body">

        <?php

        // Se etiquetan los elementos del formulario y se encripta la contraseña
        if (isset($_POST['snd-com'])) {

          $comment = mysqli_real_escape_string($con, $_POST['comment-s']);


          if (empty($_POST['comment-s'])) {
            alert_danger();
            echo 'Veuillez completer tous les champs';
            alert_end();
          } else {
            alert_success();
            echo 'Votre commentaire s\'est envoyé avec succès!';
            alert_end();

            $nwsql = "INSERT INTO comments (news, user, content, date) VALUES ('$nid', '$usrid', '$comment', CURDATE())";
            mysqli_query($con, $nwsql);
            aft_log();
          }
        }
        ?>

        <img src="<?php echo $nws['img'] ?>" class="card-img float-right nw-img">
        <h5 class="card-title text-justify mb-2"><?php echo $nws['title'] ?></h5>
        <hr>
        <p class="text-secondary mt-2" style="font-size: smaller; font-weight: bolder;">

        <i class="fas fa-certificate" style="margin-right: 5px;"></i>
          <?php echo $nws['category'] ?>

        <i class="fas fa-user" style="margin-left: 10px; margin-right: 5px;"></i>
          <?php echo $aws['user'] ?>

        <i class="fas fa-calendar-alt" style="margin-left: 10px; margin-right: 5px;"></i>
          <?php echo $nws['date'] ?>

        </p>
        
        <p class="card-text text-justify" style="white-space: break-spaces;"><?php echo $nws['content'] ?></p>
        <hr>

        <p class="d-flex flex-row m-0">
          
        <a href="../article/<?php echo $nid - 1 ?>" class="otl-bt p-2">
        <button class="btn btn-outline-light btn-sm"><i class="fas fa-chevron-left" style="margin-right: 8px; font-size: smaller;"></i>Article précedent</button></a>        

        <a href="/" class="otl-bt p-2">
        <button class="btn btn-outline-light btn-sm"><i class="fas fa-undo" style="margin-right: 8px; font-size: smaller;"></i>Retour à l'accueil</button></a>

        <a class="otl-bt p-2">
        <?php if ($logged == '') : ?>
          <button class="btn btn-outline-light btn-sm" disabled>Laisser un commentaire<i class="fas fa-comment-alt" style="margin-left: 8px; font-size: smaller;"></i></button>
        <?php else : ?>
          <button class="btn btn-outline-light btn-sm" data-toggle="modal" data-target="#comment">Laisser un commentaire<i class="fas fa-comment-alt" style="margin-left: 8px; font-size: smaller;"></i></button>
        <?php endif; ?>
        </a>

        <a href="../article/<?php echo $nid + 1 ?>" class="otl-bt p-2">
        <button class="btn btn-outline-light btn-sm">Article suivant<i class="fas fa-chevron-right" style="margin-left: 8px; font-size: smaller;"></i></button></a>

        </p>

      </div>
    </div>

    <?php

    # Seleccionamos los comentarios según la noticia
    $comsql = "SELECT * FROM comments WHERE news='$nid' ORDER BY id LIMIT 10";
    $comres = mysqli_query($con, $comsql);
    while ($nwcom = mysqli_fetch_assoc($comres)) {

      $usrcom = $nwcom['user'];

      # Seleccionamos los datos del usuario
      $usrd = "SELECT * FROM users WHERE id='$usrcom' LIMIT 1";
      $res = mysqli_query($con, $usrd);
      $usr = mysqli_fetch_assoc($res);

      # Dialogo que muestra el mensaje
    ?>
      <div class="card text-<?php echo $wbcnf['text-var'] ?> mb-3 bg-dark border-none shdw-crd-title" style="text-align: left;">
        <div class="card-body custom-shadow-1" style="padding: 15px 10px 10px 10px;">
          <div class="card bg-dark text-white border-secondary nwcomm-top">
            <div class="d-flex" style="height: 30px;">
              <a href="../profile/<?php echo $usr['user'] ?>">
                <img class="card-img nwcomm-img" src="<?php echo $usr['picture']  ?>" alt="Card image">
              </a>
              <div class="card-img-left nwcomm-info">
                <a href="../profile/<?php echo $usr['user']  ?>">
                  <label style="margin: 0px; font-size: 14px; font-weight: bold;"><i class="fas fa-user" style="margin-right: 5px;"></i>
                    <?php echo $usr['user'] ?>
                  </label>
                </a>
                <label class="nwcomm-date">
                  <?php echo $nwcom['date'] ?><i class="fas fa-calendar-alt" style="margin-left: 5px;"></i>
                </label>
              </div>
            </div>
          </div>
          <textarea class="form-control bg-transparent text-white border-secondary nwcomm-txtarea" readonly><?php echo $nwcom['content'] ?></textarea>
        </div>
      </div>
  <?php
    }
  }
  ?>

  <!-- Formulario para comentar -->
  <div class="modal fade" id="comment" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content bg-dark border-light text-light">
        <div class="modal-header border-bottom-0">

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span class="text-light" aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="POST" class="form-group" style="margin: 0px;">
            <label for="comment-s">Commentaire:</label>
            <textarea class="form-control border-dark" style="font-size: 14px; height: 100px; min-height: 100px;" maxlength="250" name="comment-s" placeholder="Maximum 250 caractéres" id="comment-s"></textarea>
        </div>
        <div class="modal-footer border-top-0">
          <input type="submit" class="btn btn-dark border-light" value="Envoyer" name="snd-com" style="width: 100%;">
          </form>
        </div>
      </div>
    </div>
  </div>

</section>
<?php
include('tpl/right-def.php');
include('tpl/footer.php');
?>