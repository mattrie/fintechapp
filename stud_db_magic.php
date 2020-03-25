<!DOCTYPE html>
<html>
    <head>
        <title>title</title> <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta charset="utf-8">
    </head>
    <body style="background-color: #e0d3d3;">
         

            <?php
         include 'connection.php';
            //loop through all table rows
            $inc=1;
           
     $result = mysqli_query($connect, "SELECT * FROM members ORDER BY namee");
      echo ' <div class="card">';
         echo '<div class="card-block table-border-style">';
     echo     '<div class="table-responsive" >';  
     
     echo '<CAPTION><h3 align="center" style="font-size:22px; color: black;">ALL MEMBERS TOTAL SAVINGS & WITHDRAWAL</h3></CAPTION>';
    echo '<table class="table table-bordered table-striped   table-hover " >';
      
       echo ' <thead class="thead-dark">';    
         echo '<tr align = "center">';
         echo '<th>S/N</th>';
         echo '<th>Name</th>';
         echo '<th>Date Joined</th>';
         echo '<th>District</th>';
         echo '<th>Telephone</th>';          
           echo '<th>Savings</th>';
             echo '<th>Withdraws</th>';
               echo '<th>Balance</th>';
               echo '<th>Status</th>';
             echo '<th>View Details</th>';
          echo '</tr>'; 
             echo '</thead>';

    echo '<tbody class="" style="font-family: sans-serif; color:black ; font-weight:bold;">';
     while ($row=mysqli_fetch_array($result)){

       
         
            echo "<tr align = 'center'>";
            echo "<td>" . $inc."</td>";
            echo "<td>" . $row['namee']."</td>";
               echo "<td>" . $row['level']."</td>"; 
            echo "<td>" . $row['registration_num']."</td>"; 
            echo "<td>" . $row['telephone']."</td>";         
            echo "<td style='color: green;'>" . $row['savings']."</td>"; 
            echo "<td style='color: red;'>" . $row['loan']."</td>";
            echo "<td>" . $row['balance']."</td>";  
        if($row['savings'] > $row['loan']){ $status = 'P';} else {$status = 'CL';};
            echo "<td>" .$status."</td>";
     echo "<td ><a style='color: #ff9900;' href='statement.php?name=" . $row['namee']. "'>View details</a></td>";
           
            echo "</tr>";
            $inc++;
            }
            
            
              $sql = mysqli_query($connect, "SELECT SUM(balance) as total FROM members");
           while  ($row3 = mysqli_fetch_array($sql)){
              $summation_bal = $row3['total'];                          
              }
             echo  "<tr align = 'center'>";
            echo "<td colspan='6'></td>";
           echo "<td style='color: black; font-size: 20px;'>Total Balance:</td>"; 
            echo "<td style='color: black; font-size: 20px;'>" . $summation_bal."</td>"; 
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
            echo ' </tbody>';
          echo ' </table>';
     
           echo '</div>' ;
            echo '</div>' ;
            ?>
    </body>
</html>
