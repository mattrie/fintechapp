<?php
session_start();

include 'connection.php';



if (isset($_POST['pay'])) {

    $name = strtoupper($_POST['name']);
    if ($name != "") {

        $parent = $_POST['parent'];
        //                                $telephone = $_POST['rate'];
        @$wave_revenue = $_POST['wave_revenue'];
        @$manual_revenue = $_POST['manual_revenue'];
        $branch = $_POST['branch'];
        $backdate = $_POST['backdate'];
        if ($backdate == "") {
            $date = date("jS F Y");
        } else {
            $date = $output_closedate = date('jS F Y', strtotime($backdate));
        }


        $date_format = date("Y-m-d", strtotime($date));


        $month = date("F");
        $year = date("Y");
        $ref = "ref" . date("F Y");
        $regnum = strtoupper($_POST['regnum']);
        @$target_file = $images;







        if ($wave_revenue == "ON") {
            $ref = "ref" . date("F Y");
            //INSERT RECORD
            date_default_timezone_set("Africa/Lagos");
            $time_stamp = date("h:ia");
            $time_stamp1 = date("h:ia", strtotime($time_stamp));

            if ($manual_revenue > 0) {
                $remarks = "$name income on contribution";
                $sql_statement23 = "INSERT INTO revenuexp (remaks,  revenue, date, month, year) Values('$name income on contribution', '$manual_revenue', '$date', '$month', '$year')";
                $result23 = mysqli_query($connect, $sql_statement23);

            } else {
                $remarks = "contribution payment";
                $manual_revenue = 0;
            }

            $sql_statement = "INSERT INTO contribution (name, amount, remarks, withdraw, amounttotal, withdrawtotal, rate, timestamp, date, date_format, ref, single, month, year, district, collector, branch) Values('$name', '$parent', '$remarks', '$manual_revenue', '0', '0', '$parent', '$time_stamp1', '$date', '$date_format','$ref', 'head', '$month', '$year' , '$regnum', 'admin', '$branch')";

            $result = mysqli_query($connect, $sql_statement);




            ////////////THIS IS TO SUM WITHDRAWAL BY MONTH///////////////////
            $total_savings11 = mysqli_query($connect, "SELECT SUM(amount) as monthtotal FROM contribution WHERE name='$name'");
            while ($row1 = mysqli_fetch_array($total_savings11)) {
                $summation_con = $row1['monthtotal'];
            }

            ///////////////////THIS IS TO SUM CONTRIBUTION BY MONTH///////////////////
            $total_savings22 = mysqli_query($connect, "SELECT SUM(withdraw) as monthtotal FROM contribution WHERE name='$name'");
            while ($row = mysqli_fetch_array($total_savings22)) {
                $summation_wit = $row['monthtotal'];
            }



            ////UPDATE CONTRIBUTION BASED ON NAME  TABLE
            $update_con = mysqli_query($connect, "UPDATE  contribution SET amounttotal = '' WHERE name='$name'");
            $update_con1 = mysqli_query($connect, "UPDATE  contribution SET amounttotal = '$summation_con' WHERE name='$name'");




            ////UPDATE WITHDRAWAL BASED ON NAME in month_con_wit TABLE
            $update_wit = mysqli_query($connect, "UPDATE  contribution SET withdrawtotal = '' WHERE name='$name'");
            $update_wit1 = mysqli_query($connect, "UPDATE  contribution SET withdrawtotal = '$summation_wit' WHERE name='$name'");






            ////////////THIS IS TO SUM TOTAL CONTRIBUTION///////////////////
            $total_savings = mysqli_query($connect, "SELECT SUM(amount) as total FROM contribution WHERE name='$name'");
            while ($row = mysqli_fetch_array($total_savings)) {
                $summation = $row['total'];
            }

            ////////////THIS IS TO TOTAL SUM WITHDRAWAL
            $total_savings1 = mysqli_query($connect, "SELECT SUM(withdraw) as total FROM contribution WHERE name='$name'");
            while ($row1 = mysqli_fetch_array($total_savings1)) {
                $summation1 = $row1['total'];
            }
            //////////////////////////////////////////
            $actual_savings = $summation - $summation1;

            //UPDATE RECORD
            $sql_statement1 = "UPDATE members SET savings = '$summation', loan = '$summation1', save_balance = '$actual_savings' WHERE namee='$name'";
            $result2 = mysqli_query($connect, $sql_statement1);

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


                $sms_date = date("d-M-Y h:ia");
                $sms_name = $name;

                $sms_parent = number_format($parent);
                $sms_balance = number_format($actual_savings);
                $sms_parent1 = $sms_parent . "N";
                $sms_balance1 = $sms_balance . "N";
                ltrim($tel, '0');
                $naija_code = "234";
                $phone = $naija_code . ltrim($tel, '0');
                $mssg = "Payments->₦$sms_parent1. Balance->₦$sms_balance1.";
                $laon = "Loan";

                $forcednd = 1;

                $curl = curl_init();

                // Construct the JSON body properly
                $data = json_encode([
                    "sender_name" => "FINSOLUTE",
                    "message" => $mssg,
                    "recipients" => $phone,
                    "forcednd" => $forcednd
                ]);

                curl_setopt_array($curl, array(
                    CURLOPT_URL => 'https://app.multitexter.com/v2/app/sendsms',
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'POST',
                    CURLOPT_POSTFIELDS => $data, // Pass the JSON string
                    CURLOPT_HTTPHEADER => array(
                        'Authorization: Bearer GLCNnH0pnKUGqaafecizgqUR0H5xKpyGTYAdYGUoY7avBpJHFpKN09DUcPiB', // Replace with your token
                        'Content-Type: application/json'
                    ),
                ));

                $response = curl_exec($curl);

                curl_close($curl);



                //..........................TERMII SMS END.......................................                       


                $_SESSION['store_message_contribution'] = "<script type='text/javascript'> $(document).ready(function(){ 
                swal({
                         title: 'Success!',
                         text: '$name has successfully paid " . number_format($parent) . ". Total savings: " . number_format($actual_savings) . "',
                         icon: 'success',
                        buttons: {
                            confirm : {text:'Ok',className:'sweet-orange'},
                          
                        },
                        closeOnClickOutside: false
                       })
                  
                }); </script>";
                '';
                $id = "";
                //                               header("location:contribution_statement.php?name=$name");    
                echo "<script> location.href = 'contribution_statement.php?name=$name'; </script>";

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




















        ////DO THE NORMAL IF WAVE IS NOT SELECTED   
        else {

            $get_check = "";
            ////////////////-----------check ref for first of the month-----------------------//////////////
            $name = strtoupper($_POST['name']);
            $check = mysqli_query($connect, "SELECT * FROM contribution WHERE name='$name'");
            while ($row_check = mysqli_fetch_assoc($check)) {
                $get_check = $row_check['ref'];
            }


            if ($get_check == $ref) {
                $ref = "ref" . date("F Y");
                //INSERT RECORD
                date_default_timezone_set("Africa/Lagos");
                $time_stamp = date("h:ia");
                $time_stamp1 = date("h:ia", strtotime($time_stamp));
                $sql_statement = "INSERT INTO contribution (name, amount, withdraw, timestamp, date, ref, month, year, district, collector) Values('$name', '$parent', '0', '$time_stamp1', '$date', '$ref', '$month', '$year' , '$regnum', 'admin')";
                $result = mysqli_query($connect, $sql_statement);




                ////////////THIS IS TO SUM WITHDRAWAL BY MONTH///////////////////
                $total_savings11 = mysqli_query($connect, "SELECT SUM(amount) as monthtotal FROM contribution WHERE name='$name'");
                while ($row1 = mysqli_fetch_array($total_savings11)) {
                    $summation_con = $row1['monthtotal'];
                }

                ///////////////////THIS IS TO SUM CONTRIBUTION BY MONTH///////////////////
                $total_savings22 = mysqli_query($connect, "SELECT SUM(withdraw) as monthtotal FROM contribution WHERE name='$name'");
                while ($row = mysqli_fetch_array($total_savings22)) {
                    $summation_wit = $row['monthtotal'];
                }



                ////UPDATE CONTRIBUTION BASED ON NAME  TABLE
                $update_con = mysqli_query($connect, "UPDATE  contribution SET amounttotal = '' WHERE name='$name'");
                $update_con1 = mysqli_query($connect, "UPDATE  contribution SET amounttotal = '$summation_con' WHERE name='$name'");




                ////UPDATE WITHDRAWAL BASED ON NAME in month_con_wit TABLE
                $update_wit = mysqli_query($connect, "UPDATE  contribution SET withdrawtotal = '' WHERE name='$name'");
                $update_wit1 = mysqli_query($connect, "UPDATE  contribution SET withdrawtotal = '$summation_wit' WHERE name='$name'");






                ////////////THIS IS TO SUM TOTAL CONTRIBUTION///////////////////
                $total_savings = mysqli_query($connect, "SELECT SUM(amount) as total FROM contribution WHERE name='$name'");
                while ($row = mysqli_fetch_array($total_savings)) {
                    $summation = $row['total'];
                }

                ////////////THIS IS TO TOTAL SUM WITHDRAWAL
                $total_savings1 = mysqli_query($connect, "SELECT SUM(withdraw) as total FROM contribution WHERE name='$name'");
                while ($row1 = mysqli_fetch_array($total_savings1)) {
                    $summation1 = $row1['total'];
                }
                //////////////////////////////////////////
                $actual_savings = $summation - $summation1;

                //UPDATE RECORD
                $sql_statement1 = "UPDATE members SET savings = '$summation', loan = '$summation1', save_balance = '$actual_savings' WHERE namee='$name'";
                $result2 = mysqli_query($connect, $sql_statement1);

                if ($result == true) {
                    $_SESSION['store_message_contribution'] = "<script type='text/javascript'> $(document).ready(function(){ 
                swal({
                         title: 'Success!',
                         text: '$name has successfully paid " . number_format($parent) . ". Total savings: " . number_format($actual_savings) . "',
                         icon: 'success',
                        buttons: {
                            confirm : {text:'Ok',className:'sweet-orange'},
                          
                        },
                        closeOnClickOutside: false
                       })
                  
                }); </script>";
                    '';
                    $id = "";
                    //                               header("location:contribution_statement.php?name=$name");   
                    echo "<script> location.href = 'contribution_statement.php?name=$name'; </script>";
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








                ///////////////////----if query does not see any ref then, send to revenue account----------////////////////////// 
            } else {
                $ref = "ref" . date("F Y");


                date_default_timezone_set("Africa/Lagos");
                $time_stamp = date("h:ia");
                $time_stamp1 = date("h:ia", strtotime($time_stamp));

                $sql_statement1 = "INSERT INTO contribution (name, amount, withdraw, amounttotal, withdrawtotal, rate, timestamp, date, ref, single, month, year, district, collector) Values('$name', 'first payment', '0', '0', '0', '$parent', '$time_stamp1', '$date', '$ref', 'head', '$month', '$year' , '$regnum', 'admin')";
                $result4 = mysqli_query($connect, $sql_statement1);


                $sql_statement = "INSERT INTO revenuexp (remaks,  revenue, date, month, year) Values('$name first contribution for $month - $year', '$parent', '$date', '$month', '$year')";
                $result2 = mysqli_query($connect, $sql_statement);

                if ($result2 == true) {
                    $_SESSION['store_message_contribution'] = "<script type='text/javascript'> $(document).ready(function(){ 
                swal({
                         title: 'Success!',
                         text: '$name has successfully paid " . number_format($parent) . ". This has been moved to revenue account (first payment for $month - $year )',
                         icon: 'success',
                        buttons: {
                            confirm : {text:'Ok',className:'sweet-orange'},
                          
                        },
                        closeOnClickOutside: false
                       })
                  
                }); </script>";

                    $id = "";
                    //                        header("location:contribution_statement.php?name=$name");    
                    echo "<script> location.href = 'contribution_statement.php?name=$name'; </script>";
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



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Contribution</title>
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
                                            <h5 class="m-b-10">Contribution</h5>
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

                                        <!--=================== THIS THE FORM BOX-->
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>DAILY CONTRIBUTION</h5>
                                                <!--<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>-->
                                            </div>
                                            <div class="card-block">

                                                <!--====================SEARCHING STUDENT-->
                                                <form action="contribution.php" method="POST"
                                                    enctype="multipart/form-data">
                                                    <center>
                                                        <div class="input-group mb-3">
                                                            <input type="text" class="form-control" id="autocomplete"
                                                                name="srch"
                                                                placeholder="Search Customer To Make Payment"
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
                                                    $get_branch = $get_name = $date = $images = $id = $name = $regnum = $address = $dob = $class = $parent = $telephone = $mail = $religion = $login_id = "";
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
                                                            $get_branch = $row['branch'];
                                                        }

                                                        ///////THIS IS TO GET SAVINGS BALANCE 
                                                        $sql_get_savings = "SELECT SUM(amount) as total FROM contribution WHERE name = '$name'";
                                                        $result11 = mysqli_query($connect, $sql_get_savings);
                                                        while ($row11 = mysqli_fetch_assoc($result11)) {
                                                            $savings = $row11['total'];
                                                        }

                                                        $sql_get_withdraw22 = "SELECT SUM(withdraw) as total FROM contribution WHERE name = '$name'";
                                                        $result22 = mysqli_query($connect, $sql_get_withdraw22);
                                                        while ($row11 = mysqli_fetch_assoc($result22)) {
                                                            $withdraw = $row11['total'];
                                                        }

                                                        $available_savings = $savings - $withdraw;

                                                        ////GET RATE OF CONTRIBUTION
                                                        $sql_rate_contributed = "SELECT * FROM contribution WHERE name = '$name'";
                                                        $result222 = mysqli_query($connect, $sql_rate_contributed);
                                                        while ($row11 = mysqli_fetch_assoc($result222)) {
                                                            $rate_contributed = $row11['rate'];
                                                        }


                                                        $_SESSION['get_name'] = $get_name;


                                                    }



                                                    if (isset($_GET['name'])) {

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
                                                            $get_branch = $row['branch'];
                                                        }

                                                        ///////THIS IS TO GET SAVINGS BALANCE 
                                                        $sql_get_savings = "SELECT SUM(amount) as total FROM contribution WHERE name = '$name'";
                                                        $result11 = mysqli_query($connect, $sql_get_savings);
                                                        while ($row11 = mysqli_fetch_assoc($result11)) {
                                                            $savings = $row11['total'];
                                                        }

                                                        $sql_get_withdraw22 = "SELECT SUM(withdraw) as total FROM contribution WHERE name = '$name'";
                                                        $result22 = mysqli_query($connect, $sql_get_withdraw22);
                                                        while ($row11 = mysqli_fetch_assoc($result22)) {
                                                            $withdraw = $row11['total'];
                                                        }

                                                        $available_savings = $savings - $withdraw;

                                                        ////GET RATE OF CONTRIBUTION
                                                        $sql_rate_contributed = "SELECT * FROM contribution WHERE name = '$name'";
                                                        $result222 = mysqli_query($connect, $sql_rate_contributed);
                                                        while ($row11 = mysqli_fetch_assoc($result222)) {
                                                            $rate_contributed = $row11['rate'];
                                                        }
                                                        $_SESSION['get_name'] = $get_name;

                                                    }


                                                    ?>



                                                </form>







                                                <form action="contribution.php" method="POST"
                                                    enctype="multipart/form-data">


                                                    <center>
                                                        <img id="img" src="<?php echo $images; ?>"
                                                            alt="THIS IS LOADS PHOTO"
                                                            style="border: 4px #99ff99 solid; width:140px; height:140px;">
                                                        <input type="hidden" name="idd" value="<?php echo $id; ?>" />
                                                        <input type="hidden" name="imge"
                                                            value="<?php echo $images; ?>" />
                                                    </center>
                                                    <br>
                                                    <div class="form-group">
                                                        <input type="hidden" id="duplicate_name" />
                                                        <input type="text" class="form-control" placeholder="Name"
                                                            id="nam" type="text" name="name"
                                                            value="<?php echo $name; ?>" maxlength="50" readonly=""
                                                            style="text-transform: uppercase;" required>
                                                    </div>

                                                    <input type="hidden" name="shadow"
                                                        value="<?php echo $get_name; ?>" />
                                                    <div class="form-group row">

                                                        <div class="col-sm-12">
                                                            <input type="hidden" id="duplicate_name" />
                                                            <input type="text" class="form-control"
                                                                placeholder="Branch Name" id="nam" type="text"
                                                                name="branch" value="<?php echo $get_branch; ?>"
                                                                maxlength="70" readonly=""
                                                                style="text-transform: uppercase;" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" placeholder="District"
                                                            name="regnum" value="<?php echo $regnum; ?>" maxlength="12"
                                                            readonly="" style="text-transform: uppercase;" required>
                                                    </div>


                                                    <div class="form-group">
                                                        <input type="text" class="form-control" placeholder="Savings"
                                                            name="available_savings"
                                                            value="<?php echo @number_format($available_savings); ?>"
                                                            maxlength="12" readonly=""
                                                            style="text-transform: uppercase;" required>
                                                    </div>








                                                    <div style="margin-top: 80px; margin-left: 40px;">

                                                        <div class="form-group">
                                                            <label>Enter Current Amount Contributed:</label>
                                                            <input class="form-control" type="number"
                                                                placeholder="enter Contribution" name="parent"
                                                                maxlength="10" required>
                                                            <input type="hidden" style="margin-left: 58px;"
                                                                name="wave_revenue" value="ON" />
                                                        </div>
                                                        <br>
                                                        <div class="form-group">
                                                            <label>Enter Income on Contribution (Manual):</label>
                                                            <input class="form-control" type="number"
                                                                placeholder="enter income (If neccessary)" value="0"
                                                                name="manual_revenue" maxlength="10">

                                                        </div>

                                                        <br>
                                                        <div class="form-group">
                                                            <label>Backdate If True:</label>
                                                            <input type="text" name="backdate"
                                                                placeholder="IF Back Date is True"
                                                                onfocus="(this.type='date')">
                                                        </div>

                                                    </div>





                                                    <!--            <div class="form-group">     
              <input  class="form-control"   type="email"  placeholder="enter E-mail" value="<?php echo $mail; ?>" name="mail"   maxlength="50" required>
    </div>
        
        
          <div class="form-group"> 
            <input  class="form-control"   type="text"  name="religion"   maxlength="50"  placeholder="enter Refree 1" value="<?php echo $religion; ?>" maxlength="50" required>  
          </div>
        
        
          <div class="form-group">
              <input type="text" class="form-control" type="text" name="loginid" placeholder="enter Refree 2"  value="<?php echo $login_id; ?>">
    </div>
  -->

                                                    <!--<button style="margin-left:200px;" type="submit" name="Submit" id="check_duplicate" class="btn btn-success">Register</button>-->
                                                    <center>
                                                        <input
                                                            style=" padding: 8px; width: 25%; font-weight: bold; margin-top: 20px;"
                                                            class="btn btn-success button-distance" id="update"
                                                            type="submit" name="pay" value="PAY" />
                                                        <a style="margin-left:60px; margin-top: 20px;"
                                                            class="btn btn-dark" href="contribution.php">Reset</a> <br>
                                                    </center>



                                                    <div style="margin-left: 40px; width:140px; height:140px;">

                                                        <!--            <div class="custom-file mb-3" style="width: 200px;">
                <input type="file" class="custom-file-input" id="customFile" name="fileToUpload" accept="image/*" >
                <label class="custom-file-label" for="customFile">Choose Photo>></label>
            </div> -->


                                                        <?php
                                                        //         if(isset($_POST['reset'])){
//             @header("location:contribution.php");
//         }
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



                                                            move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
                                                        } else {
                                                            if (isset($_POST['imge'])) {
                                                                $images = $_POST['imge'];
                                                                @$target_file = $images;
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




                                                    </div>








                                                </form>



                                            </div>



























                                            <!--<center style="font-size: 18px; color: #cccccc; margin-top: 400px"><footer>&copy;2020. By Mr. Matt.</footer></center>-->

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


                                            <!--    <script>
      //LINK TO GO VIEW STUDENT DATABASE
      $(document).ready(function() {
            var view_all      = $("#stud_db"); //LINK TO GO AND VIEW ALL DEBTORS   
    $(view_all).click(function(e){ //Function LINK TO GO AND VIEW ALL DEBTORS button click
        e.preventDefault();
              window.location.href = "http://localhost/school/student_db.php";
            }) ;
      }) ;       
   </script>         -->

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







</body>

</html>