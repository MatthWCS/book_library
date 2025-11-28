<?php

require_once "./repository/bookRepository.php";

$book = showBookById();

$templateName = "editBook.phtml";

include_once "./templates/layout.phtml";

?>