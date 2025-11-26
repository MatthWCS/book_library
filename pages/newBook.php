<?php

    if(
        $_SERVER['REQUEST_METHOD'] === 'POST'
    )
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
            // Ajouter un livre
            $pdo = new PDO(
                'mysql:host=127.0.0.1;dbname=library;port=3307;charset=utf8',
                'root',
                'root_password'
            );

            $sql ="INSERT INTO book (title, description, author, publish_at, serie_name, cover, edition) VALUES ( :title, :description, :author, :publish_at, :serie_name, :cover, :edition)";
        
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

            // Redirection vers la liste des livres
            header("Location: index.php?page=home");
            exit();
        }
        else
        {
            var_dump("Tous les champs sont obligatoires");
        }
    }

?>

<main>

    <h2>New Book</h2>

    <form action="" method="post">

        <p>
            <label for="title">Title</label>
            <input type="text" name="title" id="title">
        </p>
        
        <p>
            <label for="tome_number">Tome number</label>
            <input type="text" name="tome_number" id="tome_number">
        </p>

        <p>
            <label for="description">Description</label>
            <textarea name="description" id="description"></textarea>
        </p>

        <p>
            <label for="author">Author</label>
            <input type="text" name="author" id="author">
        </p>

        <p>
            <label for="publish_at">Publish at</label>
            <input type="year" name="publish_at" id="publish_at">
        </p>

        <p>
            <label for="serie_name">Serie name</label>
            <input type="text" name="serie_name" id="serie_name">
        </p>

        <p>
            <label for="cover">Cover</label>
            <input type="text" name="cover" id="cover">
        </p>

        <p>
            <label for="edition">Edition</label>
            <input type="text" name="edition" id="edition">
        </p>

        <button type="submit">Add Book</button>

    </form>

</main>