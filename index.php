<?php

    require_once "./repository/bookRepository.php";

    $books = showBooks();

    $templateName = "books.phtml";

    include_once "./templates/layout.phtml";

?>