<?php

class ArticleService extends Article
{
    function addArticle($Article)
    {
        //$Article = new Article();
        return $Article;
    }

    function delete($Article)
    {
        //$Article
    }

    function getById($id)
    {
        require "application/configs/database.php";
        $query = "SELECT * FROM articles WHERE id=\"" . $id . "\"";
        $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $Article = new Article();
        if ($result) {
            $Article->setId($row['id']);
            $Article->setTitle($row['title']);
            $Article->setAuthor($row['author']);
            $Article->setDate($row['date']);
            $Article->setText($row['text']);
            $Article->setQuestion($row['lead_text']);
        }
        mysqli_close($link);
        return $Article;
    }

    function editArticle($Article)
    {
        //$Article = new Article();
        return $Article;
    }

    function getAll($first, $users_on_page)
    {
        require "application/configs/database.php";
        $result = mysqli_query($link, "select * from articles limit $first, $users_on_page") or die("Ошибка " . mysqli_error($link));
        mysqli_close($link);
        return $result;
    }

    function getCount()
    {
        require "application/configs/database.php";
        $result = mysqli_query($link, "select count(id) from articles") or die("Ошибка " . mysqli_error($link));
        $count = mysqli_fetch_array($result, MYSQLI_BOTH);
        mysqli_close($link);
        return $count;
    }
}