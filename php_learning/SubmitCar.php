
<!--<html>
<head>
    <title>Car Saved</title>
</head>
<body bgcolor="#FFFFFF" text="#000000" >-->
<form action="#" method="post">
    VIN: <input name="vin" type="text" /><br /> <br /> 
    make: <input name="make" type="text" /><br /> <br /> 
    model: <input name="model" type="text" /><br /> <br /> 
    Price: <input name="asking_price" type="text" /><br /> <br />
    <input name="submit" type="submit" value="submit" /><br />
    <input type="hidden" name="action" value="insert" />
    </form>
<?php 
// Capture the values posted to this php program from the text fields

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
    '$Price'
    )";

// Print the query to the browser so you can see it
echo ($query. "<br>");



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
    echo "Error entering $VIN into database: " . $mysqli->error."<br>";
}
$mysqli->close();
?>
<!--</body>
</html>-->