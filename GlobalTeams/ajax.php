<?php
include 'config.php';
$clickId = isset($_POST['clickId']) ? $_POST['clickId'] : '';
//$user_ip = $_SERVER['REMOTE_ADDR'];
if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = isset($_SERVER['HTTP_CLIENT_IP']) ? $_SERVER['HTTP_CLIENT_IP'] : '';
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : '';
} else {
    $ip = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '';
}
$date_time = date('Y-m-d');
$date_time_sql = date('Y-m-d H:i:s');
$filename = 'logs/'.$date_time.'-click.log';
$query = "INSERT INTO `logs` (`ip`, `datetime`, `button_id`) VALUES ('".$ip."','".$date_time_sql."','".$clickId."' ) ";
$link->query($query);
file_put_contents($filename, "ip: $ip; date: $date_time; button id: $clickId", FILE_APPEND);