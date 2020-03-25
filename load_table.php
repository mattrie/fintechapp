<?php

   session_start();
    include 'connection.php';
       
$total_depoit = 0;
         $inc = 1;
                 $codename = $_GET['codename'];
               
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
  
             echo '<body>';
           echo '</table>';
            echo  "<b style='font-weight:bold; font-size:18px;'>Total: N". number_format($total_depoit)."</b>";
//                   echo number_format($final_deposit);  
                 
                   
                   
             
                 
            