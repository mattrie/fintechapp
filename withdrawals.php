<?php
session_start();

include 'connection.php';


//    ob_start();
//session_start();
////////////////////////UPDATE///////////////////////////////////////   
///////////////////////////lets upload the file first/////////////////////////////////////////////                      
if (!empty($_FILES['fileToUpload']['name'])) {

    $target_dir = "images/"; // this is the directory to upload to
    //get file name and set to target directory
    $target_file = @($target_dir . basename($_FILES["fileToUpload"]["name"]));

    @($getfile_name = $_FILES['fileToUpload']['name']);
    @($getfile_size = $_FILES['fileToUpload']['size']);
    @($getfile_tmp_dir = $_FILES['fileToUpload']['tmp_name']);
    @($getfile_type = $_FILES['fileToUpload']['type']);
    @($identifyFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION)));


    //        if($identifyFileType == "jpg" || $identifyFileType == "png" || $identifyFileType == "jpeg")
    // {           
    //              if($getfile_size < 2097152) {
    //            
    //                    // Check if file already exists
    //                     if (!file_exists($target_file)) {  
    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
} else {
    if (isset($_POST['imge'])) {
        $images = $_POST['imge'];
        @$target_file = $images;
    }
}

if (isset($_POST['withd'])) {
    $name = strtoupper($_POST['name']);
    if ($name != "") {
        $withdraw = $_POST['with_type'];
        $parent = $_POST['parent'];
        $codename = $_POST['telephone'];
        $date = date("jS F Y");
        $month = date("F");
        $year = date("Y");
        $regnum = strtoupper($_POST['regnum']);

        @$target_file = $images;

        ////LETS TEST FOR OVER WITHDRAWAL                  
        //INSERT RECORD 1
        $time_stamp = date("h:ia");
        $time_stamp1 = date("h:ia", strtotime($time_stamp));


        if ($withdraw == "savings") {

            $ind_savings_balance = $_SESSION['ind_savings_balance'];

            if ($parent > $ind_savings_balance) {
                echo "<script type='text/javascript'> $(document).ready(function(){ 
                swal({
                         title: 'Savings balance Check!',
                         text: 'Insufficient Savings balance. Cannot withdraw " . number_format($parent) . " Naira. $name has only " . number_format($ind_savings_balance) . " Naira remaining as Savings for codename: " . $codename . ".',
                         icon: 'warning',
                        buttons: {
                            confirm : {text:'Ok',className:'sweet-orange'},
                          
                        },
                        closeOnClickOutside: false
                       })
                  
                }); </script>";
            } else {

                //////JUST GET THE LAST codename OF THE INDIVIDUAL TO BRING DOWN 
//        $code = mysqli_query($connect, "SELECT * FROM weekly_allloan WHERE name = '$name' ");      
//          while  ($row = mysqli_fetch_assoc($code)){
//          $codename = $row['codename']; 
//
//                          }
                //////JUST GET THE LAST BALANCE OF THE INDIVIDUAL TO BRING DOWN 
                $indbalance = mysqli_query($connect, "SELECT * FROM weekly_allloan WHERE name = '$name' AND codename = '$codename'");
                while ($row = mysqli_fetch_assoc($indbalance)) {
                    $balance = $row['indbalance'];
                }


                //////JUST GET THE LAST repaycumm OF THE INDIVIDUAL TO BRING DOWN   
                $repaycumm = mysqli_query($connect, "SELECT * FROM weekly_allloan WHERE name = '$name' AND codename = '$codename'");
                while ($row = mysqli_fetch_assoc($repaycumm)) {
                    $summation_pay_real = $row['repaycumm'];
//                           $plus_interest = $row['interest'];  
                }

                $sql_statement = "INSERT INTO weekly_allloan (name, remarks, codename, date, month, year, district, collector, withdrawsavings, timestamp) VALUES ('$name', 'Savings Withdrawal', '$codename', '$date', '$month', '$year', '$regnum', 'admin', '$parent', '$time_stamp1')";
                $result = mysqli_query($connect, $sql_statement);









                //  *******************************************************************************************************                
                ///////THIS IS TO GET THE INDIVIDUAL SAVINGS BALANCE
                ///////////////THIS IS TO SUM ALL SAVINGS
                $sum_savings = mysqli_query($connect, "SELECT SUM(savings) as total FROM weekly_allloan WHERE name = '$name' AND codename = '$codename'");
                while ($row = mysqli_fetch_assoc($sum_savings)) {
                    $summation_savings = $row['total'];
//               $plus_interest = $row['interest'];  
                }


                ////////////THIS IS TO SUM ALLWITHDRAWALS
                $sum_withdraw = mysqli_query($connect, "SELECT SUM(withdrawsavings) as total FROM weekly_allloan WHERE name = '$name' AND codename = '$codename'");
                while ($row1 = mysqli_fetch_assoc($sum_withdraw)) {
                    $summation_withdraw = $row1['total'];
                }

                $savings_balance = $summation_savings - $summation_withdraw;


                //  *******************************************************************************************************                
                //GET LAST ID  
                $get_last_id = mysqli_query($connect, "SELECT * FROM weekly_allloan");
                while ($row = mysqli_fetch_assoc($get_last_id)) {
                    $id = $row['id'];
                }


                /////////SUM GENERAL REPAY & DISBURSE LOAN SO YOU CAN GET GEN BALALNCE
                ////////////THIS IS TO SUM PAYMENTS
                $total_payments = mysqli_query($connect, "SELECT SUM(repay) as total FROM weekly_allloan");
                while ($row1 = mysqli_fetch_array($total_payments)) {
                    $summation_pay = $row1['total'];
                }


                ////////////THIS IS TO SUM DISBURSE
                $total_disburse2 = mysqli_query($connect, "SELECT SUM(disburseloan) as total FROM weekly_allloan");
                while ($row2 = mysqli_fetch_array($total_disburse2)) {
                    $summation_disburse = $row2['total'];
                }
                $gen_balance = $summation_disburse - $summation_pay;




//         """"""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""          
                /////////SUM GENERAL SAVINGS & WITHDRAWALS  SO YOU CAN GET GEN BALALNCE
                ////////////THIS IS TO SUM savings
                $total_save = mysqli_query($connect, "SELECT SUM(savings) as total FROM weekly_allloan");
                while ($row1 = mysqli_fetch_array($total_save)) {
                    $summation_save = $row1['total'];
                }


                ////////////THIS IS TO SUM withdrawsavings
                $total_withdrawsavings = mysqli_query($connect, "SELECT SUM(withdrawsavings) as total FROM weekly_allloan");
                while ($row2 = mysqli_fetch_array($total_withdrawsavings)) {
                    $summation_withdrawsavings = $row2['total'];
                }
                $gen_balance_save = $summation_save - $summation_withdrawsavings;

                //         """"""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""          








                $result2 = mysqli_query($connect, "UPDATE weekly_allloan SET genbalance = '$gen_balance', repaycumm = '$summation_pay_real', indbalance = '$balance', genbalsavings = '$gen_balance_save', indbalsavings = '$savings_balance' WHERE id = '$id'");

                if ($result2 == true) {
                    echo "<script type='text/javascript'> $(document).ready(function(){ 
                swal({
                         title: 'Success!',
                         text: '$name has successfully withdrawn " . number_format($parent) . " Naira from Savings. Balance of: " . number_format($savings_balance) . " Naira Remaining for codename: " . $codename . ".',
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
            }
        } else {  //THIS IS FOR WITHDRAWAL  
            /////////////////THIS IS FOR WITHDRAWAL  
            $_SESSION['ind_equity_balance'];
            $ind_equity_balance = $_SESSION['ind_equity_balance'];

            if ($parent > $ind_equity_balance) {
                echo "<script type='text/javascript'> $(document).ready(function(){ 
                swal({
                         title: 'Equity balance Check!',
                         text: 'Insufficient Equity balance. Cannot withdraw " . number_format($parent) . " Naira. $name has only " . number_format($ind_equity_balance) . " Naira remaining as Equity for codename: " . $codename . ".',
                         icon: 'warning',
                        buttons: {
                            confirm : {text:'Ok',className:'sweet-orange'},
                          
                        },
                        closeOnClickOutside: false
                       })
                  
                }); </script>";
            } else {
//     #######################################################################################
                //////JUST GET THE LAST codename OF THE INDIVIDUAL TO BRING DOWN TO BRING DOWN  
//        $code = mysqli_query($connect, "SELECT * FROM weekly_allloan WHERE name = '$name' ");      
//          while  ($row = mysqli_fetch_assoc($code)){
//          $codename = $row['codename']; 
//
//                          }
                //////JUST GET THE LAST BALANCE OF THE INDIVIDUAL TO BRING DOWN TO BRING DOWN  
                $indbalance = mysqli_query($connect, "SELECT * FROM weekly_allloan WHERE name = '$name' AND codename = '$codename'");
                while ($row = mysqli_fetch_assoc($indbalance)) {
                    $balance = $row['indbalance'];
                }


                //////JUST GET THE LAST repaycumm OF THE INDIVIDUAL TO BRING DOWN TO BRING DOWN  
                $repaycumm = mysqli_query($connect, "SELECT * FROM weekly_allloan WHERE name = '$name' AND codename = '$codename'");
                while ($row = mysqli_fetch_assoc($repaycumm)) {
                    $summation_pay_real = $row['repaycumm'];
//                           $plus_interest = $row['interest'];  
                }

                $sql_statement = "INSERT INTO weekly_allloan (name, remarks, codename, date, month, year, district, collector, withdrawequity, timestamp) VALUES ('$name', 'Equity Withdrawal', '$codename', '$date', '$month', '$year', '$regnum', 'admin', '$parent', '$time_stamp1')";
                $result = mysqli_query($connect, $sql_statement);









                //  *******************************************************************************************************                
                ///////THIS IS TO GET THE INDIVIDUAL SAVINGS BALANCE
                ///////////////THIS IS TO SUM ALL SAVINGS
                $sum_savings = mysqli_query($connect, "SELECT SUM(savings) as total FROM weekly_allloan WHERE name = '$name' AND codename = '$codename'");
                while ($row = mysqli_fetch_assoc($sum_savings)) {
                    $summation_savings = $row['total'];
//               $plus_interest = $row['interest'];  
                }


                ////////////THIS IS TO SUM ALLWITHDRAWALS
                $sum_withdraw = mysqli_query($connect, "SELECT SUM(withdrawsavings) as total FROM weekly_allloan WHERE name = '$name' AND codename = '$codename'");
                while ($row1 = mysqli_fetch_assoc($sum_withdraw)) {
                    $summation_withdraw = $row1['total'];
                }

                $savings_balance = $summation_savings - $summation_withdraw;


                //  *******************************************************************************************************                
                //GET LAST ID  
                $get_last_id = mysqli_query($connect, "SELECT * FROM weekly_allloan");
                while ($row = mysqli_fetch_assoc($get_last_id)) {
                    $id = $row['id'];
                }


                /////////SUM GENERAL REPAY & DISBURSE LOAN SO YOU CAN GET GEN BALALNCE
                ////////////THIS IS TO SUM PAYMENTS
                $total_payments = mysqli_query($connect, "SELECT SUM(repay) as total FROM weekly_allloan");
                while ($row1 = mysqli_fetch_array($total_payments)) {
                    $summation_pay = $row1['total'];
                }


                ////////////THIS IS TO SUM DISBURSE
                $total_disburse2 = mysqli_query($connect, "SELECT SUM(disburseloan) as total FROM weekly_allloan");
                while ($row2 = mysqli_fetch_array($total_disburse2)) {
                    $summation_disburse = $row2['total'];
                }
                $gen_balance = $summation_disburse - $summation_pay;


                //#############"""""""""""""""""""""""""""""""""""""""""""""""""""""######################################"""""""""""""""""""""""""""""""""""""""""""          
                /////////SUM GENERAL equity & WITHDRAWALS  SO YOU CAN GET GEN BALALNCE
                ////////////THIS IS TO SUM savings
                $total_equity = mysqli_query($connect, "SELECT SUM(equity) as total FROM weekly_allloan");
                while ($row1 = mysqli_fetch_array($total_equity)) {
                    $summation_equity = $row1['total'];
                }


                ////////////THIS IS TO SUM withdrawsavings
                $total_withdrawequity = mysqli_query($connect, "SELECT SUM(withdrawequity) as total FROM weekly_allloan");
                while ($row2 = mysqli_fetch_array($total_withdrawequity)) {
                    $summation_withdrawequity = $row2['total'];
                }
                $gen_balance_equity = $summation_equity - $summation_withdrawequity;

                //         """"""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""          





                $result2 = mysqli_query($connect, "UPDATE weekly_allloan SET genbalance = '$gen_balance', repaycumm = '$summation_pay_real', indbalance = '$balance', indbalsavings = '$savings_balance', genbalequity = '$gen_balance_equity' WHERE id = '$id'");

                if ($result2 == true) {
                    echo "<script type='text/javascript'> $(document).ready(function(){ 
                swal({
                         title: 'Success!',
                         text: '$name has successfully withdrawn " . number_format($parent) . " Naira from Equity. for codename: " . $codename . "',
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

//    ##########################################################################################                  
            }
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
//                    } else {  //Image name already exist in the database
//                     
//                  echo    "This image name has been used. Rename image and try again!!!";
//                    }
//          
//              } else { //greater than 2MB
//                  echo "File size must not be greater than 2 MB!!!"; 
//              }
//          } else { //not jpeg
//              echo "only images allowed, please choose a JPEG, JPG or PNG file!!!";
//          }
//            
//////////////////////////////DELETE////////////////////////////////////////////
if (isset($_POST['dele'])) {


    $name = strtoupper($_POST['name']);
    $regnum = strtoupper($_POST['regnum']);
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
    if ($result == true) {
        echo "<script>alert('$name has been successfully deleted');</script>";
    }
} else {
    echo ""; //leave blank 
}
?>


<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Withdrawal</title>
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
            window.addEventListener('load', function () {
                document.querySelector('input[type="file"]').addEventListener('change', function () {
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
                                                <h5 class="m-b-10">Withdrawals</h5>
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
                                                            <h5>WITHDRAW WEEKLY EQUITY</h5>
                                                            <!--<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>-->
                                                        </div>
                                                        <div class="card-block">
                                                            <!--====================SEARCHING STUDENT-->
                                                            <form action="withdrawals.php" method="POST" enctype="multipart/form-data" >
                                                                <center>
                                                                    <div class="input-group mb-3">
                                                                        <input type="text" class="form-control" id="autocomplete" name="srch" placeholder="Search Customer To Make Withdrawal" required=""   >
                                                                        <div class="input-group-append">
                                                                            <button class="btn btn-warning" id="btnsearch" name="btnsrch" type="submit">SEARCH</button>  
                                                                        </div>
                                                                    </div>
                                                                </center>  


                                                                <!--///////////////////////////////////////////-->        

                <?php
//          session_start();
                $get_name = $date = $images = $id = $name = $closingdate = $ind_savings_balance = $interest = $regnum = $check_codename = $codename = $address = $dob = $class = $parent = $telephone = $mail = $religion = $login_id = "";
                
                if (isset($_GET['get_codename'])) {

                $codename = $_GET['get_codename'];
                
                //        @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
                    $sql_state1 = "SELECT * FROM weekly_allloan WHERE disburseloan > 1 AND remarks = 'loan disbursement' AND codename = '$codename'";
                    $result1 = mysqli_query($connect, $sql_state1);

                    while ($row = mysqli_fetch_assoc($result1)) {
                        $get_name = $row["name"];
                        $closingdate = $row["enddate"];
                        $loan_type = $row["type"];
                        $disburseloan = $row["disburseloan"];
                        $check_codename = $row["codename"];
                        $interest = $row["interest"];
                        $proposedsavings = $row["proposedsavings"];
                        $no_weeks = $row['weeks'];
                    }
                    $_SESSION['closingdate'] = $closingdate;
                    $_SESSION['interest'] = $interest;

                    if ($check_codename != "") {
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



                        //        LETS SEARCH FOR SAVINGS BALANCE  
                        $sql_state1 = "SELECT * FROM weekly_allloan WHERE name = '$get_name' AND codename = '$codename'";
                        $result1 = mysqli_query($connect, $sql_state1);
                        while ($row = mysqli_fetch_assoc($result1)) {
                            $ind_savings_balance = $row['indbalsavings'];
                        }
                        $_SESSION['ind_savings_balance'] = $ind_savings_balance;

//        LETS GET EQUITY BY SUM    
                        $sum_deposit = "SELECT SUM(equity) as total FROM weekly_allloan WHERE name = '$get_name' AND codename = '$codename'";
                        $result2 = mysqli_query($connect, $sum_deposit);
                        while ($row = mysqli_fetch_assoc($result2)) {
                            $equity = $row['total'];
                        }

                        $sum_withdraw = "SELECT SUM(withdrawequity) as total FROM weekly_allloan WHERE name = '$get_name' AND codename = '$codename'";
                        $result3 = mysqli_query($connect, $sum_withdraw);
                        while ($row = mysqli_fetch_assoc($result3)) {
                            $withdrawequity = $row['total'];
                        }
                        $ind_equity_balance = $equity - $withdrawequity;
                        $_SESSION['ind_equity_balance'] = $ind_equity_balance;
                    } else {
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

                        $codename = "";
                    }
//       @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
                
                
                }
                
                
                
                
                
                
                
                if (isset($_POST['btnsrch'])) {

                    $codename = $_POST['srch'];
//        @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
                    $sql_state1 = "SELECT * FROM weekly_allloan WHERE disburseloan > 1 AND remarks = 'loan disbursement' AND codename = '$codename'";
                    $result1 = mysqli_query($connect, $sql_state1);

                    while ($row = mysqli_fetch_assoc($result1)) {
                        $get_name = $row["name"];
                        $closingdate = $row["enddate"];
                        $loan_type = $row["type"];
                        $disburseloan = $row["disburseloan"];
                        $check_codename = $row["codename"];
                        $interest = $row["interest"];
                        $proposedsavings = $row["proposedsavings"];
                        $no_weeks = $row['weeks'];
                    }
                    $_SESSION['closingdate'] = $closingdate;
                    $_SESSION['interest'] = $interest;

                    if ($check_codename != "") {
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



                        //        LETS SEARCH FOR SAVINGS BALANCE  
                        $sql_state1 = "SELECT * FROM weekly_allloan WHERE name = '$get_name' AND codename = '$codename'";
                        $result1 = mysqli_query($connect, $sql_state1);
                        while ($row = mysqli_fetch_assoc($result1)) {
                            $ind_savings_balance = $row['indbalsavings'];
                        }
                        $_SESSION['ind_savings_balance'] = $ind_savings_balance;

//        LETS GET EQUITY BY SUM    
                        $sum_deposit = "SELECT SUM(equity) as total FROM weekly_allloan WHERE name = '$get_name' AND codename = '$codename'";
                        $result2 = mysqli_query($connect, $sum_deposit);
                        while ($row = mysqli_fetch_assoc($result2)) {
                            $equity = $row['total'];
                        }

                        $sum_withdraw = "SELECT SUM(withdrawequity) as total FROM weekly_allloan WHERE name = '$get_name' AND codename = '$codename'";
                        $result3 = mysqli_query($connect, $sum_withdraw);
                        while ($row = mysqli_fetch_assoc($result3)) {
                            $withdrawequity = $row['total'];
                        }
                        $ind_equity_balance = $equity - $withdrawequity;
                        $_SESSION['ind_equity_balance'] = $ind_equity_balance;
                    } else {
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

                        $codename = "";
                    }
//       @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
                }
                ?>



                                                            </form>   





                                                            <!--<h4 class="sub-title">Basic Inputs</h4>-->
                                                            <form action="withdrawals.php" method="POST" enctype="multipart/form-data">
                                                                <center> 
                                                                    <div  style="width:140px; height:140px;" class="mb-5">
                                                                        <img id="img" src="<?php echo $images; ?>" alt="THIS IS TO LOAD PHOTO"  style="border: 4px #99ff99 solid; width:140px; height:140px;" >
                                                                        <input type="hidden" name="idd" value="<?php echo $id; ?>" />   
                                                                        <input type="hidden" name="imge" value="<?php echo $images; ?>" /> 
                                                                    </div>
                                                                </center>  


                                                                <div class="form-group row">                                                                 
                                                                    <label class="col-sm-2 col-form-label">Name:</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="hidden" id="duplicate_name" />      
                                                                        <input type="text" class="form-control" placeholder="Name"   id="nam" type="text" name="name" value="<?php echo $name; ?>"  maxlength="50" readonly="" style="text-transform: uppercase;" required>
                                                                    </div>
                                                                </div>
                                                                <input type="hidden" name="shadow" value="<?php echo $get_name; ?>"/>

                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Unit District:</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" class="form-control" placeholder="District"  name="regnum" value="<?php echo $regnum; ?>"  maxlength="12" readonly=""  style="text-transform: uppercase;" required>
                                                                    </div>
                                                                </div>



                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Select Withdraw Type:</label>
                                                                    <div class="col-sm-10">
                                                                        <select name="with_type" class="form-control" required>
                                                                            <option value="" disabled selected hidden>select Savings OR Withdrawal</option>
                                                                            <option value="savings">Savings</option>
                                                                            <option value="equity">Equity</option>
                                                                        </select>

                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <br>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Enter Amount To Withdraw:</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="number" class="form-control" placeholder="enter Amount"  type="text" name="parent" maxlength="10" required >
                                                                    </div>
                                                                </div>




                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label">Loan Code Name:</label>
                                                                    <div class="col-sm-10">
                                                                        <input  class="form-control" type="text" name="telephone" id="codename" value="<?php echo $codename; ?>" readonly="" placeholder="code name" maxlength="20" required>
                                                                    </div>
                                                                </div>


                                                                <div class="form-group row">
                                                                    <label class="col-sm-2 col-form-label"></label>

                                                                    <div class="col-sm-10 mx-auto">
                                                                        <input style=" padding: 8px;  font-weight: bold;" class="btn btn-danger button-distance" id="update"  type="submit" name="withd"  value="Withdraw" />       

                                                                        <a style="margin-left:40px; border-radius: 10px;" class="btn btn-dark" href="withdrawals.php">Reset</a>
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



            <!-- Script -->
            <script type='text/javascript' >
               $(function () {

                   $("#autocomplete").autocomplete({
                       source: function (request, response) {

                           $.ajax({
                               url: "codename_weekly.php",
                               type: 'post',
                               dataType: "json",
                               data: {
                                   search: request.term
                               },
                               success: function (data) {
                                   response(data);
                               }
                           });
                       },
                       select: function (event, ui) {
                           $('#autocomplete').val(ui.item.label); // display the selected text
                           $('#selectuser_id').val(ui.item.value); // save selected id to input
                           return false;
                       }
                   });
        //////////////////////////////////////////////////////////////////////////////////////////////////////
                   // Multiple select
                   $("#multi_autocomplete").autocomplete({
                       source: function (request, response) {

                           var searchText = extractLast(request.term);
                           $.ajax({
                               url: "autocomplete.php",
                               type: 'post',
                               dataType: "json",
                               data: {
                                   search: searchText
                               },
                               success: function (data) {
                                   response(data);
                               }
                           });
                       },
                       select: function (event, ui) {
                           var terms = split($('#multi_autocomplete').val());

                           terms.pop();

                           terms.push(ui.item.label);

                           terms.push("");
                           $('#multi_autocomplete').val(terms.join(", "));
        ///////////////////////////////////////////////////////////////////////////////////////
                           // Id
                           var terms = split($('#selectuser_ids').val());

                           terms.pop();

                           terms.push(ui.item.value);

                           terms.push("");
                           $('#selectuser_ids').val(terms.join(", "));

                           return false;
                       }

                   });
               });

               function split(val) {
                   return val.split(/,\s*/);
               }
               function extractLast(term) {
                   return split(term).pop();
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
                                           "Image too large, please resize image to 100kb. Your current image size is: " + file / 1000 + "mb (" + file + "kb). Image should be: Horizontal = 400px by Vertical = 300px.");
        //                    document.getElementById('size').value = file; 
                                   return false;
                               }
                           }
                       }
                       //////////////////////////////////////////////////////////// 



                       var name_up = document.getElementById('nam').value;
                       if (name_up === "") {
                           alert("Search member to update first");
                           return false;
                       }
                   });

               });





               /////////THIS IS TO CHECK BEFORE FINAL DELETION////////
               $(document).ready(function () {

                   $("#delete").click(function () {
                       var name_del = document.getElementById('nam').value;
                       if (name_del === "") {
                           alert("Search member to delete first");
                       } else {
                           var del_check = confirm("You will loose all '" + name_del + "' information when you delete. DO YOU WISH TO CONTINUE?");

                           if (del_check === true) {
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

