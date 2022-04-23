<?php
//get data from form  
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$number = $_POST['number'];
$disease = $_POST['disease'];
$diabetes = $_POST['diabetes'];
$donate = $_POST['donate'];
$date = $_POST['date'];

$to = "nafzaouyoussef@gmail.com";
$subject = "Mail From website";
$txt ="firstname = ". $firstname . "\r\n  lastname = " . $lastname . "\r\n gender =" . $gender . "\r\n email = ". $email  . "\r\n number = ". $number  . "\r\n disease = ". $disease . "\r\n diabetes = ". $diabetes  . "\r\n donate = ". $donate  . "\r\n date = ". $date;
$headers = "From: noreply@idonor.com" . "\r\n" .
"CC: somebodyelse@example.com";
if($email!=NULL){
    mail($to,$subject,$txt,$headers);
}
//redirect
header("Location:succes.php");
?>