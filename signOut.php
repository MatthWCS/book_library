<?php

require_once "./utils/functions.php";

// On demarre le systeme de session s'il ne l'est pas deja
startSessionIfItsNot();
// On detruit la session
session_destroy();
// on redirige vers la page de connexion
redirectTo("home.php");

?>