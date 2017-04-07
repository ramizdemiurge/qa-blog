<?php

class ArticleService
{
    function ArticleService()
    {
        require "application/models/DB_connect.php";
    }

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
        $DB_connect = new DB_connect();
        $MySQLi = $DB_connect->getMysqli();
        $result = $MySQLi->query("SELECT * FROM articles WHERE id=\"" . $id . "\"") or die("Ошибка getById");
        $row = $result->fetch_array(MYSQLI_ASSOC);
        $MySQLi->close();

        $Article = new Article();
        if ($result) {
            $Article->setId($row['id']);
            $Article->setTitle($row['title']);
            $Article->setAuthor($row['author']);
            $Article->setDate($row['date']);
            $Article->setText($row['text']);
            $Article->setQuestion($row['lead_text']);
        }
        return $Article;
    }

    function editArticle($Article)
    {
        //$Article = new Article();
        return $Article;
    }

    function getAll($first, $users_on_page)
    {
        $DB_connect = new DB_connect();
        $mysqli = $DB_connect->getMysqli();
        $result = $mysqli->query("select * from articles limit $first, $users_on_page");
        $mysqli->close();
        return $result;
    }

    function getCount()
    {
        $DB_connect = new DB_connect();
        $mysqli = $DB_connect->getMysqli();
        $result = $mysqli->query("select count(id) from articles") or die("Ошибка getCount");
        $count = $result->fetch_array(MYSQLI_BOTH);
        $mysqli->close();
        return $count;
    }
}