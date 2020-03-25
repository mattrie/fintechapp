<?php
      include 'connection.php';
   $get_pass = $_GET['get_permit'];
   $codename= "";
   $sql_check = "SELECT * FROM staff WHERE permission = '$get_pass'";
  $result = mysqli_query($connect, $sql_check);
  while($row = mysqli_fetch_assoc($result)){
      $codename = $row['code_permit'];
    }
   if($codename==""){
       echo "wrong";

   } else {
    $sql_update = "UPDATE staff SET code_permit = '', reason = '', permission = '', type = '' WHERE permission = '$get_pass'";
  $result1 = mysqli_query($connect, $sql_update);   
      
   }