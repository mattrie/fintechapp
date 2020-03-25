<?php
session_start();
 
    include 'connection_ajax.php';
     
           $codename = $_REQUEST['codename']; 
          $wave_interest = $_REQUEST['wave_interest']; 
          $available_blance = $_REQUEST['available_blance'];
          $name = $_REQUEST['name'];
        
                           
                              
                                   
                             
                           $backdate = "";
                               $date_posted = date("jS F Y");    
                            if($backdate == ""){
                                $date = date("jS F Y");
                               $date_format = date("Y-m-d"); 
                            } else {
                           $date = $output_closedate = date('jS F Y', strtotime($backdate)); 
                           $date_format = $_POST['backdate'];
                            }
                            
                              $optional_interest = $_POST['optional'];  
                                
                                $month = date("F");
                                $year = date("Y");
                         
                 
             
               //THIS ACCURATELY DEDUCTS THE INTEREST FROM THE AMOUNT INSERTED WITH 11( use x to do the maths)      
//                           $interest_to_revenue = $parent2 / 11 ;
//                         $parent = $parent2 - $interest_to_revenue;
//                         
//                         
                   
                          
                      
                    
                           
                                @$target_file = $images;
                  //INSERT RECORD 1
       date_default_timezone_set("Africa/Lagos");
                        $time_stamp = date("h:ia");  
       $time_stamp1  = date("h:ia", strtotime($time_stamp));   
     
      
      
      
     
              $parent =  $parent2 - $real_interest; 
 
          
          
                     
                      
//     @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@                 
                      
         if ($optional_interest != "") {
            $parent2 = $parent2 + $optional_interest;
         }
    $sql_statement = "INSERT INTO monthly_allloan (name, type, remarks, repay, interest, codename, date, date_format, month, year, district, collector, timestamp, insurance_out, date_posted) VALUES ('$name', 'Monthly Payment', '$wave_interest', '$available_blance', '0', '$codename', '$date' , '$date_format', '$month', '$year', '', 'admin', '$time_stamp1', '0', '$date_posted')";
                     $result = mysqli_query($connect, $sql_statement); 
                      
               
                     
                     ////SUM INTEREST payment           
//                $interest_pay = mysqli_query($connect, "SELECT SUM(interest_pay) as total FROM monthly_allloan WHERE codename = '$codename'");      
//              while($row1 = mysqli_fetch_array($interest_pay)){
//              $sum_interest_pay = $row1['total'];                          
//                   }     
//                     
//                $interest_reduce  =  $interest - $sum_interest_pay;
                     
              ////GET THE REMAINING BALANCE OF LOAN FOR AN INDIVIDUAL
                       $summation_loan2 = "";
                       $summation_pay2 = "";
                     
                       ///////THIS IS TO GET THE INDIVIDUAL BALANCE
                        ////////////THIS IS TO SUM LOAN
                        $code_loan = mysqli_query($connect, "SELECT SUM(disburseloan) as total FROM monthly_allloan WHERE codename = '$codename' AND (disburseloan > '1' OR disburseloan < -1)");      
                          while  ($row = mysqli_fetch_assoc($code_loan)){
                         $summation_loan2 = $row['total']; 
//                           $plus_interest = $row['interest'];  
                          }
           //THIS IS TO REMOVE THE TOTAL INTEREST AND LEAVE BLANK FOR THE OPTIONAL TO CLEAR               
//                if ($optional_interest != "") {
//                   $summation_loan2 = $summation_loan2 - $interest;
//                   
//                }
                
//                 if ($optional_interest != "") {
//                   $summation_loan2 = $summation_loan2 + $optional_interest;
//                   
//                } 
                          
                          
//                           $summation_loan2 =  $summation_loan3 + $plus_interest;
                            
                ////////////THIS IS TO SUM PAYMENTS
                $total_payments2 = mysqli_query($connect, "SELECT SUM(repay) as total FROM monthly_allloan WHERE codename='$codename'");      
              while  ($row1 = mysqli_fetch_array($total_payments2)){
              $summation_pay2 = $row1['total'];                          
              }
              
              
                //#############"""""""""""""""""""""""""""""""""""""""""""""""""""""######################################"""""""""""""""""""""""""""""""""""""""""""          
               /////////SUM GENERAL equity & WITHDRAWALS  SO YOU CAN GET GEN BALALNCE
            ////////////THIS IS TO SUM savings
                $total_equity = mysqli_query($connect, "SELECT SUM(equity) as total FROM monthly_allloan");      
              while  ($row1 = mysqli_fetch_array($total_equity)){
              $summation_equity = $row1['total'];                          
                   }
                   
                   
             ////////////THIS IS TO SUM withdrawsavings
                $total_withdrawequity = mysqli_query($connect, "SELECT SUM(withdrawequity) as total FROM monthly_allloan");      
              while  ($row2 = mysqli_fetch_array($total_withdrawequity)){
                        $summation_withdrawequity = $row2['total'];                          
                   }
                $gen_balance_equity =  $summation_equity - $summation_withdrawequity;         
                   
  //         """"""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""
                   
              
              
              
           $balance =  $summation_loan2 - $summation_pay2;         
     $sql_sum_repay = mysqli_query($connect, "UPDATE monthly_allloan SET repay_sum = '$summation_pay2', deposit = '0', indbalance = '$balance' WHERE disburseloan > 1 AND codename='$codename' AND remarks = 'loan disbursement'");         
                   
              
              
              
              ////////GET ALL REVERSAL PAYMENT TO MINUS FROM
               $total_payments33 = mysqli_query($connect, "SELECT SUM(disburseloan) as total FROM monthly_allloan WHERE codename='$codename' AND remarks = 'Reversal Entry'");      
              while  ($row1 = mysqli_fetch_array($total_payments33)){
                   $summation_reverse2 = $row1['total']; 
                   
              }
              
                   $summation_pay_real = $summation_pay2 - $summation_reverse2;
              
              
              
                //GET LAST ID  
               $get_last_id = mysqli_query($connect, "SELECT * FROM monthly_allloan");      
                          while  ($row = mysqli_fetch_assoc($get_last_id)){
                          $id = $row['id'];                           
                          }
                   
                     
                      /////////SUM GENERAL REPAY & DISBURSE LOAN SO YOU CAN GET GEN BALALNCE
            ////////////THIS IS TO SUM PAYMENTS
                $total_payments = mysqli_query($connect, "SELECT SUM(repay) as total FROM monthly_allloan");      
              while  ($row1 = mysqli_fetch_array($total_payments)){
              $summation_pay = $row1['total'];                          
                   }
                   
                   
             ////////////THIS IS TO SUM DISBURSE
                $total_disburse2 = mysqli_query($connect, "SELECT SUM(disburseloan) as total FROM monthly_allloan WHERE remarks = 'loan disbursement'");      
              while  ($row2 = mysqli_fetch_array($total_disburse2)){
                        $summation_disburse = $row2['total'];                          
                   }
                   $gen_balance =  $summation_disburse - $summation_pay;  
                     
               
                   
                   
          
                   
                   
                   
                   
                   
                   
                 
                    //       *********************************||||||||||||||||****************************************************            
                      $summation5 =  $summation6 = "";
                   ///////////THIS IS TO SUM TOTAL monthly_disburseloan///////////////////
                        $total_monthly_disburseloan = mysqli_query($connect, "SELECT SUM(disburseloan) as total FROM monthly_allloan WHERE name='$name'");      
                          while  ($row = mysqli_fetch_array($total_monthly_disburseloan)){
                          $summation5 = $row['total'];                          
                          }
                            
      ////////////THIS IS TO TOTAL monthly_payment
                            $total_monthly_payment = mysqli_query($connect, "SELECT SUM(repay) as total FROM monthly_allloan WHERE name='$name'");      
                          while  ($row1 = mysqli_fetch_array($total_monthly_payment)){
                          $summation6 = $row1['total'];                          
                          }
                          //////////////////////////////////////////
                       @$monthly_status =  $summation5 - $summation6;

                
    
//       *********************************||||||||||||||||****************************************************            
                      $summation1 =  $summation2 =  $summation3 =  $summation4 = "";
                   ///////////THIS IS TO SUM TOTAL daily_disburseloan///////////////////
                        $total_daily_disburseloan = mysqli_query($connect, "SELECT SUM(disburseloan) as total FROM allloan WHERE name='$name'");      
                          while  ($row = mysqli_fetch_array($total_daily_disburseloan)){
                          $summation1 = $row['total'];                          
                          }
                            
      ////////////THIS IS TO TOTAL daily_payment
                            $total_daily_payment = mysqli_query($connect, "SELECT SUM(repay) as total FROM allloan WHERE name='$name'");      
                          while  ($row1 = mysqli_fetch_array($total_daily_payment)){
                          $summation2 = $row1['total'];                          
                          }
                          //////////////////////////////////////////
                       @$daily_status =  $summation1 - $summation2;

/////======================================================================


  ///////THIS IS TO SUM TOTAL weekly_disburseloan///////////////////
                        $total_weekly_disburseloan = mysqli_query($connect, "SELECT SUM(disburseloan) as total FROM weekly_allloan WHERE name='$name'");      
                          while  ($row = mysqli_fetch_array($total_weekly_disburseloan)){
                          $summation3 = $row['total'];                          
                          }
                            
      ////////////THIS IS TO TOTAL weekly_payment
                      $total_weekly_payment = mysqli_query($connect, "SELECT SUM(repay) as total FROM weekly_allloan WHERE name='$name'");      
                          while  ($row1 = mysqli_fetch_array($total_weekly_payment)){
                          $summation4 = $row1['total'];                          
                          }
                          //////////////////////////////////////////
                       @$weekly_status =  $summation3 - $summation4;

                @$total_status =  $daily_status + $weekly_status + $monthly_status;  
      //UPDATE RECORD
      $sql_statement101 = "UPDATE members SET balance = '$total_status' WHERE namee='$name'";
                     $result29 = mysqli_query($connect, $sql_statement101); 
 //       **************************||||||||||||||||***********************************************            
                     
 
                   
                   
                   
                   
                   
                   
                   
  $result2 = mysqli_query($connect, "UPDATE monthly_allloan SET genbalance = '$gen_balance', repaycumm = '$summation_pay_real', indbalance = '$balance', genbalequity = '$gen_balance_equity'  WHERE id = '$id'");
//                       printf("Errormessage: %s\n", mysqli_error($connect));  
  //           UPDATE monthlyindbal FOR MEMEBERS DB TO AUTO-DETECT PENALTY
           $closingdate =  $_SESSION['closingdate'];
        $result222 = mysqli_query($connect, "UPDATE members SET monthlyindbal = '$balance', monthlyenddate = '$closingdate', monthlycode = '$codename' WHERE namee = '$name'");
  
  
                           
                        
    if ($result ==true) {
     echo "yes";
}                   
                     
                   

              
    

                        
          
                        

