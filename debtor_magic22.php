<!DOCTYPE html>
<?php
session_start();
    include 'connection.php';
    ?>
<html>
    <head>
        <title>title</title> <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta charset="utf-8">
    </head>
    <body style="background-color: #e0d3d3;">
         

            <?php
           
    
           
    
       $class = "";
       
       $class = $_REQUEST['district'];

        //loop through all table rows
            $inc=1;
            
             ////////////THIS IS TO SUM PAYMENTS
                $total_payments = mysqli_query($connect, "SELECT SUM(payments) as total FROM loan WHERE district = '$class'");      
              while  ($row1 = mysqli_fetch_array($total_payments)){
              $summation_pay = $row1['total'];                          
              }
            
           
     $result = mysqli_query($connect, "SELECT * FROM loan WHERE balance > '1' AND district = '$class'");      
                        echo '<CAPTION><h3 align="center" style="font-size:22px; color: black;">DEBTORS</h3></CAPTION>';
     echo '<table class="table table-bordered table-striped   table-hover " >';
      
       echo ' <thead class="thead-dark">';
        
         echo '<tr align = "center" >';
         echo '<th >S/N</th>';         
         echo '<th >Name</th>';
          echo '<th >Date Collected</th>';
         echo '<th >Amount</th>';
            echo '<th >Interest</th>';
             echo '<th >Debt</th>';
         echo '<th >Payments</th>';
         echo '<th >Balance</th>';
         
          
               echo '<th >Codename</th>';
               echo '<th >District</th>';
             echo '<th >View Details</th>';
          echo '</tr>';     
          
          
        while  ($row = mysqli_fetch_array($result)){
         
            echo "<tr align = 'center'>";
            echo "<td>" . $inc."</td>";
            echo "<td>" . $row['name']."</td>";
               echo "<td>" . $row['date']."</td>";
            echo "<td style='color: red;'>" . $row['amount']."</td>"; 
              echo "<td>" . $row['interest']."</td>"; 
           echo "<td style='color: red;'>" . $row['balance']."</td>"; 
            echo "<td style='color: green;'>" . $row['paymentstotal']."</td>"; 
             echo "<td>" . $row['realbalance']."</td>"; 
            echo "<td>" . $row['codename']. "</td>"; 
            echo "<td>" . $row['district']. "</td>"; 
            echo "<td ><a style='color: #ff9900;' href='payment.php?codename=" . $row['codename']. "&name=".$row['name']."'>View details</a></td>";
           
            echo "</tr>";
            $inc++;
            }
            
             $sql = mysqli_query($connect, "SELECT SUM(realbalance) as total FROM loan WHERE district = '$class'");
           while  ($row3 = mysqli_fetch_array($sql)){
              $summation_loan = $row3['total'];                          
              }
             echo  "<tr align = 'center'>";
            echo "<td colspan='6'></td>";
           echo "<td style='color: black; font-size: 20px;'>Total:</td>"; 
            echo "<td style='color: black; font-size: 20px;'>" . $summation_loan."</td>"; 
            echo "<td colspan='3'></td>";
             echo "</tr>";
            
                ////////////THIS IS TO SUM CONTRIBUTION
//                        $total_savings = mysqli_query($connect, "SELECT SUM(amount) as total FROM contribution WHERE name='$name'");      
//                          while  ($row = mysqli_fetch_array($total_savings)){
//                          $summation = $row['total'];                          
//                          }
//                            
//                            ////////////THIS IS TO SUM WITHDRAWAL
//                            $total_savings1 = mysqli_query($connect, "SELECT SUM(amount) as total FROM witdraw WHERE name='$name'");      
//                          while  ($row1 = mysqli_fetch_array($total_savings1)){
//                          $summation1 = $row1['total'];                          
//                          }
//                          
//                       $actual_savings =  $summation - $summation1;
//            
//            
            
            
            echo '</table>';  
            ?>
    </body>
</html>


