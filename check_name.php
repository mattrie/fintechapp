
        <?php 
         include 'connection.php';    
        
        $name = $check_name = $real_name = "";
    $name = $_REQUEST['name'];
         $real_name = trim($name);
              //THIS IS TO CHECK TO AVOID DOUBLE REGISTRATION
           $check = mysqli_query($connect, "SELECT * FROM student WHERE namee = '$real_name'");
                while($rowch = mysqli_fetch_assoc($check)){
                    $check_name = $rowch['namee'];
                }
                     if ($check_name != ""){      
                echo $check_name;   
                       } else {
                           echo 1;
                       }
//                 $users_arr[] = array("real_name"=>$real_name, "check_name" => $check_name);
//                   // encoding array to json format
//    echo json_encode($users_arr);
//    exit;