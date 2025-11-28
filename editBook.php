<?php

require_once "./repository/bookRepository.php";
require_once "./utils/functions.php";

if(
        $_SERVER['REQUEST_METHOD'] === 'POST'
    )
    try
    {
    if(
        !isInputFulField($_POST['title']) ||
        !isInputFulField($_POST['tome_number']) ||
        !isInputFulField($_POST['description']) ||
        !isInputFulField($_POST['author']) ||
        !isInputFulField($_POST['publish_at']) ||
        !isInputFulField($_POST['serie_name']) ||
        !isInputFulField($_POST['cover']) ||
        !isInputFulField($_POST['edition'])
    )
    {
        throw new Exception("All fields are required !!!");
    }
    // Edit un livre

    editBookById(
        $_POST['title'],
        $_POST['tome_number'],
        $_POST['description'],
        $_POST['author'],
        $_POST['publish_at'],
        $_POST['serie_name'],
        $_POST['cover'],
        $_POST['edition']
    );

    // Redirection vers la liste des livres
                
    redirectTo("index.php");

    }
    catch (Exception $e)
    {
    $errorMessage = $e->getMessage();
}