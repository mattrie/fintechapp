  <!--NAV BAR WITH BRANDING-->
   <nav class="navbar navbar-expand-sm text-body navbar-dark fixed-top" style="color:black; background-color: #ff5d0f;">
     
       <a class="navbar-brand" href="staff_login.php" style="color:white; font-weight: bold;"><img src="images/nairaor.JPG" alt="logo" style="width: 50px; height: 40px; border-radius: 5px;">  FINSOLUTE</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
       
       
     <!--THIS DOES NOT ATTACH ANY FORM OF DROP DOWN-->
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
          <ul class="navbar-nav">
    
     <li class="nav-item">
        <a class="nav-link" style="color: black; font-weight: bold;" href="staff_home.php">DashBoard</a>
    </li>
    
    
    
     <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" style="color: black; font-weight: bold;" href="#" id="navbardrop" data-toggle="dropdown">
                   Customer
                 </a>
                 <div class="dropdown-menu">
                  <a class="dropdown-item" href="staff_codename_search.php">Search Codename</a>
                       
                    <a class="dropdown-item" href="staff_members.php">Register Customer</a>
                    <a class="dropdown-item" href="#" onclick="redirect_to_admin()">Search/Edit Customer Info</a>         
                   </div>
            </li> 
                       <script>
                function redirect_to_admin(){
                alert('Please contact admin to Edit Customer Info');
                      }
                        </script>
      
           
             <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" style="color: black; font-weight: bold;" href="#" id="navbardrop" data-toggle="dropdown">
                   
                 </a>
                 <div class="dropdown-menu">
                   <a class="dropdown-item" href=""></a>
                   <a class="dropdown-item" href=""></a>
                   <a class="dropdown-item" href=""></a>
                   <a class="dropdown-item" href=""></a>
                   <a class="dropdown-item" href=""></a>   
              
                   <!--<a class="dropdown-item" href="debtors.php">Debtors</a>-->
                   <!--<a class="dropdown-item" href="edit_interest.php">Edit Intrest Rate</a>-->
                  
                 </div>
            </li> 
            
          
            
            
        <li class="nav-item"><a class="nav-link" style="color: black; font-weight: bold;" href="">Today's Repayment</a></li>
                   
            <li class="nav-item"><a class="nav-link" style="color: black; font-weight: bold;" href=""></a></li>
             
         <!--REVERSAL ENTRY HERE-->  
            <li class="nav-item"><a class="nav-link" style="color: black; font-weight: bold;" ></a></li>
            
    
        
    <li class="nav-item"><a class="nav-link" style="color: black; font-weight: bold;" href=""></a></li>
  
      <li class="nav-item"><a class="nav-link" style="color: black; font-weight: bold;" href=""></a></li>
    
 
  </ul>
       </div> 
         
     </nav>
  
 
  