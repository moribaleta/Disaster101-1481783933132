<html>
    <head>
        <link rel="stylesheet" href="resources/css/style.css">
        <script src="translator.js"></script>
    </head>
    <body style='background:white'>
        <?php
        getForecast('Manila');
        getForecast('Cebu');
        getForecast('Davao');
        getForecast('Olongapo');
        getForecast('Baguio');
        getForecast('Subic');
        ?>
    </body>
</html>
<script></script>

<?php

function getForecast($city){

    $key = 'af1d7670685d4b8389723009161212';
    //$forcast_days='7';
    //$url ="http://api.apixu.com/v1/forecast.json?key=$key&q=$city&days=$forcast_days";
    $url = "http://api.apixu.com/v1/current.json?key=$key&q=$city&=" ;
    /*$ch = curl_init();
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

    $days = $weather->forecast->forecastday;

    foreach ($days as $day){
        echo "<table><tr>$city</tr>";
        echo "<tr><td colspan='4' border='0'>condition: {$day->day->condition->text} <img src=' {$day->day->condition->icon}'/></td></tr>";
        echo "<tr><td>&nbsp;</td><td>Max.<br>Temprature</td><td>Min.<br>Temprature</td><td>Avg.<br>Temprature</td></tr>";
        echo "<tr><td>&deg;C</td><td>{$day->day->maxtemp_c}</td><td>{$day->day->avgtemp_c}</td></tr>";
        echo "<tr><td><h4>Wind</h4></td><td colspan='3'>{$day->day->maxwind_kph}kph </td></tr>";
        echo "</table> <br>";
    }*/
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

    $json_output=curl_exec($ch);
    $weather = json_decode($json_output);
    echo "<h3 id= 'curr$city' ><script>translateData('Current Weather','curr$city');</script></h3>";
    echo "<h3 id= 'loc$city'><script>translateData('Location','oc$city');</script></h3>";
    echo "<h3><p id='city$city'><script>translateData('City: ','city$city');</script></p>". $weather->location->name."</h3>";
    echo "<h3 id='temp$city'><script>translateData('Temprature','temp$city');</script></h3>";
    echo "<br>";
    echo "Temperature (&deg;C): " . $weather->current->temp_c; echo "<br>";
    echo "Feels like (&deg;C)". $weather->current->feelslike_c;
    echo "<br>";
    echo "Condition: <img src='" . $weather->current->condition->icon ."'>" . $weather->current->condition->text;
    echo "<h4>Wind</h4>";
    echo $weather->current->wind_kph." kph <br>";
    echo $weather->current->wind_degree."&deg;  " . $weather->current->wind_dir."<br>";
    echo "Humidity: ".$weather->current->humidity;
    echo "<br>";
    echo "Updated On: ".$weather->current->last_updated;

}

?>
