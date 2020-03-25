<?php

   session_start();
    include 'connection.php';
       

 
                 $codename = $_GET['codename'];
               
                 
                $sql_find_add = "SELECT * FROM monthly_allloan WHERE codename = '$codename' AND disburseloan > 1 AND remarks = 'loan disbursement'"; 
                $result_add = mysqli_query($connect, $sql_find_add);
                while ($row = mysqli_fetch_assoc($result_add)) {
                    $get_deposit = $row['deposit'];
                }
                
                  echo number_format($get_deposit);
                   
                   
             
                 
            