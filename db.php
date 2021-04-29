<?php
 $server = 'us-cdbr-east-03.cleardb.com';
 $username = 'b654cf43080a69';
 $password = '52f4fb5c';
 $dbname = 'heroku_9c21abcdf38a7bb';
$mysqli = new mysqli($server, $username, $password, $dbname );
/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
//select a database to work with
$mysqli->select_db("heroku_9c21abcdf38a7bb");
 
?>