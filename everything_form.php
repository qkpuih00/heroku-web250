<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Everything Form PHP page</title>
</head>
<body>
    <h1>Everything Form with GET and POST</h1>

    <h2>Form using POST</h2>
    <form action="" method="POST">
        Name: <input type="text" name="name"><br>
        Email: <input type="text" name="email"><br>
        <input type="submit">
    </form>

    <h2>Form using GET</h2>
    <form action="" method="GET">
        Name: <input type="text" name="name"><br>
        Email: <input type="text" name="email"><br>
        <input type="submit">
    </form>

    <?php 
        //if POSTed
        if($_POST) {
            echo 'Welcome '. $_POST['name']. '<br>'. 'Your email is '. $_POST['email'];
        }

        //if GETed

        if($_GET) {
            echo 'Welcome '. $_GET['name']. '<br>'. 'Your email is '. $_GET['email'];
        }
    ?>
    
</body>
</html>