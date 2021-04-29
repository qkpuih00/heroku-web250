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
<form action="#" method="post">
	VIN: <input name="VIN" type="text" /><br />
	Make: <input name="Make" type="text" /><br />
	Model: <input name="Model" type="text" /><br />
	Price: <input name="Asking_Price" type="text" /><br />
	<input name="insert" type="submit" value="Add this vehicle" /><br />
	&nbsp;</form>


    <?php 
// Capture the values posted to this php program from the text fields
if($_POST)
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

include 'db.php';

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
$mysqli->close();



}
include 'footer.php'
?>
</body>

</html>


