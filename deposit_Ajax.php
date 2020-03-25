<?php

   session_start();
    include 'connection_ajax.php';
       

 
                 $codename = $_GET['codename'];
                 $deposit = $_GET['depositing'];
                 
                $sql_find_add = "SELECT * FROM monthly_allloan WHERE codename = '$codename' AND disburseloan > 1 AND remarks = 'loan disbursement'"; 
                $result_add = mysqli_query($connect, $sql_find_add);
                while ($row = mysqli_fetch_assoc($result_add)) {
                    $get_deposit = $row['deposit'];
                }
                
                   $final_deposit = $deposit + $get_deposit;
                   
                   
              $sql_update_deposit = "UPDATE monthly_allloan SET deposit = '$final_deposit' WHERE codename = '$codename' AND disburseloan > 1 AND remarks = 'loan disbursement'"; 
                $result_update = mysqli_query($connect, $sql_update_deposit);      
                   
                   echo number_format($final_deposit);  
                 
            