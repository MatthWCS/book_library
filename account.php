<?php

require_once "./utils/functions.php";
// ( on restreint l'acces a la page a l'utilisateur authentifie  ) :

// si l'utilisateur n'est pas authentifie
if( !isUserAuthenticated() )
{
    // on le redirige
    redirectTo('signIn.php');
}

// On recupere l'utilisateur authentifie
$authUser = getAuthUser();

// on affiche la page
$templateName = "account.phtml";

include_once "./templates/layout.phtml";

?>