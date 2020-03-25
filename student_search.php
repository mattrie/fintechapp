<?php
session_start();
 
    include 'connection.php';
  
//         if(isset($_POST['reset'])){
//             @header("location:student_search.php");
//         }
    //    ob_start();
    //session_start();
    
                     
      ////////////////////////UPDATE///////////////////////////////////////   
    ///////////////////////////lets upload the file first/////////////////////////////////////////////                      
           if(!empty($_FILES['fileToUpload']['name'])){
               
         $target_dir = "images/";// this is the directory to upload to
                        
                   //get file name and set to target directory
               $target_file = @($target_dir . basename($_FILES["fileToUpload"]["name"]));

              @($getfile_name = $_FILES['fileToUpload']['name']);
              @($getfile_size = $_FILES['fileToUpload']['size']);
              @($getfile_tmp_dir = $_FILES['fileToUpload']['tmp_name']);
              @($getfile_type = $_FILES['fileToUpload']['type']);
              @($identifyFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION)));


  
             move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
               } else {
                       if(isset($_POST['imge'])){
                        $images = $_POST['imge'];
                        @$target_file = $images;         
                        }
                   
                     }
                 
                             if(isset($_POST['udate'])){                                         
                                $get_name = $_POST['shadow'];
                                 $black_list = $_POST['black_list'];
                                   $black_desc = $_POST['black_desc'];
                                $name = strtoupper($_POST['name']);
                                $regnum = strtoupper($_POST['regnum']);
                                $address = $_POST['address'];
                                $branch = $_POST['branch'];
                                $dob = str_replace("'", "", $_POST['dob']);
                                $class = $_POST['class'];
                                $parent = strtoupper($_POST['parent']);
                                $telephone = $_POST['telephone'];
                                $mail = $_POST['mail'];
                                $religion = $_POST['religion'];
                                $login_id = $_POST['loginid']; 
                                $id = $_POST['idd'];
//                                $identity = $_POST['identity'];
                                $dateofbirth = $_POST['dateofbirth'];
                               
        //////////////UPDATE OTHERS
              $old_name = $_POST['old_name'];
                
              if (($_SESSION['not_yet']) == "not_yet" ) {
                  
                $from_phone = "08033963904";
                $from_address = "xyz plaza, opposite First Bank jankara"; 
                $from_email = "finsoluteinvestment@gmail.com";
            $message_text = "You have been invited to the above address for loan request.";
             $email =  $_SESSION['email'];
             
                $to = $email;              
                $subject = "INVITATION TO FINSOLUTE";
       
                $message = "
                <html>
                <head>
                <title>FINSOLUTE INVESTMENT</title>
                </head>
                <body>
                <p>Invitation for Loan Grant</p>
                <table>
                <tr>
                <th>----</th>
                <th>-------</th>
                </tr>
                <tr>
                <td>Email:</td>
                <td>".$from_email."</td>
                </tr>                
                <tr>
                <td>Address:</td>
                <td>".$from_address."</td>
                </tr>
                <tr>
                <td>Phone:</td>
                <td>".$from_phone."</td>
                </tr>                
                <tr>
                <td>Instruction:</td>
                <td>".$message_text."</td>
                </tr>
                </table>
                </body>
                </html>
                ";



                 // Always set content-type when sending HTML email
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                    // More headers
                $headers .= 'From: <FINSOLUTE>' . "\r\n";
                $headers .= 'Cc: ' . "\r\n";

              $mailsent =  mail($to,$subject,$message,$headers);


          
                  
                  
                  
                $additional = "Registered!! and inducted to the database. An email has been sent to $name for invitation."; 
            
                } else {
                  $additional  = "updated!!"; 
              }  
                       
                   //UPDATE Group For All loan and name
          $sql_statement1 = mysqli_query($connect, "UPDATE allloan SET dob = '$dob', name = '$name', branch = '$branch' WHERE name = '$name' OR name = '$old_name'");
          ///THIS IS FOR ERROR MSG IN DATABASE
//          printf("Errormessage: %s\n", mysqli_error($connect));
          
             //UPDATE Group For All monthly loan
          $sql_statement12 = mysqli_query($connect, "UPDATE monthly_allloan SET dob = '$dob', name = '$name', branch = '$branch' WHERE name = '$name' OR name = '$old_name'");
            
          
           //UPDATE Group For All weekly loan
          $sql_statement13 = mysqli_query($connect, "UPDATE weekly_allloan SET dob = '$dob', name = '$name', branch = '$branch' WHERE name = '$name' OR name = '$old_name'");
           
          
            //UPDATE Contribution for branch
          $sql_statement14 = mysqli_query($connect, "UPDATE contribution SET branch = '$branch' WHERE name = '$name' OR name = '$old_name'");
           
                 
                     //UPDATE RECORD
      @$sql_statement = "UPDATE members SET namee = '$name', registration_num = '$regnum', addresss = '$address', dob = '$dob', classs = '$class', parentt = '$parent', telephone = '$telephone', mail = '$mail', religion = '$religion', login_id = '$login_id', imagess = '$target_file', dateofbirth = '$dateofbirth', not_yet = '', black_list = '$black_list', black_desc = '$black_desc', branch = '$branch' WHERE id = '$id'";
                     $result = mysqli_query($connect, $sql_statement); 
                                    if($result==true){
                                   echo "<script type='text/javascript'> $(document).ready(function(){ 
                swal({
                         title: 'Success!',
                         text: '$name has been successfully $additional',
                         icon: 'success',
                        buttons: {
                            confirm : {text:'Ok',className:'sweet-orange'},
                          
                        },
                        closeOnClickOutside: false
                       })
                  
                }); </script>";
                                     '';  
                                     $id = "";
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
                           
              $_SESSION['not_yet'] = "";  
              
              
                  }    


                        
         //////////////////////////////DELETE////////////////////////////////////////////
                    if(isset($_POST['dele'])){
                                
                    
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
                                
                            
//                     //Delete RECORD from fees
//      @$resultt = mysqli_query($connect, "DELETE FROM student_fees WHERE name ='$name'");
//      
//           //Delete RECORD from school_fees_breakdown
//      @$answer = mysqli_query($connect, "DELETE FROM school_fees_breakdown WHERE namee ='$name'");
//              
//                        //then Delete record in student database
//      @$sql_statement = "DELETE FROM student WHERE id = '$id'";
      
                 
                     $result = mysqli_query($connect, $sql_statement); 
                                    if($result==true){
                                   echo "<script>alert('$name has been successfully deleted');</script>";
                                    }
                          
                         } else {
                            echo ""; //leave blank 
                        }    
                        

    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Customer Edit Info</title>
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
                if (file > 148) { 
                   swal({
                         title: 'Not Allowed!',
                         text:  'Image too large, please resize image to 100kb. Your current image size is: '+file/1000+'mb ('+file+'kb). Image should be: Horizontal = 400px by Vertical = 300px.',
                         icon: 'error',
                        buttons: {
                            confirm : {text:'Ok',className:'sweet-orange'}
                          
                        },
                        closeOnClickOutside: false
                       });
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
       <?php
                         $name_from_all = "";
$older_name = $get_branch = $black_desc=$black_list = $email = $card = $prop_amt = $not_yet = $get_name = $date = $images = $id = $name = $regnum = $dateofbirth= $address = $dob = $class = $parent = $telephone = $mail = $religion = $login_id = "";
                         
                   if (isset($_GET['name'])){
                     $name_from_all = $_GET['name'];  
                     
                     
                     $get_name = $_GET['name'];
       $sql_state = "SELECT * FROM members WHERE namee = '$get_name'";
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
                $dateofbirth = $row["dateofbirth"];
                $not_yet = $row["not_yet"];
                $card = $row["card"];
                $prop_amt = $row["prop_amt"];
                $email = $row["email"];
                  $black_list = $row["black_list"];
                $black_desc = $row["black_desc"];  
                  $get_branch = $row["branch"];  
              }
            
              $_SESSION['email'] = $email;
            $older_name = $name;    
            $_SESSION['not_yet'] = $not_yet;         
                     
                  
                   }
                   ?>    
     
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
                                            <h5 class="m-b-10">Search Customer</h5>
                                            <p class="m-b-0">Edit/Modify Customer Info</p>
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
                                                        <h5>CUSTOMER REGISTRATION FORM</h5>
                                                        <!--<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>-->
                                                    </div>
                                                    <div class="card-block">
                                     <!--====================SEARCHING STUDENT-->
           <form action="student_search.php" method="POST" enctype="multipart/form-data" >
              <center>
         <div class="input-group mb-3">
             <input type="text" class="form-control" id="autocomplete" name="srch" placeholder="Search Customer"  required=""   >
    <div class="input-group-append">
        <button class="btn btn-warning" style="color: black;" id="btnsearch" name="btnsrch" type="submit">SEARCH</button>  
     </div>
  </div>
        </center>  
             
        
          <!--///////////////////////////////////////////-->        
          
          <?php
//          session_start();
      if (isset($_POST['btnsrch'])){
                       
                $get_name = $_POST['srch'];
       $sql_state = "SELECT * FROM members WHERE namee = '$get_name'";
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
                $dateofbirth = $row["dateofbirth"];
                $not_yet = $row["not_yet"];
                    $card = $row["card"];
                $prop_amt = $row["prop_amt"];
                $black_list = $row["black_list"];
               $email = $row["email"];
                $black_desc = $row["black_desc"];
                  $get_branch = $row["branch"];  
              }
            
              $_SESSION['email'] = $email;
            $older_name = $name;    
            $_SESSION['not_yet'] = $not_yet;     
            
//              echo "<script>alert('$email')</script>"; 
        }
          ?>
          
    
       
     </form>                     
                                                        
                                                        
                                                        
                                                        <!--<h4 class="sub-title">Basic Inputs</h4>-->
                                                        <form action="student_search.php" method="POST" enctype="multipart/form-data">
                                                          <center> 
                                                            <div  style="width:140px; height:140px;" class="mb-5">
                                                                 <img class="myImg" id="img123" src="<?php echo $images;?>" alt="CLICK 'BROWSE' TO UPLOAD PHOTO"  style="border: 4px #99ff99 solid; width:140px; height:140px;" >
                                                                <input type="hidden" name="idd" value="<?php echo $id;?>" />   
                                                               <input type="hidden" name="imge" value="<?php echo $images;?>" /> 
                                                                <div class="custom-file mb-3" style="width: 200px;">
                                                                    <input type="file" class="custom-file-input" id="customFile" name="fileToUpload" accept="image/*" >
                                                                    <i class="custom-file-label" for="customFile">Choose Photo>></i>
                                                                </div> 
                                                             </div>
                                                              <div id="myModal33" class="modal22">
      
      <img class="modal-content" id="img01">
      <div id="caption"></div>
    </div> 
                                                          </center>  
                                                          
                                                            <?php
                                                                      if ($not_yet != "") {
                                                                           echo '<center style="margin-bottom:25px;">    <img src="'.$card.'" width="250" height="150" /></center>';
                                                                           echo "<center style='font-size:20px; font-weight:bolder;margin-bottom:15px; color:green;'>Under consideration. Press Register to INDUCT.  [Proposed Loan: N". number_format($prop_amt)."]</center>";
                                                                        $label = "Register";
                                                                           
                                                                      } else {
                                                                          $label = "Update";
                                                                      }    
                                                            
                                                                      ?>
                                                            
                                                            <div class="form-group row">
                                                                 
                                                                <label class="col-sm-2 col-form-label">Name:</label>
                                                                <div class="col-sm-10">
                                                                   <input type="hidden" id="duplicate_name" />      
                                                              <input type="text" class="form-control" placeholder="enter Name"  id="nam" type="text" name="name" value="<?php echo $name;?>"  maxlength="50"  style="text-transform: uppercase;" required>
                                                                </div>
                                                            </div>
                                                            <input type="hidden" value="<?php echo $older_name ?>" name="old_name">
                                                            <div class="form-group row">
                                                                <input type="hidden" id="duplicate_name" />
                                                                <label class="col-sm-2 col-form-label">Select
                                                                    Branch:</label>
                                                                <div class="col-sm-10">
                                                                    <select class="form-control" name="branch"
                                                                        id="branch" required>
                                                                        <option value="<?php echo $get_branch;?>" hidden><?php echo $get_branch;?></option>
                                                                        <?php
                                                                        $sql_all_names = mysqli_query($connect, "SELECT * FROM branch ORDER BY name ASC");
                                                                        while ($row = mysqli_fetch_assoc($sql_all_names)) {
                                                                            echo '<option value="' . $row['name'] . '">' . $row['name'] . '</option>';
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <input type="hidden" name="shadow" value="<?php echo $get_name;?>"/>
                                                            
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Unit District:</label>
                                                                <div class="col-sm-10">
                                                                     <input type="text" class="form-control" placeholder="enter Unit District" id="district_zone" name="regnum" value="<?php echo $regnum;?>"  maxlength="12"  style="text-transform: uppercase;" required>
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
                                                                <label class="col-sm-2 col-form-label">Black List*:</label>
                                                                <div class="col-sm-10">
                                                                     <select name="black_list" class="form-control" >
                                                     <option value="<?php echo $black_list;?>"><?php echo $black_list;?></option>
                                                     <option value="YES">YES</option>
                                                     <option value="NO">NO</option>

                                                                    </select>
                                                                </div>
                                                                
                                                            </div>    
                                                            
                                                             <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Description*:</label>
                                                                <div class="col-sm-10">
                                                                    <input  class="form-control"  type="text" name="black_desc"  placeholder="Describbe the reason for black list" id="black_desc" value="<?php echo $black_desc;?>"  maxlength="200"  >
                                                                </div>
                                                            </div> 
                                                            
                                                            
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Group:</label>
                                                                <div class="col-sm-10">
                                                                    <input  class="form-control"  type="text" name="dob"  placeholder="enter Group Name" id="group_name" value="<?php echo $dob;?>"  maxlength="18"  style="text-transform: uppercase;" required>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Occupation:</label>
                                                                <div class="col-sm-10">
                                                                   <input type="text" class="form-control" placeholder="enter Occupation" value="<?php echo $parent;?>" type="text" name="parent" maxlength="50" required style="text-transform: uppercase">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Telephone:</label>
                                                                <div class="col-sm-10">
                                                                     <input  class="form-control" type="number" value="<?php echo $telephone;?>" placeholder="enter phone_number" name="telephone"  maxlength="50" required>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">BVN:</label>
                                                                <div class="col-sm-10">
                                                                    <input  class="form-control"   type="number"  placeholder="enter BVN" value="<?php echo $mail;?>" name="mail"  maxlength="50" >
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Refree 1:</label>
                                                                <div class="col-sm-10">
                                                                    <input  class="form-control"   type="text"  name="religion"   required=""  maxlength="50"  placeholder="enter Refree 1 (A must)" value="<?php echo $religion;?>" maxlength="50" >  
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Refree 2:</label>
                                                                <div class="col-sm-10">
                                                                   <input type="text" class="form-control" type="text" name="loginid" placeholder="enter Refree 2 (optional)"  value="<?php echo $login_id;?>" maxlength="50">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Date of Birth:</label>
                                                                <div class="col-sm-10">
                                                                      <input type="date" name="dateofbirth" class="form-control" value="<?php echo $dateofbirth;?>" style="border-radius: 5px;" required="">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Date Registered:</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" value="<?php echo $date;?>" readonly="" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label"></label>
                                                              
                                                                <div class="col-sm-10 mx-auto">
                                                                    <input style="" class="btn btn-success button-distance" id="update"  type="submit" name="udate"  value="<?php echo $label;?>" />
                                                                   <a style="margin-left:80px;" class="btn btn-dark" href="student_search.php">Reset</a>
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
        
        
        
        
         $( "#autocom_branch" ).autocomplete({
            source: function( request, response ) {
                
                $.ajax({
                    url: "autocom_branch.php",
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
                $('#autocom_branch').val(ui.item.label); // display the selected text
//                $('#autocom_branch').val(ui.item.value); // save selected id to input
              
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
   
   
    
     <script>
        $(document).ready(function (){
        $(".myImg").click(function(){
          
       
    // Get the modal
    var modal = document.getElementById("myModal33");

    // Get the image and insert it inside the modal - use its "alt" text as a caption
//    var img = document.getElementsByClassName("myImg");
    var modalImg = document.getElementById("img01");
    var captionText = document.getElementById("caption");
   
      modal.style.display = "block";
      modalImg.src = this.src;
      captionText.innerHTML = this.alt;
    
 })  ;  
        });
  
    </script>
<script>
    
   
    var span = document.getElementsByClassName("modal22")[0];
 $(document).ready(function (){
        $(span).click(function(){
    var modal = document.getElementById("myModal33");
 
   modal.style.display = "none";
  
    })  ;  
        });
</script>
</body>

</html>


