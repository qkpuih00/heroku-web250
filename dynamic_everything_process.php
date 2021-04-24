<?php
    $loadedPage = $_GET["p"];

    if($loadedPage == "") {
        $loadedPage = "contents/toc.php";
    }
    
    include $loadedPage;

?>