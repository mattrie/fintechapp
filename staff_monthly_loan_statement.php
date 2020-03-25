<?php
session_start();
include 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Staff Loan_statement</title>
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
                                            <h5 class="m-b-10">Monthly_Loan_Statement</h5>
                                            <p class="m-b-0">Monthly</p>
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


                                        <?php

                                        //loop through all table rows
                                        
                                        $name = $codename = $type = "";

                                        @$name = $_GET['name'];
                                        @$codename = $_GET['codename'];
                                        @$type = $_GET['type'];
                                        if (isset($_SESSION['redirect_message_monthly_staff'])) {
                                            echo $_SESSION['redirect_message_monthly_staff'];
                                            $_SESSION['redirect_message_monthly_staff'] = "";
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
                                        ////////get details from loan database (type and end date)
                                        //     ------------------------------------------------------------------------  
                                        $closingdate = "";
                                        $sql_state1 = "SELECT * FROM monthly_allloan WHERE codename = '$codename' AND disburseloan > 1 AND remarks = 'loan disbursement'";
                                        $result1 = mysqli_query($connect, $sql_state1);

                                        while ($row = mysqli_fetch_assoc($result1)) {
                                            $closingdate = $row["enddate"];
                                            $intno = $row["intno"];
                                            $loan_type = $row["type"];
                                            $acc_officer = $row['acc_officer'];
                                        }

                                        $output_closedate = date('d-M-Y', strtotime($closingdate));

                                        ///////////////////////////////////////
                                        //GET NUMBER OF MONTHS & DAYS LEFT
                                        $dated = strtotime("$closingdate");

                                        $remaining = $dated - time();
                                        $remain_days = date('d', $remaining);


                                        $getmonth = date('m', $remaining);
                                        $remain_months = $getmonth - 1;


                                        ///////COUNT ONLY DAYS
                                        $days_remaining = floor($remaining / 86400) . " days left";
                                        //     ------------------------------------------------------------------------   
                                        echo '<div class="row">';

                                        echo '<div class="col-sm-3" >';
                                        echo "<p style='font-size:18px; color:black; margin-bottom:30px; margin-left: 35px;'>";
                                        echo "<label>Name: " . $name . "</label><br>";
                                        echo "<label>Tel: " . $tel . "</label><br>";
                                        echo "<label>Address: " . $address . "</label><br>";
                                        echo "<label>Expiry Date: " . $output_closedate . "</label><br>";
                                        echo "<label>RM: " . $days_remaining . "</label><br>";
                                        echo "<label>Refree: " . $refree . "</label><br>";
                                        echo "<label><b>Account Officer: " . $acc_officer . "</b></label><br>";
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
                                        if ($days_remaining < 0 && $available_blance > 0 && $check_remarks != 'Bad Debt Settled by Finsolute') {


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
                                                $mssg = "Penalty->₦$sms_parent1. New_Bal->₦$sms_balance1.";
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
                                                echo "<script>alert('Notification: $name has been given a penalty fee of " . number_format($penalty) . " Naira. Total balance now is: " . number_format($available_blance) . " Naira Only. Due Date for Next Penalty is $output_new_closedate')</script>";
                                                $id = "";
                                            } else {
                                                echo "<script>alert('Recheck')</script>";
                                            }
                                        }
                                        ///////////////////////////////////----------------------------------////////////////////         
                                        









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



                                        echo "<label style='font-size: 18px; font-weight: bold;'>Total Penalty Awarded: <input type='text' id='perc_java' value='" . number_format($true_penalty) . "' style='color: red; font-weight: bold;' placeholder='None' readonly='true' name='penalty'/></label>";
                                        echo '</form>';
                                        echo "</div>";


                                        echo '<div class="col-sm-3">';
                                        echo "<a class='btn' style='color: whitesmoke; background-color: green;' href='staff_monthly_payment.php?codename=" . $codename . " &name=" . $name . "'>Make Payments</a>";

                                        echo "<br><a href='staff_monthly_payment.php' style='color:blue;'>Click Here for Blank Payment Panel</a>";

                                        echo "</div>";

                                        echo '<div class="col-sm-3">';
                                        echo '<div  style="margin-left: 40px; width:140px; height:140px;">
            <img id="img" src="' . $image . '" alt="THIS IS LOADS PHOTO"  style="border: 4px #99ff99 solid; width:140px; height:140px;" >
              </div>';
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

                                        echo '<CAPTION><h3 align="center" style="font-size:20px; color: black;"> Codename: (' . $codename . ') - ACCOUNT STATEMENT. [MONTHLY]</h3></CAPTION>';
                                        echo '<table class="table table-bordered table-striped" align="center">';

                                        echo '<thead class="thead-dark">';
                                        echo '<tr align = "center">';
                                        echo '<th>S/N</th>';
                                        echo '<th>Date</th>';
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
                                            echo "<td>" . $row['remarks'] . "</td>";

                                            $disburseloan_nointerest = $row['disburseloan'] - $row['interest'];
                                            if ($disburseloan_nointerest < 1) {
                                                $disburseloan_nointerest = "";
                                            }
                                            echo "<td style='color: red;'>" . @number_format($disburseloan_nointerest) . "</td>";

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

                                            //Function 4     FUNCTION IN A FUNCTION (ADD NEW OVERHEAD TO DATABASE) 




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
                                            function goBack() {
                                                window.location = "staff_home.php";
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


        <script>
            /////REMOVE nav2 for table     
            var size = window.innerWidth;
            //       alert(size);
            if (size > 1000) {
                setTimeout(function () { document.getElementById("mymenu2").click(); }, 1000);
            }
        </script>


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


            window.onload = function () {
                document.getElementById('magic-collapse').click();

            };
        </script>





</body>

</html>