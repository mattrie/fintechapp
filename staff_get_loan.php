<?php
session_start();

    include 'connection.php';
    
    
     //THIS IS TO AUTOMATICALLY RETRIEVE OTP      
                $otp = "";
              $staff_name = $_SESSION['staff_full_name'];
       $sql_get_permission = "SELECT * FROM staff WHERE namee = '$staff_name'";   
             $result1 = mysqli_query($connect, $sql_get_permission); 
            while($row = mysqli_fetch_assoc($result1)){
                $otp = $row['disburse_permission'];
                $check_codename = $row['code_permit']; 
            } 
                
//              $_SESSION['store_otp'] = $otp;
    
    
  
    //    ob_start();
    //session_start();
   

      
                 
                             if(isset($_POST['loan'])){
                                   $name = strtoupper($_POST['name']);
      
                               if($name != ""){ 
          
                                $parent = str_replace(",", "", $_POST['parent']);
                                
                                 $loan_type = $_POST['loan_type'];
                                 $branch = $_POST['branch'];
                                 
                                $date = date("jS F Y");
                                $month = date("F");
                                $year = date("Y");
                               $regnum = strtoupper($_POST['regnum']) ; //district
                             $startdate =  $_POST['startdate'];
                                $staff_name = $_SESSION['name_id_staff'];
                              $staff_full_name =  $_SESSION['staff_full_name'];
                            $total_ckeck =  $_SESSION['total_ckeck'];
//       -----------------------------------------------------------
                     ////CALCULATE CLOSING DATE
          $closedate  = date('Y-m-d', strtotime($startdate. ' + 31 days'));
//       -----------------------------------------------------------
              
             
                  
                       //INSERT RECORD 1
  $sql_statement = "INSERT INTO request_loan (name, type, remarks, request_disburseloan, date, month, year, district, startdate, collector, collector_name, status, outstanding, branch) VALUES ('$name', '$loan_type', 'Loan Request', '$parent',  '$date', '$month', '$year', '$regnum', '$startdate', '$staff_name', '$staff_full_name', 'Not Approved', '$total_ckeck', '$branch')";

                     $result = mysqli_query($connect, $sql_statement); 
                     
                     
               
                     
                  
                if($result==true){
                    
                 
                  echo "<script type='text/javascript'> $(document).ready(function(){ 
                swal({
                         title: 'Success!',
                         text: '$name Loan request of  ".number_format($parent)." Naira, has been sent successfully.',
                         icon: 'success',
                        buttons: {
                            confirm : {text:'Ok',className:'sweet-orange'},
                          
                        },
                        closeOnClickOutside: false
                       })
                  
                }); </script>";
               
                           '';  
                           $id = "";
                          } else {
                 echo "<script type='text/javascript'> $(document).ready(function(){ 
                swal({
                         title: 'Error!',
                         text: 'Application has been tempered with!!',
                         icon: 'error',
                        buttons: {
                            confirm : {text:'Ok',className:'sweet-orange'},
                          
                        },
                        closeOnClickOutside: false
                       })
                  
                }); </script>";



              }      
            } else {
                  echo "<script type='text/javascript'> $(document).ready(function(){ 
                swal({
                         title: 'Name Check!',
                         text: 'You must enter name ooooo!!',
                         icon: 'warning',
                        buttons: {
                            confirm : {text:'Ok',className:'sweet-orange'},
                          
                        },
                        closeOnClickOutside: false
                       })
                  
                }); </script>";

              }          
          }    

//            

                        
         //////////////////////////////DELETE////////////////////////////////////////////
                    if(isset($_POST['dele'])){
                                
                    
                                $name = strtoupper($_POST['name']);
                                $regnum = strtoupper($_POST['regnum']) ;
                                $address = $_POST['address'];
                                $dob = $_POST['dob'];
                                $class = $_POST['class'];
                                $parent = strtoupper($_POST['parent']);
                                $telephone = $_POST['telephone'];
                                $mail = $_POST['mail'];
                                $religion = $_POST['religion'];
                                $login_id = $_POST['loginid']; 
                                $id = $_POST['idd'];
                                
                            
                     //Delete RECORD from fees
      @$resultt = mysqli_query($connect, "DELETE FROM student_fees WHERE name ='$name'");
      
           //Delete RECORD from school_fees_breakdown
      @$answer = mysqli_query($connect, "DELETE FROM school_fees_breakdown WHERE namee ='$name'");
              
                        //then Delete record in student database
      @$sql_statement = "DELETE FROM student WHERE id = '$id'";
      
                 
                     $result = mysqli_query($connect, $sql_statement); 
                                    if($result==true){
                                   echo "<script>alert('$name has been successfully deleted');</script>";
                                    }
                          
                         } else {
                            echo ""; //leave blank 
                        }    
                        

    ?>
              

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Staff Request Loan</title>
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
  
     
   <script>
        window.addEventListener('load', function() {
         document.querySelector('input[type="file"]').addEventListener('change', function() {
              if (this.files && this.files[0]) {
               var img = document.querySelector('img');  // $('img')[0]
               img.src = URL.createObjectURL(this.files[0]); // set src to blob url
               img.onload = imageIsLoaded;
              }
         });
        });

       
     </script>
  
  
  
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
                                            <h5 class="m-b-10">REQUEST LOAN</h5>
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
                                           <div class="row">
                                            <div class="col-sm-12">
                                                <!-- Basic Form Inputs card start -->
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5>REQUEST LOAN</h5>
                                                        <!--<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>-->
                                                    </div>
                                                    <div class="card-block">
                              <!--====================SEARCHING STUDENT-->
           <form action="staff_get_loan.php" method="POST" enctype="multipart/form-data" >
              <center>
         <div class="input-group mb-3">
    <input type="text" class="form-control" id="autocomplete" name="srch" placeholder="Search Customer To Request Loan" required=""  >
    <div class="input-group-append">
      <button class="btn btn-warning" id="btnsearch" name="btnsrch" type="submit">SEARCH</button>  
     </div>
  </div>
        </center>  
             
        
         <!--///////////////////////////////////////////-->        
          
          <?php
//          session_start();
   $get_name = $date = $images = $id = $name = $regnum = $branch = $address = $dob = $class = $parent = $telephone = $mail = $religion = $login_id = "";
       if (isset($_POST['btnsrch'])){
                       
                $get_name = $_POST['srch'];
       $sql_state = "SELECT * FROM members WHERE namee = '$get_name'";
            $result = mysqli_query($connect, $sql_state);
      
            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row["id"];
//                echo $id;
                $name = $row["namee"];
                $regnum = $row["registration_num"];
                $address = $row["addresss"];
                $dob = $row["dob"];
                $class = $row["classs"];
                $parent = $row["parentt"];
                $telephone = $row["telephone"];
                $mail = $row["mail"];
                $religion = $row["religion"];
                $login_id = $row["login_id"];
                $images = $row["imagess"];
                $date = $row["level"];
                $black_list = $row["black_list"];
                 $black_desc = $row["black_desc"];
                 $branch = $row["branch"];
              }
              
//          ON BLACK LIST
    if ($black_list == 'YES') {
        $_SESSION['store_black_list'] = "<script type='text/javascript'> $(document).ready(function(){ 
                swal({
                         title: 'Not Allowed!',
                         text: 'Sorry, $name has been BLACK LISTED and cannot obtain loan from FINSOLUTE. Reason: $black_desc.',
                         icon: 'error',
                        buttons: {
                            confirm : {text:'Ok',className:'sweet-orange'},
                          
                        },
                        closeOnClickOutside: false
                       })
                  
                }); </script>";
        
        echo "<script> location.href = 'staff_home.php'; </script>"; 
    }
              
                 include 'check_debt.php';  
            $_SESSION['total_ckeck']  =  $total_ckeck;
          
          if ($total_ckeck > 1) {
              include 'staff_show_debt.php';
          } 
              
              
        }
          ?>
          
    
       
     </form>   
         
   
                            
                                                        <!--<h4 class="sub-title">Basic Inputs</h4>-->
                                                        <form action="staff_get_loan.php" method="POST" enctype="multipart/form-data">
                                                          <center> 
                                                            <div  style="width:140px; height:140px;" class="mb-5">
                                                                 <img id="img" src="<?php echo $images;?>" alt="THIS IS TO LOAD PHOTO"  style="border: 4px #99ff99 solid; width:140px; height:140px;" >
                                                                    <input type="hidden" name="idd" value="<?php echo $id;?>" />   
                                                                   <input type="hidden" name="imge" value="<?php echo $images;?>" /> 
                                                             </div>
                                                          </center>  
                                                          
                                                            
                                                            <div class="form-group row">                                                                 
                                                                <label class="col-sm-2 col-form-label">Name:</label>
                                                                <div class="col-sm-10">
                                                                      <input type="hidden" id="duplicate_name" />      
                                                                    <input type="text" class="form-control" placeholder="Name"   id="nam" type="text" name="name" value="<?php echo $name;?>"  maxlength="50" readonly="" style="text-transform: uppercase;" required>
                                                                </div>
                                                            </div>
                                                              <input type="hidden" name="shadow" value="<?php echo $get_name;?>"/>
                                                              
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Unit District:</label>
                                                                <input type="hidden" name="branch" value="<?php echo $branch;?>">
                                                                <div class="col-sm-10">
                                                                     <input type="text" class="form-control" placeholder="District"  name="regnum" value="<?php echo $regnum;?>"  maxlength="12" readonly=""  style="text-transform: uppercase;" required>
                                                                </div>
                                                            </div>
                                                              
<!--                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Group Name:</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control" placeholder="Group Name" name="group_name" value="<?php echo $dob;?>"  maxlength="12" readonly=""  style="text-transform: uppercase;" required>
                                                                </div>
                                                            </div>-->
                                                              
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Loan Type:</label>
                                                                <div class="col-sm-10">
                                                                   <select name="loan_type" class="form-control" required>
                            <option value="" disabled selected hidden>select Loan Type</option>
                            <option value="Daily Payment">Daily Payment</option>
                            <option value="Weekly Payment">Weekly Payment</option>
                            <option value="Monthly Payment">Monthly Payment</option>
                            </select>
            
                                                                </div>
                                                            </div>
                                                              <br>
                                                              <br>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Enter Loan to Collect:</label>
                                                                <div class="col-sm-10">
                                                                      <input type="text"  placeholder="enter Loan" onkeypress="return CheckNumeric()" onkeyup="FormatCurrency(this)" id="amount" style="width: 250px; border-radius: 5px;" type="text" name="parent" maxlength="11" required >
           </div>
                                                            </div>
                                                              
                                                             <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Start Date:</label>
                                                                <div class="col-sm-10">
                                                                      <input  type="text" name="startdate" placeholder="select Start date" onfocus="(this.type='date')" style="width: 150px; border-radius: 5px;" required>
     </div>
                                                            </div>
                                                                                                    <br>
                                                      <?php if($otp == ""){$otp = '';}?>
                                                       <label style="font-size: 26px;">OTP: &nbsp;&nbsp;<?php echo $otp;?></label>
                                                              
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label"></label>
                                                              
                                                                <div class="col-sm-10 mx-auto">
                                                                  <input style=" padding: 8px; font-weight: bold; background-color:  red; margin-top: 20px" class="btn button-distance" id="update"  type="submit" name="loan"  value="Request Loan" />       
                <a style="margin-left:40px; border-radius: 10px;" class="btn btn-dark" href="staff_get_loan.php">Reset</a>
                                                                </div>
                                                              
                                                            </div>
                                                        </form>   
                                                    </div>
                                                </div>
                                                <!-- Basic Form Inputs card end -->
                                            </div>
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
    
    
     
        <script>  // ////////Format number with commas/////////////////////////////////

            function FormatCurrency(ctrl) {
                //Check if arrow keys are pressed - we want to allow navigation around textbox using arrow keys
                if (event.keyCode == 37 || event.keyCode == 38 || event.keyCode == 39 || event.keyCode == 40) {
                    return;
                }

                var val = ctrl.value;

                val = val.replace(/,/g, "")
                ctrl.value = "";
                val += '';
                x = val.split('.');
                x1 = x[0];
                x2 = x.length > 1 ? '.' + x[1] : '';

                var rgx = /(\d+)(\d{3})/;

                while (rgx.test(x1)) {
                    x1 = x1.replace(rgx, '$1' + ',' + '$2');
                }

                ctrl.value = x1 + x2;
            }

            function CheckNumeric() {
                return event.keyCode >= 48 && event.keyCode <= 57 || event.keyCode == 46;
            }

  </script>
  
  
  
  
  
  
  
  
  
  
     <!-- Script -->
    <script type='text/javascript' >
    $( function() {
  
        $( "#autocomplete" ).autocomplete({
            source: function( request, response ) {
                
                $.ajax({
                    url: "autocomplete.php",
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
        
        
        
        
         //////////////////////////////////////////////////////////////////////////
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
        
        
        
        
        
        
//////////////////////////////////////////////////////////////////////////////////////////////////////
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
///////////////////////////////////////////////////////////////////////////////////////
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
             
             
             
               /////////THIS IS TO CHECK BEFORE FINAL UPDATE////////
              $(document).ready(function () {               
        $("#update").click(function () {
            
             ///////////////////////////////////////////////////////////////////
             const fi = document.getElementById('customFile'); 
        // Check if any file is selected. 
        if (fi.files.length > 0) { 
            for (const i = 0; i <= fi.files.length - 1; i++) { 
  
                const fsize = fi.files.item(i).size; 
                const file = Math.round((fsize / 1000)); 
                // The size of the file. 
                if (file > 148) { 
                    alert( 
                      "Image too large, please resize image to 100kb. Your current image size is: "+file/1000+"mb ("+file+"kb). Image should be: Horizontal = 400px by Vertical = 300px."); 
//                    document.getElementById('size').value = file; 
                         return false;                
                }  
            } 
        } 
       //////////////////////////////////////////////////////////// 
            
            
            
               var  name_up = document.getElementById('nam').value;   
        if (name_up === ""){
            alert ("Search member to update first");
           return false; }  
                });
                
         });
             
             
             
             
             
             /////////THIS IS TO CHECK BEFORE FINAL DELETION////////
              $(document).ready(function () {
               
        $("#delete").click(function () {
               var  name_del = document.getElementById('nam').value;   
        if (name_del === ""){
            alert ("Search member to delete first");
        }   else {
             var  del_check = confirm("You will loose all '"+name_del+"' information when you delete. DO YOU WISH TO CONTINUE?");
                
                if(del_check===true){
                    return true;
                     } else {
                         $('#nam').focus();
                        return false;
                        
                        
                     }
                    }
                });
                
         });


    </script> 
    
      <script>
          //////////////////////THIS FOR FIGURE ON KEY UP//////////////////////////
         $(document).ready(function() {
   var figure = $('#figure');         
     $(figure).keyup(function(e){ //THIS IS TO AUTO-CALCULATE Attendd
        e.preventDefault();   
        
              var cleanNumber = $("#amount").val().split(",").join("");
         var amount = cleanNumber;
         
         
           var cleanNumber1 = $("#figure").val().split(",").join("");
         var fig = cleanNumber1;
       
       var  perc =  fig/amount ;
       var tot_per = perc * 100;
            tot_per = tot_per.toFixed(2);   
     document.getElementById('perc').value =  tot_per ;
          });
        });  
   </script>
   
   
   
   
    <script>
          //////////////////////THIS FOR PERCENT% ON KEY UP//////////////////////////
         $(document).ready(function() {
   var perc = $('#perc');         
     $(perc).keyup(function(e){ 
        e.preventDefault();   
        
         var cleanNumber = $("#amount").val().split(",").join("");
         var amount = cleanNumber;
         var perc = parseInt(document.getElementById('perc').value);
       
       var  fig =  perc/100 ;
       var tot_fig = amount * fig;
           tot_fig = Math.round(tot_fig);
      
     document.getElementById('figure').value =  tot_fig ;
          });
        });  
   </script>
    
   
    
    
</body>

</html>
