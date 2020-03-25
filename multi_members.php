<?php
session_start();
 if(empty($_SESSION['id_admin'])){
//         echo "<script>alert('You must first login');</script>";
          echo "<script>alert('You must first login');
         window.location = 'fin_admin.php';</script>";
 }
    include 'connection.php';
    
   
    $random_pin = rand(10, 1000000);
   
    //    ob_start();
    //session_start();
   


    ///////////////////////////lets upload the file first/////////////////////////////////////////////                      

         $target_dir = "images/";// this is the directory to upload to

                   //get file name and set to target directory
               $target_file = @($target_dir . basename($_FILES["fileToUpload"]["name"]));

              @($getfile_name = $_FILES['fileToUpload']['name']);
              @($getfile_size = $_FILES['fileToUpload']['size']);
              @($getfile_tmp_dir = $_FILES['fileToUpload']['tmp_name']);
              @($getfile_type = $_FILES['fileToUpload']['type']);
              @($identifyFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION)));

              
              
              
              
              
              
              
              ///////////////////////////lets upload the file 1/////////////////////////////////////////////                      

         $target_dir1 = "images/";// this is the directory to upload to

                   //get file name and set to target directory
               $target_file1 = @($target_dir1 . basename($_FILES["fileToUpload1"]["name"]));

         
                ///////////////////////////lets upload the file 2/////////////////////////////////////////////                      

         $target_dir2 = "images/";// this is the directory to upload to

                   //get file name and set to target directory
               $target_file2 = @($target_dir2 . basename($_FILES["fileToUpload2"]["name"]));
               
               
               
                 ///////////////////////////lets upload the file 3/////////////////////////////////////////////                      

         $target_dir3 = "images/";// this is the directory to upload to

                   //get file name and set to target directory
               $target_file3 = @($target_dir3 . basename($_FILES["fileToUpload3"]["name"]));


               
               
                ///////////////////////////lets upload the file 4/////////////////////////////////////////////                      

         $target_dir4 = "images/";// this is the directory to upload to

                   //get file name and set to target directory
               $target_file4 = @($target_dir4 . basename($_FILES["fileToUpload4"]["name"]));

               
               
               
                   ///////////////////////////lets upload the file 5////////////////////////////////////////////                      

         $target_dir5 = "images/";// this is the directory to upload to

                   //get file name and set to target directory
               $target_file5 = @($target_dir5 . basename($_FILES["fileToUpload5"]["name"]));

               
               
               
               
               
               
               
                  ///////////////////////////lets upload the file 6/////////////////////////////////////////////                      

         $target_dir6 = "images/";// this is the directory to upload to

                   //get file name and set to target directory
               $target_file6 = @($target_dir6 . basename($_FILES["fileToUpload6"]["name"]));

         
                ///////////////////////////lets upload the file 7/////////////////////////////////////////////                      

         $target_dir7 = "images/";// this is the directory to upload to

                   //get file name and set to target directory
               $target_file7 = @($target_dir7 . basename($_FILES["fileToUpload7"]["name"]));
               
               
               
                 ///////////////////////////lets upload the file 8/////////////////////////////////////////////                      

         $target_dir8 = "images/";// this is the directory to upload to

                   //get file name and set to target directory
               $target_file8 = @($target_dir8 . basename($_FILES["fileToUpload8"]["name"]));


               
               
                ///////////////////////////lets upload the file 9/////////////////////////////////////////////                      

         $target_dir9 = "images/";// this is the directory to upload to

                   //get file name and set to target directory
               $target_file9 = @($target_dir9 . basename($_FILES["fileToUpload9"]["name"]));

               
               
               
                   ///////////////////////////lets upload the file 10////////////////////////////////////////////                      

         $target_dir10 = "images/";// this is the directory to upload to

                   //get file name and set to target directory
               $target_file10 = @($target_dir10 . basename($_FILES["fileToUpload10"]["name"]));
        
               
               
                   ///////////////////////////lets upload the file 11////////////////////////////////////////////                      

         $target_dir11 = "images/";// this is the directory to upload to

                   //get file name and set to target directory
               $target_file11 = @($target_dir11 . basename($_FILES["fileToUpload11"]["name"]));
               
               
               ///////////////////////////lets upload the file 12////////////////////////////////////////////                      

         $target_dir12 = "images/";// this is the directory to upload to

                   //get file name and set to target directory
               $target_file12 = @($target_dir12 . basename($_FILES["fileToUpload12"]["name"]));



   

                             if(isset($_POST['sub'])){
                                $name = strtoupper($_POST['name']);
                                $regnum = strtoupper($_POST['regnum']) ;
                                $address = $_POST['address'];
                                $dateofbirth = $_POST['dob'];
                                $class = $_POST['class'];
                                $parent = strtoupper($_POST['parent']);
                                $telephone = $_POST['telephone'];
                                $mail = $_POST['mail'];
                                $religion = $_POST['religion'];
                                $login_id = $_POST['loginid'];   
                                $date = date("jS F Y");
          move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file) ; 
          
           move_uploaded_file($_FILES["fileToUpload1"]["tmp_name"], $target_file1) ;   
        move_uploaded_file($_FILES["fileToUpload2"]["tmp_name"], $target_file2) ;   
        move_uploaded_file($_FILES["fileToUpload3"]["tmp_name"], $target_file3) ;   
        move_uploaded_file($_FILES["fileToUpload4"]["tmp_name"], $target_file4) ;   
        move_uploaded_file($_FILES["fileToUpload5"]["tmp_name"], $target_file5) ;   
        move_uploaded_file($_FILES["fileToUpload6"]["tmp_name"], $target_file6) ;   
        move_uploaded_file($_FILES["fileToUpload7"]["tmp_name"], $target_file7) ;   
        move_uploaded_file($_FILES["fileToUpload8"]["tmp_name"], $target_file8) ;   
        move_uploaded_file($_FILES["fileToUpload9"]["tmp_name"], $target_file9) ;   
        move_uploaded_file($_FILES["fileToUpload10"]["tmp_name"], $target_file10) ;   
        move_uploaded_file($_FILES["fileToUpload11"]["tmp_name"], $target_file11) ;   
        move_uploaded_file($_FILES["fileToUpload12"]["tmp_name"], $target_file12) ;   
                   
           
                         ///INSERT NEW MEMBER TO DATABASE
      $sql_statement = "INSERT INTO members (namee, registration_num, addresss, classs, parentt, telephone, mail, religion, login_id, imagess, level, dateofbirth, img1, img2, img3, img4, img5, img6, img7, img8, img9, img10, img11, img12) Values('$name','$regnum', '$address', '$class', '$parent','$telephone', '$mail', '$religion', '$login_id', '$target_file', '$date', '$dateofbirth', '$target_file1', '$target_file2', '$target_file3', '$target_file4', '$target_file5', '$target_file6', '$target_file7', '$target_file8', '$target_file9', '$target_file10', '$target_file11', '$target_file12')";
                     $result = mysqli_query($connect, $sql_statement); 
                                    if($result==true){
                                    echo "<script>alert('$name has been successfully registered!!');</script>";
                                    }
                     
                     
            } 
   


    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Multi Customer Registration</title>
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
                if (file > 148) { 
                    alert( 
                      "Image too large, please resize image to 100kb. Your current image size is: "+file/1000+"mb ("+file+"kb). Image should be: Horizontal = 400px by Vertical = 300px."); 
//                    document.getElementById('size').value = file; 
                         return false;                
                }  else {
                    img.src = URL.createObjectURL(this.files[0]); // set src to blob url
               img.onload = imageIsLoaded;
                }
            } 
        }
              }
         });
        });

       
     </script> 
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
                                            <h5 class="m-b-10">GROUP REGISTRATION</h5>
                                            <p class="m-b-0">Register Groups Here</p>
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
                                                        <h5>GROUP REGISTRATION FORM</h5>
                                                        <!--<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>-->
                                                    </div>
                                                    <div class="card-block">
                                                        <!--<h4 class="sub-title">Basic Inputs</h4>-->
                                                        <form action="multi_members.php" method="POST" enctype="multipart/form-data">
                                                          <center> 
                                                            <div  style="width:140px; height:140px;" class="mb-5">
                                                                <img id="img123" src="#" alt="CLICK 'BROWSE' TO UPLOAD PHOTO"  style="border: 4px #99ff99 solid; width:140px; height:140px;" >

                                                                <div class="custom-file mb-3" style="width: 200px;">
                                                                    <input type="file" class="custom-file-input" id="customFile" name="fileToUpload" accept="image/*" >
                                                                    <label class="custom-file-label" for="customFile">Choose Photo>></label>
                                                                </div> 
                                                             </div>
                                                              
                                                              
                                                               <div class="form-group row">
                                                                <label class="col-sm-2" style="margin-right:  0px;">
                                                                    <input type="file" name="fileToUpload1"  accept="image/*" name="image" id="file1"  onchange="loadFile1(event)" style="display: none;">
                                                            <label for="file1" style="cursor: pointer;">Upload Image_1</label><br>
                                                            <img id="output1" width="80" height="80"/>
                                                           <script>
                                                                var loadFile1 = function(event) {
                                                                       var image = document.getElementById('output1');
                                                                     var fi = document.getElementById('file1');
                                                                         if (fi.files.length > 0) { 
                                                                        for (const i = 0; i <= fi.files.length - 1; i++) { 

                                                                       const fsize = fi.files.item(i).size; 
                                                                       const file = Math.round((fsize / 1000)); 
                                                                       // The size of the file. 
                                                                       if (file > 148) { 

                                                         alert("Image too large, please resize Image_1 to 100kb. Your current image size is: "+file/1000+"mb ("+file+"kb). Image should be: Horizontal = 400px by Vertical = 300px."); 
                                                       //                    document.getElementById('size').value = file; 
                                                                                return false;                
                                                                       } else {
                                                                           image.src = URL.createObjectURL(event.target.files[0]);
                                                                       }  
                                                                   }
                                                               }   
                                                             };
                                                                </script>
                                                                </label>
                                                                         <label class="col-sm-2" style="margin-left:  0px;">
                                                                    <input type="file"  accept="image/*" name="fileToUpload2" id="file2"  onchange="loadFile2(event)" style="display: none;">
                                                            <label for="file2" style="cursor: pointer;">Upload Image_2</label><br>
                                                            <img id="output2" width="80" height="80"/>
                                                           <script>
                                                                var loadFile2 = function(event) {
                                                                       var image = document.getElementById('output2');
                                                                       var fi = document.getElementById('file2');
                                                                         if (fi.files.length > 0) { 
                                                                        for (const i = 0; i <= fi.files.length - 1; i++) { 

                                                                       const fsize = fi.files.item(i).size; 
                                                                       const file = Math.round((fsize / 1000)); 
                                                                       // The size of the file. 
                                                                       if (file > 148) { 

                                                         alert("Image too large, please resize Image_2 to 100kb. Your current image size is: "+file/1000+"mb ("+file+"kb). Image should be: Horizontal = 400px by Vertical = 300px."); 
                                                       //                    document.getElementById('size').value = file; 
                                                                                return false;                
                                                                       } else {
                                                                           image.src = URL.createObjectURL(event.target.files[0]);
                                                                       }  
                                                                   }
                                                               }   

                                                                   };
                                                                </script>
                                                                </label>


                                                                         <label class="col-sm-2" style="margin-left: 0px;">
                                                                    <input type="file"  accept="image/*" name="fileToUpload3" id="file3"  onchange="loadFile3(event)" style="display: none;">
                                                            <label for="file3" style="cursor: pointer;">Upload Image_3</label><br>
                                                            <img id="output3" width="80" height="80"/>
                                                           <script>
                                                                var loadFile3 = function(event) {
                                                                       var image = document.getElementById('output3');
                                                                     var fi = document.getElementById('file3');
                                                                         if (fi.files.length > 0) { 
                                                                        for (const i = 0; i <= fi.files.length - 1; i++) { 

                                                                       const fsize = fi.files.item(i).size; 
                                                                       const file = Math.round((fsize / 1000)); 
                                                                       // The size of the file. 
                                                                       if (file > 148) { 

                                                         alert("Image too large, please resize Image_3 to 100kb. Your current image size is: "+file/1000+"mb ("+file+"kb). Image should be: Horizontal = 400px by Vertical = 300px."); 
                                                       //                    document.getElementById('size').value = file; 
                                                                                return false;                
                                                                       } else {
                                                                           image.src = URL.createObjectURL(event.target.files[0]);
                                                                       }  
                                                                   }
                                                               }   
                                                                   };
                                                                </script>
                                                                </label>



                                                                          <label class="col-sm-2" style="margin-left: 0px;">
                                                                    <input type="file"  accept="image/*" name="fileToUpload4" id="file4"  onchange="loadFile4(event)" style="display: none;">
                                                            <label for="file4" style="cursor: pointer;">Upload Image_4</label><br>
                                                            <img id="output4" width="80" height="80"/>
                                                           <script>
                                                                var loadFile4 = function(event) {
                                                                       var image = document.getElementById('output4');
                                                                      var fi = document.getElementById('file4');
                                                                         if (fi.files.length > 0) { 
                                                                        for (const i = 0; i <= fi.files.length - 1; i++) { 

                                                                       const fsize = fi.files.item(i).size; 
                                                                       const file = Math.round((fsize / 1000)); 
                                                                       // The size of the file. 
                                                                       if (file > 148) { 

                                                         alert("Image too large, please resize Image_4 to 100kb. Your current image size is: "+file/1000+"mb ("+file+"kb). Image should be: Horizontal = 400px by Vertical = 300px."); 
                                                       //                    document.getElementById('size').value = file; 
                                                                                return false;                
                                                                       } else {
                                                                           image.src = URL.createObjectURL(event.target.files[0]);
                                                                       }  
                                                                   }
                                                               }   
                                                                   };
                                                                </script>
                                                                </label>
                                                                   
                                                             <label class="col-sm-2" style="margin-right:  0px;">
                                                                    <input type="file"  accept="image/*" name="fileToUpload5" id="file5"  onchange="loadFile5(event)" style="display: none;">
                                                            <label for="file5" style="cursor: pointer;">Upload Image_5</label><br>
                                                            <img id="output5" width="80" height="80"/>
                                                           <script>
                                                                var loadFile5 = function(event) {
                                                                       var image = document.getElementById('output5');
                                                                     var fi = document.getElementById('file5');
                                                                         if (fi.files.length > 0) { 
                                                                        for (const i = 0; i <= fi.files.length - 1; i++) { 

                                                                       const fsize = fi.files.item(i).size; 
                                                                       const file = Math.round((fsize / 1000)); 
                                                                       // The size of the file. 
                                                                       if (file > 148) { 

                                                         alert("Image too large, please resize Image_5 to 100kb. Your current image size is: "+file/1000+"mb ("+file+"kb). Image should be: Horizontal = 400px by Vertical = 300px."); 
                                                       //                    document.getElementById('size').value = file; 
                                                                                return false;                
                                                                       } else {
                                                                           image.src = URL.createObjectURL(event.target.files[0]);
                                                                       }  
                                                                   }
                                                               }   
                                                                   };
                                                                </script>
                                                                </label>
                                                                         <label class="col-sm-2" style="margin-left:  0px;">
                                                                    <input type="file"  accept="image/*" name="fileToUpload6" id="file6"  onchange="loadFile6(event)" style="display: none;">
                                                            <label for="file6" style="cursor: pointer;">Upload Image_6</label><br>
                                                            <img id="output6" width="80" height="80"/>
                                                           <script>
                                                                var loadFile6 = function(event) {
                                                                       var image = document.getElementById('output6');
                                                                    var fi = document.getElementById('file6');
                                                                         if (fi.files.length > 0) { 
                                                                        for (const i = 0; i <= fi.files.length - 1; i++) { 

                                                                       const fsize = fi.files.item(i).size; 
                                                                       const file = Math.round((fsize / 1000)); 
                                                                       // The size of the file. 
                                                                       if (file > 148) { 

                                                         alert("Image too large, please resize Image_6 to 100kb. Your current image size is: "+file/1000+"mb ("+file+"kb). Image should be: Horizontal = 400px by Vertical = 300px."); 
                                                       //                    document.getElementById('size').value = file; 
                                                                                return false;                
                                                                       } else {
                                                                           image.src = URL.createObjectURL(event.target.files[0]);
                                                                       }  
                                                                   }
                                                               }   
                                                                   };
                                                                </script>
                                                                </label>       
                                                                   
                                                                   
                                                                   
                                                                   
                                                            </div>
                                                              
                                                             <div class="form-group row">  
                                                               <label class="col-sm-2" style="margin-left: 0px;">
                                                                <input type="file"  accept="image/*" name="fileToUpload7" id="file7"  onchange="loadFile7(event)" style="display: none;">
                                                        <label for="file7" style="cursor: pointer;">Upload Image_7</label><br>
                                                        <img id="output7" width="80" height="80"/>
                                                       <script>
                                                            var loadFile7 = function(event) {
                                                                   var image = document.getElementById('output7');
                                                                  var fi = document.getElementById('file7');
                                                                     if (fi.files.length > 0) { 
                                                                    for (const i = 0; i <= fi.files.length - 1; i++) { 

                                                                   const fsize = fi.files.item(i).size; 
                                                                   const file = Math.round((fsize / 1000)); 
                                                                   // The size of the file. 
                                                                   if (file > 148) { 

                                                     alert("Image too large, please resize Image_7 to 100kb. Your current image size is: "+file/1000+"mb ("+file+"kb). Image should be: Horizontal = 400px by Vertical = 300px."); 
                                                   //                    document.getElementById('size').value = file; 
                                                                            return false;                
                                                                   } else {
                                                                       image.src = URL.createObjectURL(event.target.files[0]);
                                                                   }  
                                                               }
                                                           }   
                                                               };
                                                            </script>
                                                            </label>



                                                                      <label class="col-sm-2" style="margin-left: 0px;">
                                                                <input type="file"  accept="image/*" name="fileToUpload8" id="file8"  onchange="loadFile8(event)" style="display: none;">
                                                        <label for="file8" style="cursor: pointer;">Upload Image_8</label><br>
                                                        <img id="output8" width="80" height="80"/>
                                                       <script>
                                                            var loadFile8 = function(event) {
                                                                   var image = document.getElementById('output8');
                                                                  var fi = document.getElementById('file8');
                                                                     if (fi.files.length > 0) { 
                                                                    for (const i = 0; i <= fi.files.length - 1; i++) { 

                                                                   const fsize = fi.files.item(i).size; 
                                                                   const file = Math.round((fsize / 1000)); 
                                                                   // The size of the file. 
                                                                   if (file > 148) { 

                                                     alert("Image too large, please resize Image_8 to 100kb. Your current image size is: "+file/1000+"mb ("+file+"kb). Image should be: Horizontal = 400px by Vertical = 300px."); 
                                                   //                    document.getElementById('size').value = file; 
                                                                            return false;                
                                                                   } else {
                                                                       image.src = URL.createObjectURL(event.target.files[0]);
                                                                   }  
                                                               }
                                                           }   
                                                               };
                                                            </script>
                                                            </label>




                                                                                                                    <label class="col-sm-2" style="margin-right:  0px;">
                                                                <input type="file"  accept="image/*" name="fileToUpload9" id="file9"  onchange="loadFile9(event)" style="display: none;">
                                                        <label for="file9" style="cursor: pointer;">Upload Image_9</label><br>
                                                        <img id="output9" width="80" height="80"/>
                                                       <script>
                                                            var loadFile9 = function(event) {
                                                                   var image = document.getElementById('output9');
                                                                  var fi = document.getElementById('file9');
                                                                     if (fi.files.length > 0) { 
                                                                    for (const i = 0; i <= fi.files.length - 1; i++) { 

                                                                   const fsize = fi.files.item(i).size; 
                                                                   const file = Math.round((fsize / 1000)); 
                                                                   // The size of the file. 
                                                                   if (file > 148) { 

                                                     alert("Image too large, please resize Image_9 to 100kb. Your current image size is: "+file/1000+"mb ("+file+"kb). Image should be: Horizontal = 400px by Vertical = 300px."); 
                                                   //                    document.getElementById('size').value = file; 
                                                                            return false;                
                                                                   } else {
                                                                       image.src = URL.createObjectURL(event.target.files[0]);
                                                                   }  
                                                               }
                                                           }   
                                                               };
                                                            </script>
                                                            </label>
                                                                     <label class="col-sm-2" style="margin-left:  0px;">
                                                                <input type="file"  accept="image/*" name="fileToUpload10" id="file10"  onchange="loadFile10(event)" style="display: none;">
                                                        <label for="file10" style="cursor: pointer;">Upload Image_10</label><br>
                                                        <img id="output10" width="80" height="80"/>
                                                       <script>
                                                            var loadFile10 = function(event) {
                                                                   var image = document.getElementById('output10');
                                                                  var fi = document.getElementById('file10');
                                                                     if (fi.files.length > 0) { 
                                                                    for (const i = 0; i <= fi.files.length - 1; i++) { 

                                                                   const fsize = fi.files.item(i).size; 
                                                                   const file = Math.round((fsize / 1000)); 
                                                                   // The size of the file. 
                                                                   if (file > 148) { 

                                                     alert("Image too large, please resize Image_10 to 100kb. Your current image size is: "+file/1000+"mb ("+file+"kb). Image should be: Horizontal = 400px by Vertical = 300px."); 
                                                   //                    document.getElementById('size').value = file; 
                                                                            return false;                
                                                                   } else {
                                                                       image.src = URL.createObjectURL(event.target.files[0]);
                                                                   }  
                                                               }
                                                           }   
                                                               };
                                                            </script>
                                                            </label>


                                                                     <label class="col-sm-2" style="margin-left: 0px;">
                                                                <input type="file"  accept="image/*" name="fileToUpload11" id="file11"  onchange="loadFile11(event)" style="display: none;">
                                                        <label for="file11" style="cursor: pointer;">Upload Image_11</label><br>
                                                        <img id="output11" width="80" height="80"/>
                                                       <script>
                                                            var loadFile11 = function(event) {
                                                                   var image = document.getElementById('output11');
                                                                 var fi = document.getElementById('file11');
                                                                     if (fi.files.length > 0) { 
                                                                    for (const i = 0; i <= fi.files.length - 1; i++) { 

                                                                   const fsize = fi.files.item(i).size; 
                                                                   const file = Math.round((fsize / 1000)); 
                                                                   // The size of the file. 
                                                                   if (file > 148) { 

                                                     alert("Image too large, please resize Image_11 to 100kb. Your current image size is: "+file/1000+"mb ("+file+"kb). Image should be: Horizontal = 400px by Vertical = 300px."); 
                                                   //                    document.getElementById('size').value = file; 
                                                                            return false;                
                                                                   } else {
                                                                       image.src = URL.createObjectURL(event.target.files[0]);
                                                                   }  
                                                               }
                                                           }   
                                                               };
                                                            </script>
                                                            </label>



                                                                      <label class="col-sm-2" style="margin-left: 0px;">
                                                                <input type="file"  accept="image/*" name="fileToUpload12" id="file12"  onchange="loadFile12(event)" style="display: none;">
                                                        <label for="file12" style="cursor: pointer;">Upload Image_12</label><br>
                                                        <img id="output12" width="80" height="80"/>
                                                       <script>
                                                            var loadFile12 = function(event) {
                                                                   var image = document.getElementById('output12');
                                                                 var fi = document.getElementById('file12');
                                                                     if (fi.files.length > 0) { 
                                                                    for (const i = 0; i <= fi.files.length - 1; i++) { 

                                                                   const fsize = fi.files.item(i).size; 
                                                                   const file = Math.round((fsize / 1000)); 
                                                                   // The size of the file. 
                                                                   if (file > 148) { 

                                                     alert("Image too large, please resize Image_12 to 100kb. Your current image size is: "+file/1000+"mb ("+file+"kb). Image should be: Horizontal = 400px by Vertical = 300px."); 
                                                   //                    document.getElementById('size').value = file; 
                                                                            return false;                
                                                                   } else {
                                                                       image.src = URL.createObjectURL(event.target.files[0]);
                                                                   }  
                                                               }
                                                           }   
                                                               };
                                                            </script>
                                                            </label>

                                                              
                                                                </div>
                                                              
                                                          </center>  
                                                            
                                                            
                                                            
                                                            
                                                            
                                                          
                                                            
                                                            <div class="form-group row">
                                                                 <input type="hidden" id="duplicate_name" />  
                                                                <label class="col-sm-2 col-form-label">Name:</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control" placeholder="enter Name"  name="name" id="autocomplete" class="getname"  maxlength="50"  style="text-transform: uppercase;" required >
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Unit District:</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control" placeholder="enter Unit District"  name="regnum" id="district_zone"  maxlength="18"  style="text-transform: uppercase;" required>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Address:</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control" placeholder="enter Address"   name="address"  maxlength="70" required="">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Gender:</label>
                                                                <div class="col-sm-10">
                                                                     <select name="class" class="form-control" required>
                                                                    <option value="" disabled selected hidden>select Gender</option>
                                                                    <option value="MALE">MALE</option>
                                                                    <option value="FEMALE">FEMALE</option>
       </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Group:</label>
                                                                <div class="col-sm-10">
                                                                    <input class="form-control"  type="text" name="dob"  placeholder="enter Group Name" id="group_name"  maxlength="18"  style="text-transform: uppercase;" required>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Occupation:</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control" placeholder="enter Occupation"  type="text" name="parent" maxlength="50" required style="text-transform: uppercase">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Telephone:</label>
                                                                <div class="col-sm-10">
                                                                    <input  class="form-control" type="number" placeholder="enter phone_number" name="telephone"  maxlength="50" required>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">BVN:</label>
                                                                <div class="col-sm-10">
                                                                     <input  class="form-control" type="number" placeholder="enter BVN" name="mail"  maxlength="50" >
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Refree 1:</label>
                                                                <div class="col-sm-10">
                                                                    <input  class="form-control"   type="text" name="religion"   maxlength="50"  placeholder="enter Refree 1" maxlength="50" >
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Refree 2:</label>
                                                                <div class="col-sm-10">
                                                                   <input type="text" class="form-control" type="text" name="loginid" placeholder="enter Refree 2" maxlength="50" >
                                                                </div>
                                                            </div>
<!--                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Date of Birth:</label>
                                                                <div class="col-sm-10">
                                                                      <input type="date" class="form-control" name="dateofbirth" style="border-radius: 5px;" required="">
                                                                </div>
                                                            </div>-->
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label"></label>
                                                              
                                                                <div class="col-sm-10 mx-auto">
                                                                    <button style="margin-left: 80px;" type="submit" name="sub" id="check_duplicate" class="btn btn-success">Register</button>
                                                                     <a style="margin-left:70px;" class="btn btn-dark" href="multi_members.php">Reset</a> 
                                                                </div>
                                                              
                                                            </div>
                                                        </form>   
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
    
    
    
     <script>
      function generate_pin(){
//          var pin_no = document.getElementById('pin').value;
          document.getElementById('pin').value = Math.floor(Math.random() * 1000000);
          return false;
      }
    </script>
    
    
    
        <script>
            $(document).ready(function() {     
//          var check_duplicate = $("#check_duplicate");    
    $("#pin").click(function(){  
        document.getElementById('pin').value = Math.floor(Math.random() * 1000000);
                    });
               });     
   
        </script>
      
    
        

            <!--<center style="font-size: 18px; color: #cccccc; margin-top: 400px"><footer class="">&copy;<?php echo date('Y')?>. By Mr. Matt.</footer></center>-->
   
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
                $('#duplicate_name').val(ui.item.value); // save selected id to input
                $('#duplicate_name').trigger('change');
                return false;
            }
        });
        
        
        ////////////////////////////////////////////////////////////////////////////
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

    
    
     
     
     
     
     
    
          
     
     
                   <!--THIS IS TO CHECK DUPLICATE-->
             <script>
                  $(document).ready(function() {     
  
    $("#check_duplicate").click(function(){        
        ///////////////////////////////////////////////////////////////////
             const fi = document.getElementById('customFile'); 
           
        // Check if any file is selected. 
       
           
        
        
       
        
        
        
        
       ////////////////////////////////////////////////////////////   
           var get_name = document.getElementById('autocomplete').value;
            var trim_name =  get_name.trim();
             document.getElementById('autocomplete').value = trim_name;
         
             var studname = $("#autocomplete");
            var duplicate_nam =  $("#duplicate_name");
            
            
            if (get_name === ""){
                alert("Please fill the form to register a member first");
                 return false;
            } else {
                if(duplicate_nam.val() === studname.val()){
            var spell_name = document.getElementById('autocomplete').value;
                    alert(spell_name+ ' been registered or used. Please alternate');
                            return false;
                }
            }
       }); 
    });                    
   </script>    
            
             
             
           
   
   
   
   
   
           
           
           
           
           
           
                <!--THIS IS TO PHOTOCOPY NAME-->
             <script>
                  $(document).ready(function() {     
//          var check_duplicate = $("#check_duplicate"); //LINK TO GO AND VIEW ALL DEBTORS   
    $(".getname").keyup(function(){
                
                
                 var studname = document.getElementById("autocomplete").value;
                   
                         
             
               if (window.XMLHttpRequest)
                  {// code for IE7+, Firefox, Chrome, Opera, Safari
                        xmlhttp=new XMLHttpRequest();
                  }
                else
                  {// code for IE6, IE5
                  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                  }        
                   
                  
                     /////THIS IS TO INSERT 
                   xmlhttp.open("GET","check_name.php?name="+studname, true);
                   
                xmlhttp.send();                
                xmlhttp.onreadystatechange = function(){                                   
                    
                if(xmlhttp.readyState === 4 && xmlhttp.status=== 200) {
                               var get_response = xmlhttp.responseText;
                           var new_value =  get_response.trim();
                     document.getElementById('duplicate_name').value = new_value;
                      
                             }  
                    
               };
                
                
         }); 
         
         
         
         
         
         
         
         
         
         
         
         
            ///////THIS WAS MEANT TO BRING MORE THAN ONE VARIABLE///////////
//         $(".getname").keyup(function(){
//                   var studname = document.getElementById("autocomplete").value;
//                 
//            $.ajax({
//                url: 'check_name.php',
//                type: 'POST',
//                data: 'state_id='+studname,
//                dataType: 'json',
//                success:function(data){
//                    var len = data.length;
//                    if(len > 0){
//                    
////                        var name = data[0]['name'];
//                        var real_name = data[0]['real_name'];
//                        var check_name = data[0]['check_name'];
//                       
//                        document.getElementById('duplicate_name').value = check_name;
//                        document.getElementById('autocomplete').value = real_name;
//                        document.getElementById('costt1').value = cost;
//                        document.getElementById('costt1').value = cost;
//                          $('#costt1').trigger('change');
//                $('#costt1').value = cost;                
//                     $('#costt1').focus();
//                   
//                   
//                    }
//                }
//              });                  
//      
//            });
         
         
         
    });
                 
              </script>  
   
    
    
</body>

</html>



