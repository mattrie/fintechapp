<?php
session_start();
include 'connection.php';

if (isset($_GET['idd'])) {
    $id = $_GET['idd'];

    $query = "DELETE FROM investment WHERE id = '$id'";
    $result23 = mysqli_query($connect, $query);

    echo "<script>alert('Transaction Deleted!!!')</script>";
    //             header("location: weekly_debtors.php");
}

$names = "";$get_code = "";
if (isset($_POST['btnsrch'])) {
    
    $names = $_POST['telephone'];
    $sql_state1 = "SELECT * FROM investment WHERE name = '$names' AND remarks = 'Investment deposited' AND updatebal < 1";
    $result1 = mysqli_query($connect, $sql_state1);

    while ($row = mysqli_fetch_assoc($result1)) {
        $get_code = $row["codename"];



    }
    if ($get_code == "") {
        echo "<script type='text/javascript'> $(document).ready(function(){ 
                swal({
                         title: 'Codename Check!',
                         text: 'There is no name $names available in Investors Archive',
                         icon: 'warning',
                        buttons: {
                            confirm : {text:'Ok',className:'sweet-orange'},
                          
                        },
                        closeOnClickOutside: false
                       })
                  
                }); </script>";

    } else {
        echo "<script> location.href = 'investors_statement.php?codename=$get_code&name=$names'; </script>";
        echo "<script> location.href = 'investors_statement.php?codename=$get_code&name=$names'; </script>";
    }

}



if (isset($_POST['delete_table'])) {
    $sql_delete = "DELETE FROM investment";
    $result_delete = mysqli_query($connect, $sql_delete);
    echo "<script>You have successfully deleted Investment table info</script>";
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>INVESTORS ARCHIVE</title>
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
                                            <h5 class="m-b-10">INVESTORS ARCHIVE</h5>
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
                                        <div class="row" style="">


                                          
                                           




                                           

                                        </div>
                                        <br>
                                        <center>

                                            <form action="" method="POST" enctype="multipart/form-data">

                                                <div class="input-group">
                                                    <input type="text" class="form-control w-25" id="autocomplete"
                                                        name="telephone" placeholder="Search Investor Personal Ledger"
                                                        required="">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-warning" id="btnsearch" name="btnsrch"
                                                            type="submit" style="margin-bottom: 20px;">SEARCH</button>
                                                    </div>
                                                </div>



                                            </form>
                                        </center>


                                        <!--DISPLAY ARENA-->





                                        <div class="col" id="dispay_db1">
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




                                            <?php

                                            //loop through all table rows
                                            $inc = 1;

                                            ////////////THIS IS TO SUM PAYMENTS
//                $total_payments = mysqli_query($connect, "SELECT SUM(payments) as total FROM loan");      
//              while  ($row1 = mysqli_fetch_array($total_payments)){
//              $summation_pay = $row1['total'];                          
//              }
                                            
                                            //           balance > 1 is to avoid repetition
                                            $result = mysqli_query($connect, "SELECT * FROM investment WHERE remarks = 'Investment deposited' AND updatebal < 1 ORDER BY id DESC");

                                            echo ' <div class="card">';
                                            echo '<div class="card-block table-border-style">';

                                            echo '<div class="table-responsive" >
     <CAPTION><h3 style="font-size:24px; color:black; font-weight:bold;" align="center">INVESTORS ARCHIVE</h3></CAPTION>
   
  <table class="table table-bordered table-striped   table-hover table_id" >
      
       <thead class="thead-dark">
         <tr align="center">
         <th>S/N</th> 
          <th>Date</th>
         <th>Name</th>
         <th>Codename</th>
            <th>Payments</th>
             <th>Withdrawal</th>
         <th>Gen. Balance</th>
             <th>View Details</th>
        
          </tr>     
          </thead>

    <tbody class="" style="font-family: sans-serif; color:black ; font-weight:bold;">';
                                            //    ###########################################################################################    
                                            ////////////THIS IS TO SUM DAILY
                                            $total_invest = mysqli_query($connect, "SELECT SUM(sum_pay) as total FROM investment WHERE  updatebal < 1");
                                            while ($row = mysqli_fetch_array($total_invest)) {
                                                $summation_repay = $row['total'];
                                            }

                                            ////////////THIS IS TO SUM DAILY
                                            $total_withdraw = mysqli_query($connect, "SELECT SUM(sum_withdraw) as total FROM investment WHERE  updatebal < 1");
                                            while ($row = mysqli_fetch_array($total_withdraw)) {
                                                $summation_disburseloan = $row['total'];
                                            }

                                            $summation = $summation_repay - $summation_disburseloan;

                                            echo "<tr align = 'center'>";

                                            echo "<td></td>";
                                            echo "<td>--------</td>";
                                            echo "<td>--------</td>";
                                            echo "<td align = 'right' style='font-size: 20px;'>TOTAL: </td>";
                                            echo "<td style='color: green; font-size: 20px;'>" . number_format($summation_repay) . "</td>";
                                            echo "<td style='color: red; font-size: 20px;'>" . number_format($summation_disburseloan) . "</td>";
                                            echo "<td style='color: blue; font-size: 20px;'>" . number_format($summation) . "</td>";
                                            echo "<td>--------</td>";

                                            echo "</tr>";

                                            //    ##########################################################################################    
                                            
                                            while ($row = mysqli_fetch_array($result)) {

                                                echo "<tr align='center'>";
                                                echo "<td >" . $inc . "</td>";
                                                echo "<td>" . $row['date'] . "</td>";
                                                echo "<td >" . $row['name'] . "</td>";
                                                echo "<td >" . $row['codename'] . "</td>";
                                                echo "<td style='color: green;' >" . number_format($row['sum_pay']) . "</td>";
                                                echo "<td style='color: red;' >" . number_format($row['sum_withdraw']) . "</td>";

                                                echo "<td >" . number_format($row['updatebal']) . "</td>";
                                                echo "<td ><a style='color: brown;' href='investors_statement.php?codename=" . $row['codename'] . "&name=" . $row['name'] . "'>View details</a></td>";

                                                echo "</tr>";

                                                $inc++;
                                            }
                                            echo ' </tbody>';
                                            echo ' </table>';

                                            echo '</div>';
                                            echo '</div>';




                                            ?>
                                        </div>








                                        --



                                        <!--ON LOAD DISPLAY ALL-->
                                        <script>
                                            if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
                                                xmlhttp = new XMLHttpRequest();
                                            }
                                            else {// code for IE6, IE5
                                                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                                            }

                                            xmlhttp.open("GET", "investors_magic.php", true);
                                            xmlhttp.send();
                                            xmlhttp.onreadystatechange = function () {
                                                if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                                                    document.getElementById("dispay_db").innerHTML = xmlhttp.responseText;;
                                                }
                                            };



                                        </script>


                                        <script>
                                            /////////THIS IS TO CHECK BEFORE FINAL DELETION////////
                                            $(document).ready(function () {

                                                $("#table_delete").click(function () {
                                                    swal({
                                                        title: 'Are you sure?',
                                                        text: "You are attempting to delete entire investment table. DO YOU WISH TO CONTINUE?",
                                                        icon: 'warning',
                                                        buttons: true,
                                                        dangerMode: true
                                                    })
                                                        .then((willDelete) => {
                                                            if (willDelete) {
                                                                //                      ///Do something
                                                                document.getElementById('oya').value = 'A';
                                                                document.getElementById('table_delete').click();
                                                                return true;
                                                            } else {
                                                                swal({
                                                                    text: 'Not Deleted!',
                                                                    buttons: {
                                                                        confirm: { text: 'ok', className: 'sweet-orange' }
                                                                    }
                                                                });
                                                                return false;
                                                            }
                                                        });


                                                    var oya = document.getElementById('oya').value;
                                                    if (oya === "A") {
                                                        return true;
                                                    } else {
                                                        return false;
                                                    }




                                                });

                                            });


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

                                                        alert("Please select district");
                                                    }

                                                    else {
                                                        xmlhttp.open("GET", "savings_magic22.php?district=" + getclass, true);
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
                                            });

                                        </script>















                                        <!--THIS IS TO DISPLAY DISTRICT -->
                                        <script>
                                            $(document).ready(function () {

                                                ////////////////////SELECT TIME MONTH////////////////////////////////////////
                                                var select_time = $(".select_time"); //THIS IS TO DISPLAY SELECTED CLASS   
                                                $(select_time).click(function (e) { //THIS IS TO DISPLAY SELECTED CLASS
                                                    e.preventDefault();
                                                    var getmonth = document.getElementById('month').value;
                                                    var getyear = document.getElementById('year').value;

                                                    if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
                                                        xmlhttp = new XMLHttpRequest();
                                                    }
                                                    else {// code for IE6, IE5
                                                        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                                                    }

                                                    if (getmonth === "" || getyear === "") {
                                                        swal({
                                                            title: 'Not Allowed!',
                                                            text: 'You must fill month and year to search',
                                                            icon: 'error',
                                                            buttons: {
                                                                confirm: { text: 'Ok', className: 'sweet-orange' }

                                                            },
                                                            closeOnClickOutside: false
                                                        });

                                                    } else {
                                                        xmlhttp.open("GET", "investors_month.php?month=" + getmonth + "&year=" + getyear, true);
                                                        xmlhttp.send();
                                                        xmlhttp.onreadystatechange = function () {
                                                            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                                                                document.getElementById("dispay_db").innerHTML = xmlhttp.responseText;;
                                                                //               window.location = "statement_time.php";

                                                            }
                                                        };

                                                    }


                                                });







                                                ////////////////////SELECT TIME YEAR////////////////////////////////////////
                                                var select_year = $(".select_year"); //THIS IS TO DISPLAY SELECTED CLASS   
                                                $(select_year).click(function (e) { //THIS IS TO DISPLAY SELECTED CLASS
                                                    e.preventDefault();

                                                    var getyear = document.getElementById('year_a').value;

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
                                                        xmlhttp.open("GET", "investors_year.php?year=" + getyear, true);
                                                        xmlhttp.send();
                                                        xmlhttp.onreadystatechange = function () {
                                                            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
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
                                                    window.location = "investors.php";
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


                                                $("#codename").autocomplete({
                                                    source: function (request, response) {

                                                        $.ajax({
                                                            url: "codename_investor.php",
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


    <script>


        window.onload = function () {
            document.getElementById('magic-collapse').click();

        };
    </script>





</body>

</html>