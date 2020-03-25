<?php
        include 'connection.php';
          
       
//          $group = ""; 
           $count_Group = $year = ""; 
         
//          $codename_search = $_REQUEST['codename']; 
           $month = filter_input(INPUT_GET, 'month') ; 
          $year = filter_input(INPUT_GET, 'year') ;  
            $inc=1;
           
     $result = mysqli_query($connect, "SELECT * FROM allloan WHERE month = '$month' AND year = '$year' AND   remarks = 'Bad Debt Settled by Finsolute'");
     $result1 = mysqli_query($connect, "SELECT * FROM weekly_allloan WHERE month = '$month' AND year = '$year' AND   remarks = 'Bad Debt Settled by Finsolute'");
     $result17 = mysqli_query($connect, "SELECT * FROM monthly_allloan WHERE month = '$month' AND year = '$year' AND   remarks = 'Bad Debt Settled by Finsolute'");
     
     echo ' <div class="card">';
         echo '<div class="card-block table-border-style">';
     
     echo     '<div class="table-responsive" >';             
     echo '<CAPTION><h3 align="center" style="font-size:22px; color: black;">'.$month.' - '.$year.'[BAD DEBT SETTLED BY FINSOLUTE]</h3></CAPTION>';
      echo '<table class="table table-bordered table-striped   table-hover " >';
      
       echo ' <thead class="thead-dark">';
        
         echo '<tr align = "center">';
         echo '<th>S/N</th>';        
          echo '<th>Type</th>';
            echo '<th>Repayment</th>';
         
           echo '<th>Codename</th>';
         echo '<th>District</th>';
          echo '<th>View Details</th>';
          echo '</tr>';  
           echo '</thead>';

      echo '<tbody class="" style="font-family: sans-serif; color:black ; font-weight:bold;">';
       //    ###########################################################################################    
    ////////////THIS IS TO SUM DAILY
                        $total_daily= mysqli_query($connect, "SELECT SUM(repay) as total FROM allloan WHERE  month = '$month' AND year = '$year' AND   remarks = 'Bad Debt Settled by Finsolute'");      
                          while  ($row = mysqli_fetch_array($total_daily)){
                          $summation_daily = $row['total'];                          
                          }
               
            ////////////THIS IS TO SUM weekly
                        $total_weekly= mysqli_query($connect, "SELECT SUM(repay) as total FROM weekly_allloan WHERE month = '$month' AND year = '$year' AND  remarks = 'Bad Debt Settled by Finsolute'");      
                          while  ($row = mysqli_fetch_array($total_weekly)){
                          $summation_weekly = $row['total'];                          
                          } 
                          
                          
              ////////////THIS IS TO SUM monthly
                        $total_monthly= mysqli_query($connect, "SELECT SUM(repay) as total FROM monthly_allloan WHERE month = '$month' AND year = '$year' AND  remarks = 'Bad Debt Settled by Finsolute'");      
                          while  ($row = mysqli_fetch_array($total_monthly)){
                          $summation_monthly = $row['total'];                          
                          }               
                          
                 $summation = $summation_daily + $summation_weekly + $summation_monthly;
                  echo "<tr align = 'center'>";
            echo "<td>--------</td>";
              echo "<td align = 'right' style='font-size: 20px;'>TOTAL: </td>";
                echo "<td style='color: green; font-size: 20px;'>".number_format($summation)."</td>";
             
            echo "<td>--------</td>"; 
            echo "<td>--------</td>"; 
         
            echo "<td>--------</td>";
//             echo "<td>--------</td>"; 
              echo "</tr>";
              
  //    ###########################################################################################   
     while ($row=mysqli_fetch_array($result)){
            echo "<tr align = 'center'>";
            echo "<td>" .$inc."</td>";
            echo "<td>" .$row['type']."</td>";
            echo "<td>" .$row['repay']."</td>"; 
          
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
            echo "<td>" .$row['repay']."</td>"; 
          
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
            echo "<td>" .$row['repay']."</td>"; 
          
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
