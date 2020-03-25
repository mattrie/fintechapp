<?php
      include 'connection_ajax.php';
      
      $slide_control = $_GET['slide_control'];
      
      if($slide_control == 0){
        $result_control = mysqli_query($connect, "UPDATE staff SET slider = 'close'"); 
        if ($result_control == true) {
            echo "Closed for the Day. Staff CANNOT make any Posting OR Repayments.";
        }
      } else {
        $result_control = mysqli_query($connect, "UPDATE staff SET slider = 'open'");  
        echo "Now opened for Staff Posting";  
      }