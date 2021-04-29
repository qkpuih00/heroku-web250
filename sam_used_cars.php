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
<a href="index.php">Return to introduction</a>



    <?php 
// Capture the values posted to this php program from the text fields
include 'db.php';
if(isset($_GET['action']))
{
    if($_GET['action']=="updateform")
    {
        $vin = $_GET['vin'];
        $query = "SELECT * FROM inventory WHERE vin='$vin'";
        /* Try to query the database */
        if ($result = $mysqli->query($query)) {
        // echo "<p>Got the info</p>"; // Don't do anything if successful.
        }
        else
        {
        echo "Sorry, a vehicle with vin of $vin cannot be found " .  $mysqli->error."<br>";
        }
        // Loop through all the rows returned by the query, creating a table row for each
        while ($result_ar = mysqli_fetch_assoc($result)) {
        $vin = $result_ar['vin'];
        $year = $result_ar['year'];
        $make = $result_ar['make'];
        $model = $result_ar['model'];
        $trim = $result_ar['trim'];
        $color = $result_ar['exterior_color'];
        $interior = $result_ar['interior_color'];
        $mileage = $result_ar['mileage'];
        $transmission = $result_ar['transmission'];
        $price = $result_ar['asking_price'];
        }
        echo "$vin </p>";

        
        ?>
        <form action="#" method="get">
        vin: <input name="vin" type="text" value= "<?php echo "$vin" ?>" /><br />
        make: <input name="make" type="text" value= "<?php echo "$make" ?>" /><br />
        model: <input name="model" type="text" value= "<?php echo "$model" ?>" /><br />
        Price: <input name="asking_price" type="text" value= "<?php echo "$price" ?>" /><br />
        <input type = "hidden" name = "action" value = "update" />
        <input name="Submit1" type="submit" value="Update Car Record" /><br />
    
        &nbsp;</form>
    
    
    <?php







    }//end if updateform
    if($_GET['action']=="update")
    {
        $vin = $_REQUEST['vin'] ;
        $make = $_REQUEST['make'] ;
        $model = $_REQUEST['model'] ;
        $Price = $_REQUEST['asking_price'] ;

        //Build a SQL Query using the values from above

        $query = "UPDATE inventory SET 

        vin='$vin', 
        make='$make', 
        model='$model', 
        asking_price='$Price'

        WHERE

        vin='$vin'"; 

        // Print the query to the browser so you can see it
        echo $query. "<br>";

        /* check connection */
        if (mysqli_connect_errno()) {
        echo "Connection failed: ". $mysqli->error."<br>";
        exit();
        }

        echo 'Connected successfully to mySQL. <BR>';

        //select a database to work with
        $mysqli->select_db('heroku_9c21abcdf38a7bb');
        Echo "Selected the test database. <br>";

        /* Try to insert the new car into the database */
        if ($result = $mysqli->query($query)) {
        echo "<p>You have successfully entered $make $model into the database.</P>";
        }
        else
        {
        echo "Error entering $vin into database: " . mysql_error()."<br>";
        }
    }








    //delete begins

    if($_GET['action']=="delete")
    {
        $vin = $_GET['vin'];
        $query = "DELETE FROM INVENTORY WHERE vin='$vin'";
        echo "$query <BR>";
        /* Try to query the database */
        if ($result = $mysqli->query($query)) {
        Echo "The vehicle with vin $vin has been deleted.";
        }
        else
        {
            echo "Sorry, a vehicle with vin of $vin cannot be found " . mysql_error()."<br>";
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


    $vin =  trim( $_REQUEST['vin']) ;
    $make = trim( $_REQUEST['make']) ;
    $model = trim( $_REQUEST['model']) ;
    $Price =  $_REQUEST['asking_price'] ;


//Build a SQL Query using the values from above

$query = "INSERT INTO inventory
  (vin, make, model, asking_price)
   VALUES (
   '$vin', 
   '$make', 
   '$model',
    $Price
    )";

// Print the query to the browser so you can see it
echo $query. "<br>";


  echo 'Connected successfully to mySQL. <br>'; 
  
//select a database to work with
$mysqli->select_db("test");
   echo "Selected the test database. <br>";

/* Try to insert the new car into the database */
if ($result = $mysqli->query($query)) {
    echo "<p>You have successfully entered $make $model into the database.</P>";
}
else
{
    echo "Error entering $vin into database: " . $mysqli->error."<br>";
}



}else{
    ?>
        <form action="#" method="post">
        vin: <input name="vin" type="text" /><br />
        make: <input name="make" type="text" /><br />
        model: <input name="model" type="text" /><br />
        Price: <input name="asking_price" type="text" /><br />
        <input type = "hidden" name = "action" value = "insert" />
        <input name="submit" type="submit" value="Add this vehicle" /><br />
        &nbsp;</form>
        <?php
}


/////Select//////
$query = "SELECT * FROM inventory ORDER BY model";
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
        echo "<td><a href='" .$_SERVER["PHP_SELF"]. "?action=updateform&vin=".$result_ar['vin']."'>Edit</a>  <a href='" .$_SERVER["PHP_SELF"]. "?action=delete&vin=".$result_ar['vin']."'>Delete</a></td>";
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


