<?php
session_start();
    include 'connection.php';
    ?>
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
    <body >
        <style>
            #center{
                 padding: 0px 5px 0px 8px; 
            }
        </style>
 

            <?php
            
            //loop through all table rows
            $inc=1;
            
             ////////////THIS IS TO SUM PAYMENTS
//                $total_payments = mysqli_query($connect, "SELECT SUM(payments) as total FROM loan");      
//              while  ($row1 = mysqli_fetch_array($total_payments)){
//              $summation_pay = $row1['total'];                          
//              }
            
//           balance > 1 is to avoid repetition
     $result = mysqli_query($connect, "SELECT * FROM investment WHERE remarks = 'Investment deposited' ORDER BY id DESC");  
    
     echo ' <div class="card">';
         echo '<div class="card-block table-border-style">';
     
     echo     '<div class="table-responsive" >
     <CAPTION><h3 style="font-size:24px; color:black; font-weight:bold;" align="center">INVESTORS</h3></CAPTION>
   
  <table class="table table-bordered table-striped   table-hover table_id" >
      
       <thead class="thead-dark">
         <tr align="center">
         <th>S/N</th> 
          <th>Date</th>
         <th>Name</th>
         <th>Codename</th>
            <th>Payments</th>
             <th>Withdrawal</th>
         <th>Gen. Balance</th>
             <th>View Details</th>
        
          </tr>     
          </thead>

    <tbody class="" style="font-family: sans-serif; color:black ; font-weight:bold;">';
      //    ###########################################################################################    
    ////////////THIS IS TO SUM DAILY
                        $total_invest = mysqli_query($connect, "SELECT SUM(pay) as total FROM investment");      
                          while  ($row = mysqli_fetch_array($total_invest)){
                          $summation_repay = $row['total'];                          
                          }
               
               ////////////THIS IS TO SUM DAILY
                        $total_withdraw = mysqli_query($connect, "SELECT SUM(withdraw) as total FROM investment");      
                          while  ($row = mysqli_fetch_array($total_withdraw)){
                          $summation_disburseloan = $row['total'];                          
                          }
                            
                    $summation =  $summation_repay - $summation_disburseloan ;
                  
                  echo "<tr align = 'center'>";
          
             echo "<td></td>";
            echo "<td>--------</td>"; 
            echo "<td>--------</td>"; 
            echo "<td align = 'right' style='font-size: 20px;'>TOTAL: </td>";
                echo "<td style='color: green; font-size: 20px;'>".number_format($summation_repay)."</td>";
               echo "<td style='color: red; font-size: 20px;'>".number_format($summation_disburseloan)."</td>";
            echo "<td style='color: blue; font-size: 20px;'>".number_format($summation)."</td>";  
            echo "<td>--------</td>";
          
              echo "</tr>";
              
  //    ###########################################################################################    
            
        while  ($row = mysqli_fetch_array($result)){
          
          echo   "<tr align='center'>";
            echo "<td >" . $inc."</td>";
               echo "<td>" . $row['date']."</td>"; 
            echo "<td >" . $row['name']."</td>";
            echo "<td >" . $row['codename']."</td>";
           echo "<td style='color: green;' >" . number_format($row['sum_pay'])."</td>"; 
            echo "<td style='color: red;' >" . number_format($row['sum_withdraw'])."</td>"; 
               
             echo "<td >" . number_format($row['genbalinvest'])."</td>"; 
            echo "<td ><a style='color: brown;' href='investors_statement.php?codename=" . $row['codename']. "&name=".$row['name']."'>View details</a></td>";
      
            echo "</tr>";
            
            $inc++;
            }
   echo ' </tbody>';
  echo ' </table>';
     
  echo '</div>' ;
  echo '</div>' ;
 
    
            
          
            ?>
    </body>
</html>
