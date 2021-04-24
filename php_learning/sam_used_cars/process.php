<?php 
    $mysqli = new mysqli('localhost', 'root', '', 'cars2') or die(mysql_error($mysqli));

    $update = false;
    $vin ='';
    $make = '';
    $model = '';
    $year = '';
    $asking_price = '';

    if(isset($_POST['save'])) {
        $vin = $_POST['vin'];
        $make = $_POST['make'];
        $model = $_POST['model'];
        $year = $_POST['year'];
        $askingPrice = $_POST['asking_price'];

        $mysqli->query("INSERT INTO inventory (vin, make, model, year, asking_price) VALUES ('$vin', '$make', '$model', '$year', '$askingPrice')") 
        or die ($mysqli->error());


    }

    if(isset($_GET['delete'])) {
        $vin = $_GET['delete'];
        $mysqli->query("DELETE FROM inventory WHERE vin = $vin") 
        or die($mysqli->error());
    }

    if(isset($_GET['edit'])) {
        $update = true;
        $vin = $_GET['edit'];
        $result = $mysqli->query("SELECT * FROM inventory WHERE vin = $vin")
        or die($mysqli->error());
            $row = $result->fetch_assoc();
            $vin = $row['vin'];
            $make = $row['make'];
            $model = $row['model'];
            $year = $row['year'];
            $asking_price = $row['asking_price'];
        
            if(isset($_POST['update'])) {
                $vin = $_POST['vin'];
                $make = $_POST['make'];
                $model = $_POST['model'];
                $year = $_POST['year'];
                $asking_price = $_POST['asking_price'];
        
                $mysqli->query("UPDATE inventory SET vin='$vin', 
                make='$make', 
                model='$model',
                year='$year', 
                asking_price='$asking_price' WHERE vin = '$vin'")
                or die($mysqli->error());
        
                header('location: index.php');
            }
    }
    
?>