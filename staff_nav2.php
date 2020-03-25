




<nav class="pcoded-navbar">
    <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
    <div class="pcoded-inner-navbar main-menu" id="pos_fixed">

        <div class="pcoded-navigation-label" style="font-size: 14px;">Navigation</div>
        <ul class="pcoded-item pcoded-left-item">


            <li class="">
                <a href="staff_home.php" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                    <span class="pcoded-mtext">Dashboard</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <hr>


            <!----------------MAJOR DROP DOWN1------------->    
            <li class="pcoded-hasmenu">
                <a href="javascript:void(0)" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="far fa-user"></i><b></b></span>
                    <span class="pcoded-mtext">Customer</span>
                    <span class="pcoded-mcaret"></span>
                </a>
                <!--SECOND LEVEL BREAK DOWN-->     
                <ul class="pcoded-submenu">
                    <li class="">
                        <a href="staff_codename_search.php" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class=""></i><b></b></span>
                            <span class="pcoded-mtext">Search Codename</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>

                    <li class="">
                        <a href="staff_members.php" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class=""></i><b></b></span>
                            <span class="pcoded-mtext">Register Customer</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>



                    <li class="">
                        <a href="#" onclick="redirect_to_admin()" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class=""></i><b></b></span>
                            <span class="pcoded-mtext">Search/Edit Customer Info</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <script>
                        function redirect_to_admin() {
                            swal({
                                title: 'Not Allowed!',
                                text: 'Please contact admin to Edit Customer Info',
                                icon: 'error',
                                buttons: {
                                    confirm: {text: 'Ok', className: 'sweet-orange'}

                                },
                                closeOnClickOutside: false
                            });


                        }
                    </script>
                    <!--END SECOND LEVEL BREAK DOWN-->



                </ul>





            </li>
            <!--END OF MAJOR DROP DOWN-->  
            <hr>





            <?php
            include 'connection.php';
            $permitted_name = $_SESSION['staff_full_name'];
            $sql_check = "SELECT * FROM staff WHERE namee = '$permitted_name'";
            $result = mysqli_query($connect, $sql_check);
            while ($row = mysqli_fetch_assoc($result)) {
                $code_permit = $row['permission'];
            }
            if ($code_permit == "" || $code_permit == "Not yet permitted") {
                $permit = 0;
            } else {
                $permit = 1;
            }



            $sql_check_disburse = "SELECT * FROM staff WHERE namee = '$permitted_name'";
            $result1 = mysqli_query($connect, $sql_check_disburse);
            while ($row = mysqli_fetch_assoc($result1)) {
                $disburse_permission = $row['disburse_permission'];
            }
            if ($disburse_permission == "") {
                $permit2 = 0;
            } else {
                $permit2 = 1;
            }






            $result_slider = mysqli_query($connect, "SELECT * FROM staff ");
            while ($row = mysqli_fetch_assoc($result_slider)) {
                $get_checked = $row['slider'];
            }

            if ($get_checked == "open") {
                $get_checked = "";
                $get_checked1 = "";
                $get_checked2 = "";
                $href = "staff_payment.php";
                $href1 = "staff_weekly_payment.php";
                $href2 = "staff_monthly_payment.php";
            } else {
                $get_checked = "check()";
                $get_checked1 = "check1()";
                $get_checked2 = "check2()";
                $href = "#";
                $href1 = "#";
                $href2 = "#";
                echo "<script type='text/javascript'> $(document).ready(function(){ 
                swal({
                         title: 'Sorry!',
                         text: 'FINSOLUTE is closed for Today!!!',
                         icon: 'error',
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
            ?>               










            <!----------------MAJOR DROP DOWN2------------->    
            <li class="pcoded-hasmenu">
                <a href="javascript:void(0)" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-wallet"></i><b></b></span>
                    <span class="pcoded-mtext">Loan <?php echo "<b style='color:green;'>R $permit</b>&nbsp <b style='color:blue;'>D $permit2</b>"; ?></span>
                    <span class="pcoded-mcaret"></span>
                </a>
                <!--SECOND LEVEL BREAK DOWN-->     
                <ul class="pcoded-submenu">
                    <li class="">
                        <a href="staff_request_reversal.php" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class=""></i><b></b></span>
                            <span class="pcoded-mtext">Request_Reversal_Entry <?php echo "<label style='color:green;'> $permit</label>"; ?></span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>

                    <li class="">
                        <a href="staff_get_loan.php" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class=""></i><b></b></span>
                            <span class="pcoded-mtext">Request Loan <?php echo "<label style='color:blue;'> $permit2</label>"; ?></span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>


                    <!--                                         <li class="">
                                                                 <a href="daily_expect_staff.php"  class="waves-effect waves-dark">
                                                                    <span class="pcoded-micon"><i class=""></i><b></b></span>
                                                                    <span class="pcoded-mtext">Daily Expectation</span>
                                                                    <span class="pcoded-mcaret"></span>
                                                                </a>
                                                            </li>-->



                    <li class="">
                        <a href="staff_payment.php"  class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class=""></i><b></b></span>
                            <span class="pcoded-mtext">(Daily)Payments of Loan</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>


                    <li class="">
                        <a href="staff_weekly_payment.php" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class=""></i><b></b></span>
                            <span class="pcoded-mtext">(Weekly)Payments of Loan</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>



                    <li class="">
                        <a href="staff_monthly_payment.php"  class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class=""></i><b></b></span>
                            <span class="pcoded-mtext">(Monthly) Payments of Loan</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>

                    <!--END SECOND LEVEL BREAK DOWN-->



                </ul>





            </li>



            <hr>
            
            
            <?php
              $acc_officer =  mysqli_query($connect, "SELECT * FROM staff WHERE namee = '$permitted_name' ");
              while ($row = mysqli_fetch_assoc($acc_officer)) {
                  $get_permission = $row['acc_officer'];
              }
              
              if ($get_permission == 1) {
                  
             
              
            ?>
            
            
              <!----------------MAJOR DROP DOWN 2------------->    
                                 <li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="ti-filter"></i><b></b></span>
                                        <span class="pcoded-mtext">Account Officers</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                <!--SECOND LEVEL BREAK DOWN-->     
                                    <ul class="pcoded-submenu">
                                         
                                         
                                       
                                        
                                        
                                         <li class="">
                                            <a href="staff_all_acc_officer.php" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class=""></i><b></b></span>
                                                <span class="pcoded-mtext">Daily</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        
                                        
                                           <li class="">
                                               <a href="staff_all_acc_officer_weekly.php" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class=""></i><b></b></span>
                                                <span class="pcoded-mtext">Weekly</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        
                                        
                                        
                                         <li class="">
                                            <a href="staff_all_acc_officer_monthly.php" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class=""></i><b></b></span>
                                                <span class="pcoded-mtext">Monthly</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                    </ul>    
                                   <!--END SECOND LEVEL BREAK DOWN-->
                                 </li>
                                 
                                 
                                 
                                 
                                   <hr>
                                   
                                       <?php
                                   
                                        }
                                       
                                       ?>
            
            
            <li class="pcoded-hasmenu">
                <a href="javascript:void(0)" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-files"></i><b></b></span>
                    <span class="pcoded-mtext">
                        Today's Collection
                    </span>
                    <span class="pcoded-mcaret"></span>
                </a>
                <ul class="pcoded-submenu">
                    <li class="">
                        <a href="staff_today_repayment.php" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-receipt"></i><b></b></span>
                            <span class="pcoded-mtext">Today's Loan Repayment</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>


                    <li class="">
                        <a href="staff_today_contribution.php" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class=""></i><b></b></span>
                            <span class="pcoded-mtext">Today's Contribution</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>




            <?php
            $select_all_l = mysqli_query($connect, "SELECT * FROM staff WHERE namee = '$permitted_name'");

            //                   printf("Errormessage: %s\n", mysqli_error($connect));
            while ($row = mysqli_fetch_assoc($select_all_l)) {
                $daily_l = $row['daily_ledger'];
                $weekly_l = $row['weekly_ledger'];
                $monthly_l = $row['monthly_ledger'];
            }
            if ($daily_l == "Yes") {
                echo ' <li class="">
                                                 <a href="staff_debtors.php" class="waves-effect waves-dark">
                                                             <span class="pcoded-micon"><i class=""></i><b></b></span>
                                                             <span class="pcoded-mtext">Daily Ledger</span>
                                                             <span class="pcoded-mcaret"></span>
                                                         </a>
                                                     </li>';
            }

            if ($weekly_l == "Yes") {
                echo '<li class="">
                                                 <a href="staff_weekly_debtors.php" class="waves-effect waves-dark">
                                                             <span class="pcoded-micon"><i class=""></i><b></b></span>
                                                             <span class="pcoded-mtext">Weekly Ledger</span>
                                                             <span class="pcoded-mcaret"></span>
                                                         </a>
                                                     </li>';
            }

            if ($monthly_l == "Yes") {
                echo '<li class="">
                                                 <a href="staff_monthly_debtors.php" class="waves-effect waves-dark">
                                                             <span class="pcoded-micon"><i class=""></i><b></b></span>
                                                             <span class="pcoded-mtext">Monthly Ledger</span>
                                                             <span class="pcoded-mcaret"></span>
                                                         </a>
                                                     </li>';
            }
            ?>











                </ul>
            </li>
            <hr>




            <li class="">
                <a href="staff_contribution.php" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-bag"></i><b></b></span>
                    <span class="pcoded-mtext">Contributions</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>

            <hr>







            <!----------------MAJOR DROP DOWN 2------------->    
            <li class="pcoded-hasmenu">
                <a href="javascript:void(0)" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-files"></i><b></b></span>
                    <span class="pcoded-mtext">Assigned Customers</span>
                    <span class="pcoded-mcaret"></span>
                </a>
                <!--SECOND LEVEL BREAK DOWN-->     
                <ul class="pcoded-submenu">





                    <li class="">
                        <a href="staff_acc_officer.php" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class=""></i><b></b></span>
                            <span class="pcoded-mtext">Daily</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>


                    <li class="">
                        <a href="staff_acc_officer_weekly.php" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class=""></i><b></b></span>
                            <span class="pcoded-mtext">Weekly</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>



                    <li class="">
                        <a href="staff_acc_officer_monthly.php" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class=""></i><b></b></span>
                            <span class="pcoded-mtext">Monthly</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                </ul>    
                <!--END SECOND LEVEL BREAK DOWN-->
            </li>




            <hr>



            <li class="">
                <a href="staff_black_list.php" id="mobile-collapse" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class=""></i><b></b></span>
                    <span class="pcoded-mtext">Black List</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>

            <hr>


            <li class="">
                <a href="staff_loan_request.php" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-bag"></i><b></b></span>
                    <span class="pcoded-mtext">View_Loan_Approval</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>

            <hr>


            <li class="">
                <a onclick="permission()" href="#" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-cloud"></i><b></b></span>
                    <span class="pcoded-mtext">Reversal Entry</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>

            <hr>
            <li class="">
                <a onclick="permission1()" href="#" class="waves-float waves-dark">
                    <span class="pcoded-micon"><i class="ti-cloud-up"></i><b></b></span>
                    <span class="pcoded-mtext">Disburse Loan</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>




            <!--                                  <li class="">
                                                <a href="change_staffpass.php" class="waves-effect waves-dark">
                                                    <span class="pcoded-micon"><i class="ti-export"></i><b></b></span>
                                                    <span class="pcoded-mtext">Change Password</span>
                                                    <span class="pcoded-mcaret"></span>
                                                </a>
                                            </li>
                                            
                                            
                                             <hr>-->


        </ul> 
    </div>
</nav>  
<!--END OF MAJOR DROP DOWN-->  







<script>


    function permission() {
        swal("Insert Ontime Password Here:", {
            content: "input"

        })
                .then((value) => {
//               swal(`You typed: ${value}`);

                    if (window.XMLHttpRequest)
                    {// code for IE7+, Firefox, Chrome, Opera, Safari
                        xmlhttp = new XMLHttpRequest();
                    } else
                    {// code for IE6, IE5
                        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                    }

                    xmlhttp.open("GET", "access_reversal_entry.php?get_permit=" + value, true);
                    xmlhttp.send();
                    xmlhttp.onreadystatechange = function () {
                        if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
////                 document.getElementById("dispay").innerHTML = xmlhttp.responseText;;
                            var test = xmlhttp.responseText;
                            if (test === "wrong") {
                                swal({
                                    title: 'Access Denied!',
                                    text: 'You have inserted a Wrong or Expired pin.',
                                    icon: 'error',
                                    buttons: {
                                        confirm: {text: 'ok', className: 'sweet-orange'}

                                    },
                                    closeOnClickOutside: false
                                });

                            } else {
                                swal({
                                    title: 'Access Granted!',
                                    text: 'You have been granted One Time Password for Reversal!!!',
                                    icon: 'success',
                                    buttons: {
                                        confirm: {text: 'ok', className: 'sweet-orange'}

                                    },
                                    closeOnClickOutside: false
                                });

                                if (test === "repay") {
                                    window.location = 'staff_reverse_entry.php';
                                }
                                if (test === "disburse") {
                                    window.location = 'staff_disburse_reverse_entry.php';
                                }

                            }
                        }
                    };
                });





    }
    ;









    function permission1() {

        swal("Insert Ontime Password Here:", {
            content: "input"

        }).then((value) => {

            if (window.XMLHttpRequest)
            {// code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else
            {// code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }

            xmlhttp.open("GET", "access_disburse.php?get_permit=" + value, true);
            xmlhttp.send();
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
////                 document.getElementById("dispay").innerHTML = xmlhttp.responseText;;
                    var test = xmlhttp.responseText;
                    if (test === "wrong") {
                        swal({
                            title: 'Access Denied!',
                            text: 'You have inserted a Wrong or Expired pin.',
                            icon: 'error',
                            buttons: {
                                confirm: {text: 'ok', className: 'sweet-orange'}

                            },
                            closeOnClickOutside: false
                        });
                    } else {
                        swal({
                            title: 'Access Granted!',
                            text: 'One Time Access granted for Disbursement!!!',
                            icon: 'success',
                            buttons: {
                                confirm: {text: 'ok', className: 'sweet-orange'}

                            },
                            closeOnClickOutside: false
                        });

                        window.location = 'staff_loan.php';
                    }
                }
            };
        });

    }
    ;

</script>












