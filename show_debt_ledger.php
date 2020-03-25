<!-- Button to Open the Modal -->

<html>
    <body onload="load_me()">
        <script>
            function load_me() {
                document.getElementById('load_me').click();
            }

        </script>
        <i id="load_me" data-toggle="modal" data-target="#myModal">

        </i>

        <!-- The Modal -->
        <div class="modal" id="myModal">
            <div class="modal-dialog modal-dialog-centered modal-lg" >
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title"><?php echo $get_name ?> is still owing Finsolute</h4>
                        <!--<button type="button" class="close" data-dismiss="modal">&times;</button>-->
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <?php
                        include 'connection.php';

                        $weekly_check = $daily_check = $monthly_check = 0;

                        $codename_search = $get_name;

                        $inc = 1;

                        $result = mysqli_query($connect, "SELECT * FROM allloan WHERE name = '$codename_search' AND (indbalance > 0 OR indbalance < 1) AND remarks = 'loan disbursement' AND  (reverse_alert = '' OR reverse_alert IS NULL)");
                        $result1 = mysqli_query($connect, "SELECT * FROM weekly_allloan WHERE name = '$codename_search' AND (indbalance > 0 OR indbalance < 1) AND remarks = 'loan disbursement' AND  (reverse_alert = '' OR reverse_alert IS NULL)");
                        $result17 = mysqli_query($connect, "SELECT * FROM monthly_allloan WHERE name = '$codename_search' AND (indbalance > 0 OR indbalance < 1) AND remarks = 'loan disbursement' AND  (reverse_alert = '' OR reverse_alert IS NULL)");

                        echo ' <div class="card">';
                        echo '<div class="card-block table-border-style">';
                        echo '<div class="table-responsive">';
                        echo '<table class="table table-bordered table-striped  table-hover " style="font-size:14px;" align="center">';

                        echo ' <thead class="thead-dark">';

                        echo '<tr align = "center">';

                        echo '<th>Type</th>';
                        echo '<th>Repayment</th>';
                        echo '<th>Disbursed</th>';
                        echo '<th>Indbalance</th>';


                        echo '<th>View Details</th>';
                        echo '</tr>';
                        echo '</thead>';

                        echo '<tbody class="" style="font-family: sans-serif; color:black ; font-weight:bold;">';
                        while ($row = mysqli_fetch_array($result)) {



                            echo "<tr align = 'center'>";

                            echo "<td>" . $row['type'] . "</td>";
                            echo "<td style='color: green;'>" . number_format($row['repay_sum']) . "</td>";
                            echo "<td style='color: red;'>" . number_format($row['disburseloan']) . "</td>";
                            echo "<td style='color: blue;'>" . number_format($row['indbalance']) . "</td>";


                            echo "<td ><a style='color: brown;' href='loan_statement.php?codename=" . $row['codename'] . "&name=" . $row['name'] . "&type=" . $row['type'] . "'>View details</a></td>";

                            echo "</tr>";
                            $daily_check += $row['indbalance'];
                            $inc++;
                        }


                        while ($row = mysqli_fetch_array($result1)) {


                            echo "<tr align = 'center'>";

                            echo "<td>" . $row['type'] . "</td>";
                            echo "<td style='color: green;'>" . number_format($row['repay_sum']) . "</td>";
                            echo "<td style='color: red;'>" . number_format($row['disburseloan']) . "</td>";
                            echo "<td style='color: blue;'>" . number_format($row['indbalance']) . "</td>";


                            echo "<td ><a style='color:brown;' href='weekly_loan_statement.php?codename=" . $row['codename'] . "&name=" . $row['name'] . "&type=" . $row['type'] . "'>View details</a></td>";

                            echo "</tr>";
                            $weekly_check += $row['indbalance'];
                            $inc++;
                        }




                        while ($row = mysqli_fetch_array($result17)) {

                            echo "<tr align = 'center'>";


                            echo "<td>" . $row['type'] . "</td>";
                            echo "<td style='color: green;'>" . number_format($row['repay_sum']) . "</td>";
                            echo "<td style='color: red;'>" . number_format($row['disburseloan']) . "</td>";
                            echo "<td style='color: blue;'>" . number_format($row['indbalance']) . "</td>";


                            echo "<td ><a style='color: brown;' href='monthly_loan_statement.php?codename=" . $row['codename'] . "&name=" . $row['name'] . "&type=" . $row['type'] . "'>View details</a></td>";

                            echo "</tr>";
                            $monthly_check += $row['indbalance'];
                            $inc++;
                        }






                        $total_ckeck = $daily_check + $weekly_check + $monthly_check;

                        echo "<tr align = 'center'>";


                        echo "<td>------</td>";
                        echo "<td>------</td>";
                        echo "<td style='font-size:20px;'>Total Debt:</td>";
                        echo "<td style='font-size:20px;'>" . number_format($total_ckeck) . "</td>";
//         echo '<td style="font-size:20px;">Total Debt:<td>';
//         echo '<td style="font-size:20px;">'.number_format($total_ckeck).'<td>';         


                        echo "<td>------</td>";
                        echo "</tr>";

                        echo ' </tbody>';
                        echo ' </table>';


                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        ?>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <!--<button type="button" class="btn btn-success" data-dismiss="modal">Continue Booking</button>-->
                        <a href="##" class="btn btn-danger" data-dismiss="modal">Cancel</a>
                    </div> 
                </div>

            </div>
        </div>
    </div>

</body>
</html>
