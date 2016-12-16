<?php
#$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
#$params = parse_url($url);

#parse_str($params.['lat'], $lat);
#parse_str($params.['lon'], $lon);

$coordinates = $_GET['lat'].', '.$_GET['lon'];
echo $coordinates;

require("class-Clockwork.php");
$apikey = "	da71dc9e2f9780046c8d786de4e98beffbee5145";

$clockwork = new Clockwork($apikey);

$message = array('to' => "639161174599", 'message' => 'Good day MMDA!  This is from (https://disaster101.mybluemix.net). A Person needs help, located at %0a'.$coordinates);

$done = $clockwork->send($message);
echo implode('|', $message);
?>
