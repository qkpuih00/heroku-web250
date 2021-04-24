<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "cars";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
/*$sql = "SELECT VIN, YEAR, Make FROM inventory";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<br> VIN: ". $row["VIN"]. " - Year: ". $row["YEAR"]. " - Make " . $row["Make"] . "<br>";
        }
    } else {
        echo "0 results";
    }*/
     
    ?>
</body>
</html>