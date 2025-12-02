<?php

require_once "./repository/database.php";

function createBook(
    string $title,
    int $tomeNumber,
    string $description,
    string $author,
    string $publishAt,
    string $serieName,
    ?string $cover = null,
    string $edition
    ) : void
{
    $sql ="INSERT INTO book (title, tome_number, description, author, publish_at, serie_name, cover, edition) VALUES ( :title, :tome_number, :description, :author, :publish_at, :serie_name, :cover, :edition)";
        
    $query = getDB()->prepare($sql);

    $query->execute
    ([
        ":serie_name" => $serieName,
        ":tome_number" => $tomeNumber,
        ":title" => $title,
        ":description" => $description,
        ":author" => $author,
        ":publish_at" => $publishAt,
        ":cover" => $cover,
        ":edition" => $edition
    ]);
}

function showBooks() : array
{
    $sql = "SELECT * FROM book ORDER BY serie_name";

    $query = getDB()->prepare($sql);

    $query->execute();

    return $query->fetchAll();
}

function showBookById() : array
{
    $sql = "SELECT * FROM book WHERE id = :bookid";

    $query = getDB()->prepare($sql);

    $query->execute([
        ":bookid" => $_GET['id']
    ]);

    return $query->fetch();
}

function deleteBookById() : void
{
    $sql = "DELETE FROM book WHERE id = :bookid";

    $query = getDB()->prepare($sql);

    $query->execute([
    ":bookid" => $_GET['id']
    ]);
}

function editBookById(
    string $title,
    int $tomeNumber,
    string $description,
    string $author,
    string $publishAt,
    string $serieName,
    ?string $cover = null,
    string $edition
    ) : void
{
    $sql ="UPDATE book SET title =:title, tome_number = :tome_number,
     description = :description, author = :author, publish_at = :publish_at,
     serie_name = :serie_name, cover = :cover, edition = :edition WHERE id = :bookid";

     $query = getDB()->prepare($sql);

     $query->execute([
         ":title" => $title,
         ":tome_number" => $tomeNumber,
         ":description" => $description,
         ":author" => $author,
         ":publish_at" => $publishAt,
        ":serie_name" => $serieName,
        ":cover" => $cover,
        ":edition" => $edition,
        ":bookid" => $_GET['id']
     ]);
}

function showBooksByAuthorId()
{
    
}

function showBooksByEdition()
{

}