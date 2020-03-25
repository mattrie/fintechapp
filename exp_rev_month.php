<!DOCTYPE html>
<html>
    <head>
        <title>title</title> <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta charset="utf-8">
    </head>
    <body style="background-color: #e0d3d3;">
         

            <?php
              include 'connection.php';  
   
          
        
          $branch = $_REQUEST['branch'];
          $month = $_REQUEST['start']; 
          $year = $_REQUEST['end']; 
            

//loop through all table rows
                  $inc=1;
           
                  if ($branch == "") {
    

     $result = mysqli_query($connect, "SELECT * FROM revenuexp  WHERE month = '$month' AND year = '$year' ORDER BY id DESC");
      echo ' <div class="card">';
         echo '<div class="card-block table-border-style">';
     
     echo     '<div class="table-responsive" >';               
     echo '<CAPTION><h3 align="center" style="font-size:22px; color: black;">['.$month.' - '.$year.'] REVENUE & EXPENSES </h3></CAPTION>';
     echo '<table class="table table-bordered table-striped   table-hover " >';
      
       echo ' <thead class="thead-dark">';
        
         echo '<tr align = "center">';
         echo '<th>S/N</th>';
          echo '<th>Date</th>';
         echo '<th>Remarks</th>'; 
         echo '<th>Gross</th>';
         echo '<th>Expense</th>';        
         echo '<th>Net</th>';          
             
       
          echo '</tr>';     
           echo '</thead>';

    echo '<tbody class="" style="font-family: sans-serif; color:black ; font-weight:bold;">';
                 $sql1 = mysqli_query($connect, "SELECT SUM(expense) as total FROM revenuexp WHERE month = '$month' AND year = '$year'");
           while  ($row3 = mysqli_fetch_array($sql1)){
              $expenses = $row3['total'];                          
              }
              
                $sql = mysqli_query($connect, "SELECT SUM(revenue) as total FROM revenuexp WHERE month = '$month' AND year = '$year'");
           while  ($row3 = mysqli_fetch_array($sql)){
              $revenue = $row3['total'];                          
              }
              
              
                $profit = $revenue - $expenses; 
              
             echo  "<tr align = 'center'>";
            echo "<td colspan='3' align = 'right'>Total</td>";           
            echo "<td style='color: green; font-size: 20px;'>" . number_format($revenue)."</td>";
           echo "<td style='color: red; font-size: 20px;'>" . number_format($expenses)."</td>"; 
            echo "<td style='color: black; font-size: 20px;'>" . number_format($profit)."</td>";            
             echo "</tr>";
    
    
    
    
    
     while ($row=mysqli_fetch_array($result)){
            echo "<tr align = 'center'>";
            echo "<td>" . $inc."</td>";
             echo "<td>" . $row['date']."</td>";
            echo "<td>" . $row['remaks']."</td>";
             echo "<td style='color: green;'>" . number_format($row['revenue'])."</td>"; 
               echo "<td style='color: red;'>" . number_format($row['expense'])."</td>"; 
           
            echo "<td></td>";         
          
            echo "</tr>";
            $inc++;
            }
            
            
            
            
            
            
          
       
            
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
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
     } else {
         
         
      
     $result = mysqli_query($connect, "SELECT * FROM revenuexp  WHERE month = '$month' AND year = '$year' AND branch = '$branch' ORDER BY id DESC");
      echo ' <div class="card">';
         echo '<div class="card-block table-border-style">';
     
     echo     '<div class="table-responsive" >';               
     echo '<CAPTION><h3 align="center" style="font-size:22px; color: black;">['.$month.' - '.$year.'] REVENUE & EXPENSES. Branch: '.$branch.'  </h3></CAPTION>';
     echo '<table class="table table-bordered table-striped   table-hover " >';
      
       echo ' <thead class="thead-dark">';
        
         echo '<tr align = "center">';
         echo '<th>S/N</th>';
          echo '<th>Date</th>';
         echo '<th>Remarks</th>'; 
         echo '<th>Gross</th>';
         echo '<th>Expense</th>';        
         echo '<th>Net</th>';          
             
       
          echo '</tr>';     
           echo '</thead>';

    echo '<tbody class="" style="font-family: sans-serif; color:black ; font-weight:bold;">';
                 $sql1 = mysqli_query($connect, "SELECT SUM(expense) as total FROM revenuexp WHERE month = '$month' AND year = '$year' AND branch = '$branch'");
           while  ($row3 = mysqli_fetch_array($sql1)){
              $expenses = $row3['total'];                          
              }
              
                $sql = mysqli_query($connect, "SELECT SUM(revenue) as total FROM revenuexp WHERE month = '$month' AND year = '$year' AND branch = '$branch'");
           while  ($row3 = mysqli_fetch_array($sql)){
              $revenue = $row3['total'];                          
              }
              
              
                $profit = $revenue - $expenses; 
              
             echo  "<tr align = 'center'>";
            echo "<td colspan='3' align = 'right'>Total</td>";           
            echo "<td style='color: green; font-size: 20px;'>" . number_format($revenue)."</td>";
           echo "<td style='color: red; font-size: 20px;'>" . number_format($expenses)."</td>"; 
            echo "<td style='color: black; font-size: 20px;'>" . number_format($profit)."</td>";            
             echo "</tr>";
    
    
    
    
    
     while ($row=mysqli_fetch_array($result)){
            echo "<tr align = 'center'>";
            echo "<td>" . $inc."</td>";
             echo "<td>" . $row['date']."</td>";
            echo "<td>" . $row['remaks']."</td>";
             echo "<td style='color: green;'>" . number_format($row['revenue'])."</td>"; 
               echo "<td style='color: red;'>" . number_format($row['expense'])."</td>"; 
           
            echo "<td></td>";         
          
            echo "</tr>";
            $inc++;
            }
            
            
            
            
            
            
          
       
            
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
               
         
         
         
         
     }
            
            
            
            ?>
    </body>
</html>
