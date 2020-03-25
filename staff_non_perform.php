<?php
session_start();
    include 'connection.php';
   
       if(isset($_GET['iddd'])){
              $id=$_GET['iddd'];
          $name = $_GET['name'];
                   
    $query = "DELETE FROM allloan WHERE id = '$id'"; 
    $result23 = mysqli_query($connect, $query);  
    
    
                       
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

                          @$total_status =  $daily_status + $weekly_status ;  
      //UPDATE RECORD
      $sql_statement101 = "UPDATE members SET balance = '$total_status' WHERE namee='$name'";
                     $result29 = mysqli_query($connect, $sql_statement101); 
 //       **************************||||||||||||||||***********************************************            
              

    echo "<script>alert('Transaction Deleted!!!')</script>";
//             header("location: weekly_staff_debtors.php");
          }  
     
       
            if(isset($_POST['btnsrch'])){
                $names = "";
               $get_code = $_POST['telephone']; 
                $sql_state1 = "SELECT * FROM allloan WHERE  disburseloan > 1 AND remarks = 'loan disbursement' AND codename = '$get_code'";
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
                       echo "<script type='text/javascript'> $(document).ready(function(){ 
                swal({
                         title: 'Codename Check!',
                         text: 'Wrong code_name inserted. Insert correct code',
                         icon: 'warning',
                        buttons: {
                            confirm : {text:'Ok',className:'sweet-orange'},
                          
                        },
                        closeOnClickOutside: false
                       })
                  
                }); </script>";   
                   } else {
          echo  "<script> location.href = 'staff_loan_statement.php?codename=$get_code&name=$names'; </script>";   
           
                } 
               
            }
      
      
//    echo "<td ><a style='color: #ff9900;' href='loan_statement.php?codename=" . $row['codename']. "&name=".$row['name']."&type=".$row['type']."'>View details</a></td>";
         
            
            ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>ASSIGNED CUSTOMERS</title>
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
      
                        <!-- Page-header start -->
                        <div class="page-header">
                            <div class="page-block">
                                <div class="row align-items-center">
                                    <div class="col-md-8">
                                        <div class="page-header-title">
                                            <h5 class="m-b-10">ASSIGNED CUSTOMERS</h5>
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
            
<!--             <div class="row" >
             
                
                <div class="col-sm-2">
                    
                </div>
                
                <div class="col-sm-3">
            <form name="monthyear" action="staff_debtors.php" method="POST" enctype="multipart/form-data">
                <input type="hidden"  id="evaluation" class="autocomplete_staff" name="telephone" placeholder="Staff Evaluation (month)"  ><br>
        <select name="months" id="month" required="">
                    <option value="" disabled selected hidden>select month</option>
                   <option>January</option>
                   <option>February</option>
                   <option>March</option>
                   <option>April</option>
                   <option>May</option>
                   <option>June</option>
                   <option>July</option>
                   <option>August</option>
                   <option>September</option>
                   <option>October</option>
                   <option>November</option>
                   <option>December</option>                  
               </select>
               
                   <select name="years" id="year" required="">
                    <option value="" disabled selected hidden>select year</option>
                   <option>2017</option>
                  <option>2018</option>
                   <option>2019</option>
                  <option>2020</option>
                  <option>2021</option>
                 <option>2022</option>
                 <option>2023</option>
                  <option>2024</option>
                   <option>2025</option>
                  <option>2026</option>
                  <option>2027</option>
                 <option>2028</option>   
                  <option>2029</option>
                 <option>2030</option>   
               </select>
               
               <br> 
               <button  name="month_year" class="select_time" style="font-weight: bold; border-radius: 8px; padding:7px; font-style:italic ; font-size: 14px; background-color:green; color: whitesmoke; cursor: pointer; margin-bottom: 10px;">Search Month</button>
         
               </form>
               
                  </div>
               
               
               
               
               
                <div class="col-sm-3" style="margin-left: 80px;">
            <form name="year" action="staff_debtors.php" method="POST" enctype="multipart/form-data">
                 
                <input type="hidden"  id="evaluation1" class="autocomplete_staff1" name="telephone" placeholder="Staff Evaluation (year)"  ><br>
            
                   <select name="year_alone" id="year_a" required="" >
                    <option value="" disabled selected hidden>select year</option>
                   <option>2017</option>
                  <option>2018</option>
                   <option>2019</option>
                  <option>2020</option>
                  <option>2021</option>
                 <option>2022</option>
                 <option>2023</option>
                  <option>2024</option>
                   <option>2025</option>
                  <option>2026</option>
                  <option>2027</option>
                 <option>2028</option>   
                  <option>2029</option>
                 <option>2030</option>   
               </select>
               
               <br> 
               <button  name="year_a" class="select_year" style="font-weight: bold; border-radius: 8px; padding:7px; font-style:italic ; font-size: 14px; background-color:green; color: whitesmoke; cursor: pointer; margin-bottom: 10px;">Search Year</button>
         
               </form>
               </div>
                
                 <div class="col-sm-1">
          SHOW ALL
         <button class="show_all" style="border-radius: 8px; padding:8px; font-style:italic ; font-size: 18px; background-color:green; color: whitesmoke; cursor: pointer">VIEW ALL</button>
              </div>
               
         </div>-->
            
                  <br>
                 
                      <div class="row">   
                    <div class="col-sm-4">   
                         </div>
                             
              
     
        <div class="col-sm-1">   
                         </div>
           </div>
 
             
                
            
        
                
           
          
       <!--DISPLAY ARENA-->
      
     
           
           
           
           <br>
            <!--  non performing -->

                                                    <!-- sale card start -->
                                       <!--TOTAL LOAN PORTFOLIO-->                                                             
         
                                       <?php 
                                       
        $date = date("jS F Y");
            //THIS IS TO SEARCH STAFF NAME
            $inc=1;
        $staff_name = $_SESSION['staff_full_name'];
        //loop through all table rows
          
            
             ////////////THIS IS TO SUM PAYMENTS
//                $total_payments = mysqli_query($connect, "SELECT SUM(payments) as total FROM loan");      
//              while  ($row1 = mysqli_fetch_array($total_payments)){
//              $summation_pay = $row1['total'];                          
//              }
            
//           balance > 1 is to avoid repetition
     $result = mysqli_query($connect, "SELECT * FROM allloan WHERE indbalance > 0 AND remarks = 'loan disbursement' AND    (reverse_alert = '' OR reverse_alert IS NULL) AND  acc_officer = '$staff_name' ORDER BY id DESC");  
     $result1 = mysqli_query($connect, "SELECT * FROM weekly_allloan WHERE indbalance > 0 AND remarks = 'loan disbursement' AND    (reverse_alert = '' OR reverse_alert IS NULL) AND  acc_officer = '$staff_name' ORDER BY id DESC");  
     $result2 = mysqli_query($connect, "SELECT * FROM monthly_allloan WHERE indbalance > 0 AND remarks = 'loan disbursement' AND    (reverse_alert = '' OR reverse_alert IS NULL) AND  acc_officer = '$staff_name' ORDER BY id DESC");  
    
   echo ' <div class="card card-block table-border-style">';       
     echo     '<div class="table-responsive">

     <div ><CAPTION><h3 style="font-size:26px; color:black; font-weight:bold;" align="center">'.$staff_name.' ASSIGNED  CUSTOMERS</h3></CAPTION> </div> 
   
  <table  class="table table-bordered table-striped table-hover "  align="center">
      
       <thead class="thead-dark">
         <tr align="center">
         <th>S/N</th>         
         <th >Customer Name</th>
           <th>Codename</th>
               <th>Account Officer</th>
         <th>Type</th>
         <th>Description</th>
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
                        $total_repay11 = mysqli_query($connect, "SELECT SUM(repay_sum) as total FROM allloan WHERE acc_officer = '$staff_name'");      
                          while  ($row = mysqli_fetch_array($total_repay11)){
                          $summation_repay11_d = $row['total'];                          
                          }
               
       ////////////THIS IS TO SUM DAILY
                        $total_daily = mysqli_query($connect, "SELECT SUM(disburseloan) as total FROM allloan WHERE acc_officer = '$staff_name'");      
                          while  ($row = mysqli_fetch_array($total_daily)){
                          $summation_loan11_d = $row['total'];                          
                          }
               
           $summation_loan_d = $summation_loan11_d - $summation_repay11_d;
           
           
           
            ///GET ALL DEBTORS FOR DAILY
            ////////////THIS IS TO SUM DAILY
                        $total_repay11_w = mysqli_query($connect, "SELECT SUM(repay_sum) as total FROM weekly_allloan WHERE acc_officer = '$staff_name'");      
                          while  ($row = mysqli_fetch_array($total_repay11_w)){
                          $summation_repay11_w = $row['total'];                          
                          }
               
       ////////////THIS IS TO SUM DAILY
                        $total_daily_w = mysqli_query($connect, "SELECT SUM(disburseloan) as total FROM weekly_allloan WHERE acc_officer = '$staff_name'");      
                          while  ($row = mysqli_fetch_array($total_daily_w)){
                          $summation_loan11_w = $row['total'];                          
                          }
               
           $summation_loan_w = $summation_loan11_w - $summation_repay11_w;
           
           
             //    ###########################################################################################   
      ///GET ALL DEBTORS FOR DAILY
            ////////////THIS IS TO SUM DAILY
                        $total_repay11_m = mysqli_query($connect, "SELECT SUM(repay_sum) as total FROM monthly_allloan WHERE acc_officer = '$staff_name'");      
                          while  ($row = mysqli_fetch_array($total_repay11_m)){
                          $summation_repay11_m = $row['total'];                          
                          }
               
       ////////////THIS IS TO SUM DAILY
                        $total_daily_m = mysqli_query($connect, "SELECT SUM(disburseloan) as total FROM monthly_allloan WHERE acc_officer = '$staff_name'");      
                          while  ($row = mysqli_fetch_array($total_daily_m)){
                          $summation_loan11_m = $row['total'];                          
                          }
               
           $summation_loan_m = $summation_loan11_m - $summation_repay11_m;
              
           
           
//           $summation_loan = $summation_loan_d + $summation_loan_w + $summation_loan_m;
           $summation_loan11 = $summation_loan11_d + $summation_loan11_w + $summation_loan11_m;
           $summation_repay11 = $summation_repay11_d + $summation_repay11_w + $summation_repay11_m;
              $summation_loan = $summation_loan11 - $summation_repay11;
                  echo "<tr id='hide_total' align = 'center'>";
            echo "<td>--------</td>";
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
//           $ans_bal = $row['repay_sum'] - $row['disburseloan'];
//           if($ans_bal < 0 && $row['remarks'] == "loan disbursement"){
          echo   "<tr>";
            echo "<td >" . $inc."</td>";
            echo "<td >" . $row['name']."</td>";
             echo "<td >" . $row['codename']. "</td>"; 
              echo "<td >" . $row['acc_officer']. "</td>"; 
                echo "<td>Daily</td>";
            echo "<td >" . $row['remarks']."</td>"; 
              echo "<td>" . $row['date']."</td>"; 
           echo "<td style='color: green;' >" . number_format($row['repay_sum'])."</td>"; 
            echo "<td style='color: red;' >" . number_format($row['disburseloan'])."</td>"; 
               echo "<td style='color: blue;' >" . number_format($row['indbalance'])."</td>"; 
           
            echo "<td ><a style='color: brown;' href='staff_loan_statement.php?codename=" . $row['codename']. "&name=".$row['name']."&type=".$row['type']."'>View details</a></td>";
//              echo "<td ><a style='color:#cc9900;' onclick=\"javascript: return confirm('DO YOU WISH TO CONTINUE WITH DELETE?');\" href='debtors.php?iddd=" . $row['id']."&name=".$row['name']."&id=check_delete'>Delete</a></td>";
   
            echo "</tr>";
            
            $inc++;
//                }
            }
            
            
             while  ($row = mysqli_fetch_array($result1)){
//           $ans_bal = $row['repay_sum'] - $row['disburseloan'];
//           if($ans_bal < 0 && $row['remarks'] == "loan disbursement"){
          echo   "<tr>";
            echo "<td >" . $inc."</td>";
            echo "<td >" . $row['name']."</td>";
             echo "<td >" . $row['codename']. "</td>"; 
              echo "<td >" . $row['acc_officer']. "</td>"; 
                  echo "<td>Weekly</td>";
            echo "<td >" . $row['remarks']."</td>"; 
              echo "<td>" . $row['date']."</td>"; 
           echo "<td style='color: green;' >" . number_format($row['repay_sum'])."</td>"; 
            echo "<td style='color: red;' >" . number_format($row['disburseloan'])."</td>"; 
               echo "<td style='color: blue;' >" . number_format($row['indbalance'])."</td>"; 
           
            echo "<td ><a style='color: brown;' href='staff_weekly_loan_statement.php?codename=" . $row['codename']. "&name=".$row['name']."&type=".$row['type']."'>View details</a></td>";
//              echo "<td ><a style='color:#cc9900;' onclick=\"javascript: return confirm('DO YOU WISH TO CONTINUE WITH DELETE?');\" href='debtors.php?iddd=" . $row['id']."&name=".$row['name']."&id=check_delete'>Delete</a></td>";
   
            echo "</tr>";
            
            $inc++;
//                }
            }
            
            
             while  ($row = mysqli_fetch_array($result2)){
//           $ans_bal = $row['repay_sum'] - $row['disburseloan'];
//           if($ans_bal < 0 && $row['remarks'] == "loan disbursement"){
          echo   "<tr>";
            echo "<td >" . $inc."</td>";
            echo "<td >" . $row['name']."</td>";
             echo "<td >" . $row['codename']. "</td>"; 
              echo "<td >" . $row['acc_officer']. "</td>"; 
              echo "<td>Monthly</td>";
            echo "<td >" . $row['remarks']."</td>"; 
              echo "<td>" . $row['date']."</td>"; 
           echo "<td style='color: green;' >" . number_format($row['repay_sum'])."</td>"; 
            echo "<td style='color: red;' >" . number_format($row['disburseloan'])."</td>"; 
               echo "<td style='color: blue;' >" . number_format($row['indbalance'])."</td>"; 
           
            echo "<td ><a style='color: brown;' href='staff_monthly_loan_statement.php?codename=" . $row['codename']. "&name=".$row['name']."&type=".$row['type']."'>View details</a></td>";
//              echo "<td ><a style='color:#cc9900;' onclick=\"javascript: return confirm('DO YOU WISH TO CONTINUE WITH DELETE?');\" href='debtors.php?iddd=" . $row['id']."&name=".$row['name']."&id=check_delete'>Delete</a></td>";
   
            echo "</tr>";
            
            $inc++;
//                }
            }
         
   echo ' </tbody>';
  echo ' </table>';
     
  echo '</div>' ;
  echo '</div>' ;
 
     
     
     
     
     
     
    
                                       
                                       
                                       ?>
                                       
                                       
                                       
                                         <!--THIS IS FOR TODAY'S DAILY PAYMENT-->                                                         
                                                    
                                         
                                         
                                         
                                         
                                         
                                         
                                         
                                         
                                         
                  
                                                      
                                                      
                                                      
                                                      
                                                    <!-- sale card end -->
                                             
        
       
        
       
       
       
          
     
      
          --
          <script type='text/javascript' >
    $( function() {
        $( ".autocomplete_staff" ).autocomplete({
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
                $('.autocomplete_staff').val(ui.item.label); // display the selected text
                $('.selectuser_id').val(ui.item.value); // save selected id to input
                return false;
            }
        });
     });   
    </script>   
    
    
    
    
    
    
    
    
        <script type='text/javascript' >
    $( function() {
        $( ".autocomplete_staff1" ).autocomplete({
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
                $('.autocomplete_staff1').val(ui.item.label); // display the selected text
                $('.selectuser_id').val(ui.item.value); // save selected id to input
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
                   
                   xmlhttp.open("GET","staff_debtor_magic.php",true);
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
                 
                 if(getclass === ""){
                     
                     alert("Please select district")
                 }
                 
                 else{
                   xmlhttp.open("GET","debtor_magic22.php?district="+getclass,true);
                                 xmlhttp.send();                
                                 xmlhttp.onreadystatechange = function(){                                   
                      if(xmlhttp.readyState ===4 && xmlhttp.status===200) {
                 document.getElementById("dispay_db").innerHTML = xmlhttp.responseText;;
                                }
                        };
                    
                        
                document.getElementById('cla').value = ""; 
                         }   
                    });  
                    
                    
                    
                    
                        var print_page = $(".print_me");
                        $(print_page).click(function(e){ //Function LINK TO PRINT
                  e.preventDefault();
                                window.print();
                             });         
           });     
            
        </script>
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
         <!--THIS IS TO DISPLAY DISTRICT -->
          <script>
               $(document).ready(function() {
        
        ////////////////////SELECT TIME MONTH////////////////////////////////////////
        var select_time = $(".select_time"); //THIS IS TO DISPLAY SELECTED CLASS   
    $(select_time).click(function(e){ //THIS IS TO DISPLAY SELECTED CLASS
        e.preventDefault();
        var evaluation = document.getElementById('evaluation').value;
        var getmonth = document.getElementById('month').value;
        var getyear = document.getElementById('year').value;
        var carry_group = document.getElementById('carry_group').value;
        
             if (window.XMLHttpRequest)
                  {// code for IE7+, Firefox, Chrome, Opera, Safari
                  xmlhttp=new XMLHttpRequest();
                  }
                else
                  {// code for IE6, IE5
                  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                  }        
               
        if (getmonth==="" || getyear===""){ 
               swal({
                         title: 'Not Allowed!',
                         text:  'You must fill month and year to search',
                         icon: 'error',
                        buttons: {
                            confirm : {text:'Ok',className:'sweet-orange'}
                          
                        },
                        closeOnClickOutside: false
                       });
            }else{
                   xmlhttp.open("GET","staff_debtor_month.php?month="+getmonth+"&year="+getyear+"&evaluation="+evaluation+"&carry_group="+carry_group,true);
                                 xmlhttp.send();                
                                 xmlhttp.onreadystatechange = function(){                                   
                      if(xmlhttp.readyState ===4 && xmlhttp.status===200) {
                 document.getElementById("dispay_db").innerHTML = xmlhttp.responseText;;
//               window.location = "statement_time.php";
                           
                                    }
                                };
                    
                            }          
              
                          
                        });  
                    
        
        
       
       
       
       
           ////////////////////SELECT TIME YEAR////////////////////////////////////////
        var select_year = $(".select_year"); //THIS IS TO DISPLAY SELECTED CLASS   
    $(select_year).click(function(e){ //THIS IS TO DISPLAY SELECTED CLASS
        e.preventDefault();
          var evaluation1 = document.getElementById('evaluation1').value;
        var getyear = document.getElementById('year_a').value;
         var carry_group = document.getElementById('carry_group').value;
        
             if (window.XMLHttpRequest)
                  {// code for IE7+, Firefox, Chrome, Opera, Safari
                  xmlhttp=new XMLHttpRequest();
                  }
                else
                  {// code for IE6, IE5
                  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                  }        
               
        if (getyear===""){ 
               swal({
                         title: 'Not Allowed!',
                         text:  'You must fill year to search',
                         icon: 'error',
                        buttons: {
                            confirm : {text:'Ok',className:'sweet-orange'}
                          
                        },
                        closeOnClickOutside: false
                       });

            }else{
                   xmlhttp.open("GET","staff_debtor_year.php?year="+getyear+"&evaluation1="+evaluation1+"&carry_group="+carry_group,true);
                                 xmlhttp.send();                
                                 xmlhttp.onreadystatechange = function(){                                   
                      if(xmlhttp.readyState ===4 && xmlhttp.status===200) {
                 document.getElementById("dispay_db").innerHTML = xmlhttp.responseText;;
                         
                          }
                        };
                    
               }          
              
                          
                    });  
        
        
        
        
        
        
        
        
        
        
        
        
        
        
         ////////////////////SELECT TIME YEAR////////////////////////////////////////
        var group_na = $("#group_na"); //THIS IS TO DISPLAY SELECTED CLASS   
    $(group_na).click(function(e){ //THIS IS TO DISPLAY SELECTED CLASS
        e.preventDefault();

        var group_name = document.getElementById('group_name').value;
        document.getElementById('carry_group').value = document.getElementById('group_name').value;
             if (window.XMLHttpRequest)
                  {// code for IE7+, Firefox, Chrome, Opera, Safari
                  xmlhttp=new XMLHttpRequest();
                  }
                else
                  {// code for IE6, IE5
                  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                  }        
               
        if (group_name===""){ 
             swal({
                         title: 'Not Allowed!',
                         text:  'You must search for group name to first',
                         icon: 'error',
                        buttons: {
                            confirm : {text:'Ok',className:'sweet-orange'}
                          
                        },
                        closeOnClickOutside: false
                       });

               
            }else{
                   xmlhttp.open("GET","staff_group_name_display.php?group="+group_name,true);
                                 xmlhttp.send();                
                                 xmlhttp.onreadystatechange = function(){                                   
                      if(xmlhttp.readyState ===4 && xmlhttp.status===200) {
                       var check =  xmlhttp.responseText;
                          if(check === "Not Available"){
                               swal({
                         title: 'Not Allowed!',
                         text:  'Wrong Group name inserted',
                         icon: 'error',
                        buttons: {
                            confirm : {text:'Ok',className:'sweet-orange'}
                          
                        },
                        closeOnClickOutside: false
                       });

                    
                          } else {
                 document.getElementById("dispay_db").innerHTML = xmlhttp.responseText;;
                             }
                          }
                        };
                    
               }          
              
                          
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
              window.location = "staff_debtors.php";
            });
        });
          </script>   
          
          
          
          <script>
             function goBack() {
                 window.location = "staff_home.php";
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
//        ==========================================================================
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
           
        })
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
    </div>

  
   <script>
     /////REMOVE nav2 for table     
       var size = window.innerWidth; 

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
    
    
    
    
   
    
    
</body>

</html>
    </body>
</html>
