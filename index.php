<?php
require './core/functions.php';

//session_start();
// Afficher erreurs
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

includes('head');
includes('nav');

contents();

includes('footer');