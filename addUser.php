<?php

require_once "./utils/functions.php";

require_once "./repository/userRepository.php";

try {
    if (
        !isInputFulField($_POST['username']) ||
        !isInputFulField($_POST['email']) ||
        !isInputFulField($_POST['password'])
    )
    {
        throw new Exception("All fields are requiered !!!");
    }

    $emailRegex = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-z]{2,4}$/';

    if (!preg_match($emailRegex, $_POST['email']))
    {
        throw new Exception("Please, enter a valid email address.");
    }

    if (
        isInputFulField($_FILES['avatar']) && $_FILES['avatar']['error'] === 0
    )
    {
        $uploadedFile = $_FILES['avatar'];

        $fileName = $uploadedFile['name'];
        $tmpFile = $uploadedFile['tmp_name'];

        $explodedFilename = explode(".", $fileName);

        $baseFileName = $explodedFilename[0];
        $fileExtension = $explodedFilename[1];

        $destination = "./uploads/";

        $destination .= md5($baseFileName);
        $destination .= '.' . $fileExtension;

        move_uploaded_file($tmpFile, $destination);
    }
        var_dump($_FILES);
    // Enregistrer un User en BDD
        var_dump($_POST);
    createUser(
        $_POST['username'],
        $_POST['email'],
        $_POST['password'],
        $destination
    );

    // Redirection après creation du User
    redirectTo("index.php");

}
catch(Exception $e)
{
    $errorMessage = $e->getMessage();
}