<?php
$servername="localhost";
$username="root";
$password="";
$dbname="comments_system";
$con=mysqli_connect($servername,$username,$password,$dbname);
if(!$con)
{
    die("Error to connect :".mysqli_connect_error());
}

?>