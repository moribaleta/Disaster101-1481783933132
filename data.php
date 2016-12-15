<?php
$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$parts = parse_url($url);
parse_str($parts['lat'], $lat_str);
parse_str($parts['lon'], $lon_str);
$lat = floatval($lat_str);
$lon = floatval($lon_str);
echo $lat;
echo $lon;

$homepage = file_get_contents('http://172.16.65.235/weather.py?lat=' + $lat + '&lon=' + &lon);
echo $homepage;
?>
