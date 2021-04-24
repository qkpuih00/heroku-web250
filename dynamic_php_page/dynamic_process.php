<?php
    $loadedPage = $_GET["p"];

    if($loadedPage == "") {
        $loadedPage = "contents/alpha.php";
    }
    
    include $loadedPage;

?>