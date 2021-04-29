 <?php
 $server = 'localhost';
 $username = 'root';
 $password = '';
 $dbname = 'test';
$mysqli = new mysqli($server, $username, $password, $dbname );
/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
//select a database to work with
$mysqli->select_db("test");
 
?>