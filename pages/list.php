<?php
require './core/config.php';

/*
$ttcn = "SELECT count(*) FROM news ORDER BY id DESC LIMIT 10";
$tcres = mysqli_query($con, $ttcn);
$tcnws = mysqli_fetch_array($tcres);
$totalcount = $tcnws['count(*)'];
*/

$nsql = "SELECT *, users.id as uid FROM records
        LEFT JOIN users on news.autor = users.id
        ORDER BY news.id DESC LIMIT 10";
$nres = mysqli_query($con, $nsql);
while ($nws = mysqli_fetch_assoc($nres)) {

?>

    <article>
        <div class="card bg-dark text-white border-none">
            <div class="d-flex">
                <img class="card-img" src="<?php echo $nws['img'] ?>" alt="Card image">
                <div class="card-img-left">
                    <h5 class="card-title mb-2"><?php echo $nws['title'] ?></h5>
                    <p class="card-text d-flex mb-2 mt-2">
                        <span class="text-justify m-0"><?php echo $nws['content'] ?></span>
                        <span class="m-0">..</span>
                    </p>
                    <hr class="mb-2 mt-2">

                    <div class="d-flex flex-row text-secondary m-0 0rem">

                        <p class="m-0 mt-2 w-75">
                            <i class="fas fa-certificate"></i>
                            <?php echo $nws['category'] ?>

                            <a href="profile/<?php echo $nws['user'] ?>">
                                <i class="fas fa-user"></i>
                                <?php echo $nws['user'] ?></a>

                            <i class="fas fa-calendar-alt"></i>
                            <?php echo $nws['date'] ?>
                        </p>

                        <p class="m-0 mt-2 w-25">
                            <a href="article/<?php echo $nws['id'] ?>" class="ml-3">
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