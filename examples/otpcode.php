<?php

// Put the functions where you can access them
// Example otpcode.php
// and include it somewhere in your code
// e.g. include('otpcode.php')

/**
 * Returns true if $reason
 * contains wigal otp code
 *
 * @param string $reason
 * @param string $wigalOtpCode
 * @return mixed
 */
function containsOtp($reason, $wigalOtpCode = '*800*')
{
    return (bool) strpos($reason, $wigalOtpCode) !== false;
}


function getReason($response)
{
    return json_decode($response)->reason;
}

function getOtpUssd($string)
{
    $strpos = strpos($string, '*');
    $first_star = substr($string, 0, $strpos);
    $otp_code = substr($string, ($strpos));

    return (object) [
        'notice' => $first_star,
        'otp_code' => $otp_code
    ];
}

// Put this code where you want to display otpcode to user $reason variable
$reason = getReason($response);
$output = getOtpUssd($reason);
