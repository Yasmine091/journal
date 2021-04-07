<?php
require('core/config.php');
require('core/func.php');
include('tpl/header.php');
?>
<section id="sec-def">

        <?php
        /*
$ttcn = "SELECT count(*) FROM news ORDER BY id DESC LIMIT 10";
$tcres = mysqli_query($con, $ttcn);
$tcnws = mysqli_fetch_array($tcres);
$totalcount = $tcnws['count(*)'];
*/

        $nsql = "SELECT * FROM news ORDER BY id DESC LIMIT 10";
        $nres = mysqli_query($con, $nsql);
        while ($nws = mysqli_fetch_assoc($nres)) {

                $anid = $nws['autor'];

                $usql = "SELECT * FROM users WHERE id ='$anid' LIMIT 1";
                $ures = mysqli_query($con, $usql);
                $aws = mysqli_fetch_assoc($ures);
        
        ?>

        <article>
        <div class="card bg-dark text-white border-none custom-shadow-1">
        <div class="d-flex">
        <img class="card-img nwpr-img" src="<?php echo $nws['img']?>" alt="Card image">
        <div class="card-img-left" style="margin: 15px;">
        <h5 class="card-title mb-2"><?php echo $nws['title'] ?></h5>
        <p class="card-text d-flex mb-2 mt-2">
                <span class="text-justify nwpr-content m-0"><?php echo $nws['content']?></span>
                <span class="m-0" style="margin-top: 24px !important;">..</span>
        </p>
        <hr class="mb-2 mt-2">

        <div class="d-flex flex-row text-secondary m-0 0rem" style="font-size: smaller; font-weight: bolder;">

        <p class="m-0 mt-2 w-75">
        <i class="fas fa-certificate" style="margin-right: 5px;"></i>
        <?php echo $nws['category'] ?>

        <a href="profile/<?php echo $aws['user']?>">
        <i class="fas fa-user" style="margin-left: 10px; margin-right: 5px;"></i>
        <?php echo $aws['user'] ?></a>

        <i class="fas fa-calendar-alt" style="margin-left: 10px; margin-right: 5px;"></i>
        <?php echo $nws['date'] ?>
        </p>
        
        <p class="m-0 mt-2 w-25">
        <a href="article/<?php echo $nws['id']?>" class="otl-bt ml-3">
        <button class="btn btn-outline-light btn-sm float-right w-75">Voir plus</button>
        </a>
        </p>

        </div>

        </div>
        </div>
        </div><br>
        <?php
        }
        ?>

</section>
<?php
include('tpl/right-def.php');
include('tpl/footer.php');
?>