<?php
session_start();
include 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>ALL CUSTOMERS</title>
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
                                            <h5 class="m-b-10">All Customers</h5>
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
                                            <div class="col-sm-4">

                                            </div>
                                            <div class="col-sm-3">
                                                <form name="statuses" action="all_customers.php" method="POST"
                                                    enctype="multipart/form-data">


                                                    <select name="status" required="">
                                                        <option value="" disabled selected hidden>select status</option>
                                                        <option value="active">Active</option>
                                                        <option value="non_active">Non_Active</option>

                                                    </select>

                                                    <br>
                                                    <button name="submit_status"
                                                        style="font-weight: bold; border-radius: 8px; padding:7px; font-style:italic ; font-size: 14px; background-color:green; color: whitesmoke; cursor: pointer; margin-bottom: 70px;">Status</button>

                                                </form>
                                            </div>

                                            <div class="col-sm-3">
                                                <!--SHOW ALL-->
                                                <button class="show_all"
                                                    style="border-radius: 8px; padding:8px; font-style:italic ; font-size: 18px; background-color:green; color: whitesmoke; cursor: pointer">VIEW
                                                    ALL</button><br>
                                            </div>

                                            <div class="col-sm-3">

                                            </div>




                                        </div>

                                        <div class="row">
                                            <div class="col-sm-2">

                                            </div>
                                            <div class="col-sm-4">
                                                <form action="" method="POST" enctype="multipart/form-data">
                                                    <div class="input-group mb-3">
                                                        <select class="form-control" name="branch" id="branch" required>
                                                            <option value="" hidden disabled selected>Select Branch
                                                            </option>
                                                            <?php
                                                            $sql_all_names = mysqli_query($connect, "SELECT * FROM branch ORDER BY name ASC");
                                                            while ($row = mysqli_fetch_assoc($sql_all_names)) {
                                                                echo '<option value="' . $row['name'] . '">' . $row['name'] . '</option>';
                                                            }
                                                            ?>
                                                        </select>
                                                        <div class="input-group-append">
                                                            <button class="btn btn-primary" id="btnsearch"
                                                                name="btnbranch" type="submit">SEARCH</button>
                                                        </div>
                                                    </div>
                                                </form>

                                            </div>



                                            <div class="col-sm-4">
                                                <form name="srch" action="all_customers.php" method="POST"
                                                    enctype="multipart/form-data">

                                                    <center>
                                                        <div class="input-group mb-3">
                                                            <input type="text" class="form-control" id="autocomplete"
                                                                name="srch" placeholder="Search Customer To View"
                                                                required="">
                                                            <div class="input-group-append">
                                                                <button class="btn btn-warning" id="btnsearch"
                                                                    name="btnsrch" type="submit">SEARCH</button>
                                                            </div>
                                                        </div>
                                                    </center>
                                                </form>




                                            </div>
                                            <div class="col-sm-4">

                                            </div>
                                        </div>
                                        <?php
                                        //////////////////TOTAL ACTIVE MEMBERS////////////////
                                        $countA = mysqli_query($connect, "SELECT COUNT(namee) as totala FROM members WHERE balance > 1 AND NOT not_yet = 'not yet'");
                                        while ($row4 = mysqli_fetch_array($countA)) {
                                            $count_active = $row4['totala'];
                                        }





                                        //////////////////TOTAL NON-ACTIVE ACTIVE MEMBERS////////////////
                                        $countN = mysqli_query($connect, "SELECT COUNT(namee) as totaln FROM members WHERE balance < 1 AND NOT not_yet = 'not yet'");
                                        while ($row4 = mysqli_fetch_array($countN)) {
                                            $count_non_active = $row4['totaln'];
                                        }




                                        //////////////////TOTAL NUMBER OF MEMBERS////////////////
                                        $count = mysqli_query($connect, "SELECT COUNT(namee) as totalm FROM members WHERE NOT not_yet = 'not yet'");
                                        while ($row4 = mysqli_fetch_array($count)) {
                                            $count_members = $row4['totalm'];
                                        }



                                        $result101 = mysqli_query($connect, "SELECT COUNT(name) as totald FROM allloan WHERE indbalance > 0 AND remarks = 'loan disbursement' AND    (reverse_alert = '' OR reverse_alert IS NULL) ORDER BY id DESC");
                                        while ($row4 = mysqli_fetch_array($result101)) {
                                            $count_daily = $row4['totald'];
                                        }


                                        $result102 = mysqli_query($connect, "SELECT COUNT(name) as totalw FROM weekly_allloan WHERE indbalance > 0 AND remarks = 'loan disbursement' AND    (reverse_alert = '' OR reverse_alert IS NULL) ORDER BY id DESC");
                                        while ($row4 = mysqli_fetch_array($result102)) {
                                            $count_weekly = $row4['totalw'];
                                        }


                                        $result103 = mysqli_query($connect, "SELECT COUNT(name) as totalm FROM monthly_allloan WHERE indbalance > 0 AND remarks = 'loan disbursement' AND    (reverse_alert = '' OR reverse_alert IS NULL) ORDER BY id DESC");
                                        while ($row4 = mysqli_fetch_array($result103)) {
                                            $count_monthly = $row4['totalm'];
                                        }

                                        $count_all_debt = $count_daily + $count_weekly + $count_monthly;

                                        $count_no_debt = $count_members - $count_all_debt;

                                        ?>



                                        <?php

                                        if (isset($_POST['submit_status'])) {
                                            $status = $_POST['status'];
                                            if ($status == "active") {
                                                //loop through all table rows
                                                $inc = 1;

                                                $result = mysqli_query($connect, "SELECT * FROM members WHERE balance > 0 AND NOT not_yet = 'not yet' ORDER BY id DESC LIMIT $count_all_debt");
                                                echo ' <div class="card">';
                                                echo '<div class="card-block table-border-style">';

                                                echo '<div class="table-responsive" >';
                                                echo '<CAPTION><h3 align="center" style="font-size:28px; color:black;">ACTIVE CUSTOMERS: ' . $count_all_debt . '</h3></CAPTION>';
                                                echo '<table class="table table-bordered table-striped   table-hover " >';

                                                echo ' <thead class="thead-dark">';

                                                echo '<tr align = "center">';
                                                echo '<th>S/N</th>';
                                                echo '<th>Name</th>';
                                                echo '<th>Date Joined</th>';
                                                echo '<th>District</th>';
                                                echo '<th>Telephone</th>';

                                                echo '<th>Debt</th>';
                                                echo '<th>Status</th>';
                                                echo '<th>View Details</th>';
                                                echo '</tr>';

                                                echo '</thead>';

                                                echo '<tbody class="" style="font-family: sans-serif; color:black ; font-weight:bold;">';
                                                while ($row = mysqli_fetch_array($result)) {



                                                    echo "<tr align = 'center'>";
                                                    echo "<td>" . $inc . "</td>";
                                                    echo "<td>" . $row['namee'] . "</td>";
                                                    echo "<td>" . $row['level'] . "</td>";
                                                    echo "<td>" . $row['registration_num'] . "</td>";
                                                    echo "<td>" . $row['telephone'] . "</td>";

                                                    if ($row['balance'] < 1) {
                                                        $row['balance'] = 0;
                                                        $color = "green";
                                                    } else {
                                                        $color = "red";
                                                    }
                                                    echo "<td style='color:" . $color . ";'>" . number_format($row['balance']) . "</td>";
                                                    if ($row['balance'] > 0) {
                                                        $status = 'Active';
                                                    } else {
                                                        $status = 'Non-Active';
                                                    }
                                                    echo "<td>" . $status . "</td>";
                                                    if ($row['balance'] > 100) {
                                                        echo "<td ><a style='color:brown;' href='payment.php?name=" . $row['namee'] . "&codename=" . $row['dailycode'] . "'>View details</a></td>";
                                                    } else {
                                                        echo "<td ><a style='color:brown;' onclick=\"javascript: return $(document).ready(function(){ 
                swal({
                         title: 'Inactive!',
                         text: 'No active transaction',
                         icon: 'error',
                        buttons: {
                            confirm : {text:'Ok',className:'sweet-orange'},
                          
                        },
                        closeOnClickOutside: false
                       })
                  
                });\" href='#!'>View details</a></td>";

                                                    }
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
                                                echo '</div>';




                                            } else



                                                if ($status == "non_active") {
                                                    //loop through all table rows
                                                    $inc = 1;

                                                    $result = mysqli_query($connect, "SELECT * FROM members WHERE balance < 1 AND NOT not_yet = 'not yet' ORDER BY id DESC LIMIT $count_no_debt");
                                                    echo ' <div class="card">';
                                                    echo '<div class="card-block table-border-style">';

                                                    echo '<div class="table-responsive" >';

                                                    echo '<CAPTION><h3 align="center" style="font-size:28px; color:black;">NON-ACTIVE CUSTOMERS: ' . $count_no_debt . '</h3></CAPTION>';
                                                    echo '<table class="table table-bordered table-striped   table-hover " >';

                                                    echo ' <thead class="thead-dark">';

                                                    echo '<tr align = "center">';
                                                    echo '<th>S/N</th>';
                                                    echo '<th>Name</th>';
                                                    echo '<th>Date Joined</th>';
                                                    echo '<th>District</th>';
                                                    echo '<th>Telephone</th>';

                                                    echo '<th>Debt</th>';
                                                    echo '<th>Status</th>';
                                                    echo '<th>View Details</th>';
                                                    echo '</tr>';

                                                    echo '</thead>';

                                                    echo '<tbody class="" style="font-family: sans-serif; color:black ; font-weight:bold;">';
                                                    while ($row = mysqli_fetch_array($result)) {



                                                        echo "<tr align = 'center'>";
                                                        echo "<td>" . $inc . "</td>";
                                                        echo "<td>" . $row['namee'] . "</td>";
                                                        echo "<td>" . $row['level'] . "</td>";
                                                        echo "<td>" . $row['registration_num'] . "</td>";
                                                        echo "<td>" . $row['telephone'] . "</td>";

                                                        if ($row['balance'] < 1) {
                                                            $row['balance'] = 0;
                                                            $color = "green";
                                                        } else {
                                                            $color = "red";
                                                        }
                                                        echo "<td style='color:" . $color . ";'>" . number_format($row['balance']) . "</td>";
                                                        if ($row['balance'] > 0) {
                                                            $status = 'Active';
                                                        } else {
                                                            $status = 'Non-Active';
                                                        }
                                                        echo "<td>" . $status . "</td>";
                                                        if ($row['balance'] > 100) {
                                                            echo "<td ><a style='color:brown;' href='payment.php?name=" . $row['namee'] . "&codename=" . $row['dailycode'] . "'>View details</a></td>";
                                                        } else {
                                                            echo "<td ><a style='color:brown;' onclick=\"javascript: return $(document).ready(function(){ 
                swal({
                         title: 'Inactive!',
                         text: 'No active transaction',
                         icon: 'error',
                        buttons: {
                            confirm : {text:'Ok',className:'sweet-orange'},
                          
                        },
                        closeOnClickOutside: false
                       })
                  
                });\" href='#!'>View details</a></td>";

                                                        }
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
                                                    echo '</div>';

                                                } else {

                                                }



                                        } else



                                            if (isset($_POST['btnsrch'])) {
                                                $name = $_POST['srch'];
                                                //loop through all table rows
                                                $inc = 1;

                                                $result = mysqli_query($connect, "SELECT * FROM members WHERE namee = '$name' AND NOT not_yet = 'not yet'");
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
                                                echo '<th>District</th>';
                                                echo '<th>Telephone</th>';

                                                echo '<th>Debtt</th>';
                                                echo '<th>Status</th>';
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
                                                    echo "<td>" . $row['registration_num'] . "</td>";
                                                    echo "<td>" . $row['telephone'] . "</td>";

                                                    if ($row['balance'] < 1) {
                                                        $row['balance'] = 0;
                                                        $color = "green";
                                                    } else {
                                                        $color = "red";
                                                    }
                                                    echo "<td style='color:" . $color . ";'>" . number_format($row['balance']) . "</td>";
                                                    if ($row['balance'] > 0) {
                                                        $status = 'Active';
                                                    } else {
                                                        $status = 'Non-Active';
                                                    }
                                                    echo "<td>" . $status . "</td>";
                                                    if ($row['balance'] > 100) {
                                                        echo "<td ><a style='color:brown;' href='payment.php?name=" . $row['namee'] . "&codename=" . $row['dailycode'] . "'>View details</a></td>";
                                                    } else {
                                                        echo "<td ><a style='color:brown;' onclick=\"javascript: return $(document).ready(function(){ 
                swal({
                         title: 'Inactive!',
                         text: 'No active transaction',
                         icon: 'error',
                        buttons: {
                            confirm : {text:'Ok',className:'sweet-orange'},
                          
                        },
                        closeOnClickOutside: false
                       })
                  
                });\" href='#!'>View details</a></td>";

                                                    }

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
                                                echo '</div>';
                                            }
                                            
                                            else  // FILTER BY BRANCH
                                            if (isset($_POST['btnbranch'])) {
                                                $branch = $_POST['branch'];
                                                $count = mysqli_query($connect, "SELECT COUNT(namee) as totalm FROM members WHERE NOT not_yet = 'not yet' AND branch = '$branch'");
                                                while ($row4 = mysqli_fetch_array($count)) {
                                                    $count_members = $row4['totalm'];
                                                }
                                                $inc = 1;
                                        
                                                $result = mysqli_query($connect, "SELECT * FROM members WHERE NOT not_yet = 'not yet' AND branch = '$branch' ORDER BY id DESC");
                                                echo ' <div class="card">';
                                                echo '<div class="card-block table-border-style">';
                                        
                                                echo '<div class="table-responsive" >';
                                                echo '<CAPTION><h3 align="center" style="font-size:20px; color:black;">'.$branch.': ' . $count_members . '</h3></CAPTION>';
                                                echo '<table class="table table-bordered table-striped   table-hover " >';
                                        
                                                echo ' <thead class="thead-dark">';
                                        
                                                echo '<tr align = "center">';
                                                echo '<th>S/N</th>';
                                                echo '<th>Name</th>';
                                                echo '<th>Registered By</th>';
                                                echo '<th>Date Joined</th>';
                                                echo '<th>District</th>';
                                                echo '<th>Telephone</th>';
                                        
                                                echo '<th>Debt</th>';
                                                echo '<th>Status</th>';
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
                                                    echo "<td>" . $row['registration_num'] . "</td>";
                                                    echo "<td>" . $row['telephone'] . "</td>";
                                        
                                                    if ($row['balance'] < 1) {
                                                        $row['balance'] = 0;
                                                        $color = "green";
                                                    } else {
                                                        $color = "red";
                                                    }
                                                    echo "<td style='color:" . $color . ";'>" . number_format($row['balance']) . "</td>";
                                        
                                        
                                                    if ($row['balance'] > 0) {
                                                        $status = 'Active';
                                                    } else {
                                                        $status = 'Non-Active';
                                                    }
                                                    echo "<td>" . $status . "</td>";
                                        
                                                    if ($row['balance'] > 100) {
                                                        echo "<td ><a style='color:brown;' href='codename_search.php?name=" . $row['namee'] . "&codename=" . $row['dailycode'] . "'>View details</a></td>";
                                                    } else {
                                                        echo "<td ><a style='color:brown;' onclick=\"javascript: return $(document).ready(function(){ 
                                        swal({
                                        title: 'Inactive!',
                                        text: 'No active transaction',
                                        icon: 'error',
                                        buttons: {
                                        confirm : {text:'Ok',className:'sweet-orange'},
                                        
                                        },
                                        closeOnClickOutside: false
                                        })
                                        
                                        });\" href='#!'>View details</a></td>";
                                        
                                                    }
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
                                                echo '</div>';
                                            }
                                            
                                            
                                            
                                            else {
                                                //loop through all table rows
                                                $inc = 1;

                                                $result = mysqli_query($connect, "SELECT * FROM members WHERE NOT not_yet = 'not yet' ORDER BY id DESC");
                                                echo ' <div class="card">';
                                                echo '<div class="card-block table-border-style">';

                                                echo '<div class="table-responsive" >';
                                                echo '<CAPTION><h3 align="center" style="font-size:20px; color:black;">ALL CUSTOMERS: ' . $count_members . '</h3></CAPTION>';
                                                echo '<table class="table table-bordered table-striped   table-hover " >';

                                                echo ' <thead class="thead-dark">';

                                                echo '<tr align = "center">';
                                                echo '<th>S/N</th>';
                                                echo '<th>Name</th>';
                                                echo '<th>Registered By</th>';
                                                echo '<th>Date Joined</th>';
                                                echo '<th>District</th>';
                                                echo '<th>Telephone</th>';

                                                echo '<th>Debt</th>';
                                                echo '<th>Status</th>';
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
                                                    echo "<td>" . $row['registration_num'] . "</td>";
                                                    echo "<td>" . $row['telephone'] . "</td>";

                                                    if ($row['balance'] < 1) {
                                                        $row['balance'] = 0;
                                                        $color = "green";
                                                    } else {
                                                        $color = "red";
                                                    }
                                                    echo "<td style='color:" . $color . ";'>" . number_format($row['balance']) . "</td>";


                                                    if ($row['balance'] > 0) {
                                                        $status = 'Active';
                                                    } else {
                                                        $status = 'Non-Active';
                                                    }
                                                    echo "<td>" . $status . "</td>";

                                                    if ($row['balance'] > 100) {
                                                        echo "<td ><a style='color:brown;' href='codename_search.php?name=" . $row['namee'] . "&codename=" . $row['dailycode'] . "'>View details</a></td>";
                                                    } else {
                                                        echo "<td ><a style='color:brown;' onclick=\"javascript: return $(document).ready(function(){ 
                swal({
                         title: 'Inactive!',
                         text: 'No active transaction',
                         icon: 'error',
                        buttons: {
                            confirm : {text:'Ok',className:'sweet-orange'},
                          
                        },
                        closeOnClickOutside: false
                       })
                  
                });\" href='#!'>View details</a></td>";

                                                    }
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
                                                echo '</div>';
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
                                                    window.location = "all_customers.php";
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

        <script>
            /////REMOVE nav2 for table     
            var size = window.innerWidth;
            //       alert(size);
            if (size > 1000) {
                setTimeout(function () { document.getElementById("mymenu2").click(); }, 1000);
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

        <script>


            window.onload = function () {
                document.getElementById('magic-collapse').click();

            };
        </script>





</body>

</html>