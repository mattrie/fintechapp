<?php
session_start();

    include 'connection.php';
    
   
  ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>REQUEST REVERSAL</title>
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
                                            <h5 class="m-b-10">REQUEST REVERSAL</h5>
                                            <p class="m-b-0">Request For Reversal Entry</p>
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
                                        
               <div class="row">
                 <div class="col-sm-3">
                     
                 </div> 
                 
             <?php
           //THIS IS TO AUTOMATICALLY RETRIEVE OTP      
                $otp = "";
              $staff_name = $_SESSION['staff_full_name'];
       $sql_get_permission = "SELECT * FROM staff WHERE namee = '$staff_name'";   
             $result1 = mysqli_query($connect, $sql_get_permission); 
            while($row = mysqli_fetch_assoc($result1)){
                $otp = $row['permission'];
                $check_codename = $row['code_permit']; 
            } 
                
              $_SESSION['store_otp'] = $otp;
            
            
            
              //THIS IS TO SUBMIT CODENAME 
        if(isset($_POST['btn_sub'])){
             $set_codename = $_POST['submit_codename'];
              $set_reason1 = $_POST['reason'];
               $submit_amount = str_replace(",", "", $_POST['submit_amount']) ;
               $loan_type = $_POST['loan_type'];
             $category = $_POST['category'];  
             
             if ($category == 'repay') {
                 $set_reason = $set_reason1."[P]";
             } else {
                 $set_reason = $set_reason1."[D]";
             }
             
           $sql_update_codename = "UPDATE staff SET code_permit = '$set_codename', reason = '$set_reason', type = '$loan_type', category = '$category', amt_reverse = '$submit_amount', permission = '' WHERE namee = '$staff_name'"; 
           $result = mysqli_query($connect, $sql_update_codename);
           if($result == true){
               echo "<script type='text/javascript'> $(document).ready(function(){ 
                swal({
                         title: 'Success!',
                         text: '$set_codename has been submitted for reversal permit for the amount of ". number_format($submit_amount).". Do check here later for OTP',
                         icon: 'success',
                        buttons: {
                            confirm : {text:'Ok',className:'sweet-orange'},
                          
                        },
                        closeOnClickOutside: false
                       })
                  
                }); </script>";
             
           }
          
        }    
     
            ?>  
                 
                 
                 <div class="col-sm-6" style="margin-top: 20px;">
                     
                      <form name="srch" action="staff_request_reversal.php" method="POST" enctype="multipart/form-data">
               
               <center>
<!--                   <label style="background-color: lightcyan; cursor: pointer; margin-right: 70px; padding: 5px; margin-bottom: 10px;">Reveal</label>
                   <label style="background-color: lightgreen; cursor: pointer; font-weight: bold; padding: 5px; margin-bottom: 10px;" id="pin">G</label>-->
        <div class="input-group mb-3"> 
       <input type="text" id="" class="form-control"  name="reason" placeholder="Reason for reversal" required=""  autofocus="" maxlength="20"/> 
         &nbsp;&nbsp;&nbsp; 
       <select name="loan_type" class="form-control" required>
        <option value="" selected disabled hidden>---Select Loan Type---</option>
                          <option value="Daily">Daily</option>
                          <option value="Weekly">Weekly</option>
                           <option value="Monthly">Monthly</option>
    </select> 
       </div>
          <br>
           
         <div class="input-group mb-3">
            
             <input type="text" id="" class="form-control" style="text-transform: uppercase;" name="submit_codename" placeholder="Enter Codename here" required=""   maxlength="9"/> 
             <br>
             
              
     
  </div>
          <input type="text" id="" class="form-control"  name="submit_amount" placeholder="Enter Amount to reverse" required=""   maxlength="12"/> 
             <br>
              
          
          
           <input type="radio" name="category" value="repay" checked>Reversal Payments &nbsp;
            <input type="radio" name="category" value="disburse"> Reversal Disburse &nbsp;&nbsp;
          
             <input class="btn btn-success"  name="btn_sub" value="SUBMIT" type="submit"/>  
      
             <br><br><br>
             <?php if($check_codename != "" && $otp == ""){$otp = '';}?>
              <label style="font-size: 26px;">OTP: &nbsp;&nbsp;<?php echo $otp;?></label>
                 </center>
          </form> 
                     
                     
                     
              </div> 
                 <div class="col-sm-3">
                     
                 </div> 
            </div> 
           
            
            
          
     
     
     
     
                                    <!-- Page-body end -->
                                </div>
               <center style="font-size: 18px; color: black;" ><footer class="">&copy;<?php echo date('Y')?>. By Mr. Matt.</footer></center>                     
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








