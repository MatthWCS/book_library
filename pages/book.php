<?php
    $pdo = new PDO(
        'mysql:host=127.0.0.1;dbname=library;port=3307;charset=utf8',
        'root',
        'root_password'
    );

    $sql = "SELECT * FROM book WHERE id = :bookid";

    $query = $pdo->prepare($sql);

    $query->execute( [ ":bookid" => $_GET['id'] ]);

    $book = $query->fetch();

?>

<main>
    <section class="block-book" >
        <h2 class="book-title" >Tome <?= $book['tome_number'] ?> : <?= $book['title'] ?></h2>
        <article class="cover-description" >
            <img class="clearfix" src="<?= $book['cover'] ?>" alt="Cover of book">
            <p class="book-description">
                <?= $book['description'] ?>
            </p>
        </article>
        <article class="info-content">
            <p class="infos">
                <span>Serie : <a href=""> <?= $book['serie_name'] ?> </a></span>
                <span>Author : <a href=""><?= $book['author'] ?> </a></span>
                <span>Publish at : <?= $book['publish_at'] ?></span>
                <span>Edition : <a href=""><?= $book['edition'] ?> </a></span>
            </p>
            <div class="button-content">
                <a class="button" href="index.php?page=editBook&id=<?= $book['id'] ?>">EDIT</a>
                <a class="button" href="./pages/deleteBook.php?id=<?= $book['id'] ?>">DELETE</a>
            </div>
        </article>
    </section>

</main>