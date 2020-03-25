<?php
        include 'connection.php';
          
$weekly_check = $daily_check = $monthly_check =0;
         
          $codename_search = $get_name; 
          
            $inc=1;
           
     $result = mysqli_query($connect, "SELECT * FROM allloan WHERE name = '$codename_search' AND (indbalance > 0) AND remarks = 'loan disbursement' AND  (reverse_alert = '' OR reverse_alert IS NULL)");
     $result1 = mysqli_query($connect, "SELECT * FROM weekly_allloan WHERE name = '$codename_search' AND (indbalance > 0) AND remarks = 'loan disbursement' AND  (reverse_alert = '' OR reverse_alert IS NULL)");
     $result17 = mysqli_query($connect, "SELECT * FROM monthly_allloan WHERE name = '$codename_search' AND (indbalance > 0) AND remarks = 'loan disbursement' AND  (reverse_alert = '' OR reverse_alert IS NULL)");
     
     ' <div class="card">';
          '<div class="card-block table-border-style">';
          '<div class="table-responsive">';            
      '<CAPTION><h3 align="center" style="font-size:22px; color: black;"><i>'.$codename_search.'</i> [ACTIVE TRANSACTION(S)]</h3></CAPTION>';
      '<table class="table table-bordered table-striped table-sm  table-hover " style="font-size:16px;" align="center">';
      
        ' <thead class="thead-dark">';
        
          '<tr align = "center">';
          '<th>S/N</th>';        
           '<th>Type</th>';
             '<th>Repayment</th>';
            '<th>Disbursed</th>';
              '<th>Indbalance</th>';     
            '<th>Codename</th>';
          '<th>District</th>';
           '<th>View Details</th>';
           '</tr>';  
            '</thead>';

       '<tbody class="" style="font-family: sans-serif; color:black ; font-weight:bold;">';
     while ($row=mysqli_fetch_array($result)){

       
         
             "<tr align = 'center'>";
             "<td>" . $inc."</td>";
             "<td>" . $row['type']."</td>";
             "<td style='color: green;'>" . number_format($row['repay_sum'])."</td>"; 
            "<td style='color: red;'>" . number_format($row['disburseloan'])."</td>";
              "<td style='color: blue;'>" . number_format($row['indbalance'])."</td>";
             "<td>" . $row['codename']."</td>"; 
             "<td>" . $row['district']."</td>";
             "<td ><a style='color: brown;' href='loan_statement.php?codename=" . $row['codename']. "&name=".$row['name']."&type=".$row['type']."'>View details</a></td>"; 
            
               "</tr>";
               $daily_check += $row['indbalance'];
           $inc++;
            }
            
            
      while ($row=mysqli_fetch_array($result1)){

         
             "<tr align = 'center'>";
                  "<td>" . $inc."</td>";
             "<td>" . $row['type']."</td>";
              "<td style='color: green;'>" . number_format($row['repay_sum'])."</td>"; 
            "<td style='color: red;'>" . number_format($row['disburseloan'])."</td>";
              "<td style='color: blue;'>" . number_format($row['indbalance'])."</td>";
             "<td>" . $row['codename']."</td>"; 
             "<td>" . $row['district']."</td>";
            "<td ><a style='color:brown;' href='weekly_loan_statement.php?codename=" . $row['codename']. "&name=".$row['name']."&type=".$row['type']."'>View details</a></td>";
         
               "</tr>";
                 $weekly_check += $row['indbalance'];
           $inc++;
            }  
            
            
            
            
             while ($row=mysqli_fetch_array($result17)){
                 
             "<tr align = 'center'>";
                
             "<td>" . $inc."</td>";
          "<td>" . $row['type']."</td>";
                 "<td style='color: green;'>" . number_format($row['repay_sum'])."</td>"; 
            "<td style='color: red;'>" . number_format($row['disburseloan'])."</td>";
              "<td style='color: blue;'>" . number_format($row['indbalance'])."</td>";
             "<td>" . $row['codename']."</td>"; 
             "<td>" . $row['district']."</td>";
         "<td ><a style='color: brown;' href='monthly_loan_statement.php?codename=" . $row['codename']. "&name=".$row['name']."&type=".$row['type']."'>View details</a></td>";
       
               "</tr>";
                 $monthly_check += $row['indbalance'];
           $inc++;
            }  
            
            
            
            
                          
             $total_ckeck =  $daily_check + $weekly_check + $monthly_check;     
            
            
            
            
             ' </tbody>';
           ' </table>';
     
            '</div>' ;
           '</div>' ;  
             '</div>' ;
           
   