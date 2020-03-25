<?php
session_start();
    include 'connection.php';
     if(isset($_POST['view_al22']) && $_POST['work'] == ""){
      
      echo  "<script> location.href = 'today_equity.php'; </script>"; 
   }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Today's Equity</title>
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
                                            <h5 class="m-b-10">Today Equity</h5>
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
                                     
                           <form action="today_equity.php" method="POST" enctype="multipart/form-data" style="width: 600px;">
              
         <div class="input-group mb-3">
             
             <input type="hidden" class="form-control" id="autocomplete_staff" name="srch" placeholder="Search Staff Name here" required=""  autofocus="" >
    <div class="input-group-append">
      <!--<button class="btn btn-warning" id="btnsearch" name="btnsrch" type="submit">SEARCH</button>-->  
     </div>
  </div>
        </form>
               
               <div class="row">  
                   <div class="col-sm-7">      
     <form action="today_equity.php" method="POST" enctype="multipart/form-data" style="width: 600px;">
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
         <input type="date" name="start" id="start"/>  <input type="date" name="end" id="end"/>   
         
         <br><br>
         
         <select name="type" id="type">
                    <option value="" disabled selected hidden>select Type</option>
                   <!--<option>Daily</option>-->
                  <option>Weekly</option>
                  <option>Monthly</option>
                  
               </select>
                <input type="hidden" id="work" name="work">  
               <br> 
               <button type="submit" name="year_a" id="date_sorting" style="font-weight: bold; border-radius: 8px; padding:7px; font-style:italic ; font-size: 14px; background-color:green; color: whitesmoke; cursor: pointer; margin-bottom: 10px;">Search Type for Today</button>
               <!--<a style="" class="btn btn-dark" href="today_repayment.php">View All</a> <br>-->
            &nbsp; &nbsp; <input type="submit" value="View All" id="date_sorting2" name="view_al22"  class="btn btn-dark"/>   
                        
      
<!--               <br> 
               <button type="submit" name="year_a" style="font-weight: bold; border-radius: 8px; padding:7px; font-style:italic ; font-size: 14px; background-color:green; color: whitesmoke; cursor: pointer; margin-bottom: 10px;">Search Type for Today</button>
               <a style="" class="btn btn-dark" href="today_equity.php">View All</a> <br>
                        -->
      
             </form>
               </div>
               
                 <div class="col-sm-5">     
                     <!--THIS IS TO BACK DATE-->
                <form action="today_equity.php" method="POST" enctype="multipart/form-data" style="width: 600px;">
               <input  type="text" name="backd"  placeholder="Back Date Here" onfocus="(this.type='date')" style="width: 150px; border-radius: 5px; " required>
      
               <br> 
               <button type="submit" name="bd" style="font-weight: bold; border-radius: 8px; padding:7px; font-style:italic ; font-size: 14px; background-color: #003333; color: whitesmoke; cursor: pointer; margin-bottom: 10px;">View Past Posting</button>
               
             </form>
                     </div>
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
               
                <?php
            
    if(isset($_POST['btnsrch'])){
          $date = date("jS F Y");
            //THIS IS TO SEARCH STAFF NAME
            $inc=1;
        $staff_name = $_POST['srch'];
        $_SESSION['staff_name'] = $staff_name;
//      $result = mysqli_query($connect, "SELECT * FROM allloan WHERE date = '$date' AND equity > 0 AND collector = '$staff_name' ORDER BY  timestamp ASC");
       $result1 = mysqli_query($connect, "SELECT * FROM weekly_allloan WHERE date = '$date' AND equity > 0 AND collector = '$staff_name' ORDER BY  timestamp ASC");
     $result25 = mysqli_query($connect, "SELECT * FROM monthly_allloan WHERE date = '$date' AND equity > 0 AND collector = '$staff_name' ORDER BY  timestamp ASC");
     
      echo ' <div class="card card-block table-border-style">';       
     echo     '<div class="table-responsive">';           
     echo '<CAPTION><h3 align="center" style="font-size:22px; color: black;">Equity Collected By '.$staff_name.' Toady: '.$date.'</h3></CAPTION>';
     echo '<table class="table table-bordered table-striped table-hover " align="center">';
      
       echo ' <thead class="thead-dark">';
        
         echo '<tr align = "center">';
         echo '<th>S/N</th>';
         echo '<th>Name (Payer)</th>';
          echo '<th>Type</th>';
           echo '<th>Collected by</th>';
         echo '<th>Time Posted</th>';
           echo '<th>Equity</th>';
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
           
            echo "<td>" . number_format($row['equity'])."</td>"; 

            echo "<td>" . $row['district']."</td>";
              echo "</tr>";
           $inc++;
            }   
            
            
            
             while ($row=mysqli_fetch_array($result25)){

         
            echo "<tr align = 'center'>";
            echo "<td>" . $inc."</td>";
            echo "<td>" . $row['name']."</td>";
            echo "<td>Monthly</td>";
            echo "<td>" . $row['collector']."</td>"; 
            echo "<td>" . $row['timestamp']."</td>";
           
            echo "<td>" . number_format($row['equity'])."</td>"; 

            echo "<td>" . $row['district']."</td>";
              echo "</tr>";
           $inc++;
            }   
            
            
     
    
            ////////////THIS IS TO SUM WEEKLY
                        $total_weekly = mysqli_query($connect, "SELECT SUM(equity) as total FROM weekly_allloan WHERE date='$date' AND equity > 0 AND collector = '$staff_name'");      
                          while  ($row = mysqli_fetch_array($total_weekly)){
                          $summation_weekly = $row['total'];                          
                          }
                          
                      
                          
                          ////////////THIS IS TO SUM MONTHLY PAY
                    
                        $total_repay222 = mysqli_query($connect, "SELECT SUM(equity) as total FROM monthly_allloan WHERE date='$date' AND equity > 0 AND collector = '$staff_name'");      
                          while  ($row = mysqli_fetch_array($total_repay222)){
                          $summation_monthly = $row['total'];
                                               
                          }
                          
                    $summation = $summation_weekly + $summation_monthly;
                  
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
            
            
//    ---------------------------------------------------------------------------------------------  
      
   
            
            
            
            
            
//            ///////////////////////////BACK DATE ARENA//////////////////////////
            } elseif(isset($_POST['bd'])){ 
                $backd = $_POST['backd'];
              @$staff_name = $_SESSION['staff_name'];
                 $output_date = date('jS F Y', strtotime($backd));
                      
               if($staff_name == ""){
                     $inc=1;
       $result1 = mysqli_query($connect, "SELECT * FROM weekly_allloan WHERE date = '$output_date' AND equity > 0  ORDER BY  timestamp ASC");
     $result25 = mysqli_query($connect, "SELECT * FROM monthly_allloan WHERE date = '$output_date' AND equity > 0  ORDER BY  timestamp ASC");
     
      echo ' <div class="card card-block table-border-style">';       
     echo     '<div class="table-responsive">';              
     echo '<CAPTION><h3 align="center" style="font-size:22px; color: black;">Equity Collected On '.$output_date.'</h3></CAPTION>';
     echo '<table class="table table-bordered table-striped table-hover " align="center">';
      
       echo ' <thead class="thead-dark">';
        
         echo '<tr align = "center">';
         echo '<th>S/N</th>';
         echo '<th>Name (Payer)</th>';
          echo '<th>Type</th>';
           echo '<th>Collected by</th>';
         echo '<th>Time Posted</th>';
           echo '<th>Equity</th>';
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
         
         echo "<td>" . number_format($row['equity'])."</td>"; 

            echo "<td>" . $row['district']."</td>";
              echo "</tr>";
           $inc++;
            }   
            
            
            
             while ($row=mysqli_fetch_array($result25)){

         
            echo "<tr align = 'center'>";
            echo "<td>" . $inc."</td>";
            echo "<td>" . $row['name']."</td>";
            echo "<td>Monthly</td>";
            echo "<td>" . $row['collector']."</td>"; 
            echo "<td>" . $row['timestamp']."</td>";
           
            echo "<td>" . number_format($row['equity'])."</td>"; 

            echo "<td>" . $row['district']."</td>";
              echo "</tr>";
           $inc++;
            }   
            
            
     
    
            ////////////THIS IS TO SUM WEEKLY
                        $total_weekly = mysqli_query($connect, "SELECT SUM(equity) as total FROM weekly_allloan WHERE date='$output_date' AND equity > 0");      
                          while  ($row = mysqli_fetch_array($total_weekly)){
                          $summation_weekly = $row['total'];                          
                          }
                          
                      
                          
                          ////////////THIS IS TO SUM MONTHLY PAY
                    
                        $total_repay222 = mysqli_query($connect, "SELECT SUM(equity) as total FROM monthly_allloan WHERE date='$output_date' AND equity > 0");      
                          while  ($row = mysqli_fetch_array($total_repay222)){
                          $summation_monthly = $row['total'];
                                               
                          }
                          
                    $summation = $summation_weekly + $summation_monthly;
                  
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
            
                   
                   
                
                  } else {
                      
                      
                      
                        $inc=1;
//                  $result = mysqli_query($connect, "SELECT * FROM allloan WHERE date = '$output_date' AND repay > '1' AND collector = '$staff_name' AND equity > 0 ORDER BY  timestamp ASC");
       $result1 = mysqli_query($connect, "SELECT * FROM weekly_allloan WHERE date = '$output_date'  AND equity > 0 ORDER BY  timestamp ASC");
      $result15 = mysqli_query($connect, "SELECT * FROM monthly_allloan WHERE date = '$output_date'  AND equity > 0 ORDER BY  timestamp ASC");
     
     echo ' <div class="card card-block table-border-style">';       
     echo     '<div class="table-responsive">';            
     echo '<CAPTION><h3 align="center" style="font-size:22px; color: black;">Equity Collected By '.$staff_name.' On: '.$output_date.'</h3></CAPTION>';
     echo '<table class="table table-bordered table-striped table-hover " align="center">';
      
       echo ' <thead class="thead-dark">';
        
         echo '<tr align = "center">';
         echo '<th>S/N</th>';
         echo '<th>Name (Payer)</th>';
          echo '<th>Type</th>';
           echo '<th>Collected by</th>';
         echo '<th>Time Posted</th>';
           echo '<th>Equity</th>';
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
         
            echo "<td>" . number_format($row['equity'])."</td>"; 

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
           
            echo "<td>" .number_format($row['equity'])."</td>"; 

            echo "<td>" . $row['district']."</td>";
              echo "</tr>";
           $inc++;
            }      
     
                     
                          
               ////////////THIS IS TO SUM DAILY
                        $total_weekly = mysqli_query($connect, "SELECT SUM(equity) as total FROM weekly_allloan WHERE date='$output_date' AND equity > 0");      
                          while  ($row = mysqli_fetch_array($total_weekly)){
                          $summation_weekly = $row['total'];                          
                          }
             
          
                          
        ////////////THIS IS TO SUM MONTHLY PAY
                    
                 $total_repay222 = mysqli_query($connect, "SELECT SUM(equity) as total FROM monthly_allloan WHERE date='$output_date' AND equity > 0");      
                          while  ($row = mysqli_fetch_array($total_repay222)){
                          $summation_monthly = $row['total'];
                                             
                          }
                  
                            
      $summation =  $summation_weekly + $summation_monthly;
                  
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
        $type = $_POST['type'];  
        
        
        
       ////////**********************END NOT NEEDED**************************************////     
        if($type == "Daily"){
            $date = date("jS F Y");
            //loop through all table rows
            $inc=1;
           
     $result = mysqli_query($connect, "SELECT * FROM allloan WHERE date = '$date' AND equity > 0 ORDER BY  timestamp ASC");
       echo ' <div class="card card-block table-border-style">';       
     echo     '<div class="table-responsive">';           
     echo '<CAPTION><h3 align="center" style="font-size:22px; color: black;">EQUITY PAYED TODAY: '.$date.' (DAILY)</h3></CAPTION>';
     echo '<table class="table table-bordered table-striped table-hover " align="center">';
      
       echo ' <thead class="thead-dark">';
        
         echo '<tr align = "center">';
         echo '<th>S/N</th>';
         echo '<th>Name (Payer)</th>';
          echo '<th>Type</th>';
           echo '<th>Collected by</th>';
         echo '<th>Time Posted</th>';
           echo '<th>Equity</th>';
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
            
            echo "<td>" .number_format($row['equity'])."</td>"; 

            echo "<td>" . $row['district']."</td>";
              echo "</tr>";
           $inc++;
            }
   
            
            
                ////////////THIS IS TO SUM DAILY
                        $total_repay = mysqli_query($connect, "SELECT SUM(equity) as total FROM allloan WHERE date = '$date' AND equity > 0");      
                          while  ($row = mysqli_fetch_array($total_repay)){
                          $summation_daily = $row['total'];                          
                          }
               
                        ////////////THIS IS TO DAILY INTEREST
                        $total_repay1 = mysqli_query($connect, "SELECT SUM(interest_pay) as total FROM allloan WHERE date='$date' AND equity > 0");      
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
        
           ////////**********************END NOT NEEDED**************************************//// 
            
            
            
            
        }elseif($type == "Monthly"){     
                  $date = date("jS F Y");
            //loop through all table rows
            $inc=1;
           
     $result = mysqli_query($connect, "SELECT * FROM monthly_allloan WHERE date = '$date' AND equity > 0 ORDER BY  timestamp ASC");
       echo ' <div class="card card-block table-border-style">';       
     echo     '<div class="table-responsive">';          
     echo '<CAPTION><h3 align="center" style="font-size:22px; color: black;">EQUITY PAYED TODAY: '.$date.' (MONTHLY)</h3></CAPTION>';
     echo '<table class="table table-bordered table-striped table-hover " align="center">';
      
       echo ' <thead class="thead-dark">';
        
         echo '<tr align = "center">';
         echo '<th>S/N</th>';
         echo '<th>Name (Payer)</th>';
          echo '<th>Type</th>';
           echo '<th>Collected by</th>';
         echo '<th>Time Posted</th>';
           echo '<th>Equity</th>';
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
          
            echo "<td>" .number_format($row['equity'])."</td>"; 

            echo "<td>" . $row['district']."</td>";
              echo "</tr>";
           $inc++;
            }
   
            
            
               
                          
                          
               ////////////THIS IS TO SUM MONTHLY PAY
                        $total_repay222 = mysqli_query($connect, "SELECT SUM(equity) as total FROM monthly_allloan WHERE date='$date' AND equity > 0");      
                          while  ($row = mysqli_fetch_array($total_repay222)){
                          $summation_monthly = $row['total'];
                                          
                          }
           
              
                      
                       
                    echo "<tr align = 'center'>";
            echo "<td>--------</td>";
            echo "<td>--------</td>";
             echo "<td>--------</td>";
              echo "<td>--------</td>";
            echo "<td align = 'right'>TOTAL: </td>";
            echo "<td style='color: green; font-size: 20px;'>".number_format($summation_monthly)."</td>";  
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
           
     $result1 = mysqli_query($connect, "SELECT * FROM weekly_allloan WHERE date = '$date' AND equity > 0 ORDER BY  timestamp ASC");
     
    echo ' <div class="card card-block table-border-style">';       
     echo     '<div class="table-responsive">';              
     echo '<CAPTION><h3 align="center" style="font-size:22px; color: black;">EQUITY PAYED TODAY: '.$date.' (WEEKLY)</h3></CAPTION>';
     echo '<table class="table table-bordered table-striped table-hover " align="center">';
      
       echo ' <thead class="thead-dark">';
        
         echo '<tr align = "center">';
         echo '<th>S/N</th>';
         echo '<th>Name (Payer)</th>';
          echo '<th>Type</th>';
           echo '<th>Collected by</th>';
         echo '<th>Time Posted</th>';
           echo '<th>Equity</th>';
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
             
            echo "<td>" . number_format($row['equity'])."</td>"; 
            echo "<td>" . $row['district']."</td>";
              echo "</tr>";
           $inc++;
            }  
            
            
            
          
               
               ////////////THIS IS TO SUM WEEKLY
                        $total_weekly = mysqli_query($connect, "SELECT SUM(equity) as total FROM weekly_allloan WHERE date='$date' AND equity > 0");      
                          while  ($row = mysqli_fetch_array($total_weekly)){
                          $summation_weekly = $row['total'];                          
                          }
                            
                 
                          
                     $summation =  $summation_weekly;     
                  
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
        
    } 
    
    
    
    elseif(isset($_POST['type']) && isset($_POST['start']) && isset($_POST['end']) && $_POST['branch'] == ""){ 
       //THIS IS TO SEARCH DAILY                        
        $type = $_POST['type'];  
         $start = $_POST['start'];
            $end = $_POST['end'];
        
        
       ////////**********************END NOT NEEDED**************************************////     
        if($type == "Daily"){
            $date = date("jS F Y");
            //loop through all table rows
            $inc=1;
           
     $result = mysqli_query($connect, "SELECT * FROM allloan WHERE date_format BETWEEN '$start' AND '$end' AND date = '$date' AND equity > 0 ORDER BY  timestamp ASC");
      echo ' <div class="card card-block table-border-style">';       
     echo     '<div class="table-responsive">';            
     echo '<CAPTION><h3 align="center" style="font-size:22px; color: black;">EQUITY PAYED BETWEEN: ['. date("jS F Y", strtotime($start)).'] AND ['.date("jS F Y", strtotime($end)).'] (DAILY)</h3></CAPTION>';
     echo '<table class="table table-bordered table-striped table-hover " align="center">';
      
       echo ' <thead class="thead-dark">';
        
         echo '<tr align = "center">';
         echo '<th>S/N</th>';
         echo '<th>Name (Payer)</th>';
          echo '<th>Type</th>';
           echo '<th>Collected by</th>';
         echo '<th>Time Posted</th>';
           echo '<th>Equity</th>';
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
            
            echo "<td>" .number_format($row['equity'])."</td>"; 

            echo "<td>" . $row['district']."</td>";
              echo "</tr>";
           $inc++;
            }
   
            
            
                ////////////THIS IS TO SUM DAILY
                        $total_repay = mysqli_query($connect, "SELECT SUM(equity) as total FROM allloan WHERE date = '$date' AND equity > 0");      
                          while  ($row = mysqli_fetch_array($total_repay)){
                          $summation_daily = $row['total'];                          
                          }
               
                        ////////////THIS IS TO DAILY INTEREST
                        $total_repay1 = mysqli_query($connect, "SELECT SUM(interest_pay) as total FROM allloan WHERE date='$date' AND equity > 0");      
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
        
           ////////**********************END NOT NEEDED**************************************//// 
            
            
            
            
        }elseif($type == "Monthly"){     
                  $date = date("jS F Y");
            //loop through all table rows
            $inc=1;
           
     $result = mysqli_query($connect, "SELECT * FROM monthly_allloan WHERE date_format BETWEEN '$start' AND '$end' AND equity > 0 ORDER BY  date_format ASC");
   
       
    echo ' <div class="card card-block table-border-style">';       
     echo     '<div class="table-responsive">';              
     echo '<CAPTION><h3 align="center" style="font-size:22px; color: black;">EQUITY PAYED BETWEEN: ['. date("jS F Y", strtotime($start)).'] AND ['.date("jS F Y", strtotime($end)).'] (MONTHLY)</h3></CAPTION>';
     echo '<table class="table table-bordered table-striped table-hover " align="center">';
      
       echo ' <thead class="thead-dark">';
        
         echo '<tr align = "center">';
         echo '<th>S/N</th>';
         echo '<th>Name (Payer)</th>';
          echo '<th>Type</th>';
           echo '<th>Collected by</th>';
         echo '<th>Date</th>';
           echo '<th>Equity</th>';
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
            echo "<td>" . $row['date']."</td>";
          
            echo "<td>" .number_format($row['equity'])."</td>"; 

            echo "<td>" . $row['district']."</td>";
              echo "</tr>";
           $inc++;
            }
   
            
            
               
                          
                          
               ////////////THIS IS TO SUM MONTHLY PAY
                        $total_repay222 = mysqli_query($connect, "SELECT SUM(equity) as total FROM monthly_allloan WHERE date_format BETWEEN '$start' AND '$end'  AND equity > 0");      
                          while  ($row = mysqli_fetch_array($total_repay222)){
                          $summation_monthly = $row['total'];
                                          
                          }
           
              
                      
                       
                    echo "<tr align = 'center'>";
            echo "<td>--------</td>";
            echo "<td>--------</td>";
             echo "<td>--------</td>";
              echo "<td>--------</td>";
            echo "<td align = 'right'>TOTAL: </td>";
            echo "<td style='color: green; font-size: 20px;'>".number_format($summation_monthly)."</td>";  
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
           
     $result1 = mysqli_query($connect, "SELECT * FROM weekly_allloan WHERE date_format BETWEEN '$start' AND '$end' AND equity > 0 ORDER BY  date_format ASC");
     
     echo ' <div class="card card-block table-border-style">';       
     echo     '<div class="table-responsive">';             
     echo '<CAPTION><h3 align="center" style="font-size:22px; color: black;">EQUITY PAYED BETWEEN: ['. date("jS F Y", strtotime($start)).'] AND ['.date("jS F Y", strtotime($end)).'] (WEEKLY)</h3></CAPTION>';
     echo '<table class="table table-bordered table-striped table-hover " align="center">';
      
       echo ' <thead class="thead-dark">';
        
         echo '<tr align = "center">';
         echo '<th>S/N</th>';
         echo '<th>Name (Payer)</th>';
          echo '<th>Type</th>';
           echo '<th>Collected by</th>';
         echo '<th>Date</th>';
           echo '<th>Equity</th>';
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
            echo "<td>" . $row['date']."</td>";
             
            echo "<td>" . number_format($row['equity'])."</td>"; 
            echo "<td>" . $row['district']."</td>";
              echo "</tr>";
           $inc++;
            }  
            
            
            
          
               
               ////////////THIS IS TO SUM WEEKLY
                        $total_weekly = mysqli_query($connect, "SELECT SUM(equity) as total FROM weekly_allloan WHERE date_format BETWEEN '$start' AND '$end' AND equity > 0");      
                          while  ($row = mysqli_fetch_array($total_weekly)){
                          $summation_weekly = $row['total'];                          
                          }
                            
                 
                          
                     $summation =  $summation_weekly;     
                  
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
        
    
        
    }

    
    
    
    
    
    
    
    
    
    
    elseif(isset($_POST['type']) && isset($_POST['start']) && isset($_POST['end']) && isset($_POST['branch'])){ 
       //THIS IS TO SEARCH DAILY                        
        $type = $_POST['type'];  
        $branch = $_POST['branch'];
         $start = $_POST['start'];
            $end = $_POST['end'];
        
        
       ////////**********************END NOT NEEDED**************************************////     
        if($type == "Daily"){
            $date = date("jS F Y");
            //loop through all table rows
            $inc=1;
           
     $result = mysqli_query($connect, "SELECT * FROM allloan WHERE date_format BETWEEN '$start' AND '$end' AND date = '$date' AND equity > 0 ORDER BY  timestamp ASC");
      echo ' <div class="card card-block table-border-style">';       
     echo     '<div class="table-responsive">';            
     echo '<CAPTION><h3 align="center" style="font-size:22px; color: black;">EQUITY PAYED BETWEEN: ['. date("jS F Y", strtotime($start)).'] AND ['.date("jS F Y", strtotime($end)).'] (DAILY)</h3></CAPTION>';
     echo '<table class="table table-bordered table-striped table-hover " align="center">';
      
       echo ' <thead class="thead-dark">';
        
         echo '<tr align = "center">';
         echo '<th>S/N</th>';
         echo '<th>Name (Payer)</th>';
          echo '<th>Type</th>';
           echo '<th>Collected by</th>';
         echo '<th>Time Posted</th>';
           echo '<th>Equity</th>';
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
            
            echo "<td>" .number_format($row['equity'])."</td>"; 

            echo "<td>" . $row['district']."</td>";
              echo "</tr>";
           $inc++;
            }
   
            
            
                ////////////THIS IS TO SUM DAILY
                        $total_repay = mysqli_query($connect, "SELECT SUM(equity) as total FROM allloan WHERE date = '$date' AND equity > 0");      
                          while  ($row = mysqli_fetch_array($total_repay)){
                          $summation_daily = $row['total'];                          
                          }
               
                        ////////////THIS IS TO DAILY INTEREST
                        $total_repay1 = mysqli_query($connect, "SELECT SUM(interest_pay) as total FROM allloan WHERE date='$date' AND equity > 0");      
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
        
           ////////**********************END NOT NEEDED**************************************//// 
            
            
            
            
        }elseif($type == "Monthly"){     
                  $date = date("jS F Y");
            //loop through all table rows
            $inc=1;
           
     $result = mysqli_query($connect, "SELECT * FROM monthly_allloan WHERE date_format BETWEEN '$start' AND '$end' AND equity > 0 AND branch = '$branch' ORDER BY  date_format ASC");
   
       
    echo ' <div class="card card-block table-border-style">';       
     echo     '<div class="table-responsive">';              
     echo '<CAPTION><h3 align="center" style="font-size:22px; color: black;">EQUITY PAYED BETWEEN: ['. date("jS F Y", strtotime($start)).'] AND ['.date("jS F Y", strtotime($end)).'] (MONTHLY) .Branch: '.$branch.'</h3></CAPTION>';
     echo '<table class="table table-bordered table-striped table-hover " align="center">';
      
       echo ' <thead class="thead-dark">';
        
         echo '<tr align = "center">';
         echo '<th>S/N</th>';
         echo '<th>Name (Payer)</th>';
          echo '<th>Type</th>';
           echo '<th>Collected by</th>';
         echo '<th>Date</th>';
           echo '<th>Equity</th>';
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
            echo "<td>" . $row['date']."</td>";
          
            echo "<td>" .number_format($row['equity'])."</td>"; 

            echo "<td>" . $row['district']."</td>";
              echo "</tr>";
           $inc++;
            }
   
            
            
               
                          
                          
               ////////////THIS IS TO SUM MONTHLY PAY
                        $total_repay222 = mysqli_query($connect, "SELECT SUM(equity) as total FROM monthly_allloan WHERE date_format BETWEEN '$start' AND '$end'  AND equity > 0 AND branch = '$branch'");      
                          while  ($row = mysqli_fetch_array($total_repay222)){
                          $summation_monthly = $row['total'];
                                          
                          }
           
              
                      
                       
                    echo "<tr align = 'center'>";
            echo "<td>--------</td>";
            echo "<td>--------</td>";
             echo "<td>--------</td>";
              echo "<td>--------</td>";
            echo "<td align = 'right'>TOTAL: </td>";
            echo "<td style='color: green; font-size: 20px;'>".number_format($summation_monthly)."</td>";  
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
           
     $result1 = mysqli_query($connect, "SELECT * FROM weekly_allloan WHERE date_format BETWEEN '$start' AND '$end' AND equity > 0 AND branch = '$branch' ORDER BY  date_format ASC");
     
     echo ' <div class="card card-block table-border-style">';       
     echo     '<div class="table-responsive">';             
     echo '<CAPTION><h3 align="center" style="font-size:22px; color: black;">EQUITY PAYED BETWEEN: ['. date("jS F Y", strtotime($start)).'] AND ['.date("jS F Y", strtotime($end)).'] (WEEKLY) .Branch: '.$branch.'</h3></CAPTION>';
     echo '<table class="table table-bordered table-striped table-hover " align="center">';
      
       echo ' <thead class="thead-dark">';
        
         echo '<tr align = "center">';
         echo '<th>S/N</th>';
         echo '<th>Name (Payer)</th>';
          echo '<th>Type</th>';
           echo '<th>Collected by</th>';
         echo '<th>Date</th>';
           echo '<th>Equity</th>';
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
            echo "<td>" . $row['date']."</td>";
             
            echo "<td>" . number_format($row['equity'])."</td>"; 
            echo "<td>" . $row['district']."</td>";
              echo "</tr>";
           $inc++;
            }  
            
            
            
          
               
               ////////////THIS IS TO SUM WEEKLY
                        $total_weekly = mysqli_query($connect, "SELECT SUM(equity) as total FROM weekly_allloan WHERE date_format BETWEEN '$start' AND '$end' AND equity > 0 AND branch = '$branch'");      
                          while  ($row = mysqli_fetch_array($total_weekly)){
                          $summation_weekly = $row['total'];                          
                          }
                            
                 
                          
                     $summation =  $summation_weekly;     
                  
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
        
    
        
    }
    
    
    
    



        else if(isset($_POST['view_al22']) && isset($_POST['start']) && isset($_POST['end']) && $_POST['branch'] == ""){
            $inc = 1;
               $start = $_POST['start'];
            $end = $_POST['end'];
        
     $result1 = mysqli_query($connect, "SELECT * FROM weekly_allloan WHERE date_format BETWEEN '$start' AND '$end' AND equity > 0 ORDER BY  date_format ASC");
     $result12 = mysqli_query($connect, "SELECT * FROM monthly_allloan WHERE date_format BETWEEN '$start' AND '$end' AND equity > 0 ORDER BY  date_format ASC");
     
    echo ' <div class="card card-block table-border-style">';       
     echo     '<div class="table-responsive">';            
     echo '<CAPTION><h3 align="center" style="font-size:22px; color: black;">EQUITY PAYED BETWEEN: ['. date("jS F Y", strtotime($start)).'] AND ['.date("jS F Y", strtotime($end)).'] (ALL)</h3></CAPTION>';
     echo '<table class="table table-bordered table-striped table-hover " align="center">';
      
       echo ' <thead class="thead-dark">';
        
         echo '<tr align = "center">';
         echo '<th>S/N</th>';
         echo '<th>Name (Payer)</th>';
          echo '<th>Type</th>';
           echo '<th>Collected by</th>';
         echo '<th>Date</th>';
           echo '<th>Equity</th>';
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
            echo "<td>" . $row['date']."</td>";
        
            echo "<td>" . number_format($row['equity'])."</td>"; 
          
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
            echo "<td>" . $row['date']."</td>";
          
            echo "<td>" . number_format($row['equity'])."</td>"; 
          
            echo "<td>" . $row['district']."</td>";
              echo "</tr>";
           $inc++;
            }  
            
            
            
             
                          
               ////////////THIS IS TO SUM WEEKLY
                        $total_weekly = mysqli_query($connect, "SELECT SUM(equity) as total FROM weekly_allloan WHERE date_format BETWEEN '$start' AND '$end' AND equity > 0 ORDER BY  date_format ASC");      
                          while  ($row = mysqli_fetch_array($total_weekly)){
                          $summation_weekly = $row['total'];                          
                          }
                          
                      
                          
                          ////////////THIS IS TO SUM MONTHLY PAY
                    
                        $total_repay222 = mysqli_query($connect, "SELECT SUM(equity) as total FROM monthly_allloan WHERE date_format BETWEEN '$start' AND '$end' AND equity > 0 ORDER BY  date_format ASC");      
                          while  ($row = mysqli_fetch_array($total_repay222)){
                          $summation_monthly = $row['total'];
                                               
                          }
                          
                    $summation = $summation_weekly + $summation_monthly;
                  
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
    
    
    
    
    
        
        
        
        
          else if(isset($_POST['view_al22']) && isset($_POST['start']) && isset($_POST['end']) && isset($_POST['branch'])){
            $inc = 1;
               $start = $_POST['start'];
            $end = $_POST['end'];
            $branch = $_POST['branch'];
        
     $result1 = mysqli_query($connect, "SELECT * FROM weekly_allloan WHERE date_format BETWEEN '$start' AND '$end' AND equity > 0 AND branch = '$branch' ORDER BY  date_format ASC");
     $result12 = mysqli_query($connect, "SELECT * FROM monthly_allloan WHERE date_format BETWEEN '$start' AND '$end' AND equity > 0 AND branch = '$branch' ORDER BY  date_format ASC");
     
    echo ' <div class="card card-block table-border-style">';       
     echo     '<div class="table-responsive">';            
     echo '<CAPTION><h3 align="center" style="font-size:22px; color: black;">EQUITY PAYED BETWEEN: ['. date("jS F Y", strtotime($start)).'] AND ['.date("jS F Y", strtotime($end)).'] (ALL) .Branch: '.$branch.'</h3></CAPTION>';
     echo '<table class="table table-bordered table-striped table-hover " align="center">';
      
       echo ' <thead class="thead-dark">';
        
         echo '<tr align = "center">';
         echo '<th>S/N</th>';
         echo '<th>Name (Payer)</th>';
          echo '<th>Type</th>';
           echo '<th>Collected by</th>';
         echo '<th>Date</th>';
           echo '<th>Equity</th>';
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
            echo "<td>" . $row['date']."</td>";
        
            echo "<td>" . number_format($row['equity'])."</td>"; 
          
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
            echo "<td>" . $row['date']."</td>";
          
            echo "<td>" . number_format($row['equity'])."</td>"; 
          
            echo "<td>" . $row['district']."</td>";
              echo "</tr>";
           $inc++;
            }  
            
            
            
             
                          
               ////////////THIS IS TO SUM WEEKLY
                        $total_weekly = mysqli_query($connect, "SELECT SUM(equity) as total FROM weekly_allloan WHERE date_format BETWEEN '$start' AND '$end' AND equity > 0 AND branch = '$branch' ORDER BY  date_format ASC");      
                          while  ($row = mysqli_fetch_array($total_weekly)){
                          $summation_weekly = $row['total'];                          
                          }
                          
                      
                          
                          ////////////THIS IS TO SUM MONTHLY PAY
                    
                        $total_repay222 = mysqli_query($connect, "SELECT SUM(equity) as total FROM monthly_allloan WHERE date_format BETWEEN '$start' AND '$end' AND equity > 0 AND branch = '$branch' ORDER BY  date_format ASC");      
                          while  ($row = mysqli_fetch_array($total_repay222)){
                          $summation_monthly = $row['total'];
                                               
                          }
                          
                    $summation = $summation_weekly + $summation_monthly;
                  
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
        
        
        
    
    
    
    
    else {
        
            $date = date("jS F Y");
            // //THIS IS TO VIEW ALL!!!!!!!!!!!!!!!!!!!!!!!!!!!!1 
            $inc=1;
           
//     $result = mysqli_query($connect, "SELECT * FROM allloan WHERE date = '$date' AND equity > 0 ORDER BY  timestamp ASC");
     $result1 = mysqli_query($connect, "SELECT * FROM weekly_allloan WHERE date = '$date' AND equity > 0 ORDER BY  timestamp ASC");
     $result12 = mysqli_query($connect, "SELECT * FROM monthly_allloan WHERE date = '$date' AND equity > 0 ORDER BY  timestamp ASC");
     
    echo ' <div class="card card-block table-border-style">';       
     echo     '<div class="table-responsive">';       
     echo '<CAPTION><h3 align="center" style="font-size:22px; color: black;">EQUITY PAYED TODAY: '.$date.'</h3></CAPTION>';
     echo '<table class="table table-bordered table-striped table-hover " align="center">';
      
       echo ' <thead class="thead-dark">';
        
         echo '<tr align = "center">';
         echo '<th>S/N</th>';
         echo '<th>Name (Payer)</th>';
          echo '<th>Type</th>';
           echo '<th>Collected by</th>';
         echo '<th>Time Posted</th>';
           echo '<th>Equity</th>';
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
        
            echo "<td>" . number_format($row['equity'])."</td>"; 
          
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
          
            echo "<td>" . number_format($row['equity'])."</td>"; 
          
            echo "<td>" . $row['district']."</td>";
              echo "</tr>";
           $inc++;
            }  
            
            
            
             
                          
               ////////////THIS IS TO SUM WEEKLY
                        $total_weekly = mysqli_query($connect, "SELECT SUM(equity) as total FROM weekly_allloan WHERE date='$date' AND equity > 0");      
                          while  ($row = mysqli_fetch_array($total_weekly)){
                          $summation_weekly = $row['total'];                          
                          }
                          
                      
                          
                          ////////////THIS IS TO SUM MONTHLY PAY
                    
                        $total_repay222 = mysqli_query($connect, "SELECT SUM(equity) as total FROM monthly_allloan WHERE date='$date' AND equity > 0");      
                          while  ($row = mysqli_fetch_array($total_repay222)){
                          $summation_monthly = $row['total'];
                                               
                          }
                          
                    $summation = $summation_weekly + $summation_monthly;
                  
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
    
    
    
    
   
    
    
</body>

</html>
