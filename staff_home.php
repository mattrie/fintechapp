<?php
session_start();

     include 'connection.php';
     
     if(isset($_SESSION['redirect_message_reversal'])){
         echo $_SESSION['redirect_message_reversal']; 
             $_SESSION['redirect_message_reversal'] = "";
     }
     
      if (isset($_SESSION['store_black_list'])) {
     echo $_SESSION['store_black_list'];
     $_SESSION['store_black_list'] = "";
}
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Staff DashBoard</title>
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
       <?php
     $summation_loan = $summation_contribution = $summation_withdraw = $summation_repay = $summation_disburseloan = $count_members
 = $expenses = $revenue=$profit = $expenses_year = $revenue_year = $profit_year = "";
   $get_staff_name  = $_SESSION['staff_full_name'];
            ///GET ALL DEBTORS
//                $sql = mysqli_query($connect, "SELECT * FROM allloan");
//           while  ($row3 = mysqli_fetch_array($sql)){
//              $summation_loan = $row3['genbalance'];                          
//              }
//           $summation_loan;
           
           $staff_name =  $_SESSION['staff_full_name'] ;
          
         
           
           
           
//    ------------------------------------------------------------------------------       
            ////////////THIS IS TO SUM DAILY PAYMENTS
                   $date = date('jS F Y');
                        $total_repay = mysqli_query($connect, "SELECT SUM(repay) as total FROM allloan WHERE date='$date' AND collector = '$get_staff_name'");      
                          while  ($row = mysqli_fetch_array($total_repay)){
                          $summation_repay = $row['total'];                          
                          }
            $summation_repay;  
           
           
            ////////////THIS IS TO SUM WEEKLY PAYMENTS
                   $date = date('jS F Y');
                        $total_repay1 = mysqli_query($connect, "SELECT SUM(repay) as total FROM weekly_allloan WHERE date='$date' AND collector = '$get_staff_name'");      
                          while  ($row = mysqli_fetch_array($total_repay1)){
                          $summation_repay_weekly = $row['total'];                          
                          }
            $summation_repay_weekly;
            
            
            
              ////////////THIS IS TO SUM WEEKLY PAYMENTS
                   $date = date('jS F Y');
                        $total_repay2 = mysqli_query($connect, "SELECT SUM(repay) as total FROM monthly_allloan WHERE date='$date' AND collector = '$get_staff_name'");      
                          while  ($row = mysqli_fetch_array($total_repay2)){
                          $summation_repay_monthly = $row['total'];                          
                          }
            $summation_repay_monthly;
            
            
           
          ///////////TOTAL PAYMENTS
           $total_repayall = $summation_repay + $summation_repay_weekly + $summation_repay_monthly;
 //    ------------------------------------------------------------------------------                    
          
           
           
           
           
           
           
           
              
          ////////////THIS IS TO SUM DISBURSE
                    $date = date('jS F Y');
                        $total_disburseloan = mysqli_query($connect, "SELECT SUM(disburseloan) as total FROM allloan WHERE date='$date' AND collector = '$get_staff_name'");      
                          while  ($row = mysqli_fetch_array($total_disburseloan)){
                          $summation_disburseloan = $row['total'];                          
                          }
           $summation_disburseloan;  
           
           
           
           //////////////////TOTAL NUMBER OF MEMBERS////////////////
                $count = mysqli_query($connect,"SELECT * FROM members");
                $count_members = mysqli_num_rows($count);
               
                
           ///////////////////EXPENSES AND REVNUE FOR THE CURRENT MONTH///////////////////////     
              $month = date('F');
              $year = date('Y');
                
                $sql = mysqli_query($connect, "SELECT SUM(expense) as total FROM revenuexp WHERE month = '$month' AND year = '$year'");
           while  ($row3 = mysqli_fetch_array($sql)){
              $expenses = $row3['total'];                          
              }
              
                $sql = mysqli_query($connect, "SELECT SUM(revenue) as total FROM revenuexp WHERE month = '$month' AND year = '$year'");
           while  ($row3 = mysqli_fetch_array($sql)){
              $revenue = $row3['total'];                          
              }
              
              
                $profit = $revenue - $expenses; 
                  
                   
                 
                   
                   
          ///////////////////EXPENSES AND REVNUE FOR THE CURRENT YEAR///////////////////////     
                $year = date('Y');
              $sql = mysqli_query($connect, "SELECT SUM(expense) as total FROM revenuexp WHERE year = '$year'");
           while  ($row3 = mysqli_fetch_array($sql)){
              $expenses_year = $row3['total'];                          
              }
              
                $sql = mysqli_query($connect, "SELECT SUM(revenue) as total FROM revenuexp WHERE year = '$year'");
           while  ($row3 = mysqli_fetch_array($sql)){
              $revenue_year = $row3['total'];                          
              }
              
              
                $profit_year = $revenue_year - $expenses_year; 
                   
                   
                  ////////////THIS IS TO SUM amount
                        $total_amount = mysqli_query($connect, "SELECT SUM(amount) as totalx FROM contribution WHERE date='$date' AND collector = '$staff_name'");      
                          while  ($row = mysqli_fetch_array($total_amount)){
                          $summation_amount = $row['totalx'];                          
                          }
               
               ////////////THIS IS TO SUM rate for first payment
                        $total_rate = mysqli_query($connect, "SELECT SUM(rate) as totaly FROM contribution WHERE date='$date' AND collector = '$staff_name'");      
                          while  ($row = mysqli_fetch_array($total_rate)){
                          $summation_rate = $row['totaly'];                          
                          }     
                            
               
                          
                    $summation_cont = $summation_amount;
                   


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
                                            <h5 class="m-b-10">Dashboard</h5>
                                            <b class="m-b-0"> <label style="font-size: 20px;">Welcome: <?php echo $get_staff_name;?></label><br>       
      </b>
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
                        
                        
                        
                        
                      <!-----------------------DATE AND TIME------------------------>  
                  <div class="pcoded-inner-content">
                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <!-- Page-body start -->
                                    <div class="page-body">
                                        <div class="row">
                                            
                      <div class="col-xl-4 col-md-12">
                                                <div class="card mat-clr-stat-card text-white blue ">
                                                    <div class="card-block">
                                                        <div class="row">
                                                            <div class="col-3 text-center bg-c-blue">
                                                                <i class="fas fa-calendar mat-icon f-24"></i>
                                                            </div>
                                                            <div class="col-9 cst-cont">
                                                                <h5 style="color:#003300;"><?php echo $todays_date;?></h5>
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
                                                                   <label style="color:#003300; "><?php  echo date("A");?></label>
                                                                </h5>
                                                                <p class="m-b-0" >God's time is the Best</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>     
                   <!----------------------END DATE AND TIME------------------------>       
                        
                        
                        
                                            
                                            <!-- Material statustic card end -->
                                            <!-- order-visitor start -->


                                            <!-- order-visitor end -->

                                            <!--  sale analytics start -->
<!--                                            <div class="col-xl-6 col-md-12">
                                                <div class="card table-card">
                                                    <div class="card-header">
                                                        <h5>Member’s performance</h5>
                                                        <div class="card-header-right">
                                                            <ul class="list-unstyled card-option">
                                                                <li><i class="fa fa fa-wrench open-card-option"></i></li>
                                                                <li><i class="fa fa-window-maximize full-card"></i></li>
                                                                <li><i class="fa fa-minus minimize-card"></i></li>
                                                                <li><i class="fa fa-refresh reload-card"></i></li>
                                                                <li><i class="fa fa-trash close-card"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="card-block">
                                                        <div class="table-responsive">
                                                            <table class="table table-hover m-b-0 without-header">
                                                                <tbody>
                                                                    <tr>
                                                                        <td>
                                                                            <div class="d-inline-block align-middle">
                                                                                <img src="assets/images/avatar-4.jpg" alt="user image" class="img-radius img-40 align-top m-r-15">
                                                                                <div class="d-inline-block">
                                                                                    <h6>Shirley Hoe</h6>
                                                                                    <p class="text-muted m-b-0">Sales executive , NY</p>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td class="text-right">
                                                                            <h6 class="f-w-700">$78.001<i class="fas fa-level-down-alt text-c-red m-l-10"></i></h6>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <div class="d-inline-block align-middle">
                                                                                <img src="assets/images/avatar-2.jpg" alt="user image" class="img-radius img-40 align-top m-r-15">
                                                                                <div class="d-inline-block">
                                                                                    <h6>James Alexander</h6>
                                                                                    <p class="text-muted m-b-0">Sales executive , EL</p>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td class="text-right">
                                                                            <h6 class="f-w-700">$89.051<i class="fas fa-level-up-alt text-c-green m-l-10"></i></h6>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <div class="d-inline-block align-middle">
                                                                                <img src="assets/images/avatar-4.jpg" alt="user image" class="img-radius img-40 align-top m-r-15">
                                                                                <div class="d-inline-block">
                                                                                    <h6>Shirley Hoe</h6>
                                                                                    <p class="text-muted m-b-0">Sales executive , NY</p>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td class="text-right">
                                                                            <h6 class="f-w-700">$89.051<i class="fas fa-level-up-alt text-c-green m-l-10"></i></h6>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <div class="d-inline-block align-middle">
                                                                                <img src="assets/images/avatar-2.jpg" alt="user image" class="img-radius img-40 align-top m-r-15">
                                                                                <div class="d-inline-block">
                                                                                    <h6>Nick Xander</h6>
                                                                                    <p class="text-muted m-b-0">Sales executive , EL</p>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td class="text-right">
                                                                            <h6 class="f-w-700">$89.051<i class="fas fa-level-up-alt text-c-green m-l-10"></i></h6>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>-->
                                            <div class="col-xl-12 col-md-12">
                                                <div class="row">
                                                    <!-- sale card start -->
                                       <!--TOTAL LOAN PORTFOLIO-->                                                             
         
                                       
                                       
                                       
                                       
                                         <!--THIS IS FOR TODAY'S DAILY PAYMENT-->                                                         
                                                    <div class="col-md-3">
                                                        <div class="card text-center text-c-green repay">
                                                            <div class="card-block">
                                                                <h6 class="m-b-0">Today's Daily Repayment</h6>
                                                                <?php if($summation_repay == ""){$summation_repay = "0";}?>
                                                                <h4 class="m-t-15 m-b-15"><b class="">₦ </b><?php echo number_format($summation_repay);?></h4>
                                                                 <?php if($total_repayall == ""){$total_repayall = "0";}
                                                                  if (  $total_repayall > 1 ) {
                                                                    $daily_pay_perc = ($summation_repay / $total_repayall) * 100;
                                                                  } else {
                                                                    $daily_pay_perc = 0;
                                                                  }
                                                                 ?>
                                                                 <?php if(is_nan($daily_pay_perc)){$daily_pay_perc = 0;}?>
                                                                <p class="m-b-0"><?php echo round($daily_pay_perc, 1);?>% of TTR</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                         <div class="card text-center text-c-green repay">
                                                            <div class="card-block">
                                                                <h6 class="m-b-0">Today's Weekly Repayment</h6>
                                                                <?php if($summation_repay_weekly == ""){$summation_repay_weekly = "0";}?>
                                                                <h4 class="m-t-15 m-b-15"><b class="">₦ </b><?php echo number_format($summation_repay_weekly);?></h4>
                                                                 <?php if($total_repayall == ""){$total_repayall = "0";}
                                                                    if ($total_repayall > 1) {
                                                                        $weekly_pay_perc = ($summation_repay_weekly / $total_repayall) * 100;
                                                                    } else {
                                                                        $weekly_pay_perc = 0;
                                                                    }
                                                                 ?>
                                                                 <?php if(is_nan($weekly_pay_perc)){$weekly_pay_perc = 0;}?>
                                                                <p class="m-b-0"><?php echo round($weekly_pay_perc, 1);?>% of TTR</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                         <div class="card text-center text-c-green repay">
                                                            <div class="card-block">
                                                                <h6 class="m-b-0">Today's Monthly Repayment</h6>
                                                                <?php if($summation_repay_monthly == ""){$summation_repay_monthly = "0";}?>
                                                                <h4 class="m-t-15 m-b-15"><b class="">₦ </b><?php echo number_format($summation_repay_monthly);?></h4>
                                                                 <?php if($total_repayall == ""){$total_repayall = "0";}
                                                                    if ($total_repayall > 1) {
                                                                        $monthly_pay_perc = ($summation_repay_monthly / $total_repayall) * 100;
                                                                    } else {
                                                                        $monthly_pay_perc = 0;
                                                                    }
                                                                 ?>
                                                                 <?php if( is_nan($monthly_pay_perc)){$monthly_pay_perc = 0;}?>
                                                                <p class="m-b-0"><?php echo round($monthly_pay_perc, 1);?>% of TTR</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="card text-center text-c-green repay">
                                                            <div class="card-block">
                                                                <h6 class="m-b-0" style="font-size: 16px;">Today Total Repayment</h6>
                                                                <?php if($total_repayall == ""){$total_repayall = "0";}?>
                                                                <h4 class="m-t-15 m-b-15"><b class="">₦ </b><?php echo number_format($total_repayall);?></h4>
                                                                
                                                                <p class="m-b-0">100% of TTR</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                       
                                         
                                         
                                         
                                         
                                         
                                         
                                         
                                         
                                         
                                         
                  
                                                      
                                                      
                                                      
                                                      
                                                    <!-- sale card end -->
                                                </div>
                                                
                                                <div class="row">
                                                     <div class="col-md-3">
                                                        <div class="card text-center text-c-green repay">
                                                            <div class="card-block">
                                                                <h6 class="m-b-0" style="font-size: 16px;">Today Total Contribution</h6>
                                                                <?php if($summation_cont == ""){$summation_cont = "0";}?>
                                                                <h4 class="m-t-15 m-b-15"><b class="">₦ </b><?php echo number_format($summation_cont);?></h4>
                                                                
                                                              
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>

                                            <!--  sale analytics end -->

                                            <!-- Project statustic start -->
                                           
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

    
     <script type="text/javascript">
        function timedMsg()
         {
           var t=setInterval("change_time();",1000);
         }
        function change_time()
        {
          var d = new Date();
          var curr_hour = d.getHours();
          var curr_min = d.getMinutes();
          var curr_sec = d.getSeconds();
          if(curr_hour > 12)
            curr_hour = curr_hour - 12;
          document.getElementById('Hour').innerHTML =curr_hour+':';
           document.getElementById('Minut').innerHTML=curr_min+':';
           document.getElementById('Second').innerHTML=curr_sec;
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
    
    
     <script>
             if (window.XMLHttpRequest)
                  {// code for IE7+, Firefox, Chrome, Opera, Safari
                  xmlhttp=new XMLHttpRequest();
                  }
                else
                  {// code for IE6, IE5
                  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                  }        
                   
                   xmlhttp.open("GET","debtor_magic.php",true);
                                 xmlhttp.send();                
                                 xmlhttp.onreadystatechange = function(){                                   
                      if(xmlhttp.readyState ===4 && xmlhttp.status===200) {
                 document.getElementById("dispay_db").innerHTML = xmlhttp.responseText;;
                                }
                        };
                 
                    
            
        </script>
    
   
    
    
</body>

</html>
