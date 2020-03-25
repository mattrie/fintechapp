<?php

include 'connection_ajax.php';

   $codename = $_GET['codename'];
   $name = $_GET['name'];
$get_value = $_GET['get_value'];

  $sql_state1 = "UPDATE investment SET interestrate = '$get_value' WHERE codename = '$codename' AND name = '$name' AND remarks = 'Investment deposited'";
            $result1 = mysqli_query($connect, $sql_state1);
      if($result1 == true){
          echo 'yes';
      }

