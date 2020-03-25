<?php
        include 'connection.php';
          
       
//          $group = ""; 
           $count_Group = $year = ""; 
         
          $codename_search = $_REQUEST['codename']; 
          
         $inc=1;
           
     $result = mysqli_query($connect, "SELECT * FROM monthly_allloan WHERE indbalance > 0 AND remarks = 'loan disbursement'  AND name = '$codename_search'");
    $total_repay22 = mysqli_query($connect, "SELECT SUM(repay) as total FROM monthly_allloan WHERE name = '$codename_search'");      
                          while  ($row = mysqli_fetch_array($total_repay22)){
                          $summation_repay22 = $row['total'];                          
                          }
                $total_weekly = mysqli_query($connect, "SELECT SUM(disburseloan) as total, interest, SUM(interest) as sum_int2 FROM monthly_allloan WHERE name = '$codename_search'");      
                          while  ($row = mysqli_fetch_array($total_weekly)){
                          $summation_loan_weekly = $row['total'] - $row['interest'];  
                          $sum_int2 = $row['sum_int2'];
                          }
           $summation_loan_weekly = $summation_loan_weekly - $summation_repay22;
           
             $sql_all_get112 = mysqli_query($connect, "SELECT * FROM monthly_allloan WHERE remarks = 'loan disbursement' AND name = '$codename_search'");
          while($row=mysqli_fetch_array($sql_all_get112)){
            $total_weekly = mysqli_query($connect, "SELECT SUM(disburseloan) as total, SUM(interest) as sum_int, SUM(repay_sum) as repay_sum FROM monthly_allloan WHERE name = '$codename_search'");      
                          while  ($row = mysqli_fetch_array($total_weekly)){
                          $summation_loan_weekly1 = $row['total'] ;    
                          $sum_int = $row['sum_int'] ;   
                          $repay_sum = $row['repay_sum'] ;
                          
                          $getEarnedIncome = $repay_sum / ($summation_loan_weekly1 / $sum_int);
                   
                          } 
                          
                             
          }
          
            $weekly_unearned_income = $sum_int2 - $getEarnedIncome;
     
     
    echo ' <div class="card card-block table-border-style">';       
     echo     '<div class="table-responsive">';           
     echo '<CAPTION><h3 align="center" style="font-size:22px; color: black;">'.$codename_search.' CURRENT UNEARNED INCOME (MONTHLY)</h3></CAPTION>';
     echo '<table class="table table-bordered table-striped " align="center">';
      
       echo ' <thead class="thead-dark">';
        
         echo '<tr align = "center">';
         echo '<th>S/N</th>'; 
         echo '<th>Name</th>';   
        
          
           echo '<th>Disbursed</th>';
             echo '<th>Unearned Income</th>';
           echo '<th>Codename</th>';
         echo '<th>District</th>';
          echo '<th>View Details</th>';
          echo '</tr>';  
           echo '</thead>';

      echo '<tbody class="" style="font-family: sans-serif; color:black ; font-weight:bold;">';
      
      
    
            echo "<tr align = 'center' style='color:brown; font-size:22px;'>";
            echo "<td>------</td>";
            echo "<td>------</td>";    
         
             echo "<td>TOTAL</td>"; 
           echo "<td>" .number_format($weekly_unearned_income)."</td>";
          
            echo "<td>------</td>"; 
            echo "<td>------</td>";
            echo "<td>------</td>"; 
              echo "</tr>";
           $inc++;
          
      
      
     while ($row=mysqli_fetch_array($result)){
            echo "<tr align = 'center'>";
            echo "<td>" .$inc."</td>";
            echo "<td>" .$row['name']."</td>";    
           echo "<td>" .number_format($row['disburseloan'] - $row['interest'])."</td>";
            $urearned = $row['interest'] - ($row['repay_sum'] / ($row['disburseloan'] / $row['interest']));
             echo "<td>" .number_format($urearned)."</td>"; 
          
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
