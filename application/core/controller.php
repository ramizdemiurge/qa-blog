<?
if ($_GET) {
    if ($_GET['json']) {
        include "application/controllers/controller_json.php";
    } elseif ($_GET['blog']) {
        include "application/controllers/controller_blog.php";
    } elseif ($_GET['page']) {
        include "application/controllers/controller_pages.php";
    } else include "application/controllers/controller_main.php";
} else include "application/controllers/controller_main.php";
