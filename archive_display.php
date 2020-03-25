<?php
        include 'connection.php';
          
       
//          $group = ""; 
           $count_Group = $year = ""; 
         
          $codename = $_REQUEST['codename']; 
          
            $inc=1;
           
     $result = mysqli_query($connect, "SELECT * FROM allloan WHERE name = '$codename' AND (indbalance < 1) AND  (reverse_alert = '' OR reverse_alert IS NULL) AND remarks = 'loan disbursement' ORDER BY id DESC");
     $result1 = mysqli_query($connect, "SELECT * FROM weekly_allloan WHERE name = '$codename'  AND (indbalance < 1) AND  (reverse_alert = '' OR reverse_alert IS NULL) AND remarks = 'loan disbursement' ORDER BY id DESC");
     $result17 = mysqli_query($connect, "SELECT * FROM monthly_allloan WHERE name = '$codename'  AND (indbalance < 1) AND  (reverse_alert = '' OR reverse_alert IS NULL) AND remarks = 'loan disbursement' ORDER BY id DESC");
      
   echo ' <div class="card card-block table-border-style">';       
     echo     '<div class="table-responsive">';            
     echo '<CAPTION><h3 align="center" style="font-size:22px; color: black;"><i>'.$codename.'</i> [FINISHED TRANSACTION(S)]</h3></CAPTION>';
     echo '<table class="table table-bordered table-striped table-hover align="center">';
      
       echo ' <thead class="thead-dark">';
        
         echo '<tr align = "center">';
         echo '<th>S/N</th>';    
        
          echo '<th>Type</th>';
            echo '<th>Repayment</th>';
           echo '<th>Disbursed</th>';  
              echo '<th>Indbalance</th>';     
           echo '<th>Codename</th>';
         echo '<th>District</th>';
          echo '<th>View Details</th>';
          echo '</tr>';  
           echo '</thead>';

      echo '<tbody class="" style="font-family: sans-serif; color:black ; font-weight:bold;">';
      while ($row=mysqli_fetch_array($result)){
            echo "<tr align = 'center'>";
            echo "<td>" .$inc."</td>";
              
            echo "<td>" .$row['type']."</td>";
              echo "<td style='color: green;'>" . number_format($row['repay_sum'])."</td>"; 
           echo "<td style='color: red;'>" . number_format($row['disburseloan'])."</td>";
             echo "<td style='color: blue;'>" . number_format($row['indbalance'])."</td>";
            echo "<td>" .$row['codename']."</td>"; 
            echo "<td>" .$row['district']."</td>";
            echo "<td ><a style='color: brown;' href='loan_statement.php?codename=" . $row['codename']. "&name=".$row['name']."&type=".$row['type']."'>View details</a></td>"; 
              echo "</tr>";
           $inc++;
            }
            
            
      while ($row=mysqli_fetch_array($result1)){
          
            echo "<tr align = 'center'>";
                 echo "<td>" . $inc."</td>";
            echo "<td>" . $row['type']."</td>";
              echo "<td style='color: green;'>" . number_format($row['repay_sum'])."</td>"; 
           echo "<td style='color: red;'>" . number_format($row['disburseloan'])."</td>";
             echo "<td style='color: blue;'>" . number_format($row['indbalance'])."</td>";
            echo "<td>" .$row['codename']."</td>"; 
            echo "<td>" .$row['district']."</td>";
           echo "<td ><a style='color:brown;' href='weekly_loan_statement.php?codename=" . $row['codename']. "&name=".$row['name']."&type=".$row['type']."'>View details</a></td>";
          echo "</tr>";
           $inc++;
            }  
            
            
            
            
             while ($row=mysqli_fetch_array($result17)){
                 
            echo "<tr align = 'center'>";
            echo "<td>" .$inc."</td>";
         echo "<td>" .$row['type']."</td>";
               echo "<td style='color: green;'>" . number_format($row['repay_sum'])."</td>"; 
           echo "<td style='color: red;'>" . number_format($row['disburseloan'])."</td>";
             echo "<td style='color: blue;'>" . number_format($row['indbalance'])."</td>";
            echo "<td>" .$row['codename']."</td>"; 
            echo "<td>" .$row['district']."</td>";
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
