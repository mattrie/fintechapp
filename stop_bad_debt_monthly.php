<?php
 include 'connection_ajax.php';

   $codename = $_GET['codename'];
   $name = $_GET['name'];

    
  $sql_state1 = "DELETE FROM monthly_allloan WHERE codename = '$codename' AND remarks = 'Bad Debt Settled by Finsolute' ";
            $result1 = mysqli_query($connect, $sql_state1);
      if($result1 == true){
          echo 'yes';
      }
//            while ($row = mysqli_fetch_assoc($result1)) {   
//              $closingdate = $row["enddate"];
//              $loan_type = $row["type"];
//              $waver = $row["waver"];
//            }

