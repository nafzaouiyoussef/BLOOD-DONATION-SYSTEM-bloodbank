<?php
//get data from form  
$name = $_POST['name'];
$email= $_POST['email'];
$sujet= $_POST['sujet'];
$message= $_POST['message'];
$to = "nafzaouyoussef@gmail.com";
$subject = "Mail From website";
$txt ="Name = ". $name . "\r\n  Email = " . $email . "\r\n sujet =" . $sujet . "\r\n message = ". $message;
$headers = "From: noreply@idonor.com" . "\r\n" .
"CC: somebodyelse@example.com";
if($email!=NULL){
    mail($to,$subject,$txt,$headers);
}
//redirect
header("Location:contsucces.php");
?>