<?php
session_start();
 if(empty($_SESSION['id_admin'])){
//         echo "<script>alert('You must first login');</script>";
          echo "<script>alert('You must first login');
         window.location = 'fin_admin.php';</script>";
 }
    include 'connection.php';
    ?>

<!DOCTYPE html>
<html>
  <head>
	  <title>Withdrawal</title> <meta content="width=device-width, initial-scale=1.0" name="viewport">
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
               var img = document.querySelector('img');  // $('img')[0]
               img.src = URL.createObjectURL(this.files[0]); // set src to blob url
               img.onload = imageIsLoaded;
              }
         });
        });

       
     </script>

     
   
     
     
  </head>
   <body style="background-color: #e0d3d3;">
       
 <!--NAV BAR WITH BRANDING-->
   <nav class="navbar navbar-expand-md bg-success text-body navbar-dark fixed-top" style="color:whitesmoke;">
       <a class="navbar-brand" href="staff_login.php"><img src="images/nairaor.JPG" alt="logo" style="width: 40px; height: 40px; border-radius: 5px;">  FINSOLUTE</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
       
       <label style="font-size: 16px;">
     <!--THIS DOES NOT ATTACH ANY FORM OF DROP DOWN-->
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
          <ul class="navbar-nav">
  
    
     <li class="nav-item">
        <a class="nav-link" style="color: cornsilk;" href="staff_home.php">DashBoard</a>
    </li>
    
     <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" style="color: cornsilk;" href="#" id="navbardrop" data-toggle="dropdown">
                   Member
                 </a>
                 <div class="dropdown-menu">
                    <a class="dropdown-item" href="staff_contribution.php">Contribution</a>
                    <a class="dropdown-item" href="staff_withdrawals.php">Withdrawals </a>           
                 
                 </div>
            </li> 
            
    
            
            
<!--             <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" style="color: cornsilk;" href="#" id="navbardrop" data-toggle="dropdown">
                   View Today
                 </a>
                 <div class="dropdown-menu">
                       <a class="dropdown-item" href="today_repayment.php">Today's Repayment</a>
                <a class="dropdown-item" href="today_disbursment.php">Today's Disbursment</a>
                     <a class="dropdown-item" href="today_deposit.php">Today's Deposit</a>
                   <a class="dropdown-item" href="today_withdrawal.php">Today's Withdrawal</a>
              
                 </div>
            </li> -->
            
            
            
            
            
             <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" style="color: cornsilk;" href="#" id="navbardrop" data-toggle="dropdown">
                   Loan
                 </a>
                 <div class="dropdown-menu">
                   <a class="dropdown-item" href="staff_get_loan.php">Get Loan</a>
                   <a class="dropdown-item" href="staff_payment.php">Payments of Loan</a>
                   
                   <!--<a class="dropdown-item" href="edit_interest.php">Edit Intrest Rate</a>-->
                  
                 </div>
            </li> 
            
          
       <li class="nav-item"><a class="nav-link" style="color: cornsilk;" href="staff_login.php">Logout</a></li>
    
 
  </ul>
       </div> 
      </label>     
     </nav>
 
 

   
     
     
     
     
     
         <!--=================== THIS IS THE FORM BOX-->
    <div class="container" style="margin-top: 70px;">  
      <div style="border: 2px #ff5d0f solid; border-radius: 32px; height: 680px; width: 750px; padding: 21px; border-top-width: 14px;
    border-top-color: #ff5d0f;
    background-color: #ffe8f6;
    border-radius: 22px;" class="mx-auto">
          
        
          
          
          
          <!--====================SEARCHING STUDENT-->
          <form action="staff_withdrawals.php" method="POST" enctype="multipart/form-data" >
              <center>
         <div class="input-group mb-3">
    <input type="text" class="form-control" id="autocomplete" name="srch" placeholder="Search Customer To Make Withdrawal" required=""   >
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
        }
          ?>
          
    
       
     </form>   
         
   
  
         
          
          
       
           
           
          <form action="staff_withdrawals.php" method="POST" enctype="multipart/form-data" style="width: 300px;">
      
      <div class="media">
    
    <div class="media-body">  
        
             
      
   
    <div class="form-group">
         <input type="hidden" id="duplicate_name" />      
         <input type="text" class="form-control" placeholder="Name"   id="nam" type="text" name="name" value="<?php echo $name;?>"  maxlength="50" readonly="" style="text-transform: uppercase;" required>
       </div>
      
          <input type="hidden" name="shadow" value="<?php echo $get_name;?>"/>
      
    <div class="form-group">    
        <input type="text" class="form-control" placeholder="District"  name="regnum" value="<?php echo $regnum;?>"  maxlength="12" readonly=""  style="text-transform: uppercase;" required>
    </div>
        
        
        
        
        
        
       
        
          <div style="margin-top: 150px; margin-left: 40px;">
       <div class="form-group">  
            <label >Enter Current Amount To Withdraw:</label>
           <input type="number" class="form-control" placeholder="enter Amount"  type="text" name="parent" maxlength="10" required >
    </div>
     
          
<!--            <div class="form-group">   
                 <label>Enter Current Rate:</label>
                 <input  class="form-control" type="date" name="telephone"  maxlength="10" required>
            </div>-->
        
        </div>  
          
         
          
        
        
    <!--            <div class="form-group">     
              <input  class="form-control"   type="email"  placeholder="enter E-mail" value="<?php echo $mail;?>" name="mail"   maxlength="50" required>
    </div>
        
        
          <div class="form-group"> 
            <input  class="form-control"   type="text"  name="religion"   maxlength="50"  placeholder="enter Refree 1" value="<?php echo $religion;?>" maxlength="50" required>  
          </div>
        
        
          <div class="form-group">
              <input type="text" class="form-control" type="text" name="loginid" placeholder="enter Refree 2"  value="<?php echo $login_id;?>">
    </div>
  -->

        <!--<button style="margin-left:200px;" type="submit" name="Submit" id="check_duplicate" class="btn btn-success">Register</button>-->
         
        <input style="margin-left:200px; padding: 8px; width: 25%; font-weight: bold; margin-top: 20px" class="btn btn-danger" id="update"  type="submit" name="withd"  value="Withdraw" />       
      
    
    </div>
      
       <div  style="margin-left: 40px; width:140px; height:140px;">
            <img id="img" src="<?php echo $images;?>" alt="THIS IS LOADS PHOTO"  style="border: 4px #99ff99 solid; width:140px; height:140px;" >
               <input type="hidden" name="idd" value="<?php echo $id;?>" />   
              <input type="hidden" name="imge" value="<?php echo $images;?>" /> 
<!--            <div class="custom-file mb-3" style="width: 200px;">
                <input type="file" class="custom-file-input" id="customFile" name="fileToUpload" accept="image/*" >
                <label class="custom-file-label" for="customFile">Choose Photo>></label>
            </div> -->
              
              
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


    //        if($identifyFileType == "jpg" || $identifyFileType == "png" || $identifyFileType == "jpeg")
    // {           

    //              if($getfile_size < 2097152) {
    //            
    //                    // Check if file already exists
    //                     if (!file_exists($target_file)) {  
             move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
               } else {
                       if(isset($_POST['imge'])){
                        $images = $_POST['imge'];
                        @$target_file = $images;         
                        }
                   
                     }
                 
                             if(isset($_POST['withd'])){
                                   $name = strtoupper($_POST['name']);
                             if($name != ""){ 
        
                                $parent = $_POST['parent'];
//                                $telephone = $_POST['telephone'];
                                $date = date("jS F Y");
                                $month = date("F");
                                $year = date("Y");
                                    $regnum = strtoupper($_POST['regnum']) ; 
                                
                                @$target_file = $images;
                                
                                
                                $ref = "ref".date("F Y"); 
                                
                        $name = strtoupper($_POST['name']);
          $check = mysqli_query($connect, "SELECT * FROM contribution WHERE name='$name'");
          while($row_check = mysqli_fetch_assoc($check)){
                   $get_check = $row_check['ref'];
          }
               
          
                           if($get_check == $ref){           
            //INSERT RECORD2
      $sql_statement = "INSERT INTO contribution (name, amount, withdraw, date, ref, month, year, district) Values('$name', '0','$parent',  '$date', '$ref', '$month', '$year' , '$regnum')";
                     $result2 = mysqli_query($connect, $sql_statement); 
                  } else {
      $sql_statement2 = "INSERT INTO contribution (name, amount, withdraw, date, month, year, district) Values('$name', '0','$parent',  '$date', $month', '$year' , '$regnum')";
                $result23 = mysqli_query($connect, $sql_statement2);
                  }    
          
          
          
          
                                
               
                       //INSERT RECORD 1
      $sql_statement = "INSERT INTO witdraw (name, amount, date, month, year, district) Values('$name', '$parent', '$date', '$month', '$year' , '$regnum')";
                     $result = mysqli_query($connect, $sql_statement); 
                     
                  
                        
                   ////////////THIS IS TO SUM WITHDRAWAL ///////////////////
                            $total_savings11 = mysqli_query($connect, "SELECT SUM(amount) as monthtotal FROM contribution WHERE name='$name'");      
                          while  ($row1 = mysqli_fetch_array($total_savings11)){
                          $summation_con = $row1['monthtotal'];                          
                          }
                            
        ///////////////////THIS IS TO SUM CONTRIBUTION ///////////////////
                        $total_savings22 = mysqli_query($connect, "SELECT SUM(withdraw) as monthtotal FROM contribution WHERE name='$name'");      
                          while  ($row = mysqli_fetch_array($total_savings22)){
                          $summation_wit = $row['monthtotal'];                          
                          }                     
              

              
              ////UPDATE CONTRIBUTION BASED ON NAME  TABLE
              $update_con = mysqli_query($connect, "UPDATE  contribution SET amounttotal = '' WHERE name='$name'");
                $update_con1 = mysqli_query($connect, "UPDATE  contribution SET amounttotal = '$summation_con' WHERE name='$name'");
              
              
          

                 ////UPDATE WITHDRAWAL BASED ON NAME 
              $update_wit = mysqli_query($connect, "UPDATE  contribution SET withdrawtotal = '' WHERE name='$name'");
             $update_wit1 = mysqli_query($connect, "UPDATE  contribution SET withdrawtotal = '$summation_wit' WHERE name='$name'");
                    
                     
             
             
             
             
             
             
             
             
             
             
             
             
             
             
             
             
               /////////---LETS DO UPDATE FOR MONTH SO IT CAN DISPLAY ON THE MEMBER QUERY--------------------------------------///////////////////////
         ////////////THIS IS TO SUM WITHDRAWAL BY MONTH///////////////////
                            $total_savings111 = mysqli_query($connect, "SELECT SUM(amount) as monthtotal FROM contribution WHERE name='$name' AND month = '$month' AND year = '$year' ");      
                          while  ($row1 = mysqli_fetch_array($total_savings111)){
                          $summation_con = $row1['monthtotal'];                          
                          }
                            
        ///////////////////THIS IS TO SUM CONTRIBUTION BY MONTH///////////////////
                        $total_savings222 = mysqli_query($connect, "SELECT SUM(withdraw) as monthtotal FROM contribution WHERE name='$name' AND month = '$month' AND year = '$year' ");      
                          while  ($row = mysqli_fetch_array($total_savings222)){
                          $summation_wit = $row['monthtotal'];                          
                          }                     
              

              
              ////UPDATE CONTRIBUTION BASED ON NAME  TABLE
              $update_con11 = mysqli_query($connect, "UPDATE  contribution SET amountmonth = '' WHERE name='$name' AND month = '$month' AND year = '$year' ");
                $update_con111 = mysqli_query($connect, "UPDATE  contribution SET amountmonth = '$summation_con' WHERE name='$name' AND month = '$month' AND year = '$year' ");
              
              
          

                 ////UPDATE WITHDRAWAL BASED ON NAME in month_con_wit TABLE
              $update_wit11 = mysqli_query($connect, "UPDATE  contribution SET withdrawmonth = '' WHERE name='$name' AND month = '$month' AND year = '$year' ");
             $update_wit111 = mysqli_query($connect, "UPDATE  contribution SET withdrawmonth = '$summation_wit' WHERE name='$name' AND month = '$month' AND year = '$year' ");
                    
     /////////////////////-----------------------------------------------------///////////////////////              
             
             
             
             
             
             
             
             
             
             
             
             
             
                     
                     
//                        ////////////THIS IS TO SUM CONTRIBUTION
                        $total_savings = mysqli_query($connect, "SELECT SUM(amount) as total FROM contribution WHERE name='$name'");      
                          while  ($row = mysqli_fetch_array($total_savings)){
                          $summation = $row['total'];                          
                          }
                            
                            ////////////THIS IS TO SUM WITHDRAWAL
                            $total_savings1 = mysqli_query($connect, "SELECT SUM(amount) as total FROM witdraw WHERE name='$name'");      
                          while  ($row1 = mysqli_fetch_array($total_savings1)){
                          $summation1 = $row1['total'];                          
                          }
                          
                       $actual_savings =  $summation - $summation1;
                          
                          //UPDATE RECORD
      $sql_statement = "UPDATE members SET savings = '$summation', loan = '$summation1', balance = '$actual_savings' WHERE namee='$name'";
                     $result2 = mysqli_query($connect, $sql_statement); 
                     
                          
                          if($result==true){
                                   echo "<script>alert('$name has successfully withdrawn $parent. Total savings left: $actual_savings');</script>";
                                     '';  
                                     $id = "";
                                    } else {
                           echo "<script>alert('Application has been tempered with!!');</script>";
                        }      
                    
                      } else {
                            echo "<script>alert('You must enter name ooooo!!')</script>";
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
                                
                            
                     //Delete RECORD from fees
      @$resultt = mysqli_query($connect, "DELETE FROM student_fees WHERE name ='$name'");
      
           //Delete RECORD from school_fees_breakdown
      @$answer = mysqli_query($connect, "DELETE FROM school_fees_breakdown WHERE namee ='$name'");
              
                        //then Delete record in student database
      @$sql_statement = "DELETE FROM student WHERE id = '$id'";
      
                 
                     $result = mysqli_query($connect, $sql_statement); 
                                    if($result==true){
                                   echo "<script>alert('$name has been successfully deleted');</script>";
                                    }
                          
                         } else {
                            echo ""; //leave blank 
                        }    
                        

    ?>
              
             
              
               <a style="margin-left:40px; margin-top: 250px; margin-bottom: 15px;" class="btn btn-dark" href="withdrawals.php">Reset</a> <br>
             
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
             const fi = document.getElementById('customFile'); 
        // Check if any file is selected. 
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
                }  
            } 
        } 
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



