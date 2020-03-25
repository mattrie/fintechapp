<?php
session_start();
 if(empty($_SESSION['id_staff'])){
//         echo "<script>alert('You must first login');</script>";
          echo "<script>alert('You must first login');
         window.location = 'staff_login.php';</script>";
 }
    include 'connection.php';
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Daily Payment of Loan</title>
    <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 10]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <meta name="keywords" content="bootstrap, bootstrap admin template, admin theme, admin dashboard, dashboard template, admin template, responsive" />
    <meta name="author" content="Codedthemes" />
    <!-- Favicon icon -->
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
    <!-- waves.css -->
    <link rel="stylesheet" href="assets/pages/waves/css/waves.min.css" type="text/css" media="all">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap/css/bootstrap.min.css">
    <!-- waves.css -->
    <link rel="stylesheet" href="assets/pages/waves/css/waves.min.css" type="text/css" media="all">
    <!-- themify icon -->
    <link rel="stylesheet" type="text/css" href="assets/icon/themify-icons/themify-icons.css">
    <!-- font-awesome-n -->
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome-n.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <!-- scrollbar.css -->
    <link rel="stylesheet" type="text/css" href="assets/css/jquery.mCustomScrollbar.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    
    
    
    
            <!-- Script -->
    <script src='jquery-3.1.1.min.js' type='text/javascript'></script>

    <!-- jQuery UI -->
     
    <link href='jquery-ui.min.css' rel='stylesheet' type='text/css'>
    <script src='jquery-ui.min.js' type='text/javascript'></script>
        
        
          <!--Boostrap & family-->
 <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
 <!--<link rel="stylesheet" href="maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">-->
 
 
  <script src="maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  
      <script>
        window.addEventListener('load', function() {
         document.querySelector('input[type="file"]').addEventListener('change', function() {
              if (this.files && this.files[0]) {
               var img = document.querySelector('img');  // $('img')[0]
               img.src = URL.createObjectURL(this.files[0]); // set src to blob url
               img.onload = imageIsLoaded;
              }
         });
        });

       
     </script>
    
</head>


 <?php
//         if(isset($_POST['reset'])){
//             @header("location:staff_staff_payment.php ");
//         }
    //    ob_start();
    //session_start();
   

      ////////////////////////UPDATE///////////////////////////////////////   
    ///////////////////////////lets upload the file first/////////////////////////////////////////////                      
          if(!empty($_FILES['fileToUpload']['name'])){
               
         $target_dir = "images/";// this is the directory to upload to
                        
                   //get file name and set to target directory
               $target_file = @($target_dir . basename($_FILES["fileToUpload"]["name"]));

              @($getfile_name = $_FILES['fileToUpload']['name']);
              @($getfile_size = $_FILES['fileToUpload']['size']);
              @($getfile_tmp_dir = $_FILES['fileToUpload']['tmp_name']);
              @($getfile_type = $_FILES['fileToUpload']['type']);
              @($identifyFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION)));


    //        if($identifyFileType == "jpg" || $identifyFileType == "png" || $identifyFileType == "jpeg")
    // {           

    //              if($getfile_size < 2097152) {
    //            
    //                    // Check if file already exists
    //                     if (!file_exists($target_file)) {  
             move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
               } else {
                       if(isset($_POST['imge'])){
                        $images = $_POST['imge'];
                        @$target_file = $images;         
                       }
                   
                     }
                 
                             if(isset($_POST['pay'])){
                                   $name = strtoupper($_POST['name']);
                                   
                              if($name != ""){ 
                              $parent1 = $_POST['parent'];//repayment
                             $parent2 = str_replace(",", "", $parent1);
                                $telephone = $_POST['telephone'];//codename
                                 $loan_type = $_POST['loan_type'];
                             $group_name = $_POST['group_name'];
                                $backdate = $_POST['backdate']; 
                                 @$pay_pen = $_POST['pay_pen'];   
                            if($backdate == ""){
                                $date = date("jS F Y");
                            } else {
                                $date = $output_closedate = date('jS F Y', strtotime($backdate)); 
                            } 
                          
//           !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!                 
                             //GET NUMBER OF MONTHS & DAYS LEFT
//                     $date_test =  date('Y-m-d', strtotime($date));
                    $dated = strtotime("$date");
                    
           $remaining = time() - $dated;
                ///////COUNT ONLY DAYS
        $days_remaining = floor($remaining / 86400);  
  //           !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!     
        
        if($days_remaining > 1){
  echo "<script>alert('You are not permitted to post any money collected less than a day backwards. Please, contact the admin!!!')</script>"; 
                 
        } else {
        
        
                                $month = date("F");
                                $year = date("Y");
                                $regnum = strtoupper($_POST['regnum']) ;//district 
                            $interest = $_SESSION['interest'];
                            
                   $available_blance = $_SESSION['available_blance'];
               //GET THE INTEREST RATE TO ADD
                $amt_disburseloan = $_SESSION['amt_disburseloan'];
                 $perc_int = $interest / $amt_disburseloan;
            $with_interest  = $available_blance * $perc_int;
            $bal_with_interest  = $with_interest + $available_blance;
              if($parent2 > $bal_with_interest){
                   echo "<script>alert('No outstanding loan up to: ". number_format($parent2)." Naira for codename: $telephone')</script>"; 
               } else {
               //THIS ACCURATELY DEDUCTS THE INTEREST FROM THE AMOUNT INSERTED WITH 11( use x to do the maths)      
                           $interest_to_revenue = $parent2 / 21 ;
                         $parent = $parent2 - $interest_to_revenue;
           if($pay_pen == "P"){  
      $result_revenue = mysqli_query($connect, "INSERT INTO revenuexp (remaks, revenue, date, month, year) VALUES('$name daily Penalty', '$parent2', '$date','$month','$year')");              
             $parent = $parent2; 
         $interest_to_revenue = $parent2;  
             $balance = 0;
           
          
       //INSERT RECORD 1
        date_default_timezone_set("Africa/Lagos");
                        $time_stamp = date("h:ia");  
       $time_stamp1  = date("h:ia", strtotime($time_stamp));   
                         
                 $staff_name = $_SESSION['staff_full_name'];            
 $sql_statement = "INSERT INTO allloan (name, type, remarks, repay, interest_pay, codename, date, month, year, district, collector, timestamp, dob) VALUES ('$name', '$loan_type', 'Penalty Paid', '$parent', '0','$telephone', '$date', '$month', '$year', '$regnum', '$staff_name', '$time_stamp1', '$group_name')";
                     $result = mysqli_query($connect, $sql_statement); 
                      
               
                     
                     ////SUM INTEREST payment           
                $interest_pay = mysqli_query($connect, "SELECT SUM(interest_pay) as total FROM allloan WHERE codename = '$telephone'");      
              while($row1 = mysqli_fetch_array($interest_pay)){
              $sum_interest_pay = $row1['total'];                          
                   }     
                     
                $interest_reduce  =  $interest - $sum_interest_pay;
                     
              ////GET THE REMAINING BALANCE OF LOAN FOR AN INDIVIDUAL
                       $summation_loan2 = "";
                       $summation_pay2 = "";
                       
                       ///////THIS IS TO GET THE INDIVIDUAL BALANCE
                        ////////////THIS IS TO SUM LOAN
                        $code_loan = mysqli_query($connect, "SELECT SUM(disburseloan) as total FROM allloan WHERE codename = '$telephone'");      
                          while  ($row = mysqli_fetch_assoc($code_loan)){
                         $summation_loan2 = $row['total']; 
//                           $plus_interest = $row['interest'];  
                          }
                          
//                           $summation_loan2 =  $summation_loan3 + $plus_interest;
                            
                ////////////THIS IS TO SUM PAYMENTS
                $total_payments2 = mysqli_query($connect, "SELECT SUM(repay) as total FROM allloan WHERE codename='$telephone'");      
              while  ($row1 = mysqli_fetch_array($total_payments2)){
              $summation_pay2 = $row1['total'];                          
              }
                    
        $sql_sum_repay = mysqli_query($connect, "UPDATE allloan SET repay_sum = '$summation_pay2' WHERE disburseloan > 1 AND codename='$telephone' AND remarks = 'loan disbursement'");         
                  
              $balance =  $summation_loan2 - $summation_pay2;
              
              
              ////////GET ALL REVERSAL PAYMENT TO MINUS FROM
               $total_payments33 = mysqli_query($connect, "SELECT SUM(disburseloan) as total FROM allloan WHERE codename='$telephone' AND remarks = 'Reversal Entry'");      
              while  ($row1 = mysqli_fetch_array($total_payments33)){
                   $summation_reverse2 = $row1['total']; 
                   
              }
              
                   $summation_pay_real = $summation_pay2 - $summation_reverse2;
              
              
              
                //GET LAST ID  
               $get_last_id = mysqli_query($connect, "SELECT * FROM allloan");      
                          while  ($row = mysqli_fetch_assoc($get_last_id)){
                          $id = $row['id'];                           
                          }
                   
                     
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
                    
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   
                     
           $result2 = mysqli_query($connect, "UPDATE allloan SET genbalance = '$gen_balance', repaycumm = '$summation_pay_real', indbalance = '$balance', interest_reduce = $interest_reduce WHERE id = '$id'");
                 
           
           
          //           UPDATE dailyindbal FOR MEMEBERS DB TO AUTO-DETECT PENALTY
        $result222 = mysqli_query($connect, "UPDATE members SET dailyindbal = '$balance', dailycode = '$telephone' WHERE namee = '$name'");
           
          ////UPDATE dailyindbal FOR allloan DB TO AUTO-DETECT PENALTY
          
        $result299 = mysqli_query($connect, "UPDATE allloan SET dailyindbal = '$balance' WHERE codename = '$telephone' AND disburseloan > 2");
             
        
             $_SESSION['redirect_message_staff'] = "<script>alert('$name has successfully paid ".number_format($parent)." Naira. ". number_format($interest_to_revenue)." has been moved to revenue account');</script>";  
                                      
                                       $id = "";
//          header("location:staff_payment.php?codename=$telephone &name=$name");  
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          } else {
         $result_revenue = mysqli_query($connect, "INSERT INTO revenuexp (remaks, revenue, date, month, year) VALUES('$name daily interest', '$interest_to_revenue', '$date','$month','$year')");              
    
                               
                                @$target_file = $images;
                  //INSERT RECORD 1
        date_default_timezone_set("Africa/Lagos");
                        $time_stamp = date("h:ia");  
       $time_stamp1  = date("h:ia", strtotime($time_stamp));   
                         
                 $staff_name = $_SESSION['staff_full_name'];            
 $sql_statement = "INSERT INTO allloan (name, type, remarks, repay, interest_pay, codename, date, month, year, district, collector, timestamp, dob) VALUES ('$name', '$loan_type', 'loan repayment', '$parent2', '$interest_to_revenue','$telephone', '$date', '$month', '$year', '$regnum', '$staff_name', '$time_stamp1', '$group_name')";
                     $result = mysqli_query($connect, $sql_statement); 
                      
               
                     
                     ////SUM INTEREST payment           
                $interest_pay = mysqli_query($connect, "SELECT SUM(interest_pay) as total FROM allloan WHERE codename = '$telephone'");      
              while($row1 = mysqli_fetch_array($interest_pay)){
              $sum_interest_pay = $row1['total'];                          
                   }     
                     
                $interest_reduce  =  $interest - $sum_interest_pay;
                     
              ////GET THE REMAINING BALANCE OF LOAN FOR AN INDIVIDUAL
                       $summation_loan2 = "";
                       $summation_pay2 = "";
                       
                       ///////THIS IS TO GET THE INDIVIDUAL BALANCE
                        ////////////THIS IS TO SUM LOAN
                        $code_loan = mysqli_query($connect, "SELECT SUM(disburseloan) as total FROM allloan WHERE codename = '$telephone'");      
                          while  ($row = mysqli_fetch_assoc($code_loan)){
                         $summation_loan2 = $row['total']; 
//                           $plus_interest = $row['interest'];  
                          }
                          
//                           $summation_loan2 =  $summation_loan3 + $plus_interest;
                            
                ////////////THIS IS TO SUM PAYMENTS
                $total_payments2 = mysqli_query($connect, "SELECT SUM(repay) as total FROM allloan WHERE codename='$telephone'");      
              while  ($row1 = mysqli_fetch_array($total_payments2)){
              $summation_pay2 = $row1['total'];                          
              }
                    
        $sql_sum_repay = mysqli_query($connect, "UPDATE allloan SET repay_sum = '$summation_pay2' WHERE disburseloan > 1 AND codename='$telephone' AND remarks = 'loan disbursement'");         
                  
              $balance =  $summation_loan2 - $summation_pay2;
              
              
              ////////GET ALL REVERSAL PAYMENT TO MINUS FROM
               $total_payments33 = mysqli_query($connect, "SELECT SUM(disburseloan) as total FROM allloan WHERE codename='$telephone' AND remarks = 'Reversal Entry'");      
              while  ($row1 = mysqli_fetch_array($total_payments33)){
                   $summation_reverse2 = $row1['total']; 
                   
              }
              
                   $summation_pay_real = $summation_pay2 - $summation_reverse2;
              
              
              
                //GET LAST ID  
               $get_last_id = mysqli_query($connect, "SELECT * FROM allloan");      
                          while  ($row = mysqli_fetch_assoc($get_last_id)){
                          $id = $row['id'];                           
                          }
                   
                     
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
                    
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   
                     
           $result2 = mysqli_query($connect, "UPDATE allloan SET genbalance = '$gen_balance', repaycumm = '$summation_pay_real', indbalance = '$balance', interest_reduce = $interest_reduce WHERE id = '$id'");
                 
           
           
          //           UPDATE dailyindbal FOR MEMEBERS DB TO AUTO-DETECT PENALTY
        $result222 = mysqli_query($connect, "UPDATE members SET dailyindbal = '$balance', dailycode = '$telephone' WHERE namee = '$name'");
     
             ////UPDATE dailyindbal FOR allloan DB TO AUTO-DETECT PENALTY
          
        $result299 = mysqli_query($connect, "UPDATE allloan SET dailyindbal = '$balance' WHERE codename = '$telephone' AND disburseloan > 2");
             
           
                          if($result2==true){
    $_SESSION['redirect_message_staff'] = "<script>alert('$name has successfully paid ".number_format($parent)." Naira. To balance: ".number_format($balance)." Naira. ". number_format($interest_to_revenue)." has been moved to revenue account ');</script>";
                                     '';  
                                     $id = "";
//         header("location:staff_payment.php?codename=$telephone &name=$name");   
      echo  "<script> location.href = 'staff_payment.php?codename=$telephone&name=$name'; </script>";     
                                    } else {
                           echo "<script>alert('Application has been tempered with!!');</script>";
                         } 
                        } //This one is penalty check b4 submit
                       } //This one is for no outstanding
                       }//This one is to stop posting after a day
                      } else {
                            echo "<script>alert('You must enter name ooooo!!')</script>";
                        }    
                        
                     }    
    

                        
         //////////////////////////////DELETE////////////////////////////////////////////
                    if(isset($_POST['dele'])){
                                
                    
                                $name = strtoupper($_POST['name']);
                                $regnum = strtoupper($_POST['regnum']) ;
                                $address = $_POST['address'];
                                $dob = $_POST['dob'];
                                $class = $_POST['class'];
                                $parent = strtoupper($_POST['parent']);
                                $telephone = $_POST['telephone'];
                                $mail = $_POST['mail'];
                                $religion = $_POST['religion'];
                                $login_id = $_POST['loginid']; 
                                $id = $_POST['idd'];
                                
                            
                     //Delete RECORD from fees
      @$resultt = mysqli_query($connect, "DELETE FROM student_fees WHERE name ='$name'");
      
           //Delete RECORD from school_fees_breakdown
      @$answer = mysqli_query($connect, "DELETE FROM school_fees_breakdown WHERE namee ='$name'");
              
                        //then Delete record in student database
      @$sql_statement = "DELETE FROM student WHERE id = '$id'";
      
                 
                     $result = mysqli_query($connect, $sql_statement); 
                                    if($result==true){
                                   echo "<script>alert('$name has been successfully deleted');</script>";
                                    }
                          
                         } else {
                            echo ""; //leave blank 
                        }    
                        

    ?>
          
<body>
      <?php
        if(isset($_POST['move'])){
                $names = "";
               $get_code = $_POST['telephone']; 
                $sql_state1 = "SELECT * FROM allloan WHERE disburseloan > 1 AND remarks = 'loan disbursement' AND codename = '$get_code'";
            $result1 = mysqli_query($connect, $sql_state1);
      
            while ($row = mysqli_fetch_assoc($result1)) {  
                $names = $row["name"];
              $closingdate = $row["enddate"];
              $loan_type = $row["type"];
              $disburseloan = $row["indbalance"];
              $check_codename = $row["codename"];
              $interest = $row["interest"]; 
            }
            
             if($names == ""){
                       echo "<script>alert('Codename not detected!!!, cannot link to personal ledger.')</script>";    
                   } else {
//          header("location:staff_payment.php?codename=".$get_code."&name=".$names.""); 
      echo  "<script> location.href = 'staff_payment.php?codename=$get_code&name=$names'; </script>";     
         
                } 
               
            }
       
       ?> 
    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="loader-track">
            <div class="preloader-wrapper">
                <div class="spinner-layer spinner-blue">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>

                <div class="spinner-layer spinner-yellow">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>

                <div class="spinner-layer spinner-green">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pre-loader end -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">
            <?php
                include 'staff_nav1.php';
            ?>

            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <?php
                include 'staff_nav2.php';
                  ?>
                    <div class="pcoded-content">
      
                        <!-- Page-header start -->
                        <div class="page-header">
                            <div class="page-block">
                                <div class="row align-items-center">
                                    <div class="col-md-8">
                                        <div class="page-header-title">
                                            <h5 class="m-b-10">LOAN REPAYMENT</h5>
                                            <p class="m-b-0">Repay Loan for Daily</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <a href="staff_home.php"> <i class="fa fa-home"></i> </a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="staff_home.php">Dashboard</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Page-header end -->
                        
                        
                        
                        
                      
                  <div class="pcoded-inner-content">
                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <!-- Page-body start -->
                                    <div class="page-body">
                                         <div class="row">
                                            <div class="col-sm-12">
                                                <!-- Basic Form Inputs card start -->
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5>DAILY LOAN REPAYMENT</h5>
                                                        <!--<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>-->
                                                    </div>
                                                    <div class="card-block">
                                      <!--====================SEARCHING STUDENT-->
           <form action="staff_payment.php " method="POST" enctype="multipart/form-data" >
             
    <!--<input   type="text" name="telephone" id="codename" placeholder="select Code_name" maxlength="10" required=""  >-->

               <center>
         <div class="input-group mb-3">
    <input type="text" class="form-control" id="codename" name="telephone" placeholder="Search Customer To Pay Loan with Codename" required=""  >
    <div class="input-group-append">
      <button class="btn btn-warning" id="btnsearch" name="btnsrch" type="submit">SEARCH</button>  
     </div>
  </div>
                   
   
        </center>  
             
        
          <!--///////////////////////////////////////////-->        
          
          <?php
//          session_start();
          $codename = $disburseloan = $dailypayment = $true = $available_blance = $check_codename = "";
   $get_name = $date = $images = $interest = $id = $name = $days_remaining = $remain_months = $remain_days = $regnum = $loan_type = $output_closedate  = $closingdate = $address = $dob = $class = $parent = $telephone = $mail = $religion = $login_id = "";
      
   if (isset($_POST['btnsrch'])){
                       
               
                $codename = $_POST['telephone'];
        $sql_state1 = "SELECT * FROM allloan WHERE  disburseloan > 1 AND remarks = 'loan disbursement' AND codename = '$codename'";
            $result1 = mysqli_query($connect, $sql_state1);
      
            while ($row = mysqli_fetch_assoc($result1)) {  
                $names = $row["name"];
                $startdate = $row["startdate"];
              $closingdate = $row["enddate"];
              $loan_type = $row["type"];
              $disburseloan = $row["indbalance"];
              $check_codename = $row["codename"];
              $interest = $row["interest"]; 
          $amt_disburseloan = $row["disburseloan"];
             
            }
            $_SESSION['amt_disburseloan'] = $amt_disburseloan; 
            
                  $_SESSION['interest'] = $interest;
           
            if($check_codename != ""){         
       $sql_state = "SELECT * FROM members WHERE namee = '$names'";
            $result = mysqli_query($connect, $sql_state);
      
            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row["id"];
//                echo $id;
                $name = $row["namee"];
                $regnum = $row["registration_num"];
                $address = $row["addresss"];
                $dob = $row["dob"];
                $class = $row["classs"];
                $parent = $row["parentt"];
                $telephone = $row["telephone"];
                $mail = $row["mail"];
                $religion = $row["religion"];
                $login_id = $row["login_id"];
                $images = $row["imagess"];
                $date = $row["level"];
                
              }
              
            ////////GET THE LAST BALANCE with $codename last row
         $sql_state3 = "SELECT * FROM allloan WHERE name = '$name' AND codename = '$codename'";
            $result3 = mysqli_query($connect, $sql_state3);
      
            while ($row = mysqli_fetch_assoc($result3)) {   
              $available_blance = $row["indbalance"];
//              $loan_type = $row["type"];
            }
             $_SESSION['available_blance'] = $available_blance;
        
             
             //////////////========================
           
              ///////////////////////////////////////
                 //GET NUMBER OF MONTHS & DAYS LEFT
                      $dated1 = strtotime("$startdate");
                    $dated2 = strtotime("$closingdate");
                    
            $loan_days = $dated2 - $dated1;
          
       $loan_days2  = floor($loan_days/ 86400);  
           $loan_days3 = $loan_days2  - 1;
             /////////=============================
             
            /////////THIS IS TO GET HOW MUCH SHOULD BE PAID DAILY
                 $disburseloan1  =  $interest + $disburseloan;
                $dailyp = $amt_disburseloan / $loan_days3;
               $dailypayment = ceil($dailyp);
            $output_closedate = date('d-M-Y', strtotime($closingdate));  
            
              ///////////////////////////////////////
                 //GET NUMBER OF MONTHS & DAYS LEFT
                    $dated = strtotime("$closingdate");
                    
            $remaining = $dated - time();
           $remain_days = date('d',$remaining) ;
            
           
                 $getmonth = date('m',$remaining);
                $remain_months = $getmonth - 1;
                 
                
                ///////COUNT ONLY DAYS
        $days_remaining = floor($remaining / 86400)." days left";     
        
      
            } else {
                   echo "<script>alert('Wrong code_name inserted. Insert correct code')</script>";
            
                   $codename = "";
            }
             $true = "true";
        
        }
        
        
        
        
        
        
        
        
        
        
        
        
        
         if(isset($_GET['codename'])){
             $codename = $_REQUEST['codename'];
         $sql_state1 = "SELECT * FROM allloan WHERE  disburseloan > 1 AND remarks = 'loan disbursement' AND codename = '$codename'";
            $result1 = mysqli_query($connect, $sql_state1);
      
            while ($row = mysqli_fetch_assoc($result1)) {  
                $names = $row["name"];
                 $startdate = $row["startdate"];
              $closingdate = $row["enddate"];
              $loan_type = $row["type"];
              $disburseloan = $row["indbalance"];
              $check_codename = $row["codename"];
              $interest = $row["interest"]; 
           $amt_disburseloan = $row["disburseloan"];
             
            }
            $_SESSION['amt_disburseloan'] = $amt_disburseloan; 
            
                  $_SESSION['interest'] = $interest;
           
            if($check_codename != ""){         
       $sql_state = "SELECT * FROM members WHERE namee = '$names'";
            $result = mysqli_query($connect, $sql_state);
      
            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row["id"];
//                echo $id;
                $name = $row["namee"];
                $regnum = $row["registration_num"];
                $address = $row["addresss"];
                $dob = $row["dob"];
                $class = $row["classs"];
                $parent = $row["parentt"];
                $telephone = $row["telephone"];
                $mail = $row["mail"];
                $religion = $row["religion"];
                $login_id = $row["login_id"];
                $images = $row["imagess"];
                $date = $row["level"];
                
              }
              
            ////////GET THE LAST BALANCE with $codename last row
         $sql_state3 = "SELECT * FROM allloan WHERE name = '$name' AND codename = '$codename'";
            $result3 = mysqli_query($connect, $sql_state3);
      
            while ($row = mysqli_fetch_assoc($result3)) {   
              $available_blance = $row["indbalance"];
//              $loan_type = $row["type"];
            }
             $_SESSION['available_blance'] = $available_blance;
              
             
             
             
              //////////////========================
           
              ///////////////////////////////////////
                 //GET NUMBER OF MONTHS & DAYS LEFT
                      $dated1 = strtotime("$startdate");
                    $dated2 = strtotime("$closingdate");
                    
            $loan_days = $dated2 - $dated1;
          
       $loan_days2  = floor($loan_days/ 86400);  
         $loan_days3 = $loan_days2  - 1;
             /////////=============================
            
           
           
            /////////THIS IS TO GET HOW MUCH SHOULD BE PAID DAILY
                 $disburseloan1  =  $interest + $disburseloan;
                $dailyp = $amt_disburseloan / $loan_days3;
               $dailypayment = ceil($dailyp);
            $output_closedate = date('d-M-Y', strtotime($closingdate));  
            
              ///////////////////////////////////////
                 //GET NUMBER OF MONTHS & DAYS LEFT
                    $dated = strtotime("$closingdate");
                    
            $remaining = $dated - time();
           $remain_days = date('d',$remaining) ;
            
           
                 $getmonth = date('m',$remaining);
                $remain_months = $getmonth - 1;
                 
                
                ///////COUNT ONLY DAYS
        $days_remaining = floor($remaining / 86400)." days left";     
        
      
            } else {
                   echo "<script>alert('Wrong code_name inserted. Insert correct code')</script>";
            
                   $codename = "";
            }
             $true = "true";
        
        }
        
        
          ?>
          
    
       
     </form>  
                                
                                      
                                      
                   <form action="staff_payment.php" method="POST" enctype="multipart/form-data" >  
              <input  class="form-control" type="hidden" name="telephone" id="codename" value="<?php echo $codename;?>" readonly="" maxlength="10" required>
              
         <input type="submit" value="View Ledger" name="move" /><br> 
         </form>                      
                                      
                                      
                                      
                                      
                        <form action="staff_payment.php" method="POST" enctype="multipart/form-data">
                                                          <center> 
                                                            <div  style="width:140px; height:140px;" class="mb-5">
                                                                  <img id="img" src="<?php echo $images;?>" alt="-------------------**MEMEBER PHOTO**----------------------------------"  style="border: 4px #99ff99 solid; width:140px; height:140px;" >
                            <!--<label style="margin-left: 10px; margin-top: 80px;">To Revenue</label><label style="font-family: Webdings;  font-size: 26px; ">8</label>-->
                          <!--<input type="number" name="interest" placeholder="pay Interest" style=""/>-->  
                            <input type="hidden" name="idd" value="<?php echo $id;?>" />   
                              <input type="hidden" name="imge" value="<?php echo $images;?>" /> 
                                                             </div>
                                                          </center>  
                                                          
                                                            
                                                            <div class="form-group row">                                                                 
                                                                <label class="col-sm-2 col-form-label">Name:</label>
                                                                <div class="col-sm-10">
                                                                      <input type="hidden" id="duplicate_name" />      
                                                                    <input type="text" class="form-control" placeholder="Name"   id="nam" type="text" name="name" value="<?php echo $name;?>"  maxlength="50" readonly="" style="text-transform: uppercase;" required="">
                                                                </div>
                                                            </div>
                                                              <input type="hidden" name="shadow" value="<?php echo $get_name;?>"/>
                                                              
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Unit District:</label>
                                                                <div class="col-sm-10">
                                                                     <input type="text" class="form-control" placeholder="District"  name="regnum" value="<?php echo $regnum;?>"  maxlength="12" readonly=""  style="text-transform: uppercase;" required="">
                                                                </div>
                                                            </div>
                                                              
                                                              
                                                              
                                                               <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Loan Collected</label>
                                                                <div class="col-sm-10">
                                                                     <input type="text" class="form-control" placeholder="Loan Collected"  value="<?php echo @number_format($amt_disburseloan);?>"  maxlength="12" readonly=""  style="text-transform: uppercase;" required="">
                                                                </div>
                                                            </div>
                                                              
                                                              
                                                                 <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Remaining Balance</label>
                                                                <div class="col-sm-10">
                                                                       <input type="text" class="form-control" placeholder="Remaining Balance"  value="<?php echo @number_format($available_blance);?>"  maxlength="12" readonly=""  style="text-transform: uppercase;" required="">
                                                                </div>
                                                            </div>
                                                              
                                                              
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Group Name:</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control" placeholder="Group Name" name="group_name" value="<?php echo $dob;?>"  maxlength="12" readonly=""  style="text-transform: uppercase;" required="">
                                                                </div>
                                                            </div>
                                                              
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Payment Type:</label>
                                                                <div class="col-sm-10">
                                                                        <select name="loan_type" class="form-control" required="">
                                          <option value="Daily Payment">Daily Payment</option>

                                                                           </select>
            
                                                                </div>
                                                            </div>
                                                              <br>
                                                              <br>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Enter Amount to Pay:</label>
                                                                <div class="col-sm-10 input-group">
<!--                                                                   <select name="pay_pen">
                            <option value="" selected="" hidden="" disabled="">-</option>
                            <option value="P">P</option>
                                                                   </select> &nbsp;&nbsp; -->
                                                                   <input type="text" onkeypress="return CheckNumeric()" onkeyup="FormatCurrency(this)" class="form-control"  placeholder="enter Payment" required=""  name="parent" maxlength="20" >
                          

                           <!--<label style="font-family: Webdings; margin-left: 15px; font-size: 26px;">7</label>To debt Payment-->
                                                               </div>
                                                            </div>
                                                              
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Daily Repayment:</label>
                                                                <div class="col-sm-10">
                                                                 <input  type="text" name="repay_plan"  placeholder="Repayment Plan" value="<?php echo @number_format($dailypayment) ;?>"  readonly="true">     
                                                                </div>
                                                            </div>
                                                              
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Expiry Date:</label>
                                                                <div class="col-sm-10">
                                                                   <input  type="text" name="closingdate" placeholder="Expiry Date" value="<?php echo $output_closedate;?>"  readonly="true" required="">
                                                                </div>
                                                            </div>
                                                              
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Days Remaining:</label>
                                                                <div class="col-sm-10">
                                                                        <label style="font-weight: bold; font-size: 18px;"><?php echo $days_remaining;?></label>
                                                                </div>
                                                            </div>
                                                              
                                                              
                                                                <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Click to Back Date:</label>
                                                                <div class="col-sm-10">
                                                                        <input  type="text" name="backdate"  placeholder="IF Back Date is True" onfocus="(this.type='date')"  >
                                                                </div>
                                                            </div>
                                                              
                                                              
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Code Name:</label>
                                                                <div class="col-sm-10">
                                                                    <input  class="form-control" type="text" name="telephone" id="codename" value="<?php echo $codename;?>" readonly=""  maxlength="10" required="">
                                                                </div>
                                                            </div>
                                                          
                                                              
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label"></label>
                                                              
                                                                <div class="col-sm-10 mx-auto">
                                                                     <input style="margin-left:100px; padding: 8px; width: 25%; font-weight: bold; background-color:lightgreen; " class="btn" id="update"  type="submit" name="pay"  value="PAY" />   
                                                                         <a style="margin-left:40px; border-radius: 10px;" class="btn btn-dark" href="staff_payment.php">Reset</a>
                                                                </div>
                                                              
                                                            </div>
                                                        </form> 
                                                  </div>
                                                </div>
                                                <!-- Basic Form Inputs card end -->
                                            </div>
                                        </div>
     
                                    <!-- Page-body end -->
                                </div>
                                    
                                <div id="styleSelector"> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Warning Section Starts -->
    <!-- Older IE warning message -->
    <!--[if lt IE 10]>
<div class="ie-warning">
    <h1>Warning!!</h1>
    <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
    <div class="iew-container">
        <ul class="iew-download">
            <li>
                <a href="http://www.google.com/chrome/">
                    <img src="assets/images/browser/chrome.png" alt="Chrome">
                    <div>Chrome</div>
                </a>
            </li>
            <li>
                <a href="https://www.mozilla.org/en-US/firefox/new/">
                    <img src="assets/images/browser/firefox.png" alt="Firefox">
                    <div>Firefox</div>
                </a>
            </li>
            <li>
                <a href="http://www.opera.com">
                    <img src="assets/images/browser/opera.png" alt="Opera">
                    <div>Opera</div>
                </a>
            </li>
            <li>
                <a href="https://www.apple.com/safari/">
                    <img src="assets/images/browser/safari.png" alt="Safari">
                    <div>Safari</div>
                </a>
            </li>
            <li>
                <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                    <img src="assets/images/browser/ie.png" alt="">
                    <div>IE (9 & above)</div>
                </a>
            </li>
        </ul>
    </div>
    <p>Sorry for the inconvenience!</p>
</div>
<![endif]-->
    <!-- Warning Section Ends -->

    
   
    
    
    <!-- Required Jquery -->
    <script type="text/javascript" src="assets/js/jquery/jquery.min.js "></script>
    <script type="text/javascript" src="assets/js/jquery-ui/jquery-ui.min.js "></script>
    <script type="text/javascript" src="assets/js/popper.js/popper.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap/js/bootstrap.min.js "></script>
    <!-- waves js -->
    <script src="assets/pages/waves/js/waves.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="assets/js/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- slimscroll js -->
    <script src="assets/js/jquery.mCustomScrollbar.concat.min.js "></script>

    <!-- menu js -->
    <script src="assets/js/pcoded.min.js"></script>
    <script src="assets/js/vertical/vertical-layout.min.js "></script>

    <script type="text/javascript" src="assets/js/script.js "></script>
    
    





                         <script>  // ////////Format number with commas/////////////////////////////////

                            function FormatCurrency(ctrl) {
                                //Check if arrow keys are pressed - we want to allow navigation around textbox using arrow keys
                                if (event.keyCode == 37 || event.keyCode == 38 || event.keyCode == 39 || event.keyCode == 40) {
                                    return;
                                }

                                var val = ctrl.value;

                                val = val.replace(/,/g, "")
                                ctrl.value = "";
                                val += '';
                                x = val.split('.');
                                x1 = x[0];
                                x2 = x.length > 1 ? '.' + x[1] : '';

                                var rgx = /(\d+)(\d{3})/;

                                while (rgx.test(x1)) {
                                    x1 = x1.replace(rgx, '$1' + ',' + '$2');
                                }

                                ctrl.value = x1 + x2;
                            }

                            function CheckNumeric() {
                                return event.keyCode >= 48 && event.keyCode <= 57 || event.keyCode == 46;
                            }

                  </script>

                     <!-- Script -->
                    <script type='text/javascript' >
                    $( function() {

                        $( "#autocomplete" ).autocomplete({
                            source: function( request, response ) {

                                $.ajax({
                                    url: "autocomplete.php",
                                    type: 'post',
                                    dataType: "json",
                                    data: {
                                        search: request.term
                                    },
                                    success: function( data ) {
                                        response( data );
                                    }
                                });
                            },
                            select: function (event, ui) {
                                $('#autocomplete').val(ui.item.label); // display the selected text
                                $('#selectuser_id').val(ui.item.value); // save selected id to input
                                return false;
                            }
                        });


                        //////////////////////////////////////////////////////////////////////////
                         $( "#codename" ).autocomplete({
                            source: function( request, response ) {

                                $.ajax({
                                    url: "codename.php",
                                    type: 'post',
                                    dataType: "json",
                                    data: {
                                        search: request.term
                                    },
                                    success: function( data ) {
                                        response( data );
                                    }
                                });
                            },
                            select: function (event, ui) {
                                $('#codename').val(ui.item.label); // display the selected text
                                $('#selectuser_id').val(ui.item.value); // save selected id to input
                                return false;
                            }
                        });




                //////////////////////////////////////////////////////////////////////////////////////////////////////
                        // Multiple select
                        $( "#multi_autocomplete" ).autocomplete({
                            source: function( request, response ) {

                                var searchText = extractLast(request.term);
                                $.ajax({
                                    url: "autocomplete.php",
                                    type: 'post',
                                    dataType: "json",
                                    data: {
                                        search: searchText
                                    },
                                    success: function( data ) {
                                        response( data );
                                    }
                                });
                            },
                            select: function( event, ui ) {
                                var terms = split( $('#multi_autocomplete').val() );

                                terms.pop();

                                terms.push( ui.item.label );

                                terms.push( "" );
                                $('#multi_autocomplete').val(terms.join( ", " ));
                ///////////////////////////////////////////////////////////////////////////////////////
                                // Id
                                var terms = split( $('#selectuser_ids').val() );

                                terms.pop();

                                terms.push( ui.item.value );

                                terms.push( "" );
                                $('#selectuser_ids').val(terms.join( ", " ));

                                return false;
                            }

                        });
                    });

                    function split( val ) {
                      return val.split( /,\s*/ );
                    }
                    function extractLast( term ) {
                      return split( term ).pop();
                    }



                        ///////////THIS IS TO CHANGE TO COMMAS 

                               /////////THIS IS TO CHECK BEFORE FINAL UPDATE////////
                              $(document).ready(function () {               
                        $("#update").click(function () {

                             ///////////////////////////////////////////////////////////////////

                       //////////////////////////////////////////////////////////// 



                               var  name_up = document.getElementById('nam').value;   
                        if (name_up === ""){
                            alert ("Search member to pay");
                           return false; 
                       } else {
                           return true;
                       }  
                                });

                         });





                             /////////THIS IS TO CHECK BEFORE FINAL DELETION////////
                              $(document).ready(function () {

                        $("#delete").click(function () {
                               var  name_del = document.getElementById('nam').value;   
                        if (name_del === ""){
                            alert ("Search member to delete first");
                        }   else {
                             var  del_check = confirm("You will loose all '"+name_del+"' information when you delete. DO YOU WISH TO CONTINUE?");

                                if(del_check===true){
                                    return true;
                                     } else {
                                         $('#nam').focus();
                                        return false;


                                     }
                                    }
                                });

                         });


                    </script> 


                <!--    <script>
                      //LINK TO GO VIEW STUDENT DATABASE
                      $(document).ready(function() {
                            var view_all      = $("#stud_db"); //LINK TO GO AND VIEW ALL DEBTORS   
                    $(view_all).click(function(e){ //Function LINK TO GO AND VIEW ALL DEBTORS button click
                        e.preventDefault();
                              window.location.href = "http://localhost/school/student_db.php";
                            }) ;
                      }) ;       
                   </script>         -->
    
    
   
    
    
</body>

</html>
