<?php
//session_start();
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
               $month = $_REQUEST['month']; 
          $year = $_REQUEST['year']; 
            //loop through all table rows
            $inc=1;
            
             ////////////THIS IS TO SUM PAYMENTS
//                $total_payments = mysqli_query($connect, "SELECT SUM(payments) as total FROM loan");      
//              while  ($row1 = mysqli_fetch_array($total_payments)){
//              $summation_pay = $row1['total'];                          
//              }
            
//           balance > 1 is to avoid repetition
     $result = mysqli_query($connect, "SELECT * FROM allloan WHERE month = '$month' AND year = '$year' AND (insurance_in > '1' OR insurance_out) ORDER BY id DESC");  
     $result11 = mysqli_query($connect, "SELECT * FROM weekly_allloan WHERE month = '$month' AND year = '$year' AND (insurance_in > '1' OR insurance_out) ORDER BY id DESC");  
      $result22 = mysqli_query($connect, "SELECT * FROM monthly_allloan WHERE month = '$month' AND year = '$year' AND (insurance_in > '1' OR insurance_out) ORDER BY id DESC");  
    
    echo '<div class="card card-block table-border-style">';
     
     echo     '<div class="table-responsive">
     <CAPTION><h3 style="font-size:24px; color:black; font-weight:bold;" align="center">INSURANCE LEDGER ['.$month.' - '.$year.']</h3></CAPTION>
   
  <table class="table table-bordered table-striped table-sm  table-hover "  align="center">
      
       <thead class="thead-dark">
         <tr align="center">
         <th>S/N</th> 
          <th>Date</th>
         <th>Name</th>
         <th>Type</th>
         <th>Disbursed</th>
            <th>Deposit</th>
             <th>Withdrawals</th>
         <th>Balance</th>
             <th>View Details</th>
          </tr>     
          </thead>

    <tbody class="" style="font-family: sans-serif; color:black ; font-weight:bold;">';
     
         $sum_insurance_in = mysqli_query($connect, "SELECT SUM(insurance_in) as total_in FROM allloan WHERE month = '$month' AND year = '$year'");
                   while ($row = mysqli_fetch_assoc($sum_insurance_in)) {
                        $insurance_in = $row['total_in'];
                   }


                   $sum_insurance_out = mysqli_query($connect, "SELECT SUM(insurance_out) as total_out FROM allloan WHERE month = '$month' AND year = '$year'");
                   while ($row = mysqli_fetch_assoc($sum_insurance_out)) {
                        $insurance_out = $row['total_out'];
                   }

                        $total_insurance = $insurance_in - $insurance_out;
                        
                        
                        
                        
                        
         $sum_insurance_in2 = mysqli_query($connect, "SELECT SUM(insurance_in) as total_in FROM weekly_allloan WHERE month = '$month' AND year = '$year'");
                   while ($row = mysqli_fetch_assoc($sum_insurance_in2)) {
                        $insurance_in2 = $row['total_in'];
                   }


                   $sum_insurance_out2 = mysqli_query($connect, "SELECT SUM(insurance_out) as total_out FROM weekly_allloan WHERE month = '$month' AND year = '$year'");
                   while ($row = mysqli_fetch_assoc($sum_insurance_out2)) {
                        $insurance_out2 = $row['total_out'];
                   }

                        $total_insurance2 = $insurance_in2 - $insurance_out2;
                        
                        
                        
         $sum_insurance_in3 = mysqli_query($connect, "SELECT SUM(insurance_in) as total_in FROM monthly_allloan WHERE month = '$month' AND year = '$year'");
                   while ($row = mysqli_fetch_assoc($sum_insurance_in3)) {
                        $insurance_in3 = $row['total_in'];
                   }


                   $sum_insurance_out3 = mysqli_query($connect, "SELECT SUM(insurance_out) as total_out FROM monthly_allloan WHERE month = '$month' AND year = '$year'");
                   while ($row = mysqli_fetch_assoc($sum_insurance_out3)) {
                        $insurance_out3 = $row['total_out'];
                   }

                        $total_insurance3 = $insurance_in3 - $insurance_out3;     
                        
                        
                        
                     $final_total_insurance  = $total_insurance + $total_insurance2 + $total_insurance3;
                      
                     $final_insurance_in  = $insurance_in + $insurance_in2 + $insurance_in3;
                       
                     $final_insurance_out  = $insurance_out + $insurance_out2 + $insurance_out3;
                     
                      
             echo   "<tr align='center'>";
                 echo "<td >------------</td>";  
            echo "<td >------------</td>";
               echo "<td>------------</td>"; 
            echo "<td >------------</td>";
             echo "<td >Total</td>";
           echo "<td style='color: green;' >" . number_format($final_insurance_in)."</td>"; 
            echo "<td style='color: red;' >" . number_format($final_insurance_out)."</td>"; 
               echo "<td style='color: green;' >" . number_format($final_total_insurance)."</td>"; 
              echo "<td >------------</td>";  
           echo "</tr>";             
                        
     
     
     
        while  ($row = mysqli_fetch_array($result)){
          
          echo   "<tr align='center'>";
            echo "<td >" . $inc."</td>";
               echo "<td>" . $row['date']."</td>"; 
            echo "<td >" . $row['name']."</td>";
             echo "<td >" . $row['type']."</td>";
                    echo "<td style='color: blue;'>" . number_format($row['disburseloan'])."</td>"; 
           echo "<td style='color: green;' >" . number_format($row['insurance_in'])."</td>"; 
            echo "<td style='color: red;' >" . number_format($row['insurance_out'])."</td>"; 
               
          echo "<td ></td>";
            echo "<td ><a style='color: brown;' href='loan_statement.php?codename=" . $row['codename']. "&name=".$row['name']."&type=".$row['type']."'>View details</a></td>";
            echo "</tr>";
            
            $inc++;
            }
            
            
            
            
            
             while  ($row = mysqli_fetch_array($result11)){
          
          echo   "<tr align='center'>";
            echo "<td >" . $inc."</td>";
               echo "<td>" . $row['date']."</td>"; 
            echo "<td >" . $row['name']."</td>";
             echo "<td >" . $row['type']."</td>";
                    echo "<td style='color: blue;'>" . number_format($row['disburseloan'])."</td>"; 
           echo "<td style='color: green;' >" . number_format($row['insurance_in'])."</td>"; 
            echo "<td style='color: red;' >" . number_format($row['insurance_out'])."</td>"; 
               
          echo "<td ></td>";
            echo "<td ><a style='color: brown;' href='weekly_loan_statement.php?codename=" . $row['codename']. "&name=".$row['name']."&type=".$row['type']."'>View details</a></td>";
            echo "</tr>";
            
            $inc++;
            }
            
            
            
            
             while  ($row = mysqli_fetch_array($result22)){
          
          echo   "<tr align='center'>";
            echo "<td >" . $inc."</td>";
               echo "<td>" . $row['date']."</td>"; 
            echo "<td >" . $row['name']."</td>";
             echo "<td >" . $row['type']."</td>";
                    echo "<td style='color: blue;'>" . number_format($row['disburseloan'])."</td>"; 
           echo "<td style='color: green;' >" . number_format($row['insurance_in'])."</td>"; 
            echo "<td style='color: red;' >" . number_format($row['insurance_out'])."</td>"; 
               
          echo "<td ></td>";
            echo "<td ><a style='color: brown;' href='monthly_loan_statement.php?codename=" . $row['codename']. "&name=".$row['name']."&type=".$row['type']."'>View details</a></td>";
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
