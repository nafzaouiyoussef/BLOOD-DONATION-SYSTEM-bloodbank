<?php 

session_start();
if(!isset($_SESSION["user_id"])){
    header("Location:landing.php");
}
echo $_SESSION["user_id"];


?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="shortcut icon" type="x-icon" href="favicon.ico">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="logout.php">logout</a>
</body>
</html>