<!DOCTYPE html>
<html>
<head>
	<title>Contact Us</title> <meta content="width=device-width, initial-scale=1.0" name="viewport"> 

<!--Boostrap & family-->
  <!--<link rel="stylesheet" href="maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
 <link rel="stylesheet" href="maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"></link>
 
  <script src="ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  
  
  <style>      
 body{
                         background-image: none;
                        background-color: white;               
                    }
      
        .dropdown-item:hover{
          background-color: black;
          color: whitesmoke;
      }
      
     
            /* Make the image fully responsive */
            .carousel-inner img {
              width: 100%;
              height: 100%;
            }
      
            .nav-link:hover{
                color: yellow;
            }
      
            input{
              border-radius: 25px;
            }
            
            textarea{
               border-radius: 25px; 
            }
    
  </style>
        
        
    </head>
    <body style="background-color: #e0d3d3;">
    <!--<center class="heading"><div class="trans fixed-top"><b>WISDOM GROUP OF SCHOOLS</b></div></center>-->
    
<!--    <hr style="color: red; height: 3px; margin-top: 0.5px"/>
    
    <center class="animation"><a class="anime" href="#image">CLICK HERE TO VIEW SCHOOL PHOTO GALLERY </a></center>
    -->
    
     <!--NAV BAR WITH BRANDING-->
   <nav class="navbar navbar-expand-md bg-success navbar-dark fixed-top" style="color:whitesmoke;">
       <a class="navbar-brand" href="fin_admin.php">  <img src="images/akin.jpg" alt="logo" style="width:40px;">WISDOM GROUP OF SCHOOLS</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
     <!--THIS DOES NOT ATTACH ANY FORM OF DROP DOWN-->
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
         
             <ul class="navbar-nav">
    <li class="nav-item">
       <a class="nav-link" style="color: cornsilk;" href="fin_admin.php">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" style="color: cornsilk;" href="admission.php">Admission</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" style="color: cornsilk;" href="news.php">News</a>
    </li>
    
    <li class="nav-item"><a class="nav-link" style="color: cornsilk;" href="fin_admin.php">Admin login</a></li>
  <li class="nav-item"><a class="nav-link" style="color: cornsilk;" href="teacher_login.php">Staff login</a></li>  
  <li class="nav-item"><a class="nav-link" style="color: cornsilk;" href="student_login.php">Student login</a></li>
  <li class="nav-item"><a class="nav-link" style="color: cornsilk;" href="contact_us.php">Contact us</a></li>
  <li class="nav-item"><a class="nav-link" style="color: cornsilk;" href="about.php">About</a></li>  
  </ul>
       </div>
      
     

  </nav>
    
    
   
     <div class="container" style="margin-top: 70px;" >
           <center>
         <div class="jumbotron align-content-sm-center" style="width: 800px; height: 100px; background-color: #abefab; border-radius: 22px; padding: 10px 20px 10px 20px; margin-bottom: 15px;">
          
             <strong>Address</strong>: We are located at Plot 326, Jones Adams street, Lekki Phase 1, Victoria Island Lagos. <br>
             <strong>Tel:</strong> 08032348543, 08023447589 <br>
             <strong>E-mail:</strong><a href="gmail.com" style="color: green;"> wisdomgroupsch@gmail.com</a>
                 
                 
             
         </div>
         </center>
         
         <center>  <label class="mx-auto" style="color:whitesmoke; font-style: italic;">For further inquiries, please fill the form below: </label></center>
           
         <form action="contact_us.php" method="POST" enctype="multipart/form-data" class="mx-auto" style="width: 300px;">
          
       <div class="form-group">
           <label style="color:whitesmoke;">Name:</label>   
           <input type="text"  name="contact_name"  class="form-control"     maxlength="50"  style="text-transform: uppercase;" required="">
       </div>
      
    
      
    <div class="form-group"> 
        <label style="color:whitesmoke;">E-mail:</label>
        <input type="email" name="contact_email"  class="form-control"    maxlength="40" required="">
    </div>
        
        
          <div class="form-group">
              <label style="color:whitesmoke;">Message:</label>
              <textarea name="contact_text" rows="8" cols="70"  class="form-control" style="border-radius: 8px;"   maxlength="250" required=""></textarea>
    </div>
 

             <input type="submit" name="submit" value="Submit Now" class="btn btn-success"/>
              <?php
        if (isset($_POST["submit"])) {
    $contact_name = $_POST["contact_name"];
    $contact_email = $_POST["contact_email"];
    $contact_text = $_POST["contact_text"];

                 
             $to = $contact_email;
             $subject = "Prospect: $contact_name";
             $message = $contact_text;
             $headers = "From: $contact_email";

               
                                   if (filter_var($to, FILTER_SANITIZE_EMAIL) == true && filter_var($to, FILTER_VALIDATE_EMAIL) == true) {
                                    $send_email = @mail($to, $subject, $message, $headers);
                                      
                                      }  else {
                                       echo "<label style='font-size: 18px; color:red; margin-left: 20px; font-style:italic'>Email inserted is invalid. </label>";
                                    
                                    }

                                           //check if email is sent 
                                                if (@$send_email == true) {
                                                  echo "<label style='font-size: 18px; color:green; margin-left: 20px; font-style:italic'>Message sent!!!</label>";
                                                }  else {

                                                  echo "<label style='font-size: 18px; color:red; margin-left: 20px; font-style:italic'>Message not sent!!!</label>";

                                                }


                        }
        ?>
     
     
      
  </form>
     
      
  </div>
     <div class="container-fluid" style="background-color: #ccffcc; color: green; margin-top: 25px;">
    
         <center><strong><label >You can also reach us on:  <a href="#" class="fa fa-facebook-official" style="font-size:30px;color:blue">.................. </a> | <a href="#" class="fa fa-twitter" style="font-size:30px;color:#00cccc">.............. | </a> <a href="#" class="fa fa-whatsapp" style="font-size:30px;color:white; background-color: green; border-radius: 20px;"></a> ......................</label></strong></center>
      </div>
     </body>
</html>