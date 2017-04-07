<?php
//require_once "application/configs/database.php";

require "application/models/entity/Article.php";
require "application/services/ArticleService.php";


$ArticleService = new ArticleService();

$Article = $ArticleService->getById($_GET['blog']);

if ($Article->getId() > 0) {
    define("HEADER", htmlspecialchars($Article->getTitle()));
    define("SUBHEADER", htmlspecialchars($Article->getQuestion()));
    //define("ID", $Article->getId());
    define("TITLE", htmlspecialchars($Article->getTitle()));
    define("QUESTION", htmlspecialchars($Article->getQuestion()));
    define("TEXT", $Article->getText());
    define("AUTHOR", htmlspecialchars($Article->getAuthor()));
    define("DATE", htmlspecialchars($Article->getDate()));

    include "application/views/article_header.tpl";
    include "application/views/question.tpl";
    include "application/views/footer.tpl";
} else {
    include "application/views/error_404.tpl";
}



