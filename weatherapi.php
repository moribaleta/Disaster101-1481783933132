<?php
$city = $_POST['city'];
session_start();
$_SESSION['city'] =  $city;
/*
$user_ip = getenv('REMOTE_ADDR');
$geo = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$user_ip"));
$country = $geo["geoplugin_countryName"];
$city = $geo["geoplugin_city"];
*/
/*$key = 'af1d7670685d4b8389723009161212';

$url = "https://api.apixu.com/v1/current.json?key=$key&q=$city&=";
$ch = curl_init();  
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
$json_output=curl_exec($ch);
$weather = json_decode($json_output);

$return = array("City: ".$city,"Temperature: ". $weather->current->temp_c);
*/
session_start();
        $key = 'af1d7670685d4b8389723009161212';
        $forcast_days='1';
        $city = $_SESSION['city'];
        $url ="http://api.apixu.com/v1/forecast.json?key=$key&q=$city&days=$forcast_days";

        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

        $json_output=curl_exec($ch);
        if( ($postResult = curl_exec($ch))!=null){
            $result = file_get_contents($ch);
            echo "<script>console.log('".var_dump(json_decode($result, true))."');</script>";

        }else{
            die('Error: "' . curl_error($ch) . '" - Code: ' . curl_errno($ch));
        }
        $weather = json_decode($json_output);


        $day = $weather->forecast->forecastday;

        /*foreach ($days as $day){

            echo "<table>";
            echo "<tr><td colspan='4' border='0'><h2>{$day->date}</h2> Sunrise: {$day->astro->sunrise} <br> Sunset: {$day->astro->sunset}"
                . "<br> condition: {$day->day->condition->text} <img src=' {$day->day->condition->icon}'/></td></tr>";
            echo "<tr><td>&nbsp;</td><td>Max.<br>Temprature</td><td>Min.<br>Temprature</td><td>Avg.<br>Temprature</td></tr>";

            echo "<tr><td>&deg;C</td><td>{$day->day->maxtemp_c}</td><td>{$day->day->mintemp_f}</td><td>{$day->day->avgtemp_c}</td></tr>";
            echo "<tr><td><h4>Wind</h4></td><td colspan='3'>{$day->day->maxwind_mph}Mph <br> {$day->day->maxwind_kph}kph </td></tr>";
            echo "</table> <br>";

        }*/
        $return = array(
            {$day->day->condition->text},
            {$day->day->condition->icon},
            {$day->day->avgtemp_c},
            {$day->day->maxwind_kph}."kph"
        );
echo json_encode($return);
?>
