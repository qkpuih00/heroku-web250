<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>php below</h1>
    <?php 
    $db_host = 'localhost';
    $db_user = 'root';
    $db_password = 'password';
    $db_port = '3306';
    $db_name = 'joyPHP';
    
    $conn = mysql_connect($db_host, $db_user, $db_password)
        or die('Error connecting to mysql');
    
    //$db_name = 'epub';
    mysql_select_db($db_name);


    
    
    
    ?>
</body>
</html>