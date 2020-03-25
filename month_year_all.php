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
      $monthall = "";
      $yearall = "";
       
      $monthall = $_REQUEST['month'];
       $yearall = $_REQUEST['year'];
            $inc=1;
           
     $result = mysqli_query($connect, "SELECT * FROM contribution WHERE month = '$monthall' AND year = '$yearall' AND single = 'head' ORDER BY name");
              echo ' <div class="card">';
         echo '<div class="card-block table-border-style">';
     
     echo     '<div class="table-responsive" >';          
     echo '<CAPTION><h3 align="center" style="font-size:22px; color: black;">SAVINGS & WITHDRAWAL FOR: '.$monthall .' - '. $yearall.'</h3></CAPTION>';
      echo '<table class="table table-bordered table-striped   table-hover " >';
      
       echo ' <thead class="thead-dark">'; 
         echo '<tr align = "center">';
         echo '<th>S/N</th>';
         echo '<th>Name</th>';        
         echo '<th>District</th>';
         echo '<th>Rate</th>';          
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
            echo "<td>" . $row['name']."</td>";
               echo "<td>" . $row['district']."</td>"; 
            echo "<td>" . $row['rate']."</td>";              
            echo "<td style='color: green;'>" . $row['amountmonth']."</td>"; 
            echo "<td style='color: red;'>" . $row['withdrawmonth']."</td>";
//            if($row['amountmonth'] == "" || $row['withdrawmonth'] = ""){
//                $row['amountmonth'] = 0;
//                $row['withdrawmonth'] = 0;
//            }
          $balance = $row['amountmonth'] - $row['withdrawmonth']; 
            echo "<td>" .$balance."</td>";  
        if($row['amountmonth'] > $row['withdrawmonth']){ $status = 'P';} else {$status = 'CL';};
            echo "<td>" .$status."</td>";
     echo "<td ><a style='color: #ff9900;' href='statement_time.php?name=" . $row['name']. "&month=".$monthall. "&year=".$yearall."'>View details</a></td>";
           
            echo "</tr>";
            $inc++;
            }
            
            
       ///////THIS IS TO GET TOTAL BALANCE FOR THE MONTH     
            $sql = mysqli_query($connect, "SELECT SUM(amount) as total FROM contribution WHERE month = '$monthall' AND year = '$yearall'");
           while  ($row3 = mysqli_fetch_array($sql)){
              $summation_amount = $row3['total'];                          
              }
              
              
               $sql = mysqli_query($connect, "SELECT SUM(withdraw) as total FROM contribution WHERE month = '$monthall' AND year = '$yearall'");
           while  ($row3 = mysqli_fetch_array($sql)){
              $summation_withdraw = $row3['total'];                          
              }
              
             $bala = $summation_amount - $summation_withdraw; 
             echo  "<tr align = 'center'>";
            echo "<td colspan='5'></td>";
           echo "<td style='color: black; font-size: 20px;'>Total Balance:</td>"; 
            echo "<td style='color: black; font-size: 20px;'>" . $bala."</td>"; 
            echo "<td colspan='3'></td>";
             echo "</tr>";
            
            
            echo ' </tbody>';
          echo ' </table>';
     
           echo '</div>' ;
            echo '</div>' ;
            ?>
    </body>
</html>
