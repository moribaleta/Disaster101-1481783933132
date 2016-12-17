<?php
session_start();
$location = $_SESSION['fulladdr'];
$user_email = 'moribaleta.work@gmail.com';
$subject = "Emergency Response Needed";
$txt = "Good day, there is a person in need of help  \n\n";
$txt .= "The Location is $location \n\n pls send immediate help";
$headers = "From: disaster101@disaster101.mybluemix.net" . "\r\n" .
    "CC: disaster101@disaster101.mybluemix.net";
mail($user_email,$subject,$txt,$headers);

?>
