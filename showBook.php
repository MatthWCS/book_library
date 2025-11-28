<?php

require_once "./repository/bookRepository.php";

$book = showBookById();

$templateName = "showBook.phtml";

include_once "./templates/layout.phtml";

?>