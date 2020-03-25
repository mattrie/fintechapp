<?php
session_start();
include 'connection.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Cron Job Monthly Loan Statement</title>
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


                      $quco111 = mysqli_query($connect, "SELECT * FROM members WHERE monthlyindbal > 1");

                      while ($row = mysqli_fetch_assoc($quco111)) {
                        $get_monthlyenddate = $row['monthlyenddate'];
                        $get_monthlyindbal = $row['monthlyindbal'];


                        ///////////////////////////////////////
                        //GET NUMBER OF MONTHS & DAYS LEFT
                        $dated = strtotime("$get_monthlyenddate");

                        $remaining = $dated - time();


                        ///////COUNT ONLY DAYS
                        $days_remaining = floor($remaining / 86400);



                        if ($days_remaining < 0 && $get_monthlyindbal > 1) {
                          $name = $row['namee'];
                          $codename = $row['monthlycode'];

                          //    =================================== // REAL PAGE STARTS HERE=====================================================           
                      

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



                          $output_closedate = date('d-M-Y', strtotime($closingdate));

                          ///////////////////////////////////////
                          //GET NUMBER OF MONTHS & DAYS LEFT
                          $dated = strtotime("$closingdate");

                          $remaining = $dated - time();



                          ///////COUNT ONLY DAYS
                          $days_remaining = floor($remaining / 86400) . " days left";
                          //     ------------------------------------------------------------------------   
                      
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

                            //     ---------------------------We set warning to empty so the debtor can be warned if warning does not exit--------------------------------------------- 
                            $update_warning = mysqli_query($connect, "UPDATE monthly_allloan SET warning='' WHERE indbalance > 1 AND remarks = 'loan disbursement' AND codename = '$codename'");
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
                              $output_new_closedate = date('d-M-Y', strtotime($new_closedate));
                              echo "";

                              $id = "";
                            } else {
                              echo "<script>alert('Recheck')</script>";
                            }
                          }

                        }

                      }
                      ?>
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
    if (size > 1000) {
      setTimeout(function () { document.getElementById("mymenu2").click(); }, 1000);
    }
  </script>



</body>

</html>