<?php
session_start();
  if(empty($_SESSION['name_id_staff'])){
//         echo "<script>alert('You must first login');</script>";
          echo "<script>alert('You must first login');
         window.location = 'staff_login.php';</script>";
 }
    include 'connection.php';
    ?>

<!DOCTYPE html>
<html>
  <head>
	  <title>SEARCH_CUSTOMER_INFO</title> <meta content="width=device-width, initial-scale=1.0" name="viewport">
            <!-- Script -->
    <script src='jquery-3.1.1.min.js' type='text/javascript'></script>

    <!-- jQuery UI -->
     
    <link href='jquery-ui.min.css' rel='stylesheet' type='text/css'>
    <script src='jquery-ui.min.js' type='text/javascript'></script>
        <meta charset="utf-8">
        <!--Boostrap & family-->
  <!--<link rel="stylesheet" href="maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
 <link rel="stylesheet" href="maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
 
  <!--<script src="ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->
  <script src="cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  
        
        
        <style>
           body{
                       background-image: url('images/test_image12.jpeg');
                  background-size: 100%;
                     background-repeat: no-repeat;
                    }
            
            .dropdown-item:hover{
                background-color: black;
                color: #ff5d0f;
            }
            
           li a{
             color: black; 
            }
        </style>
      
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
       
    
 

     
   
     
     
  </head>
   <body style="background-color: #e0d3d3;">
       
 <!--NAV BAR WITH BRANDING-->
  <!--NAV BAR WITH BRANDING-->
      <?php
      
       include 'staff_navbar.php';
      ?>
 
 

   
     
     
     
     
     
         <!--=================== THIS THE FORM BOX-->
    <div class="container" style="margin-top: 70px;">  
      <div style="border: 2px #ff5d0f solid; border-radius: 32px; height: 680px; width: 750px; padding: 21px; border-top-width: 14px;
    border-top-color: #ff5d0f;
    background-color: #ffe8f6;
    border-radius: 22px;" class="mx-auto">
          
           <!--====================SEARCHING STUDENT-->
           <form action="staff_student_search.php" method="POST" enctype="multipart/form-data" >
              <center>
         <div class="input-group mb-3">
    <input type="text" class="form-control" id="autocomplete" name="srch" placeholder="Search Customer" required=""   >
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
              }
              
            $_SESSION['old_name'] = $name; 
        }
          ?>
          
    
       
     </form>   
         
   
  
         
          
          
       
           
           
     <form action="staff_student_search.php" method="POST" enctype="multipart/form-data" style="width: 300px;">
      
      <div class="media">
    
    <div class="media-body">  
        
             
      
   
    <div class="form-group">
         <input type="hidden" id="duplicate_name" />      
         <input type="text" class="form-control" placeholder="enter Name"   id="nam" type="text" name="name" value="<?php echo $name;?>"  maxlength="50"  style="text-transform: uppercase;" required>
       </div>
      
          <input type="hidden" name="shadow" value="<?php echo $get_name;?>"/>
      
    <div class="form-group">    
        <input type="text" class="form-control" placeholder="enter Unit District" id="district_zone"  name="regnum" value="<?php echo $regnum;?>"  maxlength="12"  style="text-transform: uppercase;" required>
    </div>
        
        
          <div class="form-group">    
      <input type="text" class="form-control" placeholder="enter Address"   name="address" value="<?php echo $address;?>"  maxlength="70" required="">
    </div>
        
        
             
    <div class="form-group">     
      <input  class="form-control"  type="text" name="dob"  placeholder="enter Group Name" id="group_name" value="<?php echo $dob;?>"  maxlength="18"  style="text-transform: uppercase;" required>
    </div>
           
          
                 <!--CLASS IS NOW GENDER OOOOOOOOOOOOOO-->
          <div class="form-group">      
     <select name="class" class="form-control" required>
                                                     <option value="<?php echo $class;?>"><?php echo $class;?></option>
                                                     <option value="MALE">MALE</option>
                                                     <option value="FEMALE">FEMALE</option>

     </select>
          </div>
        
        
          <div class="form-group">     
      <input type="text" class="form-control" placeholder="enter Occupation" value="<?php echo $parent;?>"  type="text" name="parent" maxlength="50" required style="text-transform: uppercase">
    </div>
        
            <div class="form-group">    
                <input  class="form-control" type="number" value="<?php echo $telephone;?>" placeholder="enter phone_number" name="telephone"  maxlength="50" required>
            </div>
        
        
        
          <div class="form-group">     
              <input  class="form-control"   type="number"  placeholder="enter BVN" value="<?php echo $mail;?>" name="mail"  maxlength="50" >
    </div>
        
        
          <div class="form-group"> 
            <input  class="form-control"   type="text"  name="religion"   maxlength="50"  placeholder="enter Refree 1" value="<?php echo $religion;?>" maxlength="50" >  
          </div>
        
        
          <div class="form-group">
              <input type="text" class="form-control" type="text" name="loginid" placeholder="enter Refree 2"  value="<?php echo $login_id;?>" maxlength="50">
    </div>
  

        <!--<button style="margin-left:200px;" type="submit" name="Submit" id="check_duplicate" class="btn btn-success">Register</button>-->
         
        <input style="margin-left:300px;" class="btn btn-success" id="update"  type="submit" name="udate"  value="Update" />       
        <!--<input style="margin-left:80px;" class="btn btn-danger" id="delete" type="submit" name="dele"  value="Delete" />-->  
       
    
    </div>
      
       <div  style="margin-left: 40px; width:140px; height:140px;">
            <img id="img123" src="<?php echo $images;?>" alt="CLICK 'BROWSE' TO UPLOAD PHOTO"  style="border: 4px #99ff99 solid; width:140px; height:140px;" >
               <input type="hidden" name="idd" value="<?php echo $id;?>" />   
              <input type="hidden" name="imge" value="<?php echo $images;?>" /> 
            <div class="custom-file mb-3" style="width: 200px;">
                <input type="file" class="custom-file-input" id="customFile" name="fileToUpload" accept="image/*" >
                <label class="custom-file-label" for="customFile">Choose Photo>></label>
            </div> 
              
              
            <?php
       
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
                                
        //////////////UPDATE OTHERS
              $old_name = $_SESSION['old_name'];
               
                     //UPDATE CONTRIBUTION RECORD
          $sql_statement1 = mysqli_query($connect, "UPDATE contribution SET name = '$name' WHERE name = '$old_name'");
                
          
          //UPDATE LOAN RECORD
          $sql_statement2 = mysqli_query($connect, "UPDATE loan SET name = '$name' WHERE name = '$old_name'");
           
            //UPDATE LOAN RECORD
          $sql_statement3 = mysqli_query($connect, "UPDATE witdraw SET name = '$name' WHERE name = '$old_name'");
           
                      
                     //UPDATE RECORD
      @$sql_statement = "UPDATE members SET namee = '$name', registration_num = '$regnum', addresss = '$address', dob = '$dob', classs = '$class', parentt = '$parent', telephone = '$telephone', mail = '$mail', religion = '$religion', login_id = '$login_id', imagess = '$target_file' WHERE id = '$id'";
                     $result = mysqli_query($connect, $sql_statement); 
                                    if($result==true && $identity != ""){
                                   echo "<script>alert('$name has been successfully updated!!');</script>";
                                     '';  
                                     $id = "";
                                    } else {
                           echo "<script>alert('Not updated!!');</script>";
                                    
                           }      
                               
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
              
              <label style="margin-top: 35px;" >Database id:</label><br><input type="text" value="<?php echo $id;?>" name="identity" readonly="" style="margin-bottom: 15px;  border-radius: 5px; padding-left: 8px;"><br>
          
                Date registered:<br><input type="text" value="<?php echo $date;?>" readonly="" style="margin-bottom: 15px; border-radius: 5px; padding-left: 8px;"><br>
          
              
               <a style="margin-left:40px; margin-top: 60px; margin-bottom: 15px;" class="btn btn-dark" href="staff_student_search.php">Reset</a> <br>
             
       </div>
       
           
     
             
   </div>
      
     
      
      </form>
           
         
          
 </div>
    
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        

             
             
  
        
            

             
        

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
   
    </div>
      </body>
  </html>



