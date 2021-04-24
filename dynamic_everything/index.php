<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Everything PHP Page</title>
    <link rel="stylesheet" href="styles/default.css">
</head>

<body>
    <!--<nav>
    <a href="?p=contents/alpha.php">Alpha ||</a>
    <a href="?p=contents/beta.php">Beta ||</a>
    <a href="?p=contents/charlie.php">Charlie</a>
    </nav>-->

    <!-- call menu.php-->
    <?php
        require_once "components/header.php";
    ?>

    
    <!--contents goes here -->
        <?php
            require_once "dynamic_everything_process.php";
        ?>

        
    <footer>
        <?php
            require_once "components/footer.php"
        ?>
    </footer>
    <script src="scripts/default.js"></script>
</body>
</html>