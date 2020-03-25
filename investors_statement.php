<?php
session_start();
include 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Statement</title>
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
                                                <h5 class="m-b-10">Statement</h5>
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
                                            <?php
                                            //loop through all table rows

                                            $name = $codename = $type = "";

                                            @$type = "";


                                            if (isset($_GET['inv_date'])) {
                                                $today2 = $_GET['date_charge'];
                                                @$name = $_GET['name'];
                                                @$codename = $_GET['codename'];
                                            } else {
                                                @$name = $_GET['name'];
                                                @$codename = $_GET['codename'];
                                            }

                                            if (isset($_SESSION['redirect_message_investor'])) {
                                                echo $_SESSION['redirect_message_investor'];
                                                $_SESSION['redirect_message_investor'] = "";
                                            }
                                            echo '';
                                            $_SESSION['pen_name'] = $name;
                                            $_SESSION['pen_codename'] = $codename;
                                            $_SESSION['pen_type'] = $type;
                                            $inc = 1;

                                            ////SELECT NAME FROM DATABASE TO LOAD PASSPORT TEL & ADDRESS
                                            $debtor_info = mysqli_query($connect, "SELECT * FROM members WHERE namee = '$name'");
                                            while ($row_info = mysqli_fetch_assoc($debtor_info)) {
                                                $address = $row_info['addresss'];
                                                $tel = $row_info['telephone'];
                                                $image = $row_info['imagess'];
                                                $regnum = $row_info['registration_num'];
                                            }


                                            echo '<div class="row">';

                                            echo '<div class="col-sm-3" >';
                                            echo "<p style='font-size:18px; color:black; margin-bottom:30px;'>";
                                            echo "<label>Name: " . $name . "</label><br>";
                                            echo "<label>Tel: " . $tel . "</label><br>";
                                            echo "<label>Address: " . $address . "</label><br>";



                                            echo "<p>";
                                            /////CREATE HIDDEN INPUT TEXTBOX TO CARRY VALUES TO JAVASCRIPT 
//        PLEASE NOTE THAT YOU HAVE TO USE SOME "\" TO AVOID BRAKE SPACE IN NAMES
                                            echo "<input type='hidden' value=\"" . $name . "\" id = 'name'/>";
                                            echo '<input type="hidden" value=\'' . $codename . '\' id = "codename"/>';
                                            echo '<input type="hidden" value=\'' . $type . '\' id="type"/>';

                                            echo "</div>";


                                            $lastpaid = "";
                                            $sql_state2 = "SELECT * FROM investment WHERE codename = '$codename' AND (remarks = 'Monthly Interest' OR remarks = 'Investment deposited')";
                                            $result22 = mysqli_query($connect, $sql_state2);
                                            while ($row = mysqli_fetch_array($result22)) {

                                                $lastpaid = $row['lastpaid'];
                                            }



                                            $sql_interestrate = "SELECT * FROM investment WHERE codename = '$codename' AND interestrate > 1";
                                            $result_interestrate = mysqli_query($connect, $sql_interestrate);
                                            while ($row = mysqli_fetch_array($result_interestrate)) {
                                                $interestrate = $row['interestrate'];
                                            }


//                 $lastpaid2 = "";
//            $sql_state22 = "SELECT * FROM investment WHERE codename = '$codename' AND (remarks = 'Monthly Interest' OR remarks = 'Investment deposited (A)')";
//            $result222 = mysqli_query($connect, $sql_state22);
//               while ($row=mysqli_fetch_array($result222)){
//                 
//                    $lastpaid2 = $row['lastpaid'];
//               }
//               
//             $sql_interestrate2 = "SELECT * FROM investment WHERE codename = '$codename' AND interestrate > 1";
//            $result_interestrate2 = mysqli_query($connect, $sql_interestrate2);
//               while ($row=mysqli_fetch_array($result_interestrate2)){
//                      $interestrate2 = $row['interestrate'];
//              
//                  }  
                                            //////////////////////////////////----------------------------------////////////////////         
                                            //  **********************FPRO *********************************************************************************                
                                            ///////THIS IS TO GET THE INDIVIDUAL SAVINGS BALANCE
                                            ///////////////THIS IS TO SUM ALL SAVINGS
                                            $sum_savings = mysqli_query($connect, "SELECT SUM(pay) as total FROM investment WHERE codename = '$codename' ");
                                            while ($row = mysqli_fetch_assoc($sum_savings)) {
                                                $summation_savings = $row['total'];
//               $plus_interest = $row['interest'];  
                                            }


                                            ////////////THIS IS TO SUM ALLWITHDRAWALS
                                            $sum_withdraw = mysqli_query($connect, "SELECT SUM(withdraw) as total FROM investment WHERE codename = '$codename'");
                                            while ($row1 = mysqli_fetch_assoc($sum_withdraw)) {
                                                $summation_withdraw = $row1['total'];
                                            }

                                            $savings_balance = $summation_savings - $summation_withdraw;


                                            //  *******************************************************************************************************                
                                            //            LETS GET THE INTEREST ON AVAILABLE BALANCE   
                                            $investment_interest_amt = ($interestrate / 100) * $savings_balance;



//          LETS GET THE LAST INTEREST PAYMENT TO AUTOMATE     
                                            $dated_lastpaid = strtotime("$lastpaid");
                                            $gap = time() - $dated_lastpaid;
                                            $days_gap = floor($gap / 86400);
                                            if ($savings_balance < 1 || !isset($_GET['inv_date'])) {
                                                $days_gap = 5;
                                            }
                                            if ($days_gap > 27) {




                                                /////////////TO GET THE DATE ON START POINT
//                  $get_jSday_only = date("jS", strtotime($lastpaid));
                                                $jSdate = date("jS F Y", strtotime($today2));

//                  $jSdate = $get_jSday_only." ".$jSdate1; //Final Concatination

                                                $month = date("F");
                                                $year = date("Y");
                                                $sql_set_invest = "INSERT INTO investment (name, codename, remarks, monthinterset, lastpaid, date, month, year, district) VALUES('$name', '$codename', 'Monthly Interest', '$investment_interest_amt', '$today2', '$jSdate', '$month', '$year', '$regnum')";
                                                mysqli_query($connect, $sql_set_invest);
//    -------------------------------DO SOME UPDATE HERE--------------------------------------- 
                                                /////////SUM INDIVIDUAL REPAY & DISBURSE BALALNCE
                                                ////////////THIS IS TO SUM PAYMENTS
                                                $total_payments11 = mysqli_query($connect, "SELECT SUM(pay) as total FROM investment WHERE codename = '$codename'");
                                                while ($row1 = mysqli_fetch_array($total_payments11)) {
                                                    $summation_pay_ind = $row1['total'];
                                                }


                                                ////////////THIS IS TO SUM DISBURSE
                                                $total_disburse22 = mysqli_query($connect, "SELECT SUM(withdraw) as total FROM investment WHERE codename = '$codename'");
                                                while ($row2 = mysqli_fetch_array($total_disburse22)) {
                                                    $summation_disburse_ind = $row2['total'];
                                                }
                                                $ind_balance = $summation_pay_ind - $summation_disburse_ind;



//               LETS GET THE INTEREST BALANCE   
                                                ////////////THIS IS monthinterset
                                                $total_monthinterset = mysqli_query($connect, "SELECT SUM(monthinterset) as total FROM investment WHERE codename = '$codename' AND name = '$name'");
                                                while ($row1 = mysqli_fetch_array($total_monthinterset)) {
                                                    $summation_monthinterset = $row1['total'];
                                                }


                                                ////////////THIS IS TO interestpaid
                                                $total_interestpaid = mysqli_query($connect, "SELECT SUM(interestpaid) as total FROM investment WHERE codename = '$codename' AND name = '$name'");
                                                while ($row2 = mysqli_fetch_array($total_interestpaid)) {
                                                    $summation_interestpaid = $row2['total'];
                                                }
                                                $interest_balance = $summation_monthinterset - $summation_interestpaid;








                                                //GET LAST ID  
                                                $get_last_id = mysqli_query($connect, "SELECT * FROM investment");
                                                while ($row = mysqli_fetch_assoc($get_last_id)) {
                                                    $id = $row['id'];
                                                }






                                                /////////SUM GENERAL REPAY & DISBURSE SO YOU CAN GET GEN BALALNCE
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

                                                $update_special = mysqli_query($connect, "UPDATE investment SET updatebal = '$ind_balance', updatedate = '$today2' WHERE codename = '$codename' AND remarks = 'Investment deposited' AND pay > 1");

                                                $result2 = mysqli_query($connect, "UPDATE investment SET genbalinvest = '$gen_balance',  indbalinvest = '$ind_balance', cumminterest = '$interest_balance' WHERE id = '$id'");


                                                if ($result2 == true) {
//                     $output_new_closedate = date('d-M-Y', strtotime($new_closedate));         
                                                    echo "<script>alert('Notification: $name monthly interest of " . number_format($investment_interest_amt) . " Naira is set.')</script>";
                                                }
                                            }
//    --------------------------------------------------------------------------------------------       
//            $_SESSION['av_bal']= $available_blance;FOR AJAX
                                            echo '<input type="hidden" value=' . $savings_balance . ' id="av_bal"/>';
                                            echo '<div class="col-sm-3">';
                                            echo "<label style='font-size: 18px; font-weight: bold;'>Investment Balance:<br> N " . number_format($savings_balance) . " @$interestrate% monthly</label>";
                                            echo "<label style='font-size: 18px; font-weight: bold;'>Interest on Investment:<br> N " . number_format($investment_interest_amt) . " per month</label>";

                                            echo "</div>";


                                            echo '<div class="col-sm-3" style="margin-top: 40px;">';
                                             echo "<a class='btn btn-warning' data-toggle='modal' data-target='#myModal$codename' style='color: black;' href='##'>Interest Paid</a>&nbsp;";

                                            echo "<a class='btn' style='color: whitesmoke; background-color: green;' href='investors_int_pay.php?codename=" . $codename . " &name=" . $name . "'>Pay Interest</a>&nbsp;";
                                            echo "<button onclick='edit_rate()' class='btn btn-danger'>Edit Rate</button>";

                                            echo "</div>";

                                            echo '<div class="col-sm-3">';
                                            echo '<div  style="margin-left: 40px; width:140px; height:140px;">
            <img id="img" src="' . $image . '" alt="THIS IS LOADS PHOTO"  style="border: 4px #99ff99 solid; width:140px; height:140px;" >
              </div>';
                                            echo "</div>";
                                            echo "</div>";


                                            $sql_state = "SELECT * FROM investment WHERE codename = '$codename'";
                                            $result = mysqli_query($connect, $sql_state);


                                            echo ' <div class="">';
                                            echo '<div class="card-block table-border-style">';
                                            echo '<div class="table-responsive-sm" >';
                                            echo '<CAPTION><h3 align="center" style="font-size:20px; color: black;"> ' . $name . ' codename(' . $codename . ') INVESTMENT.</h3></CAPTION>';
                                            echo '<table class="table  table-striped table-sm table-hover " >';

                                            echo '<thead class="thead-dark">';
                                            echo '<tr align = "center">';
                                            echo '<th>S/N</th>';
                                            echo '<th>Date</th>';
                                            echo '<th>Description</th>';
                                            echo '<th>Investment</th>';
                                            echo '<th>Withdrawal</th>';
                                            echo '<th>Investment Balance</th>';
                                            echo '<th>Interest on Investment (Auto)</th>';
                                            echo '<th>Interest Paid</th>';
                                            echo '<th>Interest Balance</th>';

                                            echo '</tr>';
                                            echo '</thead>';

                                            echo '<tbody class="text-nowrap" style="font-family: sans-serif; color:black ; font-weight:bold;">';
                                            while ($row = mysqli_fetch_array($result)) {

                                                echo "<tr align = 'center'>";
                                                echo "<td>" . $inc . "</td>";
                                                echo "<td>" . $row['date'] . "</td>";
                                                echo "<td>" . $row['remarks'] . "</td>";
                                                echo "<td style='color: green;' >" . number_format($row['pay']) . "</td>";
                                                echo "<td style='color: red;' >" . number_format($row['withdraw']) . "</td>";

                                                echo "<td >" . number_format($row['indbalinvest']) . "</td>";
                                                echo "<td >" . number_format($row['monthinterset']) . "</td>";
                                                echo "<td >" . number_format($row['interestpaid']) . "</td>";
                                                echo "<td >" . number_format($row['cumminterest']) . "</td>";
                                                echo "</tr>";
                                                $inc++;
                                            }


                                            echo ' </tbody>';
                                            echo ' </table>';
                                            echo '</div>';
                                            echo '</div>';


                                            if (isset($_POST['pen'])) {
                                                
                                            }
                                            ?>

                                            
                                            
                                            
                                            
                                            
                                            <!-- The Modal -->
                                            <div class="modal" id="myModal<?php echo $codename; ?>">
                                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                                    <div class="modal-content">

                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Intrest Paid</h4>
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>

                                                        <!-- Modal body -->
                                                        <div class="modal-body">

                                                            <input type="hidden" name="codename" value=" <?php echo $codename; ?>  "/>     
                                                            <br>

                                                            Start Date: <input type="date" class="form-control" name="start" id="start"/>
                                                            <br> 
                                                            End Date: <input type="date" class="form-control"name="end" id="end"/>     
                                                            <br><br>
                                                            <input type="submit" value="SHOW" id="date_sorting"   class="btn btn-dark"/>    
                                                            &nbsp;  <b id="display" style="font-size: 18px; font-weight: bolder"></b>

                                                        </div>

                                                        <!-- Modal footer -->
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>                                 



                                            <script>
                                                $(document).ready(function () {
                                                    var select_year = $("#date_sorting");
                                                    $(select_year).click(function (e) {
                                                        e.preventDefault();
                                                        var start = document.getElementById('start').value;
                                                        var end = document.getElementById('end').value;
                                                        var codename = document.getElementById('codename').value;

                                                        if (window.XMLHttpRequest)
                                                        {// code for IE7+, Firefox, Chrome, Opera, Safari
                                                            xmlhttp = new XMLHttpRequest();
                                                        } else
                                                        {// code for IE6, IE5
                                                            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                                                        }

                                                        if (start === "" || end === "") {
                                                            swal({
                                                                title: 'Not Allowed!',
                                                                text: 'You must fill Start and End date to show Intrest Paid',
                                                                icon: 'error',
                                                                buttons: {
                                                                    confirm: {text: 'ok', className: 'sweet-orange'}

                                                                },
                                                                closeOnClickOutside: false
                                                            });
                                                        } else {

                                                            xmlhttp.open("GET", "get_intrest_paid.php?start=" + start + "&end=" + end + "&codename=" + codename, true);
                                                            xmlhttp.send();
                                                            xmlhttp.onreadystatechange = function () {
                                                                if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                                                                    document.getElementById("display").innerHTML = xmlhttp.responseText;
                                                                    ;

                                                                }
                                                            };

                                                        }


                                                    });



                                                });

                                            </script>


                                           <script>

                                                function edit_rate(){
                                                var name = document.getElementById('name').value;
                                                var codename = document.getElementById('codename').value;
                                                swal("Insert Edit rate:", {
                                                content: "input"

                                                }).then((value) => {
                                                if (isNaN(value) || value === "") {
                                                swal({
                                                title: 'Access Denied!',
                                                        text: 'Please fill a valid number to edit rate',
                                                        icon: 'error',
                                                        buttons: {
                                                        confirm : {text:'ok', className:'sweet-orange'}

                                                        },
                                                        closeOnClickOutside: false
                                                });
                                                return false;
                                                }

                                                if (window.XMLHttpRequest)
                                                {// code for IE7+, Firefox, Chrome, Opera, Safari
                                                xmlhttp = new XMLHttpRequest();
                                                }
                                                else
                                                {// code for IE6, IE5
                                                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                                                }

                                                xmlhttp.open("GET", "edit_rate_investor.php?get_value=" + value + "&name=" + name + "&codename=" + codename, true);
                                                xmlhttp.send();
                                                xmlhttp.onreadystatechange = function(){
                                                if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                                                ////                 document.getElementById("dispay").innerHTML = xmlhttp.responseText;;
                                                var test = xmlhttp.responseText;
                                                if (test === "yes"){
                                                swal({
                                                title: 'Success!',
                                                        text: 'Rate Edited. Click ok to refresh page',
                                                        icon: 'success',
                                                        buttons: {
                                                        confirm : {text:'ok', className:'sweet-orange'}

                                                        },
                                                        closeOnClickOutside: false
                                                         
                                                })
                                                 .then(function() {
                                                        window.location = "investors_statement.php?name=" + name + "&codename=" + codename;
                                                      });
                                                } else {
                                                swal({
                                                title: 'Check Code!',
                                                        text: 'A slight error occured, please check code',
                                                        icon: 'error',
                                                        buttons: {
                                                        confirm : {text:'ok', className:'sweet-orange'}

                                                        },
                                                        closeOnClickOutside: false
                                                });
                                                //                                 window.location = 'staff_loan.php';
                                                }
                                                }
                                                };
                                                });
                                                };
                                            </script>   



                                            <script>
                                                $(document).ready(function () {
                                                    var pena_java = $(".pena_java"); //LINK TO GO AND VIEW ALL DEBTORS   
                                                    $(pena_java).click(function (e) {
                                                        e.preventDefault();


                                                        var perc_java = document.getElementById("perc_java").value;
                                                        var name = document.getElementById("name").value;
                                                        var codename = document.getElementById("codename").value;
                                                        var type = document.getElementById("type").value;
                                                        var district = document.getElementById("district").value;
                                                        var av_bal = document.getElementById("av_bal").value;



                                                        if (window.XMLHttpRequest)
                                                        {// code for IE7+, Firefox, Chrome, Opera, Safari
                                                            xmlhttp = new XMLHttpRequest();
                                                        } else
                                                        {// code for IE6, IE5
                                                            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                                                        }


                                                        if (perc_java !== "") {
                                                            xmlhttp.open("GET", "penalty_calculate.php?perc_java=" + perc_java + "&name=" + name + "&codename=" + codename + "&type=" + type + "&district=" + district + "&av_bal=" + av_bal, true);
                                                            xmlhttp.send();
                                                            xmlhttp.onreadystatechange = function () {
                                                                if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {

                                                                    alert(xmlhttp.responseText);
                                                                    location.reload();
                                                                }
                                                            };

                                                        } else {
                                                            alert("Please fill percentage penalty");
                                                        }
                                                    });
                                                });

                                            </script>


                                            <script>
                                                function goBack() {
                                                    window.location = "investors.php";
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
                setTimeout(function () {
                    document.getElementById("mymenu2").click(); }, 1000);
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
