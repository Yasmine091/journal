<?php
require('core/config.php');
require('core/func.php');

/*

# Si se ha iniciado sesión
if(isset($logged) && $logged === true) {
    header('Refresh: 0; URL=/');
    exit();
}

O

# Si no se ha iniciado sesión
if ($logged == '') {
  header('Refresh: 0; URL=/');
  exit();
}
*/

include('tpl/header.php');
?>

<section id="sec-def">
    <div class="card bg-dark text-white border-light mb-3">
        <div id="box-title" class="card-header text-<?php echo $wbcnf['text-var'] ?>">Messagerie</div>
        <div class="card-body">
            <img src="img.gif" class="card-img" style="margin-bottom: 20px;">
            <hr>
            <h5 class="card-title">title</h5>
            <p class="card-text">text</p>
            <hr>
        </div>

</section>
<?php
include('tpl/right-def.php');
include('tpl/footer.php');
?>