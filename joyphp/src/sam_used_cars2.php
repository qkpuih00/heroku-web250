<?php 
//1 latest list of cars (always )
//2 a form to put in a new car (When you first load)
//3 a way to update - need to specify which one, then populate form -always
//4 need a way to delete .. with confirmation? always have option to chose, then next step




//show form to put in new value
/*first time.... show inventory - need code to connect, display , disconnect
with option to edit or delete
- if they hit delete..confirm and if confirmed, delete
-if they want to edit, then ... prepopulare form with the selected item
*/

//--show form
//--connect database
//--show results (include links to edit or delete)

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<title>Joy of PHP</title>
</head>

<body>
<h1>Sam Used Cars
</h1>



    <?php 
// Capture the values posted to this php program from the text fields
include 'db.php';
if(isset($_GET['action']))
{
    if($_GET['action']=="updateform")
    {
        $vin = $_GET['VIN'];
        $query = "SELECT * FROM inventory WHERE VIN='$vin'";
        /* Try to query the database */
        if ($result = $mysqli->query($query)) {
        // echo "<p>Got the info</p>"; // Don't do anything if successful.
        }
        else
        {
        echo "Sorry, a vehicle with VIN of $vin cannot be found " .  $mysqli->error."<br>";
        }
        // Loop through all the rows returned by the query, creating a table row for each
        while ($result_ar = mysqli_fetch_assoc($result)) {
        $VIN = $result_ar['VIN'];
        $year = $result_ar['YEAR'];
        $make = $result_ar['Make'];
        $model = $result_ar['Model'];
        $trim = $result_ar['TRIM'];
        $color = $result_ar['EXT_COLOR'];
        $interior = $result_ar['INT_COLOR'];
        $mileage = $result_ar['MILEAGE'];
        $transmission = $result_ar['TRANSMISSION'];
        $price = $result_ar['ASKING_PRICE'];
        }
        echo "$VIN </p>";
        //echo "$year $make $model </p>";
        //echo "<p>Asking Price: $price </p>";
        //echo "<p>Exterior Color: $color </p>";
        //echo "<p>Interior Color: $interior </p>";
        ?>
        <form action="#" method="get">
        VIN: <input name="VIN" type="text" value= "<?php echo "$VIN" ?>" /><br />
        Make: <input name="Make" type="text" value= "<?php echo "$make" ?>" /><br />
        Model: <input name="Model" type="text" value= "<?php echo "$model" ?>" /><br />
        Price: <input name="Asking_Price" type="text" value= "<?php echo "$price" ?>" /><br />
        <input type = "hidden" name = "action" value = "update" />
        <input name="Submit1" type="submit" value="Update Car Record" /><br />
    
        &nbsp;</form>
    
    
    <?php







    }//end if updateform
    if($_GET['action']=="update")
    {
        $VIN = $_REQUEST['VIN'] ;
        $Make = $_REQUEST['Make'] ;
        $Model = $_REQUEST['Model'] ;
        $Price = $_REQUEST['Asking_Price'] ;

        //Build a SQL Query using the values from above

        $query = "UPDATE inventory SET 

        VIN='$VIN', 
        Make='$Make', 
        Model='$Model', 
        ASKING_PRICE='$Price'

        WHERE

        VIN='$VIN'"; 

        // Print the query to the browser so you can see it
        echo ($query. "<br>");

        /* check connection */
        if (mysqli_connect_errno()) {
        echo ("Connection failed: ". $mysqli->error."<br>");
        exit();
        }

        echo 'Connected successfully to mySQL. <BR>';

        //select a database to work with
        $mysqli->select_db("test");
        Echo ("Selected the test database. <br>");

        /* Try to insert the new car into the database */
        if ($result = $mysqli->query($query)) {
        echo "<p>You have successfully entered $Make $Model into the database.</P>";
        }
        else
        {
        echo "Error entering $VIN into database: " . mysql_error()."<br>";
        }
    }








    //delete begins

    if($_GET['action']=="delete")
    {
        $vin = $_GET['VIN'];
        $query = "DELETE FROM INVENTORY WHERE VIN='$vin'";
        echo "$query <BR>";
        /* Try to query the database */
        if ($result = $mysqli->query($query)) {
        Echo "The vehicle with VIN $vin has been deleted.";
        }
        else
        {
            echo "Sorry, a vehicle with VIN of $vin cannot be found " . mysql_error()."<br>";
        }
    }
}












//////Insert//////////
if(isset ($_POST['action'])){
    $latestAction = $_POST['action'];
}else{
    $latestAction = "";
}
if($latestAction == "insert")
{


    $VIN =  trim( $_REQUEST['VIN']) ;
    $Make = trim( $_REQUEST['Make']) ;
    $Model = trim( $_REQUEST['Model']) ;
    $Price =  $_REQUEST['Asking_Price'] ;


//Build a SQL Query using the values from above

$query = "INSERT INTO inventory
  (VIN, Make, Model, ASKING_PRICE)
   VALUES (
   '$VIN', 
   '$Make', 
   '$Model',
    $Price
    )";

// Print the query to the browser so you can see it
echo ($query. "<br>");


  echo 'Connected successfully to mySQL. <br>'; 
  
//select a database to work with
$mysqli->select_db("test");
   echo ("Selected the test database. <br>");

/* Try to insert the new car into the database */
if ($result = $mysqli->query($query)) {
    echo "<p>You have successfully entered $Make $Model into the database.</P>";
}
else
{
    echo "Error entering $VIN into database: " . $mysqli->error."<br>";
}



}else{
    ?>
        <form action="#" method="post">
        VIN: <input name="VIN" type="text" /><br />
        Make: <input name="Make" type="text" /><br />
        Model: <input name="Model" type="text" /><br />
        Price: <input name="Asking_Price" type="text" /><br />
        <input type = "hidden" name = "action" value = "insert" />
        <input name="submit" type="submit" value="Add this vehicle" /><br />
        &nbsp;</form>
        <?php
}


/////Select//////
$query = "SELECT * FROM inventory ORDER BY Model";
/* Try to query the database */
if ($result = $mysqli->query($query)) {
   // Don't do anything if successful.
}
else
{
    echo "Error getting cars from the database: " . mysql_error()."<br>";
}

// Create the table headers
echo "<table id='Grid' style='width: 80%'>\n";
echo "<tr>";
echo "<th style='width: 50px'>Make</th>";
echo "<th style='width: 50px'>Model</th>";
echo "<th style='width: 50px'>Asking Price</th>";
echo "<th style='width: 50px'>Action</th>";
echo "</tr>\n";

$class ="odd";  // Keep track of whether a row was even or odd, so we can style it later

// Loop through all the rows returned by the query, creating a table row for each
while ($result_ar = mysqli_fetch_assoc($result)) {
    echo "<tr class=\"$class\">";
    echo "<td><a href='viewcar.php?VIN=".$result_ar['VIN']."'>" . $result_ar['Make'] . "</a></td>";
    echo "<td>" . $result_ar['Model'] . "</td>";
       echo "<td>" . $result_ar['ASKING_PRICE'] . "</td>";
        echo "<td><a href='" .$_SERVER["PHP_SELF"]. "?action=updateform&VIN=".$result_ar['VIN']."'>Edit</a>  <a href='" .$_SERVER["PHP_SELF"]. "?action=delete&VIN=".$result_ar['VIN']."'>Delete</a></td>";
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

$mysqli->close();
?>
</body>

</html>


