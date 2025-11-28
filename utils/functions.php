<?php

// Fonction de redirection
function redirectTo($destination) : void
{
    header("Location:" . $destination);
    exit();
}

// Fonction pour verifier le champs du formulaire 
function isInputFulField($inputData)
{
    return isset($inputData) || !empty($inputData);
}
