<?php
session_start();
include 'connection.php';
// Enable error reporting

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Weekly_Expectation</title>
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
                                                <h5 class="m-b-10">Weekly_Expectation</h5>
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
                                            <center>
                                                <br>
                                                <!--THIS IS TO SEARCH GROUP NAME-->
                                                <form action="weekly_expectation.php" method="POST" enctype="multipart/form-data" style="margin-bottom: 20px; margin-top: 30px;" >
                                                    <input type="text"  id="group_name" name="group_name" style="margin-left: 50px; width: 350px;" placeholder="Search Group weekly Expectation" required=""  >
                                                    <button  class="btn btn-success"  name="group_submit" >SEARCH</button>  

                                                    <a href="weekly_expectation.php" style="border-radius: 8px; padding:8px; font-style:italic ; font-size: 18px; background-color:green; color: whitesmoke; cursor: pointer; margin-left: 60px;">VIEW TODAY</a>

                                                </form>
                                                <br><br>
                                                <form action="weekly_expectation.php" method="POST" enctype="multipart/form-data">
                                                    <div class="input-group">
                                                        <select name="filter_day" class="form-control" required="">
                                                            <option value=""  hidden="" selected="" disabled="">Select Day</option>
                                                            <option value="Monday">Monday</option>
                                                            <option value="Tuesday">Tuesday</option>
                                                            <option value="Wednesday">Wednesday</option>
                                                            <option value="Thursday">Thursday</option>
                                                            <option value="Firday">Friday</option>
                                                        </select>
                                                        <div class="input-group-append">
                                                            <input type="submit" value="Filter Day" class="btn btn-primary" name="filter"/>
                                                        </div>
                                                    </div>  
                                                </form>    
                                            </center>

                                            <?php
                                            date_default_timezone_set("Africa/Lagos");
                                            $day = date('l');
//                                            echo "<h2>$day</h2>";
                                            $date = date('jS F Y');
                                            //loop through all table rows
                                            $inc = 1;
                                            $catB = 0;
                                            if (isset($_POST['group_submit'])) {

                                                $group_name = $_POST['group_name'];

                                                $result_convert_day = mysqli_query($connect, "SELECT * FROM weekly_allloan WHERE (disburseloan > 1 OR disburseloan < -1) AND NOT remarks = 'Penalty' AND NOT reversepen = 'penalty reverse' AND  (reverse_alert = '' OR reverse_alert IS NULL) AND dob = '$group_name' ORDER BY id DESC");

                                                echo ' <div class="card card-block table-border-style">';
                                                echo '<div class="table-responsive">';
                                                echo '<CAPTION><h3 align="center" style="font-size:28px; color:black;">WEEKLY EXPECTATION FOR: [' . $group_name . ']  ' . $day . ' [' . $date . ']</h3></CAPTION>';
                                                echo '<table class="table table-bordered table-striped " align="center">';

                                                echo ' <thead class="thead-dark">';

                                                echo '<tr align = "center">';
                                                echo '<th>S/N</th>';
                                                echo '<th>Name</th>';
                                                echo '<th>Codename</th>';
                                                echo '<th>Collected</th>';
                                                echo '<th>To Balance</th>';
                                                echo '<th>Expected Today</th>';


                                                echo '<th>View Details</th>';
                                                echo '</tr>';

                                                echo '</thead>';

                                                echo '<tbody class="" style="font-family: sans-serif; color:black ; font-weight:bold;">';


                                                while ($row = mysqli_fetch_assoc($result_convert_day)) {
                                                    $name = $row['name'];
                                                    $hidden_day = $row['date'];
                                                    $get_day = date('l', strtotime($hidden_day));
                                                    $real_codename = $row['codename'];
                                                    $disburseloan = $row['disburseloan'];
                                                    $no_weeks = $row['weeks'];

                                                    @$dailyp = $disburseloan / $no_weeks;

                                                    $dailypayment = ceil($dailyp);



                                                    //            -------------------------------------------------------------               
                                                    ///////THIS IS TO GET THE INDIVIDUAL BALANCE
                                                    ////////////THIS IS TO SUM LOAN
                                                    $code_loan = mysqli_query($connect, "SELECT SUM(disburseloan) as total FROM weekly_allloan WHERE codename = '$real_codename'");
                                                    while ($row = mysqli_fetch_assoc($code_loan)) {
                                                        $summation_loan2 = $row['total'];
//                           $plus_interest = $row['interest'];  
                                                    }

//                           $summation_loan2 =  $summation_loan3 + $plus_interest;
                                                    ////////////THIS IS TO SUM PAYMENTS
                                                    $total_payments2 = mysqli_query($connect, "SELECT SUM(repay) as total FROM weekly_allloan WHERE codename='$real_codename'");
                                                    while ($row1 = mysqli_fetch_array($total_payments2)) {
                                                        $summation_pay2 = $row1['total'];
                                                    }

                                                    $balance1 = $summation_loan2 - $summation_pay2;
//            -------------------------------------------------------------   

                                                    if ($balance1 > 1 && $get_day == $day) {
                                                        echo "<tr align = 'center'>";
                                                        echo "<td>" . $inc . "</td>";
                                                        echo "<td>" . $name . "</td>";
                                                        echo "<td>" . $real_codename . "</td>";
                                                        echo "<td>" . number_format($disburseloan) . "</td>";
                                                        echo "<td>" . number_format($balance1) . "</td>";
                                                        echo "<td>" . number_format($dailypayment) . "</td>";
                                                        $catB += $dailypayment;
                                                        echo "<td ><a style='color:brown;' href='weekly_loan_statement.php?codename=" . $real_codename . "&name=" . $name . "'>View details</a></td>";

                                                        echo "</tr>";
                                                        $inc++;
                                                    }
                                                }

                                                ////////////THIS IS TO SUM amtexpect
                                                $total_amtexpect = mysqli_query($connect, "SELECT SUM(amtexpect) as total FROM members WHERE weeklyindbal > 1 AND diw = '$day'");
                                                while ($row = mysqli_fetch_array($total_amtexpect)) {
                                                    $summation_amtexpect = $row['total'];
                                                }



                                                echo "<tr align = 'center'>";
                                                echo "<td>--------</td>";
                                                echo "<td>--------</td>";
                                                echo "<td>--------</td>";
                                                echo "<td>--------</td>";
                                                echo "<td align = 'right'>TOTAL: </td>";
                                                echo "<td style='color: green; font-size: 22px;'>" . number_format($catB) . "</td>";
                                                echo "<td>--------</td>";

                                                echo "</tr>";


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
                                            } else  if(isset($_POST['filter'])){
                                                $filter_day = $_POST['filter_day'];



                                                //DISPLAY ALL EXPECTATION FOR THE DAY
                                                $result_convert_day = mysqli_query($connect, "SELECT * FROM weekly_allloan WHERE (disburseloan > 1 OR disburseloan < -1) AND NOT remarks = 'Penalty' AND NOT reversepen = 'penalty reverse' AND  (reverse_alert = '' OR reverse_alert IS NULL)  ORDER BY id DESC");






                                                echo ' <div class="card card-block table-border-style">';
                                                echo '<div class="table-responsive">';
                                                echo '<CAPTION><h3 align="center" style="font-size:28px; color:black;">WEEKLY EXPECTATION FOR: ' . $filter_day . ' </h3></CAPTION>';
                                                echo '<table class="table table-bordered table-striped " align="center">';

                                                echo ' <thead class="thead-dark">';

                                                echo '<tr align = "center">';
                                                echo '<th>S/N</th>';
                                                echo '<th>Name</th>';
                                                echo '<th>Codename</th>';
                                                echo '<th>Collected</th>';
                                                echo '<th>To Balance</th>';
                                                echo '<th>Expected Today</th>';


                                                echo '<th>View Details</th>';
                                                echo '</tr>';

                                                echo '</thead>';

                                                echo '<tbody class="" style="font-family: sans-serif; color:black ; font-weight:bold;">';




                                                while ($row = mysqli_fetch_assoc($result_convert_day)) {
                                                    $name = $row['name'];
                                                    $hidden_day = $row['date'];
                                                    $get_day = date('l', strtotime($hidden_day));
                                                    $real_codename = $row['codename'];
                                                    $disburseloan = $row['disburseloan'];
                                                    $no_weeks = $row['weeks'];

                                                    @$dailyp = $disburseloan / $no_weeks;

                                                    $dailypayment = ceil($dailyp);







                                                    //            -------------------------------------------------------------               
                                                    ///////THIS IS TO GET THE INDIVIDUAL BALANCE
                                                    ////////////THIS IS TO SUM LOAN
                                                    $code_loan = mysqli_query($connect, "SELECT SUM(disburseloan) as total FROM weekly_allloan WHERE codename = '$real_codename'");
                                                    while ($row = mysqli_fetch_assoc($code_loan)) {
                                                        $summation_loan2 = $row['total'];
//                           $plus_interest = $row['interest'];  
                                                    }

//                           $summation_loan2 =  $summation_loan3 + $plus_interest;
                                                    ////////////THIS IS TO SUM PAYMENTS
                                                    $total_payments2 = mysqli_query($connect, "SELECT SUM(repay) as total FROM weekly_allloan WHERE codename='$real_codename'");
                                                    while ($row1 = mysqli_fetch_array($total_payments2)) {
                                                        $summation_pay2 = $row1['total'];
                                                    }

                                                    $balance1 = $summation_loan2 - $summation_pay2;
//            -------------------------------------------------------------   

                                                    if ($balance1 > 1 && $get_day == $filter_day) {

                                                        echo "<tr align = 'center'>";
                                                        echo "<td>" . $inc . "</td>";
                                                        echo "<td>" . $name . "</td>";
                                                        echo "<td>" . $real_codename . "</td>";
                                                        echo "<td>" . number_format($disburseloan) . "</td>";
                                                        echo "<td>" . number_format($balance1) . "</td>";
                                                        echo "<td>" . number_format($dailypayment) . "</td>";
                                                        $catB += $dailypayment;
                                                        echo "<td ><a style='color:brown;' href='weekly_loan_statement.php?codename=" . $real_codename . "&name=" . $name . "'>View details</a></td>";

                                                        echo "</tr>";
                                                        $inc++;
                                                    }
                                                }

                                                ////////////THIS IS TO SUM amtexpect
                                                $total_amtexpect = mysqli_query($connect, "SELECT SUM(amtexpect) as total FROM members WHERE weeklyindbal > 1 AND diw = '$day'");
                                                while ($row = mysqli_fetch_array($total_amtexpect)) {
                                                    $summation_amtexpect = $row['total'];
                                                }



                                                echo "<tr align = 'center'>";
                                                echo "<td>--------</td>";
                                                echo "<td>--------</td>";
                                                echo "<td>--------</td>";
                                                echo "<td>--------</td>";
                                                echo "<td align = 'right'>TOTAL: </td>";
                                                echo "<td style='color: green; font-size: 22px;'>" . number_format($catB) . "</td>";
                                                echo "<td>--------</td>";

                                                echo "</tr>";


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
                                            } else  {




                                                //DISPLAY ALL EXPECTATION FOR THE DAY
                                                $result_convert_day = mysqli_query($connect, "SELECT * FROM weekly_allloan WHERE remarks= 'loan disbursement' AND NOT remarks = 'Penalty' AND NOT reversepen = 'penalty reverse' AND  (reverse_alert = '' OR reverse_alert IS NULL)  ORDER BY id DESC");






                                                echo ' <div class="card card-block table-border-style">';
                                                echo '<div class="table-responsive">';
                                                echo '<CAPTION><h3 align="center" style="font-size:28px; color:black;">WEEKLY EXPECTATION FOR: ' . $day . ' [' . $date . ']</h3></CAPTION>';
                                                echo '<table class="table table-bordered table-striped " align="center">';

                                                echo ' <thead class="thead-dark">';

                                                echo '<tr align = "center">';
                                                echo '<th>S/N</th>';
                                                echo '<th>Name</th>';
                                                echo '<th>Codename</th>';
                                                echo '<th>Collected</th>';
                                                echo '<th>To Balance</th>';
                                                echo '<th>Expected Today</th>';


                                                echo '<th>View Details</th>';
                                                echo '</tr>';

                                                echo '</thead>';

                                                echo '<tbody class="" style="font-family: sans-serif; color:black ; font-weight:bold;">';




                                                while ($row = mysqli_fetch_assoc($result_convert_day)) {
                                                    $name = $row['name'];
                                                    $hidden_day = $row['date'];
                                                    $get_day = date('l', strtotime($hidden_day));
                                                    $real_codename = $row['codename'];
                                                    $disburseloan = $row['disburseloan'];
                                                    $no_weeks = $row['weeks'];

                                                    if($no_weeks > 1){
                                                        $dailyp = $disburseloan / $no_weeks;
                                                    } else {
                                                        $dailyp = $disburseloan;
                                                    }
                                                   

                                                    $dailypayment = ceil($dailyp);







                                                    //            -------------------------------------------------------------               
                                                    ///////THIS IS TO GET THE INDIVIDUAL BALANCE
                                                    ////////////THIS IS TO SUM LOAN
                                                    $code_loan = mysqli_query($connect, "SELECT SUM(disburseloan) as total FROM weekly_allloan WHERE codename = '$real_codename'");
                                                    while ($row = mysqli_fetch_assoc($code_loan)) {
                                                        $summation_loan2 = $row['total'];
//                           $plus_interest = $row['interest'];  
                                                    }

//                           $summation_loan2 =  $summation_loan3 + $plus_interest;
                                                    ////////////THIS IS TO SUM PAYMENTS
                                                    $total_payments2 = mysqli_query($connect, "SELECT SUM(repay) as total FROM weekly_allloan WHERE codename='$real_codename'");
                                                    while ($row1 = mysqli_fetch_array($total_payments2)) {
                                                        $summation_pay2 = $row1['total'];
                                                    }

                                                    $balance1 = $summation_loan2 - $summation_pay2;
//            -------------------------------------------------------------   

                                                    if ($balance1 > 1 && $get_day == $day) {

                                                        echo "<tr align = 'center'>";
                                                        echo "<td>" . $inc . "</td>";
                                                        echo "<td>" . $name . "</td>";
                                                        echo "<td>" . $real_codename . "</td>";
                                                        echo "<td>" . number_format($disburseloan) . "</td>";
                                                        echo "<td>" . number_format($balance1) . "</td>";
                                                        echo "<td>" . number_format($dailypayment) . "</td>";
                                                        $catB += $dailypayment;
                                                        echo "<td ><a style='color:brown;' href='weekly_loan_statement.php?codename=" . $real_codename . "&name=" . $name . "'>View details</a></td>";

                                                        echo "</tr>";
                                                        $inc++;
                                                    }
                                                }

                                                ////////////THIS IS TO SUM amtexpect
                                                $total_amtexpect = mysqli_query($connect, "SELECT SUM(amtexpect) as total FROM members WHERE weeklyindbal > 1 AND diw = '$day'");
                                                while ($row = mysqli_fetch_array($total_amtexpect)) {
                                                    $summation_amtexpect = $row['total'];
                                                }



                                                echo "<tr align = 'center'>";
                                                echo "<td>--------</td>";
                                                echo "<td>--------</td>";
                                                echo "<td>--------</td>";
                                                echo "<td>--------</td>";
                                                echo "<td align = 'right'>TOTAL: </td>";
                                                echo "<td style='color: green; font-size: 22px;'>" . number_format($catB) . "</td>";
                                                echo "<td>--------</td>";

                                                echo "</tr>";




                                                echo ' </tbody>';
                                                echo ' </table>';

                                                echo '</div>';
                                                echo '</div>';
                                            }
                                            ?>


                                        </div>

                                        <div id="styleSelector"> </div>
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
                    setTimeout(function () {
                        document.getElementById("mymenu2").click();
                    }, 1000);
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

    </body>
</html>
