<?php
session_start();
    include 'connection.php';
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Loan Request Page</title>
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
  
  <style>
       .header-navbar .navbar-wrapper .navbar-container .nav-right li .sidebar_toggle a {
            display: none;
    }
  </style>   
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
                                            <h5 class="m-b-10">Dashboard</h5>
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
                                      
     
  <?php
    if(isset($_POST['submit_amt'])){
        $_SESSION['store_amt'] = $_POST['amt'];
              $store_amt1 = $_SESSION['store_amt'];  
           $store_amt = number_format($store_amt1);
        echo "<script type='text/javascript'> $(document).ready(function(){ 
                swal({
                         title: 'Success!',
                         text: '$store_amt Naira has been approved.',
                         icon: 'success',
                        buttons: {
                            confirm : {text:'Ok',className:'sweet-orange'},
                          
                        },
                        closeOnClickOutside: false
                       })
                  
                }); </script>";
        
            }
  
  ?>
  <div class="modal fade" id="myModal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Please Fill Amount Approved</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <form name="loan" action="loan_request.php" method="POST" enctype="multipart/form-data">
       
        <!-- Modal body -->
        <div class="modal-body">
            <input type="number" class="form-control" name="amt" required="" placeholder="Enter Amount" autofocus="true"/>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="submit" class="btn btn-success" name="submit_amt">Submit</button>
        </div>
         </form>
      </div>
    </div>
  </div>
  

            <?php
            
            //loop through all table rows
           
         
          if(isset($_GET['idd'])){
              $id=$_GET['idd'];
    $query = "DELETE FROM request_loan WHERE id = '$id'"; 
    $result23 = mysqli_query($connect, $query);  
    echo "<script type='text/javascript'> $(document).ready(function(){ 
                swal({
                         title: 'Success!',
                         text: 'Request Deleted',
                         icon: 'success',
                        buttons: {
                            confirm : {text:'Ok',className:'sweet-orange'},
                          
                        },
                        closeOnClickOutside: false
                       })
                  
                }); </script>";
          }
             
         
   
          
          if(isset($_GET['idda'])){
           $get_id = $_GET['idda']; 
          $type = $_GET['type'];
          $namee = $_GET['name'];
          $collector = $_GET['collector'];
          $request_disburseloan = $_GET['request_disburseloan'];
//          if ($permission != "") {
//              echo "<script>alert('$namee has been granted OTP for this transaction.')</script>";
//          } else {
          
          $update_status = mysqli_query($connect, "UPDATE request_loan SET status = 'Approved' WHERE name = '$namee'");
          
         @$approved_amt1 = $_SESSION['store_amt'] ;
          @$approved_amt = number_format($approved_amt1) ;
          
          if($approved_amt1 == ""){
              $approved_amt1 = $request_disburseloan;
              $approved_amt = number_format($request_disburseloan);
          }
          
        $pass_permit = rand(10, 10000);
       $sql_update_permit = "UPDATE staff SET disburse_permission = '$pass_permit', disburse_type = '$type', disburse_name = '$namee', disburse_id = '$get_id', approved_amt = '$approved_amt1' WHERE namee = '$collector'";
       $result = mysqli_query($connect, $sql_update_permit);
                
            if($result == true){
                echo "<script type='text/javascript'> $(document).ready(function(){ 
                swal({
                         title: 'Success!',
                         text: 'OTP: $pass_permit for one time access is granted strictly to $type [Disbursement] for $namee and can only be accessed by $collector. Approved amount is $approved_amt Naira.',
                         icon: 'success',
                        buttons: {
                            confirm : {text:'Ok',className:'sweet-orange'},
                          
                        },
                        closeOnClickOutside: false
                       })
                  
                }); </script>";
      
            }
//        }
            
            $_SESSION['store_amt'] = "";
      } 
          
          
          
          
          
          
          
          
          
          
      
           $inc=1;
      $sql_state11 = "SELECT * FROM request_loan ORDER BY id DESC";      
      $result = mysqli_query($connect, $sql_state11);
           
            
         echo ' <div class="card card-block table-border-style">';       
     echo     '<div class="table-responsive">';  
                 echo '<CAPTION><h3 align="center" style="font-size:20px; color: black;"> LOAN REQUEST. </h3></CAPTION>';
    echo '<table class="table table-bordered table-striped " align="center">';
    
     echo '<thead class="thead-dark">';
         echo '<tr align = "center">';
         echo '<th>S/N</th>';
         echo '<th>Name</th>'; 
         echo '<th>Type</th>';
          echo '<th>Branch</th>';
          echo '<th>Staff</th>';
            echo '<th>Requested Amount</th>'; 
              echo '<th>Approved Amount</th>';  
            echo '<th>Date Requested</th>';
              echo '<th>Outstanding</th>';
              echo '<th>District</th>';
            echo '<th>Proposed S_Date</th>';
          
              echo '<th>Status</th>';
              echo '<th>State</th>';
                echo '<th>Approve Amount</th>';
              echo '<th>Delete</th>';
      
          echo '</tr>';   
            echo '</thead>';

    echo '<tbody class="" style="font-family: sans-serif; color:black ; font-weight:bold;">';
     while ($row=mysqli_fetch_array($result)){
             $staff_full_name = $row['collector_name'];
            echo "<tr align = 'center'>";
            echo "<td>" .$inc."</td>";
            echo "<td>" .$row['name']."</td>";
               echo "<td>" .$row['type']."</td>";
            echo "<td>" .$row['branch']."</td>";
            echo "<td>" .$staff_full_name."</td>";
             echo "<td style='color: red;'>" .number_format($row['request_disburseloan'])."</td>";
             echo "<td style='color: green;'>" .number_format($row['approved_disburseloan'])."</td>";
              echo "<td>" .$row['date']."</td>";
                 echo "<td style='color: blue;'>" .number_format($row['outstanding'])."</td>";
            echo "<td>" .$row['district']."</td>";
            $output_startdate = date('d-M-Y', strtotime($row['startdate']));
            echo "<td>" .$output_startdate."</td>";
          
            echo "<td>" .$row['status']."</td>";
                  if($row['status'] == "Approved"){
       echo "<td ><a style='color: #ff9900;' href='#?idd=" . $row['id']. "&name=" . $row['name']. "&type=".$row['type']."&request_disburseloan=".$row['request_disburseloan']."&district=".$row['district']."&startdate=".$row['startdate']."&collector=".$row['collector']."&status=".$row['status']."&staff_full_name=".$row['collector_name']."'>Settled</a></td>";
                     
                  } else {
                      
                  //THIS IS FOR CONSIDERATION STATE
                            if($row['type'] == "Daily Payment"){
                    echo "<td ><a style='color: #ff9900;'  href='get_loan.php?idd=" . $row['id']. "&name=" . $row['name']. "&type=".$row['type']."&request_disburseloan=".$row['request_disburseloan']."&district=".$row['district']."&startdate=".$row['startdate']."&collector=".$row['collector']."&status=".$row['status']."&staff_full_name=".$row['collector_name']."&outstanding=".$row['outstanding']."'>Consider</a><br><a onclick=\"javascript: return $(document).ready(function(){ 
        
                    swal({
                        title: 'Are you sure?',
                        text: 'Please approve amount before granting OTP. Grant OTP for this transaction?',
                        icon: 'warning',
                        buttons: true,
                        dangerMode: true
                      })
                      .then((willDelete) => {
                        if (willDelete) {
                     document.getElementById('oya1').click();   
                        } else {
                          swal('Not Granted!');
                               return false;
                        }
                     });
           
          }); \" href='#'>Grant OTP</a> </td>";
               echo  "<a style='color:white;' id='oya1' href='loan_request.php?idda=" . $row['id']. "&name=" . $row['name']. "&type=".$row['type']."&collector=".$row['collector_name']."&get_name=".$row['name']."&request_disburseloan=".$row['request_disburseloan']."'>Grant OTP</a>";             
                   
               
               
               
               
                            } else if($row['type'] == "Weekly Payment") {  
                                
                                
                                
                                
                  echo "<td ><a style='color: #ff9900;'  href='get_loan_weekly.php?idd=" . $row['id']. "&name=" . $row['name']. "&type=".$row['type']."&request_disburseloan=".$row['request_disburseloan']."&district=".$row['district']."&startdate=".$row['startdate']."&collector=".$row['collector']."&status=".$row['status']."&staff_full_name=".$row['collector_name']."&outstanding=".$row['outstanding']."'>Consider</a><br><a onclick=\"javascript: return $(document).ready(function(){ 
        
                    swal({
                        title: 'Are you sure?',
                        text: 'Please approve amount before granting OTP. Grant OTP for this transaction?',
                        icon: 'warning',
                        buttons: true,
                        dangerMode: true
                      })
                      .then((willDelete) => {
                        if (willDelete) {
                     document.getElementById('oya2').click();   
                        } else {
                          swal('Not Granted!');
                               return false;
                        }
                     });
           
          });\" href='#'>Grant OTP</a> </td>";
                          
                 echo  "<a style='color:white;' id='oya2' href='loan_request.php?idda=" . $row['id']. "&name=" . $row['name']. "&type=".$row['type']."&collector=".$row['collector_name']."&get_name=".$row['name']."&request_disburseloan=".$row['request_disburseloan']."'>Grant OTP</a>";             
                
                  
                  
                  
                  
                  
                            }  else {
                        echo "<td ><a style='color: #ff9900;'  href='monthly_get_loan.php?idd=" . $row['id']. "&name=" . $row['name']. "&type=".$row['type']."&request_disburseloan=".$row['request_disburseloan']."&district=".$row['district']."&startdate=".$row['startdate']."&collector=".$row['collector']."&status=".$row['status']."&staff_full_name=".$row['collector_name']."&outstanding=".$row['outstanding']."'>Consider</a><br><a onclick=\"javascript: return $(document).ready(function(){ 
        
                    swal({
                        title: 'Are you sure?',
                        text: 'Please approve amount before granting OTP. Grant OTP for this transaction?',
                        icon: 'warning',
                        buttons: true,
                        dangerMode: true
                      })
                      .then((willDelete) => {
                        if (willDelete) {
                     document.getElementById('oya3').click();   
                        } else {
                          swal('Not Granted!');
                               return false;
                        }
                     });
           
          });\" href='#'>Grant OTP</a> </td>";

               echo  "<a style='color:white;' id='oya3' href='loan_request.php?idda=" . $row['id']. "&name=" . $row['name']. "&type=".$row['type']."&collector=".$row['collector_name']."&get_name=".$row['name']."&request_disburseloan=".$row['request_disburseloan']."'>Grant OTP</a>";             
                          
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                            }
             }
             echo "<td data-toggle='modal' data-target='#myModal' style='text-decoration:underline;'>Click Here</td>";             
     echo "<td ><a style='color:brown;' id='check_delete' href='loan_request.php?idd=" . $row['id']. "&type=".$row['type']."&request_disburseloan=".$row['request_disburseloan']."&district=".$row['district']."&startdate=".$row['startdate']."&collector=".$row['collector']."'>Delete</a></td>";
      
            
            echo "</tr>";
            $inc++;
         }
            
            
          echo ' </tbody>';
            echo ' </table>';
            echo '</div>';
            echo '</div>';
  
            
           
            
            ?>
  
  
  
   <script>
       /////////THIS IS TO CHECK BEFORE FINAL DELETION////////
              $(document).ready(function () {
               
        $("#check_delete").click(function () {
              
     
             var  del_check = confirm("DO YOU WISH TO CONTINUE WITH DELETE?");
                
                if(del_check===true){
                    return true;
                     } else {
                        return false;
                     }
                   
                });
                
         });
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
                 window.location = "debtors.php";
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
          
        
    
</body >

</html>
