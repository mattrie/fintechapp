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
             
         $month = ""; 
          $year = ""; 
          
          $month = $_REQUEST['month']; 
          $year = $_REQUEST['year']; 
            $inc=1;
            
             ////////////THIS IS TO SUM PAYMENTS
//                $total_payments = mysqli_query($connect, "SELECT SUM(payments) as total FROM loan");      
//              while  ($row1 = mysqli_fetch_array($total_payments)){
//              $summation_pay = $row1['total'];                          
//              }
            
//           balance > 1 is to avoid repetition
     $result = mysqli_query($connect, "SELECT * FROM weekly_allloan WHERE month = '$month' AND year = '$year' AND (equity > '1' OR withdrawequity > '1') ORDER BY id DESC");  
    
   echo ' <div class="card card-block table-border-style">';       
     echo     '<div class="table-responsive">

     <CAPTION><h3 style="font-size:22px; color:black; font-weight:bold;" align="center">'.$month.' - '.$year.' WEEKLY_EQUITY</h3></CAPTION>
   
  <table class="table table-bordered table-striped " align="center">
      
       <thead class="thead-dark">
         <tr align="center">
         <th>S/N</th> 
          <th>Date</th>
         <th>Name</th>
            <th>Equity</th>
             <th>Withdrawal</th>
         <th>Balance</th>
             <th>View Details</th>
          </tr>     
          </thead>

    <tbody class="" style="font-family: sans-serif; color:black ; font-weight:bold;">';
        while  ($row = mysqli_fetch_array($result)){
          
          echo   "<tr align='center'>";
            echo "<td >" . $inc."</td>";
               echo "<td>" . $row['date']."</td>"; 
            echo "<td >" . $row['name']."</td>";
           echo "<td style='color: green;' >" . number_format($row['equity'])."</td>"; 
            echo "<td style='color: red;' >" . number_format($row['withdrawequity'])."</td>"; 
             echo "<td >" . number_format($row['genbalequity'])."</td>"; 
            echo "<td ><a style='color: #ff9900;' href='equity_statement.php?codename=" . $row['codename']. "&name=".$row['name']."&type=".$row['type']."'>View details</a></td>";
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
