<?php


if (isset($_POST['filter_perf']) && isset($_SESSION['get_branch'])) {
    $get_me = 1;
    $year_alone = "";

    $performannce = $_POST['year_alone'];
    $branch = $_SESSION['get_branch'];

    //             $performannce = filter_input(INPUT_GET, 'year') ;  

    //loop through all table rows

    $inc = 1;
    $statistics = $statistics1 = 1;

    $statistics_part = $statistics_all = 0;

    if ($performannce == "non") {
        //        COUNTING THE STATTISTICS     

        $result11 = mysqli_query($connect, "SELECT * FROM weekly_allloan WHERE branch = '$branch' AND indbalance > 1 AND remarks = 'loan disbursement' ");

        while ($row = mysqli_fetch_array($result11)) {
            $statistics_all = $statistics;
            $get_indbalance = $row['indbalance'];
            $get_enddate1 = $row['startdate'];
            $weeks = $row['weeks'];
            $get_weeks = $weeks * 7;

            ////CALCULATE CLOSING DATE
            $get_enddate = date('Y-m-d', strtotime($get_enddate1 . ' + ' . $get_weeks . ' days'));

            $repay_sum = $row['repay_sum'];
            $disburseloan = $row['disburseloan'];
            $disburseloan_interest = $row['interest'];
            $principal = $disburseloan + $disburseloan_interest;
            $pay_rate = ($repay_sum / $disburseloan) * 100;

            ///////////////////////////////////////
            //GET NUMBER OF MONTHS & DAYS LEFT
            $dated = strtotime("$get_enddate");
            $remaining = time() - $dated;
            ///////COUNT ONLY DAYS
            $days_remaining = floor($remaining / 86400);
            //     echo $days_remaining."<br>";
            if ($days_remaining > 0 && $get_indbalance > 1) {

                $statistics_part = $statistics1;
                $statistics1++;
            }



            $statistics++;
            //                

        }



        $percent = ($statistics_part / $statistics_all) * 100;


        //               echo "$statistics_part";   
//             echo "<br>";
//             echo "$statistics_all";  









        //     ['.round($percent, 0).'% OF DEBTORS]        
// '.$statistics_part.'   

        $result = mysqli_query($connect, "SELECT * FROM weekly_allloan WHERE branch = '$branch' AND indbalance > 1 AND remarks = 'loan disbursement' ORDER BY id DESC");

        echo ' <div class="card card-block table-border-style">';
        echo '<div class="table-responsive">
<CAPTION><h3 style="font-size:26px; color:black; font-weight:bold;" align="center">'.$branch.'  [' . round($percent, 0) . '% NON-PERFORMING LOAN] WEEKLY CUSTOMERS</h3></CAPTION>

<table class="table table-bordered table-striped table_id" align="center">

<thead class="thead-dark">
<tr align="center">
<th>S/N</th>         
<th >Customer Name</th>
<th>Codename</th>
<th>District</th>

<th>Account Officer</th>
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
        $summation_repay11 = $summation_loan11 = 0;
        $total_repay11 = mysqli_query($connect, "SELECT * FROM weekly_allloan WHERE branch = '$branch' AND indbalance > 1 AND remarks = 'loan disbursement'");
        while ($row = mysqli_fetch_array($total_repay11)) {
            $get_indbalance = $row['indbalance'];
            $get_enddate1 = $row['startdate'];
            $weeks = $row['weeks'];
            $get_weeks = $weeks * 7;
            ////CALCULATE CLOSING DATE
            $get_enddate = date('Y-m-d', strtotime($get_enddate1 . ' + ' . $get_weeks . ' days'));

            $repay_sum = $row['repay_sum'];
            $disburseloan = $row['disburseloan'];
            $disburseloan_interest = $row['interest'];
            $principal = $disburseloan + $disburseloan_interest;
            $pay_rate = ($repay_sum / $disburseloan) * 100;

            ///////////////////////////////////////
            //GET NUMBER OF MONTHS & DAYS LEFT
            $dated = strtotime("$get_enddate");
            $remaining = time() - $dated;
            ///////COUNT ONLY DAYS
            $days_remaining = floor($remaining / 86400);

            if ($days_remaining > 0 && $get_indbalance > 1) {
                $summation_repay11 += $row['repay_sum'];
            }
        }

        //     ------------------------------------------------------------------------             


        ////////////THIS IS TO SUM DAILY
        $total_daily = mysqli_query($connect, "SELECT * FROM weekly_allloan WHERE branch = '$branch' AND indbalance > 1 AND remarks = 'loan disbursement'");
        while ($row = mysqli_fetch_array($total_daily)) {
            $get_indbalance = $row['indbalance'];
            $get_enddate1 = $row['startdate'];
            $weeks = $row['weeks'];
            $get_weeks = $weeks * 7;
            ////CALCULATE CLOSING DATE
            $get_enddate = date('Y-m-d', strtotime($get_enddate1 . ' + ' . $get_weeks . ' days'));

            $repay_sum = $row['repay_sum'];
            $disburseloan = $row['disburseloan'];
            $disburseloan_interest = $row['interest'];
            $principal = $disburseloan + $disburseloan_interest;
            $pay_rate = ($repay_sum / $disburseloan) * 100;

            ///////////////////////////////////////
            //GET NUMBER OF MONTHS & DAYS LEFT
            $dated = strtotime("$get_enddate");
            $remaining = time() - $dated;
            ///////COUNT ONLY DAYS
            $days_remaining = floor($remaining / 86400);

            if ($days_remaining > 0 && $get_indbalance > 1) {
                $summation_loan11 += $row['disburseloan'];
            }
        }
        $summation_loan = $summation_loan11 - $summation_repay11;
        //     ----------------------------------------------------------------------------------   



        echo "<tr id='hide_total' align = 'center'>";
        echo "<td></td>";
        echo "<td>--------</td>";
        echo "<td>--------</td>";
        echo "<td>--------</td>";
        echo "<td>--------</td>";
        echo "<td align = 'right' style='font-size: 20px;'>TOTAL: </td>";
        echo "<td style='color: green; font-size: 20px;'>" . number_format($summation_repay11) . "</td>";
        echo "<td style='color: red; font-size: 20px;'>" . number_format($summation_loan11) . "</td>";
        echo "<td style='color: blue; font-size: 20px;'>" . number_format($summation_loan) . "</td>";
        echo "<td>--------</td>";

        echo "</tr>";

        //    ###########################################################################################    

        while ($row = mysqli_fetch_array($result)) {
            $get_indbalance = $row['indbalance'];
            $get_enddate1 = $row['startdate'];
            $weeks = $row['weeks'];
            $get_weeks = $weeks * 7;
            ////CALCULATE CLOSING DATE
            $get_enddate = date('Y-m-d', strtotime($get_enddate1 . ' + ' . $get_weeks . ' days'));

            $repay_sum = $row['repay_sum'];
            $disburseloan = $row['disburseloan'];
            $disburseloan_interest = $row['interest'];
            $principal = $disburseloan + $disburseloan_interest;
            $pay_rate = ($repay_sum / $disburseloan) * 100;

            ///////////////////////////////////////
            //GET NUMBER OF MONTHS & DAYS LEFT
            $dated = strtotime("$get_enddate");
            $remaining = time() - $dated;
            ///////COUNT ONLY DAYS
            $days_remaining = floor($remaining / 86400);

            if ($days_remaining > 0 && $get_indbalance > 1) {
                echo "<tr>";
                echo "<td >" . $inc . "</td>";
                echo "<td >" . $row['name'] . "</td>";
                echo "<td >" . $row['codename'] . "</td>";
                echo "<td >" . $row['district'] . "</td>";

                echo "<td >" . $row['acc_officer'] . "</td>";
                echo "<td>" . $row['date'] . "</td>";
                echo "<td style='color: green;' >" . number_format($row['repay_sum']) . "</td>";
                echo "<td style='color: red;' >" . number_format($row['disburseloan']) . "</td>";
                echo "<td style='color: blue;' >" . number_format($row['indbalance']) . "</td>";
                echo "<td ><a style='color: brown;' href='weekly_loan_statement.php?codename=" . $row['codename'] . "&name=" . $row['name'] . "&type=" . $row['type'] . "'>View details</a></td>";
                //              echo "<td ><a style='color:#cc9900;' onclick=\"javascript: return confirm('DO YOU WISH TO CONTINUE WITH DELETE?');\" href='debtors.php?iddd=" . $row['id']."&name=".$row['name']."&id=check_delete'>Delete</a></td>";

                echo "</tr>";

                $inc++;
            }
        }

        echo ' </tbody>';
        echo ' </table>';

        echo '</div>';
        echo '</div>';



    }





































    if ($performannce == "perform") {

        //        COUNTING THE STATTISTICS     

        $result11 = mysqli_query($connect, "SELECT * FROM weekly_allloan WHERE branch = '$branch' AND indbalance > 1 AND remarks = 'loan disbursement'");

        while ($row = mysqli_fetch_array($result11)) {
            $statistics_all = $statistics;
            $get_indbalance = $row['indbalance'];
            $get_enddate1 = $row['startdate'];
            $weeks = $row['weeks'];
            $get_weeks = $weeks * 7;
            ////CALCULATE CLOSING DATE
            $get_enddate = date('Y-m-d', strtotime($get_enddate1 . ' + ' . $get_weeks . ' days'));

            $repay_sum = $row['repay_sum'];
            $disburseloan = $row['disburseloan'];
            $disburseloan_interest = $row['interest'];
            $principal = $disburseloan + $disburseloan_interest;
            $pay_rate = ($repay_sum / $disburseloan) * 100;

            ///////////////////////////////////////
            //GET NUMBER OF MONTHS & DAYS LEFT
            $dated = strtotime("$get_enddate");
            $remaining = time() - $dated;
            ///////COUNT ONLY DAYS
            $days_remaining = floor($remaining / 86400);

            if ($days_remaining < 0 && $get_indbalance > 1) {

                $statistics_part = $statistics1;
                $statistics1++;
            }



            $statistics++;
            //                

        }



        $percent = ($statistics_part / $statistics_all) * 100;

        //             echo "$statistics_part";   
//             echo "<br>";
//             echo "$statistics_all";  
        $percent1 = 100 - $percent;
























        //       ['.round($percent, 2).'% OF DEBTORS]   
//     '.$statistics_part.'     

        $result = mysqli_query($connect, "SELECT * FROM weekly_allloan WHERE branch = '$branch' AND indbalance > 1 AND remarks = 'loan disbursement'");

        echo ' <div class="card card-block table-border-style">';
        echo '<div class="table-responsive">
<CAPTION><h3 style="font-size:26px; color:black; font-weight:bold;" align="center">'.$branch.' [' . round($percent, 0) . '% PERFORMING LOAN]    WEEKLY CUSTOMERS</h3></CAPTION>

<table class="table table-bordered table-striped table_id" align="center">

<thead class="thead-dark">
<tr align="center">
<th>S/N</th>         
<th >Customer Name</th>
<th>Codename</th>
<th>District</th>

<th>Account Officer</th>
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
        $summation_repay11 = $summation_loan11 = 0;
        $total_repay11 = mysqli_query($connect, "SELECT * FROM weekly_allloan WHERE branch = '$branch' AND indbalance > 1 AND remarks = 'loan disbursement'");
        while ($row = mysqli_fetch_array($total_repay11)) {
            $get_indbalance = $row['indbalance'];
            $get_enddate1 = $row['startdate'];
            $weeks = $row['weeks'];
            $get_weeks = $weeks * 7;
            ////CALCULATE CLOSING DATE
            $get_enddate = date('Y-m-d', strtotime($get_enddate1 . ' + ' . $get_weeks . ' days'));
            $repay_sum = $row['repay_sum'];
            $disburseloan = $row['disburseloan'];
            $disburseloan_interest = $row['interest'];
            $principal = $disburseloan + $disburseloan_interest;
            $pay_rate = ($repay_sum / $disburseloan) * 100;

            ///////////////////////////////////////
            //GET NUMBER OF MONTHS & DAYS LEFT
            $dated = strtotime("$get_enddate");
            $remaining = time() - $dated;
            ///////COUNT ONLY DAYS
            $days_remaining = floor($remaining / 86400);

            if ($days_remaining < 0 && $get_indbalance > 1) {
                $summation_repay11 += $row['repay_sum'];
            }
        }

        //     ------------------------------------------------------------------------             


        ////////////THIS IS TO SUM DAILY
        $total_daily = mysqli_query($connect, "SELECT * FROM weekly_allloan WHERE branch = '$branch' AND indbalance > 1 AND remarks = 'loan disbursement'");
        while ($row = mysqli_fetch_array($total_daily)) {
            $get_indbalance = $row['indbalance'];
            $get_enddate1 = $row['startdate'];
            $weeks = $row['weeks'];
            $get_weeks = $weeks * 7;
            ////CALCULATE CLOSING DATE
            $get_enddate = date('Y-m-d', strtotime($get_enddate1 . ' + ' . $get_weeks . ' days'));

            $repay_sum = $row['repay_sum'];
            $disburseloan = $row['disburseloan'];
            $disburseloan_interest = $row['interest'];
            $principal = $disburseloan + $disburseloan_interest;
            $pay_rate = ($repay_sum / $disburseloan) * 100;

            ///////////////////////////////////////
            //GET NUMBER OF MONTHS & DAYS LEFT
            $dated = strtotime("$get_enddate");
            $remaining = time() - $dated;
            ///////COUNT ONLY DAYS
            $days_remaining = floor($remaining / 86400);

            if ($days_remaining < 0 && $get_indbalance > 1) {

                $summation_loan11 += $row['disburseloan'];
            }
        }
        $summation_loan = $summation_loan11 - $summation_repay11;
        //     ----------------------------------------------------------------------------------   



        echo "<tr id='hide_total' align = 'center'>";
        echo "<td></td>";
        echo "<td>--------</td>";
        echo "<td>--------</td>";
        echo "<td>--------</td>";
        echo "<td>--------</td>";
        echo "<td align = 'right' style='font-size: 20px;'>TOTAL: </td>";
        echo "<td style='color: green; font-size: 20px;'>" . number_format($summation_repay11) . "</td>";
        echo "<td style='color: red; font-size: 20px;'>" . number_format($summation_loan11) . "</td>";
        echo "<td style='color: blue; font-size: 20px;'>" . number_format($summation_loan) . "</td>";
        echo "<td>--------</td>";

        echo "</tr>";

        //    ###########################################################################################    

        while ($row = mysqli_fetch_array($result)) {
            $get_indbalance = $row['indbalance'];
            $get_enddate1 = $row['startdate'];
            $weeks = $row['weeks'];
            $get_weeks = $weeks * 7;
            ////CALCULATE CLOSING DATE
            $get_enddate = date('Y-m-d', strtotime($get_enddate1 . ' + ' . $get_weeks . ' days'));

            $repay_sum = $row['repay_sum'];
            $disburseloan = $row['disburseloan'];
            $disburseloan_interest = $row['interest'];
            $principal = $disburseloan + $disburseloan_interest;
            $pay_rate = ($repay_sum / $disburseloan) * 100;

            ///////////////////////////////////////
            //GET NUMBER OF MONTHS & DAYS LEFT
            $dated = strtotime("$get_enddate");
            $remaining = time() - $dated;
            ///////COUNT ONLY DAYS
            $days_remaining = floor($remaining / 86400);

            if ($days_remaining < 0 && $get_indbalance > 1) {

                echo "<tr>";
                echo "<td >" . $inc . "</td>";
                echo "<td >" . $row['name'] . "</td>";
                echo "<td >" . $row['codename'] . "</td>";
                echo "<td >" . $row['district'] . "</td>";

                echo "<td >" . $row['acc_officer'] . "</td>";
                echo "<td>" . $row['date'] . "</td>";
                echo "<td style='color: green;' >" . number_format($row['repay_sum']) . "</td>";
                echo "<td style='color: red;' >" . number_format($row['disburseloan']) . "</td>";
                echo "<td style='color: blue;' >" . number_format($row['indbalance']) . "</td>";
                echo "<td ><a style='color: brown;' href='weekly_loan_statement.php?codename=" . $row['codename'] . "&name=" . $row['name'] . "&type=" . $row['type'] . "'>View details</a></td>";
                //              echo "<td ><a style='color:#cc9900;' onclick=\"javascript: return confirm('DO YOU WISH TO CONTINUE WITH DELETE?');\" href='debtors.php?iddd=" . $row['id']."&name=".$row['name']."&id=check_delete'>Delete</a></td>";

                echo "</tr>";

                $inc++;
            }
        }

        echo ' </tbody>';
        echo ' </table>';

        echo '</div>';
        echo '</div>';



    }



}