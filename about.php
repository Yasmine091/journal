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
    <div class="card bg-dark text-white border-none mb-3 shdw-crd-title">
        <div id="box-title" class="card-header text-<?php echo $wbcnf['text-var'] ?>">À propos</div>
        <div class="card-body custom-shadow-1">
            <i style="float: left; font-size: 100px; margin-right: 20px;" class="fas fa-address-card"></i>
            <h5 class="card-title">Lorem ipsum dolor sit amet</h5>
            <p class="card-text">Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            <hr>
            <i style="float: right; font-size: 100px; margin-left: 20px;" class="fas fa-book"></i>
            <h5 class="card-title">Sed ut perspiciatis unde omnis</h5>
            <p class="card-text">Iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam,
                eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
                Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur
                magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
            <hr>
        </div>

</section>
<?php
include('tpl/right-def.php');
include('tpl/footer.php');
?>