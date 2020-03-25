<?php
session_start();

include 'connection.php';


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

if (isset($_POST['loan'])) {
    $name = strtoupper($_POST['name']);

    if ($name != "") {

        $parent1 = str_replace(",", "", $_POST['parent']);
        $telephone = $_POST['telephone'];//codename
        $loan_type = $_POST['loan_type'];
        $branch = $_POST['branch'];
        //                                $int_rev = str_replace(",", "", $_POST['int_rev']); 
        $save = str_replace(",", "", $_POST['save']);
        $equity = str_replace(",", "", $_POST['equity']);
        $backdate = $_POST['backdate'];
        if ($backdate == "") {
            $date = date("jS F Y");
        } else {
            $date = $output_closedate = date('jS F Y', strtotime($backdate));
        }

        $month = date("F");
        $year = date("Y");
        $regnum = strtoupper($_POST['regnum']); //district
        $dob = $_SESSION['dob'];
        ///DO SOME IF HERE for daily & weekly. put individual boxes for payment, 
        //savings, interest_to_rev. in REVERSE FORM

        if ($loan_type == "Daily Payment") {
            //THIS ACCURATELY DEDUCTS THE INTEREST FROM THE AMOUNT INSERTED WITH 11( use x to to do the maths)      
            //THIS IMPLIES THE SAME WAY IN IS THE SAME WAY OUT (AS APPLIED IN DAILY PAYMENT)                    
            $get_divsor = mysqli_query($connect, "SELECT * FROM allloan WHERE codename = '$telephone' AND remarks = 'loan disbursement'");
            while ($row = mysqli_fetch_assoc($get_divsor)) {
                $divisor = $row['divisor'];
                $available_blance = $row['indbalance'];
            }


            if ($parent1 > $available_blance) {
                echo "<script type='text/javascript'> $(document).ready(function(){ 
                swal({
                         title: 'Reversal Recheck!!',
                         text: 'Reversal too large: " . number_format($parent1) . " Naira for codename: $telephone',
                         icon: 'warning',
                        buttons: {
                            confirm : {text:'Ok',className:'sweet-orange'},
                          
                        },
                        closeOnClickOutside: false
                       })
                  
                }); </script>";
            } else {
                if ($divisor == 0) {
                    $divisor = 11;
                }
                $interest_to_revenue = $parent1 / $divisor;
                $parent = $parent1 - $interest_to_revenue;


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


                //       -----------------------------UPDATE REMARKS----------------------------            
                $get_last_id_rev = mysqli_query($connect, "SELECT * FROM allloan WHERE codename = '$telephone' AND repay > 1");
                while ($row = mysqli_fetch_assoc($get_last_id_rev)) {
                    $id = $row['id'];
                }
                $sql_statement2 = "UPDATE allloan SET remarks = 'mistakenly paid' WHERE id = '$id'";
                $result22 = mysqli_query($connect, $sql_statement2);
                //         ------------------------------------------------------------------------  



                //INSERT RECORD 1
                $time_stamp = date("h:ia");
                $time_stamp1 = date("h:ia", strtotime($time_stamp));

                $staff = $_SESSION['staff_full_name'];
                $bookmark_row = rand(10, 100000000);
                $sql_statement = "INSERT INTO allloan(name, remarks, repay, interest_pay, interest_reduce, codename, date, month, year, district, collector, timestamp, dob, bookmark_row, branch) VALUES ('$name', 'Reversal Entry', '-$parent', '$minus_interest', '$return_int_bal', '$telephone', '$date', '$month', '$year', '$regnum', '$staff', '$time_stamp1', '$dob', '$bookmark_row', '$branch')";

                $result = mysqli_query($connect, $sql_statement);

                //        REVERSE INTREST ENTRY IN REVENUE AS WELL;  
                $result_revenue = mysqli_query($connect, "INSERT INTO revenuexp (remaks, expense, date, month, year) VALUES('$name Reversal Entry for Daily Payment', '$interest_to_revenue', '$date','$month','$year')");


                ////GET THE REMAINING BALANCE OF LOAN FOR AN INDIVIDUAL
                $summation_loan2 = "";


                ///////THIS IS TO GET THE INDIVIDUAL BALANCE
                ////////////THIS IS TO SUM LOAN
                $code_loan = mysqli_query($connect, "SELECT SUM(disburseloan) as total FROM allloan WHERE codename = '$telephone'");
                while ($row = mysqli_fetch_assoc($code_loan)) {
                    $summation_loan2 = $row['total'];

                }

                ////////////THIS IS TO SUM PAYMENTS
                $total_payments2 = mysqli_query($connect, "SELECT SUM(repay) as total FROM allloan WHERE codename='$telephone'");
                while ($row1 = mysqli_fetch_array($total_payments2)) {
                    $summation_pay22 = $row1['total'];
                }

                $sql_sum_repay = mysqli_query($connect, "UPDATE allloan SET repay_sum = '$summation_pay22' WHERE disburseloan > 1 AND codename='$telephone' AND remarks = 'loan disbursement'");

                $balance = $summation_loan2 - $summation_pay22;
                $sql_sum_repay11 = mysqli_query($connect, "UPDATE allloan SET  indbalance = '$balance' WHERE disburseloan > 1 AND codename='$telephone' AND remarks = 'loan disbursement'");

                ////////GET ALL REVERSAL PAYMENT TO MINUS FROM
                $total_payments33 = mysqli_query($connect, "SELECT SUM(disburseloan) as total FROM allloan WHERE codename='$telephone' AND remarks = 'Reversal Entry'");
                while ($row1 = mysqli_fetch_array($total_payments33)) {
                    $summation_reverse2 = $row1['total'];
                }

                $summation_pay_real = $summation_pay22 - $summation_reverse2;

                //GET LAST ID  
                $get_last_id = mysqli_query($connect, "SELECT * FROM allloan WHERE bookmark_row = '$bookmark_row'");
                while ($row = mysqli_fetch_assoc($get_last_id)) {
                    $id = $row['id'];
                }





                /////////SUM GENERAL REPAY & DISBURSE LOAN SO YOU CAN GET GEN BALALNCE
                ////////////THIS IS TO SUM PAYMENTS
                $total_payments = mysqli_query($connect, "SELECT SUM(repay) as total FROM allloan");
                while ($row1 = mysqli_fetch_array($total_payments)) {
                    $summation_pay = $row1['total'];
                }


                ////////////THIS IS TO SUM DISBURSE
                $total_disburse2 = mysqli_query($connect, "SELECT SUM(disburseloan) as total FROM allloan");
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









                $result2 = mysqli_query($connect, "UPDATE allloan SET genbalance = '$gen_balance', repaycumm = '$summation_pay_real', indbalance = '$balance' WHERE id = '$id'");



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


                if ($result == true) {
                    //..........................TERMII SMS START.......................................


                    $sms_date = date("d-M-Y h:ia");
                    $sms_name = $name;

                    $sms_parent = number_format($parent1);
                    $sms_balance = number_format($balance);
                    $sms_parent1 = $sms_parent . "N";
                    $sms_balance1 = $sms_balance . "N";
                    ltrim($tel, '0');
                    $naija_code = "234";
                    $phone = $naija_code . ltrim($tel, '0');
                    $mssg = "Re-payment_Reversal->₦$sms_parent1. Balance->₦$sms_balance1.";
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



                    $_SESSION['redirect_message_reversal'] = "<script type='text/javascript'> $(document).ready(function(){ 
                swal({
                         title: 'Success!',
                         text: '$name Reversal Entry of  " . number_format($parent1) . " Naira for daily payment is successful. Please try to avoid errors',
                         icon: 'success',
                        buttons: {
                            confirm : {text:'Ok',className:'sweet-orange'},
                          
                        },
                        closeOnClickOutside: false
                       })
                  
                }); </script>";


                    '';
                    $id = "";
                    echo "<script> location.href = 'staff_home.php'; </script>";

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


        } else if ($loan_type == "Monthly Payment") {

            $get_divsor = mysqli_query($connect, "SELECT * FROM monthly_allloan WHERE codename = '$telephone' AND remarks = 'loan disbursement'");
            while ($row = mysqli_fetch_assoc($get_divsor)) {

                $available_blance = $row['indbalance'];
            }


            if ($parent1 > $available_blance) {
                echo "<script type='text/javascript'> $(document).ready(function(){ 
                swal({
                         title: 'Reversal Recheck!!',
                         text: 'Reversal too large: " . number_format($parent1) . " Naira for codename: $telephone',
                         icon: 'warning',
                        buttons: {
                            confirm : {text:'Ok',className:'sweet-orange'},
                          
                        },
                        closeOnClickOutside: false
                       })
                  
                }); </script>";
            } else {
                //       LETS GET THE INTEREST TO REVENUE
                $interest_to_revenue22 = mysqli_query($connect, "SELECT * FROM monthly_allloan WHERE codename = '$telephone'");
                while ($row = mysqli_fetch_assoc($interest_to_revenue22)) {
                    $int_rest = $row['interest'];
                    $disburse_loan = $row['disburseloan'];
                }

                //       -----------------------------UPDATE REMARKS----------------------------            
                $get_last_id_rev = mysqli_query($connect, "SELECT * FROM monthly_allloan WHERE codename = '$telephone' AND repay > 1");
                while ($row = mysqli_fetch_assoc($get_last_id_rev)) {
                    $id = $row['id'];
                }
                $sql_statement2 = "UPDATE monthly_allloan SET remarks = 'mistakenly paid' WHERE id = '$id'";
                $result22 = mysqli_query($connect, $sql_statement2);
                //         ------------------------------------------------------------------------  



                //INSERT RECORD 1
                $time_stamp = date("h:ia");
                $time_stamp1 = date("h:ia", strtotime($time_stamp));

                $staff = $_SESSION['staff_full_name'];
                $bookmark_row = rand(10, 100000000);
                $sql_statement = "INSERT INTO monthly_allloan(name, remarks, repay, codename, date, month, year, district, collector, timestamp, bookmark_row, branch) VALUES ('$name', 'Reversal Entry', '-$parent1', '$telephone', '$date', '$month', '$year', '$regnum', '$staff', '$time_stamp1', '$bookmark_row', '$branch')";

                $result = mysqli_query($connect, $sql_statement);
                //                printf("Errormessage: %s\n", mysqli_error($connect));
//        REVERSE INTREST ENTRY IN REVENUE AS WELL;  
                $result_revenue = mysqli_query($connect, "INSERT INTO revenuexp (remaks, expense, date, month, year) VALUES('$name Reversal Entry for Monthly Payment', '$int_rest', '$date','$month','$year')");


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

                $sql_sum_repay = mysqli_query($connect, "UPDATE monthly_allloan SET repay_sum = '$summation_pay2' WHERE disburseloan > 1 AND codename='$telephone' AND remarks = 'loan disbursement'");

                $balance = $summation_loan2 - $summation_pay22;
                $sql_sum_repay11 = mysqli_query($connect, "UPDATE monthly_allloan SET  indbalance = '$balance' WHERE disburseloan > 1 AND codename='$telephone' AND remarks = 'loan disbursement'");

                ////////GET ALL REVERSAL PAYMENT TO MINUS FROM
                $total_payments33 = mysqli_query($connect, "SELECT SUM(disburseloan) as total FROM monthly_allloan WHERE codename='$telephone' AND remarks = 'Reversal Entry'");
                while ($row1 = mysqli_fetch_array($total_payments33)) {
                    $summation_reverse2 = $row1['total'];
                }

                $summation_pay_real = $summation_pay22 - $summation_reverse2;

                //GET LAST ID  
                $get_last_id = mysqli_query($connect, "SELECT * FROM monthly_allloan WHERE bookmark_row = '$bookmark_row'");
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









                $result2 = mysqli_query($connect, "UPDATE monthly_allloan SET genbalance = '$gen_balance', repaycumm = '$summation_pay_real', indbalance = '$balance' WHERE id = '$id'");



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


                if ($result == true) {
                    //..........................TERMII SMS START.......................................


                    $sms_date = date("d-M-Y h:ia");
                    $sms_name = $name;

                    $sms_parent = number_format($parent1);
                    $sms_balance = number_format($balance);
                    ltrim($tel, '0');
                    $naija_code = "234";
                    $phone = $naija_code . ltrim($tel, '0');
                    $mssg = "Re-payment_Reversal->₦$sms_parent1. Balance->₦$sms_balance1.";
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



                    $_SESSION['redirect_message_reversal'] = "<script type='text/javascript'> $(document).ready(function(){ 
                swal({
                         title: 'Success!',
                         text: '$name Reversal Entry of  " . number_format($parent1) . " Naira for Monthly payment is successful. Please try to avoid errors',
                         icon: 'success',
                        buttons: {
                            confirm : {text:'Ok',className:'sweet-orange'},
                          
                        },
                        closeOnClickOutside: false
                       })
                  
                }); </script>";


                    '';
                    $id = "";
                    echo "<script> location.href = 'staff_home.php'; </script>";

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


        } else {

            $get_divsor = mysqli_query($connect, "SELECT * FROM weekly_allloan WHERE codename = '$telephone' AND remarks = 'loan disbursement'");
            while ($row = mysqli_fetch_assoc($get_divsor)) {

                $available_blance = $row['indbalance'];
            }


            if ($parent1 > $available_blance) {
                echo "<script type='text/javascript'> $(document).ready(function(){ 
                swal({
                         title: 'Reversal Recheck!!',
                         text: 'Reversal too large: " . number_format($parent1) . " Naira for codename: $telephone',
                         icon: 'warning',
                        buttons: {
                            confirm : {text:'Ok',className:'sweet-orange'},
                          
                        },
                        closeOnClickOutside: false
                       })
                  
                }); </script>";
            } else {
                /////////else do weekly reverse here
                $no_weeks = $_SESSION['weeks'];
                $proposed_weekly_pay = $_SESSION['proposed_weekly_pay'];
                $interest = $_SESSION['interest_weekly'];
                //THIS ACCURATELY DEDUCTS THE INTEREST FROM THE AMOUNT INSERTED WITH each week( use x to do the maths)      
                if ($no_weeks == 4) {
                    $ans = $interest / 4;
                    $multiplier_effect = $proposed_weekly_pay / $ans;
                    $interest_to_revenue = $parent1 / $multiplier_effect;
                    $parent = $parent1 - $interest_to_revenue;
                }

                if ($no_weeks == 8) {
                    $ans = $interest / 8;
                    $multiplier_effect = $proposed_weekly_pay / $ans;
                    $interest_to_revenue = $parent1 / $multiplier_effect;
                    $parent = $parent1 - $interest_to_revenue;
                }

                if ($no_weeks == 12) {
                    $ans = $interest / 12;
                    $multiplier_effect = $proposed_weekly_pay / $ans;
                    $interest_to_revenue = $parent1 / $multiplier_effect;
                    $parent = $parent1 - $interest_to_revenue;
                }

                if ($no_weeks == 16) {
                    $ans = $interest / 16;
                    $multiplier_effect = $proposed_weekly_pay / $ans;
                    $interest_to_revenue = $parent1 / $multiplier_effect;
                    $parent = $parent1 - $interest_to_revenue;
                }

                if ($no_weeks == 20) {
                    $ans = $interest / 20;
                    $multiplier_effect = $proposed_weekly_pay / $ans;
                    $interest_to_revenue = $parent1 / $multiplier_effect;
                    $parent = $parent1 - $interest_to_revenue;
                }




                //              if($weeks == 4){
//                             $interest_to_revenue = $parent1 / 21 ;
//                         $parent = $parent1 - $interest_to_revenue;
//                         }
//                         
//                         if($weeks == 8){
//                             $interest_to_revenue = $parent1 / 14.33333333333333 ;
//                         $parent = $parent1 - $interest_to_revenue;
//                         }
//                         
//                           if($weeks == 12){
//                             $interest_to_revenue = $parent1 / 11 ;
//                         $parent = $parent1 - $interest_to_revenue;
//                         }
//                         
//                         if($weeks == 16){
//                             $interest_to_revenue = $parent1 / 9;
//                         $parent = $parent1 - $interest_to_revenue;
//                         }
//                         
//                          if($weeks == 20){
//                             $interest_to_revenue = $parent1 / 7.666666666666666;
//                         $parent = $parent1 - $interest_to_revenue;
//                         }
//              


                //INSERT RECORD 1
                //GET LAST ID TO UPDATE REMARKS 
                //       -----------------------------UPDATE REMARKS----------------------------                        
                $get_last_id_rev = mysqli_query($connect, "SELECT * FROM weekly_allloan WHERE codename = '$telephone' AND repay > 1");
                while ($row = mysqli_fetch_assoc($get_last_id_rev)) {
                    $id = $row['id'];
                }
                $sql_statement27 = "UPDATE weekly_allloan SET remarks = 'mistakenly paid' WHERE id = '$id'";
                $result22 = mysqli_query($connect, $sql_statement27);
                //       ---------------------------------------------------------   

                $staff = $_SESSION['staff_full_name'];
                $time_stamp = date("h:ia");
                $time_stamp1 = date("h:ia", strtotime($time_stamp));
                $bookmark_row = rand(10, 100000000);
                $sql_statement = "INSERT INTO weekly_allloan (name, remarks, repay, codename, date, month, year, district, collector, equity, timestamp, branch) VALUES ('$name', 'Reversal Entry', '-$parent1', '$telephone', '$date', '$month', '$year', '$regnum', '$staff', '-$equity', '$time_stamp1', '$branch')";

                $result = mysqli_query($connect, $sql_statement);

                //        REVERSE INTREST ENTRY IN REVENUE AS WELL;  
                $result_revenue = mysqli_query($connect, "INSERT INTO revenuexp (remaks, expense, date, month, year) VALUES('$name Reversal Entry for Weekly Payment', '$interest_to_revenue', '$date','$month','$year')");

                ///////THIS IS FOR WITHDRAW or SAVINGS

                $sql_statement2 = "INSERT INTO weekly_allloan (name, remarks, codename, date, month, year, district, collector, withdrawsavings, timestamp, bookmark_row, branch) VALUES ('$name', 'Reversal Entry for savings', '$telephone', '$date', '$month', '$year', '$regnum', '$staff', '$save', '$time_stamp1', '$bookmark_row', '$branch')";

                $result24 = mysqli_query($connect, $sql_statement2);



                ////GET THE REMAINING BALANCE OF LOAN FOR AN INDIVIDUAL
                $summation_loan2 = "";


                ///////THIS IS TO GET THE INDIVIDUAL BALANCE
                ////////////THIS IS TO SUM LOAN
                $code_loan = mysqli_query($connect, "SELECT SUM(disburseloan) as total FROM weekly_allloan WHERE codename = '$telephone'");
                while ($row = mysqli_fetch_assoc($code_loan)) {
                    $summation_loan2 = $row['total'];

                }

                ////////////THIS IS TO SUM PAYMENTS
                $total_payments2 = mysqli_query($connect, "SELECT SUM(repay) as total FROM weekly_allloan WHERE codename='$telephone'");
                while ($row1 = mysqli_fetch_array($total_payments2)) {
                    $summation_pay22 = $row1['total'];
                }
                $sql_sum_repay = mysqli_query($connect, "UPDATE weekly_allloan SET repay_sum = '$summation_pay22' WHERE disburseloan > 1 AND codename='$telephone' AND remarks = 'loan disbursement'");


                $balance = $summation_loan2 - $summation_pay22;
                $sql_sum_repay11 = mysqli_query($connect, "UPDATE weekly_allloan SET  indbalance = '$balance' WHERE disburseloan > 1 AND codename='$telephone' AND remarks = 'loan disbursement'");

                ////////GET ALL REVERSAL PAYMENT TO MINUS FROM
                $total_payments33 = mysqli_query($connect, "SELECT SUM(disburseloan) as total FROM weekly_allloan WHERE codename='$telephone' AND remarks = 'Reversal Entry'");
                while ($row1 = mysqli_fetch_array($total_payments33)) {
                    $summation_reverse2 = $row1['total'];
                }

                $summation_pay_real = $summation_pay22 - $summation_reverse2;

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
                $total_disburse2 = mysqli_query($connect, "SELECT SUM(disburseloan) as total FROM weekly_allloan");
                while ($row2 = mysqli_fetch_array($total_disburse2)) {
                    $summation_disburse = $row2['total'];
                }
                $gen_balance = $summation_disburse - $summation_pay;








                //         """"""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""          
                /////////SUM INDIVIDUAL SAVINGS & WITHDRAWALS  SO YOU CAN GET GEN BALALNCE
                ////////////THIS IS TO SUM savings
                $total_save1 = mysqli_query($connect, "SELECT SUM(savings) as total FROM weekly_allloan WHERE codename='$telephone'");
                while ($row1 = mysqli_fetch_array($total_save1)) {
                    $summation_save1 = $row1['total'];
                }


                ////////////THIS IS TO SUM withdrawsavings
                $total_withdrawsavings1 = mysqli_query($connect, "SELECT SUM(withdrawsavings) as total FROM weekly_allloan WHERE codename='$telephone'");
                while ($row2 = mysqli_fetch_array($total_withdrawsavings1)) {
                    $summation_withdrawsavings1 = $row2['total'];
                }
                $indbalsavings = $summation_save1 - $summation_withdrawsavings1;

                //         """"""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""          






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















                $result2 = mysqli_query($connect, "UPDATE weekly_allloan SET genbalance = '$gen_balance', repaycumm = '$summation_pay_real', indbalance = '$balance', genbalsavings = '$gen_balance_save',  indbalsavings = '$indbalsavings', genbalequity = '$gen_balance_equity' WHERE id = '$id'");



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


                if ($result == true) {
                    //..........................TERMII SMS START.......................................


                    $sms_date = date("d-M-Y h:ia");
                    $sms_name = $name;

                    $sms_parent = number_format($parent1);
                    $sms_balance = number_format($balance);
                    $sms_parent1 = $sms_parent . "N";
                    $sms_balance1 = $sms_balance . "N";
                    ltrim($tel, '0');
                    $naija_code = "234";
                    $phone = $naija_code . ltrim($tel, '0');
                    $mssg = "Re-payment_Reversal->₦$sms_parent1. Balance->₦$sms_balance1.";
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



                    $_SESSION['redirect_message_reversal'] = "<script type='text/javascript'> $(document).ready(function(){ 
                swal({
                         title: 'Success!',
                         text: '$name Reversal Entry of  " . number_format($parent1) . " Naira for weekly payment is successful. Please try to avoid errors',
                         icon: 'success',
                        buttons: {
                            confirm : {text:'Ok',className:'sweet-orange'},
                          
                        },
                        closeOnClickOutside: false
                       })
                  
                }); </script>";


                    '';
                    $id = "";
                    echo "<script> location.href = 'staff_home.php'; </script>";
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

        $_SESSION['store_permitted_code'] = "";
        $_SESSION['store_amt_reverse'] = "";
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

//            


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
    //leave blank 
}


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <title>Reversal</title>
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
            include 'staff_nav1.php';
            ?>

            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <?php
                    include 'staff_nav2.php';
                    ?>
                    <div class="pcoded-content">

                        <!-- Page-header start -->
                        <div class="page-header">
                            <div class="page-block">
                                <div class="row align-items-center">
                                    <div class="col-md-8">
                                        <div class="page-header-title">
                                            <h5 class="m-b-10">REVERSE AN ENTRY</h5>
                                            <p class="m-b-0">Reverse wrong payments</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <a href="staff_home.php"> <i class="fa fa-home"></i> </a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="staff_home.php">Dashboard</a>
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
                                                        <h5>REVERSE AN ENTRY</h5>
                                                        <!--<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>-->
                                                    </div>
                                                    <div class="card-block">
                                                        <!--====================SEARCHING STUDENT-->
                                                        <form action="staff_reverse_entry.php" method="POST"
                                                            enctype="multipart/form-data">
                                                            <center>
                                                                <div class="input-group mb-3">
                                                                    <input type="text" class="form-control"
                                                                        id="codename"
                                                                        value="<?php echo $_SESSION['store_permitted_code'] ?>"
                                                                        name="srch" readonly=""
                                                                        placeholder="Search with Codename Payment to Reverse"
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
                                                            $get_branch = $get_name = $date = $images = $id = $name = $regnum = $loan_type = $address = $dob = $class = $parent = $telephone = $mail = $religion = $login_id = "";
                                                            $req_name = $req_type = $req_request_disburseloan = $weeks = $codename = $req_district = $req_startdate = $req_collector = "";
                                                            $state = $type = $value = "";


                                                            if (isset($_GET['idd'])) {
                                                                $id = $_GET['idd'];
                                                                $name = $_GET['name'];
                                                                $req_type = $_GET['type'];
                                                                $req_request_disburseloan = $_GET['request_disburseloan'];
                                                                $regnum = $_GET['district'];
                                                                $req_startdate1 = $_GET['startdate'];
                                                                $req_startdate = date('d-M-Y', strtotime($req_startdate1));
                                                                $req_collector = $_GET['collector'];
                                                                $_SESSION['id'] = $id;
                                                                $_SESSION['status'] = $_GET['status'];

                                                                $sql_state = "SELECT * FROM members WHERE namee = '$name'";
                                                                $result = mysqli_query($connect, $sql_state);

                                                                while ($row = mysqli_fetch_assoc($result)) {
                                                                    $images = $row["imagess"];
                                                                    $get_branch = $row['branch'];
                                                                }
                                                            }



                                                            $names = "";
                                                            if (isset($_POST['btnsrch'])) {

                                                                $codename = $_POST['srch'];

                                                                /////////SEARCH FOR DAILY
                                                                $sql_state1 = "SELECT * FROM allloan WHERE  disburseloan > 1 AND remarks = 'loan disbursement' AND codename = '$codename'";
                                                                $result1 = mysqli_query($connect, $sql_state1);
                                                                while ($row = mysqli_fetch_assoc($result1)) {
                                                                    $names = $row["name"];
                                                                    $closingdate = $row["enddate"];
                                                                    $loan_type = $row["type"];
                                                                    $disburseloan = $row["indbalance"];
                                                                    $check_codename = $row["codename"];
                                                                    $interest = $row["interest"];
                                                                }

                                                                /////////SEARCH FOR WEEKLY
                                                                $sql_state10 = "SELECT * FROM weekly_allloan WHERE  disburseloan > 1 AND remarks = 'loan disbursement' AND codename = '$codename'";
                                                                $result10 = mysqli_query($connect, $sql_state10);
                                                                while ($row = mysqli_fetch_assoc($result10)) {
                                                                    $names = $row["name"];
                                                                    $closingdate = $row["enddate"];
                                                                    $loan_type = $row["type"];
                                                                    $disburseloan = $row["indbalance"];
                                                                    $check_codename = $row["codename"];
                                                                    $interest = $row["interest"];
                                                                    $weeks = $row["weeks"];

                                                                }

                                                                if ($loan_type == "Weekly Payment") {
                                                                    $proposed_weekly_pay = $disburseloan / $weeks;
                                                                    $_SESSION['proposed_weekly_pay'] = $proposed_weekly_pay;
                                                                    $_SESSION['interest_weekly'] = $interest;
                                                                }



                                                                /////////SEARCH FOR MONTHLY
                                                                $sql_state15 = "SELECT * FROM monthly_allloan WHERE  disburseloan > 1 AND remarks = 'loan disbursement' AND codename = '$codename'";
                                                                $result15 = mysqli_query($connect, $sql_state15);
                                                                while ($row = mysqli_fetch_assoc($result15)) {
                                                                    $names = $row["name"];
                                                                    $closingdate = $row["enddate"];
                                                                    $loan_type = $row["type"];
                                                                    $disburseloan = $row["indbalance"];
                                                                    $check_codename = $row["codename"];
                                                                    $interest = $row["interest"];


                                                                }

                                                                if ($names == "") {
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

                                                                } else {

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

                                                                    $_SESSION['dob'] = $dob;
                                                                    $_SESSION['weeks'] = $weeks;

                                                                }


                                                            }
                                                            ?>




                                                        </form>



                                                        <!--<h4 class="sub-title">Basic Inputs</h4>-->
                                                        <form action="staff_reverse_entry.php" method="POST"
                                                            enctype="multipart/form-data">
                                                            <center>
                                                                <div style="width:140px; height:140px;" class="mb-5">
                                                                    <img id="img" src="<?php echo $images; ?>"
                                                                        alt="THIS IS TO LOAD PHOTO"
                                                                        style="border: 4px #99ff99 solid; width:140px; height:140px;">
                                                                    <input type="hidden" name="idd"
                                                                        value="<?php echo $id; ?>" />
                                                                    <input type="hidden" name="imge"
                                                                        value="<?php echo $images; ?>" />
                                                                </div>
                                                            </center>


                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Name:</label>
                                                                <div class="col-sm-10">
                                                                    <input type="hidden" id="duplicate_name" />
                                                                    <input type="text" class="form-control"
                                                                        placeholder="Name" id="nam" type="text"
                                                                        name="name" value="<?php echo $name; ?>"
                                                                        maxlength="50" readonly=""
                                                                        style="text-transform: uppercase;" required>
                                                                </div>
                                                            </div>
                                                            <input type="hidden" name="shadow"
                                                                value="<?php echo $get_name; ?>" />
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Branch:</label>
                                                                <div class="col-sm-10">
                                                                    <input type="hidden" id="duplicate_name" />
                                                                    <input type="text" class="form-control"
                                                                        placeholder="Branch Name" id="nam" type="text"
                                                                        name="branch" value="<?php echo $get_branch; ?>"
                                                                        maxlength="70" readonly=""
                                                                        style="text-transform: uppercase;" required>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Unit
                                                                    District:</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control"
                                                                        placeholder="District" name="regnum"
                                                                        value="<?php echo $regnum; ?>" maxlength="12"
                                                                        readonly="" style="text-transform: uppercase;"
                                                                        required>
                                                                </div>
                                                            </div>
                                                            <br>
                                                            <br>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Select Loan
                                                                    Type:</label>
                                                                <div class="col-sm-10">
                                                                    <select name="loan_type" class="form-control"
                                                                        required>
                                                                        <option value="" selected disabled hidden>
                                                                            ---Select Loan Type---</option>
                                                                        <option value="Daily Payment">Daily Payment
                                                                        </option>
                                                                        <option value="Weekly Payment">Weekly Payment
                                                                        </option>
                                                                        <option value="Monthly Payment">Monthly Payment
                                                                        </option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <br>
                                                            <br>
                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Enter Payment to
                                                                    Reverse:</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" placeholder="enter Amount"
                                                                        value="<?php echo $_SESSION['store_amt_reverse'] ?>"
                                                                        readonly="" onchange="FormatCurrency(this)"
                                                                        onkeypress="return CheckNumeric()"
                                                                        onkeyup="FormatCurrency(this)" id="amount"
                                                                        style="width: 250px; border-radius: 5px;"
                                                                        type="text" name="parent" maxlength="11"
                                                                        required>


                                                                </div>
                                                            </div>



                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Weekly
                                                                    Savings:</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" placeholder="enter Savings"
                                                                        style="width: 150px; border-radius: 5px;"
                                                                        onkeypress="return CheckNumeric()"
                                                                        onclick="FormatCurrency(this)"
                                                                        onkeyup="FormatCurrency(this)" name="save" />
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label">Equity:</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" placeholder="enter Equity"
                                                                        id="equity"
                                                                        style="width: 150px; border-radius: 5px;"
                                                                        onkeypress="return CheckNumeric()"
                                                                        onclick="FormatCurrency(this)"
                                                                        onkeyup="FormatCurrency(this)" name="equity" />
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
                                                                <label class="col-sm-2 col-form-label">Loan Code
                                                                    Name:</label>
                                                                <div class="col-sm-10">
                                                                    <input class="form-control" type="text"
                                                                        name="telephone" id="codename"
                                                                        value="<?php echo $codename; ?>" readonly=""
                                                                        maxlength="20" required>
                                                                </div>
                                                            </div>


                                                            <div class="form-group row">
                                                                <label class="col-sm-2 col-form-label"></label>

                                                                <div class="col-sm-10 mx-auto">
                                                                    <input
                                                                        style=" padding: 8px;  font-weight: bold; background-color:  red; "
                                                                        class="btn button-distance" id="update"
                                                                        type="submit" name="loan" value="REVERSE" />
                                                                    <a style="margin-left:40px; border-radius: 10px;"
                                                                        class="btn btn-dark"
                                                                        href="staff_reverse_entry.php">Reset</a>
                                                                </div>

                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <!-- Basic Form Inputs card end -->
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
                            url: "codename.php",
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



            /////////THIS IS TO CHECK BEFORE FINAL UPDATE////////
            $(document).ready(function () {
                $("#update").click(function () {

                    ///////////////////////////////////////////////////////////////////
                    const fi = document.getElementById('customFile');
                    // Check if any file is selected. 
                    if (fi.files.length > 0) {
                        for (const i = 0; i <= fi.files.length - 1; i++) {

                            const fsize = fi.files.item(i).size;
                            const file = Math.round((fsize / 1000));
                            // The size of the file. 
                            if (file > 148) {
                                alert(
                                    "Image too large, please resize image to 100kb. Your current image size is: " + file / 1000 + "mb (" + file + "kb). Image should be: Horizontal = 400px by Vertical = 300px.");
                                //                    document.getElementById('size').value = file; 
                                return false;
                            }
                        }
                    }
                    //////////////////////////////////////////////////////////// 



                    var name_up = document.getElementById('nam').value;
                    if (name_up === "") {
                        alert("Search member to update first");
                        return false;
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

        <script>
            //////////////////////THIS FOR FIGURE ON KEY UP//////////////////////////
            $(document).ready(function () {
                var figure = $('#figure');
                $(figure).keyup(function (e) { //THIS IS TO AUTO-CALCULATE Attendd
                    e.preventDefault();

                    var cleanNumber = $("#amount").val().split(",").join("");
                    var amount = cleanNumber;


                    var cleanNumber1 = $("#figure").val().split(",").join("");
                    var fig = cleanNumber1;

                    var perc = fig / amount;
                    var tot_per = perc * 100;
                    tot_per = tot_per.toFixed(2);
                    document.getElementById('perc').value = tot_per;
                });
            });  
        </script>




        <script>
            //////////////////////THIS FOR PERCENT% ON KEY UP//////////////////////////
            $(document).ready(function () {
                var perc = $('#perc');
                $(perc).keyup(function (e) {
                    e.preventDefault();

                    var cleanNumber = $("#amount").val().split(",").join("");
                    var amount = cleanNumber;
                    var perc = parseInt(document.getElementById('perc').value);

                    var fig = perc / 100;
                    var tot_fig = amount * fig;
                    tot_fig = Math.round(tot_fig);

                    document.getElementById('figure').value = tot_fig;
                });
            });  
        </script>



</body>

</html>