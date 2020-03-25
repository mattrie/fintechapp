<?php
session_start();
include 'connection.php';


if (isset($_GET['idd'])) {
    $id = $_GET['idd'];
    $name = $_GET['name'];
    $query = "DELETE FROM weekly_allloan WHERE id = '$id'";
    $result23 = mysqli_query($connect, $query);



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

    @$total_status = $daily_status + $weekly_status;
    //UPDATE RECORD
    $sql_statement101 = "UPDATE members SET balance = '$total_status' WHERE namee='$name'";
    $result29 = mysqli_query($connect, $sql_statement101);
    //       **************************||||||||||||||||***********************************************            



    echo "<script>alert('Transaction Deleted!!!')</script>";
    //             header("location: weekly_debtors.php");
}


if (isset($_SESSION['redirect_message_weekly'])) {
    echo $_SESSION['redirect_message_weekly'];
    $_SESSION['redirect_message_weekly'] = "";
}


if (isset($_POST['btnsrch'])) {
    $names = "";
    $get_code = $_POST['telephone'];
    $sql_state1 = "SELECT * FROM weekly_allloan WHERE  disburseloan > 1 AND remarks = 'loan disbursement' AND codename = '$get_code'";
    $result1 = mysqli_query($connect, $sql_state1);

    while ($row = mysqli_fetch_assoc($result1)) {
        $names = $row["name"];
        $closingdate = $row["enddate"];


    }
    if ($names == "") {
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

    } else {
        echo "<script> location.href = 'weekly_loan_statement.php?codename=$get_code&name=$names'; </script>";
        echo "<script> location.href = 'weekly_loan_statement.php?codename=$get_code&name=$names'; </script>";
    }

}


//    echo "<td ><a style='color: #ff9900;' href='loan_statement.php?codename=" . $row['codename']. "&name=".$row['name']."&type=".$row['type']."'>View details</a></td>";


?>
<!DOCTYPE html>

<html lang="en">

<head>
    <title>WEEKLY GENERAL LEDGER</title>
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
                                            <h5 class="m-b-10">WEEKLY GENERAL LEDGER</h5>
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


                                            <div class="col-sm-1">

                                            </div>

                                            <div class="col-sm-4">
                                                <form name="monthyear" action="weekly_debtors.php" method="POST"
                                                    enctype="multipart/form-data">
                                                    <input type="hidden" id="evaluation1" class="autocomplete_staff1"
                                                        name="telephone" placeholder="Staff Evaluation (year)"><br>

                                                    Start Date: &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;
                                                    &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
                                                    End Date:<br>
                                                    <input type="date" name="start" id="month" /> <input type="date"
                                                        name="end" id="year" />



                                                    <br>
                                                    <button name="month_year" class="select_time1"
                                                        style="font-weight: bold; border-radius: 8px; padding:7px; font-style:italic ; font-size: 14px; background-color:green; color: whitesmoke; cursor: pointer; margin-bottom: 10px;">Search
                                                        Duration</button>

                                                </form>

                                            </div>





                                            <div class="col-sm-4">
                                                <form name="year" action="weekly_debtors.php" method="POST"
                                                    enctype="multipart/form-data">

                                                    <select name="year_alone" id="year_a" required="">
                                                        <option value="" disabled selected hidden>Filter Performance
                                                        </option>
                                                        <option value="perform">Performing Loan</option>
                                                        <option value="non">Non-Performing Loan</option>

                                                    </select>

                                                    <br>
                                                    <button name="filter_perf" class="select_year1"
                                                        style="font-weight: bold; border-radius: 8px; padding:7px; font-style:italic ; font-size: 14px; background-color:green; color: whitesmoke; cursor: pointer; margin-bottom: 10px;">Filter</button>

                                                </form>
                                            </div>

                                            <div class="col-sm-2">
                                                <!--SHOW ALL-->
                                                <button class="show_all"
                                                    style="border-radius: 8px; padding:8px; font-style:italic ; font-size: 18px; background-color:green; color: whitesmoke; cursor: pointer">VIEW
                                                    ALL</button>
                                            </div>

                                        </div>
                                        <br>
                                        <center>















                                            <div class="row">
                                                <div class="col-sm-4">
                                                </div>

                                                <form action="weekly_debtors.php" method="POST"
                                                    enctype="multipart/form-data">

                                                    <input type="hidden" id="codename" name="telephone"
                                                        placeholder="Search Debtor Codename" required="">
                                                    <div class="input-group">
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
                                                            <button class="btn btn-warning" name="btnbranch"
                                                                type="submit">SEARCH</button>
                                                        </div>
                                                    </div>
                                                </form>

                                                <!--THIS IS TO SEARCH GROUP NAME-->
                                                <form action="weekly_debtors.php" method="POST"
                                                    enctype="multipart/form-data">
                                                    <input type="text" id="group_name" name="group_name"
                                                        style="margin-left: 50px;" placeholder="Search By Group Name"
                                                        required="">
                                                    <button class="btn btn-primary" name="group_na">SEARCH</button>
                                                    <input type="hidden" name="carry_group" id="carry_group" value="" />

                                                </form>


                                                <!--      <i class="float-right" style="margin-left:100px;">
                        <a href="javascript:Clickheretoprint()" style="font-size:20px;"><button class="btn btn-dark float-right"><i class="icon-print"></i>Safe Print</button></a>
             </i> -->

                                                <div class="col-sm-1">
                                                </div>
                                            </div>

















                                            <!--                  <form action="weekly_debtors.php" method="POST" enctype="multipart/form-data" style="width: 600px;">
             
    <input   type="text" name="telephone" id="codename" placeholder="select Code_name" maxlength="10" required  >

            
            
         <div class="input-group">
    <input type="text" class="form-control w-25" id="codename" name="telephone" placeholder="Search Weekly Debtor Personal Ledger" required=""  >
    <div class="input-group-append">
      <button class="btn btn-warning" id="btnsearch" name="btnsrch" type="submit">SEARCH</button>  
     </div>
  </div>
                
            
        
                 </form>-->
                                        </center>

                                        <!--DISPLAY ARENA-->
                                        <!--======jQuery DataTable========-->
                                        <link rel="stylesheet" type="text/css"
                                            href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
                                        <script type="text/javascript" charset="utf8"
                                            src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>



                                        <script>
                                            $(document).ready(function () {
                                                $('.table_id').DataTable({
                                                    paging: false
                                                });
                                            });
                                        </script>



                                        <div id="dispay_db1">
                                            <?php
                                            $get_me = 0;
                                            if (isset($_POST['month_year'])) {
                                                $start = $_POST['start'];
                                                $end = $_POST['end'];



                                                $get_me = 1;

                                                //loop through all table rows
                                            
                                                $inc = 1;
                                                $result = mysqli_query($connect, "SELECT * FROM weekly_allloan WHERE date_format BETWEEN '$start' AND '$end'  AND indbalance > 0 AND remarks = 'loan disbursement' AND    (reverse_alert = '' OR reverse_alert IS NULL)  ORDER BY id DESC");

                                                echo ' <div class="card card-block table-border-style">';
                                                echo '<div class="table-responsive">
     <CAPTION><h3 style="font-size:26px; color:black; font-weight:bold;" align="center">BETWEEN: [' . date("jS F Y", strtotime($start)) . '] AND [' . date("jS F Y", strtotime($end)) . '] WEEKLY CUSTOMERS</h3></CAPTION>
   
  <table class="table table-bordered table-striped table_id" align="center">
      
       <thead class="thead-dark">
         <tr align="center">
         <th>S/N</th>         
         <th >Customer Name</th>
           <th>Codename</th>
               <th>District</th>
          
            <th>Account Officer</th>
           <th>Date</th>
            <th>Repayment</th>
             <th>Disbursed</th>
                <th>Balance</th>
             <th>View Details</th>
             
          </tr>     
          </thead>

    <tbody class="" style="font-family: sans-serif; color:black ; font-weight:bold;">';
                                                //    ###########################################################################################   
                                                ///GET ALL DEBTORS FOR DAILY
                                                ////////////THIS IS TO SUM DAILY
                                                $total_repay11 = mysqli_query($connect, "SELECT SUM(repay) as total FROM weekly_allloan WHERE  date_format BETWEEN '$start' AND '$end' AND (remarks = 'loan repayment' OR remarks = 'Penalty Paid' OR remarks = 'mistakenly paid' OR remarks = 'Reversal Entry')");
                                                while ($row = mysqli_fetch_array($total_repay11)) {
                                                    $summation_repay111 = $row['total'];
                                                }

                                                ////////////THIS IS TO WEEKLY SAVINGS
                                                $total_repay2 = mysqli_query($connect, "SELECT SUM(savings) as total FROM weekly_allloan WHERE  date_format BETWEEN '$start' AND '$end' AND (remarks = 'loan repayment' OR remarks = 'Penalty Paid' OR remarks = 'mistakenly paid' OR remarks = 'Reversal Entry')");
                                                while ($row = mysqli_fetch_array($total_repay2)) {
                                                    $summation_weekly_save = $row['total'];
                                                }

                                                $summation_repay11 = $summation_repay111 + $summation_weekly_save;

                                                ////////////THIS IS TO SUM disburseloan
                                                $total_daily = mysqli_query($connect, "SELECT SUM(disburseloan) as total FROM weekly_allloan WHERE date_format BETWEEN '$start' AND '$end' AND  NOT remarks = 'Penalty' AND NOT reversepen = 'penalty reverse'");
                                                while ($row = mysqli_fetch_array($total_daily)) {
                                                    $summation_loan11 = $row['total'];
                                                }

                                                $summation_loan = $summation_loan11 - $summation_repay11;

                                                echo "<tr id='hide_total' align = 'center'>";
                                                echo "<td></td>";
                                                echo "<td>--------</td>";
                                                echo "<td>--------</td>";
                                                echo "<td>--------</td>";
                                                echo "<td>--------</td>";
                                                echo "<td align = 'right' style='font-size: 20px;'>TOTAL: </td>";
                                                echo "<td style='color: green; font-size: 20px;'>" . number_format($summation_repay11) . "</td>";
                                                echo "<td style='color: red; font-size: 20px;'>" . number_format($summation_loan11) . "</td>";
                                                echo "<td style='color: blue; font-size: 20px;'>" . number_format($summation_loan) . "</td>";
                                                echo "<td>--------</td>";

                                                echo "</tr>";

                                                //    ###########################################################################################    
                                            
                                                while ($row = mysqli_fetch_array($result)) {
                                                    $ans_bal = $row['repay_sum'] - $row['disburseloan'];
                                                    //           if($ans_bal < 0 && $row['remarks'] == "loan disbursement"){
                                                    echo "<tr>";
                                                    echo "<td >" . $inc . "</td>";
                                                    echo "<td >" . $row['name'] . "</td>";
                                                    echo "<td >" . $row['codename'] . "</td>";
                                                    echo "<td >" . $row['district'] . "</td>";

                                                    echo "<td >" . $row['acc_officer'] . "</td>";
                                                    echo "<td>" . $row['date'] . "</td>";
                                                    echo "<td style='color: green;' >" . number_format($row['repay_sum']) . "</td>";
                                                    echo "<td style='color: red;' >" . number_format($row['disburseloan']) . "</td>";
                                                    echo "<td style='color: blue;' >" . number_format($row['indbalance']) . "</td>";
                                                    echo "<td ><a style='color: brown;' href='weekly_loan_statement.php?codename=" . $row['codename'] . "&name=" . $row['name'] . "&type=" . $row['type'] . "'>View details</a></td>";
                                                    //              echo "<td ><a style='color:#cc9900;' onclick=\"javascript: return confirm('DO YOU WISH TO CONTINUE WITH DELETE?');\" href='debtors.php?iddd=" . $row['id']."&name=".$row['name']."&id=check_delete'>Delete</a></td>";
                                            
                                                    echo "</tr>";

                                                    $inc++;
                                                }
                                                //            }
                                            
                                                echo ' </tbody>';
                                                echo ' </table>';

                                                echo '</div>';
                                                echo '</div>';




                                            } else if (isset($_POST['filter_perf']) && isset($_SESSION['get_branch'])) {
                                                $get_me = 1;
                                                $year_alone = "";
                                            
                                                $performannce = $_POST['year_alone'];
                                                $branch = $_SESSION['get_branch'];
                                            
                                                //             $performannce = filter_input(INPUT_GET, 'year') ;  
                                            
                                                //loop through all table rows
                                            
                                                $inc = 1;
                                                $statistics = $statistics1 = 1;
                                            
                                                $statistics_part = $statistics_all = 0;
                                            
                                                if ($performannce == "non") {
                                                    //        COUNTING THE STATTISTICS     
                                            
                                                    $result11 = mysqli_query($connect, "SELECT * FROM weekly_allloan WHERE branch = '$branch' AND indbalance > 1 AND remarks = 'loan disbursement' ");
                                            
                                                    while ($row = mysqli_fetch_array($result11)) {
                                                        $statistics_all = $statistics;
                                                        $get_indbalance = $row['indbalance'];
                                                        $get_enddate1 = $row['startdate'];
                                                        $weeks = $row['weeks'];
                                                        $get_weeks = $weeks * 7;
                                            
                                                        ////CALCULATE CLOSING DATE
                                                        $get_enddate = date('Y-m-d', strtotime($get_enddate1 . ' + ' . $get_weeks . ' days'));
                                            
                                                        $repay_sum = $row['repay_sum'];
                                                        $disburseloan = $row['disburseloan'];
                                                        $disburseloan_interest = $row['interest'];
                                                        $principal = $disburseloan + $disburseloan_interest;
                                                        $pay_rate = ($repay_sum / $disburseloan) * 100;
                                            
                                                        ///////////////////////////////////////
                                                        //GET NUMBER OF MONTHS & DAYS LEFT
                                                        $dated = strtotime("$get_enddate");
                                                        $remaining = time() - $dated;
                                                        ///////COUNT ONLY DAYS
                                                        $days_remaining = floor($remaining / 86400);
                                                        //     echo $days_remaining."<br>";
                                                        if ($days_remaining > 0 && $get_indbalance > 1) {
                                            
                                                            $statistics_part = $statistics1;
                                                            $statistics1++;
                                                        }
                                            
                                            
                                            
                                                        $statistics++;
                                                        //                
                                            
                                                    }
                                            
                                            
                                            
                                                    $percent = ($statistics_part / $statistics_all) * 100;
                                            
                                            
                                                    //               echo "$statistics_part";   
                                            //             echo "<br>";
                                            //             echo "$statistics_all";  
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                                    //     ['.round($percent, 0).'% OF DEBTORS]        
                                            // '.$statistics_part.'   
                                            
                                                    $result = mysqli_query($connect, "SELECT * FROM weekly_allloan WHERE branch = '$branch' AND indbalance > 1 AND remarks = 'loan disbursement' ORDER BY id DESC");
                                            
                                                    echo ' <div class="card card-block table-border-style">';
                                                    echo '<div class="table-responsive">
                                            <CAPTION><h3 style="font-size:26px; color:black; font-weight:bold;" align="center">'.$branch.'  [' . round($percent, 0) . '% NON-PERFORMING LOAN] WEEKLY CUSTOMERS</h3></CAPTION>
                                            
                                            <table class="table table-bordered table-striped table_id" align="center">
                                            
                                            <thead class="thead-dark">
                                            <tr align="center">
                                            <th>S/N</th>         
                                            <th >Customer Name</th>
                                            <th>Codename</th>
                                            <th>District</th>
                                            
                                            <th>Account Officer</th>
                                            <th>Date</th>
                                            <th>Repayment</th>
                                            <th>Disbursed</th>
                                            <th>Balance</th>
                                            <th>View Details</th>
                                            
                                            </tr>     
                                            </thead>
                                            
                                            <tbody class="" style="font-family: sans-serif; color:black ; font-weight:bold;">';
                                                    //    ###########################################################################################   
                                                    ///GET ALL DEBTORS FOR DAILY
                                                    ////////////THIS IS TO SUM DAILY
                                                    $summation_repay11 = $summation_loan11 = 0;
                                                    $total_repay11 = mysqli_query($connect, "SELECT * FROM weekly_allloan WHERE branch = '$branch' AND indbalance > 1 AND remarks = 'loan disbursement'");
                                                    while ($row = mysqli_fetch_array($total_repay11)) {
                                                        $get_indbalance = $row['indbalance'];
                                                        $get_enddate1 = $row['startdate'];
                                                        $weeks = $row['weeks'];
                                                        $get_weeks = $weeks * 7;
                                                        ////CALCULATE CLOSING DATE
                                                        $get_enddate = date('Y-m-d', strtotime($get_enddate1 . ' + ' . $get_weeks . ' days'));
                                            
                                                        $repay_sum = $row['repay_sum'];
                                                        $disburseloan = $row['disburseloan'];
                                                        $disburseloan_interest = $row['interest'];
                                                        $principal = $disburseloan + $disburseloan_interest;
                                                        $pay_rate = ($repay_sum / $disburseloan) * 100;
                                            
                                                        ///////////////////////////////////////
                                                        //GET NUMBER OF MONTHS & DAYS LEFT
                                                        $dated = strtotime("$get_enddate");
                                                        $remaining = time() - $dated;
                                                        ///////COUNT ONLY DAYS
                                                        $days_remaining = floor($remaining / 86400);
                                            
                                                        if ($days_remaining > 0 && $get_indbalance > 1) {
                                                            $summation_repay11 += $row['repay_sum'];
                                                        }
                                                    }
                                            
                                                    //     ------------------------------------------------------------------------             
                                            
                                            
                                                    ////////////THIS IS TO SUM DAILY
                                                    $total_daily = mysqli_query($connect, "SELECT * FROM weekly_allloan WHERE branch = '$branch' AND indbalance > 1 AND remarks = 'loan disbursement'");
                                                    while ($row = mysqli_fetch_array($total_daily)) {
                                                        $get_indbalance = $row['indbalance'];
                                                        $get_enddate1 = $row['startdate'];
                                                        $weeks = $row['weeks'];
                                                        $get_weeks = $weeks * 7;
                                                        ////CALCULATE CLOSING DATE
                                                        $get_enddate = date('Y-m-d', strtotime($get_enddate1 . ' + ' . $get_weeks . ' days'));
                                            
                                                        $repay_sum = $row['repay_sum'];
                                                        $disburseloan = $row['disburseloan'];
                                                        $disburseloan_interest = $row['interest'];
                                                        $principal = $disburseloan + $disburseloan_interest;
                                                        $pay_rate = ($repay_sum / $disburseloan) * 100;
                                            
                                                        ///////////////////////////////////////
                                                        //GET NUMBER OF MONTHS & DAYS LEFT
                                                        $dated = strtotime("$get_enddate");
                                                        $remaining = time() - $dated;
                                                        ///////COUNT ONLY DAYS
                                                        $days_remaining = floor($remaining / 86400);
                                            
                                                        if ($days_remaining > 0 && $get_indbalance > 1) {
                                                            $summation_loan11 += $row['disburseloan'];
                                                        }
                                                    }
                                                    $summation_loan = $summation_loan11 - $summation_repay11;
                                                    //     ----------------------------------------------------------------------------------   
                                            
                                            
                                            
                                                    echo "<tr id='hide_total' align = 'center'>";
                                                    echo "<td></td>";
                                                    echo "<td>--------</td>";
                                                    echo "<td>--------</td>";
                                                    echo "<td>--------</td>";
                                                    echo "<td>--------</td>";
                                                    echo "<td align = 'right' style='font-size: 20px;'>TOTAL: </td>";
                                                    echo "<td style='color: green; font-size: 20px;'>" . number_format($summation_repay11) . "</td>";
                                                    echo "<td style='color: red; font-size: 20px;'>" . number_format($summation_loan11) . "</td>";
                                                    echo "<td style='color: blue; font-size: 20px;'>" . number_format($summation_loan) . "</td>";
                                                    echo "<td>--------</td>";
                                            
                                                    echo "</tr>";
                                            
                                                    //    ###########################################################################################    
                                            
                                                    while ($row = mysqli_fetch_array($result)) {
                                                        $get_indbalance = $row['indbalance'];
                                                        $get_enddate1 = $row['startdate'];
                                                        $weeks = $row['weeks'];
                                                        $get_weeks = $weeks * 7;
                                                        ////CALCULATE CLOSING DATE
                                                        $get_enddate = date('Y-m-d', strtotime($get_enddate1 . ' + ' . $get_weeks . ' days'));
                                            
                                                        $repay_sum = $row['repay_sum'];
                                                        $disburseloan = $row['disburseloan'];
                                                        $disburseloan_interest = $row['interest'];
                                                        $principal = $disburseloan + $disburseloan_interest;
                                                        $pay_rate = ($repay_sum / $disburseloan) * 100;
                                            
                                                        ///////////////////////////////////////
                                                        //GET NUMBER OF MONTHS & DAYS LEFT
                                                        $dated = strtotime("$get_enddate");
                                                        $remaining = time() - $dated;
                                                        ///////COUNT ONLY DAYS
                                                        $days_remaining = floor($remaining / 86400);
                                            
                                                        if ($days_remaining > 0 && $get_indbalance > 1) {
                                                            echo "<tr>";
                                                            echo "<td >" . $inc . "</td>";
                                                            echo "<td >" . $row['name'] . "</td>";
                                                            echo "<td >" . $row['codename'] . "</td>";
                                                            echo "<td >" . $row['district'] . "</td>";
                                            
                                                            echo "<td >" . $row['acc_officer'] . "</td>";
                                                            echo "<td>" . $row['date'] . "</td>";
                                                            echo "<td style='color: green;' >" . number_format($row['repay_sum']) . "</td>";
                                                            echo "<td style='color: red;' >" . number_format($row['disburseloan']) . "</td>";
                                                            echo "<td style='color: blue;' >" . number_format($row['indbalance']) . "</td>";
                                                            echo "<td ><a style='color: brown;' href='weekly_loan_statement.php?codename=" . $row['codename'] . "&name=" . $row['name'] . "&type=" . $row['type'] . "'>View details</a></td>";
                                                            //              echo "<td ><a style='color:#cc9900;' onclick=\"javascript: return confirm('DO YOU WISH TO CONTINUE WITH DELETE?');\" href='debtors.php?iddd=" . $row['id']."&name=".$row['name']."&id=check_delete'>Delete</a></td>";
                                            
                                                            echo "</tr>";
                                            
                                                            $inc++;
                                                        }
                                                    }
                                            
                                                    echo ' </tbody>';
                                                    echo ' </table>';
                                            
                                                    echo '</div>';
                                                    echo '</div>';
                                            
                                            
                                            
                                                }
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                                if ($performannce == "perform") {
                                            
                                                    //        COUNTING THE STATTISTICS     
                                            
                                                    $result11 = mysqli_query($connect, "SELECT * FROM weekly_allloan WHERE branch = '$branch' AND indbalance > 1 AND remarks = 'loan disbursement'");
                                            
                                                    while ($row = mysqli_fetch_array($result11)) {
                                                        $statistics_all = $statistics;
                                                        $get_indbalance = $row['indbalance'];
                                                        $get_enddate1 = $row['startdate'];
                                                        $weeks = $row['weeks'];
                                                        $get_weeks = $weeks * 7;
                                                        ////CALCULATE CLOSING DATE
                                                        $get_enddate = date('Y-m-d', strtotime($get_enddate1 . ' + ' . $get_weeks . ' days'));
                                            
                                                        $repay_sum = $row['repay_sum'];
                                                        $disburseloan = $row['disburseloan'];
                                                        $disburseloan_interest = $row['interest'];
                                                        $principal = $disburseloan + $disburseloan_interest;
                                                        $pay_rate = ($repay_sum / $disburseloan) * 100;
                                            
                                                        ///////////////////////////////////////
                                                        //GET NUMBER OF MONTHS & DAYS LEFT
                                                        $dated = strtotime("$get_enddate");
                                                        $remaining = time() - $dated;
                                                        ///////COUNT ONLY DAYS
                                                        $days_remaining = floor($remaining / 86400);
                                            
                                                        if ($days_remaining < 0 && $get_indbalance > 1) {
                                            
                                                            $statistics_part = $statistics1;
                                                            $statistics1++;
                                                        }
                                            
                                            
                                            
                                                        $statistics++;
                                                        //                
                                            
                                                    }
                                            
                                            
                                            
                                                    $percent = ($statistics_part / $statistics_all) * 100;
                                            
                                                    //             echo "$statistics_part";   
                                            //             echo "<br>";
                                            //             echo "$statistics_all";  
                                                    $percent1 = 100 - $percent;
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                                    //       ['.round($percent, 2).'% OF DEBTORS]   
                                            //     '.$statistics_part.'     
                                            
                                                    $result = mysqli_query($connect, "SELECT * FROM weekly_allloan WHERE branch = '$branch' AND indbalance > 1 AND remarks = 'loan disbursement'");
                                            
                                                    echo ' <div class="card card-block table-border-style">';
                                                    echo '<div class="table-responsive">
                                            <CAPTION><h3 style="font-size:26px; color:black; font-weight:bold;" align="center">'.$branch.' [' . round($percent, 0) . '% PERFORMING LOAN]    WEEKLY CUSTOMERS</h3></CAPTION>
                                            
                                            <table class="table table-bordered table-striped table_id" align="center">
                                            
                                            <thead class="thead-dark">
                                            <tr align="center">
                                            <th>S/N</th>         
                                            <th >Customer Name</th>
                                            <th>Codename</th>
                                            <th>District</th>
                                            
                                            <th>Account Officer</th>
                                            <th>Date</th>
                                            <th>Repayment</th>
                                            <th>Disbursed</th>
                                            <th>Balance</th>
                                            <th>View Details</th>
                                            
                                            </tr>     
                                            </thead>
                                            
                                            <tbody class="" style="font-family: sans-serif; color:black ; font-weight:bold;">';
                                                    //    ###########################################################################################   
                                                    ///GET ALL DEBTORS FOR DAILY
                                                    ////////////THIS IS TO SUM DAILY
                                                    $summation_repay11 = $summation_loan11 = 0;
                                                    $total_repay11 = mysqli_query($connect, "SELECT * FROM weekly_allloan WHERE branch = '$branch' AND indbalance > 1 AND remarks = 'loan disbursement'");
                                                    while ($row = mysqli_fetch_array($total_repay11)) {
                                                        $get_indbalance = $row['indbalance'];
                                                        $get_enddate1 = $row['startdate'];
                                                        $weeks = $row['weeks'];
                                                        $get_weeks = $weeks * 7;
                                                        ////CALCULATE CLOSING DATE
                                                        $get_enddate = date('Y-m-d', strtotime($get_enddate1 . ' + ' . $get_weeks . ' days'));
                                                        $repay_sum = $row['repay_sum'];
                                                        $disburseloan = $row['disburseloan'];
                                                        $disburseloan_interest = $row['interest'];
                                                        $principal = $disburseloan + $disburseloan_interest;
                                                        $pay_rate = ($repay_sum / $disburseloan) * 100;
                                            
                                                        ///////////////////////////////////////
                                                        //GET NUMBER OF MONTHS & DAYS LEFT
                                                        $dated = strtotime("$get_enddate");
                                                        $remaining = time() - $dated;
                                                        ///////COUNT ONLY DAYS
                                                        $days_remaining = floor($remaining / 86400);
                                            
                                                        if ($days_remaining < 0 && $get_indbalance > 1) {
                                                            $summation_repay11 += $row['repay_sum'];
                                                        }
                                                    }
                                            
                                                    //     ------------------------------------------------------------------------             
                                            
                                            
                                                    ////////////THIS IS TO SUM DAILY
                                                    $total_daily = mysqli_query($connect, "SELECT * FROM weekly_allloan WHERE branch = '$branch' AND indbalance > 1 AND remarks = 'loan disbursement'");
                                                    while ($row = mysqli_fetch_array($total_daily)) {
                                                        $get_indbalance = $row['indbalance'];
                                                        $get_enddate1 = $row['startdate'];
                                                        $weeks = $row['weeks'];
                                                        $get_weeks = $weeks * 7;
                                                        ////CALCULATE CLOSING DATE
                                                        $get_enddate = date('Y-m-d', strtotime($get_enddate1 . ' + ' . $get_weeks . ' days'));
                                            
                                                        $repay_sum = $row['repay_sum'];
                                                        $disburseloan = $row['disburseloan'];
                                                        $disburseloan_interest = $row['interest'];
                                                        $principal = $disburseloan + $disburseloan_interest;
                                                        $pay_rate = ($repay_sum / $disburseloan) * 100;
                                            
                                                        ///////////////////////////////////////
                                                        //GET NUMBER OF MONTHS & DAYS LEFT
                                                        $dated = strtotime("$get_enddate");
                                                        $remaining = time() - $dated;
                                                        ///////COUNT ONLY DAYS
                                                        $days_remaining = floor($remaining / 86400);
                                            
                                                        if ($days_remaining < 0 && $get_indbalance > 1) {
                                            
                                                            $summation_loan11 += $row['disburseloan'];
                                                        }
                                                    }
                                                    $summation_loan = $summation_loan11 - $summation_repay11;
                                                    //     ----------------------------------------------------------------------------------   
                                            
                                            
                                            
                                                    echo "<tr id='hide_total' align = 'center'>";
                                                    echo "<td></td>";
                                                    echo "<td>--------</td>";
                                                    echo "<td>--------</td>";
                                                    echo "<td>--------</td>";
                                                    echo "<td>--------</td>";
                                                    echo "<td align = 'right' style='font-size: 20px;'>TOTAL: </td>";
                                                    echo "<td style='color: green; font-size: 20px;'>" . number_format($summation_repay11) . "</td>";
                                                    echo "<td style='color: red; font-size: 20px;'>" . number_format($summation_loan11) . "</td>";
                                                    echo "<td style='color: blue; font-size: 20px;'>" . number_format($summation_loan) . "</td>";
                                                    echo "<td>--------</td>";
                                            
                                                    echo "</tr>";
                                            
                                                    //    ###########################################################################################    
                                            
                                                    while ($row = mysqli_fetch_array($result)) {
                                                        $get_indbalance = $row['indbalance'];
                                                        $get_enddate1 = $row['startdate'];
                                                        $weeks = $row['weeks'];
                                                        $get_weeks = $weeks * 7;
                                                        ////CALCULATE CLOSING DATE
                                                        $get_enddate = date('Y-m-d', strtotime($get_enddate1 . ' + ' . $get_weeks . ' days'));
                                            
                                                        $repay_sum = $row['repay_sum'];
                                                        $disburseloan = $row['disburseloan'];
                                                        $disburseloan_interest = $row['interest'];
                                                        $principal = $disburseloan + $disburseloan_interest;
                                                        $pay_rate = ($repay_sum / $disburseloan) * 100;
                                            
                                                        ///////////////////////////////////////
                                                        //GET NUMBER OF MONTHS & DAYS LEFT
                                                        $dated = strtotime("$get_enddate");
                                                        $remaining = time() - $dated;
                                                        ///////COUNT ONLY DAYS
                                                        $days_remaining = floor($remaining / 86400);
                                            
                                                        if ($days_remaining < 0 && $get_indbalance > 1) {
                                            
                                                            echo "<tr>";
                                                            echo "<td >" . $inc . "</td>";
                                                            echo "<td >" . $row['name'] . "</td>";
                                                            echo "<td >" . $row['codename'] . "</td>";
                                                            echo "<td >" . $row['district'] . "</td>";
                                            
                                                            echo "<td >" . $row['acc_officer'] . "</td>";
                                                            echo "<td>" . $row['date'] . "</td>";
                                                            echo "<td style='color: green;' >" . number_format($row['repay_sum']) . "</td>";
                                                            echo "<td style='color: red;' >" . number_format($row['disburseloan']) . "</td>";
                                                            echo "<td style='color: blue;' >" . number_format($row['indbalance']) . "</td>";
                                                            echo "<td ><a style='color: brown;' href='weekly_loan_statement.php?codename=" . $row['codename'] . "&name=" . $row['name'] . "&type=" . $row['type'] . "'>View details</a></td>";
                                                            //              echo "<td ><a style='color:#cc9900;' onclick=\"javascript: return confirm('DO YOU WISH TO CONTINUE WITH DELETE?');\" href='debtors.php?iddd=" . $row['id']."&name=".$row['name']."&id=check_delete'>Delete</a></td>";
                                            
                                                            echo "</tr>";
                                            
                                                            $inc++;
                                                        }
                                                    }
                                            
                                                    echo ' </tbody>';
                                                    echo ' </table>';
                                            
                                                    echo '</div>';
                                                    echo '</div>';
                                            
                                            
                                            
                                                }
                                            
                                                $_SESSION['get_branch'] = "";
                                            
                                            }
                                            
                                            
                                            
                                            
                                            
                                            else if (isset($_POST['filter_perf'])) {
                                                $get_me = 1;
                                                $year_alone = "";

                                                $performannce = $_POST['year_alone'];

                                                //             $performannce = filter_input(INPUT_GET, 'year') ;  
                                            
                                                //loop through all table rows
                                            
                                                $inc = 1;
                                                $statistics = $statistics1 = 1;

                                                $statistics_part = $statistics_all = 0;

                                                if ($performannce == "non") {
                                                    //        COUNTING THE STATTISTICS     
                                            
                                                    $result11 = mysqli_query($connect, "SELECT * FROM weekly_allloan WHERE indbalance > 1 AND remarks = 'loan disbursement'");

                                                    while ($row = mysqli_fetch_array($result11)) {
                                                        $statistics_all = $statistics;
                                                        $get_indbalance = $row['indbalance'];
                                                        $get_enddate1 = $row['startdate'];
                                                        $weeks = $row['weeks'];
                                                        $get_weeks = $weeks * 7;

                                                        ////CALCULATE CLOSING DATE
                                                        $get_enddate = date('Y-m-d', strtotime($get_enddate1 . ' + ' . $get_weeks . ' days'));

                                                        $repay_sum = $row['repay_sum'];
                                                        $disburseloan = $row['disburseloan'];
                                                        $disburseloan_interest = $row['interest'];
                                                        $principal = $disburseloan + $disburseloan_interest;
                                                        $pay_rate = ($repay_sum / $disburseloan) * 100;

                                                        ///////////////////////////////////////
                                                        //GET NUMBER OF MONTHS & DAYS LEFT
                                                        $dated = strtotime("$get_enddate");
                                                        $remaining = time() - $dated;
                                                        ///////COUNT ONLY DAYS
                                                        $days_remaining = floor($remaining / 86400);
                                                        //     echo $days_remaining."<br>";
                                                        if ($days_remaining > 0 && $get_indbalance > 1) {

                                                            $statistics_part = $statistics1;
                                                            $statistics1++;
                                                        }



                                                        $statistics++;
                                                        //                
                                            
                                                    }



                                                    $percent = ($statistics_part / $statistics_all) * 100;


                                                    //               echo "$statistics_part";   
//             echo "<br>";
//             echo "$statistics_all";  
                                            








                                                    //     ['.round($percent, 0).'% OF DEBTORS]        
// '.$statistics_part.'   
                                            
                                                    $result = mysqli_query($connect, "SELECT * FROM weekly_allloan WHERE indbalance > 1 AND remarks = 'loan disbursement' ORDER BY id DESC");

                                                    echo ' <div class="card card-block table-border-style">';
                                                    echo '<div class="table-responsive">
     <CAPTION><h3 style="font-size:26px; color:black; font-weight:bold;" align="center">  [' . round($percent, 0) . '% NON-PERFORMING LOAN] WEEKLY CUSTOMERS</h3></CAPTION>
   
  <table class="table table-bordered table-striped table_id" align="center">
      
       <thead class="thead-dark">
         <tr align="center">
         <th>S/N</th>         
         <th >Customer Name</th>
           <th>Codename</th>
               <th>District</th>
          
            <th>Account Officer</th>
           <th>Date</th>
            <th>Repayment</th>
             <th>Disbursed</th>
                <th>Balance</th>
             <th>View Details</th>
             
          </tr>     
          </thead>

    <tbody class="" style="font-family: sans-serif; color:black ; font-weight:bold;">';
                                                    //    ###########################################################################################   
                                                    ///GET ALL DEBTORS FOR DAILY
                                                    ////////////THIS IS TO SUM DAILY
                                                    $summation_repay11 = $summation_loan11 = 0;
                                                    $total_repay11 = mysqli_query($connect, "SELECT * FROM weekly_allloan WHERE indbalance > 1 AND remarks = 'loan disbursement'");
                                                    while ($row = mysqli_fetch_array($total_repay11)) {
                                                        $get_indbalance = $row['indbalance'];
                                                        $get_enddate1 = $row['startdate'];
                                                        $weeks = $row['weeks'];
                                                        $get_weeks = $weeks * 7;
                                                        ////CALCULATE CLOSING DATE
                                                        $get_enddate = date('Y-m-d', strtotime($get_enddate1 . ' + ' . $get_weeks . ' days'));

                                                        $repay_sum = $row['repay_sum'];
                                                        $disburseloan = $row['disburseloan'];
                                                        $disburseloan_interest = $row['interest'];
                                                        $principal = $disburseloan + $disburseloan_interest;
                                                        $pay_rate = ($repay_sum / $disburseloan) * 100;

                                                        ///////////////////////////////////////
                                                        //GET NUMBER OF MONTHS & DAYS LEFT
                                                        $dated = strtotime("$get_enddate");
                                                        $remaining = time() - $dated;
                                                        ///////COUNT ONLY DAYS
                                                        $days_remaining = floor($remaining / 86400);

                                                        if ($days_remaining > 0 && $get_indbalance > 1) {
                                                            $summation_repay11 += $row['repay_sum'];
                                                        }
                                                    }

                                                    //     ------------------------------------------------------------------------             
                                            

                                                    ////////////THIS IS TO SUM DAILY
                                                    $total_daily = mysqli_query($connect, "SELECT * FROM weekly_allloan WHERE indbalance > 1 AND remarks = 'loan disbursement'");
                                                    while ($row = mysqli_fetch_array($total_daily)) {
                                                        $get_indbalance = $row['indbalance'];
                                                        $get_enddate1 = $row['startdate'];
                                                        $weeks = $row['weeks'];
                                                        $get_weeks = $weeks * 7;
                                                        ////CALCULATE CLOSING DATE
                                                        $get_enddate = date('Y-m-d', strtotime($get_enddate1 . ' + ' . $get_weeks . ' days'));

                                                        $repay_sum = $row['repay_sum'];
                                                        $disburseloan = $row['disburseloan'];
                                                        $disburseloan_interest = $row['interest'];
                                                        $principal = $disburseloan + $disburseloan_interest;
                                                        $pay_rate = ($repay_sum / $disburseloan) * 100;

                                                        ///////////////////////////////////////
                                                        //GET NUMBER OF MONTHS & DAYS LEFT
                                                        $dated = strtotime("$get_enddate");
                                                        $remaining = time() - $dated;
                                                        ///////COUNT ONLY DAYS
                                                        $days_remaining = floor($remaining / 86400);

                                                        if ($days_remaining > 0 && $get_indbalance > 1) {
                                                            $summation_loan11 += $row['disburseloan'];
                                                        }
                                                    }
                                                    $summation_loan = $summation_loan11 - $summation_repay11;
                                                    //     ----------------------------------------------------------------------------------   
                                            


                                                    echo "<tr id='hide_total' align = 'center'>";
                                                    echo "<td></td>";
                                                    echo "<td>--------</td>";
                                                    echo "<td>--------</td>";
                                                    echo "<td>--------</td>";
                                                    echo "<td>--------</td>";
                                                    echo "<td align = 'right' style='font-size: 20px;'>TOTAL: </td>";
                                                    echo "<td style='color: green; font-size: 20px;'>" . number_format($summation_repay11) . "</td>";
                                                    echo "<td style='color: red; font-size: 20px;'>" . number_format($summation_loan11) . "</td>";
                                                    echo "<td style='color: blue; font-size: 20px;'>" . number_format($summation_loan) . "</td>";
                                                    echo "<td>--------</td>";

                                                    echo "</tr>";

                                                    //    ###########################################################################################    
                                            
                                                    while ($row = mysqli_fetch_array($result)) {
                                                        $get_indbalance = $row['indbalance'];
                                                        $get_enddate1 = $row['startdate'];
                                                        $weeks = $row['weeks'];
                                                        $get_weeks = $weeks * 7;
                                                        ////CALCULATE CLOSING DATE
                                                        $get_enddate = date('Y-m-d', strtotime($get_enddate1 . ' + ' . $get_weeks . ' days'));

                                                        $repay_sum = $row['repay_sum'];
                                                        $disburseloan = $row['disburseloan'];
                                                        $disburseloan_interest = $row['interest'];
                                                        $principal = $disburseloan + $disburseloan_interest;
                                                        $pay_rate = ($repay_sum / $disburseloan) * 100;

                                                        ///////////////////////////////////////
                                                        //GET NUMBER OF MONTHS & DAYS LEFT
                                                        $dated = strtotime("$get_enddate");
                                                        $remaining = time() - $dated;
                                                        ///////COUNT ONLY DAYS
                                                        $days_remaining = floor($remaining / 86400);

                                                        if ($days_remaining > 0 && $get_indbalance > 1) {
                                                            echo "<tr>";
                                                            echo "<td >" . $inc . "</td>";
                                                            echo "<td >" . $row['name'] . "</td>";
                                                            echo "<td >" . $row['codename'] . "</td>";
                                                            echo "<td >" . $row['district'] . "</td>";

                                                            echo "<td >" . $row['acc_officer'] . "</td>";
                                                            echo "<td>" . $row['date'] . "</td>";
                                                            echo "<td style='color: green;' >" . number_format($row['repay_sum']) . "</td>";
                                                            echo "<td style='color: red;' >" . number_format($row['disburseloan']) . "</td>";
                                                            echo "<td style='color: blue;' >" . number_format($row['indbalance']) . "</td>";
                                                            echo "<td ><a style='color: brown;' href='weekly_loan_statement.php?codename=" . $row['codename'] . "&name=" . $row['name'] . "&type=" . $row['type'] . "'>View details</a></td>";
                                                            //              echo "<td ><a style='color:#cc9900;' onclick=\"javascript: return confirm('DO YOU WISH TO CONTINUE WITH DELETE?');\" href='debtors.php?iddd=" . $row['id']."&name=".$row['name']."&id=check_delete'>Delete</a></td>";
                                            
                                                            echo "</tr>";

                                                            $inc++;
                                                        }
                                                    }

                                                    echo ' </tbody>';
                                                    echo ' </table>';

                                                    echo '</div>';
                                                    echo '</div>';



                                                }





































                                                if ($performannce == "perform") {

                                                    //        COUNTING THE STATTISTICS     
                                            
                                                    $result11 = mysqli_query($connect, "SELECT * FROM weekly_allloan WHERE indbalance > 1 AND remarks = 'loan disbursement'");

                                                    while ($row = mysqli_fetch_array($result11)) {
                                                        $statistics_all = $statistics;
                                                        $get_indbalance = $row['indbalance'];
                                                        $get_enddate1 = $row['startdate'];
                                                        $weeks = $row['weeks'];
                                                        $get_weeks = $weeks * 7;
                                                        ////CALCULATE CLOSING DATE
                                                        $get_enddate = date('Y-m-d', strtotime($get_enddate1 . ' + ' . $get_weeks . ' days'));

                                                        $repay_sum = $row['repay_sum'];
                                                        $disburseloan = $row['disburseloan'];
                                                        $disburseloan_interest = $row['interest'];
                                                        $principal = $disburseloan + $disburseloan_interest;
                                                        $pay_rate = ($repay_sum / $disburseloan) * 100;

                                                        ///////////////////////////////////////
                                                        //GET NUMBER OF MONTHS & DAYS LEFT
                                                        $dated = strtotime("$get_enddate");
                                                        $remaining = time() - $dated;
                                                        ///////COUNT ONLY DAYS
                                                        $days_remaining = floor($remaining / 86400);

                                                        if ($days_remaining < 0 && $get_indbalance > 1) {

                                                            $statistics_part = $statistics1;
                                                            $statistics1++;
                                                        }



                                                        $statistics++;
                                                        //                
                                            
                                                    }



                                                    $percent = ($statistics_part / $statistics_all) * 100;

                                                    //             echo "$statistics_part";   
//             echo "<br>";
//             echo "$statistics_all";  
                                                    $percent1 = 100 - $percent;
























                                                    //       ['.round($percent, 2).'% OF DEBTORS]   
//     '.$statistics_part.'     
                                            
                                                    $result = mysqli_query($connect, "SELECT * FROM weekly_allloan WHERE indbalance > 1 AND remarks = 'loan disbursement'");

                                                    echo ' <div class="card card-block table-border-style">';
                                                    echo '<div class="table-responsive">
     <CAPTION><h3 style="font-size:26px; color:black; font-weight:bold;" align="center"> [' . round($percent, 0) . '% PERFORMING LOAN]    WEEKLY CUSTOMERS</h3></CAPTION>
   
  <table class="table table-bordered table-striped table_id" align="center">
      
       <thead class="thead-dark">
         <tr align="center">
         <th>S/N</th>         
         <th >Customer Name</th>
           <th>Codename</th>
               <th>District</th>
          
            <th>Account Officer</th>
           <th>Date</th>
            <th>Repayment</th>
             <th>Disbursed</th>
                <th>Balance</th>
             <th>View Details</th>
             
          </tr>     
          </thead>

    <tbody class="" style="font-family: sans-serif; color:black ; font-weight:bold;">';
                                                    //    ###########################################################################################   
                                                    ///GET ALL DEBTORS FOR DAILY
                                                    ////////////THIS IS TO SUM DAILY
                                                    $summation_repay11 = $summation_loan11 = 0;
                                                    $total_repay11 = mysqli_query($connect, "SELECT * FROM weekly_allloan WHERE indbalance > 1 AND remarks = 'loan disbursement'");
                                                    while ($row = mysqli_fetch_array($total_repay11)) {
                                                        $get_indbalance = $row['indbalance'];
                                                        $get_enddate1 = $row['startdate'];
                                                        $weeks = $row['weeks'];
                                                        $get_weeks = $weeks * 7;
                                                        ////CALCULATE CLOSING DATE
                                                        $get_enddate = date('Y-m-d', strtotime($get_enddate1 . ' + ' . $get_weeks . ' days'));
                                                        $repay_sum = $row['repay_sum'];
                                                        $disburseloan = $row['disburseloan'];
                                                        $disburseloan_interest = $row['interest'];
                                                        $principal = $disburseloan + $disburseloan_interest;
                                                        $pay_rate = ($repay_sum / $disburseloan) * 100;

                                                        ///////////////////////////////////////
                                                        //GET NUMBER OF MONTHS & DAYS LEFT
                                                        $dated = strtotime("$get_enddate");
                                                        $remaining = time() - $dated;
                                                        ///////COUNT ONLY DAYS
                                                        $days_remaining = floor($remaining / 86400);

                                                        if ($days_remaining < 0 && $get_indbalance > 1) {
                                                            $summation_repay11 += $row['repay_sum'];
                                                        }
                                                    }

                                                    //     ------------------------------------------------------------------------             
                                            

                                                    ////////////THIS IS TO SUM DAILY
                                                    $total_daily = mysqli_query($connect, "SELECT * FROM weekly_allloan WHERE indbalance > 1 AND remarks = 'loan disbursement'");
                                                    while ($row = mysqli_fetch_array($total_daily)) {
                                                        $get_indbalance = $row['indbalance'];
                                                        $get_enddate1 = $row['startdate'];
                                                        $weeks = $row['weeks'];
                                                        $get_weeks = $weeks * 7;
                                                        ////CALCULATE CLOSING DATE
                                                        $get_enddate = date('Y-m-d', strtotime($get_enddate1 . ' + ' . $get_weeks . ' days'));

                                                        $repay_sum = $row['repay_sum'];
                                                        $disburseloan = $row['disburseloan'];
                                                        $disburseloan_interest = $row['interest'];
                                                        $principal = $disburseloan + $disburseloan_interest;
                                                        $pay_rate = ($repay_sum / $disburseloan) * 100;

                                                        ///////////////////////////////////////
                                                        //GET NUMBER OF MONTHS & DAYS LEFT
                                                        $dated = strtotime("$get_enddate");
                                                        $remaining = time() - $dated;
                                                        ///////COUNT ONLY DAYS
                                                        $days_remaining = floor($remaining / 86400);

                                                        if ($days_remaining < 0 && $get_indbalance > 1) {

                                                            $summation_loan11 += $row['disburseloan'];
                                                        }
                                                    }
                                                    $summation_loan = $summation_loan11 - $summation_repay11;
                                                    //     ----------------------------------------------------------------------------------   
                                            


                                                    echo "<tr id='hide_total' align = 'center'>";
                                                    echo "<td></td>";
                                                    echo "<td>--------</td>";
                                                    echo "<td>--------</td>";
                                                    echo "<td>--------</td>";
                                                    echo "<td>--------</td>";
                                                    echo "<td align = 'right' style='font-size: 20px;'>TOTAL: </td>";
                                                    echo "<td style='color: green; font-size: 20px;'>" . number_format($summation_repay11) . "</td>";
                                                    echo "<td style='color: red; font-size: 20px;'>" . number_format($summation_loan11) . "</td>";
                                                    echo "<td style='color: blue; font-size: 20px;'>" . number_format($summation_loan) . "</td>";
                                                    echo "<td>--------</td>";

                                                    echo "</tr>";

                                                    //    ###########################################################################################    
                                            
                                                    while ($row = mysqli_fetch_array($result)) {
                                                        $get_indbalance = $row['indbalance'];
                                                        $get_enddate1 = $row['startdate'];
                                                        $weeks = $row['weeks'];
                                                        $get_weeks = $weeks * 7;
                                                        ////CALCULATE CLOSING DATE
                                                        $get_enddate = date('Y-m-d', strtotime($get_enddate1 . ' + ' . $get_weeks . ' days'));

                                                        $repay_sum = $row['repay_sum'];
                                                        $disburseloan = $row['disburseloan'];
                                                        $disburseloan_interest = $row['interest'];
                                                        $principal = $disburseloan + $disburseloan_interest;
                                                        $pay_rate = ($repay_sum / $disburseloan) * 100;

                                                        ///////////////////////////////////////
                                                        //GET NUMBER OF MONTHS & DAYS LEFT
                                                        $dated = strtotime("$get_enddate");
                                                        $remaining = time() - $dated;
                                                        ///////COUNT ONLY DAYS
                                                        $days_remaining = floor($remaining / 86400);

                                                        if ($days_remaining < 0 && $get_indbalance > 1) {

                                                            echo "<tr>";
                                                            echo "<td >" . $inc . "</td>";
                                                            echo "<td >" . $row['name'] . "</td>";
                                                            echo "<td >" . $row['codename'] . "</td>";
                                                            echo "<td >" . $row['district'] . "</td>";

                                                            echo "<td >" . $row['acc_officer'] . "</td>";
                                                            echo "<td>" . $row['date'] . "</td>";
                                                            echo "<td style='color: green;' >" . number_format($row['repay_sum']) . "</td>";
                                                            echo "<td style='color: red;' >" . number_format($row['disburseloan']) . "</td>";
                                                            echo "<td style='color: blue;' >" . number_format($row['indbalance']) . "</td>";
                                                            echo "<td ><a style='color: brown;' href='weekly_loan_statement.php?codename=" . $row['codename'] . "&name=" . $row['name'] . "&type=" . $row['type'] . "'>View details</a></td>";
                                                            //              echo "<td ><a style='color:#cc9900;' onclick=\"javascript: return confirm('DO YOU WISH TO CONTINUE WITH DELETE?');\" href='debtors.php?iddd=" . $row['id']."&name=".$row['name']."&id=check_delete'>Delete</a></td>";
                                            
                                                            echo "</tr>";

                                                            $inc++;
                                                        }
                                                    }

                                                    echo ' </tbody>';
                                                    echo ' </table>';

                                                    echo '</div>';
                                                    echo '</div>';



                                                }



                                            }
                                            
                                            
                                            
                                            
                                            else if (isset($_POST['btnbranch'])) {
                                                $get_me = 1;
                                                $branch = $_POST['branch'];
                                                $_SESSION['get_branch'] = $branch;

                                                $check_branch = "";
                                                //loop through all table rows
                                                $inc = 1;


                                                $result = mysqli_query($connect, "SELECT * FROM weekly_allloan WHERE indbalance > 0 AND remarks = 'loan disbursement' AND (reverse_alert = '' OR reverse_alert IS NULL) AND branch = '$branch'  ORDER BY id DESC");

                                                echo ' <div class="card card-block table-border-style">';
                                                echo '<div class="table-responsive">
                    <CAPTION><h3 style="font-size:26px; color:black; font-weight:bold;" align="center">Branch: ' . $branch . '</h3></CAPTION>
                
                    <table class="table table-bordered table-striped table_id" align="center">
                
                    <thead class="thead-dark">
                    <tr align="center">
                    <th>S/N</th>         
                    <th >Customer Name</th>
                    <th>Codename</th>
                    <th>District</th>
                
                    <th>Account Officer</th>
                    <th>Date</th>
                    <th>Repayment</th>
                    <th>Disbursed</th>
                        <th>Balance</th>
                    <th>View Details</th>
                    
                    </tr>     
                    </thead>
                
                    <tbody class="" style="font-family: sans-serif; color:black ; font-weight:bold;">';
                                                //    ###########################################################################################   
                                                ///GET ALL DEBTORS FOR DAILY
                                                ////////////THIS IS TO SUM DAILY
                                                $total_repay11 = mysqli_query($connect, "SELECT SUM(repay) as total FROM weekly_allloan WHERE branch = '$branch'");
                                                while ($row = mysqli_fetch_array($total_repay11)) {
                                                    $summation_repay11 = $row['total'];
                                                }

                                                ////////////THIS IS TO SUM DAILY
                                                $total_daily = mysqli_query($connect, "SELECT SUM(disburseloan) as total FROM weekly_allloan WHERE branch = '$branch'");
                                                while ($row = mysqli_fetch_array($total_daily)) {
                                                    $summation_loan11 = $row['total'];
                                                }


                                                //////===============Weekly
                                                $total_weekly = mysqli_query($connect, "SELECT SUM(disburseloan) as total, interest, SUM(interest) as sum_int2 FROM weekly_allloan WHERE branch = '$branch'");
                                                while ($row = mysqli_fetch_array($total_weekly)) {
                                                    $summation_loan_weekly = $row['total'] - $row['interest'];
                                                    $sum_int2 = $row['sum_int2'];
                                                }
                                                $sql_all_get112 = mysqli_query($connect, "SELECT * FROM weekly_allloan WHERE remarks = 'loan disbursement' AND branch = '$branch'");
                                                while ($row = mysqli_fetch_array($sql_all_get112)) {
                                                    $total_weekly = mysqli_query($connect, "SELECT SUM(disburseloan) as total, SUM(interest) as sum_int, SUM(repay_sum) as repay_sum FROM weekly_allloan WHERE branch = '$branch'");
                                                    while ($row = mysqli_fetch_array($total_weekly)) {
                                                        $summation_loan_weekly1 = $row['total'];
                                                        $sum_int = $row['sum_int'];
                                                        $repay_sum = $row['repay_sum'];

                                                        $getEarnedIncome = $repay_sum / ($summation_loan_weekly1 / $sum_int);

                                                    }


                                                }

                                                @$weekly_unearned_income = $sum_int2 - $getEarnedIncome;

                                                $summation_loan = ($summation_loan11 - $summation_repay11) - $weekly_unearned_income;

                                                echo "<tr id='hide_total' align = 'center'>";
                                                echo "<td></td>";
                                                echo "<td>--------</td>";
                                                echo "<td>--------</td>";
                                                echo "<td>--------</td>";
                                                echo "<td>--------</td>";
                                                echo "<td align = 'right' style='font-size: 20px;'>TOTAL: </td>";
                                                echo "<td style='color: green; font-size: 20px;'>" . number_format($summation_repay11) . "</td>";
                                                echo "<td style='color: red; font-size: 20px;'>" . number_format($summation_loan11) . "</td>";
                                                echo "<td style='color: blue; font-size: 20px;'>" . number_format($summation_loan) . "</td>";
                                                echo "<td>--------</td>";

                                                echo "</tr>";

                                                //    ###########################################################################################    
                                            
                                                while ($row = mysqli_fetch_array($result)) {
                                                    $ans_bal = $row['repay_sum'] - $row['disburseloan'];
                                                    if ($ans_bal < 0 && $row['remarks'] == "loan disbursement") {
                                                        echo "<tr>";
                                                        echo "<td >" . $inc . "</td>";
                                                        echo "<td >" . $row['name'] . "</td>";
                                                        echo "<td >" . $row['codename'] . "</td>";
                                                        echo "<td >" . $row['district'] . "</td>";

                                                        echo "<td >" . $row['acc_officer'] . "</td>";
                                                        echo "<td>" . $row['date'] . "</td>";
                                                        echo "<td style='color: green;' >" . number_format($row['repay_sum']) . "</td>";
                                                        echo "<td style='color: red;' >" . number_format($row['disburseloan']) . "</td>";
                                                        echo "<td style='color: blue;' >" . number_format($row['indbalance']) . "</td>";
                                                        echo "<td ><a style='color: brown;' href='weekly_loan_statement.php?codename=" . $row['codename'] . "&name=" . $row['name'] . "&type=" . $row['type'] . "'>View details</a></td>";
                                                        //              echo "<td ><a style='color:#cc9900;' onclick=\"javascript: return confirm('DO YOU WISH TO CONTINUE WITH DELETE?');\" href='debtors.php?iddd=" . $row['id']."&name=".$row['name']."&id=check_delete'>Delete</a></td>";
                                            
                                                        echo "</tr>";

                                                        $inc++;
                                                    }
                                                }

                                                echo ' </tbody>';
                                                echo ' </table>';

                                                echo '</div>';
                                                echo '</div>';

                                            } else if (isset($_POST['group_na'])) {

                                                //          $group = ""; 
                                                $count_Group = $year = "";

                                                //          $group = $_REQUEST['group']; 
                                                $group = $_POST['group_name'];
                                                $check_Group = "";

                                                //          LETS CHECK FOR GROUP EXISTENCE
                                                $check = mysqli_query($connect, "SELECT * FROM members WHERE dob = '$group'");
                                                while ($row5 = mysqli_fetch_array($check)) {
                                                    $check_Group = $row5['dob'];
                                                }

                                                if ($check_Group == "") {
                                                    echo "Not Available";
                                                } else {
                                                    //////////////////TOTAL  MEMBERS Group Members////////////////
                                                    $countA = mysqli_query($connect, "SELECT COUNT(name) as totalg FROM weekly_allloan WHERE dob = '$group' AND (disburseloan > 1 OR disburseloan < -1) AND NOT remarks = 'Penalty' AND NOT reversepen = 'penalty reverse'");
                                                    while ($row4 = mysqli_fetch_array($countA)) {
                                                        $count_Group = $row4['totalg'];
                                                    }

                                                    $inc_inv = 1;
                                                    $result22 = mysqli_query($connect, "SELECT * FROM weekly_allloan WHERE dob = '$group' AND (disburseloan > 1 OR disburseloan < -1) AND NOT remarks = 'Penalty' AND NOT reversepen = 'penalty reverse'");
                                                    //loop through all table rows
                                            
                                                    while ($row = mysqli_fetch_array($result22)) {
                                                        $ans_bal = $row['repay_sum'] - $row['disburseloan'];
                                                        if ($ans_bal < 0 && $row['remarks'] == "loan disbursement") {
                                                            $test_count = $inc_inv;
                                                            $inc_inv++;

                                                        }
                                                    }


                                                    $inc = 1;

                                                    $result = mysqli_query($connect, "SELECT * FROM weekly_allloan WHERE indbalance > 0 AND remarks = 'loan disbursement' AND    (reverse_alert = '' OR reverse_alert IS NULL)  AND dob = '$group'  ORDER BY id DESC");

                                                    echo ' <div class="card card-block table-border-style">';
                                                    echo '<div class="table-responsive">
     <CAPTION><h3 style="font-size:26px; color:black; font-weight:bold;" align="center">GROUP: ' . $group . ' WEEKLY CUSTOMERS</h3></CAPTION>
   
  <table class="table table-bordered table-striped table_id" align="center">
      
       <thead class="thead-dark">
         <tr align="center">
         <th>S/N</th>         
         <th >Customer Name</th>
           <th>Codename</th>
               <th>District</th>
          
         <th>Account Officer</th>
           <th>Date</th>
            <th>Repayment</th>
             <th>Disbursed</th>
                <th>Balance</th>
             <th>View Details</th>
             
          </tr>     
          </thead>

    <tbody class="" style="font-family: sans-serif; color:black ; font-weight:bold;">';
                                                    //    ###########################################################################################   
                                                    ///GET ALL DEBTORS FOR DAILY
                                                    ////////////THIS IS TO SUM DAILY
                                                    $total_repay11 = mysqli_query($connect, "SELECT SUM(repay) as total FROM weekly_allloan WHERE   dob = '$group' AND (remarks = 'loan repayment' OR remarks = 'Penalty Paid')");
                                                    while ($row = mysqli_fetch_array($total_repay11)) {
                                                        $summation_repay11 = $row['total'];
                                                    }

                                                    ////////////THIS IS TO SUM DAILY
                                                    $total_daily = mysqli_query($connect, "SELECT SUM(disburseloan) as total FROM weekly_allloan WHERE   dob = '$group'");
                                                    while ($row = mysqli_fetch_array($total_daily)) {
                                                        $summation_loan11 = $row['total'];
                                                    }

                                                    $summation_loan = $summation_loan11 - $summation_repay11;

                                                    echo "<tr id='hide_total' align = 'center'>";
                                                    echo "<td></td>";
                                                    echo "<td>--------</td>";
                                                    echo "<td>--------</td>";
                                                    echo "<td>--------</td>";
                                                    echo "<td>--------</td>";
                                                    echo "<td align = 'right' style='font-size: 20px;'>TOTAL: </td>";
                                                    echo "<td style='color: green; font-size: 20px;'>" . number_format($summation_repay11) . "</td>";
                                                    echo "<td style='color: red; font-size: 20px;'>" . number_format($summation_loan11) . "</td>";
                                                    echo "<td style='color: blue; font-size: 20px;'>" . number_format($summation_loan) . "</td>";
                                                    echo "<td>--------</td>";

                                                    echo "</tr>";

                                                    //    ###########################################################################################    
                                            
                                                    while ($row = mysqli_fetch_array($result)) {
                                                        $ans_bal = $row['repay_sum'] - $row['disburseloan'];
                                                        if ($ans_bal < 0 && $row['remarks'] == "loan disbursement") {
                                                            echo "<tr>";
                                                            echo "<td >" . $inc . "</td>";
                                                            echo "<td >" . $row['name'] . "</td>";
                                                            echo "<td >" . $row['codename'] . "</td>";
                                                            echo "<td >" . $row['district'] . "</td>";

                                                            echo "<td >" . $row['acc_officer'] . "</td>";
                                                            echo "<td>" . $row['date'] . "</td>";
                                                            echo "<td style='color: green;' >" . number_format($row['repay_sum']) . "</td>";
                                                            echo "<td style='color: red;' >" . number_format($row['disburseloan']) . "</td>";
                                                            echo "<td style='color: blue;' >" . number_format($row['indbalance']) . "</td>";
                                                            echo "<td ><a style='color: brown;' href='weekly_loan_statement.php?codename=" . $row['codename'] . "&name=" . $row['name'] . "&type=" . $row['type'] . "'>View details</a></td>";
                                                            //              echo "<td ><a style='color:#cc9900;' onclick=\"javascript: return confirm('DO YOU WISH TO CONTINUE WITH DELETE?');\" href='debtors.php?iddd=" . $row['id']."&name=".$row['name']."&id=check_delete'>Delete</a></td>";
                                            
                                                            echo "</tr>";

                                                            $inc++;
                                                        }
                                                    }
                                                }
                                            } else if ($get_me != 1) {

                                                //loop through all table rows
                                                $inc = 1;

                                                ////////////THIS IS TO SUM PAYMENTS
//                $total_payments = mysqli_query($connect, "SELECT SUM(payments) as total FROM loan");      
//              while  ($row1 = mysqli_fetch_array($total_payments)){
//              $summation_pay = $row1['total'];                          
//              }
                                            
                                                //           balance > 1 is to avoid repetition
                                                $result = mysqli_query($connect, "SELECT * FROM weekly_allloan WHERE indbalance > 0 AND remarks = 'loan disbursement' AND    (reverse_alert = '' OR reverse_alert IS NULL)  ORDER BY id DESC");

                                                echo ' <div class="card card-block table-border-style">';
                                                echo '<div class="table-responsive">
     <CAPTION><h3 style="font-size:26px; color:black; font-weight:bold;" align="center">WEEKLY CUSTOMERS</h3></CAPTION>
   
  <table class="table table-bordered table-striped table_id" align="center">
      
       <thead class="thead-dark">
         <tr align="center">
         <th>S/N</th>         
         <th >Customer Name</th>
           <th>Codename</th>
               <th>District</th>
          
             <th>Account Officer</th>
           <th>Date</th>
            <th>Repayment</th>
             <th>Disbursed</th>
                <th>Balance</th>
             <th>View Details</th>
             
          </tr>     
          </thead>

    <tbody class="" style="font-family: sans-serif; color:black ; font-weight:bold;">';
                                                //    ###########################################################################################   
                                                ///GET ALL DEBTORS FOR DAILY
                                                ////////////THIS IS TO SUM DAILY
                                                $total_repay11 = mysqli_query($connect, "SELECT SUM(repay) as total FROM weekly_allloan ");
                                                while ($row = mysqli_fetch_array($total_repay11)) {
                                                    $summation_repay11 = $row['total'];
                                                }

                                                ////////////THIS IS TO SUM DAILY
                                                $total_daily = mysqli_query($connect, "SELECT SUM(disburseloan) as total FROM weekly_allloan");
                                                while ($row = mysqli_fetch_array($total_daily)) {
                                                    $summation_loan11 = $row['total'];
                                                }


                                                //////===============Weekly
                                                $total_weekly = mysqli_query($connect, "SELECT SUM(disburseloan) as total, interest, SUM(interest) as sum_int2 FROM weekly_allloan");
                                                while ($row = mysqli_fetch_array($total_weekly)) {
                                                    $summation_loan_weekly = $row['total'] - $row['interest'];
                                                    $sum_int2 = $row['sum_int2'];
                                                }
                                                $sql_all_get112 = mysqli_query($connect, "SELECT * FROM weekly_allloan WHERE remarks = 'loan disbursement'");
                                                while ($row = mysqli_fetch_array($sql_all_get112)) {
                                                    $total_weekly = mysqli_query($connect, "SELECT SUM(disburseloan) as total, SUM(interest) as sum_int, SUM(repay_sum) as repay_sum FROM weekly_allloan");
                                                    while ($row = mysqli_fetch_array($total_weekly)) {
                                                        $summation_loan_weekly1 = $row['total'];
                                                        $sum_int = $row['sum_int'];
                                                        $repay_sum = $row['repay_sum'];

                                                        $getEarnedIncome = $repay_sum / ($summation_loan_weekly1 / $sum_int);

                                                    }


                                                }

                                                $weekly_unearned_income = $sum_int2 - $getEarnedIncome;

                                                $summation_loan = ($summation_loan11 - $summation_repay11) - $weekly_unearned_income;

                                                echo "<tr id='hide_total' align = 'center'>";
                                                echo "<td></td>";
                                                echo "<td>--------</td>";
                                                echo "<td>--------</td>";
                                                echo "<td>--------</td>";
                                                echo "<td>--------</td>";
                                                echo "<td align = 'right' style='font-size: 20px;'>TOTAL: </td>";
                                                echo "<td style='color: green; font-size: 20px;'>" . number_format($summation_repay11) . "</td>";
                                                echo "<td style='color: red; font-size: 20px;'>" . number_format($summation_loan11) . "</td>";
                                                echo "<td style='color: blue; font-size: 20px;'>" . number_format($summation_loan) . "</td>";
                                                echo "<td>--------</td>";

                                                echo "</tr>";

                                                //    ###########################################################################################    
                                            
                                                while ($row = mysqli_fetch_array($result)) {
                                                    $ans_bal = $row['repay_sum'] - $row['disburseloan'];
                                                    if ($ans_bal < 0 && $row['remarks'] == "loan disbursement") {
                                                        echo "<tr>";
                                                        echo "<td >" . $inc . "</td>";
                                                        echo "<td >" . $row['name'] . "</td>";
                                                        echo "<td >" . $row['codename'] . "</td>";
                                                        echo "<td >" . $row['district'] . "</td>";

                                                        echo "<td >" . $row['acc_officer'] . "</td>";
                                                        echo "<td>" . $row['date'] . "</td>";
                                                        echo "<td style='color: green;' >" . number_format($row['repay_sum']) . "</td>";
                                                        echo "<td style='color: red;' >" . number_format($row['disburseloan']) . "</td>";
                                                        echo "<td style='color: blue;' >" . number_format($row['indbalance']) . "</td>";
                                                        echo "<td ><a style='color: brown;' href='weekly_loan_statement.php?codename=" . $row['codename'] . "&name=" . $row['name'] . "&type=" . $row['type'] . "'>View details</a></td>";
                                                        //              echo "<td ><a style='color:#cc9900;' onclick=\"javascript: return confirm('DO YOU WISH TO CONTINUE WITH DELETE?');\" href='debtors.php?iddd=" . $row['id']."&name=".$row['name']."&id=check_delete'>Delete</a></td>";
                                            
                                                        echo "</tr>";

                                                        $inc++;
                                                    }
                                                }

                                                echo ' </tbody>';
                                                echo ' </table>';

                                                echo '</div>';
                                                echo '</div>';





                                            }

                                            ?>

                                        </div>










                                        --

                                        <script type='text/javascript'>
                                            $(function () {
                                                $(".autocomplete_staff").autocomplete({
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
                                                        $('.autocomplete_staff').val(ui.item.label); // display the selected text
                                                        $('.selectuser_id').val(ui.item.value); // save selected id to input
                                                        return false;
                                                    }
                                                });
                                            });   
                                        </script>








                                        <script type='text/javascript'>
                                            $(function () {
                                                $(".autocomplete_staff1").autocomplete({
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
                                                        $('.autocomplete_staff1').val(ui.item.label); // display the selected text
                                                        $('.selectuser_id').val(ui.item.value); // save selected id to input
                                                        return false;
                                                    }
                                                });
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

                                            ////////////////////////////////////////////////////////////////////////////////////////  



                                        </script>

                                        <!--ON LOAD DISPLAY ALL-->
                                        <script>
                                            if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
                                                xmlhttp = new XMLHttpRequest();
                                            }
                                            else {// code for IE6, IE5
                                                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                                            }

                                            xmlhttp.open("GET", "weekly_debtor_magic.php", true);
                                            xmlhttp.send();
                                            xmlhttp.onreadystatechange = function () {
                                                if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                                                    document.getElementById("dispay_db").innerHTML = xmlhttp.responseText;

                                                }
                                            };



                                        </script>



                                        <!--THIS IS TO DISPLAY SELECTED CLASS -->
                                        <script>
                                            $(document).ready(function () {
                                                var select_class = $(".select_class"); //THIS IS TO DISPLAY SELECTED CLASS   
                                                $(select_class).click(function (e) { //THIS IS TO DISPLAY SELECTED CLASS
                                                    e.preventDefault();
                                                    var getclass = document.getElementById('cla').value;

                                                    if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
                                                        xmlhttp = new XMLHttpRequest();
                                                    }
                                                    else {// code for IE6, IE5
                                                        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                                                    }

                                                    if (getclass === "") {

                                                        alert("Please select district")
                                                    }

                                                    else {
                                                        xmlhttp.open("GET", "debtor_magic22.php?district=" + getclass, true);
                                                        xmlhttp.send();
                                                        xmlhttp.onreadystatechange = function () {
                                                            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                                                                document.getElementById("dispay_db").innerHTML = xmlhttp.responseText;;
                                                            }
                                                        };


                                                        document.getElementById('cla').value = "";
                                                    }
                                                });




                                                var print_page = $(".print_me");
                                                $(print_page).click(function (e) { //Function LINK TO PRINT
                                                    e.preventDefault();
                                                    window.print();
                                                });


                                                $("#codename").autocomplete({
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
                                                        $('#codename').val(ui.item.label); // display the selected text
                                                        $('#selectuser_id').val(ui.item.value); // save selected id to input
                                                        return false;
                                                    }
                                                });


                                            });

                                        </script>















                                        <!--THIS IS TO DISPLAY DISTRICT -->
                                        <script>
                                            $(document).ready(function () {

                                                ////////////////////SELECT TIME MONTH////////////////////////////////////////
                                                var select_time = $(".select_time"); //THIS IS TO DISPLAY SELECTED CLASS   
                                                $(select_time).click(function (e) { //THIS IS TO DISPLAY SELECTED CLASS
                                                    e.preventDefault();
                                                    //       alert('I see you');
                                                    var getmonth = document.getElementById('month').value;
                                                    var getyear = document.getElementById('year').value;
                                                    //         var carry_group = document.getElementById('carry_group').value;

                                                    if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
                                                        xmlhttp = new XMLHttpRequest();
                                                    }
                                                    else {// code for IE6, IE5
                                                        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                                                    }

                                                    if (getmonth === "" || getyear === "") {
                                                        swal({
                                                            title: 'Not Allowed!',
                                                            text: 'You must fill start and end to search',
                                                            icon: 'error',
                                                            buttons: {
                                                                confirm: { text: 'Ok', className: 'sweet-orange' }

                                                            },
                                                            closeOnClickOutside: false
                                                        });


                                                    } else {
                                                        xmlhttp.open("GET", "weekly_debtor_month.php?month=" + getmonth + "&year=" + getyear, true);
                                                        xmlhttp.send();
                                                        xmlhttp.onreadystatechange = function () {
                                                            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                                                                document.getElementById("dispay_db").innerHTML = xmlhttp.responseText;;
                                                                //               window.location = "statement_time.php";

                                                            }
                                                        };

                                                    }


                                                });




















                                                var group_na = $("#group_na"); //THIS IS TO DISPLAY SELECTED CLASS   
                                                $(group_na).click(function (e) { //THIS IS TO DISPLAY SELECTED CLASS
                                                    e.preventDefault();

                                                    var group_name = document.getElementById('group_name').value;
                                                    document.getElementById('carry_group').value = document.getElementById('group_name').value;

                                                    if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
                                                        xmlhttp = new XMLHttpRequest();
                                                    }
                                                    else {// code for IE6, IE5
                                                        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                                                    }

                                                    if (group_name === "") {
                                                        swal({
                                                            title: 'Not Allowed!',
                                                            text: 'You must search for group name first',
                                                            icon: 'error',
                                                            buttons: {
                                                                confirm: { text: 'Ok', className: 'sweet-orange' }

                                                            },
                                                            closeOnClickOutside: false
                                                        });

                                                    } else {
                                                        xmlhttp.open("GET", "group_name_display_weekly.php?group=" + group_name, true);
                                                        xmlhttp.send();
                                                        xmlhttp.onreadystatechange = function () {
                                                            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                                                                var check = xmlhttp.responseText;
                                                                if (check === "Not Available") {
                                                                    swal({
                                                                        title: 'Not Allowed!',
                                                                        text: 'Wrong Group name inserted',
                                                                        icon: 'error',
                                                                        buttons: {
                                                                            confirm: { text: 'Ok', className: 'sweet-orange' }

                                                                        },
                                                                        closeOnClickOutside: false
                                                                    });

                                                                    //                       alert('Wrong Group name inserted')       
                                                                } else {
                                                                    document.getElementById("dispay_db").innerHTML = xmlhttp.responseText;;
                                                                }
                                                            }
                                                        };

                                                    }


                                                });














                                                ////////////////////SELECT TIME YEAR////////////////////////////////////////
                                                var select_year = $(".select_year"); //THIS IS TO DISPLAY SELECTED CLASS   
                                                $(select_year).click(function (e) { //THIS IS TO DISPLAY SELECTED CLASS
                                                    e.preventDefault();
                                                    //       var evaluation1 = document.getElementById('evaluation1').value;
                                                    var getyear = document.getElementById('year_a').value;
                                                    //        var carry_group = document.getElementById('carry_group').value;

                                                    if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
                                                        xmlhttp = new XMLHttpRequest();
                                                    }
                                                    else {// code for IE6, IE5
                                                        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                                                    }

                                                    if (getyear === "") {
                                                        swal({
                                                            title: 'Not Allowed!',
                                                            text: 'You must fill year to search',
                                                            icon: 'error',
                                                            buttons: {
                                                                confirm: { text: 'Ok', className: 'sweet-orange' }

                                                            },
                                                            closeOnClickOutside: false
                                                        });


                                                    } else {
                                                        xmlhttp.open("GET", "weekly_debtor_year.php?year=" + getyear, true);
                                                        xmlhttp.send();
                                                        xmlhttp.onreadystatechange = function () {
                                                            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                                                                document.getElementById("dispay_db").innerHTML = xmlhttp.responseText;;

                                                            }
                                                        };

                                                    }


                                                });













                                                var print_page = $(".print_me");
                                                $(print_page).click(function (e) { //Function LINK TO PRINT
                                                    e.preventDefault();
                                                    window.print();
                                                });
                                            });

                                        </script>













                                        <!--THIS IS TO RE-LOAD THE ENTIRE STUDENT-->
                                        <script>
                                            $(document).ready(function () {
                                                var show_all = $(".show_all"); //LINK TO GO AND VIEW ALL DEBTORS   
                                                $(show_all).click(function (e) { //Function LINK TO GO AND VIEW ALL DEBTORS button click
                                                    e.preventDefault();
                                                    window.location = "weekly_debtors.php";
                                                });
                                            });
                                        </script>



                                        <script>
                                            function goBack() {
                                                window.location = "admin_home.php";
                                            }
                                        </script>



                                        <!--AUTO-COMPLETE-->
                                        <script type='text/javascript'>
                                            $(function () {

                                                $("#autocomplete").autocomplete({
                                                    source: function (request, response) {

                                                        $.ajax({
                                                            url: "district.php",
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

                                                ////////////////////////////////////////////////////////////////////////////////////////       
                                                $(".autocomover").autocomplete({
                                                    source: function (request, response) {

                                                        $.ajax({
                                                            //                    url: "autocomplete.php",
                                                            url: "district.php",
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
                                                        $('.autocomover').val(ui.item.label); // display the selected text
                                                        ////                $('#selectuser_idd').val(ui.item.value);
                                                        $('#text1').val(ui.item.value);
                                                        ////                console.log("this.value: " + this.value);
                                                        $('#text1').trigger('change');


                                                    }


                                                });




                                                ////////////////////////////////////////////////////////////////////////////////////////       
                                                $(".class_d").autocomplete({
                                                    source: function (request, response) {
                                                        $.ajax({

                                                            url: "district.php",
                                                            type: 'post',
                                                            dataType: "json",
                                                            data: {
                                                                search: request.term
                                                            },
                                                            success: function (data) {
                                                                response(data);
                                                                //                         response(results.slice(0, 10));

                                                            }
                                                        });
                                                    },

                                                    select: function (event, ui) {
                                                        $('.class_d').val(ui.item.label); // display the selected text
                                                        $('#selectuser_idd').val(ui.item.value);
                                                        //                $('#text1').val(ui.item.value);                
                                                        //////                console.log("this.value: " + this.value);
                                                        //                $('#text1').trigger('change');
                                                        //                

                                                    }


                                                });






                                                ///////////////////////////////////////////////////////////////////////////////////////////
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

                                                        // Id
                                                        var terms = split($('#selectuser_ids').val());

                                                        terms.pop();

                                                        terms.push(ui.item.value);

                                                        terms.push("");
                                                        $('#selectuser_ids').val(terms.join(", "));

                                                        return false;
                                                    }

                                                })
                                            });

                                            function split(val) {
                                                return val.split(/,\s*/);
                                            }
                                            function extractLast(term) {
                                                return split(term).pop();
                                            }

                                        </script>



                                        <script>
                                            /////////THIS IS TO CHECK BEFORE FINAL DELETION////////
                                            $(document).ready(function () {

                                                $("#check_delete").click(function () {


                                                    var del_check = confirm("DO YOU WISH TO CONTINUE WITH DELETE?");

                                                    if (del_check === true) {
                                                        return true;
                                                    } else {
                                                        return false;
                                                    }

                                                });

                                            });
                                        </script>



                                        <script language="javascript">
                                            function Clickheretoprint() {
                                                document.getElementById("hide_total").style.display = "none";

                                                var disp_setting = "toolbar=yes,location=no,directories=yes,menubar=yes,";
                                                disp_setting += "scrollbars=yes,width=800, height=600, left=300, top=100";

                                                var content_vlue = document.getElementById("dispay_db").innerHTML;



                                                var docprint = window.open("", "", disp_setting);
                                                docprint.document.open();
                                                docprint.document.write('</head><body  style="width: 80px; font-size: 13px; font-family: arial;">');
                                                docprint.document.write(content_vlue);
                                                docprint.print();

                                                docprint.focus();
                                                docprint.close();
                                                document.getElementById("hide_total").style.display = "";
                                                docprint.close();
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
        if (size > 1000) {
            setTimeout(function () { document.getElementById("mymenu2").click(); }, 1000);
        }
    </script>


    <!-- Required Jquery -->
    <!--<script type="text/javascript" src="assets/js/jquery/jquery.min.js "></script>-->
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