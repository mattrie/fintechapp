<?php
session_start();
     
    include 'connection.php';
    
   
    $random_pin = rand(10, 1000000);
    
    
      //            UPLOAD PHOTO FUNCTION  
            function fn_resize($image_resource_id,$width,$height) {
                    $target_width =300;
                    $target_height =300;
                    $target_layer=imagecreatetruecolor($target_width,$target_height);
                    imagecopyresampled($target_layer,$image_resource_id,0,0,0,0,$target_width,$target_height, $width,$height);
                    return $target_layer;
                  }   

                             if(isset($_POST['Submit'])){
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
                                $username = $_POST['username'];
                                $pass1 = $_POST['pass'];  
                                   $pass = md5($pass1);
                                $date = date("jS F Y");
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
           
      
      $sql_statement = "INSERT INTO staff (namee, registration_num, addresss, dob, classs, parentt, telephone, mail, religion, login_id, imagess, level, username, pass) Values('$name','$regnum', '$address','$dob', '$class', '$parent','$telephone', '$mail', '$religion', '$login_id', '$target_file', '$date', '$username', '$pass')";
                     $result = mysqli_query($connect, $sql_statement); 
                                    if($result==true){
                                    echo "<script type='text/javascript'> $(document).ready(function(){ 
                swal({
                         title: 'Success!',
                         text: '$name has been successfully registered as a Staff!!',
                         icon: 'success',
                        buttons: {
                            confirm : {text:'Ok',className:'sweet-orange'},
                          
                        },
                        closeOnClickOutside: false
                       })
                  
                }); </script>"; 
                                    }
                           
                                    

                           
                           
                           
                     
            } 
//                    } else {  //Image name already exist in the database
//                     
//                  echo    "This image name has been used. Rename image and try again!!!";
//                    }
//          
//              } else { //greater than 2MB
//                  echo "File size must not be greater than 2 MB!!!"; 
//              }


//          } else { //not jpeg
//              echo "only images allowed, please choose a JPEG, JPG or PNG file!!!";
//          }

//            

    
    
    
    ?>

 
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Staff Registration</title>
  
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
//                swal({
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
                                            <h5 class="m-b-10">STAFF</h5>
                                            <p class="m-b-0">Register Staff here</p>
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
                                                        <h5>STAFF REGISTRATION FORM</h5>
                                                        <!--<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>-->
                                                    </div>
                                                    <div class="card-block">
                                                        <!--<h4 class="sub-title">Basic Inputs</h4>-->
                                                        <form action="Reg_teacher.php" method="POST" enctype="multipart/form-data">
                                                          <center> 
                                                            <div  style="width:140px; height:140px;" class="mb-5">
                                                                <img id="img123" src="#" alt="CLICK 'BROWSE' TO UPLOAD PHOTO"  style="border: 4px #99ff99 solid; width:140px; height:140px;" >

                                                                <div class="custom-file mb-3" style="width: 200px;">
                                                                    <input type="file" class="custom-file-input" id="customFile" name="fileToUpload" accept="image/*" >
                                                                    <label class="custom-file-label" for="customFile">Choose Photo>></label>
                                                                </div> 
                                                             </div>
                                                          </center>  
                                                          
                                                            
                                                            <div class="form-group row">
                                                                 <input type="hidden" id="duplicate_name" />  
                                                                <label class="col-sm-2 col-form-label">Name:</label>
                                                                <div class="col-sm-10">
                                                                      <input type="text" class="form-control" placeholder="enter Name"  name="name"    maxlength="50"  style="text-transform: uppercase;" required>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Staff Number:</label>
                                                                <div class="col-sm-10">
                                                                      <input type="text" class="form-control" placeholder="enter Staff Number" name="regnum"  maxlength="12"  style="text-transform: uppercase;" required>
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
                                                                <label class="col-sm-2 col-form-label">Date of Birth:</label>
                                                                <div class="col-sm-10">
                                                                    <input  class="form-control"  type="date" name="dob"  placeholder="Date of Birth"  required>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Duty/Role:</label>
                                                                <div class="col-sm-10">
                                                                   <input type="text" class="form-control" placeholder="enter Duty/Role" type="text" name="parent" maxlength="50" required style="text-transform: uppercase">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Telephone:</label>
                                                                <div class="col-sm-10">
                                                                   <input  class="form-control" type="number" placeholder="enter phone_number" name="telephone"  maxlength="50" required>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Email:</label>
                                                                <div class="col-sm-10">
                                                                     <input  class="form-control"   type="email" placeholder="enter E-mail" name="mail"   maxlength="50" required>
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
                                                            <div class="form-group row">
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
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label"></label>
                                                              
                                                                <div class="col-sm-10 mx-auto">
                                                                    <input style="" type="submit" name="Submit"  class="btn btn-success button-distance" value="Register"/>
                                                                    <a style="margin-left:70px;" class="btn btn-dark" href="Reg_teacher.php">Reset</a> 
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
 
    
   <?php
//         if(isset($_POST['reset'])){
//             @header("location:members.php");
//         }
    //    ob_start();
    //session_start();
    


   

    ?>
    
    
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
             
       ////////////////////////////////////////////////////////////   
           var get_name = document.getElementById('autocomplete').value;
            var trim_name =  get_name.trim();
             document.getElementById('autocomplete').value = trim_name;
         
             var studname = $("#autocomplete");
            var duplicate_nam =  $("#duplicate_name");
            
            
            if (get_name === ""){
                swal({
                         title: 'Not Allowed!',
                         text:  'Please fill the form to register a staff first',
                         icon: 'error',
                        buttons: {
                            confirm : {text:'Ok',className:'sweet-orange'}
                          
                        },
                        closeOnClickOutside: false
                       });
                 return false;
            } else {
                if(duplicate_nam.val() === studname.val()){
            var spell_name = document.getElementById('autocomplete').value;
                  swal({
                         title: 'Duplicate!',
                         text: spell_name + ' been registered or used. Please alternate',
                         icon: 'warning',
                        buttons: {
                            confirm : {text:'Ok',className:'sweet-orange'}
                          
                        },
                        closeOnClickOutside: false
                       });
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



