<?php
        include 'connection.php';
          
       
//          $group = ""; 
           $count_Group = $year = ""; 
         
          $codename_search = $_REQUEST['codename']; 
          
         $inc=1;
           
     $result = mysqli_query($connect, "SELECT * FROM allloan WHERE  sum_unearned >= 40 AND indbalance > 0 AND remarks = 'loan disbursement'  AND name = '$codename_search'");
     $result_sum = mysqli_query($connect, "SELECT SUM(sum_unearned) as total FROM allloan WHERE  sum_unearned >= 40 AND indbalance > 0 AND remarks = 'loan disbursement' AND name = '$codename_search'");
     while ($row = mysqli_fetch_assoc($result_sum)) {
            $total = $row['total'];
     }
     
    echo ' <div class="card card-block table-border-style">';       
     echo     '<div class="table-responsive">';           
     echo '<CAPTION><h3 align="center" style="font-size:22px; color: black;">'.$codename_search.' CURRENT UNEARNED INCOME</h3></CAPTION>';
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
           echo "<td>" .number_format($total)."</td>";
          
            echo "<td>------</td>"; 
            echo "<td>------</td>";
            echo "<td>------</td>"; 
              echo "</tr>";
           $inc++;
          
      
      
     while ($row=mysqli_fetch_array($result)){
            echo "<tr align = 'center'>";
            echo "<td>" .$inc."</td>";
            echo "<td>" .$row['name']."</td>";    
            echo "<td>" .number_format($row['disburseloan'])."</td>";
             echo "<td>" .number_format($row['sum_unearned'])."</td>"; 
        
          
            echo "<td>" .$row['codename']."</td>"; 
            echo "<td>" .$row['district']."</td>";
            echo "<td ><a style='color: brown;' href='loan_statement.php?codename=" . $row['codename']. "&name=".$row['name']."&type=".$row['type']."'>View details</a></td>"; 
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
