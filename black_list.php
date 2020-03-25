<?php
session_start();

include 'connection.php';
$random_pin = rand(10, 10000);




 
?>



<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Black List</title>
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
                                                <h5 class="m-b-10">Black List</h5>
                                                <p class="m-b-0">Black Listed Customers</p>
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
                                                    <form name="srch" action="black_list.php" method="POST" enctype="multipart/form-data">

                                                        <center>
                                                            <div class="input-group mb-3">
                                                                <input type="text" class="form-control" id="autocomplete" name="srch" placeholder="Search Black Listed Customer To View" required=""  >
                                                                <div class="input-group-append">
                                                                    <button class="btn btn-warning" id="btnsearch" name="btnsrch" type="submit">SEARCH</button>  
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



                        echo "<td ><a style='color:brown;' href='black_list.php?get_name=" . $row['namee'] . "'>View Debt</a></td>";


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
                        include 'show_debt_ledger.php';
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
                                            <script type='text/javascript' >
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


            <script type='text/javascript' >
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
            <script type='text/javascript' >
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
