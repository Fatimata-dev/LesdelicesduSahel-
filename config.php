<?php
$host = "localhost";
$user = "root";
$password = "";
$bdname  = "lesdelicedusahel";
$connect = mysqli_connect($host,$user,$password,$bdname);
if (!$connect) {
    die("connection failled: ".mysqli_connect_error());
}


?>