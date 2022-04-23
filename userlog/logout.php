<?php
session_start();
session_destroy();
header('location:../log/landing.php');
?>