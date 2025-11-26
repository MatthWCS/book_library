<?php

// Supprimer le produit
$pdo = new PDO(
    'mysql:host=127.0.0.1;dbname=library;port=3307;charset=utf8',
    'root',
    'root_password'
);

$sql = "DELETE FROM book WHERE id = :bookid";

$query = $pdo->prepare($sql);

$query->execute([
    ":bookid" => $_GET['id']
]);

// Rediriger vers home
header("Location: ../index.php?page=home");
exit();