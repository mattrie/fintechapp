<?php 

    if(empty($_SESSION['id_staff'])){
//     
          echo "<script type='text/javascript'> $(document).ready(function(){ 
                swal({
                         title: 'Sorry!',
                         text: 'You must first login!!!',
                         icon: 'warning',
                        buttons: {
                            confirm : {text:'Enter',className:'sweet-orange'},
                          
                        },
                        closeOnClickOutside: false
                       })
                  .then(function() {
                     window.location = 'staff_login.php';
                   });   
                }); </script>";
         
 }
    include 'connection.php';

           $t=time();
             if (isset($_SESSION['logged']) && ($t - $_SESSION['logged'] > 1800)) {
                 session_destroy();
                 session_unset();
                   echo "<script type='text/javascript'> $(document).ready(function(){ 
                swal({
                         title: 'Sorry!',
                         text: 'Session Expired. Re-Login Please.',
                         icon: 'warning',
                        buttons: {
                            confirm : {text:'Enter',className:'sweet-orange'},
                        },
                        closeOnClickOutside: false
                       })
                  .then(function() {
                     window.location = 'staff_login.php';
                   });   
                }); </script>";
         
               
             }else {
                 $_SESSION['logged'] = time();
             }    
   
?>
<style>
       
            @media(max-width:768px){
                .menu-height1{
                  margin-top: 20px;  
                }
            }
            
           @media (min-width: 1024px){
                 .menu-height1{
                  margin-top: 0px;  
                }
            }
                

            
            </style>
<nav class="navbar header-navbar pcoded-header" style="height: 5px;">
                <div class="navbar-wrapper">
                    <div class="navbar-logo">
                        <a class="mobile-menu waves-effect waves-light menu-height1" id="mobile-collapse" href="#!">
                            <i class="ti-menu" ></i>
                        </a>
                        <div class="mobile-search waves-effect waves-light">
                            <div class="header-search">
                                <div class="main-search morphsearch-search">
                                    <div class="input-group">
                                        <span class="input-group-prepend search-close"><i class="ti-close input-group-text"></i></span>
                                        <input type="text" class="form-control" placeholder="Enter Keyword">
                                        <span class="input-group-append search-btn"><i class="ti-search input-group-text"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="staff_login.php">
                           <i style="color: #ccffcc;">_<b style="font-weight: bolder; font-size: 24px;">FINSOLUTE</b><b style="font-size: 16px;"></b>_</i>
                        </a>
                        <a class="mobile-options waves-effect waves-light" style="margin-top: 20px;">
                            <i class="ti-more"></i>
                        </a>
                    </div>
                    <div class="navbar-container container-fluid">
                        <ul class="nav-left">
                            <li>
                                <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu" id="mymenu2"></i></a></div>
                            </li>
                            <li>
                                <a href="#!" onclick="javascript:toggleFullScreen()" class="waves-effect waves-light">
                                    <!--<i class="ti-fullscreen"></i>-->
                                </a>
                            </li>
                        </ul>
                        <ul class="nav-right">

                            <li class="user-profile header-notification">
                                <a href="#!" class="waves-effect waves-light">
                                    <img src="<?php echo  $_SESSION['imagess'];?>" style="width: 60px; height: 80px;" class="img-radius"  alt="User-Profile-Image">
                                    <span><?php echo  $_SESSION['name_id_staff'];?></span>
                                    <i class="ti-angle-down"></i>
                                </a>
                                <ul class="show-notification profile-notification">

<!--                                    <li class="waves-effect waves-light">
                                        <a href="user-profile.html">
                                            <i class="ti-user"></i> Profile
                                        </a>
                                    </li>-->
                                    <li class="waves-effect waves-light">
                                        <a href="change_staffpass.php">
                                            <i class="ti-key"></i> Change Password
                                        </a>
                                    </li>
                                    <li class="waves-effect waves-light">
                                        <a href="https://finsoluteinvestment.ng/webmail/">
                                            <i class="ti-email"></i> Web Mail
                                        </a>
                                    </li>
<!--                                    <li class="waves-effect waves-light">
                                        <a href="auth-lock-screen.html">
                                            <i class="ti-lock"></i> Lock Screen
                                        </a>
                                    </li>-->
                                    <li class="waves-effect waves-light">
                                        <a href="staff_login.php">
                                            <i class="ti-layout-sidebar-left"></i> Logout
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>