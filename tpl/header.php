<!DOCTYPE HTML>
<html>

<head>
  <script src="https://kit.fontawesome.com/a266ecec7b.js" crossorigin="anonymous"></script>
  <title><?php echo $wbcnf['title'] ?> · Me entreno</title>
  <meta name="description" content="Descripción de la WEB">
  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="../css/global.php">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>

<header id="header-bg">
  <span style="font-size: 40px; background-color: <?php echo $wbcnf['lay-color'] ?>;" class="badge badge-pill text-<?php echo $wbcnf['text-var'] ?>">
    <?php echo $wbcnf['title'] ?>
  </span>
</header>

<body>
  <nav id="navbar" class="navbar navbar-expand-lg navbar-<?php echo $wbcnf['nav-var'] ?> text-center">
    <a class="navbar-brand" href="#"><?php echo $wbcnf['title'] ?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto ml-auto mx-auto">
        <li class="nav-item">
          <a class="nav-link" href="/"><i class="fas fa-newspaper" style="line-height: 0px !important;"></i>&nbsp;&nbsp;ACCUEIL</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/team"><i class="fas fa-user-tie" style="line-height: 0px !important;"></i>&nbsp;&nbsp;ÉQUIPE</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/about"><i class="fas fa-book-reader" style="line-height: 0px !important;"></i>&nbsp;&nbsp;À PROPOS</a>
        </li>
        <!--   <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          ZONE UTILISATEURS
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="register"><i class="fas fa-user-plus" style="line-height: 0px !important;"></i> INSCRIPTION</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="cpanel"><i class="fas fa-key" style="line-height: 0px !important;"></i> CPANEL</a>
        </div>
      </li> -->
        <!-- <li class="nav-item"> 
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
      </li> -->
      </ul>
      <!-- <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Rechercher" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Rechercher</button>
    </form> -->
      <?
      if(isset($_POST['logout'])){
      session_destroy();
      header('Refresh: 0; URL=/');
      exit();
      }
?>
      <form class="form-inline my-2 my-lg-0" method="POST">
        <?php
        
        $mbsql = "SELECT count(*) AS total FROM mailbox WHERE seen=0 AND recip='$usrid'";
        $mbcon = mysqli_query($con, $mbsql);
        $mbres = mysqli_fetch_assoc($mbcon);

        if (isset($logged) && $logged === true) : ?>
          <div>
            <div class="nav-item dropdown">
              <a class="nav-link dropdown-toggle text-<?php echo $wbcnf['text-var'] ?>" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="text-transform: uppercase;">
                <i class="fas fa-key"></i>&nbsp;&nbsp;MON COMPTE
                &nbsp;&nbsp;&nbsp;&nbsp;<span class="badge badge-primary"><?php echo $mbres['total'];?></span>
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="/profile/<?php echo $usrnm ?>">PROFIL</a>
                <a class="dropdown-item" href="/mailbox">MESSAGERIE
                  &nbsp;&nbsp;&nbsp;&nbsp;<span class="badge badge-danger"><?php echo $mbres['total'];?></span></a>
                <a class="dropdown-item" href="/settings">PARAMÈTRES</a>
                <div class="dropdown-divider"></div>
                <button class="dropdown-item" type="submit" name="logout">DECONNEXION</button>
              </div>
            <?php else : ?>
              <div>
                <div class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle text-<?php echo $wbcnf['text-var'] ?>" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-key"></i>&nbsp;&nbsp;UTILISATEURS
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="/login">CONNEXION</a>
                    <a class="dropdown-item" href="/register">INSCRIPTION</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="/cpanel">CPANEL</a>
                  </div>
                </div>
              </div>
            <?php
          endif; ?>
      </form>
      <!--<ul style="list-style: none; text-decoration: none;"><li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-user-cog"></i>&nbsp;&nbsp;PROFILE
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/register"><i class="fas fa-user-plus" style="line-height: 0px !important;"></i> INSCRIPTION</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="/login"><i class="fas fa-user-lock" style="line-height: 0px !important;"></i>&nbsp;&nbsp;CONNEXION</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="/cpanel"><i class="fas fa-key" style="line-height: 0px !important;"></i> CPANEL</a>
        </div>
      </li></ul>-->
    </div>
  </nav>

  <!-- <nav id="navbar">
	<ul id="menu">
      <li><a href="/"><i class="fas fa-newspaper" style="line-height: 0px !important;"></i>&nbsp;&nbsp;&nbsp;&nbsp;ACCUEIL</a></li>
      <li><a href="register"><i class="fas fa-user-plus" style="line-height: 0px !important;"></i>&nbsp;&nbsp;&nbsp;&nbsp;INSCRIPTION</a></li>
      <li><a href="cpanel"><i class="fas fa-key" style="line-height: 0px !important;"></i>&nbsp;&nbsp;&nbsp;&nbsp;CPANEL</a></li>
    </ul>
</nav> -->

  <div id="body">