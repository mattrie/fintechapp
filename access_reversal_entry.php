<?php
      include 'connection_ajax.php';
      
      session_start();   
    $permitted_name = $_SESSION['staff_full_name'];
   $get_pass = $_GET['get_permit'];
   $codename= $category=$amt_reverse ="";
   $sql_check = "SELECT * FROM staff WHERE permission = '$get_pass' AND namee = '$permitted_name'";
                         $result = mysqli_query($connect, $sql_check);
                            while($row = mysqli_fetch_assoc($result)){
                                $codename = $row['code_permit'];
                                 $category = $row['category'];
                                $amt_reverse = $row['amt_reverse']; 
                              }
                       $_SESSION['store_permitted_code']  =  $codename;
                        $_SESSION['store_amt_reverse']  =  $amt_reverse;
                              
   if($codename==""){
        echo "wrong";
    } else {
        echo $category;
    $sql_update = "UPDATE staff SET code_permit = '', reason = '', permission = '', type = '', amt_reverse = ''  WHERE permission = '$get_pass' AND namee = '$permitted_name'";
  $result1 = mysqli_query($connect, $sql_update);   
      
   }