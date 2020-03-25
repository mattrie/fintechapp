<?php
 include 'connection_ajax.php';

   $codename = $_GET['codename'];
   $name = $_GET['name'];


  $sql_state1 = "UPDATE allloan SET waver = '1' WHERE codename = '$codename' AND disburseloan > 1 AND remarks = 'loan disbursement'";
            $result1 = mysqli_query($connect, $sql_state1);
      if($result1 == true){
          echo 'yes';
      }
//            while ($row = mysqli_fetch_assoc($result1)) {   
//              $closingdate = $row["enddate"];
//              $loan_type = $row["type"];
//              $waver = $row["waver"];
//            }

