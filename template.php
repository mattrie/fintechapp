<?php
session_start();
    include 'connection.php';
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>DashBoard</title>
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
   <style type="text/css" media="print">
    .noPrint{
      display: none;
    }
  </style>
        
        
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
    <div id="nonPrintable">
    <div id="pcoded" class="pcoded" >
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
                                            <h5 class="m-b-10">Dashboard</h5>
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
                                   
                                     
                                        
                                        
                                        <?php $three = 3;?>       
                                        
                                   <i id="agree" data-toggle="modal" data-target="#JohnDoe"></i>
                                      <input type="text" name="" id="form_go" class="form-control-bold" value="<?php echo $three;?>"/>       
                                             
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
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
    </div>

   <!--===========================================================-->    
    <div class="modal fade" id="JohnDoe" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-dialog-centered modal-lg">
          <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title mx-auto"><center>FINSOLUTE AGREEMENT FORM</center></h4> 
              </div>
            <div class="modal-body">
                  <center > 
                      <div  width="140" height="140" class="mb-2">
                                    <img id="img123" src="#" alt="CLICK 'BROWSE' TO UPLOAD PHOTO"  style="border: 4px #99ff99 solid; width:140px; height:140px;" >
            </div>
                    
                  </center>  
                  <?php $name ="Bisi Akande"; ?>
                Full Name:
                <input type="text" class="form-control" placeholder="Name" value="<?php echo $name;?>"  readonly=""  style="text-transform: uppercase;" >
                                                                   <br>
                  <?php $add ="123 street"; ?>                                                   
                Address:
                    <input type="text" class="form-control" placeholder="enter Address"   value="<?php echo $add;?>"  readonly="">
                                                              
                <br>
                     Telephone:
                    <input  class="form-control" type="number" placeholder="enter phone_number" name="telephone"  maxlength="11" required>
                                                              
                 <br>    
                  <?php $loan ="60000"; $loan1 = number_format($loan);?>    
                   Loan Disbursed:
                    <input  class="form-control" type="text" value="<?php echo $loan1;?>"  readonly="">
                     <br>
                  Repayment:
                    <input  class="form-control" type="text" onkeypress="return CheckNumeric()" onkeyup="FormatCurrency(this)" placeholder="enter amount" name="prop_amt"  maxlength="12" required>
                     <br>
                 
                
                   Expiry:
                        <input type="date" class="form-control" name="dateofbirth" style="border-radius: 5px;" required="">
                      <br>
                 
                
                      Signature: _______________________________ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;      Date____________________                                         
                                                          
                
            </div>
              <div class="modal-footer">
                       <button type="button" class="btn btn-success" onclick="functionPrint()" data-dismiss="modal">Print</button>
             
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Dismiss</button>
              </div>
          </div>
      </div>
  </div>
    <!--=======================================================-->
    
   
    
    
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
        var form_go = document.getElementById('form_go').value;
   if (form_go === "3") {
    document.getElementById('agree').click();
}
  
    document.getElementById('form_go').value = "";
</script>
    
    <script>
      function functionPrint() {
        document.getElementById("nonPrintable").className += "noPrint";
        window.print();
    }
  </script>
   
    
    
</body>

</html>
