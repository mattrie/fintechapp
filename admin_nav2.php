<?php
   include 'connection.php';
   
   
   

////RUN ALL UPDATE FOR DAILYIND FROM INDBAL  
//    /1
        //      $sql_all_get112 = mysqli_query($connect, "SELECT * FROM allloan WHERE remarks = 'loan disbursement'");
        //  while($row=mysqli_fetch_array($sql_all_get112)){
        //   $indbalance = $row['indbalance'];
        //          $get_id = $row['id'];
        //      $sql_all_update = mysqli_query($connect, "UPDATE allloan SET dailyindbal = '$indbalance' WHERE id = '$get_id'");
        //      if ($sql_all_update ==true) {
        //          echo "<script>alert('allloan dailyindbal updated')</script>";
        //      } 
        //  }
   
   
   
   
   
   
//       /2
//              $sql_all_get113 = mysqli_query($connect, "SELECT * FROM monthly_allloan WHERE remarks = 'loan disbursement'");
//          while($row=mysqli_fetch_array($sql_all_get113)){
//           $enddate = $row['enddate'];
//                  $get_id = $row['id'];
//              $sql_all_update = mysqli_query($connect, "UPDATE monthly_allloan SET true_enddate = '$enddate' WHERE id = '$get_id'");
//              if ($sql_all_update ==true) {
//                  echo "<script>alert('monthly_allloan enddate updated')</script>";
//              } 
//          }


   
   
   //   3    DATE FORMAT FOR PENALTY PAID    allloan    weekly_allloan     monthly_allloan
        // $sql_all_get112 = mysqli_query($connect, "SELECT * FROM allloan");
        //  while($row=mysqli_fetch_array($sql_all_get112)){
        //   $date = $row['date'];
        //   $date_format = date("Y-m-d", strtotime($date));
        //          $get_id = $row['id'];
        //      $sql_all_update = mysqli_query($connect, "UPDATE allloan SET date_format = '$date_format' WHERE id = '$get_id'");
        //      if ($sql_all_update ==true) {
        //         //  echo "<script>alert('revenue date_format updated')</script>";
        //      } 
        //  }
   
   
   
   //   4 UPDATE BRANCH
   
   
   //              $sql_all_update = mysqli_query($connect, "UPDATE revenuexp SET branch = 'OJOKORO BRANCH HEAD OFFICE' WHERE branch = ''");
//              if ($sql_all_update ==true) {
//                  echo "<script>alert('revenue branch updated')</script>";
//              } 
   
   
        
//              $sql_all_update = mysqli_query($connect, "UPDATE revenuexp SET branch = 'OJOKORO BRANCH HEAD OFFICE' WHERE branch = ''");
//              if ($sql_all_update ==true) {
//                  echo "<script>alert('revenue branch updated')</script>";
//              } 
//              
//              
//              
//              
//                 $sql_all_update1 = mysqli_query($connect, "UPDATE allloan SET branch = 'OJOKORO BRANCH HEAD OFFICE' WHERE branch = ''");
//              if ($sql_all_updat1 ==true) {
//                  echo "<script>alert('allloan branch updated')</script>";
//              } 
//              
//              
//              
//                    $sql_all_update2 = mysqli_query($connect, "UPDATE weekly_allloan SET branch = 'OJOKORO BRANCH HEAD OFFICE'  WHERE branch = ''");
//              if ($sql_all_update2 ==true) {
//                  echo "<script>alert('weekly_allloan branch updated')</script>";
//              } 
//        
//   
//               $sql_all_update3 = mysqli_query($connect, "UPDATE monthly_allloan SET branch = 'OJOKORO BRANCH HEAD OFFICE' WHERE branch = ''");
//              if ($sql_all_update3 ==true) {
//                  echo "<script>alert('monthly_allloan branch updated')</script>";
//              } 
//              
//              
//              
//                    $sql_all_update4 = mysqli_query($connect, "UPDATE contribution SET branch = 'OJOKORO BRANCH HEAD OFFICE' WHERE branch = ''");
//              if ($sql_all_update4 ==true) {
//                  echo "<script>alert('contribution branch updated')</script>";
//              } 
////   
//   
//   
//   
//                  $sql_all_update5 = mysqli_query($connect, "UPDATE members SET branch = 'OJOKORO BRANCH HEAD OFFICE' WHERE branch = ''");
//              if ($sql_all_update6 ==true) {
//                  echo "<script>alert('members branch updated')</script>";
//              } 
//   
   
   
   //   6    DATE FORMAT INVESTMENT
//         $sql_all_get112 = mysqli_query($connect, "SELECT * FROM  investment");
//          while($row=mysqli_fetch_array($sql_all_get112)){
//           $date = $row['date'];
//           $date_format = date("Y-m-d", strtotime($date));
//                  $get_id = $row['id'];
//              $sql_all_update = mysqli_query($connect, "UPDATE  investment SET date_format = '$date_format' WHERE id = '$get_id'");
//              if ($sql_all_update ==true) {
//                  echo "<script>alert('investment date_format updated')</script>";
//              } 
//          }

   
   

   //      THIS IS FOR INVESTMENT COUNT DOWN
         $count_inv = "";
          $inc_inv=1;
        $lastpaid = "";
            $sql_inv = "SELECT * FROM investment WHERE remarks = 'Monthly Interest' OR remarks = 'Investment deposited'";
            $result_inv = mysqli_query($connect, $sql_inv);
               while ($row=mysqli_fetch_array($result_inv)){
                 
                    $lastpaid = $row['updatedate'];
                   $get_invbal = $row['updatebal'];
            
            //          LETS GET THE LAST INTEREST PAYMENT TO AUTOMATE     
             $dated_lastpaid = strtotime("$lastpaid");
            $gap = time() - $dated_lastpaid;
              $days_gap = floor($gap / 86400);  
              
              if($days_gap > 27 && $get_invbal > 0){
                $count_inv = $inc_inv;

            $inc_inv++;  
               }
             
        }  
        if($count_inv == ""){$count_inv = 0;}
    
//======================================================================================================

        
        
        
        
        
        
      //---------------COUNT REVERSAL REQUEST-----------+++++++++++++++++++++++==
        $reverse_count = "";
         $inc=1;
       $quco233 = mysqli_query($connect, "SELECT * FROM staff WHERE permission = '' AND code_permit != ''");
        while ($row = mysqli_fetch_assoc($quco233)){
             $reverse_count = $inc;

            $inc++;  
        } 
           if($reverse_count == ""){$reverse_count = 0;}
       //--------------------------+++++++++++++++++++++++==   
        
           
           
           
            //---------------Disburse COUNT REQUEST-----------+++++++++++++++++++++++==
        $disburse_count = "";
        $inc=1;
       $quco2333 = mysqli_query($connect, "SELECT * FROM request_loan WHERE status = 'not approved'");
        while ($row = mysqli_fetch_assoc($quco2333)){
             $disburse_count = $inc;

            $inc++;  
        } 
           if($disburse_count == ""){$disburse_count = 0;}
       //--------------------------+++++++++++++++++++++++==   
         
           
           
           
           
           
           
//      THIS IS FOR DAILY
         $count1 = "";
          $inc=1;
  $quco111 = mysqli_query($connect, "SELECT * FROM allloan WHERE dailyindbal > 1 AND remarks = 'loan disbursement'");
        while ($row = mysqli_fetch_assoc($quco111)){
             $get_dailyenddate = $row['enddate'];
             $get_dailyindbal = $row['dailyindbal'];
           $repay_sum = $row['repay_sum'];
     $disburseloan = $row['disburseloan'];
//          $disburseloan = $row['disburseloan'];
              ///////////////////////////////////////
                 //GET NUMBER OF MONTHS & DAYS LEFT
                    $enddated = strtotime("$get_dailyenddate");
                    
            $remaining = $enddated - time();
          
                
                ///////COUNT ONLY DAYS
        $days_remaining = floor($remaining / 86400);  
               if($days_remaining <= 0 && $get_dailyindbal > 1 && $repay_sum < $disburseloan){
                $count1 = $inc;

            $inc++;  
               }
             
        }  
        if($count1 == ""){$count1 = 0;}
    




//      THIS IS FOR WEEKLY
              $count2 = "";
            $inc=1;
  $quco121 = mysqli_query($connect, "SELECT * FROM members WHERE weeklyindbal > 1");
        while ($row = mysqli_fetch_assoc($quco121)){
             $get_weeklyenddate = $row['weeklyenddate'];
             $get_weeklyindbal = $row['weeklyindbal'];
          
            
           
              ///////////////////////////////////////
                 //GET NUMBER OF MONTHS & DAYS LEFT
                    $dated = strtotime("$get_weeklyenddate");
                    
            $remaining = time() - $dated;
                ///////COUNT ONLY DAYS
        $days_remaining = floor($remaining / 86400);  
               if($days_remaining >= 24 && $get_weeklyindbal > 1){
               $count2 =  $inc;

            $inc++;  
               }
        }  
        if($count2 == ""){$count2 = 0;}
        
        
        
        
        
        
        
        //      THIS IS FOR MONTHLY
          $count3 = "";
          $inc=1;
  $quco131 = mysqli_query($connect, "SELECT * FROM members WHERE monthlyindbal > 1");
        while ($row = mysqli_fetch_assoc($quco131)){
             $get_monthlyenddate = $row['monthlyenddate'];
             $get_monthlyindbal = $row['monthlyindbal'];
          
            
              ///////////////////////////////////////
                 //GET NUMBER OF MONTHS & DAYS LEFT
                    $dated = strtotime("$get_monthlyenddate");
                    
            $remaining = $dated - time();
          
               
                ///////COUNT ONLY DAYS
        $days_remaining = floor($remaining / 86400);  
               if($days_remaining <= 0 && $get_monthlyindbal > 1){
               $count3 =  $inc;

            $inc++;  
               }
        }  
        if($count3 == ""){$count3 = 0;}
        
       
     $tot_count =  $count1 + $count2 + $count3;
         if($tot_count == ""){$tot_count = 0;}
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         //  *****************************WARNING B4 CHARGE***************************************************
    //      THIS IS FOR DAILY WARNING
         $count12 = "";
          $inc=1;
  $quco112 = mysqli_query($connect, "SELECT * FROM allloan WHERE dailyindbal > 1 AND remarks = 'loan disbursement'");
        while ($row = mysqli_fetch_assoc($quco112)){
             $get_dailyenddate = $row['enddate'];
             $get_dailyindbal = $row['dailyindbal'];
           $repay_sum = $row['repay_sum'];
     $disburseloan = $row['disburseloan'];
//          $disburseloan = $row['disburseloan'];
              ///////////////////////////////////////
                 //GET NUMBER OF MONTHS & DAYS LEFT
                    $enddated = strtotime("$get_dailyenddate");
                    
            $remaining = $enddated - time();
          
                
                ///////COUNT ONLY DAYS
        $days_remaining = floor($remaining / 86400);  
               if($days_remaining < 4 && $days_remaining > 0 &&  $get_dailyindbal > 1 && $repay_sum < $disburseloan){
                $count12 = $inc;

            $inc++;  
               }
             
        }  
        if($count12 == ""){$count12 = 0;}
    



        
//      COUNT ONLINE
        $online_app_result = mysqli_query($connect, "SELECT COUNT(not_yet) as totala FROM members WHERE not_yet = 'not yet'");
        while ($row_online = mysqli_fetch_assoc($online_app_result)) {
            $online_app = $row_online['totala'];  
}
if ($online_app == "") {
    $online_app = 0;
}
//      THIS IS FOR WEEKLY WARNING 
              $count22 = "";
            $inc=1;
  $quco122 = mysqli_query($connect, "SELECT * FROM members WHERE weeklyindbal > 1");
        while ($row = mysqli_fetch_assoc($quco122)){
             $get_weeklyenddate = $row['weeklyenddate'];
             $get_weeklyindbal = $row['weeklyindbal'];
          
            
           
              ///////////////////////////////////////
                 //GET NUMBER OF MONTHS & DAYS LEFT
                    $dated = strtotime("$get_weeklyenddate");
                    
            $remaining = time() - $dated;
                ///////COUNT ONLY DAYS
        $days_remaining = floor($remaining / 86400);  
               if($days_remaining > 20 && $days_remaining < 24 && $get_weeklyindbal > 1){
               $count22 =  $inc;

            $inc++;  
               }
        }  
        if($count22 == ""){$count22 = 0;}
        
        
        
        
        
        
        
        //      THIS IS FOR MONTHLY WARNING
          $count32 = "";
          $inc=1;
  $quco132 = mysqli_query($connect, "SELECT * FROM members WHERE monthlyindbal > 1");
        while ($row = mysqli_fetch_assoc($quco132)){
             $get_monthlyenddate = $row['monthlyenddate'];
             $get_monthlyindbal = $row['monthlyindbal'];
          
            
              ///////////////////////////////////////
                 //GET NUMBER OF MONTHS & DAYS LEFT
                    $dated = strtotime("$get_monthlyenddate");
                    
            $remaining = $dated - time();
          
               
                ///////COUNT ONLY DAYS
        $days_remaining = floor($remaining / 86400);  
               if($days_remaining < 4 && $days_remaining > 0 && $get_monthlyindbal > 1){
               $count32 =  $inc;

            $inc++;  
               }
        }  
        if($count32 == ""){$count32 = 0;}
        
       
     $tot_count1 =  $count12 + $count22 + $count32;
         if($tot_count1 == ""){$tot_count1 = 0;}
         
    ?>

    
    
    

<nav class="pcoded-navbar" >
                        <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
                        <div class="pcoded-inner-navbar main-menu" id="pos_fixed">
                         
     <div class="pcoded-navigation-label" style="font-size: 14px;">Navigation</div>
                            <ul class="pcoded-item pcoded-left-item">
                                
                                
                                <li class="">
                                    <a href="admin_home.php" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                                        <span class="pcoded-mtext">Dashboard</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                               <hr>
                               
                               
                               
                                 <li class="">
                                     <a href="applicants.php" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="ti-world"></i><b>D</b></span>
                                        <span class="pcoded-mtext">Online Applicants <?php echo "<label style='font-size: 16px; color: green; font-weight: bold;'> $online_app</label>";?></span></span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                               <hr>
                               
                               
                               
                               
                               
                               <li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="fa fa-bank"></i><b></b></span>
                                        <span class="pcoded-mtext">Branch</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                <!--SECOND LEVEL BREAK DOWN-->     
                                    <ul class="pcoded-submenu">
                                         <li class="">
                                            <a href="reg_branch.php" class="waves-effect waves-dark">
                                                 <span class="pcoded-micon"><i class=""></i><b></b></span>
                                                 <span class="pcoded-mtext">Register Branch</span>
                                                 <span class="pcoded-mcaret"></span>
                                             </a>
                                         </li>
                                         
                                        <li class="">
                                            <a href="edit_branch.php" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class=""></i><b></b></span>
                                                <span class="pcoded-mtext">Edit Branch</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        
                                        
                                        
                                        
                                        
                                       
                                    </ul>    
                                   <!--END SECOND LEVEL BREAK DOWN-->
                                 </li>
                               
                                
                               <hr>
                               
                               
                              <!----------------MAJOR DROP DOWN------------->    
                                 <li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="far fa-user"></i><b></b></span>
                                        <span class="pcoded-mtext">Customer</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                <!--SECOND LEVEL BREAK DOWN-->     
                                    <ul class="pcoded-submenu">
                                         <li class="">
                                            <a href="codename_search.php" class="waves-effect waves-dark">
                                                 <span class="pcoded-micon"><i class=""></i><b></b></span>
                                                 <span class="pcoded-mtext">Search Codename</span>
                                                 <span class="pcoded-mcaret"></span>
                                             </a>
                                         </li>
                                         
                                        <li class="">
                                            <a href="archive.php" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class=""></i><b></b></span>
                                                <span class="pcoded-mtext">Archive Transactions</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                   <!--END SECOND LEVEL BREAK DOWN-->
                                   
                                   
                                   <!--THIRD LEVEL BREAK DOWN-->     
                                         <li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class=""></i><b></b></span>
                                        <span class="pcoded-mtext">Single Registration >></span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class="">
                                            <a href="members.php" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext">Register Customer</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="student_search.php" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext">Search/Edit Customer Info</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                       
                                    </ul>
                                </li>
                                 <!--END THIRD LEVEL BREAK DOWN-->       
                                       
                                 
                                 
                                 
                                 
                                 
                                 
                                 <!--THIRD LEVEL BREAK DOWN-->     
                                         <li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class=""></i><b></b></span>
                                        <span class="pcoded-mtext">Multi Registration >></span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class="">
                                            <a href="multi_members.php" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext">Register Group</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="multi_members_search.php" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext">Search/Edit Group</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                       
                                    </ul>
                                </li>
                                 <!--END THIRD LEVEL BREAK DOWN-->  
                                 
                                 <li class="">
                                     <a href="all_customers.php" class="waves-effect waves-dark">
                                                 <span class="pcoded-micon"><i class=""></i><b></b></span>
                                                 <span class="pcoded-mtext">All CUSTOMERS</span>
                                                 <span class="pcoded-mcaret"></span>
                                             </a>
                                         </li>
                                 
                                 
                                    </ul>
                                
                                
                                
                                
                                
                                </li>
                            <!--END OF MAJOR DROP DOWN-->  
                            <hr>
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            <!----------------MAJOR DROP DOWN 2------------->    
                                 <li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="ti-files"></i><b></b></span>
                                        <span class="pcoded-mtext">Staff</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                <!--SECOND LEVEL BREAK DOWN-->     
                                    <ul class="pcoded-submenu">
                                         <li class="">
                                            <a href="Reg_teacher.php" class="waves-effect waves-dark">
                                                 <span class="pcoded-micon"><i class=""></i><b></b></span>
                                                 <span class="pcoded-mtext">Register Staff</span>
                                                 <span class="pcoded-mcaret"></span>
                                             </a>
                                         </li>
                                         
                                        <li class="">
                                            <a href="teacher_search.php" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class=""></i><b></b></span>
                                                <span class="pcoded-mtext">Search/Edit Staff Info</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        
                                        
                                        
                                        
                                        
                                           <li class="">
                                               <a href="access_ledger.php" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class=""></i><b></b></span>
                                                <span class="pcoded-mtext">Grant Access to Ledgers</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                    </ul>    
                                   <!--END SECOND LEVEL BREAK DOWN-->
                                 </li>
                                 
                                 
                                 
                                 
                                   <hr>
                                 
                                 
                                   
                                   
                                   
                                   
                                        <!----------------MAJOR DROP DOWN 2------------->    
                                 <li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="ti-files"></i><b></b></span>
                                        <span class="pcoded-mtext">Account Officers</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                <!--SECOND LEVEL BREAK DOWN-->     
                                    <ul class="pcoded-submenu">
                                         
                                         
                                       
                                        
                                        
                                         <li class="">
                                            <a href="acc_officer.php" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class=""></i><b></b></span>
                                                <span class="pcoded-mtext">Daily</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        
                                        
                                           <li class="">
                                               <a href="acc_officer_weekly.php" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class=""></i><b></b></span>
                                                <span class="pcoded-mtext">Weekly</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        
                                        
                                        
                                         <li class="">
                                            <a href="acc_officer_monthly.php" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class=""></i><b></b></span>
                                                <span class="pcoded-mtext">Monthly</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                    </ul>    
                                   <!--END SECOND LEVEL BREAK DOWN-->
                                 </li>
                                 
                                 
                                 
                                 
                                   <hr>
                                   
                                   
                                   
                                   
                                 
                                 
                                 <!----------------MAJOR DROP DOWN 3------------->    
                                 <li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="ti-receipt"></i><b></b></span>
                                        <span class="pcoded-mtext">View Today</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                <!--SECOND LEVEL BREAK DOWN-->     
                                    <ul class="pcoded-submenu">
                                        
                                         <li class="">
                                            <a href="today_interest_upfront.php" class="waves-effect waves-dark">
                                                 <span class="pcoded-micon"><i class=""></i><b></b></span>
                                                 <span class="pcoded-mtext">Today's Interest Up Front</span>
                                                 <span class="pcoded-mcaret"></span>
                                             </a>
                                         </li>
                                        
                                        
                                        
                                         <li class="">
                                            <a href="today_pro_fee.php" class="waves-effect waves-dark">
                                                 <span class="pcoded-micon"><i class=""></i><b></b></span>
                                                 <span class="pcoded-mtext">Today's Processing Fee</span>
                                                 <span class="pcoded-mcaret"></span>
                                             </a>
                                         </li>
                                         
                                         
                                         
                                          <li class="">
                                            <a href="today_insurance.php" class="waves-effect waves-dark">
                                                 <span class="pcoded-micon"><i class=""></i><b></b></span>
                                                 <span class="pcoded-mtext">Today's Insurance Deposit</span>
                                                 <span class="pcoded-mcaret"></span>
                                             </a>
                                         </li>
                                        
                                        
                                        
                                         <li class="">
                                            <a href="today_contribution.php" class="waves-effect waves-dark">
                                                 <span class="pcoded-micon"><i class=""></i><b></b></span>
                                                 <span class="pcoded-mtext">Today's Contribution</span>
                                                 <span class="pcoded-mcaret"></span>
                                             </a>
                                         </li>
                                        
                                        
                                        
                                         <li class="">
                                            <a href="today_repayment.php" class="waves-effect waves-dark">
                                                 <span class="pcoded-micon"><i class=""></i><b></b></span>
                                                 <span class="pcoded-mtext">Today's Repayment</span>
                                                 <span class="pcoded-mcaret"></span>
                                             </a>
                                         </li>


                                         <li class="">
                                            <a href="toadys_penalty_paid.php" class="waves-effect waves-dark">
                                                 <span class="pcoded-micon"><i class=""></i><b></b></span>
                                                 <span class="pcoded-mtext">Today's Penalty Paid</span>
                                                 <span class="pcoded-mcaret"></span>
                                             </a>
                                         </li>
                                         
                                         
                                         
                                            <li class="">
                                            <a href="today_equity.php" class="waves-effect waves-dark">
                                                 <span class="pcoded-micon"><i class=""></i><b></b></span>
                                                 <span class="pcoded-mtext">Today's Equity</span>
                                                 <span class="pcoded-mcaret"></span>
                                             </a>
                                         </li>
                                         
                                         
                                         
                                        <li class="">
                                            <a href="today_disbursment.php" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class=""></i><b></b></span>
                                                <span class="pcoded-mtext">Today's Disbursement</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        
                                        
                                      <!--THIRD LEVEL BREAK DOWN-->     
                                         <li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class=""></i><b></b></span>
                                        <span class="pcoded-mtext">Today's Expectation >></span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class="">
                                            <a href="daily_expectation.php" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext">Today's Daily Expectation</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="weekly_expectation.php" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext">Today's Weekly Expectation</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="monthly_expectation.php" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext">Today's Monthly Expectation</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                       
                                    </ul>
                                </li>
                                 <!--END THIRD LEVEL BREAK DOWN-->     
                                        
                                        
                                        
                                        <li class="">
                                            <a href="today_penalty.php" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class=""></i><b></b></span>
                                                <span class="pcoded-mtext">Today's Penalty</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        
                                    </ul>    
                                   <!--END SECOND LEVEL BREAK DOWN-->
                                 </li>
                                 
                                   <hr>
                                   
                                   
                                  
                                   
                                   
                                  
                                   
                                   
                                   
                                   <!----------------MAJOR DROP DOWN 3.5------------->    
                                 <li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="ti-credit-card"></i><b></b></span>
                                        <span class="pcoded-mtext">
                                       Contributions
                                        </span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                <!--SECOND LEVEL BREAK DOWN-->     
                                   
                                    <ul class="pcoded-submenu">
                                        <li class="">
                                            <a href="contribution.php" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext">Contribution</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="contribution_withdrawal.php" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext">Withdrawals</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="contribution_ledger.php" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext">General Ledger</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                       
                                    </ul>
                                </li>
                                 <!--END THIRD LEVEL BREAK DOWN-->
                                   
                                 </li>
                                   
                                   
                                   
                                   
                                   
                                   
                                        <hr> 
                                   
                                   
                                   
                                   
                                  <!----------------MAJOR DROP DOWN 4------------->    
                                 <li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="ti-id-badge"></i><b></b></span>
                                        <span class="pcoded-mtext">
                                            Loan   <?php if($reverse_count > 0){$animation = 'animation';} else {$animation = '';} 
                   echo "<label style='font-size: 16px; color: green; font-weight: bold;'>R $reverse_count</label>&nbsp <label style='font-size: 16px; color: blue; font-weight: bold;'>D $disburse_count</label>";?>
            
                                        </span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                <!--SECOND LEVEL BREAK DOWN-->     
                                    <ul class="pcoded-submenu">
                                        
                                         <li class="">
                                             <a href="loan_request.php" id="mobile-collapse" class="waves-effect waves-dark">
                                                 <span class="pcoded-micon"><i class=""></i><b></b></span>
                                                 <span class="pcoded-mtext">Loan Request <?php echo "<label style='color:blue;'> $disburse_count</label>";?></span>
                                                 <span class="pcoded-mcaret"></span>
                                             </a>
                                         </li>
                                        
                                        
                                         <li class="">
                                            <a href="insurance.php" id="mobile-collapse" class="waves-effect waves-dark">
                                                 <span class="pcoded-micon"><i class=""></i><b></b></span>
                                                 <span class="pcoded-mtext">Insurance</span>
                                                 <span class="pcoded-mcaret"></span>
                                             </a>
                                         </li>
                                         
                                       
                                   <!--END SECOND LEVEL BREAK DOWN-->
                                   
                                   
                                   <!--THIRD LEVEL BREAK DOWN 1-->     
                                         <li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class=""></i><b></b></span>
                                        <span class="pcoded-mtext">(Daily) >></span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class="">
                                            <a href="get_loan.php" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext">(Daily) Get Loan</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="payment.php" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext">(Daily) Payments of Loan</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="debtors.php" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext">Daily Customers</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                         <li class="">
                                            <a href="unearned_income.php" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext">Unearned Income</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                       
                                    </ul>
                                </li>
                                 <!--END THIRD LEVEL BREAK DOWN-->       
                                       
                                 
                                 
                                 
                                 
                                 
                                 
                                 <!--THIRD LEVEL BREAK DOWN 2-->     
                                         <li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class=""></i><b></b></span>
                                        <span class="pcoded-mtext">(Weekly) >></span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class="">
                                            <a href="get_loan_weekly.php" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext">(Weekly) Get Loan</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="weekly_payment.php" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext">(Weekly) Payments of Loan</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                          <li class="">
                                            <a href="weekly_debtors.php" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext">Weekly Customers</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                          <li class="">
                                            <a href="weekly_unearned_income.php" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext">weekly Unearned Income</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                 <!--END THIRD LEVEL BREAK DOWN-->  
                                 
                                 
                                 
                                 
                                 
                                 
                                  <!--THIRD LEVEL BREAK DOWN 3-->     
                                         <li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class=""></i><b></b></span>
                                        <span class="pcoded-mtext">(Monthly) >></span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class="">
                                            <a href="monthly_get_loan.php" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext">(Monthly) Get Loan</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="monthly_payment.php" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext">(Monthly) Payments of Loan</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                          <li class="">
                                              <a href="monthly_debtors.php" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext">Monthly Customers</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                       <li class="">
                                            <a href="monthly_unearned_income.php" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext">monthly Unearned Income</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                 <!--END THIRD LEVEL BREAK DOWN--> 
                                 
                                 
                                 
                                 
                                 
                                 
                                 
                                 
                                   <!--THIRD LEVEL BREAK DOWN 4-->     
                                         <li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class=""></i><b></b></span>
                                        <span class="pcoded-mtext">Reversal Entry >>><?php echo "<label style='color:blue;'> $reverse_count</label>";?></span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class="">
                                            <a href="reversal_alert.php" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext">Staff Reversal Alert</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="reverse_entry.php" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext">(Payment)Reversal Entry</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                          <li class="">
                                              <a href="disburse_reverse_entry.php" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext">(Disbursed)Reversal Entry</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                 <!--END THIRD LEVEL BREAK DOWN--> 
                                 
<!--                                 <li class="">
                                     <a href="savings.php" class="waves-effect waves-dark">
                                                 <span class="pcoded-micon"><i class=""></i><b></b></span>
                                                 <span class="pcoded-mtext">Savings</span>
                                                 <span class="pcoded-mcaret"></span>
                                             </a>
                                         </li>-->
                                 
                                 
                                          
                                         <li class="">
                                            <a href="savings.php" id="mobile-collapse" class="waves-effect waves-dark">
                                                 <span class="pcoded-micon"><i class=""></i><b></b></span>
                                                 <span class="pcoded-mtext">Savings</span>
                                                 <span class="pcoded-mcaret"></span>
                                             </a>
                                         </li> 
                                 
                                 
                                         
                                         
                                         
                                     <!--THIRD LEVEL BREAK DOWN 6-->     
                                         <li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class=""></i><b></b></span>
                                        <span class="pcoded-mtext">Equity Ledger>></span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class="">
                                            <a href="equity.php" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext">Weekly Equity Ledger</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="monthly_equity.php" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext">Monthly Equity Ledger</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                       
                                    </ul>
                                </li>
                                 <!--END THIRD LEVEL BREAK DOWN-->        
                                         
                                         
                                         
                                         
                                         
                                         
                                         
                                 
                                  <!--THIRD LEVEL BREAK DOWN 6-->     
                                         <li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class=""></i><b></b></span>
                                        <span class="pcoded-mtext">Sav./Eq. Withdrawals >></span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class="">
                                            <a href="withdrawals.php" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext">Sav./Eq.(Weekly)</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="monthly_withdrawals.php" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext">Eq.(Monthly)</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                       
                                    </ul>
                                </li>
                                 <!--END THIRD LEVEL BREAK DOWN-->  
                                 
                              
                                 
                                 
                                  <li class="">
                                      <a href="bad_debt.php" id="mobile-collapse" class="waves-effect waves-dark">
                                                 <span class="pcoded-micon"><i class=""></i><b></b></span>
                                                 <span class="pcoded-mtext">Bad Debt</span>
                                                 <span class="pcoded-mcaret"></span>
                                             </a>
                                         </li>
                                         
                                             <li class="">
                                      <a href="black_list.php" id="mobile-collapse" class="waves-effect waves-dark">
                                                 <span class="pcoded-micon"><i class=""></i><b></b></span>
                                                 <span class="pcoded-mtext">Black List</span>
                                                 <span class="pcoded-mcaret"></span>
                                             </a>
                                         </li>
                                         
                                         
<!--                                         <li class="">
                                             <a href="net_worth.php" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class=""></i><b></b></span>
                                                <span class="pcoded-mtext">Net Worth</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>-->
                                         
                                         
                                    </ul>
                                
                                
                                
                                
                                
                                </li>
                            <!--END OF MAJOR DROP DOWN-->  
                            <hr> 
                                   
                                   
                                   
                                 <!----------------MAJOR DROP DOWN 5------------->    
                                 <li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="ti-bag"></i><b></b></span>
                                        <span class="pcoded-mtext">
                                        Defaulters <?php echo "<label style='font-size: 16px; color: red; font-weight: bold;'>$tot_count</label>";?>
                                         <b style="color: #660000;">W</b> <?php echo "<label style='font-size: 16px; color: red; font-weight: bold;'>$tot_count1</label>";?>
                                        </span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                <!--SECOND LEVEL BREAK DOWN-->     
                                    <ul class="pcoded-submenu">
                                         <li class="">
                                             <a href="daily_warning.php" class="waves-effect waves-dark">
                                                 <span class="pcoded-micon"><i class=""></i><b></b></span>
                                                 <span class="pcoded-mtext">
                                                    Daily Warning: <?php echo "<label style='font-size: 16px; color: red; font-weight: bold;'>$count12</label>";?>
                                                 </span>
                                                 <span class="pcoded-mcaret"></span>
                                             </a>
                                         </li>
                                         
                                        <li class="">
                                            <a href="weekly_warning.php" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class=""></i><b></b></span>
                                                <span class="pcoded-mtext">
                                                    Weekly Warning: <?php echo "<label style='font-size: 16px; color: red; font-weight: bold;'>$count22</label>";?>
                                                </span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        
                                        <li class="">
                                            <a href="monthly_warning.php" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class=""></i><b></b></span>
                                                <span class="pcoded-mtext">
                                                Monthly Warning: <?php echo "<label style='font-size: 16px; color: red; font-weight: bold;'>$count32</label>";?>
                                                </span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        
                                        <li class="">
                                            <a href="daily_defaulters.php" class="waves-effect waves-dark">
                                                 <span class="pcoded-micon"><i class=""></i><b></b></span>
                                                 <span class="pcoded-mtext">
                                                     Daily Defaulters: <?php echo "<label style='font-size: 16px; color: red; font-weight: bold;'>$count1</label>";?>
                                                 </span>
                                                 <span class="pcoded-mcaret"></span>
                                             </a>
                                         </li>
                                         
                                        <li class="">
                                            <a href="weekly_defaulters.php" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class=""></i><b></b></span>
                                                <span class="pcoded-mtext">
                                                    Weekly Defaulters: <?php echo "<label style='font-size: 16px; color: red; font-weight: bold;'>$count2</label>";?>
                                                </span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        
                                        <li class="">
                                            <a href="monthly_defaulters.php" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class=""></i><b></b></span>
                                                <span class="pcoded-mtext">
                                                Monthly Defaulters: <?php echo "<label style='font-size: 16px; color: red; font-weight: bold;'>$count3</label>";?>
                                                </span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        
                                        
                                    </ul>    
                                   <!--END SECOND LEVEL BREAK DOWN-->
                                 </li>
                                 
                                   <hr>   
                                   
                                   
                                   
                                   
                                   
                                   
                                   
                                    <!----------------MAJOR DROP DOWN 6------------->    
                                 <li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="ti-wallet"></i><b></b></span>
                                        <span class="pcoded-mtext">
                                       Investors
                                        </span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                <!--SECOND LEVEL BREAK DOWN-->     
                                    <ul class="pcoded-submenu">
                                         <li class="">
                                             <a href="investors_register.php" class="waves-effect waves-dark">
                                                 <span class="pcoded-micon"><i class=""></i><b></b></span>
                                                 <span class="pcoded-mtext">
                                                   Investors Getcode/First Payment
                                                 </span>
                                                 <span class="pcoded-mcaret"></span>
                                             </a>
                                         </li>
                                         
                                        <li class="">
                                            <a href="investors_pay.php" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class=""></i><b></b></span>
                                                <span class="pcoded-mtext">
                                                   Add_To_Existing_Investment
                                                </span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        
                                        <li class="">
                                            <a href="investors_int_pay.php" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class=""></i><b></b></span>
                                                <span class="pcoded-mtext">
                                               Pay Monthly Interest To Investor
                                                </span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        
                                        <li class="">
                                            <a href="investor_withdraw.php" class="waves-effect waves-dark">
                                                 <span class="pcoded-micon"><i class=""></i><b></b></span>
                                                 <span class="pcoded-mtext">
                                                    Investors Withdrawal
                                                 </span>
                                                 <span class="pcoded-mcaret"></span>
                                             </a>
                                         </li>
                                         
                                        <li class="">
                                            <a href="investors.php" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class=""></i><b></b></span>
                                                <span class="pcoded-mtext">
                                                   Investors Ledger
                                                </span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>

                                        <li class="">
                                            <a href="investors_archive.php" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class=""></i><b></b></span>
                                                <span class="pcoded-mtext">
                                                   Archived Investors
                                                </span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>


                                        <li class="">
                                            <a href="investor_intpay_year.php" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class=""></i><b></b></span>
                                                <span class="pcoded-mtext">
                                                   Int. Payment History
                                                </span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        
                                      
                                    </ul>    
                                   <!--END SECOND LEVEL BREAK DOWN-->
                                 </li>
                                 
                                   <hr>   
                                   
                                   
                                   
                                   
                                <li class="">
                                    <a href="investor_alert.php" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="ti-announcement"></i><b></b></span>
                                        <span class="pcoded-mtext">
                                        Inv Alert: <?php echo "<label style='font-size: 16px; color: red; font-weight: bold;'>$count_inv</label>";?>
                                        </span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                               <hr>    
                                   
                                   
                               <li class="">
                                    <a href="expenses_revenue.php" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="ti-layers"></i><b></b></span>
                                        <span class="pcoded-mtext">Exp/Rev</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                
                                   
                                   
                                   
                                   
                           
                          <!--THE MASTER uL-->         
                            </ul>
     
                             </div>
                    </nav>
                            
                            
                            
                           
<!--                            <div class="pcoded-navigation-label">Forms</div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="">
                                    <a href="form-elements-component.html" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                                        <span class="pcoded-mtext">Form</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                            </ul>
                            <div class="pcoded-navigation-label">Tables</div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="">
                                    <a href="bs-basic-table.html" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="ti-receipt"></i><b>B</b></span>
                                        <span class="pcoded-mtext">Table</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                            </ul>
                            <div class="pcoded-navigation-label">Chart And Maps</div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="">
                                    <a href="chart-morris.html" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="ti-bar-chart-alt"></i><b>C</b></span>
                                        <span class="pcoded-mtext">Charts</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="map-google.html" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="ti-map-alt"></i><b>M</b></span>
                                        <span class="pcoded-mtext">Maps</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                            </ul>
                            <div class="pcoded-navigation-label">Pages</div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="pcoded-hasmenu ">
                                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="ti-id-badge"></i><b>A</b></span>
                                        <span class="pcoded-mtext">Pages</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class="">
                                            <a href="auth-normal-sign-in.html" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext">Login</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="auth-sign-up.html" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                                <span class="pcoded-mtext">Registration</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="sample-page.html" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-layout-sidebar-left"></i><b>S</b></span>
                                                <span class="pcoded-mtext">Sample Page</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>-->
<!--           <script>
function myFunction() {
   var element = document.getElementById("pos_fixed");
   element.classList.toggle("pos_move");
}
</script>            -->