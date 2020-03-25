<?php
      include 'connection_ajax.php';
      
      session_start();   
    $permitted_name = $_SESSION['staff_full_name'];
   $get_pass = $_GET['get_permit'];
   $disburse = $disburse_type = $disburse_name = $disburse_id = $approved_amt ="";
   $sql_check = "SELECT * FROM staff WHERE disburse_permission = '$get_pass' AND namee = '$permitted_name'";
                         $result = mysqli_query($connect, $sql_check);
                            while($row = mysqli_fetch_assoc($result)){
                                $disburse = $row['disburse_permission'];
                                $disburse_type = $row['disburse_type'];
                                $disburse_name = $row['disburse_name'];
                                $disburse_id = $row['disburse_id'];
                                 $approved_amt = $row['approved_amt'];
                              }
                       $_SESSION['store_permitted_code']  =  $disburse;  
                       $_SESSION['store_disburse_type']  =  $disburse_type;  
                       $_SESSION['store_disburse_name']  =  $disburse_name; 
                       $_SESSION['store_disburse_id']  =  $disburse_id; 
                       $_SESSION['store_approved_amt']  =  $approved_amt; 
                              
   if($disburse==""){
        echo "wrong";
    } else {
    $sql_update = "UPDATE staff SET disburse_permission = '', disburse_type = '', disburse_name = '', disburse_id = '' WHERE disburse_permission = '$get_pass' AND namee = '$permitted_name'";
  $result1 = mysqli_query($connect, $sql_update);   
      
   }