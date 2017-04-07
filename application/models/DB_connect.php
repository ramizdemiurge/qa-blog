<?php

/**
 * Created by IntelliJ IDEA.
 * User: allard
 * Date: 4/7/17
 * Time: 8:40 PM
 */
class DB_connect
{
    public function getMysqli()
    {
        include "application/configs/db.php";
        $mysqli = new mysqli(SERVER, USERNAME, PASSWORD, DATABASE);
        if ($mysqli->connect_errno) {
            printf("Не удалось подключиться: %s\n", $mysqli->connect_error);
            exit();
        }
        /* изменение набора символов на utf8 */
        if (!$mysqli->set_charset("utf8")) {
            printf("Ошибка при загрузке набора символов utf8: %s\n", $mysqli->error);
            exit();
        }
        return $mysqli;
    }
}