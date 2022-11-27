<?php

include('otpcode.php');

$response = json_encode([
    'status' => 'OK',
    'reason' => 'To Receive Payment Prompt Dial *800*0*3072#',
    'transactionid' => 2553918,
    'clienttransid' => 345655,
    'clientreference' => 754876,
    'statusdate' => '2022-03-02 11:59:17.779',
    'brandtransid' => null
]);

$reason = getReason($response);

$output = getOtpUssd($reason);

echo $otpCode = $output->notice .' '.$output->otp_code;
