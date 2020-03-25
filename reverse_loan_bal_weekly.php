<?php
session_start();
include 'connection_ajax.php';

$codename = $_GET['codename'];
$name = $_GET['name'];
$district = $_GET['district'];
$av_bal = $_GET['av_bal'];

 /////////SEARCH FOR WEEKLY
 $sql_state10 = "SELECT * FROM weekly_allloan WHERE  disburseloan > 1 AND remarks = 'loan disbursement' AND codename = '$codename'";
 $result10 = mysqli_query($connect, $sql_state10);
 while ($row = mysqli_fetch_assoc($result10)) {  
     $names = $row["name"];
   $closingdate = $row["enddate"];
   $loan_type = $row["type"];
   $disburseloan = $row["indbalance"];
   $check_codename = $row["codename"];
   $interest = $row["interest"]; 
   $weeks = $row["weeks"]; 
  
 }

$sql_state = "SELECT * FROM members WHERE namee = '$name'";
            $result = mysqli_query($connect, $sql_state);
      
            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row["id"];
//                echo $id;
                $name = $row["namee"];
                $regnum = $row["registration_num"];
                $address = $row["addresss"];
                $get_dob = $row["dob"];
                $class = $row["classs"];
                $parent = $row["parentt"];
                $telephone = $row["telephone"];
                $mail = $row["mail"];
                $religion = $row["religion"];
                $login_id = $row["login_id"];
                $images = $row["imagess"];
                $date = $row["level"];
                $get_branch = $row['branch'];
              }
              $dob = $get_dob;
                $_SESSION['dob'] = $dob;
              $_SESSION['weeks'] = $weeks;
             $_SESSION['interest'] = $interest; 
           

$parent1 = $av_bal;
$penalty1 = "disburse";
$telephone = $codename;//codename
$branch = $get_branch;
$loan_type = "weekly Payment";
//                                $int_rev = str_replace(",", "", $_POST['int_rev']); 
$equity = "0";
$why_reverse = "Reversing Loan Balance";
$pro_fee = "0";
$backdate = date("jS F Y");
$date = date("jS F Y");

$month = date("F");
$year = date("Y");
$regnum = $district; //district $regnum = $row["registration_num"];
$dob = $get_dob; // group







if ($loan_type == "weekly Payment") {
    $get_divsor = mysqli_query($connect, "SELECT * FROM weekly_allloan WHERE codename = '$telephone' AND remarks = 'loan disbursement'"); 
while ($row = mysqli_fetch_assoc($get_divsor)) {

$available_blance = $row['indbalance'];
}


if($parent1 > $available_blance){
   echo "<script type='text/javascript'> $(document).ready(function(){ 
swal({
         title: 'Reversal Recheck!!',
         text: 'Reversal too large: ". $parent1."  Naira  ($available_blance) week Naira for codename: $telephone',
         icon: 'warning',
        buttons: {
            confirm : {text:'Ok',className:'sweet-orange'},
          
        },
        closeOnClickOutside: false
       })
  
}); </script>";
} else {         
 /////////else do weekly payment here
$weeks  = $_SESSION['weeks'];
$interest =  $_SESSION['interest']; 
//THIS ACCURATELY DEDUCTS THE INTEREST FROM THE AMOUNT INSERTED WITH each week( use x to do the maths)      
          if($weeks == 4){
             $interest_to_revenue = $parent1 / 21 ;
         $parent = $parent1 - $interest_to_revenue;
         }
         
         if($weeks == 8){
             $interest_to_revenue = $parent1 / 14.33333333333333 ;
         $parent = $parent1 - $interest_to_revenue;
         }
         
           if($weeks == 12){
             $interest_to_revenue = $parent1 / 11 ;
         $parent = $parent1 - $interest_to_revenue;
         }
         
         if($weeks == 16){
             $interest_to_revenue = $parent1 / 9;
         $parent = $parent1 - $interest_to_revenue;
         }
         
          if($weeks == 20){
             $interest_to_revenue = $parent1 / 7.666666666666666;
         $parent = $parent1 - $interest_to_revenue;
         }



   //INSERT RECORD 1
  $time_stamp = date("h:ia");  
$time_stamp1  = date("h:ia", strtotime($time_stamp));  
if($penalty1 == "penal"){$pen_remarks = "penalty reverse"; $interest = 0;} else {$pen_remarks = "";}
$true_parent  =  $parent1 + 0 ;
if (is_numeric($equity)) {
$equity;
} else {
$equity = 0;
}
$sql_statement = "INSERT INTO weekly_allloan (name, remarks, reversepen, disburseloan, codename, date, month, year, district, collector, equity, timestamp, branch) VALUES ('$name', '$why_reverse', '$pen_remarks','-$true_parent', '$telephone', '$date', '$month', '$year', '$regnum', 'admin', '-$equity', '$time_stamp1', '$branch')";

     $result = mysqli_query($connect, $sql_statement); 
     $the_error = mysqli_error($connect);
    //  echo $the_error. ' true parent '. $true_parent .' equity '. $equity;

//      PUT IN THE "R" TO REMOVE FROM GENERAL LEDGER
if($penalty1 != "penal"){               
$sql_reverse_alert = "UPDATE weekly_allloan SET reverse_alert = '' WHERE codename = '$telephone' AND disburseloan > '1000'";        
$result_reverse_alert = mysqli_query($connect, $sql_reverse_alert);
$reverse_insurance = "UPDATE weekly_allloan SET insurance_in = 0  WHERE codename = '$telephone' AND disburseloan > '1000'";        
$result_rreverse_insurance = mysqli_query($connect, $reverse_insurance);       

}              
     

      ////GET THE REMAINING BALANCE OF LOAN FOR AN INDIVIDUAL
       $summation_loan2 = "";
      
$sql_statement28 = "INSERT INTO revenuexp (remaks, revenue, date, month, year, branch) Values('$name processing fee reversal entry', '-$pro_fee', '$date', '$month', '$year', '$branch')";
     $result28 = mysqli_query($connect, $sql_statement28);            

       ///////THIS IS TO GET THE INDIVIDUAL BALANCE
        ////////////THIS IS TO SUM LOAN
        $code_loan = mysqli_query($connect, "SELECT SUM(disburseloan) as total FROM weekly_allloan WHERE codename = '$telephone' ");      
          while  ($row = mysqli_fetch_assoc($code_loan)){
          $summation_loan2 = $row['total']; 
          
          }
            
////////////THIS IS TO SUM PAYMENTS
$total_payments2 = mysqli_query($connect, "SELECT SUM(repay) as total FROM weekly_allloan WHERE codename='$telephone'");      
while  ($row1 = mysqli_fetch_array($total_payments2)){
$summation_pay22 = $row1['total'];                          
}
    

$balance =  $summation_loan2 - $summation_pay22;
$sql_sum_repay11 = mysqli_query($connect, "UPDATE weekly_allloan SET  indbalance = '$balance' WHERE disburseloan > 1 AND codename='$telephone' AND remarks = 'loan disbursement'");         

////////GET ALL REVERSAL PAYMENT TO MINUS FROM
$total_payments33 = mysqli_query($connect, "SELECT SUM(disburseloan) as total FROM weekly_allloan WHERE codename='$telephone' AND remarks = 'Reversal Entry'");      
while  ($row1 = mysqli_fetch_array($total_payments33)){
$summation_reverse2 = $row1['total'];                          
}

   $summation_pay_real = $summation_pay22 - $summation_reverse2;

//GET LAST ID  
$get_last_id = mysqli_query($connect, "SELECT * FROM weekly_allloan");      
          while  ($row = mysqli_fetch_assoc($get_last_id)){
          $id = $row['id'];                           
          }
     
     
     
     
     
     /////////SUM GENERAL REPAY & DISBURSE LOAN SO YOU CAN GET GEN BALALNCE
////////////THIS IS TO SUM PAYMENTS
$total_payments = mysqli_query($connect, "SELECT SUM(repay) as total FROM weekly_allloan");      
while  ($row1 = mysqli_fetch_array($total_payments)){
$summation_pay = $row1['total'];                          
   }
   
   
////////////THIS IS TO SUM DISBURSE
$total_disburse2 = mysqli_query($connect, "SELECT SUM(disburseloan) as total FROM weekly_allloan");      
while  ($row2 = mysqli_fetch_array($total_disburse2)){
        $summation_disburse = $row2['total'];                          
   }
   $gen_balance =  $summation_disburse - $summation_pay;  
  
   
   
   
   
   
   
  
       //         """"""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""          
/////////SUM INDIVIDUAL SAVINGS & WITHDRAWALS  SO YOU CAN GET GEN BALALNCE
////////////THIS IS TO SUM savings
$total_save1 = mysqli_query($connect, "SELECT SUM(savings) as total FROM weekly_allloan WHERE codename='$telephone'");      
while  ($row1 = mysqli_fetch_array($total_save1)){
$summation_save1 = $row1['total'];                          
   }
   
   
////////////THIS IS TO SUM withdrawsavings
$total_withdrawsavings1 = mysqli_query($connect, "SELECT SUM(withdrawsavings) as total FROM weekly_allloan WHERE codename='$telephone'");      
while  ($row2 = mysqli_fetch_array($total_withdrawsavings1)){
        $summation_withdrawsavings1 = $row2['total'];                          
   }
   $indbalsavings =  $summation_save1 - $summation_withdrawsavings1;         
   
//         """"""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""          
 
   
   
   
   
   
   //         """"""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""          
/////////SUM GENERAL SAVINGS & WITHDRAWALS  SO YOU CAN GET GEN BALALNCE
////////////THIS IS TO SUM savings
$total_save = mysqli_query($connect, "SELECT SUM(savings) as total FROM weekly_allloan");      
while  ($row1 = mysqli_fetch_array($total_save)){
$summation_save = $row1['total'];                          
   }
   
   
////////////THIS IS TO SUM withdrawsavings
$total_withdrawsavings = mysqli_query($connect, "SELECT SUM(withdrawsavings) as total FROM weekly_allloan");      
while  ($row2 = mysqli_fetch_array($total_withdrawsavings)){
        $summation_withdrawsavings = $row2['total'];                          
   }
   $gen_balance_save =  $summation_save - $summation_withdrawsavings;         
   
//         """"""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""          
 
   
   
//#############"""""""""""""""""""""""""""""""""""""""""""""""""""""######################################"""""""""""""""""""""""""""""""""""""""""""          
/////////SUM GENERAL equity & WITHDRAWALS  SO YOU CAN GET GEN BALALNCE
////////////THIS IS TO SUM savings
$total_equity = mysqli_query($connect, "SELECT SUM(equity) as total FROM weekly_allloan");      
while  ($row1 = mysqli_fetch_array($total_equity)){
$summation_equity = $row1['total'];                          
   }
   
   
////////////THIS IS TO SUM withdrawsavings
$total_withdrawequity = mysqli_query($connect, "SELECT SUM(withdrawequity) as total FROM weekly_allloan");      
while  ($row2 = mysqli_fetch_array($total_withdrawequity)){
        $summation_withdrawequity = $row2['total'];                          
   }
   $gen_balance_equity =  $summation_equity - $summation_withdrawequity;         
   
//         """"""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""          

   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
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
   //*********************************||||||||||||||||****************************************************            
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
$sql_statement101 = "UPDATE members SET balance = '$total_status', weeklyindbal = '$balance' WHERE namee='$name'";
       $result29 = mysqli_query($connect, $sql_statement101); 
//       **************************||||||||||||||||***********************************************            

     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
   
$result2 = mysqli_query($connect, "UPDATE weekly_allloan SET genbalance = '$gen_balance', indbalance = '$balance', genbalsavings = '$gen_balance_save',  indbalsavings = '$indbalsavings', genbalequity = '$gen_balance_equity' WHERE id = '$id'");
         
    
  
if($result==true){

  $_SESSION['redirect_message_weekly435435'] = "<script type='text/javascript'> $(document).ready(function(){ 
swal({
         title: 'Success!',
         text: '$name Reversal Entry of  ".$parent1." Naira for weekly payment is successful. Please try to avoid errors',
         icon: 'success',
        buttons: {
            confirm : {text:'Ok',className:'sweet-orange'},
          
        },
        closeOnClickOutside: false
       })
  
}); </script>";

           '';  
           $id = "";
           if ($penalty1 == "penal") {
            echo  "<script> location.href = 'weekly_loan_statement.php?codename=$telephone&name=$name'; </script>";  
          } else {
             echo 'yes';  
          }
     
    
                } else {
       echo "<script type='text/javascript'> $(document).ready(function(){ 
swal({
         title: 'Error!',
         text: 'Application has been tempered with!!',
         icon: 'error',
        buttons: {
            confirm : {text:'Ok',className:'sweet-orange'},
          
        },
        closeOnClickOutside: false
       })
  
}); </script>";

    } 

    
    
    
                }
                      
}   
//   $sql_state1 = "UPDATE allloan SET waver = '1' WHERE codename = '$codename' AND disburseloan > 1 AND remarks = 'loan disbursement'";
//             $result1 = mysqli_query($connect, $sql_state1);
//       if($result1 == true){
//           echo 'yes';
//       }

