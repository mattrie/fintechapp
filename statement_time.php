<!DOCTYPE html>

<?php
session_start();
    include 'connection.php';
    ?>

<html>
    <head>
        <title>Statement</title> <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta charset="utf-8">
         <!-- Script -->
        <script src='jquery-3.1.1.min.js' type='text/javascript'></script>

        <!-- jQuery UI -->
        <link href='jquery-ui.min.css' rel='stylesheet' type='text/css'>
        <script src='jquery-ui.min.js' type='text/javascript'></script>
        <meta charset="utf-8">
        
        
           <!--Boostrap & family-->
  <!--<link rel="stylesheet" href="maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
 <link rel="stylesheet" href="maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
 
  <!--<script src="ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->
  <script src="cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  
        
        
         <!--<link rel="stylesheet" type="text/css" href="majorstyle.css"/>-->
        <style type="text/css">
                    body{
                         background-image: none;
                        background-color: white;  
                        
                         }
                        
             </style>
        
        
    </head>
    <body style="background-color: #e0d3d3;">
           <center class="heading"><div class="trans fixed-top" style="background-color:#ff5d0f; font-size: 22px;"><b><a href="admin_home.php" style="color: black;">FINSOLUTE</a></b></div></center>
    
     <hr style="color: red; height: 3px; margin-top: 0.5px"/> 
  <button id="back" onclick="goBack()" style="padding: 4px; margin-bottom:  25px;  border-radius: 8px; font-size: 16px; background-color: black; color: whitesmoke; border: 2px solid white; cursor: pointer;"><<|Back|</button>
         
        
            <?php
         
            //loop through all table rows
            $inc=1;
           
        $name = "";
        $month = "";
        $year = "";
        
       @$name = $_GET['name'];
       @$month = $_GET['month'];
       @$year = $_GET['year'];
       
        $sql_state = "SELECT * FROM contribution WHERE name = '$name' AND month = '$month' AND year = '$year'";
            $result = mysqli_query($connect, $sql_state);
             echo ' <div class="card">';
         echo '<div class="card-block table-border-style">';
     
     echo     '<div class="table-responsive" >';  
                 echo '<CAPTION><h3 align="center" style="font-size:22px; color: black;">'.$name.' - SAVINGS & WITHDRAWAL FOR: '.$month .' - '. $year.'</h3></CAPTION>';
     echo '<table class="table table-bordered table-striped   table-hover " >';
      
       echo ' <thead class="thead-dark">';
        echo '<table class="table table-bordered table-striped   table-hover " >';
      
       echo ' <thead class="thead-dark">'; 
         echo '<tr align = "center">';
         echo '<th>S/N</th>';
         echo '<th>Date</th>';         
         echo '<th>Credit</th>';
         echo '<th>Debit</th>';
         echo '<th>Current Balance</th>';
         
          echo '</tr>';    
           echo '</thead>';

    echo '<tbody class="" style="font-family: sans-serif; color:black ; font-weight:bold;">';
     while ($row=mysqli_fetch_array($result)){

       
         
            echo "<tr align = 'center'>";
            echo "<td>" . $inc."</td>";
            echo "<td>" . $row['date']."</td>";
            echo "<td style='color: green;'>" . $row['amount']."</td>"; 
            echo "<td style='color: red;'>" . $row['withdraw']."</td>";
                 echo '<td></td>';
            echo "</tr>";
            $inc++;
            }
          
            
            
         $sql = mysqli_query($connect, "SELECT SUM(amount) as total FROM contribution WHERE name = '$name' AND month = '$month' AND year = '$year'");
           while  ($row3 = mysqli_fetch_array($sql)){
              $summation_amount = $row3['total'];                          
              }
              
              
               $sql = mysqli_query($connect, "SELECT SUM(withdraw) as total FROM contribution WHERE name = '$name' AND month = '$month' AND year = '$year'");
           while  ($row3 = mysqli_fetch_array($sql)){
              $summation_withdraw = $row3['total'];                          
              }
              
             $bala = $summation_amount - $summation_withdraw; 
             echo  "<tr align = 'center'>";
            echo "<td colspan='2'></td>";
               echo "<td style='color: green; font-size: 20px;'>".$summation_amount."</td>";
           echo "<td style='color: red; font-size: 20px;'>".$summation_withdraw."</td>"; 
            echo "<td style='color: black; font-size: 20px;'>" . $bala."</td>"; 
           
             echo "</tr>";
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
            ?>
  
  
  
  
  
  
   <script>
             function goBack() {
                 window.history.back();
             }
          </script>
    </body>
</html>
