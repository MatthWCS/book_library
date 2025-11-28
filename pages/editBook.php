<?php

    if( $_SERVER['REQUEST_METHOD'] === 'GET' )
    {
        $pdo = new PDO(
            'mysql:dbname=library;host=127.0.0.1;port=3307;charset=utf8;',
            'root', 
            'root_password'
        );

        $sql = "SELECT * FROM book WHERE id = :bookid";

        $query = $pdo->prepare($sql);

        $query->execute([
            ':bookid' => $_GET['id']
        ]);

        $book = $query->fetch();
    }

    if($_SERVER['REQUEST_METHOD'] === 'POST')
    {
        if(
            isset($_POST['serie_name']) && !empty($_POST['serie_name']) &&
            isset($_POST['tome_number']) && !empty($_POST['tome_number']) &&
            isset($_POST['title']) && !empty($_POST['title']) &&
            isset($_POST['description']) && !empty($_POST['description']) &&
            isset($_POST['author']) && !empty($_POST['author']) &&
            isset($_POST['publish_at']) && !empty($_POST['publish_at']) &&
            isset($_POST['cover']) && !empty($_POST['cover']) &&
            isset($_POST['edition']) && !empty($_POST['edition'])
        )
        {
            $pdo = new PDO(
            'mysql:dbname=library;host=127.0.0.1;port=3307;charset=utf8;',
            'root', 
            'root_password'
            );

            $sql = "UPDATE book SET title = :title, description = :description, author = :author,
             publish_at = :publish_at, serie_name = :serie_name, cover = :cover, edition = :edition
             WHERE id = :bookid";

            $query = $pdo->prepare($sql);

            $query->execute([
                ":serie_name" => $_POST['serie_name'],
                ":tome_number" => $_POST['tome_number'],
                ":title" => $_POST['title'],
                ":description" => $_POST['description'],
                ":author" => $_POST['author'],
                ":publish_at" => $_POST['publish_at'],
                ":cover" => $_POST['cover'],
                ":edition" => $_POST['edition']
            ]);

            // Rediriger vers la liste des livres
            header("Location: index.php?page=home");
            exit();
        }
    }
?>

<main>
    <h2>Edit Book</h2>

    <form action="" method="POST" >

        <p>
            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="<?= $book['title'] ?>"/>
        </p>
        
        <p>
            <label for="tome_number">Tome number</label>
            <input type="text" name="tome_number" id="tome_number">
        </p>

        <p>
            <label for="description">Description</label>
            <textarea name="description" id="description"><?= $book['description'] ?></textarea>
        </p>

        <p>
            <label for="author">Author</label>
            <input type="text" name="author" id="author" value="<?= $book['author'] ?>"/>
        </p>

        <p>
            <label for="publish_at">Publish at</label>
            <input type="text" name="publish_at" id="publish_at" value="<?= $book['publish_at'] ?>"/>
        </p>

        <p>
            <label for="serie_name">Serie name</label>
            <input type="text" name="serie_name" id="serie_name" value="<?= $book['serie_name'] ?>"/>
        </p>

        <p>
            <label for="cover">Cover</label>
            <input type="text" name="cover" id="cover" value="<?= $book['cover'] ?>"/>
        </p>

        <p>
            <label for="edition">Edition</label>
            <input type="text" name="edition" id="edition" value="<?= $book['edition'] ?>"/>
        </p>
        
        <input type="hidden" name="id" value="<?= $book['id'] ?>">

        <button type="submit">Update</button>
    </form>
</main>