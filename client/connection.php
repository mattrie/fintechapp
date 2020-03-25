<?php


$host= "localhost";
$username = "root";
$passwd = "8168627861";
$dbname = "finsolute1";

$connect = mysqli_connect($host, $username, $passwd, $dbname) or die(mysqli_error());

date_default_timezone_set("Africa/Lagos"); 