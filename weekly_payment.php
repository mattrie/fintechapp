<?php
session_start();

include 'connection.php';

//         if(isset($_POST['reset'])){
//             @header("location:weekly_payment.php ");
//         }
//    ob_start();
//session_start();


////////////////////////UPDATE///////////////////////////////////////   
///////////////////////////lets upload the file first/////////////////////////////////////////////                      
if (!empty($_FILES['fileToUpload']['name'])) {

    $target_dir = "images/";// this is the directory to upload to

    //get file name and set to target directory
    $target_file = @($target_dir . basename($_FILES["fileToUpload"]["name"]));

    @($getfile_name = $_FILES['fileToUpload']['name']);
    @($getfile_size = $_FILES['fileToUpload']['size']);
    @($getfile_tmp_dir = $_FILES['fileToUpload']['tmp_name']);
    @($getfile_type = $_FILES['fileToUpload']['type']);
    @($identifyFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION)));


    //        if($identifyFileType == "jpg" || $identifyFileType == "png" || $identifyFileType == "jpeg")
    // {           

    //              if($getfile_size < 2097152) {
    //            
    //                    // Check if file already exists
    //                     if (!file_exists($target_file)) {  
    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
} else {
    if (isset($_POST['imge'])) {
        $images = $_POST['imge'];
        @$target_file = $images;
    }

}
$bad_debt = "";
if (isset($_POST['pay'])) {
    $name = strtoupper($_POST['name']);

    if ($name != "") {
// By  Adedokun Adewale Azeez 27th November 2020
        $parent1 = $_POST['parent'];//repayment
        $branch = $_POST['branch'];
        $parent2 = str_replace(",", "", $parent1);
        $proposed_weekly_pay = str_replace(",", "", $_POST['repay_plan1']);
        $savings_alone = str_replace(",", "", $_POST['savings']);
        if ($savings_alone == "") {
            $savings_alone = 0;
        }
        $telephone = $_POST['telephone'];//codename
        @$bad_debt = $_POST['bad_debt'];
        $loan_type = $_POST['loan_type'];
        $backdate = $_POST['backdate'];
        @$pay_pen = $_POST['pay_pen'];
        $group_name = $_POST['group_name'];
        $date_posted = date("jS F Y");
        if ($backdate == "") {
            $date = date("jS F Y");
            $today_date = date('Y-m-d', time());
            $date_format = date("Y-m-d");
        } else {
            $date = $output_closedate = date('jS F Y', strtotime($backdate));
            $today_date = $_POST['backdate'];
            $date_format = $_POST['backdate'];
        }
        $month = date("F");
        $year = date("Y");
        $regnum = strtoupper($_POST['regnum']);//district 

        $interest = $_SESSION['interest'];

        $no_weeks = $_SESSION['weeks'];

        //THIS ACCURATELY DEDUCTS THE INTEREST FROM THE AMOUNT INSERTED WITH each week( use x to do the maths)      
        if ($no_weeks == 4) {
            $ans = $interest / 4;
            $multiplier_effect = $proposed_weekly_pay / $ans;
            $interest_to_revenue = $parent2 / $multiplier_effect;
            $parent = $parent2 - $interest_to_revenue;
        }

        if ($no_weeks == 8) {
            $ans = $interest / 8;
            $multiplier_effect = $proposed_weekly_pay / $ans;
            $interest_to_revenue = $parent2 / $multiplier_effect;
            $parent = $parent2 - $interest_to_revenue;
        }

        if ($no_weeks == 12) {
            $ans = $interest / 12;
            $multiplier_effect = $proposed_weekly_pay / $ans;
            $interest_to_revenue = $parent2 / $multiplier_effect;
            $parent = $parent2 - $interest_to_revenue;
        }

        if ($no_weeks == 16) {
            $ans = $interest / 16;
            $multiplier_effect = $proposed_weekly_pay / $ans;
            $interest_to_revenue = $parent2 / $multiplier_effect;
            $parent = $parent2 - $interest_to_revenue;
        }

        if ($no_weeks == 20) {
            $ans = $interest / 20;
            $multiplier_effect = $proposed_weekly_pay / $ans;
            $interest_to_revenue = $parent2 / $multiplier_effect;
            $parent = $parent2 - $interest_to_revenue;
        }

        $available_blance = $_SESSION['available_blance'];
        if ($parent2 > $available_blance) {
            echo "<script type='text/javascript'> $(document).ready(function(){ 
                swal({
                         title: 'Debt Check!',
                         text: 'No outstanding loan up to: " . number_format($parent2) . " Naira for codename: $telephone',
                         icon: 'warning',
                        buttons: {
                            confirm : {text:'Ok',className:'sweet-orange'},
                          
                        },
                        closeOnClickOutside: false
                       })
                  
                }); </script>";

        } else {
            $date_format = date("Y-m-d", strtotime($date));
            if ($pay_pen == "P") {
                $result_revenue = mysqli_query($connect, "INSERT INTO revenuexp (remaks, category, type, revenue, date, date_format, month, year, collector, branch) VALUES('$name weekly Penalty', 'penalty_weekly', 'weekly', '$parent2', '$date', '$date_format', '$month','$year','admin', '$branch')");

                $parent = $parent2;
                $interest_to_revenue = $parent2;


                ///////////////////FOR PENALTY OOOOOOOOOOOOOOOOOOOOOOOOOOO    

                //INSERT RECORD 1
                date_default_timezone_set("Africa/Lagos");
                $time_stamp = date("h:ia");
                $time_stamp1 = date("h:ia", strtotime($time_stamp));

                $bookmark_row = rand(10, 1000000000000);
                $sql_statement = "INSERT INTO weekly_allloan (name, type, remarks, repay, codename, date, date_format, month, year, district, lastpaiddate, collector, savings, timestamp, dob, date_posted, bookmark_row, branch) VALUES ('$name', '$loan_type', 'Penalty Paid', '$parent2', '$telephone', '$date', '$date_format', '$month', '$year', '$regnum', '$today_date', 'admin', '$savings_alone', '$time_stamp1', '$group_name', '$date_posted', '$bookmark_row', '$branch')";
                $result = mysqli_query($connect, $sql_statement);

                //UPDATE ALL WITH GROUP NAME
                $update_all_code_forGroup = mysqli_query($connect, "UPDATE weekly_allloan SET dob = '$group_name' WHERE codename = '$telephone'");





                ////GET THE REMAINING BALANCE OF LOAN FOR AN INDIVIDUAL
                $summation_loan2 = "";
                $summation_pay2 = "";

                ///////THIS IS TO GET THE INDIVIDUAL BALANCE
                ///////////////THIS IS TO SUM LOAN
                $code_loan = mysqli_query($connect, "SELECT SUM(disburseloan) as total FROM weekly_allloan WHERE codename = '$telephone'");
                while ($row = mysqli_fetch_assoc($code_loan)) {
                    $summation_loan2 = $row['total'];
                    //                           $plus_interest = $row['interest'];  
                }


                ////////////THIS IS TO SUM PAYMENTS
                $total_payments2 = mysqli_query($connect, "SELECT SUM(repay) as total FROM weekly_allloan WHERE codename='$telephone'");
                while ($row1 = mysqli_fetch_array($total_payments2)) {
                    $summation_pay2 = $row1['total'];
                }
                $balance = $summation_loan2 - $summation_pay2;
                $sql_sum_repay = mysqli_query($connect, "UPDATE weekly_allloan SET repay_sum = '$summation_pay2', indbalance = '$balance', lastpaiddate = '$today_date' WHERE disburseloan > 1 AND codename='$telephone' AND remarks = 'loan disbursement'");











                //  *******************************************************************************************************                


                ///////THIS IS TO GET THE INDIVIDUAL SAVINGS BALANCE
                ///////////////THIS IS TO SUM ALL SAVINGS
                $sum_savings = mysqli_query($connect, "SELECT SUM(savings) as total FROM weekly_allloan WHERE name = '$name' AND codename = '$telephone'");
                while ($row = mysqli_fetch_assoc($sum_savings)) {
                    $summation_savings = $row['total'];
                    //               $plus_interest = $row['interest'];  
                }


                ////////////THIS IS TO SUM ALLWITHDRAWALS
                $sum_withdraw = mysqli_query($connect, "SELECT SUM(withdrawsavings) as total FROM weekly_allloan WHERE name = '$name' AND codename = '$telephone'");
                while ($row1 = mysqli_fetch_assoc($sum_withdraw)) {
                    $summation_withdraw = $row1['total'];
                }

                $savings_balance = $summation_savings - $summation_withdraw;


                //  *******************************************************************************************************                







                ////////GET ALL REVERSAL PAYMENT TO MINUS FROM
                $total_payments33 = mysqli_query($connect, "SELECT SUM(disburseloan) as total FROM weekly_allloan WHERE codename='$telephone' AND remarks = 'Reversal Entry'");
                while ($row1 = mysqli_fetch_array($total_payments33)) {
                    $summation_reverse2 = $row1['total'];

                }



                $summation_pay_real = $summation_pay2 - $summation_reverse2;



                //GET LAST ID  
                $get_last_id = mysqli_query($connect, "SELECT * FROM weekly_allloan WHERE bookmark_row = '$bookmark_row'");
                while ($row = mysqli_fetch_assoc($get_last_id)) {
                    $id = $row['id'];
                }


                /////////SUM GENERAL REPAY & DISBURSE LOAN SO YOU CAN GET GEN BALALNCE
                ////////////THIS IS TO SUM PAYMENTS
                $total_payments = mysqli_query($connect, "SELECT SUM(repay) as total FROM weekly_allloan");
                while ($row1 = mysqli_fetch_array($total_payments)) {
                    $summation_pay = $row1['total'];
                }


                ////////////THIS IS TO SUM DISBURSE
                $total_disburse2 = mysqli_query($connect, "SELECT SUM(disburseloan) as total FROM weekly_allloan WHERE remarks = 'loan disbursement'");
                while ($row2 = mysqli_fetch_array($total_disburse2)) {
                    $summation_disburse = $row2['total'];
                }
                $gen_balance = $summation_disburse - $summation_pay;





                //         """"""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""          
                /////////SUM GENERAL SAVINGS & WITHDRAWALS  SO YOU CAN GET GEN BALALNCE
                ////////////THIS IS TO SUM savings
                $total_save = mysqli_query($connect, "SELECT SUM(savings) as total FROM weekly_allloan");
                while ($row1 = mysqli_fetch_array($total_save)) {
                    $summation_save = $row1['total'];
                }


                ////////////THIS IS TO SUM withdrawsavings
                $total_withdrawsavings = mysqli_query($connect, "SELECT SUM(withdrawsavings) as total FROM weekly_allloan");
                while ($row2 = mysqli_fetch_array($total_withdrawsavings)) {
                    $summation_withdrawsavings = $row2['total'];
                }
                $gen_balance_save = $summation_save - $summation_withdrawsavings;

                //         """"""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""          



                //#############"""""""""""""""""""""""""""""""""""""""""""""""""""""######################################"""""""""""""""""""""""""""""""""""""""""""          
                /////////SUM GENERAL equity & WITHDRAWALS  SO YOU CAN GET GEN BALALNCE
                ////////////THIS IS TO SUM savings
                $total_equity = mysqli_query($connect, "SELECT SUM(equity) as total FROM weekly_allloan");
                while ($row1 = mysqli_fetch_array($total_equity)) {
                    $summation_equity = $row1['total'];
                }


                ////////////THIS IS TO SUM withdrawsavings
                $total_withdrawequity = mysqli_query($connect, "SELECT SUM(withdrawequity) as total FROM weekly_allloan");
                while ($row2 = mysqli_fetch_array($total_withdrawequity)) {
                    $summation_withdrawequity = $row2['total'];
                }
                $gen_balance_equity = $summation_equity - $summation_withdrawequity;

                //         """"""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""          




















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



                //       *********************************||||||||||||||||****************************************************            
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
                $sql_statement101 = "UPDATE members SET balance = '$total_status' WHERE namee='$name'";
                $result29 = mysqli_query($connect, $sql_statement101);
                //       **************************||||||||||||||||***********************************************            








                $result2 = mysqli_query($connect, "UPDATE weekly_allloan SET genbalance = '$gen_balance', repaycumm = '$summation_pay_real', indbalance = '$balance', genbalsavings = '$gen_balance_save', indbalsavings = '$savings_balance', genbalequity = '$gen_balance_equity' WHERE id = '$id'");


                //         UPDATE DEBT FOR WEEKLY IN MEMBER DB
                $day = date('l', strtotime($today_date));
                $result40 = mysqli_query($connect, "UPDATE members SET  balweek = '$balance' WHERE namee = '$name'");

                //           UPDATE weeklyindbal FOR MEMEBERS DB TO AUTO-DETECT PENALTY
                $result222 = mysqli_query($connect, "UPDATE members SET weeklyindbal = '$balance', weeklycode = '$telephone', weeklyenddate = '$today_date' WHERE namee = '$name'");



                ///---------------------/ TO GET PHONE------------
                $debtor_info = mysqli_query($connect, "SELECT * FROM members WHERE namee = '$name'");
                while ($row_info = mysqli_fetch_assoc($debtor_info)) {
                    $address = $row_info['addresss'];
                    $tel = $row_info['telephone'];
                    $image = $row_info['imagess'];
                    $district = $row_info['registration_num'];
                    $refree = $row_info['religion'];
                }




                //     ------------------------------------------------------------------------ 


                if ($savings_alone == "") {
                    $savings_alone1 = 0;
                    $savings_alone = 0;
                } else {
                    $savings_alone1 = $savings_alone;
                }
                $sms_parent1 = $parent2 + $savings_alone1;



                //..........................TERMII SMS START.......................................


                $sms_date = date("d-M-Y h:ia");
                $sms_name = $name;
                //    $sms_amt_disburseloan = number_format($amt_disburseloan); 
                $sms_parent = number_format($sms_parent1);
                $sms_parent1 = $sms_parent . "N";
                $sms_balance = number_format($balance);
                $sms_balance1 = $sms_balance . "N";
                ltrim($tel, '0');
                $naija_code = "234";
                $phone = $naija_code . ltrim($tel, '0');
                $mssg = "Amt_paid->₦$sms_parent1. Balance->₦$sms_balance1.";
                $laon = "Loan";

                $forcednd = 1;

                $curl = curl_init();

                // Construct the JSON body properly
                $data = json_encode([
                    "sender_name" => "FINSOLUTE",
                    "message" => $mssg,
                    "recipients" => $phone,
                    "forcednd" => $forcednd
                ]);

                curl_setopt_array($curl, array(
                    CURLOPT_URL => 'https://app.multitexter.com/v2/app/sendsms',
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'POST',
                    CURLOPT_POSTFIELDS => $data, // Pass the JSON string
                    CURLOPT_HTTPHEADER => array(
                        'Authorization: Bearer GLCNnH0pnKUGqaafecizgqUR0H5xKpyGTYAdYGUoY7avBpJHFpKN09DUcPiB', // Replace with your token
                        'Content-Type: application/json'
                    ),
                ));

                $response = curl_exec($curl);

                curl_close($curl);



                //..........................TERMII SMS END.......................................                       





                $_SESSION['redirect_message_weekly'] = "<script type='text/javascript'> $(document).ready(function(){ 
                swal({
                         title: 'Success!',
                         text: '$name has successfully paid " . number_format($parent) . " Naira. " . number_format($interest_to_revenue) . " has been moved to revenue account',
                         icon: 'success',
                        buttons: {
                            confirm : {text:'Ok',className:'sweet-orange'},
                          
                        },
                        closeOnClickOutside: false
                       })
                  
                }); </script>";


                $id = "";
                echo "<script> location.href = 'weekly_loan_statement.php?codename=$telephone&name=$name'; </script>";



























            } else {
                if ($bad_debt != "ON") {
                    $result_revenue = mysqli_query($connect, "INSERT INTO revenuexp (remaks, category, type, revenue, date, date_format,  month, year, collector, branch) VALUES('$name weekly interest', 'interest_weekly', 'weekly', '$interest_to_revenue', '$date', '$date_format', '$month','$year','admin', '$branch')");
                }

                @$target_file = $images;
                //INSERT RECORD 1
                date_default_timezone_set("Africa/Lagos");
                $time_stamp = date("h:ia");
                $time_stamp1 = date("h:ia", strtotime($time_stamp));





                //     @@@@@@@@@@@@@@@@@@@@@@@@@@@   ALL FOR INSURANCE   @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@       
                ///////////TESTING INCASE THRES'S ENOUGH FUNDS FOR INSURANCE
                $sum_insurance_in = mysqli_query($connect, "SELECT SUM(insurance_in) as total_in FROM allloan");
                while ($row = mysqli_fetch_assoc($sum_insurance_in)) {
                    $insurance_in = $row['total_in'];
                }


                $sum_insurance_out = mysqli_query($connect, "SELECT SUM(insurance_out) as total_out FROM allloan");
                while ($row = mysqli_fetch_assoc($sum_insurance_out)) {
                    $insurance_out = $row['total_out'];
                }

                $total_insurance = $insurance_in - $insurance_out;





                $sum_insurance_in2 = mysqli_query($connect, "SELECT SUM(insurance_in) as total_in FROM weekly_allloan");
                while ($row = mysqli_fetch_assoc($sum_insurance_in2)) {
                    $insurance_in2 = $row['total_in'];
                }


                $sum_insurance_out2 = mysqli_query($connect, "SELECT SUM(insurance_out) as total_out FROM weekly_allloan");
                while ($row = mysqli_fetch_assoc($sum_insurance_out2)) {
                    $insurance_out2 = $row['total_out'];
                }

                $total_insurance2 = $insurance_in2 - $insurance_out2;



                $sum_insurance_in3 = mysqli_query($connect, "SELECT SUM(insurance_in) as total_in FROM monthly_allloan");
                while ($row = mysqli_fetch_assoc($sum_insurance_in3)) {
                    $insurance_in3 = $row['total_in'];
                }


                $sum_insurance_out3 = mysqli_query($connect, "SELECT SUM(insurance_out) as total_out FROM monthly_allloan");
                while ($row = mysqli_fetch_assoc($sum_insurance_out3)) {
                    $insurance_out3 = $row['total_out'];
                }

                $total_insurance3 = $insurance_in3 - $insurance_out3;



                $final_total_insurance = $total_insurance + $total_insurance2 + $total_insurance3;

                $final_insurance_in = $insurance_in + $insurance_in2 + $insurance_in3;

                $final_insurance_out = $insurance_out + $insurance_out2 + $insurance_out3;

                ////THIS IS A ONE TIME COMMAND TO STP HERE OR FLOW.                  
                if ($bad_debt == "ON" && $parent > $final_total_insurance) {

                    $_SESSION['redirect_message_weekly'] = "<script type='text/javascript'> $(document).ready(function(){ 
                swal({
                         title: 'Insufficient Insurance Balance!',
                         text: 'Sorry, There is no sufficeint funds from Insurance Portfolio to settle $name debt. Your current Insurance Balance is: " . number_format($final_total_insurance) . " Naira. Try Later!!!',
                         icon: 'warning',
                        buttons: {
                            confirm : {text:'Ok',className:'sweet-orange'},
                          
                        },
                        closeOnClickOutside: false
                       })
                  
                }); </script>";


                    $id = "";
                    echo "<script> location.href = 'weekly_loan_statement.php?codename=$telephone&name=$name'; </script>";



                } else if (($bad_debt == "ON" && $parent < $final_total_insurance) || $bad_debt == "") {


                    if ($bad_debt == "ON") {
                        $remarks = "Bad Debt Settled by Finsolute";
                        $interest_to_revenue = 0;
                        $parent = $parent2;
                        $insurance_out_now = $parent2;
                    } else {
                        $remarks = 'loan repayment';
                        $insurance_out_now = 0;
                    }

                    /////     @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@     




                    $bookmark_row = rand(10, 100000000);

                    $sql_statement = "INSERT INTO weekly_allloan (name, type, remarks, repay, codename, date , date_format, month, year, district, lastpaiddate, collector, savings, timestamp, dob, insurance_out, date_posted, bookmark_row, branch) VALUES ('$name', '$loan_type', '$remarks', '$parent2', '$telephone', '$date' , '$date_format', '$month', '$year', '$regnum', '$today_date', 'admin', '$savings_alone', '$time_stamp1', '$group_name', '$insurance_out_now', '$date_posted', '$bookmark_row', '$branch')";
                    $result = mysqli_query($connect, $sql_statement);
                    $the_error1 = mysqli_error($connect);
                    echo $the_error1;



                    //UPDATE ALL WITH GROUP NAME
                    $update_all_code_forGroup = mysqli_query($connect, "UPDATE weekly_allloan SET dob = '$group_name' WHERE codename = '$telephone'");




                    ////GET THE REMAINING BALANCE OF LOAN FOR AN INDIVIDUAL
                    $summation_loan2 = "";
                    $summation_pay2 = "";

                    ///////THIS IS TO GET THE INDIVIDUAL BALANCE
                    ///////////////THIS IS TO SUM LOAN
                    $code_loan = mysqli_query($connect, "SELECT SUM(disburseloan) as total FROM weekly_allloan WHERE codename = '$telephone'");
                    while ($row = mysqli_fetch_assoc($code_loan)) {
                        $summation_loan2 = $row['total'];
                        //                           $plus_interest = $row['interest'];  
                    }


                    ////////////THIS IS TO SUM PAYMENTS
                    $total_payments2 = mysqli_query($connect, "SELECT SUM(repay) as total FROM weekly_allloan WHERE codename='$telephone'");
                    while ($row1 = mysqli_fetch_array($total_payments2)) {
                        $summation_pay2 = $row1['total'];
                    }
                    $balance = $summation_loan2 - $summation_pay2;
                    $sql_sum_repay = mysqli_query($connect, "UPDATE weekly_allloan SET repay_sum = '$summation_pay2', indbalance = '$balance', lastpaiddate = '$today_date' WHERE disburseloan > 1 AND codename='$telephone' AND remarks = 'loan disbursement'");











                    //  *******************************************************************************************************                


                    ///////THIS IS TO GET THE INDIVIDUAL SAVINGS BALANCE
                    ///////////////THIS IS TO SUM ALL SAVINGS
                    $sum_savings = mysqli_query($connect, "SELECT SUM(savings) as total FROM weekly_allloan WHERE name = '$name' AND codename = '$telephone'");
                    while ($row = mysqli_fetch_assoc($sum_savings)) {
                        $summation_savings = $row['total'];
                        //               $plus_interest = $row['interest'];  
                    }


                    ////////////THIS IS TO SUM ALLWITHDRAWALS
                    $sum_withdraw = mysqli_query($connect, "SELECT SUM(withdrawsavings) as total FROM weekly_allloan WHERE name = '$name' AND codename = '$telephone'");
                    while ($row1 = mysqli_fetch_assoc($sum_withdraw)) {
                        $summation_withdraw = $row1['total'];
                    }

                    $savings_balance = $summation_savings - $summation_withdraw;


                    //  *******************************************************************************************************                







                    ////////GET ALL REVERSAL PAYMENT TO MINUS FROM
                    $total_payments33 = mysqli_query($connect, "SELECT SUM(disburseloan) as total FROM weekly_allloan WHERE codename='$telephone' AND remarks = 'Reversal Entry'");
                    while ($row1 = mysqli_fetch_array($total_payments33)) {
                        $summation_reverse2 = $row1['total'];

                    }



                    $summation_pay_real = $summation_pay2 - $summation_reverse2;



                    //GET LAST ID  
                    $get_last_id = mysqli_query($connect, "SELECT * FROM weekly_allloan WHERE bookmark_row = '$bookmark_row'");
                    while ($row = mysqli_fetch_assoc($get_last_id)) {
                        $id = $row['id'];
                    }


                    /////////SUM GENERAL REPAY & DISBURSE LOAN SO YOU CAN GET GEN BALALNCE
                    ////////////THIS IS TO SUM PAYMENTS
                    $total_payments = mysqli_query($connect, "SELECT SUM(repay) as total FROM weekly_allloan");
                    while ($row1 = mysqli_fetch_array($total_payments)) {
                        $summation_pay = $row1['total'];
                    }


                    ////////////THIS IS TO SUM DISBURSE
                    $total_disburse2 = mysqli_query($connect, "SELECT SUM(disburseloan) as total FROM weekly_allloan WHERE remarks = 'loan disbursement'");
                    while ($row2 = mysqli_fetch_array($total_disburse2)) {
                        $summation_disburse = $row2['total'];
                    }
                    $gen_balance = $summation_disburse - $summation_pay;





                    //         """"""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""          
                    /////////SUM GENERAL SAVINGS & WITHDRAWALS  SO YOU CAN GET GEN BALALNCE
                    ////////////THIS IS TO SUM savings
                    $total_save = mysqli_query($connect, "SELECT SUM(savings) as total FROM weekly_allloan");
                    while ($row1 = mysqli_fetch_array($total_save)) {
                        $summation_save = $row1['total'];
                    }


                    ////////////THIS IS TO SUM withdrawsavings
                    $total_withdrawsavings = mysqli_query($connect, "SELECT SUM(withdrawsavings) as total FROM weekly_allloan");
                    while ($row2 = mysqli_fetch_array($total_withdrawsavings)) {
                        $summation_withdrawsavings = $row2['total'];
                    }
                    $gen_balance_save = $summation_save - $summation_withdrawsavings;

                    //         """"""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""          



                    //#############"""""""""""""""""""""""""""""""""""""""""""""""""""""######################################"""""""""""""""""""""""""""""""""""""""""""          
                    /////////SUM GENERAL equity & WITHDRAWALS  SO YOU CAN GET GEN BALALNCE
                    ////////////THIS IS TO SUM savings
                    $total_equity = mysqli_query($connect, "SELECT SUM(equity) as total FROM weekly_allloan");
                    while ($row1 = mysqli_fetch_array($total_equity)) {
                        $summation_equity = $row1['total'];
                    }


                    ////////////THIS IS TO SUM withdrawsavings
                    $total_withdrawequity = mysqli_query($connect, "SELECT SUM(withdrawequity) as total FROM weekly_allloan");
                    while ($row2 = mysqli_fetch_array($total_withdrawequity)) {
                        $summation_withdrawequity = $row2['total'];
                    }
                    $gen_balance_equity = $summation_equity - $summation_withdrawequity;

                    //         """"""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""          




















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



                    //       *********************************||||||||||||||||****************************************************            
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
                    $sql_statement101 = "UPDATE members SET balance = '$total_status' WHERE namee='$name'";
                    $result29 = mysqli_query($connect, $sql_statement101);
                    //       **************************||||||||||||||||***********************************************            








                    $result2 = mysqli_query($connect, "UPDATE weekly_allloan SET genbalance = '$gen_balance', repaycumm = '$summation_pay_real', indbalance = '$balance', genbalsavings = '$gen_balance_save', indbalsavings = '$savings_balance', genbalequity = '$gen_balance_equity' WHERE id = '$id'");


                    //         UPDATE DEBT FOR WEEKLY IN MEMBER DB
                    $day = date('l', strtotime($today_date));
                    $result40 = mysqli_query($connect, "UPDATE members SET  balweek = '$balance' WHERE namee = '$name'");

                    //           UPDATE weeklyindbal FOR MEMEBERS DB TO AUTO-DETECT PENALTY
                    $result222 = mysqli_query($connect, "UPDATE members SET weeklyindbal = '$balance', weeklycode = '$telephone', weeklyenddate = '$today_date' WHERE namee = '$name'");


                    ///---------------------/ TO GET PHONE------------
                    $debtor_info = mysqli_query($connect, "SELECT * FROM members WHERE namee = '$name'");
                    while ($row_info = mysqli_fetch_assoc($debtor_info)) {
                        $address = $row_info['addresss'];
                        $tel = $row_info['telephone'];
                        $image = $row_info['imagess'];
                        $district = $row_info['registration_num'];
                        $refree = $row_info['religion'];
                    }




                    //     ------------------------------------------------------------------------ 

                    if ($savings_alone == "") {
                        $savings_alone1 = 0;
                        $savings_alone = 0;
                    } else {
                        $savings_alone1 = $savings_alone;
                    }
                    $sms_parent1 = $parent2 + $savings_alone1;



                    if ($result2 == true) {
                        //..........................TERMII SMS START.......................................


                        $sms_date = date("d-M-Y h:ia");
                        $sms_name = $name;
                        //    $sms_amt_disburseloan = number_format($amt_disburseloan); 
                        $sms_parent = number_format($sms_parent1);
                        $sms_parent1 = $sms_parent . "N";
                        $sms_balance = number_format($balance);
                        $sms_balance1 = $sms_balance . "N";
                        ltrim($tel, '0');
                        $naija_code = "234";
                        $phone = $naija_code . ltrim($tel, '0');
                        $mssg = "Amt_paid->₦$sms_parent1. Balance->₦$sms_balance1.";
                        $laon = "Loan";

                        $forcednd = 1;

                        $curl = curl_init();

                        // Construct the JSON body properly
                        $data = json_encode([
                            "sender_name" => "FINSOLUTE",
                            "message" => $mssg,
                            "recipients" => $phone,
                            "forcednd" => $forcednd
                        ]);

                        curl_setopt_array($curl, array(
                            CURLOPT_URL => 'https://app.multitexter.com/v2/app/sendsms',
                            CURLOPT_RETURNTRANSFER => true,
                            CURLOPT_ENCODING => '',
                            CURLOPT_MAXREDIRS => 10,
                            CURLOPT_TIMEOUT => 0,
                            CURLOPT_FOLLOWLOCATION => true,
                            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                            CURLOPT_CUSTOMREQUEST => 'POST',
                            CURLOPT_POSTFIELDS => $data, // Pass the JSON string
                            CURLOPT_HTTPHEADER => array(
                                'Authorization: Bearer GLCNnH0pnKUGqaafecizgqUR0H5xKpyGTYAdYGUoY7avBpJHFpKN09DUcPiB', // Replace with your token
                                'Content-Type: application/json'
                            ),
                        ));

                        $response = curl_exec($curl);

                        curl_close($curl);



                        //..........................TERMII SMS END.......................................                       

                        $_SESSION['redirect_message_weekly'] = "<script type='text/javascript'> $(document).ready(function(){ 
                swal({
                         title: 'Success!',
                         text: '$name has successfully paid " . number_format($parent2) . " Naira. To balance: " . number_format($balance) . " Naira. " . number_format($parent) . " Naira will settle the principal and " . number_format($interest_to_revenue) . " Naira has been moved to revenue account. while " . @number_format($savings_alone) . " has been moved to savings',
                         icon: 'success',
                        buttons: {
                            confirm : {text:'Ok',className:'sweet-orange'},
                          
                        },
                        closeOnClickOutside: false
                       })
                  
                }); </script>";

                        '';
                        $id = "";
                        echo "<script> location.href = 'weekly_loan_statement.php?codename=$telephone&name=$name'; </script>";
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
        }
    } else {
        echo "<script type='text/javascript'> $(document).ready(function(){ 
                swal({
                         title: 'Name Check!',
                         text: 'You must enter name ooooo!!',
                         icon: 'warning',
                        buttons: {
                            confirm : {text:'Ok',className:'sweet-orange'},
                          
                        },
                        closeOnClickOutside: false
                       })
                  
                }); </script>";

    }

}



//////////////////////////////DELETE////////////////////////////////////////////
if (isset($_POST['dele'])) {


    $name = strtoupper($_POST['name']);
    $regnum = strtoupper($_POST['regnum']);
    $address = $_POST['address'];
    $dob = $_POST['dob'];
    $class = $_POST['class'];
    $parent = strtoupper($_POST['parent']);
    $telephone = $_POST['telephone'];
    $mail = $_POST['mail'];
    $religion = $_POST['religion'];
    $login_id = $_POST['loginid'];
    $id = $_POST['idd'];


    //Delete RECORD from fees
    @$resultt = mysqli_query($connect, "DELETE FROM student_fees WHERE name ='$name'");

    //Delete RECORD from school_fees_breakdown
    @$answer = mysqli_query($connect, "DELETE FROM school_fees_breakdown WHERE namee ='$name'");

    //then Delete record in student database
    @$sql_statement = "DELETE FROM student WHERE id = '$id'";


    $result = mysqli_query($connect, $sql_statement);
    if ($result == true) {
        echo "<script>alert('$name has been successfully deleted');</script>";
    }

} else {
    echo ""; //leave blank 
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Weekly Payment of Loan</title>
    <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 10]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <meta name="keywords"
        content="bootstrap, bootstrap admin template, admin theme, admin dashboard, dashboard template, admin template, responsive" />
    <meta name="author" content="Codedthemes" />
    <!-- Favicon icon -->
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
    <!-- waves.css -->
    <link rel="stylesheet" href="assets/pages/waves/css/waves.min.css" type="text/css" media="all">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap/css/bootstrap.min.css">
    <!-- waves.css -->
    <link rel="stylesheet" href="assets/pages/waves/css/waves.min.css" type="text/css" media="all">
    <!-- themify icon -->
    <link rel="stylesheet" type="text/css" href="assets/icon/themify-icons/themify-icons.css">
    <!-- font-awesome-n -->
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome-n.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <!-- scrollbar.css -->
    <link rel="stylesheet" type="text/css" href="assets/css/jquery.mCustomScrollbar.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">




    <!-- Script -->
    <script src='jquery-3.1.1.min.js' type='text/javascript'></script>

    <!-- jQuery UI -->

    <link href='jquery-ui.min.css' rel='stylesheet' type='text/css'>
    <script src='jquery-ui.min.js' type='text/javascript'></script>


    <!--Boostrap & family-->
    <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
    <!--<link rel="stylesheet" href="maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">-->


    <script src="maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>



    <script>
        window.addEventListener('load', function () {
            document.querySelector('input[type="file"]').addEventListener('change', function () {
                if (this.files && this.files[0]) {
                    var img = document.querySelector('img');  // $('img')[0]
                    img.src = URL.createObjectURL(this.files[0]); // set src to blob url
                    img.onload = imageIsLoaded;
                }
            });
        });


    </script>

</head>



<body>
    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="loader-track">
            <div class="preloader-wrapper">
                <div class="spinner-layer spinner-blue">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>

                <div class="spinner-layer spinner-yellow">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>

                <div class="spinner-layer spinner-green">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pre-loader end -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">
            <?php
            include 'admin_nav1.php';
            ?>

            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <?php
                    include 'admin_nav2.php';
                    ?>
                    <div class="pcoded-content">

                        <!-- Page-header start -->
                        <div class="page-header">
                            <div class="page-block">
                                <div class="row align-items-center">
                                    <div class="col-md-8">
                                        <div class="page-header-title">
                                            <h5 class="m-b-10">WEEKLY LOAN REPAYMENT</h5>
                                            <p class="m-b-0">Financial Summary</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <a href="admin_home.php"> <i class="fa fa-home"></i> </a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="admin_home.php">Dashboard</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Page-header end -->





                        <div class="pcoded-inner-content">
                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <!-- Page-body start -->
                                    <div class="page-body">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <!-- Basic Form Inputs card start -->
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5>WEEKLY LOAN REPAYMENT</h5>
                                                        <!--<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>-->
                                                    </div>
                                                    <div class="card-block">
                                                        <!--====================SEARCHING STUDENT-->
                                                        <!--====================SEARCHING STUDENT-->
                                                        <form action="weekly_payment.php " method="POST"
                                                            enctype="multipart/form-data">

                                                            <!--<input   type="text" name="telephone" id="codename" placeholder="select Code_name" maxlength="10" required  >-->

                                                            <center>
                                                                <div class="input-group mb-3">
                                                                    <input type="text" class="form-control"
                                                                        id="codename" name="telephone"
                                                                        placeholder="Search Customer To Pay Loan"
                                                                        required="">
                                                                    <div class="input-group-append">
                                                                        <button class="btn btn-warning" id="btnsearch"
                                                                            name="btnsrch" type="submit">SEARCH</button>
                                                                    </div>
                                                                </div>


                                                            </center>


                                                            <!--///////////////////////////////////////////-->

                                                            <?php
                                                            //          session_start();
                                                            $get_branch = $codename = $disburseloan = $dailypayment = $true = $available_blance = $check_codename = "";
                                                            $get_name = $date = $interest = $proposedsavings = $no_weeks = $images = $weeks_remaining = $id = $name = $disburseloan_total = $days_remaining = $remain_months = $remain_days = $regnum = $loan_type = $output_closedate = $closingdate = $address = $dob = $class = $parent = $telephone = $mail = $religion = $login_id = "";

                                                            if (isset($_POST['btnsrch'])) {


                                                                $codename = $_POST['telephone'];
                                                                $sql_state1 = "SELECT * FROM weekly_allloan WHERE disburseloan > 1 AND remarks = 'loan disbursement' AND codename = '$codename'";
                                                                $result1 = mysqli_query($connect, $sql_state1);

                                                                while ($row = mysqli_fetch_assoc($result1)) {
                                                                    $names = $row["name"];
                                                                    $closingdate = $row["enddate"];
                                                                    $loan_type = $row["type"];
                                                                    $disburseloan = $row["disburseloan"];
                                                                    $check_codename = $row["codename"];
                                                                    $interest = $row["interest"];
                                                                    $proposedsavings = $row["proposedsavings"];
                                                                    $no_weeks = $row['weeks'];
                                                                }



                                                                $disburseloan_total = $disburseloan;
                                                                $_SESSION['interest'] = $interest;

                                                                $_SESSION['weeks'] = $no_weeks;

                                                                if ($check_codename != "") {
                                                                    $sql_state = "SELECT * FROM members WHERE namee = '$names'";
                                                                    $result = mysqli_query($connect, $sql_state);

                                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                                        $id = $row["id"];
                                                                        //                echo $id;
                                                                        $name = $row["namee"];
                                                                        $regnum = $row["registration_num"];
                                                                        $address = $row["addresss"];
                                                                        $dob = $row["dob"];
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

                                                                    ////////GET THE LAST BALANCE with $codename last row
                                                                    $sql_state3 = "SELECT * FROM weekly_allloan WHERE name = '$name' AND codename = '$codename'";
                                                                    $result3 = mysqli_query($connect, $sql_state3);

                                                                    while ($row = mysqli_fetch_assoc($result3)) {
                                                                        $available_blance = $row["indbalance"];
                                                                        //              $loan_type = $row["type"];
                                                                    }

                                                                    $_SESSION['available_blance'] = $available_blance;

                                                                    $dailyp = $disburseloan / $no_weeks;

                                                                    $dailypayment = ceil($dailyp);
                                                                    $total_weekly = $proposedsavings + $dailypayment;
                                                                    $output_closedate = date('d-M-Y', strtotime($closingdate));

                                                                    ///////////////////////////////////////
                                                                    //GET NUMBER OF MONTHS & DAYS LEFT
                                                                    $dated = strtotime("$closingdate");

                                                                    $remaining = $dated - time();
                                                                    $remain_days = date('d', $remaining);


                                                                    $getmonth = date('m', $remaining);
                                                                    $remain_months = $getmonth - 1;


                                                                    ///////COUNT ONLY DAYS
                                                                    $days_remaining = floor($remaining / 86400) . " days left";
                                                                    $days = floor($remaining / 86400);
                                                                    $weeks_remaining = floor($days / 7) . " Weeks left";


                                                                } else {
                                                                    echo "<script type='text/javascript'> $(document).ready(function(){ 
                swal({
                         title: 'Codename Check!',
                         text: 'Wrong code_name inserted. Insert correct code',
                         icon: 'warning',
                        buttons: {
                            confirm : {text:'Ok',className:'sweet-orange'},
                          
                        },
                        closeOnClickOutside: false
                       })
                  
                }); </script>";


                                                                    $codename = "";
                                                                }
                                                                $true = "true";

                                                            }






                                                            if (isset($_GET['codename'])) {

                                                                $codename = $_REQUEST['codename'];
                                                                $sql_state1 = "SELECT * FROM weekly_allloan WHERE disburseloan > 1 AND remarks = 'loan disbursement' AND codename = '$codename'";
                                                                $result1 = mysqli_query($connect, $sql_state1);

                                                                while ($row = mysqli_fetch_assoc($result1)) {
                                                                    $names = $row["name"];
                                                                    $closingdate = $row["enddate"];
                                                                    $loan_type = $row["type"];
                                                                    $disburseloan = $row["disburseloan"];
                                                                    $check_codename = $row["codename"];
                                                                    $interest = $row["interest"];
                                                                    $proposedsavings = $row["proposedsavings"];
                                                                    $no_weeks = $row['weeks'];
                                                                }



                                                                $disburseloan_total = $disburseloan;
                                                                $_SESSION['interest'] = $interest;

                                                                $_SESSION['weeks'] = $no_weeks;

                                                                if ($check_codename != "") {
                                                                    $sql_state = "SELECT * FROM members WHERE namee = '$names'";
                                                                    $result = mysqli_query($connect, $sql_state);

                                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                                        $id = $row["id"];
                                                                        //                echo $id;
                                                                        $name = $row["namee"];
                                                                        $regnum = $row["registration_num"];
                                                                        $address = $row["addresss"];
                                                                        $dob = $row["dob"];
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

                                                                    ////////GET THE LAST BALANCE with $codename last row
                                                                    $sql_state3 = "SELECT * FROM weekly_allloan WHERE name = '$name' AND codename = '$codename'";
                                                                    $result3 = mysqli_query($connect, $sql_state3);

                                                                    while ($row = mysqli_fetch_assoc($result3)) {
                                                                        $available_blance = $row["indbalance"];
                                                                        //              $loan_type = $row["type"];
                                                                    }

                                                                    $_SESSION['available_blance'] = $available_blance;

                                                                    $dailyp = $disburseloan / $no_weeks;

                                                                    $dailypayment = ceil($dailyp);
                                                                    $total_weekly = $proposedsavings + $dailypayment;
                                                                    $output_closedate = date('d-M-Y', strtotime($closingdate));

                                                                    ///////////////////////////////////////
                                                                    //GET NUMBER OF MONTHS & DAYS LEFT
                                                                    $dated = strtotime("$closingdate");

                                                                    $remaining = $dated - time();
                                                                    $remain_days = date('d', $remaining);


                                                                    $getmonth = date('m', $remaining);
                                                                    $remain_months = $getmonth - 1;


                                                                    ///////COUNT ONLY DAYS
                                                                    $days_remaining = floor($remaining / 86400) . " days left";
                                                                    $days = floor($remaining / 86400);
                                                                    $weeks_remaining = floor($days / 7) . " Weeks left";


                                                                } else {
                                                                    echo "<script type='text/javascript'> $(document).ready(function(){ 
                swal({
                         title: 'Codename Check!',
                         text: 'Wrong code_name inserted. Insert correct code',
                         icon: 'warning',
                        buttons: {
                            confirm : {text:'Ok',className:'sweet-orange'},
                          
                        },
                        closeOnClickOutside: false
                       })
                  
                }); </script>";


                                                                    $codename = "";
                                                                }
                                                                $true = "true";
                                                            }
                                                            ?>



                                                        </form>









                                                        <form action="weekly_payment.php" method="POST"
                                                            enctype="multipart/form-data">
                                                            <div class="row">

                                                                <div class="col-sm-3" style="margin-top: 60px;">
                                                                    <center>
                                                                        <div style="width:140px; height:140px;"
                                                                            class="mt-xl-5">
                                                                            <img id="img" src="<?php echo $images; ?>"
                                                                                alt="-------------------**MEMEBER PHOTO**----------------------------------"
                                                                                style="border: 4px #99ff99 solid; width:140px; height:140px;">
                                                                            <!--<label style="margin-left: 10px; margin-top: 80px;">To Revenue</label><label style="font-family: Webdings;  font-size: 26px; ">8</label>-->
                                                                            <!--<input type="number" name="interest" placeholder="pay Interest" style=""/>-->
                                                                            <input type="hidden" name="idd"
                                                                                value="<?php echo $id; ?>" />
                                                                            <input type="hidden" name="imge"
                                                                                value="<?php echo $images; ?>" />
                                                                        </div>
                                                                    </center>
                                                                </div>

                                                                <div class="col-sm-9">
                                                                    <div class="form-group row">
                                                                        <label
                                                                            class="col-sm-2 col-form-label">Name:</label>
                                                                        <div class="col-sm-10">
                                                                            <input type="hidden" id="duplicate_name" />
                                                                            <input type="text" class="form-control"
                                                                                placeholder="Name" id="nam" type="text"
                                                                                name="name" value="<?php echo $name; ?>"
                                                                                maxlength="50" readonly=""
                                                                                style="text-transform: uppercase;"
                                                                                required>
                                                                        </div>
                                                                    </div>
                                                                    <input type="hidden" name="shadow"
                                                                        value="<?php echo $get_name; ?>" />
                                                                    <div class="form-group row">
                                                                        <label
                                                                            class="col-sm-2 col-form-label">Branch:</label>
                                                                        <div class="col-sm-10">
                                                                            <input type="hidden" />
                                                                            <input type="text" class="form-control"
                                                                                placeholder="Branch Name" id="nam"
                                                                                type="text" name="branch"
                                                                                value="<?php echo $get_branch; ?>"
                                                                                maxlength="70" readonly=""
                                                                                style="text-transform: uppercase;"
                                                                                required>
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group row">
                                                                        <label class="col-sm-2 col-form-label">Unit
                                                                            District:</label>
                                                                        <div class="col-sm-10">
                                                                            <input type="text" class="form-control"
                                                                                placeholder="District" name="regnum"
                                                                                value="<?php echo $regnum; ?>"
                                                                                maxlength="12" readonly=""
                                                                                style="text-transform: uppercase;"
                                                                                required="">
                                                                        </div>
                                                                    </div>



                                                                    <div class="form-group row">
                                                                        <label class="col-sm-2 col-form-label">Loan
                                                                            Collected</label>
                                                                        <div class="col-sm-10">
                                                                            <?php if ($disburseloan_total == 0) {
                                                                                $disburseloan_total = "";
                                                                            } ?>
                                                                            <input type="text" class="form-control"
                                                                                placeholder="Loan Collected" value="<?php if ($disburseloan_total > 0) {
                                                                                    echo number_format($disburseloan_total);
                                                                                } else {
                                                                                    echo 0;
                                                                                }
                                                                                ; ?>" maxlength="12" readonly=""
                                                                                style="text-transform: uppercase;"
                                                                                required>
                                                                        </div>
                                                                    </div>


                                                                    <div class="form-group row">
                                                                        <label class="col-sm-2 col-form-label">Remaining
                                                                            Bal</label>
                                                                        <div class="col-sm-10">
                                                                            <input type="text" class="form-control"
                                                                                placeholder="Remaining Balance" value="<?php if ($available_blance > 0) {
                                                                                    echo number_format($available_blance);
                                                                                } else {
                                                                                    echo 0;
                                                                                }
                                                                                ; ?>" maxlength="12" readonly=""
                                                                                style="text-transform: uppercase;"
                                                                                required>
                                                                        </div>
                                                                    </div>


                                                                    <div class="form-group row">
                                                                        <label class="col-sm-2 col-form-label">Group
                                                                            Name:</label>
                                                                        <div class="col-sm-10">
                                                                            <input type="text" class="form-control"
                                                                                placeholder="Group Name"
                                                                                name="group_name"
                                                                                value="<?php echo $dob; ?>"
                                                                                maxlength="12" readonly=""
                                                                                style="text-transform: uppercase;"
                                                                                required>
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group row">
                                                                        <label class="col-sm-2 col-form-label">Payment
                                                                            Type:</label>
                                                                        <div class="col-sm-10">
                                                                            <select name="loan_type"
                                                                                class="form-control" required>
                                                                                <option value="Weekly Payment">Weekly
                                                                                    Payment</option>

                                                                            </select>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <br>
                                                            <br>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Enter Amount to
                                                                    Pay:</label>
                                                                <div class="col-sm-10 input-group">
                                                                    <!--                                                                   <select name="pay_pen">
                                                                    <option value="" selected="" hidden="" disabled="">-</option>
                                                                    <option value="P">P</option>
                                                                  </select> &nbsp;&nbsp;  -->
                                                                    <input type="text"
                                                                        onkeypress="return CheckNumeric()"
                                                                        onkeyup="FormatCurrency(this)"
                                                                        placeholder="enter Payment" name="parent"
                                                                        maxlength="20" required="" autofocus="">
                                                                    <select name="pay_pen">
                                                                        <option value="" selected="" hidden=""
                                                                            disabled="">-</option>
                                                                        <option value="P">P</option>
                                                                    </select>
                                                                    <input type="checkbox" style="margin-left: 78px;"
                                                                        name="bad_debt" value="ON" />Bad Debt
                                                                    <!--<label style="font-family: Webdings; margin-left: 15px; font-size: 26px;">7</label>To debt Payment-->
                                                                </div>
                                                            </div>



                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Savings:</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text"
                                                                        onkeypress="return CheckNumeric()"
                                                                        onkeyup="FormatCurrency(this)"
                                                                        placeholder="enter Savings" name="savings"
                                                                        value="0" maxlength="20">

                                                                </div>

                                                            </div>





                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Weekly
                                                                    Repayment:</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control"
                                                                        name="repay_plan1" placeholder="Loan Repayment"
                                                                        value="<?php if ($dailypayment > 0) {
                                                                            echo number_format($dailypayment);
                                                                        } else {
                                                                            echo 0;
                                                                        }
                                                                        ; ?>" style="width: 150px; border-radius: 5px;"
                                                                        readonly="true">
                                                                </div>
                                                            </div>



                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Proposed
                                                                    Savings:</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control"
                                                                        name="repay_plan" placeholder="Proposed Savings"
                                                                        value="<?php if ($proposedsavings > 0) {
                                                                            echo number_format($proposedsavings);
                                                                        } else {
                                                                            echo 0;
                                                                        }
                                                                        ; ?>"
                                                                        style="width: 150px; border-radius: 5px; "
                                                                        readonly="true">
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Expiry
                                                                    Date:</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control"
                                                                        name="closingdate" placeholder="Expiry Date"
                                                                        value="<?php echo $output_closedate; ?>"
                                                                        style="width: 150px; border-radius: 5px; "
                                                                        readonly="true" required>
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Days
                                                                    Remaining:</label>
                                                                <div class="col-sm-10">
                                                                    <label style="font-weight: bold; font-size: 18px;">
                                                                        <?php echo $weeks_remaining; ?>
                                                                    </label>
                                                                </div>
                                                            </div>


                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Click to Back
                                                                    Date:</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" name="backdate"
                                                                        placeholder="IF Back Date is True"
                                                                        onfocus="(this.type='date')"
                                                                        style="width: 150px; border-radius: 5px; ">
                                                                </div>
                                                            </div>


                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Code
                                                                    Name:</label>
                                                                <div class="col-sm-10">
                                                                    <input class="form-control" type="text"
                                                                        name="telephone" id="codename"
                                                                        value="<?php echo $codename; ?>" readonly=""
                                                                        maxlength="10" required>
                                                                </div>
                                                            </div>


                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label"></label>

                                                                <div class="col-sm-10 mx-auto">
                                                                    <input type="hidden" id="hid_sub" value="1">
                                                                    <input
                                                                        style=" padding: 8px; width: 25%; font-weight: bold; background-color:lightgreen; "
                                                                        class="btn button-distance" id="update"
                                                                        type="submit" name="pay" value="PAY" />
                                                                    <a style="margin-left:40px; border-radius: 10px;"
                                                                        class="btn btn-dark"
                                                                        href="weekly_payment.php">Reset</a>
                                                                </div>

                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <!-- Basic Form Inputs card end -->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Page-body end -->
                                </div>

                                <div id="styleSelector"> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Warning Section Starts -->
    <!-- Older IE warning message -->
    <!--[if lt IE 10]>
<div class="ie-warning">
    <h1>Warning!!</h1>
    <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
    <div class="iew-container">
        <ul class="iew-download">
            <li>
                <a href="http://www.google.com/chrome/">
                    <img src="assets/images/browser/chrome.png" alt="Chrome">
                    <div>Chrome</div>
                </a>
            </li>
            <li>
                <a href="https://www.mozilla.org/en-US/firefox/new/">
                    <img src="assets/images/browser/firefox.png" alt="Firefox">
                    <div>Firefox</div>
                </a>
            </li>
            <li>
                <a href="http://www.opera.com">
                    <img src="assets/images/browser/opera.png" alt="Opera">
                    <div>Opera</div>
                </a>
            </li>
            <li>
                <a href="https://www.apple.com/safari/">
                    <img src="assets/images/browser/safari.png" alt="Safari">
                    <div>Safari</div>
                </a>
            </li>
            <li>
                <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                    <img src="assets/images/browser/ie.png" alt="">
                    <div>IE (9 & above)</div>
                </a>
            </li>
        </ul>
    </div>
    <p>Sorry for the inconvenience!</p>
</div>
<![endif]-->
    <!-- Warning Section Ends -->





    <!-- Required Jquery -->
    <script type="text/javascript" src="assets/js/jquery/jquery.min.js "></script>
    <script type="text/javascript" src="assets/js/jquery-ui/jquery-ui.min.js "></script>
    <script type="text/javascript" src="assets/js/popper.js/popper.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap/js/bootstrap.min.js "></script>
    <!-- waves js -->
    <script src="assets/pages/waves/js/waves.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="assets/js/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- slimscroll js -->
    <script src="assets/js/jquery.mCustomScrollbar.concat.min.js "></script>

    <!-- menu js -->
    <script src="assets/js/pcoded.min.js"></script>
    <script src="assets/js/vertical/vertical-layout.min.js "></script>

    <script type="text/javascript" src="assets/js/script.js "></script>








    <script>  // ////////Format number with commas/////////////////////////////////

        function FormatCurrency(ctrl) {
            //Check if arrow keys are pressed - we want to allow navigation around textbox using arrow keys
            if (event.keyCode == 37 || event.keyCode == 38 || event.keyCode == 39 || event.keyCode == 40) {
                return;
            }

            var val = ctrl.value;

            val = val.replace(/,/g, "")
            ctrl.value = "";
            val += '';
            x = val.split('.');
            x1 = x[0];
            x2 = x.length > 1 ? '.' + x[1] : '';

            var rgx = /(\d+)(\d{3})/;

            while (rgx.test(x1)) {
                x1 = x1.replace(rgx, '$1' + ',' + '$2');
            }

            ctrl.value = x1 + x2;
        }

        function CheckNumeric() {
            return event.keyCode >= 48 && event.keyCode <= 57 || event.keyCode == 46;
        }

    </script>

    <!-- Script -->
    <script type='text/javascript'>
        $(function () {

            $("#autocomplete").autocomplete({
                source: function (request, response) {

                    $.ajax({
                        url: "autocomplete.php",
                        type: 'post',
                        dataType: "json",
                        data: {
                            search: request.term
                        },
                        success: function (data) {
                            response(data);
                        }
                    });
                },
                select: function (event, ui) {
                    $('#autocomplete').val(ui.item.label); // display the selected text
                    $('#selectuser_id').val(ui.item.value); // save selected id to input
                    return false;
                }
            });


            //////////////////////////////////////////////////////////////////////////
            $("#codename").autocomplete({
                source: function (request, response) {

                    $.ajax({
                        url: "codename_weekly.php",
                        type: 'post',
                        dataType: "json",
                        data: {
                            search: request.term
                        },
                        success: function (data) {
                            response(data);
                        }
                    });
                },
                select: function (event, ui) {
                    $('#codename').val(ui.item.label); // display the selected text
                    $('#selectuser_id').val(ui.item.value); // save selected id to input
                    return false;
                }
            });




            //////////////////////////////////////////////////////////////////////////////////////////////////////
            // Multiple select
            $("#multi_autocomplete").autocomplete({
                source: function (request, response) {

                    var searchText = extractLast(request.term);
                    $.ajax({
                        url: "autocomplete.php",
                        type: 'post',
                        dataType: "json",
                        data: {
                            search: searchText
                        },
                        success: function (data) {
                            response(data);
                        }
                    });
                },
                select: function (event, ui) {
                    var terms = split($('#multi_autocomplete').val());

                    terms.pop();

                    terms.push(ui.item.label);

                    terms.push("");
                    $('#multi_autocomplete').val(terms.join(", "));
                    ///////////////////////////////////////////////////////////////////////////////////////
                    // Id
                    var terms = split($('#selectuser_ids').val());

                    terms.pop();

                    terms.push(ui.item.value);

                    terms.push("");
                    $('#selectuser_ids').val(terms.join(", "));

                    return false;
                }

            });
        });

        function split(val) {
            return val.split(/,\s*/);
        }
        function extractLast(term) {
            return split(term).pop();
        }



        ///////////THIS IS TO CHANGE TO COMMAS 

        /////////THIS IS TO CHECK BEFORE FINAL UPDATE////////
        $(document).ready(function () {
            $("#update").click(function () {

                ///////////////////////////////////////////////////////////////////

                //             alert("Processing: You have clicked submit button, do not click again");
                var hid_sub = document.getElementById('hid_sub').value;
                document.getElementById('hid_sub').value = "0";

                var name_up = document.getElementById('nam').value;
                if (name_up === "") {
                    swal({
                        title: 'Not Allowed!',
                        text: 'Search member to pay',
                        icon: 'error',
                        buttons: {
                            confirm: { text: 'Ok', className: 'sweet-orange' }

                        },
                        closeOnClickOutside: false
                    });


                    return false;
                } else if (hid_sub === "0") {
                    swal({
                        title: 'Not Allowed!',
                        text: 'Processing: You have already clicked submit button, cannot resubmit',
                        icon: 'error',
                        buttons: {
                            confirm: { text: 'Ok', className: 'sweet-orange' }

                        },
                        closeOnClickOutside: false
                    });
                    return false;
                } else {
                    return true;
                }
            });

        });





        /////////THIS IS TO CHECK BEFORE FINAL DELETION////////
        $(document).ready(function () {

            $("#delete").click(function () {
                var name_del = document.getElementById('nam').value;
                if (name_del === "") {
                    alert("Search member to delete first");
                } else {
                    var del_check = confirm("You will loose all '" + name_del + "' information when you delete. DO YOU WISH TO CONTINUE?");

                    if (del_check === true) {
                        return true;
                    } else {
                        $('#nam').focus();
                        return false;


                    }
                }
            });

        });


    </script>





</body>

</html>