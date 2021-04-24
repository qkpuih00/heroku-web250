<!--<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert car information</title>
</head>
<body>-->
<form action="#" method="post">
    VIN: <input name="vin" type="text" /><br /> <br /> 
    make: <input name="make" type="text" /><br /> <br /> 
    model: <input name="model" type="text" /><br /> <br /> 
    Price: <input name="asking_price" type="text" /><br /> <br />
    <input name="submit" type="submit" value="submit" /><br />
    <input type="hidden" name="action" value="insert" />
    </form>
    <?php 
        //Build an SQL Query using the values from above
        include 'db.php';

        //code to delete data
        if(isset($_GET['vin'])) {
            $vin = $_GET['vin'];
            $query = "DELETE FROM inventory WHERE vin='$vin'";
            echo "$query <BR>";
            /* Try to query the database */
            if ($result = $conn->query($query)) {
            Echo "The vehicle with VIN $vin has been deleted.";
            }
            else
            {
            echo "Sorry, a vehicle with VIN of $vin cannot be found " . mysql_error()."<br>";
            }
        }

        if(isset($_POST['action'])){
            $latestAction = $_POST['action'];
        } else {
            $latestAction = "";
        }

        if($latestAction == 'insert') {
            
            $vin = trim($_REQUEST['vin']);
            $make = trim($_REQUEST['make']);
            $model = trim($_REQUEST['model']);
            $Price = $_REQUEST['asking_price'];
            $query = "INSERT INTO inventory (VIN, Make, Model, Asking_Price)
            VALUES ('$vin', '$make', '$model', '$Price')";

            //Print the query to the browser so you can see it

            echo $query."<br>";

            $conn->select_db("test");
            echo'Selected the Cars database.<br>';

            //Try to insert the new car into the database

            if($result = $conn->query($query)) {
                echo"<p>You have successfully entered $make $model $Price into database.</p>";

            } else {
                echo"Error entering $vin into database";
                $conn->error;
            }
        }


        $query = "SELECT * FROM inventory ORDER BY Model";
        /* Try to query the database */
        if ($result = $conn->query($query)) {
        // Don't do anything if successful.
        }
        else
        {
            echo "Error getting cars from the database: " . mysql_error()."<br>";
        }

        // Create the table headers
        echo "<table id='Grid' style='width: 80%'>\n";
        echo "<tr>";
        echo "<th style='width: 50px'>make</th>";
        echo "<th style='width: 50px'>model</th>";
        echo "<th style='width: 50px'>Asking Price</th>";
        echo "<th style='width: 50px'>Action</th>";
        echo "</tr>\n";

        $class ="odd";  // Keep track of whether a row was even or odd, so we can style it later

        // Loop through all the rows returned by the query, creating a table row for each
        while ($result_ar = mysqli_fetch_assoc($result)) {
            echo "<tr class=\"$class\">";
            echo "<td><a href='viewcar.php?vin=".$result_ar['vin']."'>" . $result_ar['make'] . "</a></td>";
            echo "<td>" . $result_ar['model'] . "</td>";
            echo "<td>" . $result_ar['asking_price'] . "</td>";
                echo "<td><a href='FormEdit.php?vin=".$result_ar['vin']."'>Edit</a>  <a href='?vin=".$result_ar['vin']."'>Delete</a></td>";
        echo "</tr>\n";
        
        // If the last row was even, make the next one odd and vice-versa
            if ($class=="odd"){
                $class="even";
            }
            else
            {
                $class="odd";
            }
        }



        echo "</table>";
        $conn->close();
?>





<!--</body>
</html>-->