<?php
include "swal.php";

$host= "localhost";
$username = "root";
$passwd = "8168627861";
$dbname = "finsolute1";

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

$connect = mysqli_connect($host, $username, $passwd, $dbname) or die();
     $bg_color = "";


