<?php
session_start();
    include 'connection.php';
    if(isset($_POST['view_al22']) && $_POST['work'] == ""){
      echo  "<script> location.href = 'today_repayment.php'; </script>"; 
   } 
   
//       $daily_see = "";
   @$daily_see = $_GET['daily_see'];
   if (isset($_GET['daily_see'])) {
    $_POST['work'] = "";
    $_POST['type'] = "Weekly";
} 


 @$daily_see = $_GET['weekly_see'];
   if (isset($_GET['weekly_see'])) {
    $_POST['work'] = "";
    $_POST['type'] = "Weekly";
} 


@$daily_see = $_GET['monthly_see'];
   if (isset($_GET['monthly_see'])) {
    $_POST['work'] = "";
    $_POST['type'] = "Monthly";
} 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Weekly Account Officer</title>
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
                                            <h5 class="m-b-10">WEEKLY ACCOUNT OFFICERS</h5>
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
   
           
           
                                        <form action="acc_officer_weekly.php" method="POST" enctype="multipart/form-data" >
              
         <div class="input-group mb-3">
             
             <input type="text" class="form-control" id="autocomplete_staff" name="srch" placeholder="Search Staff Name here"   autofocus=""  required="">
                     
                   <select name="filter_performance"  style="width: 70px;">
                    <option value="" disabled selected hidden>Filter</option>
                  
                  <option value="non">Non-Performing Loan</option>
                
               </select>
    
    <div class="input-group-append">
      <button class="btn btn-warning" id="btnsearch" name="btnsrch" type="submit">SEARCH</button>  
     </div>
  </div>
        
                                        
             <div class="row">                             
                 <div class="col-sm-2">
                     <a href="acc_officer_weekly.php" class="btn btn-dark">View All</a> 
                                     </div>
                 <div class="col-sm-2">
             
               
               <br> 
             
                </div>
               </div>
               </form>  
              
                                        
            <script>
                $(document).ready(function(){
                 $("#date_sorting").click(function(){
                     var start = document.getElementById('start').value;
                     var end = document.getElementById('end').value;
                     var type = document.getElementById('type').value;
                     
                    if (start !== "" && end === "") {
                            swal({
                         title: 'Not Allowed!',
                         text:  'Please select End Date',
                         icon: 'error',
                        buttons: {
                            confirm : {text:'Ok',className:'sweet-orange'}
                          
                        },
                        closeOnClickOutside: false
                       }); 
                           return false;
                      } else if(end !== "" && start === ""){
                          swal({
                         title: 'Not Allowed!',
                         text:  'Please select Start Date',
                         icon: 'error',
                        buttons: {
                            confirm : {text:'Ok',className:'sweet-orange'}
                          
                        },
                        closeOnClickOutside: false
                       });
                           return false;
                      }  else if(type === ""){
                           swal({
                         title: 'Not Allowed!',
                         text:  'Please select Type',
                         icon: 'error',
                        buttons: {
                            confirm : {text:'Ok',className:'sweet-orange'}
                          
                        },
                        closeOnClickOutside: false
                       });
                            return false;
                      } else  if(start !== "" && end !== ""){
                          document.getElementById('work').value = "22"; 
                          return true; 
                      } 
                     
                 });    
                });
            </script>   
            
            
            
                 <script>
                $(document).ready(function(){
                 $("#date_sorting2").click(function(){
                     var start = document.getElementById('start').value;
                     var end = document.getElementById('end').value;
                     
                    if (start !== "" && end === "") {
                           swal({
                         title: 'Not Allowed!',
                         text:  'Please select End Date',
                         icon: 'error',
                        buttons: {
                            confirm : {text:'Ok',className:'sweet-orange'}
                          
                        },
                        closeOnClickOutside: false
                       }); 
                           return false;
                      } else if(end !== "" && start === ""){
                          swal({
                         title: 'Not Allowed!',
                         text:  'Please select Start Date',
                         icon: 'error',
                        buttons: {
                            confirm : {text:'Ok',className:'sweet-orange'}
                          
                        },
                        closeOnClickOutside: false
                       });
                           return false;
                      } else  if(start !== "" && end !== ""){
                          document.getElementById('work').value = "22"; 
                          return true; 
                      } 
                     
                 });    
                });
            </script>   
            <br><br>
                <?php
            
    if(isset($_POST['btnsrch'])){
//     ====================STAFF AND NON PERFORMING IS SET=====================================================   
        if(isset($_POST['filter_performance']) && isset($_POST['srch'])) {
          
          
              //THIS IS TO SEARCH STAFF NAME
            $inc=1;
             $staff_name = $_POST['srch'];
        $filter_performance = $_POST['filter_performance'];
        //loop through all table rows
           
        $result = mysqli_query($connect, "SELECT * FROM weekly_allloan WHERE indbalance > 0 AND remarks = 'loan disbursement' AND    (reverse_alert = '' OR reverse_alert IS NULL) AND acc_officer = '$staff_name' ORDER BY id DESC");  
    
   echo ' <div class="card card-block table-border-style">';       
     echo     '<div class="table-responsive">

     <div ><CAPTION><h3 style="font-size:26px; color:black; font-weight:bold;" align="center">'.$staff_name.' ASSIGNED TO WEEKLY CUSTOMERS (NON-PERFORMING)</h3></CAPTION> </div> 
   
  <table  class="table table-bordered table-striped table-hover "  align="center">
      
       <thead class="thead-dark">
         <tr align="center">
         <th>S/N</th>         
         <th >Customer Name</th>
           <th>Codename</th>
             <th>District</th>
          
             <th>Account Officer</th>
           <th>Date</th>
            <th>Repayment</th>
             <th>Disbursed</th>
                <th>Balance</th>
             <th>View Details</th>
             
          </tr>     
          </thead>

    <tbody class="" style="font-family: sans-serif; color:black ; font-weight:bold;">';
  //    ###########################################################################################   
      ///GET ALL DEBTORS FOR DAILY
            ////////////THIS IS TO SUM DAILY
     $summation_repay11 = $summation_loan11 = 0;
                        $total_repay11 = mysqli_query($connect, "SELECT * FROM weekly_allloan WHERE indbalance > 1 AND remarks = 'loan disbursement' AND acc_officer = '$staff_name'");      
                          while  ($row = mysqli_fetch_array($total_repay11)){
     $get_indbalance = $row['indbalance'];
              $get_enddate1 = $row['startdate'];
              $weeks = $row['weeks'];
              $get_weeks = $weeks * 7;
           ////CALCULATE CLOSING DATE
          $get_enddate  = date('Y-m-d', strtotime($get_enddate1. ' + '.$get_weeks.' days'));    
          
     $repay_sum = $row['repay_sum'];
     $disburseloan = $row['disburseloan'];
     $disburseloan_interest = $row['interest'];   
     $principal = $disburseloan + $disburseloan_interest;     
     $pay_rate = ($repay_sum/$disburseloan) * 100;
     
              ///////////////////////////////////////
                 //GET NUMBER OF MONTHS & DAYS LEFT
                    $dated = strtotime("$get_enddate");                
            $remaining = time() - $dated;     
                ///////COUNT ONLY DAYS
        $days_remaining = floor($remaining / 86400);  
    
               if($days_remaining > 0 && $get_indbalance > 1){
           $summation_repay11 += $row['repay_sum'];                           
                          }
                  }
                  
//     ------------------------------------------------------------------------             
                  
                  
       ////////////THIS IS TO SUM DAILY
                        $total_daily = mysqli_query($connect, "SELECT * FROM weekly_allloan WHERE indbalance > 1 AND remarks = 'loan disbursement' AND acc_officer = '$staff_name'");      
                          while  ($row = mysqli_fetch_array($total_daily)){
                $get_indbalance = $row['indbalance'];
              $get_enddate1 = $row['startdate'];
              $weeks = $row['weeks'];
              $get_weeks = $weeks * 7;
           ////CALCULATE CLOSING DATE
          $get_enddate  = date('Y-m-d', strtotime($get_enddate1. ' + '.$get_weeks.' days'));    
             
     $repay_sum = $row['repay_sum'];
     $disburseloan = $row['disburseloan'];
     $disburseloan_interest = $row['interest'];   
     $principal = $disburseloan + $disburseloan_interest;     
     $pay_rate = ($repay_sum/$disburseloan) * 100;
     
              ///////////////////////////////////////
                 //GET NUMBER OF MONTHS & DAYS LEFT
                    $dated = strtotime("$get_enddate");                
            $remaining = time() - $dated;     
                ///////COUNT ONLY DAYS
        $days_remaining = floor($remaining / 86400);  
    
               if($days_remaining > 0 && $get_indbalance > 1 ){               
                          $summation_loan11 += $row['disburseloan'];                        
                          }
                     }
           $summation_loan = $summation_loan11 - $summation_repay11;
//     ----------------------------------------------------------------------------------   
           
           
           
           
           
//           $summation_loan = $summation_loan_d + $summation_loan_w + $summation_loan_m;
        
                  echo "<tr id='hide_total' align = 'center'>";
           
             echo "<td>--------</td>";
            echo "<td>--------</td>";
             echo "<td>--------</td>";
            echo "<td>--------</td>"; 
            echo "<td>--------</td>"; 
            echo "<td align = 'right' style='font-size: 20px;'>TOTAL: </td>";
                echo "<td style='color: green; font-size: 20px;'>".number_format($summation_repay11)."</td>";
               echo "<td style='color: red; font-size: 20px;'>".number_format($summation_loan11)."</td>";
            echo "<td style='color: blue; font-size: 20px;'>".number_format($summation_loan)."</td>";  
            echo "<td>--------</td>";
            
              echo "</tr>";
            
  //    ###########################################################################################    
            
        while  ($row = mysqli_fetch_array($result)){
               $get_indbalance = $row['indbalance'];
              $get_enddate1 = $row['startdate'];
              $weeks = $row['weeks'];
              $get_weeks = $weeks * 7;
           ////CALCULATE CLOSING DATE
          $get_enddate  = date('Y-m-d', strtotime($get_enddate1. ' + '.$get_weeks.' days'));    
             
     $repay_sum = $row['repay_sum'];
     $disburseloan = $row['disburseloan'];
     $disburseloan_interest = $row['interest'];   
     $principal = $disburseloan + $disburseloan_interest;     
     $pay_rate = ($repay_sum/$disburseloan) * 100;
     
              ///////////////////////////////////////
                 //GET NUMBER OF MONTHS & DAYS LEFT
                    $dated = strtotime("$get_enddate");                
            $remaining = time() - $dated;     
                ///////COUNT ONLY DAYS
        $days_remaining = floor($remaining / 86400);  
    
               if($days_remaining > 0 && $get_indbalance > 1){//           $ans_bal = $row['repay_sum'] - $row['disburseloan'];
//           if($ans_bal < 0 && $row['remarks'] == "loan disbursement"){
          echo   "<tr>";
            echo "<td >" . $inc."</td>";
            echo "<td >" . $row['name']."</td>";
             echo "<td >" . $row['codename']. "</td>"; 
                 echo "<td >" . $row['district']. "</td>"; 
             
          echo "<td >" . $row['acc_officer']."</td>"; 
              echo "<td>" . $row['date']."</td>"; 
           echo "<td style='color: green;' >" . number_format($row['repay_sum'])."</td>"; 
            echo "<td style='color: red;' >" . number_format($row['disburseloan'])."</td>"; 
               echo "<td style='color: blue;' >" . number_format($row['indbalance'])."</td>"; 
           
            echo "<td ><a style='color: brown;' href='weekly_loan_statement.php?codename=" . $row['codename']. "&name=".$row['name']."&type=".$row['type']."'>View details</a></td>";
             echo "<td ><a style='color:#cc9900;' onclick=\"javascript: return confirm('DO YOU WISH TO CONTINUE WITH DELETE?');\" href='debtors.php?iddd=" . $row['id']."&name=".$row['name']."&id=check_delete'>Delete</a></td>";
   
            echo "</tr>";
            
            $inc++;
                }
            }
            
            
            
             
         
   echo ' </tbody>';
  echo ' </table>';
     
  echo '</div>' ;
  echo '</div>' ;
  
  
  
  
  
//  ===================FILTER STAFF ALONE==============================================================
  
        } else  if(!isset($_POST['filter_performance']) && isset($_POST['srch'])) {
          $date = date("jS F Y");
            //THIS IS TO SEARCH STAFF NAME
        
        $staff_name = $_POST['srch'];
        //loop through all table rows
            $inc=1;
            
             ////////////THIS IS TO SUM PAYMENTS
//                $total_payments = mysqli_query($connect, "SELECT SUM(payments) as total FROM loan");      
//              while  ($row1 = mysqli_fetch_array($total_payments)){
//              $summation_pay = $row1['total'];                          
//              }
            
//           balance > 1 is to avoid repetition
     $result = mysqli_query($connect, "SELECT * FROM weekly_allloan WHERE indbalance > 0 AND remarks = 'loan disbursement' AND    (reverse_alert = '' OR reverse_alert IS NULL) AND  acc_officer = '$staff_name' ORDER BY id DESC");  
    
   echo ' <div class="card card-block table-border-style">';       
     echo     '<div class="table-responsive">

     <div ><CAPTION><h3 style="font-size:26px; color:black; font-weight:bold;" align="center">'.$staff_name.' ASSIGNED TO WEEKLY CUSTOMERS</h3></CAPTION> </div> 
   
  <table  class="table table-bordered table-striped table-hover "  align="center">
      
       <thead class="thead-dark">
         <tr align="center">
         <th>S/N</th>         
         <th >Customer Name</th>
           <th>Codename</th>
              <th>District</th>
          
             <th>Account Officer</th>
           <th>Date</th>
            <th>Repayment</th>
             <th>Disbursed</th>
                <th>Balance</th>
             <th>View Details</th>
             
          </tr>     
          </thead>

    <tbody class="" style="font-family: sans-serif; color:black ; font-weight:bold;">';
     //    ###########################################################################################   
      ///GET ALL DEBTORS FOR WEEKLY
            ////////////THIS IS TO SUM WEEKLY
                        $total_repay11 = mysqli_query($connect, "SELECT SUM(repay_sum) as total FROM weekly_allloan WHERE acc_officer = '$staff_name'");      
                          while  ($row = mysqli_fetch_array($total_repay11)){
                          $summation_repay11_d = $row['total'];                          
                          }
               
       ////////////THIS IS TO SUM WEEKLY
                        $total_daily = mysqli_query($connect, "SELECT SUM(disburseloan) as total FROM weekly_allloan WHERE acc_officer = '$staff_name'");      
                          while  ($row = mysqli_fetch_array($total_daily)){
                          $summation_loan11_d = $row['total'];                          
                          }
               
           $summation_loan_d = $summation_loan11_d - $summation_repay11_d;
           
           
           
            
           
           
//           $summation_loan = $summation_loan_d + $summation_loan_w + $summation_loan_m;
         
                  echo "<tr id='hide_total' align = 'center'>";
            
            echo "<td>--------</td>";
              echo "<td>--------</td>";
             echo "<td>--------</td>";
            echo "<td>--------</td>"; 
            echo "<td>--------</td>"; 
            echo "<td align = 'right' style='font-size: 20px;'>TOTAL: </td>";
                echo "<td style='color: green; font-size: 20px;'>".number_format($summation_repay11_d)."</td>";
               echo "<td style='color: red; font-size: 20px;'>".number_format($summation_loan11_d)."</td>";
            echo "<td style='color: blue; font-size: 20px;'>".number_format($summation_loan_d)."</td>";  
            echo "<td>--------</td>";
            
              echo "</tr>";
            
  //    ###########################################################################################    
            
        while  ($row = mysqli_fetch_array($result)){
//           $ans_bal = $row['repay_sum'] - $row['disburseloan'];
//           if($ans_bal < 0 && $row['remarks'] == "loan disbursement"){
          echo   "<tr>";
            echo "<td >" . $inc."</td>";
            echo "<td >" . $row['name']."</td>";
             echo "<td >" . $row['codename']. "</td>"; 
                echo "<td >" . $row['district']. "</td>"; 
             
          echo "<td >" . $row['acc_officer']."</td>"; 
              echo "<td>" . $row['date']."</td>"; 
           echo "<td style='color: green;' >" . number_format($row['repay_sum'])."</td>"; 
            echo "<td style='color: red;' >" . number_format($row['disburseloan'])."</td>"; 
               echo "<td style='color: blue;' >" . number_format($row['indbalance'])."</td>"; 
           
            echo "<td ><a style='color: brown;' href='weekly_loan_statement.php?codename=" . $row['codename']. "&name=".$row['name']."&type=".$row['type']."'>View details</a></td>";
//              echo "<td ><a style='color:#cc9900;' onclick=\"javascript: return confirm('DO YOU WISH TO CONTINUE WITH DELETE?');\" href='debtors.php?iddd=" . $row['id']."&name=".$row['name']."&id=check_delete'>Delete</a></td>";
   
            echo "</tr>";
            
            $inc++;
//                }
            }
            
            
            
         
   echo ' </tbody>';
  echo ' </table>';
     
  echo '</div>' ;
  echo '</div>' ;
 
     
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
     
//   ^^^^^^^^^^^^^^^     FILTER NON PERFORMING AND STAFF IS NOT SET    ^^^^^^^^^^^^^^^^^^^^^
  
      }else if(isset($_POST['filter_performance']) && !isset($_POST['srch'])){
          
          
              //THIS IS TO SEARCH STAFF NAME
            $inc=1;
        $filter_performance = $_POST['filter_performance'];
        //loop through all table rows
           
        $result = mysqli_query($connect, "SELECT * FROM weekly_allloan WHERE indbalance > 0 AND remarks = 'loan disbursement' AND    (reverse_alert = '' OR reverse_alert IS NULL) AND NOT acc_officer = '' ORDER BY id DESC");  
    
   echo ' <div class="card card-block table-border-style">';       
     echo     '<div class="table-responsive">

     <div ><CAPTION><h3 style="font-size:26px; color:black; font-weight:bold;" align="center">ALL ASSIGNED TO WEEKLY CUSTOMERS (NON-PERFORMING)</h3></CAPTION> </div> 
   
  <table  class="table table-bordered table-striped table-hover "  align="center">
      
       <thead class="thead-dark">
         <tr align="center">
         <th>S/N</th>         
         <th >Customer Name</th>
           <th>Codename</th>
               <th>District</th>
          
             <th>Account Officer</th>
           <th>Date</th>
            <th>Repayment</th>
             <th>Disbursed</th>
                <th>Balance</th>
             <th>View Details</th>
             
          </tr>     
          </thead>

    <tbody class="" style="font-family: sans-serif; color:black ; font-weight:bold;">';
   //    ###########################################################################################   
      ///GET ALL DEBTORS FOR DAILY
            ////////////THIS IS TO SUM DAILY
     $summation_repay11 = $summation_loan11 = 0;
                        $total_repay11 = mysqli_query($connect, "SELECT * FROM weekly_allloan WHERE indbalance > 1 AND remarks = 'loan disbursement' AND NOT acc_officer = ''");      
                          while  ($row = mysqli_fetch_array($total_repay11)){
     $get_indbalance = $row['indbalance'];
              $get_enddate1 = $row['startdate'];
              $weeks = $row['weeks'];
              $get_weeks = $weeks * 7;
           ////CALCULATE CLOSING DATE
          $get_enddate  = date('Y-m-d', strtotime($get_enddate1. ' + '.$get_weeks.' days'));    
          
     $repay_sum = $row['repay_sum'];
     $disburseloan = $row['disburseloan'];
     $disburseloan_interest = $row['interest'];   
     $principal = $disburseloan + $disburseloan_interest;     
     $pay_rate = ($repay_sum/$disburseloan) * 100;
     
              ///////////////////////////////////////
                 //GET NUMBER OF MONTHS & DAYS LEFT
                    $dated = strtotime("$get_enddate");                
            $remaining = time() - $dated;     
                ///////COUNT ONLY DAYS
        $days_remaining = floor($remaining / 86400);  
    
               if($days_remaining > 0 && $get_indbalance > 1){
           $summation_repay11 += $row['repay_sum'];                           
                          }
                  }
                  
//     ------------------------------------------------------------------------             
                  
                  
       ////////////THIS IS TO SUM DAILY
                        $total_daily = mysqli_query($connect, "SELECT * FROM weekly_allloan WHERE indbalance > 1 AND remarks = 'loan disbursement' AND NOT acc_officer = ''");      
                          while  ($row = mysqli_fetch_array($total_daily)){
                $get_indbalance = $row['indbalance'];
              $get_enddate1 = $row['startdate'];
              $weeks = $row['weeks'];
              $get_weeks = $weeks * 7;
           ////CALCULATE CLOSING DATE
          $get_enddate  = date('Y-m-d', strtotime($get_enddate1. ' + '.$get_weeks.' days'));    
             
     $repay_sum = $row['repay_sum'];
     $disburseloan = $row['disburseloan'];
     $disburseloan_interest = $row['interest'];   
     $principal = $disburseloan + $disburseloan_interest;     
     $pay_rate = ($repay_sum/$disburseloan) * 100;
     
              ///////////////////////////////////////
                 //GET NUMBER OF MONTHS & DAYS LEFT
                    $dated = strtotime("$get_enddate");                
            $remaining = time() - $dated;     
                ///////COUNT ONLY DAYS
        $days_remaining = floor($remaining / 86400);  
    
               if($days_remaining > 0 && $get_indbalance > 1 ){               
                          $summation_loan11 += $row['disburseloan'];                        
                          }
                     }
           $summation_loan = $summation_loan11 - $summation_repay11;
//     ----------------------------------------------------------------------------------   
           
           
           
           
           
//           $summation_loan = $summation_loan_d + $summation_loan_w + $summation_loan_m;
        
                  echo "<tr id='hide_total' align = 'center'>";
            
             echo "<td>--------</td>";
            echo "<td>--------</td>";
             echo "<td>--------</td>";
            echo "<td>--------</td>"; 
            echo "<td>--------</td>"; 
            echo "<td align = 'right' style='font-size: 20px;'>TOTAL: </td>";
                echo "<td style='color: green; font-size: 20px;'>".number_format($summation_repay11)."</td>";
               echo "<td style='color: red; font-size: 20px;'>".number_format($summation_loan11)."</td>";
            echo "<td style='color: blue; font-size: 20px;'>".number_format($summation_loan)."</td>";  
            echo "<td>--------</td>";
            
              echo "</tr>";
            
  //    ###########################################################################################    
            
        while  ($row = mysqli_fetch_array($result)){
            $get_indbalance = $row['indbalance'];
              $get_enddate1 = $row['startdate'];
              $weeks = $row['weeks'];
              $get_weeks = $weeks * 7;
           ////CALCULATE CLOSING DATE
          $get_enddate  = date('Y-m-d', strtotime($get_enddate1. ' + '.$get_weeks.' days'));    
             
     $repay_sum = $row['repay_sum'];
     $disburseloan = $row['disburseloan'];
     $disburseloan_interest = $row['interest'];   
     $principal = $disburseloan + $disburseloan_interest;     
     $pay_rate = ($repay_sum/$disburseloan) * 100;
     
              ///////////////////////////////////////
                 //GET NUMBER OF MONTHS & DAYS LEFT
                    $dated = strtotime("$get_enddate");                
            $remaining = time() - $dated;     
                ///////COUNT ONLY DAYS
        $days_remaining = floor($remaining / 86400);  
    
               if($days_remaining > 0 && $get_indbalance > 1){//           $ans_bal = $row['repay_sum'] - $row['disburseloan'];
//           if($ans_bal < 0 && $row['remarks'] == "loan disbursement"){
          echo   "<tr>";
            echo "<td >" . $inc."</td>";
            echo "<td >" . $row['name']."</td>";
             echo "<td >" . $row['codename']. "</td>"; 
                 echo "<td >" . $row['district']. "</td>"; 
             
          echo "<td >" . $row['acc_officer']."</td>"; 
              echo "<td>" . $row['date']."</td>"; 
           echo "<td style='color: green;' >" . number_format($row['repay_sum'])."</td>"; 
            echo "<td style='color: red;' >" . number_format($row['disburseloan'])."</td>"; 
               echo "<td style='color: blue;' >" . number_format($row['indbalance'])."</td>"; 
           
            echo "<td ><a style='color: brown;' href='weekly_loan_statement.php?codename=" . $row['codename']. "&name=".$row['name']."&type=".$row['type']."'>View details</a></td>";
//              echo "<td ><a style='color:#cc9900;' onclick=\"javascript: return confirm('DO YOU WISH TO CONTINUE WITH DELETE?');\" href='debtors.php?iddd=" . $row['id']."&name=".$row['name']."&id=check_delete'>Delete</a></td>";
   
            echo "</tr>";
            
            $inc++;
                }
            }
            
            
            
             
         
   echo ' </tbody>';
  echo ' </table>';
     
  echo '</div>' ;
  echo '</div>' ;
 
          
          
          
          
          
          
         
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
      }
  
  
          
          
          
          
      } else {
            //loop through all table rows
            $inc=1;
            
             ////////////THIS IS TO SUM PAYMENTS
//                $total_payments = mysqli_query($connect, "SELECT SUM(payments) as total FROM loan");      
//              while  ($row1 = mysqli_fetch_array($total_payments)){
//              $summation_pay = $row1['total'];                          
//              }
            
//           balance > 1 is to avoid repetition
     $result = mysqli_query($connect, "SELECT * FROM weekly_allloan WHERE indbalance > 0 AND remarks = 'loan disbursement' AND    (reverse_alert = '' OR reverse_alert IS NULL) AND NOT acc_officer = '' ORDER BY id DESC");  
    
   echo ' <div class="card card-block table-border-style">';       
     echo     '<div class="table-responsive">

     <div ><CAPTION><h3 style="font-size:26px; color:black; font-weight:bold;" align="center">ALL ASSIGNED TO WEEKLY CUSTOMERS</h3></CAPTION> </div> 
   
  <table  class="table table-bordered table-striped table-hover "  align="center">
      
       <thead class="thead-dark">
         <tr align="center">
         <th>S/N</th>         
         <th >Customer Name</th>
           <th>Codename</th>
                <th>District</th>
          
             <th>Account Officer</th>
           <th>Date</th>
            <th>Repayment</th>
             <th>Disbursed</th>
                <th>Balance</th>
             <th>View Details</th>
             
          </tr>     
          </thead>

    <tbody class="" style="font-family: sans-serif; color:black ; font-weight:bold;">';
   //    ###########################################################################################   
      ///GET ALL DEBTORS FOR WEEKLY
            ////////////THIS IS TO SUM WEEKLY
                        $total_repay11 = mysqli_query($connect, "SELECT SUM(repay_sum) as total FROM weekly_allloan WHERE NOT acc_officer = ''");      
                          while  ($row = mysqli_fetch_array($total_repay11)){
                          $summation_repay11_d = $row['total'];                          
                          }
               
       ////////////THIS IS TO SUM WEEKLY
                        $total_daily = mysqli_query($connect, "SELECT SUM(disburseloan) as total FROM weekly_allloan WHERE NOT acc_officer = ''");      
                          while  ($row = mysqli_fetch_array($total_daily)){
                          $summation_loan11_d = $row['total'];                          
                          }
               
           $summation_loan_d = $summation_loan11_d - $summation_repay11_d;
           
           
           
           
           
           
//           $summation_loan = $summation_loan_d + $summation_loan_w + $summation_loan_m;
        
                  echo "<tr id='hide_total' align = 'center'>";
           
             echo "<td>--------</td>";
            echo "<td>--------</td>";
             echo "<td>--------</td>";
            echo "<td>--------</td>"; 
            echo "<td>--------</td>"; 
            echo "<td align = 'right' style='font-size: 20px;'>TOTAL: </td>";
                echo "<td style='color: green; font-size: 20px;'>".number_format($summation_repay11_d)."</td>";
               echo "<td style='color: red; font-size: 20px;'>".number_format($summation_loan11_d)."</td>";
            echo "<td style='color: blue; font-size: 20px;'>".number_format($summation_loan_d)."</td>";  
            echo "<td>--------</td>";
            
              echo "</tr>";
            
  //    ###########################################################################################    
            
        while  ($row = mysqli_fetch_array($result)){
//           $ans_bal = $row['repay_sum'] - $row['disburseloan'];
//           if($ans_bal < 0 && $row['remarks'] == "loan disbursement"){
          echo   "<tr>";
            echo "<td >" . $inc."</td>";
            echo "<td >" . $row['name']."</td>";
             echo "<td >" . $row['codename']. "</td>"; 
                 echo "<td >" . $row['district']. "</td>"; 
             
          echo "<td >" . $row['acc_officer']."</td>"; 
              echo "<td>" . $row['date']."</td>"; 
           echo "<td style='color: green;' >" . number_format($row['repay_sum'])."</td>"; 
            echo "<td style='color: red;' >" . number_format($row['disburseloan'])."</td>"; 
               echo "<td style='color: blue;' >" . number_format($row['indbalance'])."</td>"; 
           
            echo "<td ><a style='color: brown;' href='weekly_loan_statement.php?codename=" . $row['codename']. "&name=".$row['name']."&type=".$row['type']."'>View details</a></td>";
//              echo "<td ><a style='color:#cc9900;' onclick=\"javascript: return confirm('DO YOU WISH TO CONTINUE WITH DELETE?');\" href='debtors.php?iddd=" . $row['id']."&name=".$row['name']."&id=check_delete'>Delete</a></td>";
   
            echo "</tr>";
            
            $inc++;
//                }
            }
            
            
            
             
         
   echo ' </tbody>';
  echo ' </table>';
     
  echo '</div>' ;
  echo '</div>' ;
 
     
     
     
      }      
            ?>
       
        
       
       
       
       
          <!--THIS IS FOR AUTOCOMPLETE/SEARCH NAME USING AJAX-->
    
    <script type='text/javascript' >
    $( function() {
        $( "#autocomplete_staff" ).autocomplete({
            source: function( request, response ) {
                $.ajax({
                    url: "autocomplete_staff.php",
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
                $('#autocomplete_staff').val(ui.item.label); // display the selected text
                $('#selectuser_id').val(ui.item.value); // save selected id to input
                return false;
            }
        });
     });   
    </script> 
           
       
         
                  <!--ON LOAD DISPLAY ALL-->
          <script>
             if (window.XMLHttpRequest)
                  {// code for IE7+, Firefox, Chrome, Opera, Safari
                  xmlhttp=new XMLHttpRequest();
                  }
                else
                  {// code for IE6, IE5
                  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                  }        
                   
                   xmlhttp.open("GET","stud_db_magic.php",true);
                                 xmlhttp.send();                
                                 xmlhttp.onreadystatechange = function(){                                   
                      if(xmlhttp.readyState ===4 && xmlhttp.status===200) {
                 document.getElementById("dispay_db").innerHTML = xmlhttp.responseText;;
                                }
                        };
                 
                    
            
        </script>
        
        
        
                          <!--THIS IS TO DISPLAY SELECTED CLASS -->
          <script>
               $(document).ready(function() {
               var select_class = $(".select_class"); //THIS IS TO DISPLAY SELECTED CLASS   
    $(select_class).click(function(e){ //THIS IS TO DISPLAY SELECTED CLASS
        e.preventDefault();
        var getclass = document.getElementById('cla').value;
        
             if (window.XMLHttpRequest)
                  {// code for IE7+, Firefox, Chrome, Opera, Safari
                  xmlhttp=new XMLHttpRequest();
                  }
                else
                  {// code for IE6, IE5
                  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                  }        
                   
                   xmlhttp.open("GET","stud_db_magic22.php?district="+getclass,true);
                                 xmlhttp.send();                
                                 xmlhttp.onreadystatechange = function(){                                   
                      if(xmlhttp.readyState ===4 && xmlhttp.status===200) {
                 document.getElementById("dispay_db").innerHTML = xmlhttp.responseText;;
                                }
                        };
                        
                        
                document.getElementById('cla').value = "";        
                    });  
                    
                    
                    
                    
                        var print_page = $(".print_me");
                        $(print_page).click(function(e){ //Function LINK TO PRINT
                  e.preventDefault();
                                window.print();
                             });         
           });     
            
        </script>
         
         
                   <!--THIS IS TO RE-LOAD THE ENTIRE STUDENT-->
          <script>
         $(document).ready(function() {
               var show_all = $(".show_all"); //LINK TO GO AND VIEW ALL DEBTORS   
    $(show_all).click(function(e){ //Function LINK TO GO AND VIEW ALL DEBTORS button click
        e.preventDefault();
              window.location = "student_db.php";
            });
        });
          </script>   
          
          
          
          <script>
             function goBack() {
                 window.location = "admin_home.php";
             }
          </script>
          
          
          
                        <!--AUTO-COMPLETE-->
          <script type='text/javascript'>
    $( function() {
  
        $( "#autocomplete" ).autocomplete({
            source: function( request, response ) {
                
                $.ajax({
                    url: "district.php",
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
        
 ////////////////////////////////////////////////////////////////////////////////////////       
        $( ".autocomover" ).autocomplete({
            source: function( request, response ) {
                
                $.ajax({
//                    url: "autocomplete.php",
                    url: "district.php",
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
                $('.autocomover').val(ui.item.label); // display the selected text
////                $('#selectuser_idd').val(ui.item.value);
                $('#text1').val(ui.item.value);                
////                console.log("this.value: " + this.value);
                $('#text1').trigger('change');
                

            }
            
       
  });
            
          
        
        
        ////////////////////////////////////////////////////////////////////////////////////////       
        $( ".class_d" ).autocomplete({
            source: function( request, response ) {
                $.ajax({

                    url: "district.php",
                    type: 'post',
                    dataType: "json",
                    data: {
                        search: request.term
                    },
                    success: function( data ) {
                        response( data );
//                         response(results.slice(0, 10));
                        
                    }
                });
            },
      
            select: function (event, ui) {
                $('.class_d').val(ui.item.label); // display the selected text
                $('#selectuser_idd').val(ui.item.value);
//                $('#text1').val(ui.item.value);                
//////                console.log("this.value: " + this.value);
//                $('#text1').trigger('change');
//                

            }
            
       
  });
        
        
        
            
            
        
///////////////////////////////////////////////////////////////////////////////////////////
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
     if(size > 1000){
setTimeout(function() {document.getElementById("mymenu2").click(); }, 1000);
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
        
        
        window.onload = function(){
           document.getElementById('magic-collapse').click();
           
        };
             </script>
    
   
    
    
</body>

</html>
