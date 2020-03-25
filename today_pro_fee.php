<?php
session_start();
    include 'connection.php';
   if(isset($_POST['view_al22']) && $_POST['work'] == ""){
    
     echo  "<script> location.href = 'today_pro_fee.php'; </script>";  
   }  
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>TODAY'S PROCESSING FEE</title>
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
                                            <h5 class="m-b-10">Today's Processing Fees</h5>
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
   
           
           
           
           
           <!--id="dispay_db"-->
         
<!--       <form action="today_repayment.php" method="POST" enctype="multipart/form-data">
              
         <div class="input-group mb-3">
             
    <input type="text" class="form-control" id="autocomplete_staff" name="srch" placeholder="Search Staff Name here" required=""   >
    <div class="input-group-append">
      <button class="btn btn-warning" id="btnsearch" name="btnsrch" type="submit">SEARCH</button>  
     </div>
  </div>
        </form>-->
           <br>    
                 <div class="row">  
                   <div class="col-sm-8">   
                     
     <form action="today_pro_fee.php" method="POST" enctype="multipart/form-data" style="width: 600px;">
          <input list="browsers" name="branch" autocomplete="off" placeholder="Select Branch">
                            <datalist id="browsers">
                                        <?php
                                     $sql_all_names = mysqli_query($connect, "SELECT * FROM branch");      
                                        while ($row = mysqli_fetch_assoc($sql_all_names)){?>        
                              <option value="<?php echo $id = $row['name'];?>">
                                      
                                     <?php }    ?>  
                            </datalist><br><br>
            Start Date: &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;  
         End Date:<br> 
         <input type="date" name="start" id="start" value=""/>  <input type="date" name="end" id="end" value=""/>   
         
         <br><br> 
         <select name="type" id="type">
                    <option value="" disabled selected hidden>select Type</option>
                   <option>Daily</option>
                  <option>Weekly</option>
                  <option>Monthly</option>
                  
               </select>
         <input type="hidden" id="work" name="work">
               <br> 
                 <div class="input-group">       
               <button type="submit" name="year_a" id="date_sorting" style="font-weight: bold; border-radius: 8px; padding:7px; font-style:italic ; font-size: 14px; background-color:green; color: whitesmoke; cursor: pointer; margin-bottom: 10px;">Search Type</button>
         &nbsp; &nbsp; <input type="submit" value="View All" id="date_sorting2" name="view_al22"  class="btn btn-dark"/>   
         
                   </div>          
      
             </form>
               
<!--            <form name="view_all" action="today_pro_fee.php" method="POST" enctype="multipart/form-data">
                
                &nbsp; &nbsp;  <input type="submit" value="View All" id="date_sorting2" name="view_al22"  class="btn btn-dark"/>   
            </form>           -->
                        
               </div>
                   
                   
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
                           
                      } else  if(type === ""){
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
                      }
                      
                       else  if(start !== "" && end !== ""){
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
                           alert('Please select End Date');
                           return false;
                      } else if(end !== "" && start === ""){
                          alert('Please select Start Date');
                           return false;
                      } else  if(start !== "" && end !== ""){
                          document.getElementById('work').value = "22"; 
                          return true; 
                      }
                         
                      
                      
                      
                     
                     
                 });    
                });
            </script>   
            
            
            
          
            
            
            
            
                 <div class="col-sm-4">     
                     <!--THIS IS TO BACK DATE-->
                <form action="today_pro_fee.php" method="POST" enctype="multipart/form-data" style="width: 600px;">
               <input  type="text" name="backd"  placeholder="Back Date Here" onfocus="(this.type='date')" style="width: 150px; border-radius: 5px; " required>
      
               <br> 
               <button type="submit" name="bd" style="font-weight: bold; border-radius: 8px; padding:7px; font-style:italic ; font-size: 14px; background-color: #003333; color: whitesmoke; cursor: pointer; margin-bottom: 10px;">View Past Posting</button>
               
             </form>
                     </div>
                   </div>  
                <?php
            
    if(isset($_POST['btnsrch'])){
          $date = date("jS F Y");
            //THIS IS TO SEARCH STAFF NAME
            $inc=1;
        $staff_name = $_POST['srch'];
        $_SESSION['staff_name'] = $staff_name;
           
     $result = mysqli_query($connect, "SELECT * FROM revenuexp WHERE date = '$date' AND (category = 'pro_fee_daily' OR category = 'pro_fee_weekly' OR category = 'pro_fee_monthly') AND collector = '$staff_name' ORDER BY  timestamp ASC");
     
    echo ' <div class="card card-block table-border-style">';       
     echo     '<div class="table-responsive">';            
     echo '<CAPTION><h3 align="center" style="font-size:22px; color: black;">PROCESSING FEE: '.$date.'</h3></CAPTION>';
     echo '<table class="table table-bordered table-striped  align="center">';
      
       echo ' <thead class="thead-dark">';
        
         echo '<tr align = "center">';
         echo '<th>S/N</th>';
         echo '<th>Description</th>';
         echo '<th>Collector</th>';
           echo '<th>Processing Fees</th>';
         echo '<th>Time</th>';
          echo '</tr>';  
           echo '</thead>';

      echo '<tbody class="" style="font-family: sans-serif; color:black ; font-weight:bold;">';
     while ($row=mysqli_fetch_array($result)){

       
         
            echo "<tr align = 'center'>";
            echo "<td>" . $inc."</td>";
            echo "<td>" . $row['remaks']."</td>";
         
           echo "<td>" . $row['collector']."</td>"; 
              echo "<td>" . number_format($row['revenue'])."</td>";
            echo "<td>" .substr($row['timestamp'], 0, 5)."</td>";
           
              echo "</tr>";
           $inc++;
            }
            
        
            
            
            
                ////////////THIS IS TO SUM DAILY
                        $total_repay = mysqli_query($connect, "SELECT SUM(revenue) as total FROM revenuexp WHERE date='$date' AND (category = 'pro_fee_daily' OR category = 'pro_fee_weekly' OR category = 'pro_fee_monthly')");      
                          while  ($row = mysqli_fetch_array($total_repay)){
                          $summation_pro_fees = $row['total'];                          
                          }
               
            
                          
                    $summation = $summation_pro_fees;
                  
                    echo "<tr align = 'center'>";
            echo "<td>--------</td>";
            echo "<td>--------</td>";
         
             
            echo "<td align = 'right'>TOTAL: </td>";
            echo "<td style='color: green; font-size: 20px;'>".number_format($summation)."</td>";  
           
              echo "</tr>";
                          
                    
            
            
            
            
            echo ' </tbody>';
          echo ' </table>';
     
           echo '</div>' ;
            echo '</div>' ;
            
            
//    ---------------------------------------------------------------------------------------------  
      
   
            
            
            
            
            
//            ///////////////////////////BACK DATE ARENA//////////////////////////
            } elseif(isset($_POST['bd'])){ 
                $backd = $_POST['backd'];
              @$staff_name = $_SESSION['staff_name'];
                 $output_date = date('jS F Y', strtotime($backd));
                      
               if($staff_name == ""){
                     $inc=1;
       $result = mysqli_query($connect, "SELECT * FROM revenuexp WHERE date = '$output_date' AND (category = 'pro_fee_daily' OR category = 'pro_fee_weekly' OR category = 'pro_fee_monthly') ORDER BY  timestamp ASC");
     
   echo ' <div class="card card-block table-border-style">';       
     echo     '<div class="table-responsive">';           
     echo '<CAPTION><h3 align="center" style="font-size:22px; color: black;">PROCESSING FEE: '.$output_date.'</h3></CAPTION>';
     echo '<table class="table table-bordered table-striped  align="center">';
      
       echo ' <thead class="thead-dark">';
        
         echo '<tr align = "center">';
         echo '<th>S/N</th>';
         echo '<th>Description</th>';
         echo '<th>Type</th>';
           echo '<th>Processing Fees</th>';
//         echo '<th>Time</th>';
          echo '</tr>';  
           echo '</thead>';

      echo '<tbody class="" style="font-family: sans-serif; color:black ; font-weight:bold;">';
     while ($row=mysqli_fetch_array($result)){

       
         
            echo "<tr align = 'center'>";
            echo "<td>" . $inc."</td>";
            echo "<td>" . $row['remaks']."</td>";
         
           echo "<td>" . $row['type']."</td>"; 
              echo "<td>" . number_format($row['revenue'])."</td>";
//            echo "<td>" .substr($row['timestamp'], 0, 5)."</td>";
           
              echo "</tr>";
           $inc++;
            }
            
        
            
            
            
                ////////////THIS IS TO SUM DAILY
                        $total_repay = mysqli_query($connect, "SELECT SUM(revenue) as total FROM revenuexp WHERE date='$output_date' AND (category = 'pro_fee_daily' OR category = 'pro_fee_weekly' OR category = 'pro_fee_monthly')");      
                          while  ($row = mysqli_fetch_array($total_repay)){
                          $summation_pro_fees = $row['total'];                          
                          }
               
            
                          
                    $summation = $summation_pro_fees;
                  
                    echo "<tr align = 'center'>";
            echo "<td>--------</td>";
           echo "<td>--------</td>";
         
             
            echo "<td align = 'right'>TOTAL: </td>";
            echo "<td style='color: green; font-size: 20px;'>".number_format($summation)."</td>";  
//                   echo "<td>--------</td>";
              echo "</tr>";
                          
                    
            
            
            
            
            echo ' </tbody>';
          echo ' </table>';
     
           echo '</div>' ;
            echo '</div>' ;
                   
                   
                
                  } else {
                      
                      
                      
                        $inc=1;
                  $result = mysqli_query($connect, "SELECT * FROM allloan WHERE date = '$output_date' AND repay > '1' AND collector = '$staff_name' AND (remarks = 'loan repayment' OR remarks = 'Penalty Paid' OR remarks = 'Reversal Entry' OR remarks = 'mistakenly paid') ORDER BY  timestamp ASC");
       $result1 = mysqli_query($connect, "SELECT * FROM weekly_allloan WHERE date = '$output_date' AND repay > '1' AND collector = '$staff_name' AND (remarks = 'loan repayment' OR remarks = 'Penalty Paid' OR remarks = 'Reversal Entry' OR remarks = 'mistakenly paid') ORDER BY  timestamp ASC");
      $result15 = mysqli_query($connect, "SELECT * FROM monthly_allloan WHERE date = '$output_date' AND repay > '1' AND collector = '$staff_name' AND (remarks = 'loan repayment' OR remarks = 'Penalty Paid' OR remarks = 'Reversal Entry' OR remarks = 'mistakenly paid') ORDER BY  timestamp ASC");
     
     echo ' <div class="card card-block table-border-style">';       
     echo     '<div class="table-responsive">';          
     echo '<CAPTION><h3 align="center" style="font-size:22px; color: black;">Money Collected By '.$staff_name.' On: '.$output_date.'</h3></CAPTION>';
     echo '<table class="table table-bordered table-striped  align="center">';
      
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
            echo "<td>Weekly</td>";
            echo "<td>" . $row['collector']."</td>"; 
            echo "<td>" . $row['timestamp']."</td>";
           
            echo "<td>" .number_format($row['repay'])."</td>"; 

            echo "<td>" . $row['district']."</td>";
              echo "</tr>";
           $inc++;
            }      
     
       ////////////THIS IS TO SUM DAILY
                        $total_repay = mysqli_query($connect, "SELECT SUM(repay) as total FROM allloan WHERE date='$output_date' AND collector = '$staff_name' AND (remarks = 'loan repayment' OR remarks = 'Penalty Paid' OR remarks = 'Reversal Entry' OR remarks = 'mistakenly paid')");      
                          while  ($row = mysqli_fetch_array($total_repay)){
                          $summation_daily = $row['total'];                          
                          }
         
          ////////////THIS IS TO DAILY INTEREST
                        $total_repay1 = mysqli_query($connect, "SELECT SUM(interest_pay) as total FROM allloan WHERE date='$output_date' AND (remarks = 'loan repayment' OR remarks = 'Penalty Paid' OR remarks = 'Reversal Entry' OR remarks = 'mistakenly paid') AND collector = '$staff_name'");      
                          while  ($row = mysqli_fetch_array($total_repay1)){
                          $summation_daily_int = $row['total'];                          
                          }     
                               
                          
               ////////////THIS IS TO SUM DAILY
                        $total_weekly = mysqli_query($connect, "SELECT SUM(repay) as total FROM weekly_allloan WHERE date='$output_date' AND collector = '$staff_name' AND (remarks = 'loan repayment' OR remarks = 'Penalty Paid' OR remarks = 'Reversal Entry' OR remarks = 'mistakenly paid')");      
                          while  ($row = mysqli_fetch_array($total_weekly)){
                          $summation_weekly = $row['total'];                          
                          }
             
           ////////////THIS IS TO WEEKLY SAVINGS
                        $total_repay2 = mysqli_query($connect, "SELECT SUM(savings) as total FROM weekly_allloan WHERE date='$output_date' AND collector = '$staff_name' AND (remarks = 'loan repayment' OR remarks = 'Penalty Paid' OR remarks = 'Reversal Entry' OR remarks = 'mistakenly paid')");      
                          while  ($row = mysqli_fetch_array($total_repay2)){
                          $summation_weekly_save = $row['total'];                          
                          }   
                          
                          
        ////////////THIS IS TO SUM MONTHLY PAY
                    
                 $total_repay222 = mysqli_query($connect, "SELECT SUM(repay) as total, SUM(interest) as totalx FROM monthly_allloan WHERE date='$output_date' AND collector = '$staff_name' AND (remarks = 'loan repayment' OR remarks = 'Penalty Paid' OR remarks = 'Reversal Entry' OR remarks = 'mistakenly paid')");      
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
            
           $_SESSION['staff_name'] = "";
//    ---------------------------------------------------------------------------------------------  
        
                    
            
            
                  }
            
            
            
            
                          } elseif(isset($_POST['type']) && $_POST['work'] == ""){ 
           //THIS IS TO SEARCH DAILY     
//           echo "<script>alert('can see you')</script>";
        $type = $_POST['type'];  
        
        if($type == "Daily"){
            $date = date("jS F Y");
            //loop through all table rows
            $inc=1;
           
        $result = mysqli_query($connect, "SELECT * FROM revenuexp WHERE date = '$date' AND (category = 'pro_fee_daily' OR category = 'pro_fee_weekly' OR category = 'pro_fee_monthly') AND type = 'daily' ORDER BY  timestamp ASC");
     
     echo ' <div class="card card-block table-border-style">';       
     echo     '<div class="table-responsive">';            
     echo '<CAPTION><h3 align="center" style="font-size:22px; color: black;">PROCESSING FEE: [DAILY] '.$date.'</h3></CAPTION>';
     echo '<table class="table table-bordered table-striped  align="center">';
      
       echo ' <thead class="thead-dark">';
        
         echo '<tr align = "center">';
         echo '<th>S/N</th>';
         echo '<th>Description</th>';
         echo '<th>Type</th>';
           echo '<th>Processing Fees</th>';
//         echo '<th>Time</th>';
          echo '</tr>';  
           echo '</thead>';

      echo '<tbody class="" style="font-family: sans-serif; color:black ; font-weight:bold;">';
     while ($row=mysqli_fetch_array($result)){

       
         
            echo "<tr align = 'center'>";
            echo "<td>" . $inc."</td>";
            echo "<td>" . $row['remaks']."</td>";
         
           echo "<td>" . $row['type']."</td>"; 
              echo "<td>" . number_format($row['revenue'])."</td>";
//            echo "<td>" .substr($row['timestamp'], 0, 5)."</td>";
           
              echo "</tr>";
           $inc++;
            }
            
        
            
            
            
                ////////////THIS IS TO SUM DAILY
                        $total_repay = mysqli_query($connect, "SELECT SUM(revenue) as total FROM revenuexp WHERE date='$date' AND (category = 'pro_fee_daily' OR category = 'pro_fee_weekly' OR category = 'pro_fee_monthly') AND type = 'daily'");      
                          while  ($row = mysqli_fetch_array($total_repay)){
                          $summation_pro_fees = $row['total'];                          
                          }
               
            
                          
                    $summation = $summation_pro_fees;
                  
                    echo "<tr align = 'center'>";
            echo "<td>--------</td>";
            echo "<td>--------</td>";
         
             
            echo "<td align = 'right'>TOTAL: </td>";
            echo "<td style='color: green; font-size: 20px;'>".number_format($summation)."</td>";  
//             echo "<td>--------</td>";
              echo "</tr>";
                          
                    
            
            
            
            
            echo ' </tbody>';
          echo ' </table>';
     
           echo '</div>' ;
            echo '</div>' ;
            
            
            
            
            
            
        }elseif($type == "Monthly"){     
                  $date = date("jS F Y");
            //loop through all table rows
            $inc=1;
           
         
        $result = mysqli_query($connect, "SELECT * FROM revenuexp WHERE date = '$date' AND (category = 'pro_fee_daily' OR category = 'pro_fee_weekly' OR category = 'pro_fee_monthly') AND type = 'monthly' ORDER BY  timestamp ASC");
     
    echo ' <div class="card card-block table-border-style">';       
     echo     '<div class="table-responsive">';        
     echo '<CAPTION><h3 align="center" style="font-size:22px; color: black;">PROCESSING FEE: [MONTHLY] '.$date.'</h3></CAPTION>';
     echo '<table class="table table-bordered table-striped  align="center">';
      
       echo ' <thead class="thead-dark">';
        
         echo '<tr align = "center">';
         echo '<th>S/N</th>';
         echo '<th>Description</th>';
         echo '<th>Type</th>';
           echo '<th>Processing Fees</th>';
//         echo '<th>Time</th>';
          echo '</tr>';  
           echo '</thead>';

      echo '<tbody class="" style="font-family: sans-serif; color:black ; font-weight:bold;">';
     while ($row=mysqli_fetch_array($result)){

       
         
            echo "<tr align = 'center'>";
            echo "<td>" . $inc."</td>";
            echo "<td>" . $row['remaks']."</td>";
         
           echo "<td>" . $row['type']."</td>"; 
              echo "<td>" . number_format($row['revenue'])."</td>";
//            echo "<td>" .substr($row['timestamp'], 0, 5)."</td>";
           
              echo "</tr>";
           $inc++;
            }
            
        
            
            
            
                ////////////THIS IS TO SUM DAILY
                        $total_repay = mysqli_query($connect, "SELECT SUM(revenue) as total FROM revenuexp WHERE date='$date' AND (category = 'pro_fee_daily' OR category = 'pro_fee_weekly' OR category = 'pro_fee_monthly') AND type = 'monthly'");      
                          while  ($row = mysqli_fetch_array($total_repay)){
                          $summation_pro_fees = $row['total'];                          
                          }
               
            
                          
                    $summation = $summation_pro_fees;
                  
                    echo "<tr align = 'center'>";
            echo "<td>--------</td>";
            echo "<td>--------</td>";
         
             
            echo "<td align = 'right'>TOTAL: </td>";
            echo "<td style='color: green; font-size: 20px;'>".number_format($summation)."</td>";  
//             echo "<td>--------</td>";
              echo "</tr>";
                          
                    
            
            
            
            
            echo ' </tbody>';
          echo ' </table>';
     
           echo '</div>' ;
            echo '</div>' ;
            
            
                     } else {
              $date = date("jS F Y");
            //THIS IS TO SEARCH WEEKLY  
            $inc=1;
           
      $result = mysqli_query($connect, "SELECT * FROM revenuexp WHERE date = '$date' AND (category = 'pro_fee_daily' OR category = 'pro_fee_weekly' OR category = 'pro_fee_monthly') AND type = 'weekly' ORDER BY  timestamp ASC");
     
    echo ' <div class="card card-block table-border-style">';       
     echo     '<div class="table-responsive">';              
     echo '<CAPTION><h3 align="center" style="font-size:22px; color: black;">PROCESSING FEE: [WEEKLY] '.$date.'</h3></CAPTION>';
     echo '<table class="table table-bordered table-striped  align="center">';
      
       echo ' <thead class="thead-dark">';
        
         echo '<tr align = "center">';
         echo '<th>S/N</th>';
         echo '<th>Description</th>';
         echo '<th>Type</th>';
           echo '<th>Processing Fees</th>';
//         echo '<th>Time</th>';
          echo '</tr>';  
           echo '</thead>';

      echo '<tbody class="" style="font-family: sans-serif; color:black ; font-weight:bold;">';
     while ($row=mysqli_fetch_array($result)){

       
         
            echo "<tr align = 'center'>";
            echo "<td>" . $inc."</td>";
            echo "<td>" . $row['remaks']."</td>";
         
           echo "<td>" . $row['type']."</td>"; 
              echo "<td>" . number_format($row['revenue'])."</td>";
//            echo "<td>" .substr($row['timestamp'], 0, 5)."</td>";
            
              echo "</tr>";
           $inc++;
            }
            
        
            
            
            
                ////////////THIS IS TO SUM DAILY
                        $total_repay = mysqli_query($connect, "SELECT SUM(revenue) as total FROM revenuexp WHERE date='$date' AND (category = 'pro_fee_daily' OR category = 'pro_fee_weekly' OR category = 'pro_fee_monthly') AND type = 'weekly'");      
                          while  ($row = mysqli_fetch_array($total_repay)){
                          $summation_pro_fees = $row['total'];                          
                          }
               
            
                          
                    $summation = $summation_pro_fees;
                  
                    echo "<tr align = 'center'>";
            echo "<td>--------</td>";
            echo "<td>--------</td>";
         
             
            echo "<td align = 'right'>TOTAL: </td>";
            echo "<td style='color: green; font-size: 20px;'>".number_format($summation)."</td>";  
//             echo "<td>--------</td>";
              echo "</tr>";
                          
                    
            
            
            
            
            echo ' </tbody>';
          echo ' </table>';
     
           echo '</div>' ;
            echo '</div>' ;
        
        }
        
    
        
        
        
      
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
        
   //    ---------------------------------------------------------------------------------------------     
        
    } 
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    ///////THIS IS FOR SORTING OUT DATE
    elseif(isset($_POST['type']) && isset($_POST['start']) && isset($_POST['end']) && $_POST['branch'] == ""){ 
           //THIS IS TO SEARCH DAILY                        
        $type = $_POST['type'];  
        
        if($type == "Daily"){
            $date = date("jS F Y");
              $start = $_POST['start'];
            $end = $_POST['end'];
            //loop through all table rows
            $inc=1;
           
        $result = mysqli_query($connect, "SELECT * FROM revenuexp WHERE date_format BETWEEN '$start' AND '$end' AND (category = 'pro_fee_daily' OR category = 'pro_fee_weekly' OR category = 'pro_fee_monthly') AND type = 'daily' ORDER BY  date_format ASC");
     
     echo ' <div class="card card-block table-border-style">';       
     echo     '<div class="table-responsive">';             
     echo '<CAPTION><h3 align="center" style="font-size:22px; color: black;">PROCESSING FEE BETWEEN: ['. date("jS F Y", strtotime($start)).'] AND ['.date("jS F Y", strtotime($end)).'] [DAILY]</h3></CAPTION>';
     echo '<table class="table table-bordered table-striped  align="center">';
      
       echo ' <thead class="thead-dark">';
        
         echo '<tr align = "center">';
         echo '<th>S/N</th>';
         echo '<th>Description</th>';
         echo '<th>Date</th>';
           echo '<th>Processing Fees</th>';
//         echo '<th>Time</th>';
          echo '</tr>';  
           echo '</thead>';

      echo '<tbody class="" style="font-family: sans-serif; color:black ; font-weight:bold;">';
     while ($row=mysqli_fetch_array($result)){

       
         
            echo "<tr align = 'center'>";
            echo "<td>" . $inc."</td>";
            echo "<td>" . $row['remaks']."</td>";
         
           echo "<td>" . $row['date']."</td>"; 
              echo "<td>" . number_format($row['revenue'])."</td>";
//            echo "<td>" .substr($row['timestamp'], 0, 5)."</td>";
           
              echo "</tr>";
           $inc++;
            }
            
        
            
            
            
                ////////////THIS IS TO SUM DAILY
                        $total_repay = mysqli_query($connect, "SELECT SUM(revenue) as total FROM revenuexp WHERE date_format BETWEEN '$start' AND '$end' AND (category = 'pro_fee_daily' OR category = 'pro_fee_weekly' OR category = 'pro_fee_monthly') AND type = 'daily'");      
                          while  ($row = mysqli_fetch_array($total_repay)){
                          $summation_pro_fees = $row['total'];                          
                          }
               
            
                          
                    $summation = $summation_pro_fees;
                  
                    echo "<tr align = 'center'>";
            echo "<td>--------</td>";
            echo "<td>--------</td>";
         
             
            echo "<td align = 'right'>TOTAL: </td>";
            echo "<td style='color: green; font-size: 20px;'>".number_format($summation)."</td>";  
//             echo "<td>--------</td>";
              echo "</tr>";
                          
                    
            
            
            
            
            echo ' </tbody>';
          echo ' </table>';
     
           echo '</div>' ;
            echo '</div>' ;
            
            
            
            
            
            
        }elseif($type == "Monthly"){     
                  $date = date("jS F Y");
                     $start = $_POST['start'];
            $end = $_POST['end'];
            //loop through all table rows
            $inc=1;
           
         
        $result = mysqli_query($connect, "SELECT * FROM revenuexp WHERE date_format BETWEEN '$start' AND '$end' AND (category = 'pro_fee_daily' OR category = 'pro_fee_weekly' OR category = 'pro_fee_monthly') AND type = 'monthly' ORDER BY  timestamp ASC");
     
   echo ' <div class="card card-block table-border-style">';       
     echo     '<div class="table-responsive">';             
     echo '<CAPTION><h3 align="center" style="font-size:22px; color: black;">PROCESSING FEE BETWEEN: ['. date("jS F Y", strtotime($start)).'] AND ['.date("jS F Y", strtotime($end)).'] [MONTHLY] </h3></CAPTION>';
     echo '<table class="table table-bordered table-striped  align="center">';
      
       echo ' <thead class="thead-dark">';
        
         echo '<tr align = "center">';
         echo '<th>S/N</th>';
         echo '<th>Description</th>';
         echo '<th>Type</th>';
           echo '<th>Processing Fees</th>';
//         echo '<th>Time</th>';
          echo '</tr>';  
           echo '</thead>';

      echo '<tbody class="" style="font-family: sans-serif; color:black ; font-weight:bold;">';
     while ($row=mysqli_fetch_array($result)){

       
         
            echo "<tr align = 'center'>";
            echo "<td>" . $inc."</td>";
            echo "<td>" . $row['remaks']."</td>";
         
           echo "<td>" . $row['type']."</td>"; 
              echo "<td>" . number_format($row['revenue'])."</td>";
//            echo "<td>" .substr($row['timestamp'], 0, 5)."</td>";
           
              echo "</tr>";
           $inc++;
            }
            
        
            
            
            
                ////////////THIS IS TO SUM DAILY
                        $total_repay = mysqli_query($connect, "SELECT SUM(revenue) as total FROM revenuexp WHERE date_format BETWEEN '$start' AND '$end' AND (category = 'pro_fee_daily' OR category = 'pro_fee_weekly' OR category = 'pro_fee_monthly') AND type = 'monthly'");      
                          while  ($row = mysqli_fetch_array($total_repay)){
                          $summation_pro_fees = $row['total'];                          
                          }
               
            
                          
                    $summation = $summation_pro_fees;
                  
                    echo "<tr align = 'center'>";
            echo "<td>--------</td>";
            echo "<td>--------</td>";
         
             
            echo "<td align = 'right'>TOTAL: </td>";
            echo "<td style='color: green; font-size: 20px;'>".number_format($summation)."</td>";  
//             echo "<td>--------</td>";
              echo "</tr>";
                          
                    
            
            
            
            
            echo ' </tbody>';
          echo ' </table>';
     
           echo '</div>' ;
            echo '</div>' ;
            
            
                     } else {
              $date = date("jS F Y");
                 $start = $_POST['start'];
            $end = $_POST['end'];
            //THIS IS TO SEARCH WEEKLY  
            $inc=1;
           
      $result = mysqli_query($connect, "SELECT * FROM revenuexp WHERE date_format BETWEEN '$start' AND '$end' AND (category = 'pro_fee_daily' OR category = 'pro_fee_weekly' OR category = 'pro_fee_monthly') AND type = 'weekly' ORDER BY  timestamp ASC");
     
     echo ' <div class="card card-block table-border-style">';       
     echo     '<div class="table-responsive">';           
     echo '<CAPTION><h3 align="center" style="font-size:22px; color: black;">PROCESSING FEE BETWEEN: ['. date("jS F Y", strtotime($start)).'] AND ['.date("jS F Y", strtotime($end)).'] [WEEKLY] </h3></CAPTION>';
     echo '<table class="table table-bordered table-striped  align="center">';
      
       echo ' <thead class="thead-dark">';
        
         echo '<tr align = "center">';
         echo '<th>S/N</th>';
         echo '<th>Description</th>';
         echo '<th>Type</th>';
           echo '<th>Processing Fees</th>';
//         echo '<th>Time</th>';
          echo '</tr>';  
           echo '</thead>';

      echo '<tbody class="" style="font-family: sans-serif; color:black ; font-weight:bold;">';
     while ($row=mysqli_fetch_array($result)){

       
         
            echo "<tr align = 'center'>";
            echo "<td>" . $inc."</td>";
            echo "<td>" . $row['remaks']."</td>";
         
           echo "<td>" . $row['type']."</td>"; 
              echo "<td>" . number_format($row['revenue'])."</td>";
//            echo "<td>" .substr($row['timestamp'], 0, 5)."</td>";
            
              echo "</tr>";
           $inc++;
            }
            
        
            
            
            
                ////////////THIS IS TO SUM DAILY
                        $total_repay = mysqli_query($connect, "SELECT SUM(revenue) as total FROM revenuexp WHERE date_format BETWEEN '$start' AND '$end' AND (category = 'pro_fee_daily' OR category = 'pro_fee_weekly' OR category = 'pro_fee_monthly') AND type = 'weekly'");      
                          while  ($row = mysqli_fetch_array($total_repay)){
                          $summation_pro_fees = $row['total'];                          
                          }
               
            
                          
                    $summation = $summation_pro_fees;
                  
                    echo "<tr align = 'center'>";
            echo "<td>--------</td>";
            echo "<td>--------</td>";
         
             
            echo "<td align = 'right'>TOTAL: </td>";
            echo "<td style='color: green; font-size: 20px;'>".number_format($summation)."</td>";  
//             echo "<td>--------</td>";
              echo "</tr>";
                          
                    
            
            
            
            
            echo ' </tbody>';
          echo ' </table>';
     
           echo '</div>' ;
            echo '</div>' ;
        
        }
        
    
        
        
        
      
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
        
   //    ---------------------------------------------------------------------------------------------     
        
    }
    
    
    
    
//    SORT OUT BRANCH TYPE
    
     elseif(isset($_POST['type']) && isset($_POST['start']) && isset($_POST['end']) && isset($_POST['branch'])){ 
           //THIS IS TO SEARCH DAILY  
//           echo "<script>alert('Branch tins')</script>";
        $type = $_POST['type'];  
           $branch = $_POST['branch'];
        if($type == "Daily"){
            $date = date("jS F Y");
              $start = $_POST['start'];
            $end = $_POST['end'];
               
            //loop through all table rows
            $inc=1;
           
        $result = mysqli_query($connect, "SELECT * FROM revenuexp WHERE date_format BETWEEN '$start' AND '$end' AND (category = 'pro_fee_daily' OR category = 'pro_fee_weekly' OR category = 'pro_fee_monthly') AND type = 'daily' AND branch = '$branch' ORDER BY  date_format ASC");
     
     echo ' <div class="card card-block table-border-style">';       
     echo     '<div class="table-responsive">';             
     echo '<CAPTION><h3 align="center" style="font-size:22px; color: black;">PROCESSING FEE BETWEEN: ['. date("jS F Y", strtotime($start)).'] AND ['.date("jS F Y", strtotime($end)).'] [DAILY] .Branch: '.$branch.'</h3></CAPTION>';
     echo '<table class="table table-bordered table-striped  align="center">';
      
       echo ' <thead class="thead-dark">';
        
         echo '<tr align = "center">';
         echo '<th>S/N</th>';
         echo '<th>Description</th>';
         echo '<th>Date</th>';
           echo '<th>Processing Fees</th>';
//         echo '<th>Time</th>';
          echo '</tr>';  
           echo '</thead>';

      echo '<tbody class="" style="font-family: sans-serif; color:black ; font-weight:bold;">';
     while ($row=mysqli_fetch_array($result)){

       
         
            echo "<tr align = 'center'>";
            echo "<td>" . $inc."</td>";
            echo "<td>" . $row['remaks']."</td>";
         
           echo "<td>" . $row['date']."</td>"; 
              echo "<td>" . number_format($row['revenue'])."</td>";
//            echo "<td>" .substr($row['timestamp'], 0, 5)."</td>";
           
              echo "</tr>";
           $inc++;
            }
            
        
            
            
            
                ////////////THIS IS TO SUM DAILY
                        $total_repay = mysqli_query($connect, "SELECT SUM(revenue) as total FROM revenuexp WHERE date_format BETWEEN '$start' AND '$end' AND (category = 'pro_fee_daily' OR category = 'pro_fee_weekly' OR category = 'pro_fee_monthly') AND type = 'daily' AND branch = '$branch'");      
                          while  ($row = mysqli_fetch_array($total_repay)){
                          $summation_pro_fees = $row['total'];                          
                          }
               
            
                          
                    $summation = $summation_pro_fees;
                  
                    echo "<tr align = 'center'>";
            echo "<td>--------</td>";
            echo "<td>--------</td>";
         
             
            echo "<td align = 'right'>TOTAL: </td>";
            echo "<td style='color: green; font-size: 20px;'>".number_format($summation)."</td>";  
//             echo "<td>--------</td>";
              echo "</tr>";
                          
                    
            
            
            
            
            echo ' </tbody>';
          echo ' </table>';
     
           echo '</div>' ;
            echo '</div>' ;
            
            
            
            
            
            
        }elseif($type == "Monthly"){     
                  $date = date("jS F Y");
                     $start = $_POST['start'];
            $end = $_POST['end'];
            //loop through all table rows
            $inc=1;
           
         
        $result = mysqli_query($connect, "SELECT * FROM revenuexp WHERE date_format BETWEEN '$start' AND '$end' AND (category = 'pro_fee_daily' OR category = 'pro_fee_weekly' OR category = 'pro_fee_monthly') AND type = 'monthly' AND branch = '$branch' ORDER BY  timestamp ASC");
     
   echo ' <div class="card card-block table-border-style">';       
     echo     '<div class="table-responsive">';             
     echo '<CAPTION><h3 align="center" style="font-size:22px; color: black;">PROCESSING FEE BETWEEN: ['. date("jS F Y", strtotime($start)).'] AND ['.date("jS F Y", strtotime($end)).'] [MONTHLY] .Branch: '.$branch.'</h3></CAPTION>';
     echo '<table class="table table-bordered table-striped  align="center">';
      
       echo ' <thead class="thead-dark">';
        
         echo '<tr align = "center">';
         echo '<th>S/N</th>';
         echo '<th>Description</th>';
         echo '<th>Type</th>';
           echo '<th>Processing Fees</th>';
//         echo '<th>Time</th>';
          echo '</tr>';  
           echo '</thead>';

      echo '<tbody class="" style="font-family: sans-serif; color:black ; font-weight:bold;">';
     while ($row=mysqli_fetch_array($result)){

       
         
            echo "<tr align = 'center'>";
            echo "<td>" . $inc."</td>";
            echo "<td>" . $row['remaks']."</td>";
         
           echo "<td>" . $row['type']."</td>"; 
              echo "<td>" . number_format($row['revenue'])."</td>";
//            echo "<td>" .substr($row['timestamp'], 0, 5)."</td>";
           
              echo "</tr>";
           $inc++;
            }
            
        
            
            
            
                ////////////THIS IS TO SUM DAILY
                        $total_repay = mysqli_query($connect, "SELECT SUM(revenue) as total FROM revenuexp WHERE date_format BETWEEN '$start' AND '$end' AND (category = 'pro_fee_daily' OR category = 'pro_fee_weekly' OR category = 'pro_fee_monthly') AND type = 'monthly' AND branch = '$branch'");      
                          while  ($row = mysqli_fetch_array($total_repay)){
                          $summation_pro_fees = $row['total'];                          
                          }
               
            
                          
                    $summation = $summation_pro_fees;
                  
                    echo "<tr align = 'center'>";
            echo "<td>--------</td>";
            echo "<td>--------</td>";
         
             
            echo "<td align = 'right'>TOTAL: </td>";
            echo "<td style='color: green; font-size: 20px;'>".number_format($summation)."</td>";  
//             echo "<td>--------</td>";
              echo "</tr>";
                          
                    
            
            
            
            
            echo ' </tbody>';
          echo ' </table>';
     
           echo '</div>' ;
            echo '</div>' ;
            
            
                     } else {
              $date = date("jS F Y");
                 $start = $_POST['start'];
            $end = $_POST['end'];
            //THIS IS TO SEARCH WEEKLY  
            $inc=1;
           
      $result = mysqli_query($connect, "SELECT * FROM revenuexp WHERE date_format BETWEEN '$start' AND '$end' AND (category = 'pro_fee_daily' OR category = 'pro_fee_weekly' OR category = 'pro_fee_monthly') AND type = 'weekly' AND branch = '$branch' ORDER BY  timestamp ASC");
     
     echo ' <div class="card card-block table-border-style">';       
     echo     '<div class="table-responsive">';           
     echo '<CAPTION><h3 align="center" style="font-size:22px; color: black;">PROCESSING FEE BETWEEN: ['. date("jS F Y", strtotime($start)).'] AND ['.date("jS F Y", strtotime($end)).'] [WEEKLY] .Branch: '.$branch.'</h3></CAPTION>';
     echo '<table class="table table-bordered table-striped  align="center">';
      
       echo ' <thead class="thead-dark">';
        
         echo '<tr align = "center">';
         echo '<th>S/N</th>';
         echo '<th>Description</th>';
         echo '<th>Type</th>';
           echo '<th>Processing Fees</th>';
//         echo '<th>Time</th>';
          echo '</tr>';  
           echo '</thead>';

      echo '<tbody class="" style="font-family: sans-serif; color:black ; font-weight:bold;">';
     while ($row=mysqli_fetch_array($result)){

       
         
            echo "<tr align = 'center'>";
            echo "<td>" . $inc."</td>";
            echo "<td>" . $row['remaks']."</td>";
         
           echo "<td>" . $row['type']."</td>"; 
              echo "<td>" . number_format($row['revenue'])."</td>";
//            echo "<td>" .substr($row['timestamp'], 0, 5)."</td>";
            
              echo "</tr>";
           $inc++;
            }
            
        
            
            
            
                ////////////THIS IS TO SUM DAILY
                        $total_repay = mysqli_query($connect, "SELECT SUM(revenue) as total FROM revenuexp WHERE date_format BETWEEN '$start' AND '$end' AND (category = 'pro_fee_daily' OR category = 'pro_fee_weekly' OR category = 'pro_fee_monthly') AND type = 'weekly' AND branch = '$branch'");      
                          while  ($row = mysqli_fetch_array($total_repay)){
                          $summation_pro_fees = $row['total'];                          
                          }
               
            
                          
                    $summation = $summation_pro_fees;
                  
                    echo "<tr align = 'center'>";
            echo "<td>--------</td>";
            echo "<td>--------</td>";
         
             
            echo "<td align = 'right'>TOTAL: </td>";
            echo "<td style='color: green; font-size: 20px;'>".number_format($summation)."</td>";  
//             echo "<td>--------</td>";
              echo "</tr>";
                          
                    
            
            
            
            
            echo ' </tbody>';
          echo ' </table>';
     
           echo '</div>' ;
            echo '</div>' ;
        
        }
        
    
        
        
        
      
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
                              
        
   //    ---------------------------------------------------------------------------------------------     
        
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
     elseif(isset($_POST['view_al22']) && isset($_POST['start']) && isset($_POST['end']) && $_POST['branch'] == ""){ 
           //THIS IS TO SEARCH DAILY                        
//           echo "<script>alert('I am working!!!!!!!!!!!')</script>";
        
      
            $date = date("jS F Y");
              $start = $_POST['start'];
            $end = $_POST['end'];
            //loop through all table rows
            $inc=1;
           
        $result = mysqli_query($connect, "SELECT * FROM revenuexp WHERE date_format BETWEEN '$start' AND '$end' AND (category = 'pro_fee_daily' OR category = 'pro_fee_weekly' OR category = 'pro_fee_monthly')  ORDER BY  date_format ASC");
     
     echo ' <div class="card card-block table-border-style">';       
     echo     '<div class="table-responsive">';         
     echo '<CAPTION><h3 align="center" style="font-size:22px; color: black;">PROCESSING FEE BETWEEN: ['. date("jS F Y", strtotime($start)).'] AND ['.date("jS F Y", strtotime($end)).'] [ALL]</h3></CAPTION>';
     echo '<table class="table table-bordered table-striped  align="center">';
      
       echo ' <thead class="thead-dark">';
        
         echo '<tr align = "center">';
         echo '<th>S/N</th>';
         echo '<th>Description</th>';
         echo '<th>Date</th>';
           echo '<th>Processing Fees</th>';
//         echo '<th>Time</th>';
          echo '</tr>';  
           echo '</thead>';

      echo '<tbody class="" style="font-family: sans-serif; color:black ; font-weight:bold;">';
     while ($row=mysqli_fetch_array($result)){

       
         
            echo "<tr align = 'center'>";
            echo "<td>" . $inc."</td>";
            echo "<td>" . $row['remaks']."</td>";
         
           echo "<td>" . $row['date']."</td>"; 
              echo "<td>" . number_format($row['revenue'])."</td>";
//            echo "<td>" .substr($row['timestamp'], 0, 5)."</td>";
           
              echo "</tr>";
           $inc++;
            }
            
        
            
            
            
                ////////////THIS IS TO SUM DAILY
                        $total_repay = mysqli_query($connect, "SELECT SUM(revenue) as total FROM revenuexp WHERE date_format BETWEEN '$start' AND '$end' AND (category = 'pro_fee_daily' OR category = 'pro_fee_weekly' OR category = 'pro_fee_monthly')");      
                          while  ($row = mysqli_fetch_array($total_repay)){
                          $summation_pro_fees = $row['total'];                          
                          }
               
            
                          
                    $summation = $summation_pro_fees;
                  
                    echo "<tr align = 'center'>";
            echo "<td>--------</td>";
            echo "<td>--------</td>";
         
             
            echo "<td align = 'right'>TOTAL: </td>";
            echo "<td style='color: green; font-size: 20px;'>".number_format($summation)."</td>";  
//             echo "<td>--------</td>";
              echo "</tr>";
                          
                    
            
            
            
            
            echo ' </tbody>';
          echo ' </table>';
     
           echo '</div>' ;
            echo '</div>' ;
            
            
            
            
            
            
        }
    
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
//        SORT ALL FOR BRANCH
        
          elseif(isset($_POST['view_al22']) && isset($_POST['start']) && isset($_POST['end']) && isset($_POST['branch'])){ 
           //THIS IS TO SEARCH DAILY                        
//           echo "<script>alert('I am working!!!!!!!!!!!')</script>";
           $branch = $_POST['branch'];
      
            $date = date("jS F Y");
              $start = $_POST['start'];
            $end = $_POST['end'];
            //loop through all table rows
            $inc=1;
           
        $result = mysqli_query($connect, "SELECT * FROM revenuexp WHERE date_format BETWEEN '$start' AND '$end' AND (category = 'pro_fee_daily' OR category = 'pro_fee_weekly' OR category = 'pro_fee_monthly') AND branch = '$branch'  ORDER BY  date_format ASC");
     
     echo ' <div class="card card-block table-border-style">';       
     echo     '<div class="table-responsive">';         
     echo '<CAPTION><h3 align="center" style="font-size:22px; color: black;">PROCESSING FEE BETWEEN: ['. date("jS F Y", strtotime($start)).'] AND ['.date("jS F Y", strtotime($end)).'] [ALL] .Branch: '.$branch.'</h3></CAPTION>';
     echo '<table class="table table-bordered table-striped  align="center">';
      
       echo ' <thead class="thead-dark">';
        
         echo '<tr align = "center">';
         echo '<th>S/N</th>';
         echo '<th>Description</th>';
         echo '<th>Date</th>';
           echo '<th>Processing Fees</th>';
//         echo '<th>Time</th>';
          echo '</tr>';  
           echo '</thead>';

      echo '<tbody class="" style="font-family: sans-serif; color:black ; font-weight:bold;">';
     while ($row=mysqli_fetch_array($result)){

       
         
            echo "<tr align = 'center'>";
            echo "<td>" . $inc."</td>";
            echo "<td>" . $row['remaks']."</td>";
         
           echo "<td>" . $row['date']."</td>"; 
              echo "<td>" . number_format($row['revenue'])."</td>";
//            echo "<td>" .substr($row['timestamp'], 0, 5)."</td>";
           
              echo "</tr>";
           $inc++;
            }
            
        
            
            
            
                ////////////THIS IS TO SUM DAILY
                        $total_repay = mysqli_query($connect, "SELECT SUM(revenue) as total FROM revenuexp WHERE date_format BETWEEN '$start' AND '$end' AND (category = 'pro_fee_daily' OR category = 'pro_fee_weekly' OR category = 'pro_fee_monthly') AND branch = '$branch'");      
                          while  ($row = mysqli_fetch_array($total_repay)){
                          $summation_pro_fees = $row['total'];                          
                          }
               
            
                          
                    $summation = $summation_pro_fees;
                  
                    echo "<tr align = 'center'>";
            echo "<td>--------</td>";
            echo "<td>--------</td>";
         
             
            echo "<td align = 'right'>TOTAL: </td>";
            echo "<td style='color: green; font-size: 20px;'>".number_format($summation)."</td>";  
//             echo "<td>--------</td>";
              echo "</tr>";
                          
                    
            
            
            
            
            echo ' </tbody>';
          echo ' </table>';
     
           echo '</div>' ;
            echo '</div>' ;
            
            
            
            
            
            
        }
        
        
        
        
        
        
    
    
    
    
    
    else {
        
            $date = date("jS F Y");
            // //THIS IS TO VIEW ALL!!!!!!!!!!!!!!!!!!!!!!!!!!!!1 
            $inc=1;
           
     $result = mysqli_query($connect, "SELECT * FROM revenuexp WHERE date = '$date' AND (category = 'pro_fee_daily' OR category = 'pro_fee_weekly' OR category = 'pro_fee_monthly') ORDER BY  timestamp ASC");
     
    echo ' <div class="card card-block table-border-style">';       
     echo     '<div class="table-responsive">';         
     echo '<CAPTION><h3 align="center" style="font-size:22px; color: black;">PROCESSING FEE: '.$date.'</h3></CAPTION>';
     echo '<table class="table table-bordered table-striped  align="center">';
      
       echo ' <thead class="thead-dark">';
        
         echo '<tr align = "center">';
         echo '<th>S/N</th>';
         echo '<th>Description</th>';
         echo '<th>Type</th>';
           echo '<th>Processing Fees</th>';
//         echo '<th>Time</th>';
          echo '</tr>';  
           echo '</thead>';

      echo '<tbody class="" style="font-family: sans-serif; color:black ; font-weight:bold;">';
     while ($row=mysqli_fetch_array($result)){

       
         
            echo "<tr align = 'center'>";
            echo "<td>" . $inc."</td>";
            echo "<td>" . $row['remaks']."</td>";
         
           echo "<td>" . $row['type']."</td>"; 
              echo "<td>" . number_format($row['revenue'])."</td>";
//            echo "<td>" .substr($row['timestamp'], 0, 5)."</td>";
           
              echo "</tr>";
           $inc++;
            }
            
        
            
            
            
                ////////////THIS IS TO SUM DAILY
                        $total_repay = mysqli_query($connect, "SELECT SUM(revenue) as total FROM revenuexp WHERE date='$date' AND (category = 'pro_fee_daily' OR category = 'pro_fee_weekly' OR category = 'pro_fee_monthly')");      
                          while  ($row = mysqli_fetch_array($total_repay)){
                          $summation_pro_fees = $row['total'];                          
                          }
               
            
                          
                    $summation = $summation_pro_fees;
                  
                    echo "<tr align = 'center'>";
            echo "<td>--------</td>";
            echo "<td>--------</td>";
         
             
            echo "<td align = 'right'>TOTAL: </td>";
            echo "<td style='color: green; font-size: 20px;'>".number_format($summation)."</td>";  
//             echo "<td>--------</td>";
              echo "</tr>";
                          
                    
            
            
            
            
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
        
        
        window.onload = function(){
           document.getElementById('magic-collapse').click();
           
        };
             </script>
    
   
    
    
</body>

</html>
