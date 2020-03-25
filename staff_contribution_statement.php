<?php
session_start();
    include 'connection.php';
    
    if (@$_SESSION['staff_store_message_contribution'] != "") {
     echo $_SESSION['staff_store_message_contribution'];
           $_SESSION['staff_store_message_contribution'] = "";
}
    
    ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Staff Statement</title>
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
                                            <h5 class="m-b-10">Dashboard</h5>
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
           <!--**********************************************************************************-->                                 
           <div class="row" style="margin-left: 200px;">
               <div class="col-sm-4" >
                  
                   <form  action="staff_contribution_statement.php" method="POST" enctype="multipart/form-data">
                   <select name="months" id="months"  required="">
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
               
                   <select name="years1" id="years1" required="">
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
               <input type="submit"  name="month_year" value="Search Month" class="select_month" style="font-weight: bold; border-radius: 8px; padding:7px; font-style:italic ; font-size: 14px; background-color:green; color: whitesmoke; cursor: pointer;">
         
               </form>
                </div>
               
               
               
               
               
               
           <div class="col-sm-4">
               <form  action="staff_contribution_statement.php" method="POST" enctype="multipart/form-data">
                 
               
                     <select name="year_alone2" id="year_a" required="">
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
               <button  name="year_a2" class="select_year" style="font-weight: bold; border-radius: 8px; padding:7px; font-style:italic ; font-size: 14px; background-color:green; color: whitesmoke; cursor: pointer;">Search Year</button>
         
               </form>
               </div>
                   
                   
                     <div class="col-sm-4">
          <!--SHOW ALL-->
          
          <form action="staff_contribution_statement.php" method="POST" enctype="multipart/form-data">
             
              <a style="border-radius: 8px; padding:8px; font-style:italic ; font-size: 18px; background-color:green; color: whitesmoke; cursor: pointer" class="btn" href="staff_contribution_statement.php">VIEW ALL</a> <br>
     
          </form>
             </div>
                   
                   
             </div>  
           <br>
          <!--**********************************************************************************-->                               
       <!--**********************************************************************************-->                               
                <?php
                                     
                                     
                                     
             //loop through all table rows
            $inc=1;
           if(@$_GET['name'] != ""){
       $_SESSION['store_name'] = $_GET['name'];
           }
       @$name = $_SESSION['store_name'];
       
        $sql_state = "SELECT * FROM contribution WHERE name = '$name' ORDER BY id DESC";
            $result = mysqli_query($connect, $sql_state);
            echo '<div class="container">';
       ////SELECT NAME FROM DATABASE TO LOAD PASSPORT TEL & ADDRESS
   $debtor_info = mysqli_query($connect, "SELECT * FROM members WHERE namee = '$name'");        
        while($row_info = mysqli_fetch_assoc($debtor_info)){
             $address = $row_info['addresss'];
             $tel = $row_info['telephone'];
              $image = $row_info['imagess'];
        }     
   
      
        echo '<div class="row">';
        
         echo '<div class="col-sm-5" >';
         echo "<p style='font-size:18px; color:black; margin-bottom:30px; margin-left: 35px;'>";
         echo "<label>Name: ". $name ."</label><br>";
          echo "<label>Tel: ". $tel ."</label><br>";
          echo "<label>Address: ". $address ."</label><br>";
         
         
      
        echo "<p>";
          /////CREATE HIDDEN INPUT TEXTBOX TO CARRY VALUES TO JAVASCRIPT 

//        PLEASE NOTE THAT YOU HAVE TO USE SOME "\" TO AVOID BRAKE SPACE IN NAMES
       echo "<input type='hidden' value=\"".$name. "\" id = 'name'/>"; 

       
           echo "</div>";
           
          
           
           
           
           
           
           
           
           
           
           
           
           

               //=========+++++++++++++++++++++++++++MONTH DISPLAY
           if (isset($_POST['month_year'])) {
                
             $months = $_POST['months'];  
              $years1 = $_POST['years1'];  
            $name = $_SESSION['store_name'];
            $sql_state = "SELECT * FROM contribution WHERE name = '$name' AND month = '$months' AND year = '$years1' ORDER BY id DESC";
            $result = mysqli_query($connect, $sql_state);   
              
              
        echo '<div class="col-sm-3">';
       echo "<a class='btn' style='color: whitesmoke; background-color: green; margin-right: 10px;' href='staff_contribution.php?name=" . $name. "'>Contribute</a>";
//        echo "<a class='btn' style='color: whitesmoke; background-color: red;' href='contribution_withdrawal.php?name=" . $name. "'>Withdraw</a>";
       echo "<br><a href='staff_contribution.php' style='color:blue;'>Click Here for Blank Payment Panel</a>"; 
         echo "</div>";
        
        echo '<div class="col-sm-4">';
          echo '<div  style="margin-left: 40px; width:140px; height:140px;">
            <img id="img" src="'.$image.'" alt="THIS IS LOADS PHOTO"  style="border: 4px #99ff99 solid; width:140px; height:140px;" >
              </div>'; 
          echo "</div>";
           echo "</div>";
           
           
           
           
  
     echo ' <div class="card card-block table-border-style">';            echo     '<div class="table-responsive">';   
                 echo '<CAPTION><h3 align="center" style="font-size:20px; color: black;"> '.$name.' '.$months.' - '.$years1.'[CONTRIBUTION/WITHDRAWALS]. </h3></CAPTION>';
    echo '<table class="table table-bordered table-striped   table-hover " >';
    
       echo ' <thead class="thead-dark">'; 
        
         echo '<tr align = "center">';
         echo '<th>S/N</th>';
         echo '<th>Date</th>';         
         echo '<th>Credit</th>';
         echo '<th>Debit</th>';
         echo '<th>Current Balance</th>';
         
          echo '</tr>';   
               echo '</thead>';

    echo '<tbody class="" style="font-family: sans-serif; color:black ; font-weight:bold;">';
           $sql_state1 = "SELECT SUM(amount) as totalx FROM contribution WHERE name = '$name' AND month = '$months' AND year = '$years1'";
            $result1 = mysqli_query($connect, $sql_state1);  
         while ($row= mysqli_fetch_assoc($result1)){  
             $sum_contribute = $row['totalx'];
         }
         
         
          $sql_state2 = "SELECT SUM(withdraw) as totaly FROM contribution WHERE name = '$name' AND month = '$months' AND year = '$years1'";
            $result2 = mysqli_query($connect, $sql_state2);  
         while ($row= mysqli_fetch_assoc($result2)){  
             $sum_withdraw = $row['totaly'];
         }
         
       $current_amount = $sum_contribute - $sum_withdraw;
         
           echo "<tr align = 'center'>";
        echo '<td></td>';
        echo '<td></td>';
            echo "<td style='color: green;  font-size: 22px;'>" . number_format($sum_contribute)."</td>"; 
            echo "<td style='color: red; font-size: 22px;'>" . number_format($sum_withdraw)."</td>";
            echo "<td style='color: black; font-size: 22px;'>" .  number_format($current_amount)."</td>";  
            echo "</tr>";
           
     while ($row=mysqli_fetch_array($result)){

       
         
            echo "<tr align = 'center'>";
            echo "<td>" . $inc."</td>";
            echo "<td>" . $row['date']."</td>";
            echo "<td style='color: green; '>" . $row['amount']."</td>"; 
            echo "<td style='color: red;'>" . $row['withdraw']."</td>";
                 echo '<td></td>';
            echo "</tr>";
            $inc++;
            }
          
            
            
       
   
            
            echo ' </tbody>';
          echo ' </table>';
     
           echo '</div>' ;
            echo '</div>' ; 
          
   //=========+++++++++++++++++++++++++++END MONTH DISPLAY
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
               } 
               
               else 
                   
                   //=========+++++++++++++++++++++++++++YEAR DISPLAY
           if (isset($_POST['year_a2'])) {
                
             
              $years1 = $_POST['year_alone2'];  
            $name = $_SESSION['store_name'];
            $sql_state = "SELECT * FROM contribution WHERE name = '$name'  AND year = '$years1' ORDER BY id DESC";
            $result = mysqli_query($connect, $sql_state);   
              
              
        echo '<div class="col-sm-3">';
       echo "<a class='btn' style='color: whitesmoke; background-color: green; margin-right: 10px;' href='staff_contribution.php?name=" . $name. "'>Contribute</a>";
//        echo "<a class='btn' style='color: whitesmoke; background-color: red;' href='contribution_withdrawal.php?name=" . $name. "'>Withdraw</a>";
       echo "<br><a href='staff_contribution.php' style='color:blue;'>Click Here for Blank Payment Panel</a>"; 
         echo "</div>";
        
        echo '<div class="col-sm-4">';
          echo '<div  style="margin-left: 40px; width:140px; height:140px;">
            <img id="img" src="'.$image.'" alt="THIS IS LOADS PHOTO"  style="border: 4px #99ff99 solid; width:140px; height:140px;" >
              </div>'; 
          echo "</div>";
           echo "</div>";
           
           
           
           
  
     echo ' <div class="card card-block table-border-style">';            echo     '<div class="table-responsive">';   
                 echo '<CAPTION><h3 align="center" style="font-size:20px; color: black;"> '.$name.' '.$years1.'[CONTRIBUTION/WITHDRAWALS]. </h3></CAPTION>';
    echo '<table class="table table-bordered table-striped   table-hover " >';
    
       echo ' <thead class="thead-dark">'; 
        
         echo '<tr align = "center">';
         echo '<th>S/N</th>';
         echo '<th>Date</th>';         
         echo '<th>Credit</th>';
         echo '<th>Debit</th>';
         echo '<th>Current Balance</th>';
         
          echo '</tr>';   
               echo '</thead>';

    echo '<tbody class="" style="font-family: sans-serif; color:black ; font-weight:bold;">';
           $sql_state1 = "SELECT SUM(amount) as totalx FROM contribution WHERE name = '$name'  AND year = '$years1'";
            $result1 = mysqli_query($connect, $sql_state1);  
         while ($row= mysqli_fetch_assoc($result1)){  
             $sum_contribute = $row['totalx'];
         }
         
         
          $sql_state2 = "SELECT SUM(withdraw) as totaly FROM contribution WHERE name = '$name'  AND year = '$years1'";
            $result2 = mysqli_query($connect, $sql_state2);  
         while ($row= mysqli_fetch_assoc($result2)){  
             $sum_withdraw = $row['totaly'];
         }
         
       $current_amount = $sum_contribute - $sum_withdraw;
         
           echo "<tr align = 'center'>";
        echo '<td></td>';
        echo '<td></td>';
            echo "<td style='color: green;  font-size: 22px;'>" . number_format($sum_contribute)."</td>"; 
            echo "<td style='color: red; font-size: 22px;'>" . number_format($sum_withdraw)."</td>";
            echo "<td style='color: black; font-size: 22px;'>" .  number_format($current_amount)."</td>";  
            echo "</tr>";
           
     while ($row=mysqli_fetch_array($result)){

       
         
            echo "<tr align = 'center'>";
            echo "<td>" . $inc."</td>";
            echo "<td>" . $row['date']."</td>";
            echo "<td style='color: green; '>" . $row['amount']."</td>"; 
            echo "<td style='color: red;'>" . $row['withdraw']."</td>";
                 echo '<td></td>';
            echo "</tr>";
            $inc++;
            }
          
            
            
       
   
            
            echo ' </tbody>';
          echo ' </table>';
     
           echo '</div>' ;
            echo '</div>' ; 
          
   //=========+++++++++++++++++++++++++++END YEAR DISPLAY  
               }
               
               
               
               
               
               
               
               
               
               
               
               
               
               
               
               
               
               
               
               else {
                   
                   
                   
                   
                   
                   
       
        //=========+++++++++++++++++++++++++++GENERAL DISPLAY
        echo '<div class="col-sm-3">';
       echo "<a class='btn' style='color: whitesmoke; background-color: green; margin-right: 10px;' href='staff_contribution.php?name=" . $name. "'>Contribute</a>";
//        echo "<a class='btn' style='color: whitesmoke; background-color: red;' href='contribution_withdrawal.php?name=" . $name. "'>Withdraw</a>";
        echo "<br><a href='staff_contribution.php' style='color:blue;'>Click Here for Blank Payment Panel</a>"; 
         echo "</div>";
        
        echo '<div class="col-sm-4">';
          echo '<div  style="margin-left: 40px; width:140px; height:140px;">
            <img id="img" src="'.$image.'" alt="THIS IS LOADS PHOTO"  style="border: 4px #99ff99 solid; width:140px; height:140px;" >
              </div>'; 
          echo "</div>";
           echo "</div>";
           
           
           
           
  
     echo ' <div class="card card-block table-border-style">';            echo     '<div class="table-responsive">';   
                 echo '<CAPTION><h3 align="center" style="font-size:20px; color: black;"> '.$name.' [CONTRIBUTION/WITHDRAWALS]</h3></CAPTION>';
    echo '<table class="table table-bordered table-striped   table-hover " >';
    
       echo ' <thead class="thead-dark">'; 
        
         echo '<tr align = "center">';
         echo '<th>S/N</th>';
         echo '<th>Date</th>';         
         echo '<th>Credit</th>';
         echo '<th>Debit</th>';
         echo '<th>Current Balance</th>';
         
          echo '</tr>';   
               echo '</thead>';

    echo '<tbody class="" style="font-family: sans-serif; color:black ; font-weight:bold;">';
           $sql_state1 = "SELECT * FROM members WHERE namee = '$name'";
            $result1 = mysqli_query($connect, $sql_state1);  
         while ($row= mysqli_fetch_assoc($result1)){  
           echo "<tr align = 'center'>";
        echo '<td></td>';
        echo '<td></td>';
        if($row['savings'] == ""){$row['savings'] = 0;}
            echo "<td style='color: green;  font-size: 22px;'>" . number_format($row['savings'])."</td>"; 
            echo "<td style='color: red; font-size: 22px;'>" . $row['loan']."</td>";
            echo "<td style='color: black; font-size: 22px;'>" .  number_format($row['save_balance'])."</td>";  
            echo "</tr>";
           }
     while ($row=mysqli_fetch_array($result)){

       
         
            echo "<tr align = 'center'>";
            echo "<td>" . $inc."</td>";
            echo "<td>" . $row['date']."</td>";
            echo "<td style='color: green; '>" . $row['amount']."</td>"; 
            echo "<td style='color: red;'>" . $row['withdraw']."</td>";
                 echo '<td></td>';
            echo "</tr>";
            $inc++;
            }
          
            
            
       
   
            
            echo ' </tbody>';
          echo ' </table>';
     
           echo '</div>' ;
            echo '</div>' ; 
          
   //=========+++++++++++++++++++++++++++END GENERAL DISPLAY
  
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
