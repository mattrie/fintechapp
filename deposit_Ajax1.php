<?php

   session_start();
    include 'connection_ajax.php';
       
$total_depoit = 0;
 $inc = 1;
                 $codename = $_GET['codename'];
                 $deposit = $_GET['depositing'];
                 date_default_timezone_set("Africa/Lagos");
                    $time = date("h:i:a");
                 $date = date("jS F Y");
            $insert_deposit = mysqli_query($connect, "INSERT INTO monthly_deposit (codename, deposit, time_t, date_d) VALUES ('$codename', '$deposit', '$time', '$date')");  
              
                $sql_find_add = "SELECT * FROM monthly_allloan WHERE codename = '$codename' AND disburseloan > 1 AND remarks = 'loan disbursement'"; 
                $result_add = mysqli_query($connect, $sql_find_add);
                while ($row = mysqli_fetch_assoc($result_add)) {
                    $get_deposit = $row['deposit'];
                }
                
                   $final_deposit = $deposit + $get_deposit;
                   
                   
              $sql_update_deposit = "UPDATE monthly_allloan SET deposit = '$final_deposit' WHERE codename = '$codename' AND disburseloan > 1 AND remarks = 'loan disbursement'"; 
                $result_update = mysqli_query($connect, $sql_update_deposit);      
                   
            
            
            
                 
             $result_deposit = mysqli_query($connect, "SELECT * FROM monthly_deposit WHERE codename = '$codename' ORDER BY id DESC");  
           
                echo '<table class="table table-bordered table-striped table-hover">';
           echo '<thead class="thead-dark"> 
               <th style="font-weight:bold;">S/n</th>
               <th style="font-weight:bold;">Date</th>
               <th style="font-weight:bold;">Deposit</th>
                <th style="font-weight:bold;">Delete</th>
                 </thead>';
           echo '<body>';
           while ($row = mysqli_fetch_assoc($result_deposit)) {
              
                  echo '<tr>
                      <td>'.$inc.'</td>
                       <td>'.date("d-m-Y", strtotime($row['date_d'])).'</td>
                        <td>'.number_format($row['deposit']).'</td>
                                 <td  onclick="del_deposit('.$row['id'].')" style="color:red; cursor:pointer;"><input id="get_id" type="hidden"  value="'.$row['id'].'">Delete<td>     
          
              <tr> ';
                  $inc++;
                  $total_depoit += $row['deposit'];
}
   echo  "<b style='font-weight:bold; font-size:18px;'>Total: N". number_format($total_depoit)."</b>";
             echo '<body>';
           echo '</table>';
//                   echo number_format($final_deposit);  
                 
            