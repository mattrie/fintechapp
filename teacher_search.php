<?php
session_start();
   
    include 'connection.php';
  
    
    
     //            UPLOAD PHOTO FUNCTION  
            function fn_resize($image_resource_id,$width,$height) {
                    $target_width =300;
                    $target_height =300;
                    $target_layer=imagecreatetruecolor($target_width,$target_height);
                    imagecopyresampled($target_layer,$image_resource_id,0,0,0,0,$target_width,$target_height, $width,$height);
                    return $target_layer;
                  }   

      ////////////////////////UPDATE///////////////////////////////////////   
    ///////////////////////////lets upload the file first/////////////////////////////////////////////                      
          if(!empty($_FILES['fileToUpload']['name'])){
               
         //           THIS IS TO UPLOAD PASSPORT PHOTO  

              $target_dir = "images/";// this is the directory to upload to
           //....................................
            
       
                        if(is_array($_FILES)) {
                            $file = $_FILES['fileToUpload']['tmp_name']; 
                            $source_properties = getimagesize($file);
                            $image_type = $source_properties[2]; 
                            if( $image_type == IMAGETYPE_JPEG ) {   
                                $image_resource_id = imagecreatefromjpeg($file);  
                                $target_layer = fn_resize($image_resource_id,$source_properties[0],$source_properties[1]);
                                $target_file = $target_dir.$_FILES['fileToUpload']['name'];
                                imagejpeg($target_layer,$target_dir.$_FILES['fileToUpload']['name'] );


                              }

                             elseif( $image_type == IMAGETYPE_GIF )  {  
                                $image_resource_id = imagecreatefromgif($file);
                                $target_layer = fn_resize($image_resource_id,$source_properties[0],$source_properties[1]);
                                $target_file = $target_dir.$_FILES['fileToUpload']['name'];   
                                imagegif($target_layer,$target_dir.$_FILES['fileToUpload']['name'] );


                              }

                             elseif( $image_type == IMAGETYPE_PNG ) {
                                $image_resource_id = imagecreatefrompng($file); 
                                $target_layer = fn_resize($image_resource_id,$source_properties[0],$source_properties[1]);
                                 $target_file = $target_dir.$_FILES['fileToUpload']['name']; 
                                imagepng($target_layer, $target_dir.$_FILES['fileToUpload']['name'] );


                            }
                        }
           
               } else {
                       if(isset($_POST['imge'])){
                        $images = $_POST['imge'];
                        @$target_file = $images;         
                        }
                   
                     }
                 
                             if(isset($_POST['udate'])){
                                         
                                $get_name = $_POST['shadow'];
                                $name = strtoupper($_POST['name']);
                                $regnum = strtoupper($_POST['regnum']) ;
                                $address = $_POST['address'];
                                $dob = $_POST['dob'];
                                $class = $_POST['class'];
                                $parent = strtoupper($_POST['parent']);
                                $telephone = $_POST['telephone'];
                                $mail = $_POST['mail'];
                                $religion = $_POST['religion'];
                                $login_id = $_POST['loginid']; 
                                $id = $_POST['idd'];
                                $identity = $_POST['identity'];        
                                
                            
                     //UPDATE RECORD
     $sql_statement = "UPDATE staff SET namee = '$name', registration_num = '$regnum', addresss = '$address', dob = '$dob', classs = '$class', parentt = '$parent', telephone = '$telephone', mail = '$mail', religion = '$religion', login_id = '$login_id', imagess = '$target_file' WHERE id = '$id'";
                     $result = mysqli_query($connect, $sql_statement); 
                                    if($result==true && $identity != ""){
                                   echo "<script type='text/javascript'> $(document).ready(function(){ 
                swal({
                         title: 'Success!',
                         text: '$name has been successfully updated!!',
                         icon: 'success',
                        buttons: {
                            confirm : {text:'Ok',className:'sweet-orange'},
                          
                        },
                        closeOnClickOutside: false
                       })
                  
                }); </script>";
            
                                    
                                    } else {
                           echo "<script type='text/javascript'> $(document).ready(function(){ 
                swal({
                         title: 'Error!',
                         text: 'Not updated!!',
                         icon: 'error',
                        buttons: {
                            confirm : {text:'Ok',className:'sweet-orange'},
                          
                        },
                        closeOnClickOutside: false
                       })
                  
                }); </script>";

                                    
                        }      
                               
                   }    


                          if(isset($_POST['bloc2'])){
                               $name = $_POST['name'];
                         $random_pin = rand(10, 1000000);  
                         $md5_rand = md5($random_pin);
                         
             $sql_block = "UPDATE staff SET pass = '$md5_rand' WHERE namee = '$name'";  
                    
                    $result24 = mysqli_query($connect, $sql_block);  
                       if($result24==true){
     echo "<script type='text/javascript'> $(document).ready(function(){ 
                swal({
                         title: 'Yanked Off!!',
                         text: '$name has been successfully Blocked!!. A six digit temporary code has been generated to reinstate $name in future: $random_pin (Please pen down before clicking Ok). This temp code is also encrypted with md5. Please Do Not forget it.',
                         icon: 'success',
                        buttons: {
                            confirm : {text:'Ok',className:'sweet-orange'},
                          
                        },
                        closeOnClickOutside: false
                       })
                  
                }); </script>";
 
                             }  else {
                                echo "<script type='text/javascript'> $(document).ready(function(){ 
                swal({
                         title: 'Error!',
                         text: 'Not updating Block!!',
                         icon: 'error',
                        buttons: {
                            confirm : {text:'Ok',className:'sweet-orange'},
                          
                        },
                        closeOnClickOutside: false
                       })
                  
                }); </script>";
 
//                   printf("Errormessage: %s\n", mysqli_error($connect));   
                             }       
                          }
                        
         
                        

    ?>
              

<!DOCTYPE html>
<html lang="en">

<head>
    <title>SEARCH_STAFF_INFO</title>
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
        window.addEventListener('load', function() {
         document.querySelector('input[type="file"]').addEventListener('change', function() {
              if (this.files && this.files[0]) {
                   var img = document.getElementById('img123');  // $('img')[0]
               var fi = document.getElementById('customFile'); 
               if (fi.files.length > 0) { 
            for (const i = 0; i <= fi.files.length - 1; i++) { 
  
                const fsize = fi.files.item(i).size; 
                const file = Math.round((fsize / 1000)); 
                // The size of the file. 
//                if (file > 148) { 
//                 swal({
//                         title: 'Not Allowed!',
//                         text:  'Image too large, please resize image to 100kb. Your current image size is: '+file/1000+'mb ('+file+'kb). Image should be: Horizontal = 400px by Vertical = 300px.',
//                         icon: 'error',
//                        buttons: {
//                            confirm : {text:'Ok',className:'sweet-orange'}
//                          
//                        },
//                        closeOnClickOutside: false
//                       });
//                         return false;                
//                }  else {
                    img.src = URL.createObjectURL(this.files[0]); // set src to blob url
               img.onload = imageIsLoaded;
//                }
            } 
        }
              }
         });
        });

       
     </script>
       <style>
      @media (min-width: 1024px) {
          .button-distance {
             margin-left: 80px;
          }
      }

      @media (max-width: 768px) {
          .button-distance {
             margin-left: 0px;
          }
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
                                            <h5 class="m-b-10">STAFF SEARCH</h5>
                                            <p class="m-b-0">Search and Edit Staff Info</p>
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
                                            <div class="col-sm-12">
                                                <!-- Basic Form Inputs card start -->
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5>STAFF EDIT INFO</h5>
                                                        <!--<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>-->
                                                    </div>
                                                    <div class="card-block">
                                 <!--====================SEARCHING STUDENT-->
           <form action="teacher_search.php" method="POST" enctype="multipart/form-data" >
              <center>
         <div class="input-group mb-3">
    <input type="text" class="form-control" id="autocomplete" name="srch" placeholder="Search Staff" required=""   >
    <div class="input-group-append">
      <button class="btn btn-warning" id="btnsearch" name="btnsrch" type="submit">SEARCH</button>  
     </div>
  </div>
        </center>  
             
        
          <!--///////////////////////////////////////////-->        
          
          <?php
//          session_start();
   $get_name = $date = $images = $id = $name = $regnum = $address = $dob = $class = $parent = $telephone = $mail = $religion = $login_id = "";
       if (isset($_POST['btnsrch'])){
                       
                $get_name = $_POST['srch'];
       $sql_state = "SELECT * FROM staff WHERE namee = '$get_name'";
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
              }
              $_SESSION['id'] = $id;
        }
          ?>
          
    
       
     </form>   
                                   
                                                        
                                                        
                                                        
                                                        <!--<h4 class="sub-title">Basic Inputs</h4>-->
                                                        <form action="teacher_search.php" method="POST" enctype="multipart/form-data">
                                                          <center> 
                                                            <div  style="width:140px; height:140px;" class="mb-5">
                                                                <img id="img123" src="<?php echo $images;?>" alt="CLICK 'BROWSE' TO UPLOAD PHOTO"  style="border: 4px #99ff99 solid; width:140px; height:140px;" >
                                                                    <input type="hidden" name="idd" value="<?php echo $id;?>" />   
                                                                   <input type="hidden" name="imge" value="<?php echo $images;?>" /> 
                                                                 <div class="custom-file mb-3" style="width: 200px;">
                                                                     <input type="file" class="custom-file-input" id="customFile" name="fileToUpload" accept="image/*" >
                                                                     <label class="custom-file-label" for="customFile">Choose Photo>></label>
                                                                 </div> 
                                                             </div>
                                                          </center>  
                                                          
                                                            
                                                            <div class="form-group row">
                                                               
                                                                <label class="col-sm-2 col-form-label">Name:</label>
                                                                <div class="col-sm-10">
                                                                     <input type="hidden" id="duplicate_name" />      
         <input type="text" class="form-control" placeholder="enter Name"   id="nam" type="text" name="name" value="<?php echo $name;?>"  maxlength="50"  style="text-transform: uppercase;" required>
                                                                </div>
                                                            </div>
                                                            
                                                         <input type="hidden" name="shadow" value="<?php echo $get_name;?>"/>     
                                                            
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Staff Number:</label>
                                                                <div class="col-sm-10">
                                                                       <input type="text" class="form-control" placeholder="enter Staff Number"  name="regnum" value="<?php echo $regnum;?>"  maxlength="12"  style="text-transform: uppercase;" required>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Address:</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control" placeholder="enter Address"   name="address" value="<?php echo $address;?>"  maxlength="70" required="">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Gender:</label>
                                                                <div class="col-sm-10">
                                                                     <select name="class" class="form-control" required>
                                                                  <option value="<?php echo $class;?>"><?php echo $class;?></option>
                                                                    <option value="MALE">MALE</option>
                                                                    <option value="FEMALE">FEMALE</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Date of Birth:</label>
                                                                <div class="col-sm-10">
                                                                    <input  class="form-control"  type="date" name="dob" value="<?php echo $dob;?>"  maxlength="16" required>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Duty/Role:</label>
                                                                <div class="col-sm-10">
                                                                  <input type="text" class="form-control" placeholder="enter Duty/Role" value="<?php echo $parent;?>"  type="text" name="parent" maxlength="50" required style="text-transform: uppercase">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Telephone:</label>
                                                                <div class="col-sm-10">
                                                                   <input  class="form-control" type="number" value="<?php echo $telephone;?>" placeholder="enter phone_number" name="telephone"  maxlength="50" required>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Email:</label>
                                                                <div class="col-sm-10">
                                                                     <input  class="form-control"   type="email"  placeholder="enter E-mail" value="<?php echo $mail;?>" name="mail"   maxlength="50" required>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Refree 1:</label>
                                                                <div class="col-sm-10">
                                                                    <input  class="form-control"   type="text"  name="religion"   maxlength="50"  placeholder="enter Refree 1" value="<?php echo $religion;?>" maxlength="50" required> 
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Refree 2:</label>
                                                                <div class="col-sm-10">
                                                                   <input type="text" class="form-control" type="text" name="loginid" placeholder="enter Refree 2"  value="<?php echo $login_id;?>">
                                                                </div>
                                                            </div>
<!--                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Username:</label>
                                                                <div class="col-sm-10">
                                                                      <input type="text" class="form-control"  name="username" required="true"  placeholder="enter username" maxlength="20">
                                                                </div>
                                                            </div>
                                                             <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Password:</label>
                                                                <div class="col-sm-10">
                                                                      <input type="text" class="form-control"  name="pass" required="true"  placeholder="enter password" maxlength="20">
                                                                </div>
                                                            </div>-->
                                                           <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Database id:</label>
                                                                <div class="col-sm-10">
                                                                      <input type="text" class="form-control" value="<?php echo $id;?>" name="identity" readonly="" >
                                                                </div>
                                                            </div>
                                                           <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label"> Date registered:</label>
                                                                <div class="col-sm-10">
                                                                      <input type="text" class="form-control" value="<?php echo $date;?>" readonly="" >
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label"></label>
                                                              
                                                                <div class="col-sm-10 mx-auto">
                                                                    <input style="" class="btn btn-success button-distance" id="update"  type="submit" name="udate"  value="Update" />       
                                                                 <input style="margin-left:70px;" class="btn btn-danger" id="block1" type="submit" name="bloc2"  value="Block" />  
                                                                </div>
                                                              
                                                            </div>
                                                        </form> 
                                                        <input id="oya" type="hidden">      
                                                        <!--<button id="oya"></button>-->   
                                                    </div>
                                                </div>
                                                <!-- Basic Form Inputs card end -->
                                            </div>
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
    
    
    
       <!-- Script -->
    <script type='text/javascript' >
    $( function() {
  
        $( "#autocomplete" ).autocomplete({
            source: function( request, response ) {
                
                $.ajax({
                    url: "autocomplete_teach.php",
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
               swal({
                         title: 'Not Allowed!',
                         text:  'Search staff to update first',
                         icon: 'error',
                        buttons: {
                            confirm : {text:'Ok',className:'sweet-orange'}
                          
                        },
                        closeOnClickOutside: false
                       });

           
           return false; }  
                });
                
         });
             
             
             
             
             
             /////////THIS IS TO CHECK BEFORE FINAL DELETION////////
              $(document).ready(function () {
               
        $("#block1").click(function () {
               var  name_del = document.getElementById('nam').value;   
        if (name_del === ""){
            swal({
                         title: 'Not Allowed!',
                         text:  'Search staff to block first',
                         icon: 'error',
                        buttons: {
                            confirm : {text:'Ok',className:'sweet-orange'}
                          
                        },
                        closeOnClickOutside: false
                       });

           
        }   if (name_del !== "") {swal({
                        title: 'Are you sure?',
                        text: "You are attempting to block '"+name_del+"' from accessing staff login.. DO YOU WISH TO CONTINUE?",
                        icon: 'warning',
                        buttons: true,
                        dangerMode: true
                      })
                      .then((willDelete) => {
                        if (willDelete) { 
//                       document.getElementById('oya').click();    
               document.getElementById('oya').value = 'A';
                    document.getElementById('block1').click();
                      return true;
                        } else {
                              swal({
                          text:'Not Bolcked!',
                         buttons: {
                            confirm : {text:'ok',className:'sweet-orange'},
                          
                        }
                               });
                               
                               return false;
                        }
                     });
               var oya = document.getElementById('oya').value ;  
               if(oya === "A"){
                     return true;
               } else {
                     return false;
               }
               
                     }
                });
                
         });

    $(document).ready(function () {
               
        $("#oya").click(function () {
            alert('me');
             return true;
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
   
    
    
</body>

</html>




