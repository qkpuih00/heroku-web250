 <?php
 $server = 'sql311.epizy.com';
 $username = 'epiz_28254681';
 $password = 'NBt5QpJBNf';
 $dbname = 'epiz_28254681_joyphp';
$mysqli = new mysqli($server, $username, $password, $dbname );
/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
//select a database to work with
$mysqli->select_db("test");
 
?>