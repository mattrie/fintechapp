<?php
session_start();
    include 'connection.php';
   
       
       
            if(isset($_POST['btnsrch'])){
                $names = "";
               $get_code = $_POST['name']; 
                $sql_state1 = "SELECT * FROM allloan WHERE  disburseloan > 1 AND remarks = 'loan disbursement' AND name = '$get_code'";
            $result1 = mysqli_query($connect, $sql_state1);
      
            while ($row = mysqli_fetch_assoc($result1)) {  
                $names = $row["name"];
              $closingdate = $row["enddate"];
              $loan_type = $row["type"];
              $disburseloan = $row["indbalance"];
              $check_codename = $row["codename"];
              $interest = $row["interest"]; 
            }
            
             if($names == ""){
                       echo "<script>alert('You have enetered a wrong name')</script>";    
                   } else {
          echo  "<script> location.href = 'loan_statement.php?codename=$get_code&name=$names'; </script>";   
                } 
               
            }
      
      
//    echo "<td ><a style='color: #ff9900;' href='loan_statement.php?codename=" . $row['codename']. "&name=".$row['name']."&type=".$row['type']."'>View details</a></td>";
         
            
            ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bad Debt</title>
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

<body >
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
    <div  id="pcoded" class="pcoded" >
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">
            <?php
                include 'admin_nav1.php';
            ?>

            <div class="pcoded-main-container" >
                <div class="pcoded-wrapper" >
                    
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
                                            <h5 class="m-b-10">Bad Debt</h5>
                                            <p class="m-b-0">Finacial Summary</p>
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
                        
                        
                        
                        
                      
                  <div class="pcoded-inner-content" >
                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <!-- Page-body start -->
                                    <div class="page-body">
                                   <div class="row" style="" >
             
                
                <div class="col-sm-1">
                    
                </div>
                
                <div class="col-sm-3">
            <form name="monthyear" action="debtors.php" method="POST" enctype="multipart/form-data">
        <select name="months" id="month" required="">
                    <option value="" disabled selected hidden>select month</option>
                   <option>January</option>
                   <option>February</option>
                   <option>March</option>
                   <option>April</option>
                   <option>May</option>
                   <option>June</option>
                   <option>July</option>
                   <option>August</option>
                   <option>September</option>
                   <option>October</option>
                   <option>November</option>
                   <option>December</option>                  
               </select>
               
                   <select name="years" id="year" required="">
                    <option value="" disabled selected hidden>select year</option>
                   <option>2017</option>
                  <option>2018</option>
                   <option>2019</option>
                  <option>2020</option>
                  <option>2021</option>
                 <option>2022</option>
                 <option>2023</option>
                  <option>2024</option>
                   <option>2025</option>
                  <option>2026</option>
                  <option>2027</option>
                 <option>2028</option>   
                  <option>2029</option>
                 <option>2030</option>   
               </select>
               
               <br> 
               <button  name="month_year" class="select_time" style="font-weight: bold; border-radius: 8px; padding:7px; font-style:italic ; font-size: 14px; background-color:green; color: whitesmoke; cursor: pointer; margin-bottom: 10px;">Search Month</button>
         
               </form>
               
                  </div>
               
               
               
               
               
                <div class="col-sm-3" style="margin-left: 80px;">
            <form name="year" action="debtors.php" method="POST" enctype="multipart/form-data">
                 
          <!--<input type="text"  id="evaluation1" class="autocomplete_staff1" name="telephone" placeholder="Staff Evaluation (year)"  ><br>-->
            
                   <select name="year_alone" id="year_a" required="" >
                    <option value="" disabled selected hidden>select year</option>
                   <option>2017</option>
                  <option>2018</option>
                   <option>2019</option>
                  <option>2020</option>
                  <option>2021</option>
                 <option>2022</option>
                 <option>2023</option>
                  <option>2024</option>
                   <option>2025</option>
                  <option>2026</option>
                  <option>2027</option>
                 <option>2028</option>   
                  <option>2029</option>
                 <option>2030</option>   
               </select>
               
               <br> 
               <button  name="year_a" class="select_year" style="font-weight: bold; border-radius: 8px; padding:7px; font-style:italic ; font-size: 14px; background-color:green; color: whitesmoke; cursor: pointer; margin-bottom: 10px;">Search Year</button>
         
               </form>
               </div>
                
                 <div class="col-sm-1">
          <!--SHOW ALL-->
         <button class="show_all" style="border-radius: 8px; padding:8px; font-style:italic ; font-size: 18px; background-color:green; color: whitesmoke; cursor: pointer">VIEW ALL</button>
              </div>
               
         </div>
            
                  <br>
                 
                    
 
             
       <!--DISPLAY ARENA-->
      
       <center>
           
           
           
           
           <div  id="dispay_db">    
             
           </div>
        
        
      </center>
      
          --
          <script type='text/javascript' >
    $( function() {
        $( ".autocomplete_staff" ).autocomplete({
            source: function( request, response ) {
                $.ajax({
                    url: "autocomplete_staff.php",
                    type: 'post',
                    dataType: "json",
                    data: {
                        search: request.term
                    },
                    success: function( data ) {
                        response( data );
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
    
    
    
    
    
    
    
    
        <script type='text/javascript' >
    $( function() {
        $( ".autocomplete_staff1" ).autocomplete({
            source: function( request, response ) {
                $.ajax({
                    url: "autocomplete_staff.php",
                    type: 'post',
                    dataType: "json",
                    data: {
                        search: request.term
                    },
                    success: function( data ) {
                        response( data );
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
    </script>   
       
         
                 <!--ON LOAD DISPLAY ALL-->
          <script>
             if (window.XMLHttpRequest)
                  {// code for IE7+, Firefox, Chrome, Opera, Safari
                  xmlhttp=new XMLHttpRequest();
                  }
                else
                  {// code for IE6, IE5
                  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                  }        
                   
                   xmlhttp.open("GET","bad_debt_general.php",true);
                                 xmlhttp.send();                
                                 xmlhttp.onreadystatechange = function(){                                   
                      if(xmlhttp.readyState ===4 && xmlhttp.status===200) {
                 document.getElementById("dispay_db").innerHTML = xmlhttp.responseText;;
                                }
                        };
                 
                    
            
        </script>
        
        
                          <!--THIS IS TO DISPLAY SELECTED CLASS -->
          <script>
               $(document).ready(function() {
               var select_class = $(".select_class"); //THIS IS TO DISPLAY SELECTED CLASS   
    $(select_class).click(function(e){ //THIS IS TO DISPLAY SELECTED CLASS
        e.preventDefault();
        var getclass = document.getElementById('cla').value;
        
             if (window.XMLHttpRequest)
                  {// code for IE7+, Firefox, Chrome, Opera, Safari
                  xmlhttp=new XMLHttpRequest();
                  }
                else
                  {// code for IE6, IE5
                  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                  }        
                 
                 if(getclass === ""){
                     
                     alert("Please select district")
                 }
                 
                 else{
                   xmlhttp.open("GET","debtor_magic22.php?district="+getclass,true);
                                 xmlhttp.send();                
                                 xmlhttp.onreadystatechange = function(){                                   
                      if(xmlhttp.readyState ===4 && xmlhttp.status===200) {
                 document.getElementById("dispay_db").innerHTML = xmlhttp.responseText;;
                                }
                        };
                    
                        
                document.getElementById('cla').value = ""; 
                         }   
                    });  
                    
                    
                    
                    
                        var print_page = $(".print_me");
                        $(print_page).click(function(e){ //Function LINK TO PRINT
                  e.preventDefault();
                                window.print();
                             });         
           });     
            
        </script>
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
         <!--THIS IS TO DISPLAY DISTRICT -->
          <script>
               $(document).ready(function() {
        
        ////////////////////SELECT TIME MONTH////////////////////////////////////////
        var select_time = $(".select_time"); //THIS IS TO DISPLAY SELECTED CLASS   
    $(select_time).click(function(e){ //THIS IS TO DISPLAY SELECTED CLASS
        e.preventDefault();
  
        var getmonth = document.getElementById('month').value;
        var getyear = document.getElementById('year').value;
        
             if (window.XMLHttpRequest)
                  {// code for IE7+, Firefox, Chrome, Opera, Safari
                  xmlhttp=new XMLHttpRequest();
                  }
                else
                  {// code for IE6, IE5
                  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                  }        
               
        if (getmonth==="" || getyear===""){ 
          swal({
                         title: 'Not Allowed!',
                         text:  'You must fill month and year to search',
                         icon: 'error',
                        buttons: {
                            confirm : {text:'Ok',className:'sweet-orange'}
                          
                        },
                        closeOnClickOutside: false
                       });
            }else{
                   xmlhttp.open("GET","bad_debt_month.php?month="+getmonth+"&year="+getyear,true);
                                 xmlhttp.send();                
                                 xmlhttp.onreadystatechange = function(){                                   
                      if(xmlhttp.readyState ===4 && xmlhttp.status===200) {
                 document.getElementById("dispay_db").innerHTML = xmlhttp.responseText;;
//               window.location = "statement_time.php";
                           
                                    }
                                };
                    
                            }          
              
                          
                        });  
                    
        
        
       
       
       
       
           ////////////////////SELECT TIME YEAR////////////////////////////////////////
        var select_year = $(".select_year"); //THIS IS TO DISPLAY SELECTED CLASS   
    $(select_year).click(function(e){ //THIS IS TO DISPLAY SELECTED CLASS
        e.preventDefault();
         
        var getyear = document.getElementById('year_a').value;
        
             if (window.XMLHttpRequest)
                  {// code for IE7+, Firefox, Chrome, Opera, Safari
                  xmlhttp=new XMLHttpRequest();
                  }
                else
                  {// code for IE6, IE5
                  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                  }        
               
        if (getyear===""){ 
               swal({
                         title: 'Not Allowed!',
                         text:  'You must fill year to search',
                         icon: 'error',
                        buttons: {
                            confirm : {text:'Ok',className:'sweet-orange'}
                          
                        },
                        closeOnClickOutside: false
                       });

            }else{
                   xmlhttp.open("GET","bad_debt_year.php?year="+getyear,true);
                                 xmlhttp.send();                
                                 xmlhttp.onreadystatechange = function(){                                   
                      if(xmlhttp.readyState ===4 && xmlhttp.status===200) {
                 document.getElementById("dispay_db").innerHTML = xmlhttp.responseText;;
                         
                          }
                        };
                    
               }          
              
                          
                    });  
        
        
        
        
        
        
        
        
        
        
        
        
        
        
         ////////////////////SELECT TIME YEAR////////////////////////////////////////
        var group_na = $("#group_na"); //THIS IS TO DISPLAY SELECTED CLASS   
    $(group_na).click(function(e){ //THIS IS TO DISPLAY SELECTED CLASS
        e.preventDefault();
//            alert('WORKING');
        var autocomplete = document.getElementById('autocomplete').value;
        
             if (window.XMLHttpRequest)
                  {// code for IE7+, Firefox, Chrome, Opera, Safari
                  xmlhttp=new XMLHttpRequest();
                  }
                else
                  {// code for IE6, IE5
                  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                  }        
               
        if (autocomplete===""){ 
                alert("You must search for name first");
            }else{
                   xmlhttp.open("GET","archive_display.php?codename="+autocomplete,true);
                                 xmlhttp.send();                
                                 xmlhttp.onreadystatechange = function(){                                   
                      if(xmlhttp.readyState ===4 && xmlhttp.status===200) {
                       var check =  xmlhttp.responseText;
                          if(check === ""){
                       alert('Wrong name inserted');       
                          } else {
                 document.getElementById("dispay_db").innerHTML = xmlhttp.responseText;;
                             }
                          }
                        };
                    
               }          
              
                          
                    });
        
        
        
        
        
        
        
        
        
        
                    
                        var print_page = $(".print_me");
                        $(print_page).click(function(e){ //Function LINK TO PRINT
                  e.preventDefault();
                                window.print();
                             });         
           });     
            
        </script>
        
        
        
        
        
        
        
        
        
        
        
         
         
                   <!--THIS IS TO RE-LOAD THE ENTIRE STUDENT-->
          <script>
         $(document).ready(function() {
               var show_all = $(".show_all"); //LINK TO GO AND VIEW ALL DEBTORS   
    $(show_all).click(function(e){ //Function LINK TO GO AND VIEW ALL DEBTORS button click
        e.preventDefault();
              window.location = "bad_debt.php";
            });
        });
          </script>   
          
          
          
          <script>
             function goBack() {
                 window.location = "admin_home.php";
             }
          </script>
          
          
          
                        <!--AUTO-COMPLETE-->
            <!-- Script -->
    <script type='text/javascript' >
    $( function() {
  
        $( "#autocomplete" ).autocomplete({
            source: function( request, response ) {
                
                $.ajax({
                    url: "autocomplete.php",
                    type: 'post',
                    dataType: "json",
                    data: {
                        search: request.term
                    },
                    success: function( data ) {
                        response( data );
                    }
                });
            },
            select: function (event, ui) {
                $('#autocomplete').val(ui.item.label); // display the selected text
                $('#selectuser_id').val(ui.item.value); // save selected id to input
                return false;
            }
        });
        
        
        
        
        
      ////////////////////////////////////////////////////////////////////////////////  
          $( "#district_zone" ).autocomplete({
            source: function( request, response ) {
                
                $.ajax({
                    url: "district_zone.php",
                    type: 'post',
                    dataType: "json",
                    data: {
                        search: request.term
                    },
                    success: function( data ) {
                        response( data );
                    }
                });
            },
            select: function (event, ui) {
                $('#district_zone').val(ui.item.label); // display the selected text
              
                return false;
            }
        });
        
     ////////////////////////////////////////////////////////////////////////////
          $( "#group_name" ).autocomplete({
            source: function( request, response ) {
                
                $.ajax({
                    url: "group_name.php",
                    type: 'post',
                    dataType: "json",
                    data: {
                        search: request.term
                    },
                    success: function( data ) {
                        response( data );
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
        $( "#multi_autocomplete" ).autocomplete({
            source: function( request, response ) {
                
                var searchText = extractLast(request.term);
                $.ajax({
                    url: "autocomplete.php",
                    type: 'post',
                    dataType: "json",
                    data: {
                        search: searchText
                    },
                    success: function( data ) {
                        response( data );
                    }
                });
            },
            select: function( event, ui ) {
                var terms = split( $('#multi_autocomplete').val() );
                
                terms.pop();
                
                terms.push( ui.item.label );
                
                terms.push( "" );
                $('#multi_autocomplete').val(terms.join( ", " ));
///////////////////////////////////////////////////////////////////////////////////////
                // Id
                var terms = split( $('#selectuser_ids').val() );
                
                terms.pop();
                
                terms.push( ui.item.value );
                
                terms.push( "" );
                $('#selectuser_ids').val(terms.join( ", " ));

                return false;
            }
           
        });
    });

    function split( val ) {
      return val.split( /,\s*/ );
    }
    function extractLast( term ) {
      return split( term ).pop();
    }
             
             
             
               /////////THIS IS TO CHECK BEFORE FINAL UPDATE////////
              $(document).ready(function () {               
        $("#update").click(function () {
            
             ///////////////////////////////////////////////////////////////////
          
       //////////////////////////////////////////////////////////// 
            
            
            
               var  name_up = document.getElementById('nam').value;   
        if (name_up === ""){
            alert ("Search member to update first");
           return false; }  
                });
                
         });
             
             
             
             
             
             /////////THIS IS TO CHECK BEFORE FINAL DELETION////////
              $(document).ready(function () {
               
        $("#delete").click(function () {
               var  name_del = document.getElementById('nam').value;   
        if (name_del === ""){
            alert ("Search member to delete first");
        }   else {
             var  del_check = confirm("You will loose all '"+name_del+"' information when you delete. DO YOU WISH TO CONTINUE?");
                
                if(del_check===true){
                    return true;
                     } else {
                         $('#nam').focus();
                        return false;
                        
                        
                     }
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
     /////REMOVE nav2 for table     
       var size = window.innerWidth; 
//       alert(size);
     if(size > 1000){
setTimeout(function() {document.getElementById("mymenu2").click(); }, 1000);
     }
        </script> 
   
    
    
</body >

</html>
