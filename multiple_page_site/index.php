<!DOCTYPE html>

<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Multiple page site</title></head>
<body>
<h1>Hello World</h1>
    <?php
    echo "It's Working!!</br>";
    //get file contents
        $includedFile = "multiplePage_data_directory/test.data";

        $openFile = fopen($includedFile, "r") or die("Cannot find file!!!");

        $readInContents = fread($openFile, filesize($includedFile));

        fclose($openFile);
    //End of get file contents
        $splitContentsIntoArray = explode("\n", $readInContents);
        //echo "<h1>". print_r($splitContentsIntoArray). "</h1>";

        for($i = 0; $i < sizeof($splitContentsIntoArray); $i++) {
            $currentRecord = $splitContentsIntoArray[$i];
            $listOfWords = explode("||", $currentRecord);
            $theFirstWord = $listOfWords[0];

            echo'<a href="?p='.$theFirstWord.'">'. $theFirstWord.'</a>||';
        }
        echo'<br>';
        if($_GET) {
            $pageDesired = $_GET["p"];
            
        } else {
            $firstWord = $splitContentsIntoArray[0];
            $listOfWords = explode("||", $firstWord);
            $pageDesired = $listOfWords[0];
            
        }

        //echo "<br>Your Desired ". $pageDesired;
        for($i = 0; $i < sizeof($splitContentsIntoArray); $i++) {
            $currentRecord = $splitContentsIntoArray[$i];
            $listOfWords = explode("||", $currentRecord);
            $theFirstWord = $listOfWords[0];

            //echo'<a href="?p='.$theFirstWord.'">'. $theFirstWord.'</a>|| ';
            if($theFirstWord == $pageDesired) {
                echo print_r($listOfWords);
            }
        }


    ?>
</body>
</html>