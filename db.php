<?php
$servername="localhost";
$dbusername="cloud";
$dbpassword = "";
$dbname= "student_signup";

$conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);

if(!$conn){
    die ("connection failed".mysqli_connect_error());
}
?>
