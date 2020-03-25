<!DOCTYPE html>
<html>
    <head>
        <title>title</title> <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta charset="utf-8">
    </head>
    <body style="background-color: #e0d3d3;">
         

              <?php
          include 'connection_ajax.php';
          
       
        $year = filter_input(INPUT_GET, 'year') ;  
          $carry_group = filter_input(INPUT_GET, 'carry_group');  
          
         $evaluation = filter_input(INPUT_GET, 'evaluation1');  

//loop through all table rows
         
       $inc = 1;
         
      $result = mysqli_query($connect, "SELECT * FROM weekly_allloan WHERE indbalance > 0 AND remarks = 'loan disbursement' AND    (reverse_alert = '' OR reverse_alert IS NULL)  AND year = '$year'  ORDER BY id DESC");  
    
    echo ' <div class="card card-block table-border-style">';       
     echo     '<div class="table-responsive">

     <CAPTION><h3 style="font-size:26px; color:black; font-weight:bold;" align="center">'.$year.' WEEKLY CUSTOMERS</h3></CAPTION>
   
  <table class="table table-bordered table-striped " align="center">
      
       <thead class="thead-dark">
         <tr align="center">
         <th>S/N</th>         
         <th >Customer Name</th>
           <th>Codename</th>
               <th>District</th>
          
         <th>Description</th>
           <th>Date</th>
            <th>Repayment</th>
             <th>Disbursed</th>
                <th>Balance</th>
             <th>View Details</th>
             
          </tr>     
          </thead>

    <tbody class="" style="font-family: sans-serif; color:black ; font-weight:bold;">';
     //    ###########################################################################################   
      ///GET ALL DEBTORS FOR DAILY
            ////////////THIS IS TO SUM DAILY
                        $total_repay11 = mysqli_query($connect, "SELECT SUM(repay) as total FROM weekly_allloan WHERE   year = '$year' AND (remarks = 'loan repayment' OR remarks = 'Penalty Paid')");      
                          while  ($row = mysqli_fetch_array($total_repay11)){
                          $summation_repay11 = $row['total'];                          
                          }
               
       ////////////THIS IS TO SUM DAILY
                        $total_daily = mysqli_query($connect, "SELECT SUM(disburseloan) as total FROM weekly_allloan WHERE   year = '$year' ");      
                          while  ($row = mysqli_fetch_array($total_daily)){
                          $summation_loan11 = $row['total'];                          
                          }
               
           $summation_loan = $summation_loan11 - $summation_repay11;
                  
//                  echo "<tr align = 'center'>";
//            echo "<td>--------</td>";
//            echo "<td>--------</td>";
//             echo "<td>--------</td>";
//            echo "<td>--------</td>"; 
//            echo "<td>--------</td>"; 
//            echo "<td align = 'right' style='font-size: 20px;'>TOTAL: </td>";
//                echo "<td style='color: green; font-size: 20px;'>".number_format($summation_repay11)."</td>";
//               echo "<td style='color: red; font-size: 20px;'>".number_format($summation_loan11)."</td>";
//            echo "<td style='color: blue; font-size: 20px;'>".number_format($summation_loan)."</td>";  
//            echo "<td>--------</td>";
//            
//              echo "</tr>";
              
  //    ###########################################################################################    
            
        while  ($row = mysqli_fetch_array($result)){
           $ans_bal = $row['repay_sum'] - $row['disburseloan'];
           if($ans_bal < 0 && $row['remarks'] == "loan disbursement"){
          echo   "<tr>";
            echo "<td >" . $inc."</td>";
            echo "<td >" . $row['name']."</td>";
             echo "<td >" . $row['codename']. "</td>"; 
              echo "<td >" . $row['district']. "</td>"; 
             
            echo "<td >" . $row['remarks']."</td>"; 
              echo "<td>" . $row['date']."</td>"; 
           echo "<td style='color: green;' >" . number_format($row['repay_sum'])."</td>"; 
            echo "<td style='color: red;' >" . number_format($row['disburseloan'])."</td>"; 
                   echo "<td style='color: blue;' >" . number_format($row['indbalance'])."</td>";  
            echo "<td ><a style='color: brown;' href='staff_weekly_loan_statement.php?codename=" . $row['codename']. "&name=".$row['name']."&type=".$row['type']."'>View details</a></td>";
//              echo "<td ><a style='color:#cc9900;' onclick=\"javascript: return confirm('DO YOU WISH TO CONTINUE WITH DELETE?');\" href='debtors.php?iddd=" . $row['id']."&name=".$row['name']."&id=check_delete'>Delete</a></td>";
   
            echo "</tr>";
            
            $inc++;
                }
            }
         
   echo ' </tbody>';
  echo ' </table>';
     
  echo '</div>' ;
  echo '</div>' ;
 
     
     
            
            ?>
    </body>
</html>
