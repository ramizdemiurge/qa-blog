<?php
$host = 'localhost'; // адрес сервера
$database = 'qa_blog'; // имя базы данных
$user = 'root'; // имя пользователя
$password = ''; // пароль


// подключаемся к серверу
$link = mysqli_connect($host, $user, $password, $database)
or die("Ошибка " . mysqli_error($link));

/* изменение набора символов на utf8 */
if (!mysqli_set_charset($link, "utf8")) {
    printf("Ошибка при загрузке набора символов utf8: %s\n", mysqli_error($link));
    exit();
} else {
    //printf("<br>Подключено в базу данных с кодиовкой %s\n", mysqli_character_set_name($link));
}

//mysqli_close($link);