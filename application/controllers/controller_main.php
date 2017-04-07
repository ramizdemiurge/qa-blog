<?php

require "application/models/entity/Article.php";
require "application/services/ArticleService.php";

$ArticleService = new ArticleService();

define("HEADER", "Sample main text for everything, you can get here");
define("SUBHEADER", "Second sample text");

$users_on_page = "5";
$count = $ArticleService->getCount();

$total = ceil($count[0] / $users_on_page);

if (empty($_GET["p"])) {
    $_GET["p"] = "1";
}
$p = $_GET["p"];

if (!ctype_digit($p) or $p > $total):
    $p = "1";
endif;

$first = $p * $users_on_page - $users_on_page;
$result = $ArticleService->getAll($first, $users_on_page);

include "application/views/header.tpl";
include "application/views/articles.tpl";

while ($data = mysqli_fetch_array($result)) // цикл вывода
{
    $POST_ID = $data[0];
    $POST_NAME = $data[1];
    $POST_SUBTITLE = $data[5];
    $POST_AUTHOR = $data[2];
    $POST_DATE = $data[3];
    include "application/views/article.tpl";
}

//// pages
//if($total>1):
//    #две назад
//    print "<br><div>";
//    if(($p-2)>0):
//        $ptwoleft="<a class='first_page_link' href='index.php?p=".($p-2)."'>".($p-2)."</a>  ";
//    else:
//        $ptwoleft=null;
//    endif;
//
//    #одна назад
//    if(($p-1)>0):
//        $poneleft="<a class='first_page_link' href='index.php?p=".($p-1)."'>".($p-1)."</a>  ";
//        $ptemp=($p-1);
//    else:
//        $poneleft=null;
//        $ptemp=null;
//    endif;
//
//    #две вперед
//    if(($p+2)<=$total):
//        $ptworight="  <a class='first_page_link' href='index.php?p=".($p+2)."'>".($p+2)."</a>";
//    else:
//        $ptworight=null;
//    endif;
//
//    #одна вперед
//    if(($p+1)<=$total):
//        $poneright="  <a class='first_page_link' href='index.php?p=".($p+1)."'>".($p+1)."</a>";
//        $ptemp2=($p+1);
//    else:
//        $poneright=null;
//        $ptemp2=null;
//    endif;
//
//    # в начало
//    if($p!=1 && $ptemp!=1 && $ptemp!=2):
//        $prevp="<a href='index.php' class='first_page_link' title='В начало'><<</a> ";
//    else:
//        $prevp=null;
//    endif;
//
//    #в конец (последняя)
//    if($p!=$total && $ptemp2!=($total-1) && $ptemp2!=$total):
//        $nextp=" ...  <a href='index.php?p=".$total."'".$total."' class='first_page_link'>$total</a>";
//    else:
//        $nextp=null;
//    endif;
//
//    print "<br>".$prevp.$ptwoleft.$poneleft.'<span class="num_page_not_link"><b>'.$p.'</b></span>'.$poneright.$ptworight.$nextp;
//    print "</div>";
//endif;

echo "<hr>
                <!-- Pager -->
                <ul class=\"pager\">";
if ($p != $total) echo "
                    <li class=\"next\">
                        <a href=\"?p=" . ($p + 1) . "\">Older Posts &rarr;</a>
                    </li>";
if ($p > 1) echo "
                    <li class=\"previous\">
                        <a href=\"?p=" . ($p - 1) . "\"> &larr; Newer Posts</a>
                    </li>";
echo "                </ul>
                </div></div></div>";
include "application/views/footer.tpl";