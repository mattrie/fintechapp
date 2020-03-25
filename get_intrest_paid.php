<?php
 include 'connection_ajax.php';
   $start = $_GET['start'];
   $end = $_GET['end'];
   $codename = $_GET['codename'];
   
     $result = mysqli_query($connect, "SELECT SUM(interestpaid) as total_int FROM investment WHERE interestpaid > 1 AND date_format BETWEEN '$start' AND '$end' AND codename = '$codename' ORDER BY id DESC");  
      

     while ($row = mysqli_fetch_assoc($result)) {
           $total_int = $row['total_int'];
     }
     
     echo "₦".number_format($total_int);