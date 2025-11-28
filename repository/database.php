<?php

function getDB() : PDO
{
    $host = 'localhost';
    $dbName = 'library';
    $sqlUser = 'root';
    $sqlPassword = 'root_password';

    $pdo = new PDO (
        "mysql:host=$host;dbname=$dbName;port=3307;charset=utf8",
        $sqlUser,
        $sqlPassword
    );

    return $pdo;
}