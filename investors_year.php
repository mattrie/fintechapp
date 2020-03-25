<?php
session_start();
    include 'connection.php';
    ?>
<!DOCTYPE html>

<html>
    <head>
        <title>YEAR</title> <meta content="width=device-width, initial-scale=1.0" name="viewport">
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
             
              $year = ""; 
           $summation_int_pay = ""; 
         
          $year = $_REQUEST['year']; 
            $inc=1;
            
             ////////////THIS IS TO SUM INTEREST PAID
                $total_payments = mysqli_query($connect, "SELECT SUM(monthinterset) as totali FROM investment WHERE year = '$year'");      
              while  ($row1 = mysqli_fetch_array($total_payments)){
             $summation_int_pay = $row1['totali'];                          
             }
            
//           balance > 1 is to avoid repetition
     $result = mysqli_query($connect, "SELECT * FROM investment WHERE year = '$year' ORDER BY id DESC");  
    
     echo ' <div class="card">';
         echo '<div class="card-block table-border-style">';
     
     echo     '<div class="table-responsive" >
     <CAPTION><h3 style="font-size:22px; color:black; font-weight:bold;" align="center">'.$year.' INVESTORS  || INTEREST TO PAY = N'.number_format($summation_int_pay).'</h3></CAPTION>
   
  <table class="table table-bordered table-striped   table-hover " >
      
       <thead class="thead-dark">
         <tr align="center">
         <th>S/N</th> 
          <th>Date</th>
         <th>Name</th>
         <th>Codename</th>
            <th>Payments</th>
             <th>Withdrawal</th>
         <th>Balance</th>
             <th>View Details</th>
             <th>Delete</th>
          </tr>     
          </thead>

    <tbody class="" style="font-family: sans-serif; color:black ; font-weight:bold;">';
        while  ($row = mysqli_fetch_array($result)){
          
          echo   "<tr align='center'>";
            echo "<td >" . $inc."</td>";
               echo "<td>" . $row['date']."</td>"; 
         echo "<td >" . $row['name']."</td>";
        echo "<td >" . $row['codename']."</td>";
           echo "<td style='color: green;' >" . number_format($row['pay'])."</td>"; 
            echo "<td style='color: red;' >" . number_format($row['withdraw'])."</td>"; 
               
             echo "<td >" . number_format($row['genbalinvest'])."</td>"; 
            echo "<td ><a style='color: brown;' href='investors_statement.php?codename=" . $row['codename']. "&name=".$row['name']."'>View details</a></td>";
        echo "<td ><a style='color:#cc9900;' onclick=\"javascript: return confirm('DO YOU WISH TO CONTINUE WITH DELETE?');\" href='investors.php?idd=" . $row['id']."&name=".$row['name']."&id=check_delete'>Delete</a></td>";
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
