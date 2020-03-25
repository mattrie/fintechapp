<?php 


$amt_paid = "1500";  // Amount paid
$balance = "37500";  // Remaining balance


$naija_code = "234";
$phone = $naija_code . "8168627861";
$mobile = urlencode($phone);  // 23480XXXXXXXXXX

$message = "Amt_paid: N" . number_format($amt_paid) . ". Balance: N" . number_format($balance) . ".";
$username = 'matriebelle@gmail.com';
$password = 'beta@@12345';
$sender = 'FINSOLUTE';
$type = 'text';
$curl = curl_init();
curl_setopt_array(
    $curl,
    array(
        CURLOPT_URL => 'https://api.ng.termii.com/api/sms/send',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => ' {
            "to": "' . $phone . '",
             "from": "FINSOLUTE",
             "sms": "' . $message . '",
             "type": "plain",
             "channel": "generic",
             "api_key": "TLpOlmFOTXS8w6kjUiqdhXTYYKXAGES30NEAb8ubc51v5BpS3p2vnE1euNXgvW"

          }',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json'
        ),
    )
);
$response = curl_exec($curl);

echo "<script>alert('$response')</script>";