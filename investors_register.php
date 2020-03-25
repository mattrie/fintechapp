<?php
session_start();

include 'connection.php';
$random_pin = rand(10, 10000);

//         if(isset($_POST['reset'])){
//             @header("location:investors_register.php");
//         }
//    ob_start();
//session_start();


////////////////////////UPDATE///////////////////////////////////////   
///////////////////////////lets upload the file first/////////////////////////////////////////////                      
if (!empty($_FILES['fileToUpload']['name'])) {

    $target_dir = "images/";// this is the directory to upload to

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

if (isset($_POST['loan'])) {
    $name = strtoupper($_POST['name']);

    if ($name != "") {

        $parent = str_replace(",", "", $_POST['parent']);
        $telephone = $_POST['telephone'];//codename
        $interest = $_POST['interest'];
        $figure = str_replace(",", "", $_POST['figure']);

        $pro_fee = "";
        $loan_type = "";

        $backdate = $_POST['backdate'];
        if ($backdate == "") {
            $date = date("jS F Y");
            $month = date("F");
            $year = date("Y");
        } else {
            //get backdate year and month  
            $month = date('F', strtotime($backdate));
            $year = date('Y', strtotime($backdate));
            $date = $output_closedate = date('jS F Y', strtotime($backdate));
        }

        $regnum = strtoupper($_POST['regnum']); //district
        $startdate = "";
        //       -----------------------------------------------------------
        ////CALCULATE CLOSING DATE
        $closedate = "";
        //       -----------------------------------------------------------


        ///////////INSERT FOR REVENUE


        //INSERT RECORD 1

        $time_stamp = date("h:ia");
        $time_stamp1 = date("h:ia", strtotime($time_stamp));
        $db_date = date('Y-m-d', strtotime($date));




        $sql_statement = "INSERT INTO investment (name, codename, remarks, pay, monthinterset, interestrate, lastpaid, date, month, year, district, time) VALUES ('$name', '$telephone', 'Investment deposited', '$parent', '', '$interest', '$db_date', '$date', '$month', '$year', '$regnum', '$time_stamp1')";

        $result = mysqli_query($connect, $sql_statement);


        /////////SUM INDIVIDUAL REPAY & DISBURSE LOAN SO YOU CAN GET GEN BALALNCE
        ////////////THIS IS TO SUM PAYMENTS
        $total_payments1 = mysqli_query($connect, "SELECT SUM(pay) as total FROM investment WHERE codename = '$telephone'");
        while ($row1 = mysqli_fetch_array($total_payments1)) {
            $summation_pay_sum = $row1['total'];
        }


        ////////////THIS IS TO SUM DISBURSE
        $total_disburse3 = mysqli_query($connect, "SELECT SUM(withdraw) as total FROM investment WHERE codename = '$telephone'");
        while ($row2 = mysqli_fetch_array($total_disburse3)) {
            $summation_withdraw_sum = $row2['total'];
        }




        /////////SUM GENERAL REPAY & DISBURSE LOAN SO YOU CAN GET GEN BALALNCE
        ////////////THIS IS TO SUM PAYMENTS
        $total_payments = mysqli_query($connect, "SELECT SUM(pay) as total FROM investment");
        while ($row1 = mysqli_fetch_array($total_payments)) {
            $summation_pay = $row1['total'];
        }


        ////////////THIS IS TO SUM DISBURSE
        $total_disburse2 = mysqli_query($connect, "SELECT SUM(withdraw) as total FROM investment");
        while ($row2 = mysqli_fetch_array($total_disburse2)) {
            $summation_disburse = $row2['total'];
        }
        $gen_balance = $summation_pay - $summation_disburse;

        $update_special = mysqli_query($connect, "UPDATE investment SET sum_pay = '$summation_pay_sum', sum_withdraw = '$summation_withdraw_sum', updatebal = '$parent', updatedate = '$db_date' WHERE codename = '$telephone' AND remarks = 'Investment deposited' AND pay > 1");

        $result2 = mysqli_query($connect, "UPDATE investment SET genbalinvest = '$gen_balance',  indbalinvest = '$parent' WHERE codename = '$telephone'");





        ///////THIS IS TO GET THE INDIVIDUAL SAVINGS BALANCE
        ///////////////THIS IS TO SUM ALL SAVINGS
        $sum_savings = mysqli_query($connect, "SELECT SUM(pay) as total FROM investment WHERE codename = '$telephone' ");
        while ($row = mysqli_fetch_assoc($sum_savings)) {
            $summation_savings = $row['total'];
            //               $plus_interest = $row['interest'];  
        }


        ////////////THIS IS TO SUM ALLWITHDRAWALS
        $sum_withdraw = mysqli_query($connect, "SELECT SUM(withdraw) as total FROM investment WHERE codename = '$telephone'");
        while ($row1 = mysqli_fetch_assoc($sum_withdraw)) {
            $summation_withdraw = $row1['total'];
        }

        $savings_balance = $summation_savings - $summation_withdraw;


        //  *******************************************************************************************************                

        //            LETS GET THE INTEREST ON AVAILABLE BALANCE   
        $investment_interest_amt = ($interest / 100) * $savings_balance;




        ///---------------------/ TO GET PHONE------------
        $debtor_info = mysqli_query($connect, "SELECT * FROM members WHERE namee = '$name'");
        while ($row_info = mysqli_fetch_assoc($debtor_info)) {
            $address = $row_info['addresss'];
            $tel = $row_info['telephone'];
            $image = $row_info['imagess'];
            $district = $row_info['registration_num'];
            $refree = $row_info['religion'];
        }

        //     ------------------------------------------------------------------------ 

        if ($result == true) {
            //..........................TERMII SMS START.......................................


            //    $sms_date = date("d-M-Y h:ia");
//     $sms_name = $name;
//     
//    $sms_parent = number_format($parent);
//     $sms_balance = number_format($investment_interest_amt);
//    $naija_code = "+234";
//    $phone = $naija_code.$tel;    
//    $curl = curl_init();
//    curl_setopt_array($curl, array(
//    CURLOPT_URL => '',
//    CURLOPT_RETURNTRANSFER => true,
//    CURLOPT_ENCODING => '',
//    CURLOPT_MAXREDIRS => 10,
//    CURLOPT_TIMEOUT => 0,
//    CURLOPT_FOLLOWLOCATION => true,
//    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//    CURLOPT_CUSTOMREQUEST => 'POST',
//    CURLOPT_POSTFIELDS =>' {
//              "to": "'.$phone.'",
//               "from": "FINSOLUTE",
//               "sms": "Investment-> ₦'.$sms_parent.'. Monthly_Interest->₦'.$sms_balance.'.",
//               "type": "plain",
//               "channel": "generic",
//               "api_key": "TLpOlmFOTXS8w6kjUiqdhXTYYKXAGES30NEAb8ubc51v5BpS3p2vnE1euNXgvW"
//
//           }',
//    CURLOPT_HTTPHEADER => array(
//      'Content-Type: application/json'
//    ),
//    ));
//    $response = curl_exec($curl);
//    if(curl_errno($curl)) {
//        echo 'Curl error: ' . curl_error($curl);
//    } else {
//        echo "<script>alert('Messasge sent to $phone')</script>";
//    }
//    curl_close($curl);
//    //echo $response;
            //..........................TERMII SMS END.......................................                       


            echo "<script type='text/javascript'> $(document).ready(function(){ 
                swal({
                         title: 'Success!',
                         text: '$name has successfully Invested  " . number_format($parent) . " Naira. Codename for this investment is: $telephone',
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
    <title>Investor Get Code</title>
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

    <meta name="keywords"
        content="bootstrap, bootstrap admin template, admin theme, admin dashboard, dashboard template, admin template, responsive" />
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
                                            <h5 class="m-b-10">Investor Get Code</h5>
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
                                                        <h5>INVEST</h5>
                                                        <!--<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>-->
                                                    </div>
                                                    <div class="card-block">
                                                        <!--====================SEARCHING STUDENT-->
                                                        <form action="investors_register.php" method="POST"
                                                            enctype="multipart/form-data">
                                                            <center>
                                                                <div class="input-group mb-3">
                                                                    <input type="text" class="form-control"
                                                                        id="autocomplete" name="srch"
                                                                        placeholder="Search Customer To Generate code and make first payment"
                                                                        required="">
                                                                    <div class="input-group-append">
                                                                        <button class="btn btn-warning" id="btnsearch"
                                                                            name="btnsrch" type="submit">SEARCH</button>
                                                                    </div>
                                                                </div>
                                                            </center>


                                                            <!--///////////////////////////////////////////-->

                                                            <?php
                                                            //          session_start();
                                                            $get_name = $date = $images = $id = $name = $regnum = $address = $dob = $class = $parent = $telephone = $mail = $religion = $login_id = "";
                                                            $req_name = $req_type = $req_request_disburseloan = $req_district = $req_startdate = $req_collector = "";
                                                            $state = $type = $value = $codename = "";


                                                            if (isset($_GET['idd'])) {
                                                                $id = $_GET['idd'];
                                                                $name = $_GET['name'];
                                                                $req_type = $_GET['type'];
                                                                $req_request_disburseloan = $_GET['request_disburseloan'];
                                                                $regnum = $_GET['district'];
                                                                $req_startdate1 = $_GET['startdate'];
                                                                $req_startdate = date('d-M-Y', strtotime($req_startdate1));
                                                                $req_collector = $_GET['collector'];
                                                                $_SESSION['id'] = $id;
                                                                $_SESSION['status'] = $_GET['status'];

                                                                $sql_state = "SELECT * FROM members WHERE namee = '$name'";
                                                                $result = mysqli_query($connect, $sql_state);

                                                                while ($row = mysqli_fetch_assoc($result)) {
                                                                    $images = $row["imagess"];
                                                                }
                                                                $cut_name = substr($name, 0, 4);
                                                                $codename = $cut_name . $random_pin;

                                                            }




                                                            if (isset($_POST['btnsrch'])) {

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
                                                                //             Lets generate the code name; 
                                                            
                                                                $cut_name = substr($name, 0, 4);
                                                                $codename = $cut_name . $random_pin . "INV";
                                                            }
                                                            ?>



                                                        </form>





                                                        <!--<h4 class="sub-title">Basic Inputs</h4>-->
                                                        <form action="investors_register.php" method="POST"
                                                            enctype="multipart/form-data">
                                                            <center>
                                                                <div style="width:140px; height:140px;" class="mb-5">
                                                                    <img id="img" src="<?php echo $images; ?>"
                                                                        alt="THIS IS TO LOAD PHOTO"
                                                                        style="border: 4px #99ff99 solid; width:140px; height:140px;">
                                                                    <input type="hidden" name="idd"
                                                                        value="<?php echo $id; ?>" />
                                                                    <input type="hidden" name="imge"
                                                                        value="<?php echo $images; ?>" />
                                                                </div>
                                                            </center>


                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Name:</label>
                                                                <div class="col-sm-10">
                                                                    <input type="hidden" id="duplicate_name" />
                                                                    <input type="text" class="form-control"
                                                                        placeholder="Name" id="nam" type="text"
                                                                        name="name" value="<?php echo $name; ?>"
                                                                        maxlength="50" readonly=""
                                                                        style="text-transform: uppercase;" required>
                                                                </div>
                                                            </div>
                                                            <input type="hidden" name="shadow"
                                                                value="<?php echo $get_name; ?>" />

                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Unit
                                                                    District:</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control"
                                                                        placeholder="District" name="regnum"
                                                                        value="<?php echo $regnum; ?>" maxlength="12"
                                                                        readonly="" style="text-transform: uppercase;"
                                                                        required>
                                                                </div>
                                                            </div>


                                                            <br>
                                                            <br>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Enter Investment
                                                                    Amount:</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text"
                                                                        placeholder="enter Investment Amount"
                                                                        id="amount" onchange="FormatCurrency(this)"
                                                                        onkeypress="return CheckNumeric()"
                                                                        onkeyup="FormatCurrency(this)" id="amount"
                                                                        style="width: 200px; border-radius: 5px;"
                                                                        name="parent" maxlength="11" required><br>
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Interest
                                                                    %:</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" placeholder="%" id="perc"
                                                                        style="width: 65px; border-radius: 5px;"
                                                                        required="" name="interest" /><br>
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Monthly
                                                                    Interest:</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" readonly=""
                                                                        placeholder="Monthly interest" id="figure"
                                                                        style="width: 200px; border-radius: 5px;"
                                                                        onkeypress="return CheckNumeric()"
                                                                        onclick="FormatCurrency(this)"
                                                                        onkeyup="FormatCurrency(this)" required=""
                                                                        name="figure" /><br>
                                                                </div>
                                                            </div>




                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Click to Back
                                                                    Date:</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" name="backdate"
                                                                        placeholder="IF BackDate is True"
                                                                        onfocus="(this.type='date')"
                                                                        style="width: 200px; border-radius: 5px; ">
                                                                </div>
                                                            </div>


                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Loan Code
                                                                    Name:</label>
                                                                <div class="col-sm-10">
                                                                    <input class="form-control" type="text"
                                                                        name="telephone" id="codename"
                                                                        value="<?php echo $codename; ?>" maxlength="20"
                                                                        readonly="">
                                                                </div>
                                                            </div>


                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label"></label>

                                                                <div class="col-sm-10 mx-auto">
                                                                    <input
                                                                        style=" padding: 8px;  font-weight: bold; background-color: #66ff66; "
                                                                        class="btn button-distance" id="update"
                                                                        type="submit" name="loan"
                                                                        value="Submit Investment" />
                                                                    <a style="margin-left:40px; border-radius: 10px;"
                                                                        class="btn btn-dark"
                                                                        href="investors_register.php">Reset</a>
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




        <script>
            //////////////////////THIS FOR PERCENT% ON KEY UP//////////////////////////
            $(document).ready(function () {
                $("#perc").keyup(function () {

                    var cleanNumber = $("#amount").val().split(",").join("");
                    var amount = cleanNumber;
                    var perc = (document.getElementById('perc').value);

                    //       var  fig =  3.5 * 0.01 ;
                    var tot_fig = (perc * 0.01) * amount;
                    //           tot_fig = Math.round(tot_fig);

                    document.getElementById('figure').value = tot_fig.toFixed(0);
                });
            });  
        </script>

        <!--<center style="font-size: 18px; color: #cccccc; margin-top: 400px"><footer class="">&copy;<?php echo date('Y') ?>. By Mr. Matt.</footer></center>-->






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
        <script type='text/javascript'>
            $(function () {

                $("#autocomplete").autocomplete({
                    source: function (request, response) {

                        $.ajax({
                            url: "autocomplete.php",
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




                //////////////////////////////////////////////////////////////////////////
                $("#codename").autocomplete({
                    source: function (request, response) {

                        $.ajax({
                            url: "codename.php",
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
                        $('#codename').val(ui.item.label); // display the selected text
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

        <script>
            //////////////////////THIS FOR FIGURE ON KEY UP//////////////////////////
            $(document).ready(function () {
                var figure = $('#figure');
                $(figure).keyup(function (e) { //THIS IS TO AUTO-CALCULATE Attendd
                    e.preventDefault();

                    var cleanNumber = $("#amount").val().split(",").join("");
                    var amount = cleanNumber;


                    var cleanNumber1 = $("#figure").val().split(",").join("");
                    var fig = cleanNumber1;

                    var perc = fig / amount;
                    var tot_per = perc * 100;
                    tot_per = tot_per.toFixed(2);
                    document.getElementById('perc').value = tot_per;
                });
            });  
        </script>




</body>

</html>