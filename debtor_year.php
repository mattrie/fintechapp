<!DOCTYPE html>
<html>
    <head>
        <title>title</title> <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta charset="utf-8">
            <!-- Script -->
    <script src='jquery-3.1.1.min.js' type='text/javascript'></script>
   
    <!-- jQuery UI -->
     
    <link href='jquery-ui.min.css' rel='stylesheet' type='text/css'>
    <script type='text/javascript' src='jquery-ui.min.js'></script>
    
        <meta charset="utf-8">
           <!--Boostrap & family-->
  <!--<link rel="stylesheet" href="maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
 <link rel="stylesheet" href="maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
 
 
 <!--<script src="ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->
  <script src="cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    </head>
    <body style="background-color: #e0d3d3;">
           <br>

           <?php
        include 'connection.php';
          
       
         
        
        
         
          $performannce = filter_input(INPUT_GET, 'year') ;  
        
//loop through all table rows
          
         $inc = 1;
       $statistics =$statistics1 = 1; 
       
    $statistics_part  = $statistics_all  = 0;   
       
         if ($performannce == "non") {
//        COUNTING THE STATTISTICS     
       
       $result11 = mysqli_query($connect, "SELECT * FROM allloan WHERE indbalance > 1 AND remarks = 'loan disbursement' AND disburseloan > 0");
           
         while  ($row = mysqli_fetch_array($result11)){
            $statistics_all  =  $statistics;
           
        $get_dailyenddate1 = $row['startdate'];
              ////CALCULATE CLOSING DATE
          $get_dailyenddate  = date('Y-m-d', strtotime($get_dailyenddate1. ' + 40 days'));
                               $get_startdate = $row['startdate'];
             $get_indbalance = $row['indbalance'];
              
        ///////GET_PAYRATE     
     $repay_sum = $row['repay_sum'];
     $disburseloan = $row['disburseloan'];
     $disburseloan_interest = $row['interest'];   
     $principal = $disburseloan + $disburseloan_interest;
     
    
     
     @$pay_rate = ($repay_sum/$disburseloan) * 100;
              ///////////////////////////////////////
                 //GET NUMBER OF MONTHS & DAYS LEFT
                    $dated = strtotime("$get_dailyenddate");
                 
            $remaining = time() - $dated;
         
                
                ///////COUNT ONLY DAYS
        $days_remaining = floor($remaining / 86400);  
       
               if($days_remaining > 39 && $get_indbalance > 1 &&  $principal != $repay_sum && $get_indbalance != 60000){
        
         $statistics_part  =  $statistics1;
            $statistics1++;
                }
              
                
                
                $statistics++;   
//                
           
            }     
             
           
                $percent = ($statistics_part/$statistics_all) * 100;  
             
           
             
             
             
             
             
             
             
             
//     ['.round($percent, 0).'% OF DEBTORS]        
// '.$statistics_part.'   
     
      $result = mysqli_query($connect, "SELECT * FROM allloan WHERE indbalance > 1 AND remarks = 'loan disbursement' AND disburseloan > 0");
    
   echo ' <div class="card card-block table-border-style">';       
     echo     '<div class="table-responsive">
     <CAPTION><h3 style="font-size:26px; color:black; font-weight:bold;" align="center">['.round($percent, 0).'% NON-PERFORMING LOAN] DAILY CUSTOMERS</h3></CAPTION>
   
  <table class="table table-bordered table-striped " align="center">
      
       <thead class="thead-dark">
         <tr align="center">
         <th>S/N</th>         
         <th >Customer Name</th>
           <th>Codename</th>
                  <th>Account Officer</th>
          
         <th>Description</th>
           <th>Date</th>
            <th>Repayment</th>
             <th>Disbursed</th>
                <th>Balance</th>
             <th>View Details</th>
             
          </tr>     
          </thead>

    <tbody class="" style="font-family: sans-serif; color:black ; font-weight:bold;">';
     //    ###########################################################################################   
      ///GET ALL DEBTORS FOR DAILY
            ////////////THIS IS TO SUM DAILY
     $summation_repay11 = $summation_loan11 = 0;
                        $total_repay11 = mysqli_query($connect, "SELECT * FROM allloan WHERE indbalance > 1 AND remarks = 'loan disbursement' AND disburseloan > 0");      
                          while  ($row = mysqli_fetch_array($total_repay11)){
                          
                             
                                 $get_dailyenddate1 = $row['startdate'];
              ////CALCULATE CLOSING DATE
          $get_dailyenddate  = date('Y-m-d', strtotime($get_dailyenddate1. ' + 40 days'));
             $get_indbalance = $row['indbalance'];
     $repay_sum = $row['repay_sum'];
     $disburseloan = $row['disburseloan'];
     $disburseloan_interest = $row['interest'];   
     $principal = $disburseloan + $disburseloan_interest;
     
     @$pay_rate = ($repay_sum/$disburseloan) * 100;
              ///////////////////////////////////////
                 //GET NUMBER OF MONTHS & DAYS LEFT
                    $dated = strtotime("$get_dailyenddate");
               
            $remaining = time() - $dated;
         
                
                ///////COUNT ONLY DAYS
        $days_remaining = floor($remaining / 86400);  
     
               if($days_remaining > 39 && $get_indbalance > 1 &&  $principal != $repay_sum && $get_indbalance != 60000){
           $summation_repay11 += $row['repay_sum'];                           
                          }
                  }
                  
//     ------------------------------------------------------------------------             
                  
                  
       ////////////THIS IS TO SUM DAILY
                        $total_daily = mysqli_query($connect, "SELECT * FROM allloan WHERE indbalance > 1 AND remarks = 'loan disbursement' AND disburseloan > 0");      
                          while  ($row = mysqli_fetch_array($total_daily)){
                                 
                                 $get_dailyenddate1 = $row['startdate'];
              ////CALCULATE CLOSING DATE
          $get_dailyenddate  = date('Y-m-d', strtotime($get_dailyenddate1. ' + 40 days'));
             $get_indbalance = $row['indbalance'];
     $repay_sum = $row['repay_sum'];
     $disburseloan = $row['disburseloan'];
     $disburseloan_interest = $row['interest'];   
     $principal = $disburseloan + $disburseloan_interest;
     
     @$pay_rate = ($repay_sum/$disburseloan) * 100;
              ///////////////////////////////////////
                 //GET NUMBER OF MONTHS & DAYS LEFT
                    $dated = strtotime("$get_dailyenddate");
               
            $remaining = time() - $dated;
         
                
                ///////COUNT ONLY DAYS
        $days_remaining = floor($remaining / 86400);  
     
               if($days_remaining > 39 && $get_indbalance > 1 &&  $principal != $repay_sum && $get_indbalance != 60000){                
                          $summation_loan11 += $row['disburseloan'];                        
                          }
                     }
           $summation_loan = $summation_loan11 - $summation_repay11;
//     ----------------------------------------------------------------------------------   
           
           
           
                  echo "<tr id='hide_total' align = 'center'>";
            echo "<td>--------</td>";
            echo "<td>--------</td>";
             echo "<td>--------</td>";
            echo "<td>--------</td>"; 
            echo "<td>--------</td>"; 
            echo "<td align = 'right' style='font-size: 20px;'>TOTAL: </td>";
                echo "<td style='color: green; font-size: 20px;'>".number_format($summation_repay11)."</td>";
               echo "<td style='color: red; font-size: 20px;'>".number_format($summation_loan11)."</td>";
            echo "<td style='color: blue; font-size: 20px;'>".number_format($summation_loan)."</td>";  
            echo "<td>--------</td>";
            
              echo "</tr>";
              
  //    ###########################################################################################    
            
        while  ($row = mysqli_fetch_array($result)){
                          
                                 $get_dailyenddate1 = $row['startdate'];
              ////CALCULATE CLOSING DATE
          $get_dailyenddate  = date('Y-m-d', strtotime($get_dailyenddate1. ' + 40 days'));
             $get_indbalance = $row['indbalance'];
     $repay_sum = $row['repay_sum'];
     $disburseloan = $row['disburseloan'];
     $disburseloan_interest = $row['interest'];   
     $principal = $disburseloan + $disburseloan_interest;
     
     @$pay_rate = ($repay_sum/$disburseloan) * 100;
              ///////////////////////////////////////
                 //GET NUMBER OF MONTHS & DAYS LEFT
                    $dated = strtotime("$get_dailyenddate");
               
            $remaining = time() - $dated;
         
                
                ///////COUNT ONLY DAYS
        $days_remaining = floor($remaining / 86400);  
     
               if($days_remaining > 39 && $get_indbalance > 1 &&  $principal != $repay_sum && $get_indbalance != 60000){
          echo   "<tr>";
            echo "<td >" . $inc."</td>";
            echo "<td >" . $row['name']."</td>";
             echo "<td >" . $row['codename']. "</td>"; 
              echo "<td >" . $row['district']. "</td>"; 
             
            echo "<td >" . $row['acc_officer']."</td>"; 
              echo "<td>" . $row['date']."</td>"; 
           echo "<td style='color: green;' >" . number_format($row['repay_sum'])."</td>"; 
            echo "<td style='color: red;' >" . number_format($row['disburseloan'])."</td>"; 
               echo "<td style='color: blue;' >" . number_format($row['indbalance'])."</td>"; 
            echo "<td ><a style='color: brown;' href='loan_statement.php?codename=" . $row['codename']. "&name=".$row['name']."&type=".$row['type']."'>View details</a></td>";
//              echo "<td ><a style='color:#cc9900;' onclick=\"javascript: return confirm('DO YOU WISH TO CONTINUE WITH DELETE?');\" href='debtors.php?iddd=" . $row['id']."&name=".$row['name']."&id=check_delete'>Delete</a></td>";
   
            echo "</tr>";
          
            $inc++;
                }
            }
         
   echo ' </tbody>';
  echo ' </table>';
     
  echo '</div>' ;
  echo '</div>' ;
 
     
     
    } 
     
     
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
      if ($performannce == "perform") {
//     GETING THE PERCENTAGE OF NON-PERFORMING TO MINUS FROM 100  
      
       $result112 = mysqli_query($connect, "SELECT * FROM allloan WHERE indbalance > 1 AND remarks = 'loan disbursement' AND disburseloan > 0");
           
         while  ($row = mysqli_fetch_array($result112)){
            $statistics_all  =  $statistics;
           
        $get_dailyenddate1 = $row['startdate'];
              ////CALCULATE CLOSING DATE
          $get_dailyenddate  = date('Y-m-d', strtotime($get_dailyenddate1. ' + 40 days'));
                               $get_startdate = $row['startdate'];
             $get_indbalance = $row['indbalance'];
              
        ///////GET_PAYRATE     
     $repay_sum = $row['repay_sum'];
     $disburseloan = $row['disburseloan'];
     $disburseloan_interest = $row['interest'];   
     $principal = $disburseloan + $disburseloan_interest;
     
    
     
     @$pay_rate = ($repay_sum/$disburseloan) * 100;
              ///////////////////////////////////////
                 //GET NUMBER OF MONTHS & DAYS LEFT
                    $dated = strtotime("$get_dailyenddate");
                 
            $remaining = time() - $dated;
         
                
                ///////COUNT ONLY DAYS
        $days_remaining = floor($remaining / 86400);  
       
               if($days_remaining > 39 && $get_indbalance > 1 &&  $principal != $repay_sum && $get_indbalance != 60000){
        
         $statistics_part  =  $statistics1;
            $statistics1++;
                }
              
                
                
                $statistics++;   
//                
           
            }     
             
           
                $percent_non = ($statistics_part/$statistics_all) * 100;  
             
           
             
          
          $percent_non_minus_100 = 100 - $percent_non;
          
          
          
    
       //        COUNTING THE STATTISTICS     
      
       $result11 = mysqli_query($connect, "SELECT * FROM allloan WHERE indbalance > 1 AND remarks = 'loan disbursement' AND disburseloan > 0");
           
         while  ($row = mysqli_fetch_array($result11)){
              $statistics_all  =  $statistics;
           
        $get_dailyenddate = $row['enddate'];
                               $get_startdate = $row['startdate'];
             $get_indbalance = $row['indbalance'];
              
        ///////GET_PAYRATE     
     $repay_sum = $row['repay_sum'];
     $disburseloan = $row['disburseloan'];
     $disburseloan_interest = $row['interest'];   
     $principal = $disburseloan + $disburseloan_interest;
     
     $pay_rate = ($repay_sum/$disburseloan) * 100;
              ///////////////////////////////////////
                 //GET NUMBER OF MONTHS & DAYS LEFT
                    $dated = strtotime("$get_dailyenddate");
                    $dated_startdate = strtotime("$get_startdate"); 
            $remaining = $dated - time();
          $remaining_startdate = time() - $dated_startdate;
                
                ///////COUNT ONLY DAYS
        $days_remaining = floor($remaining / 86400);  
        $start_gap = floor($remaining_startdate / 86400);  
               if($start_gap > 39 && $get_indbalance > 1 && $pay_rate >= 95 &&  $principal != $repay_sum && $get_indbalance != 60000){
        
         $statistics_part  =  $statistics1;
            $statistics1++;
                }
              
                
                
                $statistics++;   
//                
           
            }     
             
           
                $percent = ($statistics_part/$statistics_all) * 100;  
          
          
          
          $percent1 = 100 - $percent;
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
//       ['.round($percent, 2).'% OF DEBTORS]   
//     '.$statistics_part.'     
     
      $result = mysqli_query($connect, "SELECT * FROM allloan WHERE indbalance > 1 AND remarks = 'loan disbursement' AND disburseloan > 0");
    
   echo ' <div class="card card-block table-border-style">';       
     echo     '<div class="table-responsive">
     <CAPTION><h3 style="font-size:26px; color:black; font-weight:bold;" align="center">['.round($percent_non_minus_100, 0).'% PERFORMING LOAN]  DAILY CUSTOMERS</h3></CAPTION>
   
  <table class="table table-bordered table-striped " align="center">
      
       <thead class="thead-dark">
         <tr align="center">
         <th>S/N</th>         
         <th >Customer Name</th>
           <th>Codename</th>
               <th>District</th>
          
             <th>Account Officer</th>
           <th>Date</th>
            <th>Repayment</th>
             <th>Disbursed</th>
                <th>Balance</th>
             <th>View Details</th>
             
          </tr>     
          </thead>

    <tbody class="" style="font-family: sans-serif; color:black ; font-weight:bold;">';
     //    ###########################################################################################   
      ///GET ALL DEBTORS FOR DAILY
            ////////////THIS IS TO SUM DAILY
     $summation_repay11 = $summation_loan11 = 0;
                        $total_repay11 = mysqli_query($connect, "SELECT * FROM allloan WHERE indbalance > 1 AND remarks = 'loan disbursement' AND disburseloan > 0");      
                          while  ($row = mysqli_fetch_array($total_repay11)){
                                           $get_dailyenddate1 = $row['startdate'];
              ////CALCULATE CLOSING DATE
          $get_dailyenddate  = date('Y-m-d', strtotime($get_dailyenddate1. ' + 40 days'));
             $get_indbalance = $row['indbalance'];
     $repay_sum = $row['repay_sum'];
     $disburseloan = $row['disburseloan'];
     $disburseloan_interest = $row['interest'];   
     $principal = $disburseloan + $disburseloan_interest;
     
     @$pay_rate = ($repay_sum/$disburseloan) * 100;
              ///////////////////////////////////////
                 //GET NUMBER OF MONTHS & DAYS LEFT
                    $dated = strtotime("$get_dailyenddate");
               
            $remaining = time() - $dated;
         
                
                ///////COUNT ONLY DAYS
        $days_remaining = floor($remaining / 86400);  
     
               if($days_remaining  <= 39 && $get_indbalance > 1  &&  $principal != $repay_sum && $get_indbalance != 60000){
           $summation_repay11 += $row['repay_sum'];                           
                          }
                  }
                  
//     ------------------------------------------------------------------------             
                  
                  
       ////////////THIS IS TO SUM DAILY
                        $total_daily = mysqli_query($connect, "SELECT * FROM allloan WHERE indbalance > 1 AND remarks = 'loan disbursement' AND disburseloan > 0");      
                          while  ($row = mysqli_fetch_array($total_daily)){
                               $get_dailyenddate1 = $row['startdate'];
              ////CALCULATE CLOSING DATE
          $get_dailyenddate  = date('Y-m-d', strtotime($get_dailyenddate1. ' + 40 days'));
             $get_indbalance = $row['indbalance'];
     $repay_sum = $row['repay_sum'];
     $disburseloan = $row['disburseloan'];
     $disburseloan_interest = $row['interest'];   
     $principal = $disburseloan + $disburseloan_interest;
     
     @$pay_rate = ($repay_sum/$disburseloan) * 100;
              ///////////////////////////////////////
                 //GET NUMBER OF MONTHS & DAYS LEFT
                    $dated = strtotime("$get_dailyenddate");
               
            $remaining = time() - $dated;
         
                
                ///////COUNT ONLY DAYS
        $days_remaining = floor($remaining / 86400);  
     
               if($days_remaining  <= 39 && $get_indbalance > 1 &&  $principal != $repay_sum && $get_indbalance != 60000){                
                          $summation_loan11 += $row['disburseloan'];                        
                          }
                     }
           $summation_loan = $summation_loan11 - $summation_repay11;
//     ----------------------------------------------------------------------------------   
           
           
           
                  echo "<tr id='hide_total' align = 'center'>";
            echo "<td>--------</td>";
            echo "<td>--------</td>";
             echo "<td>--------</td>";
            echo "<td>--------</td>"; 
            echo "<td>--------</td>"; 
            echo "<td align = 'right' style='font-size: 20px;'>TOTAL: </td>";
                echo "<td style='color: green; font-size: 20px;'>".number_format($summation_repay11)."</td>";
               echo "<td style='color: red; font-size: 20px;'>".number_format($summation_loan11)."</td>";
            echo "<td style='color: blue; font-size: 20px;'>".number_format($summation_loan)."</td>";  
            echo "<td>--------</td>";
            
              echo "</tr>";
              
  //    ###########################################################################################    
            
        while  ($row = mysqli_fetch_array($result)){
                           $get_dailyenddate1 = $row['startdate'];
              ////CALCULATE CLOSING DATE
          $get_dailyenddate  = date('Y-m-d', strtotime($get_dailyenddate1. ' + 40 days'));
             $get_indbalance = $row['indbalance'];
     $repay_sum = $row['repay_sum'];
     $disburseloan = $row['disburseloan'];
     $disburseloan_interest = $row['interest'];   
     $principal = $disburseloan + $disburseloan_interest;
     
     @$pay_rate = ($repay_sum/$disburseloan) * 100;
              ///////////////////////////////////////
                 //GET NUMBER OF MONTHS & DAYS LEFT
                    $dated = strtotime("$get_dailyenddate");
               
            $remaining = time() - $dated;
         
                
                ///////COUNT ONLY DAYS
        $days_remaining = floor($remaining / 86400);  
     
               if($days_remaining  <= 39 && $get_indbalance > 1 ){
          echo   "<tr>";
            echo "<td >" . $inc."</td>";
            echo "<td >" . $row['name']."</td>";
             echo "<td >" . $row['codename']. "</td>"; 
              echo "<td >" . $row['district']. "</td>"; 
             
            echo "<td >" . $row['acc_officer']."</td>"; 
              echo "<td>" . $row['date']."</td>"; 
           echo "<td style='color: green;' >" . number_format($row['repay_sum'])."</td>"; 
            echo "<td style='color: red;' >" . number_format($row['disburseloan'])."</td>"; 
               echo "<td style='color: blue;' >" . number_format($row['indbalance'])."</td>"; 
            echo "<td ><a style='color: brown;' href='loan_statement.php?codename=" . $row['codename']. "&name=".$row['name']."&type=".$row['type']."'>View details</a></td>";
//              echo "<td ><a style='color:#cc9900;' onclick=\"javascript: return confirm('DO YOU WISH TO CONTINUE WITH DELETE?');\" href='debtors.php?iddd=" . $row['id']."&name=".$row['name']."&id=check_delete'>Delete</a></td>";
   
            echo "</tr>";
          
            $inc++;
                }
            }
         
   echo ' </tbody>';
  echo ' </table>';
     
  echo '</div>' ;
  echo '</div>' ;
 
     
     
    }
     
     
            ?>
    </body>
</html>
