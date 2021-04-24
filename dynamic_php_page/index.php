<!DOCTYPE html>

<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dynamic PHP Page</title></head>
<body>
    <nav>
    <a href="?p=contents/alpha.php">Alpha ||</a>
    <a href="?p=contents/beta.php">Beta ||</a>
    <a href="?p=contents/charlie.php">Charlie</a>
    </nav>
    <h1>Hello World</h1>
    <div><!--contents goes here -->
        <?php
            require_once "dynamic_process.php";
        ?>
    </div>
</body>
</html>