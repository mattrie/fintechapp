<?php
session_start();
 
    include 'connection.php';
    
   
    $random_pin = rand(10, 1000000);
  
    
    


    
        
                             if(isset($_POST['Submit'])){                              
                                 
           
   
                  
                
              
                                 
                                $name = strtoupper($_POST['name']);
                            
                                                                  
                                $add = $_POST['add'];
                               
                                $date = date("Y-m-d");
                                
       
                
                    
           
                         ///INSERT NEW MEMBER TO DATABASE
                                
      $result = mysqli_query($connect, "INSERT INTO branch (name, address, date) VALUES('$name', '$add', '$date')");
                     
                     ///THIS IS FOR ERROR MSG IN DATABASE
//                     printf("Errormessage: %s\n", mysqli_error($connect));
                                    if($result==true){
                                    echo "<script type='text/javascript'> $(document).ready(function(){ 
                swal({
                         title: 'Success!',
                         text: '$name branch is successfully registered!!',
                         icon: 'success',
                        buttons: {
                            confirm : {text:'Ok',className:'sweet-orange'},
                          
                        },
                        closeOnClickOutside: false
                       })
                  
                }); </script>";  
                                        
                                    }
               
                     
            } 
   
            
            
            
            
            

     
           
       
                     
                  
           

    ?>
            



<!DOCTYPE html>
<html lang="en">

<head>
    <title>Branch</title>
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
  <style>
     
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
                                            <h5 class="m-b-10">Branch</h5>
                                            <p class="m-b-0">Branch Registration</p>
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
                                                        <h5>BRANCH REGISTRATION</h5>
                                                        <!--<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>-->
                                                    </div>
                                                    <div class="card-block">
                                                        <!--<h4 class="sub-title">Basic Inputs</h4>-->
                                                        <form action="reg_branch.php" method="POST" enctype="multipart/form-data">
                                                            
                                                            <div class="form-group row">
                                                                 <input type="hidden" id="duplicate_name" />  
                                                                <label class="col-sm-2 col-form-label">Branch Name:</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control" placeholder="enter Branch Name"  name="name"  class="getname"  maxlength="70"  style="text-transform: uppercase;" required >
                                                                </div>
                                                            </div>
                                                           
                                                            
                                                            
                                                             <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Address</label>
                                                                <div class="col-sm-10">
                                                                    <input class="form-control"  type="text" name="add"  placeholder="enter Branch Address"  maxlength="150"   required>
                                                                </div>
                                                            </div>
                                                            <br>
                                                          
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label"></label>
                                                              
                                                                <div class="col-sm-10 mx-auto">
                                                                     <input type="hidden" id="hid_sub" value="1">
                                                                    <button style="" type="submit" name="Submit" id="check_duplicate" class="btn btn-success button-distance">Register</button>
                                                                     <a style="margin-left:70px;" class="btn btn-dark" href="reg_branch.php">Reset</a> 
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
       let imgInput = document.getElementById('customFile');
        imgInput.addEventListener('change', function (e) {
            if (e.target.files) {
                let imageFile = e.target.files[0];
                var reader = new FileReader();
                reader.onload = function (e) {
                    var img = document.createElement("img");
                    img.onload = function (event) {
                        // Dynamically create a canvas element
                        var canvas = document.createElement("canvas");

                        // var canvas = document.getElementById("canvas");
                        var ctx = canvas.getContext("2d");

                        // Actual resizing
                        ctx.drawImage(img, 0, 0, 300, 160);

                        // Show resized image in preview element
                        var dataurl = canvas.toDataURL(imageFile.type);
                        document.getElementById("img123").src = dataurl;
                       
                    };
                    img.src = e.target.result;
                };
                reader.readAsDataURL(imageFile);
            }
        });
     </script> 
     
    
    
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
       //             alert("Processing: You have clicked submit button, do not click again");
            var hid_sub = document.getElementById('hid_sub').value;
           document.getElementById('hid_sub').value = "0"; 
           
           
           if(hid_sub === "0"){
           swal({
                         title: 'Not Allowed!',
                         text:  'Processing: You have already clicked submit button, cannot resubmit',
                         icon: 'error',
                        buttons: {
                            confirm : {text:'Ok',className:'sweet-orange'}
                          
                        },
                        closeOnClickOutside: false
                       });
           return false;
       } 
       ////////////////////////////////////////////////////////////   
           var get_name = document.getElementById('autocomplete').value;
            var trim_name =  get_name.trim();
             document.getElementById('autocomplete').value = trim_name;
         
             var studname = $("#autocomplete");
            var duplicate_nam =  $("#duplicate_name");
            
            
            if (get_name === ""){
                  swal({
                         title: 'Not Allowed!',
                         text:  'Please fill the form to register a member first',
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








