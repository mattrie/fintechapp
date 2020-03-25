<?php

//..........................TERMII SMS START.......................................
$tel = "8033963904";
$naija_code = "+234";
$phone = $naija_code . ltrim($tel, '0');
$name = "Matt";
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
                     "sms": "Testing SMS 123",
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
if (curl_errno($curl)) {
    echo 'Curl error: ' . curl_error($curl);
} else {
    echo "<script>alert('Messasge sent to $phone')</script>";
}
curl_close($curl);
//echo $response;
//..........................TERMII SMS END.......................................                       





?>
<html>

<head>
    <meta charset='UTF-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv='X-UA-Compatible' content='ie=edge'>

    <title>TESTING</title>
</head>

<body>
    <button
        onclick="window.plugins.socialsharing.shareViaWhatsApp('Message via WhatsApp', null /* img */, null /* url */, function() {console.log('share ok')}, function(errormsg){alert(errormsg)})">msg
        via WhatsApp (with errcallback)</button>
</body>

</html>