<html>
    <head>
        <link rel="stylesheet" href="resources/css/style.css">
    </head>
    <body style="background:white; padding 10px;">
        <?php
        session_start();
        $key = 'af1d7670685d4b8389723009161212';
        $forcast_days='7';
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


        $days = $weather->forecast->forecastday;
        echo "<table><tr>$city</tr>";

        foreach ($days as $day){


            echo "<tr><td colspan='4' border='0'><h2>{$day->date}</h2> Sunrise: {$day->astro->sunrise} <br> Sunset: {$day->astro->sunset}"
                . "<br> condition: {$day->day->condition->text} <img src=' {$day->day->condition->icon}'/></td></tr>";
            echo "<tr><td>&nbsp;</td><td>Max.<br>Temprature</td><td>Min.<br>Temprature</td><td>Avg.<br>Temprature</td></tr>";

            echo "<tr><td>&deg;C</td><td>{$day->day->maxtemp_c}</td><td>{$day->day->avgtemp_c}</td></tr>";
            echo "<tr><td><h4>Wind</h4></td><td colspan='3'>{$day->day->maxwind_kph}kph </td></tr>";

        }
        echo "</table> <br>";
        ?>
    </body>
</html>
