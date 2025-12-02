<?php

require_once "./repository/userRepository.php";

require_once "./utils/functions.php";

try {

    // Si au moins un des champs n'est pas bien rempli
    if( 
        !isInputFulField( $_POST['username'] ) ||
        !isInputFulField( $_POST['password'] )
    )
    {
        // On creer une nouvelle exception et son message
        throw new Exception("All fields are required.");
    }

    // on stock, dans $dbUser, l'utilisateur retrouve en DB
    // d'apres son username
    $dbUser = findUserByUsername( $_POST['username'] );

    // Si aucun utilisateur n'a ete trouve sous ce username
    // ou si le mot de passe ne correspond pas
    if( !$dbUser || !password_verify( $_POST['password'], $dbUser['password']) )
    {
        throw new Exception("Bad credentials.");
    }

    // demarrer l'acces au systeme de session
    startSessionIfItsNot();
    // authentifier l'utilisateur
    $_SESSION['user'] = $dbUser;

    redirectTo("account.php");
}
catch( Exception $e )
{
    $errorMessage = $e->getMessage();
}