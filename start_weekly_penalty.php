<?php

include 'connection_ajax.php';

   $codename = $_GET['codename'];
   $name = $_GET['name'];
$get_value = $_GET['get_value'];

  $sql_state1 = "UPDATE weekly_allloan SET waver = '' WHERE codename = '$codename' AND disburseloan > 1 AND remarks = 'loan disbursement'";
            $result1 = mysqli_query($connect, $sql_state1);
      if($result1 == true){
          echo 'yes';
      }
