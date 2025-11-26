<?php
    $pdo = new PDO (
        'mysql:host=127.0.0.1;dbname=library;port=3307;charset=utf8',
        'root',
        'root_password'
    );

    $sql = "SELECT * FROM book ORDER BY serie_name";

    $query = $pdo->prepare($sql);

    $query->execute();

    $books = $query->fetchAll();
?>

<main>
    <h2>Home</h2>
    <section>
        <h3>Books</h3>
        <ul>
            <?php foreach($books as $book) : ?>
                <li>
                    <a class="book-title" href="index.php?page=book&id=<?= $book['id'] ?>">
                        <?= $book['title'] ?>
                    </a>
                </li>
            <?php endforeach ?>
        </ul>
    </section>
</main>




