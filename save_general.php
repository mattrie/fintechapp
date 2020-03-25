<!DOCTYPE html>

<?php
session_start();
    include 'connection.php';
    ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Statement</title>
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
                                            <h5 class="m-b-10">Savings Statement</h5>
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
                
                                        
               
<!--                 <form name="monthyear" action="save_general.php" method="POST" enctype="multipart/form-data">
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
               <button  name="month_year" class="select_time" style="font-weight: bold; border-radius: 8px; padding:7px; font-style:italic ; font-size: 14px; background-color:green; color: whitesmoke; cursor: pointer; margin-bottom: 10px;">Search</button>
         
               </form>                         
                                        -->
                                        
                                     <?php
                                     
        if(isset($_POST['month_year'])){
            $monthall = $_POST['months'];
            $yearall = $_POST['years'];
             $inc=1;
           
     $result = mysqli_query($connect, "SELECT * FROM contribution WHERE month = '$monthall' AND year = '$yearall' AND single = 'head' ORDER BY name");
        echo '<div class="container-fluid">';
     echo     '<div class="table-responsive-sm text-nowrap">';             
     echo '<CAPTION><h3 align="center" style="font-size:22px; color:black;">SAVINGS & WITHDRAWAL FOR: '.$monthall .' - '. $yearall.'</h3></CAPTION>';
      echo '<table class="table table-bordered table-striped table-sm  table-hover " style="font-size:16px;" align="center">';
      
       echo ' <thead class="thead-dark">'; 
        
         echo '<tr align = "center">';
         echo '<th>S/N</th>';
         echo '<th>Name</th>';        
         echo '<th>District</th>';
         echo '<th>Rate</th>';          
         echo '<th>Savings</th>';
         echo '<th>Withdraws</th>';
         echo '<th>Balance</th>';
         echo '<th>Status</th>';
         echo '<th>View Details</th>';
            
          echo '</tr>';  
           echo '</thead>';

    echo '<tbody class="" style="font-family: sans-serif; color:black ; font-weight:bold;">';
     while ($row=mysqli_fetch_array($result)){

       
         
            echo "<tr align = 'center'>";
            echo "<td>" . $inc."</td>";
            echo "<td>" . $row['name']."</td>";
               echo "<td>" . $row['district']."</td>"; 
            echo "<td>" . $row['rate']."</td>";              
            echo "<td style='color: green; '>" . $row['amountmonth']."</td>"; 
            echo "<td style='color: red;'>" . $row['withdrawmonth']."</td>";
//            if($row['amountmonth'] == "" || $row['withdrawmonth'] = ""){
//                $row['amountmonth'] = 0;
//                $row['withdrawmonth'] = 0;
//            }
          $balance = $row['amountmonth'] - $row['withdrawmonth']; 
            echo "<td>" .$balance."</td>";  
        if($row['amountmonth'] > $row['withdrawmonth']){ $status = 'P';} else {$status = 'CL';};
            echo "<td>" .$status."</td>";
     echo "<td ><a style='color:#666600;' href='statement_time.php?name=" . $row['name']. "&month=".$monthall. "&year=".$yearall."'>View details</a></td>";
           
            echo "</tr>";
            $inc++;
            }
            
            
       ///////THIS IS TO GET TOTAL BALANCE FOR THE MONTH     
            $sql = mysqli_query($connect, "SELECT SUM(amount) as total FROM contribution WHERE month = '$monthall' AND year = '$yearall'");
           while  ($row3 = mysqli_fetch_array($sql)){
              $summation_amount = $row3['total'];                          
              }
              
              
               $sql = mysqli_query($connect, "SELECT SUM(withdraw) as total FROM contribution WHERE month = '$monthall' AND year = '$yearall'");
           while  ($row3 = mysqli_fetch_array($sql)){
              $summation_withdraw = $row3['total'];                          
              }
              
             $bala = $summation_amount - $summation_withdraw; 
             echo  "<tr align = 'center'>";
            echo "<td colspan='5'></td>";
           echo "<td style='color: black; font-size: 22px;'>Total Balance:</td>"; 
            echo "<td style='color: black; font-size: 20px;'>" . $bala."</td>"; 
            echo "<td colspan='3'></td>";
             echo "</tr>";
            
            
            echo ' </tbody>';
          echo ' </table>';
     
           echo '</div>' ;
            echo '</div>' ; 
            
            
            
            
        } else {  
            
            
            
            
                                     
             //loop through all table rows
            $inc=1;
           
      
           
        $result = mysqli_query($connect, "SELECT * FROM members WHERE save_balance > 0 ORDER BY id DESC");     
           
      echo ' <div class="card">';
         echo '<div class="card-block table-border-style">';
     echo     '<div class="table-responsive" >'; 
                 echo '<CAPTION><h3 align="center" style="font-size:20px; color: black;"> ALL TOTAL SAVINGS & WITHDRAWAL</h3></CAPTION>';
    echo '<table class="table table-bordered table-striped   table-hover " >';
    
       echo ' <thead class="thead-dark">'; 
        
         echo '<tr align = "center">';
      echo '<th>S/N</th>';
         echo '<th>Name</th>';
        
         echo '<th>District</th>';
         echo '<th>Telephone</th>';          
           echo '<th>Savings</th>';
             echo '<th>Withdraws</th>';
               echo '<th>Balance</th>';
               echo '<th>Status</th>';
             echo '<th>View Details</th>';
          echo '</tr>';   
               echo '</thead>';

    echo '<tbody class="" style="font-family: sans-serif; color:black ; font-weight:bold;">';
    
    
     $sql = mysqli_query($connect, "SELECT SUM(save_balance) as total FROM members WHERE save_balance > 0");
           while  ($row3 = mysqli_fetch_array($sql)){
              $summation_bal = $row3['total'];                          
              }
             echo  "<tr align = 'center'>";
            echo "<td colspan='5'></td>";
           echo "<td style='color: black; font-size: 20px;'>Total Balance:</td>"; 
            echo "<td style='color: black; font-size: 20px;'>" . number_format($summation_bal)."</td>"; 
            echo "<td colspan='3'></td>";
             echo "</tr>";
    
           while ($row=mysqli_fetch_array($result)){

       
         
            echo "<tr align = 'center'>";
            echo "<td>" . $inc."</td>";
            echo "<td>" . $row['namee']."</td>";
            
            echo "<td>" . $row['registration_num']."</td>"; 
            echo "<td>" . $row['telephone']."</td>";         
            echo "<td style='color: green; '>" . $row['savings']."</td>"; 
            echo "<td style='color: red;'>" . $row['loan']."</td>";
            echo "<td>" . $row['save_balance']."</td>";  
        if($row['savings'] > $row['loan']){ $status = 'P';} else {$status = 'CL';};
            echo "<td>" .$status."</td>";
     echo "<td ><a style='color:#666600;' href='save_contribution.php?name=" . $row['namee']. "'>View details</a></td>";
           
            echo "</tr>";
            $inc++;
            }
            
            
             
            
                ////////////THIS IS TO SUM CONTRIBUTION
//                        $total_savings = mysqli_query($connect, "SELECT SUM(amount) as total FROM contribution WHERE name='$name'");      
//                          while  ($row = mysqli_fetch_array($total_savings)){
//                          $summation = $row['total'];                          
//                          }
//                            
//                            ////////////THIS IS TO SUM WITHDRAWAL
//                            $total_savings1 = mysqli_query($connect, "SELECT SUM(amount) as total FROM witdraw WHERE name='$name'");      
//                          while  ($row1 = mysqli_fetch_array($total_savings1)){
//                          $summation1 = $row1['total'];                          
//                          }
//                          
//                       $actual_savings =  $summation - $summation1;
//            
//            
            
            
            echo ' </tbody>';
          echo ' </table>';
       echo '</div>';
            echo '</div>';    
           echo '</div>' ;
            echo '</div>' ; 
          
  
  
  
                             
            ///////////////////////////////////////////////////////////////////////////////////
            ///////////////////////////////////////////////////////////////////////////////////
            
            
            
            
            
            
            
            
           } 
            
            
            
         
          
            
            ?>
  
  
  
   <script>
   
    //Function 4     FUNCTION IN A FUNCTION (ADD NEW OVERHEAD TO DATABASE) 
        
    
    
            
   </script>
   
   
   
     <script>
         $(document).ready(function() {          
              var pena_java = $(".pena_java"); //LINK TO GO AND VIEW ALL DEBTORS   
    $(pena_java).click(function(e){
            e.preventDefault(); 
                 
              
                     var perc_java = document.getElementById("perc_java").value;
                     var name = document.getElementById("name").value;
                     var codename = document.getElementById("codename").value;
                     var type = document.getElementById("type").value;
                     var district = document.getElementById("district").value;
                     var av_bal = document.getElementById("av_bal").value;
                     
             
             
              if (window.XMLHttpRequest)
                  {// code for IE7+, Firefox, Chrome, Opera, Safari
                        xmlhttp=new XMLHttpRequest();
                  }
                else
                  {// code for IE6, IE5
                  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                  }     
                    
            
                           if(perc_java !== "" ){
                   xmlhttp.open("GET","penalty_calculate.php?perc_java="+perc_java+"&name="+name+"&codename="+codename+"&type="+type+"&district="+district+"&av_bal="+av_bal,true);
                                 xmlhttp.send();                
                                 xmlhttp.onreadystatechange = function(){                                   
                      if(xmlhttp.readyState ===4 && xmlhttp.status===200) {
                
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
                 window.location = "savings.php";
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
