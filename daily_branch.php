<?php



if (isset($_POST['btnbranch'])) {
    $get_me = 1;
    $branch = $_POST['branch'];


    $check_branch = "";

    //          LETS CHECK FOR branch EXISTENCE
    $check = mysqli_query($connect, "SELECT * FROM members WHERE branch = '$branch'");
    while ($row5 = mysqli_fetch_array($check)) {
        $check_branch = $row5['branch'];
    }

    if ($check_branch == "") {
        echo "Not Available";
    } else {
        //////////////////TOTAL  MEMBERS branch Members////////////////
        $countA = mysqli_query($connect, "SELECT COUNT(name) as totalg FROM allloan WHERE branch = '$branch' AND (disburseloan > 1 OR disburseloan < -1) AND NOT remarks = 'Penalty' AND NOT reversepen = 'penalty reverse'");
        while ($row4 = mysqli_fetch_array($countA)) {
            $count_branch = $row4['totalg'];
        }




        $inc_inv = 1;
        $result22 = mysqli_query($connect, "SELECT * FROM allloan WHERE branch = '$branch' AND (disburseloan > 1 OR disburseloan < -1) AND NOT remarks = 'Penalty' AND NOT reversepen = 'penalty reverse' ORDER BY id DESC");
        while ($row = mysqli_fetch_array($result22)) {

            $ans_bal = $row['repay_sum'] - $row['disburseloan'];
            if ($ans_bal < 0 && $row['remarks'] == "loan disbursement") {

                $test_count = $inc_inv;
                $inc_inv++;

            }
        }


        //loop through all table rows
        $inc = 1;

        $result = mysqli_query($connect, "SELECT * FROM allloan WHERE indbalance > 0 AND remarks = 'loan disbursement' AND    (reverse_alert = '' OR reverse_alert IS NULL)  AND branch = '$branch'  ORDER BY id DESC");

        echo ' <div class="card card-block table-border-style">';
        echo '<div class="table-responsive">

                   <CAPTION><h3 style="font-size:26px; color:black; font-weight:bold;" align="center">branch: ' . $branch . ' DAILY CUSTOMERS</h3></CAPTION>
               
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
        $total_repay11 = mysqli_query($connect, "SELECT SUM(repay) as total FROM allloan WHERE  (remarks = 'loan repayment' OR remarks = 'Penalty Paid') AND branch = '$branch' ");
        while ($row = mysqli_fetch_array($total_repay11)) {
            $summation_repay11 = $row['total'];
        }
        $dfsd = 0;
        ////////////THIS IS TO SUM DAILY
        $total_daily = mysqli_query($connect, "SELECT SUM(disburseloan) as total FROM allloan WHERE   branch = '$branch'  ");
        while ($row = mysqli_fetch_array($total_daily)) {
            $summation_loan11 = $row['total'];


        }
        $dfsd += $summation_loan11;
        $summation_loan = $summation_loan11 - $summation_repay11;

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
            $ans_bal = $row['repay_sum'] - $row['disburseloan'];
            if ($ans_bal < 0 && $row['remarks'] == "loan disbursement") {
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
                echo "<td ><a style='color: brown;' href='loan_statement.php?codename=" . $row['codename'] . "&name=" . $row['name'] . "&type=" . $row['type'] . "'>View details</a></td>";
                //              echo "<td ><a style='color:#cc9900;' onclick=\"javascript: return confirm('DO YOU WISH TO CONTINUE WITH DELETE?');\" href='debtors.php?iddd=" . $row['id']."&name=".$row['name']."&id=check_delete'>Delete</a></td>";

                echo "</tr>";

                $inc++;
            }
        }
    }
}