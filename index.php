<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/style/app.css">
    <title>Library</title>
</head>
<body class="grid">
    
<?php

include_once './layout/header.php';

if(array_key_exists('page', $_GET))
{
    switch($_GET['page'])
    {
        case 'home' :
        case 'about' :
        case 'contact' :
        case 'book' :
        case 'newBook' :
        case 'editBook' :
        case 'deleteBook' :
        case 'author' :
            $page = $_GET['page'];
            break;
        default:
            $page = 'notFound';
    }
}
else
{
    header('location: index.php?page=home');
    exit();
}

include_once './pages/' . $page . '.php';

include_once './layout/footer.php';

?>