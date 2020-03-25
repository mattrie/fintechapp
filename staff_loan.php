<?php
session_start();
 include 'connection_ajax.php';
//   $get_pass = $_GET['get_permit'];
     $disburse_type =  $_SESSION['store_disburse_type'];
//   echo $disburse_type;
//   
//   echo 4444444444444444444444444444444444;
     
     if ($disburse_type == "Daily Payment") {
//         header("location: staff_daily_get_loan.php");
         echo  "<script> location.href = 'staff_daily_get_loan.php'; </script>";
    }
    
    
    
    if ($disburse_type == "Weekly Payment") {
//         header("location: staff_weekly_get_loan.php");
       echo  "<script> location.href = 'staff_weekly_get_loan.php'; </script>"; 
    }
    
    
    
    if ($disburse_type == "Monthly Payment") {
//         header("location: staff_monthly_get_loan.php");
          echo  "<script> location.href = 'staff_monthly_get_loan.php'; </script>"; 
    }