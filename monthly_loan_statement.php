<?php
session_start();
include 'connection.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Monthly Loan Statement</title>
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

  <meta name="keywords"
    content="bootstrap, bootstrap admin template, admin theme, admin dashboard, dashboard template, admin template, responsive" />
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
  <style type="text/css" media="print">
    .noPrint {
      display: none;
    }
  </style>

</head>

<body>
  <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Deposit Details</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body" id="display_table1">

        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>

      </div>
    </div>
  </div>
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
  <div id="nonPrintable">
    <div id="pcoded" class="pcoded">
      <div class="pcoded-overlay-box"></div>
      <div class="pcoded-container navbar-wrapper">
        <?php
        include 'admin_nav1.php';
        ?>

        <div class="pcoded-main-container">
          <div class="pcoded-wrapper">
            <?php
            include 'admin_nav2.php';
            ?>
            <div class="pcoded-content">

              <!-- Page-header start -->
              <div class="page-header">
                <div class="page-block">
                  <div class="row align-items-center">
                    <div class="col-md-8">
                      <div class="page-header-title">
                        <h5 class="m-b-10">Monthly Loan Statement</h5>
                        <p class="m-b-0">Financial Summary</p>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <ul class="breadcrumb">
                        <li class="breadcrumb-item">
                          <a href="admin_home.php"> <i class="fa fa-home"></i> </a>
                        </li>
                        <li class="breadcrumb-item"><a href="admin_home.php">Dashboard</a>
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
                      <!--^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^-->
                      <?php if (isset($_SESSION['store_print_monthly'])) {
                        $three = $_SESSION['store_print_monthly'];
                      } ?>

                      <i id="agree" data-toggle="modal" data-target="#JohnDoe" data-backdrop="static"
                        data-keyboard="false"></i>
                      <input type="hidden" name="" id="form_go" class="form-control-bold"
                        value="<?php echo $three; ?>" />
                      <!--^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^-->



                      <?php

                      //loop through all table rows
                      
                      $name = $codename = $type = "";

                      @$name = $_GET['name'];
                      @$codename = $_GET['codename'];
                      ////////get details from loan database (type and end date)
                      //     ------------------------------------------------------------------------  
                      $closingdate = "";
                      $sql_state1 = "SELECT * FROM monthly_allloan WHERE codename = '$codename' AND disburseloan > 1 AND remarks = 'loan disbursement'";
                      $result1 = mysqli_query($connect, $sql_state1);

                      while ($row = mysqli_fetch_assoc($result1)) {
                        $closingdate = $row["enddate"];
                        $intno = $row["intno"];
                        $loan_type = $row["type"];
                        $name = $row['name'];
                        $waver = $row['waver'];
                        $interest = $row['interest'];
                        $startdate = $row['startdate'];
                        $disburseloan22 = $row['disburseloan'];
                        $monthno = $row['monthno'];
                        $acc_officer = $row['acc_officer'];
                        $deposit_show = $row['deposit'];
                      }
                      @$type = $_GET['type'];

                      if (isset($_SESSION['redirect_message_monthly'])) {
                        echo $_SESSION['redirect_message_monthly'];
                        $_SESSION['redirect_message_monthly'] = "";
                      }
                      echo '';
                      $_SESSION['pen_name'] = $name;
                      $_SESSION['pen_codename'] = $codename;
                      $_SESSION['pen_type'] = $type;
                      $inc = 1;

                      ////SELECT NAME FROM DATABASE TO LOAD PASSPORT TEL & ADDRESS
                      $debtor_info = mysqli_query($connect, "SELECT * FROM members WHERE namee = '$name'");
                      while ($row_info = mysqli_fetch_assoc($debtor_info)) {
                        $address = $row_info['addresss'];
                        $tel = $row_info['telephone'];
                        $image = $row_info['imagess'];
                        $district = $row_info['registration_num'];
                        $refree = $row_info['religion'];
                        $get_branch = $row_info['branch'];
                      }


                      echo "<h4 style='text-decoration: underline;'><center><i>BRANCH</i>: $get_branch</center></h4><br>";
                      $output_closedate = date('d-M-Y', strtotime($closingdate));

                      ///////////////////////////////////////
                      //GET NUMBER OF MONTHS & DAYS LEFT
                      $dated = strtotime("$closingdate");

                      $remaining = $dated - time();



                      ///////COUNT ONLY DAYS
                      $days_remaining = floor($remaining / 86400) . " days left";
                      //     ------------------------------------------------------------------------   
                      echo '<div class="row">';

                      echo '<div class="col-sm-3" style="margin-left: 100px;">';
                      echo "<p style='font-size:18px; color:black; margin-bottom:30px; margin-left: 35px;'>";
                      echo "<label>Name: " . $name . "</label><br>";
                      echo "<label>Tel: " . $tel . "</label><br>";
                      echo "<label>Address: " . $address . "</label><br>";
                      echo "<label>Expiry Date: " . $output_closedate . "</label><br>";
                      echo "<label>RM: " . $days_remaining . "</label><br>";
                      echo "<label>Refree: " . $refree . "</label><br>";
                      echo "<label><b>Account Officer: <input type='text' id='autocomplete_staff' value='" . $acc_officer . "'></b>&nbsp;<i class='fa fa-check' style='background-color: lightgreen; padding; 15px;' onclick='change_officer()'></i></label><br>";


                      echo "<p>";
                      /////CREATE HIDDEN INPUT TEXTBOX TO CARRY VALUES TO JAVASCRIPT 
                      
                      //        PLEASE NOTE THAT YOU HAVE TO USE SOME "\" TO AVOID BRAKE SPACE IN NAMES
                      echo "<input type='hidden' value=\"" . $name . "\" id = 'name'/>";
                      echo '<input type="hidden" value=\'' . $codename . '\' id = "codename"/>';
                      echo '<input type="hidden" value=\'' . $type . '\' id="type"/>';

                      echo "</div>";


                      ////////GET THE LAST BALANCE
                      $sql_state2 = "SELECT * FROM monthly_allloan WHERE name = '$name' AND codename = '$codename'";
                      $result2 = mysqli_query($connect, $sql_state2);

                      while ($row = mysqli_fetch_assoc($result2)) {
                        $available_blance = $row["indbalance"];
                        $loan_type = $row["type"];
                        $check_remarks = $row["remarks"];
                      }










                      ///////////////////////////////////----------------------------------////////////////////         
                      
                      //            LETS DO AUTOMATIC REWARD PENALTY
                      if ($days_remaining < 0 && $available_blance > 0 && $check_remarks != 'Bad Debt Settled by Finsolute' && $waver != 1) {


                        //                $type = $_REQUEST['type'];
//                $district = $_REQUEST['district'];  
//                 $av_bal = $_REQUEST['av_bal'];  
                      

                        $date = date("jS F Y");
                        $month = date("F");
                        $year = date("Y");

                        $decimal_pen = $intno / 100;
                        $penalty = $decimal_pen * $available_blance;

                        //             ---------------------------------------
//        //          SET NEW DATE FOR ANOTHER PENALTY 
                        $today1 = time();
                        $today = date("Y-m-d", $today1);

                        $new_closedate = date('Y-m-d', strtotime($today . ' + 31 days'));

                        //       -----------------------------------------------------------   
                      

                        //           UPDATE LOAN NEW END DATE 
                        $sql_state12 = "UPDATE monthly_allloan SET enddate = '$new_closedate' WHERE name = '$name' AND disburseloan > 1 AND remarks = 'loan disbursement' AND codename = '$codename'";
                        $result12 = mysqli_query($connect, $sql_state12);


                        //          INSERT NEW PENALTY INTO DATEBASE
                        $sql_statement = "INSERT INTO monthly_allloan (name, type, remarks, disburseloan, codename, date, month, year, district, enddate, branch) VALUES ('$name', '$type', 'Penalty', '$penalty', '$codename', '$date', '$month', '$year', '$district', '$new_closedate', '$get_branch')";
                        $result = mysqli_query($connect, $sql_statement);


                        ////GET THE REMAINING BALANCE OF LOAN FOR AN INDIVIDUAL
                        $summation_loan2 = "";
                        $summation_pay2 = "";

                        ///////THIS IS TO GET THE INDIVIDUAL BALANCE
                        ////////////THIS IS TO SUM LOAN
                        $code_loan = mysqli_query($connect, "SELECT SUM(disburseloan) as total FROM monthly_allloan WHERE codename = '$codename' ");
                        while ($row = mysqli_fetch_assoc($code_loan)) {
                          $summation_loan2 = $row['total'];
                        }


                        ////////////THIS IS TO SUM PAYMENTS
                        $total_payments2 = mysqli_query($connect, "SELECT SUM(repay) as total FROM monthly_allloan WHERE codename='$codename'");
                        while ($row1 = mysqli_fetch_array($total_payments2)) {
                          $summation_pay2 = $row1['total'];
                        }

                        /////LETS GET THE BALANCE
                        $available_blance = $summation_loan2 - $summation_pay2;


                        //        -----------------------------------------------------------------------             
                      
                        /////////SUM GENERAL REPAY & DISBURSE LOAN SO YOU CAN GET GEN BALALNCE
                        ////////////THIS IS TO SUM PAYMENTS
                        $total_payments = mysqli_query($connect, "SELECT SUM(repay) as total FROM monthly_allloan");
                        while ($row1 = mysqli_fetch_array($total_payments)) {
                          $summation_pay = $row1['total'];
                        }


                        ////////////THIS IS TO SUM DISBURSE
                        $total_disburse2 = mysqli_query($connect, "SELECT SUM(disburseloan) as total FROM monthly_allloan");
                        while ($row2 = mysqli_fetch_array($total_disburse2)) {
                          $summation_disburse = $row2['total'];
                        }
                        $gen_balance = $summation_disburse - $summation_pay;
                        //        -----------------------------------------------------------------------             
                      










                        //       *********************************||||||||||||||||****************************************************            
                        $summation5 = $summation6 = "";
                        ///////////THIS IS TO SUM TOTAL monthly_disburseloan///////////////////
                        $total_monthly_disburseloan = mysqli_query($connect, "SELECT SUM(disburseloan) as total FROM monthly_allloan WHERE name='$name'");
                        while ($row = mysqli_fetch_array($total_monthly_disburseloan)) {
                          $summation5 = $row['total'];
                        }

                        ////////////THIS IS TO TOTAL monthly_payment
                        $total_monthly_payment = mysqli_query($connect, "SELECT SUM(repay) as total FROM monthly_allloan WHERE name='$name'");
                        while ($row1 = mysqli_fetch_array($total_monthly_payment)) {
                          $summation6 = $row1['total'];
                        }
                        //////////////////////////////////////////
                        @$monthly_status = $summation5 - $summation6;



                        //*********************************||||||||||||||||****************************************************            
                        $summation1 = $summation2 = $summation3 = $summation4 = "";
                        ///////////THIS IS TO SUM TOTAL daily_disburseloan///////////////////
                        $total_daily_disburseloan = mysqli_query($connect, "SELECT SUM(disburseloan) as total FROM allloan WHERE name='$name'");
                        while ($row = mysqli_fetch_array($total_daily_disburseloan)) {
                          $summation1 = $row['total'];
                        }

                        ////////////THIS IS TO TOTAL daily_payment
                        $total_daily_payment = mysqli_query($connect, "SELECT SUM(repay) as total FROM allloan WHERE name='$name'");
                        while ($row1 = mysqli_fetch_array($total_daily_payment)) {
                          $summation2 = $row1['total'];
                        }
                        //////////////////////////////////////////
                        @$daily_status = $summation1 - $summation2;

                        /////======================================================================
                      

                        ///////THIS IS TO SUM TOTAL weekly_disburseloan///////////////////
                        $total_weekly_disburseloan = mysqli_query($connect, "SELECT SUM(disburseloan) as total FROM weekly_allloan WHERE name='$name'");
                        while ($row = mysqli_fetch_array($total_weekly_disburseloan)) {
                          $summation3 = $row['total'];
                        }

                        ////////////THIS IS TO TOTAL weekly_payment
                        $total_weekly_payment = mysqli_query($connect, "SELECT SUM(repay) as total FROM weekly_allloan WHERE name='$name'");
                        while ($row1 = mysqli_fetch_array($total_weekly_payment)) {
                          $summation4 = $row1['total'];
                        }
                        //////////////////////////////////////////
                        @$weekly_status = $summation3 - $summation4;

                        @$total_status = $daily_status + $weekly_status + $monthly_status;
                        //UPDATE RECORD
                        $sql_statement101 = "UPDATE members SET balance = '$total_status' WHERE namee='$name'";
                        $result29 = mysqli_query($connect, $sql_statement101);
                        //       **************************||||||||||||||||***********************************************            
                      



                        //GET LAST ID  
                        $get_last_id = mysqli_query($connect, "SELECT * FROM monthly_allloan");
                        while ($row = mysqli_fetch_assoc($get_last_id)) {
                          $id = $row['id'];
                        }

                        ////UPDATE TO GET A NEW INDIVIDUAL BALANCE
                        $result2 = mysqli_query($connect, "UPDATE monthly_allloan SET genbalance = '$gen_balance',  repaycumm = '$summation_pay2', indbalance = '$available_blance' WHERE id = '$id'");
                        //UPDATE monthlyenddate FOR MEMEBERS DB TO AUTO-DETECT PENALTY
                        $result222 = mysqli_query($connect, "UPDATE members SET monthlyindbal = '$available_blance', monthlyenddate = '$new_closedate', monthlycode = '$codename' WHERE namee = '$name'");
                        $sql_sum_repay = mysqli_query($connect, "UPDATE monthly_allloan SET  indbalance = '$available_blance' WHERE disburseloan > 1 AND codename='$codename' AND remarks = 'loan disbursement'");

                        ///---------------------/ TO GET PHONE------------
                        $debtor_info = mysqli_query($connect, "SELECT * FROM members WHERE namee = '$name'");
                        while ($row_info = mysqli_fetch_assoc($debtor_info)) {
                          $address = $row_info['addresss'];
                          $tel = $row_info['telephone'];
                          $image = $row_info['imagess'];
                          $district = $row_info['registration_num'];
                          $refree = $row_info['religion'];
                        }

                        //     ------------------------------------------------------------------------ 
                      
                        if ($result2 == true) {
                          //..........................TERMII SMS START.......................................
                      

                          $sms_date = date("d-M-Y h:ia");
                          $sms_name = $name;

                          $sms_parent = number_format($penalty);
                          $sms_balance = number_format($available_blance);
                          $sms_parent1 = $sms_parent . "N";
                          $sms_balance1 = $sms_balance . "N";


                          ltrim($tel, '0');
                          $naija_code = "234";
                          $phone = $naija_code . ltrim($tel, '0');
                          $mssg = "Penalty-> ₦$sms_parent1. New_Bal->₦$sms_balance1";
                          $laon = "Loan";

                          $forcednd = 1;

                          $curl = curl_init();

                          // Construct the JSON body properly
                          $data = json_encode([
                            "sender_name" => "FINSOLUTE",
                            "message" => $mssg,
                            "recipients" => $phone,
                            "forcednd" => $forcednd
                          ]);

                          curl_setopt_array($curl, array(
                            CURLOPT_URL => 'https://app.multitexter.com/v2/app/sendsms',
                            CURLOPT_RETURNTRANSFER => true,
                            CURLOPT_ENCODING => '',
                            CURLOPT_MAXREDIRS => 10,
                            CURLOPT_TIMEOUT => 0,
                            CURLOPT_FOLLOWLOCATION => true,
                            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                            CURLOPT_CUSTOMREQUEST => 'POST',
                            CURLOPT_POSTFIELDS => $data, // Pass the JSON string
                            CURLOPT_HTTPHEADER => array(
                              'Authorization: Bearer GLCNnH0pnKUGqaafecizgqUR0H5xKpyGTYAdYGUoY7avBpJHFpKN09DUcPiB', // Replace with your token
                              'Content-Type: application/json'
                            ),
                          ));

                          $response = curl_exec($curl);

                          curl_close($curl);



                          //..........................TERMII SMS END.......................................   
                      

                          $output_new_closedate = date('d-M-Y', strtotime($new_closedate));
                          echo "<script type='text/javascript'> $(document).ready(function(){ 
                swal({
                         title: 'Success!',
                         text: 'Notification: $name has been given a penalty fee of " . number_format($penalty) . " Naira. Total balance now is: " . number_format($available_blance) . " Naira Only. Due Date for Next Penalty is $output_new_closedate',
                         icon: 'success',
                        buttons: {
                            confirm : {text:'Ok',className:'sweet-orange'},
                          
                        },
                        closeOnClickOutside: false
                       })
                  
                }); </script>";

                          $id = "";
                        } else {
                          echo "<script>alert('Recheck')</script>";
                        }
                      }
                      ///////////////////////////////////----------------------------------////////////////////         
                      

                      //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@                
                      ///////THIS IS TO GET THE INDIVIDUAL EQUITY
                      ///////////////THIS IS TO SUM ALL SAVINGS
                      $sum_savings1 = mysqli_query($connect, "SELECT SUM(equity) as total FROM monthly_allloan WHERE name = '$name' AND codename = '$codename'");
                      while ($row = mysqli_fetch_assoc($sum_savings1)) {
                        $summation_equi1 = $row['total'];
                        //               $plus_interest = $row['interest'];  
                      }


                      ////////////THIS IS TO SUM ALLWITHDRAWALS
                      $sum_withdraw1 = mysqli_query($connect, "SELECT SUM(withdrawequity) as total FROM monthly_allloan WHERE name = '$name' AND codename = '$codename'");
                      while ($row1 = mysqli_fetch_assoc($sum_withdraw1)) {
                        $summation_equi2 = $row1['total'];
                      }

                      $equity_balance = $summation_equi1 - $summation_equi2;

                      //@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
                      






                      //            $_SESSION['av_bal']= $available_blance;FOR AJAX
                      echo '<input type="hidden" value=' . $available_blance . ' id="av_bal"/>';
                      echo '<div class="col-sm-3">';
                      echo "<label style='font-size: 18px; font-weight: bold;'>Balance: N " . number_format($available_blance) . "</label>";
                      echo '<form name="loan" action="loan_statement.php" method="POST" enctype="multipart/form-data">';

                      //////GET THE TOTAL PENALTY AWARDED 
                      $total_disburse4 = mysqli_query($connect, "SELECT SUM(disburseloan) as total FROM monthly_allloan WHERE (remarks = 'penalty' OR reversepen = 'penalty reverse') AND codename = '$codename' ");
                      while ($row4 = mysqli_fetch_array($total_disburse4)) {
                        $summation_penalty = $row4['total'];
                      }

                      //////GET THE TOTAL MINUS PENALTY REVERSE 
                      $total_disburse5 = mysqli_query($connect, "SELECT SUM(repay) as total FROM monthly_allloan WHERE reversepen = 'penalty reverse' AND codename = '$codename' ");
                      while ($row4 = mysqli_fetch_array($total_disburse5)) {
                        $summation_penalty_reverse = $row4['total'];
                      }

                      $true_penalty = $summation_penalty - $summation_penalty_reverse;



                      echo "<label style='font-size: 18px; font-weight: bold;'>Total Penalty Awarded: <input type='text' id='perc_java' value='" . number_format($true_penalty) . "' style='color: red; font-weight: bold;' placeholder='None' readonly='true' name='penalty'/></label><br>";
                      echo "<label style='font-size: 18px; font-weight: bold;'>Equity: N " . number_format($equity_balance) . "</label>";

                      echo '</form>';

                      if ($waver == 1) {
                        echo "<label >&nbsp;&nbsp;Penalty Stopped</label>";
                      }
                      echo "<br><br>";
                      echo "</div>";




                      echo '<div class="col-sm-2">';
                      echo '<button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal82">
                                                             Options [<i>click me</i>]
                                                     </button>';
                      ?>
                      <!-- The Modal -->
                      <div class="modal" id="myModal82">
                        <div class="modal-dialog">
                          <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                              <h4 class="modal-title">Select Option</h4>
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                              <?php
                              echo "<a class='btn' style='color: whitesmoke; background-color: green; margin-left: 0px;' href='monthly_payment.php?codename=" . $codename . " &name=" . $name . "'>Make Payments</a>";
                              echo "<br><a href='monthly_payment.php' style='color:blue;'>Click Here for Blank Payment Panel</a><br>";
                              echo '<br>';
                              echo "<button id='stop_pen' class='btn btn-danger'>STOP PENALTY!!!</button>&nbsp;";
                              echo "<button onclick='add_penalty_rate()' class='btn btn-secondary'>RESTART PENALTY</button>";
                              echo "<br><br>";
                              echo "<button id='bad_debt' class='btn btn-primary'>REVERSE BAD DEBT</button> &nbsp;";
                              echo "<br><br>";
                              echo '  <fieldset style="font-family:sans-serif; padding:0px; border-radius:15px; background:#006666; border:5px solid #1F497D; height: 170px; width: 300px;">
          <legend style="background:#1F497D; color:#fff; padding:5px; font-size:18px; border-radius:5px;margin-left:10px; width: 35%;box-shadow:0 0 0 3px #ddd">Reversal</legend>
         
          &nbsp;
          <a href="reverse_entry.php?codename=' . $codename . '&name=' . $name . '" class="btn" style="color:white; background-color: blue; border-radius: 15px;">R_payments</a>
          &nbsp;
          <a href="disburse_reverse_entry.php?codename=' . $codename . '&name=' . $name . '" class="btn" style="color:white; background-color: purple; border-radius: 15px;">R_disb/pen</a>
                 <br> <br>
             &nbsp;  &nbsp; <button type="button" id="loan_balance" class="btn" style="color:black; background-color: lightgreen; border-radius: 15px;">Reverse Loan Balance</button>

       
     </fieldset>';
                              echo "<br><br>";
                              echo '       <input type="hidden" value="' . $codename . '" id="codename">
                       <input type="hidden" value="' . $available_blance . '" id="available_blance">
                        <input type="hidden" value="' . $name . '" id="name">   
                      <input type="text" style="width:200px;" id="deposit_amount" name="deposit" onkeypress="return CheckNumeric()" onclick="FormatCurrency(this)" onkeyup="FormatCurrency(this)"  placeholder="Enter Deposit If Any (Here)"/>
                     
                      <center style="font-weight:bold; font-size:18px;"><input type="submit" id="deposit_check" name="submit_deposit" value="Deposit"> ₦' . number_format($deposit_show) . '
                    </center>
                <br>
          <input type="text" style="width:250px;" id="wave_interest" name="wave_interest" placeholder="Fill narration to wave interest" value="interest waved"/>
               <center style="font-weight:bold;  font-size:18px;"><input type="submit" id="wave_check" style="background-color:green;color:white;" name="submit_deposit" value="Wave">
                     </center>       
               <br>
               <center>
             &nbsp;&nbsp;  <button class="" id="click_deposit" data-toggle="modal" data-target="#myModal">Deposit Details</button>
                   </center>
                </div>';
                              ?>
                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>

                          </div>
                        </div>
                      </div>





                      <?php
                      echo '<div  style="margin-left: 40px; width:140px; height:140px;">
            <img id="img"  src="' . $image . '"  class="myImg" alt="' . $name . '" style="border: 4px #99ff99 solid; width:140px; height:140px;" >
              </div>
              

<div id="myModal33" class="modal22">
      
      <img class="modal-content" id="img01">
      <div id="caption"></div>
    </div> 
';


                      echo "</div>";


                      echo '<div class="col-sm-2">';




                      echo '<div class="col-sm-2" style="margin-left:-1em;">';
                      echo '';
                      //       echo '   <b style="font-weight:bold; font-size:18px;">N</b><i id="display_table1"></i>';
                      echo '</div>';


                      echo "</div>";
                      echo "</div>";


                      $sql_state = "SELECT * FROM monthly_allloan WHERE codename = '$codename'";
                      $result = mysqli_query($connect, $sql_state);

                      //===================================================START GET OUT %==============================
////GET THE REMAINING BALANCE OF LOAN FOR AN INDIVIDUAL
                      $summation_loan2 = "";
                      $summation_pay2 = "";

                      ///////THIS IS TO GET THE INDIVIDUAL BALANCE
                      ////////////THIS IS TO SUM LOAN
                      $code_loan = mysqli_query($connect, "SELECT SUM(disburseloan) as total FROM monthly_allloan WHERE codename = '$codename' ");
                      while ($row = mysqli_fetch_assoc($code_loan)) {
                        $summation_loan2 = $row['total'];
                      }


                      ////////////THIS IS TO SUM PAYMENTS
                      $total_payments2 = mysqli_query($connect, "SELECT SUM(repay) as totalx FROM  monthly_allloan WHERE codename='$codename' ");
                      while ($row1 = mysqli_fetch_array($total_payments2)) {
                        $summation_pay2 = $row1['totalx'];
                      }

                      /////LETS GET THE BALANCE
//              $available_blance =  $summation_loan2 - $summation_pay2;
                      //===================================================END GET OUT %==============================
                      




                      //             echo $summation_pay2;   echo "<br>"; echo $summation_loan2;echo "<br>";    
                      $performance = ($summation_pay2 / $summation_loan2) * 100;
                      echo "<center><h4>" . round($performance, 0) . "% Completed</h4></center>";
                      if ($performance < 80) {
                        $bg_color = "bg-danger";
                      }
                      if ($performance > 80 && $performance < 99) {
                        $bg_color = "bg-warning";
                      }
                      if ($performance > 99) {
                        $bg_color = "bg-success";
                      }
                      echo '<div class="container"><div class="progress" style="height:20px; background-color: grey;">
    <div class="progress-bar progress-bar-striped ' . $bg_color . '" style="width:' . $performance . '%;"></div>
  </div></div>';
                      echo "<br>";

                      echo ' <div class="card card-block table-border-style">';
                      echo '<div class="table-responsive">';

                      echo '<CAPTION><h3 align="center" style="font-size:20px; color: black;"> Codename: (' . $codename . ') - ACCOUNT STATEMENT. [MONTHLY] Inerest @ <b>' . $intno . '%</b></h3></CAPTION>';
                      echo '<table class="table table-bordered table-striped" align="center">';

                      echo '<thead class="thead-dark">';
                      echo '<tr align = "center">';
                      echo '<th>S/N</th>';
                      echo '<th>Date</th>';
                      echo '<th>Equity</th>';
                      echo '<th>Equity Withdrawal</th>';
                      echo '<th>Description</th>';
                      echo '<th>Amount</th>';
                      echo '<th>Interest</th>';
                      echo '<th>Repayments</th>';
                      echo '<th>Repay Cummulative</th>';
                      echo '<th>Balance</th>';


                      echo '</tr>';
                      echo '</thead>';

                      echo '<tbody class="" style="font-family: sans-serif; color:black ; font-weight:bold;">';
                      while ($row = mysqli_fetch_array($result)) {
                        $_SESSION['district'] = $row['district'];
                        echo '<input type="hidden" value=' . $_SESSION['district'] . ' id="district"/>';
                        echo "<tr align = 'center'>";
                        echo "<td>" . $inc . "</td>";
                        echo "<td>" . $row['date'] . "</td>";
                        echo "<td>" . $row['equity'] . "</td>";
                        echo "<td>" . $row['withdrawequity'] . "</td>";
                        echo "<td>" . $row['remarks'] . "</td>";

                        if ($row['remarks'] == 'loan disbursement') {
                          $disburseloan_nointerest = $row['disburseloan'] - $row['interest'];
                          if ($disburseloan_nointerest == "") {
                            $disburseloan_nointerest = "0";
                          }
                          echo "<td style='color: red;'>" . number_format($disburseloan_nointerest) . "</td>";
                        } else {
                          $echo_disburseloan = $row['disburseloan'];
                          if ($echo_disburseloan == "") {
                            $echo_disburseloan = "0";
                          }
                          echo "<td style='color: red;'>" . number_format($echo_disburseloan) . "</td>";
                          ;
                        }



                        if ($row['interest'] == 0 || $row['disburseloan'] < 1) {
                          $color = "transparent";
                        } else {
                          $color = "red";
                        }
                        echo "<td style='color: " . $color . ";'>" . number_format($row['interest']) . "</td>";
                        echo "<td style='color: green;'>" . number_format($row['repay']) . "</td>";
                        echo "<td>" . number_format($row['repaycumm']) . "</td>";

                        if ($row['remarks'] == 'loan disbursement') {
                          $display = $row['disburseloan'];
                        } else {
                          $display = $row['indbalance'];
                        }
                        echo "<td>" . number_format($display) . "</td>";


                        echo "</tr>";
                        $inc++;
                      }


                      echo ' </tbody>';
                      echo ' </table>';
                      echo '</div>';
                      echo '</div>';

                      if (isset($_POST['pen'])) {

                      }

                      ?>
                      <script>
                        function change_officer() {
                          var name = document.getElementById('name').value;
                          var codename = document.getElementById('codename').value;
                          var value = document.getElementById('autocomplete_staff').value;
                          //        alert('reading '+value+' '+name+' '+codename);
                          if (value === "") {
                            swal({
                              title: 'Denied!',
                              text: 'Please select Staff name',
                              icon: 'error',
                              buttons: {
                                confirm: { text: 'ok', className: 'sweet-orange' }

                              },
                              closeOnClickOutside: false
                            });
                            return false;
                          }

                          if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
                            xmlhttp = new XMLHttpRequest();
                          }
                          else {// code for IE6, IE5
                            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                          }

                          xmlhttp.open("GET", "officer_monthly.php?get_value=" + value + "&name=" + name + "&codename=" + codename, true);
                          xmlhttp.send();
                          xmlhttp.onreadystatechange = function () {
                            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                              ////                 document.getElementById("dispay").innerHTML = xmlhttp.responseText;;
                              var test = xmlhttp.responseText;
                              if (test === "yes") {
                                swal({
                                  title: 'Success!',
                                  text: 'Staff name assigned',
                                  icon: 'success',
                                  buttons: {
                                    confirm: { text: 'ok', className: 'sweet-orange' }

                                  },
                                  closeOnClickOutside: false
                                });
                              } else {
                                swal({
                                  title: 'Check Code!',
                                  text: 'A slight error occured, please check code',
                                  icon: 'error',
                                  buttons: {
                                    confirm: { text: 'ok', className: 'sweet-orange' }

                                  },
                                  closeOnClickOutside: false
                                });

                                //                                 window.location = 'staff_loan.php';
                              }
                            }
                          };



                        }


                      </script>
                      <script type='text/javascript'>
                        $(function () {
                          $("#autocomplete_staff").autocomplete({
                            source: function (request, response) {
                              $.ajax({
                                url: "autocomplete_staff.php",
                                type: 'post',
                                dataType: "json",
                                data: {
                                  search: request.term
                                },
                                success: function (data) {
                                  response(data);
                                }
                              });
                            },
                            select: function (event, ui) {
                              $('#autocomplete_staff').val(ui.item.label); // display the selected text
                              $('#selectuser_id').val(ui.item.value); // save selected id to input
                              return false;
                            }
                          });
                        });   
                      </script>
                      <script>

                        function add_penalty_rate() {
                          var name = document.getElementById('name').value;
                          var codename = document.getElementById('codename').value;

                          var value = 10;


                          if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
                            xmlhttp = new XMLHttpRequest();
                          }
                          else {// code for IE6, IE5
                            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                          }

                          xmlhttp.open("GET", "start_monthly_penalty.php?get_value=" + value + "&name=" + name + "&codename=" + codename, true);
                          xmlhttp.send();
                          xmlhttp.onreadystatechange = function () {
                            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                              ////                 document.getElementById("dispay").innerHTML = xmlhttp.responseText;;
                              var test = xmlhttp.responseText;
                              if (test === "yes") {
                                swal({
                                  title: 'Success!',
                                  text: 'Penalty rienstated',
                                  icon: 'success',
                                  buttons: {
                                    confirm: { text: 'ok', className: 'sweet-orange' }

                                  },
                                  closeOnClickOutside: false
                                });
                              } else {
                                swal({
                                  title: 'Check Code!',
                                  text: 'A slight error occured, please check code',
                                  icon: 'error',
                                  buttons: {
                                    confirm: { text: 'ok', className: 'sweet-orange' }

                                  },
                                  closeOnClickOutside: false
                                });

                                //                                 window.location = 'staff_loan.php';
                              }
                            }
                          };


                        };




                      </script>


                      <script>
                        /////////THIS IS TO WAVE INTEREST////////
                        $(document).ready(function () {

                          $("#wave_check").click(function () {
                            //            alert('SEE YOU');
                            var wave_interest = document.getElementById('wave_interest').value;
                            var name = document.getElementById('name').value;
                            var available_blance = document.getElementById('available_blance').value;
                            var codename = document.getElementById('codename').value;
                            swal({
                              title: 'Are you sure?',
                              text: 'You want to wave interest for ' + name + ' Monthly Repayment plan. DO YOU WISH TO CONTINUE?',
                              icon: 'warning',
                              buttons: true,
                              dangerMode: true
                            })
                              .then((willDelete) => {
                                if (willDelete) {


                                  var codename = document.getElementById('codename').value;
                                  if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
                                    xmlhttp = new XMLHttpRequest();
                                  }
                                  else {// code for IE6, IE5
                                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                                  }


                                  xmlhttp.open("GET", "wave_month_Ajax.php?wave_interest=" + wave_interest + "&codename=" + codename + "&available_blance=" + available_blance + "&name=" + name, true);
                                  xmlhttp.send();
                                  xmlhttp.onreadystatechange = function () {
                                    if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                                      var result_narrate = xmlhttp.responseText;
                                      if (result_narrate === "yes") {
                                        alert('Intrest Waved!!!');
                                      }
                                      //                                             document.getElementById('wave_interest').value = "";

                                    }
                                  };


                                } else {
                                  swal({
                                    text: 'Command Aborted!',
                                    buttons: {
                                      confirm: { text: 'ok', className: 'sweet-orange' },

                                    }
                                  });

                                  return false;
                                }

                              });
                          });

                        });


                      </script>








                      <script>
                        $(document).ready(function () {
                          $('#stop_pen').click(function () {
                            var name = document.getElementById('name').value;
                            var codename = document.getElementById('codename').value;
                            swal({
                              title: 'Are you sure?',
                              text: 'Do you wish to stop the penalty of ' + name + ' for loan [' + codename + ']',
                              icon: 'warning',
                              buttons: true,
                              dangerMode: true
                            })
                              .then((willDelete) => {
                                if (willDelete) {

                                  if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
                                    xmlhttp = new XMLHttpRequest();
                                  }
                                  else {// code for IE6, IE5
                                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                                  }


                                  xmlhttp.open("GET", "stop_monthly_penalty.php?name=" + name + "&codename=" + codename, true);
                                  xmlhttp.send();

                                  xmlhttp.onreadystatechange = function () {
                                    if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                                      var answer = xmlhttp.responseText;

                                      if (answer === 'yes') {
                                        swal({
                                          title: 'Success!',
                                          text: 'Penalty Stopped',
                                          icon: 'success',
                                          buttons: {
                                            confirm: { text: 'Ok', className: 'sweet-orange' },

                                          },
                                          closeOnClickOutside: false
                                        });
                                      }
                                      else {
                                        alert('No update ooooooo' + answer);
                                      }
                                    }
                                  };

                                  //                      return true;
                                } else {
                                  swal({
                                    text: 'Command Aborted!',
                                    buttons: {
                                      confirm: { text: 'ok', className: 'sweet-orange' },

                                    }
                                  });

                                  return false;
                                }
                              });
                          });

                        });
                      </script>



                      <!-- ============================================//  Reverse Existing Balance -->

                      <script>
                        $(document).ready(function () {
                          $('#loan_balance').click(function () {
                            var name = document.getElementById('name').value;
                            var codename = document.getElementById('codename').value;
                            var district = document.getElementById("district").value;
                            var av_bal = document.getElementById("av_bal").value;
                            swal({
                              title: 'Reverse Loan Balance?',
                              text: 'Are you sure you want to Reverse the Loan Balance of ' + name + ' for loan [' + codename + ']',
                              icon: 'warning',
                              buttons: true,
                              dangerMode: true
                            })
                              .then((willDelete) => {
                                if (willDelete) {

                                  if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
                                    xmlhttp = new XMLHttpRequest();
                                  }
                                  else {// code for IE6, IE5
                                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                                  }


                                  xmlhttp.open("GET", "reverse_loan_bal_monthly.php?name=" + name + "&codename=" + codename + "&district=" + district + "&av_bal=" + av_bal, true);
                                  xmlhttp.send();

                                  xmlhttp.onreadystatechange = function () {
                                    if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                                      var answer = xmlhttp.responseText;

                                      if (answer === 'yes') {
                                        swal({
                                          title: 'Success!',
                                          text: 'Loan Balance Successfully Reversed!!',
                                          icon: 'success',
                                          buttons: {
                                            confirm: { text: 'Ok', className: 'sweet-orange' },

                                          },
                                          closeOnClickOutside: false
                                        }).then(function () {
                                          location.reload();
                                        });
                                      } else {
                                        alert('No update ooooooo' + answer);
                                      }
                                    }
                                  };

                                  //                      return true;
                                } else {


                                  return false;
                                }
                              });

                          })
                        });

                        //    ==============================================================================================================================================

                      </script>






                      <!--=======================REVERSE BAD DEBT=====================================================================-->
                      <script>
                        $(document).ready(function () {
                          $('#bad_debt').click(function () {
                            var name = document.getElementById('name').value;
                            var codename = document.getElementById('codename').value;
                            swal({
                              title: 'Are you sure?',
                              text: 'Do you wish to Reverse the Bad Debt of ' + name + ' for loan [' + codename + ']',
                              icon: 'warning',
                              buttons: true,
                              dangerMode: true
                            })
                              .then((willDelete) => {
                                if (willDelete) {

                                  if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
                                    xmlhttp = new XMLHttpRequest();
                                  }
                                  else {// code for IE6, IE5
                                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                                  }


                                  xmlhttp.open("GET", "stop_bad_debt_monthly.php?name=" + name + "&codename=" + codename, true);
                                  xmlhttp.send();

                                  xmlhttp.onreadystatechange = function () {
                                    if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                                      var answer = xmlhttp.responseText;

                                      if (answer === 'yes') {
                                        swal({
                                          title: 'Success!',
                                          text: 'Bad Debt Deleted',
                                          icon: 'success',
                                          buttons: {
                                            confirm: { text: 'Ok', className: 'sweet-orange' },

                                          },
                                          closeOnClickOutside: false
                                        }).then(function () {
                                          location.reload();
                                        });
                                      }
                                      else {
                                        alert('No update ooooooo' + answer);
                                      }
                                    }
                                  };

                                  //                      return true;
                                } else {
                                  swal({
                                    text: 'Command Aborted!',
                                    buttons: {
                                      confirm: { text: 'ok', className: 'sweet-orange' },

                                    }

                                  })

                                  return false;
                                }
                              });





                          });

                        })
                      </script>










                      <script>
                        /////////THIS IS TO DEPOSIT INTO DATABASE////////
                        $(document).ready(function () {

                          $("#deposit_check").click(function () {
                            var deposit_amount = document.getElementById('deposit_amount').value;
                            var deposit_name = document.getElementById('name').value;
                            if (deposit_amount === "") {
                              swal({
                                title: 'Not Allowed!',
                                text: 'Please fill amount to deposit',
                                icon: 'error',
                                buttons: {
                                  confirm: { text: 'Ok', className: 'sweet-orange' }

                                },
                                closeOnClickOutside: false
                              });


                              $('#deposit_amount').focus();
                            } else {

                              swal({
                                title: 'Are you sure?',
                                text: "You want to deposit N" + deposit_amount + " for " + deposit_name + " Monthly Repayment plan. DO YOU WISH TO CONTINUE?",
                                icon: 'warning',
                                buttons: true,
                                dangerMode: true
                              })
                                .then((willDelete) => {
                                  if (willDelete) {
                                    var deposit_amount = $("#deposit_amount").val().split(",").join("");
                                    var codename = document.getElementById('codename').value;
                                    if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
                                      xmlhttp = new XMLHttpRequest();
                                    }
                                    else {// code for IE6, IE5
                                      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                                    }





                                    xmlhttp.open("GET", "deposit_Ajax1.php?depositing=" + deposit_amount + "&codename=" + codename, true);
                                    xmlhttp.send();
                                    xmlhttp.onreadystatechange = function () {
                                      if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                                        document.getElementById("display_table1").innerHTML = xmlhttp.responseText;;

                                        document.getElementById('deposit_amount').value = "";
                                        document.getElementById('click_deposit').click();

                                      }
                                    };
                                  } else {
                                    swal({
                                      text: 'Command Aborted!',
                                      buttons: {
                                        confirm: { text: 'ok', className: 'sweet-orange' },

                                      }
                                    });

                                    return false;
                                  }
                                });








                            }

                          });

                        });


                      </script>







                      <script>
                        function del_deposit(get_id) {
                          var get_id1 = document.getElementById('get_id').value;
                          //        alert(get_id1 +" "+ get_id);

                          swal({
                            title: 'Are you sure?',
                            text: "You are about to delete a deposit. DO YOU WISH TO CONTINUE?",
                            icon: 'warning',
                            buttons: true,
                            dangerMode: true
                          })
                            .then((willDelete) => {
                              if (willDelete) {
                                var codename = document.getElementById('codename').value;
                                if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
                                  xmlhttp = new XMLHttpRequest();
                                }
                                else {// code for IE6, IE5
                                  xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                                }





                                xmlhttp.open("GET", "delete_deposit.php?get_id=" + get_id + "&codename=" + codename, true);
                                xmlhttp.send();
                                xmlhttp.onreadystatechange = function () {
                                  if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                                    document.getElementById("display_table1").innerHTML = xmlhttp.responseText;;

                                    document.getElementById('deposit_amount').value = "";

                                  }
                                };
                              } else {
                                swal({
                                  text: 'Command Aborted!',
                                  buttons: {
                                    confirm: { text: 'ok', className: 'sweet-orange' },

                                  }
                                });

                                return false;
                              }
                            });

                        };
                      </script>






                      <script>
                        ////////////////LOAD DEPOSIT

                        var codename;
                        codename = document.getElementById('codename').value;
                        if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
                          xmlhttp = new XMLHttpRequest();
                        }
                        else {// code for IE6, IE5
                          xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                        }



                        xmlhttp.open("GET", "load_table.php?codename=" + codename, true);
                        xmlhttp.send();
                        xmlhttp.onreadystatechange = function () {
                          if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                            document.getElementById("display_table1").innerHTML = xmlhttp.responseText;

                          }
                        };




                      </script>



                      <script>
                        ////////////////SUBMIT DEPOSIT
                        $(document).ready(function () {
                          $("#deposit_check").click(function () {

                            var deposit = $("#deposit").val().split(",").join("");
                            //        var deposit = document.getElementById('deposit').value;
                            var codename = document.getElementById('codename').value;
                            if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
                              xmlhttp = new XMLHttpRequest();
                            }
                            else {// code for IE6, IE5
                              xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                            }

                            if (deposit === "") {
                              swal({
                                title: 'Not Allowed!',
                                text: 'You must fill amount to deposit',
                                icon: 'error',
                                buttons: {
                                  confirm: { text: 'Ok', className: 'sweet-orange' }

                                },
                                closeOnClickOutside: false
                              });




                            } else {


                              xmlhttp.open("GET", "deposit_Ajax.php?depositing=" + deposit + "&codename=" + codename, true);
                              xmlhttp.send();
                              xmlhttp.onreadystatechange = function () {
                                if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                                  document.getElementById("display_deposit").innerHTML = xmlhttp.responseText;;

                                  document.getElementById('deposit').value = "";

                                }
                              };

                            }
                          });
                        });




                      </script>












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
                          return event.keyCode >= 48 && event.keyCode <= 57 || event.keyCode == 46;
                        }

                      </script>












                      <script>
                        $(document).ready(function () {
                          var pena_java = $(".pena_java"); //LINK TO GO AND VIEW ALL DEBTORS   
                          $(pena_java).click(function (e) {
                            e.preventDefault();


                            var perc_java = document.getElementById("perc_java").value;
                            var name = document.getElementById("name").value;
                            var codename = document.getElementById("codename").value;
                            var type = document.getElementById("type").value;
                            var district = document.getElementById("district").value;
                            var av_bal = document.getElementById("av_bal").value;



                            if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
                              xmlhttp = new XMLHttpRequest();
                            }
                            else {// code for IE6, IE5
                              xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                            }


                            if (perc_java !== "") {
                              xmlhttp.open("GET", "penalty_calculate.php?perc_java=" + perc_java + "&name=" + name + "&codename=" + codename + "&type=" + type + "&district=" + district + "&av_bal=" + av_bal, true);
                              xmlhttp.send();
                              xmlhttp.onreadystatechange = function () {
                                if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {

                                  alert(xmlhttp.responseText);
                                  location.reload();
                                }
                              };

                            } else {
                              alert("Please fill percentage penalty");
                            }
                          });
                        });

                      </script>


                      <script>

                        <script>
                          function goBack() {
                            window.location = "monthly_debtors.php";
             }
                      </script>
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








  <!--==========MIRROR ALL INFORMATION TO THE MODAL=================================================-->
  <div class="modal fade" id="JohnDoe" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">

          <h4 class="modal-title mx-auto">
            <center>
              <b style="color:#ff5d0f; font-weight: 900;white-space: pre-line;">FINSOLUTE INVESTMENT</b>
              <br>
              <label style="white-space: pre-line; font-size: 16px;">Address: XYZ Plaza, Jankara junction. Ijaiye,
                Lagos.</label>
            </center>
          </h4>

        </div>
        <div class="modal-body">
          <center>
            <div width="140" height="140" class="mb-2">
              <img id="img123" src="<?php echo $image; ?>" alt="CLICK 'BROWSE' TO UPLOAD PHOTO"
                style="border: 4px #99ff99 solid; width:140px; height:140px;">
            </div>

          </center>

          Full Name:
          <input type="text" class="form-control" placeholder="Name" value="<?php echo $name; ?>" readonly=""
            style="text-transform: uppercase;">
          <br>

          Address:
          <input type="text" class="form-control" placeholder="enter Address" value="<?php echo $address; ?>"
            readonly="">

          <br>
          Telephone:
          <input class="form-control" type="number" placeholder="enter phone_number" value="<?php echo $tel; ?>"
            readonly="">

          <br>

          Total Amount Disbursed:
          <?php $disburseloan_show = $available_blance - $interest; ?>
          <input class="form-control" type="text" value="<?php echo number_format($disburseloan_show); ?>" readonly="">
          <br>




          Total Amount Paid:
          <input class="form-control" type="text" value="<?php echo number_format($available_blance); ?>" readonly="">
          <br>


          Disbursement Date:
          <?php $startdate_show = date("jS F Y", strtotime($startdate)); ?>
          <input class="form-control" type="text" value="<?php echo $startdate_show; ?>" readonly="">
          <br>




          Monthly Repayment:
          <?php $monthly_repayment = $disburseloan22 / $monthno ?>
          <input class="form-control" type="text" value="<?php echo number_format($monthly_repayment) ?>" readonly="">
          <br>


          Signature: _______________________________ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Date____________________


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" onclick="functionPrint()" data-dismiss="modal">Print</button>

          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <!--=======================================================-->



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


  <script>
                          /////REMOVE nav2 for table     
                          var size = window.innerWidth;
//       alert(size);
     if(size > 1000){
                            setTimeout(function () { document.getElementById("mymenu2").click(); }, 1000);
     }
  </script>




  <script>
                          //     THIS IMPLIES THAT THE nonPrintable AREA SHOULD USE THE CSS STYLE CLASS "noprint"     
                          function functionPrint() {
                            document.getElementById("nonPrintable").className += "noPrint";
                          //print modal in printable area
                          window.print();
    }
  </script>

  <script>
                          ///print once and empty session
                          var form_go = document.getElementById('form_go').value;
                          if (form_go === "3") {
                            document.getElementById('agree').click();
   }

                          document.getElementById('form_go').value = "";
  </script>




  <script>
                          $(document).ready(function (){
                            $(".myImg").click(function () {


                              // Get the modal
                              var modal = document.getElementById("myModal33");

                              // Get the image and insert it inside the modal - use its "alt" text as a caption
                              //    var img = document.getElementsByClassName("myImg");
                              var modalImg = document.getElementById("img01");
                              var captionText = document.getElementById("caption");

                              modal.style.display = "block";
                              modalImg.src = this.src;
                              captionText.innerHTML = this.alt;

                            })  ;  
        });

  </script>
  <script>


                          var span = document.getElementsByClassName("modal22")[0];
                          $(document).ready(function (){
                            $(span).click(function () {
                              var modal = document.getElementById("myModal33");

                              modal.style.display = "none";

                            })  ;  
        });
  </script>

  <?php $_SESSION['store_print_monthly'] = "" ?>

</body>

</html>