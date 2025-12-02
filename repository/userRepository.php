<?php

require_once "./repository/database.php";

function createUser(
    string $username,
    string $email,
    string $clearPassword,
    ?string $avatarFileName = null,
    ?bool $isAdmin = false
) : void
{
    $sql = "INSERT INTO user (username, email, password, avatar)
    VALUES (:username, :email, :password, :avatar)";

    $query = getDB()->prepare($sql);

    $query->execute([
        ":username" => $username,
        ":email" => $email,
        ":password" => password_hash($clearPassword, PASSWORD_BCRYPT),
        ":avatar" => $avatarFileName
    ]);
}

function findUserByUsername(string $username) : array
{
    $sql = "SELECT * FROM user WHERE username = :username";

    $query = getDB()->prepare($sql);

    $query->execute([
        "username" => $username
    ]);

    return $query->fetch();
}