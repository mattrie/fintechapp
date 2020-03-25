<?php
session_start();

    include 'connection.php';
   $random_pin = rand(10, 10000);  
  
   
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
                 
                             if(isset($_POST['loan'])){
                                   $name = strtoupper($_POST['name']);
      
                               if($name != ""){ 
          // By  Adedokun Adewale Azeez 11th December 2020
                                $parent = str_replace(",", "", $_POST['parent']);
                                $telephone = $_POST['telephone'];//codename
                                 $interest = str_replace(",", "", $_POST['interest']);
                                 $pro_fee = $_POST['pro_fee'];
                                 $get_months = $_POST['get_months'];
                                 $equity = str_replace(",", "", $_POST['equity']); 
//                                   $group_name = $_POST['group_name'];
                                 $loan_type = $_POST['loan_type'];
                                 $figure = str_replace(",", "",$_POST['figure']);
                                 
                                  $insure_perc = str_replace(",", "", $_POST['insure_perc']);
                                 $insure_figure = str_replace(",", "", $_POST['insure_figure']);
                              
                             
                                $month = date("F");
                                $year = date("Y");
                               $regnum = strtoupper($_POST['regnum']) ; //district
                             $startdate =  $_POST['startdate'];
                             
                          if ($startdate == "") {
                                 $startdate = date("Y-m-d");
                             } 
                             
                               $date = date('jS F Y', strtotime($startdate));  
//       -----------------------------------------------------------
                     ////CALCULATE CLOSING DATE
                    $month_count =  31 *  $get_months;     
          $closedate  = date('Y-m-d', strtotime($startdate. ' + '.$month_count.' days'));
//       -----------------------------------------------------------
                          $get_code_result = "";
          $check_for_codename = "SELECT * FROM monthly_allloan WHERE codename = '$telephone'";
          $result_code = mysqli_query($connect, $check_for_codename);
          while($row = mysqli_fetch_assoc($result_code)){
              $get_code_result = $row['codename'];
          }
          
          
              if($get_code_result == ""){      
              ///////////INSERT FOR REVENUE
                          if($figure>1){
                          $to_revenue = $pro_fee ;
                          $collector_name = $_SESSION['staff_full_name'];   
                  if($collector_name == ""){
                     $collector_name = "admin"; 
                  }
                  
                      $_SESSION['collector_name'] = ""; 
   $sql_statement2 = "INSERT INTO revenuexp (remaks, category, type, revenue, date, date_format, month, year, collector) Values('$name processing fee for monthly loan', 'pro_fee_monthly',  'monthly', '$to_revenue', '$date','$startdate', '$month', '$year', '$collector_name')";
                     $result2 = mysqli_query($connect, $sql_statement2);            
                             } 
                         
           
                  
                             
             
//           $real_ind_payback = $parent + $figure;
                       //INSERT RECORD 1
           
    date_default_timezone_set("Africa/Lagos");
                        $time_stamp = date("h:ia");  
       $time_stamp1  = date("h:ia", strtotime($time_stamp)); 
                               $parent22 = $figure + $parent;
      $sql_statement = "INSERT INTO monthly_allloan (name, type, remarks, disburseloan, indbalance, interest, intno, monthno, codename, date, date_format, month, year, district, startdate, enddate, true_enddate, collector, timestamp, equity, insurance_in) VALUES ('$name', '$loan_type', 'loan disbursement', '$parent22', '$parent22', '$figure', '$interest', '$get_months', '$telephone', '$date', '$startdate', '$month', '$year', '$regnum', '$startdate', '$closedate', '$closedate', '$collector_name', '$time_stamp1', '$equity', '$insure_figure')";

      
      
                     
                  
      
      
      
      
      
                     $result = mysqli_query($connect, $sql_statement); 
//                  printf("Errormessage: %s\n", mysqli_error($connect));    
                     /////////SUM GENERAL REPAY & DISBURSE LOAN SO YOU CAN GET GEN BALALNCE
            ////////////THIS IS TO SUM PAYMENTS
                $total_payments = mysqli_query($connect, "SELECT SUM(repay) as total FROM monthly_allloan");      
//               printf("Errormessage: %s\n", mysqli_error($connect)); 
                while  ($row1 = mysqli_fetch_array($total_payments)){
              $summation_pay = $row1['total'];                          
                   }
                   
                   
             ////////////THIS IS TO SUM DISBURSE
                $total_disburse2 = mysqli_query($connect, "SELECT SUM(disburseloan) as total FROM monthly_allloan");      
              while  ($row2 = mysqli_fetch_array($total_disburse2)){
                        $summation_disburse = $row2['total'];                          
                   }
                   $gen_balance =  $summation_disburse - $summation_pay;  
                    
                   
                   
                   
                   
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
                   
                   
                     
           $result2 = mysqli_query($connect, "UPDATE monthly_allloan SET genbalance = '$gen_balance', genbalequity = '$gen_balance_equity' WHERE codename = '$telephone' AND indbalance > 0");
              
           
                         //           UPDATE monthlyenddate FOR MEMEBERS DB TO AUTO-DETECT PENALTY
        $result222 = mysqli_query($connect, "UPDATE members SET monthlyindbal = '$parent22', monthlyenddate = '$closedate', monthlycode = '$telephone' WHERE namee = '$name'");
        
           
              if(@$_SESSION['store_disburse_id'] != ""){
                 
                      $update_id = $_SESSION['store_disburse_id'];
                      
                       $status = "Approved";
          $result28 = mysqli_query($connect, "UPDATE request_loan SET status = '$status', approved_disburseloan = '$parent' WHERE id = '$update_id'");
         "<script>alert('Loan is now approved')</script>";   
               }
               
               
               
               
               
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
              
                     
                     
                     
                     
                     
                     
                     
                     
                     
                     
         
               
                if($result==true){
                     $month_pay = $parent + $figure;
                       $montlypayment = $month_pay / $get_months; 
                  $output_closedate = date('d-M-Y', strtotime($closedate));
                  $_SESSION['redirect_message_monthly_staff'] = "<script type='text/javascript'> $(document).ready(function(){ 
                swal({
                         title: 'Success!',
                         text: '$name has successfully borrowed  ".number_format($month_pay)." (plus interst rate) Naira. Payment period expires $output_closedate. Monthly payment is: ". number_format($montlypayment)." Naira. Codename for this loan is: $telephone. An Insurance of ".number_format($insure_figure)." Naira has been lodged for $name as well.',
                         icon: 'success',
                        buttons: {
                            confirm : {text:'Ok',className:'sweet-orange'},
                          
                        },
                        closeOnClickOutside: false
                       })
                  
                }); </script>";
          
                           '';  
                           $id = "";
                           $_SESSION['id'] = "";
                echo  "<script> location.href = 'staff_monthly_loan_statement.php?codename=$telephone&name=$name'; </script>";       
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
              
              } else {
                    echo "<script type='text/javascript'> $(document).ready(function(){ 
                swal({
                         title: 'Codename Duplicate!!',
                         text: 'Codename already exist in database. Retry to generate different or Abort if loan is already given',
                         icon: 'warning',
                        buttons: {
                            confirm : {text:'Ok',className:'sweet-orange'},
                          
                        },
                        closeOnClickOutside: false
                       })
                  
                }); </script>";
                   } 
            } else {
                  echo "<script type='text/javascript'> $(document).ready(function(){ 
                swal({
                         title: 'Name Check!',
                         text: 'You must enter name ooooo!!',
                         icon: 'warning',
                        buttons: {
                            confirm : {text:'Ok',className:'sweet-orange'},
                          
                        },
                        closeOnClickOutside: false
                       })
                  
                }); </script>";
              }          
          }    

//            

                        
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
              
           



<!DOCTYPE html>
<html>
  <head>
	  <title>Monthly Get Loan</title> 
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

<body>
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
                                            <h5 class="m-b-10">Monthly Disbursement</h5>
                                            <p class="m-b-0">Financial Summary</p>
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
                                   
     
     
     
     
     
         <!--=================== THIS IS THE FORM BOX-->
        <div class="card">
                                                    <div class="card-header">
                                                        <h5>WEEKLY DISBURSEMENT</h5>
                                                        <!--<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>-->
                                                    </div>
                                                    <div class="card-block">
          
        
          
          
          
           <!--====================SEARCHING STUDENT-->
           <form action="staff_monthly_get_loan.php" method="POST" enctype="multipart/form-data" >
              <center>
         <div class="input-group mb-3">
    <input type="text" class="form-control" id="autocomplete" name="srch" placeholder="Search Customer To Give Loan" required=""  value="<?php echo $_SESSION['store_disburse_name']?>" readonly="">
    <div class="input-group-append">
      <button class="btn btn-warning" id="btnsearch" name="btnsrch" type="submit">SEARCH</button>  
     </div>
  </div>
        </center>  
             
        
          <!--///////////////////////////////////////////-->        
          
          <?php
//          session_start();
   $get_name = $date = $images = $id = $name = $regnum = $address = $dob = $class = $parent = $telephone = $mail = $religion = $login_id = "";
    $req_name = $req_type = $req_request_disburseloan = $req_district = $req_startdate = $req_collector = "";   
   $state = $type = $value = $codename ="";
                     
                    
         if(isset($_GET['idd'])){
              $id = $_GET['idd'];
            $name = $_GET['name'];
            $req_type = $_GET['type'];
            $req_request_disburseloan = $_GET['request_disburseloan'];
            $regnum = $_GET['district'];
            $req_startdate1 = $_GET['startdate'];
         $req_startdate = date('d-M-Y', strtotime($req_startdate1));    
            $req_collector = $_GET['collector'];
             $req_collector_name = $_GET['staff_full_name']; 
 $_SESSION['collector_name'] = $req_collector_name;
             $_SESSION['id'] = $id;
            $_SESSION['status'] = $_GET['status'];
            
            $sql_state = "SELECT * FROM members WHERE namee = '$name'";
            $result = mysqli_query($connect, $sql_state);
      
            while ($row = mysqli_fetch_assoc($result)) {
               $images = $row["imagess"]; 
               $dob = $row["dob"]; 
            }
            $cut_name = substr($name, 0, 4);
          $codename = $cut_name.$random_pin; 
            
        }
   
   
   
   
   if (isset($_POST['btnsrch'])){
                       
                $get_name = $_POST['srch'];
       $sql_state = "SELECT * FROM members WHERE namee = '$get_name'";
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
                $black_list = $row["black_list"];
                 $black_desc = $row["black_desc"];
              }
              
//          ON BLACK LIST
    if ($black_list == 'YES') {
        $_SESSION['store_black_list'] = "<script type='text/javascript'> $(document).ready(function(){ 
                swal({
                         title: 'Not Allowed!',
                         text: 'Sorry, $name has been BLACK LISTED and cannot obtain loan from FINSOLUTE. Reason: $black_desc.',
                         icon: 'error',
                        buttons: {
                            confirm : {text:'Ok',className:'sweet-orange'},
                          
                        },
                        closeOnClickOutside: false
                       })
                  
                }); </script>";
        
        echo "<script> location.href = 'staff_home.php'; </script>"; 
    }
//             Lets generate the code name; 
              
              $cut_name = substr($name, 0, 4);
          $codename = $cut_name.$random_pin; 
          
          $_SESSION['store_disburse_name'] = "";
        }
          ?>
          
    
       
     </form>   
         
   
  
         
          
          
       
           
           
     <form action="staff_monthly_get_loan.php" method="POST" enctype="multipart/form-data" >
      
         <center>
             <div  style="margin-left: 40px; width:140px; height:140px;">
            <img id="img" src="<?php echo $images;?>" alt="THIS IS TO LOAD PHOTO"  style="border: 4px #99ff99 solid; width:140px; height:140px;" >
               <input type="hidden" name="idd" value="<?php echo $id;?>" />   
              <input type="hidden" name="imge" value="<?php echo $images;?>" /> 
     
       </div>   
             
         </center>
        
             
      
   
    <div class="form-group">
         <input type="hidden" id="duplicate_name" />      
         <input type="text" class="form-control" placeholder="Name"   id="nam" type="text" name="name" value="<?php echo $name;?>"  maxlength="50" readonly="" style="text-transform: uppercase;" required>
       </div>
      
          <input type="hidden" name="shadow" value="<?php echo $get_name;?>"/>
      
    <div class="form-group">    
        <!--BVN has now replaced District regnum-->
        <input type="text" class="form-control" placeholder="District"  name="regnum" value="<?php echo $regnum;?>"  maxlength="12" readonly=""  style="text-transform: uppercase;" required>
    </div>
        
<!--       <div class="form-group">    
        BVN has now replaced District regnum
        <input type="text" class="form-control" placeholder="Group Name"  name="group_name" value="<?php // echo $dob;?>"  maxlength="12" readonly=""  style="text-transform: uppercase;" required>
    </div>   -->
        
         
        
        
       
        
          <div style="margin-top: 45px; margin-left: 40px; ">
              
                  <div class="form-group">      
     <select name="loan_type" class="form-control" required>
                <?php if($req_type == ""){
                    $state = "";
                    $type = "Monthly Payment";
                    $value = "Monthly Payment";
                } else {
                    $state = "";
                    $type = $req_type;
                    $value = $req_type;
                } 
                ?>
         <option value="<?php echo "$value"; ?>" <?php echo "$state"; ?>><?php echo "$type"; ?></option>
                            <option value="Monthly Payment">Monthly Payment</option>
                            <!--<option value="Weekly Payment">Weekly Payment</option>-->
                            </select>
            
          </div>
              
              
              <div class="form-group" style="">  
            <label>Enter Loan to Collect:</label><br>
            <input type="text"  placeholder="enter Loan" value="<?php echo $_SESSION['store_approved_amt']; ?>" onchange="FormatCurrency(this)" readonly="" onkeypress="return CheckNumeric()" onkeyup="FormatCurrency(this)" id="amount" style="width: 250px; border-radius: 5px;" type="text" name="parent" maxlength="11" required >
            <br>
             
            <label style="margin-right: 16px; margin-top: 15px;">Select No. of Months:</label>
            <select id="getmonths" name="get_months" required>
                <option value="" hidden selected disabled>Number of Months</option>
                <option value="1">1 month</option>
               <option value="2">2 month</option>
               <option value="3">3 month</option>
                <option value="4">4 month</option>
                <option value="5">5 month</option>
                <option value="6">6 month</option>
              
            </select><br>
            <label style="margin-right: 92px;">Interest %:</label ><input type="number" placeholder="%" id="perc" style="width: 65px; border-radius: 5px;" required="" name="interest"/><br>
            <label  style="margin-right: 48px;">Interest Amount:</label><input type="text" placeholder="interest" id="figure1" style="width: 110px; border-radius: 5px;" onkeypress="return CheckNumeric()" onclick="FormatCurrency(this)" onkeyup="FormatCurrency(this)" required="" name="figure" readonly=""/><br>
      <label style="margin-right: 78px;">Insurance %:</label ><input type="number" placeholder="%" id="perc1" style="width: 65px; border-radius: 5px;" required="" name="insure_perc"/><br>
             <label  style="margin-right: 32px;">Insurance Amount:</label><input type="text" placeholder="insurance" id="figure2" style="width: 110px; border-radius: 5px;" onkeypress="return CheckNumeric()" onclick="FormatCurrency(this)" onkeyup="FormatCurrency(this)" required="" name="insure_figure" readonly=""/><br>
                  
 <label style="margin-right: 57px;">Processing Fee:</label><input type="number" placeholder="Form Fee" id="pro_fee" style="width: 110px; border-radius: 5px; margin-top: 0px;" value="" required="" name="pro_fee"/><br>
             <!--<label style="margin-right: 85px;">Group:</label><input type="text" placeholder="enter Group" id="group_name" style="width: 160px; border-radius: 5px; margin-top: 0px;" name=""/>-->
  <label style="margin-right: 117px;">Equity:</label><input type="text" placeholder="enter Equity" id="equity"  style="width: 110px; border-radius: 5px;" onkeypress="return CheckNumeric()" onclick="FormatCurrency(this)" onkeyup="FormatCurrency(this)"  name="equity"/><br>
        <input  type="text" name="startdate"  placeholder="select Start date" onfocus="(this.type='date')" style="width: 150px; border-radius: 5px; margin-top: 50px">
     
         </div>     
           
     
          
            <div class="form-group">   
                 <label>Loan Code Name:</label>
                 <input  class="form-control" type="text" name="telephone"  id="codename" value="<?php echo $codename;?>" maxlength="20" readonly="">
            </div>
        
        </div>  
          
         
          
        
        
   

        <!--<button style="margin-left:200px;" type="submit" name="Submit" id="check_duplicate" class="btn btn-success">Register</button>-->
         
        <input style=" padding: 8px;  font-weight: bold; background-color:  red; margin-top: 5px" class="btn button-distance" id="update"  type="submit" name="loan"  value="Submit Loan" />       
               <a style="margin-left:40px; " class="btn btn-dark"  href="staff_monthly_get_loan.php">Reset</a> <br>
     
   
      
    
       
           
     
             
  
      
     
      
      </form>
           
         
          

    
             
        

            <!--<center style="font-size: 18px; color: #cccccc; margin-top: 400px"><footer>&copy;2020. By Mr. Matt.</footer></center>-->
    
        
        
        
        
        
        <script>  // ////////Format number with commas/////////////////////////////////

            function FormatCurrency(ctrl) {
                //Check if arrow keys are pressed - we want to allow navigation around textbox using arrow keys
                if (event.keyCode === 37 || event.keyCode === 38 || event.keyCode === 39 || event.keyCode === 40) {
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
                return event.keyCode >= 48 && event.keyCode <= 57 || event.keyCode === 46;
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
        
        
           ////////////////////////////////////////////////////////////////////////////
          $( "#group_name" ).autocomplete({
            source: function( request, response ) {
                
                $.ajax({
                    url: "group_name.php",
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
                $('#group_name').val(ui.item.label); // display the selected text
              
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
             
             
             
               /////////THIS IS TO CHECK BEFORE FINAL UPDATE////////
              $(document).ready(function () {               
        $("#update").click(function () {
            
             ///////////////////////////////////////////////////////////////////
             const fi = document.getElementById('customFile'); 
        // Check if any file is selected. 
        if (fi.files.length > 0) { 
            for (const i = 0; i <= fi.files.length - 1; i++) { 
  
                const fsize = fi.files.item(i).size; 
                const file = Math.round((fsize / 1000)); 
                // The size of the file. 
                if (file > 148) { 
                    alert( 
                      "Image too large, please resize image to 100kb. Your current image size is: "+file/1000+"mb ("+file+"kb). Image should be: Horizontal = 400px by Vertical = 300px."); 
//                    document.getElementById('size').value = file; 
                         return false;                
                }  
            } 
        } 
       //////////////////////////////////////////////////////////// 
            
            
            
               var  name_up = document.getElementById('nam').value;   
        if (name_up === ""){
            alert ("Search member to update first");
           return false; }  
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
    
      <script>
          //////////////////////THIS FOR FIGURE ON KEY UP//////////////////////////
         $(document).ready(function() {
   var figure = $('#figure1');         
     $(figure).keyup(function(e){ //THIS IS TO AUTO-CALCULATE Attendd
        e.preventDefault();   
        
              var cleanNumber = $("#amount").val().split(",").join("");
         var amount = cleanNumber;
         
         
           var cleanNumber1 = $("#figure").val().split(",").join("");
         var fig = cleanNumber1;
       
       var  perc =  fig/amount ;
       var tot_per = perc * 100;
            tot_per = tot_per.toFixed(2);   
     document.getElementById('perc').value =  tot_per ;
          });
        });  
   </script>
   
   
   
   
   <script>
          //////////////////////THIS FOR PERCENT% ON KEY UP//////////////////////////
         $(document).ready(function() {
   var perc = $('#perc');         
     $(perc).keyup(function(e){ 
        e.preventDefault();   
             var cleanNumber = $("#amount").val().split(",").join("");
          
            var getmonths = parseInt(document.getElementById('getmonths').value);
        if(cleanNumber === ""){
              swal({
                         title: 'Not Allowed!',
                         text:  'You must fill amount and number of months',
                         icon: 'error',
                        buttons: {
                            confirm : {text:'Ok',className:'sweet-orange'}
                          
                        },
                        closeOnClickOutside: false
                       });
           
            return false;
        } else {
         var cleanNumber = $("#amount").val().split(",").join("");
         var amount = cleanNumber;
         var perc = parseInt(document.getElementById('perc').value);
       
       var  fig =  perc/100 ;
       var tot_fig = amount * fig;
           tot_fig = Math.round(tot_fig);
           
             var real_fig;

          
               
              if(getmonths === 1){
            var real_fig1  = tot_fig * 1;
              real_fig = real_fig1;
              }
              
              if(getmonths === 2){
                  var monthly_principal = amount/2;
                   var first_month_principal =  monthly_principal * 2; 
           var first_month_interest = first_month_principal * fig;
           
           var second_month_principal =  monthly_principal * 1; 
           var second_month_interest = second_month_principal * fig;
           real_fig = first_month_interest + second_month_interest;
              }
              
                 var real_fig;
              if(getmonths === 3){
                   var monthly_principal = amount/3;
                   var first_month_principal =  monthly_principal * 3; 
           var first_month_interest = first_month_principal * fig;
           
           var second_month_principal =  monthly_principal * 2; 
           var second_month_interest = second_month_principal * fig;
           
           
           var third_month_principal =  monthly_principal * 1; 
           var third_month_interest = third_month_principal * fig;
           
           
        real_fig = first_month_interest + second_month_interest + third_month_interest;

              }
              
              if(getmonths === 4){
                 
             var monthly_principal = amount/4;
//             first month
           var first_month_principal =  monthly_principal * 4; 
           var first_month_interest = first_month_principal * fig;
           
           var second_month_principal =  monthly_principal * 3; 
           var second_month_interest = second_month_principal * fig;
           
           
           var third_month_principal =  monthly_principal * 2; 
           var third_month_interest = third_month_principal * fig;
           
           
           var fourth_month_principal =  monthly_principal * 1; 
           var fourth_month_interest = fourth_month_principal * fig;
           
        real_fig = first_month_interest + second_month_interest + third_month_interest + fourth_month_interest;

              }
              
               if(getmonths === 5){
                 var monthly_principal = amount/5;

           var first_month_principal =  monthly_principal * 5; 
           var first_month_interest = first_month_principal * fig;
           
           var second_month_principal =  monthly_principal * 4; 
           var second_month_interest = second_month_principal * fig;
           
           
           var third_month_principal =  monthly_principal * 3; 
           var third_month_interest = third_month_principal * fig;
           
           
           var fourth_month_principal =  monthly_principal * 2; 
           var fourth_month_interest = fourth_month_principal * fig;
           
           
           
            var fifth_month_principal =  monthly_principal * 1; 
           var fifth_month_interest = fifth_month_principal * fig;
           
        real_fig = first_month_interest + second_month_interest + third_month_interest + fourth_month_interest + fifth_month_interest;

              }
              
              
              
              
              
              
              
              
              
              
               if(getmonths === 6){
                 var monthly_principal = amount/6;

           var first_month_principal =  monthly_principal * 6; 
           var first_month_interest = first_month_principal * fig;
           
           var second_month_principal =  monthly_principal * 5; 
           var second_month_interest = second_month_principal * fig;
           
           
           var third_month_principal =  monthly_principal * 4; 
           var third_month_interest = third_month_principal * fig;
           
           
           var fourth_month_principal =  monthly_principal * 3; 
           var fourth_month_interest = fourth_month_principal * fig;
           
           
            var fifth_month_principal =  monthly_principal * 2; 
           var fifth_month_interest = fifth_month_principal * fig;
           
           
           var sixth_month_principal =  monthly_principal * 1; 
           var sixth_month_interest = sixth_month_principal * fig;
           
        real_fig = first_month_interest + second_month_interest + third_month_interest + fourth_month_interest + fifth_month_interest + sixth_month_interest;

              }
            
      
      if( isNaN(real_fig)){
     document.getElementById('figure1').value =  "" ;
             } else {
           document.getElementById('figure1').value =  real_fig ;       
               }
             }
          });
        });  
   </script>
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
    <script>
          //////////////////////THIS FOR PERCENT% ON KEY UP//////////////////////////
         $(document).ready(function() {
   var perc = $('#perc1');         
     $(perc).keyup(function(e){ 
        e.preventDefault();   
             var cleanNumber = $("#amount").val().split(",").join("");
          
            var getmonths = parseInt(document.getElementById('getmonths').value);
        if(cleanNumber === ""){
          swal({
                         title: 'Not Allowed!',
                         text:  'You must fill amount and number of months',
                         icon: 'error',
                        buttons: {
                            confirm : {text:'Ok',className:'sweet-orange'}
                          
                        },
                        closeOnClickOutside: false
                       });
            return false;
        } else {
         var cleanNumber = $("#amount").val().split(",").join("");
         var amount = cleanNumber;
         var perc = parseInt(document.getElementById('perc1').value);
       
       var  fig =  perc/100 ;
       var tot_fig = amount * fig;
           tot_fig = Math.round(tot_fig);
           
             var real_fig;

          
               
              if(getmonths === 1){
            var real_fig1  = tot_fig * 1;
              real_fig = real_fig1;
              }
              
              if(getmonths === 2){
                  var monthly_principal = amount/2;
                   var first_month_principal =  monthly_principal * 2; 
           var first_month_interest = first_month_principal * fig;
           
           var second_month_principal =  monthly_principal * 1; 
           var second_month_interest = second_month_principal * fig;
           real_fig = first_month_interest + second_month_interest;
              }
              
                 var real_fig;
              if(getmonths === 3){
                   var monthly_principal = amount/3;
                   var first_month_principal =  monthly_principal * 3; 
           var first_month_interest = first_month_principal * fig;
           
           var second_month_principal =  monthly_principal * 2; 
           var second_month_interest = second_month_principal * fig;
           
           
           var third_month_principal =  monthly_principal * 1; 
           var third_month_interest = third_month_principal * fig;
           
           
        real_fig = first_month_interest + second_month_interest + third_month_interest;

              }
              
              if(getmonths === 4){
                 
             var monthly_principal = amount/4;
//             first month
           var first_month_principal =  monthly_principal * 4; 
           var first_month_interest = first_month_principal * fig;
           
           var second_month_principal =  monthly_principal * 3; 
           var second_month_interest = second_month_principal * fig;
           
           
           var third_month_principal =  monthly_principal * 2; 
           var third_month_interest = third_month_principal * fig;
           
           
           var fourth_month_principal =  monthly_principal * 1; 
           var fourth_month_interest = fourth_month_principal * fig;
           
        real_fig = first_month_interest + second_month_interest + third_month_interest + fourth_month_interest;

              }
              
               if(getmonths === 5){
                 var monthly_principal = amount/5;

           var first_month_principal =  monthly_principal * 5; 
           var first_month_interest = first_month_principal * fig;
           
           var second_month_principal =  monthly_principal * 4; 
           var second_month_interest = second_month_principal * fig;
           
           
           var third_month_principal =  monthly_principal * 3; 
           var third_month_interest = third_month_principal * fig;
           
           
           var fourth_month_principal =  monthly_principal * 2; 
           var fourth_month_interest = fourth_month_principal * fig;
           
           
           
            var fifth_month_principal =  monthly_principal * 1; 
           var fifth_month_interest = fifth_month_principal * fig;
           
        real_fig = first_month_interest + second_month_interest + third_month_interest + fourth_month_interest + fifth_month_interest;

              }
              
              
              
              
              
              
              
              
              
              
               if(getmonths === 6){
                 var monthly_principal = amount/6;

           var first_month_principal =  monthly_principal * 6; 
           var first_month_interest = first_month_principal * fig;
           
           var second_month_principal =  monthly_principal * 5; 
           var second_month_interest = second_month_principal * fig;
           
           
           var third_month_principal =  monthly_principal * 4; 
           var third_month_interest = third_month_principal * fig;
           
           
           var fourth_month_principal =  monthly_principal * 3; 
           var fourth_month_interest = fourth_month_principal * fig;
           
           
            var fifth_month_principal =  monthly_principal * 2; 
           var fifth_month_interest = fifth_month_principal * fig;
           
           
           var sixth_month_principal =  monthly_principal * 1; 
           var sixth_month_interest = sixth_month_principal * fig;
           
        real_fig = first_month_interest + second_month_interest + third_month_interest + fourth_month_interest + fifth_month_interest + sixth_month_interest;

              }
            
      
      if( isNaN(tot_fig)){
     document.getElementById('figure2').value =  "" ;
             } else {
           document.getElementById('figure2').value =  tot_fig ;       
               }
             }
          });
        });  
   </script>
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
    </div>

  
   
    
    
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
    
      </body>
  </html>