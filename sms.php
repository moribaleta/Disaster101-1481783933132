<?php
#$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
#$params = parse_url($url);

#parse_str($params.['lat'], $lat);
#parse_str($params.['lon'], $lon);
/*
$coordinates = $_GET['lat'].', '.$_GET['lon'];
echo $coordinates;

require("class-Clockwork.php");
$apikey = "	da71dc9e2f9780046c8d786de4e98beffbee5145";

$clockwork = new Clockwork($apikey);

$message = array('to' => "639161174599", 'message' => 'Good day MMDA!  This is from (https://disaster101.mybluemix.net). A Person needs help, located at %0a'.$coordinates);

$done = $clockwork->send($message);
echo implode('|', $message);*/

require 'class-Clockwork.php';

try
{
    // Create a Clockwork object using your API key
    $API_KEY = 'da71dc9e2f9780046c8d786de4e98beffbee5145';
    $clockwork = new Clockwork( $API_KEY );

    // Setup and send a message
    $message = array( 'to' => '9161174599', 'message' => 'This is a test!' );
    $result = $clockwork->send( $message );

    // Check if the send was successful
    if($result['success']) {
        echo 'Message sent - ID: ' . $result['id'];
    } else {
        echo 'Message failed - Error: ' . $result['error_message'];
    }
}
catch (ClockworkException $e)
{
    echo 'Exception sending SMS: ' . $e->getMessage();
}
?>
