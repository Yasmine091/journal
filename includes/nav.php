<?php
require './core/config.php';
if (isset($logged) && $logged === true) {
?>
<nav class="navbar fixed-bottom navbar-expand-lg navbar-dark bg-secondary rounded-top col-sm-12 col-md-6 col-lg-4 d-block mx-auto p-0">
        <ul class="navbar navbar-nav mx-auto d-block text-center p-1">
            <li class="nav-item">
            <button type="button" class="btn btn-dark">
                <a class="nav-link text-danger" href="/list"><i class="fas fa-calendar-alt"></i></a>
            </button>
            </li>
            <li class="nav-item">
            <button type="button" class="btn btn-dark">
                <a class="nav-link text-info" href="/new"><i class="fas fa-calendar-plus"></i></a>
            </button>
            </li>
            <?php
            if (isset($_POST['logout'])) {
                session_destroy();
                header('Refresh: 0; URL=/');
                exit();
            }
            ?>
            <form class="form-inline" method="POST">
                <li class="nav-item">
                <button type="submit" name="logout" class="btn btn-dark">
                    <a class="nav-link text-success" "><i class="fas fa-sign-out-alt"></i></a>
                </button>
                </li>
            </form>
        </ul>
    </nav>
<?php 
}
?>