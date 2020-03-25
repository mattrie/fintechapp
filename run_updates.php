<?php
   include 'connection.php';



   //   3    DATE FORMAT FOR PENALTY PAID    allloan    weekly_allloan     monthly_allloan
   $sql_all_get112 = mysqli_query($connect, "SELECT * FROM monthly_allloan");
   while($row=mysqli_fetch_array($sql_all_get112)){
    $date = $row['date'];
    $date_format = date("Y-m-d", strtotime($date));
           $get_id = $row['id'];
       $sql_all_update = mysqli_query($connect, "UPDATE monthly_allloan SET date_format = '$date_format' WHERE id = '$get_id'");
       if ($sql_all_update ==true) {
          //  echo "<script>alert('revenue date_format updated')</script>";
       } 
   }
