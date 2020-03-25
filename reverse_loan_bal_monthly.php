<?php
session_start();
include 'connection_ajax.php';

$codename = $_GET['codename'];
$name = $_GET['name'];
$district = $_GET['district'];
$av_bal = $_GET['av_bal'];

/////////SEARCH FOR MONTHLY  
$sql_state18 = "SELECT * FROM monthly_allloan WHERE  disburseloan > 1 AND remarks = 'loan disbursement' AND codename = '$codename'";
$result18 = mysqli_query($connect, $sql_state18);
while ($row = mysqli_fetch_assoc($result18)) {
    $names = $row["name"];
    $closingdate = $row["enddate"];
    $loan_type = $row["type"];
    $disburseloan = $row["indbalance"];
    $check_codename = $row["codename"];
    $interest_month = $row["interest"];

}

$_SESSION['interest_month'] = $interest_month;

$sql_state = "SELECT * FROM members WHERE namee = '$name'";
$result = mysqli_query($connect, $sql_state);

while ($row = mysqli_fetch_assoc($result)) {
    $id = $row["id"];
    //                echo $id;
    $name = $row["namee"];
    $regnum = $row["registration_num"];
    $address = $row["addresss"];
    $get_dob = $row["dob"];
    $class = $row["classs"];
    $parent = $row["parentt"];
    $telephone = $row["telephone"];
    $mail = $row["mail"];
    $religion = $row["religion"];
    $login_id = $row["login_id"];
    $images = $row["imagess"];
    $date = $row["level"];
    $get_branch = $row['branch'];
}
$dob = $get_dob;


// $_SESSION['weeks'] = $weeks;
// $_SESSION['interest'] = $interest;



$parent1 = $av_bal;
$penalty1 = "disburse";
$telephone = $codename;//codename
$branch = $get_branch;
$loan_type = "monthly Payment";
//                                $int_rev = str_replace(",", "", $_POST['int_rev']); 
$equity = "0";
$why_reverse = "Reversing Loan Balance";
$pro_fee = "0";
$backdate = date("jS F Y");
$date = date("jS F Y");

$month = date("F");
$year = date("Y");
$regnum = $district; //district $regnum = $row["registration_num"];
$dob = $get_dob; // group







if ($loan_type == "monthly Payment") {
    $get_divsor = mysqli_query($connect, "SELECT * FROM monthly_allloan WHERE codename = '$telephone' AND remarks = 'loan disbursement'");
    while ($row = mysqli_fetch_assoc($get_divsor)) {

        $available_blance = $row['indbalance'];
    }


    if ($parent1 > $available_blance) {
        echo "<script type='text/javascript'> $(document).ready(function(){ 
 swal({
          title: 'Reversal Recheck!!',
          text: 'Reversal too large: " . $parent1 . " Naira for codename: $telephone',
          icon: 'warning',
         buttons: {
             confirm : {text:'Ok',className:'sweet-orange'},
           
         },
         closeOnClickOutside: false
        })
   
 }); </script>";
    } else {
        //THIS ACCURATELY DEDUCTS THE INTEREST FROM THE AMOUNT INSERTED WITH 11( use x to to do the maths)      
//THIS IMPLIES THE SAME WAY IN IS THE SAME WAY OUT (AS APPLIED IN DAILY PAYMENT)                    
        $interest_to_revenue = $parent1 / 11;
        $parent = $parent1 - $interest_to_revenue;

        //   --------------------------NOT USED HERE-------------------------------------------------------------  
        ////SUM INTEREST payment           
        $interest_pay = mysqli_query($connect, "SELECT SUM(interest_pay) as total, SUM(interest) as totalx FROM allloan WHERE codename = '$telephone'");
        while ($row1 = mysqli_fetch_array($interest_pay)) {
            $sum_interest_pay = $row1['total'];
            $interest = $row1['totalx'];
        }
        $interest_reduce = $interest - $sum_interest_pay;
        //              lets return back interest here here   
        $return_int_bal = $interest_to_revenue + $interest_reduce;
        $minus_interest = "-$interest_to_revenue";
        //   ----------------------------NOT USED HERE-----------------------------------------------------------                    

        $sql_statement28 = "INSERT INTO revenuexp (remaks, revenue, date, month, year, branch) Values('$name processing fee reversal entry', '-$pro_fee', '$date', '$month', '$year', '$branch')";
        $result28 = mysqli_query($connect, $sql_statement28);



        //INSERT RECORD 1
        $time_stamp = date("h:ia");
        $time_stamp1 = date("h:ia", strtotime($time_stamp));

        if ($penalty1 == "penal") {
            $pen_remarks = "penalty reverse";
            $interest_month = 0;
        } else {
            $pen_remarks = "";
        }
        $interest_month = $_SESSION['interest_month'];
        $true_parent1 = $parent1 + 0;
        $sql_statement = "INSERT INTO monthly_allloan(name, remarks, reversepen, disburseloan, codename, date, month, year, district, collector, timestamp, branch) VALUES ('$name', '$why_reverse', '$pen_remarks', '-$parent1', '$telephone', '$date', '$month', '$year', '$regnum', 'admin', '$time_stamp1', '$branch')";

        $result = mysqli_query($connect, $sql_statement);
        $error = mysqli_error($connect);
        // echo "<script>alert('Any error:$error')</script>";


        //      PUT IN THE "R" TO REMOVE FROM GENERAL LEDGER
        if ($penalty1 != "penal") {
            $sql_reverse_alert = "UPDATE monthly_allloan SET reverse_alert = '' WHERE codename = '$telephone' AND disburseloan > '1000'";
            $result_reverse_alert = mysqli_query($connect, $sql_reverse_alert);
            $reverse_insurance = "UPDATE monthly_allloan SET insurance_in = 0  WHERE codename = '$telephone' AND disburseloan > '1000'";
            $result_rreverse_insurance = mysqli_query($connect, $reverse_insurance);

        }



        ////GET THE REMAINING BALANCE OF LOAN FOR AN INDIVIDUAL
        $summation_loan2 = "";


        ///////THIS IS TO GET THE INDIVIDUAL BALANCE
        ////////////THIS IS TO SUM LOAN
        $code_loan = mysqli_query($connect, "SELECT SUM(disburseloan) as total FROM monthly_allloan WHERE codename = '$telephone' ");
        while ($row = mysqli_fetch_assoc($code_loan)) {
            $summation_loan2 = $row['total'];

        }

        ////////////THIS IS TO SUM PAYMENTS
        $total_payments2 = mysqli_query($connect, "SELECT SUM(repay) as total FROM monthly_allloan WHERE codename='$telephone'");
        while ($row1 = mysqli_fetch_array($total_payments2)) {
            $summation_pay22 = $row1['total'];
        }


        $balance = $summation_loan2 - $summation_pay22;
        $sql_sum_repay11 = mysqli_query($connect, "UPDATE monthly_allloan SET  indbalance = '$balance' WHERE disburseloan > 1 AND codename='$telephone' AND remarks = 'loan disbursement'");

        ////////GET ALL REVERSAL PAYMENT TO MINUS FROM
        $total_payments33 = mysqli_query($connect, "SELECT SUM(disburseloan) as total FROM monthly_allloan WHERE codename='$telephone' AND remarks = 'Reversal Entry'");
        while ($row1 = mysqli_fetch_array($total_payments33)) {
            $summation_reverse2 = $row1['total'];
        }

        $summation_pay_real = $summation_pay22 - $summation_reverse2;

        //GET LAST ID  
        $get_last_id = mysqli_query($connect, "SELECT * FROM monthly_allloan");
        while ($row = mysqli_fetch_assoc($get_last_id)) {
            $id = $row['id'];
        }





        /////////SUM GENERAL REPAY & DISBURSE LOAN SO YOU CAN GET GEN BALALNCE
////////////THIS IS TO SUM PAYMENTS
        $total_payments = mysqli_query($connect, "SELECT SUM(repay) as total FROM monthly_allloan");
        while ($row1 = mysqli_fetch_array($total_payments)) {
            $summation_pay = $row1['total'];
        }


        ////////////THIS IS TO SUM DISBURSE
        $total_disburse2 = mysqli_query($connect, "SELECT SUM(disburseloan) as total FROM monthly_allloan");
        while ($row2 = mysqli_fetch_array($total_disburse2)) {
            $summation_disburse = $row2['total'];
        }
        $gen_balance = $summation_disburse - $summation_pay;



















        //       *********************************||||||||||||||||****************************************************            
        $summation5 = $summation6 = "";
        ///////////THIS IS TO SUM TOTAL monthly_disburseloan///////////////////
        $total_monthly_disburseloan = mysqli_query($connect, "SELECT SUM(disburseloan) as total FROM monthly_allloan WHERE name='$name'");
        while ($row = mysqli_fetch_array($total_monthly_disburseloan)) {
            $summation5 = $row['total'];
        }

        ////////////THIS IS TO TOTAL monthly_payment
        $total_monthly_payment = mysqli_query($connect, "SELECT SUM(repay) as total FROM monthly_allloan WHERE name='$name'");
        while ($row1 = mysqli_fetch_array($total_monthly_payment)) {
            $summation6 = $row1['total'];
        }
        //////////////////////////////////////////
        @$monthly_status = $summation5 - $summation6;
        //*********************************||||||||||||||||****************************************************            
        $summation1 = $summation2 = $summation3 = $summation4 = "";
        ///////////THIS IS TO SUM TOTAL daily_disburseloan///////////////////
        $total_daily_disburseloan = mysqli_query($connect, "SELECT SUM(disburseloan) as total FROM allloan WHERE name='$name'");
        while ($row = mysqli_fetch_array($total_daily_disburseloan)) {
            $summation1 = $row['total'];
        }

        ////////////THIS IS TO TOTAL daily_payment
        $total_daily_payment = mysqli_query($connect, "SELECT SUM(repay) as total FROM allloan WHERE name='$name'");
        while ($row1 = mysqli_fetch_array($total_daily_payment)) {
            $summation2 = $row1['total'];
        }
        //////////////////////////////////////////
        @$daily_status = $summation1 - $summation2;

        /////======================================================================


        ///////THIS IS TO SUM TOTAL weekly_disburseloan///////////////////
        $total_weekly_disburseloan = mysqli_query($connect, "SELECT SUM(disburseloan) as total FROM weekly_allloan WHERE name='$name'");
        while ($row = mysqli_fetch_array($total_weekly_disburseloan)) {
            $summation3 = $row['total'];
        }

        ////////////THIS IS TO TOTAL weekly_payment
        $total_weekly_payment = mysqli_query($connect, "SELECT SUM(repay) as total FROM weekly_allloan WHERE name='$name'");
        while ($row1 = mysqli_fetch_array($total_weekly_payment)) {
            $summation4 = $row1['total'];
        }
        //////////////////////////////////////////
        @$weekly_status = $summation3 - $summation4;

        @$total_status = $daily_status + $weekly_status + $monthly_status;
        //UPDATE RECORD
        $sql_statement101 = "UPDATE members SET balance = '$total_status', monthlyindbal = '$balance' WHERE namee='$name'";
        $result29 = mysqli_query($connect, $sql_statement101);
        //       **************************||||||||||||||||***********************************************            
















        $result2 = mysqli_query($connect, "UPDATE monthly_allloan SET genbalance = '$gen_balance', indbalance = '$balance' WHERE id = '$id'");



        if ($result == true) {

            $_SESSION['redirect_message_monthly'] = "<script type='text/javascript'> $(document).ready(function(){ 
 swal({
          title: 'Success!',
          text: '$name Reversal Entry of  " . $parent1 . " Naira for Monthly payment is successful. Please try to avoid errors',
          icon: 'success',
         buttons: {
             confirm : {text:'Ok',className:'sweet-orange'},
           
         },
         closeOnClickOutside: false
        })
   
 }); </script>";

            '';
            $id = "";
            if ($penalty1 == "penal") {
                echo "<script> location.href = 'monthly_loan_statement.php?codename=$telephone&name=$name'; </script>";
            } else {
                   echo "yes";
            }


        } else {
            echo "<script type='text/javascript'> $(document).ready(function(){ 
 swal({
          title: 'Error!',
          text: 'Application has been tempered with!!',
          icon: 'error',
         buttons: {
             confirm : {text:'Ok',className:'sweet-orange'},
           
         },
         closeOnClickOutside: false
        })
   
 }); </script>";

        }



























    }

}
//   $sql_state1 = "UPDATE allloan SET waver = '1' WHERE codename = '$codename' AND disburseloan > 1 AND remarks = 'loan disbursement'";
//             $result1 = mysqli_query($connect, $sql_state1);
//       if($result1 == true){
//           echo 'yes';
//       }

