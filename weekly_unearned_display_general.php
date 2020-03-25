    <?php
    include 'connection.php';


    //          $group = ""; 
    $count_Group = $year = "";

    //          $codename_search = $_REQUEST['codename']; 

    $inc = 1;

    $result = mysqli_query($connect, "SELECT * FROM weekly_allloan WHERE indbalance > 0 AND remarks = 'loan disbursement' ORDER BY id DESC");
    $total_repay22 = mysqli_query($connect, "SELECT SUM(repay) as total FROM weekly_allloan");
    while ($row = mysqli_fetch_array($total_repay22)) {
      $summation_repay22 = $row['total'];
    }
    $total_weekly = mysqli_query($connect, "SELECT SUM(disburseloan) as total, interest, SUM(interest) as sum_int2 FROM weekly_allloan");
    while ($row = mysqli_fetch_array($total_weekly)) {
      $summation_loan_weekly = $row['total'] - $row['interest'];
      $sum_int2 = $row['sum_int2'];
    }
    $summation_loan_weekly = $summation_loan_weekly - $summation_repay22;

    $sql_all_get112 = mysqli_query($connect, "SELECT * FROM weekly_allloan WHERE remarks = 'loan disbursement'");
    while ($row = mysqli_fetch_array($sql_all_get112)) {
      $total_weekly = mysqli_query($connect, "SELECT SUM(disburseloan) as total, SUM(interest) as sum_int, SUM(repay_sum) as repay_sum FROM weekly_allloan");
      while ($row = mysqli_fetch_array($total_weekly)) {
        $summation_loan_weekly1 = $row['total'];
        $sum_int = $row['sum_int'];
        $repay_sum = $row['repay_sum'];

        $getEarnedIncome = $repay_sum / ($summation_loan_weekly1 / $sum_int);

      }


    }


       // New Weekly Unearned Income
       $get_revenue_weekly = mysqli_query($connect, "SELECT SUM(revenue) as weekly_rev FROM revenuexp WHERE category = 'interest_weekly'");
       while ($row = mysqli_fetch_array($get_revenue_weekly)) {
         $sum_revenue_weekly = $row['weekly_rev'];
       }

      //  echo "<script>alert('$sum_revenue_weekly')</script>";

    $weekly_unearned_income = $sum_int2 - $sum_revenue_weekly;

    echo ' <div class="card card-block table-border-style">';
    echo '<div class="table-responsive">';
    echo '<CAPTION><h3 align="center" style="font-size:22px; color: black;">WEEKLY UNEARNED INCOME</h3></CAPTION>';
    echo '<table class="table table-bordered table-striped " align="center">';

    echo ' <thead class="thead-dark">';

    echo '<tr align = "center">';
    echo '<th>S/N</th>';
    echo '<th>Name</th>';
    echo '<th>Date</th>';


    echo '<th>Disbursed</th>';
    echo '<th>Unearned Income</th>';
    //             echo '<th>Interest</th>';
    echo '<th>Codename</th>';
    echo '<th>District</th>';
    echo '<th>View Details</th>';
    echo '</tr>';
    echo '</thead>';

    echo '<tbody class="" style="font-family: sans-serif; color:black ; font-weight:bold;">';



    echo "<tr align = 'center' style='color:brown; font-size:22px;'>";
    echo "<td>------</td>";
    echo "<td>------</td>";
    echo "<td>------</td>";

    echo "<td>TOTAL</td>";
    echo "<td>" . number_format($weekly_unearned_income) . "</td>";
    //                echo "<td>" .number_format($sum_int)."</td>";

    echo "<td>------</td>";
    echo "<td>------</td>";
    echo "<td>------</td>";
    echo "</tr>";




    while ($row = mysqli_fetch_array($result)) {
      echo "<tr align = 'center'>";
      echo "<td>" . $inc . "</td>";
      echo "<td>" . $row['name'] . "</td>";
      echo "<td>" . date("jS M Y", strtotime($row['date_format'])) . "</td>";
      echo "<td>" . number_format($row['disburseloan'] - $row['interest']) . "</td>";
      $urearned = $row['interest'] - ($row['repay_sum'] / ($row['disburseloan'] / $row['interest']));
      echo "<td>" . number_format($urearned) . "</td>";
      //          echo "<td>" .number_format($row['interest'])."</td>"; 

      echo "<td>" . $row['codename'] . "</td>";
      echo "<td>" . $row['district'] . "</td>";
      echo "<td ><a style='color: brown;' href='weekly_loan_statement.php?codename=" . $row['codename'] . "&name=" . $row['name'] . "&type=" . $row['type'] . "'>View details</a></td>";
      echo "</tr>";
      $inc++;
    }











    echo ' </tbody>';
    echo ' </table>';

    echo '</div>';
    echo '</div>';
    ?>
    </body>

    </html>