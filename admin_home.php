<?php

session_start();
include 'connection.php';
if (empty($_SESSION['id_admin'])) {

    echo "<script type='text/javascript'> $(document).ready(function(){ 
                swal({
                         title: 'Sorry!',
                         text: 'You must first login ooooo',
                         icon: 'error',
                        buttons: {
                            confirm : {text:'Enter',className:'sweet-orange'},
                          
                        },
                        closeOnClickOutside: false
                       })
                  .then(function() {
                     window.location = 'fin_admin.php';
                   });   
                }); </script>";

}


if (isset($_SESSION['store_black_list'])) {
    echo $_SESSION['store_black_list'];
    $_SESSION['store_black_list'] = "";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>DASHBOARD</title>
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
            include 'admin_nav1.php';
            ?>

            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <?php
                    include 'admin_nav2.php';
                    ?>
                    <div class="pcoded-content">
                        <?php
                        $summation_loan = $summation_contribution = $summation_withdraw = $summation_repay = $summation_bal = $summation_disburseloan = $count_members
                            = $expenses = $revenue = $profit = $expenses_year = $summation_loan_monthly = $revenue_year = $profit_year
                            = $summation_disburseloan_weekly = $total_disburseloan_all = $count_active = $count_non_active = $summation_savings =
                            $summation_investment = $summation_equity = $summation_repay_weekly = $total_repayall = $summation_loan_weekly =
                            $total_loan = "";

                        /////TEMPOARILY REMOVE ILLEGAL UPDATES
//        $result_temp = mysqli_query($connect, "SELECT * FROM allloan WHERE indbalance = 60000 AND remarks = 'loan disbursement' AND    (reverse_alert = '' OR reverse_alert IS NULL) ORDER BY id DESC");  
//     while($row = mysqli_fetch_assoc($result_temp)){
//         if($row['repay_sum'] >= $row['disburseloan'] && $row['indbalance'] = 60000){
//             $id_zero = $row['id'];
//                $update_to_zero = mysqli_query($connect, "UPDATE allloan SET indbalance = 0, dailyindbal = 0 WHERE id = '$id_zero'");
//           if ($update_to_zero ==true) {
//                  echo "<script>alert('Lolo')</script>";
//              }
//         }               
//      }
                        




                        ///GET ALL DEBTORS FOR DAILY
                        ////////////THIS IS TO SUM DAILY
                        $total_repay11 = mysqli_query($connect, "SELECT SUM(repay) as total FROM allloan");
                        while ($row = mysqli_fetch_array($total_repay11)) {
                            $summation_repay11 = $row['total'];
                        }

                        ////////////THIS IS TO SUM DAILY
                        $total_daily = mysqli_query($connect, "SELECT SUM(disburseloan) as total FROM allloan");
                        while ($row = mysqli_fetch_array($total_daily)) {
                            $summation_loan11 = $row['total'];
                        }

                        $summation_loan = $summation_loan11 - $summation_repay11;

                        $sum_unearned = 0;
                        $sum_unearned22 = mysqli_query($connect, "SELECT SUM(sum_unearned) as total FROM allloan");
                        while ($row = mysqli_fetch_array($sum_unearned22)) {
                            $sum_unearned = $row['total'];
                        }



                          //////===============Weekly
                          $total_weekly = mysqli_query($connect, "SELECT SUM(disburseloan) as total, interest, SUM(interest) as sum_int2 FROM weekly_allloan");
                          while ($row = mysqli_fetch_array($total_weekly)) {
                              $summation_loan_weekly = $row['total'] - $row['interest'];
                              $sum_int2 = $row['sum_int2'];
                          }

                          $sql_all_get112 = mysqli_query($connect, "SELECT * FROM weekly_allloan WHERE remarks = 'loan disbursement'");
                          while ($row = mysqli_fetch_array($sql_all_get112)) {
                              $total_weekly = mysqli_query($connect, "SELECT SUM(disburseloan) as total, SUM(interest) as sum_int, SUM(repay_sum) as repay_sum FROM weekly_allloan WHERE remarks = 'loan disbursement'");
                              while ($row = mysqli_fetch_array($total_weekly)) {
                                  $summation_loan_weekly1 = $row['total'];
                                  $sum_int = $row['sum_int'];
                                  $repay_sum = $row['repay_sum'];
  
                                  $getEarnedIncome = $repay_sum / ($summation_loan_weekly1 / $sum_int);
  
                              }
  
  
                          }

                          // New Weekly Unearned Income
                          $get_revenue_weekly = mysqli_query($connect, "SELECT SUM(revenue) as weekly_rev FROM revenuexp WHERE category = 'interest_weekly'");
                          while ($row = mysqli_fetch_array($get_revenue_weekly)) {
                            $sum_revenue_weekly = $row['weekly_rev'];
                          }

                        //   echo "<script>alert('$sum_revenue_weekly')</script>";

  
                          $weekly_unearned_income = $sum_int2 - $sum_revenue_weekly;
  
  

                        ///GET ALL DEBTORS FOR WEEKLY
                        ////////////THIS IS TO SUM weekly_
                        $total_repay22 = mysqli_query($connect, "SELECT SUM(repay) as total FROM weekly_allloan");
                        while ($row = mysqli_fetch_array($total_repay22)) {
                            $summation_repay22 = $row['total'];
                        }
                        $total_weekly = mysqli_query($connect, "SELECT SUM(disburseloan) as total FROM weekly_allloan");
                        while ($row = mysqli_fetch_array($total_weekly)) {
                            $summation_loan_weekly = $row['total'];
                        }
                        $summation_loan_weekly = ($summation_loan_weekly - $summation_repay22) - $weekly_unearned_income;





                         ///================Monthly
                         $weekly_unearned_income2 = 0;
                         $result_sum = mysqli_query($connect, "SELECT * FROM monthly_allloan WHERE   indbalance > 0 AND remarks = 'loan disbursement'");
                         while ($row = mysqli_fetch_array($result_sum)) {
                             $urearned = $row['interest'] - ($row['repay_sum'] / ($row['disburseloan'] / $row['interest']));
                             $weekly_unearned_income2 += $urearned;
                             
                         }

                           // New Monthly Unearned Income
                        //    $get_revenue_monthly = mysqli_query($connect, "SELECT SUM(revenue) as monthly_rev FROM revenuexp WHERE category = 'interest_monthly'");
                        //    while ($row = mysqli_fetch_array($get_revenue_monthly)) {
                        //      $sum_revenue_monthly = $row['monthly_rev'];
                        //    }
 
                         //   echo "<script>alert('$sum_revenue_weekly')</script>";
 

                        ///GET ALL DEBTORS FOR MONTHLY
                        ////////////THIS IS TO SUM monthly_
                        $total_repay33 = mysqli_query($connect, "SELECT SUM(repay) as total FROM monthly_allloan");
                        while ($row = mysqli_fetch_array($total_repay33)) {
                            $summation_repay33 = $row['total'];
                        }
                        $sql12 = mysqli_query($connect, "SELECT SUM(disburseloan) as total, SUM(interest) as sum_int FROM monthly_allloan");
                        while ($row3 = mysqli_fetch_array($sql12)) {
                            $summation_loan_monthl25y = $row3['total'];
                            $sum_int33 = $row3['sum_int'] ;
                        }
                        $summation_loan_monthly =  (($summation_loan_monthl25y - $summation_repay33) - $weekly_unearned_income2);

                        ///////////TOTAL DEBTORS
                        @$total_loan = $summation_loan + $summation_loan_weekly + $summation_loan_monthly;






                        ////////////THIS IS TO SUM DAILY PAYMENTS
                        $date = date('jS F Y');
                        $total_repay = mysqli_query($connect, "SELECT SUM(repay) as total FROM allloan WHERE date='$date' AND (remarks = 'loan repayment' OR remarks = 'Penalty Paid')");
                        while ($row = mysqli_fetch_array($total_repay)) {
                            $summation_repay = $row['total'];
                        }
                        $summation_repay;

                        ////////////THIS IS TO DAILY INTEREST
                        $total_repay222 = mysqli_query($connect, "SELECT SUM(interest_pay) as total FROM allloan WHERE date='$date' AND remarks = 'loan repayment'");
                        while ($row = mysqli_fetch_array($total_repay222)) {
                            $summation_daily_int = $row['total'];
                        }

                        //    $summation_repay = $summation_repay;
                        
                        ////////////THIS IS TO SUM WEEKLY PAYMENTS
                        $date = date('jS F Y');
                        $total_repay1 = mysqli_query($connect, "SELECT SUM(repay) as total FROM weekly_allloan WHERE date='$date' AND (remarks = 'loan repayment' OR remarks = 'Penalty Paid')");
                        while ($row = mysqli_fetch_array($total_repay1)) {
                            $summation_repay_weekly = $row['total'];
                        }
                        $summation_repay_weekly;

                        ////////////THIS IS TO WEEKLY SAVINGS
                        $total_repay2 = mysqli_query($connect, "SELECT SUM(savings) as total FROM weekly_allloan WHERE date='$date' AND remarks = 'loan repayment'");
                        while ($row = mysqli_fetch_array($total_repay2)) {
                            $summation_weekly_save = $row['total'];
                        }

                        ////////////THIS IS TO SUM MONTHLY PAYMENTS
                        $total_repay3 = mysqli_query($connect, "SELECT SUM(repay) as total FROM monthly_allloan WHERE date='$date' AND (remarks = 'loan repayment' OR remarks = 'Penalty Paid')");
                        while ($row = mysqli_fetch_array($total_repay3)) {
                            $summation_repay_monthly = $row['total'];
                        }


                        $summation_repay_weekly = $summation_repay_weekly + $summation_weekly_save;

                        ///////////TOTAL PAYMENTS
                        $total_repayall = $summation_repay + $summation_repay_weekly + $summation_repay_monthly;










                        ////////////THIS IS TO SUM DAILY DISBURSE-@#$%$%^&**%!#%&(*((&&^&))))))))))
                        $total_disburseloan = mysqli_query($connect, "SELECT SUM(disburseloan) as total, SUM(interest) as int_tot FROM allloan WHERE date='$date' AND remarks = 'loan disbursement' AND (reverse_alert = '' OR reverse_alert IS NULL)");

                        // $error = mysqli_error($connect);
                        // echo "<script>alert('$error')</script>";
//                        $total_disburseloan_work = mysqli_query($connect, "SELECT SUM(disburseloan) as total FROM allloan WHERE date='$date'");      
                        while ($row = mysqli_fetch_array($total_disburseloan)) {
                            $summation_disburseloan = $row['total'];
                            //   $summation_disburseloan =  $row['total'] - $row['int_tot'];                         
                        }
                        $summation_disburseloan;


                        ////////////THIS IS TO SUM WEEKLY DISBURSE
                        
                        $total_disburseloan22 = mysqli_query($connect, "SELECT SUM(disburseloan) as total, SUM(interest) as totalx FROM weekly_allloan WHERE date='$date' AND  remarks = 'loan disbursement' AND (reverse_alert = '' OR reverse_alert IS NULL)");
                        while ($row = mysqli_fetch_array($total_disburseloan22)) {
                            $summation_disburseloan_weekly = $row['total'];
                            $summation_interest_weekly = $row['totalx'];
                        }
                        $summation_disburseloan_weekly = $summation_disburseloan_weekly - $summation_interest_weekly;



                        ////////////THIS IS TO SUM MONTHLY DISBURSE
                        
                        $total_disburseloan222 = mysqli_query($connect, "SELECT SUM(disburseloan) as total, SUM(interest) as totalx FROM monthly_allloan WHERE date='$date' AND  remarks = 'loan disbursement' AND (reverse_alert = '' OR reverse_alert IS NULL)");
                        while ($row = mysqli_fetch_array($total_disburseloan222)) {
                            $summation_disburseloan_monthly = $row['total'];
                            $summation_interest_monthly = $row['totalx'];
                        }
                        //                       $summation_disburseloan_monthly = $summation_disburseloan_monthly - $summation_interest_monthly;  
                        

                        ///////////TOTAL DISBURSE
                        
                        $total_disburseloan_all = $summation_disburseloan + $summation_disburseloan_weekly + $summation_disburseloan_monthly;


















                        //-----------------------------FOR PENALTY------------------------------------------
                        ////////////THIS IS TO SUM DAILY PENALTY-@#$%$%^&**%!#%&(*((&&^&))))))))))
                        $total_disburseloan_pen = mysqli_query($connect, "SELECT SUM(disburseloan) as total FROM allloan WHERE date='$date' AND remarks = 'Penalty' ");
                        //    $error = mysqli_error($connect);
                        //    echo "<script>alert('$error')</script>";
//                        $total_disburseloan_work = mysqli_query($connect, "SELECT SUM(disburseloan) as total FROM allloan WHERE date='$date'");      
                        while ($row = mysqli_fetch_array($total_disburseloan_pen)) {
                            $summation_disburseloan_pen = $row['total'];
                        }
                        $summation_disburseloan_pen;


                        ////////////THIS IS TO SUM WEEKLY DISBURSE
                        
                        $total_disburseloan22_pen = mysqli_query($connect, "SELECT SUM(disburseloan) as total, SUM(interest) as totalx FROM weekly_allloan WHERE date='$date' AND remarks = 'Penalty'");
                        while ($row = mysqli_fetch_array($total_disburseloan22_pen)) {
                            $summation_disburseloan_weekly_pen = $row['total'];
                            $summation_interest_weekly_pen = $row['totalx'];
                        }
                        //                       $summation_disburseloan_weekly = $summation_disburseloan_weekly - $summation_interest_weekly;  
                        


                        ////////////THIS IS TO SUM MONTHLY DISBURSE
                        
                        $total_disburseloan222_pen = mysqli_query($connect, "SELECT SUM(disburseloan) as total, SUM(interest) as totalx FROM monthly_allloan WHERE date='$date' AND remarks = 'Penalty'");

                        while ($row = mysqli_fetch_array($total_disburseloan222_pen)) {
                            $summation_disburseloan_monthly_pen = $row['total'];
                            $summation_interest_monthly_pen = $row['totalx'];
                        }
                        //                       $summation_disburseloan_monthly = $summation_disburseloan_monthly - $summation_interest_monthly;  
                        

                        ///////////TOTAL DISBURSE
                        
                        $total_disburseloan_all_pen = $summation_disburseloan_pen + $summation_disburseloan_weekly_pen + $summation_disburseloan_monthly_pen;









                        ///GET ALL Investment BALANCE
                        /////////SUM GENERAL REPAY & DISBURSE SO YOU CAN GET GEN BALALNCE
                        ////////////THIS IS TO SUM PAYMENTS
                        $total_payments = mysqli_query($connect, "SELECT SUM(pay) as total FROM investment");
                        while ($row1 = mysqli_fetch_array($total_payments)) {
                            $summation_pay = $row1['total'];
                        }


                        ////////////THIS IS TO SUM DISBURSE
                        $total_disburse2 = mysqli_query($connect, "SELECT SUM(withdraw) as total FROM investment");
                        while ($row2 = mysqli_fetch_array($total_disburse2)) {
                            $summation_disburse = $row2['total'];
                        }
                        $summation_investment = $summation_pay - $summation_disburse;
                        $summation_investment;



                        ///GET ALL SAVINGS BALANCE
                        $sql23 = mysqli_query($connect, "SELECT * FROM weekly_allloan WHERE genbalsavings > 1");
                        while ($row3 = mysqli_fetch_array($sql23)) {
                            $summation_savings = $row3['genbalsavings'];
                        }
                        $summation_savings;


                        ///GET WEEKLY EQUITY BALANCE
                        $sql4 = mysqli_query($connect, "SELECT * FROM weekly_allloan WHERE genbalequity > 1");
                        while ($row3 = mysqli_fetch_array($sql4)) {
                            $summation_equity = $row3['genbalequity'];
                        }
                        $summation_equity;


                        ///GET MONTHLY EQUITY BALANCE
                        $sql43 = mysqli_query($connect, "SELECT * FROM monthly_allloan WHERE genbalequity > 1");
                        while ($row3 = mysqli_fetch_array($sql43)) {
                            $summation_equity_month = $row3['genbalequity'];
                        }
                        $summation_equity_month;











                        //         ++++++++++++++++++++++++++++++++++++++++INSURANCE+++++++++++++++++++++++++++++++++++++  
                        
                        ////////////THIS IS TO SUM CONTRIBUTION BALANCE
                        $sum_insurance_in = mysqli_query($connect, "SELECT SUM(insurance_in) as total_in FROM allloan");
                        while ($row = mysqli_fetch_assoc($sum_insurance_in)) {
                            $insurance_in = $row['total_in'];
                        }


                        $sum_insurance_out = mysqli_query($connect, "SELECT SUM(insurance_out) as total_out FROM allloan");
                        while ($row = mysqli_fetch_assoc($sum_insurance_out)) {
                            $insurance_out = $row['total_out'];
                        }

                        $total_insurance = $insurance_in - $insurance_out;





                        $sum_insurance_in2 = mysqli_query($connect, "SELECT SUM(insurance_in) as total_in FROM weekly_allloan");
                        while ($row = mysqli_fetch_assoc($sum_insurance_in2)) {
                            $insurance_in2 = $row['total_in'];
                        }


                        $sum_insurance_out2 = mysqli_query($connect, "SELECT SUM(insurance_out) as total_out FROM weekly_allloan");
                        while ($row = mysqli_fetch_assoc($sum_insurance_out2)) {
                            $insurance_out2 = $row['total_out'];
                        }

                        $total_insurance2 = $insurance_in2 - $insurance_out2;



                        $sum_insurance_in3 = mysqli_query($connect, "SELECT SUM(insurance_in) as total_in FROM monthly_allloan");
                        while ($row = mysqli_fetch_assoc($sum_insurance_in3)) {
                            $insurance_in3 = $row['total_in'];
                        }


                        $sum_insurance_out3 = mysqli_query($connect, "SELECT SUM(insurance_out) as total_out FROM monthly_allloan");
                        while ($row = mysqli_fetch_assoc($sum_insurance_out3)) {
                            $insurance_out3 = $row['total_out'];
                        }

                        $total_insurance3 = $insurance_in3 - $insurance_out3;





                        $final_insurance_in = $insurance_in + $insurance_in2 + $insurance_in3;

                        $final_insurance_out = $insurance_out + $insurance_out2 + $insurance_out3;

                        $final_total_insurance = $total_insurance + $total_insurance2 + $total_insurance3;

                        //         ++++++++++++++++++++++++++++++++++++++++INSURANCE END+++++++++++++++++++++++++++++++++++++        
                        












                        ////////////THIS IS TO SUM CONTRIBUTION BALANCE
                        $date = date('jS F Y');
                        $sql33 = mysqli_query($connect, "SELECT SUM(save_balance) as total FROM members WHERE save_balance > 0");
                        while ($row3 = mysqli_fetch_array($sql33)) {
                            $summation_bal = $row3['total'];
                        }
                        $summation_contribution;


                        ////////////THIS IS TO SUM Withdrawals
                        $date = date('jS F Y');
                        $total_savings1 = mysqli_query($connect, "SELECT SUM(amount) as total FROM witdraw WHERE date='$date'");
                        while ($row = mysqli_fetch_array($total_savings1)) {
                            $summation_withdraw = $row['total'];
                        }
                        $summation_withdraw;









                        //////////////////TOTAL ACTIVE MEMBERS////////////////
                        $countA = mysqli_query($connect, "SELECT COUNT(namee) as totala FROM members WHERE balance > 1 AND NOT not_yet = 'not yet'");
                        while ($row4 = mysqli_fetch_array($countA)) {
                            $count_active = $row4['totala'];
                        }



                        //////////////////TOTAL NON-ACTIVE ACTIVE MEMBERS////////////////
                        $countN = mysqli_query($connect, "SELECT COUNT(namee) as totaln FROM members WHERE balance < 1 AND NOT not_yet = 'not yet'");
                        while ($row4 = mysqli_fetch_array($countN)) {
                            $count_non_active = $row4['totaln'];
                        }




                        //////////////////TOTAL NUMBER OF MEMBERS////////////////
                        $count = mysqli_query($connect, "SELECT COUNT(namee) as totalm FROM members WHERE NOT not_yet = 'not yet'");
                        while ($row4 = mysqli_fetch_array($count)) {
                            $count_members = $row4['totalm'];
                        }


                        $result101 = mysqli_query($connect, "SELECT COUNT(name) as totald FROM allloan WHERE indbalance > 0 AND remarks = 'loan disbursement' AND    (reverse_alert = '' OR reverse_alert IS NULL) ORDER BY id DESC");
                        while ($row4 = mysqli_fetch_array($result101)) {
                            $count_daily = $row4['totald'];
                        }


                        $result102 = mysqli_query($connect, "SELECT COUNT(name) as totalw FROM weekly_allloan WHERE indbalance > 0 AND remarks = 'loan disbursement' AND    (reverse_alert = '' OR reverse_alert IS NULL) ORDER BY id DESC");
                        while ($row4 = mysqli_fetch_array($result102)) {
                            $count_weekly = $row4['totalw'];
                        }


                        $result103 = mysqli_query($connect, "SELECT COUNT(name) as totalm FROM monthly_allloan WHERE indbalance > 0 AND remarks = 'loan disbursement' AND    (reverse_alert = '' OR reverse_alert IS NULL) ORDER BY id DESC");
                        while ($row4 = mysqli_fetch_array($result103)) {
                            $count_monthly = $row4['totalm'];
                        }

                        $count_all_debt = $count_daily + $count_weekly + $count_monthly;

                        $count_no_debt = $count_members - $count_all_debt;

                        ///////////////////EXPENSES AND REVNUE FOR THE CURRENT MONTH///////////////////////     
                        $month = date('F');
                        $year = date('Y');

                        $sql = mysqli_query($connect, "SELECT SUM(expense) as total FROM revenuexp WHERE month = '$month' AND year = '$year'");
                        while ($row3 = mysqli_fetch_array($sql)) {
                            $expenses = $row3['total'];
                        }

                        $sq2 = mysqli_query($connect, "SELECT SUM(revenue) as total FROM revenuexp WHERE month = '$month' AND year = '$year'");
                        while ($row3 = mysqli_fetch_array($sq2)) {
                            $revenue = $row3['total'];
                        }


                        $profit = $revenue - $expenses;





                        ///////////////////EXPENSES AND REVNUE FOR THE CURRENT YEAR///////////////////////     
                        $year = date('Y');
                        $sql29 = mysqli_query($connect, "SELECT SUM(expense) as total FROM revenuexp WHERE year = '$year'");
                        while ($row3 = mysqli_fetch_array($sql29)) {
                            $expenses_year = $row3['total'];
                        }

                        $sql290 = mysqli_query($connect, "SELECT SUM(revenue) as total FROM revenuexp WHERE year = '$year'");
                        while ($row3 = mysqli_fetch_array($sql290)) {
                            $revenue_year = $row3['total'];
                        }


                        $profit_year = $revenue_year - $expenses_year;





                        $intrest_paid = "";
                        ///////////SUM INTEREST PAID FOR THE CURRENT MONTH    
                        $sql_interestpaid_for_the_month = mysqli_query($connect, "SELECT SUM(interestpaid) as total FROM investment WHERE month = '$month' AND year = '$year'");
                        while ($row44 = mysqli_fetch_array($sql_interestpaid_for_the_month)) {
                            $intrest_paid = $row44['total'];
                        }



                        $intrest_paid_year = "";
                        ///////////SUM INTEREST PAID FOR THE CURRENT MONTH    
                        $sql_interestpaid_for_the_year = mysqli_query($connect, "SELECT SUM(interestpaid) as total FROM investment WHERE year = '$year'");
                        while ($row45 = mysqli_fetch_array($sql_interestpaid_for_the_year)) {
                            $intrest_paid_year = $row45['total'];
                        }



                        // ===============================================================================================
                        ///////////UNERNED INCOME
                        ///================DAILY
                        $result_sum = mysqli_query($connect, "SELECT SUM(sum_unearned) as total, SUM(interest) as sum_int FROM allloan WHERE  sum_unearned >= 40 AND indbalance > 0 AND remarks = 'loan disbursement'");
                        while ($row = mysqli_fetch_assoc($result_sum)) {
                            $daily_unearned_income = $row['total'];
                            $sum_int = $row['sum_int'];
                        }


                      



                       


                        $total_unraned_income = $daily_unearned_income + $weekly_unearned_income + $weekly_unearned_income2;









                        //////TODAYS DATE
                        date_default_timezone_set("Africa/Lagos");
                        $todays_date = date("jS F Y");
                        ?>





                        <!-- Page-header start -->
                        <div class="page-header">
                            <div class="page-block">
                                <div class="row align-items-center">
                                    <div class="col-md-8">
                                        <div class="page-header-title">
                                            <h5 class="m-b-10">Home</h5>
                                            <p class="m-b-0">Dashboard</p>
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




                        <!-----------------------DATE AND TIME------------------------>
                        <div class="pcoded-inner-content">
                            <!-- Main-body start -->
                            <div class="main-body ">
                                <div class="page-wrapper">
                                    <!-- Page-body start -->
                                    <div class="page-body">
                                        <div class="row">

                                            <div class="col-xl-3 col-md-12">
                                                <div class="card mat-clr-stat-card text-white blue ">
                                                    <div class="card-block">
                                                        <div class="row">
                                                            <div class="col-3 text-center bg-c-blue">
                                                                <i class="fas fa-calendar mat-icon f-24"></i>
                                                            </div>
                                                            <div class="col-9 cst-cont">
                                                                <h5 style="color:#003300;">
                                                                    <?php echo $todays_date; ?>
                                                                </h5>
                                                                <p class="m-b-0">More Blessings Today</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card mat-clr-stat-card text-white blue">
                                                    <div class="card-block">
                                                        <div class="row">
                                                            <div class="col-3 text-center bg-c-blue">
                                                                <i class="fas fa-clock mat-icon f-24"></i>
                                                            </div>
                                                            <div class="col-9 cst-cont">
                                                                <h5>
                                                                    <label id="Hour" style="color:#003300;"></label>
                                                                    <label id="Minut" style="color:#003300;"></label>
                                                                    <label id="Second" style="color:#003300;"></label>
                                                                    <label style="color:#003300; ">
                                                                        <?php echo date("A"); ?>
                                                                    </label>
                                                                </h5>
                                                                <p class="m-b-0">God's time is the Best</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!----------------------END DATE AND TIME------------------------>




                                            <!-----------------MEMBERS ARENA----------------------->

                                            <!-- Material statustic card start -->
                                            <div class="col-xl-3 col-md-12">
                                                <div class="card mat-stat-card">
                                                    <div class="card-block">
                                                        <div class="row align-items-center b-b-default">

                                                            <div class="col-sm-6 p-b-20 p-t-20">
                                                                <div class="row align-items-center text-center">
                                                                    <div class="col-4 p-r-0">
                                                                        <i
                                                                            class="far fa-user text-c-purple fill f-24"></i>
                                                                    </div>
                                                                    <div class="col-8 p-l-0">
                                                                        <h5>
                                                                            <?php echo number_format($count_members); ?>
                                                                        </h5>
                                                                        <a href="all_customers.php">
                                                                            <p class="text-muted m-b-0">Registered
                                                                                Customers</p>
                                                                        </a>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>







                                            <div class="col-xl-3 col-md-12">
                                                <div class="card mat-stat-card">
                                                    <div class="card-block">
                                                        <div class="row align-items-center b-b-default">

                                                            <div class="col-sm-6 p-b-20 p-t-20">
                                                                <div class="row align-items-center text-center">
                                                                    <div class="col-4 p-r-0">
                                                                        <i class="far fa-user text-c-green f-24"></i>
                                                                    </div>
                                                                    <div class="col-8 p-l-0">
                                                                        <h5>
                                                                            <?php echo number_format($count_no_debt); ?>
                                                                        </h5>
                                                                        <p class="text-muted m-b-0">Non-Active Customers
                                                                        </p>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>





                                            <div class="col-xl-3 col-md-12">
                                                <div class="card mat-stat-card">
                                                    <div class="card-block">
                                                        <div class="row align-items-center b-b-default">

                                                            <div class="col-sm-6 p-b-20 p-t-20">
                                                                <div class="row align-items-center text-center">
                                                                    <div class="col-4 p-r-0">
                                                                        <i class="far fa-user text-c-red fill f-24"></i>
                                                                    </div>
                                                                    <div class="col-8 p-l-0">
                                                                        <h5>
                                                                            <?php echo number_format($count_all_debt); ?>
                                                                        </h5>
                                                                        <p class="text-muted m-b-0">Active Customers</p>


                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <!----------------END MEMBERS ARENA----------------------->




                                            <!----------------PENALTY ARENA-------------------->


                                            <!---------------END PENALTY ARENA-------------------->



                                            <div class="col-xl-12 col-md-12">
                                                <div class="row">
                                                    <!-- sale card start -->
                                                    <!--TOTAL LOAN PORTFOLIO-->
                                                    <div class="col-md-3">
                                                        <div class="card text-center text-c-red order-visitor-card">
                                                            <div class="card-block">

                                                                <h6 class="m-b-0"> <a href="debtors.php"
                                                                        class="show_black">Daily Loan Portfolio </a>
                                                                </h6>
                                                                <?php if ($summation_loan == "") {
                                                                    $summation_loan = "0";
                                                                } ?>
                                                                <h4 class="m-t-15 m-b-15"><b class="">₦ </b>
                                                                    <?php echo number_format($summation_loan); ?>
                                                                </h4>
                                                                <?php if ($total_loan == "") {
                                                                    $total_loan = "0";
                                                                }
                                                                $daily_perc = ($summation_loan / $total_loan) * 100;
                                                                ?>

                                                                <p class="m-b-0" style="font-size: 16px;">
                                                                    <?php echo round($daily_perc, 1); ?>% of TLP
                                                                </p>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php
                                                    ///GET ALL DEBTORS FOR DAILY
                                                    ////////////THIS IS TO SUM DAILY
                                                    $total_repay11 = mysqli_query($connect, "SELECT SUM(repay) as total FROM weekly_allloan ");
                                                    while ($row = mysqli_fetch_array($total_repay11)) {
                                                        $summation_repay11 = $row['total'];
                                                    }

                                                    ////////////THIS IS TO SUM DAILY
                                                    $total_daily = mysqli_query($connect, "SELECT SUM(disburseloan) as total, SUM(interest) as sum_int FROM weekly_allloan");
                                                    while ($row = mysqli_fetch_array($total_daily)) {
                                                        $summation_loan11 = $row['total'];
                                                        // $sum_int22 = $row['sum_int'] ;
                                                        
                                                    }


                                                    $int_remarks = mysqli_query($connect, "SELECT SUM(interest) as sum_int44 FROM weekly_allloan WHERE remarks = 'loan disbursement' AND NOT reverse_alert = 'R'");
                                                    while ($row = mysqli_fetch_array($int_remarks)) {
                                                      
                                                        $sum_int22 = $row['sum_int44'] ;
                                                        
                                                    }


                                                    $summation_loan_week_new22 = ($summation_loan11 - $summation_repay11) - $weekly_unearned_income;
                                                    $summation_loan_week_new  =  $summation_loan_week_new22;
                                                    ?>
                                                    <div class="col-md-3">
                                                        <div class="card text-center text-c-red order-visitor-card">
                                                            <div class="card-block">
                                                                <h6 class="m-b-0"><a href="weekly_debtors.php"
                                                                        class="show_black">Weekly Loan Portfolio</a>
                                                                </h6>
                                                                <?php if ($summation_loan_weekly == "") {
                                                                    $summation_loan_weekly = "0";
                                                                } ?>
                                                                <h4 class="m-t-15 m-b-15"><b class="">₦ </b>
                                                                    <?php echo number_format($summation_loan_weekly); ?>
                                                                </h4>
                                                                <?php if ($total_loan == "") {
                                                                    $total_loan = "0";
                                                                }
                                                                $weekly_perc = ($summation_loan_weekly / $total_loan) * 100;
                                                                ?>

                                                                <p class="m-b-0" style="font-size: 16px;">
                                                                    <?php echo round($weekly_perc, 1); ?>% of TLP
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="card text-center text-c-red order-visitor-card">
                                                            <div class="card-block">
                                                                <h6 class="m-b-0"><a href="monthly_debtors.php"
                                                                        class="show_black">Monthly Loan Portfolio</a>
                                                                </h6>
                                                                <?php if ($summation_loan_monthly == "") {
                                                                    $summation_loan_monthly = "0";
                                                                } ?>
                                                                <h4 class="m-t-15 m-b-15 "><b>₦ </b>
                                                                    <?php echo number_format($summation_loan_monthly); ?>
                                                                </h4>
                                                                <?php if ($total_loan == "") {
                                                                    $total_loan = "0";
                                                                }
                                                                $monthly_perc = ($summation_loan_monthly / $total_loan) * 100;
                                                                ?>

                                                                <p class="m-b-0" style="font-size: 16px;">
                                                                    <?php echo round($monthly_perc, 1); ?>% of TLP
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="card text-center text-c-red order-visitor-card">
                                                            <div class="card-block">
                                                                <h6 class="m-b-0" style="font-size: 16px;"
                                                                    class="show_black">Total Loan Portfolio</h6>
                                                                <?php if ($total_loan == "") {
                                                                    $total_loan = "0";
                                                                } ?>
                                                                <h4 class="m-t-15 m-b-15"><b class="">₦ </b>
                                                                    <?php echo number_format($total_loan); ?>
                                                                </h4>

                                                                <p class="m-b-0" style="font-size: 16px;">100% of TLP
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>




                                                    <!--UNEARNED INCOME-->
                                                    <div class="col-md-3">
                                                        <div class="card text-center text-c-red order-visitor-card">
                                                            <div class="card-block">

                                                                <h6 class="m-b-0"> <a href="unearned_income.php"
                                                                        class="show_black">Daily Unearned Income </a>
                                                                </h6>
                                                                <?php if ($summation_loan == "") {
                                                                    $summation_loan = "0";
                                                                } ?>
                                                                <h4 class="m-t-15 m-b-15"><b class="">₦ </b>
                                                                    <?php echo number_format($daily_unearned_income); ?>
                                                                </h4>


                                                                <!-- <p class="m-b-0" style="font-size: 16px;"><?php // echo round($daily_perc, 1); ?>% of TLP</p> -->

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="card text-center text-c-red order-visitor-card">
                                                            <div class="card-block">
                                                                <h6 class="m-b-0"><a href="weekly_unearned_income.php"
                                                                        class="show_black">Weekly Unearned Income</a>
                                                                </h6>
                                                                <?php if ($summation_loan_weekly == "") {
                                                                    $summation_loan_weekly = "0";
                                                                } ?>
                                                                <h4 class="m-t-15 m-b-15"><b class="">₦ </b>
                                                                    <?php echo number_format($weekly_unearned_income); ?>
                                                                </h4>

                                                                <!-- <p class="m-b-0" style="font-size: 16px;"><?php echo round($weekly_perc, 1); ?>% of TLP</p> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="card text-center text-c-red order-visitor-card">
                                                            <div class="card-block">
                                                                <h6 class="m-b-0"><a href="monthly_unearned_income.php"
                                                                        class="show_black">Monthly Unearned Income</a>
                                                                </h6>
                                                                <?php if ($summation_loan_monthly == "") {
                                                                    $summation_loan_monthly = "0";
                                                                } ?>
                                                                <h4 class="m-t-15 m-b-15 "><b>₦ </b>
                                                                    <?php echo number_format($weekly_unearned_income2); ?>
                                                                </h4>


                                                                <!-- <p class="m-b-0" style="font-size: 16px;"><?php echo round($monthly_perc, 1); ?>% of TLP</p> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="card text-center text-c-red order-visitor-card">
                                                            <div class="card-block">
                                                                <h6 class="m-b-0" style="font-size: 16px;"
                                                                    class="show_black">Total Unearned Income</h6>
                                                                <?php if ($total_loan == "") {
                                                                    $total_loan = "0";
                                                                } ?>
                                                                <h4 class="m-t-15 m-b-15"><b class="">₦ </b>
                                                                    <?php echo number_format($total_unraned_income); ?>
                                                                </h4>

                                                                <!-- <p class="m-b-0" style="font-size: 16px;">100% of TLP</p> -->
                                                            </div>
                                                        </div>
                                                    </div>




                                                    <!--THIS IS FOR TODAY'S DAILY PAYMENT-->
                                                    <div class="col-md-3">
                                                        <div class="card text-center text-c-green repay">
                                                            <div class="card-block">
                                                                <h6 class="m-b-0"><a
                                                                        href="today_repayment.php?daily_see='1'"
                                                                        class="show_black">Today's Daily Repayment</a>
                                                                </h6>
                                                                <?php if ($summation_repay == "") {
                                                                    $summation_repay = "0";
                                                                } ?>
                                                                <h4 class="m-t-15 m-b-15"><b class="">₦ </b>
                                                                    <?php echo number_format($summation_repay); ?>
                                                                </h4>
                                                                <?php if ($total_repayall == "") {
                                                                    $total_repayall = "0";
                                                                }

                                                              if (  $total_repayall > 1) {
                                                                $daily_pay_perc = ($summation_repay / $total_repayall) * 100;
                                                              } else {
                                                                $daily_pay_perc = 0;
                                                              }
                                                                                                                            
                                                                
                                                                ?>
                                                                <?php if (is_nan($daily_pay_perc)) {
                                                                    $daily_pay_perc = 0;
                                                                } ?>
                                                                <p class="m-b-0" style="font-size: 16px;">
                                                                    <?php echo round($daily_pay_perc, 1); ?>% of TTR
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="card text-center text-c-green repay">
                                                            <div class="card-block">
                                                                <h6 class="m-b-0"><a
                                                                        href="today_repayment.php?weekly_see='1'"
                                                                        class="show_black">Today's Weekly Repayment</a>
                                                                </h6>
                                                                <?php if ($summation_repay_weekly == "") {
                                                                    $summation_repay_weekly = "0";
                                                                } ?>
                                                                <h4 class="m-t-15 m-b-15"><b class="">₦ </b>
                                                                    <?php echo number_format($summation_repay_weekly); ?>
                                                                </h4>
                                                                <?php if ($total_repayall == "") {
                                                                    $total_repayall = "0";
                                                                }
                                                                if ($total_repayall > 1) {
                                                                    $weekly_pay_perc = ($summation_repay_weekly / $total_repayall) * 100;
                                                                } else {
                                                                    $weekly_pay_perc = 0;
                                                                }
                                                                
                                                              
                                                                ?>
                                                                <?php if (is_nan($weekly_pay_perc)) {
                                                                    $weekly_pay_perc = 0;
                                                                } ?>
                                                                <p class="m-b-0" style="font-size: 16px;">
                                                                    <?php echo round($weekly_pay_perc, 1); ?>% of TTR
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="card text-center text-c-green repay">
                                                            <div class="card-block">
                                                                <h6 class="m-b-0"><a
                                                                        href="today_repayment.php?monthly_see='1'"
                                                                        class="show_black">Today's Monthly Repayment</a>
                                                                </h6>
                                                                <?php if ($summation_repay_monthly == "") {
                                                                    $summation_repay_monthly = "0";
                                                                } ?>
                                                                <h4 class="m-t-15 m-b-15"><b class="">₦ </b>
                                                                    <?php echo number_format($summation_repay_monthly); ?>
                                                                </h4>
                                                                <?php if ($total_repayall == "") {
                                                                    $total_repayall = "0";
                                                                }


                                                                if ($total_repayall > 1) {
                                                                    $monthly_pay_perc = ($summation_repay_monthly / $total_repayall) * 100;
                                                                } else {
                                                                    $monthly_pay_perc = 0;
                                                                }
                                                                
                                                             
                                                                ?>
                                                                <?php if (is_nan($monthly_pay_perc)) {
                                                                    $monthly_pay_perc = 0;
                                                                } ?>
                                                                <p class="m-b-0" style="font-size: 16px;">
                                                                    <?php echo round($monthly_pay_perc, 1); ?>% of TTR
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="card text-center text-c-green repay">
                                                            <div class="card-block">
                                                                <h6 class="m-b-0" style="font-size: 16px;"><a
                                                                        href="today_repayment.php"
                                                                        class="show_black">Today Total Repayment</a>
                                                                </h6>
                                                                <?php if ($total_repayall == "") {
                                                                    $total_repayall = "0";
                                                                } ?>
                                                                <h4 class="m-t-15 m-b-15"><b class="">₦ </b>
                                                                    <?php echo number_format($total_repayall); ?>
                                                                </h4>

                                                                <p class="m-b-0" style="font-size: 16px;">100% of TTR
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>











                                                    <!--THIS IS FOR TODAY'S DISBURSE-->
                                                    <!--THIS IS FOR TODAY'S DAILY DISBURSE-->
                                                    <div class="col-md-3">
                                                        <div class="card text-center text-c-red disburseloan">
                                                            <div class="card-block">
                                                                <h6 class="m-b-0"><a href="today_disbursment.php"
                                                                        class="show_black">Today's Daily
                                                                        Disbursement</a></h6>
                                                                <?php if ($summation_disburseloan == "" || $summation_disburseloan < 1) {
                                                                    $summation_disburseloan = "0";
                                                                } ?>
                                                                <h4 class="m-t-15 m-b-15"><b class="">₦ </b>
                                                                    <?php echo number_format($summation_disburseloan); ?>
                                                                </h4>
                                                                <?php if ($total_disburseloan_all == "") {
                                                                    $total_disburseloan_all = "0";
                                                                }
                                                                if ($total_disburseloan_all > 1) {
                                                                    $daily_loan_perc = ($summation_disburseloan / $total_disburseloan_all) * 100;
                                                                } else {
                                                                    $daily_loan_perc = 0;
                                                                }
                                                                
                                                                
                                                                ?>
                                                                <?php if (is_nan($daily_loan_perc)) {
                                                                    $daily_loan_perc = 0;
                                                                } ?>
                                                                <p class="m-b-0" style="font-size: 16px;">
                                                                    <?php echo round($daily_loan_perc, 1); ?>% of TTD
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <!--THIS IS FOR TODAY'S WEEKLY DISBURSE-->
                                                    <div class="col-md-3">
                                                        <div class="card text-center text-c-red disburseloan">
                                                            <div class="card-block">
                                                                <h6 class="m-b-0"><a href="today_disbursment.php"
                                                                        class="show_black">Today's Weekly
                                                                        Disbursement</a></h6>
                                                                <?php if ($summation_disburseloan_weekly == "" || $summation_disburseloan_weekly < 1) {
                                                                    $summation_disburseloan_weekly = "0";
                                                                } ?>
                                                                <h4 class="m-t-15 m-b-15"><b class="">₦ </b>
                                                                    <?php echo number_format($summation_disburseloan_weekly); ?>
                                                                </h4>
                                                                <?php if ($total_disburseloan_all == "") {
                                                                    $total_disburseloan_all = "0";
                                                                }

                                                                if ($total_disburseloan_all > 1) {
                                                                    $weekly_loan_perc = ($summation_disburseloan_weekly / $total_disburseloan_all) * 100;
                                                                } else {
                                                                    $weekly_loan_perc = 0;
                                                                }
                                                                
                                                              
                                                                ?>
                                                                <?php if (is_nan($weekly_loan_perc)) {
                                                                    $weekly_loan_perc = 0;
                                                                } ?>
                                                                <p class="m-b-0" style="font-size: 16px;">
                                                                    <?php echo round($weekly_loan_perc, 1); ?>% of TTD
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!--THIS IS FOR TODAY'S MONTHLY DISBURSE-->
                                                    <div class="col-md-3">
                                                        <div class="card text-center text-c-red disburseloan">
                                                            <div class="card-block">
                                                                <h6 class="m-b-0"><a href="today_disbursment.php"
                                                                        class="show_black">Today Monthly
                                                                        Disbursement</a></h6>
                                                                <?php if ($summation_disburseloan_monthly == "" || $summation_disburseloan_monthly < 1) {
                                                                    $summation_disburseloan_monthly = "0";
                                                                } ?>
                                                                <h4 class="m-t-15 m-b-15"><b class="">₦ </b>
                                                                    <?php echo number_format($summation_disburseloan_monthly); ?>
                                                                </h4>
                                                                <?php if ($total_disburseloan_all == "") {
                                                                    $total_disburseloan_all = "0";
                                                                }

                                                                if ($total_disburseloan_all > 1) {
                                                                    $monthly_loan_perc = ($summation_disburseloan_monthly / $total_disburseloan_all) * 100;
                                                                } else {
                                                                    $monthly_loan_perc = 0;
                                                                }
                                                                
                                                              
                                                                ?>
                                                                <?php if (is_nan($monthly_loan_perc)) {
                                                                    $monthly_loan_perc = 0;
                                                                } ?>
                                                                <p class="m-b-0" style="font-size: 16px;">
                                                                    <?php echo round($monthly_loan_perc, 1); ?>% of TTD
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!--THIS IS FOR TODAY'S TOTAL DISBURSE-->
                                                    <div class="col-md-3">
                                                        <div class="card text-center text-c-red disburseloan">
                                                            <div class="card-block">
                                                                <h6 class="m-b-0" style="font-size: 16px;"><a
                                                                        href="today_disbursment.php"
                                                                        class="show_black">Today Total Disbursement</a>
                                                                </h6>
                                                                <?php if ($total_disburseloan_all == "" || $total_disburseloan_all < 1) {
                                                                    $total_disburseloan_all = "0";
                                                                } ?>
                                                                <h4 class="m-t-15 m-b-15"><b class="">₦ </b>
                                                                    <?php echo number_format($total_disburseloan_all); ?>
                                                                </h4>

                                                                <p class="m-b-0" style="font-size: 16px;">100% of TTD
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>











                                                    <!--------------------------TODAY'S PENALTY------------------------------------>
                                                    <div class="col-md-3">
                                                        <div class="card text-center text-c-red disburseloan">
                                                            <div class="card-block">
                                                                <h6 class="m-b-0"><a href="today_penalty.php"
                                                                        class="show_black">Today's Daily Penalty</a>
                                                                </h6>
                                                                <?php if ($summation_disburseloan_pen == "" || $summation_disburseloan_pen < 1) {
                                                                    $summation_disburseloan_pen = "0";
                                                                } ?>
                                                                <h4 class="m-t-15 m-b-15"><b class="">₦ </b>
                                                                    <?php echo number_format($summation_disburseloan_pen); ?>
                                                                </h4>

                                                            </div>
                                                        </div>
                                                    </div>


                                                    <!--THIS IS FOR TODAY'S WEEKLY PENALTY-->
                                                    <div class="col-md-3">
                                                        <div class="card text-center text-c-red disburseloan">
                                                            <div class="card-block">
                                                                <h6 class="m-b-0"><a href="today_penalty.php"
                                                                        class="show_black"> Today's Weekly Penalty</a>
                                                                </h6>
                                                                <?php if ($summation_disburseloan_weekly_pen == "" || $summation_disburseloan_weekly_pen < 1) {
                                                                    $summation_disburseloan_weekly_pen = "0";
                                                                } ?>
                                                                <h4 class="m-t-15 m-b-15"><b class="">₦ </b>
                                                                    <?php echo number_format($summation_disburseloan_weekly_pen); ?>
                                                                </h4>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!--THIS IS FOR TODAY'S MONTHLY PENALTY-->
                                                    <div class="col-md-3">
                                                        <div class="card text-center text-c-red disburseloan">
                                                            <div class="card-block">
                                                                <h6 class="m-b-0"><a href="today_penalty.php"
                                                                        class="show_black"> Today's Monthly Penalty</a>
                                                                </h6>
                                                                <?php if ($summation_disburseloan_monthly_pen == "" || $summation_disburseloan_monthly_pen < 1) {
                                                                    $summation_disburseloan_monthly_pen = "0";
                                                                } ?>
                                                                <h4 class="m-t-15 m-b-15"><b class="">₦ </b>
                                                                    <?php echo number_format($summation_disburseloan_monthly_pen); ?>
                                                                </h4>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!--THIS IS FOR TODAY'S TOTAL PENALTY-->
                                                    <div class="col-md-3">
                                                        <div class="card text-center text-c-red disburseloan">
                                                            <div class="card-block">
                                                                <h6 class="m-b-0"><a href="today_penalty.php"
                                                                        class="show_black">Today's Total Penalty</a>
                                                                </h6>
                                                                <?php if ($total_disburseloan_all_pen == "" || $total_disburseloan_all_pen < 1) {
                                                                    $total_disburseloan_all_pen = "0";
                                                                } ?>
                                                                <h4 class="m-t-15 m-b-15"><b class="">₦ </b>
                                                                    <?php echo number_format($total_disburseloan_all_pen); ?>
                                                                </h4>

                                                            </div>
                                                        </div>
                                                    </div>




                                                    <div class="col-md-6">
                                                        <div class="card total-card">
                                                            <div class="card-block">
                                                                <div class="text-left bg-c-lite-green"
                                                                    style="border-radius: 6px; background-color: #ccffcc;">
                                                                    <!--=====================List Group FOR SAVINGS=====================-->
                                                                    <h4 style="color: #003300;"><span
                                                                            style="font-weight: bolder;">
                                                                            <?php echo date('F Y') . ": "; ?>Interest Paid
                                                                            on Investment
                                                                        </span>
                                                                        <ul class="list-group">
                                                                            <li
                                                                                class="list-group-item d-flex justify-content-between align-items-center">
                                                                                <a href="investor_intpay_month.php"
                                                                                    style="font-size: 22px;"> Interest
                                                                                    Paid
                                                                                    <?php echo date('F Y') . ": "; ?>
                                                                                </a>
                                                                                <?php if ($intrest_paid == "") {
                                                                                    $intrest_paid = "0";
                                                                                } ?>
                                                                                <span
                                                                                    class="badge badge-warning badge-pill"><b
                                                                                        class="">₦ </b>
                                                                                    <?php echo " " . number_format($intrest_paid); ?>
                                                                                </span>
                                                                            </li>
                                                                        </ul>
                                                                    </h4>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>





                                                    <div class="col-md-6 ">
                                                        <div class="card  total-card">
                                                            <div class="card-block">
                                                                <div class="text-left"
                                                                    style="border-radius: 6px; background-color: #ccffcc;">
                                                                    <!--=====================List Group FOR INVESTMENT=====================-->
                                                                    <h4 style="color: #003300;"><span
                                                                            style="font-weight: bolder;">
                                                                            <?php echo date('Y') . ": "; ?>Interest Paid on
                                                                            Investment
                                                                        </span>
                                                                        <ul class="list-group">
                                                                            <li
                                                                                class="list-group-item d-flex justify-content-between align-items-center">
                                                                                <a href="investor_intpay_year.php"
                                                                                    style="font-size: 22px;">Interest
                                                                                    Paid
                                                                                    <?php echo date('Y') . ": "; ?>
                                                                                </a>
                                                                                <?php if ($intrest_paid_year == "") {
                                                                                    $intrest_paid_year = "0";
                                                                                } ?>
                                                                                <span
                                                                                    class="badge badge-warning badge-pill"><b
                                                                                        class="">₦ </b>
                                                                                    <?php echo " " . number_format($intrest_paid_year); ?>
                                                                                </span>
                                                                            </li>
                                                                        </ul>
                                                                    </h4>

                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>












                                                    <div class="col-md-6 ">
                                                        <div class="card  total-card">
                                                            <div class="card-block">
                                                                <div class="text-left"
                                                                    style="border-radius: 6px; background-color: #ccffcc;">
                                                                    <!--=====================List Group FOR INVESTMENT=====================-->
                                                                    <h4 style="color: #003300;"><span
                                                                            style="font-weight: bolder;">Insurance
                                                                            Balance</span>
                                                                        <ul class="list-group">
                                                                            <li
                                                                                class="list-group-item d-flex justify-content-between align-items-center">
                                                                                <a href="insurance.php"
                                                                                    style="font-size: 22px;">Insurance
                                                                                    Balance</a>
                                                                                <?php if ($final_total_insurance == "") {
                                                                                    $final_total_insurance = "0";
                                                                                } ?>
                                                                                <span
                                                                                    class="badge badge-success badge-pill"><b
                                                                                        class="">₦ </b>
                                                                                    <?php echo " " . number_format($final_total_insurance); ?>
                                                                                </span>
                                                                            </li>
                                                                        </ul>
                                                                    </h4>

                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>



                                                    <div class="col-md-6">
                                                        <div class="card total-card">
                                                            <div class="card-block">
                                                                <div class="text-left bg-c-lite-green"
                                                                    style="border-radius: 6px; background-color: #ccffcc;">
                                                                    <!--=====================List Group FOR SAVINGS=====================-->
                                                                    <h4 style="color: #003300;"><span
                                                                            style="font-weight: bolder;">Contribution
                                                                            Balance</span>
                                                                        <ul class="list-group">
                                                                            <li
                                                                                class="list-group-item d-flex justify-content-between align-items-center">
                                                                                <a href="contribution_ledger.php"
                                                                                    style="font-size: 22px;">Contribution
                                                                                    Balance</a>
                                                                                <?php if ($summation_bal == "") {
                                                                                    $summation_bal = "0";
                                                                                } ?>
                                                                                <span
                                                                                    class="badge badge-warning badge-pill"><b
                                                                                        class="">₦ </b>
                                                                                    <?php echo " " . number_format($summation_bal); ?>
                                                                                </span>
                                                                            </li>
                                                                        </ul>
                                                                    </h4>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>














                                                    <div class="col-md-6 ">
                                                        <div class="card  total-card">
                                                            <div class="card-block">
                                                                <div class="text-left"
                                                                    style="border-radius: 6px; background-color: #ccffcc;">
                                                                    <!--=====================List Group FOR INVESTMENT=====================-->
                                                                    <h4 style="color: #003300;"><span
                                                                            style="font-weight: bolder;">Investors
                                                                            Balance</span>
                                                                        <ul class="list-group">
                                                                            <li
                                                                                class="list-group-item d-flex justify-content-between align-items-center">
                                                                                <a href="investors.php"
                                                                                    style="font-size: 22px;">Investment</a>
                                                                                <?php if ($summation_investment == "") {
                                                                                    $summation_investment = "0";
                                                                                } ?>
                                                                                <span
                                                                                    class="badge badge-dark badge-pill"><b
                                                                                        class="">₦ </b>
                                                                                    <?php echo " " . number_format($summation_investment); ?>
                                                                                </span>
                                                                            </li>
                                                                        </ul>
                                                                    </h4>

                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>



                                                    <div class="col-md-6">
                                                        <div class="card total-card">
                                                            <div class="card-block">
                                                                <div class="text-left bg-c-lite-green"
                                                                    style="border-radius: 6px; background-color: #ccffcc;">
                                                                    <!--=====================List Group FOR SAVINGS=====================-->
                                                                    <h4 style="color: #003300;"><span
                                                                            style="font-weight: bolder;">Savings
                                                                            Balance</span>
                                                                        <ul class="list-group">
                                                                            <li
                                                                                class="list-group-item d-flex justify-content-between align-items-center">
                                                                                <a href="savings.php"
                                                                                    style="font-size: 22px;">Savings</a>
                                                                                <?php if ($summation_savings == "") {
                                                                                    $summation_savings = "0";
                                                                                } ?>
                                                                                <span
                                                                                    class="badge badge-dark badge-pill"><b
                                                                                        class="">₦ </b>
                                                                                    <?php echo " " . number_format($summation_savings); ?>
                                                                                </span>
                                                                            </li>
                                                                        </ul>
                                                                    </h4>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>









                                                    <div class="col-md-6 ">
                                                        <div class="card  total-card">
                                                            <div class="card-block">
                                                                <div class="text-left"
                                                                    style="border-radius: 6px; background-color: #99ff99;">
                                                                    <!--=====================List Group FOR Weekly EQUITY=====================-->
                                                                    <h4 style="color: #003300;"><span
                                                                            style="font-weight: bolder;">Weekly Equity
                                                                            Balance</span>
                                                                        <ul class="list-group">
                                                                            <li
                                                                                class="list-group-item d-flex justify-content-between align-items-center">
                                                                                <a href="equity.php"
                                                                                    style="font-size: 22px;"> Weekly
                                                                                    Equity</a>
                                                                                <?php if ($summation_equity == "") {
                                                                                    $summation_equity = "0";
                                                                                } ?>
                                                                                <span
                                                                                    class="badge badge-dark badge-pill"><b
                                                                                        class="">₦ </b>
                                                                                    <?php echo " " . number_format($summation_equity); ?>
                                                                                </span>
                                                                            </li>
                                                                        </ul>
                                                                    </h4>

                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>



                                                    <div class="col-md-6">
                                                        <div class="card total-card">
                                                            <div class="card-block">
                                                                <div class="text-left"
                                                                    style="border-radius: 6px; background-color: #99ff99;">
                                                                    <!--=====================List Group FOR SAVINGS=====================-->
                                                                    <h4 style="color: #003300;"><span
                                                                            style="font-weight: bolder;">Monthly Equity
                                                                            Balance</span>
                                                                        <ul class="list-group">
                                                                            <li
                                                                                class="list-group-item d-flex justify-content-between align-items-center">
                                                                                <a href="monthly_equity.php"
                                                                                    style="font-size: 22px;">Monthly
                                                                                    Equity</a>
                                                                                <?php if ($summation_equity_month == "") {
                                                                                    $summation_equity_month = "0";
                                                                                } ?>
                                                                                <span
                                                                                    class="badge badge-dark badge-pill"><b
                                                                                        class="">₦ </b>
                                                                                    <?php echo " " . number_format($summation_equity_month); ?>
                                                                                </span>
                                                                            </li>
                                                                        </ul>
                                                                    </h4>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>









                                                    <div class="col-md-6">
                                                        <div class="card total-card">
                                                            <div class="card-block">
                                                                <div class="text-left"
                                                                    style="border-radius: 6px; background-color: #33ff33;">
                                                                    <!--=====================List Group FOR MONTH=====================-->
                                                                    <h4 style="color: #003300;"><b><span
                                                                                style="font-weight: bolder;">
                                                                                <?php echo date('F Y') . ": "; ?>
                                                                                Revenue/Expenses
                                                                            </span></b>
                                                                        <ul class="list-group">
                                                                            <li
                                                                                class="list-group-item d-flex justify-content-between align-items-center">
                                                                                Gross
                                                                                <?php if ($revenue == "") {
                                                                                    $revenue = "0";
                                                                                } ?>
                                                                                <span
                                                                                    class="badge badge-success badge-pill">N
                                                                                    <?php echo " " . number_format($revenue); ?>
                                                                                </span>
                                                                            </li>
                                                                            <li
                                                                                class="list-group-item d-flex justify-content-between align-items-center">
                                                                                Expenses
                                                                                <?php if ($expenses == "") {
                                                                                    $expenses = "0";
                                                                                } ?>
                                                                                <span
                                                                                    class="badge badge-danger badge-pill">N
                                                                                    <?php echo " " . number_format($expenses); ?>
                                                                                </span>
                                                                            </li>
                                                                            <li
                                                                                class="list-group-item d-flex justify-content-between align-items-center">
                                                                                Net
                                                                                <?php if ($profit == "") {
                                                                                    $profit = "0";
                                                                                } ?>
                                                                                <span
                                                                                    class="badge badge-primary badge-pill">N
                                                                                    <?php echo " " . number_format($profit); ?>
                                                                                </span>
                                                                            </li>
                                                                        </ul>
                                                                    </h4>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>







                                                    <div class="col-md-6">
                                                        <div class="card total-card">
                                                            <div class="card-block">
                                                                <div class="text-left bg-c-yellow"
                                                                    style="border-radius: 6px; background-color: #33ff33;">
                                                                    <!--=====================List Group FOR YEAR=====================-->
                                                                    <h4 style="color: #003300;"><span
                                                                            style="font-weight: bolder;">
                                                                            <?php echo date('Y') . ": "; ?>
                                                                            Revenue/Expenses
                                                                        </span>
                                                                        <ul class="list-group">
                                                                            <li
                                                                                class="list-group-item d-flex justify-content-between align-items-center">
                                                                                Gross
                                                                                <?php if ($revenue_year == "") {
                                                                                    $revenue_year = "0";
                                                                                } ?>
                                                                                <span
                                                                                    class="badge badge-success badge-pill">N
                                                                                    <?php echo " " . number_format($revenue_year); ?>
                                                                                </span>
                                                                            </li>
                                                                            <li
                                                                                class="list-group-item d-flex justify-content-between align-items-center">
                                                                                Expenses
                                                                                <?php if ($expenses_year == "") {
                                                                                    $expenses_year = "0";
                                                                                } ?>
                                                                                <span
                                                                                    class="badge badge-danger badge-pill">N
                                                                                    <?php echo " " . number_format($expenses_year); ?>
                                                                                </span>
                                                                            </li>
                                                                            <li
                                                                                class="list-group-item d-flex justify-content-between align-items-center">
                                                                                Net
                                                                                <?php if ($profit_year == "") {
                                                                                    $profit_year = "0";
                                                                                } ?>
                                                                                <span
                                                                                    class="badge badge-primary badge-pill">N
                                                                                    <?php echo " " . number_format($profit_year); ?>
                                                                                </span>
                                                                            </li>
                                                                        </ul>
                                                                    </h4>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>







                                                    <!-- sale card end -->
                                                </div>
                                            </div>

                                            <!--  sale analytics end -->

                                            <!-- Project statustic start -->

                                        </div>
                                        <!-- Page-body end -->
                                    </div>

                                    <div id="styleSelector"> </div>
                                </div>
                                <center style="font-size: 18px; color: black; margin-top: 5px;">
                                    <footer class="">&copy;
                                        <?php echo date('Y') ?>. By Matt.
                                    </footer>
                                </center>

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


        <script type="text/javascript">
            function timedMsg() {
                var t = setInterval("change_time();", 1000);
            }
            function change_time() {
                var d = new Date();
                var curr_hour = d.getHours();
                var curr_min = d.getMinutes();
                var curr_sec = d.getSeconds();
                if (curr_hour > 12)
                    curr_hour = curr_hour - 12;
                document.getElementById('Hour').innerHTML = curr_hour + ':';
                document.getElementById('Minut').innerHTML = curr_min + ':';
                document.getElementById('Second').innerHTML = curr_sec;
            }
            timedMsg();   
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







</body>

</html>