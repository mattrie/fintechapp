<?php
session_start();
include 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Weekly Loan Statement</title>
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
                                                <h5 class="m-b-10">Weekly Loan Statement</h5>
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
                                            <?php
                                            if (isset($_SESSION['store_print_weekly'])) {
                                                $three = $_SESSION['store_print_weekly'];
                                            }
                                            ?>

                                            <i id="agree" data-toggle="modal" data-target="#JohnDoe"
                                                data-backdrop="static" data-keyboard="false"></i>
                                            <input type="hidden" name="" id="form_go" class="form-control-bold"
                                                value="<?php echo $three; ?>" />
                                            <!--^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^-->


                                            <?php
                                            //loop through all table rows
                                            
                                            $quco111 = mysqli_query($connect, "SELECT * FROM members WHERE weeklyindbal > 1");


                                            while ($row = mysqli_fetch_assoc($quco111)) {
                                                $get_weeklyenddate = $row['weeklyenddate'];
                                                $get_weeklyindbal = $row['weeklyindbal'];



                                                ///////////////////////////////////////
                                                //GET NUMBER OF MONTHS & DAYS LEFT
                                                $dated = strtotime("$get_weeklyenddate");
                                                $remaining = time() - $dated;
                                                ///////COUNT ONLY DAYS
                                                $days_remaining = floor($remaining / 86400);
                                                if ($days_remaining >= 25 && $get_weeklyindbal > 1) {

                                                    ///                    =================================== // REAL PAGE STARTS HERE=====================================================
                                                    $name = $row['namee'];
                                                    $codename = $row['weeklycode'];
                                                    ////////get details from loan database (type and end date)
                                                    //     ------------------------------------------------------------------------  
                                                    $closingdate = "";
                                                    $sql_state1 = "SELECT * FROM weekly_allloan WHERE codename = '$codename' AND disburseloan > 1 AND remarks = 'loan disbursement'";
                                                    $result1 = mysqli_query($connect, $sql_state1);

                                                    while ($row = mysqli_fetch_assoc($result1)) {
                                                        $closingdate = $row["enddate"];
                                                        $loan_type = $row["type"];
                                                        $disburseloan = $row["disburseloan"];
                                                        $percentage = $row["percentage"];
                                                        $no_weeks = $row['weeks'];
                                                        $date_format = $row['date_format'];
                                                        $name = $row['name'];
                                                        $waver = $row['waver'];
                                                        $interest = $row['interest'];
                                                        $startdate = $row['startdate'];
                                                        $disburseloan22 = $row['disburseloan'];
                                                        $weeks = $row['weeks'];
                                                        $proposedsavings = $row['proposedsavings'];
                                                        $acc_officer = $row['acc_officer'];
                                                        $month_charged = $row['month_charged'];
                                                    }
                                                    @$type = $_GET['type'];



                                                    ////SELECT NAME FROM DATABASE TO LOAD PASSPORT TEL & ADDRESS
                                                    $debtor_info = mysqli_query($connect, "SELECT * FROM members WHERE namee = '$name'");
                                                    while ($row_info = mysqli_fetch_assoc($debtor_info)) {
                                                        $address = $row_info['addresss'];
                                                        $tel = $row_info['telephone'];
                                                        $image = $row_info['imagess'];
                                                        $refree = $row_info['religion'];
                                                        $get_branch = $row_info['branch'];
                                                    }




                                                    $output_closedate = date('d-M-Y', strtotime($closingdate));

                                                    ///////////////////////////////////////
                                                    //GET NUMBER OF MONTHS & DAYS LEFT
                                                    $dated = strtotime("$closingdate");

                                                    $remaining = $dated - time();

                                                    //           $remain_days = date('d',$remaining) ;
//                 $getmonth = date('m',$remaining);
//                $remain_months = $getmonth - 1;
                                                    ///////COUNT ONLY DAYS
                                                    $days_remaining = floor($remaining / 86400);
                                                    $weeks_remaining = floor($days_remaining / 7) . " weeks left";



                                                    //  ====================================================================================================      
                                                    ////////Specially get the last date paid so we scan for penalty
                                                    //     ------------------------------------------------------------------------  
                                                    $sql_state15 = "SELECT * FROM weekly_allloan WHERE codename = '$codename' AND type = 'Weekly Payment'";
                                                    $result15 = mysqli_query($connect, $sql_state15);
                                                    while ($row = mysqli_fetch_assoc($result15)) {
                                                        $lastpaiddate = $row["lastpaiddate"];
                                                    }

                                                    $dated_lastpaid = strtotime("$lastpaiddate");




                                                    $days_remaining_pen = "";
                                                    ////////////////NEW PENALTY CALCULATION/////////////  
                                                    $date_format;
                                                    $start_date = strtotime("$date_format");

                                                    $start_date_from = time() - $start_date;
                                                    $start_date_from1 = floor($start_date_from / 86400);

                                                    $dailyp = $disburseloan / $no_weeks;

                                                    //              START DAY - TODAYS DAY
                                                    $get_start = date('jS', strtotime($startdate));
                                                    $get_today = date('jS');
                                                    //                if ($get_start === $get_today) {
//                 echo "<script>alert('YES $lastmonth_day  $currentmonth_day');</script>";
//}  else {
//       echo "<script>alert('NO');</script>";
//}
                                            
                                                    $wekkly_payment = ceil($dailyp);
                                                    $monthly_payment = $wekkly_payment * 4;

                                                    $get_beginday = date('d', strtotime($startdate));
                                                    $get_todaysday = date('d');


                                                    //  PLEASE NOTE THAT IF DATE FROM WHEN MONEY IS COLLECTED IS GREATER THAN 40 DAYS
//  THEN WE CALCULATE USING THE START DAY AS REFRENCE FOR THE START AND END POINT 
//  IN THE PREVIOUS AND CURRENT MONTH. SO AFTER GAP CALCULATION WE NOW KNOW
//   IF THE CUSTOMER HAS MET UP WITH THE MONTHLY PAYMENT.      
                                                    $lastmonth = date('F', strtotime('last month'));
                                                    //                                                echo "<script>alert('$lastmonth');</script>";
                                                    $lastmonth_day = date('Y-m', strtotime('last month')) . "-$get_beginday";
                                                    $currentmonth_day = date('Y-m') . "-$get_beginday";

                                                    $currentmonth_day_strto = strtotime($currentmonth_day);
                                                    $lastmonth_day_strto = strtotime($lastmonth_day);
                                                    $get_penalty = "";
                                                    //        CHECK IF PENALTY HAS BEEN AWARDED IN CURRENT MONTH
                                                    $check_current_month_penalty = mysqli_query($connect, "SELECT * FROM weekly_allloan WHERE codename = '$codename' AND remarks = 'Penalty' AND month = '" . date('F') . "'");
                                                    while ($row = mysqli_fetch_assoc($check_current_month_penalty)) {
                                                        $get_penalty = $row['remarks'];
                                                    }

                                                    $result_last_month = mysqli_query($connect, "SELECT SUM(repay) as total_last_month FROM weekly_allloan WHERE codename = '$codename' AND date_format BETWEEN '$lastmonth_day' AND '$currentmonth_day' AND remarks = 'loan repayment'");


                                                    while ($row33 = mysqli_fetch_assoc($result_last_month)) {
                                                        $total_last_month = $row33['total_last_month'];
                                                    }
                                                    $amount_to_charge_as_penalty = $monthly_payment - $total_last_month;

                                                    if ($start_date_from1 > 33 && $get_penalty != 'Penalty') {

                                                        if ($total_last_month < $monthly_payment && $lastmonth != $month_charged && $get_todaysday > $get_beginday) {
                                                            $days_remaining_pen = 33;
                                                        }
                                                    } else {
                                                        $days_remaining_pen = 0;
                                                    }

                                                    ////////////////END NEW PENALTY CALCULATION/////////////   
//     ------------------------------------------------------------------------   
                                            


                                                    echo "<p>";
                                                    /////CREATE HIDDEN INPUT TEXTBOX TO CARRY VALUES TO JAVASCRIPT 
//        PLEASE NOTE THAT YOU HAVE TO USE SOME "\" TO AVOID BRAKE SPACE IN NAMES
                                                    echo "<input type='hidden' value=\"" . $name . "\" id = 'name'/>";
                                                    echo '<input type="hidden" value=\'' . $codename . '\' id = "codename"/>';
                                                    echo '<input type="hidden" value=\'' . $type . '\' id="type"/>';



                                                    ////////GET THE LAST BALANCE
                                                    $sql_state2 = "SELECT * FROM weekly_allloan WHERE name = '$name' AND codename = '$codename'";
                                                    $result2 = mysqli_query($connect, $sql_state2);

                                                    while ($row = mysqli_fetch_assoc($result2)) {
                                                        $available_blance = $row["indbalance"];
                                                        $loan_type = $row["type"];
                                                        $check_remarks = $row["remarks"];
                                                    }


                                                    $weekly_payment1 = $disburseloan / $no_weeks;
                                                    $weekly_payment = ceil($weekly_payment1);
                                                    $weeks3_payment = $weekly_payment * 3;
                                                    ///////////////////////////////////----------------------------------////////////////////         
//            LETS DO AUTOMATIC REWARD PENALTY
                                                    if ($days_remaining_pen > 31 && $available_blance > 0 && $check_remarks != 'Bad Debt Settled by Finsolute' && $waver != 1) {




                                                        //  *******************************************************************************************************                
                                                        /////THIS IS TO SUM PAYMENTS TO ADD IT TO REPAY SO WE  KNOW IF PENALTY CAN BE AWARDED
                                                        $total_payments24 = mysqli_query($connect, "SELECT SUM(repay) as total FROM weekly_allloan WHERE codename='$codename'");
                                                        while ($row1 = mysqli_fetch_array($total_payments24)) {
                                                            $summation_pay2 = $row1['total'];
                                                        }


                                                        /////THIS IS TO SUM PAYMENTS TO ADD IT TO SAVINGS SO WE  KNOW IF PENALTY CAN BE AWARDED
                                                        $total_payments26 = mysqli_query($connect, "SELECT SUM(savings) as total FROM weekly_allloan WHERE codename='$codename'");
                                                        while ($row1 = mysqli_fetch_array($total_payments26)) {
                                                            $summation_savings2 = $row1['total'];
                                                        }
                                                        $lets_know_if_loan_Iscomplete = $summation_pay2 + $summation_savings2;


                                                        /////LETS GET THE AMOUNT COLLECTED
                                                        $amount_disbursed = "";
                                                        $total_disburse28 = mysqli_query($connect, "SELECT * FROM weekly_allloan WHERE codename='$codename' AND disburseloan > 1 AND remarks = 'loan disbursement'");
                                                        while ($row1 = mysqli_fetch_array($total_disburse28)) {
                                                            $amount_disbursed = $row1['disburseloan'];
                                                        }


                                                        //  *******************************************************************************************************               
                                            

                                                        if ($lets_know_if_loan_Iscomplete < $amount_disbursed) {

                                                            $date = date("jS F Y");
                                                            $month = date("F");
                                                            $year = date("Y");

                                                            $decimal_pen = $percentage / 100;
                                                            $penalty = $decimal_pen * $amount_to_charge_as_penalty;

                                                            //             ---------------------------------------
//        //          SET NEW DATE FOR ANOTHER PENALTY 
                                            
                                                            $today1 = time();
                                                            //          $new_closedate  = date('Y-m-d', $today1. ' + 21 days');
                                            
                                                            $today_date = date('Y-m-d', time());
                                                            //       -----------------------------------------------------------   
//           UPDATE LOAN NEW END DATE 
//       $sql_state12 = "UPDATE weekly_allloan SET enddate = '$new_closedate' WHERE name = '$name' AND disburseloan > 1 AND remarks = 'loan disbursement' AND codename = '$codename'";
//            $result12 = mysqli_query($connect, $sql_state12);
//          INSERT NEW PENALTY INTO DATEBASE
                                                            $sql_statement = "INSERT INTO weekly_allloan (name, type, remarks, disburseloan, codename, date, month, year, lastpaiddate, branch) VALUES ('$name', 'Weekly Payment', 'Penalty', '$penalty', '$codename', '$date', '$month', '$year', '$today_date', '$get_branch')";
                                                            $result = mysqli_query($connect, $sql_statement);


                                                            ////GET THE REMAINING LATEST BALANCE OF LOAN FOR AN INDIVIDUAL
                                                            $summation_loan2 = "";
                                                            $summation_pay2 = "";

                                                            ///////THIS IS TO GET THE INDIVIDUAL BALANCE
                                                            ////////////THIS IS TO SUM LOAN
                                                            $code_loan = mysqli_query($connect, "SELECT SUM(disburseloan) as total FROM weekly_allloan WHERE codename = '$codename' ");
                                                            while ($row = mysqli_fetch_assoc($code_loan)) {
                                                                $summation_loan2 = $row['total'];
                                                            }

                                                            ////////////THIS IS TO SUM PAYMENTS
                                                            $total_payments2 = mysqli_query($connect, "SELECT SUM(repay) as total FROM weekly_allloan WHERE codename='$codename'");
                                                            while ($row1 = mysqli_fetch_array($total_payments2)) {
                                                                $summation_pay2 = $row1['total'];
                                                            }

                                                            /////LETS GET THE BALANCE
                                                            $available_blance = $summation_loan2 - $summation_pay2;


                                                            ////////GET ALL REVERSAL PAYMENT TO MINUS FROM
                                                            $total_payments33 = mysqli_query($connect, "SELECT SUM(disburseloan) as total FROM weekly_allloan WHERE codename='$codename' AND remarks = 'Reversal Entry'");
                                                            while ($row1 = mysqli_fetch_array($total_payments33)) {
                                                                $summation_reverse2 = $row1['total'];
                                                            }
                                                            $original_summation = $summation_pay2 - $summation_reverse2;
                                                            //        -----------------------------------------------------------------------             
                                                            /////////SUM GENERAL REPAY & DISBURSE LOAN SO YOU CAN GET GEN BALALNCE
                                                            ////////////THIS IS TO SUM PAYMENTS
                                                            $total_payments = mysqli_query($connect, "SELECT SUM(repay) as total FROM weekly_allloan");
                                                            while ($row1 = mysqli_fetch_array($total_payments)) {
                                                                $summation_pay = $row1['total'];
                                                            }


                                                            ////////////THIS IS TO SUM DISBURSE
                                                            $total_disburse2 = mysqli_query($connect, "SELECT SUM(disburseloan) as total FROM weekly_allloan");
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



                                                            //       *********************************||||||||||||||||****************************************************            
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
                                                            $get_last_id = mysqli_query($connect, "SELECT * FROM weekly_allloan");
                                                            while ($row = mysqli_fetch_assoc($get_last_id)) {
                                                                $id = $row['id'];
                                                            }

                                                            ////UPDATE TO GET A NEW INDIVIDUAL BALANCE
                                                            $result2 = mysqli_query($connect, "UPDATE weekly_allloan SET genbalance = '$gen_balance',  repaycumm = '$original_summation', indbalance = '$available_blance' WHERE id = '$id'");
                                                            //           UPDATE weeklyenddate FOR MEMEBERS DB TO AUTO-DETECT PENALTY
                                                            $result222 = mysqli_query($connect, "UPDATE members SET weeklyindbal = '$available_blance', weeklyenddate = '$today_date', weeklycode = '$codename' WHERE namee = '$name'");
                                                            $sql_sum_repay = mysqli_query($connect, "UPDATE weekly_allloan SET  indbalance = '$available_blance', month_charged = '$lastmonth' WHERE disburseloan > 1 AND codename='$codename' AND remarks = 'loan disbursement'");

                                                            ///---------------------/ TO GET PHONE------------
                                                            $debtor_info = mysqli_query($connect, "SELECT * FROM members WHERE namee = '$name'");
                                                            while ($row_info = mysqli_fetch_assoc($debtor_info)) {
                                                                $address = $row_info['addresss'];
                                                                $tel = $row_info['telephone'];
                                                                $image = $row_info['imagess'];
                                                                $district = $row_info['registration_num'];
                                                                $refree = $row_info['religion'];
                                                            }
                                                            $update_warning = mysqli_query($connect, "UPDATE weekly_allloan SET warning='' WHERE indbalance > 1 AND remarks = 'loan disbursement' AND codename = '$codename'");
                                                            //     ------------------------------------------------------------------------ 
                                            
                                                            if ($result2 == true) {
                                                                //..........................TERMII SMS START.......................................
                                            

                                                                $sms_date = date("d-M-Y h:ia");
                                                                $sms_name = $name;

                                                                $sms_parent = number_format($penalty);
                                                                $sms_balance = number_format($available_blance);
                                                                $naija_code = "+234";
                                                                $phone = $naija_code . ltrim($tel, '0');
                                                                $curl = curl_init();
                                                                curl_setopt_array(
                                                                    $curl,
                                                                    array(
                                                                        CURLOPT_URL => 'https://api.ng.termii.com/api/sms/send',
                                                                        CURLOPT_RETURNTRANSFER => true,
                                                                        CURLOPT_ENCODING => '',
                                                                        CURLOPT_MAXREDIRS => 10,
                                                                        CURLOPT_TIMEOUT => 0,
                                                                        CURLOPT_FOLLOWLOCATION => true,
                                                                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                                                        CURLOPT_CUSTOMREQUEST => 'POST',
                                                                        CURLOPT_POSTFIELDS => ' {
                                                                                            "to": "' . $phone . '",
                                                                                             "from": "FINSOLUTE",
                                                                                             "sms": "Penalty-> ₦' . $sms_parent . '. New_Bal->₦' . $sms_balance . '.",
                                                                                             "type": "plain",
                                                                                             "channel": "generic",
                                                                                             "api_key": "TLpOlmFOTXS8w6kjUiqdhXTYYKXAGES30NEAb8ubc51v5BpS3p2vnE1euNXgvW"

                                                                                         }',
                                                                        CURLOPT_HTTPHEADER => array(
                                                                            'Content-Type: application/json'
                                                                        ),
                                                                    )
                                                                );
                                                                $response = curl_exec($curl);

                                                                //..........................TERMII SMS END.......................................                               
//                     $output_new_closedate = date('d-M-Y', strtotime($new_closedate));         
                                                                echo "";

                                                                $id = "";
                                                            } else {
                                                                echo "<script>alert('Error')</script>";
                                                            }
                                                        }


                                                    }
                                                }

                                            } ?>

                                            <!-- The Modal -->


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


    <!--===========================================================-->

    <!--=======================================================-->

    <script>
        /////REMOVE nav2 for table     
        var size = window.innerWidth;
        //       alert(size);
        if (size > 1000) {
            setTimeout(function () {
                document.getElementById("mymenu2").click();
            }, 1000);
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



    <?php $_SESSION['store_print_weekly'] = "" ?>

</body>

</html>