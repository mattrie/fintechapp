 <?php
 
 include 'connection.php';



                $name = $_REQUEST['name'];
                $codename =$_REQUEST['codename'];
                $perc_java = $_REQUEST['perc_java'];
                $type = $_REQUEST['type'];
                $district = $_REQUEST['district'];  
                 $av_bal = $_REQUEST['av_bal'];          
      
  
              $date = date("jS F Y");
            $month = date("F");
            $year = date("Y");

              $decimal_pen =  $perc_java / 100 ;
             $penalty = $decimal_pen * $av_bal;
           $sql_statement = "INSERT INTO allloan (name, type, remarks, disburseloan, codename, date, month, year, district) VALUES ('$name', '$type', 'Penalty', '$penalty', '$codename', '$date', '$month', '$year', '$district')";

                     $result = mysqli_query($connect, $sql_statement); 
                     
                     
                     ////GET THE REMAINING BALANCE OF LOAN FOR AN INDIVIDUAL
                       $summation_loan2 = "";
                       $summation_pay2 = "";
                       
                       ///////THIS IS TO GET THE INDIVIDUAL BALANCE
                        ////////////THIS IS TO SUM LOAN
                        $code_loan = mysqli_query($connect, "SELECT SUM(disburseloan) as total FROM allloan WHERE codename = '$codename' ");      
                          while  ($row = mysqli_fetch_assoc($code_loan)){
                          $summation_loan2 = $row['total']; 
                          }
                     
                          
                    ////////////THIS IS TO SUM PAYMENTS
                    $total_payments2 = mysqli_query($connect, "SELECT SUM(repay) as total FROM allloan WHERE codename='$codename'");      
                  while  ($row1 = mysqli_fetch_array($total_payments2)){
                  $summation_pay2 = $row1['total'];                          
                  }
                    
                /////LETS GET THE BALANCE
              $balance =  $summation_loan2 - $summation_pay2;
              
            
     //        -----------------------------------------------------------------------             
          
         /////////SUM GENERAL REPAY & DISBURSE LOAN SO YOU CAN GET GEN BALALNCE
            ////////////THIS IS TO SUM PAYMENTS
                $total_payments = mysqli_query($connect, "SELECT SUM(repay) as total FROM allloan");      
              while  ($row1 = mysqli_fetch_array($total_payments)){
              $summation_pay = $row1['total'];                          
                   }
                   
                   
             ////////////THIS IS TO SUM DISBURSE
                $total_disburse2 = mysqli_query($connect, "SELECT SUM(disburseloan) as total FROM allloan");      
              while  ($row2 = mysqli_fetch_array($total_disburse2)){
                        $summation_disburse = $row2['total'];                          
                   }
                   $gen_balance =  $summation_disburse - $summation_pay;  
//        -----------------------------------------------------------------------             
                   
                   
                   
                   
              
                //GET LAST ID  
               $get_last_id = mysqli_query($connect, "SELECT * FROM allloan");      
                          while  ($row = mysqli_fetch_assoc($get_last_id)){
                          $id = $row['id'];                           
                          }
                     
               ////UPDATE TO GET A NEW INDIVIDUAL BALANCE
                  $result2 = mysqli_query($connect, "UPDATE allloan SET genbalance = '$gen_balance',  repaycumm = '$summation_pay2', indbalance = '$balance' WHERE id = '$id'");
                         
                          if($result2==true){
                                   echo "$name has been given a penalty fee of ".number_format($penalty)." Naira. Total balance now is: ".number_format($balance)." Naira Only.";
                                      $id = "";
                                    } else {
                           echo "<script>alert('Check penalty_calculate.php page. it will definately work!!')</script>";
                        }
    ?>     