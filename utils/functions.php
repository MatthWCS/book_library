<?php

// Fonction de redirection
function redirectTo($destination) : void
{
    // on redirige vers la page de destination (un fichier php)
    header("Location:" . $destination);
    // on demande au script de s'arreter pour ce fichier
    exit();
}

// Fonction pour verifier le champs du formulaire 
function isInputFulField($inputData) : bool
{
    /* retourne un booleen qui indique si une donnee
    est definie et non vide */
    return isset($inputData) || !empty($inputData);
}

function startSessionIfItsNot() : void
 {
   // si $_SESSION est indefinie
    if( !isset($_SESSION) )
    {
      // on demarre le systeme de session
        session_start();
    }
 }

function isUserAuthenticated() : bool
 {
   // On demarre le systeme de session si il ne l'est pas
    startSessionIfItsNot();
   // on retourne true/false
   // (si $_SESSION contient un utilisateur, true, sinon false)
    return isset($_SESSION['user']) && !empty($_SESSION['user']);
 }

function getAuthUser() : array|null
{
    // si l'utilisateur est authentifie
    if( isUserAuthenticated() )
    {
        // on retourne ses informations (stockees en session)
        return $_SESSION['user'];
    }
    // sinon on retourne null
    return null;
}