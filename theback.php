<?php
session_start();

include 'connection.php';
$random_pin = rand(10, 10000);


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

$store_approve = "";

if (isset($_POST['loan'])) {
    $name = strtoupper($_POST['name']);

    if ($name != "") {

        $parent = str_replace(",", "", $_POST['parent']);
        $telephone = $_POST['telephone'];//codename
        $branch = $_POST['branch'];
        $int_perc = str_replace(",", "", $_POST['interest']);
        $pro_fee = $_POST['pro_fee'];
        $group_name = $_POST['group_name'];
        $loan_type = $_POST['loan_type'];
        $figure = str_replace(",", "", $_POST['figure']);
        $acc_officer = $_POST['acc_officer'];
        $insure_perc = str_replace(",", "", $_POST['insure_perc']);
        $insure_figure = str_replace(",", "", $_POST['insure_figure']);
        $month = date("F");
        $year = date("Y");
        $regnum = strtoupper($_POST['regnum']); //district
        $startdate = $_POST['startdate'];
        if ($startdate == "") {
            $startdate = date("Y-m-d");
        }
        $date = date('jS F Y', strtotime($startdate));
        //       -----------------------------------------------------------
        ////CALCULATE CLOSING DATE
        $closedate = date('Y-m-d', strtotime($startdate . ' + 40 days'));
        //       -----------------------------------------------------------

        //////THIS IS TO CHECK FOR CODE NAME  
        $get_code_result = "";
        $check_for_codename = "SELECT * FROM allloan WHERE codename = '$telephone'";
        $result_code = mysqli_query($connect, $check_for_codename);
        while ($row = mysqli_fetch_assoc($result_code)) {
            $get_code_result = $row['codename'];
        }


        if ($get_code_result == "") {


            ///////////INSERT FOR REVENUE
            if ($figure > 1) {
                $to_revenue = $pro_fee;

                $collector_name = @$_SESSION['collector_name'];
                if ($collector_name == "") {
                    $collector_name = "admin";
                }

                $_SESSION['collector_name'] = "";

                date_default_timezone_set("Africa/Lagos");
                $sql_statement2 = "INSERT INTO revenuexp (remaks, category, type, revenue, date, date_format, month, year, collector, branch) Values('$name processing fee for daily loan', 'pro_fee_daily', 'daily', '$to_revenue', '$date', '$startdate',  '$month', '$year', '$collector_name', '$branch')";
                $result2 = mysqli_query($connect, $sql_statement2);
            }



            //////////////////GET THE DIVISOR FOR INTREST TO REVENUE ON REPAYMENTS       
            $real_payback = $parent + $figure;
            $daily_payback = $real_payback / 30;
            $daily_int = $figure / 30;
            $divisor_for_int_payment = $daily_payback / $daily_int;

            //INSERT RECORD 1

            date_default_timezone_set("Africa/Lagos");
            $time_stamp = date("h:ia");
            $time_stamp1 = date("h:ia", strtotime($time_stamp));

            $sql_statement = "INSERT INTO allloan (name, type, remarks, disburseloan, indbalance, interest, int_perc, interest_reduce, sum_unearned, codename, date, date_format, month, year, district, startdate, enddate, collector, timestamp, dob, insurance_in, divisor, acc_officer, branch) VALUES ('$name', '$loan_type', 'loan disbursement', '$parent', '$parent', '$figure', '$int_perc', '$figure', '$figure', '$telephone', '$date', '$startdate', '$month', '$year', '$regnum', '$startdate', '$closedate', 'admin', '$time_stamp1', '$group_name', '$insure_figure', '$divisor_for_int_payment', '$acc_officer', '$branch')";

            $result = mysqli_query($connect, $sql_statement);

            /////////SUM GENERAL REPAY & DISBURSE LOAN SO YOU CAN GET GEN BALALNCE
            ////////////THIS IS TO SUM PAYMENTS
            $total_payments = mysqli_query($connect, "SELECT SUM(repay) as total FROM allloan");
            while ($row1 = mysqli_fetch_array($total_payments)) {
                $summation_pay = $row1['total'];
            }


            ////////////THIS IS TO SUM DISBURSE
            $total_disburse2 = mysqli_query($connect, "SELECT SUM(disburseloan) as total FROM allloan");
            while ($row2 = mysqli_fetch_array($total_disburse2)) {
                $summation_disburse = $row2['total'];
            }
            $gen_balance = $summation_disburse - $summation_pay;


            $result2 = mysqli_query($connect, "UPDATE allloan SET genbalance = '$gen_balance' WHERE codename = '$telephone' AND indbalance > 0");
            //           UPDATE dailyenddate FOR MEMEBERS DB TO AUTO-DETECT PENALTY
//        $result222 = mysqli_query($connect, "UPDATE members SET dailyenddate = '$closedate', dailycode = '$telephone' WHERE namee = '$name'");
            $result222 = mysqli_query($connect, "UPDATE allloan SET dailyindbal = '$parent' WHERE disburseloan > '1' AND remarks = 'loan disbursement' AND codename = '$telephone'");




            if (@$_SESSION['id'] != "") {

                $update_id = $_SESSION['id'];
                $status1 = $_SESSION['status'];
                $status = "Approved";
                $result28 = mysqli_query($connect, "UPDATE request_loan SET status = '$status', approved_disburseloan = '$parent' WHERE id = '$update_id'");

                $store_approve = "Loan is now approved";
            }















            //       *********************************||||||||||||||||****************************************************            
            $summation5 = $summation6 = "";
            ///////////THIS IS TO SUM TOTAL monthly_disburseloan///////////////////
            $total_monthly_disburseloan = mysqli_query($connect, "SELECT SUM(disburseloan) as total FROM monthly_allloan WHERE name='$name'");
            while ($row = mysqli_fetch_array($total_monthly_disburseloan)) {
                $summation5 = $row['total'];
            }

            ////////////THIS IS TO TOTAL monthly_payment
            $total_monthly_payment = mysqli_query($connect, "SELECT SUM(repay) as total FROM monthly_allloan WHERE name='$name'");
            while ($row1 = mysqli_fetch_array($total_monthly_payment)) {
                $summation6 = $row1['total'];
            }
            //////////////////////////////////////////
            @$monthly_status = $summation5 - $summation6;



            //       *********************************||||||||||||||||****************************************************            
            $summation1 = $summation2 = $summation3 = $summation4 = "";
            ///////////THIS IS TO SUM TOTAL daily_disburseloan///////////////////
            $total_daily_disburseloan = mysqli_query($connect, "SELECT SUM(disburseloan) as total FROM allloan WHERE name='$name'");
            while ($row = mysqli_fetch_array($total_daily_disburseloan)) {
                $summation1 = $row['total'];
            }

            ////////////THIS IS TO TOTAL daily_payment
            $total_daily_payment = mysqli_query($connect, "SELECT SUM(repay) as total FROM allloan WHERE name='$name'");
            while ($row1 = mysqli_fetch_array($total_daily_payment)) {
                $summation2 = $row1['total'];
            }
            //////////////////////////////////////////
            @$daily_status = $summation1 - $summation2;

            /////======================================================================


            ///////THIS IS TO SUM TOTAL weekly_disburseloan///////////////////
            $total_weekly_disburseloan = mysqli_query($connect, "SELECT SUM(disburseloan) as total FROM weekly_allloan WHERE name='$name'");
            while ($row = mysqli_fetch_array($total_weekly_disburseloan)) {
                $summation3 = $row['total'];
            }

            ////////////THIS IS TO TOTAL weekly_payment
            $total_weekly_payment = mysqli_query($connect, "SELECT SUM(repay) as total FROM weekly_allloan WHERE name='$name'");
            while ($row1 = mysqli_fetch_array($total_weekly_payment)) {
                $summation4 = $row1['total'];
            }
            //////////////////////////////////////////
            @$weekly_status = $summation3 - $summation4;

            @$total_status = $daily_status + $weekly_status + $monthly_status;
            //UPDATE RECORD
            $sql_statement101 = "UPDATE members SET balance = '$total_status' WHERE namee='$name'";
            $result29 = mysqli_query($connect, $sql_statement101);
            //       **************************||||||||||||||||***********************************************            













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

            $output_closedate1 = date('d-M-Y', strtotime($closedate));
            $dailyp2 = $parent;


            if ($result == true) {
                //..........................TERMII SMS START.......................................

                $sms_output_closedate = $output_closedate1;
                $sms_date = date("d-M-Y");
                $sms_name = $name;
                $sms_amt_disburseloan = number_format($dailyp2);
                $sms_parent = number_format($parent);
                $naija_code = "+234";
                $phone = $naija_code . ltrim($tel, '0');
                $laon = "Loan";
                $curl = curl_init();
                curl_setopt_array(
                    $curl,
                    array(
                        CURLOPT_URL => 'https://api.ng.termii.com/api/sms/send',
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_ENCODING => '',
                        CURLOPT_MAXREDIRS => 10,
                        CURLOPT_TIMEOUT => 0,
                        CURLOPT_FOLLOWLOCATION => true,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => 'POST',
                        CURLOPT_POSTFIELDS => ' {
              "to": "' . $phone . '",
               "from": "FINSOLUTE",
               "sms": "Disbursed->₦' . $sms_amt_disburseloan . ' Expiry_DT->' . $sms_output_closedate . '",
               "type": "plain",
               "channel": "generic",
               "api_key": "TLpOlmFOTXS8w6kjUiqdhXTYYKXAGES30NEAb8ubc51v5BpS3p2vnE1euNXgvW"

           }',
                        CURLOPT_HTTPHEADER => array(
                            'Content-Type: application/json'
                        ),
                    )
                );
                $response = curl_exec($curl);
                //    if(curl_errno($curl)) {
//        echo 'Curl error: ' . curl_error($curl);
//    } else {
//        echo "<script>alert('Messasge sent to $phone')</script>";
//    }
//    curl_close($curl);
//    //echo $response;
                //..........................TERMII SMS END.......................................   


                $_SESSION['store_print'] = 3;

                $dailyp1 = $parent + $figure;
                $dailyp = $dailyp1 / 30;
                //               LETS GET THE DAILY INTEREST PAYMENT  
                $daily_int = $figure / 30;

                $dailypayment = ceil($dailyp);
                $output_closedate = date('d-M-Y', strtotime($closedate));
                $_SESSION['redirect_message'] = "<script type='text/javascript'> $(document).ready(function(){ 
                swal({
                         title: 'Success!',
                         text: '$store_approve. $name has successfully borrowed  " . number_format($dailyp1) . " (plus interst rate) Naira. Payment period expires $output_closedate. Daily Payment is: " . number_format($dailypayment) . " Naira. Interest of " . number_format($daily_int) . " Naira will be paid daily to the Revenue account automaticaly. Codename for this loan is: $telephone. An Insurance of " . number_format($insure_figure) . " Naira has been lodged for $name.',
                         icon: 'success',
                        buttons: {
                            confirm : {text:'Ok',className:'sweet-orange'},
                          
                        },
                        closeOnClickOutside: false
                       })
                  
                }); </script>";
                '';
                $id = "";
                $_SESSION['id'] = "";
                //                  header("location:loan_statement.php?codename=$telephone &name=$name");  
                echo "<script> location.href = 'loan_statement.php?codename=$telephone&name=$name'; </script>";
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
                         title: 'Codename Duplicate!!',
                         text: 'Codename already exist in database. Retry to generate different or Abort if loan is already given',
                         icon: 'warning',
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
    <title>Daily Get Loan</title>
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
                                            <h5 class="m-b-10">Daily Get Loan</h5>
                                            <p class="m-b-0">Book A Loan for Customers</p>
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

                                            <div class="col-sm-8">
                                                <form name="srch" action="theback.php" method="POST"
                                                    enctype="multipart/form-data">

                                                    <center>
                                                        <div class="input-group mb-3">
                                                            <input type="text" class="form-control" id="autocomplete"
                                                                name="srch"
                                                                placeholder="Search Black Listed Customer To View"
                                                                required="">
                                                            <div class="input-group-append">
                                                                <button class="btn btn-warning" id="btnsearch"
                                                                    name="btnsrch" type="submit">SEARCH</button>
                                                            </div>
                                                        </div>
                                                    </center>
                                                </form>

                                            </div>
                                            <div class="col-sm-4" style="text-align: right;">
                                                <a href="black_list.php" class="btn btn-success">VIEW ALL</a>
                                            </div>
                                        </div>
                                        <?php







                                        if (isset($_POST['btnsrch'])) {
                                            $name = $_POST['srch'];
                                            $get_name = $name;
                                            include 'check_debt.php';

                                            if ($total_ckeck == 1) {
                                                //                                                    echo "<script>alert('$get_name I see you well $total_ckeck');</script>";        
                                                echo "<script>alert('I see you')</script>";
                                            }
                                            //loop through all table rows
                                            $inc = 1;

                                            $result = mysqli_query($connect, "SELECT * FROM members WHERE black_list = 'YES' AND namee = '$name'");
                                            echo ' <div class="card">';
                                            echo '<div class="card-block table-border-style">';

                                            echo '<div class="table-responsive" >';
                                            echo '<CAPTION><h3 align="center" style="font-size:28px; color:black;">' . $name . '</h3></CAPTION>';
                                            echo '<table class="table table-bordered table-striped   table-hover " >';

                                            echo ' <thead class="thead-dark">';

                                            echo '<tr align = "center">';
                                            echo '<th>S/N</th>';
                                            echo '<th>Name</th>';
                                            echo '<th>Registered By</th>';
                                            echo '<th>Date Joined</th>';
                                            echo '<th>Reason for Black Listing</th>';



                                            echo '<th>View Details</th>';
                                            echo '</tr>';

                                            echo '</thead>';

                                            echo '<tbody class="" style="font-family: sans-serif; color:black ; font-weight:bold;">';
                                            while ($row = mysqli_fetch_array($result)) {



                                                echo "<tr align = 'center'>";
                                                echo "<td>" . $inc . "</td>";
                                                echo "<td>" . $row['namee'] . "</td>";
                                                echo "<td>" . $row['registered_by'] . "</td>";
                                                echo "<td>" . $row['level'] . "</td>";
                                                echo "<td>" . $row['black_desc'] . "</td>";



                                                echo "<td ><a style='color:brown;' href='black_list.php?get_name=" . $row['namee'] . "'>View Debt</a></td>";


                                                echo "</tr>";
                                                $inc++;
                                            }







                                            echo ' </tbody>';
                                            echo ' </table>';

                                            echo '</div>';
                                            echo '</div>';
                                            echo '</div>';
                                        } else {
                                            //loop through all table rows
                                            $inc = 1;

                                            $result = mysqli_query($connect, "SELECT * FROM members WHERE black_list = 'YES'");
                                            echo ' <div class="card">';
                                            echo '<div class="card-block table-border-style">';

                                            echo '<div class="table-responsive" >';
                                            echo '<CAPTION><h3 align="center" style="font-size:28px; color:black;">ALL BLACK LISTED CUSTOMERS</h3></CAPTION>';
                                            echo '<table class="table table-bordered table-striped   table-hover " >';

                                            echo ' <thead class="thead-dark">';

                                            echo '<tr align = "center">';
                                            echo '<th>S/N</th>';
                                            echo '<th>Name</th>';
                                            echo '<th>Registered By</th>';
                                            echo '<th>Date Joined</th>';
                                            echo '<th>Reason for Black Listing</th>';



                                            echo '<th>View Details</th>';
                                            echo '</tr>';

                                            echo '</thead>';

                                            echo '<tbody class="" style="font-family: sans-serif; color:black ; font-weight:bold;">';
                                            while ($row = mysqli_fetch_array($result)) {



                                                echo "<tr align = 'center'>";
                                                echo "<td>" . $inc . "</td>";
                                                echo "<td>" . $row['namee'] . "</td>";
                                                echo "<td>" . $row['registered_by'] . "</td>";
                                                echo "<td>" . $row['level'] . "</td>";
                                                echo "<td>" . $row['black_desc'] . "</td>";



                                                echo "<td ><a style='color:brown;' href='theback.php?get_name=" . $row['namee'] . "'>View Debt</a></td>";


                                                echo "</tr>";
                                                $inc++;
                                            }







                                            echo ' </tbody>';
                                            echo ' </table>';

                                            echo '</div>';
                                            echo '</div>';
                                            echo '</div>';
                                        }




                                        if (isset($_GET['get_name'])) {
                                            $get_name = $_GET['get_name'];

                                            include 'check_debt.php';

                                            if ($total_ckeck == $total_ckeck) {
                                                //                                                    echo "<script>alert('$get_name I see you well $total_ckeck');</script>";        
                                                include 'show_debt.php';
                                            }
                                        }
                                        ?>




                                        <script>
                                            function goBack() {
                                                window.location = "admin_home.php";
                                            }
                                        </script>

                                        <!--THIS IS TO RE-LOAD THE ENTIRE STUDENT-->
                                        <script>
                                            $(document).ready(function () {
                                                var show_all = $(".show_all"); //LINK TO GO AND VIEW ALL DEBTORS   
                                                $(show_all).click(function (e) { //Function LINK TO GO AND VIEW ALL DEBTORS button click
                                                    e.preventDefault();
                                                    window.location = "black_list.php";
                                                });
                                            });
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
                                            });
                                        </script>





                                        <!-- Page-body end -->



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


        <script type='text/javascript'>
            $(function () {
                $("#autocomplete_staff").autocomplete({
                    source: function (request, response) {
                        $.ajax({
                            url: "autocomplete_staff.php",
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
                        $('#autocomplete_staff').val(ui.item.label); // display the selected text
                        $('#selectuser_id').val(ui.item.value); // save selected id to input
                        return false;
                    }
                });
            });   
        </script>


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


                ////////////////////////////////////////////////////////////////////////////
                $("#group_name").autocomplete({
                    source: function (request, response) {

                        $.ajax({
                            url: "group_name.php",
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
                        $('#group_name').val(ui.item.label); // display the selected text

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




        <script>
            //////////////////////THIS FOR PERCENT% ON KEY UP//////////////////////////
            $(document).ready(function () {
                var perc = $('#perc');
                $(perc).keyup(function (e) {
                    e.preventDefault();

                    var cleanNumber = $("#amount").val().split(",").join("");
                    var amount = cleanNumber;
                    var perc = (document.getElementById('perc').value);

                    var fig = perc / 100;
                    var tot_fig = amount * fig;
                    tot_fig = Math.round(tot_fig);

                    document.getElementById('figure').value = tot_fig;
                });
            });  
        </script>



        <script>
            //////////////////////THIS FOR PERCENT1% ON KEY UP//////////////////////////
            $(document).ready(function () {
                var perc = $('#perc1');
                $(perc).keyup(function (e) {
                    e.preventDefault();

                    var cleanNumber = $("#amount").val().split(",").join("");
                    var amount = cleanNumber;
                    var perc = (document.getElementById('perc1').value);

                    var fig = perc / 100;
                    var tot_fig = amount * fig;
                    tot_fig = Math.round(tot_fig);

                    document.getElementById('figure1').value = tot_fig;
                });
            });  
        </script>



</body>

</html>