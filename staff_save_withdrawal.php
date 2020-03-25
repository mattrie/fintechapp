<?php
session_start();
 if(empty($_SESSION['id_staff'])){
//         echo "<script>alert('You must first login');</script>";
          echo "<script>alert('You must first login');
         window.location = 'staff_login.php';</script>";
 }
    include 'connection.php';
    
   
      if(isset($_POST['withd'])){
                                   $name = strtoupper($_POST['name']);
                                       if($name != ""){ 
 

                                $parent = $_POST['parent'];
//                                $telephone = $_POST['telephone'];
                                $date = date("jS F Y");
                                $month = date("F");
                                $year = date("Y");
                                    $regnum = strtoupper($_POST['regnum']) ; 
                                
                                @$target_file = $images;
                                
                                
                                $ref = "ref".date("F Y"); 
                              $get_check = "";  
                        $name = strtoupper($_POST['name']);
          $check = mysqli_query($connect, "SELECT * FROM contribution WHERE name='$name'");
          while($row_check = mysqli_fetch_assoc($check)){
                   $get_check = $row_check['ref'];
          }
               
          $staff_name = $_SESSION['staff_full_name']; 
                           if($get_check == $ref){           
            //INSERT RECORD2
      $sql_statement = "INSERT INTO contribution (name, amount, withdraw, date, ref, month, year, district, collector) Values('$name', '-','$parent',  '$date', '$ref', '$month', '$year' , '$regnum', '$staff_name')";
                     $result2 = mysqli_query($connect, $sql_statement); 
                  } else {
      $sql_statement2 = "INSERT INTO contribution (name, amount, withdraw, date, month, year, district, collector) Values('$name', '-','$parent',  '$date', $month', '$year' , '$regnum', '$staff_name')";
                $result23 = mysqli_query($connect, $sql_statement2);
                  }    
          
          
          
          
                                
               
                       //INSERT RECORD 1
      $sql_statement = "INSERT INTO witdraw (name, amount, date, month, year, district) Values('$name', '$parent', '$date', '$month', '$year' , '$regnum')";
                     $result = mysqli_query($connect, $sql_statement); 
                     
                  
                        
                   ////////////THIS IS TO SUM WITHDRAWAL ///////////////////
                            $total_savings11 = mysqli_query($connect, "SELECT SUM(amount) as monthtotal FROM contribution WHERE name='$name'");      
                          while  ($row1 = mysqli_fetch_array($total_savings11)){
                          $summation_con = $row1['monthtotal'];                          
                          }
                            
        ///////////////////THIS IS TO SUM CONTRIBUTION ///////////////////
                        $total_savings22 = mysqli_query($connect, "SELECT SUM(withdraw) as monthtotal FROM contribution WHERE name='$name'");      
                          while  ($row = mysqli_fetch_array($total_savings22)){
                          $summation_wit = $row['monthtotal'];                          
                          }                     
              

              
              ////UPDATE CONTRIBUTION BASED ON NAME  TABLE
              $update_con = mysqli_query($connect, "UPDATE  contribution SET amounttotal = '' WHERE name='$name'");
                $update_con1 = mysqli_query($connect, "UPDATE  contribution SET amounttotal = '$summation_con' WHERE name='$name'");
              
              
          

                 ////UPDATE WITHDRAWAL BASED ON NAME 
              $update_wit = mysqli_query($connect, "UPDATE  contribution SET withdrawtotal = '' WHERE name='$name'");
             $update_wit1 = mysqli_query($connect, "UPDATE  contribution SET withdrawtotal = '$summation_wit' WHERE name='$name'");
                    
                       
                     
                     
//                        ////////////THIS IS TO SUM CONTRIBUTION
                        $total_savings = mysqli_query($connect, "SELECT SUM(amount) as total FROM contribution WHERE name='$name'");      
                          while  ($row = mysqli_fetch_array($total_savings)){
                          $summation = $row['total'];                          
                          }
                            
                            ////////////THIS IS TO SUM WITHDRAWAL
                            $total_savings1 = mysqli_query($connect, "SELECT SUM(amount) as total FROM witdraw WHERE name='$name'");      
                          while  ($row1 = mysqli_fetch_array($total_savings1)){
                          $summation1 = $row1['total'];                          
                          }
                          
                       $actual_savings =  $summation - $summation1;
                          
                          //UPDATE RECORD
      $sql_statement1 = "UPDATE members SET savings = '$summation', loan = '$summation1', save_balance = '$actual_savings' WHERE namee='$name'";
                     $result2 = mysqli_query($connect, $sql_statement1); 
                     
                          
                          if($result==true){
                                   echo "<script>alert('$name has successfully withdrawn $parent. Total savings left: $actual_savings');</script>";
                                     '';  
                                     $id = "";
                             echo  "<script> location.href = 'savings_statement.php?name=$name'; </script>";           
                                    } else {
                           echo "<script>alert('Application has been tempered with!!');</script>";
                        }      
                       } else {
                            echo "<script>alert('You must enter name ooooo!!')</script>";
                        }         
                     }  
   

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>WITHDRAW CONTRIBUTION</title>
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
                                    
                        
                                        
                     <div class="row">
                                            <div class="col-sm-12">
                                                <!-- Basic Form Inputs card start -->
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5>WITHDRAW CONTRIBUTION</h5>
                                                        <!--<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>-->
                                                    </div>
                                                    <div class="card-block">
                              <!--====================SEARCHING STUDENT-->
           <form action="staff_save_withdrawal.php" method="POST" enctype="multipart/form-data" >
              <center>
         <div class="input-group mb-3">
    <input type="text" class="form-control" id="autocomplete" name="srch" placeholder="Search Customer To Give Loan" required=""  >
    <div class="input-group-append">
      <button class="btn btn-warning" id="btnsearch" name="btnsrch" type="submit">SEARCH</button>  
     </div>
  </div>
        </center>  
             
        
          <!--///////////////////////////////////////////-->        
          
          <?php
//          session_start();
  $get_name = $date = $images = $id = $available_savings = $name = $regnum = $address = $dob = $class = $parent = $telephone = $mail = $religion = $login_id = "";
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
              }
              
               ///////THIS IS TO GET SAVINGS BALANCE 
                $sql_get_savings = "SELECT SUM(amount) as total FROM contribution WHERE name = '$name'"; 
              $result11 = mysqli_query($connect, $sql_get_savings);
              while($row11 = mysqli_fetch_assoc($result11)){
                  $savings = $row11['total'];
              }
              
               $sql_get_withdraw22 = "SELECT SUM(withdraw) as total FROM contribution WHERE name = '$name'"; 
              $result22 = mysqli_query($connect, $sql_get_withdraw22);
              while($row11 = mysqli_fetch_assoc($result22)){
                  $withdraw = $row11['total'];
              }
              
              $available_savings = $savings - $withdraw;
              
        }
        
        
        
        
        
        
        if (isset($_GET['name'])){
                       
                $get_name = $_GET['name'];
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
              }
              
               ///////THIS IS TO GET SAVINGS BALANCE 
                $sql_get_savings = "SELECT SUM(amount) as total FROM contribution WHERE name = '$name'"; 
              $result11 = mysqli_query($connect, $sql_get_savings);
              while($row11 = mysqli_fetch_assoc($result11)){
                  $savings = $row11['total'];
              }
              
               $sql_get_withdraw22 = "SELECT SUM(withdraw) as total FROM contribution WHERE name = '$name'"; 
              $result22 = mysqli_query($connect, $sql_get_withdraw22);
              while($row11 = mysqli_fetch_assoc($result22)){
                  $withdraw = $row11['total'];
              }
              
              $available_savings = $savings - $withdraw;
              
        }
          ?>
          
    
       
     </form>   
         
   
                            
                                                        <!--<h4 class="sub-title">Basic Inputs</h4>-->
                                                        <form action="staff_save_withdrawal.php" method="POST" enctype="multipart/form-data">
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
                                                                <div class="col-sm-10">
                                                                     <input type="text" class="form-control" placeholder="District"  name="regnum" value="<?php echo $regnum;?>"  maxlength="12" readonly=""  style="text-transform: uppercase;" required>
                                                                </div>
                                                            </div>
                                                              
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Available Balance:</label>
                                                                <div class="col-sm-10">
                                                                 <input type="text" class="form-control" placeholder="Savings"  name="available_savings" value="<?php echo @number_format($available_savings);?>"  maxlength="12" readonly=""  style="text-transform: uppercase;" required>
       </div>
                                                            </div>
                                                              
                                                          
                                                              <br>
                                                              <br>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Enter Current Amount Contributed:</label>
                                                                <div class="col-sm-10">
                                                                      <input class="form-control" type="number"   placeholder="enter Contribution" style="width: 450px;" name="parent" maxlength="10" required >
                                                                </div>
                                                            </div>
                                                              
                                                            
                                                          
                                                              
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label"></label>
                                                              
                                                                <div class="col-sm-10 mx-auto">
                                                                   <input style="margin-left:100px; padding: 8px; width: 25%; font-weight: bold; background-color:  red; border-radius: 10px;" class="btn" id="update"  type="submit" name="withd"  value="Withdraw" /> 
                                                                         <a style="margin-left:40px; border-radius: 10px;" class="btn btn-dark" href="staff_save_withdrawal.php">Reset</a>
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
    
   
    
    
</body>

</html>
