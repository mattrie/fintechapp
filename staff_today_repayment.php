<?php
session_start();
if(empty($_SESSION['name_id_staff'])){
//         echo "<script>alert('You must first login');</script>";
          echo "<script>alert('You must first login');
         window.location = 'staff_login.php';</script>";
 }
     include 'connection.php';
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>TODAY'S REPAYMENT</title>
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
                                            <h5 class="m-b-10">TODAY'S REPAYMENT</h5>
                                            <p class="m-b-0">View Payments made</p>
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
        
          
           
           
           
           <!--id="dispay_db"-->
         
       <form action="staff_today_repayment.php" method="POST" enctype="multipart/form-data" >
              
<!--         <div class="input-group mb-3">
             
    <input type="text" class="form-control" id="autocomplete_staff" name="srch" placeholder="Search Staff Name here" required=""   >
    <div class="input-group-append">
      <button class="btn btn-warning" id="btnsearch" name="btnsrch" type="submit">SEARCH</button>  
     </div>
  </div>-->
        </form>
               
               <div class="row">  
                   <div class="col-sm-6">      
                       <form action="staff_today_repayment.php" method="POST" enctype="multipart/form-data" >
             
         <select name="type"  required="">
                    <option value="" disabled selected hidden>select Type</option>
                   <option>Daily</option>
                  <option>Weekly</option>
                  <option>Monthly</option>
                  
               </select>
               
               <br> 
               <button type="submit" name="year_a" style="font-weight: bold; border-radius: 8px; padding:7px; font-style:italic ; font-size: 14px; background-color:green; color: whitesmoke; cursor: pointer; margin-bottom: 10px;">Search Type for Today</button>
               <a style="" class="btn btn-dark" href="staff_today_repayment.php">View All</a> <br>
                        
      
             </form>
               </div>
               
                 <div class="col-sm-6">     
                     <!--THIS IS TO BACK DATE-->
                <form action="staff_today_repayment.php" method="POST" enctype="multipart/form-data" >
               <input  type="text" name="backd"  placeholder="Back Date Here" onfocus="(this.type='date')" style="width: 150px; border-radius: 5px; " required>
      
               <br> 
               <button type="submit" name="bd" style="font-weight: bold; border-radius: 8px; padding:7px; font-style:italic ; font-size: 14px; background-color: #003333; color: whitesmoke; cursor: pointer; margin-bottom: 10px;">View Past Posting</button>
               
             </form>
                     </div>
                   </div> 
             
              <?php
           $staff_name  = $_SESSION['staff_full_name'];  
           echo "<b>$staff_name</b>";     
                
    if(isset($_POST['bd'])){ 
                $backd = $_POST['backd'];
          $staff_name  = $_SESSION['staff_full_name'];
                 $output_date = date('jS F Y', strtotime($backd));
                      
               if($staff_name != ""){
                      
                      
                      
                        $inc=1;
                  $result = mysqli_query($connect, "SELECT * FROM allloan WHERE date = '$output_date'  AND collector = '$staff_name'  AND (remarks = 'loan repayment' OR remarks = 'Penalty Paid' OR remarks = 'Reversal Entry' OR remarks = 'mistakenly paid')  ORDER BY  timestamp ASC");
       $result1 = mysqli_query($connect, "SELECT * FROM weekly_allloan WHERE date = '$output_date'  AND collector = '$staff_name'  AND (remarks = 'loan repayment' OR remarks = 'Penalty Paid' OR remarks = 'Reversal Entry' OR remarks = 'mistakenly paid')  ORDER BY  timestamp ASC");
      $result15 = mysqli_query($connect, "SELECT * FROM monthly_allloan WHERE date = '$output_date'  AND collector = '$staff_name'  AND (remarks = 'loan repayment' OR remarks = 'Penalty Paid' OR remarks = 'Reversal Entry' OR remarks = 'mistakenly paid')  ORDER BY  timestamp ASC");
     
       echo ' <div class="card card-block table-border-style">'; 
     
     echo     '<div class="table-responsive">';            
     echo '<CAPTION><h3 align="center" style="font-size:22px; color: black;">Money Collected On: '.$output_date.'</h3></CAPTION>';
     echo '<table class="table table-bordered table-striped " align="center">';
      
       echo ' <thead class="thead-dark">';
        
         echo '<tr align = "center">';
         echo '<th>S/N</th>';
         echo '<th>Name (Payer)</th>';
          echo '<th>Type</th>';
           echo '<th>Collected by</th>';
         echo '<th>Time Posted</th>';
           echo '<th>Repayment</th>';
         echo '<th>District</th>';
          echo '</tr>';  
           echo '</thead>';

    echo '<tbody class="" style="font-family: sans-serif; color:black ; font-weight:bold;">';
     while ($row=mysqli_fetch_array($result)){

       
         
            echo "<tr align = 'center'>";
            echo "<td>" . $inc."</td>";
            echo "<td>" . $row['name']."</td>";
            echo "<td>Daily</td>";
           echo "<td>" . $row['collector']."</td>"; 
            echo "<td>" . $row['timestamp']."</td>";
           $collect = $row['repay'] + $row['interest_pay'];
            echo "<td>" .number_format($row['repay'])."</td>"; 
            echo "<td>" . $row['district']."</td>";
              echo "</tr>";
           $inc++;
            }
            
            
      while ($row=mysqli_fetch_array($result1)){

         
            echo "<tr align = 'center'>";
            echo "<td>" . $inc."</td>";
            echo "<td>" . $row['name']."</td>";
            echo "<td>Weekly</td>";
            echo "<td>" . $row['collector']."</td>"; 
            echo "<td>" . $row['timestamp']."</td>";
             $collect = $row['repay'] + $row['savings'];
            echo "<td>" . number_format($collect)."</td>"; 

            echo "<td>" . $row['district']."</td>";
              echo "</tr>";
           $inc++;
            }      
            
            
            
            
            
              while ($row=mysqli_fetch_array($result15)){

         
            echo "<tr align = 'center'>";
            echo "<td>" . $inc."</td>";
            echo "<td>" . $row['name']."</td>";
            echo "<td>Monthly</td>";
            echo "<td>" . $row['collector']."</td>"; 
            echo "<td>" . $row['timestamp']."</td>";
           
            echo "<td>" .number_format($row['repay'])."</td>"; 

            echo "<td>" . $row['district']."</td>";
              echo "</tr>";
           $inc++;
            }      
     
       ////////////THIS IS TO SUM DAILY
                        $total_repay = mysqli_query($connect, "SELECT SUM(repay) as total FROM allloan WHERE date='$output_date' AND collector = '$staff_name'  AND (remarks = 'loan repayment' OR remarks = 'Penalty Paid' OR remarks = 'Reversal Entry' OR remarks = 'mistakenly paid') ");      
                          while  ($row = mysqli_fetch_array($total_repay)){
                          $summation_daily = $row['total'];                          
                          }
         
          ////////////THIS IS TO DAILY INTEREST
                        $total_repay1 = mysqli_query($connect, "SELECT SUM(interest_pay) as total FROM allloan WHERE date='$output_date'  AND collector = '$staff_name'  AND (remarks = 'loan repayment' OR remarks = 'Penalty Paid' OR remarks = 'Reversal Entry' OR remarks = 'mistakenly paid')");      
                          while  ($row = mysqli_fetch_array($total_repay1)){
                          $summation_daily_int = $row['total'];                          
                          }     
                               
                          
               ////////////THIS IS TO SUM DAILY
                        $total_weekly = mysqli_query($connect, "SELECT SUM(repay) as total FROM weekly_allloan WHERE date='$output_date' AND collector = '$staff_name'  AND (remarks = 'loan repayment' OR remarks = 'Penalty Paid' OR remarks = 'Reversal Entry' OR remarks = 'mistakenly paid') ");      
                          while  ($row = mysqli_fetch_array($total_weekly)){
                          $summation_weekly = $row['total'];                          
                          }
             
           ////////////THIS IS TO WEEKLY SAVINGS
                        $total_repay2 = mysqli_query($connect, "SELECT SUM(savings) as total FROM weekly_allloan WHERE date='$output_date' AND collector = '$staff_name'  AND (remarks = 'loan repayment' OR remarks = 'Penalty Paid' OR remarks = 'Reversal Entry' OR remarks = 'mistakenly paid') ");      
                          while  ($row = mysqli_fetch_array($total_repay2)){
                          $summation_weekly_save = $row['total'];                          
                          }   
                          
                          
        ////////////THIS IS TO SUM MONTHLY PAY
                    
                 $total_repay222 = mysqli_query($connect, "SELECT SUM(repay) as total, SUM(interest) as totalx FROM monthly_allloan WHERE date='$output_date' AND collector = '$staff_name'  AND (remarks = 'loan repayment' OR remarks = 'Penalty Paid' OR remarks = 'Reversal Entry' OR remarks = 'mistakenly paid') ");      
                          while  ($row = mysqli_fetch_array($total_repay222)){
                          $summation_repay_monthly = $row['total'];
                          $summation_interest_monthly = $row['totalx'];                          
                          }
                  
                            
      $summation = $summation_daily + $summation_weekly  + $summation_weekly_save + $summation_repay_monthly;
                  
                    echo "<tr align = 'center'>";
            echo "<td>--------</td>";
            echo "<td>--------</td>";
             echo "<td>--------</td>";
            echo "<td>--------</td>"; 
            echo "<td align = 'right'>TOTAL:</td>";
            echo "<td style='color: green; font-size: 20px;'>".number_format($summation)."</td>";  
            echo "<td>--------</td>";
              echo "</tr>";
               
            
            
            echo ' </tbody>';
          echo ' </table>';
     
           echo '</div>' ;
            echo '</div>' ;       
            
           
//    ---------------------------------------------------------------------------------------------  
        
                    }
            
            
            
            
            
            
            
                          } elseif(isset($_POST['type'])){ 
           //THIS IS TO SEARCH DAILY                        
        $type = $_POST['type'];  
        
        if($type == "Daily"){
            $date = date("jS F Y");
            //loop through all table rows
            $inc=1;
           
     $result = mysqli_query($connect, "SELECT * FROM allloan WHERE date = '$date'  AND collector = '$staff_name'  AND (remarks = 'loan repayment' OR remarks = 'Penalty Paid' OR remarks = 'Reversal Entry' OR remarks = 'mistakenly paid')  ORDER BY  timestamp ASC");
        echo ' <div class="card card-block table-border-style">'; 
     
     echo     '<div class="table-responsive-sm text-nowrap">';            
     echo '<CAPTION><h3 align="center" style="font-size:22px; color: black;">MONEY REPAYED TODAY: '.$date.' (DAILY)</h3></CAPTION>';
     echo '<table class="table table-bordered table-striped" align="center">';
      
       echo ' <thead class="thead-dark">';
        
         echo '<tr align = "center">';
         echo '<th>S/N</th>';
         echo '<th>Name (Payer)</th>';
          echo '<th>Type</th>';
           echo '<th>Collected by</th>';
         echo '<th>Time Posted</th>';
           echo '<th>Repayment</th>';
         echo '<th>District</th>';
          echo '</tr>';  
           echo '</thead>';

      echo '<tbody class="" style="font-family: sans-serif; color:black ; font-weight:bold;">';
     while ($row=mysqli_fetch_array($result)){
            echo "<tr align = 'center'>";
            echo "<td>" . $inc."</td>";
            echo "<td>" . $row['name']."</td>";
            echo "<td>Daily</td>";
           echo "<td>" . $row['collector']."</td>"; 
            echo "<td>" . $row['timestamp']."</td>";
            $collect = $row['repay'] + $row['interest_pay'];
            echo "<td>" .number_format($row['repay'])."</td>"; 

            echo "<td>" . $row['district']."</td>";
              echo "</tr>";
           $inc++;
            }
   
            
            
                ////////////THIS IS TO SUM DAILY
                        $total_repay = mysqli_query($connect, "SELECT SUM(repay) as total FROM allloan WHERE date = '$date' AND collector = '$staff_name'  AND (remarks = 'loan repayment' OR remarks = 'Penalty Paid' OR remarks = 'Reversal Entry' OR remarks = 'mistakenly paid') ");      
                          while  ($row = mysqli_fetch_array($total_repay)){
                          $summation_daily = $row['total'];                          
                          }
               
                        ////////////THIS IS TO DAILY INTEREST
                        $total_repay1 = mysqli_query($connect, "SELECT SUM(interest_pay) as total FROM allloan WHERE date='$date' AND collector = '$staff_name'  AND (remarks = 'loan repayment' OR remarks = 'Penalty Paid' OR remarks = 'Reversal Entry' OR remarks = 'mistakenly paid') ");      
                          while  ($row = mysqli_fetch_array($total_repay1)){
                          $summation_daily_int = $row['total'];                          
                          }     
              
                       $summation_daily = $summation_daily ;
                       
                    echo "<tr align = 'center'>";
            echo "<td>--------</td>";
            echo "<td>--------</td>";
             echo "<td>--------</td>";
              echo "<td>--------</td>";
            echo "<td align = 'right'>TOTAL: </td>";
            echo "<td style='color: green; font-size: 20px;'>".number_format($summation_daily)."</td>";  
            echo "<td>--------</td>";
              echo "</tr>";
                          
                    
            
            
            
            
            echo ' </tbody>';
          echo ' </table>';
     
           echo '</div>' ;
            echo '</div>' ;  
        
            
            
            
            
            
            
        }elseif($type == "Monthly"){     
                  $date = date("jS F Y");
            //loop through all table rows
            $inc=1;
           
     $result = mysqli_query($connect, "SELECT * FROM monthly_allloan WHERE date = '$date'  AND collector = '$staff_name'  AND (remarks = 'loan repayment' OR remarks = 'Penalty Paid' OR remarks = 'Reversal Entry' OR remarks = 'mistakenly paid')  ORDER BY  timestamp ASC");
        echo ' <div class="card card-block table-border-style">'; 
     
     echo     '<div class="table-responsive-sm text-nowrap">';            
     echo '<CAPTION><h3 align="center" style="font-size:22px; color: black;">MONEY REPAYED TODAY: '.$date.' (MONTHLY)</h3></CAPTION>';
     echo '<table class="table table-bordered table-striped " align="center">';
      
       echo ' <thead class="thead-dark">';
        
         echo '<tr align = "center">';
         echo '<th>S/N</th>';
         echo '<th>Name (Payer)</th>';
          echo '<th>Type</th>';
           echo '<th>Collected by</th>';
         echo '<th>Time Posted</th>';
           echo '<th>Repayment</th>';
         echo '<th>District</th>';
          echo '</tr>';  
           echo '</thead>';

      echo '<tbody class="" style="font-family: sans-serif; color:black ; font-weight:bold;">';
     while ($row=mysqli_fetch_array($result)){
            echo "<tr align = 'center'>";
            echo "<td>" . $inc."</td>";
            echo "<td>" . $row['name']."</td>";
            echo "<td>Monthly</td>";
           echo "<td>" . $row['collector']."</td>"; 
            echo "<td>" . $row['timestamp']."</td>";
          
            echo "<td>" .number_format($row['repay'])."</td>"; 

            echo "<td>" . $row['district']."</td>";
              echo "</tr>";
           $inc++;
            }
   
            
            
               
                          
                          
               ////////////THIS IS TO SUM MONTHLY PAY
                        $total_repay222 = mysqli_query($connect, "SELECT SUM(repay) as total, SUM(interest) as totalx FROM monthly_allloan WHERE date='$date' AND collector = '$staff_name'  AND (remarks = 'loan repayment' OR remarks = 'Penalty Paid' OR remarks = 'Reversal Entry' OR remarks = 'mistakenly paid') ");      
                          while  ($row = mysqli_fetch_array($total_repay222)){
                          $summation_repay_monthly = $row['total'];
                          $summation_interest_monthly = $row['totalx'];                          
                          }
           
              
                      
                       
                    echo "<tr align = 'center'>";
            echo "<td>--------</td>";
            echo "<td>--------</td>";
             echo "<td>--------</td>";
              echo "<td>--------</td>";
            echo "<td align = 'right'>TOTAL: </td>";
            echo "<td style='color: green; font-size: 20px;'>".number_format($summation_repay_monthly)."</td>";  
            echo "<td>--------</td>";
              echo "</tr>";
                          
                    
            
            
            
            
            echo ' </tbody>';
          echo ' </table>';
     
           echo '</div>' ;
            echo '</div>' ;  
            
                     } else {
              $date = date("jS F Y");
            //THIS IS TO SEARCH WEEKLY  
            $inc=1;
           
     $result1 = mysqli_query($connect, "SELECT * FROM weekly_allloan WHERE date = '$date'  AND collector = '$staff_name'  AND (remarks = 'loan repayment' OR remarks = 'Penalty Paid' OR remarks = 'Reversal Entry' OR remarks = 'mistakenly paid')  ORDER BY  timestamp ASC");
     
      echo ' <div class="card card-block table-border-style">'; 
     
     echo     '<div class="table-responsive-sm text-nowrap">';            
     echo '<CAPTION><h3 align="center" style="font-size:22px; color: black;">MONEY REPAYED TODAY: '.$date.' (WEEKLY)</h3></CAPTION>';
     echo '<table class="table table-bordered table-striped " align="center">';
      
       echo ' <thead class="thead-dark">';
        
         echo '<tr align = "center">';
         echo '<th>S/N</th>';
         echo '<th>Name (Payer)</th>';
          echo '<th>Type</th>';
           echo '<th>Collected by</th>';
         echo '<th>Time Posted</th>';
           echo '<th>Repayment</th>';
         echo '<th>District</th>';
          echo '</tr>';  
           echo '</thead>';

      echo '<tbody class="" style="font-family: sans-serif; color:black ; font-weight:bold;">';
           
      while ($row=mysqli_fetch_array($result1)){

         
            echo "<tr align = 'center'>";
            echo "<td>" . $inc."</td>";
            echo "<td>" . $row['name']."</td>";
            echo "<td>Weekly</td>";
            echo "<td>" . $row['collector']."</td>"; 
            echo "<td>" . $row['timestamp']."</td>";
              $collect = $row['repay'] + $row['savings'];
            echo "<td>" . number_format($collect)."</td>"; 
            echo "<td>" . $row['district']."</td>";
              echo "</tr>";
           $inc++;
            }  
            
            
            
          
               
               ////////////THIS IS TO SUM WEEKLY
                        $total_weekly = mysqli_query($connect, "SELECT SUM(repay) as total FROM weekly_allloan WHERE date='$date' AND collector = '$staff_name'  AND (remarks = 'loan repayment' OR remarks = 'Penalty Paid' OR remarks = 'Reversal Entry' OR remarks = 'mistakenly paid') ");      
                          while  ($row = mysqli_fetch_array($total_weekly)){
                          $summation_weekly = $row['total'];                          
                          }
                            
                   ////////////THIS IS TO WEEKLY SAVINGS
                        $total_repay2 = mysqli_query($connect, "SELECT SUM(savings) as total FROM weekly_allloan WHERE date='$date' AND collector = '$staff_name'  AND (remarks = 'loan repayment' OR remarks = 'Penalty Paid' OR remarks = 'Reversal Entry' OR remarks = 'mistakenly paid') ");      
                          while  ($row = mysqli_fetch_array($total_repay2)){
                          $summation_weekly_save = $row['total'];                          
                          }  
                          
                     $summation =  $summation_weekly + $summation_weekly_save;     
                  
                    echo "<tr align = 'center'>";
            echo "<td>--------</td>";
            echo "<td>--------</td>";
             echo "<td>--------</td>";
              echo "<td>--------</td>";
            echo "<td align = 'right'>TOTAL: </td>";
            echo "<td style='color: green; font-size: 20px;'>".number_format($summation)."</td>";  
            echo "<td>--------</td>";
              echo "</tr>";
                          
                    
            
            
            
            
            echo ' </tbody>';
          echo ' </table>';
     
           echo '</div>' ;
            echo '</div>' ;  
        
        }
        
    
        
        
        
      
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
        
   //    ---------------------------------------------------------------------------------------------     
        
    } else {
        
            $date = date("jS F Y");
            // //THIS IS TO VIEW ALL!!!!!!!!!!!!!!!!!!!!!!!!!!!!1 
            $inc=1;
           
     $result = mysqli_query($connect, "SELECT * FROM allloan WHERE date = '$date'  AND collector = '$staff_name'  AND (remarks = 'loan repayment' OR remarks = 'Penalty Paid' OR remarks = 'Reversal Entry' OR remarks = 'mistakenly paid')  ORDER BY  timestamp ASC");
     $result1 = mysqli_query($connect, "SELECT * FROM weekly_allloan WHERE date = '$date'  AND collector = '$staff_name'  AND (remarks = 'loan repayment' OR remarks = 'Penalty Paid' OR remarks = 'Reversal Entry' OR remarks = 'mistakenly paid')  ORDER BY  timestamp ASC");
     $result12 = mysqli_query($connect, "SELECT * FROM monthly_allloan WHERE date = '$date'  AND collector = '$staff_name'  AND (remarks = 'loan repayment' OR remarks = 'Penalty Paid' OR remarks = 'Reversal Entry' OR remarks = 'mistakenly paid')  ORDER BY  timestamp ASC");
     
      echo ' <div class="card card-block table-border-style">'; 
     
     echo     '<div class="table-responsive-sm text-nowrap">';            
     echo '<CAPTION><h3 align="center" style="font-size:22px; color: black;">MONEY REPAYED TODAY: '.$date.'</h3></CAPTION>';
     echo '<table class="table table-bordered table-striped " align="center">';
      
       echo ' <thead class="thead-dark">';
        
         echo '<tr align = "center">';
         echo '<th>S/N</th>';
         echo '<th>Name (Payer)</th>';
          echo '<th>Type</th>';
           echo '<th>Collected by</th>';
         echo '<th>Time Posted</th>';
           echo '<th>Repayment</th>';
         echo '<th>District</th>';
          echo '</tr>';  
           echo '</thead>';

      echo '<tbody class="" style="font-family: sans-serif; color:black ; font-weight:bold;">';
     while ($row=mysqli_fetch_array($result)){

       
         
            echo "<tr align = 'center'>";
            echo "<td>" . $inc."</td>";
            echo "<td>" . $row['name']."</td>";
            echo "<td>Daily</td>";
           echo "<td>" . $row['collector']."</td>"; 
            echo "<td>" . $row['timestamp']."</td>";
            $collect = $row['repay'] + $row['interest_pay'];
            echo "<td>" .number_format($row['repay'])."</td>"; 
            echo "<td>" . $row['district']."</td>";
              echo "</tr>";
           $inc++;
            }
            
            
      while ($row=mysqli_fetch_array($result1)){

         
            echo "<tr align = 'center'>";
            echo "<td>" . $inc."</td>";
            echo "<td>" . $row['name']."</td>";
            echo "<td>Weekly</td>";
            echo "<td>" . $row['collector']."</td>"; 
            echo "<td>" . $row['timestamp']."</td>";
           $collect = $row['repay'] + $row['savings'];
            echo "<td>" . number_format($collect)."</td>"; 
          
            echo "<td>" . $row['district']."</td>";
              echo "</tr>";
           $inc++;
            }  
            
            
            
            
              while ($row=mysqli_fetch_array($result12)){

         
            echo "<tr align = 'center'>";
            echo "<td>" . $inc."</td>";
            echo "<td>" . $row['name']."</td>";
            echo "<td>Monthly</td>";
            echo "<td>" . $row['collector']."</td>"; 
            echo "<td>" . $row['timestamp']."</td>";
          
            echo "<td>" . number_format($row['repay'])."</td>"; 
          
            echo "<td>" . $row['district']."</td>";
              echo "</tr>";
           $inc++;
            }  
            
            
            
                ////////////THIS IS TO SUM DAILY
                        $total_repay = mysqli_query($connect, "SELECT SUM(repay) as total FROM allloan WHERE date='$date' AND collector = '$staff_name'  AND (remarks = 'loan repayment' OR remarks = 'Penalty Paid' OR remarks = 'Reversal Entry' OR remarks = 'mistakenly paid') ");      
                          while  ($row = mysqli_fetch_array($total_repay)){
                          $summation_daily = $row['total'];                          
                          }
               
               ////////////THIS IS TO DAILY INTEREST
                        $total_repay1 = mysqli_query($connect, "SELECT SUM(interest_pay) as total FROM allloan WHERE date='$date' AND collector = '$staff_name'  AND (remarks = 'loan repayment' OR remarks = 'Penalty Paid' OR remarks = 'Reversal Entry' OR remarks = 'mistakenly paid') ");      
                          while  ($row = mysqli_fetch_array($total_repay1)){
                          $summation_daily_int = $row['total'];                          
                          }     
                            
                          
               ////////////THIS IS TO SUM WEEKLY
                        $total_weekly = mysqli_query($connect, "SELECT SUM(repay) as total FROM weekly_allloan WHERE date='$date' AND collector = '$staff_name'  AND (remarks = 'loan repayment' OR remarks = 'Penalty Paid' OR remarks = 'Reversal Entry' OR remarks = 'mistakenly paid') ");      
                          while  ($row = mysqli_fetch_array($total_weekly)){
                          $summation_weekly = $row['total'];                          
                          }
                          
                     ////////////THIS IS TO WEEKLY SAVINGS
                        $total_repay2 = mysqli_query($connect, "SELECT SUM(savings) as total FROM weekly_allloan WHERE date='$date' AND collector = '$staff_name'  AND (remarks = 'loan repayment' OR remarks = 'Penalty Paid' OR remarks = 'Reversal Entry' OR remarks = 'mistakenly paid') ");      
                          while  ($row = mysqli_fetch_array($total_repay2)){
                          $summation_weekly_save = $row['total'];                          
                          }          
                       
                          
                          
                          ////////////THIS IS TO SUM MONTHLY PAY
                    
                        $total_repay222 = mysqli_query($connect, "SELECT SUM(repay) as total, SUM(interest) as totalx FROM monthly_allloan WHERE date='$date' AND collector = '$staff_name'  AND (remarks = 'loan repayment' OR remarks = 'Penalty Paid' OR remarks = 'Reversal Entry' OR remarks = 'mistakenly paid') ");      
                          while  ($row = mysqli_fetch_array($total_repay222)){
                          $summation_repay_monthly = $row['total'];
                          $summation_interest_monthly = $row['totalx'];                          
                          }
                          
                    $summation = $summation_daily + $summation_weekly  + $summation_weekly_save + $summation_repay_monthly;
                  
                    echo "<tr align = 'center'>";
            echo "<td>--------</td>";
            echo "<td>--------</td>";
             echo "<td>--------</td>";
              echo "<td>--------</td>";
            echo "<td align = 'right'>TOTAL: </td>";
            echo "<td style='color: green; font-size: 20px;'>".number_format($summation)."</td>";  
            echo "<td>--------</td>";
              echo "</tr>";
                          
                    
            
            
            
            
            echo ' </tbody>';
          echo ' </table>';
     
           echo '</div>' ;
            echo '</div>' ;
            
            
      }      
            ?>
     
        
       
        
       
       
       
           <div class="col" style="margin-top:80px; margin-left: 20px; " >
          <!--SHOW ALL-->
<!--         <button class="show_all" style="border-radius: 8px; padding:8px; font-style:italic ; font-size: 18px; background-color:green; color: whitesmoke; cursor: pointer">VIEW ALL</button>
        
           SELECT CLASS
           <form action="student_db.php" method="POST" enctype="multipart/form-data">
           
               <input type="text" required="true" class="class_d"  id="cla" placeholder="select district" style="margin-top:20px; margin-bottom:20px; width:40%; border-radius: 8px;  height:28px; font-size: 15px; padding: 7px;"/> 
               <button  name="get_class" class="select_class" style="font-weight: bold; border-radius: 8px; padding:7px; font-style:italic ; font-size: 18px; background-color:green; color: whitesmoke; cursor: pointer">GO</button>
            </form>
        
           
            PRINT
        <button class="print_me" style=" border-radius: 4px; font-size: 16px; background-color: white; color: green; cursor: pointer">Print>></button>
        </div>  -->
        
       </div> 
      
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
                      if(xmlhttp.readyState ==4 && xmlhttp.status==200) {
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
                      if(xmlhttp.readyState ==4 && xmlhttp.status==200) {
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
            $(document).ready(function() {     
//          var check_duplicate = $("#check_duplicate");    
         $("#pin").click(function(){
            var g_n = document.getElementById('group_name').value;
            if(g_n === ""){
               alert('You need to search for group first'); 
            } else {
        document.getElementById('group_pass').value = Math.floor(Math.random() * 1000000);
                   } 
               });
               });     
   
           </script>
        
        <script>
             function goBack() {
                 window.location = "admin_home.php";
             }
          </script>
          
           <!--THIS IS TO RE-LOAD THE ENTIRE STUDENT-->
          <script>
         $(document).ready(function() {
               var show_all = $(".show_all"); //LINK TO GO AND VIEW ALL DEBTORS   
    $(show_all).click(function(e){ //Function LINK TO GO AND VIEW ALL DEBTORS button click
        e.preventDefault();
              window.location = "staff_request_reversal.php";
            });
        });
          </script>   
          
          <!-- Script -->
    <script type='text/javascript'>
    $( function() {
  
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
        
       });  
       
       
       
       
       
       $(document).ready(function(){
            ////////////////////SELECT TIME YEAR////////////////////////////////////////
        var group_na = $("#group_name"); //THIS IS TO DISPLAY SELECTED CLASS   
    $(group_na).change(function(e){ //THIS IS TO DISPLAY SELECTED CLASS
        e.preventDefault();
//            alert('WORKING');
        var group_name = document.getElementById('group_name').value;
        
             if (window.XMLHttpRequest)
                  {// code for IE7+, Firefox, Chrome, Opera, Safari
                  xmlhttp=new XMLHttpRequest();
                  }
                else
                  {// code for IE6, IE5
                  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                  }        
               
       
                   xmlhttp.open("GET","group_edit_search.php?group="+group_name,true);
                                 xmlhttp.send();                
                                 xmlhttp.onreadystatechange = function(){                                   
                      if(xmlhttp.readyState ===4 && xmlhttp.status===200) {
                      
                        
            document.getElementById("group_pass").value = xmlhttp.responseText;;
                             
                          }
                        };
                    
                      
              
                          
                    });
       });
       
       
        </script>       
    
   
    
    
</body>

</html>








